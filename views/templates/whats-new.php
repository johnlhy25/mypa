    <div class="modal fade delete" id="new" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">	
          <div class="modal-content" style="color: #fffdf8; background: url(assets/img/Background-Login.webp); background-repeat: no-repeat; background-size: auto; background-size: cover;">

              <div class="modal-header" style="color: #eeca24;">
                <h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-bullhorn"></i> What's New</h3>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>

              <div class="modal-body">
                <div class="logo text-center">
                    <img class="img-responsive text-center" src="<?= base_url();?>assets/img/LogoMYPA-S.webp" alt="Cagayan State University Logo" height="130px" width="auto">
                </div>
                      <p align="justify">version <?= $this->config->item('system_version') ?></p>
              </div>
                  
          </div>
        </div>
      </div>