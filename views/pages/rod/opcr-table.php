<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Export OPCR</title>
</head>
<body>
    <!--Style-->
        <style type="text/css">
            .tg  {border-collapse:collapse;border-spacing:0;}
            .tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
            overflow:hidden;padding:10px 5px;word-break:normal;}
            .tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
            font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
            .tg .tg-0pky{border-color:inherit;text-align:left;vertical-align:top}
            .tg .tg-0lax{text-align:left;vertical-align:top}
            
              /* Styling for the loading animation */
  #loading {
    display: flex;
    justify-content: center;
    align-items: center;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(255, 255, 255, 0.8); /* semi-transparent white background */
    z-index: 9999; /* Make sure it's on top of everything */
  }
  
  #loading-text {
    font-size: 24px;
    color: #333; /* Dark grey text color */
  }
    </style>
    <script>
    // JavaScript to hide the loading animation when the page is fully loaded
    window.addEventListener('load', function() {
      var loading = document.getElementById('loading');
      var content = document.getElementById('page-content');

      loading.style.display = 'none'; // Hide the loading animation
      content.style.display = 'block'; // Show the page content
    });
  </script>
    <!--Style-->
    <div class="container">  
        
        <br>
        <br>  
        <center>
        <!-- Loading animation -->
        <div id="loading">
            <p id="loading-text">Loading...</p>
        </div>

        <!-- Your page content goes here -->
            <div id="page-content" style="display: none;">
        <!-- Put your actual page content here -->
        <h1>Office Performance Commitment and Review</h1>
            <p>TESDA Region II (Cagayan Valley) Accomplishment as of <?= date('F j Y')?></p>
        </div>

        <div class="row">       
            <button class="btn btn-primary btn-sm col-md-12" onclick="exportTablesToExcel()" width="100%">Export to Excel</button>
            <br>

            <div id="accordion">   
        <!--Summary-->
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Section 1
                    </button>
                    </h5>
                </div>
                <table id="tbl1" class="tg" style="margin-top:10px;">
                <thead>
                <tr>
                    <th class="tg-0pky">#</th>
                    <th class="tg-0pky">Target</th>
                    <th class="tg-0pky">Indicator</th>
                    <th class="tg-0pky">Accomplishment</th>
                    <th class="tg-0pky">January</th>
                    <th class="tg-0pky">February</th>
                    <th class="tg-0pky">March</th>
                    <th class="tg-0pky">April</th>
                    <th class="tg-0pky">May</th>
                    <th class="tg-0pky">June</th>
                    <th class="tg-0pky">July</th>
                    <th class="tg-0pky">August</th>
                    <th class="tg-0pky">September</th>
                    <th class="tg-0pky">October</th>
                    <th class="tg-0pky">November</th>
                    <th class="tg-0pky">December</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="tg-0pky" colspan="16">Summary</td>
                </tr>
                <?php
                    $x = 0;  
                    foreach($summary as $row ){
                    $x++;
                ?>
                <tr>
                <td class="tg-0pky"><?= $x ?></td>
                    <td class="tg-0pky"><?= $row['ind_target']?></td>
                    <td class="tg-0pky"><?= $row['ind_desc']?></td>
                    <td class="tg-0pky"></td>
                    <td class="tg-0pky"></td>
                    <td class="tg-0pky"></td>
                    <td class="tg-0pky"></td>
                    <td class="tg-0pky"></td>
                    <td class="tg-0pky"></td>
                    <td class="tg-0pky"></td>
                    <td class="tg-0pky"></td>
                    <td class="tg-0pky"></td>
                    <td class="tg-0pky"></td>
                    <td class="tg-0pky"></td>
                    <td class="tg-0pky"></td>
                    <td class="tg-0pky"></td>
                </tr>
                <?php } ?>
                </tbody>
                </table>
        <!--Summary-->
        <br> 
        <br>
        <hr>
        <!--RO-->
            <table id="tbl2" class="tg">
            <thead>
           
            <tr>
                <th class="tg-0pky">#</th>
                <th class="tg-0pky">Target</th>
                <th class="tg-0pky">Indicator</th>
                <th class="tg-0pky">Accomplishment</th>
                <th class="tg-0pky">January</th>
                <th class="tg-0pky">February</th>
                <th class="tg-0pky">March</th>
                <th class="tg-0pky">April</th>
                <th class="tg-0pky">May</th>
                <th class="tg-0pky">June</th>
                <th class="tg-0pky">July</th>
                <th class="tg-0pky">August</th>
                <th class="tg-0pky">September</th>
                <th class="tg-0pky">October</th>
                <th class="tg-0pky">November</th>
                <th class="tg-0pky">December</th>
            </tr>
          
            </thead>

            <tbody>
            <tr>
                <td class="tg-0pky" colspan="16">Regional Office</td>
            </tr>
            <?php
                $x = 0; 
                foreach($ro_target as $row){
                $x++;
            ?>
                
            <tr>
                <td class="tg-0pky"><?= $x ?></td>
                <td class="tg-0pky"><?= $row['ous_target']?></td>
                <td class="tg-0pky"><?= $row['ind_desc']?></td>
                <td class="tg-0pky"></td>
                <td class="tg-0pky"><?= $row['January_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['February_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['March_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['April_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['May_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['June_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['July_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['August_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['September_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['October_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['November_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['December_Accomplishment']?></td>
            </tr>
            <?php } ?>

            </tbody>
            </table>
        <!--RO-->
        <hr>
        <!--PO Batanes-->
            <table id="tbl3" class="tg">
            <thead>
            <tr>
                <th class="tg-0pky">#</th>
                <th class="tg-0pky">Target</th>
                <th class="tg-0pky">Indicator</th>
                <th class="tg-0pky">Accomplishment</th>
                <th class="tg-0pky">January</th>
                <th class="tg-0pky">February</th>
                <th class="tg-0pky">March</th>
                <th class="tg-0pky">April</th>
                <th class="tg-0pky">May</th>
                <th class="tg-0pky">June</th>
                <th class="tg-0pky">July</th>
                <th class="tg-0pky">August</th>
                <th class="tg-0pky">September</th>
                <th class="tg-0pky">October</th>
                <th class="tg-0pky">November</th>
                <th class="tg-0pky">December</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="tg-0pky" colspan="16">Batanes Provincial Office</td>
            </tr>
            <?php
                $x = 0; 
                foreach($po_batanes_target as $row){
                $x++;
            ?>
                
            <tr>
                <td class="tg-0pky"><?= $x ?></td>
                <td class="tg-0pky"><?= $row['ous_target']?></td>
                <td class="tg-0pky"><?= $row['ind_desc']?></td>
                <td class="tg-0pky"></td>
                <td class="tg-0pky"><?= $row['January_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['February_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['March_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['April_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['May_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['June_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['July_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['August_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['September_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['October_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['November_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['December_Accomplishment']?></td>
            </tr>
            <?php } ?>
            </tbody>
            </table>
        <!--PO Batanes-->
        <hr>
        <!--PTC Batanes-->
            <table id="tbl4" class="tg">
            <thead>
            <tr>
                <th class="tg-0pky">#</th>
                <th class="tg-0pky">Target</th>
                <th class="tg-0pky">Indicator</th>
                <th class="tg-0pky">Accomplishment</th>
                <th class="tg-0pky">January</th>
                <th class="tg-0pky">February</th>
                <th class="tg-0pky">March</th>
                <th class="tg-0pky">April</th>
                <th class="tg-0pky">May</th>
                <th class="tg-0pky">June</th>
                <th class="tg-0pky">July</th>
                <th class="tg-0pky">August</th>
                <th class="tg-0pky">September</th>
                <th class="tg-0pky">October</th>
                <th class="tg-0pky">November</th>
                <th class="tg-0pky">December</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="tg-0pky" colspan="16">Provincial Training Center - Batanes</td>
            </tr>
            <?php
                $x = 0; 
                foreach($ptc_batanes_target as $row){
                $x++;
            ?>
                
            <tr>
                <td class="tg-0pky"><?= $x ?></td>
                <td class="tg-0pky"><?= $row['ous_target']?></td>
                <td class="tg-0pky"><?= $row['ind_desc']?></td>
                <td class="tg-0pky"></td>
                <td class="tg-0pky"><?= $row['January_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['February_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['March_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['April_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['May_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['June_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['July_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['August_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['September_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['October_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['November_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['December_Accomplishment']?></td>
            </tr>
            <?php } ?>
            </tbody>
            </table>
        <!--PTC Batanes-->
        <hr>
        <!--PO Cagayan-->
            <table id="tbl5" class="tg">
            <thead>
            <tr>
                <th class="tg-0pky">#</th>
                <th class="tg-0pky">Target</th>
                <th class="tg-0pky">Indicator</th>
                <th class="tg-0pky">Accomplishment</th>
                <th class="tg-0pky">January</th>
                <th class="tg-0pky">February</th>
                <th class="tg-0pky">March</th>
                <th class="tg-0pky">April</th>
                <th class="tg-0pky">May</th>
                <th class="tg-0pky">June</th>
                <th class="tg-0pky">July</th>
                <th class="tg-0pky">August</th>
                <th class="tg-0pky">September</th>
                <th class="tg-0pky">October</th>
                <th class="tg-0pky">November</th>
                <th class="tg-0pky">December</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="tg-0pky" colspan="16">Cagayan Provincial Office</td>
            </tr>
            <?php
                $x = 0; 
                foreach($po_cagayan_target as $row){
                $x++;
            ?>
                
            <tr>
                <td class="tg-0pky"><?= $x ?></td>
                <td class="tg-0pky"><?= $row['ous_target']?></td>
                <td class="tg-0pky"><?= $row['ind_desc']?></td>
                <td class="tg-0pky"></td>
                <td class="tg-0pky"><?= $row['January_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['February_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['March_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['April_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['May_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['June_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['July_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['August_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['September_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['October_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['November_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['December_Accomplishment']?></td>
            </tr>
            <?php } ?>
            </tbody>
            </table>
        <!--PO Cagayan-->
        <hr>
        <!--PTC Cagayan-->
            <table id="tbl6" class="tg">
            <thead>
            <tr>
                <th class="tg-0pky">#</th>
                <th class="tg-0pky">Target</th>
                <th class="tg-0pky">Indicator</th>
                <th class="tg-0pky">Accomplishment</th>
                <th class="tg-0pky">January</th>
                <th class="tg-0pky">February</th>
                <th class="tg-0pky">March</th>
                <th class="tg-0pky">April</th>
                <th class="tg-0pky">May</th>
                <th class="tg-0pky">June</th>
                <th class="tg-0pky">July</th>
                <th class="tg-0pky">August</th>
                <th class="tg-0pky">September</th>
                <th class="tg-0pky">October</th>
                <th class="tg-0pky">November</th>
                <th class="tg-0pky">December</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="tg-0pky" colspan="16">Provincial Training Center - Cagayan</td>
            </tr>
            <?php
                $x = 0; 
                foreach($ptc_cagayan_target as $row){
                $x++;
            ?>
                
            <tr>
                <td class="tg-0pky"><?= $x ?></td>
                <td class="tg-0pky"><?= $row['ous_target']?></td>
                <td class="tg-0pky"><?= $row['ind_desc']?></td>
                <td class="tg-0pky"></td>
                <td class="tg-0pky"><?= $row['January_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['February_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['March_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['April_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['May_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['June_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['July_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['August_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['September_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['October_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['November_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['December_Accomplishment']?></td>
            </tr>
            <?php } ?>
            </tbody>
            </table>
        <!--PTC Cagayan-->
        <hr>
        <!--API-->
            <table id="tbl7" class="tg">
            <thead>
            <tr>
                <th class="tg-0pky">#</th>
                <th class="tg-0pky">Target</th>
                <th class="tg-0pky">Indicator</th>
                <th class="tg-0pky">Accomplishment</th>
                <th class="tg-0pky">January</th>
                <th class="tg-0pky">February</th>
                <th class="tg-0pky">March</th>
                <th class="tg-0pky">April</th>
                <th class="tg-0pky">May</th>
                <th class="tg-0pky">June</th>
                <th class="tg-0pky">July</th>
                <th class="tg-0pky">August</th>
                <th class="tg-0pky">September</th>
                <th class="tg-0pky">October</th>
                <th class="tg-0pky">November</th>
                <th class="tg-0pky">December</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="tg-0pky" colspan="16">Aparri Polytechnic Institute</td>
            </tr>
            <?php
                $x = 0; 
                foreach($api_target as $row){
                $x++;
            ?>
                
            <tr>
                <td class="tg-0pky"><?= $x ?></td>
                <td class="tg-0pky"><?= $row['ous_target']?></td>
                <td class="tg-0pky"><?= $row['ind_desc']?></td>
                <td class="tg-0pky"></td>
                <td class="tg-0pky"><?= $row['January_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['February_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['March_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['April_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['May_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['June_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['July_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['August_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['September_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['October_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['November_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['December_Accomplishment']?></td>
            </tr>
            <?php } ?>
            </tbody>
            </table>
        <!--API-->
        <hr>
        <!--LIT-->
            <table id="tbl8" class="tg">
            <thead>
            <tr>
                <th class="tg-0pky">#</th>
                <th class="tg-0pky">Target</th>
                <th class="tg-0pky">Indicator</th>
                <th class="tg-0pky">Accomplishment</th>
                <th class="tg-0pky">January</th>
                <th class="tg-0pky">February</th>
                <th class="tg-0pky">March</th>
                <th class="tg-0pky">April</th>
                <th class="tg-0pky">May</th>
                <th class="tg-0pky">June</th>
                <th class="tg-0pky">July</th>
                <th class="tg-0pky">August</th>
                <th class="tg-0pky">September</th>
                <th class="tg-0pky">October</th>
                <th class="tg-0pky">November</th>
                <th class="tg-0pky">December</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="tg-0pky" colspan="16">Lasam Institute of Technology</td>
            </tr>
            <?php
                $x = 0; 
                foreach($lit_target as $row){
                $x++;
            ?>
                
            <tr>
                <td class="tg-0pky"><?= $x ?></td>
                <td class="tg-0pky"><?= $row['ous_target']?></td>
                <td class="tg-0pky"><?= $row['ind_desc']?></td>
                <td class="tg-0pky"></td>
                <td class="tg-0pky"><?= $row['January_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['February_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['March_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['April_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['May_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['June_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['July_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['August_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['September_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['October_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['November_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['December_Accomplishment']?></td>
            </tr>
            <?php } ?>
            </tbody>
            </table>
        <!--LIT-->
        <hr>
        <!--RTC-->
            <table id="tbl9" class="tg">
            <thead>
            <tr>
                <th class="tg-0pky">#</th>
                <th class="tg-0pky">Target</th>
                <th class="tg-0pky">Indicator</th>
                <th class="tg-0pky">Accomplishment</th>
                <th class="tg-0pky">January</th>
                <th class="tg-0pky">February</th>
                <th class="tg-0pky">March</th>
                <th class="tg-0pky">April</th>
                <th class="tg-0pky">May</th>
                <th class="tg-0pky">June</th>
                <th class="tg-0pky">July</th>
                <th class="tg-0pky">August</th>
                <th class="tg-0pky">September</th>
                <th class="tg-0pky">October</th>
                <th class="tg-0pky">November</th>
                <th class="tg-0pky">December</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="tg-0pky" colspan="16">Regional Training Center - Tuguegarao</td>
            </tr>
            <?php
                $x = 0; 
                foreach($rtc_target as $row){
                $x++;
            ?>
                
            <tr>
                <td class="tg-0pky"><?= $x ?></td>
                <td class="tg-0pky"><?= $row['ous_target']?></td>
                <td class="tg-0pky"><?= $row['ind_desc']?></td>
                <td class="tg-0pky"></td>
                <td class="tg-0pky"><?= $row['January_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['February_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['March_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['April_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['May_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['June_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['July_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['August_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['September_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['October_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['November_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['December_Accomplishment']?></td>
            </tr>
            <?php } ?>
            </tbody>
            </table>
        <!--RTC-->
        <hr>
        <!--PO Isabela-->
            <table id="tbl10" class="tg">
            <thead>
            <tr>
                <th class="tg-0pky">#</th>
                <th class="tg-0pky">Target</th>
                <th class="tg-0pky">Indicator</th>
                <th class="tg-0pky">Accomplishment</th>
                <th class="tg-0pky">January</th>
                <th class="tg-0pky">February</th>
                <th class="tg-0pky">March</th>
                <th class="tg-0pky">April</th>
                <th class="tg-0pky">May</th>
                <th class="tg-0pky">June</th>
                <th class="tg-0pky">July</th>
                <th class="tg-0pky">August</th>
                <th class="tg-0pky">September</th>
                <th class="tg-0pky">October</th>
                <th class="tg-0pky">November</th>
                <th class="tg-0pky">December</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="tg-0pky" colspan="16">Isabela Provincial Office</td>
            </tr>
            <?php
                $x = 0; 
                foreach($po_isabela_target as $row){
                $x++;
            ?>
                
            <tr>
                <td class="tg-0pky"><?= $x ?></td>
                <td class="tg-0pky"><?= $row['ous_target']?></td>
                <td class="tg-0pky"><?= $row['ind_desc']?></td>
                <td class="tg-0pky"></td>
                <td class="tg-0pky"><?= $row['January_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['February_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['March_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['April_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['May_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['June_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['July_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['August_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['September_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['October_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['November_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['December_Accomplishment']?></td>
            </tr>
            <?php } ?>
            </tbody>
            </table>
        <!--PO Isabela-->
        <hr>
        <!--PTC Isabela-->
            <table id="tbl11" class="tg">
            <thead>
            <tr>
                <th class="tg-0pky">#</th>
                <th class="tg-0pky">Target</th>
                <th class="tg-0pky">Indicator</th>
                <th class="tg-0pky">Accomplishment</th>
                <th class="tg-0pky">January</th>
                <th class="tg-0pky">February</th>
                <th class="tg-0pky">March</th>
                <th class="tg-0pky">April</th>
                <th class="tg-0pky">May</th>
                <th class="tg-0pky">June</th>
                <th class="tg-0pky">July</th>
                <th class="tg-0pky">August</th>
                <th class="tg-0pky">September</th>
                <th class="tg-0pky">October</th>
                <th class="tg-0pky">November</th>
                <th class="tg-0pky">December</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="tg-0pky" colspan="16">Provincial Training Center - Isabela</td>
            </tr>
            <?php
                $x = 0; 
                foreach($ptc_isabela_target as $row){
                $x++;
            ?>
                
            <tr>
                <td class="tg-0pky"><?= $x ?></td>
                <td class="tg-0pky"><?= $row['ous_target']?></td>
                <td class="tg-0pky"><?= $row['ind_desc']?></td>
                <td class="tg-0pky"></td>
                <td class="tg-0pky"><?= $row['January_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['February_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['March_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['April_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['May_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['June_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['July_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['August_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['September_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['October_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['November_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['December_Accomplishment']?></td>
            </tr>
            <?php } ?>
            </tbody>
            </table>
        <!--PTC Isabela-->
        <hr>
        <!--ISAT-->
            <table id="tbl12" class="tg">
            <thead>
            <tr>
                <th class="tg-0pky">#</th>
                <th class="tg-0pky">Target</th>
                <th class="tg-0pky">Indicator</th>
                <th class="tg-0pky">Accomplishment</th>
                <th class="tg-0pky">January</th>
                <th class="tg-0pky">February</th>
                <th class="tg-0pky">March</th>
                <th class="tg-0pky">April</th>
                <th class="tg-0pky">May</th>
                <th class="tg-0pky">June</th>
                <th class="tg-0pky">July</th>
                <th class="tg-0pky">August</th>
                <th class="tg-0pky">September</th>
                <th class="tg-0pky">October</th>
                <th class="tg-0pky">November</th>
                <th class="tg-0pky">December</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="tg-0pky" colspan="16">Isabela School of Arts and Trades</td>
            </tr>
            <?php
                $x = 0; 
                foreach($isat_isabela_target as $row){
                $x++;
            ?>
                
            <tr>
                <td class="tg-0pky"><?= $x ?></td>
                <td class="tg-0pky"><?= $row['ous_target']?></td>
                <td class="tg-0pky"><?= $row['ind_desc']?></td>
                <td class="tg-0pky"></td>
                <td class="tg-0pky"><?= $row['January_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['February_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['March_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['April_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['May_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['June_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['July_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['August_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['September_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['October_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['November_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['December_Accomplishment']?></td>
            </tr>
            <?php } ?>
            </tbody>
            </table>
        <!--ISAT-->
        <hr>
        <!--SICAT-->
            <table id="tbl13" class="tg">
            <thead>
            <tr>
                <th class="tg-0pky">#</th>
                <th class="tg-0pky">Target</th>
                <th class="tg-0pky">Indicator</th>
                <th class="tg-0pky">Accomplishment</th>
                <th class="tg-0pky">January</th>
                <th class="tg-0pky">February</th>
                <th class="tg-0pky">March</th>
                <th class="tg-0pky">April</th>
                <th class="tg-0pky">May</th>
                <th class="tg-0pky">June</th>
                <th class="tg-0pky">July</th>
                <th class="tg-0pky">August</th>
                <th class="tg-0pky">September</th>
                <th class="tg-0pky">October</th>
                <th class="tg-0pky">November</th>
                <th class="tg-0pky">December</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="tg-0pky" colspan="16">Southern Isabela College of Arts and Trades</td>
            </tr>
            <?php
                $x = 0; 
                foreach($sicat_isabela_target as $row){
                $x++;
            ?>
                
            <tr>
                <td class="tg-0pky"><?= $x ?></td>
                <td class="tg-0pky"><?= $row['ous_target']?></td>
                <td class="tg-0pky"><?= $row['ind_desc']?></td>
                <td class="tg-0pky"></td>
                <td class="tg-0pky"><?= $row['January_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['February_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['March_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['April_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['May_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['June_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['July_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['August_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['September_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['October_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['November_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['December_Accomplishment']?></td>
            </tr>
            <?php } ?>
            </tbody>
            </table>
        <!--SICAT-->
        <hr>
        <!--PO Nueva Vizcaya-->
            <table id="tbl18" class="tg">
            <thead>
            <tr>
                <th class="tg-0pky">#</th>
                <th class="tg-0pky">Target</th>
                <th class="tg-0pky">Indicator</th>
                <th class="tg-0pky">Accomplishment</th>
                <th class="tg-0pky">January</th>
                <th class="tg-0pky">February</th>
                <th class="tg-0pky">March</th>
                <th class="tg-0pky">April</th>
                <th class="tg-0pky">May</th>
                <th class="tg-0pky">June</th>
                <th class="tg-0pky">July</th>
                <th class="tg-0pky">August</th>
                <th class="tg-0pky">September</th>
                <th class="tg-0pky">October</th>
                <th class="tg-0pky">November</th>
                <th class="tg-0pky">December</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="tg-0pky" colspan="16">Nueva Vizcaya Provincial Office</td>
            </tr>
            <?php
                $x = 0; 
                foreach($po_nv_target as $row){
                $x++;
            ?>
                
            <tr>
                <td class="tg-0pky"><?= $x ?></td>
                <td class="tg-0pky"><?= $row['ous_target']?></td>
                <td class="tg-0pky"><?= $row['ind_desc']?></td>
                <td class="tg-0pky"></td>
                <td class="tg-0pky"><?= $row['January_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['February_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['March_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['April_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['May_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['June_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['July_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['August_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['September_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['October_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['November_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['December_Accomplishment']?></td>
            </tr>
            <?php } ?>
            </tbody>
            </table>
        <!--PO Nueva Vizcaya-->
        <hr>
        <!--PTC Nueva Vizcaya-->
            <table id="tbl14" class="tg">
            <thead>
            <tr>
                <th class="tg-0pky">#</th>
                <th class="tg-0pky">Target</th>
                <th class="tg-0pky">Indicator</th>
                <th class="tg-0pky">Accomplishment</th>
                <th class="tg-0pky">January</th>
                <th class="tg-0pky">February</th>
                <th class="tg-0pky">March</th>
                <th class="tg-0pky">April</th>
                <th class="tg-0pky">May</th>
                <th class="tg-0pky">June</th>
                <th class="tg-0pky">July</th>
                <th class="tg-0pky">August</th>
                <th class="tg-0pky">September</th>
                <th class="tg-0pky">October</th>
                <th class="tg-0pky">November</th>
                <th class="tg-0pky">December</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="tg-0pky" colspan="16">Provincial Training Center - Nueva Vizcaya</td>
            </tr>
            <?php
                $x = 0; 
                foreach($ptc_nv_target as $row){
                $x++;
            ?>
                
            <tr>
                <td class="tg-0pky"><?= $x ?></td>
                <td class="tg-0pky"><?= $row['ous_target']?></td>
                <td class="tg-0pky"><?= $row['ind_desc']?></td>
                <td class="tg-0pky"></td>
                <td class="tg-0pky"><?= $row['January_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['February_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['March_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['April_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['May_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['June_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['July_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['August_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['September_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['October_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['November_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['December_Accomplishment']?></td>
            </tr>
            <?php } ?>
            </tbody>
            </table>
        <!--PTC Nueva Vizcaya-->
        <hr>
        <!--NVPI-->
            <table id="tbl15" class="tg">
            <thead>
            <tr>
                <th class="tg-0pky">#</th>
                <th class="tg-0pky">Target</th>
                <th class="tg-0pky">Indicator</th>
                <th class="tg-0pky">Accomplishment</th>
                <th class="tg-0pky">January</th>
                <th class="tg-0pky">February</th>
                <th class="tg-0pky">March</th>
                <th class="tg-0pky">April</th>
                <th class="tg-0pky">May</th>
                <th class="tg-0pky">June</th>
                <th class="tg-0pky">July</th>
                <th class="tg-0pky">August</th>
                <th class="tg-0pky">September</th>
                <th class="tg-0pky">October</th>
                <th class="tg-0pky">November</th>
                <th class="tg-0pky">December</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="tg-0pky" colspan="16">Nueva Vizcaya Polytechnic Institute</td>
            </tr>
            <?php
                $x = 0; 
                foreach($nvpi_target as $row){
                $x++;
            ?>
                
            <tr>
                <td class="tg-0pky"><?= $x ?></td>
                <td class="tg-0pky"><?= $row['ous_target']?></td>
                <td class="tg-0pky"><?= $row['ind_desc']?></td>
                <td class="tg-0pky"></td>
                <td class="tg-0pky"><?= $row['January_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['February_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['March_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['April_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['May_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['June_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['July_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['August_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['September_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['October_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['November_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['December_Accomplishment']?></td>
            </tr>
            <?php } ?>
            </tbody>
            </table>
        <!--NVPI-->
        <hr>
        <!--PO Quirino-->
            <table id="tbl16" class="tg">
            <thead>
            <tr>
                <th class="tg-0pky">#</th>
                <th class="tg-0pky">Target</th>
                <th class="tg-0pky">Indicator</th>
                <th class="tg-0pky">Accomplishment</th>
                <th class="tg-0pky">January</th>
                <th class="tg-0pky">February</th>
                <th class="tg-0pky">March</th>
                <th class="tg-0pky">April</th>
                <th class="tg-0pky">May</th>
                <th class="tg-0pky">June</th>
                <th class="tg-0pky">July</th>
                <th class="tg-0pky">August</th>
                <th class="tg-0pky">September</th>
                <th class="tg-0pky">October</th>
                <th class="tg-0pky">November</th>
                <th class="tg-0pky">December</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="tg-0pky" colspan="16">Quirino Provincial Office</td>
            </tr>
            <?php
                $x = 0; 
                foreach($po_quirino_target as $row){
                $x++;
            ?>
                
            <tr>
                <td class="tg-0pky"><?= $x ?></td>
                <td class="tg-0pky"><?= $row['ous_target']?></td>
                <td class="tg-0pky"><?= $row['ind_desc']?></td>
                <td class="tg-0pky"></td>
                <td class="tg-0pky"><?= $row['January_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['February_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['March_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['April_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['May_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['June_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['July_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['August_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['September_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['October_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['November_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['December_Accomplishment']?></td>
            </tr>
            <?php } ?>
            </tbody>
            </table>
        <!--PO Quirino-->
        <hr>
        <!--PTC Quirino-->
            <table id="tbl17" class="tg">
            <thead>
            <tr>
                <th class="tg-0pky">#</th>
                <th class="tg-0pky">Target</th>
                <th class="tg-0pky">Indicator</th>
                <th class="tg-0pky">Accomplishment</th>
                <th class="tg-0pky">January</th>
                <th class="tg-0pky">February</th>
                <th class="tg-0pky">March</th>
                <th class="tg-0pky">April</th>
                <th class="tg-0pky">May</th>
                <th class="tg-0pky">June</th>
                <th class="tg-0pky">July</th>
                <th class="tg-0pky">August</th>
                <th class="tg-0pky">September</th>
                <th class="tg-0pky">October</th>
                <th class="tg-0pky">November</th>
                <th class="tg-0pky">December</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="tg-0pky" colspan="16">Provincial Training Center - Quirino</td>
            </tr>
            <?php
                $x = 0; 
                foreach($ptc_quirino_target as $row){
                $x++;
            ?>
                
            <tr>
                <td class="tg-0pky"><?= $x ?></td>
                <td class="tg-0pky"><?= $row['ous_target']?></td>
                <td class="tg-0pky"><?= $row['ind_desc']?></td>
                <td class="tg-0pky"></td>
                <td class="tg-0pky"><?= $row['January_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['February_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['March_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['April_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['May_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['June_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['July_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['August_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['September_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['October_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['November_Accomplishment']?></td>
                <td class="tg-0pky"><?= $row['December_Accomplishment']?></td>
            </tr>
            <?php } ?>
            </tbody>
            </table>
        <!--PTC Quirino-->
        </div>
        </center>
    </div>

    <!-- Include Bootstrap JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <script src="https://cdn.sheetjs.com/xlsx-latest/package/dist/xlsx.full.min.js"></script>
    <script>
    
        function exportTablesToExcel() {
            // Create a new workbook
            var wb = XLSX.utils.book_new();

            // Get the tables
            var table1 = document.getElementById('tbl1');
            var table2 = document.getElementById('tbl2');
            var table3 = document.getElementById('tbl3');
            var table4 = document.getElementById('tbl4');
            var table5 = document.getElementById('tbl5');
            var table6 = document.getElementById('tbl6');
            var table7 = document.getElementById('tbl7');
            var table8 = document.getElementById('tbl8');
            var table9 = document.getElementById('tbl9');
            var table10 = document.getElementById('tbl10');
            var table11 = document.getElementById('tbl11');
            var table12 = document.getElementById('tbl12');
            var table13 = document.getElementById('tbl13');
            var table14 = document.getElementById('tbl4');
            var table15 = document.getElementById('tbl15');
            var table16 = document.getElementById('tbl16');
            var table17 = document.getElementById('tbl17');
            var table18 = document.getElementById('tbl18');

            // Convert the first table to a worksheet
            var ws1 = XLSX.utils.table_to_sheet(table1);
            XLSX.utils.book_append_sheet(wb, ws1, 'Summary');

            // Convert the first table to a worksheet
            var ws2 = XLSX.utils.table_to_sheet(table2);
            XLSX.utils.book_append_sheet(wb, ws2, 'Regional Office');

            // Convert the second table to a worksheet
            var ws3 = XLSX.utils.table_to_sheet(table3);
            XLSX.utils.book_append_sheet(wb, ws3, 'PO Batanes');

            // Convert the first table to a worksheet
            var ws4 = XLSX.utils.table_to_sheet(table5);
            XLSX.utils.book_append_sheet(wb, ws4, 'PO Cagayan');

            // Convert the first table to a worksheet
            var ws5 = XLSX.utils.table_to_sheet(table10);
            XLSX.utils.book_append_sheet(wb, ws5, 'PO Isabela');

            // Convert the second table to a worksheet
            var ws6 = XLSX.utils.table_to_sheet(table18);
            XLSX.utils.book_append_sheet(wb, ws6, 'PO Nueva Vizcaya');

            // Convert the second table to a worksheet
            var ws7 = XLSX.utils.table_to_sheet(table16);
            XLSX.utils.book_append_sheet(wb, ws7, 'PO Quirino');

            // Convert the second table to a worksheet
            var ws8 = XLSX.utils.table_to_sheet(table4);
            XLSX.utils.book_append_sheet(wb, ws8, 'PTC Batanes');

            // Convert the first table to a worksheet
            var ws9 = XLSX.utils.table_to_sheet(table6);
            XLSX.utils.book_append_sheet(wb, ws9, 'PTC Cagayan');

            // Convert the first table to a worksheet
            var ws10 = XLSX.utils.table_to_sheet(table11);
            XLSX.utils.book_append_sheet(wb, ws10, 'PTC Isabela');

            // Convert the second table to a worksheet
            var ws11 = XLSX.utils.table_to_sheet(table14);
            XLSX.utils.book_append_sheet(wb, ws11, 'PTC Nueva Vizcaya');

            // Convert the second table to a worksheet
            var ws12 = XLSX.utils.table_to_sheet(table17);
            XLSX.utils.book_append_sheet(wb, ws12, 'PTC Quirino');

            // Convert the second table to a worksheet
            var ws13 = XLSX.utils.table_to_sheet(table9);
            XLSX.utils.book_append_sheet(wb, ws13, 'RTC');

            // Convert the first table to a worksheet
            var ws14 = XLSX.utils.table_to_sheet(table7);
            XLSX.utils.book_append_sheet(wb, ws14, 'API');

            // Convert the first table to a worksheet
            var ws15 = XLSX.utils.table_to_sheet(table8);
            XLSX.utils.book_append_sheet(wb, ws15, 'LIT');

            // Convert the second table to a worksheet
            var ws16 = XLSX.utils.table_to_sheet(table12);
            XLSX.utils.book_append_sheet(wb, ws16, 'ISAT');

            // Convert the second table to a worksheet
            var ws17 = XLSX.utils.table_to_sheet(table13);
            XLSX.utils.book_append_sheet(wb, ws17, 'SICAT');

            // Convert the second table to a worksheet
            var ws18 = XLSX.utils.table_to_sheet(table14);
            XLSX.utils.book_append_sheet(wb, ws18, 'NVPI');

            // Export the workbook to an Excel file
            XLSX.writeFile(wb, 'OPCR as of <?php echo date('m/d/y') ?>.xlsx');
        }
    </script>
</body>
</html>
