<html>
<head>
    <title>Profile of Applicants</title>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="TESDA Region II (Cagayan Valley).">
    <meta name="author" content="TESDA Region II (Cagayan Valley)">
    <meta name="keywords" content="TTESDA Region II (Cagayan Valley)">

    <link rel="shortcut icon" href="<?= base_url();?>assets/img/Logo.png">
    <style type="text/css">
        .tg {
            border-collapse:collapse;
            border-spacing:0;
        }
        .tg td {
            border-color:black;
            border-style:solid;
            border-width:1px;
            font-family:Arial, sans-serif;
            font-size:14px;
            overflow:hidden;
            padding:10px 5px;
            word-break:normal;
        }
        .tg th {
            border-color:black;
            border-style:solid;
            border-width:1px;
            font-family:Arial, sans-serif;
            font-size:14px;
            font-weight:normal;
            overflow:hidden;
            padding:10px 5px;
            word-break:normal;
        }
        .tg .tg-wa1i {
            font-weight:bold;
            text-align:center;
            vertical-align:middle;
        }
        .tg .tg-amwm {
            font-weight:bold;
            text-align:center;
            vertical-align:top;
        }
        .tg .tg-2g1l {
            background-color:#FFF;
            font-weight:bold;
            text-align:center;
            vertical-align:middle;
        }
        .tg .tg-nrix {
            text-align:center;
            vertical-align:middle;
        }
        .tg .tg-f4yw {
            background-color:#FFF;
            text-align:center;
            vertical-align:middle;
        }
    </style>
</head>
<body onload="htmlTableToExcel1('xlsx')">
<table id="profile_of_applicants" class="tg">
    <thead>
      <tr>
        <th class="tg-wa1i" rowspan="2">NO</th>
        <th class="tg-wa1i" rowspan="2"> NAME</th>
        <th class="tg-wa1i" rowspan="2">AGE</th>
        <th class="tg-wa1i" rowspan="2">SEX</th>
        <th class="tg-wa1i" colspan="2">Are you a person with disability?</th>
        <th class="tg-wa1i" colspan="2">Are you a member of any indigenous group? </th>
        <th class="tg-wa1i" colspan="2">Are you a solo parent?</th>
        <th class="tg-wa1i" rowspan="2">PRESENT POSITION</th>
        <th class="tg-wa1i" rowspan="2">SG</th>
        <th class="tg-wa1i" rowspan="2">PRESENT OFFICE/REGION</th>
        <th class="tg-wa1i" colspan="2" rowspan="2">RELEVANT EXPERIENCE</th>
        <th class="tg-wa1i" colspan="2" rowspan="2">RELEVANT TRAINING</th>
        <th class="tg-wa1i" rowspan="2">HIGHEST EDUCATIONAL ATTAINMENT</th>
        <th class="tg-wa1i" rowspan="2">ELIGIBILITY</th>
        <th class="tg-2g1l" rowspan="2">ADDRESS </th>
        <th class="tg-wa1i" rowspan="2">CONTACT NUMBER NO./EMAIL ADDRESS</th>
        <th class="tg-wa1i" rowspan="2">IPCR RATING</th>
        <th class="tg-wa1i" rowspan="2">INSIDER OR OUTSIDER</th>
        <th class="tg-wa1i" rowspan="2">LENGTH OF SERVICE IN TESDA</th>
        <th class="tg-wa1i" rowspan="2">REMARKS</th>
        <th class="tg-wa1i" colspan="5">Where did you find this vacancy?</th>
        <th class="tg-wa1i"> </th>
      </tr>
      <tr>
        <th class="tg-wa1i">YES</th>
        <th class="tg-wa1i">NO</th>
        <th class="tg-wa1i">YES</th>
        <th class="tg-wa1i">NO</th>
        <th class="tg-wa1i">YES</th>
        <th class="tg-wa1i">NO</th>
        <th class="tg-wa1i">TESDA Website</th>
        <th class="tg-wa1i">CSC Website </th>
        <th class="tg-wa1i">Referrals</th>
        <th class="tg-wa1i">Facebook</th>
        <th class="tg-wa1i">Other Online Recruitment Platforms</th>
        <th class="tg-amwm">Others (pls. indicate) eg. Jobs Fair, Leaflets, Postings, etc</th>
        </tr>
    </thead>

    <tbody>
      <!--Start of For Loop-->
      <?php
        $x = 0;
        foreach($Applicants as $row){
          $x++;
      ?>
        <tr>
          <td class="tg-nrix"><?= $x; ?></td>
          <td class="tg-nrix"><?= strtoupper($row['app_lastname']) ?>,  <?= strtoupper($row['app_firstname']) ?> <?= strtoupper($row['app_middlename'][0])?></td>
          <td class="tg-nrix"><?= strtoupper($row['app_age']) ?> </td>
          <td class="tg-nrix"><?= strtoupper($row['app_gender']) ?> </td>
          <!--Are you a person with disability?-->
          <td class="tg-2g1l">
              <?php           
                $checked = (strpos($row['app_ra8972'], ';Yes;') !== false) ? 'checked' : '';
                $remaining_text = str_replace(';Yes;', '', $row['app_ra8972']); // Remove ';Yes;' and get the remaining text
              ?>
              <?php if ($checked == 'checked'): ?>
                  <span class="checkbox">&#x2611;</span> <!-- Checked state -->
                  <span class="remaining-text"><?php echo $remaining_text; ?></span> <!-- Remaining text -->
              <?php else: ?>
                  <span class="checkbox">&#x2610;</span> <!-- Unchecked state -->
              <?php endif; ?>
             
          </td>
          <td class="tg-2g1l">
              <?php           
                $checked = (strpos($row['app_ra7277'], ';Yes;') !== false) ? 'checked' : '';
              ?>
              <?php if ($checked == 'checked'): ?>
                  <span class="checkbox">&#x2610;</span> <!-- Unchecked state -->
              <?php else: ?>
                  <span class="checkbox">&#x2611;</span> <!-- Checked state -->
              <?php endif; ?>
          </td>
          <!--Are you a person with disability?-->
          
          <!--Are you a member of any indigenous group? -->
          <td class="tg-2g1l">
              <?php           
                $checked = (strpos($row['app_ra8371'], ';Yes;') !== false) ? 'checked' : '';
                $remaining_text = str_replace(';Yes;', '', $row['app_ra8371']); // Remove ';Yes;' and get the remaining text
              ?>
              <?php if ($checked == 'checked'): ?>
                  <span class="checkbox">&#x2611;</span> <!-- Checked state -->
                  <span class="remaining-text"><?php echo $remaining_text; ?></span> <!-- Remaining text -->
              <?php else: ?>
                  <span class="checkbox">&#x2610;</span> <!-- Unchecked state -->
              <?php endif; ?>
          </td>
          <td class="tg-2g1l">
              <?php           
                $checked = (strpos($row['app_ra8371'], ';Yes;') !== false) ? 'checked' : '';
              ?>
              <?php if ($checked == 'checked'): ?>
                  <span class="checkbox">&#x2610;</span> <!-- Unchecked state -->
              <?php else: ?>
                  <span class="checkbox">&#x2611;</span> <!-- Checked state -->
              <?php endif; ?>
          </td>
          <!--Are you a member of any indigenous group? -->

          <!--Are you a solo parent? -->
          <td class="tg-2g1l">
              <?php           
                $checked = (strpos($row['app_ra8972'], ';Yes;') !== false) ? 'checked' : '';
                $remaining_text = str_replace(';Yes;', '', $row['app_ra8371']); // Remove ';Yes;' and get the remaining text
              ?>
              <?php if ($checked == 'checked'): ?>
                  <span class="checkbox">&#x2611;</span> <!-- Checked state -->
                  <span class="remaining-text"><?php echo $remaining_text; ?></span> <!-- Remaining text -->
              <?php else: ?>
                  <span class="checkbox">&#x2610;</span> <!-- Unchecked state -->
              <?php endif; ?>
          </td>
          <td class="tg-2g1l">
              <?php           
                $checked = (strpos($row['app_ra8972'], ';Yes;') !== false) ? 'checked' : '';
              ?>
              <?php if ($checked == 'checked'): ?>
                  <span class="checkbox">&#x2610;</span> <!-- Unchecked state -->
              <?php else: ?>
                  <span class="checkbox">&#x2611;</span> <!-- Checked state -->
              <?php endif; ?>
          </td>
          <!--Are you a solo parent? -->

          <td class="tg-nrix"> <?= strtoupper($row['app_present_position']); ?> </td>
          <td class="tg-nrix"> <?= strtoupper($row['pos_sg']); ?> </td>
          <td class="tg-nrix"> <?= strtoupper($row['app_present_office']); ?></td>
          <td class="tg-nrix"> 
          <?php
              // Split by ";" and process each part
              $experienceYears = explode(';', $row['app_relevant_years']); // Split by ";"
              $total = 0;

              foreach ($experienceYears as $year) {
                  $total += (int)$year; // Convert each value to an integer and add to the total
              }

              // Output the total
              echo $total.' YEAR(S)';
            ?>
          </td>
          <td class="tg-f4yw">
            <?php
              // Convert to uppercase and split by ";"
              $experiences = explode(';', strtoupper($row['app_relevant_experience']));

              // Display each experience on a new line
              foreach ($experiences as $experience) {
                  echo htmlspecialchars($experience) . "<br>";
              }
            ?>
          </td>
          <td class="tg-nrix"> 
            <?php
              // Split by ";" and process each part
              $trainingHours = explode(';', $row['app_training_hours']); // Split by ";"
              $total = 0;

              foreach ($trainingHours as $hour) {
                  $total += (int)$hour; // Convert each value to an integer and add to the total
              }

              // Output the total
              echo $total.' HOUR(S)';
            ?>
          </td>
          <td class="tg-f4yw"> 
            <?php
              // Convert to uppercase and split by ";"
              $trainings = explode(';', strtoupper($row['app_training']));

              // Display each experience on a new line
              foreach ($trainings as $training) {
                  echo htmlspecialchars($training) . "<br>";
              }
            ?>
          </td>
          <td class="tg-f4yw"> <?= strtoupper($row['app_course']); ?></td>
          <td class="tg-nrix"> 
            <?php
              // Your original string (converted to uppercase)
              $eligibilityString = strtoupper($row['app_eligibility']);

              // Split the string by the semicolon delimiter
              $eligibilityCodes = explode(";", $eligibilityString);

              // Define a mapping for each eligibility code to its description
              $eligibilityDescriptions = [
                  'CESE' => 'CAREER EXECUTIVE SERVICE ELIGIBILITY',
                  'CSP' => 'CAREER SERVICE PROFESSIONAL',
                  'CSSP' => 'CAREER SERVICE SUB PROFESSIONAL',
                  'RA1080' => 'R.A. 1080',
                  'PD907' => 'PD 907',
                  'MC11' => 'MC 11 series of 1996'
              ];

              // Loop through the codes and display the corresponding descriptions
              foreach ($eligibilityCodes as $code) {
                  if (isset($eligibilityDescriptions[$code])) {
                      echo $eligibilityDescriptions[$code] . "<br>";
                  } else {
                      // If the code is not found in the array, display the code as it is
                      echo $code . "<br>";
                  }
              }
            ?>
          </td>
          <td class="tg-nrix"> <?= strtoupper($row['app_address']); ?></td>
          <td class="tg-nrix"> <?= strtoupper($row['app_contacts']); ?>/ <?= strtoupper($row['app_email']); ?></td>
          <td class="tg-f4yw"> <?= strtoupper($row['app_ipcr_rating']) ?></td>
          <td class="tg-nrix"> <?php if($row['app_tesda_years']>=1 ){ echo 'YES';}else { echo 'NO';} ?></td>
          <td class="tg-nrix"> <?= strtoupper($row['app_tesda_years']) ?> YEAR(S)</td>
          <td class="tg-nrix"> <?= strtoupper($row['eval_result']) ?>: <br>

        

            <?php
              // Convert to uppercase and split by ";"
              $eval_remarks = explode(';', strtoupper($row['eval_remarks']));

              // Display each experience on a new line
              echo 'Remarks for Qualification Standard: <br>';
              foreach ($eval_remarks as $row1) {
                  echo htmlspecialchars($row1) . "<br>";
              }
            echo '<br>';
            ?>

            <?php
              // Convert to uppercase and split by ";"
              $eval_remarks1 = explode(';', strtoupper($row['eval_remarks1']));

              // Display each experience on a new line
              echo 'Remarks for Documentary Requirements: <br>';
              foreach ($eval_remarks1 as $row1) {
                  echo htmlspecialchars($row1) . "<br>";
              }
            ?>
            
            <?php
                if ($row['app_timestamp'] == null || $row['app_timestamp'] == ' ') {
                }else{
                echo '<br><strong>Date uploaded:'.date("m/d/Y", strtotime($row['app_timestamp'])).'</strong>';
                } 
            ?>

            <?php
                if ($row['eval_timestamp'] == null || $row['eval_timestamp'] == ' ') {
                }else{
                echo '<br><strong>Date evaluated:'.date("m/d/Y", strtotime($row['eval_timestamp'])).'</strong>';
                } 
            ?>

          </td>

          <?php $app_reference_posting = json_decode($row['app_reference_posting'], true); ?>
          <td class="tg-2g1l">
              <span class="checkbox">
                  <?php echo in_array('TESDA Website', $app_reference_posting) ? '&#x2611;' : '&#x2610;'; ?>
              </span>
          </td>
          <td class="tg-2g1l">
              <span class="checkbox">
                  <?php echo in_array('CSC Website', $app_reference_posting) ? '&#x2611;' : '&#x2610;'; ?>
              </span>
          </td>
          <td class="tg-2g1l">
              <span class="checkbox">
                  <?php echo in_array('Referrals', $app_reference_posting) ? '&#x2611;' : '&#x2610;'; ?>
              </span>
          </td>
          <td class="tg-2g1l">
              <span class="checkbox">
                  <?php echo in_array('Facebook', $app_reference_posting) ? '&#x2611;' : '&#x2610;'; ?>
              </span>
          </td>
          <td class="tg-2g1l">
              <span class="checkbox">
                  <?php echo in_array('Other Recruitment Platform', $app_reference_posting) ? '&#x2611;' : '&#x2610;'; ?>
              </span>
          </td>

      
          <td class="tg-2g1l"> </td>

        </tr>
      <?php } ?> <!--End of For Loop-->
    </tbody>
</table>

<!--Table to Excel-->
<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
<script>
    function htmlTableToExcel1(type, fn, dl) {
       var elt = document.getElementById('profile_of_applicants');
       var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
       return dl ?
         XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
         XLSX.writeFile(wb, fn || ('Profile of Applicants <?= date('m-d-Y')?>.' + (type || 'xlsx')));
    }
</script>
<!--Table to Excel-->



</body>
</html>

