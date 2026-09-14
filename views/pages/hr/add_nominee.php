<?php 
if( $this->session->logged_in){
  if( $this->session->role == 'Guest'){
    redirect (base_url().'accreditor');
  }else{?>
	

	<div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Employees</h2>
            </div>
          </header>
           <!-- Breadcrumb-->
           <?php require_once('breadcrumb.php'); ?>
      <div class="col-lg-12 mt-3">
      <div class="row">
			<div class="col-lg-6">
				<div class="card">

					<div class="card-close">
						<div class="dropdown">
						
						</div>
					</div>
					
					<div class="card-header d-flex align-items-center">
						<h1><span class="badge bg-warning badge-corner"><i class="fa fa-user"></i></span> List of Registered Employees </h1>
						
					</div>
                    <div class="card-body">
                      <div class="table-responsive"> 
					              <!-- Nominate All -->	
										    <?= form_open('nominate_selected'); ?>   
                        <input type="hidden" name="back_link" value="<?= $back_link?>">   
                        <table id="parameters" class="table table-striped table-hover">
                          <thead>
                            <tr>
                              <th><input type="checkbox" name="select_all" value="1" id="check_email1"></th>
							                <th>#</th>
                              <th>Name</th>
                              <th>Operating Unit</th>
                              <th>Position</th>
							                <th>Actions</th>
                            </tr>
                          </thead>
                          
                          <tbody>
                            <!--Start Loop-->
                            <?php 
                            $num_row = 0;
                            foreach ($employees as $row) { 
                            $num_row++;
                            ?>
                            <tr>
                                <td>
                                  <input type="checkbox" name="emp_nmn_id[]" value="<?= $row['usr_id']?>-<?= $inv_trn_id?>">
                                </td>
                                <td><?= $num_row; ?></td>
                                <td><?= $row['usr_name']; ?></td>
                                <td><?= $row['ous_desc']; ?></td>
                                <td><?= $row['emp_position']; ?></td>
                                <td>
                                  <button data-toggle="dropdown" type="button" class="btn btn-outline-primary dropdown-toggle btn-sm"><i class="fa fa-tasks"></i> Actions <span class="badge bg-red badge-corner"></span> <span class="caret"></span></button>
                                    <div class="dropdown-menu">
                                      <a href="<?= base_url()?>nominate_user/<?= $row['usr_id']?>-<?= $back_link?>" class="dropdown-item notify"> 
                                      <?php if ($trn_tmpr == '1'){ ?>
                                        <i class="fa fa-user-plus" aria-hidden="true"></i> Add
                                      <?php } else {?> 
                                        <i class="fa fa-user-plus" aria-hidden="true"></i> Nominate
                                      <?php } ?>
                                      </a>
                                    </div> 
                                </td>
                            </tr>

                            

                            <?php } ?>        
                            <!--End Loop-->
                          </tbody>
                        </table>

                        <!-- Notify All -->							
                          <button type="submit" id="notify" class="btn btn-primary btn-sm notify"> 
                            <?php if ($trn_tmpr == '1'){ ?>
                              <i class="fa fa-user-plus" aria-hidden="true"></i> Add
                            <?php } else {?> 
                              <i class="fa fa-user-plus" aria-hidden="true"></i> Nominate
                            <?php } ?>
                          </button>
                        </form>
											  <!-- Notify All -->		

                      </div>
                    </div>

            	</div><!--End of Card-->
      </div><!--End of col-lg-12 mt-3-->
    
      <div class="col-lg-6">
				<div class="card">

					<div class="card-close">
						<div class="dropdown">
						
						</div>
					</div>
					
					<div class="card-header d-flex align-items-center">
						<h1><span class="badge bg-warning badge-corner"><i class="fa fa-user"></i></span> 
              <?php if ($trn_tmpr == '1'){ ?>
                Attendee/s
              <?php } else {?> 
                Nominated Employee/s 
              <?php } ?>
            </h1>
					</div>
                    <div class="card-body">
                      <a href="<?= base_url()?>view_nominee/<?= $back_link ?>" type="button" class="btn btn-primary btn-sm pull-left"> <i class="fa fa-eye"> </i> 
                        <?php if ($trn_tmpr == '1'){ ?>
                          View Attendee/s
                        <?php } else {?> 
                          View Nominee/s 
                        <?php } ?>  
                      </a>

                      <?php if ($trn_tmpr == '1'){ ?>
                      <?php } else {?> 
                        <?php if($memo_filename == ''){ ?>
                          <a href="#" type="button" class="btn btn-danger btn-sm pull-right" data-toggle="tooltip" title="No File"> <i class="fa fa-eye"> </i> View Memo</a>
                        <?php } else { ?>
                          <a href="<?= base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/TrainingMemos/'.$memo_filename?>" target="_blank" type="button" class="btn btn-danger btn-sm pull-right" data-toggle="tooltip" title="Filename: <?= $memo_filename; ?> Memo No: <?= $ous_memo_no?>"> <i class="fa fa-eye"> </i> View Memo <span class="badge badge-warning badge-corner">1</span></a>
                        <?php } ?>
                        <a href="#" type="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#uploadmemo"> <i class="fa fa-upload"> </i> Upload Memo re: Nomination</a> 
                      <?php } ?> 
                      <br><br> 
                        <div class="table-responsive"> 
					                     
                        <table id="parameters1" class="table table-striped table-hover">
                          <thead>
                            <tr>
                             
							                <th>#</th>
                              <th>Name</th>
                              <th>Operating Unit</th>
							                <th>Actions</th>
                            </tr>
                          </thead>
                          
                          <tbody>
                            <!--Start Loop-->
                            <?php 
                            $num_row = 0;
                            foreach ($nominees as $row) { 
                            $num_row++;

                            //Check Status
                            if($row['nmn_status'] == 'Pending'){
                              $nmn_status = '<span class="badge bg-red badge-round">Pending</span>';
                            }else if($row['nmn_status'] == 'Endorsed'){
                              $nmn_status = '<span class="badge bg-blue badge-round">Endorsed</span>';
                            }else{
                              $nmn_status = '<span class="badge bg-green badge-round">Attended</span>';
                            }

                            //Check Null
                            if($row['nmn_tdi_form'] == null){
                              $nmn_tdi_form_disabled = 'disabled';
                            }else{
                              $nmn_tdi_form_disabled = '';
                            }
                            ?>
                            <tr>
                                <td><?= $num_row; ?></td>
                                <td><?= $row['usr_name']; ?></td>
                                <td><?= $row['ous_desc']; ?></td>
                                <td>
                                  <button data-toggle="dropdown" type="button" class="btn btn-outline-primary dropdown-toggle btn-sm"><i class="fa fa-tasks"></i> Actions <span class="badge bg-red badge-corner"></span> <span class="caret"></span></button>
                                    <div class="dropdown-menu">
                                      <a href="<?= base_url()?>delete_nomination/<?= $row['trn_nmn_id']?>-<?= $back_link?>" class="dropdown-item delete"> <i class="fa fa-trash"> </i> Remove</a>
                                      <div class="dropdown-divider"></div>
                                      <a href="javascript:;" class="dropdown-item addAttr" data-toggle="modal" data-target="#upload" data-usr_id="<?= $row['usr_id']?>" data-trn_nmn_id="<?= $row['trn_nmn_id']?>" data-back_link="<?= $back_link?>" data-toggle="tooltip" title="TDI Form, IPCR etc."> <i class="fa fa-upload"> </i> Upload Requirements</a>
                                      <a href="javascript:;" class="dropdown-item addAttr <?= $nmn_tdi_form_disabled ?>" data-toggle="modal" data-target="#view" data-url_link="<?= $row['nmn_tdi_form']?>" data-toggle="tooltip" title="TDI Form, IPCR etc."> <i class="fa fa-eye"> </i> View Requirements</a>
                                    </div> 
                                </td>
                            </tr>
                            <?php } ?>        
                            <!--End Loop-->
                          </tbody>
                        </table>

                      </div>
                    </div>

            	</div><!--End of Card-->
      </div><!--End of col-lg-6-->
      </div><!--End of row-->
      </div><!--End of col-lg-12 mt-3-->
  
    <!-- Loading -->
		<div class="modal fade" id="notifymodal">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-body text-center">
						<span class="spinner-border spinner-border-lg" style="width: 4rem; height: 4rem;" role="status" aria-hidden="true"></span>
  						<span class="sr-only" style="color:#000">Sending...</span>
						<br><br>
						<h4><b>Nominating</b>, please wait...</h4>										
					</div>   
					
				</div>                                                                       
			</div>                                          
		</div>

     <!-- Loading -->
		<div class="modal fade" id="deleteymodal">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-body text-center">
						<span class="spinner-border spinner-border-lg" style="width: 4rem; height: 4rem;" role="status" aria-hidden="true"></span>
  						<span class="sr-only" style="color:#000">Sending...</span>
						<br><br>
						<h4><b>Deleting</b>, please wait...</h4>										
					</div>   
					
				</div>                                                                       
			</div>                                          
		</div>

	<script>
		$(document).ready(function(){
			$('#notify').click(function(){
				$('#notifymodal').modal('show')
			});

			$('a.notify').click(function(){
				$('#notifymodal').modal('show')
			});

      $('a.delete').click(function(){
				$('#deleteymodal').modal('show')
			});

		});
	</script>

  <script>
      $('.addAttr').click(function() {
      var trn_nmn_id = $(this).data('trn_nmn_id');      
      var back_link = $(this).data('back_link');
      var url_link = $(this).data('url_link'); 
      var usr_id = $(this).data('usr_id'); 
      
      $('#usr_id').val(usr_id); 
      $('#trn_nmn_id').val(trn_nmn_id);  
      $('#back_link').val(back_link); 
      $('#url_link').prop('src', '<?= base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/TDIForms/';?>'+url_link); 
      } );

  </script>
 

                 <!--Modal Edit-->
                      <!--Edit Categories-->
                      <div class="modal fade delete " id="upload" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
														<div class="modal-dialog modal-md" role="document">	
															<div class="modal-content">

																<div class="modal-header">
																	<h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-upload"></i> Upload Requirements (e.g. TDI Form, IPCR ect.)</h3>
																		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																			<span aria-hidden="true">&times;</span>
																		</button>
																</div>

																<div class="modal-body text-center no-padding">
																	<?= form_open_multipart('upload_tdi_form'); ?>
                                  <input type="hidden" name="uri" value="<?= $this->uri->segment(1) ?>">
                                  <input id="back_link" type="hidden" name="back_link"> 
                                  <input id="trn_nmn_id" type="hidden" name="trn_nmn_id">
                                  <input id="usr_id" type="hidden" name="usr_id"> 
                                  <input id="inv_trn_id" type="hidden" name="inv_trn_id" value="<?= $inv_trn_id ?>"> 
                                  
                                  
																	<!--Start Description-->
																	<div class="row form-group" style="padding-top:15px;padding-left:30px;padding-right:30px;">
                                    <label class="control-label" ><i class="fa fa-folder-open" aria-hidden="true"></i> Browse</label>
                                    <input class="filestyle" data-buttonBefore="true" data-text="Browse file" data-badge="true" data-badgeName="badge-danger" data-placeholder="Please select only pdf file." type='file' name='TDI_form' accept="application/pdf" required>
																	</div>
                                  <?php if( $this->session->role == 'Super Admin'){ ?>
                                  <div class="row form-group" style="padding-left:30px;padding-right:30px;">
                                      <label class="control-label" ><i class="fa fa-calendar"></i> Date Submitted</label>
                                      <input type="date" class="form-control" name="nmn_d_attend">
                                  </div>
                                  <?php } ?>
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

                    <!--Modal View-->
                      <!--Edit Categories-->
                      <div class="modal fade delete " id="view" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
														<div class="modal-dialog modal-xl" role="document">	
															<div class="modal-content">

																<div class="modal-header">
																	<h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-sticky-note-o"></i> View Requirements (e.g. TDI Form, IPCR ect.)</h3>
																		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																			<span aria-hidden="true">&times;</span>
																		</button>
																</div>

																<div class="modal-body">
                                    <iframe id="url_link" src="#" style="width:100%; height:720px; border:0;"></iframe>
																</div>	

															</div>
														</div>
													</div>
													<!-- End Modal -->
                    <!--End Modal View-->


                    <!--Modal MEMO-->
                      <!--Edit Categories-->
                      <div class="modal fade delete " id="uploadmemo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
														<div class="modal-dialog modal-md" role="document">	
															<div class="modal-content">

																<div class="modal-header">
																	<h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-upload"></i> Upload Memorandum</h3>
																		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																			<span aria-hidden="true">&times;</span>
																		</button>
																</div>

																<div class="modal-body text-center no-padding">
																	<?= form_open_multipart('upload_memorandum'); ?>
                                  <input id="back_link" type="hidden" name="back_link" value="<?= $back_link ?>"> 
                                  <input id="inv_trn_id" type="hidden" name="inv_trn_id" value="<?= $inv_trn_id ?>">
                                  
                                  <!--Start Description-->
																	<div class="row form-group" style="padding-top:20px;padding-left:15px;padding-right:15px;">
                                    <div class="col-sm-4">
                                      <label class="control-label pull-left" ><i class="fa fa-newspaper-o"></i> Memo <b>No:</b></label>   
                                    </div>
                                    <div class="col-sm-8">
                                    <input type="text" class="form-control" name="nom_ous_memo_no" pattern="[0-9]{2,3,4,5}" placeholder="e.g. 00001" required>
                                    </div>
																	</div>

																	<!--Start Description-->
																	<div class="row form-group" style="padding-top:15px;padding-left:30px;padding-right:30px;">
                                    <input class="filestyle" data-buttonBefore="true" data-text="Browse file" data-badge="true" data-badgeName="badge-danger" data-placeholder="Please select only pdf file." type='file' name='OUS_Memo' accept="application/pdf" required>
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
  
      <!--Message Box-->
		
	<?php if($this->session->flashdata('success_notification')) : ?>

  <div class="toast" data-autohide="false" style="position: absolute; top: 150px; right: 20px; min-width: 300px;">
    <div class="toast-header bg-red">
      <strong class="mr-auto"><i class="fa fa-bullhorn"></i> System Message</strong>
      <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
    </div>
    <div class="toast-body">
      <?= $this->session->flashdata('success_notification'); ?>
    </div>
  </div>
  <?php $this->session->unset_userdata('success_notification'); endif;?>

<?php }?>				
<?php }else{
	redirect(base_url());
}?>
