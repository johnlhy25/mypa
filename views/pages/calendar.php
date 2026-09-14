<?php 
if( $this->session->logged_in){
  if( $this->session->role == 'Guest'){
    redirect (base_url().'Guest');
  }else{?>


	<div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Calendar</h2>
            </div>
          </header>

		<!-- Breadcrumb-->
		<?php require_once('breadcrumb.php'); ?>

		<div class="col-lg-12 mt-3">
			<div class="card">
				<div class="card-header d-flex align-items-center">
					<h1> <span class="badge bg-warning badge-corner"><i class="fa fa-calendar"></i></span><strong> Calendar of Activities</strong></h1>
				</div>

				<div class="card-body">
					<!--Google Calendar-->
					<div id="accordion">
						<div class="card">
							<div class="card-header">
								<a class="card-link" data-toggle="collapse" href="#collapseOne">
									<i class="fa fa-eye"></i> Google Calendar 
										<span class="text-right"> 
											<i class="fa fa-arrow-up"></i>
										</span>
								</a>
							</div>
							<div id="collapseOne" class="collapse show" data-parent="#accordion">
								<div class="card-body">
									<iframe src="https://calendar.google.com/calendar/embed?height=600&wkst=1&bgcolor=%23ffffff&ctz=Asia%2FManila&src=Y19tNTNnMW40ZTR0cG1kdWdsY2lpaHBrdHNob0Bncm91cC5jYWxlbmRhci5nb29nbGUuY29t&color=%23009688&showTitle=0&showNav=1" style="border-width:0" width="100%" height="600" frameborder="0" scrolling="no"></iframe>
								</div>
							</div>
						</div>
					</div>

					<!--Table of TESDA Order-->
								<div  class="table-responsive">                       
									<table id="parameters" class="table table-striped table-hover">
										<thead>
											<tr>
											<th>Descrption</th>
											<th>Date & Time Modified</th>
											<th></th>
											</tr>
										</thead>
									
										<tbody>

										</tbody>
									</table>
								</div>
					
				</div><!-- End of Card Body-->
			</div> <!-- End of card-->
		</div>	<!--End of col-lg-12 mt-3-->		
	<?php }?>
<?php }else{
redirect (base_url());
}?>
