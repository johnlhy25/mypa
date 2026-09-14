<?php 
if( $this->session->logged_in){
  if( $this->session->role == 'Guest'){
    redirect (base_url().'accreditor');
  }else{?>
	

	<div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Auth Logs</h2>
            </div>
          </header>

		  
           <!-- Breadcrumb-->
           <?php require_once('breadcrumb.php'); ?>

			<div class="col-lg-12 mt-3">
				<div class="card">

					<div class="card-close">
						<div class="dropdown">
							<button type="button" id="closeCard3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
									<!--div aria-labelledby="closeCard3" class="dropdown-menu dropdown-menu-right has-shadow"><a  data-toggle="modal" href="#add" class="dropdown-item edit"> <i class="fa fa-plus"></i>Add</a></div-->
						</div>
					</div>
					
					<div class="card-header d-flex align-items-center">
						<h1><span class="badge bg-warning badge-corner"><i class="fa fa-history"></i></span> Auth Logs </h1>
						
					</div>
                    <div class="card-body">
                      <div class="table-responsive"> 
					  					      
                        <table id="auth" class="table table-striped table-hover">
							<thead>
								<tr>
									<th>#</th>
									<th>Date & Time</th>
									<th>Name</th>
									<th>Platform</th>
									<th>Ip Address</th>
									<th>Browser</th>
									<th>Browser Version</th>
									<th>User Agent</th>
								</tr>
							</thead>
						</table>
							                <!--Script-->
							                <script>
                                  $(document).ready(function(){
                                      $('#auth').DataTable({
                                          //"bDestroy": true,
                                          // Processing indicator
                                          "processing": true,
                                          // DataTables server-side processing mode
                                          "serverSide": true,
                                          // Initial no order.
                                          "order": [],
                                          // Load data from an Ajax source
                                          "ajax": {
                                              "url": "<?php echo base_url('pages/getLogs');?>",
                                              "type": "POST"
                                          },
                                          //Set column definition initialisation properties
                                          "columnDefs": [{ 
                                              "targets": [0],
                                              "orderable": false
                                          }]
                                      });
                                  });
                              </script>
                              <!--Script-->
							
								
                      </div><!--End of Card Body-->
                    </div><!--End of Table-->
            	</div><canvas></canvas>
        	</div><!--End of col-lg-12 mt-3-->
				
<?php }?>				
<?php }else{
	redirect(base_url());
}?>
