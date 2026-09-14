<?php 
if( $this->session->logged_in){
  if( $this->session->role == 'Guest'){
    redirect (base_url().'accreditor');
  }else{ ?>
	

	<div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">List of Nominee/s</h2>
            </div>
          </header>
           <!-- Breadcrumb-->
           <?php require_once('breadcrumb.php'); ?>
      
      <div class="col-lg-12 mt-3">
				<div class="card">
        <div class="card-close">
					<div class="dropdown">
						<button type="button" id="closeCard3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
								<div aria-labelledby="closeCard3" class="dropdown-menu dropdown-menu-right has-shadow">
                  <?php if( $this->session->role == 'Super Admin'){?>
                    <a href="<?= base_url()?>print_nominees/<?= $inv_trn_id ?>" target="_blank" class="dropdown-item edit"> <i class="fa fa-print"></i> List of Endorsed Nominee/s</a>
                    <a data-toggle="modal" href="#downloadexcel1" class="dropdown-item edit"> <i class="fa fa-file-zip-o"></i> Download Nominee/s Attachment (Under Dev't)</a>
                    <a data-toggle="modal" data-target="#upload_endorsement" class="dropdown-item edit"> <i class="fa fa-upload" aria-hidden="true"></i> Upload Memo re: endorsement </a>
                  <?php } ?>
								</div>
					</div>
				</div>
					
					<div class="card-header d-flex align-items-center">
						<h1><span class="badge bg-blue badge-corner"><i class="fa fa-graduation-cap" aria-hidden="true"></i></span> <?= $trn_title ?> </h1>
					</div>

          <div class="card-body">
            <div class="row">

               <!--Check User Level-->      
              <?php if( $this->session->role == 'Super Admin'){ ?>
              <div class="col-md-9">
              <?php } ?>
              <?php if( $this->session->role == 'Admin'){ ?>
              <div class="col-md-12">
              <?php } ?>
               <!--Check User Level-->
                
                <div class="table-responsive"> 
                  <!--Check User Level-->
                  <?php if( $this->session->role == 'Super Admin') { ?>
                    <?= form_open('approve_nominate_selected'); ?>  
                    <input type="hidden" name="back_link" value="<?= $back_link?>">   
                  <?php } ?> 
                  <!--Check User Level-->

                  <!--View Memo Endorsement-->
                  <?php if ($trn_tpmr == '1'){} else {?>
                    <?php if($trn_endorsement_memo == ''){ ?>
                      <a href="#" type="button" class="btn btn-danger btn-sm pull-left" data-toggle="tooltip" title="No File"> <i class="fa fa-eye"> </i> View Endorsement Memo</a>
                    <?php } else { ?>
                      <a href="<?= base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/TESDAOrders/'.$trn_endorsement_memo?>" target="_blank" type="button" class="btn btn-danger btn-sm pull-left" data-toggle="tooltip" title="Filename: <?= $trn_endorsement_memo; ?>"> <i class="fa fa-eye"> </i> View Endorsement Memo <span class="badge badge-warning badge-corner">1</span></a>
                    <?php } ?>
                    <br><br>
                  <?php } ?>      
                  <!--View Memo Endorsement-->

                  <table id="parameters12" class="table table-striped table-hover">
                    <thead>
                      <tr>

                        <th><input type="checkbox" name="select_all" value="1" id="check_email2"></th>
                        <th>#</th>
                        <th>Name</th>
                        <th>Operating Unit</th>
                        <th>Status</th>
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
                      }elseif($row['nmn_status'] == 'Approved'){
                        $nmn_status = '<span class="badge bg-green badge-round">Attended</span>';
                      }elseif($row['nmn_status'] == 'Endorsed'){
                        $nmn_status = '<span class="badge bg-info badge-round">Endorsed</span>';
                      }elseif($row['nmn_status'] == 'Postponed'){
                        $nmn_status = '<span class="badge bg-info badge-round">Postponed</span>';
                      }else{
                        $nmn_status = '<span class="badge bg-warning badge-round">Did Not Attend</span>';
                      }

                      //Check Null
                      if($row['nmn_tdi_form'] == null) {
                        $nmn_tdi_form_disabled = 'disabled';
                      }else{
                        $nmn_tdi_form_disabled = '';
                      }

                      if($row['nmn_tdi_form'] == null) {
                        $nmn_tdi_form_disabled = 'disabled';
                      }else{
                        $nmn_tdi_form_disabled = '';
                      }

                      if($row['nmn_status'] == 'Approved') {
                        $cancel = '';
                      }else{
                        $cancel = 'disabled';
                      }
                      ?>
                      <tr>
                          <td>
                            <input type="checkbox" name="trn_nmn_id[]" value="<?= $row['trn_nmn_id']?>-<?= $row['usr_id']?>">
                          </td>
                          <td><?= $num_row; ?></td>
                          <td><?= $row['usr_name']; ?></td>
                          <td><?= $row['ous_desc']; ?></td>
                          <td><?= $nmn_status ?></td>
                          <td>
                            <button data-toggle="dropdown" type="button" class="btn btn-outline-primary dropdown-toggle btn-sm"><i class="fa fa-tasks"></i> Actions <span class="badge bg-red badge-corner"></span> <span class="caret"></span></button>
                              <div class="dropdown-menu">
                                  
                                  <?php if( $this->session->role == 'Super Admin'){ ?>
                                   <a href="<?= base_url()?>endorse_nominee/<?= $row['trn_nmn_id']?>-<?= $back_link ?>-<?= $row['usr_id']?>" class="dropdown-item cancel"> <i class="fa fa-send"> </i> Endorsed</a>
                                  <div class="dropdown-divider"></div>
                                  <?php } ?>
                                  <a href="<?= base_url()?>approve_nominee/<?= $row['trn_nmn_id']?>-<?= $back_link ?>-<?= $row['usr_id']?>" class="dropdown-item notify"> <i class="fa fa-check"> </i> Attended</a>
                                  <a href="<?= base_url()?>disapprove_nominee/<?= $row['trn_nmn_id']?>-<?= $back_link ?>-<?= $row['usr_id']?>" class="dropdown-item cancel"> <i class="fa fa-times-circle-o"> </i> Did Not Attend</a>
                                  <a href="<?= base_url()?>postpone_nominee/<?= $row['trn_nmn_id']?>-<?= $back_link ?>-<?= $row['usr_id']?>" class="dropdown-item cancel"> <i class="fa fa-calendar" aria-hidden="true"></i> Postponed</a>
                                  <div class="dropdown-divider"></div>
                                  <a href="<?= base_url()?>cancel_nominee/<?= $row['trn_nmn_id']?>-<?= $back_link ?>-<?= $row['usr_id']?>" class="dropdown-item cancel"> <i class="fa fa-ban" aria-hidden="true"></i> Cancel</a>
                                  <a href="<?= base_url()?>delete_nominee/<?= $row['trn_nmn_id']?>-<?= $back_link ?>-<?= $row['usr_id']?>" class="dropdown-item cancel"> <i class="fa fa-trash" aria-hidden="true"></i> Remove</a>
                                  <div class="dropdown-divider"></div>
                                <a href="javascript:;" class="dropdown-item addAttr <?= $nmn_tdi_form_disabled ?>" data-toggle="modal" data-target="#view" data-url_link="<?= $row['nmn_tdi_form']?>" data-toggle="tooltip" title="TDI Form, IPCR etc."> <i class="fa fa-eye"> </i> View Requirements</a>
                              </div> 
                          </td>
                      </tr>
                      <?php } ?>        
                      <!--End Loop-->
                    </tbody>
                  </table>

                  <!-- Notify All -->	
                  <?php if( $this->session->role == 'Super Admin'){ ?>
                    <button type="submit" id="notify" class="btn btn-primary btn-sm notify disabled"><i class="fa fa-check"> </i> Endorse</button>
                    </form>
                  <?php } ?> 						
                  <!-- Notify All -->		

                </div><!-- end of Table-->
              </div>

              <?php if( $this->session->role == 'Super Admin'){ ?>
              
              <div class="col-md-3">
                
                <div id="accordion">
                  <div class="card">

                    <div class="card-header">
                      <a class="card-link" data-toggle="collapse" href="#collapseTwo">
                      <i class="fa fa-check" aria-hidden="true"></i> Operating Unit/s with Nomination <span class="text-right"><i class="fa fa-arrow-circle-down" aria-hidden="true"></i><span>
                      </a>
                    </div>

                    <div id="collapseTwo" class="collapse" data-parent="#accordion">
                      <div class="card-body">
                            <div id="ous" class="list-group">
                              <?php foreach($with_nominees_per_ous as $row) {
                                 $explode = explode('-', $row);?>
                                <a class="list-group-item list-group-item-action pull-left "><span class="badge bg-green badge-corner"> <i class="fa fa-check-circle-o"></i></span><?= $explode[1] ?></a>
                              <?php }?>	
                            </div>	
                      </div>
                    </div>

                    <div class="card-header">
                      <a class="card-link" data-toggle="collapse" href="#collapseOne">
                      <i class="fa fa-times" aria-hidden="true"></i> Operating Unit/s without Nomination <span class="text-right"><i class="fa fa-arrow-circle-down" aria-hidden="true"></i><span>
                      </a>
                    </div>

                    <div id="collapseOne" class="collapse" data-parent="#accordion">
                      <div class="card-body">
                          <div id="ous" class="list-group">
                            <?php foreach($no_nominees_per_ous as $row) { 
                               $explode = explode('-', $row);
                            ?>
                              <a class="list-group-item list-group-item-action pull-left "><span class="badge bg-red badge-corner"> <i class="fa fa-times-circle-o"></i></span><?= $explode[1]?></a>
                            <?php }?>	
                          </div>	
                      </div>
                    </div>

                    <div class="card-header">
                      <a class="card-link" data-toggle="collapse" href="#collapseThree">
                        <i class="fa fa-file-pdf-o" aria-hidden="true"></i> Memorandums of Operating Unit/s<span class="text-right"><i class="fa fa-arrow-circle-down" aria-hidden="true"></i><span>
                      </a>
                    </div>

                    <div id="collapseThree" class="collapse" data-parent="#accordion">
                      <div class="card-body">
                            <div id="ous" class="list-group">
                              <?php foreach($memos as $row) {?>
                                <a href="<?= base_url()?>uploads/TrainingMemos/<?= $row['nom_ous_memo_filename']?>" class="list-group-item list-group-item-action pull-left" data-toggle="tooltip" title="Click to download" download><span class="badge bg-warning badge-corner"> <i class="fa fa-arrow-down"></i></span> <?= $row['ous_desc'] ?></a>
                              <?php }?>	
                            </div>	
                      </div>
                    </div>
                    
                  </div>
                </div>
  

              </div>

              <?php } ?>

            </div><!-- End of Row -->
          </div><!-- End of Card Body-->

            	</div><!--End of Card-->
      </div><!--End of col-lg-6-->
  
    <!-- Notify Loading -->
		<div class="modal fade" id="notifymodal">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-body text-center">
						<span class="spinner-border spinner-border-lg" style="width: 4rem; height: 4rem;" role="status" aria-hidden="true"></span>
  						<span class="sr-only" style="color:#000">Sending...</span>
						<br><br>
						<h4><b>Approving & notifying the nominee/s</b>, please wait...</h4>										
					</div>   
					
				</div>                                                                       
			</div>                                          
		</div>

     <!-- Cancel Loading -->
		<div class="modal fade" id="cancelmodal">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-body text-center">
						<span class="spinner-border spinner-border-lg" style="width: 4rem; height: 4rem;" role="status" aria-hidden="true"></span>
  						<span class="sr-only" style="color:#000">Sending...</span>
						<br><br>
						<h4><b>Cancelling the nominee</b>, please wait...</h4>										
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

      $('a.cancel').click(function(){
				$('#cancelmodal').modal('show')
			});

		});
	</script>

  <script>
      $('.addAttr').click(function() {
      var trn_nmn_id = $(this).data('trn_nmn_id');      
      var back_link = $(this).data('back_link');
      var url_link = $(this).data('url_link'); 
     
      
      $('#trn_nmn_id').val(trn_nmn_id);  
      $('#back_link').val(back_link); 
      $('#url_link').prop('src', '<?= base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/TDIForms/';?>'+url_link); 
      } );

  </script>

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

<!--Modal Endorsement-->
    <!--Edit Categories-->
    <div class="modal fade delete " id="upload_endorsement" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-md" role="document">	
        <div class="modal-content">

          <div class="modal-header">
            <h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-upload"></i> Upload Memo re: Edorsement</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>

          <div class="modal-body no-padding">
            <?= form_open_multipart('upload_memo_endorsement'); ?>
              <input id="inv_trn_id" type="hidden" name="inv_trn_id" value="<?= $inv_trn_id ?>">
              
                <div class="card no-margin-bottom no-padding-bottom">
                  <div class="card-body">
                    <!--Start Description-->
                    <div class="row form-group" style="padding-top:5px;padding-right:30px;padding-left:30px">
                      <div class="col-sm-4">
                        <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-sticky-note-o"></i> Memo No.:</label>
                      </div>
                      <div class="col-sm-8">
                        <input type="hidden" name="back_link" value="<?= $back_link?>">   
                        <input type="text" class="form-control" name="endorsement_memo_no" required>
                      </div>
                    </div>

                    <div class="row form-group" style="padding-top:2px;padding-left:30px;padding-right:45px;">
                      <input class="filestyle" data-buttonBefore="true" data-text="Browse file" data-badge="true" data-badgeName="badge-danger" data-placeholder="Please select only pdf file." type='file' name='memo_end' accept="application/pdf" required>
                    </div>
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
<!--End Modal Endorsement-->

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

<?php } ?>				
<?php }else{
	redirect(base_url());
}?>
