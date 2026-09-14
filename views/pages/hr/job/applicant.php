<!-- modal static -->
<div class="modal fade" id="staticModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="staticModalLabel">Application Form</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div><!-- end modal-header -->
            <div id="application_form" class="modal-body">
                
                <!-- Welcome -->
                <div class="sufee-alert alert with-close alert-dark alert-dismissible fade show">
                    <center><h2>P R I V A C Y &nbsp&nbsp  N O T I C E</h2></center><hr>
                    <span class="badge badge-pill badge-dark">Dear Applicant,</span>
                        <p class="card-text m-t-10" align="justify">In line with our compliance with the Data Privacy Act, TESDA assures you that your personal information obtained in this process is protected.</p>  
                        <p class="card-text m-t-10" align="justify">Please be informed that your submitted data and documents shall be used in the assessment and validation, which will be done by the Human Resource Merit and Promotion Selection Board (HRMPSB) - Regional Office and the Secretariat. The following personality and offices will have access to your job application data:</p>
                            
                        <p class="card-text m-t-10">1. HRMPSB - RO</p>    
                        <p class="card-text">2. Human Resource Management Unit</p>    
                        <p class="card-text">3. Financial and Administrative Services Division</p>
                        <p class="card-text">4. The Appointing Authority</p>
                            
                        <p class="card-text m-t-10" align="justify">Furthermore, you are responsible for informing and obtaining consent and permission from references before providing their personal information to us.</p>  
                        <p class="card-text m-t-10">We appreciate your interest in applying with us!</p>
                        <p class="card-text m-t-10">Regards and keep safe!</p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- Welcome -->
                <div id="application_body_card"></div>

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="personal_tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Personal Information</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" id="eligibility_tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Eligibility</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" id="work_experience_tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Work Experience</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" id="training_tab" data-toggle="tab" href="#training" role="tab" aria-controls="training" aria-selected="false">Training</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" id="ra8371_tab" data-toggle="tab" href="#ra8371" role="tab" aria-controls="ra8371" aria-selected="false">RA 8371/RA 7277/RA 8972</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" id="pdswes_tab" data-toggle="tab" href="#pdswes" role="tab" aria-controls="pdswes" aria-selected="false">Personal Data Sheet & Work Experince Sheet</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" id="reference_tab" data-toggle="tab" href="#reference" role="tab" aria-controls="reference" aria-selected="false">References</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" id="performance_tab" data-toggle="tab" href="#performance" role="tab" aria-controls="performance" aria-selected="false">Awards Related to Performance</a>
                    </li>
                    <li class="nav-item" style="display:none">
                        <a class="nav-link disabled" id="expert_tab" data-toggle="tab" href="#expert" role="tab" aria-controls="expert" aria-selected="false">Expert Services</a>
                    </li>
                    <li class="nav-item" style="display:none">
                        <a class="nav-link disabled" id="committee_tab" data-toggle="tab" href="#committe" role="tab" aria-controls="committee" aria-selected="false">Commitees/TWGs Participation</a>
                    </li>
                </ul>

                <div class="tab-content m-b-0" id="myTabContent"><!-- myTabContent -->
                    
                    <!--First Tab-->
                    <?php include("form1.php")?>
                    <!--End of First Tab-->

                    <!--Second Tab-->
                    <?php include("form2.php")?>
                    <!--End of Second Tab-->

                    <!--Third Tab-->
                     <?php include("form3.php")?>
                    <!--End of Third Tab-->

                    <!--Fourth Tab-->
                    <?php include("form4.php")?>
                    <!--End of Fourth Tab-->

                    <!--Fifth Tab-->
                     <?php include("form5.php")?>
                    <!--End of Fifth Tab-->

                    <!--Sixth Tab-->
                     <?php include("form6.php")?>
                    <!--End of Sixth Tab-->

                    <!--Seventh Tab-->
                    <?php include("form7.php")?>
                    <!--End of Seventh Tab-->

                    <!--Eight Tab-->
                     <?php include("form8.php")?>
                    <!--End of Eight Tab-->

                    <!--Ninth Tab-->
                    <?php include("form9.php")?>
                    <!--End of Ninth Tab-->

                    <!--Tenth Tab-->
                    <?php include("form10.php")?>
                    <!--End of Tenth Tab-->

                    <small class="help-block form-text" style="color:red"><strong>Note:</strong> Merge into one (1) PDF file if multiple files. Maximum of <b>2mb</b> per file.</small>    
                </div><!-- end myTabContent -->
            </div><!-- end modal-body -->
        </div><!-- end modal-content -->
    </div> <!-- end modal-dialog modal-lg -->
</div> <!-- end modal static -->

