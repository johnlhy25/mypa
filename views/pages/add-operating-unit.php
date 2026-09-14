<!-- Modal Add Program -->
<div class="modal fade delete" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-md" role="document">	
		<div class="modal-content">

			<div class="modal-header">
				<h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus"></i> Add Operating Unit</h3>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					</button>
			</div>

			<div class="modal-body text-center">
				<?= form_open('add_operating_units'); ?>

					<!--Start Description-->
                    <div class="row form-group">
                        <div class="col-sm-4">
                            <label class="control-label pull-left" style="position:relative; top:7px;">Operating Unit:</label>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="ous_desc" placeholder="PO Batanes" required>
                        </div>
                    </div>

					<!--Start Description-->
                    <div class="row form-group">
                        <div class="col-sm-4">
                            <label class="control-label pull-left" style="position:relative; top:7px;">Email Address:</label>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="ous_email" placeholder="region2.batanes@tesda.gov.ph" required>
                        </div>
                    </div>

			</div><!--End of modal-body text-center-->
										
			<div class="modal-footer">
				<div class="btn-group">
					<button type="submit"  value='Upload' name='upload' class="btn btn-danger">Submit</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>	
				</div>						
			</div>
			</form>						
		</div>
    </div>
</div>
<!-- End Modal -->
