<?php 
if( $this->session->logged_in){
  if( $this->session->role == 'Guest'){
    redirect (base_url().'Guest');
  }else{?>


	<div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Quarters</h2>
            </div>
          </header>

		<!-- Breadcrumb-->
		<?php require_once('breadcrumb.php'); ?>

		<div class="col-lg-12 mt-3">
			<div class="card">

				<div class="card-close">
					<div class="dropdown">
						<button type="button" id="closeCard3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
								<div aria-labelledby="closeCard3" class="dropdown-menu dropdown-menu-right has-shadow">
									<a  data-toggle="modal" href="#add" class="dropdown-item edit"> <i class="fa fa-plus"></i>Add Quarter</a>
								</div>
					</div>
				</div>

				<!--Count-->
				
				
				<div class="card-header d-flex align-items-center">
					<h1> <span class="badge bg-warning badge-corner"><i class="fa fa-calendar-plus-o"></i></span><strong> Quarters </strong></h1>
				</div>
							<div class="card-body">
								<div  class="table-responsive">                       
									<table id="parameters" class="table table-striped table-hover">
									<thead>
										<tr>
										<th>#</th>
										<th>Descrption</th>
										<th>Date & Time Modified</th>
										<th></th>
										</tr>
									</thead>
									
									<tbody>
									
									<?php 
										$num_row = 0;
										foreach ($list_of_categories as $row) {
										 $num_row++;
									?>
											<tr>
												<td><?= $num_row ?></td>
												<td><p><?= $row['cat_desc']; ?></td></p>
												<td><p><?= $row['cat_timestamp']; ?></td></p>
												<td class="text-center">
												
												<button data-toggle="dropdown" type="button" class="btn btn-outline-primary dropdown-toggle btn-sm"><i class="fa fa-tasks"></i> Action <span class="caret"></span></button>
													<div class="dropdown-menu">
															<a href="#" class="dropdown-item" data-toggle="modal" data-target="#edit<?= $row['cat_id'] ?>"><i class="fa fa-pencil"></i> Edit</a>
															<a href="#" class="dropdown-item" data-toggle="modal" data-target="#delete<?= $row['cat_id'] ?>"><i class="fa fa-trash"></i> Delete</a>
													</div> 
												</td>
											</tr>

											<!-- Modal Delete -->
												<div class="modal fade delete" id="delete<?= $row['cat_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
												<div class="modal-dialog" role="document">
												
													<div class="modal-content">
													<div class="modal-header">
														<h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-exclamation-triangle"></i> Warning</h3>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
														</button>
													</div>
													
													<div class="modal-body text-center">
														<?= form_open('delete_quarter'); ?>
															<input type="hidden" name="cat_id" value="<?= $row['cat_id']?>">
															<h4>Are you sure you want to delete this Quarter <span style="color: #fd5050;"> [<?= $row['cat_desc']; ?>]</span>?</h4>
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

												<!--Edit Categories-->
												<div class="modal fade delete" id="edit<?= $row['cat_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
														<div class="modal-dialog modal-md" role="document">	
															<div class="modal-content">

																<div class="modal-header">
																	<h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-pencil"></i> Edit Quarter</h3>
																		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																			<span aria-hidden="true">&times;</span>
																		</button>
																</div>

																<div class="modal-body text-center">
																	<?= form_open('edit_quarter'); ?>
																	<input type="hidden" name="cat_id" value="<?= $row['cat_id']?>">
																	
																	<!--Start Description-->
																	<div class="row form-group">
																		<div class="col-sm-3">
																			<label class="control-label" style="position:relative; top:7px;">Quarter:</label>
																		</div>
																		<div class="col-sm-9">
																			<input type="text" class="form-control" name="cat_desc" value="<?= $row['cat_desc']?>" required>
																		</div>
																	</div>
																</div>
																							
																<div class="modal-footer">
																	<div class="btn-group">
																		<button id="editexhibitsubmit" type="submit" value='Upload' name='upload' class="btn btn-danger">Submit</button>
																		<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>	
																	</div>

																	<div id="editexhibitloading" class="spinner-grow text-primary" style="display: none;" role="status">
																		<span class="sr-only">Loading... </span>
																	</div>	
																</div>

																</form>						
															</div>
														</div>
													</div>
													<!-- End Modal -->
												<!-- End Modal -->
									</tbody>
									<?php } ?>
									</table>
								</div>
							</div>
			</div> <!-- End of card-->
		</div>	<!--End of col-lg-12 mt-3-->
		
		<!--Message Box-->
	
		<?php if($this->session->flashdata('add_quarter')) : ?>

		<div class="toast" data-autohide="false" style="position: absolute; top: 150px; right: 0; min-width: 300px;">
			<div class="toast-header bg-red">
			<strong class="mr-auto"><i class="fa fa-bullhorn"></i> System Message</strong>
			<button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
			</div>
			<div class="toast-body">
			<?= $this->session->flashdata('add_quarter'); ?>
			</div>
		</div>
			
		<?php endif;?>

		<?php if($this->session->flashdata('edit_quarter')) : ?>

		<div class="toast" data-autohide="false" style="position: absolute; top: 150px; right: 0; min-width: 300px;">
			<div class="toast-header bg-red">
			<strong class="mr-auto"><i class="fa fa-bullhorn"></i> System Message</strong>
			<button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
			</div>
			<div class="toast-body">
			<?= $this->session->flashdata('edit_quarter'); ?>
			</div>
		</div>
	
		<?php endif;?>

		<?php if($this->session->flashdata('delete_quarter')) : ?>

		<div class="toast" data-autohide="false" style="position: absolute; top: 150px; right: 0; min-width: 300px;">
			<div class="toast-header bg-red">
			<strong class="mr-auto"><i class="fa fa-bullhorn"></i> System Message</strong>
			<button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
			</div>
			<div class="toast-body">
			<?= $this->session->flashdata('delete_quarter'); ?>
			</div>
		</div>
			
		<?php endif;?>

		
				
	<?php }?>
<?php }else{
redirect (base_url());
}?>
