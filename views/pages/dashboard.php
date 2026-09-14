<?php 
if( $this->session->logged_in){
  if( $this->session->role == 'Guest'){
    redirect (base_url().'Guest');
  }else{?>
  <div class="content-inner">

          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid ">
              <h2 class="no-margin-bottom"> Dashboard (<?= $this->session->ous_desc?>)</h2>
                

            </div>
          </header>

          <!-- Breadcrumb-->
          <?php require_once('breadcrumb.php'); ?>

          <!-- Dashboard Counts Section-->
          <?php

            //Check Storage
            $ds = round(disk_total_space("/")/ 1024 /1024 /1024 );
            $df = round(disk_free_space("/") / 1024 /1024 /1024 );

            $percent = round(($df/$ds)*100);

            //Count Docs
            $directory = "./uploads/";
              $filecount = 0;
              $files = glob($directory . "*.pdf");
              if ($files){
              $filecount = count($files);
              }      
          ?>

          <section class="dashboard-counts no-padding-bottom">
            <div class="container-fluid">
              <div class="row bg-white has-shadow">
                <!-- Item -->
                <div class="col-xl-3 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="icon bg-green"><i class="fa fa-server"></i></div>
                    <div class="title"><span>Free<br>Space</span>
                      <div class="progress">
                        <div role="progressbar" style="width: <?= $percent; ?>%; height: 4px;" aria-valuenow="<?= $percent; ?>" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-green"></div>
                      </div>
                    </div>
                    <div class="number"><small><span class="badge bg-green badge-corner" ><strong><?= $df; ?></strong>GB</small></span></div>
                  </div>
                </div>
                <!-- Item -->
                <div class="col-xl-3 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="icon bg-red"><i class="fa fa-server"></i></div>
                    <div class="title"><span>Used<br>Space</span>
                      <div class="progress">
                        <div role="progressbar" style="width: <?= 100-$percent; ?>%; height: 4px;" aria-valuenow="<?= 100-$percent; ?>" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-red"></div>
                      </div>
                    </div>
                    <div class="number"><small><span class="badge bg-red badge-corner" ><strong><?= $ds-$df; ?></strong> GB</small></span></div>
                  </div>
                </div>
                <!-- Item -->
                <div class="col-xl-3 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="icon bg-violet"><i class="fa fa-book"></i></div>
                    <div class="title"><span>Total<br>Docs</span>
                      <div class="progress">
                        <div role="progressbar" style="width: 100%; height: 4px;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-violet"></div>
                      </div>
                    </div>
                    <div class="number"><small><span class="badge bg-violet badge-corner" ><strong><?= $no_of_docs; ?></strong></span></small></div>
                  </div>
                </div>
                <!-- Item -->
                <div class="col-xl-3 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="icon bg-orange"><i class="fa fa-book"></i></div>
                    <div class="title"><span>Unused<br>Docs</span>
                      <div class="progress">
                        <div role="progressbar" style="width: 50%; height: 4px;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-orange"></div>
                      </div>
                    </div>
                    <div class="number"><small><span class="badge bg-orange badge-corner" ><strong><?= $num = count(glob("uploads/" . ".pdf")); ?></strong></span></small></div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Dashboard Header Section    -->
          </section>
          <!-- Dashboard Header Section    -->

          <!-- Dashboard Parameters-->
          <div class="container-fluid"><!-- container-fluid1-->

            <section class="dashboard-counts no-margin-top"> 
            <small > Legend: <span class="badge bg-green badge-corner" style="color: #2f2f2f"><i class="fa fa-unlock"></i> <strong>Granted</strong></span></small><br>
           
              <hr>
    
              <!-- Approved Programs-->
              <p><span class="badge bg-green badge-corner"><i class="fa fa-unlock"></i></span> <strong> Approved Division(s) </strong> </p>
                <ul class="list-group list-group-flush">
                    <!--If Admin-->

                                <?php 
                                  $num_rows = 0;
                                  foreach ($list_of_divisions_approved as $row) {
                                    $num_rows++;
                                  }
                                ?>

                                  <?php if($num_rows==0){?>
                                    <div class="container no-margin-bottom no-margin-top">
                                    <div class="card no-margin-bottom no-margin-top">
                                      <div class="card-body">
                                        <div class="row no-margin-bottom no-margin-top">
                                        <div class="col-md-8 no-margin-bottom no-margin-top">
                                          <div class="text-center">
                                            <img class="text-center" src="<?= base_url();?>assets/img/logoMYPA.webp" width="auto" height="150px">
                                          </div>
                                          <br>
                                          <h1>No Division Available</h1>
                                          <p><a href="#">Want in?</a> Ask the administrator for access, or switch to an account with permission. <a href="<?= base_url();?>logout">Switch account.</a></p>
                                          <small>You are signed in as <strong><?= $this->session->email;?></strong></small>
                                        </div>
                                        <div class="col-md-4 text-ceneter no-margin-bottom no-margin-top">
                                          <br>
                                          <img src="<?= base_url();?>assets/img/d_no.webp" width="200px" height="200px"> 
                                        </div>
                                        </div>
                                      </div>
                                    </div>
                                    </div>
                                  <?php } ?>

                        <?php 
                          foreach ($list_of_divisions_approved as $row) {
                        ?>
                              <li class="list-group-item">
                                <span class="badge bg-warning badge-corner"><i class="fa fa-columns"></i></span> <?= $row['dep_desc']?>
                                <i class="fa fa-check pull-right"></i>
                              </li>
                        <?php } ?>
                  </ul>
              <br>

                <!-- List of Programs-->
              <p><span class="badge bg-red badge-corner"><i class="fa fa-lock"></i></span> <strong> List of Divisions</strong> </p>
                <ul class="list-group list-group-flush">
                  <!--If Admin-->
                      <?php 
                        foreach ($list_of_divisions as $row) {
                      ?>
                            <li class="list-group-item">
                            <span class="badge bg-warning badge-corner"><i class="fa fa-columns"></i></span> <?= $row['dep_desc']?>
                            <button data-toggle="dropdown" type="button" class="btn btn-outline-primary dropdown-toggle btn-sm pull-right"><i class="fa fa-tasks"></i> Action <span class="caret"></span></button>
                                  <div class="dropdown-menu">
                                      <?= form_open('unit_request'); ?>
                                        <input type="hidden" name="ous_id" value="<?= $row['ous_id'] ?>">
                                        <input type="hidden" name="dep_id" value="<?= $row['dep_id'] ?>">
                                        <button type="submit" class="dropdown-item"><i class="fa fa-send"></i> Request Access</button>
                                      </form>
                                  </div>
                            </li>
                      <?php } ?>
                </ul>

            </section>
          </div><!-- end of container-fluid1-->
          
        <!--Messagge Box-->
        <?php if($this->session->flashdata('program_request')) : ?>
          
          <div class="toast" data-autohide="false" style="position: absolute; top: 150px; right: 0; min-width: 300px;">
            <div class="toast-header bg-red">
            <strong class="mr-auto"><i class="fa fa-bullhorn"></i> System Message</strong>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
            </div>
            <div class="toast-body">
            <?= $this->session->flashdata('program_request'); ?>
            </div>
          </div>

        <?php endif;?>
          

  <?php }?>
<?php }else{
redirect (base_url());
}?>

