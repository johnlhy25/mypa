<?php 
if( $this->session->logged_in){
  if( $this->session->role == 'Accre'){
    redirect (base_url().'Guest');
  }else{?>

  <div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
             
              <h2 class="no-margin-bottom"> Notifications</h2>
              
            </div>
          </header>

           <!-- Breadcrumb-->
           <?php require_once('breadcrumb.php'); ?>

          <!-- Dashboard Units-->
          <div class="container-fluid"><!-- container-fluid1-->
            <div class="card mt-3">
              <div class="card-header d-flex align-items-center">
                <h1><span class="badge bg-warning badge-corner"><i class="fa fa-bell"></i></span> Request </h1>
                
              </div>

              <div class="card-body">
                <small > Legend: <span class="badge bg-green badge-corner" style="color: #2f2f2f"><i class="fa fa-check"></i> <strong>Granted</strong></span> | <span class="badge bg-red badge-corner" style="color: #2f2f2f"><i class="fa fa-ban"></i> <strong>Denied</strong></span></small> <small class="pull-right"><strong>Note:</strong> This page reloads every five (5) minutes. </small>
                <hr>
                <div class="row">
                    <!-- Unit-->
                    <div class="col-md-12">
                      <table id="area" class="table table-striped table-hover">
                          <thead>
                            <tr>
                            <th>#</th>
                              <th>Now</th>
                              <th>Status</th>
                              <th>Action</th>
                            </tr>
						              </thead>
						  
                          <tbody>
                            <?php
                              $num_rows=0;
                              foreach($notification_data as $row){
                                $num_rows++;
                              
                            ?>
                            
                              <tr>
                                  <td><?= $num_rows ?></td>
                                  <td>
                                  <?php if($row['usr_link_id'] == null) {?>
                                    <img id="profile" src="<?= base_url();?>uploads/profile/img_avatar1.png" alt="Profile Picture" class="img-fluid rounded-circle" height="25px" width="25px">
                                  <?php } else{ ?>
                                    <img id="profile" src="<?= base_url();?>uploads/profile/<?= $row['usr_link_id'];?>" alt="Profile Picture" class="img-fluid rounded-circle" height="25px" width="25px">
                                  <?php } ?>  
                                      <strong> 
                                        <?= $row['usr_name']?></strong> is requesting access to <strong><?= $row['dep_desc']?>
                                      </strong>
                                  </td>
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
                                  <td><span class="badge bg-warning badge-corner blinking"><i class="fa fa-exclamation-circle"></i> <?= $row['grant_status']; ?></span></td>
                                  <td>
                                    <button data-toggle="dropdown" type="button" class="btn btn-outline-primary dropdown-toggle btn-sm pull-right"><i class="fa fa-tasks"></i> Action <span class="caret"></span></button>
                                    <div class="dropdown-menu">
                                      <a href="<?= base_url();?>grant_user/<?= $row['grant_id']?>" class="dropdown-item"><i class="fa fa-check"> </i> Grant</a>
                                      <a href="<?= base_url();?>deny_user/<?= $row['grant_id']?>" class="dropdown-item"><i class="fa fa-ban"> </i> Deny</a>
                                    </div>
                                  </td>
                                  
                              </tr>
                          <?php } ?>

                          </tbody>
							        </table>

                      <hr> 
                    </div><!-- End of Units-->
                </div>
              </div>
            </div> 
          </div><!-- end of container-fluid1-->

          <script type="text/javascript">
            function autoRefreshPage()
            {
              window.location = window.location.href;
            }
            setInterval('autoRefreshPage()', 300000);
          </script>

          <!--Message Box-->
          <?php if($this->session->flashdata('grant_user')) : ?>
					<div class="toast" data-autohide="false" style="position: absolute; top: 150px; right: 0; min-width: 300px;">
						<div class="toast-header bg-red">
						<strong class="mr-auto"><i class="fa fa-bullhorn"></i> System Message</strong>
						<button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
						</div>
						<div class="toast-body">
						<?= $this->session->flashdata('grant_user'); ?>
						</div>
					</div>
				<?php endif;?>

				<?php if($this->session->flashdata('deny_user')) : ?>
					<div class="toast" data-autohide="false" style="position: absolute; top: 150px; right: 0; min-width: 300px;">
						<div class="toast-header bg-red">
						<strong class="mr-auto"><i class="fa fa-bullhorn"></i> System Message</strong>
						<button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
						</div>
						<div class="toast-body">
						<?= $this->session->flashdata('deny_user'); ?>
						</div>
					</div>
				<?php endif;?>

  <?php }?>
<?php }else{
redirect (base_url());
}?>

