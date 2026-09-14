<!--START CONDITION-->
<?php 
if( $this->session->logged_in){
  if( $this->session->role == 'Accre'){
    redirect (base_url().'Guest');
  }else{?>


	<div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom"><?= $this->session->ous_desc; ?></h2>
            </div>
          </header>

		<!-- Breadcrumb-->
		<?php require_once('breadcrumb.php'); ?>

	
		<!-- Search Modal-->
		<?php require_once('search-modal.php'); ?>
		
		<div class="col-lg-12 mt-3">
			<div class="card">
				
				<div class="card-header d-flex align-items-center">
					<h1> Recruitment, Selection, and Placement (RSP)</h1>
				</div>
				<div class="card-body">
					<div id="accordion"><!--<div id="accordion">-->

<!--Report 1-->
					<div class="card no-margin-top no-margin-bottom">
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
										<button type="button" class="btn btn-primary" onclick="exportTableToExcel('tblReport1', 'Summary of Learning and Development per Classification as of <?= date('m-d-Y')?>')"><i class="fa fa-file-excel-o"></i> Download Excel File</button>
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
										<canvas id="myChart" style="width:90%;height:100px; margin-bottom:20px;"></canvas>
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
					<div class="card no-margin-top no-margin-bottom">
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
										<button type="button" class="btn btn-primary" onclick="exportTableToExcel('tblReport2', 'Monthly Trend of Learning and Development per Classification (CY <?= date('Y')?>) as of <?= date('m-d-Y')?>')"><i class="fa fa-file-excel-o"></i> Download Excel File</button>
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
					<div class="card no-margin-top no-margin-bottom">
						<div class="card-header">
							<a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
								<i class="fa fa-bar-chart-o"></i> Summary of Learning and Development per Operating Unit <i class="fa fa-angle-down"></i>
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
										<button type="button" class="btn btn-primary" onclick="exportTableToExcel('tblReport3', 'Summary of Learning and Development per Operating Unit as of <?= date('m-d-Y')?>')"><i class="fa fa-file-excel-o"></i> Download Excel File</button>
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


					</div><!--<div id="accordion">-->
				</div> <!-- End of card-->
			</div> <!-- End of card-->
		</div>	<!--End of col-lg-12 mt-3-->	

<!--END CONDITION-->	

<!------------Download Table report 5-------->
  <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
  <script>
    function htmlTableToExcel(type, fn, dl) {
       var elt = document.getElementById('tblReport5');
       var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
       return dl ?
         XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
         XLSX.writeFile(wb, fn || ('Monitoring of Employees Nomination per Classification of Invitation as of <?= date('m-d-Y')?>.' + (type || 'xlsx')));
    }
  </script>
<!------------Download-------->

<?php }?>
<?php }else{
redirect (base_url());
}?>
