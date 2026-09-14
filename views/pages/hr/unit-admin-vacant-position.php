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
									<a data-toggle="modal" href="#add" class="dropdown-item edit"> <i class="fa fa-plus"></i> Add Vacant Position</a>
									<a data-toggle="modal" href="#add" class="dropdown-item edit"> <i class="fa fa-bar-chart"></i> Reports</a>
								</div>
					</div>
				</div>

				<!--Count-->
				
				
				<div class="card-header d-flex align-items-center">
					<h1> List of Vacant Positions (FY <?= $year?>)</h1>
				</div>
					<div class="card-body">

						
							<div class="row">
								<div class="col-md-8"> 
								<small>
									Legend:<br>
									<span class="badge bg-green badge-corner">Open</span> || <span class="badge bg-red badge-corner">Closed</span>
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
					
						<div class="table-responsive">   
										<table id="listofalltrainings" class="table table-striped table-hover">
											<thead>
												<tr>
													<th>#</th>
													<th>Plantilla Item No.</th>
													<?php if ($this->session->role == "Super Admin"){ ?>
														<th>Operating Unit</th>
													<?php } ?>
													<th>Position</th>
													<th>Salary Grade</th>
													<th>Date Posted</th>
													<th>Deadline of Submission</th>
													<th>Status</th>
													<th>Actions</th>
												</tr>
											</thead>

											<tbody>
											
											<?php
												$numrow = 0;

												foreach($list_of_vacant_position as $row){
												$numrow++;
											?>

												<tr>
													
													<td><?= $numrow?></td>
													<td><?= $row['vac_plantilla_no'] ?></td>
													<?php if ($this->session->role == "Super Admin"){ ?>
														<td><?= $row['ous_desc'] ?></td>
													<?php } ?>
													<td><?= $row['vac_desc'] ?></td>
													<td><?= $row['vac_sg'] ?></td>
													<td><?= date("m/d/Y", strtotime($row['vac_date_posted']))?></td>
													<td><?= date("m/d/Y", strtotime($row['vac_deadline']))?></td>
													<td>
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

														<?php if(date("m/d/Y", strtotime($row['vac_deadline'])) < date("m/d/Y")){ ?>
															<span class="badge bg-red badge-corner" ><i class="fa fa-exclamation-circle"> </i> Closed</span>
														<?php } else { ?>
															<span class="badge bg-green badge-corner blinking" ><i class="fa fa-exclamation-circle"> </i> Open</span>	
														<?php } ?>
													</td>
													
													<td>
														<button data-toggle="dropdown" type="button" class="btn btn-outline-primary dropdown-toggle btn-sm"><i class="fa fa-tasks"></i> Actions</button>
															<div class="dropdown-menu">
															<a href="<?= base_url()?>hr_pillar1_notifications/<?= $row['vac_id'] ?>-<?= $year ?>-<?= $row['vac_plantilla_no'] ?>" class="dropdown-item"><i class="fa fa-edit"></i> Edit </a>
															<a href="<?= base_url()?>hr_pillar1_notifications/<?= $row['vac_id'] ?>-<?= $year ?>-<?= $row['vac_plantilla_no'] ?>" class="dropdown-item"><i class="fa fa-trash"></i> Delete </a>
															<a href="<?= base_url()?>hr_pillar1_notifications/<?= $row['vac_id'] ?>-<?= $year ?>-<?= $row['vac_plantilla_no'] ?>" class="dropdown-item"><i class="fa fa-folder-open"></i> Reopen </a>
															<div class="dropdown-divider"></div>
															<a href="<?= base_url()?>hr_pillar1_notifications/<?= $row['vac_id'] ?>-<?= $year ?>-<?= $row['vac_plantilla_no'] ?>" class="dropdown-item"><i class="fa fa-users"></i> List of Applicants </a>
															<a href="<?= base_url()?>hr_pillar1_notifications/<?= $row['vac_id'] ?>-<?= $year ?>-<?= $row['vac_plantilla_no'] ?>" class="dropdown-item"><i class="fa fa-send"></i> RSP Notification System </a>
															</div> 
													</td>
													
												</tr>

											<?php } ?>
											</tbody>				
										</table>				
					</div>
				</div>		
			</div> <!-- End of card-->
		</div>	<!--End of col-lg-12 mt-3-->


			<script type="text/javascript">
				const change_url1 = () => {
					var yearx = $('#yearxx option:selected').val();
					$("a.filter").attr('href', "<?= base_url()?>list_of_vacant_position/" + yearx);
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
