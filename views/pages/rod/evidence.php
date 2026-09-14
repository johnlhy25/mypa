<!DOCTYPE html>
<html lang="en">
<head>
  <title>Uploaded Evidence</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="../../../assets/img/Fav.png">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  
  <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
  <!-- Favicon-->
  <link rel="shortcut icon" href="<?= base_url();?>assets/img/Logo.png">
  <style>
  body {
      font-family: 'Poppins';
  }
  </style>

</head>
<body>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container">     
        <a class="navbar-brand" href="#"><i class="fa fa-laptop" style="color:#FFCA28"></i> &nbsp TDIS </a>
    </div>
</nav>

<div class="jumbotron" style="margin-bottom:10px;background-color:#E0E0E0">
    <div class="container">     
        <h1><strong><i class="fa fa-file-pdf" style="color:#EF5350"></i> Uploaded Evidence</strong></h1>    
        <small><i class="fa fa-tv"></i> TESDA DOS INTEGRATED SYSTEM (TDIS) <b>v 2.1.0</b> | &copy <?= date('Y');?> <b>TESDA DOS ICTU</b>. Site developed and managed with <i class="fa fa-heart" style="color:#E53935"></i> by <strong>TESDA DOS ICTU</strong></small>  
    </div>
</div>
  
<div class="container">

    <div class="alert alert-info">
      <strong>Indicator: </strong><?= $ind_desc['ind_desc'] ?>
    </div>

    <div id="accordion">

<?php if($ind_desc['ind_desc'] == "Number of programs on Gender and Development conducted as scheduled") {
  $ro_display = " ";
  $pobat_display = "display:none";
  $pocag_display = "display:none";
  $poisa_display = "display:none";
  $ponv_display = "display:none";
  $poqui_display = "display:none";
  $portc_display = "display:none";
  $poapi_display = "display:none";
  $polit_display = "display:none";
  $poisat_display = "display:none";
  $posicat_display = "display:none";
  $ponvpi_display = "display:none";
  $ptcbat_display = "display:none";
  $ptccag_display = "display:none";
  $ptcisa_display = "display:none";
  $ptcnv_display = "display:none";
  $ptcqui_display = "display:none";
} ?>
    
<!------Regional Office------>
        <?php if ($evidence_ro_target != null) {?>
        <div class="card" style="<?= $ro_display?>">
          <div class="card-header">
            <a class="card-link" data-toggle="collapse" href="#collapse100">
            <i class="fa fa-upload" aria-hidden="true"></i> Regional Office
            </a>
          </div>
          <div id="collapse100" class="collapse" data-parent="#accordion">
            <div class="card-body">

              <ul class="list-group list-group-flush">
                <?php 
                  foreach ($evidence_ro_target as $row) {
                      $ous_desc = 'Operating Unit: [<b>Regional Office</b>] - Month: [<b>'.$row['evi_month'].'</b>] - Date/Time uploaded: [<b>'.$row['evi_timestamp'].'</b>]';
                ?>
                  <li class="list-group-item">
                    <small><a href="<?php echo base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/evidence/'.$row['ind_id'].'/'.$row['evi_filename']?>" target="_blank"><?= $ous_desc ?> - Uploaded by: <b><?= $row['usr_name']?></b></a></small>
                  </li>
                <?php } ?>
              </ul>

            </div>
          </div>
        </div>
        <?php } ?>
<!------Regional Office------>

<!------PO Batanes------>
        <?php if ($evidence_po_batanes_target != null) {?>
        <div class="card" style="<?= $pobat_display?>">
          <div class="card-header">
            <a class="card-link" data-toggle="collapse" href="#collapseOne">
            <i class="fa fa-upload" aria-hidden="true"></i> Batanes Provincial Office
            </a>
          </div>
          <div id="collapseOne" class="collapse" data-parent="#accordion">
            <div class="card-body">

              <ul class="list-group list-group-flush">
                <?php 
                  foreach ($evidence_po_batanes_target as $row) {
                      $ous_desc = 'Operating Unit: [<b>Batanes Provincial Office</b>] - Month: [<b>'.$row['evi_month'].'</b>] - Date/Time uploaded: [<b>'.$row['evi_timestamp'].'</b>]';
                ?>
                  <li class="list-group-item">
                    <small><a href="<?php echo base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/evidence/'.$row['ind_id'].'/'.$row['evi_filename']?>" target="_blank"><?= $ous_desc ?> - Uploaded by: <b><?= $row['usr_name']?></b></a></small>
                  </li>
                <?php } ?>
              </ul>

            </div>
          </div>
        </div>
        <?php } ?>
<!------PO Batanes------>

<!------PO Cagayan------>
    <?php if ($evidence_po_cagayan_target != null) {?>
        <div class="card" style="<?= $pocag_display?>">
          <div class="card-header">
            <a class="card-link" data-toggle="collapse" href="#collapseTwo">
            <i class="fa fa-upload" aria-hidden="true"></i> Cagayan Provincial Office
            </a>
          </div>
          <div id="collapseTwo" class="collapse" data-parent="#accordion">
            <div class="card-body">

              <ul class="list-group list-group-flush">
                <?php 
                  foreach ($evidence_po_cagayan_target as $row) {
                      $ous_desc = 'Operating Unit: [<b>Cagayan Provincial Office</b>] - Month: [<b>'.$row['evi_month'].'</b>] - Date/Time uploaded: [<b>'.$row['evi_timestamp'].'</b>]';
                ?>
                  <li class="list-group-item">
                    <small><a href="<?php echo base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/evidence/'.$row['ind_id'].'/'.$row['evi_filename']?>" target="_blank"><?= $ous_desc ?> - Uploaded by: <b><?= $row['usr_name']?></b></a></small>
                  </li>
                <?php } ?>
              </ul>

            </div>
          </div>
        </div>
        <?php } ?>
<!------PO Cagayan------>

<!------PO Isabela------>
      <?php if ($evidence_po_isabela_target != null) {?>
        <div class="card" style="<?= $poisa_display?>">
          <div class="card-header">
            <a class="card-link" data-toggle="collapse" href="#collapseThree">
            <i class="fa fa-upload" aria-hidden="true"></i> Isabela Provincial Office
            </a>
          </div>
          <div id="collapseThree" class="collapse" data-parent="#accordion">
            <div class="card-body">

              <ul class="list-group list-group-flush">
                <?php 
                  foreach ($evidence_po_isabela_target as $row) {
                      $ous_desc = 'Operating Unit: [<b>Isabela Office</b>] - Month: [<b>'.$row['evi_month'].'</b>] - Date/Time uploaded: [<b>'.$row['evi_timestamp'].'</b>]';
                ?>
                  <li class="list-group-item">
                    <small><a href="<?php echo base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/evidence/'.$row['ind_id'].'/'.$row['evi_filename']?>" target="_blank"><?= $ous_desc ?> - Uploaded by: <b><?= $row['usr_name']?></b></a></small>
                  </li>
                <?php } ?>
              </ul>

            </div>
          </div>
        </div>
        <?php } ?>
<!------PO Isabela------>

<!------PO NV------>
        <?php if ($evidence_po_nv_target != null) {?>
        <div class="card" style="<?= $ponv_display?>">
          <div class="card-header">
            <a class="card-link" data-toggle="collapse" href="#collapseFive">
            <i class="fa fa-upload" aria-hidden="true"></i> Nueva Vizcaya Provincial Office
            </a>
          </div>
          <div id="collapseFive" class="collapse" data-parent="#accordion">
            <div class="card-body">

              <ul class="list-group list-group-flush">
                <?php 
                  foreach ($evidence_po_nv_target as $row) {
                      $ous_desc = 'Operating Unit: [<b>Nueva Vizcaya Provincial Office</b>] - Month: [<b>'.$row['evi_month'].'</b>] - Date/Time uploaded: [<b>'.$row['evi_timestamp'].'</b>]';
                ?>
                  <li class="list-group-item">
                    <small><a href="<?php echo base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/evidence/'.$row['ind_id'].'/'.$row['evi_filename']?>" target="_blank"><?= $ous_desc ?> - Uploaded by: <b><?= $row['usr_name']?></b></a></small>
                  </li>
                <?php } ?>
              </ul>

            </div>
          </div>
        </div>
        <?php } ?>
<!------PO NV------>

<!------PO Quirino------>
        <?php if ($evidence_po_quirino_target != null) {?>
        <div class="card" style="<?= $poqui_display?>">
          <div class="card-header">
            <a class="card-link" data-toggle="collapse" href="#collapseFour">
            <i class="fa fa-upload" aria-hidden="true"></i> Quirino Provincial Office
            </a>
          </div>
          <div id="collapseFour" class="collapse" data-parent="#accordion">
            <div class="card-body">

              <ul class="list-group list-group-flush">
                <?php 
                  foreach ($evidence_po_quirino_target as $row) {
                      $ous_desc = 'Operating Unit: [<b>Quirino Provincial Office</b>] - Month: [<b>'.$row['evi_month'].'</b>] - Date/Time uploaded: [<b>'.$row['evi_timestamp'].'</b>]';
                ?>
                  <li class="list-group-item">
                    <small><a href="<?php echo base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/evidence/'.$row['ind_id'].'/'.$row['evi_filename']?>" target="_blank"><?= $ous_desc ?> - Uploaded by: <b><?= $row['usr_name']?></b></a></small>
                  </li>
                <?php } ?>
              </ul>

            </div>
          </div>
        </div>
        <?php } ?>
<!------PO Quirino------>

<!------RTC------>
        <?php if ($evidence_rtc_target != null) {?>
        <div class="card" style="<?= $portc_display?>">
          <div class="card-header">
            <a class="card-link" data-toggle="collapse" href="#collapse6">
            <i class="fa fa-upload" aria-hidden="true"></i> Regional Training Center - Tuguegarao
            </a>
          </div>
          <div id="collapse6" class="collapse" data-parent="#accordion">
            <div class="card-body">

              <ul class="list-group list-group-flush">
                <?php 
                  foreach ($evidence_rtc_target as $row) {
                      $ous_desc = 'Operating Unit: [<b>Regional Training Center - Tuguegarao</b>] - Month: [<b>'.$row['evi_month'].'</b>] - Date/Time uploaded: [<b>'.$row['evi_timestamp'].'</b>]';
                ?>
                  <li class="list-group-item">
                    <small><a href="<?php echo base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/evidence/'.$row['ind_id'].'/'.$row['evi_filename']?>" target="_blank"><?= $ous_desc ?> - Uploaded by: <b><?= $row['usr_name']?></b></a></small>
                  </li>
                <?php } ?>
              </ul>

            </div>
          </div>
        </div>
        <?php } ?>
<!------RTC------>

<!------API------>
        <?php if ($evidence_api_target != null) {?>
        <div class="card" style="<?= $poapi_display?>">
          <div class="card-header">
            <a class="card-link" data-toggle="collapse" href="#collapse7">
            <i class="fa fa-upload" aria-hidden="true"></i> Aparri Polytechnic Institute
            </a>
          </div>
          <div id="collapse7" class="collapse" data-parent="#accordion">
            <div class="card-body">

              <ul class="list-group list-group-flush">
                <?php 
                  foreach ($evidence_api_target as $row) {
                      $ous_desc = 'Operating Unit: [<b>Aparri Polytechnic Institute</b>] - Month: [<b>'.$row['evi_month'].'</b>] - Date/Time uploaded: [<b>'.$row['evi_timestamp'].'</b>]';
                ?>
                  <li class="list-group-item">
                    <small><a href="<?php echo base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/evidence/'.$row['ind_id'].'/'.$row['evi_filename']?>" target="_blank"><?= $ous_desc ?> - Uploaded by: <b><?= $row['usr_name']?></b></a></small>
                  </li>
                <?php } ?>
              </ul>

            </div>
          </div>
        </div>
        <?php } ?>
<!------API------>

<!------LIT------>
        <?php if ($evidence_lit_target != null) {?>
        <div class="card" style="<?= $polit_display?>">
          <div class="card-header">
            <a class="card-link" data-toggle="collapse" href="#collapse8">
            <i class="fa fa-upload" aria-hidden="true"></i> Lasam Institute of Technology
            </a>
          </div>
          <div id="collapse8" class="collapse" data-parent="#accordion">
            <div class="card-body">

              <ul class="list-group list-group-flush">
                <?php 
                  foreach ($evidence_lit_target as $row) {
                      $ous_desc = 'Operating Unit: [<b>Lasam Institute of Technology</b>] - Month: [<b>'.$row['evi_month'].'</b>] - Date/Time uploaded: [<b>'.$row['evi_timestamp'].'</b>]';
                ?>
                  <li class="list-group-item">
                    <small><a href="<?php echo base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/evidence/'.$row['ind_id'].'/'.$row['evi_filename']?>" target="_blank"><?= $ous_desc ?> - Uploaded by: <b><?= $row['usr_name']?></b></a></small>
                  </li>
                <?php } ?>
              </ul>

            </div>
          </div>
        </div>
        <?php } ?>
<!------LIT------>

<!------ISAT------>
      <?php if ($evidence_isat_isabela_target != null) {?>
        <div class="card" style="<?= $poisat_display?>">
          <div class="card-header">
            <a class="card-link" data-toggle="collapse" href="#collapse9">
            <i class="fa fa-upload" aria-hidden="true"></i> Isabela School of Arts and Trades
            </a>
          </div>
          <div id="collapse9" class="collapse" data-parent="#accordion">
            <div class="card-body">

              <ul class="list-group list-group-flush">
                <?php 
                  foreach ($evidence_isat_isabela_target as $row) {
                      $ous_desc = 'Operating Unit: [<b>Isabela School of Arts and Trades</b>] - Month: [<b>'.$row['evi_month'].'</b>] - Date/Time uploaded: [<b>'.$row['evi_timestamp'].'</b>]';
                ?>
                  <li class="list-group-item">
                    <small><a href="<?php echo base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/evidence/'.$row['ind_id'].'/'.$row['evi_filename']?>" target="_blank"><?= $ous_desc ?> - Uploaded by: <b><?= $row['usr_name']?></b></a></small>
                  </li>
                <?php } ?>
              </ul>

            </div>
          </div>
        </div>
        <?php } ?>
<!------ISAT------>

<!------SICAT------>
      <?php if ($evidence_sicat_isabela_target != null) {?>
        <div class="card" style="<?= $posicat_display?>">
          <div class="card-header">
            <a class="card-link" data-toggle="collapse" href="#collapse10">
            <i class="fa fa-upload" aria-hidden="true"></i> Southern Isabela College of Arts and Trades
            </a>
          </div>
          <div id="collapse10" class="collapse" data-parent="#accordion">
            <div class="card-body">

              <ul class="list-group list-group-flush">
                <?php 
                  foreach ($evidence_sicat_isabela_target as $row) {
                      $ous_desc = 'Operating Unit: [<b>Southern Isabela College of Arts and Trades</b>] - Month: [<b>'.$row['evi_month'].'</b>] - Date/Time uploaded: [<b>'.$row['evi_timestamp'].'</b>]';
                ?>
                  <li class="list-group-item">
                    <small><a href="<?php echo base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/evidence/'.$row['ind_id'].'/'.$row['evi_filename']?>" target="_blank"><?= $ous_desc ?> - Uploaded by: <b><?= $row['usr_name']?></b></a></small>
                  </li>
                <?php } ?>
              </ul>

            </div>
          </div>
        </div>
        <?php } ?>
<!------SICAT------>

<!------NVPI------>
      <?php if ($evidence_nvpi_target != null) {?>
        <div class="card" style="<?= $ponvpi_display?>">
          <div class="card-header">
            <a class="card-link" data-toggle="collapse" href="#collapse11">
            <i class="fa fa-upload" aria-hidden="true"></i> Nueva Vizcaya Polytechnic Institute
            </a>
          </div>
          <div id="collapse11" class="collapse" data-parent="#accordion">
            <div class="card-body">

              <ul class="list-group list-group-flush">
                <?php 
                  foreach ($evidence_nvpi_target as $row) {
                      $ous_desc = 'Operating Unit: [<b>Nueva Vizcaya Polytechnic Institute</b>] - Month: [<b>'.$row['evi_month'].'</b>] - Date/Time uploaded: [<b>'.$row['evi_timestamp'].'</b>]';
                ?>
                  <li class="list-group-item">
                    <small><a href="<?php echo base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/evidence/'.$row['ind_id'].'/'.$row['evi_filename']?>" target="_blank"><?= $ous_desc ?> - Uploaded by: <b><?= $row['usr_name']?></b></a></small>
                  </li>
                <?php } ?>
              </ul>

            </div>
          </div>
        </div>
        <?php } ?>
<!------NVPI------>

<!------PTC Batanes------>
        <?php if ($evidence_ptc_batanes_target != null) {?>
        <div class="card" style="<?= $ptcbat_display?>">
          <div class="card-header">
            <a class="card-link" data-toggle="collapse" href="#collapse12">
            <i class="fa fa-upload" aria-hidden="true"></i> PTC - Batanes
            </a>
          </div>
          <div id="collapse12" class="collapse" data-parent="#accordion">
            <div class="card-body">

              <ul class="list-group list-group-flush">
                <?php 
                  foreach ($evidence_ptc_batanes_target as $row) {
                      $ous_desc = 'Operating Unit: [<b>PTC - Batanes</b>] - Month: [<b>'.$row['evi_month'].'</b>] - Date/Time uploaded: [<b>'.$row['evi_timestamp'].'</b>]';
                ?>
                  <li class="list-group-item">
                    <small><a href="<?php echo base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/evidence/'.$row['ind_id'].'/'.$row['evi_filename']?>" target="_blank"><?= $ous_desc ?> - Uploaded by: <b><?= $row['usr_name']?></b></a></small>
                  </li>
                <?php } ?>
              </ul>

            </div>
          </div>
        </div>
        <?php } ?>
<!------PTC Batanes------>

<!------PTC Cagayan------>
        <?php if ($evidence_ptc_cagayan_target != null) {?>
        <div class="card" style="<?= $ptccag_display?>">
          <div class="card-header">
            <a class="card-link" data-toggle="collapse" href="#collapse13">
            <i class="fa fa-upload" aria-hidden="true"></i> PTC - Cagayan
            </a>
          </div>
          <div id="collapse13" class="collapse" data-parent="#accordion">
            <div class="card-body">

              <ul class="list-group list-group-flush">
                <?php 
                  foreach ($evidence_ptc_cagayan_target as $row) {
                      $ous_desc = 'Operating Unit: [<b>PTC - Cagayan</b>] - Month: [<b>'.$row['evi_month'].'</b>] - Date/Time uploaded: [<b>'.$row['evi_timestamp'].'</b>]';
                ?>
                  <li class="list-group-item">
                    <small><a href="<?php echo base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/evidence/'.$row['ind_id'].'/'.$row['evi_filename']?>" target="_blank"><?= $ous_desc ?> - Uploaded by: <b><?= $row['usr_name']?></b></a></small>
                  </li>
                <?php } ?>
              </ul>

            </div>
          </div>
        </div>
        <?php } ?>
<!------PTC Cagayan------>

<!------PTC Isabela------>
        <?php if ($evidence_ptc_isabela_target != null) {?>
        <div class="card" style="<?= $ptcisa_display?>">
          <div class="card-header">
            <a class="card-link" data-toggle="collapse" href="#collapse14">
            <i class="fa fa-upload" aria-hidden="true"></i> PTC - Isabela
            </a>
          </div>
          <div id="collapse14" class="collapse" data-parent="#accordion">
            <div class="card-body">

              <ul class="list-group list-group-flush">
                <?php 
                  foreach ($evidence_ptc_isabela_target as $row) {
                      $ous_desc = 'Operating Unit: [<b>PTC - Isabela</b>] - Month: [<b>'.$row['evi_month'].'</b>] - Date/Time uploaded: [<b>'.$row['evi_timestamp'].'</b>]';
                ?>
                  <li class="list-group-item">
                    <small><a href="<?php echo base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/evidence/'.$row['ind_id'].'/'.$row['evi_filename']?>" target="_blank"><?= $ous_desc ?> - Uploaded by: <b><?= $row['usr_name']?></b></a></small>
                  </li>
                <?php } ?>
              </ul>

            </div>
          </div>
        </div>
        <?php } ?>
<!------PTC Isabela------>

<!------PTC NV------>
        <?php if ($evidence_ptc_nv_target != null) {?>
        <div class="card" style="<?= $ptcnv_display?>">
          <div class="card-header">
            <a class="card-link" data-toggle="collapse" href="#collapse15">
            <i class="fa fa-upload" aria-hidden="true"></i> PTC - Nueva Vizcaya
            </a>
          </div>
          <div id="collapse15" class="collapse" data-parent="#accordion">
            <div class="card-body">

              <ul class="list-group list-group-flush">
                <?php 
                  foreach ($evidence_ptc_nv_target as $row) {
                      $ous_desc = 'Operating Unit: [<b>PTC - Nueva Vizcaya</b>] - Month: [<b>'.$row['evi_month'].'</b>] - Date/Time uploaded: [<b>'.$row['evi_timestamp'].'</b>]';
                ?>
                  <li class="list-group-item">
                    <small><a href="<?php echo base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/evidence/'.$row['ind_id'].'/'.$row['evi_filename']?>" target="_blank"><?= $ous_desc ?> - Uploaded by: <b><?= $row['usr_name']?></b></a></small>
                  </li>
                <?php } ?>
              </ul>

            </div>
          </div>
        </div>
        <?php } ?>
<!------PTC NV------>

<!------PTC Quirino------>
        <?php if ($evidence_ptc_quirino_target != null) {?>
        <div class="card" style="<?= $ptcqui_display?>">
          <div class="card-header">
            <a class="card-link" data-toggle="collapse" href="#collapse16">
            <i class="fa fa-upload" aria-hidden="true"></i> PTC - Quirino
            </a>
          </div>
          <div id="collapse16" class="collapse" data-parent="#accordion">
            <div class="card-body">

              <ul class="list-group list-group-flush">
                <?php 
                  foreach ($evidence_ptc_quirino_target as $row) {
                      $ous_desc = 'Operating Unit: [<b>PTC - Quirino</b>] - Month: [<b>'.$row['evi_month'].'</b>] - Date/Time uploaded: [<b>'.$row['evi_timestamp'].'</b>]';
                ?>
                  <li class="list-group-item">
                    <small><a href="<?php echo base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/evidence/'.$row['ind_id'].'/'.$row['evi_filename']?>" target="_blank"><?= $ous_desc ?> - Uploaded by: <b><?= $row['usr_name']?></b></a></small>
                  </li>
                <?php } ?>
              </ul>

            </div>
          </div>
        </div>
        <?php } ?>
<!------PTC Quirino------>

    </div>
<br>
<br>
</div>

</body>
</html>