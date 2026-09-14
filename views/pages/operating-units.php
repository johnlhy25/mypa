<?php 
if( $this->session->logged_in){
  if( $this->session->role == 'Accre'){
    redirect (base_url().'Guest');
  }else{?>

  <div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Operating Units</h2>
            </div>
          </header>

        <!-- Breadcrumb-->
        <?php require_once('breadcrumb.php'); ?>

          <!-- Dashboard Parameters-->
          <div class="container-fluid"><!-- container-fluid1-->
            <section class="dashboard-counts">       
                <h1><span class="badge bg-blue badge-corner"><i class="fa fa-building"></i></span> Operating Units </h1>
                <hr>

              <div class="card bg-white no-margin-bottom">
                <div class="card-close">
                  <div class="dropdown">
                    <button type="button" id="closeCard3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                        <div aria-labelledby="closeCard3" class="dropdown-menu dropdown-menu-right has-shadow">
                          <a  data-toggle="modal" href="#add" class="dropdown-item edit"> <i class="fa fa-plus"></i>Add Operating Unit</a>
                          <!-- <a  href="<?= base_url(); ?>zip_download" class="dropdown-item edit"> <i class="fa fa-file-zip-o"></i>Download All Documents</a> -->
                        </div>
                  </div>
                </div>
                <br>
                <div class="card-body no-padding-bottom no-padding-top">
                  <div class="row">

                  
                  <?php foreach($list_of_operating_units as $row) {?>
                    <div class="card col-md-3 no-margin-bottom"><!--card col-md-3 no-margin-bottom-->
                      <!--img class="card-img-top" src="<--?= base_url();?>assets/img/A.png" alt="Card image"-->	
                      <div class="card-body"><!--card-body-->
                      <!--Loop-->
                        <h2 class="card-title"><span class="badge bg-blue badge-corner"><strong><i class="fa fa-building"></i> Operating Unit: </strong></span> <?= $row['ous_desc']?></h4>             
                        <hr>
                            <button data-toggle="dropdown" type="button" class="btn btn-outline-primary dropdown-toggle btn-sm btn-block"><i class="fa fa-tasks"></i> Action <span class="caret"></span></button>
                              <div class="dropdown-menu">
                                <a href="<?= base_url()?>unit_admin/operating-unit-<?= $row['ous_id']?>-<?= $row['ous_desc']?>" class="dropdown-item" ><i class="fa fa-columns"> </i> View Divisions</a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item" data-toggle="modal" data-target="#edit<?= $row['ous_id'] ?>"><i class="fa fa-edit"> </i> Edit</a>
                                <a href="#" class="dropdown-item" data-toggle="modal" data-target="#delete<?= $row['ous_id'] ?>"><i class="fa fa-trash"> </i> Delete</a>
                            </div> 
                    
                      <!--End of Loop-->

                      </div><!--End of card-body-->
                    </div><!----End of card col-md-3 no-margin-bottom-->

                    <!--Modal Delete-->
                        <!-- Modal Delete -->
												<div class="modal fade delete" id="delete<?= $row['ous_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
												<div class="modal-dialog" role="document">
												
													<div class="modal-content">
													<div class="modal-header">
														<h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-exclamation-triangle"></i> Warning</h3>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
														</button>
													</div>
													
													<div class="modal-body text-center">
														<?= form_open('delete_operating_units'); ?>
															<input type="hidden" name="ous_id" value="<?= $row['ous_id']?>">
															<h4>Are you sure you want to delete this Operating Unit <span style="color: #fd5050;"> [<?= $row['ous_desc']; ?>]</span>?</h4>
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
												<div class="modal fade delete " id="edit<?= $row['ous_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
														<div class="modal-dialog modal-md" role="document">	
															<div class="modal-content">

																<div class="modal-header">
																	<h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-pencil"></i> Edit Operating Unit</h3>
																		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																			<span aria-hidden="true">&times;</span>
																		</button>
																</div>

																<div class="modal-body text-center no-padding">
																	<?= form_open('edit_operating_units'); ?>

                                  <input type="hidden" name="ous_id" value=<?= $row['ous_id']?>>
																	<!--Start Description-->
																	<div class="row form-group">
																		<div class="col-sm-4">
																			<label class="control-label pull-left" style="position:relative; top:7px;">Operating Unit:</label>
																		</div>
																		<div class="col-sm-8">
																			<input type="text" class="form-control" name="ous_desc" value="<?= $row['ous_desc']?>" required>
																		</div>
																	</div>

                                  <!--Start OUs Email-->
                                  <div class="row form-group no-margin-top no-padding-top">
                                      <div class="col-sm-4">
                                          <label class="control-label pull-left" >Email Address:</label>
                                      </div>
                                      <div class="col-sm-8">
                                          <input type="email" class="form-control" name="ous_email" value="<?= $row['ous_email']?>" required>
                                      </div>
                                  </div>

                                  <!--Start HR Email-->
                                  <div class="row form-group no-margin-top no-padding-top">
                                      <div class="col-sm-4">
                                          <label class="control-label pull-left" >HR Focal Email Address:</label>
                                      </div>
                                      <div class="col-sm-8">
                                          <input type="email" class="form-control" name="ous_hrfocal_email" value="<?= $row['ous_hrfocal_email']?>" required>
                                      </div>
                                  </div>

                                  <!--Start MIS Email-->
                                  <div class="row form-group no-margin-top no-padding-top">
                                      <div class="col-sm-4">
                                          <label class="control-label pull-left" >MIS Focal Email Address:</label>
                                      </div>
                                      <div class="col-sm-8">
                                          <input type="email" class="form-control" name="ous_mis_focal" value="<?= $row['ous_mis_focal']?>" required>
                                      </div>
                                  </div>

                                  <!--Start MIS Email-->
                                  <div class="row form-group no-margin-top no-padding-top">
                                      <div class="col-sm-4">
                                          <label class="control-label pull-left" >OU Head Email Address:</label>
                                      </div>
                                      <div class="col-sm-8">
                                          <input type="email" class="form-control" name="ous_head_email" value="<?= $row['ous_head_email']?>" required>
                                      </div>
                                  </div>

                                  <!--Head of Operating Unit-->
                                  <div class="row form-group no-margin-top no-padding-top">
                                      <div class="col-sm-4">
                                          <label class="control-label pull-left" >Head of Operating Unit:</label>
                                      </div>
                                      <div class="col-sm-8">
                                          <input type="text" class="form-control" name="ous_head" value="<?= $row['ous_head']?>" required>
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
        
        <?php if($this->session->flashdata('add_operating_units')) : ?>
            
            <div class="toast" data-autohide="false" style="position: absolute; top: 150px; right: 0; min-width: 300px;">
                <div class="toast-header bg-red">
                <strong class="mr-auto"><i class="fa fa-bullhorn"></i> System Message</strong>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
                </div>
                <div class="toast-body">
                <?= $this->session->flashdata('add_operating_units'); ?>
                </div>
            </div>

        <?php $this->session->unset_userdata('add_operating_units'); endif;?>

        <?php if($this->session->flashdata('edit_operating_units')) : ?>
            
            <div class="toast" data-autohide="false" style="position: absolute; top: 150px; right: 0; min-width: 300px;">
                <div class="toast-header bg-red">
                <strong class="mr-auto"><i class="fa fa-bullhorn"></i> System Message</strong>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
                </div>
                <div class="toast-body">
                <?= $this->session->flashdata('edit_operating_units'); ?>
                </div>
            </div>

        <?php $this->session->unset_userdata('edit_operating_units'); endif;?>

		<?php if($this->session->flashdata('delete_operating_units')) : ?>
            
            <div class="toast" data-autohide="false" style="position: absolute; top: 150px; right: 0; min-width: 300px;">
                <div class="toast-header bg-red">
                <strong class="mr-auto"><i class="fa fa-bullhorn"></i> System Message</strong>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
                </div>
                <div class="toast-body">
                <?= $this->session->flashdata('delete_operating_units'); ?>
                </div>
            </div>

        <?php $this->session->unset_userdata('delete_operating_units'); endif;?>
  <?php }?>
<?php }else{
redirect (base_url());
}?>

