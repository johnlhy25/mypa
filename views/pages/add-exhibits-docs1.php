<!--Add Exhibits-->
<!-- Modal Add Polcies -->
<div class="modal fade delete" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">	
		<div class="modal-content">

			<div class="modal-header">
				<h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus"></i> Add Document</h3>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					</button>
			</div>

			<div class="modal-body text-center">
				<?= form_open_multipart('add_exhibits_docs1'); ?>
					<input type="hidden" name="ous_id" value="<?= $ous_id;?>">
					<input type="hidden" name="file_cat_id" value="<?= $cat_id;?>">
					<input type="hidden" name="year" value="<?= $year;?>">
					<input type="hidden" name="file_dep_id" value="<?= $unit_id;?>">
					<input type="hidden" name="back_link" value="<?= $back_link;?>">
					
					<!--Start Description-->
                    <div class="row form-group">
                        <div class="col-sm-3">
                            <label class="control-label pull-left" style="position:relative; top:7px;">Description:</label>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="description" placeholder="Description" required>
                        </div>
                    </div>


					<div class="row form-group">
						<div class="col-sm-3">
							<label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-file-pdf-o"></i> Upload Document:</label>
						</div>
						<div class="col-sm-9 ">
							<input class="filestyle" data-buttonBefore="true" data-text="Browse file" data-badge="true" data-badgeName="badge-danger" data-placeholder="Please select only pdf file." type='file' name='file' accept="application/pdf">
						</div>
					</div>

					                    
					<div class="row form-group">
                        <div class="col-sm-3">
                            <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-external-link-square"></i> Google Drive Link:</label>
                        </div>
                        <div class="col-sm-9">
                        	<textarea class="form-control" rows="5" name="file_google_link" placeholder="Optional"></textarea>
							<small class="pull-right">Google Drive Link serves as a <strong>backup</strong> only.</small>
                        </div>
                    </div>
					
			</div>
										
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
