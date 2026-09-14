<!--Add Invitation-->
<div class="modal fade delete" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl" role="document">	
		<div class="modal-content">

			<div class="modal-header">
				<h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus"></i> Add <a data-toggle="tooltip" data-placement="top" title="Add Memo re: Training Invitation | TESDA Order re: Attendnace to Training | Office Order re: Attendnace to Training"><i class="fa fa-info-circle" aria-hidden="true"></i></a></h3>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					</button>
			</div>

			<div class="modal-body">
				<?= form_open_multipart('add_training_inv'); ?>

				<div class="row">
					<div class="col-sm-6 " >
						<input type="hidden" name="year" value="<?= $year?>">
						<!--Start Description-->

						<div class="row form-group">
							<div class="col-sm-4">
								<label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-search-plus" aria-hidden="true"></i> <b>Reference No.:</b></label>
							</div>
							<div class="col-sm-8">
							<input type="text"  class="form-control" name="inv_memo_no" value="<?= $memo_no?>" readonly>
							</div>
						</div>

						<div class="row form-group">
							<div class="col-sm-4">
								<label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-institution"></i> <b>Sponsoring Agency:</b></label>
							</div>
							<div class="col-sm-8">
								<textarea class="form-control" rows="2" name="spo_agency" placeholder="Japan International Cooperation Agency"></textarea>
							</div>
						</div>

						<div class="row form-group">
							<div class="col-sm-4">
								<label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-institution"></i> <b> Agency Category:</b></label>
							</div>
							<div class="col-sm-8">
								<select class="form-control" name="agn_category">
									<option value="Foreign">Foreign</option>
									<option value="National">National (Central Office)</option>
									<option value="Local">Local (CSC, DBM, etc.)</option>
									<option value="Regional">Regional Office Initiated Programs</option>
								</select>
							</div>
						</div>

						<div class="row form-group">
							<div class="col-sm-4">
								<label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-leanpub" aria-hidden="true"></i> <b>Subject:</b></label>
							</div>
							<div class="col-sm-8">
								<textarea class="form-control" rows="3" name="trn_subject" placeholder="Attendance to the Strengthening Safety Management System of Agricultural Products"></textarea>
							</div>
						</div>


						<div class="row form-group">
							<div class="col-sm-4">
								<label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-graduation-cap" aria-hidden="true"></i> <b>Title of Learning and Development (LD):</b></label>
							</div>
							<div class="col-sm-8">
								<textarea class="form-control" rows="3" name="title_LD" placeholder="Strengthening Safety Management System of Agricultural Products"></textarea>
							</div>
						</div>

						<div class="row form-group">
							<div class="col-sm-4">
								<label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-calendar"></i><b> From (Date): </b></label>
							</div>
							<div class="col-sm-8">
								<input id="date_from" type="date" class="form-control" name="date_from">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-sm-4">
								<label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-calendar"></i> <b>To (Date): </b></label>
							</div>
							<div class="col-sm-8">
								<input id="date_to" type="date" class="form-control" name="date_to" onchange="getDays()">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-sm-4">
								<label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-clock-o" aria-hidden="true"></i><b> No. of Hours:</b></label>
							</div>
							<div class="col-sm-8">
								<input id="no_hours" type="number" min="1" class="form-control" name="no_hours">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-sm-4">
								<label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-graduation-cap" aria-hidden="true"></i>  <b>Type of LD:</b></label>
							</div>
							<div class="col-sm-8">
								<select class="form-control" name="type_LD">
									<option value="Administrative">Administrative</option>
									<option value="Leadership">Leadership</option>
									<option value="Managerial">Managerial</option>
									<option value="Supervisory">Supervisory</option>
									<option value="Technical">Technical</option>
									<option value="Foundation">Foundation</option>
								</select>
							</div>
						</div>

						<div class="row form-group">
							<div class="col-sm-4">
								<label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-calendar"></i> <b>Deadline of Submission:</b></label>
							</div>
							<div class="col-sm-8">
								<input type="date" class="form-control" name="date_deadline">
							</div>
						</div>

						<div class="row form-group terms-conditions">
							<div class="col-sm-12">
								<div class="form-check">
								<label class="form-check-label" for="defaultCheck0"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> <b>Document/s to submit</b></label>
								</div>
								<div class="form-check mt-2">
								<input class="checkbox-template" id="defaultCheck0" type="checkbox" value="1" name="reap">
								<label class="form-check-label" for="defaultCheck0"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> <b>Re-Entry Action Plan</b></label>
								</div>
								<div class="form-check">
								<input class="checkbox-template" id="defaultCheck1" type="checkbox" value="1" name="TR">
								<label class="form-check-label" for="defaultCheck1"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> <b>Terminal Report</b> </label>
								</div>
								<div class="form-check">
								<input class="checkbox-template trn_output" id="defaultCheck2" type="checkbox" value="1" name="trn_output">
								<label class="form-check-label" for="defaultCheck2"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> <b>Workshop Output, etc.</b> </label>
								</div>
								<div class="form-check">
									<textarea name="trn_others" class="form-control trn_others" rows="3" placeholder="and Workshop Output" disabled></textarea>
								</div>
                          	</div>
						</div>


					</div><!--End of Col-SM-8-->

					<div class="col-sm-6">

						<div class="row form-group" style="padding-right:15px;">
							<label class="control-label pull-left" style="position:relative;"><i class="fa fa-bookmark-o" aria-hidden="true"></i> <b>Qualifications:</b></label>
							<textarea name="qualifications" class="mytextarea"></textarea>
						</div>

						<div class="row form-group" style="padding-right:15px;">
							<label class="control-label pull-left" style="position:relative;"><i class="fa fa-map-marker"></i> <b>Training Venue</b></label>
							<input type="text"  class="form-control" name="venue" placeholder="Tuguegarao City, Cagayan">
						</div>

						<div class="row form-group" style="padding-right:15px;">
							<p class="control-label pull-left" style="position:relative;">Document Type: <b> <a data-toggle="tooltip" data-placement="top" title="Memo re: Training Inviation">Memo</a> &nbsp<input type="radio" name="optradio" value="1" required> | <a data-toggle="tooltip" data-placement="top" title="TESDA Order re: Attendance"> TESDA Order </a>&nbsp <input type="radio" name="optradio" value="2" > | <a data-toggle="tooltip" data-placement="top" title="Office Order re: Attendance"> Office Order </a>&nbsp<input type="radio" value="3" name="optradio"> </b> <br>Classification: <b> <i class="fa fa-check"></i> <a data-toggle="tooltip" data-placement="top" title="To be included in Training Program Monitoring Report Form"> TPMR? </a> &nbsp<input type="radio" value="1" name="trn_tpmr" required> | <i class="fa fa-file-word-o" aria-hidden="true"></i> <a data-toggle="tooltip" data-placement="top" title="Training Invitations"> Invitation? </a> &nbsp<input type="radio" value="2" name="trn_tpmr"></b> <br> <i class="fa fa-file-pdf-o" aria-hidden="true"></i> <b>Document No:</b></p> 
							<input type="text" class="form-control" name="train_no" placeholder="0352 s. 2022">
						</div>

						<div class="row form-group" style="padding-right:15px;">
							<label class="control-label pull-left" style="position:relative;"><i class="fa fa-paperclip" aria-hidden="true"></i> <b>Attachment (e.g. Memo, TESDA Order, etc.)</b></label>
							<input class="filestyle" data-buttonBefore="true" data-text="Browse file" data-badge="true" data-badgeName="badge-danger" data-placeholder="Please select only pdf file." type='file' name='trail' accept="application/pdf">	
						</div>

						<div id="accordion" style="padding-right:15px;">
							<div class="card no-margin-top no-margin-bottom no-padding-bottom">
								<div class="card-header">
									<a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
									<i class="fa fa-paper-plane-o" aria-hidden="true"></i> <b>SEND TO:</b> (Operating Units)
									</a>
								</div>
								<div id="collapseTwo" class="collapse" data-parent="#accordion">
									<div class="card-body">
								
									<div class="row form-group">
										<label class="control-label pull-left" style="position:relative;"><i class="fa fa-commenting-o" aria-hidden="true"></i><b>  Additional Message:</b></label>
										<textarea name="add_message" rows="4" class="form-control"></textarea>
									</div>

										<input type="checkbox" id="chkSelectAllInv"><b> Select all</b>
											<div id="ous" class="list-group">
												<?php foreach($ous_email as $row) {?>
													<a class="list-group-item list-group-item-action pull-left "><input class="chkDelInv" type="checkbox" name="po_email_inv[]" value="<?= $row['ous_email']?>-<?= $row['ous_hrfocal_email']?>-<?= $row['ous_id']?>"> <?= $row['ous_desc']?> </a>
												<?php }?>	
											</div>	
									</div>
								</div>
							</div>
						</div>


					</div><!--End of Col-SM-4-->

				</div><!--End of row-->
			</div><!-- Modal Body-->
										
			<div class="modal-footer">
				<div class="btn-group">
					<button id="addexhibitsubmit" type="submit" value='Upload' name='upload' class="btn btn-danger"> <i class="fa fa-floppy-o"></i> Submit </button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>	
				</div>

				<div id="addexhibitloading" class="spinner-grow text-primary" style="display: none;" role="status">
					<span class="sr-only">Loading... </span>
				</div>	
			</div>

			</form>						
		</div>
    </div>
</div>
<!-- End Modal -->

<script>
	//get the days between two dates
  	function getDays(){
		var start_date = new Date(document.getElementById('date_from').value);
		var end_date = new Date(document.getElementById('date_to').value);
		//Here we will use getTime() function to get the time difference
		var time_difference = end_date.getTime() - start_date.getTime();
		//Here we will divide the above time difference by the no of miliseconds in a day
		var days_difference = time_difference / (1000*3600*24);
		//alert(days_difference);
		document.getElementById('no_hours').value = (days_difference * 8) + 8;
  	}

	$(".trn_output").click(function () {
		if ($(".trn_output").is(":checked")) {
			$(".trn_others")
				.removeAttr("disabled")
		}
		else {
			$(".trn_others")
				.attr("disabled", "disabled")
			
		}
	});
</script>
