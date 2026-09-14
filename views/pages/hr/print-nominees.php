<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
  overflow:hidden;padding:10px 5px;word-break:normal;}
.tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
  font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
.tg .tg-0lax{text-align:left;vertical-align:top}
</style>
<body onload="exportTableToExcel('tblExportNominees', 'List of Nominees on <?= $Training_Title ?>')">
<center>
<table id="tblExportNominees" class="tg">
<thead>
  <tr>
    <th class="tg-0lax" rowspan="2"><img src="<?= base_url();?>assets/img/Fav.png" width="50" height="50"></th>
    <th class="tg-0lax" colspan="3" rowspan="2"><center><b>Technical Education and Skills Development Authority - Regional Office No. 02<br><hr></b><b><span style="font-size:20px"><?= $Training_Title?> </span></b><br>List of Nominee/s </center></th>
  </tr>
  <tr>
  </tr>
</thead>
<tbody>
  <tr>
    <td class="tg-0lax"><center><b>No.</b></center></td>
    <td class="tg-0lax"><center><b>Name</b></center></td>
    <td class="tg-0lax"><center><b>Designation</b></center></td>
    <td class="tg-0lax"><center><b>Operating Unit</b></center></td>
</tr>
  <?php
    $num_row = 0;
    foreach($Approved as $row){ 
    $num_row++;
  ?>
    <tr>
        <td class="tg-0lax"><?= $num_row; ?>.</td>
        <td class="tg-0lax"><?= $row['usr_name']; ?></td>
        <td class="tg-0lax"><?= $row['emp_position']; ?></td>
        <td class="tg-0lax"><?= $row['ous_desc']; ?></td>
    </tr>
  <?php }?>
  <tr>
      <td colspan="4">
        <span style="font-size:10px;">Date & Time Generated: <b><?php date_default_timezone_set("Asia/Manila"); echo date("m/d/Y h:i A");?></b></span><br>
        <span style="font-size:8px;">R2 FASD Services <b>v 1.0.5</b> | &copy <?= date("Y");?> <b>TESDA DOS</b>. Site developed and managed with <i class="fa fa-heart"></i> by <strong>R2MIS Team</strong></span>
      </td>
  </tr>
</tbody>
</table>
</center>
</body>
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
}
</script>