<?php 
if( $this->session->logged_in){
  if( $this->session->role == 'Accre'){
    redirect (base_url().'Guest');
  }else{?>

  <div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom"><?= $ous_desc; ?></h2>
            </div>
          </header>

        <!-- Breadcrumb-->
        <?php require_once('breadcrumb.php'); ?>

          <!-- Dashboard Parameters-->
          <div class="container-fluid"><!-- container-fluid1-->
            <section class="dashboard-counts">       
                <h1><span class="badge bg-warning badge-corner"><i class="fa fa-columns"></i></span> Divisions</h1>
                <hr>

              <div class="card bg-white no-margin-bottom">
                <div class="card-body no-padding-bottom no-padding-top">
                  <div class="row">

                              <?php 
                                  $num_rows = 0;
                                  foreach ($list_of_divisions_admin as $row) {
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
                                            <img class="text-center" src="<?= base_url();?>assets/img/logoMYPA.png" width="auto" height="150px">
                                          </div>
                                          <br>
                                          <h1>No Division Available</h1>
                                          <p><a href="#">Want in?</a> Ask the administrator for access, or switch to an account with permission. <a href="<?= base_url();?>logout">Switch account.</a></p>
                                          <small>You are signed in as <strong><?= $this->session->email;?></strong></small>
                                        </div>
                                        <div class="col-md-4 text-ceneter no-margin-bottom no-margin-top">
                                          <br>
                                          <img src="<?= base_url();?>assets/img/d_no.png" width="200px" height="200px"> 
                                        </div>
                                        </div>
                                      </div>
                                    </div>
                                    </div>
                                  <?php } ?>

                  
                  <?php foreach($list_of_divisions_admin as $row) {?>
                    <div class="card col-md-3 no-margin-bottom"><!--card col-md-3 no-margin-bottom-->
                      <!--img class="card-img-top" src="<--?= base_url();?>assets/img/A.png" alt="Card image"-->	
                      <div class="card-body"><!--card-body-->
                      <!--Loop-->
                        <h2 class="card-title"><span class="badge bg-warning badge-corner"><strong><i class="fa fa-columns"></i> Division: </strong></span> <?= $row['dep_desc']?></h4>             
                        <hr>
                            <button data-toggle="dropdown" type="button" class="btn btn-outline-primary dropdown-toggle btn-sm btn-block"><i class="fa fa-tasks"></i> Action <span class="caret"></span></button>
                              <div class="dropdown-menu">
                                <a href="<?= base_url();?>unit_user_document_admin/<?= $row['dep_desc']?>-<?= $row['dep_id'];?>-<?= $ous_id; ?>-<?= $ous_desc;?>" class="dropdown-item" ><i class="fa fa-file"> </i> View Documents</a>
                            </div> 
                    
                      <!--End of Loop-->

                      </div><!--End of card-body-->
                    </div><!----End of card col-md-3 no-margin-bottom-->
                    <?php } ?>  
                  </div><!--End of Row-->
                </div><!--End of Card-Body-->

              </div><!--End of Card-->
            </section>
          </div><!-- end of container-fluid1-->


		<!--Message Box-->
        
        <?php if($this->session->flashdata('add_program')) : ?>
            
            <div class="toast" data-autohide="false" style="position: absolute; top: 70px; right: 0; min-width: 300px;">
                <div class="toast-header bg-red">
                <strong class="mr-auto"><i class="fa fa-bullhorn"></i> System Message</strong>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
                </div>
                <div class="toast-body">
                <?= $this->session->flashdata('add_program'); ?>
                </div>
            </div>

        <?php endif;?>

        <?php if($this->session->flashdata('update_program')) : ?>
            
            <div class="toast" data-autohide="false" style="position: absolute; top: 70px; right: 0; min-width: 300px;">
                <div class="toast-header bg-red">
                <strong class="mr-auto"><i class="fa fa-bullhorn"></i> System Message</strong>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
                </div>
                <div class="toast-body">
                <?= $this->session->flashdata('update_program'); ?>
                </div>
            </div>

        <?php endif;?>

		<?php if($this->session->flashdata('delete_program')) : ?>
            
            <div class="toast" data-autohide="false" style="position: absolute; top: 70px; right: 0; min-width: 300px;">
                <div class="toast-header bg-red">
                <strong class="mr-auto"><i class="fa fa-bullhorn"></i> System Message</strong>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
                </div>
                <div class="toast-body">
                <?= $this->session->flashdata('delete_program'); ?>
                </div>
            </div>

        <?php endif;?>
  <?php }?>
<?php }else{
redirect (base_url());
}?>

