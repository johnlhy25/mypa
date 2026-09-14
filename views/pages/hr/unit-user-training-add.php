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
									<a data-toggle="modal" href="#add" class="dropdown-item edit"> <i class="fa fa-plus"></i>Add Training</a>
									<a href="" class="dropdown-item edit" onclick="exportTableToExcel('tblData', 'Trainings-of-<?= $this->session->name ?>')"> <i class="fa fa-file-excel-o"></i>Download Excel</a>
									<a href="<?= base_url()?>zip_download_per_employee/" class="dropdown-item edit"> <i class="fa fa-file-zip-o"></i>Download Zip</a>
									<a href="<?= base_url()?>print_hr_training_user" target="_blank" class="dropdown-item edit"> <i class="fa fa-print"></i>Print All</a> 
									
								</div>
					</div>
				</div>

				<!--Count-->
				
				
				<div class="card-header d-flex align-items-center">
					<h1> List of Learning and Development Interventions/Training Programs</h1>
				</div>
					<div class="card-body">
						<div class="table-responsive">   

										<table id="parameters" class="table table-striped table-hover">
											<thead>
												<tr>
													<th>#</th>
													<th>Title of Learning and Development(LD) </th>
													<th>From (Date)</th>
													<th>To (Date)</th>
													<th>No. of Hours</th>
													<th>Type of LD</th>
													<th>Conducted/ Sponsored By</th>
													<th>Status/ Document to Submit</th>
													<th>Attachment(s)</th>
													<th>Actions</th>
												</tr>
											</thead>

											<tbody>

											<?php
												$numrow = 0;

												foreach($list_of_trainings_user as $row){
													$count_attachment = 0;
													$url_cot = base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/trainings/'.$row['trn_cot'].'&zoom=page';
													$url_cot1 = 'uploads/trainings/'.$row['trn_cot'];
													$url_reap = base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/trainings/'.$row['trn_reap'].'&zoom=auto';
													$url_reap1 = 'uploads/trainings/'.$row['trn_reap'];
													$url_tdorf = base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/trainings/'.$row['trn_tdorf'].'&zoom=auto';
													$url_tdorf1 = 'uploads/trainings/'.$row['trn_tdorf'];
													
													$numrow += 1 ;

													if($row['trn_reap'] == null){
														$disabled_reap = 'disabled';
													}else{
														$disabled_reap = '';
														$count_attachment = $count_attachment+1;
													}

													if($row['trn_tdorf'] == null){
														$disabled_tdorf = 'disabled';
													}else{
														$disabled_tdorf = '';
														$count_attachment = $count_attachment+1;
													}

													if($row['trn_cot'] == null){
														$disabled_cot = 'disabled';
													}else{
														$disabled_cot = '';
														$count_attachment = $count_attachment+1;
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

													//Status
													if($row['trn_status']=='NC'){
														if($row['trn_with_reap'] == '1'){
														  if($row['trn_remarks'] == 'Disapproved'){
															$status = '<span class="badge bg-red badge-corner blinking" ><i class="fa fa-exclamation-circle"> </i> Did not Attend </span>';
															$action = ' To submit Written Explanation for<br> non-attendance';
														  }else{
															$status = '<span class="badge bg-warning badge-corner" ><i class="fa fa-exclamation-circle"> </i> Not Completed </span>';
															$action = ' To submit Re-Entry Action Plan';
														  }
														}elseif ($row['trn_with_tr'] == '1'){
														  if($row['trn_remarks'] == 'Disapproved'){
															$status = '<span class="badge bg-red badge-corner blinking" ><i class="fa fa-exclamation-circle"> </i> Did not Attend </span>';
															$action = ' To submit Written Explanation for<br> non-attendance';
														  }else{
															$status = '<span class="badge bg-warning badge-corner" ><i class="fa fa-exclamation-circle"> </i> Not Completed </span>';
															$action = ' To submit Terminal Report';
														  }
														}else{
															$status = '<span class="badge bg-warning badge-corner" ><i class="fa fa-exclamation-circle"> </i> Not Completed </span>';
															$action = ' To submit Certificate of Completion<br>Training/Participation';
														}

													     //With Output
														if($row['trn_output'] == null){
															$doc_to_submit = $action;
														}else{
															$doc_to_submit = $action .'<br> '. $row['trn_others'] .'</span>';
														}

													}else{
													$status = 'Completed';
													$action = 'Completed';
													$doc_to_submit = $action;
													}

													//for tpmr report
														$training_title = $row['trn_learn_dev'];
														
														//Invitation to the
														$str_title_delimited = str_replace('Invitation to the', '', $training_title);
														if ($training_title == $str_title_delimited){
															$trim_title = '';
															goto a;
														}else{
															$trim_title = $str_title_delimited;
															goto end;
														}
														a:
														if ($training_title == $str_title_delimited){
															$trim_title = '';
															goto b;
														}else{
															$trim_title = $str_title_delimited;
															goto end;
														}
														b:
														$trim_title = $training_title;	

														//Invitation on the
														$str_title_delimited = str_replace('Invitation on the', '', $training_title);
														if ($training_title == $str_title_delimited){
															$trim_title = '';
															goto aa;
														}else{
															$trim_title = $str_title_delimited;
															goto end;
														}
														aa:
														if ($training_title == $str_title_delimited){
															$trim_title = '';
															goto bb;
														}else{
															$trim_title = $str_title_delimited;
															goto end;
														}
														bb:
														$trim_title = $training_title;	

														//Invitation from the
														$str_title_delimited = str_replace('Invitation from the', '', $training_title);
														if ($training_title == $str_title_delimited){
															$trim_title = '';
															goto aaa;
														}else{
															$trim_title = $str_title_delimited;
															goto end;
														}
														aaa:
														if ($training_title == $str_title_delimited){
															$trim_title = '';
															goto bbb;
														}else{
															$trim_title = $str_title_delimited;
															goto end;
														}
														bbb:
														$trim_title = $training_title;

														end:


													
											?>

												<tr>
													<td><?= $numrow?></td>
													<td><?= strtoupper($trim_title) ?></td>
													<td><?= $row['trn_from_date'] ?></td>
													<td><?= $row['trn_to_date'] ?></td>
													<td><?= $row['trn_no_hours'] ?></td>
													<td><?= strtoupper($row['trn_type']) ?></td>
													<td><?= strtoupper($row['trn_conducted']) ?></td>
													

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

													<?php if($row['trn_status'] == "C"){  ?>
														<td><a data-toggle="tooltip" data-placement="top" title="<?= $action ?>"><span class="badge bg-green badge-corner" ><i class="fa fa-check"> </i> <?= $doc_to_submit ?></span></a></td>
													<?php }else{  ?>
													<?php if ((date('m/d/Y', strtotime($row['trn_to_date']. ' + 5 days'))) < date("m/d/Y")){?>
														<td><a data-toggle="tooltip" data-placement="top" title="<?= $action ?>"><?= $status?></a><br><span class="badge bg-red badge-corner" ><i class="fa fa-cloud-upload" aria-hidden="true"></i> <?= $doc_to_submit ?></span></td>
													<?php }else {?>
														<td><a data-toggle="tooltip" data-placement="top" title="<?= $action ?>"><?= $status?></a><br><span class="badge bg-red badge-corner" ><i class="fa fa-cloud-upload" aria-hidden="true"></i><?= $doc_to_submit ?></span></td>
													<?php }?>
													<?php }?>
													
													
													<td>
														<button data-toggle="dropdown" type="button" class="btn btn-outline-primary dropdown-toggle btn-sm"><i class="fa fa-paperclip"></i> View 
															<?php if($count_attachment == 0){?>
																<span class="badge bg-red badge-corner"><?= $count_attachment; ?></span> <span class="caret"></span>
															<?php }else {?>
																<span class="badge bg-green badge-corner"><?= $count_attachment; ?></span> <span class="caret"></span>
															<?php }?>
														</button>
															<div class="dropdown-menu">
																<a href="<?= $url_cot ?>" class="dropdown-item <?= $disabled_cot?> " target="_blank"><i class="fa fa-eye"> </i> Certificate of Completion/ Training/ Participation</a>
																<a href="<?= $url_reap ?>" class="dropdown-item <?= $disabled_reap?>" target="_blank"><i class="fa fa-eye"> </i> REAP/Terminal Report/ Workshop Output</a>
																<a href="<?= $url_tdorf ?>"  class="dropdown-item <?= $disabled_tdorf?>" target="_blank"><i class="fa fa-eye"> </i> TDORF</a>
																<a href="#" class="dropdown-item" data-toggle="modal" data-target="#objective<?= $row['trn_id'] ?>"> <i class="fa fa-eye"></i> Objectives</a>
																<a href="#" class="dropdown-item" data-toggle="modal" data-target="#outline<?= $row['trn_id'] ?>"> <i class="fa fa-eye"></i> Course Outline</a>
															1</div> 
													</td>

													<td>
														<button data-toggle="dropdown" type="button" class="btn btn-outline-primary dropdown-toggle btn-sm"><i class="fa fa-list"></i> Actions <span class="caret"></span></button>
															<div class="dropdown-menu">
																<a href="#" id="view" class="dropdown-item" data-toggle="modal" data-target="#edit<?= $row['trn_id'] ?>"><i class="fa fa-edit"> </i> Edit</a>
																<a href="#" id="view" class="dropdown-item" data-toggle="modal" data-target="#delete<?= $row['trn_id'] ?>"><i class="fa fa-trash"> </i> Delete</a>
															</div> 
													</td>
													
												</tr>

											<!-- Modal Objective -->
											<div class="modal fade delete" id="objective<?= $row['trn_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
												<div class="modal-dialog modal-md" role="document">
												
													<div class="modal-content">
														<div class="modal-header">
															<h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-list"></i> <?= $row['trn_learn_dev'] ?></h3>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
															</button>
														</div>
														
														<div class="modal-body">
															<h3>Title: <?= $row['trn_learn_dev'] ?></h3>
															<h5>Objectives:</h5>
															<?= $row['trn_objective'] ?>
														</div>
													</div>
												</div>
											</div>
											<!-- End Modal -->

											<!-- Modal Outline -->
											<div class="modal fade delete" id="outline<?= $row['trn_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
												<div class="modal-dialog modal-md" role="document">
												
													<div class="modal-content">
														<div class="modal-header">
															<h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-list"></i> <?= $row['trn_learn_dev'] ?></h3>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
															</button>
														</div>
														
														<div class="modal-body">
															<h3>Title: <?= $row['trn_learn_dev'] ?></h3>
															<h5>Course Outline:</h5>
															<?= $row['trn_outline'] ?>
															
														</div>
													</div>
												</div>
											</div>
											<!-- End Modal -->

											<!-- Modal Delete -->
											<div class="modal fade delete" id="delete<?= $row['trn_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
												<div class="modal-dialog" role="document">
												
													<div class="modal-content">
													<div class="modal-header">
														<h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-exclamation-triangle"></i> Warning</h3>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
														</button>
													</div>
													
													<div class="modal-body text-center">
														<?= form_open('delete_training'); ?>
															<h4>Are you sure you want to delete this record?</h4>
															<input type="hidden" name="trn_id" value="<?= $row['trn_id'] ?>">
															<input type="hidden" name="trn_cot" value="<?= $row['trn_cot'] ?>">
															<input type="hidden" name="trn_reap" value="<?= $row['trn_reap'] ?>">
															<input type="hidden" name="trn_tdorf" value="<?= $row['trn_tdorf'] ?>">
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

												<!-- Edit Training-->
												<?php include('edit-training-docs.php'); ?>
											<?php } ?>

											</tbody>
										</table>

										

					</div>
				</div>		
			</div> <!-- End of card-->
		</div>	<!--End of col-lg-12 mt-3-->
		
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

		<?php if($this->session->flashdata('edit_exhibits')) : ?>

			<div class="toast" data-autohide="false" style="position: absolute; top: 150px; right: 0; min-width: 300px;">
				<div class="toast-header bg-red">
					<strong class="mr-auto"><i class="fa fa-bullhorn"></i> System Message</strong>
					<button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
				</div>
				<div class="toast-body">
					<?= $this->session->flashdata('edit_exhibits'); ?>
				</div>
			</div>

		<?php $this->session->unset_userdata('edit_exhibits'); endif;?>

		<?php if($this->session->flashdata('delete_exhibits')) : ?>

			<div class="toast" data-autohide="false" style="position: absolute; top: 150px; right: 20px; min-width: 300px;">
				<div class="toast-header bg-red">
					<strong class="mr-auto"><i class="fa fa-bullhorn"></i> System Message</strong>
					<button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
				</div>
				<div class="toast-body">
					<?= $this->session->flashdata('delete_exhibits'); ?>
				</div>
			</div>

		<?php $this->session->unset_userdata('delete_exhibits'); endif;?>
															
		
	<?php }?>
<?php }else{
redirect (base_url());
}?>
