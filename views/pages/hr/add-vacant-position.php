<!--Add Exhibits-->
<!-- Modal Add Polcies -->
<div class="modal fade delete" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-md" role="document">	
		<div class="modal-content">

			<div class="modal-header">
				<h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus"></i> Add Vacant Position</h3>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					</button>
			</div>

			<div class="modal-body">	
				<?= form_open_multipart('add_vacant_position'); ?>
			<!-- Plantilla No -->
				<input type="hidden" name="year" value="<?= $year?>">
				
				<div class="row form-group">
					<div class="col-sm-5">
						<label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-sticky-note-o"></i> Plantilla Item No.: </label>
					</div>
					<div class="col-sm-7">
						<input type="text"  class="form-control" name="vac_plantilla_no">
					</div>
				</div>	

				<!-- Operating Unit -->
				<div class="row form-group">
					<div class="col-sm-5">
						<label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-institution"></i> Operating Unit: </label>
					</div>
					<div class="col-sm-7">
						<select class="form-control" name="vac_desc">
							<?php foreach ($operating_units as $row){ ?>   
                            	<option value="<?= $row['ous_id']?>"><?= $row['ous_desc']?></option>
                            <?php } ?>
						</select>
					</div>
				</div>

				<!-- Position -->
				<div class="row form-group">
					<div class="col-sm-5">
						<label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-user"></i> Position: </label>
					</div>
					<div class="col-sm-7">
						<select class="form-control" name="vac_desc">
							<option value="Foreign">Foreign</option>
							<option value="Foreign">Foreign</option>
							<option value="National">National</option>
							<option value="Local">Local</option>
							<option value="Regional">Regional Initiated Program</option>
						</select>
					</div>
				</div>		

				<!-- Salary Grade-->
				<div class="row form-group">
					<div class="col-sm-5">
						<label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-money"></i> Salary Grade: </label>
					</div>
					<div class="col-sm-7">
						<input type="number" min="1" class="form-control" name="vac_sg">
					</div>
				</div>

				<!-- Date Posted-->
				<div class="row form-group">
					<div class="col-sm-5">
						<label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-calendar"></i> Date Posted: </label>
					</div>
					<div class="col-sm-7">
						<input type="date" class="form-control" name="date_posted">
					</div>
				</div>

				<!-- Deadline -->
				<div class="row form-group">
					<div class="col-sm-5">
						<label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-calendar"></i> Deadline of Submission: </label>
					</div>
					<div class="col-sm-7">
						<input type="date" class="form-control" name="deadline">
					</div>
				</div>

				<!-- Upload File -->
				<div class="row form-group">
					<div class="col-sm-5">
						<label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-paperclip"></i> Job Opening File: </label>
					</div>
					<div class="col-sm-7">
						<input class="filestyle" data-buttonBefore="true" data-text="Browse file" data-badge="true" data-badgeName="badge-danger" data-placeholder="Please select only pdf file." type='file' name='job_opening_file' accept="application/pdf"> 
					</div>
				</div>
				
			</form>
			</div><!-- End Body -->

			<div class="modal-footer">
				<div class="btn-group">
					<button id="addexhibitsubmit" type="submit" value='Upload' name='upload' class="btn btn-danger"> <i class="fa fa-floppy-o"></i> Save </button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>	
				</div>

				<div id="addexhibitloading" class="spinner-grow text-primary" style="display: none;" role="status">
					<span class="sr-only">Loading... </span>
				</div>	
			</div>

		</div>
    </div>
</div>
<!-- End Modal -->
