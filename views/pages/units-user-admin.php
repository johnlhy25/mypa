<?php 
if( $this->session->logged_in){
  if( $this->session->role == 'Accre'){
    redirect (base_url().'Guest');
  }else{?>

  <div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom"><strong><?= $this->session->ous_desc?></strong></h2>
            </div>
          </header>

        <!-- Breadcrumb-->
        <?php require_once('breadcrumb.php'); ?>

          <!-- Dashboard Parameters-->
          <div class="container-fluid"><!-- container-fluid1-->
            <section class="dashboard-counts">       
                <h1><span class="badge bg-warning badge-corner"><i class="fa fa-columns"></i></span> Divisions </h1>
                <hr>

              <div class="card bg-white no-margin-bottom">
                <div class="card-close">
                    <div class="dropdown">
                      <button type="button" id="closeCard3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                          <div aria-labelledby="closeCard3" class="dropdown-menu dropdown-menu-right has-shadow">
                            <a  data-toggle="modal" href="#add" class="dropdown-item edit"> <i class="fa fa-plus"></i>Add Division</a>
                          </div>
                    </div>
                  </div>
                  <br>
                <div class="card-body no-padding-bottom no-padding-top">
                  <div class="row">

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

                  <?php foreach($list_of_divisions_approved as $row) {?>
                    <div class="card col-md-3 no-margin-bottom"><!--card col-md-3 no-margin-bottom-->
                      <!--img class="card-img-top" src="<--?= base_url();?>assets/img/A.png" alt="Card image"-->	
                      <div class="card-body"><!--card-body-->
                      <!--Loop-->
                        <h2 class="card-title"><span class="badge bg-warning badge-corner"><strong><i class="fa fa-columns"></i> Division: </strong></span> <?= $row['dep_desc']?></h4>             
                        <hr>
                            <button data-toggle="dropdown" type="button" class="btn btn-outline-primary dropdown-toggle btn-sm btn-block"><i class="fa fa-tasks"></i> Action <span class="caret"></span></button>
                              <div class="dropdown-menu">
                                <a href="#" class="dropdown-item" data-toggle="modal" data-target="#edit<?= $row['dep_id'] ?>" ><i class="fa fa-edit"> </i> Edit</a>
                                <a href="#" class="dropdown-item" data-toggle="modal" data-target="#delete<?= $row['dep_id'] ?>"><i class="fa fa-trash"> </i> Delete</a>
                            </div> 
                    
                      <!--End of Loop-->
                      </div><!--End of card-body-->
                    </div><!----End of card col-md-3 no-margin-bottom-->

                    <!--Modal Delete-->
                        <!-- Modal Delete -->
												<div class="modal fade delete" id="delete<?= $row['dep_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
												<div class="modal-dialog" role="document">
												
													<div class="modal-content">
													<div class="modal-header">
														<h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-exclamation-triangle"></i> Warning</h3>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
														</button>
													</div>
													
													<div class="modal-body text-center">
														<?= form_open('delete_division'); ?>
															<input type="hidden" name="dep_id" value="<?= $row['dep_id']?>">
															<h4>Are you sure you want to delete this Operating Unit <span style="color: #fd5050;"> [<?= $row['dep_desc']; ?>]</span>?</h4>
															<br><small class="pull-left"><b>Note</b>: This proccess is irreversible.</small>
													</div>

													
													
													<div class="modal-footer">
													
														<div class="btn-group">
															<button type="deleteexhibitsubmit" class="btn btn-danger">Yes</button>
															<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>	
														</div>

														<div id="deleteexhibitloading" class="spinner-grow text-primary" style="display: none;" role="status">
															<span class="sr-only">Loading... </span>
														</div>	
														
													</div>
													</form>
													</div>
												</div>
												</div>
												<!-- End Modal -->
                    <!--End Modal Delete-->

                    <!--Modal Edit-->
                      <!--Edit Categories-->
												<div class="modal fade delete " id="edit<?= $row['dep_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
														<div class="modal-dialog modal-md" role="document">	
															<div class="modal-content">

																<div class="modal-header">
																	<h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-pencil"></i> Edit Operating Unit</h3>
																		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																			<span aria-hidden="true">&times;</span>
																		</button>
																</div>

																<div class="modal-body text-center no-padding">
																	<?= form_open('edit_division'); ?>

                                  <input type="hidden" name="dep_id" value="<?= $row['dep_id']?>">
																	<!--Start Description-->
																	<div class="row form-group">
																		<div class="col-sm-3">
																			<label class="control-label pull-left" style="position:relative; top:7px;">Division:</label>
																		</div>
																		<div class="col-sm-9">
																			<input type="text" class="form-control" name="dep_desc" value="<?= $row['dep_desc']?>" required>
																		</div>
																	</div>
																</div>
																							
																<div class="modal-footer">
																	<div class="btn-group">
																		<button id="editexhibitsubmit" type="submit" value='Upload' name='upload' class="btn btn-danger">Submit</button>
																		<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>	
																	</div>

																	<div id="editexhibitloading" class="spinner-grow text-primary" style="display: none;" role="status">
																		<span class="sr-only">Loading... </span>
																	</div>	
																</div>

																</form>						
															</div>
														</div>
													</div>
													<!-- End Modal -->
                    <!--End Modal Edit-->


                    <?php } ?>  
                  </div><!--End of Row-->
                </div><!--End of Card-Body-->

              </div><!--End of Card-->
            </section>
          </div><!-- end of container-fluid1-->


		<!--Message Box-->
        
        <?php if($this->session->flashdata('add_division')) : ?>
            
            <div class="toast" data-autohide="false" style="position: absolute; top: 150px; right: 0; min-width: 300px;">
                <div class="toast-header bg-red">
                <strong class="mr-auto"><i class="fa fa-bullhorn"></i> System Message</strong>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
                </div>
                <div class="toast-body">
                <?= $this->session->flashdata('add_division'); ?>
                </div>
            </div>

        <?php endif;?>

        <?php if($this->session->flashdata('edit_division')) : ?>
            
            <div class="toast" data-autohide="false" style="position: absolute; top: 150px; right: 0; min-width: 300px;">
                <div class="toast-header bg-red">
                <strong class="mr-auto"><i class="fa fa-bullhorn"></i> System Message</strong>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
                </div>
                <div class="toast-body">
                <?= $this->session->flashdata('edit_division'); ?>
                </div>
            </div>

        <?php endif;?>

		<?php if($this->session->flashdata('delete_division')) : ?>
            
            <div class="toast" data-autohide="false" style="position: absolute; top: 150px; right: 0; min-width: 300px;">
                <div class="toast-header bg-red">
                <strong class="mr-auto"><i class="fa fa-bullhorn"></i> System Message</strong>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
                </div>
                <div class="toast-body">
                <?= $this->session->flashdata('delete_division'); ?>
                </div>
            </div>

        <?php endif;?>
  <?php }?>
<?php }else{
redirect (base_url());
}?>

