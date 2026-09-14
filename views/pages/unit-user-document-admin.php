<?php 
if( $this->session->logged_in){
  if( $this->session->role == 'Accre'){
    redirect (base_url().'Guest');
  }else{?>


<div class="content-inner">
		<!-- Page Header-->
		<header class="page-header">
		  <div class="container-fluid">
		  	<!--Count-->
			  	
			<h2 class="no-margin-bottom"><?= $ous_desc; ?>: <?= $unit_desc; ?></h2>
		  </div>
		</header>

		<!-- Breadcrumb-->
		<?php require_once('breadcrumb.php'); ?>
  
		<div class="col-lg-12 mt-3">
			<div class="card">
				<div class="card-header d-flex align-items-center">
					<h1><span class="badge bg-warning badge-corner"><i class="fa fa-file"></i></span> Documents</h1>
				</div>

				<div class="card-body">
					<!-- Approved Programs-->
						<ul class="list-group list-group-flush">
							
							<!--Year-->
							<?php
							$firstYear ='2020';
							$lastYear = (int)date('Y');
							for($i=$lastYear;$i>=$firstYear;$i--) { ?>
									<li class="list-group-item">
									<span class="badge bg-warning badge-corner"><i class="fa fa-calendar"></i></span> Year: <b><?= $i; ?></b>
									<button data-toggle="dropdown" type="button" class="btn btn-outline-primary dropdown-toggle btn-sm pull-right"><i class="fa fa-tasks"></i> Action <span class="caret"></span></button>
											<div class="dropdown-menu no-padding-bottom">
												<?php foreach($category as $row){ ?>
													<a href="<?= base_url();?>unit_user_document_add_admin/<?= $back_link; ?>-<?= $i; ?>-<?= $row['cat_id']?>-<?= $row['cat_desc']?>" type="submit" class="dropdown-item"><i class="fa fa-calendar-plus-o"></i> <?= $row['cat_desc']?></a>
												<?php } ?>
											</div>
									</li>
									
							<?php } ?>	
						</ul>
				</div><!--End of card Body-->
			</div><!--End of card-->
		</div><!--End of col-lg-12 mt-3-->

		<!-- Alert-->
		<div class="container mt-5">
			<?php if($this->session->flashdata('resources_updated')) : ?>
				<?= '<p class="alert alert-success">'.$this->session->flashdata('resources_updated').'<button type="button" class="close" data-dismiss="alert">&times;</button> </p>'?>
			<?php endif;?>
		</div>

		<!--Message Box-->
		
		<?php if($this->session->flashdata('accreditation_added')) : ?>
			
			<div class="toast" data-autohide="false" style="position: absolute; top: 150px; right: 0; min-width: 300px;">
				<div class="toast-header bg-red">
				<strong class="mr-auto"><i class="fa fa-bullhorn"></i> System Message</strong>
				<button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
				</div>
				<div class="toast-body">
				<?= $this->session->flashdata('accreditation_added'); ?>
				</div>
			</div>

		<?php endif;?>

		<?php if($this->session->flashdata('delete_aaccup')) : ?>

			<div class="toast" data-autohide="false" style="position: absolute; top: 150px; right: 0; min-width: 300px;">
				<div class="toast-header bg-red">
				<strong class="mr-auto"><i class="fa fa-bullhorn"></i> System Message</strong>
				<button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
				</div>
				<div class="toast-body">
				<?= $this->session->flashdata('delete_aaccup'); ?>
				</div>
			</div>
				
		<?php endif;?>

		<?php if($this->session->flashdata('Invalid')) : ?>

		<div class="toast" data-autohide="false" style="position: absolute; top: 150px; right: 0; min-width: 300px;">
			<div class="toast-header bg-red">
			<strong class="mr-auto"><i class="fa fa-bullhorn"></i> System Message</strong>
			<button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
			</div>
			<div class="toast-body">
			<?= $this->session->flashdata('Invalid'); ?>
			</div>
		</div>
	
		<?php endif;?>

		

	

<?php }?>
<?php }else{
redirect (base_url());
}?>
