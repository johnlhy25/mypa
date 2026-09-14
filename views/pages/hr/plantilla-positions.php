<?php 
if( $this->session->logged_in){
  if( $this->session->role == 'Accre'){
    redirect (base_url().'Guest');
  }else{?>
  <div id="content-inner-plantilla" class="content-inner">
<!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Plantilla Positions</h2>
            </div>
          </header>
<!-- Page Header-->

<!-- Breadcrumb-->
        <?php require_once('breadcrumb.php'); ?>
<!-- Breadcrumb-->

<!--div col lg 12-->
      <div class="col-lg-12 mt-3">
        <div class="card bg-white">
          <div class="card-close">
            <div class="dropdown">
              <button type="button" id="closeCard3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                  <div aria-labelledby="closeCard3" class="dropdown-menu dropdown-menu-right has-shadow">
                    <a data-toggle="modal" href="#add" class="dropdown-item edit"> <i class="fa fa-plus"></i> Add Position</a>
                    <a href="" class="dropdown-item edit"> <i class="fa fa-print"></i> Print (Under Dev't)</a>
                  </div>
            </div>
          </div>
          <div class="card-header d-flex align-items-center">
					  <h1> <span class="badge bg-blue badge-corner"><i class="fa fa-desktop" aria-hidden="true"></i></span> List of Plantilla Positions</h1>
				  </div>
          <div class="card-body">
            <!--Operating Units-->
            
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#posotion" role="tab" aria-controls="home"
                  aria-selected="true">I. Filled-up</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#vacant" role="tab" aria-controls="profile"
                  aria-selected="false">II. Vacant</a>
              </li>
            </ul>

            <div class="tab-content" id="myTabContent">
                                    
              <!--I. May Laman-->
              <div class="tab-pane fade show active" id="posotion" role="tabpanel" aria-labelledby="home-tab">
                <div class="col-md-12">
                  <div class="row" >
                    <div class="card no-margin-bottom mt-2">
                      <div class="btn-group pull-right no-padding-top no-margin-bottom">
                          <a href="print_modal" class="btn btn-sm" style="background-color:#BBDEFB"><i class="fa fa-print"></i> Print Recuitment and Selection Monitoring Form (Annex B)</a>    
                      </div>  
                    </div>
                  </div>

                  <div class="table-responsive mt-2">   
                    <table id="plantilla_table" class="table table-striped table-hover">
                      <thead>
                        <tr>
                          
                          <th>#</th>
                          <th>Plantilla No.</th>
                          <th>Position</th>
                          <th>Salary Grade</th>
                          <th>Operating Unit</th>
                          <th>Employee</th>
                          <th>Actions</th>
                        </tr>
                      </thead>

                      <tbody id="plantilla_position_table">

                      </tbody>	
                    </table>							
                  </div>  
                </div><!--Col MD 12-->
              </div>
              <!--I. May Laman-->
              
              <!--II. Vacant-->    
              <div class="tab-pane fade" id="vacant" role="tabpanel" aria-labelledby="profile-tab">
                <div class="col-md-12">
                  <div class="row" >
                    <div class="card no-margin-bottom mt-2">
                      <div class="btn-group pull-right no-padding-top no-margin-bottom">
                          <?php if($this->session->role == 'Super Admin'){?>
                          <a data-toggle="modal" href="#print_modal" class="btn btn-sm" style="background-color:#BBDEFB"><i class="fa fa-print"></i> Request for Publication</a>
                          &nbsp <?php } ?>
                          <a href="<?= base_url()?>annual_recruitment_plan" target="_blank" class="btn btn-sm" style="background-color:#BBDEFB"><i class="fa fa-print"></i> Print Annual Recruitment Plan (Annex A)</a>    
                      </div>  
                    </div>
                  </div>

                  <div class="table-responsive mt-3">   
                    <table id="vacant_table" class="table table-striped table-hover">
                      <thead>
                        <tr>
                          
                          <th>#</th>
                          <th>Plantilla No.</th>
                          <th>Position</th>
                          <th>Salary Grade</th>
                          <th>Operating Unit</th>
                          <th>Opening Date</th>
                          <th>Closing Date</th>
                          <th>Status</th>
                          <th>Actions</th>
                        </tr>
                      </thead>

                      <tbody id="vacant_position_table">

                      </tbody>	
                    </table>							
                  </div>  
                </div>
              </div>
              <!--II. Vacant-->    

            </div> 
            <!--Operating Units-->
          </div>
        </div>    
      </div>
<!--div col lg 12-->

<!-- Modal Add Plantilla -->
      <div class="modal fade delete" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">	
          <div class="modal-content">

            <div class="modal-header">
              <h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus"></i> Add</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
              <form action="" method="POST" id="platilla_position_save" role="form">
              <div class="row">
                <div id="plantilla_add" class="col-md-12" >
                <div class="row">
                  <!--First Row-->
                  <div class="col-lg-7">

                    <!--Start Inputting-->
                    <input type="hidden" name="usr_id" value="<?= $this->session->usr_id?>">
                    <div class="row form-group">
                      <div class="col-sm-4">
                        <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-address-card" aria-hidden="true"></i><b> Plantilla No.:</b></label>
                      </div>
                      <div class="col-sm-8">
                        <input id="plantilla_no" type="text" class="form-control" name="plantilla_no" placeholder="TESDAB-ADOF1-41-2017" required>
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-sm-4">
                        <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-address-card" aria-hidden="true"></i><b> Position Title:</b></label>
                      </div>
                      <div class="col-sm-8">
                        <input id="plantilla_desc" type="text" class="form-control" name="plantilla_desc" placeholder="Administrative Officer I (Cashier)" required>
                        <small>(Parenthetical Title, if applicable)</small>
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-sm-4">
                        <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-money" aria-hidden="true"></i><b> Salary Grade:</b></label>
                      </div>
                      <div class="col-sm-8">
                        <input id="salary_grade" type="number" class="form-control" name="salary_grade" placeholder="10" required>
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-sm-4">
                        <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-money" aria-hidden="true"></i><b> Salary:</b></label>
                      </div>
                      <div class="col-sm-8">
                        <input id="salary" name="salary" type="number" min="0" step="0.1" class="form-control" placeholder="22190" required>
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-sm-4">
                        <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-building"></i><b> Operating Unit:</b></label>
                      </div>
                      <div class="col-sm-8">
                        <select id="ous" class="form-control" name="ous" required>
                          <option value="0">--Operating Unit--</option>
                          <?php foreach ($operating_units as $row){ ?>
                            <option value="<?= $row['ous_id']?>"><?= $row['ous_desc']?></option>
                          <?php } ?>
                        </select>
                        <input type="checkbox" id="ptc_chk" name="ptc_chk" class="checkbox-template" style="margin-left:2px" value="1"/> &nbsp PTC Position?
                      </div>
                     
                    </div>

                    <div class="row form-group">
                      <div class="col-sm-4">
                        <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-user"></i><b> Employee:</b></label>
                      </div>
                      <div class="col-sm-8">
                        <select id="emp_name" class="form-control" name="emp_name" disabled>
                      
                        </select>
                        <input type="checkbox" id="vacant_chk" name="vacant_chk" class="checkbox-template" style="margin-left:2px" value="1"/> &nbsp Vacant?
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-sm-4">
                        <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-graduation-cap" aria-hidden="true"></i><b> Education:</b></label>
                      </div>
                      <div class="col-sm-8">
                        <input id="education" type="text" class="form-control" name="education" placeholder="Bachelor's degree relevant to the job" required>
                      </div>
                    </div>
                    <!--End of Inputting-->  
                  </div>
                  <!--First Row-->
                  <!--Second Row-->
                  <div class="col-lg-5">
                    
                    <div class="row form-group"  style="margin-right:5px;">
                      <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-graduation-cap" aria-hidden="true"></i><b> Training</b></label>
                      <input id="training" type="text" class="form-control" name="training" placeholder="None required" required>
                    </div>

                    <div class="row form-group"  style="margin-right:5px;">
                      <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-briefcase" aria-hidden="true"></i><b> Experience</b></label>
                      <input id="experience" type="text" class="form-control" name="experience" placeholder="None required" required>
                    </div>

                    <div class="row form-group"  style="margin-right:5px;">
                      <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-id-card" aria-hidden="true"></i><b> Eligibility</b></label>
                      <input id="eligibility" type="text" class="form-control" name="eligibility" placeholder="Career Service (Professional), Second Level Eligibity" required>
                    </div>

                    <div class="row form-group"  style="margin-right:5px;">
                      <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-crosshairs" aria-hidden="true"></i><b> Competency</b></label>
                      <textarea id="competency"  rows="6" class="form-control" name="competency" placeholder="Work effectively in vocational education and training; Participate in workplace communication; Work in team environment" required></textarea>
                      <small>Seperate each with a semicolon(;)</small>
                    </div>

                  </div>
                  <!--Second Row-->
                  </div>
                </div><!--End of Col-SM-12-->
              </div><!--End of row-->
              <hr>             
              <div id="plan" class="row"><!--Start of row hidden-->
                <!--First Row-->
                <div class="col-lg-7">
                  <h4><i class="fa fa-calendar" aria-hidden="true"></i> Annual Recruitment Plan</h4>
                  <br>
                  <!--Priority Level-->
                  <div class="row form-group">
                      <div class="col-sm-4">
                        <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-level-up" aria-hidden="true"></i><b> Priority Level:</b></label>
                      </div>
                      <div class="col-sm-8">
                        <input id="arp_priority_level" type="text" class="form-control" name="arp_priority_level" placeholder="Low">
                      </div>
                  </div>
                  <!--Priority Level-->
                  <!--No. of applicants-->
                  <div class="row form-group">
                      <div class="col-sm-4">
                        <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-users" aria-hidden="true"></i><b> Target No. of Applicant/s:</b></label>
                      </div>
                      <div class="col-sm-8">
                        <input id="arp_no_applicant" type="number" class="form-control" name="arp_no_applicant" placeholder="20">
                      </div>
                  </div>
                  <!--No. of applicants-->
                  <!--Publication Date-->
                  <div class="row form-group">
                      <div class="col-sm-4">
                        <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-calendar" aria-hidden="true"></i><b> Target Date of Publication:</b></label>
                      </div>
                      <div class="col-sm-8">
                        <input id="arp_pub_date" type="date" class="form-control" name="arp_pub_date">
                      </div>
                  </div>
                  <!--Publication Date-->
                  <!--Hiring Date-->
                  <div class="row form-group">
                      <div class="col-sm-4">
                        <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-calendar" aria-hidden="true"></i><b> Target Date of Hiring:</b></label>
                      </div>
                      <div class="col-sm-8">
                        <input id="arp_hiring_date" type="date" class="form-control" name="arp_hiring_date">
                      </div>
                  </div>
                  <!--Hiring Date-->
                  <!--Sourcing Category-->
                  <div class="row form-group">
                      <div class="col-sm-4">
                        <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-link" aria-hidden="true"></i><b> Sourcing Category:</b></label>
                      </div>
                      <div class="col-sm-8">
                        <textarea id="arp_sourcing" rows="4" class="form-control" name="arp_sourcing" placeholder="CSC Website, TESDA DOS Website, TESDA official FB Account, TESDA R2 Bulletin Boards"></textarea>
                      </div>
                  </div>
                  <!--Sourcing Category-->
                </div>
                <!--First Row-->

                <!--Second Row-->
                <div class="col-lg-5">
                  <br>
                  <!--Resources Area-->
                  <div class="row form-group"  style="margin-right:5px;">
                      <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-cube" aria-hidden="true"></i><b> Resources NeededCompetency</b></label>
                      <textarea id="arp_resources"  rows="4" class="form-control" name="arp_resources" placeholder="Desktop/laptop, letters of invitation, Notice for Job Openings"></textarea>
                  </div>
                  <!--Resources Area-->
                  <!--Budget-->
                  <div class="row form-group"  style="margin-right:5px;">
                      <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-money" aria-hidden="true"></i><b> Budgetary Requirements</b></label>
                      <input id="arp_budgetary"  type="number" class="form-control" name="arp_budgetary" placeholder="1500">
                  </div>
                  <!--Budget Area-->
                  <!--Risk Area-->
                  <div class="row form-group"  style="margin-right:5px;">
                      <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-question-circle" aria-hidden="true"></i><b> Potential Risks/Problems</b></label>
                      <textarea id="arp_risks"  rows="4" class="form-control" name="arp_risks" placeholder="Restrictions due to pandemic"></textarea>
                  </div>
                  <!--Risk  Area-->
                  <!--Remarks-->
                  <div class="row form-group"  style="margin-right:5px;">
                      <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-pencil-square" aria-hidden="true"></i><b> Remarks</b></label>
                      <textarea id="arp_remarks"  rows="4" class="form-control" name="arp_remarks" placeholder="The said position is still not declared safe to open since the owner of the position who is newly promoted  to a TESDS II is not yet attested"></textarea>
                  </div>
                  <!--Remarks-->
                </div>
                 <!--Second Row-->

              </div><!--End of row hidden-->

            </div><!-- Modal Body-->
                          
            <div class="modal-footer">
              <div class="btn-group">
                <button id="save_plantilla" type="submit" value='Upload' name='upload' class="btn btn-danger">Submit</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>	
              </div>

              <div id="loading_plantilla" class="spinner-grow text-primary" style="display: none;" role="status">
                <span class="sr-only">Loading... </span>
              </div>	
            </div>

            </form>						
          </div>
          </div>
      </div>
<!-- End Add Modal -->

<!-- Modal Edit Plantilla -->
      <div class="modal fade delete" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog modal-lg" role="document">	
          <div class="modal-content">

            <div class="modal-header">
              <h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-edit"></i> Edit</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
              <form action="" method="POST" id="platilla_position_edit" role="form">
              <div class="row">
                <div id="plantilla_edit" class="col-md-12" >
                <div class="row">
                  <!--First Row-->
                  <div class="col-lg-7">

                    <!--Start Inputting-->
                    <input type="hidden" name="usr_id_edit" value="<?= $this->session->usr_id?>">
                    <input type="hidden" id="pos_id_edit" name="pos_id_edit">
                    <div class="row form-group">
                      <div class="col-sm-4">
                        <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-address-card" aria-hidden="true"></i><b> Plantilla No.:</b></label>
                      </div>
                      <div class="col-sm-8">
                        <input id="plantilla_no_edit" type="text" class="form-control" name="plantilla_no_edit" placeholder="TESDAB-ADOF1-41-2017" required>
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-sm-4">
                        <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-address-card" aria-hidden="true"></i><b> Position Title:</b></label>
                      </div>
                      <div class="col-sm-8">
                        <input id="plantilla_desc_edit" type="text" class="form-control" name="plantilla_desc_edit" placeholder="Administrative Officer I (Cashier)" required>
                        <small>(Parenthetical Title, if applicable)</small>
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-sm-4">
                        <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-money" aria-hidden="true"></i><b> Salary Grade:</b></label>
                      </div>
                      <div class="col-sm-8">
                        <input id="salary_grade_edit" type="number" class="form-control" name="salary_grade_edit" placeholder="10" required>
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-sm-4">
                        <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-money" aria-hidden="true"></i><b> Salary:</b></label>
                      </div>
                      <div class="col-sm-8">
                        <input id="salary_edit" name="salary_edit" type="number" min="0" step="0.1" class="form-control" placeholder="22190" required>
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-sm-4">
                        <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-building"></i><b> Operating Unit:</b></label>
                      </div>
                      <div class="col-sm-8">
                        <select id="ous_edit" class="form-control" name="ous_edit" required>
                          <option value="0">--Operating Unit--</option>
                          <?php foreach ($operating_units as $row){ ?>
                            <option value="<?= $row['ous_id']?>"><?= $row['ous_desc']?></option>
                          <?php } ?>
                        </select>
                        <input type="checkbox" id="ptc_chk_edit" name="ptc_chk_edit" class="checkbox-template" style="margin-left:2px" value="1"/> &nbsp PTC Position?
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-sm-4">
                        <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-user"></i><b> Employee:</b></label>
                      </div>
                      <div class="col-sm-8">
                        <select id="emp_name_edit" class="form-control" name="emp_name_edit" disabled>
                      
                        </select>
                        <input type="checkbox" id="vacant_chk_edit" name="vacant_chk_edit" class="checkbox-template" style="margin-left:2px" value="1"/> &nbsp Vacant
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-sm-4">
                        <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-graduation-cap" aria-hidden="true"></i><b> Education:</b></label>
                      </div>
                      <div class="col-sm-8">
                        <input id="education_edit" type="text" class="form-control" name="education_edit" placeholder="Bachelor's degree relevant to the job" required>
                      </div>
                    </div>
                    <!--End of Inputting-->  
                  </div>
                  <!--First Row-->
                  <!--Second Row-->
                  <div class="col-lg-5">
                    
                    <div class="row form-group"  style="margin-right:5px;">
                      <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-graduation-cap" aria-hidden="true"></i><b> Training</b></label>
                      <input id="training_edit" type="text" class="form-control" name="training_edit" placeholder="None required" required>
                    </div>

                    <div class="row form-group"  style="margin-right:5px;">
                      <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-briefcase" aria-hidden="true"></i><b> Experience</b></label>
                      <input id="experience_edit" type="text" class="form-control" name="experience_edit" placeholder="None required" required>
                    </div>

                    <div class="row form-group"  style="margin-right:5px;">
                      <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-id-card" aria-hidden="true"></i><b> Eligibility</b></label>
                      <input id="eligibility_edit" type="text" class="form-control" name="eligibility_edit" placeholder="Career Service (Professional), Second Level Eligibity" required>
                    </div>

                    <div class="row form-group"  style="margin-right:5px;">
                      <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-crosshairs" aria-hidden="true"></i><b> Competency</b></label>
                      <textarea id="competency_edit"  rows="6" class="form-control" name="competency_edit" placeholder="Work effectively in vocational education and training; Participate in workplace communication; Work in team environment" required></textarea>
                      <small>Seperate each with a semicolon(;)</small>
                    </div>

                  </div>
                  <!--Second Row-->
                  </div>
                </div><!--End of Col-SM-12-->
              </div><!--End of row-->
              <hr>             
              <div id="plan_edit" class="row"><!--Start of row hidden-->
                <!--First Row-->
                <div class="col-lg-7">
                  <h4><i class="fa fa-calendar" aria-hidden="true"></i> Annual Recruitment Plan</h4>
                  <br>
                  <!--Priority Level-->
                  <div class="row form-group">
                      <div class="col-sm-4">
                        <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-level-up" aria-hidden="true"></i><b> Priority Level:</b></label>
                      </div>
                      <div class="col-sm-8">
                        <input id="arp_priority_level_edit" type="text" class="form-control" name="arp_priority_level_edit" placeholder="Low">
                      </div>
                  </div>
                  <!--Priority Level-->
                  <!--No. of applicants-->
                  <div class="row form-group">
                      <div class="col-sm-4">
                        <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-users" aria-hidden="true"></i><b> Target No. of Applicant/s:</b></label>
                      </div>
                      <div class="col-sm-8">
                        <input id="arp_no_applicant_edit" type="number" class="form-control" name="arp_no_applicant_edit" placeholder="20">
                      </div>
                  </div>
                  <!--No. of applicants-->
                  <!--Publication Date-->
                  <div class="row form-group">
                      <div class="col-sm-4">
                        <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-calendar" aria-hidden="true"></i><b> Target Date of Publication:</b></label>
                      </div>
                      <div class="col-sm-8">
                        <input id="arp_pub_date_edit" type="date" class="form-control" name="arp_pub_date_edit">
                      </div>
                  </div>
                  <!--Publication Date-->
                  <!--Hiring Date-->
                  <div class="row form-group">
                      <div class="col-sm-4">
                        <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-calendar" aria-hidden="true"></i><b> Target Date of Hiring:</b></label>
                      </div>
                      <div class="col-sm-8">
                        <input id="arp_hiring_date_edit" type="date" class="form-control" name="arp_hiring_date_edit">
                      </div>
                  </div>
                  <!--Hiring Date-->
                  <!--Sourcing Category-->
                  <div class="row form-group">
                      <div class="col-sm-4">
                        <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-link" aria-hidden="true"></i><b> Sourcing Category:</b></label>
                      </div>
                      <div class="col-sm-8">
                        <textarea id="arp_sourcing_edit" rows="4" class="form-control" name="arp_sourcing_edit" placeholder="CSC Website, TESDA DOS Website, TESDA official FB Account, TESDA R2 Bulletin Boards"></textarea>
                      </div>
                  </div>
                  <!--Sourcing Category-->
                </div>
                <!--First Row-->

                <!--Second Row-->
                <div class="col-lg-5">
                  <!--Resources Area-->
                  <div class="row form-group"  style="margin-right:5px;">
                      <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-cube" aria-hidden="true"></i><b> Resources NeededCompetency</b></label>
                      <textarea id="arp_resources_edit"  rows="4" class="form-control" name="arp_resources_edit" placeholder="Desktop/laptop, letters of invitation, Notice for Job Openings"></textarea>
                  </div>
                  <!--Resources Area-->
                  <!--Budget-->
                  <div class="row form-group"  style="margin-right:5px;">
                      <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-money" aria-hidden="true"></i><b> Budgetary Requirements</b></label>
                      <input id="arp_budgetary_edit"  type="number" class="form-control" name="arp_budgetary_edit" placeholder="1500">
                  </div>
                  <!--Budget Area-->
                  <!--Risk Area-->
                  <div class="row form-group"  style="margin-right:5px;">
                      <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-question-circle" aria-hidden="true"></i><b> Potential Risks/Problems</b></label>
                      <textarea id="arp_risks_edit"  rows="4" class="form-control" name="arp_risks_edit" placeholder="Restrictions due to pandemic"></textarea>
                  </div>
                  <!--Risk  Area-->
                  <!--Remarks-->
                  <div class="row form-group"  style="margin-right:5px;">
                      <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-pencil-square" aria-hidden="true"></i><b> Remarks</b></label>
                      <textarea id="arp_remarks_edit"  rows="4" class="form-control" name="arp_remarks_edit" placeholder="The said position is still not declared safe to open since the owner of the position who is newly promoted  to a TESDS II is not yet attested"></textarea>
                  </div>
                  <!--Remarks-->
                </div>
                 <!--Second Row-->

              </div><!--End of row hidden-->

              <!-- Display Message-->
              <div class="row">
                <div id="plantilla_edit_message" class="col-md-12"></div> 
              </div> 
              <!-- Display Message--> 
            </div><!-- Modal Body-->

            <div class="modal-footer">
              <div class="btn-group">
                <button id="edit_plantilla" type="submit" name='upload_edit' class="btn btn-danger">Submit</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>	
              </div>

              <div id="loading_plantilla_edit" class="spinner-grow text-primary" style="display: none;" role="status">
                <span class="sr-only">Loading... </span>
              </div>	
              
            </div>

            </form>						
          </div>
          </div>
      </div>
<!-- End Edit Modal -->

<!--MODAL Vacant-->
      <form>
      <div class="modal fade" id="vacant_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
              <h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-exclamation-triangle"></i> Warning</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
              </div>
              <div class="modal-body">
                <input type="hidden" id="pos_id" name="pos_id" class="form-control">
                <input type="hidden" id="vac_vice_usr_id" name="vac_vice_usr_id" class="form-control">
                <center><strong>Are you sure to <span style="color:red">VACANT</span> this position?</strong></center>
                <hr>

                <div class="row form-group">
                  <div class="col-sm-4">
                    <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-user" aria-hidden="true"></i><b> Nature of Vacancy</b></label>
                  </div>
                  <div class="col-sm-8">
                    <select id="vac_nanture" name="vac_nanture" class="form-control">
                      <option value="">-- Nature of Vacancy --</option>
                      <option value="Promotion">Promotion</option>     
                      <option value="Transfer">Transfer</option>  
                      <option value="Resignation">Resignation</option> 
                      <option value="Retirement">Retirement</option>
                      <option value="etc">etc</option>  
                    </select>
                  </div>
                </div>

                <div class="row form-group">
                  <div class="col-sm-4">
                    <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-user" aria-hidden="true"></i><b> Type of Vacant Position</b></label>
                  </div>
                  <div class="col-sm-8">
                    <select id="vac_type" name="vac_type" class="form-control">
                      <option value="">-- Type of Vacant Position --</option>
                      <option value="Residual">Residual</option>     
                      <option value="Newly Created">Newly Created</option>  
                    </select>
                  </div>
                </div>
                             
              </div>

              <div class="modal-footer">
                <div class="btn-group">
                    <button id="btn_vacant_position" type="button" class="btn btn-danger" data-dismiss="modal">Yes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>	
                </div>
              </div>

          </div>
          </div>
      </div>
      </form>
<!--END MODAL Vacant-->

<!--MODAL Print-->
      <form>
      <div class="modal fade" id="print_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
              <h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-print"></i> Print</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
              </div>
              <div class="modal-body">

                  <p>*Request for Publication</p>
                  <div class="row form-group">
                    <div class="col-sm-4">
                      <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-calendar" aria-hidden="true"></i><b> Date of Submission</b></label>
                    </div>
                    <div class="col-sm-8">
                      <input id="pos_posting_date" type="date" class="form-control" name="pos_posting_date" required>
                    </div>
                  </div>  
                
                  <div class="row form-group">
                    <div class="col-sm-4">
                      <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-calendar" aria-hidden="true"></i><b>  Closing Date</b></label>
                    </div>
                    <div class="col-sm-8">
                      <input id="pos_closing_date" type="date" class="form-control" name="pos_closing_date" required>
                    </div>
                  </div>  

              </div>
              <div class="modal-footer">

              <div class="btn-group">
                  <a href="" class="btn btn-danger print" target="_blank" type="button">Yes</a>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>	
              </div>

              </div>
          </div>
          </div>
      </div>
      </form>
<!--END MODAL Print-->

<!--MODAL Delete-->
      <form>
      <div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
              <h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-exclamation-triangle"></i> Warning</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
              </div>
              <div class="modal-body">
                <center><strong>Are you sure you want to <span style="color:red">DELETE</span> this position?</strong></center>
              </div>
              <div class="modal-footer">
              <input type="hidden" id="pos_id_del" name="pos_id_del" class="form-control">

              <div class="btn-group">
                  <button id="btn_delete_vacant_position" type="button" class="btn btn-danger" data-dismiss="modal">Yes</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>	
              </div>

              </div>
          </div>
          </div>
      </div>
      </form>
<!--END MODAL Delete-->

<!--MODAL Duplicate-->
      <form>
      <div class="modal fade" id="duplicate_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
              <h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-exclamation-triangle"></i> Warning</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
              </div>
              <div class="modal-body">
                <center><strong>Are you sure you want to <span style="color:red">DUPLICATE</span> this position?</strong></center>
              </div>
              <div class="modal-footer">
              <input type="hidden" id="pos_id_dup" name="pos_id_dup" class="form-control">

              <div class="btn-group">
                  <button id="btn_duplicate_vacant_position" type="button" class="btn btn-danger" data-dismiss="modal">Yes</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>	
              </div>

              </div>
          </div>
          </div>
      </div>
      </form>
<!--END MODAL Duplicate-->

<!--MODAL Open-->
      <form>
      <div class="modal fade" id="open_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
              <h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-exclamation-triangle"></i> Warning</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
              </div>
              <div class="modal-body">
                  <center><strong>Are you sure you want to <span style="color:red">OPEN</span> this position?</strong></center>
              </div>
              <div class="modal-footer">
              <input type="hidden" id="pos_id_open" name="pos_id_open" class="form-control">

              <div class="btn-group">
                  <button id="btn_open_vacant_position" type="button" class="btn btn-danger" data-dismiss="modal">Yes</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>	
              </div>

              </div>
          </div>
          </div>
      </div>
      </form>
<!--END MODAL Open-->

<!--MODAL Close-->
      <form>
      <div class="modal fade" id="close_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
              <h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-exclamation-triangle"></i> Warning</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
              </div>
              <div class="modal-body">
                  <center><strong>Are you sure you want to <span style="color:red">CLOSE</span> this position?</strong></center>
              </div>
              <div class="modal-footer">
              <input type="hidden" id="pos_id_close" name="pos_id_close" class="form-control">

              <div class="btn-group">
                  <button id="btn_close_vacant_position" type="button" class="btn btn-danger" data-dismiss="modal">Yes</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>	
              </div>

              </div>
          </div>
          </div>
      </div>
      </form>
<!--END MODAL Close-->

<!--MODAL Publish Open-->
      <div class="modal fade" id="publish_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-upload"></i> Publish</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="" method="POST" id="platilla_position_publish" role="form">     
                <!--Body-->
                <div class="modal-body">
                  <input type="hidden" id="vac_id" name="vac_id" class="form-control">
                  <input type="hidden" id="pos_id_publish" name="pos_id_publish" class="form-control">

                  <div class="row form-group">
                    <div class="col-sm-4">
                      <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-calendar" aria-hidden="true"></i><b> Posting Date</b></label>
                    </div>
                    <div class="col-sm-8">
                      <input id="posting_date" type="date" class="form-control" name="posting_date" required>
                    </div>
                  </div>  
                
                  <div class="row form-group">
                    <div class="col-sm-4">
                      <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-calendar" aria-hidden="true"></i><b>  Closing Date</b></label>
                    </div>
                    <div class="col-sm-8">
                      <input id="closing_date" type="date" class="form-control" name="closing_date"  required>
                    </div>
                  </div>  

                  <div class="row form-group">
                    <div class="col-sm-4">
                      <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-file-pdf-o" aria-hidden="true"></i><b> Job Opening File</b></label>
                    </div>
                    <div class="col-sm-8 ">
                      <input class="filestyle" data-buttonBefore="true" data-text="Browse file" data-badge="true" data-badgeName="badge-danger" data-placeholder="Please select only pdf file." type='file' name='job_opening_file' accept="application/pdf" required>
                    </div>
                  </div>

                </div>
                <!--Body-->

                <div class="modal-footer">
                  <div class="btn-group">
                      <button id="btn_publish" name="upload" type="submit" class="btn btn-danger">Save</button>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>	
                  </div>
                </div>
            </form>

          </div>
          </div>
      </div>
<!--END Publish-->

<!--MODAL Timeline Open-->
      <div class="modal fade" id="timeline_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-history"></i> Timeline</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="" method="POST" id="platilla_position_timeline" role="form">     
                <!--Body-->
                <div id="timeline_modal_body" class="modal-body">
                  <input type="hidden" id="vac_id" name="vac_id" class="form-control">
                            
                  <div class="row form-group">
                    <div class="col-sm-4">
                      <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-calendar" aria-hidden="true"></i><b> Date Notified (Annex L1)</b></label>
                    </div>
                    <div class="col-sm-8">
                      <input id="vac_evaluation_of_document" type="date" class="form-control" name="vac_evaluation_of_document" required>
                    </div>
                  </div>  

                  <div class="row form-group">
                    <div class="col-sm-4">
                      <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-calendar" aria-hidden="true"></i><b>Date Notified (CBWE)</b></label>
                    </div>
                    <div class="col-sm-8">
                      <input id="vac_cbwe" type="datetime-local" class="form-control" name="vac_cbwe"  required>
                    </div>
                  </div>  
                
                  <div class="row form-group">
                    <div class="col-sm-4">
                      <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-calendar" aria-hidden="true"></i><b> Date Notified (Interview)</b></label>
                    </div>
                    <div class="col-sm-8">
                      <input id="vac_initial_deliberation" type="date" class="form-control" name="vac_initial_deliberation"  required>
                    </div>
                  </div>  

                  

                  <div class="row form-group">
                    <div class="col-sm-4">
                      <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-calendar" aria-hidden="true"></i><b> Date Notified (BEI/ Teaching Demo)</b></label>
                    </div>
                    <div class="col-sm-8">
                      <input id="vac_bei" type="datetime-local" class="form-control" name="vac_bei"  required>
                    </div>
                  </div>  

                </div>
                <!--Body-->

                <div class="modal-footer">
                  <div class="btn-group">
                      <button id="btn_timeline" class="btn btn-danger">Save</button>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>	
                  </div>
                </div>
            </form>

          </div>
          </div>
      </div>
<!--END Timeline Open-->

<!--MODAL Notify-->
    <form>
      <div class="modal fade" id="notify_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
              <h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-exclamation-triangle"></i> Warning</h3>
              </div>
              <div class="modal-body">
                <div id="notify_message">
                  <center><strong>Are you sure you want to <span style="color:red">NOTIFY</span> Next-in-Rank Employees?</strong></center>
                </div>
                <div id="notify_next_in_rank_loading" style="display: none;" role="status">
                  <center>
                    <span class="spinner-border spinner-border-lg" style="width: 4rem; height: 4rem;" role="status" aria-hidden="true"></span>
                      <span class="sr-only" style="color:#000">Sending...</span>
                    <br><br>
                    <h4><b>Sending notification to next-in-rank employees</b>, please wait.</h4>
                  </center>	
                </div>	

              </div>
              <div class="modal-footer">
                <input type="hidden" id="pos_id_notify" name="pos_id_notify" class="form-control">

                <div class="btn-group">
                    <button id="btn_notify_vacant_position" type="button" class="btn btn-danger">Yes</button>
                    <button id="btn_notify_no" type="button" class="btn btn-secondary" data-dismiss="modal">No</button>	
                </div>
              </div>
          </div>
          </div>
      </div>
    </form>
<!--END MODAL Notify-->
                             
      <script type="text/javascript">
          $(document).ready(function(){//Open

//call function show plantilla position
              show_plantilla_position(); 
              show_vacant_position(); //call function show all work experience
//call function show plantilla position
          
//function show all work experience
              function show_plantilla_position(){
                  $.ajax({
                      type  : 'GET',
                      url   : '<?php echo base_url().'get_plantilla_position'?>',
                      async : true,
                      dataType : 'json',
                      success : function(data){
                          var pos_desc = '';
                          var html = '';
                          var i;
                          var x=1;
                          for(i=0; i<data.length; i++){

                             //check if PTC position
                             if(data[i].pos_ptc_position == null || data[i].pos_ptc_position == 0){
                                pos_desc = data[i].ous_desc;
                              }else{
                                pos_desc = data[i].ous_desc+' (<b>PTC</b>)';
                              }

                              html += '<tr>'+
                                          '<td>'+x+'</td>'+
                                          '<td>'+data[i].pos_plantilla_no+'</td>'+
                                          '<td>'+data[i].pos_desc.toUpperCase()+'</td>'+
                                          '<td>'+data[i].pos_sg+'</td>'+
                                          '<td>'+pos_desc+'</td>'+
                                          '<td>'+data[i].usr_name.toUpperCase()+'</td>'+
                                          '<td>'+
                                          '<button data-toggle="dropdown" type="button" class="btn btn-outline-primary dropdown-toggle btn-sm"><i class="fa fa-tasks"></i> Actions </button>'+
                                            '<div class="dropdown-menu">'+
                                              '<a data-toggle="modal" href="#vacant_modal" class="dropdown-item item_vacant_position" data-pos_id="'+data[i].pos_id+'" data-vac_vice_usr_id="'+data[i].pos_usr_id+'"><i class="fa fa-user-times"> </i> Vacant</a>'+
                                              '<a data-toggle="modal" href="#duplicate_modal" id="view" class="dropdown-item item_duplicate_position" data-pos_id_dup="'+data[i].pos_id+'"><i class="fa fa-copy"> </i> Duplicate</a>'+
                                              '<a data-toggle="modal" href="#edit" class="dropdown-item item_edit_position"'+
                                              'data-pos_id_edit="'+data[i].pos_id+'" data-pos_plantilla_no_edit="'+data[i].pos_plantilla_no+'"'+
                                              'data-pos_desc_edit="'+data[i].pos_desc+'" data-pos_sg_edit="'+data[i].pos_sg+'"'+
                                              'data-pos_ous_id_edit="'+data[i].pos_ous_id+'" data-pos_competency_edit="'+data[i].pos_competency+'"'+
                                              'data-pos_education_edit="'+data[i].pos_education+'" data-pos_eligibility_edit="'+data[i].pos_eligibility+'"'+
                                              'data-pos_salary_edit="'+data[i].pos_salary+'" data-pos_usr_id_edit="'+data[i].pos_usr_id+'"'+
                                              'data-pos_education_edit="'+data[i].pos_education+'" data-pos_training_edit="'+data[i].pos_training+'"'+
                                              'data-pos_experience_edit="'+data[i].pos_experience+'" data-pos_eligibility_edit="'+data[i].pos_eligibility+'" data-pos_ptc_position_edit="'+data[i].pos_ptc_position+'"'+
                                              'data-pos_competency_edit="'+data[i].pos_competency+'" data-arp_priority_level_edit="'+data[i].arp_priority_level+'"'+
                                              'data-arp_no_applicant_edit="'+data[i].arp_no_applicant+'" data-arp_pub_date_edit="'+data[i].arp_pub_date+'"'+
                                              'data-arp_sourcing_edit="'+data[i].arp_sourcing+'" data-arp_resources_edit="'+data[i].arp_resources+'"'+
                                              'data-arp_hiring_date_edit="'+data[i].arp_hiring_date+'" data-arp_budgetary_edit="'+data[i].arp_budgetary+'"'+
                                              'data-arp_risks_edit="'+data[i].arp_risks+'" data-arp_remarks_edit="'+data[i].arp_remarks+'"'+
                                              '><i class="fa fa-edit"> </i> Edit</a>'+
                                              '<a data-toggle="modal" href="#delete_modal" id="view" class="dropdown-item item_delete_position" data-pos_id_del="'+data[i].pos_id+'"><i class="fa fa-trash"> </i> Delete</a>'+
                                              '<a data-toggle="modal" href="#delete_modal" id="view" class="dropdown-item item_delete_position" data-pos_id_del="'+data[i].pos_id+'"><i class="fa fa-history"> </i> History</a>'+
                                            '</div>'+
                                          '</td>'+
                                      '</tr>';
                                      x=x+1;
                          }
                          $('#plantilla_position_table').html(html);
                          $('#plantilla_table').DataTable();
                      }
                     
                  });
              }
//function show all work experience

//function show all work experience vacant
              function show_vacant_position(){
                  $.ajax({
                      type  : 'GET',
                      url   : '<?php echo base_url().'get_vacant_position'?>',
                      async : true,
                      dataType : 'json',
                      success : function(data){
                          var link = '<?php echo base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/JobOpening/'?>';
                          var disabled = '';
                          var pos_desc = '';
                          var html = '';
                          var i;
                          var x=1;
                          for(i=0; i<data.length; i++){
                              //check if null
                              if(data[i].vac_job_opening_file == null){
                                disabled = 'disabled';
                              }else{
                                disabled = ''
                              }
                              //check if PTC position
                              if(data[i].pos_ptc_position == null || data[i].pos_ptc_position == 0){
                                pos_desc = data[i].ous_desc;
                              }else{
                                pos_desc = data[i].ous_desc+' (<b>PTC</b>)';
                              }

                              //Check Status
                              if(data[i].pos_status == null){
                                if(data[i].pos_sg >= 18){
                                  var pos_status = '<span class="badge bg-green badge-corner"><i class="fa fa-calendar" aria-hidden="true"></i> C/O Central Office</span>';
                                }else{
                                  var pos_status = '<span class="badge bg-red badge-corner"><i class="fa fa-calendar" aria-hidden="true"></i> For Publication</span>';
                                }
                               
                               var button = '<a data-toggle="modal" href="#open_modal" id="view" class="dropdown-item item_open_vacant_position" data-pos_id_open="'+data[i].pos_id+'" data-pos_posting_date="'+data[i].pos_posting_date+'" data-pos_closing_date="'+data[i].pos_closing_date+'"><i class="fa fa-unlock-alt"></i> Open</a>';
                               var publish = '';
                              }else if(data[i].pos_status == 'Waiting for Approval') {
                               var pos_status = '<span class="badge badge-corner bg-warning"><i class="fa fa-calendar" aria-hidden="true"></i> <b>'+ data[i].pos_status+ '</b></span> ';
                               var button = '<a data-toggle="modal" href="#close_modal" id="view" class="dropdown-item item_close_vacant_position" data-pos_id_close="'+data[i].pos_id+'"><i class="fa fa-lock"></i> Close</a>';
                               var publish = '<a data-toggle="modal" href="#publish_modal" id="view" class="dropdown-item item_publish_vacant_position" data-pos_id_publish="'+data[i].pos_id+'" data-vac_id="'+data[i].vac_id+'"><i class="fa fa-check-circle" aria-hidden="true"></i> Publish</a>';
                              }else if(data[i].pos_status == 'Open'){
                               var pos_status = '<span class="badge badge-corner" style="background-color:#00695C; color:white"><i class="fa fa-calendar" aria-hidden="true"></i> Open</span>';
                               var button = '<a data-toggle="modal" href="#notify_modal" id="view" class="dropdown-item item_notify_position '+ disabled +'" data-pos_id_notify="'+data[i].pos_id+'"><i class="fa fa-paper-plane"></i> Notify Next-In-Rank</a>'+
                                            '<a href="<?= base_url()?>view_applicants/'+data[i].pos_id+'" target="_blank id="view" class="dropdown-item"><i class="fa fa-users"></i> Applicant/s</a>'+
                                            '<a data-toggle="modal" href="#close_modal" id="view" class="dropdown-item item_close_vacant_position" data-pos_id_close="'+data[i].pos_id+'"><i class="fa fa-lock"></i> Close</a>'+
                                            '<a href="'+ link + data[i].vac_job_opening_file +'" class="dropdown-item" target="_blank"><i class="fa fa-eye"></i> Job Opening File</a>';
                               var publish = '';
                              }else if(data[i].pos_status == 'Closed'){
                               var pos_status = '<span class="badge bg-red badge-corner"><i class="fa fa-calendar" aria-hidden="true"></i> Closed</span>';
                               var button ='<a data-toggle="modal" href="#open_modal" id="view" class="dropdown-item item_open_vacant_position" data-pos_id_open="'+data[i].pos_id+'"><i class="fa fa-unlock-alt"></i> Re-open</a>'+
                                           '<a href="<?= base_url()?>view_applicants/'+data[i].pos_id+'" id="view" class="dropdown-item" target="_blank"><i class="fa fa-users"></i> Applicant/s</a>'+
                                           '<a data-toggle="modal" href="#timeline_modal" href="#" id="view" class="dropdown-item item_vacant_timeline" data-vac_id="'+data[i].vac_id+'" data-vac_evaluation_of_document="'+data[i].vac_evaluation_of_document+'" data-vac_initial_deliberation="'+data[i].vac_initial_deliberation+'" data-vac_cbwe="'+data[i].vac_cbwe+'" data-vac_bei="'+data[i].vac_bei+'"><i class="fa fa-history"></i> Timeline</a>'+
                                           '<a href="'+ link + data[i].vac_job_opening_file +'" class="dropdown-item" target="_blank"><i class="fa fa-eye"></i> Job Opening File</a>';
                               var publish = '';
                              }
                              //Check Status

                              //Check Posting & Closing
                              if(data[i].vac_date_posted == null){
                                var vac_date_posted = '<span class="badge badge-corner bg-red"><i class="fa fa-calendar" aria-hidden="true"></i> Not Applicable</span>';
                              }else{
                                var vac_date_posted = '<span class="badge badge-corner bg-primary" style="color:white"><i class="fa fa-calendar" aria-hidden="true"></i> '+ moment(data[i].vac_date_posted).format('MM/DD/YYYY') + '</span>';
                              }

                              if(data[i].vac_deadline == null){
                                var vac_deadline = '<span class="badge badge-corner bg-red"><i class="fa fa-calendar" aria-hidden="true"></i> Not Applicable</span>';
                              }else{
                                var vac_deadline = '<span class="badge badge-corner bg-primary" style="color:white"><i class="fa fa-calendar" aria-hidden="true"></i> '+ moment(data[i].vac_deadline).format('MM/DD/YYYY') + '</span>';
                              }
                              

                              //Check Posting & Closing

                              html += '<tr>'+
                                          '<td>'+x+'</td>'+
                                          '<td>'+data[i].pos_plantilla_no+'</td>'+
                                          '<td>'+data[i].pos_desc.toUpperCase()+'</td>'+
                                          '<td>'+data[i].pos_sg+'</td>'+
                                          '<td>'+pos_desc+'</td>'+
                                          '<td>'+vac_date_posted+'</td>'+
                                          '<td>'+vac_deadline+'</td>'+
                                          '<td>'+pos_status+'</td>'+
                                          '<td>'+
                                          '<button data-toggle="dropdown" type="button" class="btn btn-outline-primary dropdown-toggle btn-sm"><i class="fa fa-tasks"></i> Actions </button>'+
                                            '<div class="dropdown-menu" style="height: auto;max-height: 200px;overflow-x: hidden;">'+
                                              '<a data-toggle="modal" href="#edit" class="dropdown-item item_edit_position"'+
                                              'data-pos_id_edit="'+data[i].pos_id+'" data-pos_plantilla_no_edit="'+data[i].pos_plantilla_no+'"'+
                                              'data-pos_desc_edit="'+data[i].pos_desc+'" data-pos_sg_edit="'+data[i].pos_sg+'"'+
                                              'data-pos_ous_id_edit="'+data[i].pos_ous_id+'" data-pos_competency_edit="'+data[i].pos_competency+'"'+
                                              'data-pos_education_edit="'+data[i].pos_education+'" data-pos_eligibility_edit="'+data[i].pos_eligibility+'"'+
                                              'data-pos_salary_edit="'+data[i].pos_salary+'" data-pos_usr_id_edit="'+data[i].pos_usr_id+'"'+
                                              'data-pos_education_edit="'+data[i].pos_education+'" data-pos_training_edit="'+data[i].pos_training+'"'+
                                              'data-pos_experience_edit="'+data[i].pos_experience+'" data-pos_eligibility_edit="'+data[i].pos_eligibility+'" data-pos_ptc_position_edit="'+data[i].pos_ptc_position+'"'+
                                              'data-pos_competency_edit="'+data[i].pos_competency+'" data-arp_priority_level_edit="'+data[i].arp_priority_level+'"'+
                                              'data-arp_no_applicant_edit="'+data[i].arp_no_applicant+'" data-arp_pub_date_edit="'+data[i].arp_pub_date+'"'+
                                              'data-arp_sourcing_edit="'+data[i].arp_sourcing+'" data-arp_resources_edit="'+data[i].arp_resources+'"'+
                                              'data-arp_hiring_date_edit="'+data[i].arp_hiring_date+'" data-arp_budgetary_edit="'+data[i].arp_budgetary+'"'+
                                              'data-arp_risks_edit="'+data[i].arp_risks+'" data-arp_remarks_edit="'+data[i].arp_remarks+'"'+
                                              '><i class="fa fa-edit"> </i> Edit</a>'+
                                              '<a data-toggle="modal" href="#delete_modal" id="view" class="dropdown-item item_delete_position" data-pos_id_del="'+data[i].pos_id+'"><i class="fa fa-trash"> </i> Delete</a>'+
                                              '<a data-toggle="modal" href="#duplicate_modal" id="view" class="dropdown-item item_duplicate_position" data-pos_id_dup="'+data[i].pos_id+'"><i class="fa fa-copy"> </i> Duplicate</a>'+
                                              '<a data-toggle="modal" href="#" id="view" class="dropdown-item item_delete_position" data-pos_id_del="'+data[i].pos_id+'"><i class="fa fa-history"> </i> History (Under Devt)</a>'+
                                              '<div class="dropdown-divider"></div>'+
                                              button+ 
                                              publish+                         
                                            '</div>'+
                                          '</td>'+
                                      '</tr>';
                                      x=x+1;
                          }
                          $('#vacant_position_table').html(html);
                          $('#vacant_table').DataTable();
                      }
                     
                  });
              }

//function show all work experience vacant


//get employees admin
        <?php if($this->session->role == 'Admin'){ ?>
            var ous_id = '<?php echo $this->session->ous_id?>';
            $('#ous').val(ous_id);
            get_employees_admin();
            $('#ous').prop('disabled', true);
            $("#emp_name").removeAttr("disabled");
          <?php } ?>
//get employees admin 

//get employees super admin Add
              $("#ous").change(function() {
                  $("#emp_name").removeAttr("disabled");
                  var ous_id = $('#ous').val();         
                $.ajax({
                      type  : 'POST',
                      url   : '<?php echo base_url().'get_employees_plantilla'?>',
                      dataType : 'json',
                      data: {ous_id:ous_id},
                      success : function(data){
                          var html = '';
                          var i;
                          var x=1;
                          for(i=0; i<data.length; i++){
                              html += '<option value="'+data[i].usr_id+'">'+
                                        data[i].usr_name
                                      '</option>';
                          }
                          $('#emp_name').html(html);
                      }
                  });
              });

//get employees

//get employees super admin Edit 
            $("#ous_edit").change(function() {
                $("#emp_name_edit").removeAttr("disabled");
                var ous_id = $('#ous_edit').val();
                $.ajax({
                      type  : 'POST',
                      url   : '<?php echo base_url().'get_employees_plantilla'?>',
                      dataType : 'json',
                      data: {ous_id:ous_id},
                      success : function(data){
                          var html = '';
                          var i;
                          var x=1;
                          for(i=0; i<data.length; i++){
                              html += '<option value="'+data[i].usr_id+'">'+
                                        data[i].usr_name
                                      '</option>';
                          }
                          $('#emp_name_edit').html(html);
                      }
                  });
              });

//get employees edit

//Save Plantilla Position
              $("#platilla_position_save").submit(function(e) {
                  e.preventDefault();
                  var plantilla_no = $('#plantilla_no').val();
                  var plantilla_desc = $('#plantilla_desc').val();
                  var salary_grade = $('#salary_grade').val();
                  var ous = $('#ous').val();
                  var emp_name = $('#emp_name').val();
                  var salary = $('#salary').val();
                  var education = $('#education').val();
                  var training = $('#training').val();
                  var experience = $('#experience').val();
                  var eligibility = $('#eligibility').val();
                  var competency = $('#competency').val();
                  var ptc_chk = $('#ptc_chk').val();

                  //
                  var arp_priority_level = $('#arp_priority_level').val();
                  var arp_no_applicant = $('#arp_no_applicant').val();
                  var arp_pub_date = $('#arp_pub_date').val();
                  var arp_hiring_date = $('#arp_hiring_date').val();
                  var arp_sourcing = $('#arp_sourcing').val();
                  var arp_resources = $('#arp_resources').val();
                  var arp_budgetary = $('#arp_budgetary').val();
                  var arp_risks = $('#arp_risks').val();
                  var arp_remarks = $('#arp_remarks').val();
                  
                  if($('#vacant_chk').prop('checked')){
                      var vacant = '0';
                  }else{
                      var vacant = $('#emp_name').val();
                  }
                  $("#loading").show();
                  $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url().'plantilla_position_data_save'?>",
                    dataType : "JSON",
                    data : {plantilla_no:plantilla_no, plantilla_desc:plantilla_desc, salary_grade:salary_grade, ous:ous, vacant:vacant, salary:salary, education:education, training:training, experience:experience, eligibility:eligibility, competency:competency, arp_priority_level:arp_priority_level, arp_no_applicant:arp_no_applicant, arp_pub_date:arp_pub_date, arp_hiring_date:arp_hiring_date, arp_sourcing:arp_sourcing, arp_resources:arp_resources, arp_budgetary:arp_budgetary, arp_risks:arp_risks, arp_remarks:arp_remarks, ptc_chk:ptc_chk},
                      success: function(data){
                          $('[name="plantilla_no"]').val("");
                          $('[name="plantilla_desc"]').val("");
                          $('[name="salary_grade"]').val("");
                          $('[name="ous"]').val("0");
                          $('[name="emp_name"]').val("0");
                          $('[name="salary"]').val("");
                          $('[name="education"]').val("");
                          $('[name="training"]').val("");
                          $('[name="experience"]').val("");
                          $('[name="eligibility"]').val("");
                          $('[name="competency"]').val("");

                          $('[name="arp_priority_level"]').val("");
                          $('[name="arp_no_applicant"]').val("");
                          $('[name="arp_pub_date"]').val("");
                          $('[name="arp_hiring_date"]').val("");
                          $('[name="arp_sourcing"]').val("");
                          $('[name="arp_resources"]').val("");
                          $('[name="arp_budgetary"]').val("");
                          $('[name="arp_risks"]').val("");
                          $('[name="arp_remarks"]').val("");

                          $("#emp_name").attr("disabled", true);
                          $("#vacant_chk" ).prop( "checked", false );
                          $("#ptc_chk" ).prop( "checked", false );
                          var vacant = '0';
                          html = '<div class="alert alert-success"><i class="fa fa-check-circle" aria-hidden="true"></i> <b>Saved</b> successfully.</div>';
                              $('#plantilla_add').prepend(html);
                              //Hide
                              $(".alert").delay(4000).slideUp(200, function() {
                                  $(this).alert('close');
                              });
                          show_plantilla_position(); //call function show all work experience
                          show_vacant_position(); //call function show all work experience
                      }
                  });
              });

//Save Plantilla Position

//Edit Plantilla Position

        //get data for vacant position
        $('#vacant_position_table').on('click','.item_edit_position',function(){
              var pos_id_edit = $(this).data('pos_id_edit');
              $('#pos_id_edit').val(pos_id_edit);

              var plantilla_no_edit = $(this).data('pos_plantilla_no_edit');
              $('#plantilla_no_edit').val(plantilla_no_edit);

              var plantilla_desc_edit = $(this).data('pos_desc_edit');
              $('#plantilla_desc_edit').val(plantilla_desc_edit);

              var pos_sg_edit = $(this).data('pos_sg_edit');
              $('#salary_grade_edit').val(pos_sg_edit);

              var pos_salary_edit = $(this).data('pos_salary_edit');
              $('#salary_edit').val(pos_salary_edit);

              var pos_ous_id_edit = $(this).data('pos_ous_id_edit');
              $('#ous_edit').val(pos_ous_id_edit);
              get_employees_edit();

              <?php if($this->session->role == 'Admin'){ ?>
                $('#ous_edit').prop('disabled', true);
              <?php } ?>

              var pos_usr_id_edit = $(this).data('pos_usr_id_edit');
              if(pos_usr_id_edit == 0){
                $('#emp_name_edit').val(0);
                $("#vacant_chk_edit").prop("checked", true );
                $("#plan_edit").show(100);
              }else{
                $('#emp_name_edit').val(pos_usr_id_edit);
                $("#plan_edit").hide(100);
              }

              var pos_education_edit = $(this).data('pos_education_edit');
              $('#education_edit').val(pos_education_edit);

              var pos_training_edit = $(this).data('pos_training_edit');
              $('#training_edit').val(pos_training_edit);

              var pos_experience_edit = $(this).data('pos_experience_edit');
              $('#experience_edit').val(pos_experience_edit);

              var pos_eligibility_edit = $(this).data('pos_eligibility_edit');
              $('#eligibility_edit').val(pos_eligibility_edit);

              var pos_competency_edit = $(this).data('pos_competency_edit');
              $('#competency_edit').val(pos_competency_edit);

              if (pos_sg_edit >= 18){
                $('#arp_remarks_edit').attr('disabled', true);
                $('#arp_risks_edit').attr('disabled', true)
                $('#arp_budgetary_edit').attr('disabled', true)
                $('#arp_hiring_date_edit').attr('disabled', true)
                $('#arp_pub_date_edit').attr('disabled', true)
                $('#arp_sourcing_edit').attr('disabled', true)
                $('#arp_resources_edit').attr('disabled', true)
              }else{
                $('#arp_remarks_edit').removeAttr('disabled');
                $('#arp_risks_edit').removeAttr('disabled')
                $('#arp_budgetary_edit').removeAttr('disabled')
                $('#arp_hiring_date_edit').removeAttr('disabled')
                $('#arp_pub_date_edit').removeAttr('disabled')
                $('#arp_sourcing_edit').removeAttr('disabled')
                $('#arp_resources_edit').removeAttr('disabled') 
              }

              var arp_priority_level_edit = $(this).data('arp_priority_level_edit');
              $('#arp_priority_level_edit').val(arp_priority_level_edit);

              var arp_no_applicant_edit = $(this).data('arp_no_applicant_edit');
              $('#arp_no_applicant_edit').val(arp_no_applicant_edit);

              var arp_pub_date_edit = $(this).data('arp_pub_date_edit');
              $('#arp_pub_date_edit').val(arp_pub_date_edit);

              var arp_sourcing_edit = $(this).data('arp_sourcing_edit');
              $('#arp_sourcing_edit').val(arp_sourcing_edit);

              var arp_resources_edit = $(this).data('arp_resources_edit');
              $('#arp_resources_edit').val(arp_resources_edit);

              var arp_hiring_date_edit = $(this).data('arp_hiring_date_edit');
              $('#arp_hiring_date_edit').val(arp_hiring_date_edit);

              var arp_budgetary_edit = $(this).data('arp_budgetary_edit');
              $('#arp_budgetary_edit').val(arp_budgetary_edit);

              var arp_risks_edit = $(this).data('arp_risks_edit');
              $('#arp_risks_edit').val(arp_risks_edit);

              var arp_remarks_edit = $(this).data('arp_remarks_edit');
              $('#arp_remarks_edit').val(arp_remarks_edit);

              var pos_ptc_position_edit = $(this).data('pos_ptc_position_edit');
              if(pos_ptc_position_edit == 1){
                $("#ptc_chk_edit").prop("checked", true );
              }else{
                $("#ptc_chk_edit").prop("checked", false );
              }
             
        });

        $('#plantilla_position_table').on('click','.item_edit_position',function(){

          var pos_id_edit = $(this).data('pos_id_edit');
              $('#pos_id_edit').val(pos_id_edit);

              var plantilla_no_edit = $(this).data('pos_plantilla_no_edit');
              $('#plantilla_no_edit').val(plantilla_no_edit);

              var plantilla_desc_edit = $(this).data('pos_desc_edit');
              $('#plantilla_desc_edit').val(plantilla_desc_edit);

              var pos_sg_edit = $(this).data('pos_sg_edit');
              $('#salary_grade_edit').val(pos_sg_edit);

              var pos_salary_edit = $(this).data('pos_salary_edit');
              $('#salary_edit').val(pos_salary_edit);

              var pos_ous_id_edit = $(this).data('pos_ous_id_edit');
              $('#ous_edit').val(pos_ous_id_edit);
              get_employees_edit();

              <?php if($this->session->role == 'Admin'){ ?>
                $('#ous_edit').prop('disabled', true);
              <?php } ?>

              var pos_usr_id_edit = $(this).data('pos_usr_id_edit');
              if(pos_usr_id_edit == 0){
                $('#emp_name_edit').val(0);
                $("#vacant_chk_edit" ).prop( "checked", false);
                $("#plan_edit").show(100);
              }else{
                $('#emp_name_edit').val(pos_usr_id_edit);
                $("#plan_edit").hide(100);
              }

              var pos_education_edit = $(this).data('pos_education_edit');
              $('#education_edit').val(pos_education_edit);

              var pos_training_edit = $(this).data('pos_training_edit');
              $('#training_edit').val(pos_training_edit);

              var pos_experience_edit = $(this).data('pos_experience_edit');
              $('#experience_edit').val(pos_experience_edit);

              var pos_eligibility_edit = $(this).data('pos_eligibility_edit');
              $('#eligibility_edit').val(pos_eligibility_edit);

              var pos_competency_edit = $(this).data('pos_competency_edit');
              $('#competency_edit').val(pos_competency_edit);

              if (pos_sg_edit >= 18){
                $('#arp_remarks_edit').attr('disabled', true);
                $('#arp_risks_edit').attr('disabled', true)
                $('#arp_budgetary_edit').attr('disabled', true)
                $('#arp_hiring_date_edit').attr('disabled', true)
                $('#arp_pub_date_edit').attr('disabled', true)
                $('#arp_sourcing_edit').attr('disabled', true)
                $('#arp_resources_edit').attr('disabled', true)
              }else{
                $('#arp_remarks_edit').removeAttr('disabled');
                $('#arp_risks_edit').removeAttr('disabled')
                $('#arp_budgetary_edit').removeAttr('disabled')
                $('#arp_hiring_date_edit').removeAttr('disabled')
                $('#arp_pub_date_edit').removeAttr('disabled')
                $('#arp_sourcing_edit').removeAttr('disabled')
                $('#arp_resources_edit').removeAttr('disabled') 
              }


              var arp_priority_level_edit = $(this).data('arp_priority_level_edit');
              $('#arp_priority_level_edit').val(arp_priority_level_edit);

              var arp_no_applicant_edit = $(this).data('arp_no_applicant_edit');
              $('#arp_no_applicant_edit').val(arp_no_applicant_edit);

              var arp_pub_date_edit = $(this).data('arp_pub_date_edit');
              $('#arp_pub_date_edit').val(arp_pub_date_edit);

              var arp_sourcing_edit = $(this).data('arp_sourcing_edit');
              $('#arp_sourcing_edit').val(arp_sourcing_edit);

              var arp_resources_edit = $(this).data('arp_resources_edit');
              $('#arp_resources_edit').val(arp_resources_edit);

              var arp_hiring_date_edit = $(this).data('arp_hiring_date_edit');
              $('#arp_hiring_date_edit').val(arp_hiring_date_edit);

              var arp_budgetary_edit = $(this).data('arp_budgetary_edit');
              $('#arp_budgetary_edit').val(arp_budgetary_edit);

              var arp_risks_edit = $(this).data('arp_risks_edit');
              $('#arp_risks_edit').val(arp_risks_edit);

              var arp_remarks_edit = $(this).data('arp_remarks_edit');
              $('#arp_remarks_edit').val(arp_remarks_edit);

              var pos_ptc_position_edit = $(this).data('pos_ptc_position_edit');
              if(pos_ptc_position_edit == 1){
                $("#ptc_chk_edit").prop("checked", true );
              }else{
                $("#ptc_chk_edit").prop("checked", false );
              }
               
        });

        $("#platilla_position_edit").submit(function(e) {
                  e.preventDefault();
                  var pos_id = $('#pos_id_edit').val();
                  var plantilla_no = $('#plantilla_no_edit').val();
                  var plantilla_desc = $('#plantilla_desc_edit').val();
                  var salary_grade = $('#salary_grade_edit').val();
                  var ous = $('#ous_edit').val();
                  var emp_name = $('#emp_name_edit').val();
                  var salary = $('#salary_edit').val();
                  var education = $('#education_edit').val();
                  var training = $('#training_edit').val();
                  var experience = $('#experience_edit').val();
                  var eligibility = $('#eligibility_edit').val();
                  var competency = $('#competency_edit').val();

                  if($('#ptc_chk_edit').prop('checked')){
                      var ptc_chk_edit = 1;
                  }else{
                      var ptc_chk_edit = null;
                  }

                  //
                  var arp_priority_level = $('#arp_priority_level_edit').val();
                  var arp_no_applicant = $('#arp_no_applicant_edit').val();
                  var arp_pub_date = $('#arp_pub_date_edit').val();
                  var arp_hiring_date = $('#arp_hiring_date_edit').val();
                  var arp_sourcing = $('#arp_sourcing_edit').val();
                  var arp_resources = $('#arp_resources_edit').val();
                  var arp_budgetary = $('#arp_budgetary_edit').val();
                  var arp_risks = $('#arp_risks_edit').val();
                  var arp_remarks = $('#arp_remarks_edit').val();
                  
                  if($('#vacant_chk_edit').prop('checked')){
                      var vacant = '0';
                  }else{
                      var vacant = $('#emp_name_edit').val();
                  }
                  $("#loading").show();
                  $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url().'plantilla_position_data_edit'?>",
                    dataType : "JSON",
                    data : {pos_id:pos_id, plantilla_no:plantilla_no, plantilla_desc:plantilla_desc, salary_grade:salary_grade, ous:ous, vacant:vacant, salary:salary, education:education, training:training, experience:experience, eligibility:eligibility, competency:competency, arp_priority_level:arp_priority_level, arp_no_applicant:arp_no_applicant, arp_pub_date:arp_pub_date, arp_hiring_date:arp_hiring_date, arp_sourcing:arp_sourcing, arp_resources:arp_resources, arp_budgetary:arp_budgetary, arp_risks:arp_risks, arp_remarks:arp_remarks, ptc_chk_edit:ptc_chk_edit},
                      success: function(data){
                          html = '<div class="alert alert-success"><i class="fa fa-check-circle" aria-hidden="true"></i> <b>Updated</b> successfully.</div>';
                              $('#plantilla_edit').prepend(html);
                              $('#plantilla_edit_message').prepend(html);
                              //Hide
                              $(".alert").delay(4000).slideUp(200, function() {
                                  $(this).alert('close');
                                  $("#edit .close").click()
                              });
                          show_plantilla_position(); //call function show all work experience
                          show_vacant_position(); //call function show all work experience
                      }
                  });
              });

//Edit Plantilla Position

//get employees edit function
          function get_employees_edit(){    
            $("#emp_name_edit").removeAttr("disabled");
            var ous_id = $('#ous_edit').val();
            $.ajax({
                  type  : 'POST',
                  url   : '<?php echo base_url().'get_employees_plantilla'?>',
                  dataType : 'json',
                  data: {ous_id:ous_id},
                  success : function(data){
                      var html = '';
                      var i;
                      var x=1;
                      for(i=0; i<data.length; i++){
                          html += '<option value="'+data[i].usr_id+'">'+
                                    data[i].usr_name
                                  '</option>';
                      }
                      $('#emp_name_edit').html(html);
                  }
              });
          }

//get employees edit

//get employees add function Admin
          function get_employees_admin(){    
            var ous_id = $('#ous').val();
            $.ajax({
                  type  : 'POST',
                  url   : '<?php echo base_url().'get_employees_plantilla'?>',
                  dataType : 'json',
                  data: {ous_id:ous_id},
                  success : function(data){
                      var html = '';
                      var i;
                      var x=1;
                      for(i=0; i<data.length; i++){
                          html += '<option value="'+data[i].usr_id+'">'+
                                    data[i].usr_name
                                  '</option>';
                      }
                      $('#emp_name').html(html);
                  }
              });
          }
//get employees add Admin


//-------Change the Satus to Vacant---------  

            //get data for vacant position
            $('#plantilla_position_table').on('click','.item_vacant_position',function(){
                var pos_id = $(this).data('pos_id');
                var vac_vice_usr_id = $(this).data('vac_vice_usr_id');
                $('#pos_id').val(pos_id);
                $('#vac_vice_usr_id').val(vac_vice_usr_id);
            });
        

            //vacant position to database
            $('#btn_vacant_position').on('click',function(){
                var pos_id = $('#pos_id').val();
                var vac_vice_usr_id = $('#vac_vice_usr_id').val();
                var vac_nanture = $('#vac_nanture').val();
                var vac_type = $('#vac_type').val();
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url().'vacant_position_id'?>",
                    dataType : "JSON",
                    data : {pos_id:pos_id, vac_vice_usr_id:vac_vice_usr_id, vac_nanture:vac_nanture, vac_type:vac_type},
                    success: function(data){
                        $('[name="pos_id"]').val("");
                        html = '<div class="alert alert-success mt-2"><i class="fa fa-check-circle" aria-hidden="true"></i> <b>Vacant</b> added successfully.</div>';
                              $('#myTabContent').prepend(html);

                        //Hide
                        $(".alert").delay(4000).slideUp(200, function() {
                            $(this).alert('close');
                        });
                             
                        show_plantilla_position(); //call function show all work experience
                        show_vacant_position(); //call function show all work experience
                    }
                });
                $('#vacant_modal').modal('hide');
                return false;
            });

//-------Change the Satus to Vacant---------  

//-------Delete Position---------  

            //get data for vacant position
            $('#plantilla_position_table').on('click','.item_delete_position',function(){
                var pos_id_del = $(this).data('pos_id_del');
              $('#pos_id_del').val(pos_id_del);
              //alert(pos_id_del);
            });
            
            $('#vacant_position_table').on('click','.item_delete_position',function(){
                var pos_id_del = $(this).data('pos_id_del');
              $('#pos_id_del').val(pos_id_del);
              //alert(pos_id_del);
            });

            //vacant position to database
            $('#btn_delete_vacant_position').on('click',function(){
                var pos_id_del = $('#pos_id_del').val();
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url().'delete_vacant_position_id'?>",
                    dataType : "JSON",
                    data : {pos_id_del:pos_id_del},
                    success: function(data){
                        $('[name="pos_id_del"]').val("");
                        html = '<div class="alert alert-success mt-2"><i class="fa fa-check-circle" aria-hidden="true"></i> <b>Deleted</b> successfully.</div>';
                              $('#myTabContent').prepend(html);

                        //Hide
                        $(".alert").delay(4000).slideUp(200, function() {
                            $(this).alert('close');
                        });

                        show_plantilla_position(); //call function show all work experience
                        show_vacant_position(); //call function show all work experience
                    }
                });
                $('#delete_modal').modal('hide');
                
                //return false;
            });

//--------Delete Position---------  

//-------notify Position---------  

            //get data for vacant position
            
            $('#vacant_position_table').on('click','.item_notify_position',function(){
                var pos_id_notify = $(this).data('pos_id_notify');
              $('#pos_id_notify').val(pos_id_notify);
              $("#notify_next_in_rank_loading").hide();
              $("#notify_message").show();
              $("#btn_notify_no").removeAttr('disabled', true);
              $("#btn_notify_vacant_position").removeAttr('disabled', true);
              //alert(pos_id_del);
            });

            //vacant position to database
            $('#btn_notify_vacant_position').on('click',function(){
                var pos_id_notify = $('#pos_id_notify').val();
                $("#notify_next_in_rank_loading").show();
                $("#notify_message").hide();
                $("#btn_notify_no").attr('disabled', true);
                $("#btn_notify_vacant_position").attr('disabled', true);
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url().'notify_vacant_position_id'?>",
                    dataType : "JSON",
                    data : {pos_id_notify:pos_id_notify},
                    success: function(data){
                        $('[name="pos_id_notify"]').val("");
                        html = '<div class="alert alert-success mt-2"><i class="fa fa-check-circle" aria-hidden="true"></i> <b>Notification Sent</b> successfully.</div>';
                              $('#myTabContent').prepend(html);

                        //Hide
                        $(".alert").delay(4000).slideUp(200, function() {
                            $(this).alert('close');
                        });

                        //Close
                        $('#notify_modal').modal('hide');

                        show_plantilla_position(); //call function show all work experience
                        show_vacant_position(); //call function show all work experience
                    }
                });
                //return false;
            });

//--------notify Position---------  

//-------Duplicate Position---------  

            //get data for vacant position
            $('#plantilla_position_table').on('click','.item_duplicate_position',function(){
                var pos_id_dup = $(this).data('pos_id_dup');
              $('#pos_id_dup').val(pos_id_dup);
              //alert(pos_id_del);
            });
            
            $('#vacant_position_table').on('click','.item_duplicate_position',function(){
                var pos_id_dup = $(this).data('pos_id_dup');
              $('#pos_id_dup').val(pos_id_dup);
              //alert(pos_id_del);
            });

            //vacant position to database
            $('#btn_duplicate_vacant_position').on('click',function(){
                var pos_id_dup = $('#pos_id_dup').val();
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url().'duplicate_vacant_position_id'?>",
                    dataType : "JSON",
                    data : {pos_id_dup:pos_id_dup},
                    success: function(data){
                        $('[name="pos_id_dup"]').val("");
                        html = '<div class="alert alert-success mt-2"><i class="fa fa-check-circle" aria-hidden="true"></i> <b>The position duplicated</b> successfully.</div>';
                              $('#myTabContent').prepend(html);

                        //Hide
                        $(".alert").delay(4000).slideUp(200, function() {
                            $(this).alert('close');
                        });

                        show_plantilla_position(); //call function show all work experience
                        show_vacant_position(); //call function show all work experience
                    }
                });
                $('#delete_modal').modal('hide');
                
                //return false;
            });

//--------Duplicate Position--------- 

//-------Change the Satus to Vacant Position to OPEN---------  

            //get data for vacant position
            $('#vacant_position_table').on('click','.item_open_vacant_position',function(){
                var pos_id = $(this).data('pos_id_open');
                $('#pos_id_open').val(pos_id);
            });
        

            //vacant position to database
            $('#btn_open_vacant_position').on('click',function(){
                var pos_id = $('#pos_id_open').val();
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url().'open_vacant_position_id'?>",
                    dataType : "JSON",
                    data : {pos_id:pos_id},
                    success: function(data){
                        $('[name="pos_id_open"]').val("");
                        html = '<div class="alert alert-success mt-2"><i class="fa fa-check-circle" aria-hidden="true"></i> <b>Updated</b> successfully.</div>';
                              $('#myTabContent').prepend(html);

                        //Hide
                        $(".alert").delay(4000).slideUp(200, function() {
                            $(this).alert('close');
                        });
                             
                        show_plantilla_position(); //call function show all work experience
                        show_vacant_position(); //call function show all work experience
                    }
                });
                $('#open_modal').modal('hide');
                return false;
            });
//-------Change the Satus to Vacant Position to OPEN---------  

//-------Change the Satus to Vacant Position to Clsoe---------  

            //get data for vacant position
            $('#vacant_position_table').on('click','.item_close_vacant_position',function(){
                var pos_id = $(this).data('pos_id_close');
                $('#pos_id_close').val(pos_id);
            });
        

            //vacant position to database
            $('#btn_close_vacant_position').on('click',function(){
                var pos_id = $('#pos_id_close').val();
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url().'close_vacant_position_id'?>",
                    dataType : "JSON",
                    data : {pos_id:pos_id},
                    success: function(data){
                        $('[name="pos_id_close"]').val("");
                        html = '<div class="alert alert-success mt-2"><i class="fa fa-check-circle" aria-hidden="true"></i> <b>Updated</b> successfully.</div>';
                              $('#myTabContent').prepend(html);

                        //Hide
                        $(".alert").delay(4000).slideUp(200, function() {
                            $(this).alert('close');
                        });
                             
                        show_plantilla_position(); //call function show all work experience
                        show_vacant_position(); //call function show all work experience
                    }
                });
                $('#close_modal').modal('hide');
                return false;
            });

//-------Change the Satus to Vacant Position to Clsoe---------  

//-------Publish to Vacant Position---------  
            //get data for vacant position
            $('#vacant_position_table').on('click','.item_publish_vacant_position',function(){
                var vac_id = $(this).data('vac_id');
                var pos_id_publish = $(this).data('pos_id_publish');
                $('#vac_id').val(vac_id);
                $('#pos_id_publish').val(pos_id_publish);
            });

            $('#platilla_position_publish').submit(function(e){
            e.preventDefault(); 
                 $.ajax({
                     url: "<?php echo base_url().'publish_vacant_position_id'?>",
                     type: "post",
                     data: new FormData(this),
                     processData: false,
                     contentType: false,
                     cache: false,
                     async: false,
                      success: function(data){
                        var json = $.parseJSON(data);
                        if(json.status == 'True'){
                            html = '<div class="alert alert-success mt-2"><i class="fa fa-check-circle" aria-hidden="true"></i> <b>'+ json.error +'</b></div>';
                              $('#myTabContent').prepend(html);

                              //Close Modal
                              $(function() {
                                $('#publish_modal').modal('toggle');
                              });
                              
                              //Clear Text Box
                              $('[name="vac_id"]').val("");
                              $('[name="posting_date"]').val(null);
                              $('[name="closing_date"]').val(null);
                              $('[name="job_opening_file"]').val(null);

                        }else{
                          html = '<div class="alert alert-danger mt-2"><i class="fa fa-times-circle" aria-hidden="true"></i> <b>'+ json.error +'</b></div>';
                              $('#myTabContent').prepend(html);

                              //Clear Text Box
                              $('[name="job_opening_file"]').val(null);
                        }
                       

                        //Hide
                        $(".alert").delay(4000).slideUp(200, function() {
                            $(this).alert('close');
                        });
                                                    
                        show_plantilla_position(); //call function show all work experience
                        show_vacant_position(); //call function show all work experience
                   }
                 });
            });
//-------Publish to Vacant Position---------  

//---------print request for publication----------
            $('#print_modal').on('click','.print',function(){
              var pos_posting_date = $('#pos_posting_date').val();
              var pos_closing_date = $('#pos_closing_date').val();
              $("a.print").attr('href', "<?= base_url()?>request_for_publication/" + pos_posting_date + "to" + pos_closing_date);
            });
//---------print request for publication----------

//-------Add Timeline of Vacant Positions---------  

            //get data for vacant position
            $('#vacant_position_table').on('click','.item_vacant_timeline',function(){
                var vac_id = $(this).data('vac_id');
                var vac_evaluation_of_document = $(this).data('vac_evaluation_of_document');
                var vac_initial_deliberation = $(this).data('vac_initial_deliberation');
                var vac_cbwe = $(this).data('vac_cbwe');
                var vac_bei = $(this).data('vac_bei');
                $('#vac_evaluation_of_document').val(vac_evaluation_of_document);
                $('#vac_initial_deliberation').val(vac_initial_deliberation);
                $('#vac_cbwe').val(vac_cbwe);
                $('#vac_bei').val(vac_bei);
                $('#vac_id').val(vac_id);

                $('[name="vac_evaluation_of_document"]').val(vac_evaluation_of_document);
                $('[name="vac_initial_deliberation"]').val(vac_initial_deliberation);
                $('[name="vac_cbwe"]').val(vac_cbwe);
                $('[name="vac_bei"]').val(vac_bei);
          
            });
        

            //vacant position to database
            $('#btn_timeline').on('click',function(){
                var vac_id = $('#vac_id').val();
                var vac_evaluation_of_document = $('#vac_evaluation_of_document').val();
                var vac_initial_deliberation = $('#vac_initial_deliberation').val();
                var vac_cbwe = $('#vac_cbwe').val();
                var vac_bei = $('#vac_bei').val();
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url().'timeline_vacant_position_id'?>",
                    dataType : "JSON",
                    data : {vac_id:vac_id, vac_evaluation_of_document:vac_evaluation_of_document, vac_initial_deliberation:vac_initial_deliberation, vac_cbwe:vac_cbwe, vac_bei:vac_bei},
                    success: function(data){
                        html = '<div class="alert alert-success mt-2"><i class="fa fa-check-circle" aria-hidden="true"></i> <b>Updated</b> successfully.</div>';
                              $('#timeline_modal_body').prepend(html);

                        //Hide
                        $(".alert").delay(4000).slideUp(200, function() {
                            $(this).alert('close');
                        });
                             
                        show_plantilla_position(); //call function show all work experience
                        show_vacant_position(); //call function show all work experience
                    }
                });
                return false;
            });
//-------End of Timeline of Vacant Positions--------- 

//------Hide Annual Recruitment Plan
            $("#plan").hide();
            $("#vacant_chk").click(function() {
                  if($(this).is(":checked")) {
                      $("#plan").show(100);
                  } else {
                      $("#plan").hide(100);
                  }
            });
//------Hide Annual Recruitment Plan

//------Hide Annual Recruitment Plan
            $("#plan_edit").hide();
            $("#vacant_chk_edit").click(function() {
                  if($(this).is(":checked")) {
                      $("#plan_edit").show(100);
                  } else {
                      $("#plan_edit").hide(100);
                  }
            });
//------Hide Annual Recruitment Plan


    
          });//Close

      </script>

  <?php }?>
<?php }else{
redirect (base_url());
}?>
