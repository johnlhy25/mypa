<!--For Auditors-->
<?php
if($this->session->ous_id == 16){
    $disabled = "disabled-link";
    $blur ="blur-div";
}else{
    $disabled = " ";
    $blur = " ";
}
?>
<style>
.disabled-link{
    pointer-events: none;
    cursor: not-allowed;
    opacity: .65;
}
.blur-div {
    filter: blur(5px);
}
</style>
<!--For Auditors-->

<?php 
if( $this->session->logged_in){
  if( $this->session->role == 'Guest'){
    redirect (base_url().'Guest');
  }else{?>
  <div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid ">
              <h2 class="no-margin-bottom"> Dashboard (<?= $this->session->ous_desc?>)</h2>
            </div>
           
          </header>

          <!-- Breadcrumb-->
          <?php require_once('breadcrumb.php'); ?>
          
          <img src="<?= base_url();?>assets/img/TDIS-New12.png" width="100%" style="display:none">
          <!-- Dashboard Counts Section-->

          <!-- Cybersecurity-->
           <?php require_once('cybersecurity.php'); ?>
          <!-- Cybersecurity-->
       
          <?php

        
            //Check Storage
            $ds = round(disk_total_space("/")/ 1024 /1024 /1024 );
            $df = round(disk_free_space("/") / 1024 /1024 /1024 );

            $percent = round(($df/$ds)*100);

            //Count Docs
            $directory = "./uploads/";
              $filecount = 0;
              $files = glob($directory . "*.pdf");
              if ($files){
              $filecount = count($files);
              }      
          ?>

          <section class="dashboard-counts no-padding-bottom no-padding-top" style="display:none">
            <div class="container-fluid">
              <div class="row bg-white has-shadow">
                <!-- Item -->
                <div class="col-xl-3 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="icon bg-green"><i class="fa fa-server"></i></div>
                    <div class="title"><span>Free<br>Space</span>
                      <div class="progress">
                        <div role="progressbar" style="width: <?= $percent; ?>%; height: 4px;" aria-valuenow="<?= $percent; ?>" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-green"></div>
                      </div>
                    </div>
                    <div class="number"><small><span class="badge bg-green badge-corner" ><strong><?= $df; ?></strong>GB</small></span></div>
                  </div>
                </div>
                <!-- Item -->
                <div class="col-xl-3 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="icon bg-red"><i class="fa fa-server"></i></div>
                    <div class="title"><span>Used<br>Space</span>
                      <div class="progress">
                        <div role="progressbar" style="width: 100%; height: 4px;" aria-valuenow="<?= 100-$percent; ?>" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-red"></div>
                      </div>
                    </div>
                    <div class="number"><small><span class="badge bg-red badge-corner" ><strong><?= $ds-$df; ?></strong> GB</small></span></div>
                  </div>
                </div>
                <!-- Item -->
                <div class="col-xl-3 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="icon bg-violet"><i class="fa fa-university"></i></div>
                    <div class="title"><span>Avg. LD/<br>Employee (<?= $emp_total ?>)</span>
                      <div class="progress">
                        <div role="progressbar" style="width: 100%; height: 4px;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-violet"></div>
                      </div>
                    </div>
                    <?php if($training_total==0){ ?>
                      <div class="number"><small><span class="badge bg-violet badge-corner" ><strong>0</strong></span></small></div>
                    <?php }else{?>
                      <div class="number"><small><span class="badge bg-violet badge-corner" ><strong><?= round($training_total/$emp_total, 2); ?></strong></span></small></div>
                    <?php }?>
                  </div>
                </div>
                <!-- Item -->
                <div class="col-xl-3 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="icon bg-orange"><i class="fa fa-university"></i></div>
                    <div class="title"><span>Avg. LD/<br>OUs (<?= $OUS_total ?>)</span>
                      <div class="progress">
                        <div role="progressbar" style="width: 100%; height: 4px;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-orange"></div>
                      </div>
                    </div>
                    <?php if($training_total==0){ ?>
                      <div class="number"><small><span class="badge bg-orange badge-corner" ><strong>0</strong></span></small></div>
                    <?php }else{?>
                      <div class="number"><small><span class="badge bg-orange badge-corner" ><strong><?= round($training_total/$OUS_total, 2);?></strong></span></small></div>
                    <?php }?>
                  </div>
                </div>
              </div>
            </div>

          <!-- Dashboard Header Section    -->
          </section>

          <!-- Dashboard Header Section    -->

          <!-- Chart Section-->
          <section class="pb-0 mt-2">
            <div class="container-fluid">    
            
              <!--Travel Order System-->
                <div class="container-fluid">
                  <div class="card">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-12">
                          <div>
                            <?php if($this->session->role == "Super Admin"){?>
                              <span class="badge badge-pill"><b>Legends:</b> </span>
                              <span class="badge badge-pill" style="background-color:#BCECE0">Regional Office</span>
                              <span class="badge badge-pill" style="background-color:#F652A0;color:white">PO Batanes</span>
                              <span class="badge badge-pill" style="background-color:#36EEE0">PO Cagayan</span>
                              <span class="badge badge-pill" style="background-color:#4C5270;color:white">PO Isabela</span>
                              <span class="badge badge-pill" style="background-color:#FFF4BD">PO/PTC Quirino</span>
                              <span class="badge badge-pill" style="background-color:#F4B9B8">PO Nueva Vizcaya</span>
                              <span class="badge badge-pill" style="background-color:#85D2D0">API</span>
                              <span class="badge badge-pill" style="background-color:#887BB0;color:white">SICAT</span>
                              <span class="badge badge-pill" style="background-color:#EEB5EB">LIT</span>
                              <span class="badge badge-pill" style="background-color:#C26DBC;color:white">NVPI</span>
                              <span class="badge badge-pill" style="background-color:#C8F4F9">ISAT</span>
                              <span class="badge badge-pill" style="background-color:#3CACAE;color:white">RTC</span>
                              <br>
                              <br>
                            <?php }?>
                            <div id="calendar" class="<?= $disabled ?> "> <?= $blur ?></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--Travel Order System-->

              <!--Actual Attendance-->
              <h4><i class="fa fa-tachometer"></i> Actual Attendance</h4>
              <!-- First Chart Section-->
              <div class="row gy-4">
                  <!--First Chart Section Row-->
                  <?php if( $this->session->role == 'User'){}else { ?>
                  
                    
                    <!--1.	Summary of Learning and Development per Classification/Type (as of to date) – Actual Attendance-->
                  <div class="col-lg-6">
                 
                    <div class="card mb-0">
                      <div class="card-header position-relative">
                        <div class="card-close">
                            <a class="remove" href="#"> <i class="fa fa-times"></i></a>
                        </div>
                        <h6 class="h6 mb-0 d-flex align-items-center"> 1. Summary of Learning and Development per Classification/Type as of <?= date('F d, Y')?></h6>
                        
                      </div>

                      
                      
                      <div class="card-body p-0">
                      <?php if($training_total==0){ ?>

                                  <div class="container mt-4">
                                    <div class="card">
                                      <div class="card-body">
                                        <div class="row">
                                          <div class="col-md-8">
                                            <div class="text-center">
                                              <img class="text-center img-fluid" src="<?= base_url();?>assets/img/logoMYPA.webp" width="auto" height="150px">
                                            </div>
                                            <br>
                                            <h1>Error building Chart</h1>
                                            <p><a href="#">This</a> <b>Chart</b> currently contains no data. <a href="<?= base_url();?>logout">Switch account.</a></p>
                                            <small>You are signed in as <strong><?= $this->session->email;?></strong></small>
                                          </div>
                                          <div class="col-md-4 text-ceneter no-margin-bottom no-margin-top">
                                            <br>
                                            <img src="<?= base_url();?>assets/img/d_no.webp" class="img-fluid" width="200px" height="200px"> 
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                      <?php }else{?>
                        <canvas id="myChart" style="width:100%;height:390px; margin-bottom:20px;"></canvas>
                          <script>
                          var xValues = ["Administrative (<?= $Total_A?>) ", "Leadership (<?= $Total_L?>)", "Managerial (<?= $Total_M?>)", "Supervisory (<?= $Total_S?>)", "Technical (<?= $Total_T?>)" ];
                          var yValues = [<?= $administrative; ?>, <?= $leadership; ?>, <?= $managerial; ?>, <?= $supervisory; ?>, <?= $technical; ?>];
                          var yValuesx = [<?= $administrative; ?>, <?= $leadership; ?>, <?= $managerial; ?>, <?= $supervisory; ?>, <?= $technical; ?>];
                          var barColors = [
                            "#F44336",
                            "#2196F3",
                            "#009688",
                            "#CDDC39",
                            "#FF9800"
                          ];

                          new Chart("myChart", {
                            type: "doughnut",
                            data: {
                              labels: xValues,
                              datasets: [{
                                backgroundColor: barColors,
                                data: yValues
                              }]
                            },
                            options: {
                                title: {
                                  display: true,
                                  text: ""
                                }
                              }
                          });
                          </script>
                          <?php }?>
                      </div>
                    </div>
                  </div>
                  <!--End of 1. Summary of Learning and Development per Classification/Type (as of to date) – Actual Attendance-->
                                
                  <!-- 2.	Operating Units Summary of Learning and Development per Classification/Type-->
                  <div class="col-lg-6">
                    <div class="card mb-0">
                      <div class="card-header position-relative">
                        <div class="card-close">
                            <a class="remove" href="#"> <i class="fa fa-times"></i></a>
                        </div>
                        <h6 class="h6 mb-0 d-flex align-items-center">2. Operating Units Summary of Learning and Development per Classification/Type as of <?= date('F d, Y')?></h6>
                      </div>

                      

                      <div class="card-body p-0">
                      <?php if($training_total==0){ ?>

                                  <div class="container mt-4">
                                    <div class="card">
                                      <div class="card-body">
                                        <div class="row">
                                          <div class="col-md-8">
                                            <div class="text-center">
                                              <img class="text-center img-fluid" src="<?= base_url();?>assets/img/logoMYPA.webp" width="auto" height="150px">
                                            </div>
                                            <br>
                                            <h1>Error building Chart</h1>
                                            <p><a href="#">This</a> <b>Chart</b> currently contains no data. <a href="<?= base_url();?>logout">Switch account.</a></p>
                                            <small>You are signed in as <strong><?= $this->session->email;?></strong></small>
                                          </div>
                                          <div class="col-md-4 text-ceneter no-margin-bottom no-margin-top">
                                            <br>
                                            <img src="<?= base_url();?>assets/img/d_no.webp" class="img-fluid" width="200px" height="200px"> 
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                      <?php }else{?>
                        <canvas id="myChart5" style="width:100%;height:390px; margin-bottom:20px;"></canvas>
                          <script>
                          var ctx = document.getElementById("myChart5").getContext("2d");

                            var data = {
                                labels: [
                                  <?php foreach($data_array_per_ous as $row){ ?>
                                    "<?= $row['ous_desc']?>",
                                  <?php } ?>
                                ],
                                datasets: [
                                    {
                                        label: "Administrative",
                                        backgroundColor: "#F44336",
                                        data: [
                                          <?php foreach($data_array_per_ous as $row){ ?>
                                            <?= $row['administrative']?>,
                                          <?php } ?>
                                          ]
                                    },
                                    {
                                        label: "Leadership",
                                        backgroundColor: "#2196F3",
                                        data: [
                                          <?php foreach($data_array_per_ous as $row){ ?>
                                            <?= $row['leadership']?>,
                                          <?php } ?>
                                        ]
                                    },
                                    {
                                        label: "Managerial",
                                        backgroundColor: "#009688",
                                        data: [
                                          <?php foreach($data_array_per_ous as $row){ ?>
                                            <?= $row['managerial']?>,
                                          <?php } ?>
                                          ]
                                    },
                                    {
                                        label: "Supervisory",
                                        backgroundColor: "#CDDC39",
                                        data: [
                                          <?php foreach($data_array_per_ous as $row){ ?>
                                            <?= $row['supervisory']?>,
                                          <?php } ?>
                                          ]
                                    },
                                    {
                                        label: "Technical",
                                        backgroundColor: "#FF9800",
                                        data: [
                                          <?php foreach($data_array_per_ous as $row){ ?>
                                            <?= $row['technicals']?>,
                                          <?php } ?>
                                          ]
                                    }
                                ]
                            };

                            var myBarChart = new Chart(ctx, {
                                type: 'bar',
                                data: data,
                                options: {
                                    barValueSpacing: 20,
                                    scales: {
                                        yAxes: [{
                                            ticks: {
                                                min: 0,
                                            }
                                        }]
                                    }
                                }
                            });
                          </script>
                          <?php }?>
                      </div>
                    </div>
                  </div> 
                  <!--End of 2.	Operating Units Summary of Learning and Development per Classification/Type-->           
              <?php }?>
              <!--End of First Chart Section Row-->
              </div>
              <!--End of First Chart Section-->

              <!--Second Section-->
              <hr>

              <!-- Second Chart Section-->
              <div class="row gy-4">
                  <!--Second Chart Section Row-->
                  <?php if( $this->session->role == 'User'){}else { ?>
                    
                  <!--3. Monthly Trend of Learning and Development per Classification/Type -->
                  <div class="col-lg-6">
                    <div class="card mb-0">
                      <div class="card-header position-relative">
                        <div class="card-close">
                            <a class="remove" href="#"> <i class="fa fa-times"></i></a>
                        </div>
                        <h6 class="h6 mb-0 d-flex align-items-center">3. Monthly Trend of Learning and Development per Classification/Type (CY <?= date('Y')?>)</h6>
                      </div>

                      <div class="card-body p-0">
                        <div class="container-fluid" style="margin-bottom:20px;">
                        <?php if($training_total==0){ ?>

                        <div class="container mt-4">
                          <div class="card">
                            <div class="card-body">
                              <div class="row">
                                <div class="col-md-8">
                                  <div class="text-center">
                                    <img class="text-center img-fluid" src="<?= base_url();?>assets/img/logoMYPA.webp" width="auto" height="150px">
                                  </div>
                                  <br>
                                  <h1>Error building Chart</h1>
                                  <p><a href="#">This</a> <b>Chart</b> currently contains no data. <a href="<?= base_url();?>logout">Switch account.</a></p>
                                  <small>You are signed in as <strong><?= $this->session->email;?></strong></small>
                                </div>
                                <div class="col-md-4 text-ceneter no-margin-bottom no-margin-top">
                                  <br>
                                  <img src="<?= base_url();?>assets/img/d_no.webp" class="img-fluid" width="200px" height="200px"> 
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <?php }else{?>

                          
                          
                          <canvas id="myChart4" style="width:100%;height:370px; margin-bottom:20px; margin-top:20px;"></canvas>
                          <script>
                          var xValues = ['Jan (<?= $Total_Jan?>)','Feb (<?= $Total_Feb?>)','Mar (<?= $Total_Mar?>)','Apr (<?= $Total_Apr?>)','May (<?= $Total_May?>)','Jun (<?= $Total_Jun?>)','Jul (<?= $Total_Jul?>)','Aug (<?= $Total_Aug?>)','Sep (<?= $Total_Sep?>)','Oct (<?= $Total_Oct?>)','Nov (<?= $Total_Nov?>)','Dec (<?= $Total_Dec?>)'];
                          new Chart("myChart4", {
                            type: "line",
                            data: {
                              labels: xValues, 
                              datasets: [{ 
                                label: 'Administrative',
                                data: [<?= $Jan_A ?>,<?= $Feb_A ?>,<?= $Mar_A ?>,<?= $Apr_A ?>,<?= $May_A ?>,<?= $Jun_A ?>,<?= $Jul_A ?>,<?= $Aug_A ?>,<?= $Sep_A ?>,<?= $Oct_A ?>,<?= $Nov_A ?>,<?= $Dec_A ?>],
                                backgroundColor: "#F44336",
                                borderColor:"#F44336",
                                fill: false
                              }, { 
                                label: 'Leadership',
                                data: [<?= $Jan_L ?>,<?= $Feb_L ?>,<?= $Mar_L ?>,<?= $Apr_L ?>,<?= $May_L ?>,<?= $Jun_L ?>,<?= $Jul_L ?>,<?= $Aug_L ?>,<?= $Sep_L ?>,<?= $Oct_L ?>,<?= $Nov_L ?>,<?= $Dec_L ?>],
                                backgroundColor: "#2196F3",
                                borderColor:"#2196F3",
                                fill: false
                              }, { 
                                label: 'Managerial',
                                data: [<?= $Jan_M ?>,<?= $Feb_M ?>,<?= $Mar_M ?>,<?= $Apr_M ?>,<?= $May_M ?>,<?= $Jun_M ?>,<?= $Jul_M ?>,<?= $Aug_M ?>,<?= $Sep_M ?>,<?= $Oct_M ?>,<?= $Nov_M ?>,<?= $Dec_M ?>],
                                backgroundColor: "#009688",
                                borderColor:"#009688",
                                fill: false
                              }, { 
                                label: 'Supervisory',
                                data: [<?= $Jan_S ?>,<?= $Feb_S ?>,<?= $Mar_S ?>,<?= $Apr_S ?>,<?= $May_S ?>,<?= $Jun_S ?>,<?= $Jul_S ?>,<?= $Aug_S ?>,<?= $Sep_S ?>,<?= $Oct_S ?>,<?= $Nov_S ?>,<?= $Dec_S ?>],
                                backgroundColor: "#CDDC39",
                                borderColor:"#CDDC39",
                                fill: false
                              }, { 
                                label: 'Technical',
                                data: [<?= $Jan_T ?>,<?= $Feb_T ?>,<?= $Mar_T ?>,<?= $Apr_T ?>,<?= $May_T ?>,<?= $Jun_T ?>,<?= $Jul_T ?>,<?= $Aug_T ?>,<?= $Sep_T ?>,<?= $Oct_T ?>,<?= $Nov_T ?>,<?= $Dec_T ?>],
                                backgroundColor: "#FF9800",
                                borderColor: "#FF9800",
                                fill: false
                              }]
                            },
                            options: {
                              legend: {
                                display: true
                                }
                            }
                          });
                          </script>
                           <?php }?>
                        </div>

                      </div>
                    </div>
                  </div>
                  <!--End of 3. Monthly Trend of Learning and Development per Classification/Type -->

                  <!--Second Chart-->

                  
                </div>

              <?php }?>
              <!--End of Second Chart Section Row-->
              </div>
              <!--End of Second Chart Section-->
             
               <!--Actual Attendance-->
            <div>
          </section>


          <!--If Admin-->
          <?php 
          if( $this->session->role == 'User'){
          }else{
          ?>

        <style>
          .blinking{
              animation:blinkingText 1.2s infinite;
            }
            @keyframes blinkingText{
              0%{     color: #FAFAFA;    }
              49%{    color: #FAFAFA; }
              60%{    color: transparent; }
              99%{    color:transparent;  }
              100%{   color: #EEEEEE;    }
            }

            ul#show_ous_for_action li {
              display:inline;
            }
        </style>

          <!-- Feeds Section-->
          <section class="pb-0">
            <div class="container-fluid">

              <div class="row gy-4">
                  <!-- Trending Articles-->
                  <div class="col-lg-12">
                    <div class="card mb-0">
                      <div class="card-header position-relative">
                        <div class="card-close">
                            <a class="remove" href="#"> <i class="fa fa-times"></i></a>
                        </div>
                        <h2 class="h3 mb-0 d-flex align-items-center"><span class="badge badge-corner blinking" style="background-color:#BF360C; color:white"><b><i class="fa fa-exclamation-circle" aria-hidden="true"></i></span> &nbsp Latest Training Program Invitations/ Training to Attendance (For Action)</h2>
                      </div>

                      <div class="card-body p-0">
                        <?php if($training_total==0){ ?>

                          <div class="container mt-4">
                            <div class="card">
                              <div class="card-body">
                                <div class="row">
                                  <div class="col-md-8">
                                    <div class="text-center">
                                      <img class="text-center img-fluid" src="<?= base_url();?>assets/img/logoMYPA.webp" width="auto" height="150px">
                                    </div>
                                    <br>
                                    <h1>No data available</h1>
                                    <p><a href="#">Unable</a> to display the list. <a href="<?= base_url();?>logout">Switch account.</a></p>
                                    <small>You are signed in as <strong><?= $this->session->email;?></strong></small>
                                  </div>
                                  <div class="col-md-4 text-ceneter no-margin-bottom no-margin-top">
                                    <br>
                                    <img src="<?= base_url();?>assets/img/d_no.webp" class="img-fluid" width="200px" height="200px"> 
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                        <?php }else{?>
                          
                          
                          <?php foreach($test_array as $row) { 

                            //fetch ous need for action
                            

                            $year = date('Y', strtotime($row['trn_from_date']));

                            //Deadline
                            if (date('m/d/Y', strtotime($row['trn_deadline'])) < date("m/d/Y")){
                              $disabled_deadline = 'disabled';
                            }else{
                              $disabled_deadline = '';
                            }

                            //trap TPMR
                            if($row['trn_tmpr'] == '1'){
                              $trn_tmpr = 'disabled';
                              $type = '<span class="badge badge-corner" style="background-color:#757575; color:white"><b><i class="fa fa-file-pdf-o" aria-hidden="true"></i> TESDA Order</b></span>';
                            }else{
                              $trn_tmpr = '';
                              $type = '<span class="badge badge-corner" style="background-color:#424242; color:white"><b><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Invitation</b></span>';
                            }
                            
                            if($trn_tmpr == 'disabled' or $disabled_deadline == 'disabled'){
                              $disabled_lock = 'pointer-events: none; color:grey';
                              $additional = ';)'; 
                            }else{
                              $disabled_lock = '';
                              $additional = ';)';
                            }
                          ?>

                          
                            
                            <div class="p-3 d-flex align-items-center">
                          
                              <div class="ms-3">
                                <a class="d-block" href="#">
                                  <h3 class="h5 fw-normal text-dark mb-0"><?= strtoupper($row['trn_title']) ?> </h3> </a>
                                  <?= $type ?>
                                  <span class="badge badge-corner" style="background-color:#01579B; color:white"> <b><i class="fa fa-calendar" aria-hidden="true"></i> <?= date('F d, Y', strtotime($row['trn_from_date'])) ?> to <?= date('F d, Y', strtotime($row['trn_to_date'])) ?></b></span>
                                  <br>
                                
                                <small class="text-gray-500 no-margin-bottom">
                                  <?php if($row['trn_tmpr'] == '1'){?>
                                    <?php if( $this->session->role == 'Super Admin'){ ?>
                                      <a href="<?= base_url().'uploads/trails/'.$row['trn_inv_file']?>" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download</a> | <a href="<?= base_url();?>add_nominee/<?= $year ?>-<?= $row['inv_trn_id'] ?>-<?= $row['inv_trn_memo_mo'] ?>" class="<?= $disabled?> "> <i class="fa fa-user-plus" aria-hidden="true"></i> Add Attendee/s</a> | <a href="<?= base_url();?>view_nominee/<?= $year ?>-<?= $row['inv_trn_id'] ?>-<?= $row['inv_trn_memo_mo'] ?>"> <i class="fa fa-eye" aria-hidden="true"></i> View Attendee/s</a> 
                                    <?php }elseif ( $this->session->role == 'Admin'){ ?>
                                      <a href="<?= base_url().'uploads/trails/'.$row['trn_inv_file']?>" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download</a> | <a href="<?= base_url();?>add_nominee/<?= $year ?>-<?= $row['inv_trn_id'] ?>-<?= $row['inv_trn_memo_mo'] ?>" style="<?= $disabled_lock ?>" class="<?= $disabled?> "> <i class="fa fa-user-plus" aria-hidden="true"></i> Add Attendee/s</a> | <a href="<?= base_url();?>view_nominee/<?= $year ?>-<?= $row['inv_trn_id'] ?>-<?= $row['inv_trn_memo_mo'] ?>" class="<?= $disabled?> "> <i class="fa fa-eye" aria-hidden="true"></i> View Attendee/s</a> 
                                    <?php } ?> 
                                  <?php } else{ ?>
                                    <?php if( $this->session->role == 'Super Admin'){ ?>
                                      <a href="<?= base_url().'uploads/trails/'.$row['trn_inv_file']?>" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download</a> | <a href="<?= base_url();?>add_nominee/<?= $year ?>-<?= $row['inv_trn_id'] ?>-<?= $row['inv_trn_memo_mo'] ?>" class="<?= $disabled?> "> <i class="fa fa-user-plus" aria-hidden="true"></i> Add Nominee/s</a> | <a href="<?= base_url();?>view_nominee/<?= $year ?>-<?= $row['inv_trn_id'] ?>-<?= $row['inv_trn_memo_mo'] ?>" class="<?= $disabled?> "> <i class="fa fa-eye" aria-hidden="true"></i> View Nominee/s</a> 
                                    <?php }elseif ( $this->session->role == 'Admin'){ ?>
                                      <a href="<?= base_url().'uploads/trails/'.$row['trn_inv_file']?>" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download</a> | <a href="<?= base_url();?>add_nominee/<?= $year ?>-<?= $row['inv_trn_id'] ?>-<?= $row['inv_trn_memo_mo'] ?>" style="<?= $disabled_lock ?>" class="<?= $disabled?> "> <i class="fa fa-user-plus" aria-hidden="true"></i> Add Nominee/s</a> | <a href="<?= base_url();?>view_nominee/<?= $year ?>-<?= $row['inv_trn_id'] ?>-<?= $row['inv_trn_memo_mo'] ?>" class="<?= $disabled?> "> <i class="fa fa-eye" aria-hidden="true"></i> View Nominee/s</a> 
                                    <?php } ?> 
                                  <?php } ?>
                                 
                                  <br>Posted on <?= $row['trn_timestamp'] ?> by <?= $row['usr_name'] ?>
                                  <?php if($row['trn_tmpr'] == '1'){?>
                                  <?php } else{ ?>
                                    <br><small> Legend: <span class="badge badge-corner" style="background-color:#00695C; color:white"><b><i class="fa fa-check-circle" aria-hidden="true"></i> ACTED<b></span> | <span class="badge bg-red badge-corner"><b><i class="fa fa-times-circle" aria-hidden="true"></i> PENDING<b></span></small>
                                  <?php } ?>

                                  <ul id="show_ous_for_action" >
                                    <?php if($row['ous_desc_x'] == null) {} else{?>
                                      <?php if($row['trn_tmpr'] == '1'){?>
                                        <li> <span class="badge badge-corner" style="background-color:#FBC02D; color:#212121"><b><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Action needed: To confirm the attendance [Note: The default status is "Did not attend"]<b></span></li>
                                      <?php } else{ ?>
                                        <li> <span class="badge badge-corner" style="background-color:#FBC02D; color:#212121"><b><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Action needed: To nominate and upload memorandum re: nomination<b></span></li>
                                      <?php } ?>
                                    <?php } ?>
                                    <br>
                                    <?php foreach($row['ous_desc_x'] as $xrow) { ?>
                                      <?php if($row['trn_tmpr'] == '1'){?>
                                        <li> <span class="badge badge-corner" style="background-color:#00695C; color:white"><i class="fa fa-check-circle" aria-hidden="true"></i> <?= $xrow['ous_desc']?></span></li> 
                                      <?php } else{ ?>
                                        <?php if ($xrow['act_status'] == null){?>
                                          <li> <span class="badge bg-red badge-corner"><i class="fa fa-times-circle blinking" aria-hidden="true"></i> <?= $xrow['ous_desc']?></span></li> 
                                        <?php } else{ ?>
                                          <li> <span class="badge badge-corner" style="background-color:#00695C; color:white"><i class="fa fa-check-circle" aria-hidden="true"></i> <?= $xrow['ous_desc']?></span></li> 
                                        <?php } ?>
                                      <?php } ?>
                                   <?php } ?>
                                  </ul>
                                </small>
                                
                                
                              </div>
                            </div>
                          <?php } ?>

                        <?php } ?>
                      </div>

                    </div>
                  </div>
              </div>
            <div>
          </section>

          <!-- Feeds Section-->
          <section class="pb-0 mt-2" style="margin-bottom: 50px;">
            <div class="container-fluid">

              <div class="row gy-4">
                  <!-- Trending Articles-->
                  <div class="col-lg-8">
                    <div class="card mb-0">
                      <div class="card-header position-relative">
                        <div class="card-close">
                            <a class="remove" href="#"> <i class="fa fa-times"></i></a>
                        </div>
                        <h2 class="h3 mb-0 d-flex align-items-center"><i class="fa fa-graduation-cap" aria-hidden="true"></i> &nbsp Latest Learning and Development Interventions/Training Programs</h2>
                      </div>

                      <div class="card-body p-0">
                        <?php if($training_total==0){ ?>

                          <div class="container mt-4">
                            <div class="card">
                              <div class="card-body">
                                <div class="row">
                                  <div class="col-md-8">
                                    <div class="text-center">
                                      <img class="text-center img-fluid" src="<?= base_url();?>assets/img/logoMYPA.webp" width="auto" height="150px">
                                    </div>
                                    <br>
                                    <h1>No data available</h1>
                                    <p><a href="#">Unable</a> to display the list. <a href="<?= base_url();?>logout">Switch account.</a></p>
                                    <small>You are signed in as <strong><?= $this->session->email;?></strong></small>
                                  </div>
                                  <div class="col-md-4 text-ceneter no-margin-bottom no-margin-top">
                                    <br>
                                    <img src="<?= base_url();?>assets/img/d_no.webp" class="img-fluid" width="200px" height="200px"> 
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                        <?php }else{?>

                          <?php foreach($latest_trainings_of_user as $row) { ?>
                            <div class="p-3 d-flex align-items-center">
                                    <?php if($row['usr_link_id'] == null) {?>
                                      <img class="img-fluid rounded-circle p-1 border border-faintGreen flex-shrink-0" src="<?= base_url();?>uploads/profile/img_avatar1.png" alt="..." width="50">
                                    <?php } else{ ?>
                                      <img class="img-fluid rounded-circle p-1 border border-faintGreen flex-shrink-0" src="<?= base_url();?>uploads/profile/<?= $row['usr_link_id'];?>" alt="..." width="50">
                                    <?php } ?>  
                              <div class="ms-3">
                                <a class="d-block" href="#">
                                  <h3 class="h5 fw-normal text-dark mb-0"><?= strtoupper($row['trn_learn_dev']) ?></h3></a><small class="text-gray-500">Posted on <?= $row['trn_timestamp'] ?> by <?= $row['usr_name'] ?>.   </small>
                              </div>
                            </div>
                          <?php } ?>

                        <?php } ?>
                      </div>

                    </div>
                  </div>
                                
                  <!-- Recent Login-->
                  <div class="col-lg-4">
                    <div class="card mb-0">
                      <div class="card-header position-relative">
                        <div class="card-close">
                            <a class="remove" href="#"> <i class="fa fa-times"></i></a>
                        </div>
                        <h2 class="h3 mb-0 d-flex align-items-center"><i class="fa fa-sign-in" aria-hidden="true"></i>&nbsp Recent Activities</h2>
                      </div>

                      <div class="card-body p-0">
                        <?php foreach($recent_login as $row) { ?>
                          <div class="p-3 d-flex align-items-center">
                                  <?php if($row['usr_link_id'] == null) {?>
                                    <img class="img-fluid rounded-circle p-1 border border-faintGreen flex-shrink-0" src="<?= base_url();?>uploads/profile/img_avatar1.png" alt="..." width="50" height="60">
                                  <?php } else{ ?>
                                    <img class="img-fluid rounded-circle p-1 border border-faintGreen flex-shrink-0" src="<?= base_url();?>uploads/profile/<?= $row['usr_link_id'];?>" alt="..." width="50" height="50" style="width: 50px; height: 50px;">
                                  <?php } ?>  
                            <div class="ms-3">
                              <a class="d-block" href="#">
                                <h3 class="h5 fw-normal text-dark mb-0"><?= strtoupper($row['usr_name']) ?></h3></a><small class="text-gray-500">Logged at <?= $row['log_usr_ip'] ?> using <?= $row['log_usr_platform'] ?>, <?= $row['log_usr_browser']?> v. <?= $row['log_usr_browserversion']?>   </small>
                            </div>
                          </div>
                        <?php } ?>

                      </div>
                    </div>
                  </div>

              </div>
            <div>
          </section>

          <?php 
          }
          ?>

          <!--If Admin-->
          <script>

          	$(document).ready( function () {
              var calendarEl = document.getElementById('calendar');
              var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridWeek',
                timeZone: 'Asia/Manila',
                headerToolbar: {
                    left: 'prev, next, today',
                    center: 'title',
                    right: 'dayGridMonth, dayGridWeek, dayGridDay'
                },
                events: {
                  url: '<?= base_url() ?>Travel/getEvents'
                },
                selectable: true,
                selectHelper: true,
                editable: false,
                dayMaxEvents: true, // for all non-TimeGrid views
                // allow "more" link when too many events
                views: {
                  timeGrid: {
                    eventLimit: 1 // adjust to 6 only for timeGridWeek/timeGridDay
                  }
                },
                
                eventClick: function(calEvent, jsEvent, view) {
                    // Set currentEvent variable according to the event clicked in the calendar
                    currentEvent = calEvent.event;
                    //alert(JSON.stringify(currentEvent));
                    // Open modal to edit or delete event
                    modal({
                      
                        event: currentEvent
                    });
                }

              });

              // Prepares the modal window according to data passed
              function modal(data) {
                  // Clear buttons except Cancel
                  $('.modal-footer button:not(".btn-default")').remove();
                  // Set input values
                  var name = data.event ? data.event.title : '';
                  var place = data.event ? data.event.extendedProps["description"] : '';
                  var operating = data.event ? data.event.extendedProps["operating"] : '';
                  var purpose = data.event ? data.event.extendedProps["purpose"] : '';
                  var from = data.event ? data.event.start : '';
                  var to = data.event ? data.event.end : '';
                  $('#traveller').val(name.toUpperCase());        
                  $('#travelAddress').val(place.toUpperCase());
                  $('#travellerOperating').val(operating.toUpperCase());
                  $('#travellerPurpose').val(purpose.toUpperCase());
                  $('#travellerFrom').val(moment(from).format('MM/DD/YYYY'));
                  if(to){
                   var toF = moment(to).subtract(1, 'days').format('MM/DD/YYYY')
                    $('#travellerTo').val(toF);
                  }else{
                    $('#travellerTo').val('');
                  }
                  
                  //Show Modal
                  $('#event').modal('show');
              }

              calendar.render();
              
            });

          </script>

         <div id="event" class="modal fade ">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Travel Details</h4>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    </div>
                    <div class="modal-body">
                      <div class="col-md-12">
                        <div class="row form-group">
                          <div class="col-sm-4">
                            <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-user" aria-hidden="true"></i><b> Name: </b></label>
                          </div>
                          <div class="col-sm-8">
                            <textarea id="traveller" class="form-control" rows="2" readonly></textarea>
                          </div>
                        </div>

                        <div class="row form-group">
                          <div class="col-sm-4">
                            <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-building" aria-hidden="true"></i><b> Operating Unit: </b></label>
                          </div>
                          <div class="col-sm-8">
                            <textarea id="travellerOperating" class="form-control" rows="2" readonly></textarea>
                          </div>
                        </div>

                        <div class="row form-group">
                          <div class="col-sm-4">
                            <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-calendar" aria-hidden="true"></i><b> Departure Date: </b></label>
                          </div>
                          <div class="col-sm-8">
                            <textarea id="travellerFrom" class="form-control" rows="2" readonly></textarea>
                          </div>
                        </div>

                        <div class="row form-group">
                          <div class="col-sm-4">
                            <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-calendar" aria-hidden="true"></i><b> Expected Return: </b></label>
                          </div>
                          <div class="col-sm-8">
                            <textarea id="travellerTo" class="form-control" rows="2" readonly></textarea>
                          </div>
                        </div>
                        
                        <div class="row form-group">
                          <div class="col-sm-4">
                            <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-list" aria-hidden="true"></i><b> Purpose: </b></label>
                          </div>
                          <div class="col-sm-8">
                            <textarea id="travellerPurpose" class="form-control" rows="5" readonly></textarea>
                          </div>
                        </div>

                        <div class="row form-group">
                          <div class="col-sm-4">
                            <label class="control-label pull-left" style="position:relative; top:7px;"><i class="fa fa-map" aria-hidden="true"></i><b> Place: </b></label>
                          </div>
                          <div class="col-sm-8">
                            <textarea id="travelAddress" class="form-control" rows="2" readonly></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>

          
  <?php }?>
<?php }else{
redirect (base_url());
}?>

