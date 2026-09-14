<?php 
if( $this->session->logged_in){
  if( $this->session->role == 'Guest'){
    redirect (base_url().'accreditor');
  }else{?>
	

	<div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Users</h2>
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
						<h1><span class="badge bg-warning badge-corner"><i class="fa fa-user"></i></span> Users </h1>
						
					</div>
                    <div class="card-body">
                      <div id="alert_message_accounts" class="table-responsive"> 
					  <small><strong>Note:</strong> This page reloads every five (5) minutes. </small>
					                     
                        <table id="account1" class="table table-striped table-hover">
                          <thead>
                            <tr>
							  <th>#</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Role</th>
							  <th>Status</th>
							  <th></th>
                            </tr>
						  </thead>
						  
                    	  <tbody id="user_accounts_tbody">
						
						  <?php 
							$num_row = 0;
							foreach ($accounts as $row) { 
							$num_row++;
							?>
							
								<tr>
									<td><?= $num_row; ?></td>
									<td><p><?= $row['usr_name']; ?></td></p>
									<td><p><?= $row['usr_email']; ?></td></p>
									<td>
										<?php if($row['usr_role']=='Super Admin'){?>
											<p><span class="badge bg-red badge-corner"><i class="fa fa-user-secret"></i> <?= $row['usr_role']; ?></span></p>
										<?php }else {?>	
											<p><span class="badge bg-warning badge-corner"><i class="fa fa-user"></i> <?= $row['usr_role']; ?></span></p>
										<?php }?>	
									</td>
									<?php if($row['usr_status']=='Approved'){?>
										<td><span class="badge bg-green badge-corner"><i class="fa fa-check"></i> <?= $row['usr_status']; ?></span></td>
									<?php }elseif($row['usr_status']=='pending') {?>
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
										<td><span class="badge bg-warning badge-corner blinking"><i class="fa fa-exclamation-circle"></i> <?= $row['usr_status']; ?></span></td>
									<?php }else {?>
										<td><span class="badge bg-red badge-corner"><i class="fa fa-ban"></i> <?= $row['usr_status']; ?></span></td>
									<?php }?>
									<td class="text-center">
										<button data-toggle="dropdown" type="button" class="btn btn-outline-danger dropdown-toggle btn-sm"><i class="fa fa-gear"></i> Settings <span class="caret"></span></button>
											<div class="dropdown-menu">

												<?php if($row['usr_role'] == "Super Admin"){?>
													<a href="approved_user/<?= $row['usr_id'] ?>" class="dropdown-item disabled"><i class="fa fa-check"></i> Approve</a>
													<div class="dropdown-divider"></div>
													<a href="block_user/<?= $row['usr_id'] ?>" class="dropdown-item disabled"><i class="fa fa-ban"></i> Block</a>
													<a href="delete_user/<?= $row['usr_id'] ?>" id="delete" class="dropdown-item disabled" data-toggle="modal" data-target="#delete<?= $row['usr_id'] ?>"><i class="fa fa-trash"></i> Delete</a>
													<a href="resetpassword_user/<?= $row['usr_id'] ?>" class="dropdown-item"><i class="fa fa-key"></i> Reset Password</a>
													<?php if ($this->session->role == "Super Admin") { ?>
														<a data-toggle="modal" href="#user_access" id="view" class="dropdown-item access" data-edit_access_usr_id="<?= $row['usr_id'] ?>"><i class="fa fa-universal-access" aria-hidden="true"></i> Set Access</a>
													<?php } ?>
													<div class="dropdown-divider"></div>
													<?php if ($this->session->ous_id == 1) { ?>
														<a href="#" data-qrcode_usr_id="<?= $row['usr_id'] ?>" class="dropdown-item qrcode"><i class="fa fa-qrcode"></i> Create QR Code CSO</a>
														<a href="#modal_qrcode" data-toggle="modal" data-qrcode_usr_id_view="<?= $row['usr_id'] ?>" data-qrcode_type="CSO" class="dropdown-item qrcode_view"><i class="fa fa-qrcode"></i> View QR Code CSO</a>
														<a href="#modal_qrcode" data-toggle="modal" data-qrcode_usr_id_view="<?= $row['usr_id'] ?>" data-qrcode_type="ICT" class="dropdown-item qrcode_view_ict"><i class="fa fa-qrcode"></i> View QR Code ICT</a>
													<?php } ?>
													<div class="dropdown-divider"></div>
													<a href="accreditor_user/<?= $row['usr_id'] ?>" class="dropdown-item disabled"><i class="fa fa-user"></i> Set as Guest</a>
													<a href="u_user/<?= $row['usr_id'] ?>" class="dropdown-item disabled"><i class="fa fa-user"></i> Set as User</a>
													<a href="test_user/<?= $row['usr_id'] ?>" class="dropdown-item disabled"><i class="fa fa-user"></i> Set as Administrator</a>
													<a href="su_user/<?= $row['usr_id'] ?>" class="dropdown-item disabled"><i class="fa fa-user"></i> Set as Super Administrator</a>
												
												<?php } elseif($row['usr_role'] == "Admin"){?>
													<a href="approved_user/<?= $row['usr_id'] ?>" class="dropdown-item disabled"><i class="fa fa-check"></i> Approve</a>
													<div class="dropdown-divider"></div>
													<a href="block_user/<?= $row['usr_id'] ?>" class="dropdown-item disabled"><i class="fa fa-ban"></i> Block</a>
													<a href="delete_user/<?= $row['usr_id'] ?>" id="delete" class="dropdown-item" data-toggle="modal" data-target="#delete<?= $row['usr_id'] ?>"><i class="fa fa-trash"></i> Delete</a>
													<a href="resetpassword_user/<?= $row['usr_id'] ?>" class="dropdown-item"><i class="fa fa-key"></i> Reset Password</a>
													<?php if ($this->session->role == "Super Admin") { ?>
														<a data-toggle="modal" href="#user_access" id="view" class="dropdown-item access" data-edit_access_usr_id="<?= $row['usr_id'] ?>"><i class="fa fa-universal-access" aria-hidden="true"></i> Set Access</a>
													<?php } ?>
													<div class="dropdown-divider"></div>
													<?php if ($this->session->ous_id == 1) { ?>
														<a href="#" data-qrcode_usr_id="<?= $row['usr_id'] ?>" class="dropdown-item qrcode"><i class="fa fa-qrcode"></i> Create QR Code CSO</a>
														<a href="#modal_qrcode" data-toggle="modal" data-qrcode_usr_id_view="<?= $row['usr_id'] ?>" data-qrcode_type="CSO" class="dropdown-item qrcode_view"><i class="fa fa-qrcode"></i> View QR Code CSO</a>
														<a href="#modal_qrcode" data-toggle="modal" data-qrcode_usr_id_view="<?= $row['usr_id'] ?>" data-qrcode_type="ICT" class="dropdown-item qrcode_view_ict"><i class="fa fa-qrcode"></i> View QR Code ICT</a>
													<?php } ?>
													<div class="dropdown-divider"></div>
													<a href="accreditor_user/<?= $row['usr_id'] ?>" class="dropdown-item "><i class="fa fa-user"></i> Set as Guest</a>
													<a href="u_user/<?= $row['usr_id'] ?>" class="dropdown-item"><i class="fa fa-user"></i> Set as User</a>
													<a href="test_user/<?= $row['usr_id'] ?>" class="dropdown-item disabled"><i class="fa fa-user"></i> Set as Administrator</a>
													
												<?php }else {?>

													<?php if ($row['usr_status'] == 'Approved') {?>
														<a href="approved_user/<?= $row['usr_id'] ?>" class="dropdown-item disabled"><i class="fa fa-check"></i> Approve</a>
														<div class="dropdown-divider"></div>
														<a href="block_user/<?= $row['usr_id'] ?>" class="dropdown-item"><i class="fa fa-ban"></i> Block</a>
														<a href="delete_user/<?= $row['usr_id'] ?>" id="delete" class="dropdown-item" data-toggle="modal" data-target="#delete<?= $row['usr_id'] ?>"><i class="fa fa-trash"></i> Delete</a>
														<a href="resetpassword_user/<?= $row['usr_id'] ?>" class="dropdown-item"><i class="fa fa-key"></i> Reset Password</a>
														<div class="dropdown-divider"></div>
														<?php if ($this->session->ous_id == 1) { ?>
														<a href="#" data-qrcode_usr_id="<?= $row['usr_id'] ?>" class="dropdown-item qrcode"><i class="fa fa-qrcode"></i> Create QR Code CSO</a>
														<a href="#modal_qrcode" data-toggle="modal" data-qrcode_usr_id_view="<?= $row['usr_id'] ?>" data-qrcode_type="CSO" class="dropdown-item qrcode_view"><i class="fa fa-qrcode"></i> View QR Code CSO</a>
														<a href="#modal_qrcode" data-toggle="modal" data-qrcode_usr_id_view="<?= $row['usr_id'] ?>" data-qrcode_type="ICT" class="dropdown-item qrcode_view_ict"><i class="fa fa-qrcode"></i> View QR Code ICT</a>
													<?php } ?>
														<div class="dropdown-divider"></div>
														<a href="accreditor_user/<?= $row['usr_id'] ?>" class="dropdown-item"><i class="fa fa-user"></i> Set as Guest</a>
														<a href="u_user/<?= $row['usr_id'] ?>" class="dropdown-item disabled"><i class="fa fa-user"></i> Set as User</a>
														<a href="test_user/<?= $row['usr_id'] ?>" class="dropdown-item"><i class="fa fa-user"></i> Set as Administrator</a>
														
														
													<?php }else{ ?>

														<a href="approved_user/<?= $row['usr_id'] ?>" class="dropdown-item"><i class="fa fa-check"></i> Approve</a>
														<div class="dropdown-divider"></div>
														<a href="block_user/<?= $row['usr_id'] ?>" class="dropdown-item disabled"><i class="fa fa-ban"></i> Block</a>
														<a href="delete_user/<?= $row['usr_id'] ?>" id="delete" class="dropdown-item disabled" data-toggle="modal" data-target="#delete<?= $row['usr_id'] ?>"><i class="fa fa-trash"></i> Delete</a>
														<a href="resetpassword_user/<?= $row['usr_id'] ?>" class="dropdown-item disabled"><i class="fa fa-key"></i> Reset Password</a>
														<div class="dropdown-divider"></div>
														<a href="accreditor_user/<?= $row['usr_id'] ?>" class="dropdown-item disabled"><i class="fa fa-user"></i> Set as Guest</a>	
														<a href="u_user/<?= $row['usr_id'] ?>" class="dropdown-item disabled disabled"><i class="fa fa-user"></i> Set as User</a>
														<a href="test_user/<?= $row['usr_id'] ?>" class="dropdown-item disabled"><i class="fa fa-user"></i> Set as Administrator</a>
														
													<?php } ?> 

												<?php } ?> 
												
												
											</div> 		
									</td>
								</tr>
								<?php } ?>
								</tbody>
							</table>

							<?php 
								foreach ($accounts as $row) { 
							?>				
							
								<!-- Modal Delete -->
									<div class="modal fade delete" id="delete<?= $row['usr_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
									
										<div class="modal-content">
										<div class="modal-header">
											<h3 class="modal-title" id="exampleModalLabel">Warning!</h3>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
											</button>
										</div>
										
										<div class="modal-body text-center">
											<?= form_open('delete_user'); ?>
												<h4>Are you sure you want to delete <span class="red"><?= $row['usr_name']; ?></span>?</h4>
												<input type="hidden" name="usr_id" value="<?= $row['usr_id'] ?>">
										</div>
										
										<div class="modal-footer">
											<div class="btn-group">
												<button type="submit" class="btn btn-danger">Yes</button>
												<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>	
											</div>
										</form>	
										</div>
										
										</div>
									</div>
									</div>
									<!-- End Modal -->
							<?php } ?>			
                      </div>
                    </div>

            	</div><!--End of Card-->
        	</div><!--End of col-lg-12 mt-3-->
				

			<!-- Modal Access -->
			<div class="modal fade delete" id="user_access" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
				
					<div class="modal-content">
					<div class="modal-header">
						<h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-universal-access" aria-hidden="true"></i> Set Access</h3>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>

					
						<div class="modal-body">
						
						<form action="" method="POST" id="edit_access_form" role="form">
                		<input type="hidden" id="edit_access_usr_id" name="edit_access_usr_id">	

						<!-- fasd_access -->
						<div class="row form-group">
							<div class="col-sm-4">
								<label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-division" aria-hidden="true"></i><b> FASD Services</b></label>
							</div>
							<div class="col-sm-8">
								<select id="fasd_access" class="form-control" name="fasd_access">   
									<option value="1">Yes</option>
									<option value="0">No</option>
								</select>
							</div>
						</div>
						<!-- fasd_access -->

						<!-- rod_access -->
						<div class="row form-group">
							<div class="col-sm-4">
								<label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-division" aria-hidden="true"></i><b> ROD Services</b></label>
							</div>
							<div class="col-sm-8">
								<select id="rod_access" class="form-control" name="rod_access">   
									<option value="1">Yes</option>
									<option value="0">No</option>
								</select>
							</div>
						</div>
						<!-- rod_access -->
							
						</div>

						<form>
					
					<div class="modal-footer">
						<div class="btn-group">
							<button type="submit" class="btn btn-danger">Submit</button>
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>	
						</div>
					</form>	
					</div>
					
					</div>
				</div>
			</div>
			<!-- End Access -->

			<!-- Modal QR Code -->
			<div id="modal_qrcode" class="modal fade delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-md" role="document">
				
					<div class="modal-content">
						<div class="modal-header">
							<h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-qrcode" aria-hidden="true"></i> QR Code</h3>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>

					
						<div id="qrcode_modal_body" class="modal-body">
						<div class="alert alert-success mt-2"><p style="text-align: justify;"><i class="fa fa-qrcode"></i> <b id="show_qrcod_text"></b></p></div>
							<center><img id="qrcode_image" src="" alt="QR Code" width="100%" style="display: none;">
							<h2 id="placeholder_text">No QR code available.</h2></center>
						</div>

					
						<div class="modal-footer">
							<div class="btn-group">
								<button id="print_qrcode" class="btn btn-warning">Print QR Code</button>
								<a id="download_qrcode" class="btn btn-primary" href="#" download="qrcode.png">Download</a>
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>	
							</div>
						</div>
					
					</div>
				</div>
			</div>
			<!-- End Access -->
									
		<script>

//----------------Create QR Code--------------

        //get data  
        $('#user_accounts_tbody').on('click','.qrcode',function(){
              var qrcode_usr_id = $(this).data('qrcode_usr_id');
			  $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url().'create_qr_code'?>",
                    dataType : "JSON",
                    data : {qrcode_usr_id:qrcode_usr_id},
                    success: function(data){
						html = '<div id class="alert alert-success alert_message mt-2"><i class="fa fa-qrcode"></i> <b> QR Code created successfully. </b><span class="pull-right"> <a href="#modal_qrcode" data-toggle="modal" class="qrcode_view" data-qrcode_usr_id_view="'+ qrcode_usr_id +'"><i class="fa fa-eye"></i> <b> View<b></a></span></div>';
						$('#alert_message_accounts').prepend(html);
						
						//Hide
						$(".alert_message").delay(10000).slideUp(200, function() {
							$(this).alert('close');
						});
                    }
                });
        });
//----------------Create QR Code--------------

//----------------View QR Code CSO--------------

        // Get data
		$('#alert_message_accounts').on('click', '.qrcode_view', function() {
			var qrcode_usr_id_view = $(this).data('qrcode_usr_id_view');
			$.ajax({
				type: "POST",
				url: "<?php echo base_url().'view_qr_code'?>",
				dataType: "JSON",
				data: { qrcode_usr_id_view: qrcode_usr_id_view },
				success: function(data) {
					
					showQRCodeModal(data['usr_cso_qrcode']), false;
					
				},
				error: function(xhr, status, error) {
					// Handle any errors that occur during the AJAX request
					console.error("Error: " + error);
				}
			});
		});

//----------------View QR Code--------------

//----------------View QR Code ICT--------------

        // Get data
		$('#alert_message_accounts').on('click', '.qrcode_view_ict', function() {
			var qrcode_usr_id_view = $(this).data('qrcode_usr_id_view');
			$.ajax({
				type: "POST",
				url: "<?php echo base_url().'view_qr_code_ict'?>",
				dataType: "JSON",
				data: { qrcode_usr_id_view: qrcode_usr_id_view },
				success: function(data) {
					
					showQRCodeModal(data['usr_ict_qrcode'], true);
					
				},
				error: function(xhr, status, error) {
					// Handle any errors that occur during the AJAX request
					console.error("Error: " + error);
				}
			});
		});

//----------------View QR Code--------------

//----------------Show modal QR Code--------------

		function showQRCodeModal(base64QRCode, type) {
			var text ='';
			if (type){
				text = 'Note: The link in this QR code is your personal identification for the Helpdesk System. Please download or print the QR code and place it somewhere easy to see and scan.'
			}else{
				text = 'Note: The link in this QR code is your personal identification for the Client Satisfaction Measurement (CSM) System. Please download/print the QR code and put it somewhere easy for your clients to see and scan.'
			}

			$("#show_qrcod_text").text(text);
			
			if (base64QRCode) {
                // Show the QR code image and download button, hide the placeholder text
                $("#qrcode_image").attr("src", "data:image/png;base64," + base64QRCode).show();
                $("#download_qrcode").attr("href", "data:image/png;base64," + base64QRCode).show();
                $("#placeholder_text").hide();
            } else {
                // Hide the QR code image and download button, show the placeholder text
                $("#qrcode_image").hide();
				$("#qrcode_image").attr("src", "");
                $("#download_qrcode").hide();
                $("#placeholder_text").show();
            }
           
        }

//----------------Show modal QR Code--------------

//----------------Print QR Code--------------

		// Bind the print button to the printQRCode function
		$("#print_qrcode").click(function() {
            printQRCode();
        });

		// Function to print the QR code
		function printQRCode() {
			var printWindow = window.open('', '', 'height=600,width=800');
			var qrcodeImageSrc = $("#qrcode_image").attr("src");
			printWindow.document.write('<html><head><title>Print QR Code</title>');
			printWindow.document.write('<style>');
			printWindow.document.write('body { font-family: Arial, sans-serif; padding: 20px; text-align: center; }');
			printWindow.document.write('.container { width: 4in; height: 5.3in; border: 2px solid #000; margin: 0 auto; display: flex; flex-direction: column; justify-content: center; align-items: center; }');
			printWindow.document.write('img { width: 4in; height: 4in; }');
			printWindow.document.write('p { margin: 0; font-size: 16px; font-weight: bold; }');
			printWindow.document.write('</style>');
			printWindow.document.write('</head><body >');
			printWindow.document.write('<div class="container">');
			printWindow.document.write('<h2>HELP US SERVE YOU BETTER!</h2>'); // Text before the QR code
			printWindow.document.write('<p>Your feedback on your recently concluded transaction will help this office provide a better service.</p>'); // Text before the QR code
			printWindow.document.write('<img src="' + qrcodeImageSrc + '" />');
			printWindow.document.write('</div>');
			printWindow.document.write('</body></html>');
			printWindow.document.close();
			printWindow.focus();
			printWindow.print();
		}



//----------------Print QR Code--------------



//----------------Set User Access--------------

        //get data  
        $('#user_accounts_tbody').on('click','.access',function(){
              var edit_access_usr_id = $(this).data('edit_access_usr_id');
              $('#edit_access_usr_id').val(edit_access_usr_id);
        });

        $('#edit_access_form').submit(function(e){
            e.preventDefault(); 
                 $.ajax({
                     url: "<?php echo base_url().'edit_access_form'?>",
                     type: "post",
                     data: new FormData(this),
                     processData: false,
                     contentType: false,
                     cache: false,
                     async: false,
                      success: function(data){
                        var json = $.parseJSON(data);
                        if(json.status == 'True'){
                            html = '<div class="alert alert-success alert_message mt-2"><i class="fa fa-check-circle" aria-hidden="true"></i> <b>'+ json.error +'</b></div>';
                              $('#edit_access_form').prepend(html);
                              
                              //Clear Text Box
                              //$('[name="edit_target_id"]').val("");

                        }else{
                          html = '<div class="alert alert_message alert-danger mt-2"><i class="fa fa-times-circle" aria-hidden="true"></i> <b>'+ json.error +'</b></div>';
                              $('#edit_access_form').prepend(html);

                              //Clear Text Box
                              
                        }
                       
                        //Hide
                        $(".alert_message").delay(4000).slideUp(200, function() {
                            $(this).alert('close');
                        });
                   }
                 });
            });

//----------------Set User Access--------------

		</script>

			
				<!--Message Box-->

				<?php if($this->session->flashdata('delete_user')) : ?>

					<div class="toast" data-autohide="false" style="position: absolute; top: 150px; right: 20px; min-width: 300px;">
						<div class="toast-header bg-red">
						<strong class="mr-auto"><i class="fa fa-bullhorn"></i> System Message</strong>
						<button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
						</div>
						<div class="toast-body">
						<?= $this->session->flashdata('delete_user'); ?>
						</div>
					</div>
					
				<?php $this->session->unset_userdata('delete_user'); endif;?>

				<?php if($this->session->flashdata('accreditor_user')) : ?>

					<div class="toast" data-autohide="false" style="position: absolute; top: 150px; right: 20px; min-width: 300px;">
						
						<div class="toast-header bg-red">
							<strong class="mr-auto"><i class="fa fa-bullhorn"></i> System Message</strong>
							<button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
							</div>
							<div class="toast-body">
							<?= $this->session->flashdata('accreditor_user'); ?>
							</div>
						</div>
					</div>

				<?php $this->session->unset_userdata('accreditor_user'); endif;?>

				<?php if($this->session->flashdata('resetpassword_user')) : ?>

					<div class="toast" data-autohide="false" style="position: absolute; top: 150px; right: 20px; min-width: 300px;">
						<div class="toast-header bg-red">
							<strong class="mr-auto"><i class="fa fa-bullhorn"></i> System Message</strong>
							<button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
							</div>
							<div class="toast-body">
							<?= $this->session->flashdata('resetpassword_user') ?>
							</div>
						</div>
					</div>

				<?php endif;?>

				<?php if($this->session->flashdata('block_user')) : ?>
					<div class="toast" data-autohide="false" style="position: absolute; top: 150px; right: 20px; min-width: 300px;">
						<div class="toast-header bg-red">
						<strong class="mr-auto"><i class="fa fa-bullhorn"></i> System Message</strong>
						<button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
						</div>
						<div class="toast-body">
						<?= $this->session->flashdata('block_user'); ?>
						</div>
					</div>
				<?php $this->session->unset_userdata('block_user'); endif;?>

				<?php if($this->session->flashdata('approved_user')) : ?>
					<div class="toast" data-autohide="false" style="position: absolute; top: 150px; right: 20px; min-width: 300px;">
						<div class="toast-header bg-red">
						<strong class="mr-auto"><i class="fa fa-bullhorn"></i> System Message</strong>
						<button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
						</div>
						<div class="toast-body">
						<?= $this->session->flashdata('approved_user'); ?>
						</div>
					</div>
				<?php $this->session->unset_userdata('approved_user'); endif;?>

				<?php if($this->session->flashdata('admin_user')) : ?>
					<div class="toast" data-autohide="false" style="position: absolute; top: 150px; right: 20px; min-width: 300px;">
						<div class="toast-header bg-red">
						<strong class="mr-auto"><i class="fa fa-bullhorn"></i> System Message</strong>
						<button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
						</div>
						<div class="toast-body">
						<?= $this->session->flashdata('admin_user'); ?>
						</div>
					</div>
				<?php $this->session->unset_userdata('admin_user'); endif;?>

				<?php if($this->session->flashdata('accounts')) : ?>
					<div class="toast" data-autohide="false" style="position: absolute; top: 150px; right: 20px; min-width: 300px;">
						<div class="toast-header bg-red">
						<strong class="mr-auto"><i class="fa fa-bullhorn"></i> System Message</strong>
						<button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
						</div>
						<div class="toast-body">
						<?= $this->session->flashdata('accounts'); ?>
						</div>
					</div>
				<?php $this->session->unset_userdata('accounts'); endif;?>

				
				
<?php }?>				
<?php }else{
	redirect(base_url());
}?>
