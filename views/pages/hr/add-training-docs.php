<!--Add Exhibits-->
<!-- Modal Add Polcies -->
<div class="modal fade delete" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl" role="document">	
		<div class="modal-content">

			<div class="modal-header">
				<h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus"></i> Add Training</h3>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					</button>
			</div>

			<div class="modal-body">
				<?= form_open_multipart('add_training_docs'); ?>

				<div class="row">
					<div class="col-sm-6 " >
						<input type="hidden" name="usr_id" value="<?= $this->session->usr_id?>">
						<!--Start Description-->
						<div class="row form-group">
							<div class="col-sm-4">
								<label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-graduation-cap" aria-hidden="true"></i><b> Title of Learning and Development (LD) </b></label>
							</div>
							<div class="col-sm-8">
								<textarea class="form-control" rows="3" name="title_LD" placeholder="Computer System Servicing" required></textarea>
							</div>
						</div>


						<div class="row form-group">
							<div class="col-sm-4">
								<label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-calendar"></i><b> From (Date)</b></label>
							</div>
							<div class="col-sm-8">
								<input type="date" class="form-control" name="date_from">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-sm-4">
								<label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-calendar"></i><b> To (Date)</b></label>
							</div>
							<div class="col-sm-8">
								<input type="date" class="form-control" name="date_to">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-sm-4">
								<label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-clock-o" aria-hidden="true"></i><b> No. of Hours</b></label>
							</div>
							<div class="col-sm-8">
								<input type="number" min="1" class="form-control" name="no_hours">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-sm-4">
								<label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-graduation-cap" aria-hidden="true"></i><b> Type of LD </b></label>
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
								<label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-institution"></i><b> Conducted/ Sponsored by</b></label>
							</div>
							<div class="col-sm-8">
								<textarea class="form-control" rows="2" name="conducted" placeholder="TESDA R02 Regional Training Center"></textarea>
							</div>
						</div>

						<div class="row form-group">
							<div class="col-sm-4">
								<label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-file-pdf-o" aria-hidden="true"></i><b> Certificate of Completion/ Training/ Participation </b></label>
							</div>
							<div class="col-sm-8">
								<input class="filestyle" data-buttonBefore="true" data-text="Browse file" data-badge="true" data-badgeName="badge-danger" data-placeholder="Please select only pdf file." type='file' name='cot' accept="application/pdf">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-sm-4">
								<label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-file-pdf-o" aria-hidden="true"></i><b> REAP/Terminal Report/ Workshop Output/ Written Explanation for non-attendance</b></label>
							</div>
							<div class="col-sm-8">
								<input class="filestyle" data-buttonBefore="true" data-text="Browse file" data-badge="true" data-badgeName="badge-danger" data-placeholder="Please select only pdf file." type='file' name='reap' accept="application/pdf">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-sm-4">
								<label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-file-pdf-o" aria-hidden="true"></i><b> Training and Development Outcome Report Form (TDORF)</b></label>
							</div>
							<div class="col-sm-8 ">
								<input class="filestyle" data-buttonBefore="true" data-text="Browse file" data-badge="true" data-badgeName="badge-danger" data-placeholder="Please select only pdf file." type='file' name='tdorf' accept="application/pdf">
							</div>
						</div>

					</div><!--End of Col-SM-8-->

					<div class="col-sm-6">
						<div class="row form-group" style="padding-right:10px;">
							<label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-newspaper-o"></i><b> Objectives</b> </label>
							<textarea name="objective" class="mytextarea"></textarea>
						</div>

						<div class="row form-group" style="padding-right:10px;">
							<label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-newspaper-o"></i><b> Course Outline</b></label>
							<textarea name="outline" class="mytextarea"></textarea>
						</div>		
					</div><!--End of Col-SM-4-->

				</div><!--End of row-->
			</div><!-- Modal Body-->
										
			<div class="modal-footer">
				<div class="btn-group">
					<button id="addexhibitsubmit" type="submit" value='Upload' name='upload' class="btn btn-danger">Submit</button>
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
