<?php 
if( $this->session->logged_in){
  if( $this->session->role == 'Accre'){
    redirect (base_url().'Guest');
  }else{?>


	<div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom"><?= $this->session->ous_desc; ?></h2>
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
									<a href="print" class="dropdown-item edit"> <i class="fa fa-print"></i> Print</a>
								</div>
					</div>
				</div>

				<!--Count-->
				
				
				<div class="card-header d-flex align-items-center">
					<h1> Monitoring of Foreign Training Program Invitations (FY <?= $year?>)</h1>
				</div>
					<div class="card-body">

						
							<div class="row">
								<div class="col-md-8"> 
								<small>
									Legend:<br>
									<span class="badge bg-red badge-corner">Lapsed</span>
								</small>
								</div>	
								<div class="col-md-4 "> 
										
										<div class="d-inline-block pull-right">	
										<a href="#" id="submit_url" type="button" class="btn btn-primary filter"><i class="fa fa-filter"></i> Filter</a>
										</div>

										<div class="d-inline-block pull-right">
											<select id="yearxx" name="year" class="form-control" onchange="change_url1()">
												<option value="All">Select Year</option>
											<!--Year-->
												<?php
													$firstYear ='1990';
													$lastYear = (int)date('Y');
													for($i=$lastYear;$i>=$firstYear;$i--) { 
												?>
											<option value="<?= $i;?>"><?= $i;?></option>
											<!--End of Year-->  
											<?php } ?>	
											</select>
										</div>
								</div>		
							</div><!--End of row-->
							
					
						<div class="table-responsive mt-2">   
										
										<table id="listofinv" class="table table-striped table-hover">
											<thead>
												<tr>
													
													<th>#</th>
													<th>Memo No.</th>
													<th>Sponsoring Agency</th>
													<th>Agency Category</th>
													<th>Title of Learning and Development(L&D) </th>
													<th>From (Date)</th>
													<th>To (Date)</th>
													<th>No. of Hours</th>
													<th>Type of L&D</th>
													<th>Venue</th>
													<th>Deadline of Submission</th>
													<th>Submit REAP</th>
													<th>Submit Terminal Report</th>
													<th>Attachment</th>
												</tr>
											</thead>

											<tbody>

													<style>
														.blinking{
																animation:blinkingText 1.2s infinite;
															}
															@keyframes blinkingText{
																0%{     color: #000;    }
																49%{    color: #000; }
																60%{    color: transparent; }
																99%{    color:transparent;  }
																100%{   color: #000;    }
															}
													</style>
												<?php
													$numrow = 0;
													foreach($list_of_trainings_inv_local as $row){
													$numrow = $numrow+1;

													//URL or File Path
													
													//TRAIL SHEET/ Program File
													if($row['trn_inv_file'] == null){
														$url_training_inv = '#';
														$disabled_inv = 'disabled';
													}
													else{
														$disabled_inv = ' ';
														$url_training_inv = base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/trails/'.$row['trn_inv_file'].'&zoom=auto';
													}

													//TESDA ORDER
													if($row['trn_tesda_order'] == null){
														$url_trn_tesda_order = '#';
														$disabled_ord = 'disabled';
													}
													else{
														$disabled_ord = ' ';
														$url_trn_tesda_order = base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/TESDAOrders/'.$row['trn_tesda_order'].'&zoom=auto';
													}
													
													
													//Agency Category
													if($row['trn_agn_category'] == 'National'){
														$trn_agn_category = 'National';
													}elseif($row['trn_agn_category'] == 'Foreign'){
														$trn_agn_category = 'Foreign';
													}elseif($row['trn_agn_category'] == 'Local'){
														$trn_agn_category = 'Local';
													}else{
														$trn_agn_category = 'Regional';
													}

													//With REAP
													if($row['trn_with_reap'] == null){
														$trn_with_reap = '<span class="badge bg-red badge-corner"><i class="fa fa-times"></i></span>';
													}else{
														$trn_with_reap = '<span class="badge bg-green badge-corner"><i class="fa fa-check"></i></span>';
													}

													//With TR
													if($row['trn_with_tr'] == null){
														$trn_with_tr = '<span class="badge bg-red badge-corner"><i class="fa fa-times"></i></span>';
													}else{
														$trn_with_tr = '<span class="badge bg-green badge-corner"><i class="fa fa-check"></i></span>';
													}

													//Deadline
													if (date('m/d/Y', strtotime($row['trn_deadline'])) < date("m/d/Y")){
														$trn_deadline = '<span class="badge bg-red badge-corner">'. $row['trn_deadline']. '</span>';
														$disabled_deadline = 'disabled';
													}else{
														$trn_deadline = '<span class="badge bg-green badge-corner blinking">'. $row['trn_deadline']. '</span>';
														$disabled_deadline = '';
													}
												?>	
												<!--Break-->

												<tr>
													<td><?= $numrow?></td>
													<td><?= $row['inv_trn_memo_mo']?></td>
													<td><?= $row['trn_spo_agency']?></td>
													<td><?= $trn_agn_category?></td>
													<td><?= $row['trn_title']?></td>
													<td><?= $row['trn_from_date']?></td>
													<td><?= $row['trn_to_date']?></td>
													<td><?= $row['trn_no_hours']?></td>
													<td><?= $row['trn_type']?></td>
													<td><?= $row['trn_venue']?></td>
													<td><?= $trn_deadline?></td>
													<td><?= $trn_with_reap ?></td>
													<td><?= $trn_with_tr ?></td>
													<td>
														<button data-toggle="dropdown" type="button" class="btn btn-outline-primary dropdown-toggle btn-sm"><i class="fa fa-paperclip"></i> Attachment(s) 
														</button>
															<div class="dropdown-menu">
																<a class="dropdown-item <?= $disabled_inv ?>" href="<?= $url_training_inv ?>" target="_blank"><i class="fa fa-sticky-note-o"> </i> Memorandum/ Program File</a>
																<a href="<?= $url_trn_tesda_order ?>" class="dropdown-item <?= $disabled_ord ?>" target="_blank"><i class="fa fa-sticky-note-o"> </i> TESDA Order</a>
																<div class="dropdown-divider"></div>
																<a href="#" class="dropdown-item addAttr" data-trn_qualification="<?= $row['trn_qualification']?>" data-trn_title="<?= $row['trn_title']?>" data-toggle="modal" data-target="#qualification"><i class="fa fa-sticky-note-o"> </i> Qualifications</a>
															</div> 
													</td>
												</tr>

												

												<!--Break-->
												<?php
													}// End of foreach
												?>
											</tbody>				
										</table>
																	
						</div>
					</div>		
			</div> <!-- End of card-->
		</div>	<!--End of col-lg-12 mt-3-->

			<script type="text/javascript">
				const change_url1 = () => {
					var yearx = $('#yearxx option:selected').val();
					$("a.filter").attr('href', "<?= base_url()?>list_of_training_inv_local/" + yearx);
					};
			</script>

			<script>
				//Qualifications
				$('.addAttr').click(function() {
				var trn_qualification = $(this).data('trn_qualification');
				var trn_title = $(this).data('trn_title');
				      
				$('#trn_qualification').html(trn_qualification);
				$('#trn_title').text(trn_title);  	
				} );

				//Delete
				$('.addAttrDelete').click(function() {
				var inv_trn_id = $(this).data('inv_trn_id');
				var trn_inv_file = $(this).data('trn_inv_file');
				var trn_tesda_order = $(this).data('trn_tesda_order');
				      
				$('#inv_trn_id').val(inv_trn_id);
				$('#trn_inv_file').val(trn_inv_file);
				$('#trn_tesda_order').val(trn_tesda_order);
				} );

				//Upload
				$('.addAttrUpload').click(function() {
				var inv_trn_id_u = $(this).data('inv_trn_id_u');
				      
				$('#inv_trn_id_u').val(inv_trn_id_u);
				} );

			</script>

												<!-- Modal Qualifications -->
												<div class="modal fade delete" id="qualification" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
													<div class="modal-dialog modal-md" role="document">
													
														<div class="modal-content">
															<div class="modal-header">
																<h3 class="modal-title"><i class="fa fa-sticky-note-o"></i> <span id="trn_title"></span> </h3>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
																</button>
															</div>
															
															<div class="modal-body">
																<h5>Qualification/s:</h5>
																<p id="trn_qualification"></p>
															</div>
														</div>
													</div>
												</div>
												<!-- End Modal -->

												<!-- Modal Delete -->
											<div class="modal fade delete" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
												<div class="modal-dialog" role="document">
												
													<div class="modal-content">
													<div class="modal-header">
														<h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-exclamation-triangle"></i> Warning</h3>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
														</button>
													</div>
													
													<div class="modal-body text-center">
														<?= form_open('delete_inv_training'); ?>
															<h4>Are you sure you want to delete?</h4>
															<input id="inv_trn_id" type="hidden" name="inv_trn_id" >
															<input id="trn_inv_file" type="hidden" name="trn_inv_file" >
															<input id="trn_tesda_order" type="hidden" name="trn_tesda_order" >
															<input type="hidden" name="year" value="<?= $year ?>">
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

												<!--Modal Edit-->
													<!--Edit Categories-->
													<div class="modal fade delete " id="upload" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
														<div class="modal-dialog modal-md" role="document">	
															<div class="modal-content">

																<div class="modal-header">
																	<h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-upload"></i> Upload TESDA Order</h3>
																		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																			<span aria-hidden="true">&times;</span>
																		</button>
																</div>

																<div class="modal-body text-center no-padding">
																	<?= form_open_multipart('upload_tesda_order'); ?>
																		<input id="inv_trn_id_u" type="hidden" name="inv_trn_id_u">
																		<input type="hidden" name="year" value="<?= $year ?>">
																		<!--Start Description-->
																		<div class="row form-group" style="padding-top:15px;padding-left:30px;padding-right:30px;">
																			<input class="filestyle" data-buttonBefore="true" data-text="Browse file" data-badge="true" data-badgeName="badge-danger" data-placeholder="Please select only pdf file." type='file' name='TESDA_Order' accept="application/pdf" required>
																	</div>
																</div>
																							
																<div class="modal-footer">
																	<div class="btn-group">
																		<button id="editexhibitsubmit" type="submit" value='Upload' name='uploadTESDAOrder' class="btn btn-danger">Submit</button>
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
                    							<!--End Modal Edit-->
			
		
		<!--Message Box-->
		
		<?php if($this->session->flashdata('add_exhibits')) : ?>

		<div class="toast" data-autohide="false" style="position: absolute; top: 150px; right: 20px; min-width: 300px;">
			<div class="toast-header bg-red">
				<strong class="mr-auto"><i class="fa fa-bullhorn"></i> System Message</strong>
				<button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
			</div>
			<div class="toast-body">
				<?= $this->session->flashdata('add_exhibits'); ?>
			</div>
		</div>
		<?php $this->session->unset_userdata('add_exhibits'); endif;?>
		
	<?php }?>
<?php }else{
redirect (base_url());
}?>
