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
                          <th>Relevant Trainings</th>
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
                  <div id="collapseapplicant" class="collapse show" data-parent="#accordion">
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
                              <input type="text" id="present_office" name="present_office" placeholder="Technical Education And Skills Development Authority" class="form-control" disabled>
                          </div>
                        </div>
                        <div class="row form-group">
                          <div class="col col-md-3">
                              <label for="present_position" class=" form-control-label">Present Position</label>
                          </div>
                          <div class="col col-md-9">
                              <input type="text" id="present_position" name="present_position" placeholder="Administrative Officer V" class="form-control" disabled>
                          </div>
                        </div>
                        <!--Second Row-->

                        <!--Third Row-->
                        <div class="row form-group">
                          <div class="col col-md-3">
                              <label for="ous_desc" class=" form-control-label">Office where the vacancy</label>
                          </div>
                          <div class="col col-md-9">
                              <input type="text" id="ous_desc" name="ous_desc" placeholder="" class="form-control" disabled>
                          </div>
                        </div>
                        <div class="row form-group">
                          <div class="col col-md-3">
                              <label for="pos_desc" class="form-control-label">Vacant Position</label>
                          </div>
                          <div class="col col-md-9">
                              <input type="text" id="pos_desc" name="pos_desc" placeholder="" class="form-control" disabled>
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
                  <div id="collapsequalification" class="collapse" data-parent="#accordion1">
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
                                    <br><small><strong>Relevant Years of Experience</strong></small>
                                    <input type="number" id="app_relevant_years" name="app_relevant_years" class="form-control" placeholder="No. of Relevant Years of Experience" min='0'>
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
                                    <br><small><strong>Relevant Training Hours</strong></small>
                                    <input type="number" id="app_training_hours" name="app_training_hours" class="form-control" placeholder="No. of Relevant Training Hours" min='0'>
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

                      <!--Result Row-->
                        <div class="row form-group">
                          <div class="col-md-12">
                            <fieldset class="result-fieldset">
                              <legend class="result-legend">Evaluation Result</legend>

                              <div class="result-toggle">
                                <input type="radio" id="eval_result_qualified" name="eval_result"
                                      value="Qualified" class="result-toggle__input">
                                <label class="result-toggle__label result-toggle__label--pass" for="eval_result_qualified">
                                  <i class="fa fa-check-circle"></i> Qualified
                                </label>

                                <input type="radio" id="eval_result_conditional" name="eval_result"
                                      value="Conditionally Qualified" class="result-toggle__input">
                                <label class="result-toggle__label result-toggle__label--warn" for="eval_result_conditional">
                                  <i class="fa fa-exclamation-circle"></i> Conditionally Qualified
                                </label>

                                <input type="radio" id="eval_result_disqualified" name="eval_result"
                                      value="Disqualified" class="result-toggle__input">
                                <label class="result-toggle__label result-toggle__label--fail" for="eval_result_disqualified">
                                  <i class="fa fa-times-circle"></i> Disqualified
                                </label>
                              </div>
                            </fieldset>
                          </div>
                        </div>
                        <!--Result Row-->
                        <style>
                            .result-fieldset {
                              border: none;
                              margin: 0 0 1rem;
                              padding: 0;
                            }

                            .result-legend {
                              font-size: 0.95rem;
                              font-weight: 700;
                              letter-spacing: .03em;
                              text-transform: uppercase;
                              color: #495057;
                              margin-bottom: .6rem;
                            }

                            .result-toggle {
                              display: flex;
                              flex-wrap: wrap;
                              gap: .6rem;
                            }

                            /* hide the native radio, keep it focusable/accessible */
                            .result-toggle__input {
                              position: absolute;
                              opacity: 0;
                              width: 1px;
                              height: 1px;
                            }

                            .result-toggle__label {
                              display: inline-flex;
                              align-items: center;
                              gap: .4rem;
                              padding: .55rem 1.1rem;
                              border-radius: 999px;
                              border: 2px solid #dee2e6;
                              background: #fff;
                              color: #495057;
                              font-weight: 600;
                              font-size: .92rem;
                              cursor: pointer;
                              transition: all .15s ease;
                              user-select: none;
                            }

                            .result-toggle__label:hover {
                              box-shadow: 0 2px 6px rgba(0,0,0,.08);
                            }

                            /* keyboard focus ring — required since the input itself is visually hidden */
                            .result-toggle__input:focus-visible + .result-toggle__label {
                              outline: 2px solid #0d6efd;
                              outline-offset: 2px;
                            }

                            /* color states per option, only when checked */
                            .result-toggle__label--pass i { color: #198754; }
                            .result-toggle__input:checked + .result-toggle__label--pass {
                              background: #198754;
                              border-color: #198754;
                              color: #fff;
                            }
                            .result-toggle__input:checked + .result-toggle__label--pass i { color: #fff; }

                            .result-toggle__label--warn i { color: #fd7e14; }
                            .result-toggle__input:checked + .result-toggle__label--warn {
                              background: #fd7e14;
                              border-color: #fd7e14;
                              color: #fff;
                            }
                            .result-toggle__input:checked + .result-toggle__label--warn i { color: #fff; }

                            .result-toggle__label--fail i { color: #dc3545; }
                            .result-toggle__input:checked + .result-toggle__label--fail {
                              background: #dc3545;
                              border-color: #dc3545;
                              color: #fff;
                            }
                            .result-toggle__input:checked + .result-toggle__label--fail i { color: #fff; }

                            @media (max-width: 480px) {
                              .result-toggle { flex-direction: column; }
                              .result-toggle__label { width: 100%; justify-content: center; }
                            }
                        </style>
                      <!--Result Row-->

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

        const APP_CFG = {
            baseUrl:    '<?= base_url() ?>',
            viewerBase: '<?= base_url() ?>pdfviewer/web/viewer.php?file=<?= base_url() ?>uploads/ApplicantDocx/',
            rmsBase:    'https://rms.tesdar02onlinereporting.ph/applicants_docs/',
            rmsViewer:  'https://rms.tesdar02onlinereporting.ph/applicants_docs/pdfviewer/web/viewer.php?file=https://rms.tesdar02onlinereporting.ph/applicants_docs/',
            careerUrl:  '<?= rtrim(config_item("career_portal_url") ?: "http://localhost/careers/", "/") ?>/',
            docCutoff:  '<?= config_item("career_doc_cutoff") ?: "2026-09-01" ?>'
        };

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
                                          '<td>'+training+'</td>'+
                                          '<td>'+
                                          '<button data-toggle="dropdown" type="button" class="btn btn-outline-primary dropdown-toggle btn-sm"><i class="fa fa-tasks"></i> Actions </button>'+
                                            '<div class="dropdown-menu">'+
                                              '<a data-toggle="modal" href="#evaluate" class="dropdown-item item_evaluation" data-app_id="'+data[i].applicant_id+'" data-pos_eligibility="'+data[i].pos_eligibility+'"'+
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
                                               '<a data-toggle="modal" href="#send_invitation" class="dropdown-item item_invitation" style="display:none" data-app_hash="'+data[i].app_hash1+'"'+ 
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

            (function () {
              'use strict';

              // Maps a jQuery data-key -> career portal route segment
              var DOC_MAP = {
                  app_letter:              'intent',
                  app_coe_doc:             'coe',
                  app_eligibility_doc:     'eligibility',
                  app_educational_doc:     'educational',
                  app_training_doc:        'training',
                  app_ipcr_doc:            'ipcr',
                  btn_pdswes_doc:          'pds',
                  btn_wes_doc:             'wes',
                  btn_service_reccord_doc: 'sr',
                  btn_appointment_doc:     'cpa',
                  btn_nc_doc:              'nc',
                  btn_nttc_doc:            'nttc',
                  app_performance:         'awards'
              };

              // route segment -> the anchors that should point at it
              var DOC_TARGETS = {
                  intent:      ['#app_letter_link', '#btn_app_letter_link'],
                  coe:         ['#app_coe_doc_link', '#btn_coe_doc_link1'],
                  eligibility: ['#app_eligibility_doc_link1', '#btn_eligibility_doc_link1'],
                  educational: ['#app_educational_doc_link', '#btn_tor_doc_link'],
                  training:    ['#app_training_doc_link', '#btn_training_doc_link'],
                  ipcr:        ['#app_ipcr_doc_link', '#btn_ipcr_doc_link'],
                  pds:         ['#btn_pdswes_doc_link'],
                  wes:         ['#btn_wes_doc_link', '#btn_wes_doc_link1'],
                  sr:          ['#btn_service_reccord_doc_link'],
                  cpa:         ['#btn_appointment_doc_link'],
                  nc:          ['#btn_nc_doc_link'],
                  nttc:        ['#btn_nttc_doc_link'],
                  awards:      ['#btn_arp_doc_link', '#btn_app_arp_international']
              };

              var ELIGIBILITY_LABELS = {
                  '':       'Career Executive Service Eligibility',
                  'csp':    'Career Service Professional Eligibility',
                  'cssp':   'Career Service Sub Professional Eligibility',
                  'ra1080': 'R.A. 1080',
                  'pd907':  'PD 907',
                  'mc11':   'MC 11 SERIES OF 1996'
              };

              // ---------- helpers ----------

              function hasValue(v) {
                  return v !== null && v !== undefined && String(v).trim() !== '';
              }

              function sumSemicolonList(raw) {
                  if (!hasValue(raw)) { return 0; }
                  return String(raw).split(';').reduce(function (acc, v) {
                      var n = parseFloat(v);
                      return acc + (isNaN(n) ? 0 : n);   // FIX M3: NaN no longer poisons the total
                  }, 0);
              }

              function formatEligibility(raw) {
                  if (!hasValue(raw)) { return 'N/A'; }
                  return String(raw).split(';').map(function (v) {
                      var key = String(v).trim().toLowerCase();
                      return ELIGIBILITY_LABELS.hasOwnProperty(key)
                          ? ELIGIBILITY_LABELS[key]
                          : String(v).trim().toUpperCase();
                  }).filter(function (s) { return s !== ''; })
                    .join(' | ');                        // FIX N1: no trailing separator
              }

              function isPostCutoff(timestamp) {
                  if (!hasValue(timestamp)) { return false; }
                  var d = new Date(String(timestamp).replace(' ', 'T'));
                  if (isNaN(d.getTime())) { return false; }   // FIX: guard Invalid Date
                  return d >= new Date(APP_CFG.docCutoff + 'T00:00:00');
              }

              function setHref(selectors, url) {
                  $(selectors.join(',')).attr('href', url).attr('target', '_blank');
              }

              function setDisabled($el, disabled) {
                  $el.toggleClass('disabled', disabled)          // FIX M5
                    .attr('aria-disabled', disabled ? 'true' : 'false')
                    .attr('tabindex', disabled ? '-1' : null);
              }

              function buildDocUrl($row, dataKey, route) {
                  var filename  = $row.data(dataKey);
                  var isBackup  = $row.data('is_backup');
                  var appHash   = $row.data('app_hash');

                  if (hasValue(isBackup)) {
                      if (!hasValue(filename)) { return null; }
                      return APP_CFG.rmsViewer + encodeURIComponent(isBackup) + '/' +
                            encodeURIComponent(filename);
                  }

                  if (isPostCutoff($row.data('app_timestamp'))) {
                      if (!hasValue(appHash)) { return null; }
                      return APP_CFG.careerUrl + 'view-document/' + route + '/' +
                            encodeURIComponent(appHash);
                  }

                  if (!hasValue(filename)) { return null; }
                  return APP_CFG.viewerBase + encodeURIComponent(filename);   // FIX N9
              }

              // ---------- FIX M2: full reset ----------

              function resetEvaluationForm() {
                  var $form = $('#evaluate_form');

                  $form[0].reset();
                  $form.find('input[type="radio"], input[type="checkbox"]').prop('checked', false);
                  $form.find('input[type="text"], input[type="number"], input[type="hidden"], textarea').val('');
                  $form.find('select').val('');

                  // text-only display fields
                  $([
                      '#pos_eligibility', '#pos_education', '#pos_experience', '#pos_training',
                      '#app_eligibility', '#app_course', '#app_relevant_years', '#app_relevant_hours',
                      '#app_arp_international', '#app_arp_national', '#app_arp_regional', '#app_arp_provincial',
                      '#app_expert_international_p', '#app_expertise_national_p',
                      '#app_expertise_regional_p', '#app_expertise_provincial_p',
                      '#app_committee_chair_p', '#app_committee_vchair_p',
                      '#app_committee_member_p', '#app_committee_sec_p'
                  ].join(',')).text('');

                  // conditional sections
                  $('#chk16_div, #chk18_div').hide();

                  // document anchors: clear stale hrefs and re-enable
                  Object.keys(DOC_TARGETS).forEach(function (route) {
                      $(DOC_TARGETS[route].join(',')).removeAttr('href');
                  });
                  $('#btn_exrp_doc_link, #btn_ctwg_doc_link').removeAttr('href');
                  setDisabled($('#btn_app_arp_international, #btn_app_expert_international, #btn_app_committee_chair'), false);

                  return $form;
              }

              // ---------- handler ----------

              $('#applicants_table_body').on('click', '.item_evaluation', function (e) {
                  e.preventDefault();                                  // FIX N8

                  var $row   = $(this);
                  var app_id = $row.data('app_id');                    // read BEFORE reset

                  var $form = resetEvaluationForm();

                  // ----- Annexes -----
                  $('#appannexj').attr('href',  APP_CFG.baseUrl + 'r2_annex_j/'  + app_id);
                  $('#appannexj2').attr('href', APP_CFG.baseUrl + 'r2_annex_j2/' + app_id);
                  $('#app_id_eval').val(app_id);

                  // ----- Computed aggregates: compute FIRST (FIX B2) -----
                  var app_eligibility_text   = formatEligibility($row.data('app_eligibility'));
                  var total_relevant_years   = sumSemicolonList($row.data('app_relevant_years'));
                  var total_training_hours   = sumSemicolonList($row.data('app_training_hours'));

                  // ----- Position details -----
                  $('#pos_eligibility').text($row.data('pos_eligibility') || '');
                  $('#pos_education').text($row.data('pos_education') || '');
                  $('#pos_experience').text($row.data('pos_experience') || '');
                  $('#pos_training').text($row.data('pos_training') || '');
                  $('#app_course').text($row.data('app_course') || '');
                  $('#app_eligibility').text(app_eligibility_text);
                  $('#app_relevant_years').text(total_relevant_years + ' year/s');
                  $('#app_relevant_hours').text(total_training_hours + ' hour/s');

                  // ----- Applicant information -----
                  var gender = String($row.data('app_gender') || '').toLowerCase();  // FIX N2
                  var genderLabel = gender === 'male'   ? 'Male'
                                  : gender === 'female' ? 'Female'
                                  : '';

                  var fullname = [
                      $row.data('app_lastname'),
                      [$row.data('app_firstname'), $row.data('app_middlename')]
                          .filter(hasValue).join(' ')
                  ].filter(hasValue).join(', ');

                  $('#fullname').val(fullname);
                  $('#age').val($row.data('app_age') || '');
                  $('#sex').val(genderLabel);
                  $('#ous_desc').val($row.data('ous_desc') || '');
                  $('#pos_desc').val($row.data('pos_desc') || '');
                  $('#present_position').val($row.data('app_present_position') || '');
                  $('#present_office').val($row.data('app_present_office') || '');

                  // ----- Evaluation radios (FIX M4: scoped to $form) -----
                  ['eval_result', 'eval_eligibility', 'eval_education',
                  'eval_experience', 'eval_performance', 'eval_training'
                  ].forEach(function (name) {
                      var val = $row.data(name);
                      if (hasValue(val)) {
                          $form.find('input[name="' + name + '"][value="' + val + '"]')
                              .prop('checked', true);
                      }
                  });

                  // ----- Evaluation text inputs -----
                  ['eval_arp_international', 'eval_arp_national',
                  'eval_arp_regional', 'eval_arp_provincial',
                  'eval_chklist', 'eval_chklist1', 'eval_chklist2', 'eval_chklist3',
                  'eval_chklist4', 'eval_chklist5', 'eval_chklist6', 'eval_chklist8',
                  'eval_chklist9', 'eval_chklist10', 'eval_chklist13', 'eval_chklist14'
                  ].forEach(function (id) {
                      $('#' + id).val($row.data(id) || '');
                  });

                  // ----- Conditional remarks (FIX M1: truthiness, not !== null) -----
                  var eval_remarks  = $row.data('eval_remarks');
                  var eval_remarks1 = $row.data('eval_remarks1');

                  if (hasValue(eval_remarks1)) {
                      $form.find('input[name="chk16"]').prop('checked', true);
                      $('#chk16_div').show();
                      $('#eval_remarks1').val(eval_remarks1);
                  }
                  if (hasValue(eval_remarks)) {
                      $form.find('input[name="chk18"]').prop('checked', true);
                      $('#chk18_div').show();
                      $('#eval_remarks').val(eval_remarks);
                  }

                  // ----- Documents: one loop, all sources (FIX B3, B4, N6) -----
                  Object.keys(DOC_MAP).forEach(function (dataKey) {
                      var route = DOC_MAP[dataKey];
                      var url   = buildDocUrl($row, dataKey, route);
                      var targets = DOC_TARGETS[route];
                      if (!targets) { return; }

                      if (url) {
                          setHref(targets, url);
                          setDisabled($(targets.join(',')), false);
                      } else {
                          setDisabled($(targets.join(',')), true);
                      }
                  });

                  // ----- Performance / Awards -----
                  var perf = {
                      international: $row.data('app_performance_international'),
                      national:      $row.data('app_performance_national'),
                      regional:      $row.data('app_performance_regional'),
                      provincial:    $row.data('app_performance_provincial')
                  };
                  $('#app_arp_international').text(perf.international || '');
                  $('#app_arp_national').text(perf.national || '');
                  $('#app_arp_regional').text(perf.regional || '');
                  $('#app_arp_provincial').text(perf.provincial || '');

                  var noPerf = Object.keys(perf).every(function (k) {
                      return !hasValue(perf[k]) || perf[k] === 'N/A';
                  });
                  // href already set by the DOC_MAP loop above — only toggle state here
                  setDisabled($('#btn_app_arp_international'), noPerf);

                  // ----- Expertise -----
                  var exp = {
                      international: $row.data('app_expert_international'),
                      national:      $row.data('app_expertise_national'),
                      regional:      $row.data('app_expertise_regional'),
                      provincial:    $row.data('app_expertise_provincial')
                  };
                  $('#app_expert_international_p').text(exp.international || '');
                  $('#app_expertise_national_p').text(exp.national || '');
                  $('#app_expertise_regional_p').text(exp.regional || '');
                  $('#app_expertise_provincial_p').text(exp.provincial || '');

                  var serviceUrl = buildDocUrl($row, 'app_service', 'sr');
                  var noExp = Object.keys(exp).every(function (k) {
                      return !hasValue(exp[k]) || exp[k] === 'N/A';
                  });
                  if (serviceUrl) { setHref(['#btn_exrp_doc_link'], serviceUrl); }
                  if (serviceUrl && !noExp) { setHref(['#btn_app_expert_international'], serviceUrl); }
                  setDisabled($('#btn_app_expert_international'), noExp || !serviceUrl);

                  // ----- Committee -----
                  var com = {
                      chair:   $row.data('app_committee_chair'),
                      vchair:  $row.data('app_committee_vchair'),
                      member:  $row.data('app_committee_member'),
                      sec:     $row.data('app_committee_sec')
                  };
                  $('#app_committee_chair_p').text(com.chair || '');
                  $('#app_committee_vchair_p').text(com.vchair || '');
                  $('#app_committee_member_p').text(com.member || '');
                  $('#app_committee_sec_p').text(com.sec || '');

                  var committeeUrl = buildDocUrl($row, 'app_committee', 'ctwg');
                  var noCom = Object.keys(com).every(function (k) {
                      return !hasValue(com[k]) || com[k] === 'N/A';
                  });
                  if (committeeUrl) { setHref(['#btn_ctwg_doc_link'], committeeUrl); }
                  if (committeeUrl && !noCom) { setHref(['#btn_app_committee_chair'], committeeUrl); }
                  setDisabled($('#btn_app_committee_chair'), noCom || !committeeUrl);
              });

          }());

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
