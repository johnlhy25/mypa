<?php 
if( $this->session->logged_in){
  if( $this->session->role == 'Accre'){
    redirect (base_url().'Guest');
  }else{?>
  <div id="content-inner-plantilla" class="content-inner">
<!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Performance Monitoring Report</h2>
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
                    <a data-toggle="modal" href="#add" class="dropdown-item edit"> <i class="fa fa-plus"></i> Add Indicator</a>
                    <a href="" class="dropdown-item edit"> <i class="fa fa-print"></i> Print (Under Dev't)</a>
                  </div>
            </div>
          </div>
          <div class="card-header d-flex align-items-center">
					  <h1> <span class="badge bg-blue badge-corner"><i class="fa fa-desktop" aria-hidden="true"></i></span> Indicators</h1>
				  </div>
          <div class="card-body">

            <div class="row">
								<div class="col-md-8"> 
								</div>	
								<div class="col-md-4 "> 
										<div class="d-inline-block pull-right">	
										<a href="#" id="filter_year_pmr" type="button" class="btn btn-primary filter"><i class="fa fa-filter"></i> Filter</a>
										</div>

										<div class="d-inline-block pull-right">
											<select id="year_pmr" name="year" class="form-control">
												<option value="All">Select Year</option>
											<!--Year-->
												<?php
													$firstYear ='1990';
													$lastYear = (int)date('Y');
													for($i=$lastYear;$i>=$firstYear;$i--) { 
												?>
											<option value="<?= $i;?>"><?= $i;?></option>
											<!--End of Year-->  
											<?php } ?>	
											</select>
										</div>
								</div>		
							</div><!--End of row-->
            <!--Operating Units-->

            <?php if($this->session->role == 'Super Admin'){
               $disabled1 = '';
               $disabled2 = '';
               $disabled3 = '';
               $disabled4 = '';
               $disabled5 = '';
               $disabled6 = '';
               $disabled7 = '';
               $disabled8 = '';
               $disabled9 = '';
               $disabled10 = '';
               $disabled11 = '';
               $disabled12 = '';
               $disabled13 = '';
               $disabled14 = '';
               $disabled15 = '';

            }elseif($this->session->role == 'Admin'){
              $id = $this->session->ous_id;
              $disabled1 = 'disabled';
              $disabled2 = 'disabled';
              $disabled3 = 'disabled';
              $disabled4 = 'disabled';
              $disabled5 = 'disabled';
              $disabled6 = 'disabled';
              $disabled7 = 'disabled';
              $disabled8 = 'disabled';
              $disabled9 = 'disabled';
              $disabled10 = 'disabled';
              $disabled11 = 'disabled';
              $disabled12 = 'disabled';
              $disabled13 = 'disabled';
              $disabled14 = 'disabled';
              $disabled15 = 'disabled';
              switch ($id) {
                case "1":
                  $disabled1 = '';
                  break;
                case "2":
                  $disabled2 = '';
                  break;
                case "3":
                  $disabled3 = '';
                  break;
                case "4":
                  $disabled4 = '';
                  break;
                case "5":
                  $disabled5 = '';
                  break;
                case "6":
                  $disabled6 = '';
                  break;
                case "7":
                  $disabled7 = '';
                  break;
                case "8":
                  $disabled8 = '';
                  break;
                case "9":
                    $disabled9 = '';
                    break;
                case "10":
                  $disabled10 = '';
                  break;
                case "11":
                  $disabled11 = '';
                  break;  
                case "12":
                  $disabled12 = '';
                  break;  
                case "13":
                  $disabled13 = '';
                  break;  
                case "14":
                  $disabled14 = '';
                  break;  
                case "15":
                  $disabled15 = '';
                  break;    
                
              }
            }?>
            
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#pap_div" role="tab" data-value="Summary" aria-controls="home"
                  aria-selected="true">Summary</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?= $disabled1 ?>" id="home-tab" data-toggle="tab" href="#pobatanes_div" role="tab" data-value="ro_target" aria-controls="home"
                  aria-selected="true">Regional Office</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?= $disabled3 ?>" id="home-tab" data-toggle="tab" href="#pobatanes_div" data-value="po_batanes_target" role="tab" aria-controls="home"
                  aria-selected="true">PO Batanes</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?= $disabled3 ?>" id="home-tab" data-toggle="tab" href="#pobatanes_div" data-value="ptc_batanes_target" role="tab" aria-controls="home"
                  aria-selected="true">PTC Batanes</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?= $disabled2 ?>" id="home-tab" data-toggle="tab" href="#pobatanes_div" data-value="po_cagayan_target" role="tab" aria-controls="home"
                  aria-selected="true">PO Cagayan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?= $disabled2 ?>" id="home-tab" data-toggle="tab" href="#pobatanes_div" data-value="ptc_cagayan_target" role="tab" aria-controls="home"
                  aria-selected="true">PTC Cagayan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?= $disabled10 ?>" id="home-tab" data-toggle="tab" href="#pobatanes_div" data-value="api_target" role="tab" aria-controls="home"
                  aria-selected="true">API</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?= $disabled12 ?>" id="home-tab" data-toggle="tab" href="#pobatanes_div" data-value="lit_target" role="tab" aria-controls="home"
                  aria-selected="true">LIT</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?= $disabled15 ?>" id="home-tab" data-toggle="tab" href="#pobatanes_div" data-value="rtc_target" role="tab" aria-controls="home"
                  aria-selected="true">RTC</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?= $disabled4 ?>" id="home-tab" data-toggle="tab" href="#pobatanes_div" data-value="po_isabela_target" role="tab" aria-controls="home"
                  aria-selected="true">PO Isabela</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?= $disabled4 ?>" id="home-tab" data-toggle="tab" href="#pobatanes_div" data-value="ptc_isabela_target" role="tab" aria-controls="home"
                  aria-selected="true">PTC Isabela</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?= $disabled14 ?>" id="home-tab" data-toggle="tab" href="#pobatanes_div" data-value="isat_isabela_target" role="tab" aria-controls="home"
                  aria-selected="true">ISAT</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?= $disabled11 ?>" id="home-tab" data-toggle="tab" href="#pobatanes_div" data-value="sicat_isabela_target" role="tab" aria-controls="home"
                  aria-selected="true">SICAT</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?= $disabled8 ?>" id="home-tab" data-toggle="tab" href="#pobatanes_div" data-value="po_nv_target" role="tab" aria-controls="home"
                  aria-selected="true">PO Nueva Viscaya</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?= $disabled8 ?>" id="home-tab" data-toggle="tab" href="#pobatanes_div" data-value="ptc_nv_target" role="tab" aria-controls="home"
                  aria-selected="true">PTC Nueva Viscaya</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?= $disabled13 ?>" id="home-tab" data-toggle="tab" href="#pobatanes_div" data-value="nvpi_target" role="tab" aria-controls="home"
                  aria-selected="true">NVPI</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?= $disabled7 ?>" id="home-tab" data-toggle="tab" href="#pobatanes_div" data-value="po_quirino_target" role="tab" aria-controls="home"
                  aria-selected="true">PO Quirino</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?= $disabled7 ?>" id="home-tab" data-toggle="tab" href="#pobatanes_div" data-value="ptc_quirino_target" role="tab" aria-controls="home"
                  aria-selected="true">PTC Quirino</a>
              </li>
            </ul>

            <div class="tab-content" id="myTabContent">
                                    
<!--I. Summary-->
              <div class="tab-pane fade show active" id="pap_div" role="tabpanel" aria-labelledby="home-tab">
                <div class="col-md-12">
                  <div class="row" >
                    <div class="card no-margin-bottom mt-2">
                      <div class="btn-group pull-right no-padding-top no-margin-bottom">
                         
                      </div>  
                    </div>
                  </div>

                  <div class="table-responsive mt-2">   
                  <input type="text" id="search-input1" placeholder="Search here..." class="form-control">
                    <table id="pap_table" class="table table-striped table-hover mt-2" style="height:150px;">
                      <thead>
                        <tr>
                          
                          <th>#</th>
                          <th>Regional Target</th>
                          <th>Indicators</th>
                          <th>Summary</th>
                          <th>Batanes</th>
                          <th>Cagayan</th>
                          <th>Isabela</th>
                          <th>Nueva Vizcaya</th>
                          <th>Quirino</th>
                          <th>Evidences</th>
                        </tr>
                      </thead>

                      <tbody id="pap_table_body">

                      </tbody>	
                    </table>							
                  </div>  
                </div><!--Col MD 12-->
              </div>
<!--I. Summary  -->

<!--I. Regional Office-->
              <div class="tab-pane fade show" id="ro_div" role="tabpanel" aria-labelledby="home-tab">
                <div class="col-md-12">
                  <div class="row" >
                    <div class="card no-margin-bottom mt-2">
                      <div class="btn-group pull-right no-padding-top no-margin-bottom">
                         
                      </div>  
                    </div>
                  </div>
                  <div class="table-responsive mt-2">   
                  
                    <table id="ro_table" class="table table-striped table-hover" >
                      <thead>
                        <tr>
                          
                          <th>#</th>
                          <th>Regional Target</th>
                          <th>Indicators</th>
                          <th>Accomplishment <span class="badge">as of (<?php date_default_timezone_set('Asia/Manila');  echo date('F j, Y')?>)</span></th>
                          <th>January<th>
                          <th>February</th>
                          <th>March</th>
                          <th>April</th>
                          <th>May</th>
                          <th>June</th>
                          <th>July</th>
                          <th>August</th>
                          <th>September</th>
                          <th>October</th>
                          <th>November</th>
                          <th>December</th>
                          <th>Actions</th>
                        </tr>
                      </thead>

                      <tbody id="ro_table_body">

                      </tbody>	
                    </table>							
                  </div>  
                </div><!--Col MD 12-->
              </div>
<!--I. Regional Office  -->

<!--I. PO Batanes-->
              <div class="tab-pane fade show" id="pobatanes_div" role="tabpanel" aria-labelledby="home-tab">
                <div class="col-md-12">
                  <div class="row" >
                    <div class="card no-margin-bottom mt-2">
                        
                    </div>
                  </div>

                  <div class="table-responsive mt-2">
                    <div class="btn-group pull-right" style="margin-bottom:10px;">
                      <a href="<?= base_url()?>opcr_target" target="_blank" class="btn btn-sm" style="background-color:#BBDEFB"><i class="fa fa-print"></i> Print OPCR (Target)</a>
                      &nbsp
                      <a href="<?= base_url()?>opcr_output" target="_blank" class="btn btn-sm" style="background-color:#BBDEFB"><i class="fa fa-print"></i> Print OPCR (Output)</a>
                    </div> 
                    <input type="text" id="search-input" placeholder="Search here..." class="form-control">
                    <table id="pobatanes_table" class="table table-striped table-hover mt-2">
                      <thead>
                        <tr>
                          <th class="sticky1">#</th>
                          <th class="sticky2">Target</th>
                          <th class="sticky3">Indicators</th>
                          <th class="sticky4">Accomplishment <br><span class="badge">as of (<?php date_default_timezone_set('Asia/Manila');  echo date('F j, Y')?>)</span></th>
                          <th>1st Semester</th>
                          <th>2nd Semester</th>
                          <th>1st Quarter</th>
                          <th>2nd Quarter</th>
                          <th>3rd Quarter</th>
                          <th>4th Quarter</th>
                          <th colspan="2"><center>Actions</center></th>
                        </tr>
                      </thead>

                      <tbody id="pobatanes_table_tbody">

                      </tbody>	
                    </table>							
                  </div>  
                </div><!--Col MD 12-->
              </div>
<!--I. PO Batanes  -->
              
            </div> 
            <!--Operating Units-->
          </div>
        </div>    
      </div>
<!--div col lg 12-->

<!-- Modal Add Target -->
        <div class="modal fade delete" id="edit_target" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">	
          <div class="modal-content">

            <div class="modal-header">
              <h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-bullseye"></i> Target</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Modal Body-->
            <div class="modal-body">
<!-- Form --> <form action="" method="POST" id="indicator_target" role="form">
                  
                 <!-- RO -->
                 <div class="row form-group">
                    <div class="col-sm-4">
                      <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-list-ul" aria-hidden="true"></i><b> Regional Office</b></label>
                    </div>
                    <div class="col-sm-8">
                      <input id="po_batanes_target" type="text" class="form-control" name="po_batanes_target" placeholder="100%">
                    </div>
                  </div>
                  <!-- RO -->

                  <!-- 1 -->
                  <div class="row form-group">
                    <div class="col-sm-4">
                      <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-list-ul" aria-hidden="true"></i><b> PO Batanes</b></label>
                    </div>
                    <div class="col-sm-8">
                      <input id="po_batanes_target" type="text" class="form-control" name="po_batanes_target" placeholder="100%">
                    </div>
                  </div>
                  <!-- 1 -->

                  <!-- 2 -->
                  <div class="row form-group">
                    <div class="col-sm-4">
                      <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-list-ul" aria-hidden="true"></i><b> PTC Batanes</b></label>
                    </div>
                    <div class="col-sm-8">
                      <input id="ptc_batanes_target" type="text" class="form-control" name="ptc_batanes_target" placeholder="100%">
                    </div>
                  </div>
                  <!-- 2 -->

                  <!-- 4 -->
                  <div class="row form-group">
                    <div class="col-sm-4">
                      <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-list-ul" aria-hidden="true"></i><b> PO Cagayan</b></label>
                    </div>
                    <div class="col-sm-8">
                      <input id="po_cagayan_target" type="text" class="form-control" name="po_cagayan_target" placeholder="100%">
                    </div>
                  </div>
                  <!-- 4 -->

                  <!-- 3 -->
                  <div class="row form-group">
                    <div class="col-sm-4">
                      <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-list-ul" aria-hidden="true"></i><b> PTC Cagayan</b></label>
                    </div>
                    <div class="col-sm-8">
                      <input id="ptc_cagayan_target" type="text" class="form-control" name="ptc_cagayan_target" placeholder="100%">
                    </div>
                  </div>
                  <!-- 3 -->

                  <!-- 5 -->
                  <div class="row form-group">
                    <div class="col-sm-4">
                      <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-list-ul" aria-hidden="true"></i><b> API</b></label>
                    </div>
                    <div class="col-sm-8">
                      <input id="api_target" type="text" class="form-control" name="api_target" placeholder="100%">
                    </div>
                  </div>
                  <!-- 5 -->

                  <!-- 6 -->
                  <div class="row form-group">
                    <div class="col-sm-4">
                      <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-list-ul" aria-hidden="true"></i><b> LIT</b></label>
                    </div>
                    <div class="col-sm-8">
                      <input id="lit_target" type="text" class="form-control" name="lit_target" placeholder="100%">
                    </div>
                  </div>
                  <!-- 6 -->

                  <!-- 7 -->
                  <div class="row form-group">
                    <div class="col-sm-4">
                      <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-list-ul" aria-hidden="true"></i><b> RTC</b></label>
                    </div>
                    <div class="col-sm-8">
                      <input id="rtc_target" type="text" class="form-control" name="rtc_target" placeholder="100%">
                    </div>
                  </div>
                  <!-- 7 -->

                  <!-- 8 -->
                  <div class="row form-group">
                    <div class="col-sm-4">
                      <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-list-ul" aria-hidden="true"></i><b> PO Isabela</b></label>
                    </div>
                    <div class="col-sm-8">
                      <input id="po_isabela_target" type="text" class="form-control" name="po_isabela_target" placeholder="100%">
                    </div>
                  </div>
                  <!-- 8 -->

                  <!-- 9 -->
                  <div class="row form-group">
                    <div class="col-sm-4">
                      <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-list-ul" aria-hidden="true"></i><b> PTC Isabela</b></label>
                    </div>
                    <div class="col-sm-8">
                      <input id="ptc_isabela_target" type="text" class="form-control" name="ptc_isabela_target" placeholder="100%">
                    </div>
                  </div>
                  <!-- 9 -->

                  <!-- 10 -->
                  <div class="row form-group">
                    <div class="col-sm-4">
                      <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-list-ul" aria-hidden="true"></i><b> ISAT</b></label>
                    </div>
                    <div class="col-sm-8">
                      <input id="isat_target" type="text" class="form-control" name="isat_target" placeholder="100%">
                    </div>
                  </div>
                  <!-- 10 -->

                  <!-- 10 -->
                  <div class="row form-group">
                    <div class="col-sm-4">
                      <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-list-ul" aria-hidden="true"></i><b> SICAT</b></label>
                    </div>
                    <div class="col-sm-8">
                      <input id="sicat_target" type="text" class="form-control" name="sicat_target" placeholder="100%">
                    </div>
                  </div>
                  <!-- 10 -->

                  <!-- 11 -->
                  <div class="row form-group">
                    <div class="col-sm-4">
                      <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-list-ul" aria-hidden="true"></i><b> PO Nueva Viscaya</b></label>
                    </div>
                    <div class="col-sm-8">
                      <input id="po_nv_target" type="text" class="form-control" name="po_nv_target" placeholder="100%">
                    </div>
                  </div>
                  <!-- 11 -->

                  <!-- 12 -->
                  <div class="row form-group">
                    <div class="col-sm-4">
                      <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-list-ul" aria-hidden="true"></i><b> PTC Nueva Viscaya</b></label>
                    </div>
                    <div class="col-sm-8">
                      <input id="ptc_nv_target" type="text" class="form-control" name="ptc_nv_target" placeholder="100%">
                    </div>
                  </div>
                  <!-- 12 -->

                  <!-- 13 -->
                  <div class="row form-group">
                    <div class="col-sm-4">
                      <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-list-ul" aria-hidden="true"></i><b> NVPI</b></label>
                    </div>
                    <div class="col-sm-8">
                      <input id="nvpi_target" type="text" class="form-control" name="nvpi_target" placeholder="100%">
                    </div>
                  </div>
                  <!-- 13 -->

                  <!-- 14 -->
                  <div class="row form-group">
                    <div class="col-sm-4">
                      <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-list-ul" aria-hidden="true"></i><b> PO Quirino</b></label>
                    </div>
                    <div class="col-sm-8">
                      <input id="po_quirino_target" type="text" class="form-control" name="po_quirino_target" placeholder="100%">
                    </div>
                  </div>
                  <!-- 14 -->

                  <!-- 15 -->
                  <div class="row form-group">
                    <div class="col-sm-4">
                      <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-list-ul" aria-hidden="true"></i><b> PTC Quirino</b></label>
                    </div>
                    <div class="col-sm-8">
                      <input id="ptc_quirino_target" type="text" class="form-control" name="ptc_quirino_target" placeholder="100%">
                    </div>
                  </div>
                  <!-- 15 -->

            </div>
            <!-- Modal Body-->
                          
            <div class="modal-footer">
              <div class="btn-group">
                <button id="save_indicator" type="submit" value='Upload' name='upload' class="btn btn-danger">Submit</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>	
              </div>

              <div id="loading_indicator" class="spinner-grow text-primary" style="display: none;" role="status">
                <span class="sr-only">Loading... </span>
              </div>	
            </div>	
<!-- Form --> </form>	
          </div>
          </div>
      </div>
<!-- End Add TargetModal -->

<!-- Modal Edit Accomplishment -->
      <div class="modal fade delete" id="edit_target_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">	
          <div class="modal-content">

            <div class="modal-header">
              <h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-bullseye"></i> Accomplishment (<span id="edit_target_month2"></span>)</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Modal Body-->
            <div class="modal-body">
<!-- Form --> <form action="" method="POST" id="edit_target_form" role="form">
                <input type="hidden" id="edit_target_id" name="edit_target_id">
                <input type="hidden" id="edit_target_month" name="edit_target_month">
                <input type="hidden" id="ind_id" name="ind_id">
                <input type="hidden" id="edit_deadline" name="edit_deadline">
                <input type="hidden" id="ous_target" name="ous_target">
                <input type="hidden" id="ous_editor" name="ous_editor">
                <input type="hidden" id="edit_filename" name="edit_filename">
                
                <div class="alert alert-warning">
                  <p id="edit_target_desc12"></p>
                </div>

                 <!-- Accomplishment -->
                 <div class="row form-group">
                    <div class="col-sm-5">
                      <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-dot-circle-o" aria-hidden="true"></i><b> Accomplishment</b></label>
                    </div>
                    <div class="col-sm-7">
                      <input id="edit_target_accomplishment" type="text" class="form-control" name="edit_target_accomplishment" placeholder="100" required>
                      <small> <strong>Note:</strong> For Pecentage, please do not include the percentage symbol(%).</small>        
                    </div>
                  </div>
                  <!-- Accomplishment -->

                  <!-- Attachment -->
                  <div class="row form-group">
                    <div class="col-sm-5">
                      <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-paperclip" aria-hidden="true"></i><b> Attachment</b></label>
                    </div>
                    <div class="col-sm-7">
                      <input class="filestyle" data-buttonBefore="true" data-text="Browse file" data-badge="true" data-badgeName="badge-danger" data-placeholder="PDF file only." type='file' name='edit_target_attachment' accept="application/pdf">   
                      <small> <strong>Note:</strong> Merge into one (1) PDF file if multiple files.</small>        
                    </div>
                  </div>
                  <!-- Attachment -->
            </div>
            <!-- Modal Body-->
                          
            <div class="modal-footer">
              <div class="btn-group">
                <button id="edit_target_submit" type="submit" class="btn btn-danger">Submit</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>	
              </div>

              <div id="loading_indicator" class="spinner-grow text-primary" style="display: none;" role="status">
                <span class="sr-only">Loading... </span>
              </div>	
            </div>	
<!-- Form --> </form>	
          </div>
          </div>
      </div>
<!-- End Edit Accomplishment -->

<!-- Modal Rate Accomplishment -->
      <div class="modal fade delete" id="rate_target_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">	
          <div class="modal-content">

            <div class="modal-header">
              <h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-star"></i> Rate (<span id="edit_target_month1"></span>)</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Modal Body-->
            <div class="modal-body">
<!-- Form --> <form action="" method="POST" id="rate_target_form" role="form">
                <input type="hidden" id="rate_target_id" name="rate_target_id">
                <div class="alert alert-warning">
                  <p id="ind_desc"></p>
                  <span class="badge badge-corner" style="background-color:#00695C; color:white"><i class="fa fa-bullseye" aria-hidden="true"></i> Accomplishment: <b><span id="edit_target_accomplishment1"></span></b></span><br>
                  <span class="badge badge-corner" style="background-color:#00695C; color:white"><i class="fa fa-paperclip" aria-hidden="true"></i> View Attachment: <a id="edit_target_link" href="#" target="_blank" style="color:white"><i class="fa fa-eye" aria-hidden="true"></i></a></span><br>
                  <span class="badge badge-corner" style="background-color:#00695C; color:white"><i class="fa fa-calendar" aria-hidden="true"></i> Date Submitted: <b><span id="edit_target_submitted"></span></b></span>
                </div>
                 <!-- Quality -->
                 <div class="row form-group">
                    <div class="col-sm-6">
                      <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-check-circle" aria-hidden="true"></i><b> Quality</b></label>
                    </div>
                    <div class="col-sm-6">
                      <input id="edit_target_quality" type="number" class="form-control" name="edit_target_quality" placeholder="5" min="0" max="5" required>
                    </div>
                  </div>
                  <!-- Quality -->

                  <!-- Efficiency -->
                  <div class="row form-group">
                    <div class="col-sm-6">
                      <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-calendar-plus-o" aria-hidden="true"></i><b> Efficiency</b></label>
                    </div>
                    <div class="col-sm-6">
                           <input id="edit_target_efficiency" type="number" class="form-control" name="edit_target_efficiency" placeholder="5" min="0" max="5" required>
                    </div>
                  </div>
                  <!-- Efficiency -->

                  <!-- Efficiency -->
                  <div class="row form-group">
                    <div class="col-sm-6">
                      <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-clock-o" aria-hidden="true"></i><b> Timeliness</b></label>
                    </div>
                    <div class="col-sm-6">
                           <input id="edit_target_timeliness" type="number" class="form-control" name="edit_target_timeliness" placeholder="5" min="0" max="5" required>
                    </div>
                  </div>
                  <!-- Efficiency -->

            </div>
            <!-- Modal Body-->
                          
            <div class="modal-footer">
              <div class="btn-group">
                <button id="edit_target_submit" type="submit" class="btn btn-danger">Submit</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>	
              </div>

              <div id="loading_indicator" class="spinner-grow text-primary" style="display: none;" role="status">
                <span class="sr-only">Loading... </span>
              </div>	
            </div>	
<!-- Form --> </form>	
          </div>
          </div>
      </div>
<!-- End Rate Accomplishment -->

<!-- Modal Edit Target -->
  <div class="modal fade delete" id="edit_ou_target_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">	
          <div class="modal-content">

            <div class="modal-header">
              <h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-bullseye"></i> Target</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Modal Body-->
            <div class="modal-body">
<!-- Form --> <form action="" method="POST" id="edit_ou_target_form" role="form">
                <input type="hidden" id="edit_ou_target_ind_id" name="edit_ou_target_ind_id">
                <input type="hidden" id="edit_ou_target_desc" name="edit_ou_target_desc">
                <div class="alert alert-warning">
                  <p id="ind_desc1"></p>
                </div>
                 <!-- Target -->
                 <div class="row form-group">
                    <div class="col-sm-4">
                      <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-bullseye" aria-hidden="true"></i><b> Target</b></label>
                    </div>
                    <div class="col-sm-8">
                      <input id="edit_ou_target_val" type="text" class="form-control" name="edit_ou_target_val" required>
                    </div>
                  </div>
                  <!-- Target -->

                  <!-- Target -->
                 <div class="row form-group">
                    <div class="col-sm-4">
                      <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-user" aria-hidden="true"></i><b> Employee</b></label>
                    </div>
                    <div class="col-sm-8">
                    <select id="emp_name_edit_1" class="form-control" name="emp_name_edit_1">   
                    </select>
                    </div>
                  </div>
                  <!-- Target -->

                   <!-- Target -->
                 <div class="row form-group">
                    <div class="col-sm-4">
                      <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-user" aria-hidden="true"></i><b> Employee (JO)</b></label>
                    </div>
                    <div class="col-sm-8">
                    <select id="emp_name_edit_2" class="form-control" name="emp_name_edit_2">   
                    </select>
                    </div>
                  </div>
                  <!-- Target -->

                

            </div>
            <!-- Modal Body-->
                          
            <div class="modal-footer">
              <div class="btn-group">
                <button id="edit_target_submit" type="submit" class="btn btn-danger">Submit</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>	
              </div>

              <div id="loading_indicator" class="spinner-grow text-primary" style="display: none;" role="status">
                <span class="sr-only">Loading... </span>
              </div>	
            </div>	
<!-- Form --> </form>	
          </div>
          </div>
      </div>
<!-- End Modal Edit Target -->

<!-- Modal Delete Accomplishment -->
      <div class="modal fade delete" id="delete_accomplishment_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">	
          <div class="modal-content">

            <div class="modal-header">
              <h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-trash"></i> Delete?</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Modal Body-->
            <div class="modal-body">
<!-- Form --> <form action="" method="POST" id="del_target_form" role="form">
                <input type="hidden" id="ind_id_del" name="ind_id_del">  
                  <p>Are you sure you want to <b>DELETE</b> this record?</p>
            </div>
            <!-- Modal Body-->
                          
            <div class="modal-footer">
              <div class="btn-group">
                <button id="delete_target_submit" type="submit" class="btn btn-danger">Submit</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>	
              </div>

              <div id="loading_indicator" class="spinner-grow text-primary" style="display: none;" role="status">
                <span class="sr-only">Loading... </span>
              </div>	
            </div>	
<!-- Form --> </form>	
          </div>
          </div>
      </div>
<!-- End Delete Accomplishment -->


      <script type="text/javascript">
          $(document).ready(function(){//Open
           
//-----------call function summary------------------
            var year_pmr = <?php echo date("Y")?>;
            show_pmr(year_pmr); 
            //show_pobatanes(year_pmr); 
//-----------call function summary------------------
          
//-----------function show summary-----------
              function show_pmr(year_pmr){
                  $.ajax({
                      type  : 'GET',
                      url   : '<?php echo base_url().'get_pmr_pap/'?>'+year_pmr,
                      async : true,
                      dataType : 'json',
                      success : function(data){
                          $('#pap_table_body').html("");
                          var html = '';
                          var i;
                          var x=1;
                          for(i=0; i<data.length; i++){
                            var link = '<?php echo base_url().'uploads/evidence/'?>'+data[i].ind_id+'/';
                             html += '<tr>'+
                                          '<td>'+x+'</td>'+
                                          '<td>'+data[i].ind_target+'</td>'+
                                          '<td>'+data[i].ind_desc.toUpperCase()+'</td>'+
                                          '<td></td>'+
                                          '<td></td>'+
                                          '<td></td>'+
                                          '<td></td>'+
                                          '<td></td>'+
                                          '<td></td>'+
                                          '<td> <a href="'+ link +'" target="_blank">View</td>'+
                                      '</tr>';
                                      x=x+1;
                          }
                          $('#pap_table_body').html(html);
                      }
                  });

                  
              }
//-----------function show summary-----------

//-----------filter year to database-------------------
            $('#filter_year_pmr').on('click',function(){
                  $('#pap_table_body').empty();
                  $('#pap_table').DataTable();
                  year_pmr = $('#year_pmr').val();
                  show_pmr(year_pmr);
                  show_pobatanes(year_pmr);
              });
//-----------filter year to database-------------------

//-----------set variable to tab-------------------
                          var selectedTabValue;
                          var tbody;
                          $('.nav-link').click(function() {
                            var year_pmr = <?php echo date("Y")?>;
                            selectedTabValue = $(this).attr('data-value');
                            console.log(selectedTabValue);
                            var tbody = $("#pobatanes_table tbody");
                            // Remove all the rows from the tbody
                            tbody.empty();
                            show_pobatanes(year_pmr, selectedTabValue);
                            get_employees(selectedTabValue);
                            get_employees1(selectedTabValue);
                          });
//-----------set variable to tab-------------------

//-------------------get employees----------------------
                function get_employees(selectedTabValue){
                    $.ajax({
                      type  : 'POST',
                      url   : '<?php echo base_url().'get_employees_plantilla_1'?>',
                      dataType : 'json',
                      data: {selectedTabValue:selectedTabValue},
                      success : function(data){
                          var html = '<option value="">--Select Employee--</option>';
                          var i;
                          var x=1;
                          for(i=0; i<data.length; i++){
                              html += '<option value="'+data[i].usr_id+'">'+
                                        data[i].usr_name
                                      '</option>';
                          }
                          $('#emp_name_edit_1').html(html);
                      }
                  });
                };

//-------------------get employees----------------------

//-------------------get employees----------------------
                function get_employees1(selectedTabValue){
                    $.ajax({
                      type  : 'POST',
                      url   : '<?php echo base_url().'get_employees_plantilla_2'?>',
                      dataType : 'json',
                      data: {selectedTabValue:selectedTabValue},
                      success : function(data){
                          var html = '<option value="">--Select Employee--</option>';
                          var i;
                          var x=1;
                          for(i=0; i<data.length; i++){
                              html += '<option value="'+data[i].usr_id+'">'+
                                        data[i].usr_name
                                      '</option>';
                          }
                          $('#emp_name_edit_2').html(html);
                      }
                  });
                };

//-------------------get employees----------------------

                function show_pobatanes(year_pmr, selectedTabValue){
                  $.ajax({
                      type  : 'GET',
                      url   : '<?php echo base_url().'get_pmr_pobatanes/'?>'+year_pmr+'-'+selectedTabValue,
                      async : true,
                      dataType : 'json',
                      success : function(data){
                         
                          var link = '<?php echo base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/evidence/'?>';
                          var month = "<?= date("F")?>";
                          var html = '';
                          var January_Submitted = '';
                          var i;
                          var x=1;
                          var first_quarter_quality = new Array();
                          var first_quarter_timeliness = new Array();
                          var first_quarter_efficiency = new Array();
                          for(i=0; i<data.length; i++){

                            //------------------GUI of Accomplishment------------------
//-------------------------OUs Target-----------------------
                          switch (selectedTabValue) {
                            case "ro_target":
                                if(data[i].ro_target == null || data[i].ro_target == ""){
                                  var ind_ous_target = '';
                                }else{
                                  var ind_ous_target = '<b>'+ data[i].ro_target +'</b>';
                                }
                                var ous_target = '<span class="badge bg-primary badge-corner"><a data-toggle="modal" href="#edit_ou_target_modal" id="view" class="ous_target_edit_ind" style="color:white" data-ind_id1="'+ data[i].ind_id +'" data-ous_desc="ro_target" data-edit_target_desc="'+ data[i].ind_desc +'" data-po_batanes_target="'+ data[i].ro_target +'"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a></span> <br>'+ ind_ous_target;                                  
                                break;
                            case "po_batanes_target":
                                if(data[i].po_batanes_target == null || data[i].po_batanes_target == ""){
                                  var ind_ous_target = '';
                                }else{
                                  var ind_ous_target = '<b>'+ data[i].po_batanes_target +'</b>';
                                }
                                var ous_target = '<span class="badge bg-primary badge-corner"><a data-toggle="modal" href="#edit_ou_target_modal" id="view" class="ous_target_edit_ind" style="color:white" data-ind_id1="'+ data[i].ind_id +'" data-ous_desc="po_batanes_target" data-edit_target_desc="'+ data[i].ind_desc +'" data-po_batanes_target="'+ data[i].po_batanes_target +'"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a></span> <br>'+ ind_ous_target;                                  
                                break;
                            case "ptc_batanes_target":
                                if(data[i].ptc_batanes_target == null || data[i].ptc_batanes_target == ""){
                                  var ind_ous_target = '';
                                }else{
                                  var ind_ous_target = '<b>'+ data[i].ptc_batanes_target +'</b>';
                                }
                                var ous_target = '<span class="badge bg-primary badge-corner"><a data-toggle="modal" href="#edit_ou_target_modal" id="view" class="ous_target_edit_ind" style="color:white" data-ind_id1="'+ data[i].ind_id +'" data-ous_desc="ptc_batanes_target" data-edit_target_desc="'+ data[i].ind_desc +'" data-po_batanes_target="'+ data[i].ptc_batanes_target +'"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a></span> <br>'+ ind_ous_target;                                  
                                break;    
                            case "po_cagayan_target":
                                if(data[i].po_cagayan_target == null || data[i].po_cagayan_target == ""){
                                  var ind_ous_target = '';
                                }else{
                                  var ind_ous_target = '<b>'+ data[i].po_cagayan_target +'</b>';
                                }
                                var ous_target = '<span class="badge bg-primary badge-corner"><a data-toggle="modal" href="#edit_ou_target_modal" id="view" class="ous_target_edit_ind" style="color:white" data-ind_id1="'+ data[i].ind_id +'" data-ous_desc="po_cagayan_target" data-edit_target_desc="'+ data[i].ind_desc +'" data-po_batanes_target="'+ data[i].po_cagayan_target +'"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a></span> <br>'+ ind_ous_target;                                  
                                break; 
                            case "ptc_cagayan_target":
                                if(data[i].ptc_cagayan_target == null || data[i].ptc_cagayan_target == ""){
                                  var ind_ous_target = '';
                                }else{
                                  var ind_ous_target = '<b>'+ data[i].ptc_cagayan_target +'</b>';
                                }
                                var ous_target = '<span class="badge bg-primary badge-corner"><a data-toggle="modal" href="#edit_ou_target_modal" id="view" class="ous_target_edit_ind" style="color:white" data-ind_id1="'+ data[i].ind_id +'" data-ous_desc="ptc_cagayan_target" data-edit_target_desc="'+ data[i].ind_desc +'" data-po_batanes_target="'+ data[i].ptc_cagayan_target +'"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a></span> <br>'+ ind_ous_target;                                  
                                break; 
                            case "api_target":
                                if(data[i].api_target == null || data[i].api_target == ""){
                                  var ind_ous_target = '';
                                }else{
                                  var ind_ous_target = '<b>'+ data[i].api_target +'</b>';
                                }
                                var ous_target = '<span class="badge bg-primary badge-corner"><a data-toggle="modal" href="#edit_ou_target_modal" id="view" class="ous_target_edit_ind" style="color:white" data-ind_id1="'+ data[i].ind_id +'" data-ous_desc="api_target" data-edit_target_desc="'+ data[i].ind_desc +'" data-po_batanes_target="'+ data[i].api_target +'"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a></span> <br>'+ ind_ous_target;                                  
                                break; 

                            case "lit_target":
                                if(data[i].lit_target == null || data[i].lit_target == ""){
                                  var ind_ous_target = '';
                                }else{
                                  var ind_ous_target = '<b>'+ data[i].lit_target +'</b>';
                                }
                                var ous_target = '<span class="badge bg-primary badge-corner"><a data-toggle="modal" href="#edit_ou_target_modal" id="view" class="ous_target_edit_ind" style="color:white" data-ind_id1="'+ data[i].ind_id +'" data-ous_desc="lit_target" data-edit_target_desc="'+ data[i].ind_desc +'" data-po_batanes_target="'+ data[i].lit_target +'"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a></span> <br>'+ ind_ous_target;                                  
                                break; 

                            case "rtc_target":
                                if(data[i].rtc_target == null || data[i].rtc_target == ""){
                                  var ind_ous_target = '';
                                }else{
                                  var ind_ous_target = '<b>'+ data[i].rtc_target +'</b>';
                                }
                                var ous_target = '<span class="badge bg-primary badge-corner"><a data-toggle="modal" href="#edit_ou_target_modal" id="view" class="ous_target_edit_ind" style="color:white" data-ind_id1="'+ data[i].ind_id +'" data-ous_desc="rtc_target" data-edit_target_desc="'+ data[i].ind_desc +'" data-po_batanes_target="'+ data[i].rtc_target +'"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a></span> <br>'+ ind_ous_target;                                  
                                break; 
                            case "po_isabela_target":
                                if(data[i].po_isabela_target == null || data[i].po_isabela_target == ""){
                                  var ind_ous_target = '';
                                }else{
                                  var ind_ous_target = '<b>'+ data[i].po_isabela_target +'</b>';
                                }
                                var ous_target = '<span class="badge bg-primary badge-corner"><a data-toggle="modal" href="#edit_ou_target_modal" id="view" class="ous_target_edit_ind" style="color:white" data-ind_id1="'+ data[i].ind_id +'" data-ous_desc="po_isabela_target" data-edit_target_desc="'+ data[i].ind_desc +'" data-po_batanes_target="'+ data[i].po_isabela_target +'"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a></span> <br>'+ ind_ous_target;                                  
                                break; 
                            case "ptc_isabela_target":
                                if(data[i].ptc_isabela_target == null || data[i].ptc_isabela_target == ""){
                                  var ind_ous_target = '';
                                }else{
                                  var ind_ous_target = '<b>'+ data[i].ptc_isabela_target +'</b>';
                                }
                                var ous_target = '<span class="badge bg-primary badge-corner"><a data-toggle="modal" href="#edit_ou_target_modal" id="view" class="ous_target_edit_ind" style="color:white" data-ind_id1="'+ data[i].ind_id +'" data-ous_desc="ptc_isabela_target" data-edit_target_desc="'+ data[i].ind_desc +'" data-po_batanes_target="'+ data[i].ptc_isabela_target +'"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a></span> <br>'+ ind_ous_target;                                  
                                break; 
                            case "isat_isabela_target":
                                if(data[i].isat_isabela_target == null || data[i].isat_isabela_target == ""){
                                  var ind_ous_target = '';
                                }else{
                                  var ind_ous_target = '<b>'+ data[i].isat_isabela_target +'</b>';
                                }
                                var ous_target = '<span class="badge bg-primary badge-corner"><a data-toggle="modal" href="#edit_ou_target_modal" id="view" class="ous_target_edit_ind" style="color:white" data-ind_id1="'+ data[i].ind_id +'" data-ous_desc="isat_isabela_target" data-edit_target_desc="'+ data[i].ind_desc +'" data-po_batanes_target="'+ data[i].isat_isabela_target +'"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a></span> <br>'+ ind_ous_target;                                  
                                break;  
                            case "sicat_isabela_target":
                                if(data[i].sicat_isabela_target == null || data[i].sicat_isabela_target == ""){
                                  var ind_ous_target = '';
                                }else{
                                  var ind_ous_target = '<b>'+ data[i].sicat_isabela_target +'</b>';
                                }
                                var ous_target = '<span class="badge bg-primary badge-corner"><a data-toggle="modal" href="#edit_ou_target_modal" id="view" class="ous_target_edit_ind" style="color:white" data-ind_id1="'+ data[i].ind_id +'" data-ous_desc="sicat_isabela_target" data-edit_target_desc="'+ data[i].ind_desc +'" data-po_batanes_target="'+ data[i].sicat_isabela_target +'"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a></span> <br>'+ ind_ous_target;                                  
                                break; 
                            case "po_nv_target":
                                if(data[i].po_nv_target == null || data[i].po_nv_target == ""){
                                  var ind_ous_target = '';
                                }else{
                                  var ind_ous_target = '<b>'+ data[i].po_nv_target +'</b>';
                                }
                                var ous_target = '<span class="badge bg-primary badge-corner"><a data-toggle="modal" href="#edit_ou_target_modal" id="view" class="ous_target_edit_ind" style="color:white" data-ind_id1="'+ data[i].ind_id +'" data-ous_desc="po_nv_target" data-edit_target_desc="'+ data[i].ind_desc +'" data-po_batanes_target="'+ data[i].po_nv_target +'"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a></span> <br>'+ ind_ous_target;                                  
                                break; 
                            case "ptc_nv_target":
                                if(data[i].ptc_nv_target == null || data[i].ptc_nv_target == ""){
                                  var ind_ous_target = '';
                                }else{
                                  var ind_ous_target = '<b>'+ data[i].ptc_nv_target +'</b>';
                                }
                                var ous_target = '<span class="badge bg-primary badge-corner"><a data-toggle="modal" href="#edit_ou_target_modal" id="view" class="ous_target_edit_ind" style="color:white" data-ind_id1="'+ data[i].ind_id +'" data-ous_desc="ptc_nv_target" data-edit_target_desc="'+ data[i].ind_desc +'" data-po_batanes_target="'+ data[i].ptc_nv_target +'"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a></span> <br>'+ ind_ous_target;                                  
                                break;   
                            case "nvpi_target":
                                if(data[i].nvpi_target == null || data[i].nvpi_target == ""){
                                  var ind_ous_target = '';
                                }else{
                                  var ind_ous_target = '<b>'+ data[i].nvpi_target +'</b>';
                                }
                                var ous_target = '<span class="badge bg-primary badge-corner"><a data-toggle="modal" href="#edit_ou_target_modal" id="view" class="ous_target_edit_ind" style="color:white" data-ind_id1="'+ data[i].ind_id +'" data-ous_desc="nvpi_target" data-edit_target_desc="'+ data[i].ind_desc +'" data-po_batanes_target="'+ data[i].nvpi_target +'"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a></span> <br>'+ ind_ous_target;                                  
                                break;  
                            case "po_quirino_target":
                                if(data[i].po_quirino_target == null || data[i].po_quirino_target == ""){
                                  var ind_ous_target = '';
                                }else{
                                  var ind_ous_target = '<b>'+ data[i].po_quirino_target +'</b>';
                                }
                                var ous_target = '<span class="badge bg-primary badge-corner"><a data-toggle="modal" href="#edit_ou_target_modal" id="view" class="ous_target_edit_ind" style="color:white" data-ind_id1="'+ data[i].ind_id +'" data-ous_desc="po_quirino_target" data-edit_target_desc="'+ data[i].ind_desc +'" data-po_batanes_target="'+ data[i].po_quirino_target +'"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a></span> <br>'+ ind_ous_target;                                  
                                break;   
                            case "ptc_quirino_target":
                                if(data[i].ptc_quirino_target == null || data[i].ptc_quirino_target == ""){
                                  var ind_ous_target = '';
                                }else{
                                  var ind_ous_target = '<b>'+ data[i].ptc_quirino_target +'</b>';
                                }
                                var ous_target = '<span class="badge bg-primary badge-corner"><a data-toggle="modal" href="#edit_ou_target_modal" id="view" class="ous_target_edit_ind" style="color:white" data-ind_id1="'+ data[i].ind_id +'" data-ous_desc="ptc_quirino_target" data-edit_target_desc="'+ data[i].ind_desc +'" data-po_batanes_target="'+ data[i].ptc_quirino_target +'"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a></span> <br>'+ ind_ous_target;                                  
                                break;                   
                          }

//-------------------------OUs Target-----------------------

//-------------------------January--------------------------
                            //Output
                            if(data[i].January_Accomplishment == null || data[i].January_Accomplishment == ""){
                              var January_Accomplishment = '<span class="badge bg-red badge-corner"><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Accomplishment: <i class="fa fa-times" aria-hidden="true"></i></span>';;
                             }else{
                              var January_Accomplishment = '<span class="badge badge-corner" style="background-color:#00695C; color:white"><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Accomplishment: <b class="text-wrap">'+ data[i].January_Accomplishment +'</b></span>';
                             }

                             //File
                            if(data[i].January_Filename == null || data[i].January_Filename == ""){
                              var January_Filename = '<span class="badge bg-red badge-corner"><i class="fa fa-paperclip" aria-hidden="true"></i> File: <i class="fa fa-times" aria-hidden="true"></i></span>';;
                             }else{
                              January_Filename = '<span class="badge badge-corner" style="background-color:#00695C; color:white"><i class="fa fa-paperclip" aria-hidden="true"></i> View Attachment: <a href="'+ link + data[i].ind_id + '/' + data[i].January_Filename +'" target="_blank"><i class="fa fa-eye" style="color:white;"></i></a></span>';
                             }

                            //Date Submitted
                            if(data[i].January_Target == null || data[i].January_Target == ""){
                              var January_Submitted = '<span class="badge bg-red badge-corner">Date Submitted: <i class="fa fa-times" aria-hidden="true"></i></span>';;
                            }else{
                              var January_Submitted = '<span class="badge badge-corner" style="background-color:#00695C; color:white"><i class="fa fa-calendar" aria-hidden="true"></i> Date Submitted: <b>'+ data[i].January_Target +'</b></span>';
                            }

                            
                            if (month == 'January'){
                              var January_Add = '<span class="badge bg-primary badge-corner"><a data-toggle="modal" href="#edit_target_modal" id="view" class="January_edit" style="color:white" data-ind_id="'+ data[i].ind_id +'" data-edit_target_id="'+ data[i].January_ID +'" data-edit_target_accomplishment="'+ data[i].January_Accomplishment +'" data-edit_target_month="January" data-edit_target_desc="'+ data[i].ind_desc +'" data-edit_deadline="'+ data[i].ind_jan +'" data-ous_editor="'+ selectedTabValue +'" data-filename="'+data[i].January_Filename+'"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a></span> &nbsp';
                              var January_Delete = '<span class="badge bg-danger badge-corner"><a data-toggle="modal" href="#delete_accomplishment_modal" id="view" class="January_edit" style="color:white" data-ind_id="'+ data[i].ind_id +'" data-ind_id_del="'+ data[i].January_ID +'" data-del_target_desc="'+ data[i].ind_desc +'"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a></span> &nbsp';
                              //Deadline
                              if(data[i].ind_jan == null || data[i].ind_jan == ""){
                                var January_Deadline = '<span class="badge bg-warning badge-corner">Deadline: <i class="fa fa-times" aria-hidden="true"></i></span><br>';
                              }else{
                                var January_Deadline = '<span class="badge badge-warning"><i class="fa fa-calendar" aria-hidden="true"></i> Deadline: <b class="blinking">'+ data[i].ind_jan +'</b></span>';
                              }
                            }else{
                              <?php if($this->session->role == 'Super Admin' || $this->session->role == 'Admin'){?>
                                var January_Add = '<span class="badge bg-primary badge-corner"><a data-toggle="modal" href="#edit_target_modal" id="view" class="January_edit" style="color:white" data-ind_id="'+ data[i].ind_id +'" data-edit_target_id="'+ data[i].January_ID +'" data-edit_target_accomplishment="'+ data[i].January_Accomplishment +'" data-edit_target_month="January" data-edit_target_desc="'+ data[i].ind_desc +'" data-edit_deadline="'+ data[i].ind_jan +'" data-ous_editor="'+ selectedTabValue +'" data-filename="'+data[i].January_Filename+'"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a></span> &nbsp';
                                var January_Delete = '<span class="badge bg-danger badge-corner"><a data-toggle="modal" href="#delete_accomplishment_modal" id="view" class="January_edit" style="color:white" data-ind_id="'+ data[i].ind_id +'" data-ind_id_del="'+ data[i].January_ID +'" data-del_target_desc="'+ data[i].ind_desc +'"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a></span> &nbsp';
                              <?php } else{ ?> 
                                var January_Add = '';
                                var January_Delete = '';
                              <?php } ?> 
                              var January_Deadline = '<span class="badge bg-red"><i class="fa fa-calendar" aria-hidden="true"></i> Deadline: <b>'+ data[i].ind_jan +'</b></span>';
                            }

                            <?php if($this->session->role == 'Super Admin' || $this->session->role == 'Admin'){?>
                              var January_Rating = '<span class="badge bg-warning badge-corner"><a data-toggle="modal" href="#rate_target_modal" id="view" class="rate_edit" style="color:white" data-edit_target_id="'+ data[i].January_ID +'" data-edit_target_desc="'+ data[i].ind_desc +'" data-edit_target_accomplishment="'+ data[i].January_Accomplishment +'" data-edit_target_submitted="'+ data[i].January_Target +'" data-edit_target_link="'+ link + data[i].ind_id + '/' +data[i].January_Filename +'" data-edit_target_month="January" data-evi_q="'+ data[i].January_q +'" data-evi_e="'+ data[i].January_e +'" data-evi_t="'+ data[i].January_t +'"><i class="fa fa-star" aria-hidden="true"></i> Rate</a></span><br>';
                            <?php } else{ ?> 
                              var January_Rating = '';
                            <?php } ?> 

                            //Rating Result
                            if(data[i].January_q == null || data[i].January_q == ""){
                              var January_quality = '';
                            }else{
                              var January_quality = '<span class="badge badge-corner" style="background-color:#E64A19; color:white"><i class="fa fa-star" aria-hidden="true"></i> Quality: <b>'+ data[i].January_q +'</b></span><br>';
                              first_quarter_quality.push(parseInt(data[i].January_q));
                            }

                            if(data[i].January_e == null || data[i].January_e == ""){
                              var January_efficiency = '';
                            }else{
                              var January_efficiency = '<span class="badge badge-corner" style="background-color:#E64A19; color:white"><i class="fa fa-star" aria-hidden="true"></i> Efficiency: <b>'+ data[i].January_e +'</b></span><br>';
                              first_quarter_efficiency.push(parseInt(data[i].January_e));
                            }

                            if(data[i].January_t == null || data[i].January_t == ""){
                              var January_timeliness = '';
                            }else{
                              var January_timeliness = '<span class="badge badge-corner" style="background-color:#E64A19; color:white"><i class="fa fa-star" aria-hidden="true"></i> Timeliness: <b>'+ data[i].January_t +'</b></span><br>';
                              first_quarter_timeliness.push(parseInt(data[i].January_t));
                            }

                            var January = January_Add + January_Delete + January_Rating + January_Accomplishment +'<br>' + January_Filename + '<br>'+ January_Submitted + '<br>'+ January_Deadline + '<br>'+ January_quality + January_efficiency + January_timeliness;
//-------------------------January--------------------------

//-------------------------February--------------------------
                            //Output
                            if(data[i].February_Accomplishment == null){
                              var February_Accomplishment = '<span class="badge bg-red badge-corner"><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Accomplishment: <i class="fa fa-times" aria-hidden="true"></i></span>';;
                             }else{
                              var February_Accomplishment = '<span class="badge badge-corner" style="background-color:#00695C; color:white"><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Accomplishment: <b>'+ data[i].February_Accomplishment +'</b></span>';
                             }

                             //File
                            if(data[i].February_Filename == null || data[i].February_Filename == ""){
                              var February_Filename = '<span class="badge bg-red badge-corner"><i class="fa fa-paperclip" aria-hidden="true"></i> File: <i class="fa fa-times" aria-hidden="true"></i></span>';;
                             }else{
                              var February_Filename = '<span class="badge badge-corner" style="background-color:#00695C; color:white"><i class="fa fa-paperclip" aria-hidden="true"></i> View Attachment: <a href="'+ link + data[i].ind_id + '/' + data[i].February_Filename +'" target="_blank"><i class="fa fa-eye" style="color:white;"></i></a></span>';
                             }

                             //Date Submitted
                             if(data[i].February_Target == null){
                              var February_Submitted = '<span class="badge bg-red badge-corner">Date Submitted: <i class="fa fa-times" aria-hidden="true"></i></span>';;
                             }else{
                              var February_Submitted = '<span class="badge badge-corner" style="background-color:#00695C; color:white"><i class="fa fa-calendar" aria-hidden="true"></i> Date Submitted: <b>'+ data[i].February_Target +'</b></span>';
                             }

                            if (month == 'February'){
                              var February_Add = '<span class="badge bg-primary badge-corner"><a data-toggle="modal" href="#edit_target_modal" id="view" class="January_edit" style="color:white" data-ind_id="'+ data[i].ind_id +'" data-edit_target_id="'+ data[i].February_ID +'" data-edit_target_accomplishment="'+ data[i].February_Accomplishment +'" data-edit_target_month="February" data-edit_target_desc="'+ data[i].ind_desc +'" data-edit_deadline="'+ data[i].ind_feb +'" data-ous_editor="'+ selectedTabValue +'" data-filename="'+data[i].February_Filename+'"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a></span> &nbsp';
                              var February_Delete = '<span class="badge bg-danger badge-corner"><a data-toggle="modal" href="#delete_accomplishment_modal" id="view" class="January_edit" style="color:white" data-ind_id="'+ data[i].ind_id +'" data-ind_id_del="'+ data[i].February_ID +'" data-del_target_desc="'+ data[i].ind_desc +'"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a></span> &nbsp';
                              //Deadline
                              if(data[i].ind_feb == null || data[i].ind_feb == ""){
                                var February_Deadline = '<span class="badge bg-warning badge-corner">Deadline: <i class="fa fa-times" aria-hidden="true"></i></span><br>';
                              }else{
                                var February_Deadline = '<span class="badge badge-warning"><i class="fa fa-calendar" aria-hidden="true"></i> Deadline: <b class="">'+ data[i].ind_feb +'</b></span>';
                              }
                            }else{
                              <?php if($this->session->role == 'Super Admin' || $this->session->role == 'Admin'){?>
                                var February_Add = '<span class="badge bg-primary badge-corner"><a data-toggle="modal" href="#edit_target_modal" id="view" class="January_edit" style="color:white" data-ind_id="'+ data[i].ind_id +'" data-edit_target_id="'+ data[i].February_ID +'" data-edit_target_accomplishment="'+ data[i].February_Accomplishment +'" data-edit_target_month="February" data-edit_target_desc="'+ data[i].ind_desc +'" data-edit_deadline="'+ data[i].ind_feb +'" data-ous_editor="'+ selectedTabValue +'" data-filename="'+data[i].February_Filename+'"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a></span> &nbsp';  
                                var February_Delete = '<span class="badge bg-danger badge-corner"><a data-toggle="modal" href="#delete_accomplishment_modal" id="view" class="January_edit" style="color:white" data-ind_id="'+ data[i].ind_id +'" data-ind_id_del="'+ data[i].February_ID +'" data-del_target_desc="'+ data[i].ind_desc +'"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a></span> &nbsp';
                                <?php } else{ ?> 
                                var February_Add = '';
                                var February_Delete = '';
                              <?php } ?> 
                              var February_Deadline = '<span class="badge bg-red"><i class="fa fa-calendar" aria-hidden="true"></i> Deadline: <b>'+ data[i].ind_feb +'</b></span>';
                            }

                            <?php if($this->session->role == 'Super Admin' || $this->session->role == 'Admin'){?>
                              var February_Rating = '<span class="badge bg-warning badge-corner"><a data-toggle="modal" href="#rate_target_modal" id="view" class="rate_edit" style="color:white" data-edit_target_id="'+ data[i].February_ID +'" data-edit_target_desc="'+ data[i].ind_desc +'" data-edit_target_accomplishment="'+ data[i].February_Accomplishment +'" data-edit_target_submitted="'+ data[i].February_Target +'" data-edit_target_link="'+ link + data[i].February_Filename +'" data-edit_target_month="February" data-evi_q="'+ data[i].February_q +'" data-evi_e="'+ data[i].February_e +'" data-evi_t="'+ data[i].February_t +'"><i class="fa fa-star" aria-hidden="true"></i> Rate</a></span><br>';
                            <?php } else{ ?> 
                              var February_Rating = '';
                            <?php } ?> 

                            //Rating Result
                            if(data[i].February_q == null){
                              var February_quality = '';
                            }else{
                              var February_quality = '<span class="badge badge-corner" style="background-color:#E64A19; color:white"><i class="fa fa-star" aria-hidden="true"></i> Quality: <b>'+ data[i].February_q +'</b></span><br>';
                              //first_quarter_quality.push(parseInt(data[i].February_q));
                              //alert(first_quarter_quality);
                            }

                            if(data[i].February_e == null){
                              var February_efficiency = '';
                            }else{
                              var February_efficiency = '<span class="badge badge-corner" style="background-color:#E64A19; color:white"><i class="fa fa-star" aria-hidden="true"></i> Efficiency: <b>'+ data[i].February_e +'</b></span><br>';
                              //first_quarter_efficiency.push(parseInt(data[i].February_e));
                            }

                            if(data[i].February_t == null){
                              var February_timeliness = '';
                            }else{
                              var February_timeliness = '<span class="badge badge-corner" style="background-color:#E64A19; color:white"><i class="fa fa-star" aria-hidden="true"></i> Timeliness: <b>'+ data[i].February_t +'</b></span><br>';
                              //first_quarter_timeliness.push(parseInt(data[i].February_t));
                            }

                            var February = February_Add + February_Delete + February_Rating + February_Accomplishment +'<br>' + February_Filename + '<br>'+ February_Submitted + '<br>'+ February_Deadline + '<br>' + February_quality + February_efficiency + February_timeliness;
//-------------------------February--------------------------

//-------------------------March--------------------------
                            //Output
                            if(data[i].March_Accomplishment == null){
                              var March_Accomplishment = '<span class="badge bg-red badge-corner"><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Accomplishment: <i class="fa fa-times" aria-hidden="true"></i></span>';;
                             }else{
                              var March_Accomplishment = '<span class="badge badge-corner" style="background-color:#00695C; color:white"><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Accomplishment: <b>'+ data[i].March_Accomplishment +'</b></span>';
                             }

                             //File
                            if(data[i].March_Filename == null || data[i].March_Filename == ""){
                              var March_Filename = '<span class="badge bg-red badge-corner"><i class="fa fa-paperclip" aria-hidden="true"></i> File: <i class="fa fa-times" aria-hidden="true"></i></span>';;
                             }else{
                              var March_Filename = '<span class="badge badge-corner" style="background-color:#00695C; color:white"><i class="fa fa-paperclip" aria-hidden="true"></i> View Attachment: <a href="'+ link + data[i].ind_id + '/' + data[i].March_Filename +'" target="_blank"><i class="fa fa-eye" style="color:white;"></i></a></span>';
                             }

                             //Date Submitted
                             if(data[i].March_Target == null){
                              var March_Submitted = '<span class="badge bg-red badge-corner">Date Submitted: <i class="fa fa-times" aria-hidden="true"></i></span>';;
                             }else{
                              var March_Submitted = '<span class="badge badge-corner" style="background-color:#00695C; color:white"><i class="fa fa-calendar" aria-hidden="true"></i> Date Submitted: <b>'+ data[i].March_Target +'</b></span>';
                             }

                            if (month == 'March'){
                              var March_Add = '<span class="badge bg-primary badge-corner"><a data-toggle="modal" href="#edit_target_modal" id="view" class="January_edit" style="color:white" data-ind_id="'+ data[i].ind_id +'" data-edit_target_id="'+ data[i].March_ID +'" data-edit_target_accomplishment="'+ data[i].March_Accomplishment +'" data-edit_target_month="March" data-edit_target_desc="'+ data[i].ind_desc +'" data-edit_deadline="'+ data[i].ind_mar +'" data-ous_editor="'+ selectedTabValue +'" data-filename="'+data[i].March_Filename+'"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a></span> &nbsp';
                              var March_Delete = '<span class="badge bg-danger badge-corner"><a data-toggle="modal" href="#delete_accomplishment_modal" id="view" class="January_edit" style="color:white" data-ind_id="'+ data[i].ind_id +'" data-ind_id_del="'+ data[i].March_ID +'" data-del_target_desc="'+ data[i].ind_desc +'"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a></span> &nbsp';
                              //Deadline
                              if(data[i].ind_mar == null || data[i].ind_mar == ""){
                                var March_Deadline = '<span class="badge bg-warning badge-corner">Deadline: <i class="fa fa-times" aria-hidden="true"></i></span><br>';
                              }else{
                                var March_Deadline = '<span class="badge badge-warning"><i class="fa fa-calendar" aria-hidden="true"></i> Deadline: <b class="blinking">'+ data[i].ind_mar +'</b></span>';
                              }
                            }else{
                              <?php if($this->session->role == 'Super Admin' || $this->session->role == 'Admin'){?>
                                var March_Add = '<span class="badge bg-primary badge-corner"><a data-toggle="modal" href="#edit_target_modal" id="view" class="January_edit" style="color:white" data-ind_id="'+ data[i].ind_id +'" data-edit_target_id="'+ data[i].March_ID +'" data-edit_target_accomplishment="'+ data[i].March_Accomplishment +'" data-edit_target_month="March" data-edit_target_desc="'+ data[i].ind_desc +'" data-edit_deadline="'+ data[i].ind_mar +'" data-ous_editor="'+ selectedTabValue +'" data-filename="'+data[i].March_Filename+'"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a></span> &nbsp';  
                                var March_Delete = '<span class="badge bg-danger badge-corner"><a data-toggle="modal" href="#delete_accomplishment_modal" id="view" class="January_edit" style="color:white" data-ind_id="'+ data[i].ind_id +'" data-ind_id_del="'+ data[i].March_ID +'" data-del_target_desc="'+ data[i].ind_desc +'"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a></span> &nbsp';
                                <?php } else{ ?> 
                                var March_Add = '';
                                var March_Delete = '';
                              <?php } ?> 
                              var March_Deadline = '<span class="badge bg-red"><i class="fa fa-calendar" aria-hidden="true"></i> Deadline: <b class="">'+ data[i].ind_mar +'</b></span>';
                            }

                            <?php if($this->session->role == 'Super Admin' || $this->session->role == 'Admin'){?>
                              var March_Rating = '<span class="badge bg-warning badge-corner"><a data-toggle="modal" href="#rate_target_modal" id="view" class="rate_edit" style="color:white" data-edit_target_id="'+ data[i].March_ID +'" data-edit_target_desc="'+ data[i].ind_desc +'" data-edit_target_accomplishment="'+ data[i].March_Accomplishment +'" data-edit_target_submitted="'+ data[i].March_Target +'" data-edit_target_link="'+ link + data[i].March_Filename +'" data-edit_target_month="March" data-evi_q="'+ data[i].March_q +'" data-evi_e="'+ data[i].March_e +'" data-evi_t="'+ data[i].March_t +'"><i class="fa fa-star" aria-hidden="true"></i> Rate</a></span><br>';
                            <?php } else{ ?> 
                              var March_Rating = '';
                            <?php } ?> 

                            //Rating Result
                            if(data[i].March_q == null){
                              var March_quality = '';
                            }else{
                              var March_quality = '<span class="badge badge-corner" style="background-color:#E64A19; color:white"><i class="fa fa-star" aria-hidden="true"></i> Quality: <b>'+ data[i].March_q +'</b></span><br>';
                              //first_quarter_quality.push(parseInt(data[i].February_q));
                              //alert(first_quarter_quality);
                            }

                            if(data[i].March_e == null){
                              var March_efficiency = '';
                            }else{
                              var March_efficiency = '<span class="badge badge-corner" style="background-color:#E64A19; color:white"><i class="fa fa-star" aria-hidden="true"></i> Efficiency: <b>'+ data[i].March_e +'</b></span><br>';
                              //first_quarter_efficiency.push(parseInt(data[i].February_e));
                            }

                            if(data[i].March_t == null){
                              var March_timeliness = '';
                            }else{
                              var March_timeliness = '<span class="badge badge-corner" style="background-color:#E64A19; color:white"><i class="fa fa-star" aria-hidden="true"></i> Timeliness: <b>'+ data[i].March_t +'</b></span><br>';
                              //first_quarter_timeliness.push(parseInt(data[i].February_t));
                            }

                            var March = March_Add + March_Delete + March_Rating + March_Accomplishment +'<br>' + March_Filename + '<br>'+ March_Submitted + '<br>'+ March_Deadline + March_quality + March_efficiency + March_timeliness;
//-------------------------March--------------------------
                             
//---------------------------First Quarter---------------------
                            if($.isNumeric(data[i].January_Accomplishment)){
                              var Jan = data[i].January_Accomplishment;
                            }else{
                              var Jan = 0;
                            }
                            if($.isNumeric(data[i].February_Accomplishment)){
                              var Feb = data[i].February_Accomplishment;
                            }else{
                              var Feb = 0;
                            }
                            if($.isNumeric(data[i].March_Accomplishment)){
                              var Mar = data[i].March_Accomplishment;
                            }else{
                              var Mar = 0;
                            }
                            var first_quarter = parseInt(Jan)+parseInt(Feb)+parseInt(Mar);
                            if($.isNumeric(first_quarter)){
                              first_quarter = first_quarter;
                            } else{
                              first_quarter = "System Error";
                            }

                            if($.isNumeric(parseInt(data[i].firstquater_q) / parseInt(data[i].firstquater_count))){
                              var val =parseInt(data[i].firstquater_q) / parseInt(data[i].firstquater_count);
                              var firstquater_q_val = '<br><span class="badge badge-corner" style="background-color:#E64A19; color:white"><i class="fa fa-star" aria-hidden="true"></i> Quality: <b>'+ val.toFixed(2) +'</b></span><br>';
                            }else{
                              var firstquater_q_val = '<br><span class="badge badge-corner" style="background-color:#E64A19; color:white"><i class="fa fa-star" aria-hidden="true"></i> Quality: <b></b></span><br>';
                            }

                            if($.isNumeric(parseInt(data[i].firstquater_e) / parseInt(data[i].firstquater_count_e))){
                              var val_e =parseInt(data[i].firstquater_e) / parseInt(data[i].firstquater_count_e)
                              var firstquater_e_val = '<span class="badge badge-corner" style="background-color:#E64A19; color:white"><i class="fa fa-star" aria-hidden="true"></i> Efficiency: <b>'+ val_e.toFixed(2) +'</b></span><br>';
                            }else{
                              var firstquater_e_val = '<span class="badge badge-corner" style="background-color:#E64A19; color:white"><i class="fa fa-star" aria-hidden="true"></i> Efficiency: <b></b></span><br>';
                            }

                            if($.isNumeric(parseInt(data[i].firstquater_t) / parseInt(data[i].firstquater_count_t))){
                              var val_t =parseInt(data[i].firstquater_t) / parseInt(data[i].firstquater_count_t)
                              var firstquater_t_val = '<span class="badge badge-corner" style="background-color:#E64A19; color:white"><i class="fa fa-star" aria-hidden="true"></i> Timeliness: <b>'+ val_t.toFixed(2) +'</b></span><br>';
                            }else{
                              var firstquater_t_val = '<span class="badge badge-corner" style="background-color:#E64A19; color:white"><i class="fa fa-star" aria-hidden="true"></i> Timeliness: <b></b></span><br>';
                            }

                            
//---------------------------First Quarter ---------------------  

//-------------------------April--------------------------
                            //Output
                            if(data[i].April_Accomplishment == null){
                              var April_Accomplishment = '<span class="badge bg-red badge-corner"><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Accomplishment: <i class="fa fa-times" aria-hidden="true"></i></span>';;
                             }else{
                              var April_Accomplishment = '<span class="badge badge-corner" style="background-color:#00695C; color:white"><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Accomplishment: <b>'+ data[i].April_Accomplishment +'</b></span>';
                             }

                             //File
                            if(data[i].April_Filename == null || data[i].April_Filename == ""){
                              var April_Filename = '<span class="badge bg-red badge-corner"><i class="fa fa-paperclip" aria-hidden="true"></i> File: <i class="fa fa-times" aria-hidden="true"></i></span>';;
                             }else{
                              var April_Filename = '<span class="badge badge-corner" style="background-color:#00695C; color:white"><i class="fa fa-paperclip" aria-hidden="true"></i> View Attachment: <a href="'+ link + data[i].ind_id + '/' + data[i].April_Filename +'" target="_blank"><i class="fa fa-eye" style="color:white;"></i></a></span>';
                             }

                             //Date Submitted
                             if(data[i].April_Target == null){
                              var April_Submitted = '<span class="badge bg-red badge-corner">Date Submitted: <i class="fa fa-times" aria-hidden="true"></i></span>';;
                             }else{
                              var April_Submitted = '<span class="badge badge-corner" style="background-color:#00695C; color:white"><i class="fa fa-calendar" aria-hidden="true"></i> Date Submitted: <b>'+ data[i].April_Target +'</b></span>';
                             }

                            if (month == 'April'){
                              var April_Add = '<span class="badge bg-primary badge-corner"><a data-toggle="modal" href="#edit_target_modal" id="view" class="January_edit" style="color:white" data-ind_id="'+ data[i].ind_id +'" data-edit_target_id="'+ data[i].April_ID +'" data-edit_target_accomplishment="'+ data[i].April_Accomplishment +'" data-edit_target_month="April" data-edit_target_desc="'+ data[i].ind_desc +'" data-edit_deadline="'+ data[i].ind_apr +'" data-ous_editor="'+ selectedTabValue +'" data-filename="'+data[i].April_Filename+'"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a></span> &nbsp';
                              var April_Delete = '<span class="badge bg-danger badge-corner"><a data-toggle="modal" href="#delete_accomplishment_modal" id="view" class="January_edit" style="color:white" data-ind_id="'+ data[i].ind_id +'" data-ind_id_del="'+ data[i].April_ID +'" data-del_target_desc="'+ data[i].ind_desc +'"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a></span> &nbsp';
                              //Deadline
                              if(data[i].ind_apr == null || data[i].ind_apr == ""){
                                var April_Deadline = '<span class="badge bg-warning badge-corner">Deadline: <i class="fa fa-times" aria-hidden="true"></i></span><br>';
                              }else{
                                var April_Deadline = '<span class="badge badge-warning"><i class="fa fa-calendar" aria-hidden="true"></i> Deadline: <b class="blinking">'+ data[i].ind_apr +'</b></span>';
                              }
                            }else{
                              <?php if($this->session->role == 'Super Admin' || $this->session->role == 'Admin'){?>
                                var April_Add = '<span class="badge bg-primary badge-corner"><a data-toggle="modal" href="#edit_target_modal" id="view" class="January_edit" style="color:white" data-ind_id="'+ data[i].ind_id +'" data-edit_target_id="'+ data[i].April_ID +'" data-edit_target_accomplishment="'+ data[i].April_Accomplishment +'" data-edit_target_month="April" data-edit_target_desc="'+ data[i].ind_desc +'" data-edit_deadline="'+ data[i].ind_apr +'" data-ous_editor="'+ selectedTabValue +'" data-filename="'+data[i].April_Filename+'"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a></span> &nbsp';  
                                var April_Delete = '<span class="badge bg-danger badge-corner"><a data-toggle="modal" href="#delete_accomplishment_modal" id="view" class="January_edit" style="color:white" data-ind_id="'+ data[i].ind_id +'" data-ind_id_del="'+ data[i].April_ID +'" data-del_target_desc="'+ data[i].ind_desc +'"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a></span> &nbsp';
                              <?php } else{ ?> 
                                var April_Add = '';
                                var April_Delete = '';
                              <?php } ?> 
                              var April_Deadline = '<span class="badge bg-red"><i class="fa fa-calendar" aria-hidden="true"></i> Deadline: <b>'+ data[i].ind_apr +'</b></span>';
                            }

                            <?php if($this->session->role == 'Super Admin' || $this->session->role == 'Admin'){?>
                              var April_Rating = '<span class="badge bg-warning badge-corner"><a data-toggle="modal" href="#rate_target_modal" id="view" class="rate_edit" style="color:white" data-edit_target_id="'+ data[i].April_ID +'" data-edit_target_desc="'+ data[i].ind_desc +'" data-edit_target_accomplishment="'+ data[i].April_Accomplishment +'" data-edit_target_submitted="'+ data[i].April_Target +'" data-edit_target_link="'+ link + data[i].April_Filename +'" data-edit_target_month="April" data-evi_q="'+ data[i].April_q +'" data-evi_e="'+ data[i].April_e +'" data-evi_t="'+ data[i].April_t +'"><i class="fa fa-star" aria-hidden="true"></i> Rate</a></span><br>';
                            <?php } else{ ?> 
                              var April_Rating = '';
                            <?php } ?> 

                            //Rating Result
                            if(data[i].April_q == null){
                              var April_quality = '';
                            }else{
                              var April_quality = '<span class="badge badge-corner" style="background-color:#E64A19; color:white"><i class="fa fa-star" aria-hidden="true"></i> Quality: <b>'+ data[i].April_q +'</b></span><br>';
                              //first_quarter_quality.push(parseInt(data[i].February_q));
                              //alert(first_quarter_quality);
                            }

                            if(data[i].April_e == null){
                              var April_efficiency = '';
                            }else{
                              var April_efficiency = '<span class="badge badge-corner" style="background-color:#E64A19; color:white"><i class="fa fa-star" aria-hidden="true"></i> Efficiency: <b>'+ data[i].April_e +'</b></span><br>';
                              //first_quarter_efficiency.push(parseInt(data[i].February_e));
                            }

                            if(data[i].April_t == null){
                              var April_timeliness = '';
                            }else{
                              var April_timeliness = '<span class="badge badge-corner" style="background-color:#E64A19; color:white"><i class="fa fa-star" aria-hidden="true"></i> Timeliness: <b>'+ data[i].April_t +'</b></span><br>';
                              //first_quarter_timeliness.push(parseInt(data[i].February_t));
                            }

                            var April = April_Add + April_Delete + April_Rating + April_Accomplishment +'<br>' + April_Filename + '<br>'+ April_Submitted + '<br>'+ April_Deadline + '<br>' + April_quality + April_efficiency + April_timeliness;
//-------------------------April--------------------------

//-------------------------May--------------------------
                            //Output
                            if(data[i].May_Accomplishment == null){
                              var May_Accomplishment = '<span class="badge bg-red badge-corner"><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Accomplishment: <i class="fa fa-times" aria-hidden="true"></i></span>';;
                             }else{
                              var May_Accomplishment = '<span class="badge badge-corner" style="background-color:#00695C; color:white"><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Accomplishment: <b>'+ data[i].May_Accomplishment +'</b></span>';
                             }

                             //File
                            if(data[i].May_Filename == null || data[i].May_Filename == ""){
                              var May_Filename = '<span class="badge bg-red badge-corner"><i class="fa fa-paperclip" aria-hidden="true"></i> File: <i class="fa fa-times" aria-hidden="true"></i></span>';;
                             }else{
                              var May_Filename = '<span class="badge badge-corner" style="background-color:#00695C; color:white"><i class="fa fa-paperclip" aria-hidden="true"></i> View Attachment: <a href="'+ link + data[i].ind_id + '/' + data[i].May_Filename +'" target="_blank"><i class="fa fa-eye" style="color:white;"></i></a></span>';
                             }

                             //Date Submitted
                             if(data[i].May_Target == null){
                              var May_Submitted = '<span class="badge bg-red badge-corner">Date Submitted: <i class="fa fa-times" aria-hidden="true"></i></span>';;
                             }else{
                              var May_Submitted = '<span class="badge badge-corner" style="background-color:#00695C; color:white"><i class="fa fa-calendar" aria-hidden="true"></i> Date Submitted: <b>'+ data[i].May_Target +'</b></span>';
                             }

                            if (month == 'May'){
                              var May_Add = '<span class="badge bg-primary badge-corner"><a data-toggle="modal" href="#edit_target_modal" id="view" class="January_edit" style="color:white" data-ind_id="'+ data[i].ind_id +'" data-edit_target_id="'+ data[i].May_ID +'" data-edit_target_accomplishment="'+ data[i].May_Accomplishment +'" data-edit_target_month="May" data-edit_target_desc="'+ data[i].ind_desc +'" data-edit_deadline="'+ data[i].ind_may +'" data-ous_editor="'+ selectedTabValue +'" data-filename="'+data[i].May_Filename+'"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a></span> &nbsp';
                              var May_Delete = '<span class="badge bg-danger badge-corner"><a data-toggle="modal" href="#delete_accomplishment_modal" id="view" class="January_edit" style="color:white" data-ind_id="'+ data[i].ind_id +'" data-ind_id_del="'+ data[i].May_ID +'" data-del_target_desc="'+ data[i].ind_desc +'"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a></span> &nbsp';
                              //Deadline
                              if(data[i].ind_may == null || data[i].ind_may == ""){
                                var May_Deadline = '<span class="badge bg-warning badge-corner">Deadline: <i class="fa fa-times" aria-hidden="true"></i></span><br>';
                              }else{
                                var May_Deadline = '<span class="badge badge-warning"><i class="fa fa-calendar" aria-hidden="true"></i> Deadline: <b class="blinking">'+ data[i].ind_may +'</b></span>';
                              }
                            }else{
                              <?php if($this->session->role == 'Super Admin' || $this->session->role == 'Admin'){?>
                                var May_Add = '<span class="badge bg-primary badge-corner"><a data-toggle="modal" href="#edit_target_modal" id="view" class="January_edit" style="color:white" data-ind_id="'+ data[i].ind_id +'" data-edit_target_id="'+ data[i].May_ID +'" data-edit_target_accomplishment="'+ data[i].May_Accomplishment +'" data-edit_target_month="May" data-edit_target_desc="'+ data[i].ind_desc +'" data-edit_deadline="'+ data[i].ind_may +'" data-ous_editor="'+ selectedTabValue +'" data-filename="'+data[i].May_Filename+'"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a></span> &nbsp';  
                                var May_Delete = '<span class="badge bg-danger badge-corner"><a data-toggle="modal" href="#delete_accomplishment_modal" id="view" class="January_edit" style="color:white" data-ind_id="'+ data[i].ind_id +'" data-ind_id_del="'+ data[i].May_ID +'" data-del_target_desc="'+ data[i].ind_desc +'"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a></span> &nbsp';
                                <?php } else{ ?> 
                                var May_Add = '';
                                var May_Delete = '';
                              <?php } ?> 
                              var May_Deadline = '<span class="badge bg-red"><i class="fa fa-calendar" aria-hidden="true"></i> Deadline: <b>'+ data[i].ind_may +'</b></span>';
                            }

                            <?php if($this->session->role == 'Super Admin' || $this->session->role == 'Admin'){?>
                              var May_Rating = '<span class="badge bg-warning badge-corner"><a data-toggle="modal" href="#rate_target_modal" id="view" class="rate_edit" style="color:white" data-edit_target_id="'+ data[i].May_ID +'" data-edit_target_desc="'+ data[i].ind_desc +'" data-edit_target_accomplishment="'+ data[i].May_Accomplishment +'" data-edit_target_submitted="'+ data[i].May_Target +'" data-edit_target_link="'+ link + data[i].May_Filename +'" data-edit_target_month="May" data-evi_q="'+ data[i].May_q +'" data-evi_e="'+ data[i].May_e +'" data-evi_t="'+ data[i].May_t +'"><i class="fa fa-star" aria-hidden="true"></i> Rate</a></span><br>';
                            <?php } else{ ?> 
                              var May_Rating = '';
                            <?php } ?> 

                            //Rating Result
                            if(data[i].May_q == null){
                              var May_quality = '';
                            }else{
                              var May_quality = '<span class="badge badge-corner" style="background-color:#E64A19; color:white"><i class="fa fa-star" aria-hidden="true"></i> Quality: <b>'+ data[i].May_q +'</b></span><br>';
                              //first_quarter_quality.push(parseInt(data[i].February_q));
                              //alert(first_quarter_quality);
                            }

                            if(data[i].May_e == null){
                              var May_efficiency = '';
                            }else{
                              var May_efficiency = '<span class="badge badge-corner" style="background-color:#E64A19; color:white"><i class="fa fa-star" aria-hidden="true"></i> Efficiency: <b>'+ data[i].May_e +'</b></span><br>';
                              //first_quarter_efficiency.push(parseInt(data[i].February_e));
                            }

                            if(data[i].May_t == null){
                              var May_timeliness = '';
                            }else{
                              var May_timeliness = '<span class="badge badge-corner" style="background-color:#E64A19; color:white"><i class="fa fa-star" aria-hidden="true"></i> Timeliness: <b>'+ data[i].May_t +'</b></span><br>';
                              //first_quarter_timeliness.push(parseInt(data[i].February_t));
                            }

                            var May1 = May_Add + May_Delete + May_Rating + May_Accomplishment +'<br>' + May_Filename + '<br>'+ May_Submitted + '<br>'+ May_Deadline + '<br>' + May_quality + May_efficiency + May_timeliness;
//-------------------------May--------------------------

//-------------------------June--------------------------
                            //Output
                            if(data[i].June_Accomplishment == null){
                              var June_Accomplishment = '<span class="badge bg-red badge-corner"><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Accomplishment: <i class="fa fa-times" aria-hidden="true"></i></span>';;
                             }else{
                              var June_Accomplishment = '<span class="badge badge-corner" style="background-color:#00695C; color:white"><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Accomplishment: <b>'+ data[i].June_Accomplishment +'</b></span>';
                             }

                             //File
                            if(data[i].June_Filename == null || data[i].June_Filename == ""){
                              var June_Filename = '<span class="badge bg-red badge-corner"><i class="fa fa-paperclip" aria-hidden="true"></i> File: <i class="fa fa-times" aria-hidden="true"></i></span>';;
                             }else{
                              var June_Filename = '<span class="badge badge-corner" style="background-color:#00695C; color:white"><i class="fa fa-paperclip" aria-hidden="true"></i> View Attachment: <a href="'+ link + data[i].ind_id + '/' + data[i].June_Filename +'" target="_blank"><i class="fa fa-eye" style="color:white;"></i></a></span>';
                             }

                             //Date Submitted
                             if(data[i].June_Target == null){
                              var June_Submitted = '<span class="badge bg-red badge-corner">Date Submitted: <i class="fa fa-times" aria-hidden="true"></i></span>';;
                             }else{
                              var June_Submitted = '<span class="badge badge-corner" style="background-color:#00695C; color:white"><i class="fa fa-calendar" aria-hidden="true"></i> Date Submitted: <b>'+ data[i].June_Target +'</b></span>';
                             }

                            if (month == 'June'){
                              var June_Add = '<span class="badge bg-primary badge-corner"><a data-toggle="modal" href="#edit_target_modal" id="view" class="January_edit" style="color:white" data-ind_id="'+ data[i].ind_id +'" data-edit_target_id="'+ data[i].June_ID +'" data-edit_target_accomplishment="'+ data[i].June_Accomplishment +'" data-edit_target_month="June" data-edit_target_desc="'+ data[i].ind_desc +'" data-edit_deadline="'+ data[i].ind_jun +'" data-ous_editor="'+ selectedTabValue +'" data-filename="'+data[i].June_Filename+'"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a></span> &nbsp';
                              var June_Delete = '<span class="badge bg-danger badge-corner"><a data-toggle="modal" href="#delete_accomplishment_modal" id="view" class="January_edit" style="color:white" data-ind_id="'+ data[i].ind_id +'" data-ind_id_del="'+ data[i].June_ID +'" data-del_target_desc="'+ data[i].ind_desc +'"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a></span> &nbsp';
                              //Deadline
                              if(data[i].ind_jun == null || data[i].ind_jun == ""){
                                var June_Deadline = '<span class="badge bg-warning badge-corner">Deadline: <i class="fa fa-times" aria-hidden="true"></i></span><br>';
                              }else{
                                var June_Deadline = '<span class="badge badge-warning"><i class="fa fa-calendar" aria-hidden="true"></i> Deadline: <b class="blinking">'+ data[i].ind_jun +'</b></span>';
                              }
                            }else{
                              <?php if($this->session->role == 'Super Admin' || $this->session->role == 'Admin'){?>
                                var June_Add = '<span class="badge bg-primary badge-corner"><a data-toggle="modal" href="#edit_target_modal" id="view" class="January_edit" style="color:white" data-ind_id="'+ data[i].ind_id +'" data-edit_target_id="'+ data[i].June_ID +'" data-edit_target_accomplishment="'+ data[i].June_Accomplishment +'" data-edit_target_month="June" data-edit_target_desc="'+ data[i].ind_desc +'" data-edit_deadline="'+ data[i].ind_jun +'" data-ous_editor="'+ selectedTabValue +'" data-filename="'+data[i].June_Filename+'"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a></span> &nbsp';  
                                var June_Delete = '<span class="badge bg-danger badge-corner"><a data-toggle="modal" href="#delete_accomplishment_modal" id="view" class="January_edit" style="color:white" data-ind_id="'+ data[i].ind_id +'" data-ind_id_del="'+ data[i].June_ID +'" data-del_target_desc="'+ data[i].ind_desc +'"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a></span> &nbsp';
                              <?php } else{ ?> 
                                var June_Add = '';
                                var June_Delete = '';
                              <?php } ?> 
                              var June_Deadline = '<span class="badge bg-red"><i class="fa fa-calendar" aria-hidden="true"></i> Deadline: <b>'+ data[i].ind_jun +'</b></span>';
                            }

                            <?php if($this->session->role == 'Super Admin' || $this->session->role == 'Admin'){?>
                              var June_Rating = '<span class="badge bg-warning badge-corner"><a data-toggle="modal" href="#rate_target_modal" id="view" class="rate_edit" style="color:white" data-edit_target_id="'+ data[i].June_ID +'" data-edit_target_desc="'+ data[i].ind_desc +'" data-edit_target_accomplishment="'+ data[i].June_Accomplishment +'" data-edit_target_submitted="'+ data[i].June_Target +'" data-edit_target_link="'+ link + data[i].June_Filename +'" data-edit_target_month="June" data-evi_q="'+ data[i].June_q +'" data-evi_e="'+ data[i].June_e +'" data-evi_t="'+ data[i].June_t +'"><i class="fa fa-star" aria-hidden="true"></i> Rate</a></span><br>';
                            <?php } else{ ?> 
                              var June_Rating = '';
                            <?php } ?> 

                            //Rating Result
                            if(data[i].June_q == null){
                              var June_quality = '';
                            }else{
                              var June_quality = '<span class="badge badge-corner" style="background-color:#E64A19; color:white"><i class="fa fa-star" aria-hidden="true"></i> Quality: <b>'+ data[i].June_q +'</b></span><br>';
                              //first_quarter_quality.push(parseInt(data[i].February_q));
                              //alert(first_quarter_quality);
                            }

                            if(data[i].June_e == null){
                              var June_efficiency = '';
                            }else{
                              var June_efficiency = '<span class="badge badge-corner" style="background-color:#E64A19; color:white"><i class="fa fa-star" aria-hidden="true"></i> Efficiency: <b>'+ data[i].June_e +'</b></span><br>';
                              //first_quarter_efficiency.push(parseInt(data[i].February_e));
                            }

                            if(data[i].June_t == null){
                              var June_timeliness = '';
                            }else{
                              var June_timeliness = '<span class="badge badge-corner" style="background-color:#E64A19; color:white"><i class="fa fa-star" aria-hidden="true"></i> Timeliness: <b>'+ data[i].June_t +'</b></span><br>';
                              //first_quarter_timeliness.push(parseInt(data[i].February_t));
                            }

                            var June = June_Add + June_Delete + June_Rating + June_Accomplishment +'<br>' + June_Filename + '<br>'+ June_Submitted + '<br>'+ June_Deadline + '<br>' + June_quality + June_efficiency + June_timeliness;
//-------------------------June--------------------------

//---------------------------Second Quarter---------------------
                            if($.isNumeric(data[i].April_Accomplishment)){
                              var Apr = data[i].April_Accomplishment;
                            }else{
                              var Apr = 0;
                            }
                            if($.isNumeric(data[i].May_Accomplishment)){
                              var May = data[i].May_Accomplishment;
                            }else{
                              var May = 0;
                            }
                            if($.isNumeric(data[i].June_Accomplishment)){
                              var Jun = data[i].June_Accomplishment;
                            }else{
                              var Jun = 0;
                            }
                            var second_quarter = parseInt(Apr)+parseInt(May)+parseInt(Jun);
                            if($.isNumeric(second_quarter)){
                              second_quarter = second_quarter;
                            } else{
                              second_quarter = "System Error";
                            }

                            if($.isNumeric(parseInt(data[i].secondquater_q) / parseInt(data[i].secondquater_count))){
                              var val =parseInt(data[i].secondquater_q) / parseInt(data[i].secondquater_count);
                              var secondquater_q_val = '<br><span class="badge badge-corner" style="background-color:#E64A19; color:white"><i class="fa fa-star" aria-hidden="true"></i> Quality: <b>'+ val.toFixed(2) +'</b></span><br>';
                            }else{
                              var secondquater_q_val = '<br><span class="badge badge-corner" style="background-color:#E64A19; color:white"><i class="fa fa-star" aria-hidden="true"></i> Quality: <b></b></span><br>';
                            }

                            if($.isNumeric(parseInt(data[i].secondquater_e) / parseInt(data[i].secondquater_count_e))){
                              var val_e =parseInt(data[i].secondquater_e) / parseInt(data[i].secondquater_count_e)
                              var secondquater_e_val = '<span class="badge badge-corner" style="background-color:#E64A19; color:white"><i class="fa fa-star" aria-hidden="true"></i> Efficiency: <b>'+ val_e.toFixed(2) +'</b></span><br>';
                            }else{
                              var secondquater_e_val = '<span class="badge badge-corner" style="background-color:#E64A19; color:white"><i class="fa fa-star" aria-hidden="true"></i> Efficiency: <b></b></span><br>';
                            }

                            if($.isNumeric(parseInt(data[i].secondquater_t) / parseInt(data[i].secondquater_count_t))){
                              var val_t =parseInt(data[i].secondquater_t) / parseInt(data[i].secondquater_count_t)
                              var secondquater_t_val = '<span class="badge badge-corner" style="background-color:#E64A19; color:white"><i class="fa fa-star" aria-hidden="true"></i> Timeliness: <b>'+ val_t.toFixed(2) +'</b></span><br>';
                            }else{
                              var secondquater_t_val = '<span class="badge badge-corner" style="background-color:#E64A19; color:white"><i class="fa fa-star" aria-hidden="true"></i> Timeliness: <b></b></span><br>';
                            }

                            
//---------------------------Second Quarter ---------------------  

//---------------------------1st Semester---------------------
                            if($.isNumeric(first_quarter)){
                              var first_quarter = first_quarter;
                            }else{
                              var first_quarter = 0;
                            }
                            if($.isNumeric(second_quarter)){
                              var second_quarter = second_quarter;
                            }else{
                              var second_quarter = 0;
                            }
                           
                            var first_semester = parseInt(second_quarter)+parseInt(first_quarter);
                            if($.isNumeric(first_semester)){
                              first_semester = first_semester;
                            } else{
                              first_semester = "System Error";
                            } 

                            if($.isNumeric((parseInt(data[i].firstquater_q) / parseInt(data[i].firstquater_count) + parseInt(data[i].secondquater_q) / parseInt(data[i].secondquater_count))/2)){
                              var firstsem_val = (parseInt(data[i].firstquater_q) / parseInt(data[i].firstquater_count) + parseInt(data[i].secondquater_q) / parseInt(data[i].secondquater_count))/2;
                              var firstsemester_q_val = '<br><span class="badge badge-corner" style="background-color:#E64A19; color:white"><i class="fa fa-star" aria-hidden="true"></i> Quality: <b>'+ firstsem_val.toFixed(2) +'</b></span><br>';
                            }else{
                              var firstsemester_q_val = '<br><span class="badge badge-corner" style="background-color:#E64A19; color:white"><i class="fa fa-star" aria-hidden="true"></i> Quality: <b></b></span><br>';
                            }

                            if($.isNumeric((parseInt(data[i].firstquater_e) / parseInt(data[i].firstquater_count_e) + parseInt(data[i].secondquater_e) / parseInt(data[i].secondquater_count_e))/2)){
                              var firstsem_val_e = (parseInt(data[i].firstquater_e) / parseInt(data[i].firstquater_count_e) + parseInt(data[i].secondquater_e) / parseInt(data[i].secondquater_count_e))/2;
                              var firstsemester_e_val = '<span class="badge badge-corner" style="background-color:#E64A19; color:white"><i class="fa fa-star" aria-hidden="true"></i> Efficiency: <b>'+ firstsem_val_e.toFixed(2) +'</b></span><br>';
                            }else{
                              var firstsemester_e_val = '<span class="badge badge-corner" style="background-color:#E64A19; color:white"><i class="fa fa-star" aria-hidden="true"></i> Efficiency: <b></b></span><br>';
                            }

                            if($.isNumeric((parseInt(data[i].firstquater_t) / parseInt(data[i].firstquater_count_t) + parseInt(data[i].secondquater_t) / parseInt(data[i].secondquater_count_t))/2)){
                              var firstsem_val_t = (parseInt(data[i].firstquater_t) / parseInt(data[i].firstquater_count_t) + parseInt(data[i].secondquater_t) / parseInt(data[i].secondquater_count_t))/2;
                              var firstsemester_t_val = '<span class="badge badge-corner" style="background-color:#E64A19; color:white"><i class="fa fa-star" aria-hidden="true"></i> Timeliness: <b>'+ firstsem_val_t.toFixed(2) +'</b></span><br>';
                            }else{
                              var firstsemester_t_val = '<span class="badge badge-corner" style="background-color:#E64A19; color:white"><i class="fa fa-star" aria-hidden="true"></i> Timeliness: <b></b></span><br>';
                            }


//---------------------------1st Semester ---------------------  

//-------------------------July--------------------------
                            //Output
                            if(data[i].July_Accomplishment == null){
                              var July_Accomplishment = '<span class="badge bg-red badge-corner"><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Accomplishment: <i class="fa fa-times" aria-hidden="true"></i></span>';;
                             }else{
                              var July_Accomplishment = '<span class="badge badge-corner" style="background-color:#00695C; color:white"><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Accomplishment: <b>'+ data[i].July_Accomplishment +'</b></span>';
                             }

                             //File
                            if(data[i].July_Filename == null || data[i].July_Filename == ""){
                              var July_Filename = '<span class="badge bg-red badge-corner"><i class="fa fa-paperclip" aria-hidden="true"></i> File: <i class="fa fa-times" aria-hidden="true"></i></span>';;
                             }else{
                              var July_Filename = '<span class="badge badge-corner" style="background-color:#00695C; color:white"><i class="fa fa-paperclip" aria-hidden="true"></i> View Attachment: <a href="'+ link + data[i].ind_id + '/' + data[i].July_Filename +'" target="_blank"><i class="fa fa-eye" style="color:white;"></i></a></span>';
                             }

                             //Date Submitted
                             if(data[i].July_Target == null){
                              var July_Submitted = '<span class="badge bg-red badge-corner">Date Submitted: <i class="fa fa-times" aria-hidden="true"></i></span>';;
                             }else{
                              var July_Submitted = '<span class="badge badge-corner" style="background-color:#00695C; color:white"><i class="fa fa-calendar" aria-hidden="true"></i> Date Submitted: <b>'+ data[i].July_Target +'</b></span>';
                             }

                            if (month == 'July'){
                              var July_Add = '<span class="badge bg-primary badge-corner"><a data-toggle="modal" href="#edit_target_modal" id="view" class="January_edit" style="color:white" data-ind_id="'+ data[i].ind_id +'" data-edit_target_id="'+ data[i].July_ID +'" data-edit_target_accomplishment="'+ data[i].July_Accomplishment +'" data-edit_target_month="July" data-edit_target_desc="'+ data[i].ind_desc +'" data-edit_deadline="'+ data[i].ind_jul +'" data-ous_editor="'+ selectedTabValue +'" data-filename="'+data[i].July_Filename+'"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a></span> &nbsp';
                              var July_Delete = '<span class="badge bg-danger badge-corner"><a data-toggle="modal" href="#delete_accomplishment_modal" id="view" class="January_edit" style="color:white" data-ind_id="'+ data[i].ind_id +'" data-ind_id_del="'+ data[i].July_ID +'" data-del_target_desc="'+ data[i].ind_desc +'"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a></span> &nbsp';
                              //Deadline
                              if(data[i].ind_jul == null || data[i].ind_jul == ""){
                                var July_Deadline = '<span class="badge bg-warning badge-corner">Deadline: <i class="fa fa-times" aria-hidden="true"></i></span><br>';
                              }else{
                                var July_Deadline = '<span class="badge badge-warning"><i class="fa fa-calendar" aria-hidden="true"></i> Deadline: <b class="blinking">'+ data[i].ind_jul +'</b></span>';
                              }
                            }else{
                              <?php if($this->session->role == 'Super Admin' || $this->session->role == 'Admin'){?>
                                var July_Add = '<span class="badge bg-primary badge-corner"><a data-toggle="modal" href="#edit_target_modal" id="view" class="January_edit" style="color:white" data-ind_id="'+ data[i].ind_id +'" data-edit_target_id="'+ data[i].July_ID +'" data-edit_target_accomplishment="'+ data[i].July_Accomplishment +'" data-edit_target_month="July" data-edit_target_desc="'+ data[i].ind_desc +'" data-edit_deadline="'+ data[i].ind_jul +'" data-ous_editor="'+ selectedTabValue +'" data-filename="'+data[i].July_Filename+'"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a></span> &nbsp';  
                                var July_Delete = '<span class="badge bg-danger badge-corner"><a data-toggle="modal" href="#delete_accomplishment_modal" id="view" class="January_edit" style="color:white" data-ind_id="'+ data[i].ind_id +'" data-ind_id_del="'+ data[i].July_ID +'" data-del_target_desc="'+ data[i].ind_desc +'"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a></span> &nbsp';
                              <?php } else{ ?> 
                                var July_Add = '';
                                var July_Delete = '';
                              <?php } ?> 
                              var July_Deadline = '<span class="badge bg-red"><i class="fa fa-calendar" aria-hidden="true"></i> Deadline: <b>'+ data[i].ind_jul +'</b></span>';
                            }

                            <?php if($this->session->role == 'Super Admin' || $this->session->role == 'Admin'){?>
                              var July_Rating = '<span class="badge bg-warning badge-corner"><a data-toggle="modal" href="#rate_target_modal" id="view" class="rate_edit" style="color:white" data-edit_target_id="'+ data[i].July_ID +'" data-edit_target_desc="'+ data[i].ind_desc +'" data-edit_target_accomplishment="'+ data[i].July_Accomplishment +'" data-edit_target_submitted="'+ data[i].July_Target +'" data-edit_target_link="'+ link + data[i].July_Filename +'" data-edit_target_month="July" data-evi_q="'+ data[i].July_q +'" data-evi_e="'+ data[i].July_e +'" data-evi_t="'+ data[i].July_t +'"><i class="fa fa-star" aria-hidden="true"></i> Rate</a></span><br>';
                            <?php } else{ ?> 
                              var July_Rating = '';
                            <?php } ?> 

                            //Rating Result
                            if(data[i].July_q == null){
                              var July_quality = '';
                            }else{
                              var July_quality = '<span class="badge badge-corner" style="background-color:#E64A19; color:white"><i class="fa fa-star" aria-hidden="true"></i> Quality: <b>'+ data[i].July_q +'</b></span><br>';
                              //first_quarter_quality.push(parseInt(data[i].February_q));
                              //alert(first_quarter_quality);
                            }

                            if(data[i].July_e == null){
                              var July_efficiency = '';
                            }else{
                              var July_efficiency = '<span class="badge badge-corner" style="background-color:#E64A19; color:white"><i class="fa fa-star" aria-hidden="true"></i> Efficiency: <b>'+ data[i].July_e +'</b></span><br>';
                              //first_quarter_efficiency.push(parseInt(data[i].February_e));
                            }

                            if(data[i].July_t == null){
                              var July_timeliness = '';
                            }else{
                              var July_timeliness = '<span class="badge badge-corner" style="background-color:#E64A19; color:white"><i class="fa fa-star" aria-hidden="true"></i> Timeliness: <b>'+ data[i].July_t +'</b></span><br>';
                              //first_quarter_timeliness.push(parseInt(data[i].February_t));
                            }

                            var July = July_Add + July_Delete + July_Rating + July_Accomplishment +'<br>' + July_Filename + '<br>'+ July_Submitted + '<br>'+ July_Deadline + '<br>' + July_quality + July_efficiency + July_timeliness;
//-------------------------July--------------------------

//-------------------------August--------------------------
                            //Output
                            if(data[i].August_Accomplishment == null){
                              var August_Accomplishment = '<span class="badge bg-red badge-corner"><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Accomplishment: <i class="fa fa-times" aria-hidden="true"></i></span>';;
                             }else{
                              var August_Accomplishment = '<span class="badge badge-corner" style="background-color:#00695C; color:white"><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Accomplishment: <b>'+ data[i].August_Accomplishment +'</b></span>';
                             }

                             //File
                            if(data[i].August_Filename == null || data[i].August_Filename == ""){
                              var August_Filename = '<span class="badge bg-red badge-corner"><i class="fa fa-paperclip" aria-hidden="true"></i> File: <i class="fa fa-times" aria-hidden="true"></i></span>';;
                             }else{
                              var August_Filename = '<span class="badge badge-corner" style="background-color:#00695C; color:white"><i class="fa fa-paperclip" aria-hidden="true"></i> View Attachment: <a href="'+ link + data[i].ind_id + '/' + data[i].August_Filename +'" target="_blank"><i class="fa fa-eye" style="color:white;"></i></a></span>';
                             }

                             //Date Submitted
                             if(data[i].August_Target == null){
                              var August_Submitted = '<span class="badge bg-red badge-corner">Date Submitted: <i class="fa fa-times" aria-hidden="true"></i></span>';;
                             }else{
                              var August_Submitted = '<span class="badge badge-corner" style="background-color:#00695C; color:white"><i class="fa fa-calendar" aria-hidden="true"></i> Date Submitted: <b>'+ data[i].August_Target +'</b></span>';
                             }

                            if (month == 'August'){
                              var August_Add = '<span class="badge bg-primary badge-corner"><a data-toggle="modal" href="#edit_target_modal" id="view" class="January_edit" style="color:white" data-ind_id="'+ data[i].ind_id +'" data-edit_target_id="'+ data[i].August_ID +'" data-edit_target_accomplishment="'+ data[i].August_Accomplishment +'" data-edit_target_month="August" data-edit_target_desc="'+ data[i].ind_desc +'" data-edit_deadline="'+ data[i].ind_aug +'" data-ous_editor="'+ selectedTabValue +'" data-filename="'+data[i].August_Filename+'"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a></span> &nbsp';
                              var August_Delete = '<span class="badge bg-danger badge-corner"><a data-toggle="modal" href="#delete_accomplishment_modal" id="view" class="January_edit" style="color:white" data-ind_id="'+ data[i].ind_id +'" data-ind_id_del="'+ data[i].August_ID +'" data-del_target_desc="'+ data[i].ind_desc +'"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a></span> &nbsp';                             
                              //Deadline
                              if(data[i].ind_aug == null || data[i].ind_aug == ""){
                                var August_Deadline = '<span class="badge bg-warning badge-corner">Deadline: <i class="fa fa-times" aria-hidden="true"></i></span><br>';
                              }else{
                                var August_Deadline = '<span class="badge badge-warning"><i class="fa fa-calendar" aria-hidden="true"></i> Deadline: <b class="blinking">'+ data[i].ind_aug +'</b></span>';
                              }
                            }else{
                              <?php if($this->session->role == 'Super Admin' || $this->session->role == 'Admin'){?>
                                var August_Add = '<span class="badge bg-primary badge-corner"><a data-toggle="modal" href="#edit_target_modal" id="view" class="January_edit" style="color:white" data-ind_id="'+ data[i].ind_id +'" data-edit_target_id="'+ data[i].August_ID +'" data-edit_target_accomplishment="'+ data[i].August_Accomplishment +'" data-edit_target_month="August" data-edit_target_desc="'+ data[i].ind_desc +'" data-edit_deadline="'+ data[i].ind_aug +'" data-ous_editor="'+ selectedTabValue +'" data-filename="'+data[i].August_Filename+'"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a></span> &nbsp';  
                                var August_Delete = '<span class="badge bg-danger badge-corner"><a data-toggle="modal" href="#delete_accomplishment_modal" id="view" class="January_edit" style="color:white" data-ind_id="'+ data[i].ind_id +'" data-ind_id_del="'+ data[i].August_ID +'" data-del_target_desc="'+ data[i].ind_desc +'"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a></span> &nbsp';                             
                              <?php } else{ ?> 
                                var August_Add = '';
                                var August_Delete = '';
                              <?php } ?> 
                              var August_Deadline = '<span class="badge bg-red"><i class="fa fa-calendar" aria-hidden="true"></i> Deadline: <b>'+ data[i].ind_aug +'</b></span>';
                            }

                            <?php if($this->session->role == 'Super Admin' || $this->session->role == 'Admin'){?>
                              var August_Rating = '<span class="badge bg-warning badge-corner"><a data-toggle="modal" href="#rate_target_modal" id="view" class="rate_edit" style="color:white" data-edit_target_id="'+ data[i].August_ID +'" data-edit_target_desc="'+ data[i].ind_desc +'" data-edit_target_accomplishment="'+ data[i].August_Accomplishment +'" data-edit_target_submitted="'+ data[i].August_Target +'" data-edit_target_link="'+ link + data[i].August_Filename +'" data-edit_target_month="August" data-evi_q="'+ data[i].August_q +'" data-evi_e="'+ data[i].August_e +'" data-evi_t="'+ data[i].August_t +'"><i class="fa fa-star" aria-hidden="true"></i> Rate</a></span><br>';
                            <?php } else{ ?> 
                              var August_Rating = '';
                            <?php } ?> 

                            //Rating Result
                            if(data[i].August_q == null){
                              var August_quality = '';
                            }else{
                              var August_quality = '<span class="badge badge-corner" style="background-color:#E64A19; color:white"><i class="fa fa-star" aria-hidden="true"></i> Quality: <b>'+ data[i].August_q +'</b></span><br>';
                              //first_quarter_quality.push(parseInt(data[i].February_q));
                              //alert(first_quarter_quality);
                            }

                            if(data[i].August_e == null){
                              var August_efficiency = '';
                            }else{
                              var August_efficiency = '<span class="badge badge-corner" style="background-color:#E64A19; color:white"><i class="fa fa-star" aria-hidden="true"></i> Efficiency: <b>'+ data[i].August_e +'</b></span><br>';
                              //first_quarter_efficiency.push(parseInt(data[i].February_e));
                            }

                            if(data[i].August_t == null){
                              var August_timeliness = '';
                            }else{
                              var August_timeliness = '<span class="badge badge-corner" style="background-color:#E64A19; color:white"><i class="fa fa-star" aria-hidden="true"></i> Timeliness: <b>'+ data[i].August_t +'</b></span><br>';
                              //first_quarter_timeliness.push(parseInt(data[i].February_t));
                            }

                            var August = August_Add + August_Delete + August_Rating + August_Accomplishment +'<br>' + August_Filename + '<br>'+ August_Submitted + '<br>'+ August_Deadline + '<br>' + August_quality + August_efficiency + August_timeliness;
//-------------------------August--------------------------

//-------------------------September--------------------------
                            //Output
                            if(data[i].September_Accomplishment == null){
                              var September_Accomplishment = '<span class="badge bg-red badge-corner"><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Accomplishment: <i class="fa fa-times" aria-hidden="true"></i></span>';;
                             }else{
                              var September_Accomplishment = '<span class="badge badge-corner" style="background-color:#00695C; color:white"><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Accomplishment: <b>'+ data[i].September_Accomplishment +'</b></span>';
                             }

                             //File
                            if(data[i].September_Filename == null || data[i].September_Filename == ""){
                              var September_Filename = '<span class="badge bg-red badge-corner"><i class="fa fa-paperclip" aria-hidden="true"></i> File: <i class="fa fa-times" aria-hidden="true"></i></span>';;
                             }else{
                              var September_Filename = '<span class="badge badge-corner" style="background-color:#00695C; color:white"><i class="fa fa-paperclip" aria-hidden="true"></i> View Attachment: <a href="'+ link + data[i].ind_id + '/' + data[i].September_Filename +'" target="_blank"><i class="fa fa-eye" style="color:white;"></i></a></span>';
                             }

                             //Date Submitted
                             if(data[i].September_Target == null){
                              var September_Submitted = '<span class="badge bg-red badge-corner">Date Submitted: <i class="fa fa-times" aria-hidden="true"></i></span>';;
                             }else{
                              var September_Submitted = '<span class="badge badge-corner" style="background-color:#00695C; color:white"><i class="fa fa-calendar" aria-hidden="true"></i> Date Submitted: <b>'+ data[i].September_Target +'</b></span>';
                             }

                            if (month == 'September'){
                              var September_Add = '<span class="badge bg-primary badge-corner"><a data-toggle="modal" href="#edit_target_modal" id="view" class="January_edit" style="color:white" data-ind_id="'+ data[i].ind_id +'" data-edit_target_id="'+ data[i].September_ID +'" data-edit_target_accomplishment="'+ data[i].September_Accomplishment +'" data-edit_target_month="September" data-edit_target_desc="'+ data[i].ind_desc +'" data-edit_deadline="'+ data[i].ind_sep +'" data-ous_editor="'+ selectedTabValue +'" data-filename="'+data[i].September_Filename+'"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a></span> &nbsp';
                              var September_Delete = '<span class="badge bg-danger badge-corner"><a data-toggle="modal" href="#delete_accomplishment_modal" id="view" class="January_edit" style="color:white" data-ind_id="'+ data[i].ind_id +'" data-ind_id_del="'+ data[i].September_ID +'" data-del_target_desc="'+ data[i].ind_desc +'"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a></span> &nbsp';
                              //Deadline
                              if(data[i].ind_sep == null || data[i].ind_sep == ""){
                                var September_Deadline = '<span class="badge bg-warning badge-corner">Deadline: <i class="fa fa-times" aria-hidden="true"></i></span><br>';
                              }else{
                                var September_Deadline = '<span class="badge badge-warning"><i class="fa fa-calendar" aria-hidden="true"></i> Deadline: <b class="blinking">'+ data[i].ind_sep +'</b></span>';
                              }
                            }else{
                              <?php if($this->session->role == 'Super Admin' || $this->session->role == 'Admin'){?>
                                var September_Add = '<span class="badge bg-primary badge-corner"><a data-toggle="modal" href="#edit_target_modal" id="view" class="January_edit" style="color:white" data-ind_id="'+ data[i].ind_id +'" data-edit_target_id="'+ data[i].September_ID +'" data-edit_target_accomplishment="'+ data[i].September_Accomplishment +'" data-edit_target_month="September" data-edit_target_desc="'+ data[i].ind_desc +'" data-edit_deadline="'+ data[i].ind_sep +'" data-ous_editor="'+ selectedTabValue +'" data-filename="'+data[i].September_Filename+'"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a></span> &nbsp';  
                                var September_Delete = '<span class="badge bg-danger badge-corner"><a data-toggle="modal" href="#delete_accomplishment_modal" id="view" class="January_edit" style="color:white" data-ind_id="'+ data[i].ind_id +'" data-ind_id_del="'+ data[i].September_ID +'" data-del_target_desc="'+ data[i].ind_desc +'"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a></span> &nbsp';
                              <?php } else{ ?> 
                                var September_Add = '';
                                var September_Delete = '';
                              <?php } ?> 
                              var September_Deadline = '<span class="badge bg-red"><i class="fa fa-calendar" aria-hidden="true"></i> Deadline: <b>'+ data[i].ind_sep +'</b></span>';
                            }

                            <?php if($this->session->role == 'Super Admin' || $this->session->role == 'Admin'){?>
                              var September_Rating = '<span class="badge bg-warning badge-corner"><a data-toggle="modal" href="#rate_target_modal" id="view" class="rate_edit" style="color:white" data-edit_target_id="'+ data[i].September_ID +'" data-edit_target_desc="'+ data[i].ind_desc +'" data-edit_target_accomplishment="'+ data[i].September_Accomplishment +'" data-edit_target_submitted="'+ data[i].September_Target +'" data-edit_target_link="'+ link + data[i].September_Filename +'" data-edit_target_month="September" data-evi_q="'+ data[i].September_q +'" data-evi_e="'+ data[i].September_e +'" data-evi_t="'+ data[i].September_t +'"><i class="fa fa-star" aria-hidden="true"></i> Rate</a></span><br>';
                            <?php } else{ ?> 
                              var September_Rating = '';
                            <?php } ?> 

                            //Rating Result
                            if(data[i].September_q == null){
                              var September_quality = '';
                            }else{
                              var September_quality = '<span class="badge badge-corner" style="background-color:#E64A19; color:white"><i class="fa fa-star" aria-hidden="true"></i> Quality: <b>'+ data[i].September_q +'</b></span><br>';
                              //first_quarter_quality.push(parseInt(data[i].February_q));
                              //alert(first_quarter_quality);
                            }

                            if(data[i].September_e == null){
                              var September_efficiency = '';
                            }else{
                              var September_efficiency = '<span class="badge badge-corner" style="background-color:#E64A19; color:white"><i class="fa fa-star" aria-hidden="true"></i> Efficiency: <b>'+ data[i].September_e +'</b></span><br>';
                              //first_quarter_efficiency.push(parseInt(data[i].February_e));
                            }

                            if(data[i].September_t == null){
                              var September_timeliness = '';
                            }else{
                              var September_timeliness = '<span class="badge badge-corner" style="background-color:#E64A19; color:white"><i class="fa fa-star" aria-hidden="true"></i> Timeliness: <b>'+ data[i].September_t +'</b></span><br>';
                              //first_quarter_timeliness.push(parseInt(data[i].February_t));
                            }

                            var September = September_Add + September_Delete + September_Rating + September_Accomplishment +'<br>' + September_Filename + '<br>'+ September_Submitted + '<br>'+ September_Deadline + '<br>' + September_quality + September_efficiency + September_timeliness;
//-------------------------September--------------------------

//---------------------------Third Quarter---------------------
                            if($.isNumeric(data[i].August_Accomplishment)){
                              var Aug = data[i].August_Accomplishment;
                            }else{
                              var Aug = 0;
                            }
                            if($.isNumeric(data[i].September_Accomplishment)){
                              var Sep = data[i].September_Accomplishment;
                            }else{
                              var Sep = 0;
                            }
                            if($.isNumeric(data[i].October_Accomplishment)){
                              var Oct = data[i].October_Accomplishment;
                            }else{
                              var Oct = 0;
                            }
                            var third_quarter = parseInt(Aug)+parseInt(Sep)+parseInt(Oct);
                            if($.isNumeric(third_quarter)){
                              third_quarter = third_quarter;
                            } else{
                              third_quarter = "System Error";
                            }

                            if($.isNumeric(parseInt(data[i].thirdquater_q) / parseInt(data[i].thirdquater_count))){
                              var val =parseInt(data[i].thirdquater_q) / parseInt(data[i].thirdquater_count);
                              var thirdquater_q_val = '<br><span class="badge badge-corner" style="background-color:#E64A19; color:white"><i class="fa fa-star" aria-hidden="true"></i> Quality: <b>'+ val.toFixed(2) +'</b></span><br>';
                            }else{
                              var thirdquater_q_val = '<br><span class="badge badge-corner" style="background-color:#E64A19; color:white"><i class="fa fa-star" aria-hidden="true"></i> Quality: <b></b></span><br>';
                            }

                            if($.isNumeric(parseInt(data[i].thirdquater_e) / parseInt(data[i].thirdquater_count_e))){
                              var val_e =parseInt(data[i].thirdquater_e) / parseInt(data[i].thirdquater_count_e);
                              var thirdquater_e_val = '<span class="badge badge-corner" style="background-color:#E64A19; color:white"><i class="fa fa-star" aria-hidden="true"></i> Efficiency: <b>'+ val_e.toFixed(2) +'</b></span><br>';
                            }else{
                              var thirdquater_e_val = '<span class="badge badge-corner" style="background-color:#E64A19; color:white"><i class="fa fa-star" aria-hidden="true"></i> Efficiency: <b></b></span><br>';
                            }

                            
                            if($.isNumeric(parseInt(data[i].thirdquater_t) / parseInt(data[i].thirdquater_count_t))){
                              var val_t =parseInt(data[i].thirdquater_t) / parseInt(data[i].thirdquater_count_t);
                              var thirdquater_t_val = '<span class="badge badge-corner" style="background-color:#E64A19; color:white"><i class="fa fa-star" aria-hidden="true"></i> Efficiency: <b>'+ val_t.toFixed(2) +'</b></span><br>';
                            }else{
                              var thirdquater_t_val = '<span class="badge badge-corner" style="background-color:#E64A19; color:white"><i class="fa fa-star" aria-hidden="true"></i> Efficiency: <b></b></span><br>';
                            }
                      
//---------------------------Third Quarter ---------------------  

//-------------------------October--------------------------
                            //Output
                            if(data[i].October_Accomplishment == null){
                              var October_Accomplishment = '<span class="badge bg-red badge-corner"><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Accomplishment: <i class="fa fa-times" aria-hidden="true"></i></span>';;
                             }else{
                              var October_Accomplishment = '<span class="badge badge-corner" style="background-color:#00695C; color:white"><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Accomplishment: <b>'+ data[i].October_Accomplishment +'</b></span>';
                             }

                             //File
                            if(data[i].October_Filename == null || data[i].October_Filename == ""){
                              var October_Filename = '<span class="badge bg-red badge-corner"><i class="fa fa-paperclip" aria-hidden="true"></i> File: <i class="fa fa-times" aria-hidden="true"></i></span>';;
                             }else{
                              var October_Filename = '<span class="badge badge-corner" style="background-color:#00695C; color:white"><i class="fa fa-paperclip" aria-hidden="true"></i> View Attachment: <a href="'+ link + data[i].ind_id + '/' + data[i].October_Filename +'" target="_blank"><i class="fa fa-eye" style="color:white;"></i></a></span>';
                             }

                             //Date Submitted
                             if(data[i].October_Target == null){
                              var October_Submitted = '<span class="badge bg-red badge-corner">Date Submitted: <i class="fa fa-times" aria-hidden="true"></i></span>';;
                             }else{
                              var October_Submitted = '<span class="badge badge-corner" style="background-color:#00695C; color:white"><i class="fa fa-calendar" aria-hidden="true"></i> Date Submitted: <b>'+ data[i].October_Target +'</b></span>';
                             }

                            if (month == 'October'){
                              var October_Add = '<span class="badge bg-primary badge-corner"><a data-toggle="modal" href="#edit_target_modal" id="view" class="January_edit" style="color:white" data-ind_id="'+ data[i].ind_id +'" data-edit_target_id="'+ data[i].October_ID +'" data-edit_target_accomplishment="'+ data[i].October_Accomplishment +'" data-edit_target_month="October" data-edit_target_desc="'+ data[i].ind_desc +'" data-edit_deadline="'+ data[i].ind_oct +'" data-ous_editor="'+ selectedTabValue +'" data-filename="'+data[i].October_Filename+'"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a></span> &nbsp';
                              var October_Delete = '<span class="badge bg-danger badge-corner"><a data-toggle="modal" href="#delete_accomplishment_modal" id="view" class="January_edit" style="color:white" data-ind_id="'+ data[i].ind_id +'" data-ind_id_del="'+ data[i].October_ID +'" data-del_target_desc="'+ data[i].ind_desc +'"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a></span> &nbsp';
                              //Deadline
                              if(data[i].ind_oct == null || data[i].ind_oct == ""){
                                var October_Deadline = '<span class="badge bg-warning badge-corner">Deadline: <i class="fa fa-times" aria-hidden="true"></i></span><br>';
                              }else{
                                var October_Deadline = '<span class="badge badge-warning"><i class="fa fa-calendar" aria-hidden="true"></i> Deadline: <b class="blinking">'+ data[i].ind_oct +'</b></span>';
                              }
                            }else{
                              <?php if($this->session->role == 'Super Admin' || $this->session->role == 'Admin'){?>
                                var October_Add = '<span class="badge bg-primary badge-corner"><a data-toggle="modal" href="#edit_target_modal" id="view" class="January_edit" style="color:white" data-ind_id="'+ data[i].ind_id +'" data-edit_target_id="'+ data[i].October_ID +'" data-edit_target_accomplishment="'+ data[i].October_Accomplishment +'" data-edit_target_month="October" data-edit_target_desc="'+ data[i].ind_desc +'" data-edit_deadline="'+ data[i].ind_oct +'" data-ous_editor="'+ selectedTabValue +'" data-filename="'+data[i].October_Filename+'"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a></span> &nbsp';  
                                var October_Delete = '<span class="badge bg-danger badge-corner"><a data-toggle="modal" href="#delete_accomplishment_modal" id="view" class="January_edit" style="color:white" data-ind_id="'+ data[i].ind_id +'" data-ind_id_del="'+ data[i].October_ID +'" data-del_target_desc="'+ data[i].ind_desc +'"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a></span> &nbsp';
                              <?php } else{ ?> 
                                var October_Add = '';
                                var October_Delete = '';
                              <?php } ?> 
                              var October_Deadline = '<span class="badge bg-red"><i class="fa fa-calendar" aria-hidden="true"></i> Deadline: <b>'+ data[i].ind_oct +'</b></span>';
                            }

                            <?php if($this->session->role == 'Super Admin' || $this->session->role == 'Admin'){?>
                              var October_Rating = '<span class="badge bg-warning badge-corner"><a data-toggle="modal" href="#rate_target_modal" id="view" class="rate_edit" style="color:white" data-edit_target_id="'+ data[i].October_ID +'" data-edit_target_desc="'+ data[i].ind_desc +'" data-edit_target_accomplishment="'+ data[i].October_Accomplishment +'" data-edit_target_submitted="'+ data[i].October_Target +'" data-edit_target_link="'+ link + data[i].October_Filename +'" data-edit_target_month="October" data-evi_q="'+ data[i].October_q +'" data-evi_e="'+ data[i].October_e +'" data-evi_t="'+ data[i].October_t +'"><i class="fa fa-star" aria-hidden="true"></i> Rate</a></span><br>';
                            <?php } else{ ?> 
                              var October_Rating = '';
                            <?php } ?> 

                            //Rating Result
                            if(data[i].October_q == null){
                              var October_quality = '';
                            }else{
                              var October_quality = '<span class="badge badge-corner" style="background-color:#E64A19; color:white"><i class="fa fa-star" aria-hidden="true"></i> Quality: <b>'+ data[i].October_q +'</b></span><br>';
                              //first_quarter_quality.push(parseInt(data[i].February_q));
                              //alert(first_quarter_quality);
                            }

                            if(data[i].October_e == null){
                              var October_efficiency = '';
                            }else{
                              var October_efficiency = '<span class="badge badge-corner" style="background-color:#E64A19; color:white"><i class="fa fa-star" aria-hidden="true"></i> Efficiency: <b>'+ data[i].October_e +'</b></span><br>';
                              //first_quarter_efficiency.push(parseInt(data[i].February_e));
                            }

                            if(data[i].October_t == null){
                              var October_timeliness = '';
                            }else{
                              var October_timeliness = '<span class="badge badge-corner" style="background-color:#E64A19; color:white"><i class="fa fa-star" aria-hidden="true"></i> Timeliness: <b>'+ data[i].October_t +'</b></span><br>';
                              //first_quarter_timeliness.push(parseInt(data[i].February_t));
                            }

                            var October = October_Add + October_Delete + October_Rating + October_Accomplishment +'<br>' + October_Filename + '<br>'+ October_Submitted + '<br>'+ October_Deadline + '<br>' + October_quality + October_efficiency + October_timeliness;
//-------------------------October--------------------------

//-------------------------November--------------------------
                            //Output
                            if(data[i].November_Accomplishment == null){
                              var November_Accomplishment = '<span class="badge bg-red badge-corner"><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Accomplishment: <i class="fa fa-times" aria-hidden="true"></i></span>';;
                             }else{
                              var November_Accomplishment = '<span class="badge badge-corner" style="background-color:#00695C; color:white"><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Accomplishment: <b>'+ data[i].November_Accomplishment +'</b></span>';
                             }

                             //File
                            if(data[i].November_Filename == null || data[i].November_Filename == ""){
                              var November_Filename = '<span class="badge bg-red badge-corner"><i class="fa fa-paperclip" aria-hidden="true"></i> File: <i class="fa fa-times" aria-hidden="true"></i></span>';;
                             }else{
                              var November_Filename = '<span class="badge badge-corner" style="background-color:#00695C; color:white"><i class="fa fa-paperclip" aria-hidden="true"></i> View Attachment: <a href="'+ link + data[i].ind_id + '/' + data[i].November_Filename +'" target="_blank"><i class="fa fa-eye" style="color:white;"></i></a></span>';
                             }

                             //Date Submitted
                             if(data[i].November_Target == null){
                              var November_Submitted = '<span class="badge bg-red badge-corner">Date Submitted: <i class="fa fa-times" aria-hidden="true"></i></span>';;
                             }else{
                              var November_Submitted = '<span class="badge badge-corner" style="background-color:#00695C; color:white"><i class="fa fa-calendar" aria-hidden="true"></i> Date Submitted: <b>'+ data[i].November_Target +'</b></span>';
                             }

                            if (month == 'November'){
                              var November_Add = '<span class="badge bg-primary badge-corner"><a data-toggle="modal" href="#edit_target_modal" id="view" class="January_edit" style="color:white" data-ind_id="'+ data[i].ind_id +'" data-edit_target_id="'+ data[i].November_ID +'" data-edit_target_accomplishment="'+ data[i].November_Accomplishment +'" data-edit_target_month="November" data-edit_target_desc="'+ data[i].ind_desc +'" data-edit_deadline="'+ data[i].ind_nov +'" data-ous_editor="'+ selectedTabValue +'" data-filename="'+data[i].November_Filename+'"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a></span> &nbsp';
                              var November_Delete = '<span class="badge bg-danger badge-corner"><a data-toggle="modal" href="#delete_accomplishment_modal" id="view" class="January_edit" style="color:white" data-ind_id="'+ data[i].ind_id +'" data-ind_id_del="'+ data[i].November_ID +'" data-del_target_desc="'+ data[i].ind_desc +'"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a></span> &nbsp';
                              //Deadline
                              if(data[i].ind_nov == null || data[i].ind_nov == ""){
                                var November_Deadline = '<span class="badge bg-warning badge-corner">Deadline: <i class="fa fa-times" aria-hidden="true"></i></span><br>';
                              }else{
                                var November_Deadline = '<span class="badge badge-warning"><i class="fa fa-calendar" aria-hidden="true"></i> Deadline: <b class="blinking">'+ data[i].ind_nov +'</b></span>';
                              }
                            }else{
                              <?php if($this->session->role == 'Super Admin' || $this->session->role == 'Admin'){?>
                                var November_Add = '<span class="badge bg-primary badge-corner"><a data-toggle="modal" href="#edit_target_modal" id="view" class="January_edit" style="color:white" data-ind_id="'+ data[i].ind_id +'" data-edit_target_id="'+ data[i].November_ID +'" data-edit_target_accomplishment="'+ data[i].November_Accomplishment +'" data-edit_target_month="November" data-edit_target_desc="'+ data[i].ind_desc +'" data-edit_deadline="'+ data[i].ind_nov +'" data-ous_editor="'+ selectedTabValue +'" data-filename="'+data[i].November_Filename+'"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a></span> &nbsp';  
                                var November_Delete = '<span class="badge bg-danger badge-corner"><a data-toggle="modal" href="#delete_accomplishment_modal" id="view" class="January_edit" style="color:white" data-ind_id="'+ data[i].ind_id +'" data-ind_id_del="'+ data[i].November_ID +'" data-del_target_desc="'+ data[i].ind_desc +'"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a></span> &nbsp';
                              <?php } else{ ?> 
                                var November_Add = '';
                                var November_Delete = '';
                              <?php } ?> 
                              var November_Deadline = '<span class="badge bg-red"><i class="fa fa-calendar" aria-hidden="true"></i> Deadline: <b>'+ data[i].ind_nov +'</b></span>';
                            }

                            <?php if($this->session->role == 'Super Admin' || $this->session->role == 'Admin'){?>
                              var November_Rating = '<span class="badge bg-warning badge-corner"><a data-toggle="modal" href="#rate_target_modal" id="view" class="rate_edit" style="color:white" data-edit_target_id="'+ data[i].November_ID +'" data-edit_target_desc="'+ data[i].ind_desc +'" data-edit_target_accomplishment="'+ data[i].November_Accomplishment +'" data-edit_target_submitted="'+ data[i].November_Target +'" data-edit_target_link="'+ link + data[i].November_Filename +'" data-edit_target_month="October" data-evi_q="'+ data[i].November_q +'" data-evi_e="'+ data[i].November_e +'" data-evi_t="'+ data[i].November_t +'"><i class="fa fa-star" aria-hidden="true"></i> Rate</a></span><br>';
                            <?php } else{ ?> 
                              var November_Rating = '';
                            <?php } ?> 

                            //Rating Result
                            if(data[i].November_q == null){
                              var November_quality = '';
                            }else{
                              var November_quality = '<span class="badge badge-corner" style="background-color:#E64A19; color:white"><i class="fa fa-star" aria-hidden="true"></i> Quality: <b>'+ data[i].November_q +'</b></span><br>';
                              //first_quarter_quality.push(parseInt(data[i].February_q));
                              //alert(first_quarter_quality);
                            }

                            if(data[i].November_e == null){
                              var November_efficiency = '';
                            }else{
                              var November_efficiency = '<span class="badge badge-corner" style="background-color:#E64A19; color:white"><i class="fa fa-star" aria-hidden="true"></i> Efficiency: <b>'+ data[i].November_e +'</b></span><br>';
                              //first_quarter_efficiency.push(parseInt(data[i].February_e));
                            }

                            if(data[i].November_t == null){
                              var November_timeliness = '';
                            }else{
                              var November_timeliness = '<span class="badge badge-corner" style="background-color:#E64A19; color:white"><i class="fa fa-star" aria-hidden="true"></i> Timeliness: <b>'+ data[i].November_t +'</b></span><br>';
                              //first_quarter_timeliness.push(parseInt(data[i].February_t));
                            }

                            var November = November_Add + November_Delete + November_Rating + November_Accomplishment +'<br>' + November_Filename + '<br>'+ November_Submitted + '<br>'+ November_Deadline + '<br>' + November_quality + November_efficiency + November_timeliness;
//-------------------------November--------------------------

//-------------------------December--------------------------
                            //Output
                            if(data[i].December_Accomplishment == null){
                              var December_Accomplishment = '<span class="badge bg-red badge-corner"><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Accomplishment: <i class="fa fa-times" aria-hidden="true"></i></span>';;
                             }else{
                              var December_Accomplishment = '<span class="badge badge-corner" style="background-color:#00695C; color:white"><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Accomplishment: <b>'+ data[i].December_Accomplishment +'</b></span>';
                             }

                             //File
                            if(data[i].December_Filename == null || data[i].December_Filename == ""){
                              var December_Filename = '<span class="badge bg-red badge-corner"><i class="fa fa-paperclip" aria-hidden="true"></i> File: <i class="fa fa-times" aria-hidden="true"></i></span>';;
                             }else{
                              var December_Filename = '<span class="badge badge-corner" style="background-color:#00695C; color:white"><i class="fa fa-paperclip" aria-hidden="true"></i> View Attachment: <a href="'+ link + data[i].ind_id + '/' + data[i].December_Filename +'" target="_blank"><i class="fa fa-eye" style="color:white;"></i></a></span>';
                             }

                             //Date Submitted
                             if(data[i].December_Target == null){
                              var December_Submitted = '<span class="badge bg-red badge-corner">Date Submitted: <i class="fa fa-times" aria-hidden="true"></i></span>';;
                             }else{
                              var December_Submitted = '<span class="badge badge-corner" style="background-color:#00695C; color:white"><i class="fa fa-calendar" aria-hidden="true"></i> Date Submitted: <b>'+ data[i].December_Target +'</b></span>';
                             }

                            if (month == 'December'){
                              var December_Add = '<span class="badge bg-primary badge-corner"><a data-toggle="modal" href="#edit_target_modal" id="view" class="January_edit" style="color:white" data-ind_id="'+ data[i].ind_id +'" data-edit_target_id="'+ data[i].December_ID +'" data-edit_target_accomplishment="'+ data[i].December_Accomplishment +'" data-edit_target_month="December" data-edit_target_desc="'+ data[i].ind_desc +'" data-edit_deadline="'+ data[i].ind_dec +'" data-ous_editor="'+ selectedTabValue +'" data-filename="'+data[i].December_Filename+'"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a></span> &nbsp';
                              var December_Delete = '<span class="badge bg-danger badge-corner"><a data-toggle="modal" href="#delete_accomplishment_modal" id="view" class="January_edit" style="color:white" data-ind_id="'+ data[i].ind_id +'" data-ind_id_del="'+ data[i].December_ID +'" data-del_target_desc="'+ data[i].ind_desc +'"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a></span> &nbsp';  
                              //Deadline
                              if(data[i].ind_dec == null || data[i].ind_dec == ""){
                                var December_Deadline = '<span class="badge bg-warning badge-corner">Deadline: <i class="fa fa-times" aria-hidden="true"></i></span><br>';
                              }else{
                                var December_Deadline = '<span class="badge badge-warning"><i class="fa fa-calendar" aria-hidden="true"></i> Deadline: <b class="blinking">'+ data[i].ind_dec +'</b></span>';
                              }
                            }else{
                              <?php if($this->session->role == 'Super Admin' || $this->session->role == 'Admin'){?>
                                var December_Add = '<span class="badge bg-primary badge-corner"><a data-toggle="modal" href="#edit_target_modal" id="view" class="January_edit" style="color:white" data-ind_id="'+ data[i].ind_id +'" data-edit_target_id="'+ data[i].December_ID +'" data-edit_target_accomplishment="'+ data[i].December_Accomplishment +'" data-edit_target_month="December" data-edit_target_desc="'+ data[i].ind_desc +'" data-edit_deadline="'+ data[i].ind_dec +'" data-ous_editor="'+ selectedTabValue +'" data-filename="'+data[i].December_Filename+'"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a></span> &nbsp';  
                                var December_Delete = '<span class="badge bg-danger badge-corner"><a data-toggle="modal" href="#delete_accomplishment_modal" id="view" class="January_edit" style="color:white" data-ind_id="'+ data[i].ind_id +'" data-ind_id_del="'+ data[i].December_ID +'" data-del_target_desc="'+ data[i].ind_desc +'"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a></span> &nbsp';  
                              <?php } else{ ?> 
                                var December_Add = '';
                                var December_Delete = '';
                              <?php } ?> 
                              var December_Deadline = '<span class="badge bg-red"><i class="fa fa-calendar" aria-hidden="true"></i> Deadline: <b>'+ data[i].ind_dec +'</b></span>';
                            }

                            <?php if($this->session->role == 'Super Admin' || $this->session->role == 'Admin'){?>
                              var December_Rating = '<span class="badge bg-warning badge-corner"><a data-toggle="modal" href="#rate_target_modal" id="view" class="rate_edit" style="color:white" data-edit_target_id="'+ data[i].December_ID +'" data-edit_target_desc="'+ data[i].ind_desc +'" data-edit_target_accomplishment="'+ data[i].December_Accomplishment +'" data-edit_target_submitted="'+ data[i].December_Target +'" data-edit_target_link="'+ link + data[i].December_Filename +'" data-edit_target_month="October" data-evi_q="'+ data[i].December_q +'" data-evi_e="'+ data[i].December_e +'" data-evi_t="'+ data[i].December_t +'"><i class="fa fa-star" aria-hidden="true"></i> Rate</a></span><br>';
                            <?php } else{ ?> 
                              var December_Rating = '';
                            <?php } ?> 

                            //Rating Result
                            if(data[i].December_q == null){
                              var December_quality = '';
                            }else{
                              var December_quality = '<span class="badge badge-corner" style="background-color:#E64A19; color:white"><i class="fa fa-star" aria-hidden="true"></i> Quality: <b>'+ data[i].December_q +'</b></span><br>';
                              //first_quarter_quality.push(parseInt(data[i].February_q));
                              //alert(first_quarter_quality);
                            }

                            if(data[i].December_e == null){
                              var December_efficiency = '';
                            }else{
                              var December_efficiency = '<span class="badge badge-corner" style="background-color:#E64A19; color:white"><i class="fa fa-star" aria-hidden="true"></i> Efficiency: <b>'+ data[i].December_e +'</b></span><br>';
                              //first_quarter_efficiency.push(parseInt(data[i].February_e));
                            }

                            if(data[i].December_t == null){
                              var December_timeliness = '';
                            }else{
                              var December_timeliness = '<span class="badge badge-corner" style="background-color:#E64A19; color:white"><i class="fa fa-star" aria-hidden="true"></i> Timeliness: <b>'+ data[i].December_t +'</b></span><br>';
                              //first_quarter_timeliness.push(parseInt(data[i].February_t));
                            }

                            var December = December_Add + December_Delete + December_Rating + December_Accomplishment +'<br>' + December_Filename + '<br>'+ December_Submitted + '<br>'+ December_Deadline + '<br>' + December_quality + December_efficiency + December_timeliness;
//-------------------------December--------------------------

//---------------------------Fourth Quarter---------------------
                            if($.isNumeric(data[i].October_Accomplishment)){
                              var Oct = data[i].October_Accomplishment;
                            }else{
                              var Oct = 0;
                            }
                            if($.isNumeric(data[i].November_Accomplishment)){
                              var Nov = data[i].November_Accomplishment;
                            }else{
                              var Nov = 0;
                            }
                            if($.isNumeric(data[i].December_Accomplishment)){
                              var Dec = data[i].December_Accomplishment;
                            }else{
                              var Dec = 0;
                            }
                            var fourth_quarter = parseInt(Oct)+parseInt(Nov)+parseInt(Dec);
                            if($.isNumeric(fourth_quarter)){
                              fourth_quarter = fourth_quarter;
                            } else{
                              fourth_quarter = "System Error";
                            }

                            if($.isNumeric(parseInt(data[i].fourthquater_q) / parseInt(data[i].fourthquater_count))){
                              var val =parseInt(data[i].fourthquater_q) / parseInt(data[i].fourthquater_count);
                              var fourthquater_q_val = '<br><span class="badge badge-corner" style="background-color:#E64A19; color:white"><i class="fa fa-star" aria-hidden="true"></i> Quality: <b>'+ val.toFixed(2) +'</b></span><br>';
                            }else{
                              var fourthquater_q_val = '<br><span class="badge badge-corner" style="background-color:#E64A19; color:white"><i class="fa fa-star" aria-hidden="true"></i> Quality: <b></b></span><br>';
                            }

                            if($.isNumeric(parseInt(data[i].fourthquater_e) / parseInt(data[i].fourthquater_count_e))){
                              var val_e =parseInt(data[i].fourthquater_e) / parseInt(data[i].fourthquater_count_e);
                              var fourthquater_e_val = '<span class="badge badge-corner" style="background-color:#E64A19; color:white"><i class="fa fa-star" aria-hidden="true"></i> Efficiency: <b>'+ val_e.toFixed(2) +'</b></span><br>';
                            }else{
                              var fourthquater_e_val = '<span class="badge badge-corner" style="background-color:#E64A19; color:white"><i class="fa fa-star" aria-hidden="true"></i> Efficiency: <b></b></span><br>';
                            }
                            
                            if($.isNumeric(parseInt(data[i].fourthquater_t) / parseInt(data[i].fourthquater_count_t))){
                              var val_t =parseInt(data[i].fourthquater_t) / parseInt(data[i].fourthquater_count_t);
                              var fourthquater_t_val = '<span class="badge badge-corner" style="background-color:#E64A19; color:white"><i class="fa fa-star" aria-hidden="true"></i> Efficiency: <b>'+ val_t.toFixed(2) +'</b></span><br>';
                            }else{
                              var fourthquater_t_val = '<span class="badge badge-corner" style="background-color:#E64A19; color:white"><i class="fa fa-star" aria-hidden="true"></i> Efficiency: <b></b></span><br>';
                            }
                      
//---------------------------Fourth Quarter ---------------------  

//---------------------------2nd Semester---------------------
                            if($.isNumeric(third_quarter)){
                              var third_quarter = third_quarter;
                            }else{
                              var third_quarter = 0;
                            }
                            if($.isNumeric(fourth_quarter)){
                              var fourth_quarter = fourth_quarter;
                            }else{
                              var fourth_quarter = 0;
                            }
                           
                            var second_semester = parseInt(third_quarter)+parseInt(fourth_quarter);
                            if($.isNumeric(second_semester)){
                              second_semester = second_semester;
                            } else{
                              second_semester = "System Error";
                            } 

                            if($.isNumeric((parseInt(data[i].thirdquater_q) / parseInt(data[i].thirdquater_count) + parseInt(data[i].fourthquater_q) / parseInt(data[i].fourthquater_count))/2)){
                              var secondsem_val = (parseInt(data[i].thirdquater_q) / parseInt(data[i].thirdquater_count) + parseInt(data[i].fourthquater_q) / parseInt(data[i].fourthquater_count))/2;
                              var secondsemester_q_val = '<br><span class="badge badge-corner" style="background-color:#E64A19; color:white"><i class="fa fa-star" aria-hidden="true"></i> Quality: <b>'+ secondsem_val.toFixed(2) +'</b></span><br>';
                            }else{
                              var secondsemester_q_val = '<br><span class="badge badge-corner" style="background-color:#E64A19; color:white"><i class="fa fa-star" aria-hidden="true"></i> Quality: <b></b></span><br>';
                            }

                            if($.isNumeric((parseInt(data[i].thirdquater_e) / parseInt(data[i].thirdquater_count_e) + parseInt(data[i].fourthquater_e) / parseInt(data[i].fourthquater_count_e))/2)){
                              var secondsem_val_e = (parseInt(data[i].thirdquater_e) / parseInt(data[i].thirdquater_count_e) + parseInt(data[i].fourthquater_e) / parseInt(data[i].fourthquater_count_e))/2;
                              var secondsemester_e_val = '<span class="badge badge-corner" style="background-color:#E64A19; color:white"><i class="fa fa-star" aria-hidden="true"></i> Efficiency: <b>'+ secondsem_val_e.toFixed(2) +'</b></span><br>';
                            }else{
                              var secondsemester_e_val = '<span class="badge badge-corner" style="background-color:#E64A19; color:white"><i class="fa fa-star" aria-hidden="true"></i> Efficiency: <b></b></span><br>';
                            }

                            if($.isNumeric((parseInt(data[i].thirdquater_t) / parseInt(data[i].thirdquater_count_t) + parseInt(data[i].fourthquater_t) / parseInt(data[i].fourthquater_count_t))/2)){
                              var secondsem_val_t = (parseInt(data[i].thirdquater_t) / parseInt(data[i].thirdquater_count_t) + parseInt(data[i].fourthquater_t) / parseInt(data[i].fourthquater_count_t))/2;
                              var secondsemester_t_val = '<span class="badge badge-corner" style="background-color:#E64A19; color:white"><i class="fa fa-star" aria-hidden="true"></i> Timeliness: <b>'+ secondsem_val_t.toFixed(2) +'</b></span><br>';
                            }else{
                              var secondsemester_t_val = '<span class="badge badge-corner" style="background-color:#E64A19; color:white"><i class="fa fa-star" aria-hidden="true"></i> Timeliness: <b></b></span><br>';
                            }


//---------------------------2nd Semester ---------------------  

//---------------------------Total---------------------
                            if($.isNumeric(first_semester)){
                              var first_semester = first_semester;
                            }else{
                              var first_semester = 0;
                            }
                            if($.isNumeric(second_semester)){
                              var second_semester = second_semester;
                            }else{
                              var second_semester = 0;
                            }
                           
                            var total = parseInt(first_semester)+parseInt(second_semester);
                            if($.isNumeric(total)){
                              total = total;
                            } else{
                              total = "System Error";
                            } 
                           
                            var total_val = (((parseInt(data[i].firstquater_q) / parseInt(data[i].firstquater_count) + parseInt(data[i].secondquater_q) / parseInt(data[i].secondquater_count))/2) + ((parseInt(data[i].thirdquater_q) / parseInt(data[i].thirdquater_count) + parseInt(data[i].fourthquater_q) / parseInt(data[i].fourthquater_count))/2))/2;
                            if($.isNumeric(total_val)){
                              var total_q_val = '<br><span class="badge badge-corner" style="background-color:#E64A19; color:white"><i class="fa fa-star" aria-hidden="true"></i> Quality: <b>'+ total_val.toFixed(2) +'</b></span><br>';
                            }else{
                              var total_q_val = '<br><span class="badge badge-corner" style="background-color:#E64A19; color:white"><i class="fa fa-star" aria-hidden="true"></i> Quality: <b></b></span><br>';
                            }

                            var total_val_e = (((parseInt(data[i].firstquater_e) / parseInt(data[i].firstquater_count_e) + parseInt(data[i].secondquater_e) / parseInt(data[i].secondquater_count_e))/2) + ((parseInt(data[i].thirdquater_e) / parseInt(data[i].thirdquater_count_e) + parseInt(data[i].fourthquater_e) / parseInt(data[i].fourthquater_count_e))/2))/2;
                            if($.isNumeric(total_val_e)){
                              var total_e_val = '<span class="badge badge-corner" style="background-color:#E64A19; color:white"><i class="fa fa-star" aria-hidden="true"></i> Efficiency: <b>'+ total_val_e.toFixed(2) +'</b></span><br>';
                            }else{
                              var total_e_val = '<span class="badge badge-corner" style="background-color:#E64A19; color:white"><i class="fa fa-star" aria-hidden="true"></i> Efficiency: <b></b></span><br>';
                            }

                            var total_val_t = (((parseInt(data[i].firstquater_t) / parseInt(data[i].firstquater_count_t) + parseInt(data[i].secondquater_t) / parseInt(data[i].secondquater_count_t))/2) + ((parseInt(data[i].thirdquater_t) / parseInt(data[i].thirdquater_count_t) + parseInt(data[i].fourthquater_t) / parseInt(data[i].fourthquater_count_t))/2))/2;
                            if($.isNumeric(total_val_t)){
                              var total_t_val = '<span class="badge badge-corner" style="background-color:#E64A19; color:white"><i class="fa fa-star" aria-hidden="true"></i> Timeliness: <b>'+ total_val_t.toFixed(2) +'</b></span><br>';
                            }else{
                              var total_t_val = '<span class="badge badge-corner" style="background-color:#E64A19; color:white"><i class="fa fa-star" aria-hidden="true"></i> Timeliness: <b></b></span><br>';
                            }

                            //Remaining

//---------------------------Total ---------------------  

//-------------------------Person Incharge-------------------
                            if(data[i].emp_incharge == null || data[i].emp_incharge == ''){
                              var emp_incharge = '';
                            }else{
                              var emp_incharge = '<br><br><span><i class="fa fa-user" aria-hidden="true"></i> Focal: <b>'+ data[i].emp_incharge.toUpperCase() +'</b></span>';
                            }

                            if(data[i].emp_incharge_jo == null || data[i].emp_incharge_jo == ''){
                              var emp_incharge_jo = '';
                            }else{
                              var emp_incharge_jo = '<br><span><i class="fa fa-user" aria-hidden="true"></i> Focal (JO): <b>'+ data[i].emp_incharge_jo.toUpperCase() +'</b></span>';
                            }
//-------------------------Person Incharge-------------------

                             html += '<tr>'+
                                          '<td class="sticky1"></span>'+x+'</td>'+
                                          '<td class="sticky2"><center>'+ous_target+'</center></td>'+
                                          '<td class="sticky3">'+data[i].ind_desc.toUpperCase()+emp_incharge+emp_incharge_jo+'</td>'+
                                          '<td class="sticky4"><strong>'+total+total_q_val+total_e_val+total_t_val+'</strong></td>'+
                                          '<td><strong>'+first_semester+firstsemester_q_val+firstsemester_e_val+firstsemester_t_val+'</strong></td>'+
                                          '<td><strong>'+second_semester+secondsemester_q_val+secondsemester_e_val+secondsemester_t_val+'<strong></td>'+
                                          '<td><strong>'+first_quarter+firstquater_q_val+firstquater_e_val+firstquater_t_val+'</strong></td>'+
                                          '<td><strong>'+second_quarter+secondquater_q_val+secondquater_e_val+secondquater_t_val+'</strong></td>'+
                                          '<td><strong>'+third_quarter+thirdquater_q_val+thirdquater_e_val+thirdquater_t_val+'</strong></td>'+
                                          '<td><strong>'+fourth_quarter+fourthquater_q_val+fourthquater_e_val+fourthquater_t_val+'</strong></td>'+
                                          '<td><strong><a href="#1-'+ data[i].ind_id +'" class="btn btn-sm btn-primary">1st Semester</a></strong></td>'+
                                          '<td><strong><a href="#2-'+ data[i].ind_id +'" class="btn btn-sm btn-danger">2nd Semester</a></strong></td>'+
                                      '</tr>'+
                                      '<tr id="1-'+ data[i].ind_id +'" class="toggle">'+
                                          '<td class="sticky1"></span></td>'+
                                          '<td class="sticky2"></td>'+
                                          '<td class="sticky3">'+data[i].ind_desc.toUpperCase()+emp_incharge+emp_incharge_jo+'</td>'+
                                          '<td>January <br>'+January+'</td>'+
                                          '<td>February <br> '+February+'</td>'+
                                          '<td>March <br> '+March+'</td>'+
                                          '<td>April <br> '+April+'</td>'+
                                          '<td>May <br> '+May1+'</td>'+
                                          '<td>June <br>'+June+'</td>'+
                                          '<td colspan="3"><center> <h1><br>1st Semester Accomplishments</h1> </centre></td>'+
                                      '</tr>'+
                                          '<tr id="2-'+ data[i].ind_id +'" class="toggle">'+
                                          '<td class="sticky1"></span></td>'+
                                          '<td class="sticky2"></td>'+
                                          '<td class="sticky3">'+data[i].ind_desc.toUpperCase()+emp_incharge+emp_incharge_jo+'</td>'+
                                          '<td>July <br>'+July+'</td>'+
                                          '<td>August <br>'+August+'</td>'+
                                          '<td>September <br>'+September+'</td>'+
                                          '<td>October <br>'+October+'</td>'+
                                          '<td>November <br>'+November+'</td>'+
                                          '<td>December <br>'+December+'</td>'+
                                          '<td colspan="3"><center> <h1><br>2nd Semester Accomplishments</h1></centre></td>'+
                                      '</tr>';
                                      x=x+1;
                          //reset
                          }
                          console.log(data);
                          $('#pobatanes_table_tbody').html(html);
                      }
                  });
              }
//PO Batanes

//----------------Edit Accomplishment--------------

        //get data for Accomplishment 
        $('#pobatanes_table_tbody').on('click','.January_edit',function(){
              var ind_id = $(this).data('ind_id');
              $('#ind_id').val(ind_id);
              
              var ous_editor = $(this).data('ous_editor');
              $('#ous_editor').val(ous_editor);

              var edit_target_ID = $(this).data('edit_target_id');
              $('#edit_target_id').val(edit_target_ID);

              var edit_target_month = $(this).data('edit_target_month');
              $('#edit_target_month').val(edit_target_month);
              $('#edit_target_month2').text(edit_target_month);
              
              var edit_filename = $(this).data('filename');
              $('#edit_filename').val(edit_filename);
             
              var edit_target_accomplishment = $(this).data('edit_target_accomplishment');
              $('#edit_target_accomplishment').val(edit_target_accomplishment);

              var edit_target_desc = $(this).data('edit_target_desc');
              $('#edit_target_desc12').text(edit_target_desc);

              var po_batanes_target = $(this).data('po_batanes_target');
              $('#po_batanes_target').val(po_batanes_target);

              var deadline = $(this).data('edit_deadline');
              $('#edit_deadline').val(deadline);
        });

        $('#edit_target_form').submit(function(e){
            e.preventDefault(); 
                 $.ajax({
                     url: "<?php echo base_url().'update_target_id'?>",
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
                              $('#edit_target_form').prepend(html);
                              
                              //Clear Text Box
                              //$('[name="edit_target_accomplishment"]').val("");
                              $('[name="edit_target_attachment"]').val(null);

                        }else{
                          html = '<div class="alert alert-danger mt-2"><i class="fa fa-times-circle" aria-hidden="true"></i> <b>'+ json.error +'</b></div>';
                              $('#edit_target_form').prepend(html);

                              //Clear Text Box
                              $('[name="edit_target_attachment"]').val(null);
                        }
                       
                        //Hide
                        $(".alert").delay(4000).slideUp(200, function() {
                            $(this).alert('close');
                        });
                                                    
                        show_pmr(year_pmr); 
                        show_pobatanes(year_pmr, selectedTabValue);
                   }
                 });
            });

//----------------Edit Accomplishment--------------

//----------------Delete Accomplishment--------------

        //get data for Accomplishment 
        $('#pobatanes_table_tbody').on('click','.January_edit',function(){
              var ind_id_del = $(this).data('ind_id_del');
              $('#ind_id_del').val(ind_id_del);

              var del_target_desc = $(this).data('del_target_desc');
              $('#del_target_desc123').text(del_target_desc);
        });

        $('#del_target_form').submit(function(e){
            e.preventDefault(); 
                 $.ajax({
                     url: "<?php echo base_url().'del_target_id'?>",
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
                              $('#del_target_form').prepend(html);
                              
                              //Clear Text Box
                              //$('[name="edit_target_accomplishment"]').val("");
                              //$('[name="edit_target_attachment"]').val(null);

                        }else{
                          html = '<div class="alert alert-danger mt-2"><i class="fa fa-times-circle" aria-hidden="true"></i> <b>'+ json.error +'</b></div>';
                              $('#edit_target_form').prepend(html);

                              //Clear Text Box
                              //$('[name="edit_target_attachment"]').val(null);
                        }
                       
                        //Hide
                        $(".alert").delay(4000).slideUp(200, function() {
                            $(this).alert('close');
                        });
                                                    
                        show_pmr(year_pmr); 
                        show_pobatanes(year_pmr, selectedTabValue);
                   }
                 });
            });

//----------------Delete Accomplishment--------------

//----------------Rate Accomplishment--------------

        //get data for Accomplishment 
        $('#pobatanes_table_tbody').on('click','.rate_edit',function(){
              var edit_target_ID = $(this).data('edit_target_id');
              $('#rate_target_id').val(edit_target_ID);

              var edit_target_desc = $(this).data('edit_target_desc');
              $('#ind_desc').text(edit_target_desc);

              var edit_target_accomplishment = $(this).data('edit_target_accomplishment');
              $('#edit_target_accomplishment1').text(edit_target_accomplishment);

              var edit_target_submitted = $(this).data('edit_target_submitted');
              $('#edit_target_submitted').text(edit_target_submitted);

              var edit_target_link = $(this).data('edit_target_link');
              $('#edit_target_link').prop('href', edit_target_link);

              var edit_target_month = $(this).data('edit_target_month');
              $('#edit_target_month1').text(edit_target_month);

              var evi_q = $(this).data('evi_q');
              $('#edit_target_quality').val(evi_q);

              var evi_e = $(this).data('evi_e');
              $('#edit_target_efficiency').val(evi_e);

              var evi_t = $(this).data('evi_t');
              $('#edit_target_timeliness').val(evi_t);
        });

        $('#rate_target_form').submit(function(e){
            e.preventDefault(); 
                 $.ajax({
                     url: "<?php echo base_url().'rate_target_id'?>",
                     type: "post",
                     data: new FormData(this),
                     processData: false,
                     contentType: false,
                     cache: false,
                     async: false,
                      success: function(data){
                        var json = $.parseJSON(data);
                        if(json.status == 'True'){
                            html = '<div class="alert alert-success alert_message mt-2"><i class="fa fa-check-circle" aria-hidden="true"></i> <b>'+ json.error +'</b></div>';
                              $('#rate_target_form').prepend(html);
                              
                              //Clear Text Box
                              //$('[name="edit_target_id"]').val("");

                        }else{
                          html = '<div class="alert alert_message alert-danger mt-2"><i class="fa fa-times-circle" aria-hidden="true"></i> <b>'+ json.error +'</b></div>';
                              $('#rate_target_form').prepend(html);

                              //Clear Text Box
                              
                        }
                       
                        //Hide
                        $(".alert_message").delay(4000).slideUp(200, function() {
                            $(this).alert('close');
                        });
                                                    
                        show_pmr(year_pmr); 
                        show_pobatanes(year_pmr, selectedTabValue);
                   }
                 });
            });

//----------------Rate Accomplishment--------------

//----------------Edit Target OUs------------------

        //get data for Accomplishment 
        $('#pobatanes_table_tbody').on('click','.ous_target_edit_ind',function(){
              var ind_id = $(this).data('ind_id1');
              $('#edit_ou_target_ind_id').val(ind_id);
              //alert(ind_id);
              var edit_target_desc = $(this).data('edit_target_desc');
              $('#ind_desc1').text(edit_target_desc);
              //alert(edit_target_desc);
              var ous_desc = $(this).data('ous_desc');
              $('#edit_ou_target_desc').val(ous_desc);
              //alert(ous_desc);
              var po_batanes_target = $(this).data('po_batanes_target');
              $('#edit_ou_target_val').val(po_batanes_target);
              //alert(po_batanes_target);
        });

        $('#edit_ou_target_form').submit(function(e){
            e.preventDefault(); 
                 $.ajax({
                     url: "<?php echo base_url().'edit_target_ous_id'?>",
                     type: "post",
                     data: new FormData(this),
                     processData: false,
                     contentType: false,
                     cache: false,
                     async: false,
                      success: function(data){
                        var json = $.parseJSON(data);
                        if(json.status == 'True'){
                            html = '<div class="alert alert-success alert_message mt-2"><i class="fa fa-check-circle" aria-hidden="true"></i> <b>'+ json.error +'</b></div>';
                              $('#edit_ou_target_form').prepend(html);
                              
                              //Clear Text Box
                              //$('[name="edit_target_id"]').val("");
                              

                        }else{
                          html = '<div class="alert alert_message alert-danger mt-2"><i class="fa fa-times-circle" aria-hidden="true"></i> <b>'+ json.error +'</b></div>';
                              $('#edit_ou_target_form').prepend(html);

                              //Clear Text Box
                              
                        }
                       
                        //Hide
                        $(".alert_message").delay(4000).slideUp(200, function() {
                            $(this).alert('close');
                        });
                                                    
                        show_pmr(year_pmr); 
                        show_pobatanes(year_pmr, selectedTabValue);
                   }
                 });
            });

//----------------Edit Target OUs------------------

//----------------Search---------------------------
       
          $("#search-input").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#pobatanes_table #pobatanes_table_tbody tr").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
          });

          $("#search-input1").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#pap_table #pap_table_body tr").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
          });
          
//----------------Search---------------------------

          });//Close
      </script>

<!------------Style Sheet--------------->
        <style>
          .blinking{
              animation:blinkingText 1.2s infinite;
            }
            @keyframes blinkingText{
              0%{     color: #020202;    }
              49%{    color: #181818; }
              60%{    color: transparent; }
              99%{    color:transparent;  }
              100%{   color: #181818;    }
            }

            ul#show_ous_for_action li {
              display:inline;
            }
        table {
          width: 100%;
        }

        th,
        td {
          padding: 8px;
        }

        th.sticky1 {
          position: sticky;
          left: 0;
          background-color: #f1f1f1;
        }
        th.sticky2 {
          position: sticky;
          left: 20px;
          background-color: #f1f1f1;
        }
        th.sticky3 {
          position: sticky;
          left: 90px;
          background-color: #f1f1f1;
        }
        th.sticky4 {
          position: sticky;
          left: 280px;
          background-color: #f1f1f1;
        }
        td.sticky1 {
          position: sticky;
          left: 0;
          background-color: #f1f1f1;
        }
        td.sticky2 {
          position: sticky;
          left: 20px;
          background-color: #f1f1f1;
        }
        td.sticky3 {
          position: sticky;
          left: 90px;
          background-color: #f1f1f1;
        }
        td.sticky4 {
          position: sticky;
          left: 280px;
          background-color: #f1f1f1;
        }

        .toggle        { display: none; }
        .toggle:target { display: table-row; }
        </style>
<!------------Style Sheet--------------->

  <?php }?>
<?php }else{
redirect (base_url());
}?>
