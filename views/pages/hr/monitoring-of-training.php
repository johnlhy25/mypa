<!--For Auditors-->
<?php
if($this->session->ous_id == 16){
    $disabled = "disabled-link";
}else{
    $disabled = " ";
}
?>
<style>
.disabled-link{
    pointer-events: none;
    cursor: not-allowed;
    opacity: .65;
}

</style>
<!--For Auditors-->

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

	
		<!-- Search Modal-->
		<?php require_once('search-modal.php'); ?>
		
		<div class="col-lg-12 mt-3">
			<div class="card">

				<div class="card-close">
					<div class="dropdown">
						<button type="button" id="closeCard3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
								<div aria-labelledby="closeCard3" class="dropdown-menu dropdown-menu-right has-shadow">
									<?php if( $this->session->role == 'Super Admin'){ ?>
										<a data-toggle="modal" href="#add" class="dropdown-item edit <?= $disabled ?>"> <i class="fa fa-plus"></i> Add </a>
									<?php }0 ?>	
									<a href="" class="dropdown-item edit"> <i class="fa fa-print"></i> Print (Under Dev't)</a>
								</div>
					</div>
				</div>

				<!--Count-->
				
				
				<div class="card-header d-flex align-items-center">
					<h1> <span class="badge bg-blue badge-corner"><i class="fa fa-desktop" aria-hidden="true"></i></span> Monitoring of Training Program Invitations / Attendance to Training (FY <?= $year?>)</h1>
				</div>
					<div class="card-body">
						
							<div class="row">
								<div class="col-md-8"> 
								<small>
									<b>Legend:</b><br>
									Deadline of Submission: <span class="badge badge-corner" style="background-color:#00695C; color:white">Open</span> | <span class="badge bg-red badge-corner">Lapsed</span><br>
									For Action: <span class="badge badge-corner" style="background-color:#00695C; color:white">Acted</span> | <span class="badge bg-red badge-corner">Pending</span> 
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
													$lastYear = (int)date('Y')+3;
													for($i=$lastYear;$i>=$firstYear;$i--) { 
												?>
											<option value="<?= $i;?>"><?= $i;?></option>
											<!--End of Year-->  
											<?php } ?>	
											</select>
										</div>
								</div>		
							</div><!--End of row-->

							<style>
								.blinkingth{
									animation:blinkingText 0.5s infinite;
								}
								@keyframes blinkingText{
									0%{     color: #FAFAFA;    }
									49%{    color: #FAFAFA; }
									60%{    color: transparent; }
									99%{    color:transparent;  }
									100%{   color: #EEEEEE;    }
								}

								.blinkingaction{
									animation:blinkingTextAction 2s infinite;
								}
								@keyframes blinkingTextAction{
									0%{     color: #FAFAFA;    }
									49%{    color: #FAFAFA; }
									60%{    color: transparent; }
									99%{    color:transparent;  }
									100%{   color: #EEEEEE;    }
								}

								.blinkingous{
									animation:blinkingTextOUs 2.5s infinite;
								}
								@keyframes blinkingTextOUs{
									0%{     color: #FAFAFA;    }
									49%{    color: #FAFAFA; }
									60%{    color: transparent; }
									99%{    color:transparent;  }
									100%{   color: #EEEEEE;    }
								}
							</style>
							
					
						<div class="table-responsive mt-2">   
							<table id="listofinv" class="table table-striped table-hover">
								<thead>
									<tr>
										
										<th>#</th>
										<th>Reference No.</th>
										<th>For Action <span class="badge badge-corner blinkingth" style="background-color:#BF360C; color:white"><b><i class="fa fa-exclamation-circle" aria-hidden="true"></i></span></th>
										<th>Sponsoring Agency</th>
										<th>Agency Category</th>
										<th>Title of Learning and Development(L&D) </th>
										<th>From (Date)</th>
										<th>To (Date)</th>
										<th>No. of Hours</th>
										<th>Type of L&D</th>
										<th>Venue</th>
										<th>Deadline of Submission</th>
										<th>Document to Submit</th>
										<th>Attachment</th>
										<th>Actions</th>
									</tr>
								</thead>

								<tbody>

									<?php
										$numrow = 0;
										foreach($list_of_trainings_inv as $row){
										$doc_to_submit = '';
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

										//Endorsement
										if($row['trn_memo_endorsement'] == null){
											$url_endorsement_inv = '#';
											$disabled_end = 'disabled';
										}
										else{
											$disabled_end = ' ';
											$url_endorsement_inv = base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/TESDAOrders/'.$row['trn_memo_endorsement'].'&zoom=auto';
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
										}else{
											$doc_to_submit1 = 'To submit Re-Entry Action Plan';
										}

										//With TR
										if($row['trn_with_tr'] == null){
										}else{
											$doc_to_submit1 = 'To submit Terminal Report';
										}

										//With Output
										if($row['trn_output'] == null){
											$doc_to_submit = '<span class="badge bg-warning badge-corner"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> '.$doc_to_submit1 .'</span>';
										}else{
											$doc_to_submit = '<span class="badge bg-warning badge-corner"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> '.$doc_to_submit1 .'<br> '. $row['trn_others'] .'</span>';
										}

										if($row['trn_output'] == null && $row['trn_with_reap'] == null && $row['trn_with_tr'] == null){
											$doc_to_submit = '<span class="badge bg-red badge-corner"><i class="fa fa-times-circle" aria-hidden="true"></i> Not Applicable</span>';
										}else{
											$doc_to_submit = $doc_to_submit;
										}

										//Deadline
										if (date('m/d/Y', strtotime($row['trn_deadline'])) < date("m/d/Y")){
											$trn_deadline = '<span class="badge bg-red badge-corner"><i class="fa fa-calendar" aria-hidden="true"></i> '. $row['trn_deadline']. '</span>';
											$disabled_deadline = 'disabled';
											//$disabled_deadline = '';
										}else{
											if($row['trn_deadline'] == '0000-00-00'){
												if($row['trn_tmpr'] == '1'){
													$trn_deadline = '<span class="badge badge-corner" style="background-color:#00695C; color:white"><i class="fa fa-calendar" aria-hidden="true"></i> Not Applicable </span>';
												}else{
													$trn_deadline = '<span class="badge badge-corner" style="background-color:#00695C; color:white"><i class="fa fa-calendar" aria-hidden="true"></i> No Deadline </span>';
												}	
											}else{
												$trn_deadline = '<span class="badge badge-corner" style="background-color:#00695C; color:white"><i class="fa fa-calendar" aria-hidden="true"></i> '. $row['trn_deadline']. '</span>';
											}
											
											$disabled_deadline = '';
										}

										//trap TPMR
										if($row['trn_tmpr'] == '1'){
											if ($row['trn_invitation'] == 'Invitation'){
												$trn_tmpr = 'disabled';
												$type = '<b><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Invitation (Included in TPMR)</b>';
											}else{
												$trn_tmpr = 'disabled';
												$type = '<b><i class="fa fa-file-pdf-o" aria-hidden="true"></i> TESDA Order</b>';
											}
										}else{
											$trn_tmpr = '';
											$type = '<b><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Invitation</b>';
										}
										
										if($trn_tmpr == 'disabled' or $disabled_deadline == 'disabled'){
											$disabled_lock = 'disabled'; 
										}else{
											$disabled_lock = '';
										}
																
									?>	
									<!--Break-->

									<tr>
										<td><?= $numrow?></td>
										<td><?= strtoupper($row['inv_trn_memo_mo'])?></td>
										<td> <?= $type ?>
											<?php if($row['ous_desc_x'] == null) {} else{?>
												<?php if($row['trn_tmpr'] == '1'){?>
													<span class="badge badge-corner" style="background-color:#BF360C; color:white"><b><i class="fa fa-exclamation-circle blinkingaction" aria-hidden="true"></i> Action needed: To confirm the attendance<br> [Note: The default status is "Did not attend"].<b></span>
												<?php } else{ ?>
													<span class="badge badge-corner" style="background-color:#BF360C; color:white"><b><i class="fa fa-exclamation-circle blinkingaction" aria-hidden="true"></i> Action needed: To nominate and<br> upload memorandum re: nomination<b></span>
												<?php } ?>
											<?php } ?>
											
											<?php foreach($row['ous_desc_x'] as $xrow) { ?>
												<?php if($row['trn_tmpr'] == '1'){?>
													<span class="badge badge-corner" style="background-color:#00695C; color:white"><?= $xrow['ous_desc']?></span>
												<?php } else{ ?>
													<?php if ($xrow['act_status'] == null){?>
													<span class="badge bg-red badge-corner"> <i class="fa fa-times-circle blinkingous" aria-hidden="true"></i> <?= $xrow['ous_desc']?></span> 
													<?php } else{ ?>
													<span class="badge badge-corner" style="background-color:#00695C; color:white"><i class="fa fa-check-circle" aria-hidden="true"></i> <?= $xrow['ous_desc']?></span>
													<?php } ?>
												<?php } ?>
											<?php } ?>
										</td>
										<td><?= strtoupper($row['trn_spo_agency'])?></td>
										<td><?= strtoupper($trn_agn_category)?></td>
										<td><?= strtoupper($row['trn_title'])?></td>
										<td><?= $row['trn_from_date']?></td>
										<td><?= $row['trn_to_date']?></td>
										<td><?= $row['trn_no_hours']?></td>
										<td><?= strtoupper($row['trn_type'])?></td>
										<td><?= strtoupper($row['trn_venue'])?></td>
										<td><?= $trn_deadline?></td>
										<td><?= $doc_to_submit ?></td>
										<td>
											<button data-toggle="dropdown" type="button" class="btn btn-outline-primary dropdown-toggle btn-sm"><i class="fa fa-paperclip"></i> Attachment(s) 
											</button>
												<div class="dropdown-menu">
													<?php if($row['trn_tmpr'] == '1'){?>
														<a class="dropdown-item <?= $disabled_inv ?>" href="<?= $url_training_inv ?>" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> TESDA Order re: Attendance</a>
													<?php } else{ ?>
														<a class="dropdown-item <?= $disabled_inv ?>" href="<?= $url_training_inv ?>" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Memo re: Invitation</a>
													<?php } ?>
													
													<a href="<?= $url_endorsement_inv ?>" class="dropdown-item <?= $disabled_end ?>" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Memo re: Endorsement</a>
													<div class="dropdown-divider"></div>
													<a href="#" class="dropdown-item addAttr" data-trn_qualification="<?= $row['trn_qualification']?>" data-trn_title="<?= $row['trn_title']?>" data-toggle="modal" data-target="#qualification"><i class="fa fa-question-circle-o" aria-hidden="true"></i> Qualifications</a>
												</div> 
										</td>

										<td>
											<button data-toggle="dropdown" type="button" class="btn btn-outline-primary dropdown-toggle btn-sm <?= $disabled ?>"><i class="fa fa-tasks"></i> Actions 
											</button>
												<div class="dropdown-menu">
													<?php if( $this->session->role == 'Super Admin'){ ?>
														<a href="#" class="dropdown-item editAttr" data-toggle="modal" data-target="#edit" data-inv_trn_id1="<?= $row['inv_trn_id']?>" data-inv_memo_no="<?= $row['inv_trn_memo_mo']?>" data-trn_spo_agency="<?= $row['trn_spo_agency']?>" data-trn_title="<?= $row['trn_title']?>" data-trn_from_date="<?= $row['trn_from_date']?>" data-trn_to_date="<?= $row['trn_to_date']?>" data-trn_no_hours="<?= $row['trn_no_hours']?>" data-trn_deadline="<?= $row['trn_deadline']?>" data-trn_venue="<?= $row['trn_venue']?>" data-trn_with_reapx="<?= $row['trn_with_reap']?>" data-trn_with_trx="<?= $row['trn_with_tr']?>" data-trn_trail_no="<?= $row['trn_trail_no']?>" data-trn_agn_category="<?= $row['trn_agn_category']?>" data-trn_type="<?= $row['trn_type']?>" data-trn_tmpr="<?= $row['trn_tmpr']?>" data-trn_output="<?= $row['trn_output']?>" data-trn_others = "<?= $row['trn_others']?>" data-trn_subject="<?= $row['trn_subject']; ?>" > <i class="fa fa-edit"> </i> Edit</a>
														<a href="#" class="dropdown-item addAttrDelete" data-toggle="modal" data-target="#delete" data-inv_trn_id="<?= $row['inv_trn_id']?>" data-trn_tesda_order="<?= $row['trn_tesda_order']?>" data-trn_inv_file="<?= $row['trn_inv_file']?>"><i class="fa fa-trash"> </i> Delete</a>
														<div class="dropdown-divider"></div>
														<?php if($row['trn_tmpr'] == '1'){?>
															<a href="<?= base_url();?>add_nominee/<?= $year ?>-<?= $row['inv_trn_id'] ?>-<?= $row['inv_trn_memo_mo'] ?>" class="dropdown-item"><i class="fa fa-user-plus" aria-hidden="true"></i> Add Attenee/s</a>
														<?php } else{ ?>	
															<a href="<?= base_url();?>add_nominee/<?= $year ?>-<?= $row['inv_trn_id'] ?>-<?= $row['inv_trn_memo_mo'] ?>" class="dropdown-item"><i class="fa fa-user-plus" aria-hidden="true"></i> Add Nominee/s</a>
														<?php } ?>	
													<?php }elseif ( $this->session->role == 'Admin'){ ?>
														<?php if($row['trn_tmpr'] == '1'){?>
															<a href="<?= base_url();?>add_nominee/<?= $year ?>-<?= $row['inv_trn_id'] ?>-<?= $row['inv_trn_memo_mo'] ?>" class="dropdown-item <?= $disabled_lock;?> "><i class="fa fa-user-plus" aria-hidden="true"></i> Add Attenee/s</a>
														<?php } else{ ?>	
															<a href="<?= base_url();?>add_nominee/<?= $year ?>-<?= $row['inv_trn_id'] ?>-<?= $row['inv_trn_memo_mo'] ?>" class="dropdown-item <?= $disabled_lock;?> "><i class="fa fa-user-plus" aria-hidden="true"></i> Add Nominee/s</a>
														<?php } ?>	
													<?php } ?>
														<?php if($row['trn_tmpr'] == '1'){?>
															<a href="<?= base_url();?>view_nominee/<?= $year ?>-<?= $row['inv_trn_id'] ?>-<?= $row['inv_trn_memo_mo'] ?>" class="dropdown-item"><i class="fa fa-users" aria-hidden="true"></i> View Attendee/s</a>
														<?php } else{ ?>	
															<a href="<?= base_url();?>view_nominee/<?= $year ?>-<?= $row['inv_trn_id'] ?>-<?= $row['inv_trn_memo_mo'] ?>" class="dropdown-item"><i class="fa fa-users" aria-hidden="true"></i> View Nominee/s</a>
														<?php } ?>
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
						<h4>Are you sure you want to delete this record?</h4>
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

			<!--Modal Attendance-->
			<div class="modal fade delete " id="upload" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-md" role="document">	
					<div class="modal-content">

						<div class="modal-header">
							<h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-upload"></i> Upload Memo re: Attendance</h3>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
						</div>

						<div class="modal-body no-padding">
							<?= form_open_multipart('upload_tesda_order'); ?>
								<input id="inv_trn_id_u" type="hidden" name="inv_trn_id_u">
								<input type="hidden" name="year" value="<?= $year ?>">
								
							

								<div id="accordion">
									<div class="card no-margin-bottom no-padding-bottom">
									<div class="card-header">
										<a class="card-link" data-toggle="collapse" href="#collapseOne">
										Memorandum
										</a>
									</div>
									<div id="collapseOne" class="collapse show" data-parent="#accordion">
										<div class="card-body">
											<!--Start Description-->
											<div class="row form-group" style="padding-top:5px;padding-right:30px;padding-left:30px">
													<label class="control-label pull-left"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> <b>Document No: | <a data-toggle="tooltip" data-placement="top" title="To be included in Training Program Monitoring Report Form"> TPMR? </a> &nbsp<input type="checkbox" value="1" name="trn_tpmr"></b></label>
													<input type="text" class="form-control" name="attendance_memo_no" required>
											</div>

											<div class="row form-group" style="padding-top:2px;padding-left:30px;padding-right:45px;">
												<input class="filestyle" data-buttonBefore="true" data-text="Browse file" data-badge="true" data-badgeName="badge-danger" data-placeholder="Please select only pdf file." type='file' name='TESDA_Order' accept="application/pdf" required>
											</div>
										</div>
									</div>
									</div>

									<div class="card no-margin-top no-margin-bottom no-padding-bottom">
										<div class="card-header">
											<a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
												<i class="fa fa-paper-plane-o" aria-hidden="true"></i> <b>SEND TO:</b> (Operating Units)
											</a>
										</div>
										<div id="collapseTwo" class="collapse" data-parent="#accordion">
											<div class="card-body">
												<input type="checkbox" id="chkSelectAll"><b> Select all</b>
													<div id="ous" class="list-group">
														<?php foreach($ous_email as $row) {?>
															<a class="list-group-item list-group-item-action pull-left "><input class="chkDel" type="checkbox" name="po_email[]" value="<?= $row['ous_email']?>-<?= $row['ous_hrfocal_email']?>"> <?= $row['ous_desc']?> </a>
														<?php }?>	
													</div>	
											</div>
										</div>
									</div>
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
			<!--End Modal Attendance-->


			<!--Edit Invitation-->
			<div class="modal fade delete" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-xl" role="document">	
					<div class="modal-content">

						<div class="modal-header">
							<h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-edit"></i> Edit <a data-toggle="tooltip" data-placement="top" title="Edit Memo re: Training Invitation | TESDA Order re: Attendnace to Training | Office Order re: Attendnace to Training"><i class="fa fa-info-circle" aria-hidden="true"></i></a></h3>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
						</div>

						<div class="modal-body">
							<?= form_open_multipart('edit_training_inv'); ?>

							<div class="row">
								<div class="col-sm-6 " >
									<input type="hidden" name="year" value="<?= $year?>">
									<input type="hidden" id="inv_trn_id1" name="inv_trn_id1" val="">
									
									<!--Start Description-->

									<div class="row form-group">
										<div class="col-sm-4">
											<label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-search-plus" aria-hidden="true"></i> <b>Reference No.:</b></label>
										</div>
										<div class="col-sm-8">
										<input type="text"  class="form-control" id="inv_memo_no" name="inv_memo_no" readonly>
										</div>
									</div>

									<div class="row form-group">
										<div class="col-sm-4">
											<label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-institution"></i> <b>Sponsoring Agency:</b></label>
										</div>
										<div class="col-sm-8">
											<textarea class="form-control" rows="2" id="trn_spo_agency" name="spo_agency" placeholder="Japan International Cooperation Agency"></textarea>
										</div>
									</div>

									<div class="row form-group">
										<div class="col-sm-4">
											<label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-institution"></i> <b> Agency Category:</b></label>
										</div>
										<div class="col-sm-8">
											<select class="form-control" id="trn_agn_category" name="agn_category">
												<option value="Foreign">Foreign</option>
												<option value="National">National (Central Office)</option>
												<option value="Local">Local (CSC, DBM, etc.)</option>
												<option value="Regional">Regional Office Initiated Programs</option>
											</select>
										</div>
									</div>

									<div class="row form-group">
										<div class="col-sm-4">
											<label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-leanpub" aria-hidden="true"></i> <b>Subject:</b></label>
										</div>
										<div class="col-sm-8">
											<textarea class="form-control" rows="3" id="trn_subject" name="trn_subject" placeholder="Attendance to the Strengthening Safety Management System of Agricultural Products"></textarea>
										</div>
									</div>

									<div class="row form-group">
										<div class="col-sm-4">
											<label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-graduation-cap" aria-hidden="true"></i> <b>Title of Learning and Development (LD):</b></label>
										</div>
										<div class="col-sm-8">
											<textarea class="form-control" rows="3" id="title_LD" name="title_LD" placeholder="Strengthening Safety Management System of Agricultural Products"></textarea>
										</div>
									</div>


									<div class="row form-group">
										<div class="col-sm-4">
											<label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-calendar"></i><b> From (Date): </b></label>
										</div>
										<div class="col-sm-8">
											<input id="trn_from_date" type="date" class="form-control" name="date_from">
										</div>
									</div>

									<div class="row form-group">
										<div class="col-sm-4">
											<label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-calendar"></i> <b>To (Date): </b></label>
										</div>
										<div class="col-sm-8">
											<input id="trn_to_date" type="date" class="form-control" name="date_to" onchange="getDays()">
										</div>
									</div>

									<div class="row form-group">
										<div class="col-sm-4">
											<label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-clock-o" aria-hidden="true"></i><b> No. of Hours:</b></label>
										</div>
										<div class="col-sm-8">
											<input id="trn_no_hours" type="number" min="1" class="form-control" name="no_hours">
										</div>
									</div>

									<div class="row form-group">
										<div class="col-sm-4">
											<label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-graduation-cap" aria-hidden="true"></i>  <b>Type of LD:</b></label>
										</div>
										<div class="col-sm-8">
											<select class="form-control" id="trn_type" name="type_LD">
												<option value="Administrative">Administrative</option>
												<option value="Leadership">Leadership</option>
												<option value="Managerial">Managerial</option>
												<option value="Supervisory">Supervisory</option>
												<option value="Technical">Technical</option>
											</select>
										</div>
									</div>

									<div class="row form-group">
										<div class="col-sm-4">
											<label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-calendar"></i> <b>Deadline of Submission:</b></label>
										</div>
										<div class="col-sm-8">
											<input type="date" class="form-control" id="trn_deadline" name="date_deadline">
										</div>
									</div>

									<div class="row form-group terms-conditions">
										<div class="col-sm-12">
											<div class="form-check">
											<label class="form-check-label" for="defaultCheck0"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> <b>Document/s to submit</b></label>
											</div>
											<div class="form-check mt-2">
											<input class="checkbox-template" id="trn_with_reapx" type="checkbox" value="1" name="reap">
											<label class="form-check-label" for="defaultCheck0"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> <b>Re-Entry Action Plan</b></label>
											</div>
											<div class="form-check">
											<input class="checkbox-template" id="trn_with_trx" type="checkbox" value="1" name="TR">
											<label class="form-check-label" for="defaultCheck1"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> <b>Terminal Report</b> </label>
											</div>
											<div class="form-check">
											<input id="trn_output" class="checkbox-template trn_output"  type="checkbox" value="1" name="trn_output">
											<label class="form-check-label" for="defaultCheck2"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> <b>Workshop Output, etc.</b> </label>
											</div>
											<div class="form-check">
												<textarea id="trn_others" name="trn_others" class="form-control trn_others" rows="3" placeholder="and Workshop Output" disabled></textarea>
											</div>
										</div>
									</div>

								</div><!--End of Col-SM-8-->

								<div class="col-sm-6">

									<div class="row form-group" style="padding-right:15px;">
										<label class="control-label pull-left" style="position:relative;"><i class="fa fa-bookmark-o" aria-hidden="true"></i> <b>Qualifications:</b></label>
										<textarea id="trn_qualificationx" name="qualifications" value="" class="mytextarea"></textarea>
									</div>

									<div class="row form-group" style="padding-right:15px;">
										<label class="control-label pull-left" style="position:relative;"><i class="fa fa-map-marker"></i> <b>Training Venue</b></label>
										<input type="text" class="form-control" id="trn_venue" name="venue" placeholder="Virtual, Tuguegarao City">
									</div>

									<div class="row form-group" style="padding-right:15px;">
									<p class="control-label pull-left" style="position:relative;">Document Type: <b> <a data-toggle="tooltip" data-placement="top" title="Memo re: Training Inviation">Memo</a> &nbsp<input type="radio" name="optradio1" value="1" required> | <a data-toggle="tooltip" data-placement="top" title="TESDA Order re: Attendance"> TESDA Order </a>&nbsp <input type="radio" name="optradio1" value="2"> | <a data-toggle="tooltip" data-placement="top" title="Office Order re: Attendance"> Office Order </a>&nbsp<input type="radio" value="3" name="optradio1" disabled> </b> <br>Classification: <b> <i class="fa fa-check"></i> <a data-toggle="tooltip" data-placement="top" title="To be included in Training Program Monitoring Report Form"> TPMR? </a> &nbsp<input type="radio" value="1" id="trn_tpmr" name="trn_tpmr" required> | <i class="fa fa-file-word-o" aria-hidden="true"></i> <a data-toggle="tooltip" data-placement="top" title="Training Invitations"> Invitation? </a> &nbsp<input type="radio" value="2" id="trn_tpmr1" name="trn_tpmr"></b> <br> <i class="fa fa-file-pdf-o" aria-hidden="true"></i> <b>Document No:</b></p> 
										<input type="text" class="form-control" id="trn_trail_no" name="train_no" placeholder="0325 s. 2022">
									</div>

									<div class="row form-group" style="padding-right:15px;">
										<label class="control-label pull-left" style="position:relative;"><i class="fa fa-paperclip" aria-hidden="true"></i> <b>Attachment (e.g. Memo, TESDA Order, etc.)</b></label>
										<input class="filestyle" data-buttonBefore="true" data-text="Browse file" data-badge="true" data-badgeName="badge-danger" data-placeholder="Please select only pdf file." type='file' name='trail' accept="application/pdf">	
										<small>Leave <b>blank</b> if you do not want to change the current file.</small>						
									</div>

									<div id="accordion" style="padding-right:15px;">
										<div class="card no-margin-top no-margin-bottom no-padding-bottom">
											<div class="card-header">
												<a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
												<i class="fa fa-paper-plane-o" aria-hidden="true"></i> <b>SEND TO:</b> (Operating Units)
												</a>
											</div>

											<div id="collapseTwo" class="collapse" data-parent="#accordion">
												<div class="card-body">

												<div class="row form-group">
													<label class="control-label pull-left" style="position:relative;"><i class="fa fa-commenting-o" aria-hidden="true"></i><b>Additional Message:</b></label>
													<textarea name="add_message" rows="4" class="form-control"></textarea>
												</div>

													<input type="checkbox" id="chkSelectAllInv"><b> Select all</b>
														<div id="ous" class="list-group">
															<?php foreach($ous_email as $row) {?>
																<a class="list-group-item list-group-item-action pull-left "><input class="chkDelInv" type="checkbox" name="po_email_inv[]" value="<?= $row['ous_email']?>-<?= $row['ous_hrfocal_email']?>-<?= $row['ous_id']?>"> <?= $row['ous_desc']?> </a>
															<?php }?>	
														</div>	
												</div>
											</div>
										</div>
									</div>
								</div><!--End of Col-SM-4-->
							</div><!--End of row-->
						</div><!-- Modal Body-->
															
													
						<div class="modal-footer">
							<div class="btn-group">
								<button id="addexhibitsubmit" type="submit" value='Upload' name='upload' class="btn btn-danger"> <i class="fa fa-floppy-o"></i> Submit </button>
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>	
							</div>

							<div id="addexhibitloading" class="spinner-grow text-primary" style="display: none;" role="status">
								<span class="sr-only">Loading... </span>
							</div>	
						</div>

						</form>						
					</div>
				</div>
			</div>
			<!-- End Modal -->

			<script>
			//get the days between two dates
			function getDays(){
			
				var start_date = new Date(document.getElementById('date_from').value);
				var end_date = new Date(document.getElementById('date_to').value);
				//Here we will use getTime() function to get the time difference
				var time_difference = end_date.getTime() - start_date.getTime();
				//Here we will divide the above time difference by the no of miliseconds in a day
				var days_difference = time_difference / (1000*3600*24);
				//alert(days_difference);
				document.getElementById('no_hours').value = (days_difference * 8) + 8;
			}
			</script>

			<script type="text/javascript">
				const change_url1 = () => {
					var yearx = $('#yearxx option:selected').val();
					$("a.filter").attr('href', "<?= base_url()?>list_of_training_inv/" + yearx);
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

				//Edit
				$('.editAttr').click(function() {
					
				var inv_trn_id1 = $(this).data('inv_trn_id1');
				var inv_memo_no = $(this).data('inv_memo_no');
				var trn_spo_agency = $(this).data('trn_spo_agency');
				var trn_title = $(this).data('trn_title');
				var trn_from_date = $(this).data('trn_from_date');
				var trn_to_date = $(this).data('trn_to_date');
				var trn_no_hours = $(this).data('trn_no_hours');
				var trn_deadline = $(this).data('trn_deadline');
				var trn_venue = $(this).data('trn_venue');
				var trn_qualification = $(this).data('trn_qualification');
				var trn_with_reapx = $(this).data('trn_with_reapx');
				var trn_with_trx = $(this).data('trn_with_trx');
				var trn_trail_no = $(this).data('trn_trail_no');
				var trn_agn_category = $(this).data('trn_agn_category');
				var trn_type = $(this).data('trn_type');
				var trn_tmpr = $(this).data('trn_tmpr');
				var trn_output = $(this).data('trn_output');
				var trn_others = $(this).data('trn_others');
				var trn_subject = $(this).data('trn_subject');
				
				$('#inv_trn_id1').val(inv_trn_id1);
				$('#inv_memo_no').val(inv_memo_no);
				$('#trn_spo_agency').val(trn_spo_agency);
				$('#title_LD').val(trn_title);
				$('#trn_from_date').val(trn_from_date);
				$('#trn_to_date').val(trn_to_date);
				$('#trn_no_hours').val(trn_no_hours);
				$('#trn_deadline').val(trn_deadline);
				$('#trn_venue').val(trn_venue);
				$('#trn_agn_category').val(trn_agn_category);
				$('#trn_type').val(trn_type);
				$('#trn_trail_no').val(trn_trail_no);
				$('#trn_subject').val(trn_subject);
				//$('#trn_tpmr').val(trn_tmpr);
				
				//reset checkbox
				$('#trn_with_reapx').prop('checked', false);
				$('#trn_with_trx').prop('checked', false);
				$('#trn_tpmr').prop('checked', false);
				$('#trn_tpmr1').prop('checked', false);
				$('#trn_output').prop('checked', false);
				$("#trn_others").attr("disabled", "disabled")

				if(trn_with_reapx){$('#trn_with_reapx').prop('checked', true);}
				if(trn_with_trx){$('#trn_with_trx').prop('checked', true);}
				if(trn_tmpr == 1){$('#trn_tpmr').prop('checked', true);}
				if(trn_tmpr == 2){$('#trn_tpmr1').prop('checked', true);}
				if(trn_output){$('#trn_output').prop('checked', true);$("#trn_others").removeAttr("disabled");$('#trn_others').val(trn_others)}

				} );


				//Upload
				$('.addAttrUpload').click(function() {
				var inv_trn_id_u = $(this).data('inv_trn_id_u');
				      
				$('#inv_trn_id_u').val(inv_trn_id_u);
				} );

				$("#trn_output").click(function () {
				if ($("#trn_output").is(":checked")) {
					$("#trn_others")
						.removeAttr("disabled")
				}
				else {
					$("#trn_others")
						.attr("disabled", "disabled")
					
				}
				} );
			

			</script>

			<!--Edit End-->
		
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
