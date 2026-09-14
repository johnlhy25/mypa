    <div class="modal fade delete" id="bug" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">	
          <div class="modal-content" style="color: #fffdf8; background: url(assets/img/Background-Login.webp); background-repeat: no-repeat; background-size: auto; background-size: cover;">

              <div class="modal-header" style="color: #eeca24;">
                <h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-bug"></i> Report a Bug <span class="badge bg-red badge-corner"><i class="fa fa-file-code-o"></i></span></h3>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>

              <div class="modal-body">
                <div class="logo text-center">
                    <img class="img-responsive text-center" src="<?= base_url();?>assets/img/LogoMYPA-S.webp" alt="Cagayan State University Logo" height="130px" width="auto">
                </div>
                      <?= form_open_multipart('upload_bug')?>
                        <div class="row">
                          <div class="col-md-12">
                                <label class="control-label pull-left">Bugs/Suggestions:</label>
                                <textarea class="form-control" rows="5" name="bug_desc" placeholder="Type your suggestion/s and/or the details of error/s found here..." required></textarea>
                          </div>
                          
                          <div class="col-md-12">
                                <label class="control-label pull-left">Screenshoots (Can upload multiple images):</label>
                                <input class="filestyle" data-buttonBefore="true" data-text="Browse file" data-badge="true" data-badgeName="badge-danger" data-placeholder="Please select only .jpg .png .gif file." type='file' name='file[]' accept="image/*" multiple>
                          </div>
                          <div class="col-md-12 mt-2">
                              <button class="btn btn-sm btn-primary pull-right" name="upload" type="submit"> <i class="fa fa-paper-plane"></i> Send Report</button>
                          </div>
                        </div><!--End of Row-->
                      </form>   
              </div>
                  
          </div>
        </div>
      </div>