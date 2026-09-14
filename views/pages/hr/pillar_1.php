<?php 
if( $this->session->logged_in){
  if( $this->session->role == 'Accre'){
    redirect (base_url().'Guest');
  }else{?>

  <div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Pillar I</h2>
            </div>
          </header>

        <!-- Breadcrumb-->
        <?php require_once('breadcrumb.php'); ?>

          <!-- Dashboard Parameters-->
          <div class="container-fluid"><!-- container-fluid1-->
            <section class="dashboard-counts">       
                <h1><i class="fa fa-university"></i> Recruitment Selection and Placement (RSP) </h1>
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
                            <h5 class="card-title"></span> List of Plantilla Positions</h5>  
                            <small>Status: <span class="badge bg-red badge-corner">Production</span></small> 
                            <hr>
                                <button data-toggle="dropdown" type="button" class="btn btn-outline-primary dropdown-toggle btn-sm btn-block"><i class="fa fa-tasks"></i> Action <span class="caret"></span></button>
                                  <div class="dropdown-menu">
                                    <a href="<?= base_url()?>list_of_plantilla_positions" class="dropdown-item" ><i class="fa fa-eye"> </i> View</a>
                                </div>
                      </div><!--End of card-body-->
                  </div><!----End of card col-md-3 no-margin-bottom-->

                  <div class="card col-md-4 no-margin-bottom no-margin-top"><!--card col-md-3 no-margin-bottom-->
                      <!--img class="card-img-top" src="<--?= base_url();?>assets/img/A.png" alt="Card image"-->
                      <div class="card-body"><!--card-body-->
                            <h5 class="card-title"></span> Pool of Applicants</h5>  
                            <small>Status: Under Dev't</small> 
                            <hr>
                                <button data-toggle="dropdown" type="button" class="btn btn-outline-primary dropdown-toggle btn-sm btn-block"><i class="fa fa-tasks"></i> Action <span class="caret"></span></button>
                                  <div class="dropdown-menu">
                                    <a href="#" class="dropdown-item" ><i class="fa fa-eye"> </i> View</a>
                                </div>
                      </div><!--End of card-body-->
                  </div><!----End of card col-md-3 no-margin-bottom-->

                  <div class="card col-md-4 no-margin-bottom no-margin-top"><!--card col-md-3 no-margin-bottom-->
                      <!--img class="card-img-top" src="<--?= base_url();?>assets/img/A.png" alt="Card image"-->
                      <div class="card-body"><!--card-body-->
                            <h5 class="card-title"></span> Reports</h5>  
                            <small>Status: Under Dev't</small> 
                            <hr>
                                <button data-toggle="dropdown" type="button" class="btn btn-outline-primary dropdown-toggle btn-sm btn-block"><i class="fa fa-tasks"></i> Action <span class="caret"></span></button>
                                  <div class="dropdown-menu">
                                    <a href="#" class="dropdown-item" ><i class="fa fa-eye"> </i> View</a>
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

