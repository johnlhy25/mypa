<html>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:11px;
  overflow:hidden;padding:10px 5px;word-break:normal;}
.tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:12px;
  font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
.tg .tg-b6pe{background-color:#EAEAEA;text-align:center;vertical-align:top}
.tg .tg-baqh{text-align:center;vertical-align:top}
.tg .tg-7bu6{background-color:#EAEAEA;text-align:center;vertical-align:middle}
.tg .tg-0lax{text-align:left;vertical-align:top}
</style>

<body onload="exportTableToExcel('tblExport', 'Training of <?= $usr_name ?> as of <?= date('m-d-Y')?>')">
<center>
<table id="tblExport" class="tg"> 
<thead>
  <tr>
    <th class="tg-7bu6" colspan="7"><h2>Technical Education and Skills Development Authority R02</h2></th>
  </tr>
</thead>
<tbody>
    <tr>
    <th class="tg-7bu6" colspan="5"><span style="float:left">NAME: <b><?= strtoupper($usr_name) ?><span><b></th>
    <th class="tg-7bu6" colspan="2"><span style="float:left">OPERATING UNIT: <b><?= strtoupper($usr_ous) ?></span><b></th>
  </tr>
  <tr>
    <td class="tg-7bu6" rowspan="2"><b>No.</b></td>
    <td class="tg-7bu6" rowspan="2"><b>TITLE OF LEARNING AND DEVELOPMENT INTERVENTIONS/TRAINING PROGRAMS</b></td>
    <td class="tg-7bu6" colspan="2"><b>INCLUSIVE DATES OF ATTENDANCE</b></td>
    <td class="tg-7bu6" rowspan="2"><b>NUMBER OF HOURS</b></td>
    <td class="tg-7bu6" rowspan="2"><b>Type of LD (Managerial/ Supervisory/ Technical/etc)</b></td>
    <td class="tg-7bu6" rowspan="2"><b>CONDUCTED/ SPONSORED BY</b></td>
  </tr>
  <tr>
    <td class="tg-7bu6">From</td>
    <td class="tg-7bu6">To</td>
  </tr>
  <tr>
    <?php  $num_rows = $num_rows+1;
    foreach($list_of_trainings_user as $row){ $num_rows--;?>
        <tr>
            <td class="tg-7bu6"><?= $num_rows; ?></td>
            <td class="tg-7bu6"><?= $row['trn_learn_dev'] ?></td>
            <td class="tg-7bu6"><?= date("m-d-Y", strtotime($row['trn_from_date'])) ?></td>
            <td class="tg-7bu6"><?= date("m-d-Y", strtotime($row['trn_to_date'])) ?></td>
            <td class="tg-7bu6"><?= $row['trn_no_hours'] ?></td>
            <td class="tg-7bu6"><?= $row['trn_type'] ?></td>
            <td class="tg-7bu6"><?= $row['trn_conducted'] ?></td>
        </tr>
    <?php }?>
  </tr>
</tbody>
</table></center>

</body>
</html>

<script>
function exportTableToExcel(tableID, filename = ''){
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'excel_data.xls';
    
    // Create download link element
    downloadLink = document.createElement("a");
    
    document.body.appendChild(downloadLink);
    
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
    
        // Setting the file name
        downloadLink.download = filename;
        
        //triggering the function
        downloadLink.click();
    }

    window.close();
}
</script>



