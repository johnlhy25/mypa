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
									<a data-toggle="modal" href="#downloadexcel1" class="dropdown-item edit"> <i class="fa fa-file"></i> TESDA-OP-AS-01-F06 Report</a>
								</div>
					</div>
				</div>

				<!--Count-->
				
				
				<div class="card-header d-flex align-items-center">
					<h1> List of Learning and Development Interventions/Training Programs per Operating (FY <?= $year?>)</h1>
				</div>
					<div class="card-body">

						
							<div class="row">
								<div class="col-md-8"> 
								<small>
									Legend:<br>
									<span class="badge bg-green badge-corner">Completed</span> || <span class="badge bg-warning badge-corner">Not Completed/ Due</span> || <span class="badge bg-red badge-corner">Did not Attend</span>
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
													$firstYear ='2021';
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
					
						<div class="table-responsive">   
										<!-- Notify All -->	
										<?= form_open('notify_selected'); ?>
										<table id="listofalltrainings" class="table table-striped table-hover">
											<thead>
												<tr>
													<th><input type="checkbox" name="select_all" value="1" id="check_email"></th>
													<th>#</th>
													<th>Name</th>
													<?php if ($this->session->role == "Super Admin"){ ?>
														<th>Operating Unit</th>
													<?php } ?>
													<th>Title of Learning and Development(LD) </th>
													<th>From (Date)</th>
													<th>To (Date)</th>
													<th>No. of Hours</th>
													<th>Type of LD</th>
													<th>Conducted/ Sponsored By</th>
													<th>Due/Date Submitted</th>
													<th>Status/ Document to Submit</th>
													<th>Attachment(s)</th>
													<th>Actions</th>
												</tr>
											</thead>

											<tbody>
											
											<?php
												$numrow = 0;

												foreach($list_of_trainings_per_user as $row){
												if($row['trn_remarks'] == 'Postponed'){}
      											else{
													$count_attachment = 0;
													$url_cot = base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/trainings/'.$row['trn_cot'].'&zoom=page';
													//$url_cot1 = 'uploads/trainings/'.$row['trn_cot'];
													$url_reap = base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/trainings/'.$row['trn_reap'].'&zoom=auto';
													//$url_reap1 = 'uploads/trainings/'.$row['trn_reap'];
													$url_tdorf = base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/trainings/'.$row['trn_tdorf'].'&zoom=auto';
													//$url_tdorf1 = 'uploads/trainings/'.$row['trn_tdorf'];
													
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
														$action = ' ';
														$doc_to_submit = $action;
													}

													
											?>

												<tr>
													<td>
													<?php if($row['trn_status'] == "C"){ ?>
														<input type="checkbox" name="trn_id[]" disabled>
													<?php }else{  ?>
														<input type="checkbox" name="trn_id[]" value="<?= $row['trn_id']?>-<?= $row['usr_id']?>">
													<?php }?>
													</td>
													<td><?= $numrow?></td>
													<td><?= $row['usr_name'] ?></td>
													<?php if ($this->session->role == "Super Admin"){ ?>
														<td><?= $row['ous_desc'] ?></td>
													<?php } ?>
													<td><?= $row['trn_learn_dev'] ?></td>
													<td><?= date("m/d/Y", strtotime($row['trn_from_date'])) ?></td>
													<td><?= date("m/d/Y", strtotime($row['trn_to_date']))?></td>
													<td><?= $row['trn_no_hours'] ?></td>
													<td><?= $row['trn_type'] ?></td>
													<td><?= $row['trn_conducted'] ?></td>
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
															<td><span class="badge bg-green badge-corner" ><i class="fa fa-calendar"> </i> <?=  date("m/d/Y", strtotime($row['trn_timestamp'])) ?></span></td>
															<td><span class="badge bg-green badge-corner" ><i class="fa fa-check"> </i> <?= $status ?> <?= $doc_to_submit ?></span></td>
														<?php }else{  ?>
														
														<?php if ((date('m/d/Y', strtotime($row['trn_to_date']. ' + 5 days'))) < date("m/d/Y")){?>
															<td><span class="badge bg-red badge-corner" ><i class="fa fa-calendar"> </i> <?= date('m/d/Y', strtotime($row['trn_to_date']. ' + 5 days')) ?></span></td>
															<td><a data-toggle="tooltip" data-placement="top" title="<?= $action ?>"><?= $status?></a><br><span class="badge bg-red badge-corner" ><i class="fa fa-cloud-upload" aria-hidden="true"></i> <?= $doc_to_submit ?></span></td>
														<?php }else {?>
															<td><span class="badge bg-warning badge-corner blinking" ><i class="fa fa-calendar"> </i> <?= date('m/d/Y', strtotime($row['trn_to_date']. ' + 5 days')) ?></span></td>
															<td><a data-toggle="tooltip" data-placement="top" title="<?= $action ?>"><?= $status?></a><br><span class="badge bg-red badge-corner" ><i class="fa fa-cloud-upload" aria-hidden="true"></i> <?= $doc_to_submit ?></span></td>
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
															</div> 
													</td>

													<td>
														<button data-toggle="dropdown" type="button" class="btn btn-outline-primary dropdown-toggle btn-sm <?= $disabled ?>"><i class="fa fa-tasks"></i> Actions </button>
															<div class="dropdown-menu">
																<a href="#" id="view" class="dropdown-item disabled" data-toggle="modal" data-target="#viewcot<?= $row['trn_id'] ?>"><i class="fa fa-plus"> </i> Add Remarks</a>
																<a href="#" id="view" class="dropdown-item disabled" data-toggle="modal" data-target="#viewcot<?= $row['trn_id'] ?>"><i class="fa fa-trash"> </i> Delete</a>
																<?php if ($row['trn_status'] == "C"){?>
																	<a href="<?= base_url()?>notify_user/<?= $row['trn_id']?>"  class="dropdown-item disabled"><i class="fa fa-send"> </i> Notify</a>
																<?php }else { ?>
																	<a href="<?= base_url()?>notify_user/<?= $row['trn_id']?>-<?= $row['usr_id']?>" class="dropdown-item notify"><i class="fa fa-send"> </i> Notify</a>
																<?php }?>
																<div class="dropdown-divider"></div>
																<a href="#" id="view" class="dropdown-item" data-toggle="modal" data-target="#objective<?= $row['trn_id'] ?>"><i class="fa fa-eye"> </i> Objectives</a>
																<a href="#" id="view" class="dropdown-item" data-toggle="modal" data-target="#outline<?= $row['trn_id'] ?>"><i class="fa fa-eye"> </i> Course Objectives</a>
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
															<?php //$row['trn_objective'] ?>
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
															<?php //$row['trn_outline'] ?>
															
														</div>
													</div>
												</div>
											</div>
											<!-- End Modal -->

											<?php } //End Else?>
											<?php } //End Foreach?>
											</tbody>				
										</table>
											<!-- Notify All -->							
											<button type="submit" id="notify" class="btn btn-primary btn-sm notify <?= $disabled ?>"><i class="fa fa-send"> </i> Notify</button><br><br>
										</form>
											<!-- Notify All -->								
					</div>
				</div>		
			</div> <!-- End of card-->
		</div>	<!--End of col-lg-12 mt-3-->

		<!-- Loading -->
		<div class="modal fade" id="notifymodal">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-body text-center">
						<span class="spinner-border spinner-border-lg" style="width: 4rem; height: 4rem;" role="status" aria-hidden="true"></span>
  						<span class="sr-only" style="color:#000">Sending...</span>
						<br><br>
						<h4><b>Sending</b>, please wait...</h4>										
					</div>   
					
				</div>                                                                       
			</div>                                          
		</div>

	<script>
		$(document).ready(function(){
			$('#notify').click(function(){
				$('#notifymodal').modal('show')
			});

			$('a.notify').click(function(){
				$('#notifymodal').modal('show')
			});

		});
	</script>

	<script type="text/javascript">
			const change_url1 = () => {
				var yearx = $('#yearxx option:selected').val();
				$("a.filter").attr('href', "<?= base_url()?>list_of_learning_and_development/" + yearx);
				};
	</script>
			
		
		<!--Message Box-->
		
		<?php if($this->session->flashdata('success_notification')) : ?>

		<div class="toast" data-autohide="false" style="position: absolute; top: 150px; right: 20px; min-width: 300px;">
			<div class="toast-header bg-red">
				<strong class="mr-auto"><i class="fa fa-bullhorn"></i> System Message</strong>
				<button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
			</div>
			<div class="toast-body">
				<?= $this->session->flashdata('success_notification'); ?>
			</div>
		</div>
		<?php $this->session->unset_userdata('success_notification'); endif;?>
		
	<?php }?>
<?php }else{
redirect (base_url());
}?>
