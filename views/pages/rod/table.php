<!DOCTYPE html>
<html lang="en">
<head>
  <title>PMR 2023</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<body>  
    <div class="container">    
        <div class="row content">
        <button type="button" class="btn btn-primary" style="width:100%;margin-top:10px;" onclick="tablesToExcel(['tbl1','tbl2', 'tbl3','tbl4', 'tbl5','tbl6', 'tbl7','tbl8', 'tbl9','tbl10', 'tbl11','tbl12', 'tbl13', 'tbl18', 'tbl14', 'tbl15', 'tbl16', 'tbl17'], ['Summary','Regional Office','PO Batanes','PTC Batanes', 'PO Cagayan', 'PTC Cagayan', 'API', 'LIT', 'RTC', 'PO Isabela', 'PTC Isabela', 'ISAT', 'SICAT', 'PO Nueva Vizcaya', 'PTC Nueva Vizcaya', 'NVPI', 'PO Quirino', 'PTC Quirino'], 'PMR as of <?= date('m-d-Y')?>.xls', 'Excel')">Export to Excel</button>
        <!--Style-->
            <style type="text/css">
                .tg  {border-collapse:collapse;border-spacing:0;}
                .tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
                overflow:hidden;padding:10px 5px;word-break:normal;}
                .tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
                font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
                .tg .tg-0pky{border-color:inherit;text-align:left;vertical-align:top}
                .tg .tg-0lax{text-align:left;vertical-align:top}
            </style>
        <!--Style-->
        <center>
        <!--Summary-->
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
        </center>
        </div>
    </div>
</body>

</html>
<script>
    var tablesToExcel = (function() {
    var uri = 'data:application/vnd.ms-excel;base64,'
    , tmplWorkbookXML = '<?xml version="1.0"?><?mso-application progid="Excel.Sheet"?><Workbook xmlns="urn:schemas-microsoft-com:office:spreadsheet" xmlns:ss="urn:schemas-microsoft-com:office:spreadsheet">'
      + '<DocumentProperties xmlns="urn:schemas-microsoft-com:office:office"><Author>Axel Richter</Author><Created>{created}</Created></DocumentProperties>'
      + '<Styles>'
      + '<Style ss:ID="Currency"><NumberFormat ss:Format="Currency"></NumberFormat></Style>'
      + '<Style ss:ID="Date"><NumberFormat ss:Format="Medium Date"></NumberFormat></Style>'
      + '</Styles>' 
      + '{worksheets}</Workbook>'
    , tmplWorksheetXML = '<Worksheet ss:Name="{nameWS}"><Table>{rows}</Table></Worksheet>'
    , tmplCellXML = '<Cell{attributeStyleID}{attributeFormula}><Data ss:Type="{nameType}">{data}</Data></Cell>'
    , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
    , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
    return function(tables, wsnames, wbname, appname) {
      var ctx = "";
      var workbookXML = "";
      var worksheetsXML = "";
      var rowsXML = "";

      for (var i = 0; i < tables.length; i++) {
        if (!tables[i].nodeType) tables[i] = document.getElementById(tables[i]);
        for (var j = 0; j < tables[i].rows.length; j++) {
          rowsXML += '<Row>'
          for (var k = 0; k < tables[i].rows[j].cells.length; k++) {
            var dataType = tables[i].rows[j].cells[k].getAttribute("data-type");
            var dataStyle = tables[i].rows[j].cells[k].getAttribute("data-style");
            var dataValue = tables[i].rows[j].cells[k].getAttribute("data-value");
            dataValue = (dataValue)?dataValue:tables[i].rows[j].cells[k].innerHTML;
            var dataFormula = tables[i].rows[j].cells[k].getAttribute("data-formula");
            dataFormula = (dataFormula)?dataFormula:(appname=='Calc' && dataType=='DateTime')?dataValue:null;
            ctx = {  attributeStyleID: (dataStyle=='Currency' || dataStyle=='Date')?' ss:StyleID="'+dataStyle+'"':''
                   , nameType: (dataType=='Number' || dataType=='DateTime' || dataType=='Boolean' || dataType=='Error')?dataType:'String'
                   , data: (dataFormula)?'':dataValue
                   , attributeFormula: (dataFormula)?' ss:Formula="'+dataFormula+'"':''
                  };
            rowsXML += format(tmplCellXML, ctx);
          }
          rowsXML += '</Row>'
        }
        ctx = {rows: rowsXML, nameWS: wsnames[i] || 'Sheet' + i};
        worksheetsXML += format(tmplWorksheetXML, ctx);
        rowsXML = "";
      }

      ctx = {created: (new Date()).getTime(), worksheets: worksheetsXML};
      workbookXML = format(tmplWorkbookXML, ctx);

console.log(workbookXML);

      var link = document.createElement("A");
      link.href = uri + base64(workbookXML);
      link.download = wbname || 'Workbook.xls';
      link.target = '_blank';
      document.body.appendChild(link);
      link.click();
      document.body.removeChild(link);
    }
  })();
</script>

