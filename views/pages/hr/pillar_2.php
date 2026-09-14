<?php 
if( $this->session->logged_in){
  if( $this->session->role == 'Accre'){
    redirect (base_url().'Guest');
  }else{?>

  <div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Pillar II</h2>
            </div>
          </header>

        <!-- Breadcrumb-->
        <?php require_once('breadcrumb.php'); ?>

          <!-- Dashboard Parameters-->
          <div class="container-fluid"><!-- container-fluid1-->
            <section class="dashboard-counts">       
                <h1><span class="badge bg-blue badge-corner"><i class="fa fa-graduation-cap" aria-hidden="true"></i></span> Learning and Development (L&D)</h1>
                <hr>

              <div class="card bg-white no-margin-bottom">
                <div class="card-close">
                  <div class="dropdown">
                   
                  </div>
                </div>
                <br>
                <div class="card-body no-padding-bottom no-padding-top">
                  <div class="row no-padding-top">

                  <div class="card col-md-4 no-margin-bottom no-margin-top"><!--card col-md-3 no-margin-bottom-->
                      <!--img class="card-img-top" src="<--?= base_url();?>assets/img/A.png" alt="Card image"-->
                      <div class="card-body"><!--card-body-->
                            <h5 class="card-title"></span><span class="badge badge-corner bg-red"> <i class="fa fa-tachometer" aria-hidden="true"></i></span> Monitoring of Training Program Invitations/ Training to Attendance</h5>  
                            <small>Status: <span class="badge bg-red badge-corner">Production</span></small> 
                            <hr>
                                <button data-toggle="dropdown" type="button" class="btn btn-outline-primary dropdown-toggle btn-sm btn-block"><i class="fa fa-tasks"></i> Action <span class="caret"></span></button>
                                  <div class="dropdown-menu">
                                    <a href="<?= base_url()?>list_of_training_inv/<?= date("Y") ?>" class="dropdown-item" ><i class="fa fa-eye"> </i> View</a>
                                </div>
                      </div><!--End of card-body-->
                    </div><!----End of card col-md-3 no-margin-bottom-->

                    <div class="card col-md-4 no-margin-bottom no-margin-top"><!--card col-md-3 no-margin-bottom-->
                      <!--img class="card-img-top" src="<--?= base_url();?>assets/img/A.png" alt="Card image"-->
                      <div class="card-body"><!--card-body-->
                            <h5 class="card-title"></span> <span class="badge badge-corner bg-red"> <i class="fa fa-tachometer" aria-hidden="true"></i></span> TPMR w/ REAP, TDORF, Terminal Report and Training Certificate</h5>             
                            <small>Status: <span class="badge bg-red badge-corner">Production</span></small>
                            <hr>
                                <button data-toggle="dropdown" type="button" class="btn btn-outline-primary dropdown-toggle btn-sm btn-block"><i class="fa fa-tasks"></i> Action <span class="caret"></span></button>
                                  <div class="dropdown-menu">
                                    <a href="<?= base_url()?>list_of_learning_and_development/<?= date("Y") ?>" class="dropdown-item" ><i class="fa fa-eye"> </i> View</a>
                                </div>
                      </div><!--End of card-body-->
                    </div><!----End of card col-md-3 no-margin-bottom-->

                    <?php if( $this->session->role == 'Super Admin'){ ?>
                    
                    <div class="card col-md-4 no-margin-bottom no-margin-top"><!--card col-md-3 no-margin-bottom-->
                      <!--img class="card-img-top" src="<--?= base_url();?>assets/img/A.png" alt="Card image"-->
                      <div class="card-body"><!--card-body-->
                            <h5 class="card-title"></span><span class="badge badge-corner bg-violet"><i class="fa fa-desktop" aria-hidden="true"></i></span> <span class="badge badge-corner bg-violet"> <b>Foreign</b> </span> Training Program Invitations/ Training to Attendance</h5>             
                            <small>Status: <span class="badge bg-violet badge-corner">Production</span></small>
                            <hr>
                                <button data-toggle="dropdown" type="button" class="btn btn-outline-primary dropdown-toggle btn-sm btn-block"><i class="fa fa-tasks"></i> Action <span class="caret"></span></button>
                                  <div class="dropdown-menu">
                                    <a href="<?= base_url()?>list_of_training_inv_foreign/<?= date("Y") ?>" class="dropdown-item" ><i class="fa fa-eye"> </i> View</a>
                                </div>
                      </div><!--End of card-body-->
                    </div><!----End of card col-md-3 no-margin-bottom-->

                    <div class="card col-md-4 no-margin-bottom no-margin-top"><!--card col-md-3 no-margin-bottom-->
                      <!--img class="card-img-top" src="<--?= base_url();?>assets/img/A.png" alt="Card image"-->
                      <div class="card-body"><!--card-body-->
                            <h5 class="card-title"></span><span class="badge badge-corner bg-orange"><i class="fa fa-desktop" aria-hidden="true"></i></span> <span class="badge badge-corner bg-orange"><b>National</b></span> Training Program Invitations/ Training to Attendance</h5>             
                            <small>Status: <span class="badge bg-orange badge-corner">Production</span></small>
                            <hr>
                                <button data-toggle="dropdown" type="button" class="btn btn-outline-primary dropdown-toggle btn-sm btn-block"><i class="fa fa-tasks"></i> Action <span class="caret"></span></button>
                                  <div class="dropdown-menu">
                                    <a href="<?= base_url()?>list_of_training_inv_national/<?= date("Y") ?>" class="dropdown-item" ><i class="fa fa-eye"> </i> View</a>
                                </div>
                      </div><!--End of card-body-->
                    </div><!----End of card col-md-3 no-margin-bottom-->

                    <div class="card col-md-4 no-margin-bottom no-margin-top"><!--card col-md-3 no-margin-bottom-->
                      <!--img class="card-img-top" src="<--?= base_url();?>assets/img/A.png" alt="Card image"-->
                      <div class="card-body"><!--card-body-->
                            <h5 class="card-title"></span> <span class="badge badge-corner bg-green"><i class="fa fa-desktop" aria-hidden="true"></i></span> <span class="badge badge-corner bg-green"><b> Local </b></span> Training Program Invitations/ Training to Attendance</h5>             
                            <small>Status: <span class="badge bg-green badge-corner">Production</span></small>
                            <hr>
                                <button data-toggle="dropdown" type="button" class="btn btn-outline-primary dropdown-toggle btn-sm btn-block"><i class="fa fa-tasks"></i> Action <span class="caret"></span></button>
                                  <div class="dropdown-menu">
                                    <a href="<?= base_url()?>list_of_training_inv_local/<?= date("Y") ?>" class="dropdown-item" ><i class="fa fa-eye"> </i> View</a>
                                </div>
                      </div><!--End of card-body-->
                    </div><!----End of card col-md-3 no-margin-bottom-->

                    <div class="card col-md-4 no-margin-bottom no-margin-top"><!--card col-md-3 no-margin-bottom-->
                      <!--img class="card-img-top" src="<--?= base_url();?>assets/img/A.png" alt="Card image"-->
                      <div class="card-body"><!--card-body-->
                            <h5 class="card-title"></span><span class="badge badge-corner bg-blue"><i class="fa fa-desktop" aria-hidden="true"></i></span> <span class="badge badge-corner bg-blue"><b>Regional Office</b></span> Initiated Training Programs</h5>             
                            <small>Status: <span class="badge bg-blue badge-corner">Production</span></small>
                            <hr>
                                <button data-toggle="dropdown" type="button" class="btn btn-outline-primary dropdown-toggle btn-sm btn-block"><i class="fa fa-tasks"></i> Action <span class="caret"></span></button>
                                  <div class="dropdown-menu">
                                    <a href="<?= base_url()?>under_development" class="dropdown-item" ><i class="fa fa-eye"> </i> View</a>
                                </div>
                      </div><!--End of card-body-->
                    </div><!----End of card col-md-3 no-margin-bottom-->

                    <?php } ?>

                    <div class="card col-md-4 no-margin-bottom no-margin-top"><!--card col-md-3 no-margin-bottom-->
                      <!--img class="card-img-top" src="<--?= base_url();?>assets/img/A.png" alt="Card image"-->
                      <div class="card-body"><!--card-body-->
                            <h5 class="card-title"></span> <span class="badge badge-corner bg-red"><i class="fa fa-bar-chart" aria-hidden="true"></i></span> Reports</h5>             
                            <small>Status: <span class="badge bg-red badge-corner">Production</span></small>
                            <hr>
                                <button data-toggle="dropdown" type="button" class="btn btn-outline-primary dropdown-toggle btn-sm btn-block"><i class="fa fa-tasks"></i> Action <span class="caret"></span></button>
                                  <div class="dropdown-menu">
                                    <a href="<?= base_url()?>hr_report" class="dropdown-item" ><i class="fa fa-eye"> </i> View</a>
                                </div>
                      </div><!--End of card-body-->
                    </div><!----End of card col-md-3 no-margin-bottom-->
                    
                    <div class="card col-md-4 no-margin-bottom no-margin-top"><!--card col-md-3 no-margin-bottom-->
                      <!--img class="card-img-top" src="<--?= base_url();?>assets/img/A.png" alt="Card image"-->
                      <div class="card-body"><!--card-body-->
                            <h5 class="card-title"></span><span class="badge badge-corner bg-red"><i class="fa fa-file-word-o" aria-hidden="true"></i></span> Downloadable Forms</h5>             
                            <small>Status: <span class="badge bg-red badge-corner">Production</span></small>
                            <hr>
                                <button data-toggle="dropdown" type="button" class="btn btn-outline-primary dropdown-toggle btn-sm btn-block"><i class="fa fa-tasks"></i> Action <span class="caret"></span></button>
                                  <div class="dropdown-menu">
                                    <a href="<?= base_url()?>uploads/HRforms/REAP.docx" class="dropdown-item" ><i class="fa fa-download"> </i> REAP</a>
                                    <a href="<?= base_url()?>uploads/HRforms/TR.docx" class="dropdown-item" ><i class="fa fa-download"> </i> Terminal Report</a>
                                    <a href="<?= base_url()?>uploads/HRforms/TDORF.docx" class="dropdown-item" ><i class="fa fa-download"> </i> TDORF</a>
                                </div>
                      </div><!--End of card-body-->
                    </div><!----End of card col-md-3 no-margin-bottom-->
                  
                  </div><!--End of Row-->
                </div><!--End of Card-Body-->

              </div><!--End of Card-->
            </section>
          </div><!-- end of container-fluid1-->
  <?php }?>
<?php }else{
redirect (base_url());
}?>

