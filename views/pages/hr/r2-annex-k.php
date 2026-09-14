<center>
<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
  overflow:hidden;padding:10px 5px;word-break:normal;}
.tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
  font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
.tg .tg-1wig{font-weight:bold;text-align:left;vertical-align:top}
.tg .tg-baqh{text-align:center;vertical-align:top}
.tg .tg-lap0{font-size:100%;text-align:center;vertical-align:top}
.tg .tg-0lax{text-align:left;vertical-align:top}
</style>
<table class="tg">
<thead>
  <tr>
    <th class="tg-lap0" colspan="5"><span style="font-weight:bold">TECHNICAL EDUCATION AND SKILLS DEVELOPMENT AUTHORITY</span></th>
  </tr>
</thead>
<tbody>
  <tr>
    <td class="tg-baqh" colspan="5"><span style="font-weight:bold">LONG SELECTION LINE - UP</span></td>
  </tr>
  <tr>
    <td class="tg-1wig">OFFICE WHERE THE VACANCY IS</td>
    <td class="tg-1wig">POSITION APPLIED</td>
    <td class="tg-1wig">NO.</td>
    <td class="tg-1wig">NAME OF APPLICANT</td>
    <td class="tg-1wig">REMARKS</td>
  </tr>
  <?php 
    $x = 0;
    foreach($Applicants as $row){
      $x++;
  ?>
  <tr>
    <td class="tg-0lax"><?= strtoupper($row['ous_desc'])?></td>
    <td class="tg-0lax"><?= strtoupper($row['pos_desc'])?></td>
    <td class="tg-0lax"><?= $x?></td>
    <td class="tg-0lax"><?= strtoupper($row['app_lastname'].', '. $row['app_firstname'].' '.$row['app_middlename'])?></td>
    <td class="tg-0lax"><?= strtoupper($row['eval_result'])?></td>
  </tr>
  <?php } ?>
</tbody>
</table>
</center>