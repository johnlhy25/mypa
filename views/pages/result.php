<?php 
if( $this->session->logged_in){
  if( $this->session->role == 'Guest'){
    redirect (base_url().'Guest');
  }else{?>


	<div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Results</h2>
            </div>
          </header>

		<!-- Breadcrumb-->
		<?php require_once('breadcrumb.php'); ?>

		<div class="col-lg-12 mt-3">
			<div class="card">
				<!--Count-->
				<div class="card-header d-flex align-items-center">
					<h1> <span class="badge bg-warning badge-corner"><i class="fa fa-list-alt"></i></span><strong> Results </strong></h1>
				</div>
							<div class="card-body">
								<ul class="nav nav-tabs" id="myTab" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Memo</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Result</a>
									</li>
								</ul>

								<div class="tab-content" id="myTabContent">
									<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
										<br>
										<a type="button" data-toggle="modal" href="#add" class="btn pull-left btn-primary btn-sm"><i class="fa fa-plus"></i> Add Memo</a>
										<br>
										<br>
										

										<div  class="table-responsive">                       
											<table id="parameters" class="table table-striped table-hover">
											<thead>
												<tr>
													<th>#</th>
													<th>Memo No.</th>
													<th>Division</th>
													<th>Year</th>
													<th>Quarter</th>
													<th></th>
												</tr>
											</thead>
											
											<tbody>
											
											<?php 
												$num_row = 0;
												foreach ($Memo as $row) { 
													$url= base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/memos/'.$row['res_filename'].'&zoom=auto';
													$num_row++;
											?>
													<tr>
														<td><?= $num_row; ?></p>
														<td><p><?= $row['res_memo_no']; ?></td></p>
														<td><p><?= $row['res_dep_desc']; ?></td></p>
														<td><p><?= $row['res_year']; ?></td></p>
														<td><p><?= $row['cat_desc']; ?></td></p>
														<td class="text-center">
														
														<button data-toggle="dropdown" type="button" class="btn btn-outline-primary dropdown-toggle btn-sm"><i class="fa fa-tasks"></i> Action <span class="caret"></span></button>
															<div class="dropdown-menu">
																	<a href="#" class="dropdown-item" data-toggle="modal" data-target="#view<?= $row['res_id'] ?>"><i class="fa fa-eye"></i> View</a>
																	<a href="#" class="dropdown-item" data-toggle="modal" data-target="#delete<?= $row['res_id'] ?>"><i class="fa fa-trash"></i> Delete</a>
															</div> 
														</td>
													</tr>

													<!-- Modal View -->
													<div class="modal fade delete" id="view<?= $row['res_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
													<div class="modal-dialog modal-xl" role="document" style="width:100%">
													
														<div class="modal-content">
															<div class="modal-header">
																<h3 class="modal-title" id="exampleModalLabel">Memo No. <?= $row['res_memo_no']; ?></h3>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
																</button>
															</div>
														
															<div class="modal-body text-center">
															
																<iframe src="<?= $url?>" style="width:100%; height:720px; border:0;">
																</iframe>
																
															</div>
														</div>
													</div>
													</div>
													<!-- End Modal -->

													<!-- Modal Delete -->
														<div class="modal fade delete" id="delete<?= $row['res_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
														<div class="modal-dialog" role="document">
														
															<div class="modal-content">
															<div class="modal-header">
																<h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-exclamation-triangle"></i> Warning</h3>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
																</button>
															</div>
															
															<div class="modal-body text-center">
																<?= form_open('delete_result_docs'); ?>
																	<input type="hidden" name="res_id" value="<?= $row['res_id']?>">
																	<input type="hidden" name="res_cat" value="<?= $row['res_cat']?>">
																	<h4>Are you sure you want to delete this Result <span style="color: #fd5050;"> [<?= $row['res_memo_no']; ?>]</span>?</h4>
																	<br><small class="pull-left"><b>Note</b>: This proccess is irreversible.</small>
															</div>

															
															
															<div class="modal-footer">
															
																<div class="btn-group">
																	<button type="deleteexhibitsubmit" class="btn btn-danger">Yes</button>
																	<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>	
																</div>

																<div id="deleteexhibitloading" class="spinner-grow text-primary" style="display: none;" role="status">
																	<span class="sr-only">Loading... </span>
																</div>	
																
															</div>
															</form>
															</div>
														</div>
														</div>
														<!-- End Modal -->

														
											</tbody>
											<?php } ?>
											</table>
										</div>
									</div>
									
									<!--Breake Tab-->

									<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
										<br>
										<a type="button" data-toggle="modal" href="#add" class="btn pull-left btn-primary btn-sm"><i class="fa fa-plus"></i> Add Result</a>
										<br>
										<br>

										<div  class="table-responsive">                       
											<table id="program" class="table table-striped table-hover">
											<thead>
												<tr>
													<th>#</th>
													<th>Division</th>
													<th>Year</th>
													<th>Quarter</th>
													<th></th>
												</tr>
											</thead>
											
											<tbody>
											
											<?php 
												$num_row = 0;
												foreach ($Result as $row) { 
													$num_row++;
													$url= base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/results/'.$row['res_filename'].'&zoom=auto';
											?>
													<tr>
														<td><?= $num_row; ?></p>
														<td><p><?= $row['res_dep_desc']; ?></td></p>
														<td><p><?= $row['res_year']; ?></td></p>
														<td><p><?= $row['cat_desc']; ?></td></p>
														<td class="text-center">
														
														<button data-toggle="dropdown" type="button" class="btn btn-outline-primary dropdown-toggle btn-sm"><i class="fa fa-tasks"></i> Action <span class="caret"></span></button>
															<div class="dropdown-menu">
																	<a href="#" class="dropdown-item" data-toggle="modal" data-target="#view<?= $row['res_id'] ?>"><i class="fa fa-eye"></i> View</a>
																	<a href="#" class="dropdown-item" data-toggle="modal" data-target="#delete<?= $row['res_id'] ?>"><i class="fa fa-trash"></i> Delete</a>
															</div> 
														</td>
													</tr>

													<!-- Modal View -->
													<div class="modal fade delete" id="view<?= $row['res_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
													<div class="modal-dialog modal-xl" role="document" style="width:100%">
													
														<div class="modal-content">
															<div class="modal-header">
																<h3 class="modal-title" id="exampleModalLabel">Result</h3>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
																</button>
															</div>
														
															<div class="modal-body text-center">
															
																<iframe src="<?= $url?>" style="width:100%; height:720px; border:0;">
																</iframe>
																
															</div>
														</div>
													</div>
													</div>
													<!-- End Modal -->

													<!-- Modal Delete -->
														<div class="modal fade delete" id="delete<?= $row['res_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
														<div class="modal-dialog" role="document">
														
															<div class="modal-content">
															<div class="modal-header">
																<h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-exclamation-triangle"></i> Warning</h3>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
																</button>
															</div>
															
															<div class="modal-body text-center">
																<?= form_open('delete_result_docs'); ?>
																	<input type="hidden" name="res_id" value="<?= $row['res_id']?>">
																	<input type="hidden" name="res_cat" value="<?= $row['res_cat']?>">
																	<h4>Are you sure you want to delete this result <span style="color: #fd5050;"> [<?= $row['res_filename']; ?>]</span>?</h4>
																	<br><small class="pull-left"><b>Note</b>: This proccess is irreversible.</small>
															</div>

															
															
															<div class="modal-footer">
															
																<div class="btn-group">
																	<button type="deleteexhibitsubmit" class="btn btn-danger">Yes</button>
																	<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>	
																</div>

																<div id="deleteexhibitloading" class="spinner-grow text-primary" style="display: none;" role="status">
																	<span class="sr-only">Loading... </span>
																</div>	
																
															</div>
															</form>
															</div>
														</div>
														</div>
														<!-- End Modal -->

												</tbody>
											<?php } ?>
											</table>
										</div>
									</div>
								</div>

								
							</div>
			</div> <!-- End of card-->
		</div>	<!--End of col-lg-12 mt-3-->
				
		<!--Message Box-->
	
		<?php if($this->session->flashdata('result_added')) : ?>

		<div class="toast" data-autohide="false" style="position: absolute; top: 150px; right: 0; min-width: 300px;">
			<div class="toast-header bg-red">
			<strong class="mr-auto"><i class="fa fa-bullhorn"></i> System Message</strong>
			<button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
			</div>
			<div class="toast-body">
			<?= $this->session->flashdata('result_added'); ?>
			</div>
		</div>
			
		<?php endif;?>

		<?php if($this->session->flashdata('delete_result')) : ?>

		<div class="toast" data-autohide="false" style="position: absolute; top: 150px; right: 0; min-width: 300px;">
			<div class="toast-header bg-red">
			<strong class="mr-auto"><i class="fa fa-bullhorn"></i> System Message</strong>
			<button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
			</div>
			<div class="toast-body">
			<?= $this->session->flashdata('delete_result'); ?>
			</div>
		</div>
	
		<?php endif;?>
		
	<?php }?>
<?php }else{
redirect (base_url());
}?>
