<!--For Auditors-->
<?php
if($this->session->ous_id == 16){
    $disabled = "disabled-link";
}else{
    $disabled = " ";
}
?>
<style>
.disabled-link{
    pointer-events: none;
    cursor: not-allowed;
    opacity: .65;
}

</style>
<!--For Auditors-->

<?php 
if( $this->session->logged_in){
  if( $this->session->role == 'Accre'){
    redirect (base_url().'Guest');
  }else{?>
  <div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid ">
             
              <h2 class="no-margin-bottom"> User's Profile</h2>
            </div>
          </header>

          
          <!-- Breadcrumb-->
          <?php require_once('breadcrumb.php'); ?>

          <!-- Dashboard Parameters-->

          <!-- container-fluid-->
          <div class="container-fluid">
             <!-- section dashboard-counts -->
            <section class="dashboard-counts">
              <h1><span class="badge bg-warning badge-corner"><i class="fa fa-user"></i></span> <?= $this->session->name; ?></h1><hr>
              <!-- container-->  
              <div class="container">
                  <!--Form-->
                  <?= form_open_multipart('update_user')?>
                    <!-- row bg-white no-padding-top-->
                    <div class="row bg-white no-padding-top"> 
                      <!-- col-md-4 text-center-->
                      <div class="col-md-4 text-center"> 
                        <h2 class="mt-4"> Account Details</h2>
                        <!-- card mt-4 no-margin-bottom -->
                        <div class="card mt-4 no-margin-bottom">
                          <!-- card-body -->
                          <div class="card-body">
                            <?php if ($profile == null) { ?>
                              <img id="profile_pic" src="<?= base_url();?>uploads/profile/img_avatar1.png" alt="Default" class="img-fluid rounded-circle" >
                            <?php } else {?>
                              <img id="profile_pic" src="<?= base_url();?>uploads/profile/<?= $profile ?>" alt="<?= $profile ?>" class="img-fluid rounded-circle">
                            <?php } ?>
                            <hr>
                            <a href="#" class="btn btn-primary btn-block btn-sm" onclick="document.getElementById('file').click();"><i class="fa fa-folder"></i> Browse</a>
                            <input type='file' name='file' accept="image/*" id="file" style="display:none" onchange="onFileSelected(event)"/>
                            <small>
                                Maximum upload file size: <strong>2MB</strong><br>
                                Maximum dimensions (height & width): <strong>192px x 192px</strong>
                            </small>
                          </div>
                          <!-- card-body -->
                        </div>
                        <!-- card mt-4 no-margin-bottom -->
                      </div>
                      <!-- End of col-md-4 text-center-->   
                      
                      <!-- col-md-8 -->
                      <div class="col-md-8">
                        <!-- card mt-4 no-margin-bottom -->
                        <div class="card mt-4 no-margin-bottom">
                          <!-- card-body no-margin-bottom-->
                          <div class="card-body no-margin-bottom">
                          
                              <div class="form-group">
                                <label class="form-control-label">Email</label>
                                <input type="email" name="email" class="form-control" value="<?= $this->session->email; ?>" required>
                              </div>

                              <div class="form-group">
                                <label class="form-control-label">Name</label>
                                <input type="text" class="form-control" name="name" value="<?= $name ?>">
                              </div>

                              <div class="form-group">       
                                <label class="form-control-label">New Password</label>
                                <input type="password" placeholder="Password" name="password" class="form-control">
                                <small>Leave <b>blank</b> if you do not want to change your current password.</small>
                              </div>

                              <div class="form-group">       
                                <label class="form-control-label">Confirm Password</label>
                                <input type="password" placeholder="Password" name="confirmpassword" class="form-control">
                              </div>

                              <div class="form-group">
                                  <label class="form-control-label">Operating Unit</label>
                                  <select name="ous_desc" class="form-control">
                                    <?php foreach ($operating_units as $row){ ?>
                                      <?php if($row['ous_desc'] == $operating_unit){
                                        $selected_ous = 'selected';
                                      }else{
                                        $selected_ous = '';
                                      }?>
                                      <option value="<?= $row['ous_id']?>" <?= $selected_ous ?>><?= $row['ous_desc']?></option>
                                    <?php } ?>
                                  </select>
                              </div>

                              <div class="form-group pull-right no-margin-bottom">       
                                <input type="submit" value="Update" name='upload' class="btn btn-primary <?= $disabled ?>">
                              </div>
                            
                          </div>
                          <!-- card-body no-margin-bottom-->
                        </div>
                        <!-- card mt-4 no-margin-bottom -->                  
                      </div>
                      <!--End of col-md-8-->                  
                    </div>
                    <!-- End of row bg-white no-padding-top-->
                  </form><!--End of Form-->

                  <hr>
                                     
                  <div class="row bg-white"> <!-- row bg-white PDS-->   
                      
                      <div class="col-md-12 no-padding-top no-margin-bottom"><!-- col-md-4 text-center-->
                          <!-- 1st Row-->            
                          <div class="row no-padding-top no-margin-bottom">           
                            <h2> Personal Data Sheet</h2><hr>
                            <div class="card no-margin-bottom">
                              <div class="btn-group pull-right no-padding-top no-margin-bottom">
                                  <a href="<?= base_url()?>personal_data_sheet_view" target="_blank" type="button" class="btn btn-sm" style="background-color:#BBDEFB"><i class="fa fa-print"></i> Sheet 1</a>
                                  <a href="<?= base_url()?>personal_data_sheet_view1" target="_blank" type="button" class="btn btn-sm" style="background-color:#90CAF9"><i class="fa fa-print"></i> Sheet 2</a>
                                  <a href="<?= base_url()?>personal_data_sheet_view2" target="_blank" type="button" class="btn btn-sm" style="background-color:#64B5F6"><i class="fa fa-print"></i> Sheet 3</a>
                                  <a href="<?= base_url()?>personal_data_sheet_view3" target="_blank" type="button" class="btn btn-sm" style="background-color:#42A5F5"><i class="fa fa-print"></i> Sheet 4</a>
                                  <a href="<?= base_url()?>personal_data_sheet_view_wes" target="_blank" type="button" class="btn btn-sm" style="background-color:#2196F3"><i class="fa fa-print"></i> Work Experience Sheet</a>
                              </div>  
                            </div>
                          <div>
                          <!-- 1st Row--> 

                          <!-- 2nd Row-->            
                          <div class="row no-padding-top mt-3">           
                            <div class="card">
                              <!-- TAB START-->
                                      <!-- TABS-->
                                  <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                      <a class="nav-link active" id="home-tab" data-toggle="tab" href="#Personal_Information" role="tab" aria-controls="home"
                                        aria-selected="true">I. Personal Information</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" id="profile-tab" data-toggle="tab" href="#Family_Background" role="tab" aria-controls="profile"
                                        aria-selected="false">II. Family Background</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" id="contact-tab" data-toggle="tab" href="#Educational_Background" role="tab" aria-controls="contact"
                                        aria-selected="false">III. Educational Background</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" id="contact-tab" data-toggle="tab" href="#Civil_Service_Eligibility" role="tab" aria-controls="Civil_Service_Eligibility"
                                        aria-selected="false">IV. Civil Service Eligibility</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" id="contact-tab" data-toggle="tab" href="#work_experience" role="tab" aria-controls="work_experience"
                                        aria-selected="false">V. Work Experience</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" id="contact-tab" data-toggle="tab" href="#Voluntary_Work" role="tab" aria-controls="Voluntary_Work"
                                        aria-selected="false">VI. Voluntary Work</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" id="contact-tab" data-toggle="tab" href="#Learning_Development" role="tab" aria-controls="Learning_Development"
                                        aria-selected="false">VII. Learning and Development</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" id="contact-tab" data-toggle="tab" href="#Other_Information" role="tab" aria-controls="Other_Information"
                                        aria-selected="false">VIII. Other Information</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" id="contact-tab" data-toggle="tab" href="#Charater_reference" role="tab" aria-controls="Charater_reference"
                                        aria-selected="false">IX. Character References/ Government ID</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" id="contact-tab" data-toggle="tab" href="#Employment_Information" role="tab" aria-controls="Employment_Information"
                                        aria-selected="false">X. Employment Information</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" id="contact-tab" data-toggle="tab" href="#work_experience_sheet" role="tab" aria-controls="work_experience_sheet"
                                        aria-selected="false">XI. Work Experience Sheet</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" id="contact-tab" data-toggle="tab" href="#my_document" role="tab" aria-controls="my_document"
                                        aria-selected="false">My Documents</a>
                                    </li>
                                  </ul>

                                  <div class="tab-content" id="myTabContent">
                                    <!--I. Personal Information-->
                                    <div class="tab-pane fade show active" id="Personal_Information" role="tabpanel" style="margin-bottom:20px;" aria-labelledby="home-tab">
                                      <div class="col-md-12">
                                        <?php include("hr/pds_sheet1.php") ?> 
                                      </div><!--Col MD 12-->
                                    </div>
                                    <!--I. Personal Information-->
                                    
                                    <!--II. Family Background-->    
                                    <div class="tab-pane fade" id="Family_Background" role="tabpanel" style="margin-bottom:20px;" aria-labelledby="profile-tab">
                                      <div class="col-md-12">
                                          <?php include("hr/pds_sheet1-1.php") ?> 
                                      </div>
                                    </div>
                                    <!--II. Family Background-->    

                                    <!--III. Educational Background-->
                                    <div class="tab-pane fade" id="Educational_Background" role="tabpanel" style="margin-bottom:20px;" aria-labelledby="contact-tab">
                                      <div class="col-md-12">
                                          <br>
                                          <label class="form-control-label">26. Educational Background - Elementary, Secondary, Vocational / Trade Course,  College, Graduate Studies <a href="javascript:void(0);" data-toggle="modal" data-target="#Modal_Add_Educational"><i class="fa fa-plus"></i> Add</a></label>
                                          <?php include("hr/educational.php") ?>
                                      </div>    
                                    </div> 
                                    <!--III. Educational Background-->

                                    <!--IV. Eligibility-->  
                                    <div class="tab-pane fade" id="Civil_Service_Eligibility" role="tabpanel" style="margin-bottom:20px;" aria-labelledby="contact-tab">
                                      <div class="col-md-12"> 
                                        <br>
                                        <label class="form-control-label">27. Civil Service Eligibility (Career Service/ Ra 1080 (Board/ Bar) Under Special Laws/ CES/ CSEE Barangay Eligibility / Driver's License) <a href="javascript:void(0);" data-toggle="modal" data-target="#Modal_Add_Eligibility"><i class="fa fa-plus"></i> Add</a></label>   
                                          <?php include("hr/eligibility.php") ?> 
                                      </div>
                                    </div>
                                    <!--IV. Eligibility-->   

                                    <div class="tab-pane fade" id="work_experience" role="tabpanel" style="margin-bottom:20px;" aria-labelledby="contact2-tab">
                                      <!--Third Row-->
                                      <div class="row no-padding-bottom no-padding-top"> 
                                        <!--List-->                   
                                        <br>
                                        <label class="form-control-label">28. Work Experience (Include private employment. Start from your recent work) Description of duties should be indicated in the attached Work Experience sheet. <a href="javascript:void(0);" data-toggle="modal" data-target="#Modal_Add_work_experience"><i class="fa fa-plus"></i> Add</a> | <a href="javascript:void(0);" data-toggle="modal" data-target="#Modal_Import_Work_Experience"><i class="fa fa-cloud-upload" aria-hidden="true"></i> Import</a></label>
                                          <?php include("hr/workexperience.php") ?> 
                                        <!--List-->
                                      </div><!--Third Row-->  
                                    </div>  

                                    <div class="tab-pane fade" id="Voluntary_Work" role="tabpanel" style="margin-bottom:20px;" aria-labelledby="contact3-tab">
                                      <!--Third Row-->
                                      <div class="row no-padding-bottom"> 
                                        <!--List-->                   
                                        <br>
                                        <label class="form-control-label">29. Voluntary Work or Involvement In Civic / Non-Government / People / Voluntary Organization/s. <a href="javascript:void(0);" data-toggle="modal" data-target="#Modal_Add_Voluntary_Work"><i class="fa fa-plus"></i> Add</a></label>
                                        <?php include("hr/voluntarywork.php") ?> 
                                        <!--List-->
                                      </div><!--Third Row-->  
                                    </div>  

                                    <div class="tab-pane fade" id="Learning_Development" role="tabpanel" style="margin-bottom:20px;" aria-labelledby="contact4-tab">
                                      <!--Third Row-->
                                      <div class="row no-padding-bottom"> 
                                        <!--List-->                   
                                        <br>
                                        <label class="form-control-label">30. Learning and Development (L&D) Interventions/Training Programs Attended</label>
                                        <?php include("hr/learninganddevelopment.php") ?> 
                                        <!--List-->
                                      </div><!--Third Row--> 
                                    </div>  
                                    <div class="tab-pane fade" id="Other_Information" role="tabpanel"  style="margin-bottom:20px;"aria-labelledby="contact5-tab">
                                      <!--Third Row-->
                                      <div class="row no-padding-bottom"> 
                                        <!--List-->                   
                                        <br>
                                        <label class="form-control-label">31. Special Skills and Hobbies <a href="javascript:void(0);" data-toggle="modal" data-target="#Modal_Add_Hobbies"><i class="fa fa-plus"></i> Add</a></label>
                                          <?php include("hr/hobbies.php") ?> 
                                        <!--List-->
                                      </div><!--Third Row--> 

                                      <!--Third Row-->
                                      <div class="row no-padding-bottom"> 
                                        <!--List-->                   
                                        <br>
                                        <label class="form-control-label">32. Non-Academic Distinction/ Recognition (Write in full) <a href="javascript:void(0);" data-toggle="modal" data-target="#Modal_Add_Recognition"><i class="fa fa-plus"></i> Add</a></label>
                                          <?php include("hr/recognition.php") ?> 
                                        <!--List-->
                                      </div><!--Third Row--> 

                                      <!--Third Row-->
                                      <div class="row no-padding-bottom"> 
                                        <!--List-->                   
                                        <br>
                                        <label class="form-control-label">33. Membership in Association/ Organization (Write in full) <a href="javascript:void(0);" data-toggle="modal" data-target="#Modal_Add_Membership"><i class="fa fa-plus"></i> Add</a></label>
                                          <?php include("hr/membership.php") ?> 
                                        <!--List-->
                                      </div><!--Third Row--> 

                                    </div> 
                                  
                                    <!--III. Charater_reference-->
                                    <div class="tab-pane fade" id="Charater_reference" role="tabpanel" style="margin-bottom:20px;" aria-labelledby="contact6-tab">
                                      <!--Third Row-->
                                      <div class="row no-padding-bottom"> 
                                        <!--List-->                   
                                        <br>
                                        <label class="form-control-label">41. References (Person not related by consanguinity to applicant/ appointee) <a href="javascript:void(0);" data-toggle="modal" data-target="#Modal_Add_References"><i class="fa fa-plus"></i> Add</a></label>
                                        <?php include("hr/character_references.php") ?>
                                        <!--List-->
                                      </div><!--Third Row--> 
                                    </div>  
                                    <div class="tab-pane fade" id="Employment_Information" role="tabpanel" style="margin-bottom:20px;" aria-labelledby="contact-tab">
                                        <div class="col-md-12">
                                          <?php include("hr/employment.php") ?> 
                                        </div><!--Col MD 12-->
                                    </div>  

                                    <!--Work Experience Sheet-->
                                    <div class="tab-pane fade" id="work_experience_sheet" role="tabpanel" style="margin-bottom:20px;" aria-labelledby="contact7-tab">
                                      <!--Third Row-->
                                      <div class="row no-padding-bottom"> 
                                        <!--List-->                   
                                        <br>
                                        <label class="form-control-label">Work Experience Sheet <a href="javascript:void(0);" data-toggle="modal" data-target="#Modal_Add_WES"><i class="fa fa-plus"></i> Add</a></label>
                                        <?php include("hr/work-experience-sheet.php") ?>
                                        <!--List-->
                                      </div><!--Third Row--> 
                                    </div>  

                                    <!--Work Experience Sheet-->
                                    <div class="tab-pane fade" id="my_document" role="tabpanel" style="margin-bottom:20px;" aria-labelledby="contact8-tab">
                                      <!--Third Row-->
                                      <div class="row no-padding-bottom"> 
                                        <!--List-->                   
                                        <br>
                                        <label class="form-control-label">My Documents <a href="javascript:void(0);" data-toggle="modal" data-target="#add_my_document"><i class="fa fa-plus"></i> Add</a></label>
                                        <?php include("hr/my_document.php") ?>
                                        <!--List-->
                                      </div><!--Third Row--> 
                                    </div>  

                                  </div> 
                              <!-- TAB END-->
                            </div>
                          </div> 
                          <!-- 2nd Row--> 

                          
                      </div><!-- col-md-4 text-center-->  
                                     
                  </div><!-- row bg-white PDS-->  
                  
              </div><!-- End of container-->
              
            </section> <!-- End of section-->
           
          </div> <!-- end of container-fluid-->
         

    <!--Messagge Box-->
    <?php if($this->session->flashdata('update_user')) : ?>
      
      <div class="toast" data-autohide="false" style="position: absolute; top: 150px; right: 0; min-width: 300px;">
        <div class="toast-header bg-red">
        <strong class="mr-auto"><i class="fa fa-bullhorn"></i> System Message</strong>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
        </div>
        <div class="toast-body">
        <?= $this->session->flashdata('update_user'); ?>
        </div>
      </div>

    <?php $this->session->unset_userdata('update_user'); endif;?>
        
  <?php }?>
<?php }else{
redirect (base_url());
}?>

