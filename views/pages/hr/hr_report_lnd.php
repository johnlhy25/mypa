<!DOCTYPE html>
<html>
<head>
  <title>Learning and Development Reports</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="title" content="R2 FASD Services System">
  <meta name="description" content="R2 FASD Services System is a one-stop application that provides different TESDA FASD services in one place.">
  <meta name="keywords" content="TESDA DOS, Document Bank, TESDA DOS DocBank, TESDA Region 02 ONSA, TESDA DOS HRMIS, TESDA DOS Human Resource Management Information System (HRIS)">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="language" content="English">
  <meta name="author" content="John Lee P. Santiago">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="robots" content="all,follow">

  <!-- Open Graph-->
  <meta property="og:title" content="R2 FASD Services System">
  <meta property="og:site_name" content="R2 FASD Services System">
  <meta property="og:url" content="<?= base_url();?>">
  <meta property="og:description" content="R2 FASD Services System is a one-stop application that provides different TESDA FASD services in one place.">
  <meta property="og:type" content="website">
  <meta property="og:image" content="<?= base_url();?>assets/img/OG.png">
    
  <!-- Favicon-->
  <link rel="shortcut icon" href="<?= base_url();?>assets/img/Fav.png">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
   <!-- Google fonts - Poppins -->
   <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;500&display=swap" rel="stylesheet">

   <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
    body {
    font-family: "Roboto", serif;
    background-color:#EEEEEE;
    }
</style>
<body>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container">     
        <a class="navbar-brand" href="#"><i class="fa fa-laptop" style="color:#FFCA28"></i> &nbsp R2 FASD Services System </a>
    </div>
</nav>

<div class="jumbotron" style="margin-bottom:10px;background-color:#E0E0E0">
    <div class="container">     
        <h1><strong><i class="fa fa-pie-chart" style="color:#EF5350"></i> Learning and Development (L&D) Reports</strong></h1>    
        <small><i class="fa fa-tv"></i> R2 FASD Services System <b>v <?= $this->config->item('system_version') ?></b> | &copy <?= date('Y');?> <b>TESDA DOS ICTU</b>. Site developed and managed with <i class="fa fa-heart" style="color:#E53935"></i> by <strong>TESDA DOS ICTU</strong></small>  
    </div>
</div>

<div class="container">
  <div id="accordion">
    <!--Image-->
    <!--Image-->
    
<!--Report 1-->
    <div class="card">
      <div class="card-header">
        <a class="card-link" data-toggle="collapse" href="#collapseOne">
            <i class="fa fa-pie-chart"></i> Summary of Learning and Development per Classification/Type of Learning and Development <i class="fa fa-angle-down"></i>
        </a>
      </div>

      <div id="collapseOne" class="collapse" data-parent="#accordion">
        <div class="card-body">
            <div class=row>
                    <div class="col-lg-4">
                        <h6>Data</h6>
                        <hr>
                        <div class="table-responsive">          
                            <table id ="tblReport1" class="table">
                                <?php $totalLD=$administrative+$leadership+$managerial+$supervisory+$technical; ?>
                                <thead>
                                <tr>
                                    <th>Type of L&D</th>
                                    <th>Total</th>
                                    <th>Percentage</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Administrative</td>
                                    <td><?= $administrative ?></td>
                                    <td><?= number_format(($administrative/$totalLD)*100, 2) ?>%</td>
                                </tr>
                                <tr>
                                    <td>Leadership</td>
                                    <td><?= $leadership ?></td>
                                    <td><?= number_format(($leadership/$totalLD)*100, 2) ?>%</td>
                                </tr>
                                <tr>
                                    <td>Managerial</td>
                                    <td><?= $managerial ?></td>
                                    <td><?= number_format(($managerial/$totalLD)*100, 2) ?>%</td>
                                </tr>
                                <tr>
                                    <td>Supervisory</td>
                                    <td><?= $supervisory ?></td>
                                    <td><?= number_format(($supervisory/$totalLD)*100, 2) ?>%</td>
                                </tr>
                                <tr>
                                    <td>Technical</td>
                                    <td><?= $technical ?></td>
                                    <td><?= number_format(($technical/$totalLD)*100, 2) ?>%</td>
                                </tr>
                                <tr>
                                    <td><span style="float:right"><b>Total</b></span></td>
                                    <td><b><?= $totalLD ?></b></td>
                                    <td><b>100%</b></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <button type="button" class="btn btn-primary" onclick="exportTableToExcel('tblReport1', 'Summary of Learning and Development per Classification as of <?= date('m-d-Y')?>')" disabled><i class="fa fa-file-excel-o"></i> Download Excel File</button>
                    </div><!--Inner Col-lg-4-->
                    
                    <div class="col-lg-8">
                        <h6>Graphical Representation</h6>
                        <hr>
                        <?php if($training_total==0){ ?>
                        <div class="container">
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

                        <?php }else{?>
                        <canvas id="myChart" style="width:80%;height:100px; margin-bottom:20px;"></canvas>
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
                    </div><!--Inner Col-lg-4-->
                </div>	
            </div>
        </div>
    </div>
<!--Report 1-->

<!--Report 2-->
    <div class="card">
      <div class="card-header">
        <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
          <i class="fa fa-line-chart"></i> Monthly Trend of Learning and Development per Classification/Type of Learning and Development (CY <?= date('Y')?>) <i class="fa fa-angle-down"></i>
        </a>
      </div>
      <div id="collapseTwo" class="collapse" data-parent="#accordion">
        <div class="card-body">
            <div class=row>
                <div class="col-lg-4">
                  <h6>Data</h6>
                  <hr>
                  <div class="table-responsive">          
                    <table id ="tblReport2" class="table">
                      <?php $totalLDMonthly=$Total_Jan+$Total_Feb+$Total_Mar+$Total_Apr+$Total_May+$Total_Jun+$Total_Jul+$Total_Aug+$Total_Sep+$Total_Oct+$Total_Nov+$Total_Dec; ?>
                      <thead>
                      <tr>
                        <th>Month</th>
                        <th>Total</th>
                        <th>Percentage</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>January</td>
                        <td><?= $Total_Jan ?></td>
                        <td><?= number_format(($Total_Jan/$totalLDMonthly)*100, 2) ?>%</td>
                      </tr>
                      <tr>
                        <td>February</td>
                        <td><?= $Total_Feb ?></td>
                        <td><?= number_format(($Total_Feb/$totalLDMonthly)*100, 2) ?>%</td>
                      </tr>
                      <tr>
                        <td>March</td>
                        <td><?= $Total_Mar ?></td>
                        <td><?= number_format(($Total_Mar/$totalLDMonthly)*100, 2) ?>%</td>
                      </tr>
                      <tr>
                        <td>April</td>
                        <td><?= $Total_Apr ?></td>
                        <td><?= number_format(($Total_Apr/$totalLDMonthly)*100, 2) ?>%</td>
                      </tr>
                      <tr>
                        <td>May</td>
                        <td><?= $Total_May ?></td>
                        <td><?= number_format(($Total_May/$totalLDMonthly)*100, 2) ?>%</td>
                      </tr>
                      <tr>
                        <td>June</td>
                        <td><?= $Total_Jun ?></td>
                        <td><?= number_format(($Total_Jun/$totalLDMonthly)*100, 2) ?>%</td>
                      </tr>
                      <tr>
                        <td>July</td>
                        <td><?= $Total_Jul ?></td>
                        <td><?= number_format(($Total_Jul/$totalLDMonthly)*100, 2) ?>%</td>
                      </tr>
                      <tr>
                        <td>August</td>
                        <td><?= $Total_Aug ?></td>
                        <td><?= number_format(($Total_Aug/$totalLDMonthly)*100, 2) ?>%</td>
                      </tr>
                      <tr>
                        <td>September</td>
                        <td><?= $Total_Sep ?></td>
                        <td><?= number_format(($Total_Sep/$totalLDMonthly)*100, 2) ?>%</td>
                      </tr>
                      <tr>
                        <td>October</td>
                        <td><?= $Total_Oct ?></td>
                        <td><?= number_format(($Total_Oct/$totalLDMonthly)*100, 2) ?>%</td>
                      </tr>
                      <tr>
                        <td>November</td>
                        <td><?= $Total_Nov ?></td>
                        <td><?= number_format(($Total_Nov/$totalLDMonthly)*100, 2) ?>%</td>
                      </tr>
                      <tr>
                        <td>December</td>
                        <td><?= $Total_Dec ?></td>
                        <td><?= number_format(($Total_Dec/$totalLDMonthly)*100, 2) ?>%</td>
                      </tr>
                      <tr>
                        <td><span style="float:right"><b>Total</b></span></td>
                        <td><b><?= $totalLDMonthly ?></b></td>
                        <td><b>100%</b></td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                  <button type="button" class="btn btn-primary" onclick="exportTableToExcel('tblReport2', 'Monthly Trend of Learning and Development per Classification (CY <?= date('Y')?>) as of <?= date('m-d-Y')?>')" disabled><i class="fa fa-file-excel-o"></i> Download Excel File</button>
                </div><!--Inner Col-lg-4-->
                <div class="col-lg-8">
                  <h6>Graphical Representation</h6>
                  <hr>
                  <?php if($training_total==0){ ?>
                    <div class="container">
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
                    <?php }else{?>
                    <canvas id="myChart1" style="width:90%;height:100px; margin-bottom:20px;"></canvas>
                    <script>
                    var xValues = ['Jan (<?= $Total_Jan?>)','Feb (<?= $Total_Feb?>)','Mar (<?= $Total_Mar?>)','Apr (<?= $Total_Apr?>)','May (<?= $Total_May?>)','Jun (<?= $Total_Jun?>)','Jul (<?= $Total_Jul?>)','Aug (<?= $Total_Aug?>)','Sep (<?= $Total_Sep?>)','Oct (<?= $Total_Oct?>)','Nov (<?= $Total_Nov?>)','Dec (<?= $Total_Dec?>)'];
                    new Chart("myChart1", {
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
                </div><!--Inner Col-lg-4-->
            </div>	
        </div>
      </div>
    </div>
<!--Report 2-->

<!--Report 3-->
    <div class="card">
      <div class="card-header">
        <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
          <i class="fa fa-bar-chart"></i> Summary of Learning and Development per Operating Unit <i class="fa fa-angle-down"></i>
        </a>
      </div>
      <div id="collapseThree" class="collapse" data-parent="#accordion">
        <div class="card-body">
            <div class=row>
									<div class="col-lg-4">
										<h6>Data</h6>
										<hr>
										<div class="table-responsive">          
											<table id ="tblReport3" class="table">
												<?php $totalLDMonthly=$Total_Jan+$Total_Feb+$Total_Mar+$Total_Apr+$Total_May+$Total_Jun+$Total_Jul+$Total_Aug+$Total_Sep+$Total_Oct+$Total_Nov+$Total_Dec; ?>
												<thead>
												<tr>
													<th>Operating Unit</th>
													<th>Administrative</th>
													<th>Leadership</th>
													<th>Managerial</th>
													<th>Supervisory</th>
													<th>Technical</th>
													<th>Total</th>
													<th>Percentage</th>
												</tr>
												</thead>
												<tbody>
												<?php foreach($data_array_per_ous as $row){ ?>
												<tr>
													<td>
														<?= $row['ous_desc']?>
													</td>
													<td>
														<?= $row['administrative']?>
													</td>
													<td>
														<?= $row['leadership']?>
													</td>
													<td>
														<?= $row['managerial']?>
													</td>
													<td>
														<?= $row['supervisory']?>
													</td>
													<td>
														<?= $row['technicals']?>
													</td>
													<td>
														<?= $row['administrative']+$row['leadership']+$row['managerial']+$row['supervisory']+$row['technicals']?>
													</td>
													<td>
														<?= number_format((($row['administrative']+$row['leadership']+$row['managerial']+$row['supervisory']+$row['technicals'])/$totalLD)*100, 2) ?>%
													</td>
												</tr>
												<?php } ?>
												
												<tr>
													<td><span style="float:right"><b>Total</b></span></td>
													<td><b><?= $administrative ?></b></td>
													<td><b><?= $leadership ?></b></td>
													<td><b><?= $managerial ?></b></td>
													<td><b><?= $supervisory ?></b></td>
													<td><b><?= $technical ?></b></td>
													<td><b><?= $totalLD ?></b></td>
													<td><b>100%</b></td>
												</tr>
												</tbody>
											</table>
										</div>
										<button type="button" class="btn btn-primary" onclick="exportTableToExcel('tblReport3', 'Summary of Learning and Development per Operating Unit as of <?= date('m-d-Y')?>')" disabled><i class="fa fa-file-excel-o"></i> Download Excel File</button>
									</div><!--Inner Col-lg-4-->
									<div class="col-lg-8">
										<h6>Graphical Representation</h6>
										<hr>
										<?php if($training_total==0){ ?>
										<div class="container">
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

										<?php }else{?>
										<canvas id="myChart5" style="width:90%;height:100px; margin-bottom:20px;"></canvas>
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
									</div><!--Inner Col-lg-4-->
						</div>	
        </div>
      </div>
    </div>
<!--Report 3-->

<!--Report 4-->
  <div class="card">
      <div class="card-header">
        <a class="collapsed card-link" data-toggle="collapse" href="#collapseFour">
        <i class="fa fa-dashboard"></i> Monitoring of Employees Training Attendance (CY <?= date('Y')?>) <i class="fa fa-angle-down"></i>
        </a>
      </div>
      <div id="collapseFour" class="collapse" data-parent="#accordion">
        <div class="card-body">
          <div class=row>
              <div class="col-lg-12">
                <h6>Data</h6>
                <hr>
                <div class="table-responsive">          
                  <table id ="tblReport4" class="table">
                    <?php $totalLDMonthly=$Total_Jan+$Total_Feb+$Total_Mar+$Total_Apr+$Total_May+$Total_Jun+$Total_Jul+$Total_Aug+$Total_Sep+$Total_Oct+$Total_Nov+$Total_Dec; ?>
                    <thead>
                    <tr>
                      <th>Operating Unit</th>
                      <th>No. of Employees</th>
                      <th>Training Provided</th>
                      <th>Percentage</th>
                      <th>1st Semester</th>
                      <th>2nd Semester</th>
                      <th>Administrative</th>
                      <th>Leadership</th>
                      <th>Managerial</th>
                      <th>Supervisory</th>
                      <th>Technical</th>
                      <th>Total</th>
                    </tr>
                    <tbody>
                    <?php
                      $total_emp = 0;
                      $total_trn = 0;
                      $total_1st = 0;
                      $total_2nd = 0;
                      $total_a = 0;
                      $total_l = 0;
                      $total_m = 0;
                      $total_t = 0;
                      $total_s = 0;
                      $total_summary = 0;
                      
                    ?>
                    <?php foreach($data_permanent as $row){ ?>
                    <tr>
                      <td>
                        <?= $row['ous_desc']?>
                      </td>
                      <td>
                        <?= $row['permanent']?>
                      </td>
                      <td>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="<?= $row['names']?>"><?= $row['training_count']?></a>
                      </td>
                      <td><b>
                        <?php if($row['permanent'] == 0){
                          echo '0.00 ';
                        }
                          else{
                            echo number_format(($row['training_count']/$row['permanent'])*100, 2);
                          }
                        ?>
                        %
                        </b></td>
                      <td>
                        <?= $row['first_semester']?>
                      </td>
                      <td>
                        <?= $row['second_semester']?>
                      </td>
                      <td><?= $row['administrative_report4'] ?></td>
                      <td><?= $row['leadership_report4'] ?></td>
                      <td><?= $row['managerial_report4'] ?></td>
                      <td><?= $row['supervisory_report4'] ?></td>
                      <td><?= $row['technicals_report4'] ?></td>
                      <td><?= $row['administrative_report4']+$row['leadership_report4']+$row['managerial_report4']+$row['supervisory_report4']+$row['technicals_report4'] ?></td>
                    </tr>
                      <?php
                        $total_emp = $total_emp+$row['permanent'];
                        $total_trn = $total_trn+$row['training_count'];
                        $total_1st = $total_1st+$row['first_semester'];
                        $total_2nd = $total_2nd+$row['second_semester'];
                        $total_a = $total_a+$row['administrative_report4'];
                        $total_l = $total_l+$row['leadership_report4'];
                        $total_m = $total_m+$row['managerial_report4'];
                        $total_s = $total_s+$row['supervisory_report4'];
                        $total_t = $total_t+$row['technicals_report4'];
                        $total_summary = $total_summary+$row['administrative_report4']+$row['leadership_report4']+$row['managerial_report4']+$row['supervisory_report4']+$row['technicals_report4'];
                      ?>
                    <?php } ?>

                    <tr>
                      <td>Total</td>
                      <td><?= $total_emp ?></td>
                      <td><?= $total_trn ?></td>
                      <td><?= number_format(($total_trn/$total_emp)*100,2) ?></td>
                      <td><?= $total_1st ?></td>
                      <td><?= $total_2nd ?></td>
                      <td><?= $total_a ?></td>
                      <td><?= $total_l ?></td>
                      <td><?= $total_m ?></td>
                      <td><?= $total_s ?></td>
                      <td><?= $total_t ?></td>
                      <td><?= $total_summary?></td>
                    </tr>
                    </thead>

                    </tbody>
                  </table>
                </div>
                <button type="button" class="btn btn-primary" onclick="exportTableToExcel('tblReport4', 'Monitoring of Employees Training Attendance as of <?= date('m-d-Y')?>')"><i class="fa fa-file-excel-o"></i> Download Excel File</button>
              </div><!--Inner Col-lg-4-->
            </div>
          </div>
      </div>
  </div>
<!--Report 4-->

<!--Report 5-->
  <div class="card">
      <div class="card-header">
        <a class="collapsed card-link" data-toggle="collapse" href="#collapseFive">
          <i class="fa fa-dashboard"></i> Monitoring of Employees Nomination per Classification of Invitation (CY <?= date('Y')?>) <i class="fa fa-angle-down"></i>
        </a>
      </div>
      <div id="collapseFive" class="collapse" data-parent="#accordion">
        <div class="card-body">
                <div class=row>
										<div class="col-lg-12">
											<h6>Data</h6>
											<hr>
											<div class="table-responsive">          
												<table id ="tblReport5" class="table">
													<thead style="text-align:center;">
													<tr>
														<th rowspan="3" style="vertical-align:middle;">Operating Unit</th>
														<th colspan="5" style="background-color:#80CBC4;color:black">Local</th>
														<th colspan="5" style="background-color:#26A69A;color:white">National</th>
														<th colspan="5" style="background-color:#00897B;color:white">Foriegn</th>
														<th colspan="5" style="background-color:#283593;color:white">Regional Office</th>
														<th colspan="5" style="background-color:#D32F2F;color:white;">Grand Total</th>
													</tr>
													<tr>
														<th rowspan="2" style="vertical-align:middle;background-color:#80CBC4;color:black">Total Invitation</th>
														<th colspan="2" style="vertical-align:middle;background-color:#80CBC4;color:black">Nominee</th>
														<th colspan="2" style="vertical-align:middle;background-color:#80CBC4;color:black">Approved</th>
														<th rowspan="2" style="vertical-align:middle;background-color:#26A69A;color:white">Total Invitation</th>
														<th colspan="2" style="vertical-align:middle;background-color:#26A69A;color:white">Nominee</th>
														<th colspan="2" style="vertical-align:middle;background-color:#26A69A;color:white">Approved</th>
														<th rowspan="2" style="vertical-align:middle;background-color:#00897B;color:white">Total Invitation</th>
														<th colspan="2" style="vertical-align:middle;background-color:#00897B;color:white">Nominee</th>
														<th colspan="2" style="vertical-align:middle;background-color:#00897B;color:white">Approved</th>
														<th rowspan="2" style="vertical-align:middle;background-color:#283593;color:white">Total Invitation</th>
														<th colspan="2" style="vertical-align:middle;background-color:#283593;color:white">Nominee</th>
														<th colspan="2" style="vertical-align:middle;background-color:#283593;color:white">Approved</th>
														<th rowspan="2" style="vertical-align:middle;background-color:#D32F2F;color:white">Total Invitation</th>
														<th colspan="2" style="vertical-align:middle;background-color:#D32F2F;color:white">Nominee</th>
														<th colspan="2" style="vertical-align:middle;background-color:#D32F2F;color:white">Approved</th>
													</tr>
													<tr>
														<th style="vertical-align:middle;background-color:#80CBC4;color:black">Total</th>
														<th style="vertical-align:middle;background-color:#80CBC4;color:black">Percentage</th>
														<th style="vertical-align:middle;background-color:#80CBC4;color:black">Total</th>
														<th style="vertical-align:middle;background-color:#80CBC4;color:black">Percentage</th>
														<th style="vertical-align:middle;background-color:#26A69A;color:white">Total</th>
														<th style="vertical-align:middle;background-color:#26A69A;color:white">Percentage</th>
														<th style="vertical-align:middle;background-color:#26A69A;color:white">Total</th>
														<th style="vertical-align:middle;background-color:#26A69A;color:white">Percentage</th>
														<th style="vertical-align:middle;background-color:#00897B;color:white">Total</th>
														<th style="vertical-align:middle;background-color:#00897B;color:white">Percentage</th>
														<th style="vertical-align:middle;background-color:#00897B;color:white">Total</th>
														<th style="vertical-align:middle;background-color:#00897B;color:white">Percentage</th>
														<th style="vertical-align:middle;background-color:#283593;color:white">Total</th>
														<th style="vertical-align:middle;background-color:#283593;color:white">Percentage</th>
														<th style="vertical-align:middle;background-color:#283593;color:white">Total</th>
														<th style="vertical-align:middle;background-color:#283593;color:white">Percentage</th>
														<th style="vertical-align:middle;background-color:#D32F2F;color:white">Total</th>
														<th style="vertical-align:middle;background-color:#D32F2F;color:white">Percentage</th>
														<th style="vertical-align:middle;background-color:#D32F2F;color:white">Total</th>
														<th style="vertical-align:middle;background-color:#D32F2F;color:white">Percentage</th>
													</tr>
													</thead>
													<tbody>
														<tr>
															<td><strong>Total</strong>	</td>
															<td><strong><?= $training_local?></strong>	</td>
															<td><strong><?= $sum_local_nominee ?></strong>	</td>
															<td><strong><?= number_format(($sum_local_nominee/$training_local)*100,2)?>%</strong>	</td>
															<td><strong><?= $sum_local_approved ?></strong>	</td>
															<td><strong><?= number_format(($sum_local_approved/$training_local)*100,2)?>%</strong>	</td>
															<td><strong><?= $training_national?></strong>	</td>
															<td><strong><?= $sum_national_nominee ?></strong>	</td>
															<td><strong><?= number_format(($sum_national_nominee/$training_national)*100,2)?>%</strong>	</td>
															<td><strong><?= $sum_national_approved ?></strong>	</td>
															<td><strong><?= number_format(($sum_national_approved/$training_national)*100,2)?>%</strong>	</td>
															<td><strong><?= $training_foreign?></strong>	</td>
															<td><strong><?= $sum_foreign_nominee ?></strong>	</td>
															<td><strong><?= number_format(($sum_foreign_nominee/$training_foreign)*100,2)?>%</strong>	</td>
															<td><strong><?= $sum_foreign_approved ?></strong>	</td>
															<td><strong><?= number_format(($sum_foreign_approved/$training_foreign)*100,2)?>%</strong>	</td>
															<td><strong><?= $training_regional?></strong>	</td>
															<td><strong><?= $sum_regional_nominee ?></strong>	</td>
															<td><strong><?= number_format(($sum_regional_nominee/$training_regional)*100,2)?>%</strong>	</td>
															<td><strong><?= $sum_regional_approved ?></strong>	</td>
															<td><strong><?= number_format(($sum_regional_approved/$training_regional)*100,2)?>%</strong>	</td>
															<?php 
																$grand_total_training = $training_local+$training_national+$training_foreign+$training_regional;
																$grand_total_nominee = $sum_local_nominee+$sum_national_nominee+$sum_foreign_nominee+$sum_regional_nominee;
																$grand_total_approved = $sum_local_approved+$sum_national_approved+$sum_foreign_approved+$sum_regional_approved;
															?>
															<td><strong><?= $grand_total_training?></strong>	</td>
															<td><strong><?= $grand_total_nominee ?></strong>	</td>
															<td><strong><?= number_format(($grand_total_nominee/$grand_total_training)*100,2)?>%</strong>	</td>
															<td><strong><?= $grand_total_approved ?></strong>	</td>
															<td><strong><?= number_format(($grand_total_approved/$grand_total_training)*100,2)?>%</strong>	</td>
															
														</tr>
														<?php 
															$total_training = 0;
															$total_nominee = 0;
															$total_approved = 0;
															foreach($per_agency_category as $row) { 
																$total_training = $row['training_local']+$row['training_national']+$row['training_foreign']+$row['training_regional'];
																$total_nominee = $row['training_local_nominee1']+$row['training_national_nominee1']+$row['training_foreign_nominee1']+$row['training_regional_nominee1'];
																$total_approved =  $row['training_local_approved1']+$row['training_national_approved1']+$row['training_foreign_approved1']+$row['training_regional_approved1'];
														?>	
														<tr>
															<td><?= $row['ous_desc']?></td>
															<td><?= $row['training_local']?></td>
															<td><?= $row['training_local_nominee1']?></td>
															<td><?= number_format(($row['training_local_nominee1']/$row['training_local'])*100,2)?>%</td>
															<td><?= $row['training_local_approved1']?></td>
															<td><?= number_format(($row['training_local_approved1']/$row['training_local'])*100,2)?>%</td>
															<td><?= $row['training_national']?></td>
															<td><?= $row['training_national_nominee1']?></td>
															<td><?= number_format(($row['training_national_nominee1']/$row['training_national'])*100,2)?>%</td>
															<td><?= $row['training_national_approved1']?></td>
															<td><?= number_format(($row['training_national_approved1']/$row['training_national'])*100,2)?>%</td>
															<td><?= $row['training_foreign']?></td>
															<td><?= $row['training_foreign_nominee1']?></td>
															<td><?= number_format(($row['training_foreign_nominee1']/$row['training_foreign'])*100,2)?>%</td>
															<td><?= $row['training_foreign_approved1']?></td>
															<td><?= number_format(($row['training_foreign_approved1']/$row['training_foreign'])*100,2)?>%</td>
															<td><?= $row['training_regional']?></td>
															<td><?= $row['training_regional_nominee1']?></td>
															<td><?= number_format(($row['training_regional_nominee1']/$row['training_regional'])*100,2)?>%</td>
															<td><?= $row['training_regional_approved1']?></td>
															<td><?= number_format(($row['training_regional_approved1']/$row['training_regional'])*100,2)?>%</td>

															<td><?= $total_training ?></td>
															<td><?= $total_nominee?></td>
															<td><?= number_format(($total_nominee/$total_training)*100,2)?>%</td>
															<td><?= $total_approved?></td>
															<td><?= number_format(($total_approved/$total_training)*100,2)?>%</td>
														</tr>	
														<?php } ?>	
													</tbody>
												</table>
											</div>
											<button type="button" class="btn btn-primary" onclick="exportTableToExcel('tblReport5', 'Monitoring of Employees Training Attendance per Classification as of <?= date('m-d-Y')?> - Invitation')"><i class="fa fa-file-excel-o"></i> Download Excel File</button>
										</div><!--Inner Col-lg-4-->
									</div>
        </div>
      </div>
  </div>
<!--Report 5-->

<!--Report 6-->
  <div class="card">
      <div class="card-header">
        <a class="collapsed card-link" data-toggle="collapse" href="#collapseSix">
          <i class="fa fa-bar-chart"></i> Summary of Submitted TREAP/Terminal Report per Operating Unit (CY <?= date('Y')?>) <i class="fa fa-angle-down"></i>
        </a>
      </div>
      <div id="collapseSix" class="collapse" data-parent="#accordion">
        <div class="card-body">
            <div class=row>
              <div class="col-lg-12">
                <h6>Data</h6>
                <hr>
                <div class="table-responsive">          
                  <table id ="tblReport6" class="table">
                    <thead>
                    <tr>
                      <th>Operating Unit</th>
                      <th>No. of Training Programs Attended</th>
                      <th>No. of Submitted TREAP/Terminal Report</th>
                      <th>% of Submitted TREAP/Terminal Report</th>
                      <th>No. of Submitted TDORF</th>
                      <th>% of Submitted TDORF</th>
                      <th>No. of Submitted Training Certificate</th>
                      <th>% of Submitted Training Certificate</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>Total</td>
                      <td><?= $total_of_tpmr?></td>
                      <td><?= $total_of_treap?></td>
                      <td><?= number_format(($total_of_treap/$total_of_tpmr)*100, 2)?>%</td>
                      <td><?= $total_of_tdorf?></td>
                      <td><?= number_format(($total_of_tdorf/$total_of_tpmr)*100, 2)?>%</td>
                      <td><?= $total_of_cot?></td>
                      <td><?= number_format(($total_of_cot/$total_of_tpmr)*100, 2)?>%</td>
                    </tr>
                    <?php foreach($no_of_treap as $row){?>
                    <tr>
                      <td><?= $row['ous_desc']?></td>
                      <td><?= $row['no_of_tpmr']?></td>
                      <td><?= $row['no_of_treap']?></td>
                      <td><?= number_format(($row['no_of_treap']/$row['no_of_tpmr'])*100, 2)?>%</td>
                      <td><?= $row['no_of_tdorf']?></td>
                      <td><?= number_format(($row['no_of_tdorf']/$row['no_of_tpmr'])*100, 2)?>%</td>
                      <td><?= $row['no_of_cot']?></td>
                      <td><?= number_format(($row['no_of_cot']/$row['no_of_tpmr'])*100, 2)?>%</td>
                    </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                </div>
                <button type="button" class="btn btn-primary" onclick="exportTableToExcel('tblReport6', 'Monitoring of Employees Training Attendance as of <?= date('m-d-Y')?>')"><i class="fa fa-file-excel-o"></i> Download Excel File</button>
              </div><!--Inner Col-lg-4-->
            </div>
        </div>
      </div>
  </div>
<!--Report 6-->

  </div>
</div>
    
</body>
</html>
