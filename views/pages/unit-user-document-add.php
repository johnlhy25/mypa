<?php 
if( $this->session->logged_in){
  if( $this->session->role == 'Accre'){
    redirect (base_url().'Guest');
  }else{?>


	<div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom"><?= $this->session->ous_desc; ?>: <?= $unit?></h2>
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
									<a  data-toggle="modal" href="#add" class="dropdown-item edit"> <i class="fa fa-plus"></i>Add Document</a>
									<a  href="#" class="dropdown-item edit"> <i class="fa fa-download"></i>Download All Documents</a>
								</div>
					</div>
				</div>

				<!--Count-->
				
				
				<div class="card-header d-flex align-items-center">
					<h1> <span class="badge bg-warning badge-corner"><strong> <i class="fa fa-calendar"></i> <?= $year; ?>: <?= $cat_desc; ?></strong></span></h1>
				</div>
							<div class="card-body">
								<?php if($Memo == null){
									$disabled = 'disabled';
									$link_memo = '';
								}else{
									$link_memo = $Memo['res_filename'];
									$disabled = '';
								}
								?>
								<?php if($Result == null){
									$disabled1 = 'disabled';
									$link_result = '';
								}else{
									$link_result = $Result['res_filename'];
									$disabled1 = '';
								}
								?>
									<small><a class="btn btn-sm btn-primary <?= $disabled ?>" href="<?= base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/memos/'.$link_memo.'&zoom=auto'; ?>" target="_blank" ><i class="fa fa-eye"></i> View Memo</a> | <a class="btn btn-sm btn-primary <?= $disabled1 ?>" href="<?= base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/results/'.$link_result.'&zoom=auto'; ?>" target="_blank"><i class="fa fa-eye"></i> View Result</a></small>
								<br>
								<br>
									<div class="table-responsive">                       
										<table id="parameters" class="table table-striped table-hover">
										<thead>
											<tr>
											<th>#</th>
											<th>Descrption</th>
											<th>User's Log</th>
											<th>Date & Time Modified</th>
											<th></th>
											</tr>
										</thead>
										
										<tbody>
										
										<?php 
											$num_row = 0;
											foreach ($list_of_docs as $row) { 
											$url= base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/'.$row['file_filename'].'&zoom=auto';
											$num_row++;
										?>
												<tr>
													<td><?= $num_row;?></td>
													<td><p><?= $row['file_desc']; ?></td></p>
													<td><p><?= $row['usr_name']; ?></td></p>
													<td><p><?= $row['file_timestamp']; ?></td></p>
													<td class="text-center">
													
													<button data-toggle="dropdown" type="button" class="btn btn-outline-primary dropdown-toggle btn-sm"><i class="fa fa-tasks"></i> Action <span class="caret"></span></button>
														<div class="dropdown-menu">
															<a href="#" id="view" class="dropdown-item" data-toggle="modal" data-target="#view<?= $row['file_id'] ?>"><i class="fa fa-eye"> </i> View</a>
															<div class="dropdown-divider"></div>

															<?php if ($row['file_usr_id'] == $this->session->usr_id) {?>
																<a href="#" class="dropdown-item" data-toggle="modal" data-target="#edit<?= $row['file_id'] ?>"><i class="fa fa-pencil"></i> Edit</a>
																<a href="#" class="dropdown-item" data-toggle="modal" data-target="#delete<?= $row['file_id'] ?>"><i class="fa fa-trash"></i> Delete</a>
															<?php } else {?>	
																<a href="#" class="dropdown-item disabled" data-toggle="modal" data-target="#edit<?= $row['file_id'] ?>" ><i class="fa fa-pencil"></i> Edit</a>
																<a href="#" class="dropdown-item disabled" data-toggle="modal" data-target="#delete<?= $row['file_id'] ?>" ><i class="fa fa-trash"></i> Delete</a>
															<?php } ?>
														</div> 
													</td>
													
												</tr>

											

												<!-- Modal Delete -->
													<div class="modal fade delete" id="delete<?= $row['file_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
													<div class="modal-dialog" role="document">
													
														<div class="modal-content">
														<div class="modal-header">
															<h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-exclamation-triangle"></i> Warning</h3>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
															</button>
														</div>
														
														<div class="modal-body text-center">
															<?= form_open('delete_exhibits_docs'); ?>
																<h4>Are you sure you want to delete this document <span style="color: #fd5050;"> [<?= $row['file_desc']; ?>]</span>?</h4>
																<input type="hidden" name="back_link" value="<?= $unit;?>-<?= $unit_id;?>-<?= $year?>-<?= $cat_id;?>-<?= $cat_desc;?>">
																<input type="hidden" name="file_id" value="<?= $row['file_id'] ?>">
																<input type="hidden" name="file_filename" value="<?= $row['file_filename'] ?>">
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

													<!-- Modal View -->
													<div class="modal fade delete" id="view<?= $row['file_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
													<div class="modal-dialog modal-xl" role="document" style="width:100%">
													
														<div class="modal-content">
															<div class="modal-header">
																<h3 class="modal-title" id="exampleModalLabel"><?= $row['file_desc']; ?></h3>
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

													<!--Edit Exhibits-->
													<div class="modal fade delete" id="edit<?= $row['file_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
															<div class="modal-dialog modal-lg" role="document">	
																<div class="modal-content">

																	<div class="modal-header">
																		<h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-pencil"></i> Edit Document</h3>
																			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																				<span aria-hidden="true">&times;</span>
																			</button>
																	</div>

																	<div class="modal-body text-center">
																		<?= form_open_multipart('edit_exhibits_docs'); ?>
																		<input type="hidden" name="file_filename" value="<?= $row['file_filename'] ?>">
																		<input type="hidden" name="file_id" value="<?= $row['file_id'] ?>">
																		<input type="hidden" name="file_cat_id" value="<?= $cat_id;?>">
																		<input type="hidden" name="year" value="<?= $year;?>">
																		<input type="hidden" name="file_dep_id" value="<?= $unit_id;?>">
																		<input type="hidden" name="back_link" value="<?= $unit;?>-<?= $unit_id;?>-<?= $year?>-<?= $cat_id;?>-<?= $cat_desc;?>">
																		
																		<!--Start Description-->
																		<div class="row form-group">
																			<div class="col-sm-3">
																				<label class="control-label pull-left" style="position:relative; top:7px;">Description:</label>
																			</div>
																			<div class="col-sm-9">
																				<input type="text" class="form-control" name="description" value="<?= $row['file_desc']?>" required>
																			</div>
																		</div>

																		<div class="row form-group">
																			<div class="col-sm-3">
																				<label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-file-pdf-o"></i> Upload Document:</label>
																			</div>
																			<div class="col-sm-9 ">
																				<input class="filestyle" data-buttonBefore="true" data-text="Browse file" data-badge="true" data-badgeName="badge-danger" data-placeholder="Please select only pdf file." type='file' name='file' accept="application/pdf">
																				<small class="pull-right">Leave <b>empty</b> if you do not want to change.</small>
																			</div>
																		</div>
						
																		<div class="row form-group">
																			<div class="col-sm-3">
																				<label class="control-label pull-left" style="position:relative; top:7px;">Google Link:</label>
																			</div>
																			<div class="col-sm-9">
																			<textarea class="form-control" rows="5" name="file_google_link"><?= $row['file_google_link']; ?></textarea>
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
		
		<?php if($this->session->flashdata('add_exhibits')) : ?>

			<div class="toast" data-autohide="false" style="position: absolute; top: 150px; right: 0; min-width: 300px;">
				<div class="toast-header bg-red">
					<strong class="mr-auto"><i class="fa fa-bullhorn"></i> System Message</strong>
					<button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
				</div>
				<div class="toast-body">
					<?= $this->session->flashdata('add_exhibits'); ?>
				</div>
			</div>

		<?php endif;?>

		<?php if($this->session->flashdata('edit_exhibits')) : ?>

			<div class="toast" data-autohide="false" style="position: absolute; top: 150px; right: 0; min-width: 300px;">
				<div class="toast-header bg-red">
					<strong class="mr-auto"><i class="fa fa-bullhorn"></i> System Message</strong>
					<button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
				</div>
				<div class="toast-body">
					2<?= $this->session->flashdata('edit_exhibits'); ?>
				</div>
			</div>

		<?php endif;?>

		<?php if($this->session->flashdata('delete_exhibits')) : ?>

			<div class="toast" data-autohide="false" style="position: absolute; top: 150px; right: 0; min-width: 300px;">
				<div class="toast-header bg-red">
					<strong class="mr-auto"><i class="fa fa-bullhorn"></i> System Message</strong>
					<button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
				</div>
				<div class="toast-body">
					<?= $this->session->flashdata('delete_exhibits'); ?>
				</div>
			</div>

		<?php endif;?>
															
		
	<?php }?>
<?php }else{
redirect (base_url());
}?>
