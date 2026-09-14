<?php if( $this->session->logged_in){?>

         <!-- Dashboard Parameters-->
         <div class="container-fluid"><!-- container-fluid1-->
            <section class="dashboard-counts">

            

            <h1><span class="badge bg-red badge-corner"><i class="fa fa-tasks"></i></span> Programs Under Survey</h1>
              <hr>

              <!-- Approved Programs-->
              <p><span class="badge bg-green badge-corner"><i class="fa fa-unlock"></i></span> <strong> Approved</strong> </p>
                <ul class="list-group list-group-flush">

                  <?php 
                    foreach ($program_users as $row) {
                      if ($row['status'] == 'Approved'){  
                  ?>
                        <li class="list-group-item">
                          <span class="badge bg-green badge-corner"><i class="fa fa-unlock"></i></span> <?= $row['description']?> (<?= $row['accronym']?> )
                          <button data-toggle="dropdown" type="button" class="btn btn-outline-danger dropdown-toggle btn-sm pull-right"><i class="fa fa-tasks"></i> Action <span class="caret"></span></button>
                                <div class="dropdown-menu">
                                  <a href="<?= base_url();?>accreditor_view/<?= $row['accronym']?>-<?= $row['program_id'];?>" target="_blank" class="dropdown-item"><i class="fa fa-eye"> </i> View Areas</a>
                                </div>
                          </li>
                      
                      <?php } ?>

                  <?php } ?>

                </ul>

              <br>

                <!-- List of Programs-->
              <p><span class="badge bg-warning badge-corner"><i class="fa fa-tasks"></i></span> <strong> Programs</strong> </p>
              <ul class="list-group list-group-flush">

                <?php foreach ($program as $row) { ?>
                       <li class="list-group-item">
                        <span class="badge bg-warning badge-corner"><i class="fa fa-tasks"></i></span> <?= $row['description']?> (<?= $row['accronym']?> )
                        <button data-toggle="dropdown" type="button" class="btn btn-outline-danger dropdown-toggle btn-sm pull-right"><i class="fa fa-tasks"></i> Action <span class="caret"></span></button>
                              <div class="dropdown-menu">
                                  <?= form_open('program_request1'); ?>
                                    <input type="hidden" name="programID" value="<?= $row['program_id']; ?>">
                                    <button type="submit" class="dropdown-item"><i class="fa fa-lock"> </i> Request Access </button>
                                  </form>
                              </div>
                        </li>

                <?php } ?>
              </ul>

            </section>
          </div><!-- end of container-fluid1-->

        
        <!--Messagge Box-->
        <?php if($this->session->flashdata('program_request1')) : ?>
          
          <div class="toast" data-autohide="false" style="position: absolute; bottom: 20px; right: 0; min-width: 300px;">
            <div class="toast-header bg-red">
            <strong class="mr-auto"><i class="fa fa-bullhorn"></i> System Message</strong>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
            </div>
            <div class="toast-body">
            <?= $this->session->flashdata('program_request1'); ?>
            </div>
          </div>

        <?php endif;?>

<?php }else{
redirect (base_url());
}?>