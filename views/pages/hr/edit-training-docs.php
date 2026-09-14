<!-- Modal Edit  -->
<div class="modal fade delete" id="edit<?= $row['trn_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl" role="document">	
		<div class="modal-content">

			<div class="modal-header">
				<h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-pencil"></i> Edit Training</h3>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					</button>
			</div>

			<div class="modal-body">
				<?= form_open_multipart('edit_training_docs'); ?>

				<input type="hidden" name="trn_id" value="<?= $row['trn_id'] ?>">
				

				<div class="row">
					<div class="col-sm-6 " >
						<!--Start Description-->
						<div class="row form-group">
							<div class="col-sm-4">
								<label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-graduation-cap" aria-hidden="true"></i><b> Title of Learning and Development (LD) </b></label>
							</div>
							<div class="col-sm-8">
								<textarea class="form-control" rows="3" name="title_LD"><?= $row['trn_learn_dev'] ?></textarea>
							</div>
						</div>


						<div class="row form-group">
							<div class="col-sm-4">
								<label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-calendar"></i><b> From (Date)</b></label>
							</div>
							<div class="col-sm-8">
								<input type="date" class="form-control" name="date_from" value="<?= $row['trn_from_date']?>">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-sm-4">
								<label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-calendar"></i><b> To (Date)</b></label>
							</div>
							<div class="col-sm-8">
								<input type="date" class="form-control" name="date_to" value="<?= $row['trn_to_date']?>">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-sm-4">
								<label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-clock-o" aria-hidden="true"></i><b> No. of Hours</b></label>
							</div>
							<div class="col-sm-8">
								<input type="number" min="1" class="form-control" name="no_hours" value="<?= $row['trn_no_hours']?>">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-sm-4">
								<label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-graduation-cap" aria-hidden="true"></i><b> Type of LD </b></label>
							</div>
							<div class="col-sm-8">
								<?php if($row['trn_type'] == "Administrative") {
									$selected = "selected";
								}
								?>
								<?php if($row['trn_type'] == "Leadership") {
									$selected = "selected";
								}
								?>
								<?php if($row['trn_type'] == "Managerial") {
									$selected = "selected";
								}
								?>
								<?php if($row['trn_type'] == "Supervisory") {
									$selected = "selected";
								}
								?>
								<?php if($row['trn_type'] == "Technical") {
									$selected = "selected";
								}
								?>
								
								<?php if($row['trn_type'] == "Foundation") {
									$selected = "selected";
								}
								?>

								<select class="form-control" name="type_LD">
									<option value="Administrative" <?= $selected ?>>Administrative</option>
									<option value="Leadership" <?= $selected ?>>Leadership</option>
									<option value="Managerial" <?= $selected ?>>Managerial</option>
									<option value="Supervisory" <?= $selected ?>>Supervisory</option>
									<option value="Technical" <?= $selected ?>>Technical</option>
									<option value="Foundation" <?= $selected ?>>Foundation</option>
								</select>
							</div>
						</div>

						<div class="row form-group">
							<div class="col-sm-4">
								<label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-institution"></i><b> Conducted/ Sponsored by</b></label>
							</div>
							<div class="col-sm-8">
								<textarea class="form-control" rows="2" name="conducted"><?= $row['trn_conducted'] ?></textarea>
							</div>
						</div>

						<div class="row form-group">
							<div class="col-sm-4">
								<label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-file-pdf-o" aria-hidden="true"></i><b> Certificate of Completion/ Training/ Participation </b></label>
							</div>
							<div class="col-sm-8">
								<input class="filestyle" data-buttonBefore="true" data-text="Browse file" data-badge="true" data-badgeName="badge-danger" data-placeholder="Please select only pdf file." type='file' name='cot' accept="application/pdf">
								<small>Leave <b>blank</b> if you do not want to change the file.</small>
							</div>
						</div>

						<div class="row form-group">
							<div class="col-sm-4">
								<label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-file-pdf-o" aria-hidden="true"></i><b> REAP/Terminal Report/ Workshop Output/ Written Explanation for non-attendance</b></label>
							</div>
							<div class="col-sm-8">
								<input class="filestyle" data-buttonBefore="true" data-text="Browse file" data-badge="true" data-badgeName="badge-danger" data-placeholder="Please select only pdf file." type='file' name='reap' accept="application/pdf">
								<small>Leave <b>blank</b> if you do not want to change the file.</small>
							</div>
						</div>

						<div class="row form-group">
							<div class="col-sm-4">
								<label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-file-pdf-o" aria-hidden="true"></i><b> Training and Development Outcome Report Form (TDORF)</b></label>
							</div>
							<div class="col-sm-8 ">
								<input class="filestyle" data-buttonBefore="true" data-text="Browse file" data-badge="true" data-badgeName="badge-danger" data-placeholder="Please select only pdf file." type='file' name='tdorf' accept="application/pdf">
								<small>Leave <b>blank</b> if you do not want to change the file.</small>
							</div>
						</div>
					</div><!--End of Col-SM-8-->

					<div class="col-sm-6">
						<div class="row form-group" style="padding-right:10px;">
							<label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-newspaper-o"></i> <b>Objectives</b></label>
							<textarea name="objective" class="mytextarea"><?= $row['trn_objective'] ?></textarea>
						</div>

						<div class="row form-group" style="padding-right:10px;">
							<label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-newspaper-o"></i><b> Course Outline</b></label>
							<textarea name="outline" class="mytextarea"><?= $row['trn_outline'] ?></textarea>
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
