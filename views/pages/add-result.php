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
				<?= form_open_multipart('add_result_docs'); ?>

					<div class="row form-group">
						<div class="col-sm-3">
							<label class="control-label pull-left" style="position:relative; top:7px;">Category:</label>
						</div>
						<div class="col-sm-9 ">
							<select id="res_cat" name="res_cat" class="form-control ">
								<option value="Memo"> Memo</option>
								<option value="Result"> Result</option>
							</select>
						</div>
					</div>

					<div id="Memo" class="row form-group">
                        <div class="col-sm-3">
                            <label class="control-label pull-left" style="position:relative; top:7px;">Memo No.:</label>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="res_memo_no" placeholder="Memo No. 143 s2021">
                        </div>
                    </div>

					<div class="row form-group">
						<div class="col-sm-3">
							<label class="control-label pull-left" style="position:relative; top:7px;">Division:</label>
						</div>
						<div class="col-sm-9 ">
							<select name="res_dep_desc" class="form-control ">
								<?php foreach ($Division as $row) {?>
									<option value="<?= $row['dep_desc'] ?>"> <?= $row['dep_desc'] ?></option>
								<?php } ?>
							</select>
						</div>
					</div>

					<div class="row form-group">
						<div class="col-sm-3">
							<label class="control-label pull-left" style="position:relative; top:7px;">Year:</label>
						</div>
						<div class="col-sm-9 ">
							<select name="res_year" class="form-control ">
								<?php
									$firstYear ='2020';
									$lastYear = (int)date('Y');
									for($i=$lastYear;$i>=$firstYear;$i--) { ?>
										<option value="<?= $i ?>"> <?= $i ?></option>		
								<?php } ?>	
							</select>
						</div>
					</div>

					<div class="row form-group">
						<div class="col-sm-3">
							<label class="control-label pull-left" style="position:relative; top:7px;">Quarter:</label>
						</div>
						<div class="col-sm-9 ">
							<select name="res_cat_id" class="form-control ">
								<?php foreach ($Quarter as $row) {?>
									<option value="<?= $row['cat_id'] ?>"> <?= $row['cat_desc'] ?></option>
								<?php } ?>
							</select>
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
