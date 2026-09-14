<?php 
if( $this->session->logged_in){
  if( $this->session->role == 'Guest'){
    redirect (base_url().'accreditor');
  }else{?>
	

	<div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Employees</h2>
            </div>
          </header>
           <!-- Breadcrumb-->
           <?php require_once('breadcrumb.php'); ?>
			<div class="col-lg-12 mt-3">
				<div class="card">

					<div class="card-close">
						<div class="dropdown">
						
						</div>
					</div>
					
					<div class="card-header d-flex align-items-center">
						<h1><span class="badge bg-blue badge-corner"><i class="fa fa-users" aria-hidden="true"></i></span> List of Registered Employees </h1>
						
					</div>
                    <div class="card-body">
                      <div class="table-responsive"> 
					                     
                        <table id="parameters" class="table table-striped table-hover">
                          <thead>
                            <tr>
							                <th>#</th>
                              <th>Name</th>
                              <th>Operating Unit</th>
                              <th>Position</th>
							                <th>Actions</th>
                            </tr>
                          </thead>
                          
                          <tbody id="employee_data">
                            <!--Start Loop-->
                            <?php 
                            $num_row = 0;
                            foreach ($employees as $row) { 
                            $num_row++;
                            ?>
                            <tr>
                                <td><?= $num_row; ?></td>
                                <td><?= $row['usr_name']; ?></td>
                                <td><?= $row['ous_desc']; ?></td>
                                <td><?= $row['emp_position']; ?></td>
                                <td>
                                  <button data-toggle="dropdown" type="button" class="btn btn-outline-primary dropdown-toggle btn-sm"><i class="fa fa-tasks"></i> Actions <span class="badge bg-red badge-corner"></span> <span class="caret"></span></button>
                                    <div class="dropdown-menu">
                                      <a data-toggle="modal" href="#personalinfo" class="dropdown-item employee_edit" data-usr_id="<?= $row['usr_id']?>"><i class="fa fa-edit"></i> Personal Information</a>
                                      <div class="dropdown-divider"></div>
                                      <?php 
                                      
                                      if($row['usr_name'] == 'Anna-lyn B. Nieva'){
                                         $usr_name = 'Annalyn B. Nieva';
                                      }else{
                                        $usr_name = $row['usr_name'];
                                      }
                                      
                                      if($row['usr_name'] == 'Cherry-Anne B. Domingo'){
                                        $usr_name = 'Cherry Anne B. Domingo';
                                      }else{
                                       $usr_name = $row['usr_name'];
                                      }
                                      
                                      if($row['usr_name'] == 'Kriszzia Em A. Munsayac-Cadiz'){
                                        $usr_name = ' Kriszzia Em A. Munsayac Cadiz';
                                      }else{
                                       $usr_name = $row['usr_name'];
                                      }
                                     
                                     
                                      ?>
                                      <a href="<?= base_url()?>add_training_admin/<?= $usr_name; ?>-<?= $row['usr_id']?>" class="dropdown-item"> <i class="fa fa-plus"> </i> Add Training</a>
                                      <a href="<?= base_url()?>zip_download_per_employee_individual/<?= $row['usr_id']?>-<?= $row['usr_name']; ?>" class="dropdown-item"> <i class="fa fa-file-zip-o"> </i> Download Zip File</a>
                                      <a href="<?= base_url()?>export_hr_training_user_individual/<?= $row['usr_id']?>-<?= $row['usr_name']; ?>-<?= $row['ous_desc']; ?>" target="_blank" class="dropdown-item"> <i class="fa fa-file-excel-o"> </i> Export to Excel File</a>
                                      <a href="<?= base_url()?>print_hr_training_user_individual/<?= $row['usr_id']?>-<?= $row['usr_name']; ?>-<?= $row['ous_desc']; ?>" target="_blank" class="dropdown-item"> <i class="fa fa-print"> </i> Print Trainings</a>
                                    </div> 
                                </td>
                            </tr>
                            <?php } ?>        
                            <!--End Loop-->
                          </tbody>
                        </table>

                      </div>
                    </div>

            	</div><!--End of Card-->
        	</div><!--End of col-lg-12 mt-3-->

<!--Modal Personal Information-->          
  <div class="modal fade delete" id="personalinfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl" role="document">	
        <div class="modal-content">

          <div class="modal-header">
            <h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-user"></i> Personal Information </h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>

          <div class="modal-body">

          <!--User ID-->
          <input id="usr_id" type="hidden"> 
          <!--User ID-->
           
          <!--Tabs-->
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
          <!--Tabs-->

          <div class="tab-content" id="myTabContent">
            <!--I. Personal Information-->
            <div class="tab-pane fade show active" id="Personal_Information" role="tabpanel" style="margin-bottom:20px;" aria-labelledby="home-tab">
              <div class="col-md-12">
                <?php include('employee\pds_sheet1.php'); ?> 
              </div><!--Col MD 12-->
            </div>
            <!--I. Personal Information-->
            
            <!--II. Family Background-->    
            <div class="tab-pane fade" id="Family_Background" role="tabpanel" style="margin-bottom:20px;" aria-labelledby="profile-tab">
              <div class="col-md-12">
                  <?php //include("hr/employee/pds_sheet1-1.php") ?> 
              </div>
            </div>
            <!--II. Family Background-->    

            <!--III. Educational Background-->
            <div class="tab-pane fade" id="Educational_Background" role="tabpanel" style="margin-bottom:20px;" aria-labelledby="contact-tab">
              <div class="col-md-12">
                  <br>
                  <label class="form-control-label">26. Educational Background - Elementary, Secondary, Vocational / Trade Course,  College, Graduate Studies <a href="javascript:void(0);" data-toggle="modal" data-target="#Modal_Add_Educational"><i class="fa fa-plus"></i> Add</a></label>
                  <?php //include("hr/employee/educational.php") ?>
              </div>    
            </div> 
            <!--III. Educational Background-->

            <!--IV. Eligibility-->  
            <div class="tab-pane fade" id="Civil_Service_Eligibility" role="tabpanel" style="margin-bottom:20px;" aria-labelledby="contact-tab">
              <div class="col-md-12"> 
                <br>
                <label class="form-control-label">27. Civil Service Eligibility (Career Service/ Ra 1080 (Board/ Bar) Under Special Laws/ CES/ CSEE Barangay Eligibility / Driver's License) <a href="javascript:void(0);" data-toggle="modal" data-target="#Modal_Add_Eligibility"><i class="fa fa-plus"></i> Add</a></label>   
                  <?php //include("hr/employee/eligibility.php") ?> 
              </div>
            </div>
            <!--IV. Eligibility-->   

            <div class="tab-pane fade" id="work_experience" role="tabpanel" style="margin-bottom:20px;" aria-labelledby="contact2-tab">
              <!--Third Row-->
              <div class="row no-padding-bottom no-padding-top"> 
                <!--List-->                   
                <br>
                <label class="form-control-label">28. Work Experience (Include private employment. Start from your recent work) Description of duties should be indicated in the attached Work Experience sheet. <a href="javascript:void(0);" data-toggle="modal" data-target="#Modal_Add_work_experience"><i class="fa fa-plus"></i> Add</a> | <a href="javascript:void(0);" data-toggle="modal" data-target="#Modal_Import_Work_Experience"><i class="fa fa-cloud-upload" aria-hidden="true"></i> Import</a></label>
                  <?php //include("hr/employee/workexperience.php") ?> 
                <!--List-->
              </div><!--Third Row-->  
            </div>  

            <div class="tab-pane fade" id="Voluntary_Work" role="tabpanel" style="margin-bottom:20px;" aria-labelledby="contact3-tab">
              <!--Third Row-->
              <div class="row no-padding-bottom"> 
                <!--List-->                   
                <br>
                <label class="form-control-label">29. Voluntary Work or Involvement In Civic / Non-Government / People / Voluntary Organization/s. <a href="javascript:void(0);" data-toggle="modal" data-target="#Modal_Add_Voluntary_Work"><i class="fa fa-plus"></i> Add</a></label>
                <?php //include("hr/employee/voluntarywork.php") ?> 
                <!--List-->
              </div><!--Third Row-->  
            </div>  

            <div class="tab-pane fade" id="Learning_Development" role="tabpanel" style="margin-bottom:20px;" aria-labelledby="contact4-tab">
              <!--Third Row-->
              <div class="row no-padding-bottom"> 
                <!--List-->                   
                <br>
                <label class="form-control-label">30. Learning and Development (L&D) Interventions/Training Programs Attended</label>
                <?php //include("hr/employee/learninganddevelopment.php") ?> 
                <!--List-->
              </div><!--Third Row--> 
            </div>  
            <div class="tab-pane fade" id="Other_Information" role="tabpanel"  style="margin-bottom:20px;"aria-labelledby="contact5-tab">
              <!--Third Row-->
              <div class="row no-padding-bottom"> 
                <!--List-->                   
                <br>
                <label class="form-control-label">31. Special Skills and Hobbies <a href="javascript:void(0);" data-toggle="modal" data-target="#Modal_Add_Hobbies"><i class="fa fa-plus"></i> Add</a></label>
                  <?php //include("hr/employee/hobbies.php") ?> 
                <!--List-->
              </div><!--Third Row--> 

              <!--Third Row-->
              <div class="row no-padding-bottom"> 
                <!--List-->                   
                <br>
                <label class="form-control-label">32. Non-Academic Distinction/ Recognition (Write in full) <a href="javascript:void(0);" data-toggle="modal" data-target="#Modal_Add_Recognition"><i class="fa fa-plus"></i> Add</a></label>
                  <?php //include("hr/employee/recognition.php") ?> 
                <!--List-->
              </div><!--Third Row--> 

              <!--Third Row-->
              <div class="row no-padding-bottom"> 
                <!--List-->                   
                <br>
                <label class="form-control-label">33. Membership in Association/ Organization (Write in full) <a href="javascript:void(0);" data-toggle="modal" data-target="#Modal_Add_Membership"><i class="fa fa-plus"></i> Add</a></label>
                  <?php //include("hr/employee/membership.php") ?> 
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
                <?php //include("hr/employee/character_references.php") ?>
                <!--List-->
              </div><!--Third Row--> 
            </div>  
            <div class="tab-pane fade" id="Employment_Information" role="tabpanel" style="margin-bottom:20px;" aria-labelledby="contact-tab">
                <div class="col-md-12">
                  <?php //include("hr/employee/employment.php") ?> 
                </div><!--Col MD 12-->
            </div>  

            <!--Work Experience Sheet-->
            <div class="tab-pane fade" id="work_experience_sheet" role="tabpanel" style="margin-bottom:20px;" aria-labelledby="contact7-tab">
              <!--Third Row-->
              <div class="row no-padding-bottom"> 
                <!--List-->                   
                <br>
                <label class="form-control-label">Work Experience Sheet <a href="javascript:void(0);" data-toggle="modal" data-target="#Modal_Add_WES"><i class="fa fa-plus"></i> Add</a></label>
                <?php //include("hr/work-experience-sheet.php") ?>
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
                <?php //include("hr/employee/my_document.php") ?>
                <!--List-->
              </div><!--Third Row--> 
            </div>  

          </div> 

          </div><!-- Modal Body-->
        </div>
      </div>
    </div>
<!--Modal Personal Information-->

<!--Script JQuery-->
  <script type="text/javascript">
    $(document).ready(function(){
      
      var usr_id; //variable User ID

//Get User ID
      $('#employee_data').on('click','.employee_edit',function(){
            usr_id = $(this).data('usr_id');
			      $('#usr_id').val(usr_id);
            show_personal_information();
      });
//Get User ID

//Function Get Data Personal Information
      function show_personal_information(){
            $.ajax({
                type  : 'GET',
                url   : '<?php echo base_url().'personal_information/'?>'+usr_id,
                async : true,
                dataType : 'json',
                success : function(data){
                  console.log(data);
                  //clear
                  $('#citizenship').val("");
                  $('#citizenship').val(data[0].emp_citizenship);

                  $('#pi_surname').val("");
                  $('#pi_surname').val(data[0].pi_surname);
                  
                }
            });
        }
//Function Get Data Personal Information

    });
  </script>
<!--Script JQuery-->


<!--Message Box-->
		
	<?php if($this->session->flashdata('zip_download')) : ?>

  <div class="toast" data-autohide="false" style="position: absolute; top: 150px; right: 20px; min-width: 300px;">
    <div class="toast-header bg-red">
      <strong class="mr-auto"><i class="fa fa-bullhorn"></i> System Message</strong>
      <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
    </div>
    <div class="toast-body">
      <?= $this->session->flashdata('zip_download'); ?>
    </div>
  </div>
  <?php $this->session->unset_userdata('zip_download'); endif;?>

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
	redirect(base_url());
}?>
