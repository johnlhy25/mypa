<?php 
if( $this->session->logged_in){
  if( $this->session->role == 'Accre'){
    redirect (base_url().'Guest');
  }else{?>
  
  <div id="content-inner-plantilla" class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Applicants</h2>
            </div>
          </header>

        <!-- Breadcrumb-->
        <?php require_once('breadcrumb.php'); ?>

      <div class="col-lg-12 mt-3">
        <div class="card bg-white">
          <div class="card-close">
            <div class="dropdown">
              <button type="button" id="closeCard3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                  <div aria-labelledby="closeCard3" class="dropdown-menu dropdown-menu-right has-shadow">
                  
                  </div>
            </div>
          </div>
          <div class="card-header d-flex align-items-center">
					  <h1> <span class="badge bg-primary badge-corner"><i class="fa fa-users" aria-hidden="true"></i></span> Profile of Applicants</h1>
				  </div>
          <div class="card-body">
            <!--Operating Units-->
            
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#posotion" role="tab" aria-controls="home"
                  aria-selected="true">Profile of Applicants</a>
              </li>
              
            </ul>

            <div class="tab-content" id="myTabContent">
                                    
              <!--I. List of Applicants-->
              <div class="tab-pane fade show active" id="posotion" role="tabpanel" aria-labelledby="home-tab">
                <div class="col-md-12">
                  <div class="table-responsive mt-2">   
                    <div class="btn-group pull-right" style="margin-bottom:10px;">
                      <a id="r2_profile_of_applicants" href="<?= base_url().'r2_profile_of_applicants/'.$vac_id?>" target="_blank" class="btn btn-sm" style="background-color:#BBDEFB"><i class="fa fa-print"></i> Profile of Applicants</a>
                      &nbsp
                      <a id="annex_k" href="<?= base_url().'r2_annex_k/'.$vac_id?>" target="_blank" class="btn btn-sm" style="background-color:#BBDEFB"><i class="fa fa-print"></i> Annex K (Qualified Applicants)</a>
                      &nbsp
                      <a id="annex_l1" data-toggle="modal" href="#disqualified_modal" class="btn btn-sm" style="background-color:#BBDEFB"><i class="fa fa-paper-plane"></i> Annex L1 (Disqualification Notice)</a>
                      &nbsp
                      <a id="annex_m" data-toggle="modal" href="#qualified_modal" class="btn btn-sm" style="background-color:#BBDEFB; display:none"><i class="fa fa-paper-plane"></i> Annex M (CBWE Notice)</a>
                    </div> 
                    <table id="applicants_table" class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>Gender</th>
                          <th>Date of Birth</th>
                          <th>Age</th>
                          <th>Address</th>
                          <th>Contact Number</th>   
                          <th>Present Position</th>
                          <th>Present Office</th>
                          <th>Eligibility</th>
                          <th>Education</th>
                          <th>Experience</th>
                          <th>No. of Years</th>
                          <th>Relevant Trainings</th>
                          <th>No. of Hours</th>
                          <th>Actions</th>
                        </tr>
                      </thead>

                      <tbody id="applicants_table_body">

                      </tbody>	
                    </table>							
                  </div>  
                </div><!--Col MD 12-->
              </div>
              <!--I. May Laman-->
            </div> 
            <!--I. List of Applicants-->
          </div>
        </div>    
      </div>

<!-- Modal Plantilla -->
      <div class="modal fade delete" id="evaluate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static"> 
        <div class="modal-dialog modal-lg" role="document">	
          <div class="modal-content">

            <div class="modal-header">
              <h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-check"></i> Evaluate Applicant</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
           
            <div class="modal-body"> <!-- Modal Body-->
              <form action="" method="POST" id="evaluate_form" role="form">
              <input id="app_id_eval" type="hidden" id="app_id_eval" name="app_id_eval" class="form-control">

<!--Applicant Information-->
              <div id="accordion">
                <div class="card no-margin-top no-margin-bottom no-padding-bottom">
                  <div class="card-header">
                    <a class="collapsed card-link" data-toggle="collapse" href="#collapseapplicant">
                    <i class="fa fa-user" aria-hidden="true"></i> <b>Applicant</b> Information
                    </a>
                  </div>
                  <div id="collapseapplicant" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                        <!--First Row-->
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="fullname" class=" form-control-label"> Name</label>
                            </div>
                            <div class="col col-md-9">
                                <input type="text" id="fullname" name="fullname" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="age" class=" form-control-label"> Age</label>
                            </div>
                            <div class="col col-md-9">
                                <input type="text" id="age" name="age" placeholder="27" class="form-control" disabled>
                            </div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="sex" class=" form-control-label"> Sex</label>
                            </div>
                            <div class="col col-md-9">
                                <input type="text" id="sex" name="sex" placeholder="Male" class="form-control" disabled>
                            </div>
                        </div>
                        <!--First Row-->
                        
                        <!--Second Row-->
                        <div class="row form-group">
                          <div class="col col-md-3">
                              <label for="present_office" class=" form-control-label">Present Office</label>
                          </div>
                          <div class="col col-md-9">
                              <input type="text" id="present_office" name="present_office" placeholder="Santiago, John Lee Patino" class="form-control" disabled>
                          </div>
                        </div>
                        <div class="row form-group">
                          <div class="col col-md-3">
                              <label for="present_position" class=" form-control-label">Present Position</label>
                          </div>
                          <div class="col col-md-9">
                              <input type="text" id="present_position" name="present_position" placeholder="Santiago, John Lee Patino" class="form-control" disabled>
                          </div>
                        </div>
                        <!--Second Row-->

                        <!--Third Row-->
                        <div class="row form-group">
                          <div class="col col-md-3">
                              <label for="ous_desc" class=" form-control-label">Office where the vacancy</label>
                          </div>
                          <div class="col col-md-9">
                              <input type="text" id="ous_desc" name="ous_desc" placeholder="Santiago, John Lee Patino" class="form-control" disabled>
                          </div>
                        </div>
                        <div class="row form-group">
                          <div class="col col-md-3">
                              <label for="pos_desc" class="form-control-label">Vacant Position</label>
                          </div>
                          <div class="col col-md-9">
                              <input type="text" id="pos_desc" name="pos_desc" placeholder="Santiago, John Lee Patino" class="form-control" disabled>
                          </div>
                        </div>
                        <!--Third Row-->
                    </div>
                  </div>
                </div>
              </div>
<!--Applicant Information-->

<!--Qualification Standard-->
              <div id="accordion1" >
                <div class="card no-margin-top no-margin-bottom no-padding-bottom">
                  <div class="card-header">
                    <a class="collapsed card-link" data-toggle="collapse" href="#collapsequalification">
                    <i class="fa fa-briefcase" aria-hidden="true"></i> <b>Qualification</b> Standard
                    </a>
                  </div>
                  <div id="collapsequalification" class="collapse show" data-parent="#accordion1">
                    <div class="card-body">
                      <!--First Row-->
                      <div class="row form-group">
                        <table class="table">
                          <thead class="thead-light">
                            <tr>
                              <th colspan="2" class="text-center" width="40%"><i class="fa fa-check-square"></i> Qualification Standards</th>
                              <th width="15%">Meet the minimum <br>requirements?</th>
                              <th width="45%">Applicants Qualification</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>Eligibility</td>
                              <td><p id="pos_eligibility"></p></td>
                              <td class="text-center">
                                <input type="radio" id="yes" name="eval_eligibility" value="yes" class="form-check-input">Yes
                                &nbsp&nbsp&nbsp&nbsp&nbsp
                                <input type="radio" id="no" name="eval_eligibility" value="no" class="form-check-input">No
                              </td>
                              <td>
                                <p id="app_eligibility"></p>
                                <div class="btn-group" style="width:100%">
                                  <a href="#" class="btn btn-sm btn-primary" style="display:none"><i class="fa fa-edit"></i> Edit</a>
                                  <a id="app_eligibility_doc_link1" target="_blank" class="btn btn-sm btn-secondary"><i class="fa fa-eye"></i> View</a>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td>Education</td>
                              <td><p id="pos_education"></p></td>
                              <td class="text-center">
                                <input type="radio" id="yes" name="eval_education" value="yes" class="form-check-input">Yes
                                &nbsp&nbsp&nbsp&nbsp&nbsp
                                <input type="radio" id="no" name="eval_education" value="no" class="form-check-input">No
                              </td>
                              <td>
                                <p id="app_course"></p>
                                <div class="btn-group" style="width:100%">
                                  <a href="#" class="btn btn-sm btn-primary" style="display:none"><i class="fa fa-edit"></i> Edit</a>
                                  <a id="app_educational_doc_link" target="_blank" class="btn btn-sm btn-secondary"><i class="fa fa-eye"></i> View</a>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td>Experience</td>
                              <td><p id="pos_experience"></p></td>
                              <td class="text-center">
                                <input type="radio" id="yes" name="eval_experience" value="yes" class="form-check-input">Yes
                                &nbsp&nbsp&nbsp&nbsp&nbsp
                                <input type="radio" id="no" name="eval_experience" value="no" class="form-check-input">No
                              </td>
                              <td>
                                <p id="app_relevant_years"></p>
                                <div class="btn-group" style="width:100%">
                                  <a href="#" class="btn btn-sm btn-primary" style="display:none"><i class="fa fa-edit"></i> Edit</a>
                                  <a id="app_coe_doc_link" target="_blank"  class="btn btn-sm btn-secondary"><i class="fa fa-eye"></i> View</a>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td>Training</td>
                              <td><p id="pos_training"></p></td>
                              <td class="text-center">
                                <input type="radio" id="yes" name="eval_training" value="yes" class="form-check-input">Yes
                                &nbsp&nbsp&nbsp&nbsp&nbsp
                                <input type="radio" id="no" name="eval_training" value="no" class="form-check-input">No
                              </td>
                              <td>
                                <p id="app_relevant_hours"></p>
                                <div class="btn-group" style="width:100%">
                                  <a href="#" class="btn btn-sm btn-primary" style="display:none"><i class="fa fa-edit"></i> Edit</a>
                                  <a id="app_training_doc_link" target="_blank"  class="btn btn-sm btn-secondary"><i class="fa fa-eye"></i> View</a>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td>Performance</td>
                              <td></td>
                              <td class="text-center">
                                <input type="radio" id="yes" name="eval_performance" value="yes" class="form-check-input">Yes
                                &nbsp&nbsp&nbsp&nbsp&nbsp
                                <input type="radio" id="no" name="eval_performance" value="no" class="form-check-input">No
                                &nbsp&nbsp&nbsp&nbsp&nbsp
                                <input type="radio" id="no" name="eval_performance" value="n/a" class="form-check-input">N/A
                              </td>
                              <td>
                              <div class="btn-group" style="width:100%">
                                  <a href="#" class="btn btn-sm btn-primary disabled" style="display:none"><i class="fa fa-edit"></i> Edit</a>
                                  <a id="app_ipcr_doc_link" target="_blank"  class="btn btn-sm btn-secondary"><i class="fa fa-eye"></i> View</a>
                                </div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <!--First Row-->

                      <!--Second Row-->
                      <div class="row form-group">
                        <div class="col col-md-8">
                          <label class=" form-control-label"><strong>Result</strong></label>
                          <label class="form-control-label" style="margin-left:20px">
                              <input type="radio" id="yes" name="eval_result" value="Qualified" class="form-check-input">Qualified
                              &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                              <input type="radio" id="con" name="eval_result" value="Conditionally Qualified" class="form-check-input">Conditionally Qualified
                              &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                              <input type="radio" id="no" name="eval_result" value="Disqualified" class="form-check-input">Disqualified
                          </label>
                        </div>

                        <div class="col col-md-4">
                          
                        </div>
                      </div>
                      <!--Second Row-->
                    </div>
                  </div>
                </div>
              </div>
<!--Qualification Standard-->

<!--Award Related to Performance -->
              <div id="accordion2">
                <div class="card no-margin-top no-margin-bottom no-padding-bottom">
                  <div class="card-header">
                    <a class="collapsed card-link" data-toggle="collapse" href="#collapsepeformance">
                    <i class="fa fa-star-o" aria-hidden="true"></i> <b>Award Related to Performance</b> 
                    </a>
                  </div>
                  <div id="collapsepeformance" class="collapse" data-parent="#accordion2">
                    <div class="card-body"><!--Card-->
                       <!--First Row-->
                        <div class="row form-group">
                          <label class=" form-control-label"><strong>Award Related to Performance</strong></label>
                          <table class="table">
                            <thead class="thead-light">
                              <tr>
                                <th width="20%">Category</th>
                                <th width="15%">Weights</th>
                                <th width="15%">Points earned</th>
                                <th width="50%">Remarks</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>International</td>
                                <td>10</td>
                                <td>
                                  <input type="number" step="0.1" id="eval_arp_international" name="eval_arp_international" class="form-control txt" placeholder="10" min="0" max="10">
                                </td>
                                <td>
                                  <p id="app_arp_international"></p>
                                </td>
                              </tr>
                              <tr>
                                <td>National</td>
                                <td>7.5</td>
                                <td>
                                  <input type="number" step="0.1" id="eval_arp_national" name="eval_arp_national" class="form-control txt" placeholder="7.5" min="0" max="7.5">
                                </td>
                                <td>
                                  <p id="app_arp_national"></p>
                                </td>
                              </tr>
                              <tr>
                                <td>Regional</td>
                                  <td>5</td>
                                  <td>
                                    <input type="number" step="0.1" id="eval_arp_regional" name="eval_arp_regional" class="form-control txt" placeholder="0" min="0" max="5">
                                  </td>
                                  <td>
                                    <p id="app_arp_regional"></p>
                                </td>
                              </tr>
                              <tr>
                                <td>Provincial/ Institution</td>
                                  <td>2.5</td>
                                  <td>
                                    <input type="number" step="0.1" id="eval_arp_provincial" name="eval_arp_provincial" class="form-control txt" placeholder="2.5" min="0" max="2.5">
                                  </td>
                                  <td>
                                    <p id="app_arp_provincial"></p>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                          <a id="btn_app_arp_international"  href="#" target="_blank" class="btn btn-sm btn-primary" style="margin-left:15px"><i class="fa fa-eye"></i> View uploaded document</a>
                        </div>
                        <!--First Row-->

                        <!--Second Row-->
                        <div class="row form-group" style="display:none">
                          <label class=" form-control-label"><strong>Expert Services (Resource Person/ Speaker/ Moderator/Panelist)</strong></label>
                          <table class="table">
                            <thead class="thead-light">
                              <tr>
                                <th width="20%">Category</th>
                                <th width="15%">Weights</th>
                                <th width="15%">Points earned</th>
                                <th width="50%">Remarks</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>International</td>
                                <td>2.5</td>
                                <td>
                                  <input type="number" step="0.1" id="eval_es_international" name="eval_es_international" class="form-control txt" placeholder="2.5" min="2.5" max="2.5">
                                </td>
                                <td>
                                  <p id="app_expert_international_p"></p>
                                </td>
                              </tr>
                              <tr>
                                <td>National</td>
                                <td>1.875</td>
                                <td>
                                  <input type="number" step="0.1" id="eval_es_national" name="eval_es_national" class="form-control txt" placeholder="1.875" min="1.875" max="1.875">
                                </td>
                                <td>
                                  <p id="app_expertise_national_p"></p>
                                </td>
                              </tr>
                              <tr>
                                <td>Regional</td>
                                  <td>1.25</td>
                                  <td>
                                    <input type="number" step="0.1" id="eval_es_regional" name="eval_es_regional" class="form-control txt" placeholder="1.25" min="1.25" max="1.25">
                                  </td>
                                  <td>
                                    <p id="app_expertise_regional_p"></p>
                                </td>
                              </tr>
                              <tr>
                                <td>Provincial/ Institution</td>
                                  <td>0.625</td>
                                  <td>
                                    <input type="number" step="0.1" id="eval_es_provincial" name="eval_es_provincial" class="form-control txt" placeholder="0.625" min="0.625" max="0.625">
                                  </td>
                                  <td>
                                    <p id="app_expertise_provincial_p"></p>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                          <a id="btn_app_expert_international"  href="#" class="btn btn-sm btn-primary" target="_blank" style="margin-left:15px"><i class="fa fa-eye"></i> View uploaded document</a>
                        </div>
                        <!--Second Row-->

                        <!--Third Row-->
                        <div class="row form-group" style="display:none">
                          <label class=" form-control-label"><strong>Committees/TWGs Participation</strong></label>
                          <table class="table">
                            <thead class="thead-light">
                              <tr>
                                <th width="20%">Category</th>
                                <th width="15%">Weights</th>
                                <th width="15%">Points earned</th>
                                <th width="50%">Remarks</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>Chair/Co-Chair</td>
                                <td>2.5</td>
                                <td>
                                  <input type="number" step="0.1" id="eval_cmt_chair" name="eval_cmt_chair" class="form-control txt" placeholder="2.5">
                                </td>
                                <td>
                                  <p id="app_committee_chair_p"></p>
                                </td>
                              </tr>
                              <tr>
                                <td>Vice Chair</td>
                                <td>1.875</td>
                                <td>
                                  <input type="number" step="0.1" id="eval_cmt_vcchair" name="eval_cmt_vcchair" class="form-control txt" placeholder="1.875">
                                </td>
                                <td>
                                  <p id="app_committee_vchair_p"></p>
                                </td>
                              </tr>
                              <tr>
                                <td>Member </td>
                                  <td>1.25</td>
                                  <td>
                                    <input type="number" step="0.1" id="eval_cmt_member" name="eval_cmt_member" class="form-control txt" placeholder="1.25">
                                  </td>
                                  <td>
                                    <p id="app_committee_member_p"></p>
                                </td>
                              </tr>
                              <tr>
                                <td>Secretariat</td>
                                  <td>0.625</td>
                                  <td>
                                    <input type="number" step="0.1" id="eval_cmt_secretariat" name="eval_cmt_secretariat" class="form-control txt" placeholder="0.625">
                                  </td>
                                  <td>
                                    <p id="app_committee_sec_p"></p>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                          <div class="col col-md-5">
                          <a id="btn_app_committee_chair"  href="#" target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> View uploaded document</a>
                          </div>
                          <div class="col col-md-1">
                          
                          </div>
                          <div class="col col-md-2">
                            <strong>Total</strong>
                          </div>
                          <div class="col col-md-4">
                            <input type="text" id="eval_total" name="eval_total" class="form-control" readonly>
                          </div>
                          
                        </div>
                        <!--Third Row-->
                    </div><!--Card-->
                  </div>
                </div>
              </div>
<!--Award Related to Performance-->

<!-- Application Checklist -->
              <div id="accordion3">
                <div class="card no-margin-top no-margin-bottom no-padding-bottom">
                  <div class="card-header">
                    <a class="collapsed card-link" data-toggle="collapse" href="#collapsechecklist">
                    <i class="fa fa-list-ol" aria-hidden="true"></i> <b>Application </b>Checklist 
                    </a>
                  </div>
                  <div id="collapsechecklist" class="collapse" data-parent="#accordion3">
                    <div class="card-body"><!--Card-->
                       <!--First Row-->
                       <div class="row form-group">
                          <label class=" form-control-label"><strong>Award Related to Performance</strong></label>
                          <table class="table">
                            <thead class="thead-light">
                              <tr>
                                <th width="2%"><i class="fa fa-check-square"></i></th>
                                <th width="35%">Documents</th>
                                <th width="25%">Link</th>
                                <th width="38%">Remarks</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td></td>
                                <td>Application Letter</td>
                                <td>
                                  <a id="btn_app_letter_link" class="btn btn-sm btn-primary" target="_blank" style="width:100%;margin-bottom:5px"><i class="fa fa-eye"></i> View Application Letter</a> 
                                </td>
                                <td>
                                  <textarea id="eval_chklist" name="eval_chklist" rows="2" class="form-control" placeholder=""></textarea>
                                </td>
                              </tr>
                              <tr>
                                <td> <input type="checkbox" id="chk1" name="chk1" value="yes" class="checkbox-template"></td>
                                <td>PDS (Revised 2025 Form) with latest ID picture with WES</td>
                                <td>
                                  <a id="btn_pdswes_doc_link" class="btn btn-sm btn-primary" target="_blank" style="width:100%;margin-bottom:5px"><i class="fa fa-eye"></i> View PDS</a> 
                                  <a id="btn_wes_doc_link" class="btn btn-sm btn-primary" target="_blank" style="width:100%"><i class="fa fa-eye"></i> View WES</a>
                                </td>
                                <td>
                                  <textarea id="eval_chklist1" name="eval_chklist1" rows="2" class="form-control" placeholder=""></textarea>
                                </td>
                              </tr>
                              <tr>
                                <td><input type="checkbox" id="chk2" name="chk2" value="yes" class="checkbox-template"></td>
                                <td>Authenticated copy of Official Transcript of Record/Diploma</td>
                                <td>
                                  <a id="btn_tor_doc_link"  href="#" class="btn btn-sm btn-primary" target="_blank" style="width:100%"><i class="fa fa-eye"></i> View document</a>
                                </td>
                                <td>
                                  <textarea id="eval_chklist2" name="eval_chklist2" rows="2" class="form-control" placeholder=""></textarea>
                                </td>
                              </tr>
                              <tr>
                                <td><input type="checkbox" id="chk3" name="chk3" value="yes" class="checkbox-template"></td>
                                  <td>Preferably authenticated copy of Eligibilities (CSC) or Authenticated copy of Unexpired License or Board Rating (PRC)
                                    <br>Submission of <em>FAKE</em> eligibility shall cause the filing of perjury/administrative case by the CSC.</td>
                                  <td>
                                    <a id="btn_eligibility_doc_link1"  href="#" target="_blank" class="btn btn-sm btn-primary" style="width:100%"><i class="fa fa-eye"></i> View document</a>
                                  </td>
                                  <td>
                                    <textarea id="eval_chklist3" name="eval_chklist3" rows="2" class="form-control" placeholder=""></textarea>
                                </td>
                              </tr>
                              <tr>
                                <td><input type="checkbox" id="chk4" name="chk4" value="yes" class="checkbox-template"></td>
                                  <td>Service Record or Certificate of Employment (indicating duties and responsibilities)</td>
                                  <td>
                                    <a id="btn_service_reccord_doc_link"  href="#" target="_blank" class="btn btn-sm btn-primary" style="width:100%"><i class="fa fa-eye"></i> View Service Record</a>
                                    <a id="btn_coe_doc_link1"  href="#" class="btn btn-sm btn-primary" target="_blank" style="width:100%; margin-top:5px"><i class="fa fa-eye"></i> View Certificate of Employment</a>
                                  </td>
                                  <td>
                                    <textarea id="eval_chklist4" name="eval_chklist4" rows="2" class="form-control" placeholder=""></textarea>
                                </td>
                              </tr>
                              <tr>
                                <td><input type="checkbox" id="chk5" name="chk5" value="yes" class="checkbox-template"></td>
                                  <td>Training Certificates for Training Programs attended.</td>
                                  <td>
                                    <!--List-->
                                    <!--List-->
                                    <a id="btn_training_doc_link"  href="#" class="btn btn-sm btn-primary" target="_blank" style="width:100%"><i class="fa fa-eye"></i> View document</a>
                                  </td>
                                  <td>
                                    <textarea id="eval_chklist5" name="eval_chklist5" rows="2" class="form-control" placeholder=""></textarea>
                                </td>
                              </tr>
                              <tr>
                                <td><input type="checkbox" id="chk6" name="chk6" value="yes" class="checkbox-template"></td>
                                  <td>Certified photocopy of latest IPCR [for Govt. employees] or performance evaluation [for Job Orders] for two (2) semesters with Very Satisfactory (VS) rating</td>
                                  <td>
                                    <a id="btn_ipcr_doc_link"  href="#" class="btn btn-sm btn-primary" target="_blank" style="width:100%"><i class="fa fa-eye"></i> View document</a>
                                  </td>
                                  <td>
                                    <textarea id="eval_chklist6" name="eval_chklist6" rows="2" class="form-control" placeholder=""></textarea>
                                </td>
                              </tr>
                              <tr style="display:none">
                                <td><input type="checkbox" id="chk7" name="chk7" value="yes" class="checkbox-template"></td>
                                  <td>Accomplishments done during the last three (3) years to be endorsed by the Head of Office</td>
                                  <td>
                                    <a id="btn_wes_doc_link1"  href="#" class="btn btn-sm btn-primary" target="_blank" style="width:100%"><i class="fa fa-eye"></i> View document</a>
                                  </td>
                                  <td>
                                    <textarea id="eval_chklist7" name="eval_chklist7" rows="2" class="form-control" placeholder=""></textarea>
                                </td>
                              </tr>
                              <tr>
                                <td><input type="checkbox" id="chk8" name="chk8" value="yes" class="checkbox-template"></td>
                                  <td>Copy of previous appointment for TESDA applicants or from other government agencies (if applicable).</td>
                                  <td>
                                    <a id="btn_appointment_doc_link"  href="#" class="btn btn-sm btn-primary" target="_blank" style="width:100%"><i class="fa fa-eye"></i> View document</a>
                                  </td>
                                  <td>
                                    <textarea id="eval_chklist8" name="eval_chklist8" rows="2" class="form-control" placeholder=""></textarea>
                                </td>
                              </tr>
                              <tr>
                                <td><input type="checkbox" id="chk9" name="chk9" value="yes" class="checkbox-template"></td>
                                  <td>List of Character References: Supervisor, Peers, Clients, Subordinates (if any).</td>
                                  <td>
                                    <!--List Here-->
                                  </td>
                                  <td>
                                    <textarea id="eval_chklist9" name="eval_chklist9" rows="2" class="form-control" placeholder=""></textarea>
                                </td>
                              </tr>
                              <tr>
                                <td><input type="checkbox" id="chk10" name="chk10" value="yes" class="checkbox-template"></td>
                                  <td>Awards Related to Performance</td>
                                  <td>
                                    <!--List Here-->
                                    <a id="btn_arp_doc_link"  href="#" class="btn btn-sm btn-primary" target="_blank" style="width:100%"><i class="fa fa-eye"></i> View document</a>
                                  </td>
                                  <td>
                                    <textarea id="eval_chklist10" name="eval_chklist10" rows="2" class="form-control" placeholder=""></textarea>
                                </td>
                              </tr>
                              <tr style="display:none">
                                <td><input type="checkbox" id="chk11" name="chk11" value="yes" class="checkbox-template"></td>
                                  <td>Expert Services</td>
                                  <td>
                                    <!--List Here-->
                                    <a id="btn_exrp_doc_link"  href="#" class="btn btn-sm btn-primary" target="_blank" style="width:100%"><i class="fa fa-eye"></i> View document</a>
                                  </td>
                                  <td>
                                    <textarea id="eval_chklist11" name="eval_chklist11" rows="2" class="form-control" placeholder=""></textarea>
                                </td>
                              </tr>
                              <tr style="display:none">
                                <td><input type="checkbox" id="chk12" name="chk12" value="yes" class="checkbox-template"></td>
                                  <td>Committees/TWGs participation</td>
                                  <td>
                                    <!--List Here-->
                                    <a id="btn_ctwg_doc_link"  href="#" class="btn btn-sm btn-primary" target="_blank" style="width:100%"><i class="fa fa-eye"></i> View document</a>
                                  </td>
                                  <td>
                                    <textarea id="eval_chklist12" name="eval_chklist12" rows="2" class="form-control" placeholder=""></textarea>
                                </td>
                              </tr>
                              <tr>
                                <td><input type="checkbox" id="chk13" name="chk13" value="yes" class="checkbox-template"></td>
                                  <td>National Certificate (NC) unexpired</td>
                                  <td>
                                    <!--List Here-->
                                    <a id="btn_nc_doc_link"  href="#" class="btn btn-sm btn-primary" target="_blank" style="width:100%"><i class="fa fa-eye"></i> View document</a>
                                  </td>
                                  <td>
                                    <textarea id="eval_chklist13" name="eval_chklist13" rows="2" class="form-control" placeholder=""></textarea>
                                </td>
                              </tr>
                              <tr>
                                <td><input type="checkbox" id="chk14" name="chk14" value="yes" class="checkbox-template"></td>
                                  <td>National TVET Trainer Certificate (NTTC) unexpired</td>
                                  <td>
                                    <!--List Here-->
                                    <a id="btn_nttc_doc_link"  href="#" class="btn btn-sm btn-primary" target="_blank" style="width:100%"><i class="fa fa-eye"></i> View document</a>
                                  </td>
                                  <td>
                                    <textarea id="eval_chklist14" name="eval_chklist14" rows="2" class="form-control" placeholder=""></textarea>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <!--First Row-->
                    </div><!--Card-->
                  </div>
                </div>
              </div>
<!-- Application Checklist -->
                      
<!--Result of Evaluation-->
                      <div class="card-body has-shadow"><!--Card-->
                        <!--First Row-->
                        <div class="row form-group">
                          <div class="col col-md-5">
                            <label for="cbwe_check" class=" form-control-label">For CBWE/ BEI</label>
                          </div>
                          <div class="col col-md-1">
                            <input type="checkbox" id="chk15" name="chk15" value="yes" class="checkbox-template">
                          </div>
                          <div class="col col-md-5">
                            <label for="lacking_check" class=" form-control-label">Failed to submit nescessary document/s</label>
                          </div>
                          <div class="col col-md-1">
                            <input type="checkbox" id="chk16" name="chk16" value="yes" class="checkbox-template">
                          </div>
                        </div>
                        <!--First Row-->

                        <!--Second Row-->
                        <div class="row form-group">
                          <div class="col col-md-5">
                            <label for="teaching_check" class=" form-control-label">For Teaching Demonstration</label>
                          </div>
                          <div class="col col-md-1">
                            <input type="checkbox" id="chk17" name="chk17" value="yes" class="checkbox-template">
                          </div>
                          <div class="col col-md-5">
                            <label for="didnot_check" class=" form-control-label">Did not meet CSC minimum QS</label>
                          </div>
                          <div class="col col-md-1">
                            <input type="checkbox" id="chk18" name="chk18" value="yes" class="checkbox-template">
                          </div>
                        </div>

                        <div class="row form-group">
                          <div id="chk18_div" class="col col-md-12">
                            <label class=" form-control-label"><strong>Remarks for Qualification Standard</strong></label>
                            <textarea id="eval_remarks" name="eval_remarks" rows="2" class="form-control" placeholder="Note: Please separate with semicolon(;)"></textarea>
                          </div>
                          <div id="chk16_div" class="col col-md-12">
                            <label class=" form-control-label"><strong>Remarks for Documentary Requirements</strong></label>
                            <textarea id="eval_remarks1" name="eval_remarks1" rows="2" class="form-control" placeholder="Note: Please separate with semicolon(;)"></textarea>
                          </div>
                        </div>

                        <a id="appannexj" href="#" target="_blank" class="btn btn-primary" style="display:none"><i class="fa fa-print" aria-hidden="true"></i>Annex J</a>
                        <a id="appannexj2" href="#" target="_blank" class="btn btn-primary" style="display:none"><i class="fa fa-print" aria-hidden="true"></i>Annex J2</a>

                        <!--Second Row-->

                        <div class="row form-group" >
                          <div id="message_eval" class="col col-md-12">
                          </div>
                        </div>

                      </div><!--Card-->
<!--Result of Evaluation-->

            </div><!-- Modal Body-->
                          
            <div class="modal-footer">
              <div class="btn-group">
                <button id="save_plantilla" type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Submit</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-window-close" aria-hidden="true"></i> Close</button>	
              </div>

              <div id="loading_plantilla" class="spinner-grow text-primary" style="display: none;" role="status">
                <span class="sr-only">Loading... </span>
              </div>	
            </div>

            </form>						
          </div>
          </div>
      </div>
<!-- End Modal -->

<!--MODAL Send Link-->
    <form>
      <div id="send_invitation" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog" role="document"> 
          <div class="modal-content">
              <div class="modal-header">
              <h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-exclamation-triangle"></i> Warning</h3>
              </div>
              <div class="modal-body">
                <div id="notify_message_link">
                  <center><strong>Are you sure you want to <span style="color:red">SEND</span> the application link to this applicant?</strong></center>
                </div>
                <div id="notify_message_link_sending" style="display: none;" role="status">
                  <center>
                    <span class="spinner-border spinner-border-lg" style="width: 4rem; height: 4rem;" role="status" aria-hidden="true"></span>
                      <span class="sr-only" style="color:#000">Sending...</span>
                    <br><br>
                    <h4><b>Sending the application link to this applicant</b>, please wait.</h4>
                  </center>	
                </div>	

              </div>
              <div class="modal-footer">
                <input type="text" id="app_hash" name="app_hash"  class="form-control">
             
                <div class="btn-group">
                    <button id="btn_send_link_yes" type="button" class="btn btn-danger">Yes</button>
                    <button id="btn_send_link_no" type="button" class="btn btn-secondary" data-dismiss="modal">No</button>	
                </div>
              </div>
          </div>
          </div>
      </div>
    </form>
<!--END MODAL Send Link-->    

<!--MODAL Notify Disqualified-->
    <form>
      <div id="disqualified_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog" role="document"> 
          <div class="modal-content">
              <div class="modal-header">
              <h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-exclamation-triangle"></i> Warning</h3>
              </div>
              <div class="modal-body">
                <div id="notify_message_disqualified">
                  <center><strong>Are you sure you want to <span style="color:red">NOTIFY</span> those unqualified applicants?</strong></center>
                </div>
                <div id="notify_message_disqualified_sending" style="display: none;" role="status">
                  <center>
                    <span class="spinner-border spinner-border-lg" style="width: 4rem; height: 4rem;" role="status" aria-hidden="true"></span>
                      <span class="sr-only" style="color:#000">Sending...</span>
                    <br><br>
                    <h4><b>Sending notification to unqualified applicants</b>, please wait.</h4>
                  </center>	
                </div>	

              </div>
              <div class="modal-footer">
                <input type="hidden" id="pos_id_disqualified" name="pos_id_disqualified" value="<?= $vac_id ?>" class="form-control">
             
                <div class="btn-group">
                    <button id="btn_notify_disqualified" type="button" class="btn btn-danger">Yes</button>
                    <button id="btn_notify_disqualified_no" type="button" class="btn btn-secondary" data-dismiss="modal">No</button>	
                </div>
              </div>
          </div>
          </div>
      </div>
    </form>
<!--END MODAL Notify Disqualified-->    

<!--MODAL Notify Qualified-->
    <form>
      <div id="qualified_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog" role="document"> 
          <div class="modal-content">
              <div class="modal-header">
              <h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-exclamation-triangle"></i> Warning</h3>
              </div>
              <div class="modal-body">
                <div id="notify_message_qualified">
                    
                    <center><h3>Competency Based Written Examination</h3></center>
                    <hr>
                    <div class="row form-group">
                      <div class="col-sm-4">
                        <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-adjust"></i><b> Madality</b></label>
                      </div>
                      <div class="col-sm-8">
                        <input class="checkbox-template" id="chkf2f" type="radio" value="f2f" name="cbwe_mode">&nbsp&nbsp Face-to-Face &nbsp&nbsp&nbsp&nbsp&nbsp
                        <input class="checkbox-template" id="chkonline" type="radio" value="online" name="cbwe_mode">&nbsp&nbsp Online
                      </div>
                    </div>

                    <div id="cbwe_place_div" class="row form-group">
                      <div class="col-sm-4">
                        <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-map"></i><b> Place</b></label>
                      </div>
                      <div class="col-sm-8">
                        <select id="cbwe_place" name="cbwe_place" class="form-control">
                          <option value="Regional Office, Tuguegarao City, Cagayan">Regional Office</option>
                          <option value="Batanes Provincial Office, Basco, Batanes">Batanes Provincial Office</option>     
                          <option value="Cagayan Provincial Office, Tuguegarao City, Cagayan ">Cagayan Provincial Office</option>  
                          <option value="Isabela Provincial Office, Ilagan City, Isabela">Isabela Provincial Office</option> 
                          <option value="Nueva Vizcaya Provincial Office, Bayombong, Nueva Vizcaya">Nueva Vizcaya Provincial Office</option> 
                          <option value="Quirino Provincial Office, Cabbaroguis, Quirino">Quirino Provincial Office</option>   
                        </select>
                      </div>
                    </div>

                    <div id="cbwe_online_div" class="row form-group">
                      <div class="col-sm-4">
                        <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-external-link-square"></i><b> Link</b></label>
                      </div>
                      <div class="col-sm-8">
                        <input id="cbwe_link" type="text" class="form-control" name="cbwe_link">
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-sm-4">
                        <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-clock-o"></i><b> Date & Time</b></label>
                      </div>
                      <div class="col-sm-8">
                        <input id="cbwe_dt" type="datetime-local" class="form-control" name="cbwe_dt">
                      </div>
                    </div>
                  <br>
                  <hr>
                  <center><strong>Are you sure you want to <span style="color:red">NOTIFY</span> those qualified applicants?</strong></center>
                
                </div>
                <div id="notify_message_qualified_sending" style="display: none;" role="status">
                  <center>
                    <span class="spinner-border spinner-border-lg" style="width: 4rem; height: 4rem;" role="status" aria-hidden="true"></span>
                      <span class="sr-only" style="color:#000">Sending...</span>
                    <br><br>
                    <h4><b>Sending notification to qualified applicants</b>, please wait.</h4>
                  </center>	
                </div>	

              </div>
              <div class="modal-footer">
                <input type="hidden" id="pos_id_qualified" name="pos_id_qualified" value="<?= $vac_id ?>" class="form-control">
             
                <div class="btn-group">
                    <button id="btn_notify_qualified" type="button" class="btn btn-danger">Yes</button>
                    <button id="btn_notify_qualified_no" type="button" class="btn btn-secondary" data-dismiss="modal">No</button>	
                </div>
              </div>
          </div>
          </div>
      </div>
    </form>
<!--END MODAL Notify Qualified-->   

      <script type="text/javascript">
          $(document).ready(function(){
            
              show_applicants(); //call function show all applicants
            
//-------------------function show all work experience
              function show_applicants(){
                  $.ajax({
                      type  : 'GET',
                      url   : '<?php echo base_url().'get_applicants/'.$vac_id?>',
                      async : true,
                      dataType : 'json',
                      success : function(data){
                          var html = '';
                          var i;
                          var x=1;
                          for(i=0; i<data.length; i++){ 

                            //----------------Experience------------
                            //relevant experience    
                            var relevant_experience = '';  
                            if(data[i].app_relevant_experience == null){
                                relevant_experience = '';
                            }else{
                              var arr = data[i].app_relevant_experience.split(';');
                              $.each(arr, function( index, value ) {
                                if(value == null){  
                                }else{
                                  relevant_experience += '<small>'+value.toUpperCase()+'</small>';
                                }
                              });
                            }
                             

                            //relevant years 
                            var total_relevant_years = 0;
                            var total_relevant_years1 = '';   

                            if(data[i].app_relevant_years == null){
                              total_relevant_years = 0;
                            }else{
                              var arr = data[i].app_relevant_years.split(';');
                              $.each(arr, function( index, value ) {
                                if(value == null){  
                                }else{
                                  total_relevant_years = (+total_relevant_years) + (+value);
                                }
                              }); 
                            }
                            var relevant_years = 'Total: <b>'+total_relevant_years+'</b>';
                             //----------------Experience------------

                            //----------------Training------------
                            //relevant experTrainingience    
                            var training = '';  
                            if(data[i].app_training == null){
                              training = '';
                            } else{
                              var arr = data[i].app_training.split(';');
                              $.each(arr, function( index, value ) {
                                if(value == null){  
                                }else{
                                  training += '<small>'+value.toUpperCase()+'</small>';
                                }
                              }); 
                            }
                           
                            //relevant hours 
                            var total_training_hours = 0;
                            var total_training_hours1 = '';   
                            if(data[i].app_training_hours == null){
                              total_training_hours = 0;
                            } else{
                              var arr = data[i].app_training_hours.split(';');
                              $.each(arr, function( index, value ) {
                                if(value == null){  
                                }else{
                                  total_training_hours = (+total_training_hours) + (+value);
                                  //total_training_hours1 += '<span class="badge" style="background-color:#00695C; color:white">'+value+'</span>';
                                }
                              }); 
                            }
                            var total_training_hours2 = 'Total: <b>'+total_training_hours+'</b>';
                             //----------------Training------------

                             //----------------Eligibility------------
                            //relevant experTrainingience    
                            var eligibility = ''; 
                            if(data[i].app_eligibility == null){
                              eligibility = '';
                            }else{
                              var arr = data[i].app_eligibility.split(';');
                              $.each(arr, function( index, value ) {
                                if(value == null){  
                                }else if(value == 'cese'){
                                  eligibility += '<small><b>'+index+'.</b> CAREER EXECUTIVE SERVICE ELIGIBILITY &#13;</small>';
                                }else if(value == 'csp'){
                                  eligibility += '<small><b>'+index+'.</b> CAREER SERVICE PROFESSIONAL ELIGIBILITY &#13;</small>';
                                }else if(value == 'cssp'){
                                  eligibility += '<small><b>'+index+'.</b> CAREER SERVICE SUB PROFESSIONAL ELIGIBILITY &#13;</small>';
                                }else if(value == 'ra1080'){
                                  eligibility += '<small><b>'+index+'.</b> R.A. 1080 &#13;</small>';
                                }else if(value == 'pd907'){
                                  eligibility += '<small><b>'+index+'.</b> PD 907 &#13;</small>';
                                }else if(value == 'mc11'){
                                  eligibility += '<small><b>'+index+'.</b> MC 11 SERIES OF 1996 &#13;</small>';
                                }else{
                                  eligibility += '<small>'+value.toUpperCase()+'&#13;</small>';
                                }
                              });
                            }  
                             //----------------Eligibility------------

                            //---------------Present Work------------
                             if(data[i].app_present_position == null || data[i].app_present_position == ' '){
                              var present_position = 'N/A';
                             }else{
                              var present_position = data[i].app_present_position.toUpperCase();
                             }

                             if(data[i].app_present_office == null || data[i].app_present_office == ' '){
                              var present_office = 'N/A';
                             }else{
                              var present_office = data[i].app_present_office.toUpperCase();
                             }
                            //---------------Present Work------------
                            //Result
                            if(data[i].app_result == null || data[i].app_result == ''){
                              var app_result = '<span class="badge badge-round bg-primary">For evaluation</span>';
                            }

                            if(data[i].app_result == 'Qualified'){
                              var app_result = '<span class="badge badge-round bg-green">Qualified</span>';
                            }

                            if(data[i].app_result == 'Conditionally Qualified'){
                              var app_result = '<span class="badge badge-round bg-warning">Conditionally Qualified</span>';
                            }

                            if(data[i].app_result == 'Disqualified'){
                              var app_result = '<span class="badge badge-round bg-red">Disualified</span>';
                            }
                            //Result

                            //---------------Reevaluation------------
                            if(data[i].app_reevaluation == null || data[i].app_reevaluation == ''){
                              var app_reevaluation = '';
                            }else{
                              var app_reevaluation = '<span class="badge badge-round bg-red">For Reevaluation</span>';
                            }
                            //---------------Reevaluation------------
                              html += '<tr>'+
                                          '<td>'+x+'</td>'+
                                          '<td>'+data[i].app_lastname.toUpperCase()+', '+data[i].app_firstname.toUpperCase()+' '+data[i].app_middlename.toUpperCase()+'<br><b>'+ app_result + ' '+ app_reevaluation +'</b></td>'+
                                          '<td>'+data[i].app_gender.toUpperCase()+'</td>'+
                                          '<td>'+ moment(data[i].app_birthdate).format('MM/DD/YYYY')+'</td>'+
                                          '<td>'+data[i].app_age+'</td>'+
                                          '<td>'+data[i].app_address.toUpperCase()+'</td>'+
                                          '<td>'+data[i].app_contacts+'</td>'+
                                          '<td>'+present_position+'</td>'+
                                          '<td>'+present_office+'</td>'+
                                          '<td>'+eligibility+'</td>'+
                                          '<td>'+data[i].app_course+'</td>'+
                                          '<td>'+relevant_experience+'</td>'+
                                          '<td>'+total_relevant_years1 + relevant_years+'</td>'+
                                          '<td>'+training+'</td>'+
                                          '<td>'+total_training_hours1 + total_training_hours2+'</td>'+
                                          '<td>'+
                                          '<button data-toggle="dropdown" type="button" class="btn btn-outline-primary dropdown-toggle btn-sm"><i class="fa fa-tasks"></i> Actions </button>'+
                                            '<div class="dropdown-menu">'+
                                              '<a data-toggle="modal" href="#evaluate" class="dropdown-item item_evaluation" data-app_id="'+data[i].app_id+'" data-pos_eligibility="'+data[i].pos_eligibility+'"'+
                                               'data-pos_education="'+data[i].pos_education+'" data-pos_experience="'+data[i].pos_experience+'" data-pos_training="'+data[i].pos_training+'"'+
                                               'data-app_eligibility="'+data[i].app_eligibility+'" data-app_course="'+data[i].app_course+'"'+
                                               'data-app_relevant_years="'+data[i].app_relevant_years+'" data-app_training_hours="'+data[i].app_training_hours+'" data-app_lastname="'+data[i].app_lastname+'"'+
                                               'data-app_firstname="'+data[i].app_firstname+'" data-app_middlename="'+data[i].app_middlename+'"'+
                                               'data-app_age="'+data[i].app_age+'" data-app_gender="'+data[i].app_gender+'"'+
                                               'data-ous_desc="'+data[i].ous_desc+'" data-pos_desc="'+data[i].pos_desc+'"'+
                                               'data-app_present_position="'+data[i].app_present_position+'" data-app_present_office="'+data[i].app_present_office+'" data-app_performance="'+data[i].app_performance+'"'+
                                               'data-app_performance_international="'+data[i].app_performance_international+'" data-app_performance_national="'+data[i].app_performance_national+'"'+
                                               'data-app_performance_regional="'+data[i].app_performance_regional+'" data-app_performance_provincial="'+data[i].app_performance_provincial+'"'+
                                               'data-app_expert_international="'+data[i].app_expert_international+'" data-app_expertise_national="'+data[i].app_expertise_national+'"'+
                                               'data-app_expertise_regional="'+data[i].app_expertise_regional+'" data-app_expertise_provincial="'+data[i].app_expertise_provincial+'"'+
                                               'data-app_service="'+data[i].app_service+'" data-app_committee_chair="'+data[i].app_committee_chair+'" data-app_committee_vchair="'+data[i].app_committee_vchair+'"'+
                                               'data-app_committee_member="'+data[i].app_committee_member+'" data-app_committee_sec="'+data[i].app_committee_sec+'" data-app_committee="'+data[i].app_committee+'"'+
                                               'data-app_eligibility_doc="'+data[i].app_eligibility_doc+'" data-app_educational_doc="'+data[i].app_educational_doc+'" data-app_coe_doc="'+data[i].app_coe_doc+'"'+
                                               'data-app_training_doc="'+data[i].app_training_doc+'" data-app_ipcr_doc="'+data[i].app_ipcr+'"'+
                                               'data-btn_pdswes_doc="'+data[i].app_pds+'" data-btn_wes_doc="'+data[i].app_wes+'"'+
                                               'data-btn_service_reccord_doc="'+data[i].app_sr+'" data-btn_appointment_doc="'+data[i].app_appointment+'" '+
                                               'data-btn_nc_doc="'+data[i].app_nc_doc+'" data-btn_nttc_doc="'+data[i].app_nttc_doc+'" data-app_intent="'+data[i].app_intent+'" data-is_backup="'+data[i].is_backup+'" data-app_timestamp="'+ data[i].app_timestamp +'" data-app_hash="'+data[i].app_hash1+'"'+
                                               'data-eval_eligibility ="'+data[i].eval_eligibility+'" data-eval_education="'+data[i].eval_education+'"'+
                                               'data-eval_experience ="'+data[i].eval_experience+'" data-eval_performance="'+data[i].eval_performance+'"'+
                                               'data-eval_training ="'+data[i].eval_training+'" data-eval_arp_international	="'+data[i].eval_arp_international	+'"'+
                                               'data-eval_arp_national ="'+data[i].eval_arp_national+'" data-eval_arp_regional	="'+data[i].eval_arp_regional	+'"'+
                                               'data-eval_arp_provincial ="'+data[i].eval_arp_provincial+'" data-eval_result	="'+data[i].eval_result	+'"'+
                                               'data-eval_chklist1 ="'+data[i].eval_chklist1+'" data-eval_chklist2	="'+data[i].eval_chklist2	+'"'+
                                               'data-eval_chklist3 ="'+data[i].eval_chklist3+'" data-eval_chklist4	="'+data[i].eval_chklist4	+'"'+
                                               'data-eval_chklist5 ="'+data[i].eval_chklist5+'" data-eval_chklist6="'+data[i].eval_chklist6	+'"'+
                                               'data-eval_chklist8 ="'+data[i].eval_chklist8+'" data-eval_chklist9="'+data[i].eval_chklist9	+'"'+
                                               'data-eval_chklist10 ="'+data[i].eval_chklist10+'" data-eval_chklist13="'+data[i].eval_chklist13	+'"'+
                                               'data-eval_chklist14 ="'+data[i].eval_chklist14+'" data-eval_remarks="'+data[i].eval_remarks	+'"'+
                                               'data-eval_remarks1 ="'+data[i].eval_remarks1+'" data-eval_chklist ="'+data[i].eval_chklist+'"'+
                                               '>'+
                                               '<i class="fa fa-check"> </i> Evaluate</a>'+
                                               '<a data-toggle="modal" href="#send_invitation" class="dropdown-item item_invitation" data-app_hash="'+data[i].app_hash1+'"'+ 
                                               '>'+
                                               '<i class="fa fa-paper-plane"> </i> Send Invitation</a>'+
                                            '</div>'+
                                          '</td>'+
                                      '</tr>';
                                      x=x+1;
                          }
                          $('#applicants_table_body').html(html);
                          $('#applicants_table').DataTable();
                          console.log(data);
                      }
                     
                  });
              }
            //Send Link
            $('#applicants_table_body').on('click', '.item_invitation', function () {

                var app_hash = $(this).data('app_hash');

                // Put app_hash in hidden input
                $('#app_hash').val(app_hash);

                // Reset modal display
                $('#notify_message_link').show();
                $('#notify_message_link_sending').hide();

                // Enable buttons
                $('#btn_send_link_yes').prop('disabled', false);
                $('#btn_send_link_no').prop('disabled', false);

            });

            //get data for standard qualification
            $('#applicants_table_body').on('click','.item_evaluation',function(){
                var pos_eligibility = $(this).data('pos_eligibility');
                var pos_education = $(this).data('pos_education');
                var pos_experience = $(this).data('pos_experience');
                var pos_training = $(this).data('pos_training');
                var app_course = $(this).data('app_course');

                //Annexes 
                var app_id = $(this).data('app_id');
                var appannexj = '<?php echo base_url()?>r2_annex_j/' + app_id;
                var appannexj2 = '<?php echo base_url()?>r2_annex_j2/' + app_id;
                $("#appannexj").prop("href", appannexj);
                $("#appannexj2").prop("href", appannexj2);
                $('#app_id_eval').val(app_id);
                //Annexes

                //Evaluation Result
                var eval_result = $(this).data('eval_result');
                $('input[name="eval_result"][value="' + eval_result + '"]').prop('checked', true);

                var eval_eligibility = $(this).data('eval_eligibility');
                $('input[name="eval_eligibility"][value="' + eval_eligibility + '"]').prop('checked', true);

                var eval_education = $(this).data('eval_education');
                $('input[name="eval_education"][value="' + eval_education + '"]').prop('checked', true);

                var eval_experience = $(this).data('eval_experience');
                $('input[name="eval_experience"][value="' + eval_experience + '"]').prop('checked', true);

                var eval_performance = $(this).data('eval_performance');
                $('input[name="eval_performance"][value="' + eval_performance + '"]').prop('checked', true);

                var eval_training = $(this).data('eval_training');
                $('input[name="eval_training"][value="' + eval_training + '"]').prop('checked', true);

                var eval_arp_international = $(this).data('eval_arp_international');
                $('#eval_arp_international').val(eval_arp_international);

                var eval_arp_national = $(this).data('eval_arp_national');
                $('#eval_arp_national').val(eval_arp_national);

                var eval_arp_regional = $(this).data('eval_arp_regional');
                $('#eval_arp_regional').val(eval_arp_regional);

                var eval_arp_provincial = $(this).data('eval_arp_provincial');
                $('#eval_arp_provincial').val(eval_arp_provincial);

                var eval_chklist = $(this).data('eval_chklist');
                $('#eval_chklist').val(eval_chklist);

                var eval_chklist1 = $(this).data('eval_chklist1');
                $('#eval_chklist1').val(eval_chklist1);

                var eval_chklist2 = $(this).data('eval_chklist2');
                $('#eval_chklist2').val(eval_chklist2);

                var eval_chklist3 = $(this).data('eval_chklist3');
                $('#eval_chklist3').val(eval_chklist3);

                var eval_chklist4 = $(this).data('eval_chklist4');
                $('#eval_chklist4').val(eval_chklist4);

                var eval_chklist5 = $(this).data('eval_chklist5');
                $('#eval_chklist5').val(eval_chklist5);

                var eval_chklist6 = $(this).data('eval_chklist6');
                $('#eval_chklist6').val(eval_chklist6);

                var eval_chklist8 = $(this).data('eval_chklist8');
                $('#eval_chklist8').val(eval_chklist8);

                var eval_chklist9 = $(this).data('eval_chklist9');
                $('#eval_chklist9').val(eval_chklist9);

                var eval_chklist10 = $(this).data('eval_chklist10');
                $('#eval_chklist10').val(eval_chklist10);

                var eval_chklist13 = $(this).data('eval_chklist13');
                $('#eval_chklist13').val(eval_chklist13);

                var eval_chklist14 = $(this).data('eval_chklist14');
                $('#eval_chklist14').val(eval_chklist14);

                var eval_remarks = $(this).data('eval_remarks');
                var eval_remarks1 = $(this).data('eval_remarks1');

                if (eval_remarks1 !== null && eval_remarks1 !== '') {
                    $('input[name="chk16"]').prop('checked', true);
                    $("#chk16_div").show();
                    $('#eval_remarks1').val(eval_remarks1);
                }

                if (eval_remarks !== null && eval_remarks !== '') {
                    $('input[name="chk18"]').prop('checked', true);
                    $("#chk18_div").show();
                    $('#eval_remarks').val(eval_remarks);
                }
                



                //------Applicant Documents--------
                var is_backup = $(this).data('is_backup');
                var app_hash = $(this).data('app_hash');
                if(is_backup != null){
                  var app_letter = $(this).data('app_intent');
                  var app_letter_link = '<?php echo 'https://rms.tesdar02onlinereporting.ph/applicants_docs/pdfviewer/web/viewer.php?file=https://rms.tesdar02onlinereporting.ph/applicants_docs/'?>' + is_backup + '/' + app_letter;
                  $("#app_letter_link").attr("href", app_letter_link).attr("target", "_blank");
                  $("#btn_app_letter_link").attr("href", app_letter_link).attr("target", "_blank");

                  var app_coe_doc = $(this).data('app_coe_doc');
                  var app_coe_doc_link = '<?php echo 'https://rms.tesdar02onlinereporting.ph/applicants_docs/pdfviewer/web/viewer.php?file=https://rms.tesdar02onlinereporting.ph/applicants_docs/'?>' + is_backup + '/' + app_coe_doc;
                  $("#app_coe_doc_link").attr("href", app_coe_doc_link).attr("target", "_blank");
                  $("#btn_coe_doc_link1").attr("href", app_coe_doc_link).attr("target", "_blank");
                  
                  var app_eligibility_doc = $(this).data('app_eligibility_doc');
                  var app_eligibility_doc_link = '<?php echo 'https://rms.tesdar02onlinereporting.ph/applicants_docs/pdfviewer/web/viewer.php?file=https://rms.tesdar02onlinereporting.ph/applicants_docs/'?>' + is_backup + '/' + app_eligibility_doc;
                  $("#app_eligibility_doc_link1").prop("href", app_eligibility_doc_link).attr("target", "_blank");
                  $("#btn_eligibility_doc_link1").prop("href", app_eligibility_doc_link).attr("target", "_blank");

                  var app_educational_doc = $(this).data('app_educational_doc');
                  var app_educational_doc_link = '<?php echo 'https://rms.tesdar02onlinereporting.ph/applicants_docs/pdfviewer/web/viewer.php?file=https://rms.tesdar02onlinereporting.ph/applicants_docs/'?>' + is_backup + '/' + app_educational_doc;
                  $("#app_educational_doc_link").prop("href", app_educational_doc_link).attr("target", "_blank");
                  $("#btn_tor_doc_link").prop("href", app_educational_doc_link).attr("target", "_blank");
                
                  var app_training_doc = $(this).data('app_training_doc');
                  var app_training_doc_link = '<?php echo 'https://rms.tesdar02onlinereporting.ph/applicants_docs/pdfviewer/web/viewer.php?file=https://rms.tesdar02onlinereporting.ph/applicants_docs/'?>' + is_backup + '/' + app_training_doc;
                  $("#app_training_doc_link").prop("href", app_training_doc_link).attr("target", "_blank");
                  $("#btn_training_doc_link").prop("href", app_training_doc_link).attr("target", "_blank");

                  var app_ipcr_doc = $(this).data('app_ipcr_doc');
                  var app_ipcr_doc_link = '<?php echo 'https://rms.tesdar02onlinereporting.ph/applicants_docs/pdfviewer/web/viewer.php?file=https://rms.tesdar02onlinereporting.ph/applicants_docs/'?>' + is_backup + '/' + app_ipcr_doc;
                  $("#app_ipcr_doc_link").prop("href", app_ipcr_doc_link).attr("target", "_blank");
                  $("#btn_ipcr_doc_link").prop("href", app_ipcr_doc_link).attr("target", "_blank");

                  var btn_pdswes_doc_link = $(this).data('btn_pdswes_doc');
                  var btn_pdswes_doc_link = '<?php echo 'https://rms.tesdar02onlinereporting.ph/applicants_docs/pdfviewer/web/viewer.php?file=https://rms.tesdar02onlinereporting.ph/applicants_docs/'?>' + is_backup + '/' + btn_pdswes_doc_link;
                  $("#btn_pdswes_doc_link").prop("href", btn_pdswes_doc_link).attr("target", "_blank");

                  var btn_wes_doc_link = $(this).data('btn_wes_doc');
                  var btn_wes_doc_link = '<?php echo 'https://rms.tesdar02onlinereporting.ph/applicants_docs/pdfviewer/web/viewer.php?file=https://rms.tesdar02onlinereporting.ph/applicants_docs/'?>' + is_backup + '/' + btn_wes_doc_link;
                  $("#btn_wes_doc_link").prop("href", btn_wes_doc_link).attr("target", "_blank");
                  $("#btn_wes_doc_link1").prop("href", btn_wes_doc_link).attr("target", "_blank");
                  
                  var btn_service_reccord_doc_link = $(this).data('btn_service_reccord_doc');
                  var btn_service_reccord_doc_link = '<?php 'https://rms.tesdar02onlinereporting.ph/applicants_docs/pdfviewer/web/viewer.php?file=https://rms.tesdar02onlinereporting.ph/applicants_docs/'?>' + is_backup + '/' + btn_service_reccord_doc_link;
                  $("#btn_service_reccord_doc_link").prop("href", btn_service_reccord_doc_link).attr("target", "_blank");

                  var btn_appointment_doc_link = $(this).data('btn_appointment_doc');
                  var btn_appointment_doc_link = '<?php echo 'https://rms.tesdar02onlinereporting.ph/applicants_docs/pdfviewer/web/viewer.php?file=https://rms.tesdar02onlinereporting.ph/applicants_docs/'?>' + is_backup + '/' + btn_appointment_doc_link;
                  $("#btn_appointment_doc_link").prop("href", btn_appointment_doc_link).attr("target", "_blank");

                  var btn_nc_doc_link = $(this).data('btn_nc_doc');
                  var btn_nc_doc_link = '<?php echo 'https://rms.tesdar02onlinereporting.ph/applicants_docs/pdfviewer/web/viewer.php?file=https://rms.tesdar02onlinereporting.ph/applicants_docs/'?>' + is_backup + '/' + btn_nc_doc_link;
                  $("#btn_nc_doc_link").prop("href", btn_nc_doc_link).attr("target", "_blank");

                  var btn_nttc_doc_link = $(this).data('btn_nttc_doc');
                  var btn_nttc_doc_link = '<?php echo 'https://rms.tesdar02onlinereporting.ph/applicants_docs/pdfviewer/web/viewer.php?file=https://rms.tesdar02onlinereporting.ph/applicants_docs/'?>' + is_backup + '/' + btn_nttc_doc_link;
                  $("#btn_nttc_doc_link").prop("href", btn_nttc_doc_link).attr("target", "_blank");

                }else{

                  var career_url = 'http://localhost/careers/';

                  // Normalize to a real Date object regardless of exact string format
                  var app_timestamp = $(this).data('app_timestamp');
                  var appDate = new Date(String(app_timestamp).replace(' ', 'T'));
                  var cutoffDate = new Date('2026-09-01T00:00:00');

                  var app_hash = $(this).data('app_hash');

                  // ================================
                  // LETTER OF INTENT
                  // ================================
                  var app_letter = $(this).data('app_letter');

                  if (appDate >= cutoffDate) {
                      var app_letter_link =
                          career_url +'view-document/intent/' + app_hash;
                  } else {
                      var app_letter_link =
                          '<?php echo base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/ApplicantDocx/'; ?>'
                          + app_letter;
                  }

                  $("#app_letter_link")
                      .attr("href", app_letter_link)
                      .attr("target", "_blank");

                  $("#btn_app_letter_link")
                      .attr("href", app_letter_link)
                      .attr("target", "_blank");

                      
                  // ================================
                  // CERTIFICATE OF EMPLOYMENT
                  // ================================
                  var app_coe_doc = $(this).data('app_coe_doc');

                  if (appDate >= cutoffDate) {
                      var app_coe_doc_link = career_url + 'view-document/coe/' + app_hash;
                  } else {
                      var app_coe_doc_link =
                          '<?php echo base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/ApplicantDocx/'; ?>'
                          + app_coe_doc;
                  }

                  $("#app_coe_doc_link").attr("href", app_coe_doc_link).attr("target", "_blank");
                  $("#btn_coe_doc_link1").attr("href", app_coe_doc_link).attr("target", "_blank");


                  // ================================
                  // ELIGIBILITY DOCUMENT
                  // ================================
                  var app_eligibility_doc = $(this).data('app_eligibility_doc');

                  if (appDate >= cutoffDate) {
                      var app_eligibility_doc_link =
                          career_url + 'view-document/eligibility/' + app_hash;
                  } else {
                      var app_eligibility_doc_link =
                          '<?php echo base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/ApplicantDocx/'; ?>'
                          + app_eligibility_doc;
                  }

                  $("#app_eligibility_doc_link1").attr("href", app_eligibility_doc_link).attr("target", "_blank");
                  $("#btn_eligibility_doc_link1").attr("href", app_eligibility_doc_link).attr("target", "_blank");


                  // ================================
                  // EDUCATIONAL DOCUMENT / TOR
                  // ================================
                  var app_educational_doc = $(this).data('app_educational_doc');

                  if (appDate >= cutoffDate) {
                      var app_educational_doc_link =
                          career_url + 'view-document/educational/' + app_hash;
                  } else {
                      var app_educational_doc_link =
                          '<?php echo base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/ApplicantDocx/'; ?>'
                          + app_educational_doc;
                  }

                  $("#app_educational_doc_link").attr("href", app_educational_doc_link).attr("target", "_blank");
                  $("#btn_tor_doc_link").attr("href", app_educational_doc_link).attr("target", "_blank");


                  // ================================
                  // TRAINING DOCUMENT
                  // ================================
                  var app_training_doc = $(this).data('app_training_doc');

                  if (appDate >= cutoffDate) {
                      var app_training_doc_link =
                          career_url + 'view-document/training/' + app_hash;
                  } else {
                      var app_training_doc_link =
                          '<?php echo base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/ApplicantDocx/'; ?>'
                          + app_training_doc;
                  }

                  $("#app_training_doc_link").attr("href", app_training_doc_link).attr("target", "_blank");
                  $("#btn_training_doc_link").attr("href", app_training_doc_link).attr("target", "_blank");


                  // ================================
                  // IPCR DOCUMENT
                  // ================================
                  var app_ipcr_doc = $(this).data('app_ipcr_doc');

                  if (appDate >= cutoffDate) {
                      var app_ipcr_doc_link =
                          career_url + 'view-document/ipcr/' + app_hash;
                  } else {
                      var app_ipcr_doc_link =
                          '<?php echo base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/ApplicantDocx/'; ?>'
                          + app_ipcr_doc;
                  }

                  $("#app_ipcr_doc_link").attr("href", app_ipcr_doc_link).attr("target", "_blank");
                  $("#btn_ipcr_doc_link").attr("href", app_ipcr_doc_link).attr("target", "_blank");


                  // ================================
                  // PDS / WES DOCUMENT
                  // ================================
                  var btn_pdswes_doc = $(this).data('btn_pdswes_doc');

                  if (appDate >= cutoffDate) {
                      var btn_pdswes_doc_link =
                          career_url + 'view-document/pds/' + app_hash;
                  } else {
                      var btn_pdswes_doc_link =
                          '<?php echo base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/ApplicantDocx/'; ?>'
                          + btn_pdswes_doc;
                  }

                  $("#btn_pdswes_doc_link").attr("href", btn_pdswes_doc_link).attr("target", "_blank");


                  // ================================
                  // WES DOCUMENT
                  // ================================
                  var btn_wes_doc = $(this).data('btn_wes_doc');

                  if (appDate >= cutoffDate) {
                      var btn_wes_doc_link =
                          career_url + 'view-document/wes/' + app_hash;
                  } else {
                      var btn_wes_doc_link =
                          '<?php echo base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/ApplicantDocx/'; ?>'
                          + btn_wes_doc;
                  }

                  $("#btn_wes_doc_link").attr("href", btn_wes_doc_link).attr("target", "_blank");
                  $("#btn_wes_doc_link1").attr("href", btn_wes_doc_link).attr("target", "_blank");


                  // ================================
                  // SERVICE RECORD
                  // ================================
                  var btn_service_reccord_doc = $(this).data('btn_service_reccord_doc');

                  if (appDate >= cutoffDate) {
                      var btn_service_reccord_doc_link =
                          career_url + 'view-document/sr/' + app_hash;
                  } else {
                      var btn_service_reccord_doc_link =
                          '<?php echo base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/ApplicantDocx/'; ?>'
                          + btn_service_reccord_doc;
                  }

                  $("#btn_service_reccord_doc_link")
                      .attr("href", btn_service_reccord_doc_link)
                      .attr("target", "_blank");


                  // ================================
                  // APPOINTMENT DOCUMENT
                  // ================================
                  var btn_appointment_doc = $(this).data('btn_appointment_doc');

                  if (appDate >= cutoffDate) {
                      var btn_appointment_doc_link =
                          career_url + 'view-document/cpa/' + app_hash;
                  } else {
                      var btn_appointment_doc_link =
                          '<?php echo base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/ApplicantDocx/'; ?>'
                          + btn_appointment_doc;
                  }

                  $("#btn_appointment_doc_link")
                      .attr("href", btn_appointment_doc_link)
                      .attr("target", "_blank");


                  // ================================
                  // NATIONAL CERTIFICATE
                  // ================================
                  var btn_nc_doc = $(this).data('btn_nc_doc');

                  if (appDate >= cutoffDate) {
                      var btn_nc_doc_link =
                          career_url + 'view-document/nc/' + app_hash;
                  } else {
                      var btn_nc_doc_link =
                          '<?php echo base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/ApplicantDocx/'; ?>'
                          + btn_nc_doc;
                  }

                  $("#btn_nc_doc_link")
                      .attr("href", btn_nc_doc_link)
                      .attr("target", "_blank");

                  // ================================
                  // ARP / PERFORMANCE DOCUMENT
                  // ================================
                  var app_performance = $(this).data('app_performance');

                  if (appDate >= cutoffDate) {
                      var app_performance_link =
                          career_url + 'view-document/awards/' + app_hash;
                  } else {
                      var app_performance_link =
                          '<?php echo base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/ApplicantDocx/'; ?>'
                          + app_performance;
                  }

                  $("#btn_arp_doc_link")
                      .attr("href", app_performance_link)
                      .attr("target", "_blank");

                  $("#btn_app_arp_international")
                      .attr("href", app_performance_link)
                      .attr("target", "_blank");


                  // ================================
                  // NTTC DOCUMENT
                  // ================================
                  var btn_nttc_doc = $(this).data('btn_nttc_doc');

                  if (appDate >= cutoffDate) {
                      var btn_nttc_doc_link =
                          career_url + 'view-document/nttc/' + app_hash;
                  } else {
                      var btn_nttc_doc_link =
                          '<?php echo base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/ApplicantDocx/'; ?>'
                          + btn_nttc_doc;
                  }

                  $("#btn_nttc_doc_link")
                      .attr("href", btn_nttc_doc_link)
                      .attr("target", "_blank");
                                  }

                //------Applicant Documents--------

                //----------------Eligibility------------
                //relevant experTrainingience    
                var app_eligibility = '';   
                var arr = $(this).data('app_eligibility').split(';');
                $.each(arr, function( index, value ) {
                  if(value == null){  
                    app_eligibility += 'Career Executive Service Eligibility | ';
                  }else if(value == 'csp'){
                    app_eligibility += 'Career Service Professional Eligibility | ';
                  }else if(value == 'cssp'){
                    app_eligibility += 'Career Service Sub Professional Eligibility | ';
                  }else if(value == 'ra1080'){
                    app_eligibility += 'R.A. 1080 | ';
                  }else if(value == 'pd907'){
                    app_eligibility += 'PD 907 | ';
                  }else if(value == 'mc11'){
                    app_eligibility += 'MC 11 SERIES OF 1996 | ';
                  }else{
                    app_eligibility += value.toUpperCase();
                  }
                }); 
                //----------------Eligibility------------

                //----------------Experience------------
                var total_relevant_years = 0;  
                var arr = $(this).data('app_relevant_years').split(';');
                $.each(arr, function( index, value ) {
                  if(value == null){  
                  }else{
                    total_relevant_years = (+total_relevant_years) + (+value);
                  }
                }); 
                //----------------Experience------------

                //relevant hours 
                var total_training_hours = 0;
                var arr = $(this).data('app_training_hours').split(';');
                $.each(arr, function( index, value ) {
                  if(value == null){  
                  }else{
                    total_training_hours = (+total_training_hours) + (+value);  
                  }
                }); 
             
                $('#pos_eligibility').text(pos_eligibility);
                $('#pos_education').text(pos_education);
                $('#pos_experience').text(pos_experience);
                $('#app_eligibility').text(app_eligibility);
                $('#pos_training').text(pos_training);
                $('#app_course').text(app_course);
                $('#app_relevant_years').text(total_relevant_years +' year/s');
                $('#app_relevant_hours').text(total_training_hours +' hour/s');

                //applicant information
                var app_lastname = $(this).data('app_lastname');
                var app_firstname = $(this).data('app_firstname');
                var app_middlename = $(this).data('app_middlename');
                var app_age = $(this).data('app_age');
                var ous_desc = $(this).data('ous_desc');
                var pos_desc = $(this).data('pos_desc');
                var app_present_position = $(this).data('app_present_position');
                var app_present_office = $(this).data('app_present_office');
               
                if ($(this).data('app_gender') == 'male'){
                  var app_gender = 'Male';
                }else{{
                  var app_gender = 'Female';
                }};

                $('#fullname').val(app_lastname+', '+app_firstname+' '+app_middlename);
                $('#age').val(app_age);
                $('#sex').val(app_gender);
                $('#ous_desc').val(ous_desc);
                $('#pos_desc').val(pos_desc);
                $('#present_position').val(app_present_position);
                $('#present_office').val(app_present_office);
                
              
                //Peformance
                var app_arp_international = $(this).data('app_performance_international');
                var app_arp_national = $(this).data('app_performance_national');
                var app_arp_regional = $(this).data('app_performance_regional');
                var app_arp_provincial = $(this).data('app_performance_provincial');
                var app_performance = $(this).data('app_performance');
                $('#app_arp_international').text(app_arp_international);
                $('#app_arp_national').text(app_arp_national);
                $('#app_arp_regional').text(app_arp_regional);
                $('#app_arp_provincial').text(app_arp_provincial);

                //check if null
                if (app_performance == null){
                  var app_performance_link = '<?php echo base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/ApplicantDocx/null'?>';
                }else{
                  var app_performance_link = '<?php echo base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/ApplicantDocx/'?>' + app_performance;
                }
                if(app_arp_international == "N/A" && app_arp_national == "N/A" && app_arp_regional == "N/A" && app_arp_provincial == "N/A"){
                  $('#btn_app_arp_international').addClass("disabled", true);
                }else{
                  $("#btn_app_arp_international").prop("href", app_performance_link)
                  $('#btn_app_arp_international').removeclass("disabled");
                }
                $("#btn_arp_doc_link").prop("href", app_performance_link)
                //Peformance

                //Expert
                var app_expert_international = $(this).data('app_expert_international');
                var app_expertise_national = $(this).data('app_expertise_national');
                var app_expertise_regional = $(this).data('app_expertise_regional');
                var app_expertise_provincial = $(this).data('app_expertise_provincial');
                var app_service = $(this).data('app_service');
                $('#app_expert_international_p').text(app_expert_international);
                $('#app_expertise_national_p').text(app_expertise_national);
                $('#app_expertise_regional_p').text(app_expertise_regional);
                $('#app_expertise_provincial_p').text(app_expertise_provincial);

                //check if null
                if (app_service == null){
                  var app_service_limk = '<?php echo base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/ApplicantDocx/null'?>';
                }else{
                  var app_service_limk = '<?php echo base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/ApplicantDocx/'?>' + app_service;
                }
                if(app_expert_international == "N/A" && app_expertise_national == "N/A" && app_expertise_regional == "N/A" && app_expertise_provincial == "N/A"){
                  $('#btn_app_expert_international').addClass("disabled", true);
                }else{
                  $("#btn_app_expert_international").prop("href", app_service_limk)
                  $('#btn_app_expert_international').removeclass("disabled");
                }
                $("#btn_exrp_doc_link").prop("href", app_service_limk)
                //Expert

                //Committee
                var app_committee_chair = $(this).data('app_committee_chair');
                var app_committee_vchair = $(this).data('app_committee_vchair');
                var app_committee_member = $(this).data('app_committee_member');
                var app_committee_sec = $(this).data('app_committee_sec');
                var app_committee = $(this).data('app_committee');
                $('#app_committee_chair_p').text(app_committee_chair);
                $('#app_committee_vchair_p').text(app_committee_vchair);
                $('#app_committee_member_p').text(app_committee_member);
                $('#app_committee_sec_p').text(app_committee_sec);

                //check if null
                if (app_committee == null){
                  var app_committee_limk = '<?php echo base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/ApplicantDocx/null'?>';
                }else{
                  var app_committee_limk = '<?php echo base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/ApplicantDocx/'?>' + app_committee;
                }
                if(app_committee_chair == "N/A" && app_committee_vchair == "N/A" && app_committee_member == "N/A" && app_committee_sec == "N/A"){
                  $('#btn_app_committee_chair').addClass("disabled", true);
                }else{
                  $("#btn_app_committee_chair").prop("href", app_committee_limk)
                  $('#btn_app_committee_chair').removeclass("disabled");
                }
                $("#btn_ctwg_doc_link").prop("href", app_committee_limk)
                //Committee
            });
//-------------------function show all work experience

//-------------------function Compute
            $(".txt").on("keydown keyup", function() {
                calculateSum();
            });

            //Compute
            function calculateSum() {
                var sum = 0;
                //iterate through each textboxes and add the values
                $(".txt").each(function() {
                    //add only if the value is number
                    if (!isNaN(this.value) && this.value.length != 0) {
                        sum += parseFloat(this.value);
                    }
                });

                $("#eval_total").val(sum.toFixed(2));
            }
//-------------------function Compute

//--------------evaluate form-------
        $('#evaluate_form').submit(function(e){
          e.preventDefault(); 
            $.ajax({
                url: "<?php echo base_url().'evaluate_form'?>",
                type: "post",
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                success: function(data){
                    var json = $.parseJSON(data);
                    if(json.status == 'True'){
                      html = '<div class="alert alert-success mt-2 message"> <b>'+ json.error +'</b></div>';
                        $('#evaluate_form').prepend(html);
                        $('#message_eval').prepend(html);
                        //Hide
                        $(".message").delay(4000).slideUp(200, function() {
                            $(this).alert('close');
                        });
                        
                    }else{
                        html = '<div class="alert alert-danger mt-2 message"> <b>'+ json.error +'</b></div>';
                        $('#evaluate_form').prepend(html);
                        $('#message_eval').prepend(html);
                        //Hide
                        $(".message").delay(4000).slideUp(200, function() {
                            $(this).alert('close');
                        });
                    }  
                }
            });
            show_applicants();    
        });
//--------------evaluate form-------

//-------Notify Disqualified---------  

            //vacant position to database
    
            $('#btn_notify_disqualified').on('click',function(){
              var pos_id_disqualified = $('#pos_id_disqualified').val();
              $("#notify_message_disqualified_sending").show();
              $("#notify_message_disqualified").hide();
              $("#btn_notify_disqualified_no").attr('disabled', true);
              $("#btn_notify_disqualified").attr('disabled', true);
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url().'notify_disqualified_applicants'?>",
                    dataType : "JSON",
                    data : {pos_id_disqualified:pos_id_disqualified},
                    success: function(data){
                        html = '<div class="alert alert-success mt-2"><i class="fa fa-check-circle" aria-hidden="true"></i> <b>Notification sent successfully.</b></div>';
                              $('#myTabContent').prepend(html);

                        //Hide
                        $(".alert").delay(4000).slideUp(200, function() {
                            $(this).alert('close');
                        });
                      
                        //Close
                        $('#disqualified_modal').modal('hide');
                    }
                    //Close
                });
                //return false;
                //console.log(data);
            });

//--------Notify Disqualified---------

//-------Notify Qualified---------  

            //vacant position to database
    
            $('#btn_notify_qualified').on('click',function(){
              var pos_id_qualified = $('#pos_id_qualified').val();
              $("#notify_message_qualified_sending").show();
              $("#notify_message_qualified").hide();
              $("#btn_notify_qualified_no").attr('disabled', true);
              $("#btn_notify_qualified").attr('disabled', true);
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url().'notify_qualified_applicants'?>",
                    dataType : "JSON",
                    data : {pos_id_qualified:pos_id_qualified},
                    success: function(data){
                        html = '<div class="alert alert-success mt-2"><i class="fa fa-check-circle" aria-hidden="true"></i> <b>Notification sent successfully.</b></div>';
                              $('#myTabContent').prepend(html);

                        //Hide
                        $(".alert").delay(4000).slideUp(200, function() {
                            $(this).alert('close');
                        });
                      
                        //Close
                        $('#qualified_modal').modal('hide');
                    }
                    //Close
                });
                //return false;
                //console.log(data);
            });

//--------Notify Qualified---------

//----------Hide Remarks-----------
    $("#chk16_div").hide();
    $("#chk16").click(function() {
        if($(this).is(":checked")) {
            $("#chk16_div").show();
        } else {
            $("#chk16_div").hide();
            $("#eval_remarks1").val("");
        }
    });

    $("#chk18_div").hide();
    $("#chk18").click(function() {
        if($(this).is(":checked")) {
            $("#chk18_div").show();
        } else {
            $("#chk18_div").hide();
            $("#eval_remarks").val("");
        }
    });
//----------Hide Remarks-----------

//----------Hide Modality-----------
    $("#cbwe_place_div").hide();
    $("#chkf2f").click(function() {
        if($(this).is(":checked")) {
            $("#cbwe_place_div").show();
            $("#cbwe_online_div").hide();
        } else {
            $("#cbwe_place_div").hide();
            $("#cbwe_place").val("");
        }
    });

    $("#cbwe_online_div").hide();
    $("#chkonline").click(function() {
        if($(this).is(":checked")) {
            $("#cbwe_online_div").show();
            $("#cbwe_place_div").hide();
        } else {
            $("#cbwe_online_div").hide();
            $("#cbwe_link").val("");
        }
    });
//----------Hide Remarks-----------
            
                       
          });//last
      </script>

  <?php }?>
<?php }else{
redirect (base_url());
}?>
