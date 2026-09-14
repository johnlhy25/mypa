<?php if( $this->session->logged_in){
   if( $this->session->role == 'Accre'){ ?>


         <!-- Dashboard Parameters-->
         <div class="container-fluid"><!-- container-fluid1-->
            <section class="dashboard-counts">

            <h1><span class="badge bg-red badge-corner"><i class="fa fa-video-camera"></i></span> Videos</h1>
            <hr>


                              <?php $num_rows=0;
                                foreach ($videos as $row) {
                                  $num_rows=$num_rows+1;
                              } ?>

                              <!--No document available-->
                              <?php if($num_rows==0){?>
                                    <div class="container no-margin-bottom no-margin-top">
                                    <div class="card no-margin-bottom no-margin-top">
                                      <div class="card-body">
                                        <div class="row no-margin-bottom no-margin-top">
                                        <div class="col-md-8 no-margin-bottom no-margin-top">
                                          <h4><img src="<?= base_url();?>assets/img/logo.png" width="24px" height="24px"> <span style="color: #fd5050;">CSU | Online Accreditation System </span> <span><strong> DOCBank</strong></span></h4>
                                          <br>
                                          <h1>No video available</h1>
                                          <small>You are signed in as <strong><?= $this->session->email;?></strong></small>
                                        </div>
                                        <div class="col-md-4 text-ceneter no-margin-bottom no-margin-top">
                                          <br>
                                          <img src="<?= base_url();?>assets/img/v_no.png" width="200px" height="200px"> 
                                        </div>
                                        </div>
                                      </div>
                                    </div>
                                    </div>
                                  <?php } else {?>

                                  <div class="card bg-white no-margin-bottom">
                   
                                    <div class="card-body no-padding-bottom no-padding-top">
                                      <div class="row">
                      
                                                      <?php 
                                                      foreach ($videos as $row) {
                                                          $video = $row['youtube_link'];
                                                          $explode = explode('=', $video);
                                                          $src = $explode[1];
                                                      ?>
                      
                      
                      
                                        <div class="card col-md-3 no-margin-bottom"><!--card col-md-3 no-margin-bottom-->
                                          <img class="card-img-top" src="https://img.youtube.com/vi/<?= $src; ?>/hqdefault.jpg" alt="Card image">	
                                          <div class="card-body"><!--card-body-->
                                            <h4 class="card-title"><span class="badge bg-warning badge-corner"><strong><?= $row['area']?>:</strong></span> <?= $row['description']?> </h4>
                                                              <small>Posted by: <?= $row['name']?> on <?= $row['timestamp']?></small>
                                            <hr>
                                                                  <button data-toggle="dropdown" type="button" class="btn btn-outline-danger dropdown-toggle btn-sm btn-block"><i class="fa fa-tasks"></i> Action <span class="caret"></span></button>
                                                                      <div class="dropdown-menu">
                                                                          <a href="<?= $row['youtube_link']?>" target="_blank" class="dropdown-item" ><i class="fa fa-youtube"> </i> View</a>
                                                                      </div> 
                      
                                          </div><!--End of card-body-->
                                        </div><!----End of card col-md-3 no-margin-bottom-->
                      
                      
                                        <?php } ?>
                      
                                      </div><!--End of Row-->
                                    </div><!--End of Card-Body-->
                      
                                  </div><!--End of Card-->

                                  <?php } ?>
                                  <br>
<!--------------------------------------------------------------------------------------------------------->

                        <?php 
                          $area1=0;
                          $area2=0;
                          $area3=0;
                          $area4=0;
                          $area5=0;
                          $area6=0;
                          $area7=0;
                          $area8=0;
                          $area9=0;
                          $area10=0;

                          $exit = FALSE;
                          
                          foreach ($parameters as $row) {

                            if($row['area']=="Area1"){
                              $area1=1;
                              goto end;
                            }elseif($row['area']=="Area2"){
                              $area2=1;
                              goto end;
                            }elseif($row['area']=="Area3"){
                              $area3=1;
                              goto end;
                            }elseif($row['area']=="Area4"){
                              $area4=1;
                              goto end;
                            }elseif($row['area']=="Area5"){
                              $area5=1;
                              goto end;
                            }elseif($row['area']=="Area6"){
                              $area6=1;
                              goto end;
                            }elseif($row['area']=="Area7"){
                              $area7=1;
                              goto end;
                            }elseif($row['area']=="Area8"){
                              $area8=1;
                              goto end;
                            }elseif($row['area']=="Area9"){
                              $area9=1;
                              goto end;
                            }elseif($row['area']=="Area10"){
                              $area10=1;
                              goto end;
                            }
                            end:

                          }
                      ?>

                <h1><span class="badge bg-red badge-corner"><i class="fa fa-file"></i></span> Documents</h1>
                <hr>
              
                <div class="container-fluid"><!-- container-fluid2-->
                    <div id="accordion"><!-- Accordion-->

                      <div class="card no-margin-bottom"><!-- Card 1-->
                        <div class="card-header">
                          <a class="card-link" data-toggle="collapse" href="#area1">
                          <?php if($area1==1){
                            $lock='<span class="badge bg-green badge-corner"><i class="fa fa-unlock"></i></span>';
                          }else{
                            $lock='<span class="badge bg-red badge-corner"><i class="fa fa-lock"></i></span>';
                          }?>
                            <?= $lock; ?> Area I: <strong>Mission, Vision, Goals and Objectives</strong> <i class="fa fa-angle-double-down"></i>
                          </a>
                        </div>
                        <div id="area1" class="collapse" data-parent="#accordion">
                          <div class="card-body no-margin-top">
                            <div class="row bg-white no-padding-bottom no-padding-top">
                              <?php if($area1==1){?>
                                
                                  <?php
                                      $num_rows=0;
                                      foreach ($Area1 as $row) {
                                        $num_rows=$num_rows+1;
                                  ?>
                                  <div class="card col-md-3">
                                    <img class="card-img-top" src="<?= base_url();?>assets/img/<?= $row['Parameter']?>.png" alt="Card image">
                                      
                                      <div class="card-body">
                                        
                                        <?php if($row['Parameter'] == 'PPP'){?>
                                          <h4 class="card-title"> <?= $row['Parameter']?></h4>
                                        <?php }else {?>
                                          <h4 class="card-title">Parameter: <?= $row['Parameter']?> [<?= $row['Description']?>]</h4>
                                        <?php } ?>

                                        <small>Posted by: <?= $row['Modified_By']?> on <?= $row['Date_Modified']?>  <a href="<?= $row['Alternative_Link']?>" target="_blank" > Please click this link if an error has occured.</a></small>
                                        <a href="<?= base_url()?>accreditor_docx/<?= $row['Campus']?>-<?= $row['slug']?>-<?= $row['parameter_id']?>-<?= $program_id;?>" target="_blanks" class="btn btn-primary btn-sm btn-block"><i class="fa fa-eye"></i> View Document</a>
                                      </div>
                                      
                                  </div>
                                  <?php } ?>

                                  <!--No document available-->
                                  <?php if($num_rows==0){?>
                                    <div class="container no-margin-bottom no-margin-top">
                                    <div class="card no-margin-bottom no-margin-top">
                                      <div class="card-body">
                                        <div class="row no-margin-bottom no-margin-top">
                                        <div class="col-md-8 no-margin-bottom no-margin-top">
                                          <h4><img src="<?= base_url();?>assets/img/logo.png" width="24px" height="24px"> <span style="color: #fd5050;">CSU | Online Accreditation System </span> <span><strong> DOCBank</strong></span></h4>
                                          <br>
                                          <h1>No document available</h1>
                                          <small>You are signed in as <strong><?= $this->session->email;?></strong></small>
                                        </div>
                                        <div class="col-md-4 text-ceneter no-margin-bottom no-margin-top">
                                          <br>
                                          <img src="<?= base_url();?>assets/img/d_no.png" width="200px" height="200px"> 
                                        </div>
                                        </div>
                                      </div>
                                    </div>
                                    </div>
                                  <?php } ?>
                                

                              <?php }else{ ?><!-- End of IF-->
                                <div class="container no-margin-bottom no-margin-top">
                                <div class="card no-margin-bottom no-margin-top">
                                  <div class="card-body">
                                    <div class="row no-margin-bottom no-margin-top">
                                    <div class="col-md-8 no-margin-bottom no-margin-top">
                                      <h4><img src="<?= base_url();?>assets/img/logo.png" width="24px" height="24px"> <span style="color: #fd5050;">CSU | Online Accreditation System </span> <span><strong> DOCBank</strong></span></h4>
                                      <br>
                                      <h1>You need permission</h1>
                                      <p>Want in? Ask the administrator for access, or switch to an account with permission. <a href="<?= base_url();?>logout">Switch account.</a></p>
                                      <small>You are signed in as <strong><?= $this->session->email;?></strong></small>
                                      <hr>
                                      <?= form_open('request_area2');?>
                                      <input name="area" type="hidden" value="Area1">
                                      <input name="programID" type="hidden" value="<?= $program_id; ?>">
                                      <input name="accronym" type="hidden" value="<?= $accronym; ?>">
                                      <button class="btn btn-warning" type="submit" name="submit" id="submit"><i class="fa fa-lock"></i> Request access</button>
                                      </form>
                                    </div>
                                    <div class="col-md-4 text-ceneter no-margin-bottom no-margin-top">
                                      <br>
                                      <img src="<?= base_url();?>assets/img/d_lock.png" width="200px" height="200px"> 
                                    </div>
                                    </div>
                                  </div>
                                </div>
                                </div>

                              <?php } ?> <!-- End of Else-->

                            </div><!-- End of row bg-white has-shadow no-padding-bottom-->
                          </div>
                        </div>
                      </div><!-- End of Card 1-->

                      <div class="card no-margin-bottom"><!-- Card 2-->
                        <div class="card-header">
                          <a class="card-link" data-toggle="collapse" href="#area2">
                          <?php if($area2==1){
                            $lock='<span class="badge bg-green badge-corner"><i class="fa fa-unlock"></i></span>';
                          }else{
                            $lock='<span class="badge bg-red badge-corner"><i class="fa fa-lock"></i></span>';
                          }?>
                            <?= $lock; ?> Area II: <strong>Faculty</strong> <i class="fa fa-angle-double-down"></i>
                          </a>
                        </div>
                        <div id="area2" class="collapse" data-parent="#accordion">
                          <div class="card-body">
                          <div class="row bg-white no-padding-bottom no-padding-top">
                              <?php if($area2==1){?>
                                
                                  <?php 
                                      $num_rows=0;
                                      foreach ($Area2 as $row) {
                                      $num_rows=$num_rows+1;
                                  ?>
                                  <div class="card col-md-3">
                                    <img class="card-img-top" src="<?= base_url();?>assets/img/<?= $row['Parameter']?>.png" alt="Card image">
                                      
                                      <div class="card-body">
                                        
                                        <?php if($row['Parameter'] == 'PPP'){?>
                                          <h4 class="card-title"> <?= $row['Parameter']?></h4>
                                        <?php }else {?>
                                          <h4 class="card-title">Parameter: <?= $row['Parameter']?> [<?= $row['Description']?>]</h4>
                                        <?php } ?>

                                        <small>Posted by: <?= $row['Modified_By']?> on <?= $row['Date_Modified']?>  <a href="<?= $row['Alternative_Link']?>" target="_blank" > Please click this link if an error has occured.</a></small>
                                        <a href="<?= base_url()?>accreditor/<?= $row['Campus']?>-<?= $row['slug']?>-<?= $row['parameter_id']?>" target="_blanks" class="btn btn-primary btn-sm btn-block"><i class="fa fa-eye"></i> View Document</a>
                                      </div>
                                      
                                  </div>
                                  <?php } ?>

                                  <!--No document available-->
                                  <?php if($num_rows==0){?>
                                    <div class="container no-margin-bottom no-margin-top">
                                    <div class="card no-margin-bottom no-margin-top">
                                      <div class="card-body">
                                        <div class="row no-margin-bottom no-margin-top">
                                        <div class="col-md-8 no-margin-bottom no-margin-top">
                                          <h4><img src="<?= base_url();?>assets/img/logo.png" width="24px" height="24px"> <span style="color: #fd5050;">CSU | Online Accreditation System </span> <span><strong> DOCBank</strong></span></h4>
                                          <br>
                                          <h1>No document available</h1>
                                          <small>You are signed in as <strong><?= $this->session->email;?></strong></small>
                                        </div>
                                        <div class="col-md-4 text-ceneter no-margin-bottom no-margin-top">
                                          <br>
                                          <img src="<?= base_url();?>assets/img/d_no.png" width="200px" height="200px"> 
                                        </div>
                                        </div>
                                      </div>
                                    </div>
                                    </div>
                                  <?php } ?>

                                

                              <?php }else{ ?><!-- End of IF-->
                                <div class="container no-margin-bottom no-margin-top">
                                <div class="card no-margin-bottom no-margin-top">
                                  <div class="card-body">
                                    <div class="row no-margin-bottom no-margin-top">
                                    <div class="col-md-8 no-margin-bottom no-margin-top">
                                      <h4><img src="<?= base_url();?>assets/img/logo.png" width="24px" height="24px"> <span style="color: #fd5050;">CSU | Online Accreditation System </span> <span><strong> DOCBank</strong></span></h4>
                                      <br>
                                      <h1>You need permission</h1>
                                      <p>Want in? Ask the administrator for access, or switch to an account with permission. <a href="<?= base_url();?>logout">Switch account.</a></p>
                                      <small>You are signed in as <strong><?= $this->session->email;?></strong></small>
                                      <hr>
                                      <?= form_open('request_area2');?>
                                      <input name="area" type="hidden" value="Area2">
                                      <input name="programID" type="hidden" value="<?= $program_id; ?>">
                                      <input name="accronym" type="hidden" value="<?= $accronym; ?>">
                                      <button class="btn btn-warning" type="submit" name="submit" id="submit"><i class="fa fa-lock"></i> Request access</button>
                                      </form>
                                    </div>
                                    <div class="col-md-4 text-ceneter no-margin-bottom no-margin-top">
                                      <br>
                                      <img src="<?= base_url();?>assets/img/d_lock.png" width="200px" height="200px"> 
                                    </div>
                                    </div>
                                  </div>
                                </div>
                                </div>

                              <?php } ?> <!-- End of Else-->

                            </div><!-- End of row bg-white has-shadow no-padding-bottom-->
                          </div>
                        </div>
                      </div><!-- End of Card 2-->

                      <div class="card no-margin-bottom"><!-- Card 3-->
                        <div class="card-header">
                          <a class="card-link" data-toggle="collapse" href="#area3">
                          <?php if($area3==1){
                            $lock='<span class="badge bg-green badge-corner"><i class="fa fa-unlock"></i></span>';
                          }else{
                            $lock='<span class="badge bg-red badge-corner"><i class="fa fa-lock"></i></span>';
                          }?>
                            <?= $lock; ?> Area III: <strong>Curriculum and Instruction</strong> <i class="fa fa-angle-double-down"></i>
                          </a>
                        </div>
                        <div id="area3" class="collapse" data-parent="#accordion">
                          <div class="card-body">
                          <div class="row bg-white no-padding-bottom no-padding-top">
                              <?php if($area3==1){?>
                                
                                  <?php 
                                      $num_rows=0;
                                      foreach ($Area3 as $row) {
                                      $num_rows=$num_rows+1;
                                  ?>
                                  <div class="card col-md-3">
                                    <img class="card-img-top" src="<?= base_url();?>assets/img/<?= $row['Parameter']?>.png" alt="Card image">
                                      
                                      <div class="card-body">
                                        
                                        <?php if($row['Parameter'] == 'PPP'){?>
                                          <h4 class="card-title"> <?= $row['Parameter']?></h4>
                                        <?php }else {?>
                                          <h4 class="card-title">Parameter: <?= $row['Parameter']?> [<?= $row['Description']?>]</h4>
                                        <?php } ?>

                                        <small>Posted by: <?= $row['Modified_By']?> on <?= $row['Date_Modified']?>  <a href="<?= $row['Alternative_Link']?>" target="_blank" > Please click this link if an error has occured.</a></small>
                                        <a href="<?= base_url()?>accreditor/<?= $row['Campus']?>-<?= $row['slug']?>-<?= $row['parameter_id']?>-<?= $program_id;?>" target="_blanks" class="btn btn-primary btn-sm btn-block"><i class="fa fa-eye"></i> View Document</a>
                                      </div>
                                      
                                  </div>
                                  <?php } ?>

                                   <!--No document available-->
                                   <?php if($num_rows==0){?>
                                    <div class="container no-margin-bottom no-margin-top">
                                    <div class="card no-margin-bottom no-margin-top">
                                      <div class="card-body">
                                        <div class="row no-margin-bottom no-margin-top">
                                        <div class="col-md-8 no-margin-bottom no-margin-top">
                                          <h4><img src="<?= base_url();?>assets/img/logo.png" width="24px" height="24px"> <span style="color: #fd5050;">CSU | Online Accreditation System </span> <span><strong> DOCBank</strong></span></h4>
                                          <br>
                                          <h1>No document available</h1>
                                          <small>You are signed in as <strong><?= $this->session->email;?></strong></small>
                                        </div>
                                        <div class="col-md-4 text-ceneter no-margin-bottom no-margin-top">
                                          <br>
                                          <img src="<?= base_url();?>assets/img/d_no.png" width="200px" height="200px"> 
                                        </div>
                                        </div>
                                      </div>
                                    </div>
                                    </div>
                                  <?php } ?>
                                

                              <?php }else{ ?><!-- End of IF-->
                                <div class="container no-margin-bottom no-margin-top">
                                <div class="card no-margin-bottom no-margin-top">
                                  <div class="card-body">
                                    <div class="row no-margin-bottom no-margin-top">
                                    <div class="col-md-8 no-margin-bottom no-margin-top">
                                      <h4><img src="<?= base_url();?>assets/img/logo.png" width="24px" height="24px"> <span style="color: #fd5050;">CSU | Online Accreditation System </span> <span><strong> DOCBank</strong></span></h4>
                                      <br>
                                      <h1>You need permission</h1>
                                      <p>Want in? Ask the administrator for access, or switch to an account with permission. <a href="<?= base_url();?>logout">Switch account.</a></p>
                                      <small>You are signed in as <strong><?= $this->session->email;?></strong></small>
                                      <hr>
                                      <?= form_open('request_area2');?>
                                      <input name="area" type="hidden" value="Area3">
                                      <input name="programID" type="hidden" value="<?= $program_id; ?>">
                                      <input name="accronym" type="hidden" value="<?= $accronym; ?>">
                                      <button class="btn btn-warning" type="submit" name="submit" id="submit"><i class="fa fa-lock"></i> Request access</button>
                                      </form>
                                    </div>
                                    <div class="col-md-4 text-ceneter no-margin-bottom no-margin-top">
                                      <br>
                                      <img src="<?= base_url();?>assets/img/d_lock.png" width="200px" height="200px"> 
                                    </div>
                                    </div>
                                  </div>
                                </div>
                                </div>

                              <?php } ?> <!-- End of Else-->

                            </div><!-- End of row bg-white has-shadow no-padding-bottom-->
                          </div>
                        </div>
                      </div><!-- End of Card 3-->

                      <div class="card no-margin-bottom"><!-- Card 4-->
                        <div class="card-header">
                          <a class="card-link" data-toggle="collapse" href="#area4">
                          <?php if($area4==1){
                            $lock='<span class="badge bg-green badge-corner"><i class="fa fa-unlock"></i></span>';
                          }else{
                            $lock='<span class="badge bg-red badge-corner"><i class="fa fa-lock"></i></span>';
                          }?>
                            <?= $lock; ?> Area IV: <strong>Support to Students</strong> <i class="fa fa-angle-double-down"></i>
                          </a>
                        </div>
                        <div id="area4" class="collapse" data-parent="#accordion">
                          <div class="card-body">
                          <div class="row bg-white no-padding-bottom no-padding-top">
                              <?php if($area4==1){?>
                                
                                  <?php
                                      $num_rows=0;
                                      foreach ($Area4 as $row) {
                                      $num_rows=$num_rows+1;
                                  ?>
                                  <div class="card col-md-3">
                                    <img class="card-img-top" src="<?= base_url();?>assets/img/<?= $row['Parameter']?>.png" alt="Card image">
                                      
                                      <div class="card-body">
                                        
                                        <?php if($row['Parameter'] == 'PPP'){?>
                                          <h4 class="card-title"> <?= $row['Parameter']?></h4>
                                        <?php }else {?>
                                          <h4 class="card-title">Parameter: <?= $row['Parameter']?> [<?= $row['Description']?>]</h4>
                                        <?php } ?>

                                        <small>Posted by: <?= $row['Modified_By']?> on <?= $row['Date_Modified']?>  <a href="<?= $row['Alternative_Link']?>" target="_blank" > Please click this link if an error has occured.</a></small>
                                        <a href="<?= base_url()?>accreditor/<?= $row['Campus']?>-<?= $row['slug']?>-<?= $row['parameter_id']?>-<?= $program_id;?>" target="_blanks" class="btn btn-primary btn-sm btn-block"><i class="fa fa-eye"></i> View Document</a>
                                      </div>
                                      
                                  </div>
                                  <?php } ?>

                                  <!--No document available-->
                                  <?php if($num_rows==0){?>
                                    <div class="container no-margin-bottom no-margin-top">
                                    <div class="card no-margin-bottom no-margin-top">
                                      <div class="card-body">
                                        <div class="row no-margin-bottom no-margin-top">
                                        <div class="col-md-8 no-margin-bottom no-margin-top">
                                          <h4><img src="<?= base_url();?>assets/img/logo.png" width="24px" height="24px"> <span style="color: #fd5050;">CSU | Online Accreditation System </span> <span><strong> DOCBank</strong></span></h4>
                                          <br>
                                          <h1>No document available</h1>
                                          <small>You are signed in as <strong><?= $this->session->email;?></strong></small>
                                        </div>
                                        <div class="col-md-4 text-ceneter no-margin-bottom no-margin-top">
                                          <br>
                                          <img src="<?= base_url();?>assets/img/d_no.png" width="200px" height="200px"> 
                                        </div>
                                        </div>
                                      </div>
                                    </div>
                                    </div>
                                  <?php } ?>
                                

                              <?php }else{ ?><!-- End of IF-->
                                <div class="container no-margin-bottom no-margin-top">
                                <div class="card no-margin-bottom no-margin-top">
                                  <div class="card-body">
                                    <div class="row no-margin-bottom no-margin-top">
                                    <div class="col-md-8 no-margin-bottom no-margin-top">
                                      <h4><img src="<?= base_url();?>assets/img/logo.png" width="24px" height="24px"> <span style="color: #fd5050;">CSU | Online Accreditation System </span> <span><strong> DOCBank</strong></span></h4>
                                      <br>
                                      <h1>You need permission</h1>
                                      <p>Want in? Ask the administrator for access, or switch to an account with permission. <a href="<?= base_url();?>logout">Switch account.</a></p>
                                      <small>You are signed in as <strong><?= $this->session->email;?></strong></small>
                                      <hr>
                                      <?= form_open('request_area2');?>
                                      <input name="area" type="hidden" value="Area4">
                                      <input name="programID" type="hidden" value="<?= $program_id; ?>">
                                      <input name="accronym" type="hidden" value="<?= $accronym; ?>">
                                      <button class="btn btn-warning" type="submit" name="submit" id="submit"><i class="fa fa-lock"></i> Request access</button>
                                      </form>
                                    </div>
                                    <div class="col-md-4 text-ceneter no-margin-bottom no-margin-top">
                                      <br>
                                      <img src="<?= base_url();?>assets/img/d_lock.png" width="200px" height="200px"> 
                                    </div>
                                    </div>
                                  </div>
                                </div>
                                </div>

                              <?php } ?> <!-- End of Else-->

                            </div><!-- End of row bg-white has-shadow no-padding-bottom-->
                          </div>
                        </div>
                      </div><!-- End of Card 4-->

                      <div class="card no-margin-bottom"><!-- Card 5-->
                        <div class="card-header">
                          <a class="card-link" data-toggle="collapse" href="#area5">
                          <?php if($area5==1){
                            $lock='<span class="badge bg-green badge-corner"><i class="fa fa-unlock"></i></span>';
                          }else{
                            $lock='<span class="badge bg-red badge-corner"><i class="fa fa-lock"></i></span>';
                          }?>
                            <?= $lock; ?> Area V: <strong>Research</strong> <i class="fa fa-angle-double-down"></i>
                          </a>
                        </div>
                        <div id="area5" class="collapse" data-parent="#accordion">
                          <div class="card-body">
                          <div class="row bg-white no-padding-bottom no-padding-top">
                              <?php if($area5==1){?>
                                
                                  <?php
                                      $num_rows=0;
                                      foreach ($Area5 as $row) {
                                      $num_rows=$num_rows+1;
                                  ?>
                                  <div class="card col-md-3">
                                    <img class="card-img-top" src="<?= base_url();?>assets/img/<?= $row['Parameter']?>.png" alt="Card image">
                                      
                                      <div class="card-body">
                                        
                                        <?php if($row['Parameter'] == 'PPP'){?>
                                          <h4 class="card-title"> <?= $row['Parameter']?></h4>
                                        <?php }else {?>
                                          <h4 class="card-title">Parameter: <?= $row['Parameter']?> [<?= $row['Description']?>]</h4>
                                        <?php } ?>

                                        <small>Posted by: <?= $row['Modified_By']?> on <?= $row['Date_Modified']?>  <a href="<?= $row['Alternative_Link']?>" target="_blank" > Please click this link if an error has occured.</a></small>
                                        <a href="<?= base_url()?>accreditor/<?= $row['Campus']?>-<?= $row['slug']?>-<?= $row['parameter_id']?>-<?= $program_id;?>" target="_blanks" class="btn btn-primary btn-sm btn-block"><i class="fa fa-eye"></i> View Document</a>
                                      </div>
                                      
                                  </div>
                                  <?php } ?>

                                  <!--No document available-->
                                  <?php if($num_rows==0){?>
                                    <div class="container no-margin-bottom no-margin-top">
                                    <div class="card no-margin-bottom no-margin-top">
                                      <div class="card-body">
                                        <div class="row no-margin-bottom no-margin-top">
                                        <div class="col-md-8 no-margin-bottom no-margin-top">
                                          <h4><img src="<?= base_url();?>assets/img/logo.png" width="24px" height="24px"> <span style="color: #fd5050;">CSU | Online Accreditation System </span> <span><strong> DOCBank</strong></span></h4>
                                          <br>
                                          <h1>No document available</h1>
                                          <small>You are signed in as <strong><?= $this->session->email;?></strong></small>
                                        </div>
                                        <div class="col-md-4 text-ceneter no-margin-bottom no-margin-top">
                                          <br>
                                          <img src="<?= base_url();?>assets/img/d_no.png" width="200px" height="200px"> 
                                        </div>
                                        </div>
                                      </div>
                                    </div>
                                    </div>
                                  <?php } ?>
                                

                              <?php }else{ ?><!-- End of IF-->
                                <div class="container no-margin-bottom no-margin-top">
                                <div class="card no-margin-bottom no-margin-top">
                                  <div class="card-body">
                                    <div class="row no-margin-bottom no-margin-top">
                                    <div class="col-md-8 no-margin-bottom no-margin-top">
                                      <h4><img src="<?= base_url();?>assets/img/logo.png" width="24px" height="24px"> <span style="color: #fd5050;">CSU | Online Accreditation System </span> <span><strong> DOCBank</strong></span></h4>
                                      <br>
                                      <h1>You need permission</h1>
                                      <p>Want in? Ask the administrator for access, or switch to an account with permission. <a href="<?= base_url();?>logout">Switch account.</a></p>
                                      <small>You are signed in as <strong><?= $this->session->email;?></strong></small>
                                      <hr>
                                      <?= form_open('request_area2');?>
                                      <input name="area" type="hidden" value="Area5">
                                      <input name="programID" type="hidden" value="<?= $program_id; ?>">
                                      <input name="accronym" type="hidden" value="<?= $accronym; ?>">
                                      <button class="btn btn-warning" type="submit" name="submit" id="submit"><i class="fa fa-lock"></i> Request access</button>
                                      </form>
                                    </div>
                                    <div class="col-md-4 text-ceneter no-margin-bottom no-margin-top">
                                      <br>
                                      <img src="<?= base_url();?>assets/img/d_lock.png" width="200px" height="200px"> 
                                    </div>
                                    </div>
                                  </div>
                                </div>
                                </div>

                              <?php } ?> <!-- End of Else-->

                            </div><!-- End of row bg-white has-shadow no-padding-bottom-->
                          </div>
                        </div>
                      </div><!-- End of Card 5-->

                      <div class="card no-margin-bottom"><!-- Card 6-->
                        <div class="card-header">
                          <a class="card-link" data-toggle="collapse" href="#area6">
                          <?php if($area6==1){
                            $lock='<span class="badge bg-green badge-corner"><i class="fa fa-unlock"></i></span>';
                          }else{
                            $lock='<span class="badge bg-red badge-corner"><i class="fa fa-lock"></i></span>';
                          }?>
                            <?= $lock; ?> Area VI: <strong>Extension and Community Involvement</strong> <i class="fa fa-angle-double-down"></i>
                          </a>
                        </div>
                        <div id="area6" class="collapse" data-parent="#accordion">
                          <div class="card-body">
                          <div class="row bg-white no-padding-bottom no-padding-top">
                              <?php if($area6==1){?>
                                
                                  <?php 
                                      $num_rows=0;
                                      foreach ($Area6 as $row) {
                                      $num_rows=$num_rows+1;
                                  ?>
                                  <div class="card col-md-3">
                                    <img class="card-img-top" src="<?= base_url();?>assets/img/<?= $row['Parameter']?>.png" alt="Card image">
                                      
                                      <div class="card-body">
                                        
                                        <?php if($row['Parameter'] == 'PPP'){?>
                                          <h4 class="card-title"> <?= $row['Parameter']?></h4>
                                        <?php }else {?>
                                          <h4 class="card-title">Parameter: <?= $row['Parameter']?> [<?= $row['Description']?>]</h4>
                                        <?php } ?>

                                        <small>Posted by: <?= $row['Modified_By']?> on <?= $row['Date_Modified']?>  <a href="<?= $row['Alternative_Link']?>" target="_blank" > Please click this link if an error has occured.</a></small>
                                        <a href="<?= base_url()?>accreditor/<?= $row['Campus']?>-<?= $row['slug']?>-<?= $row['parameter_id']?>-<?= $program_id;?>" target="_blanks" class="btn btn-primary btn-sm btn-block"><i class="fa fa-eye"></i> View Document</a>
                                      </div>
                                      
                                  </div>
                                  <?php } ?>

                                   <!--No document available-->
                                   <?php if($num_rows==0){?>
                                    <div class="container no-margin-bottom no-margin-top">
                                    <div class="card no-margin-bottom no-margin-top">
                                      <div class="card-body">
                                        <div class="row no-margin-bottom no-margin-top">
                                        <div class="col-md-8 no-margin-bottom no-margin-top">
                                          <h4><img src="<?= base_url();?>assets/img/logo.png" width="24px" height="24px"> <span style="color: #fd5050;">CSU | Online Accreditation System </span> <span><strong> DOCBank</strong></span></h4>
                                          <br>
                                          <h1>No document available</h1>
                                          <small>You are signed in as <strong><?= $this->session->email;?></strong></small>
                                        </div>
                                        <div class="col-md-4 text-ceneter no-margin-bottom no-margin-top">
                                          <br>
                                          <img src="<?= base_url();?>assets/img/d_no.png" width="200px" height="200px"> 
                                        </div>
                                        </div>
                                      </div>
                                    </div>
                                    </div>
                                  <?php } ?>
                                

                              <?php }else{ ?><!-- End of IF-->
                                <div class="container no-margin-bottom no-margin-top">
                                <div class="card no-margin-bottom no-margin-top">
                                  <div class="card-body">
                                    <div class="row no-margin-bottom no-margin-top">
                                    <div class="col-md-8 no-margin-bottom no-margin-top">
                                      <h4><img src="<?= base_url();?>assets/img/logo.png" width="24px" height="24px"> <span style="color: #fd5050;">CSU | Online Accreditation System </span> <span><strong> DOCBank</strong></span></h4>
                                      <br>
                                      <h1>You need permission</h1>
                                      <p>Want in? Ask the administrator for access, or switch to an account with permission. <a href="<?= base_url();?>logout">Switch account.</a></p>
                                      <small>You are signed in as <strong><?= $this->session->email;?></strong></small>
                                      <hr>
                                      <?= form_open('request_area2');?>
                                      <input name="area" type="hidden" value="Area6">
                                      <input name="programID" type="hidden" value="<?= $program_id; ?>">
                                      <input name="accronym" type="hidden" value="<?= $accronym; ?>">
                                      <button class="btn btn-warning" type="submit" name="submit" id="submit"><i class="fa fa-lock"></i> Request access</button>
                                      </form>
                                    </div>
                                    <div class="col-md-4 text-ceneter no-margin-bottom no-margin-top">
                                      <br>
                                      <img src="<?= base_url();?>assets/img/d_lock.png" width="200px" height="200px"> 
                                    </div>
                                    </div>
                                  </div>
                                </div>
                                </div>

                              <?php } ?> <!-- End of Else-->

                            </div><!-- End of row bg-white has-shadow no-padding-bottom-->
                          </div>
                        </div>
                      </div><!-- End of Card 6-->

                      <div class="card no-margin-bottom"><!-- Card 7-->
                        <div class="card-header">
                          <a class="card-link" data-toggle="collapse" href="#area7">
                          <?php if($area7==1){
                            $lock='<span class="badge bg-green badge-corner"><i class="fa fa-unlock"></i></span>';
                          }else{
                            $lock='<span class="badge bg-red badge-corner"><i class="fa fa-lock"></i></span>';
                          }?>
                            <?= $lock; ?> Area VII: <strong>Library</strong> <i class="fa fa-angle-double-down"></i>
                          </a>
                        </div>
                        <div id="area7" class="collapse" data-parent="#accordion">
                          <div class="card-body">
                          <div class="row bg-white no-padding-bottom no-padding-top">
                              <?php if($area7==1){?>
                                
                                  <?php 
                                      $num_rows=0;
                                      foreach ($Area7 as $row) {
                                      $num_rows=$num_rows+1;
                                  ?>
                                  <div class="card col-md-3">
                                    <img class="card-img-top" src="<?= base_url();?>assets/img/<?= $row['Parameter']?>.png" alt="Card image">
                                      
                                      <div class="card-body">
                                        
                                        <?php if($row['Parameter'] == 'PPP'){?>
                                          <h4 class="card-title"> <?= $row['Parameter']?></h4>
                                        <?php }else {?>
                                          <h4 class="card-title">Parameter: <?= $row['Parameter']?> [<?= $row['Description']?>]</h4>
                                        <?php } ?>

                                        <small>Posted by: <?= $row['Modified_By']?> on <?= $row['Date_Modified']?>  <a href="<?= $row['Alternative_Link']?>" target="_blank" > Please click this link if an error has occured.</a></small>
                                        <a href="<?= base_url()?>accreditor/<?= $row['Campus']?>-<?= $row['slug']?>-<?= $row['parameter_id']?>-<?= $program_id;?>" target="_blanks" class="btn btn-primary btn-sm btn-block"><i class="fa fa-eye"></i> View Document</a>
                                      </div>
                                      
                                  </div>
                                  <?php } ?>

                                   <!--No document available-->
                                   <?php if($num_rows==0){?>
                                    <div class="container no-margin-bottom no-margin-top">
                                    <div class="card no-margin-bottom no-margin-top">
                                      <div class="card-body">
                                        <div class="row no-margin-bottom no-margin-top">
                                        <div class="col-md-8 no-margin-bottom no-margin-top">
                                          <h4><img src="<?= base_url();?>assets/img/logo.png" width="24px" height="24px"> <span style="color: #fd5050;">CSU | Online Accreditation System </span> <span><strong> DOCBank</strong></span></h4>
                                          <br>
                                          <h1>No document available</h1>
                                          <small>You are signed in as <strong><?= $this->session->email;?></strong></small>
                                        </div>
                                        <div class="col-md-4 text-ceneter no-margin-bottom no-margin-top">
                                          <br>
                                          <img src="<?= base_url();?>assets/img/d_no.png" width="200px" height="200px"> 
                                        </div>
                                        </div>
                                      </div>
                                    </div>
                                    </div>
                                  <?php } ?>
                                

                              <?php }else{ ?><!-- End of IF-->
                                <div class="container no-margin-bottom no-margin-top">
                                <div class="card no-margin-bottom no-margin-top">
                                  <div class="card-body">
                                    <div class="row no-margin-bottom no-margin-top">
                                    <div class="col-md-8 no-margin-bottom no-margin-top">
                                      <h4><img src="<?= base_url();?>assets/img/logo.png" width="24px" height="24px"> <span style="color: #fd5050;">CSU | Online Accreditation System </span> <span><strong> DOCBank</strong></span></h4>
                                      <br>
                                      <h1>You need permission</h1>
                                      <p>Want in? Ask the administrator for access, or switch to an account with permission. <a href="<?= base_url();?>logout">Switch account.</a></p>
                                      <small>You are signed in as <strong><?= $this->session->email;?></strong></small>
                                      <hr>
                                      <?= form_open('request_area2');?>
                                      <input name="area" type="hidden" value="Area7">
                                      <input name="programID" type="hidden" value="<?= $program_id; ?>">
                                      <input name="accronym" type="hidden" value="<?= $accronym; ?>">
                                      <button class="btn btn-warning" type="submit" name="submit" id="submit"><i class="fa fa-lock"></i> Request access</button>
                                      </form>
                                    </div>
                                    <div class="col-md-4 text-ceneter no-margin-bottom no-margin-top">
                                      <br>
                                      <img src="<?= base_url();?>assets/img/d_lock.png" width="200px" height="200px"> 
                                    </div>
                                    </div>
                                  </div>
                                </div>
                                </div>

                              <?php } ?> <!-- End of Else-->

                            </div><!-- End of row bg-white has-shadow no-padding-bottom-->
                          </div><!-- End of card-body-->
                        </div>
                      </div><!-- End of Card 7-->

                      <div class="card no-margin-bottom"><!-- Card 8-->
                        <div class="card-header">
                          <a class="card-link" data-toggle="collapse" href="#area8">
                          <?php if($area8==1){
                            $lock='<span class="badge bg-green badge-corner"><i class="fa fa-unlock"></i></span>';
                          }else{
                            $lock='<span class="badge bg-red badge-corner"><i class="fa fa-lock"></i></span>';
                          }?>
                            <?= $lock; ?> Area VIII: <strong>Physical Facilities</strong> <i class="fa fa-angle-double-down"></i>
                          </a>
                        </div>
                        <div id="area8" class="collapse" data-parent="#accordion">
                          <div class="card-body">
                          <div class="row bg-white no-padding-bottom no-padding-top">
                              <?php if($area8==1){?>
                                
                                  <?php 
                                      $num_rows=0;
                                      foreach ($Area8 as $row) {
                                      $num_rows=$num_rows+1;
                                  ?>
                                  <div class="card col-md-3">
                                    <img class="card-img-top" src="<?= base_url();?>assets/img/<?= $row['Parameter']?>.png" alt="Card image">
                                      
                                      <div class="card-body">
                                        
                                        <?php if($row['Parameter'] == 'PPP'){?>
                                          <h4 class="card-title"> <?= $row['Parameter']?></h4>
                                        <?php }else {?>
                                          <h4 class="card-title">Parameter: <?= $row['Parameter']?> [<?= $row['Description']?>]</h4>
                                        <?php } ?>

                                        <small>Posted by: <?= $row['Modified_By']?> on <?= $row['Date_Modified']?>  <a href="<?= $row['Alternative_Link']?>" target="_blank" > Please click this link if an error has occured.</a></small>
                                        <a href="<?= base_url()?>accreditor/<?= $row['Campus']?>-<?= $row['slug']?>-<?= $row['parameter_id']?>-<?= $program_id;?>" target="_blanks" class="btn btn-primary btn-sm btn-block"><i class="fa fa-eye"></i> View Document</a>
                                      </div>
                                      
                                  </div>
                                  <?php } ?>

                                   <!--No document available-->
                                   <?php if($num_rows==0){?>
                                    <div class="container no-margin-bottom no-margin-top">
                                    <div class="card no-margin-bottom no-margin-top">
                                      <div class="card-body">
                                        <div class="row no-margin-bottom no-margin-top">
                                        <div class="col-md-8 no-margin-bottom no-margin-top">
                                          <h4><img src="<?= base_url();?>assets/img/logo.png" width="24px" height="24px"> <span style="color: #fd5050;">CSU | Online Accreditation System </span> <span><strong> DOCBank</strong></span></h4>
                                          <br>
                                          <h1>No document available</h1>
                                          <small>You are signed in as <strong><?= $this->session->email;?></strong></small>
                                        </div>
                                        <div class="col-md-4 text-ceneter no-margin-bottom no-margin-top">
                                          <br>
                                          <img src="<?= base_url();?>assets/img/d_no.png" width="200px" height="200px"> 
                                        </div>
                                        </div>
                                      </div>
                                    </div>
                                    </div>
                                  <?php } ?>
                                

                              <?php }else{ ?><!-- End of IF-->
                                <div class="container no-margin-bottom no-margin-top">
                                <div class="card no-margin-bottom no-margin-top">
                                  <div class="card-body">
                                    <div class="row no-margin-bottom no-margin-top">
                                    <div class="col-md-8 no-margin-bottom no-margin-top">
                                      <h4><img src="<?= base_url();?>assets/img/logo.png" width="24px" height="24px"> <span style="color: #fd5050;">CSU | Online Accreditation System </span> <span><strong> DOCBank</strong></span></h4>
                                      <br>
                                      <h1>You need permission</h1>
                                      <p>Want in? Ask the administrator for access, or switch to an account with permission. <a href="<?= base_url();?>logout">Switch account.</a></p>
                                      <small>You are signed in as <strong><?= $this->session->email;?></strong></small>
                                      <hr>
                                      <?= form_open('request_area2');?>
                                      <input name="area" type="hidden" value="Area8">
                                      <input name="programID" type="hidden" value="<?= $program_id; ?>">
                                      <input name="accronym" type="hidden" value="<?= $accronym; ?>">
                                      <button class="btn btn-warning" type="submit" name="submit" id="submit"><i class="fa fa-lock"></i> Request access</button>
                                      </form>
                                    </div>
                                    <div class="col-md-4 text-ceneter no-margin-bottom no-margin-top">
                                      <br>
                                      <img src="<?= base_url();?>assets/img/d_lock.png" width="200px" height="200px"> 
                                    </div>
                                    </div>
                                  </div>
                                </div>
                                </div>

                              <?php } ?> <!-- End of Else-->

                            </div><!-- End of row bg-white has-shadow no-padding-bottom-->
                          </div>
                        </div>
                      </div><!-- End of Card 8-->

                      <div class="card no-margin-bottom"><!-- Card 9-->
                        <div class="card-header">
                          <a class="card-link" data-toggle="collapse" href="#area9">
                          <?php if($area9==1){
                            $lock='<span class="badge bg-green badge-corner"><i class="fa fa-unlock"></i></span>';
                          }else{
                            $lock='<span class="badge bg-red badge-corner"><i class="fa fa-lock"></i></span>';
                          }?>
                            <?= $lock; ?> Area IX: <strong>Laboratories</strong> <i class="fa fa-angle-double-down"></i>
                          </a>
                        </div>
                        <div id="area9" class="collapse" data-parent="#accordion">
                          <div class="card-body">
                          <div class="row bg-white no-padding-bottom no-padding-top">
                              <?php if($area9==1){?>
                                
                                  <?php 
                                      $num_rows=0;
                                      foreach ($Area9 as $row) {
                                      $num_rows=$num_rows+1;
                                  ?>
                                  <div class="card col-md-3">
                                    <img class="card-img-top" src="<?= base_url();?>assets/img/<?= $row['Parameter']?>.png" alt="Card image">
                                      
                                      <div class="card-body">
                                        
                                        <?php if($row['Parameter'] == 'PPP'){?>
                                          <h4 class="card-title"> <?= $row['Parameter']?></h4>
                                        <?php }else {?>
                                          <h4 class="card-title">Parameter: <?= $row['Parameter']?> [<?= $row['Description']?>]</h4>
                                        <?php } ?>

                                        <small>Posted by: <?= $row['Modified_By']?> on <?= $row['Date_Modified']?>  <a href="<?= $row['Alternative_Link']?>" target="_blank" > Please click this link if an error has occured.</a></small>
                                        <a href="<?= base_url()?>accreditor/<?= $row['Campus']?>-<?= $row['slug']?>-<?= $row['parameter_id']?>" target="_blanks" class="btn btn-primary btn-sm btn-block"><i class="fa fa-eye"></i> View Document</a>
                                      </div>
                                      
                                  </div>
                                  <?php } ?>

                                   <!--No document available-->
                                   <?php if($num_rows==0){?>
                                    <div class="container no-margin-bottom no-margin-top">
                                    <div class="card no-margin-bottom no-margin-top">
                                      <div class="card-body">
                                        <div class="row no-margin-bottom no-margin-top">
                                        <div class="col-md-8 no-margin-bottom no-margin-top">
                                          <h4><img src="<?= base_url();?>assets/img/logo.png" width="24px" height="24px"> <span style="color: #fd5050;">CSU | Online Accreditation System </span> <span><strong> DOCBank</strong></span></h4>
                                          <br>
                                          <h1>No document available</h1>
                                          <small>You are signed in as <strong><?= $this->session->email;?></strong></small>
                                        </div>
                                        <div class="col-md-4 text-ceneter no-margin-bottom no-margin-top">
                                          <br>
                                          <img src="<?= base_url();?>assets/img/d_no.png" width="200px" height="200px"> 
                                        </div>
                                        </div>
                                      </div>
                                    </div>
                                    </div>
                                  <?php } ?>
                                

                              <?php }else{ ?><!-- End of IF-->
                                <div class="container no-margin-bottom no-margin-top">
                                <div class="card no-margin-bottom no-margin-top">
                                  <div class="card-body">
                                    <div class="row no-margin-bottom no-margin-top">
                                    <div class="col-md-8 no-margin-bottom no-margin-top">
                                      <h4><img src="<?= base_url();?>assets/img/logo.png" width="24px" height="24px"> <span style="color: #fd5050;">CSU | Online Accreditation System </span> <span><strong> DOCBank</strong></span></h4>
                                      <br>
                                      <h1>You need permission</h1>
                                      <p>Want in? Ask the administrator for access, or switch to an account with permission. <a href="<?= base_url();?>logout">Switch account.</a></p>
                                      <small>You are signed in as <strong><?= $this->session->email;?></strong></small>
                                      <hr>
                                      <?= form_open('request_area2');?>
                                      <input name="area" type="hidden" value="Area9">
                                      <input name="programID" type="hidden" value="<?= $program_id; ?>">
                                      <input name="accronym" type="hidden" value="<?= $accronym; ?>">
                                      <button class="btn btn-warning" type="submit" name="submit" id="submit"><i class="fa fa-lock"></i> Request access</button>
                                      </form>
                                    </div>
                                    <div class="col-md-4 text-ceneter no-margin-bottom no-margin-top">
                                      <br>
                                      <img src="<?= base_url();?>assets/img/d_lock.png" width="200px" height="200px"> 
                                    </div>
                                    </div>
                                  </div>
                                </div>
                                </div>

                              <?php } ?> <!-- End of Else-->

                            </div><!-- End of row bg-white has-shadow no-padding-bottom-->
                          </div>
                        </div>
                      </div><!-- End of Card 8-->

                      <div class="card no-margin-bottom"><!-- Card 9-->
                        <div class="card-header">
                          <a class="card-link" data-toggle="collapse" href="#area10">
                          <?php if($area10==1){
                            $lock='<span class="badge bg-green badge-corner"><i class="fa fa-unlock"></i></span>';
                          }else{
                            $lock='<span class="badge bg-red badge-corner"><i class="fa fa-lock"></i></span>';
                          }?>
                            <?= $lock; ?> Area X: <strong>Administration</strong> <i class="fa fa-angle-double-down"></i>
                          </a>
                        </div>
                        <div id="area10" class="collapse" data-parent="#accordion">
                          <div class="card-body">
                          <div class="row bg-white no-padding-bottom no-padding-top">
                              <?php if($area10==1){?>
                                
                                  <?php 
                                      $num_rows=0;
                                      foreach ($Area10 as $row) {
                                      $num_rows=$num_rows+1;
                                  ?>
                                  <div class="card col-md-3">
                                    <img class="card-img-top" src="<?= base_url();?>assets/img/<?= $row['Parameter']?>.png" alt="Card image">
                                      
                                      <div class="card-body">
                                        
                                        <?php if($row['Parameter'] == 'PPP'){?>
                                          <h4 class="card-title"> <?= $row['Parameter']?></h4>
                                        <?php }else {?>
                                          <h4 class="card-title">Parameter: <?= $row['Parameter']?> [<?= $row['Description']?>]</h4>
                                        <?php } ?>

                                        <small>Posted by: <?= $row['Modified_By']?> on <?= $row['Date_Modified']?>  <a href="<?= $row['Alternative_Link']?>" target="_blank" > Please click this link if an error has occured.</a></small>
                                        <a href="<?= base_url()?>accreditor/<?= $row['Campus']?>-<?= $row['slug']?>-<?= $row['parameter_id']?>-<?= $program_id;?>" target="_blanks" class="btn btn-primary btn-sm btn-block"><i class="fa fa-eye"></i> View Document</a>
                                      </div>
                                      
                                  </div>
                                  <?php } ?>

                                   <!--No document available-->
                                   <?php if($num_rows==0){?>
                                    <div class="container no-margin-bottom no-margin-top">
                                    <div class="card no-margin-bottom no-margin-top">
                                      <div class="card-body">
                                        <div class="row no-margin-bottom no-margin-top">
                                        <div class="col-md-8 no-margin-bottom no-margin-top">
                                          <h4><img src="<?= base_url();?>assets/img/logo.png" width="24px" height="24px"> <span style="color: #fd5050;">CSU | Online Accreditation System </span> <span><strong> DOCBank</strong></span></h4>
                                          <br>
                                          <h1>No document available</h1>
                                          <small>You are signed in as <strong><?= $this->session->email;?></strong></small>
                                        </div>
                                        <div class="col-md-4 text-ceneter no-margin-bottom no-margin-top">
                                          <br>
                                          <img src="<?= base_url();?>assets/img/d_no.png" width="200px" height="200px"> 
                                        </div>
                                        </div>
                                      </div>
                                    </div>
                                    </div>
                                  <?php } ?>
                                

                              <?php }else{ ?><!-- End of IF-->
                                <div class="container no-margin-bottom no-margin-top">
                                <div class="card no-margin-bottom no-margin-top">
                                  <div class="card-body">
                                    <div class="row no-margin-bottom no-margin-top">
                                    <div class="col-md-8 no-margin-bottom no-margin-top">
                                      <h4><img src="<?= base_url();?>assets/img/logo.png" width="24px" height="24px"> <span style="color: #fd5050;">CSU | Online Accreditation System </span> <span><strong> DOCBank</strong></span></h4>
                                      <br>
                                      <h1>You need permission</h1>
                                      <p>Want in? Ask the administrator for access, or switch to an account with permission. <a href="<?= base_url();?>logout">Switch account.</a></p>
                                      <hr>
                                      <?= form_open('request_area2');?>
                                      <input name="area" type="hidden" value="Area10">
                                      <input name="programID" type="hidden" value="<?= $program_id; ?>">
                                      <input name="accronym" type="hidden" value="<?= $accronym; ?>">
                                      <button class="btn btn-warning" type="submit" name="submit" id="submit"><i class="fa fa-lock"></i> Request access</button>
                                      </form>
                                    </div>
                                    <div class="col-md-4 text-ceneter no-margin-bottom no-margin-top">
                                      <br>
                                      <img src="<?= base_url();?>assets/img/d_lock.png" width="200px" height="200px"> 
                                    </div>
                                    </div>
                                  </div>
                                </div>
                                </div>

                              <?php } ?> <!-- End of Else-->

                            </div><!-- End of row bg-white has-shadow no-padding-bottom-->
                          </div>
                        </div>
                      </div><!-- End of Card 8-->
                    </div><!-- End of Accordion-->

            </section>
          </div><!-- end of container-fluid1-->

           <!--Messagge Box-->
        <?php if($this->session->flashdata('request_area2')) : ?>
          
          <div class="toast" data-autohide="false" style="position: absolute; top: 300px; right: 0; min-width: 300px;">
            <div class="toast-header bg-red">
            <strong class="mr-auto"><i class="fa fa-bullhorn"></i> System Message</strong>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
            </div>
            <div class="toast-body">
            <?= $this->session->flashdata('request_area2'); ?>
            </div>
          </div>

        <?php endif;?>
          
  <?php } ?>
<?php }else{
redirect (base_url());
}?>