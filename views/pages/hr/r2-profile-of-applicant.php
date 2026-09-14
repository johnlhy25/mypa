<html>

<center>
<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
  overflow:hidden;padding:10px 5px;word-break:normal;}
.tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
  font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
.tg .tg-9d8n{border-color:inherit;font-size:22px;text-align:center;vertical-align:top}
.tg .tg-fymr{border-color:inherit;font-weight:bold;text-align:left;vertical-align:top}
.tg .tg-0pky{border-color:inherit;text-align:left;vertical-align:top}
</style>
<body onload="htmlTableToExcel1('xlsx')">
<table id="profile_of_applicants" class="tg">
<thead>
  <tr>
    <th class="tg-9d8n" colspan="41"><span style="font-weight:bold">Profile of Applicants</span></th>
  </tr>
</thead>
<tbody>
  <tr>
    <td class="tg-fymr">No. </td>
    <td class="tg-fymr">LAST NAME</td>
    <td class="tg-fymr">FIRST NAME</td>
    <td class="tg-fymr">MI</td>
    <td class="tg-fymr">GENDER</td>
    <td class="tg-fymr">Date of Birth</td>
    <td class="tg-fymr"><span style="font-weight:bold;font-style:normal;color:#F00">AGE </span></td>
    <td class="tg-fymr">POSITION APPLIED</td>
    <td class="tg-fymr">SG</td>
    <td class="tg-fymr">LOCATION OF VACANT POSITION</td>
    <td class="tg-fymr">PRESENT POSITION</td>
    <td class="tg-fymr">SG</td>
    <td class="tg-fymr">PRESENT OFFICE/ REGION</td>
    <td class="tg-fymr">ELIGIBILITY</td>
    <td class="tg-fymr">EDUCATION (College Degree and Post Graduate)</td>
    <td class="tg-fymr"><span style="font-weight:bold">EXPERIENCE (indicate exp. and in yr/mo ex. trainer 3 yrs &amp; 7 mos)</span></td>
    <td class="tg-fymr">POSITION OF RELEVANT EXPERIENCE </td>
    <td class="tg-fymr"><span style="font-weight:bold">TRAINING (include TM if any) -Total # of Relevant Training Hours</span></td>
    <td class="tg-fymr">TITLE OF RELEVANT TRAININGS</td>
    <td class="tg-fymr">NC II (specify qualification)</td>
    <td class="tg-fymr">NTTC (specify qualification)</td>
    <td class="tg-fymr">LATEST PERFORMANCE RATING</td>
    <td class="tg-fymr">RATING PERIOD (Last 2 Rating Periods)</td>
    <td class="tg-fymr">LENGTH OF SERVICE IN TESDA</td>
    <td class="tg-fymr">DATE OF LAST PROMOTION</td>
    <td class="tg-fymr">EMAIL ADDRESS </td>
    <td class="tg-fymr">CONTACT NUMBER</td>
    <td class="tg-fymr">HOME ADDRESS</td>
    <td class="tg-fymr">REMARKS 1</td>
    <td class="tg-fymr">REMARKS 2</td>
    <td class="tg-fymr">DATE OF APPLICATION</td>
    <td class="tg-fymr">DATE ASSESSED</td>
    <td class="tg-fymr">DATE NOTIFIED <br> (CBWE/ ANNEX L1)</td>
    <td class="tg-fymr">DATE OF EXAMINATION</td>
    <td class="tg-fymr">ATTENDANCE (Y/N)</td>
    <td class="tg-fymr">DATE OF NOTIFIED FOR INTERVIEW</td>
    <td class="tg-fymr">DATE OF INTERVIEW</td>
    <td class="tg-fymr">ATTENDANCE (Y/N)</td>
  </tr>
  
  <tr>
    <?php
      $x = 0;
      foreach($Applicants as $row){
        $x++;
    ?>
    <td class="tg-0pky"><?= $x; ?></td>
    <td contentEditable="true" class="tg-0pky"><?= strtoupper($row['app_lastname']) ?></td>
    <td contentEditable="true" class="tg-0pky"><?= strtoupper($row['app_firstname']) ?></td>
    <td contentEditable="true" class="tg-0pky"><?= strtoupper($row['app_middlename'][0])?></td>
    <td contentEditable="true" class="tg-0pky"><?= strtoupper($row['app_gender']) ?></td>
    <td contentEditable="true" class="tg-0pky"><?= date("m/d/Y", strtotime($row['app_birthdate'])) ?></td>
    <td class="tg-0pky"><?= strtoupper($row['app_age']) ?></td>
    <td class="tg-0pky"><?= strtoupper($row['pos_desc']) ?></td>
    <td class="tg-0pky"><?= strtoupper($row['pos_sg']) ?></td>
    <td class="tg-0pky"><?= strtoupper($row['ous_desc']) ?></td>
    <td class="tg-0pky"><?= strtoupper($row['app_present_position']) ?></td>
    <td class="tg-0pky"></td>
    <td class="tg-0pky"><?= strtoupper($row['app_present_office']) ?></td>
    <td class="tg-0pky"><?= strtoupper($row['app_eligibility']);?></td>
    <td class="tg-0pky"><?= strtoupper($row['app_course']) ?></td>
    <td class="tg-0pky"><?= strtoupper($row['app_years']) ?> YEARS(S)</td>
    <td class="tg-0pky"><?= strtoupper($row['app_relevant_experience']) ?></td>
    <td class="tg-0pky"><?= strtoupper($row['app_training_hours']) ?> HOUR(S)</td>
    <td class="tg-0pky"><?= strtoupper($row['app_training']) ?></td>
    <td class="tg-0pky"><?= strtoupper($row['app_nc']) ?></td>
    <td class="tg-0pky"><?= strtoupper($row['app_nttc']) ?></td>
    <td class="tg-0pky"></td>
    <td class="tg-0pky"></td>
    <td class="tg-0pky"><?= strtoupper($row['app_tesda_years']) ?> year(s)</td>
    <td class="tg-0pky"><?= date("m/d/Y", strtotime($row['app_date_tesda'])) ?></td>
    <td class="tg-0pky"><?= $row['app_email'] ?></td>
    <td class="tg-0pky"><?= strtoupper($row['app_contacts']) ?></td>
    <td class="tg-0pky"><?= strtoupper($row['app_address']) ?></td>
    <td class="tg-0pky">
      <?= strtoupper($row['eval_remarks'].';'.$row['eval_remarks1']) ?>
    </td>
    <td class="tg-0pky"><?= strtoupper($row['eval_result']) ?></td>
    <td class="tg-0pky">
      <?php
        if ($row['app_timestamp'] == null || $row['app_timestamp'] == ' ') {
        }else{
          echo date("m/d/Y h:i A", strtotime($row['app_timestamp']));
        } 
      ?>
    </td>
    <td class="tg-0pky">
      <?php
        if ($row['eval_timestamp'] == null || $row['eval_timestamp'] == ' ') {
        }else{
          echo date("m/d/Y h:i A", strtotime($row['eval_timestamp']));
        } 
       ?>
      </td>
    <td class="tg-0pky">
      <?php
        if ($row['vac_evaluation_of_document'] == null || $row['vac_evaluation_of_document'] == ' ' || $row['vac_evaluation_of_document'] == '0000-00-00') {
        }else{
          echo date("m/d/Y", strtotime($row['vac_evaluation_of_document']));
        } 
      ?>
    </td>
    <td class="tg-0pky">
      <?php
        if ($row['vac_cbwe'] == null || $row['vac_cbwe'] == ' ' || $row['vac_cbwe'] == '0000-00-00') {
        }else{
          echo date("m/d/Y h:i A", strtotime($row['vac_cbwe']));
        } 
      ?>
    </td>
    <td class="tg-0pky"></td>
    <td class="tg-0pky">
      <?php
        if ($row['vac_initial_deliberation'] == null || $row['vac_initial_deliberation'] == ' ' || $row['vac_initial_deliberation'] == '0000-00-00') {
        }else{
          echo date("m/d/Y", strtotime($row['vac_initial_deliberation']));
        } 
      ?>
    </td>
    <td class="tg-0pky">
      <?php
        if ($row['vac_bei'] == null || $row['vac_bei'] == ' ' || $row['vac_bei'] == '0000-00-00') {
        }else{
          echo date("m/d/Y h:i A", strtotime($row['vac_bei']));
        } 
      ?>
    </td>
    <td class="tg-0pky"></td>
  </tr>
  <?php
    }
  ?>
</tbody>
</table>
</center>
<!--Table to Excel-->
<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
<script>
    function htmlTableToExcel1(type, fn, dl) {
        var elt = document.getElementById('profile_of_applicants');
        var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
        var ws = wb.Sheets["sheet1"];

        // Iterate over each cell in the worksheet
        var range = XLSX.utils.decode_range(ws['!ref']);
        for (var row = range.s.r; row <= range.e.r; row++) {
            for (var col = range.s.c; col <= range.e.c; col++) {
                var cell_ref = XLSX.utils.encode_cell({ r: row, c: col });
                if (ws[cell_ref]) {
                    var cell_value = ws[cell_ref].v;

                    // Check if the value resembles a date and force it as text
                    if (typeof cell_value === 'string' && cell_value.match(/^\d{1,2}\/\d{1,2}$/)) {
                        ws[cell_ref].v = "'" + cell_value; // Prepend a single quote to preserve it as text in Excel
                        ws[cell_ref].t = 's';  // Set the cell type to text
                    }
                }
            }
        }

        // Export the modified workbook
        return dl ?
            XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }) :
            XLSX.writeFile(wb, fn || ('Profile of Applicants ' + '<?= date("m-d-Y") ?>.' + (type || 'xlsx')));
    }
</script>
<!--Table to Excel-->






</body>
</html>