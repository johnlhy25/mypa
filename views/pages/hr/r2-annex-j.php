<center>
<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
  overflow:hidden;padding:10px 5px;word-break:normal;}
.tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
  font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
.tg .tg-c3ow{border-color:inherit;text-align:center;vertical-align:top}
.tg .tg-0pky{border-color:inherit;text-align:left;vertical-align:top}
</style>
<table class="tg">
<thead>
  <tr>
    <th class="tg-0pky" colspan="5"></th>
    <th class="tg-0pky"><span style="font-weight:bold">R2 Annex J</span></th>
  </tr>
</thead>

<tbody>
  <tr>
    <td class="tg-c3ow" colspan="6">TECHICAL EDUCATION AND SKILLS DEVELOPMENT AUTHORITY<br><br>Region 02<br><span style="font-weight:bold">Professional Development Achievement Assessment Criteria</span></td>
  </tr>
  <tr>
    <td class="tg-0pky" colspan="2"><span style="font-weight:bold">NAME:</span></td>
    <td class="tg-0pky" colspan="4"><?= strtoupper($Annex['app_lastname'].', '. $Annex['app_firstname'].' '.$Annex['app_middlename'])?></td>
  </tr>
  <tr>
    <td class="tg-0pky" colspan="2"><span style="font-weight:bold">AGE:</span></td>
    <td class="tg-0pky" colspan="4"><?= strtoupper($Annex['app_age'])?></td>
  </tr>
  <tr>
    <td class="tg-0pky" colspan="2"><span style="font-weight:bold">SEX:</span></td>
    <td class="tg-0pky" colspan="4"><?= strtoupper($Annex['app_gender'])?></td>
  </tr>
  <tr>
    <td class="tg-0pky" colspan="2"><span style="font-weight:bold">PRESENT OFFICE:</span></td>
    <td class="tg-0pky" colspan="4"><?= strtoupper($Annex['app_present_office'])?></td>
  </tr>
  <tr>
    <td class="tg-0pky" colspan="2"><span style="font-weight:bold">PRESENT POSITION:</span></td>
    <td class="tg-0pky" colspan="4"><?= strtoupper($Annex['app_present_position'])?></td>
  </tr>
  <tr>
    <td class="tg-0pky" colspan="2"><span style="font-weight:bold">OFFICE WHERE THE VACANCY:</span></td>
    <td class="tg-0pky" colspan="4"><?= strtoupper($Annex['ous_desc'])?></td>
  </tr>
  <tr>
    <td class="tg-0pky" colspan="2"><span style="font-weight:bold">VACANT POSITION:</span></td>
    <td class="tg-0pky"><?= strtoupper($Annex['pos_desc'])?></td>
    <td class="tg-0pky"></td>
    <td class="tg-0pky"><span style="font-weight:bold">SG:</span></td>
    <td class="tg-0pky"><span style="font-weight:normal"><?= strtoupper($Annex['pos_sg'])?></span></td>
  </tr>
  <tr>
    <td class="tg-c3ow" colspan="3"><span style="font-weight:bold">QUALIFICATION STANDARDS </span></td>
    <td class="tg-0pky"><span style="font-weight:bold">Does the candidate/</span><br><span style="font-weight:bold">applicant meet the</span><br><span style="font-weight:bold">minimum requirements?</span></td>
    <td class="tg-0pky" colspan="2"><span style="font-weight:bold">Applicants Qualification</span></td>
  </tr>
  <tr>
    <td class="tg-0pky" colspan="2"><span style="font-weight:normal">ELIGIBILITY</span></td>
    <td class="tg-0pky"><span style="font-weight:normal"><?= strtoupper($Annex['pos_eligibility'])?></span></td>
    <td class="tg-0pky"><span style="font-weight:normal"><?= strtoupper($Annex['eval_eligibility'])?></span></td>
    <td class="tg-0pky" colspan="2"><?= strtoupper($Annex['app_eligibility'])?></td>
  </tr>
  <tr>
    <td class="tg-0pky" colspan="2"><span style="font-weight:normal">EDUCATION</span></td>
    <td class="tg-0pky"><span style="font-weight:normal"><?= strtoupper($Annex['pos_education'])?></span></td>
    <td class="tg-0pky"><span style="font-weight:normal"><?= strtoupper($Annex['eval_education'])?></span></td>
    <td class="tg-0pky" colspan="2"><?= strtoupper($Annex['app_course'])?></td>
  </tr>
  <tr>
    <td class="tg-0pky" colspan="2"><span style="font-weight:normal">EXPERIENCE</span></td>
    <td class="tg-0pky"><span style="font-weight:normal"><?= strtoupper($Annex['pos_experience'])?></span></td>
    <td class="tg-0pky"><span style="font-weight:normal"><?= strtoupper($Annex['eval_experience'])?></span></td>
    <td class="tg-0pky" colspan="2"><?= strtoupper($Annex['app_relevant_years'])?> year(s)</td>
  </tr>
  <tr>
    <td class="tg-0pky" colspan="2"><span style="font-weight:normal">TRAINING</span></td>
    <td class="tg-0pky"><span style="font-weight:normal"><?= strtoupper($Annex['pos_training'])?></span></td>
    <td class="tg-0pky"><span style="font-weight:normal"><?= strtoupper($Annex['eval_training'])?></span></td>
    <td class="tg-0pky" colspan="2"><?= strtoupper($Annex['app_training_hours'])?> hour(s)</td>
  </tr>
  <tr>
    <td class="tg-0pky" colspan="2"><span style="font-weight:normal">PERFORMANCE</span></td>
    <td class="tg-0pky"><span style="font-weight:normal"></span></td>
    <td class="tg-0pky"></td>
    <td class="tg-0pky" colspan="2"></td>
  </tr>
  <tr>
    <td class="tg-0pky"><span style="font-weight:bold">RESULT:</span></td>
    <td class="tg-0pky" colspan="5"><b><?= strtoupper($Annex['eval_result'])?></b></td>
  </tr>
  <tr>
    <td class="tg-0pky" colspan="6"></td>
  </tr>
  <tr>
    <td class="tg-0pky" colspan="2"><span style="font-weight:bold">CREDENTIALS</span></td>
    <td class="tg-0pky"><span style="font-weight:bold">EVIDENCE </span></td>
    <td class="tg-0pky"><span style="font-weight:bold">PERCENTAGE/ Weights</span></td>
    <td class="tg-0pky"><span style="font-weight:bold">POINTS EARNED</span></td>
    <td class="tg-0pky"><span style="font-weight:bold">REMARKS</span></td>
  </tr>
  <tr>
    <td class="tg-0pky" colspan="2" rowspan="4">Award Related to Performance</td>
    <td class="tg-0pky">International (Plaques/Certificates)</td>
    <td class="tg-0pky">10</td>
    <td class="tg-0pky"><?= strtoupper($Annex['eval_arp_international'])?></td>
    <td class="tg-0pky"></td>
  </tr>
  <tr>
    <td class="tg-0pky">National (Plaques/Certificates)</td>
    <td class="tg-0pky">7.5</td>
    <td class="tg-0pky"><?= strtoupper($Annex['eval_arp_national'])?></td>
    <td class="tg-0pky"></td>
  </tr>
  <tr>
    <td class="tg-0pky">Regional (Plaques/Certificates)</td>
    <td class="tg-0pky">5</td>
    <td class="tg-0pky"><?= strtoupper($Annex['eval_arp_regional'])?></td>
    <td class="tg-0pky"></td>
  </tr>
  <tr>
    <td class="tg-0pky">Provincial/Institution (Plaques/Certificates)</td>
    <td class="tg-0pky">2.5</td>
    <td class="tg-0pky"><?= strtoupper($Annex['eval_arp_provincial'])?></td>
    <td class="tg-0pky"></td>
  </tr>
  <tr>
    <td class="tg-0pky" colspan="2" rowspan="4">Expert Services (Resource Person/<br>Speaker/<br>Moderator/Panelist)</td>
    <td class="tg-0pky">International (Plaques/Certificates)</td>
    <td class="tg-0pky">2.5</td>
    <td class="tg-0pky"><?= strtoupper($Annex['eval_es_international'])?></td>
    <td class="tg-0pky"></td>
  </tr>
  <tr>
    <td class="tg-0pky">National (Plaques/Certificates)</td>
    <td class="tg-0pky">1.875</td>
    <td class="tg-0pky"><?= strtoupper($Annex['eval_es_national'])?></td>
    <td class="tg-0pky"></td>
  </tr>
  <tr>
    <td class="tg-0pky">Regional (Plaques/Certificates)</td>
    <td class="tg-0pky">1.25</td>
    <td class="tg-0pky"><?= strtoupper($Annex['eval_es_regional'])?></td>
    <td class="tg-0pky"></td>
  </tr>
  <tr>
    <td class="tg-0pky">Provincial/Institution (Plaques/Certificates)</td>
    <td class="tg-0pky">0.625</td>
    <td class="tg-0pky"><?= strtoupper($Annex['eval_es_provincial'])?></td>
    <td class="tg-0pky"></td>
  </tr>
  <tr>
    <td class="tg-0pky" colspan="2" rowspan="4">Committees/TWGs Participation</td>
    <td class="tg-0pky">Chair/Co-Chair (TESDA/Office Orders, Memorandum)</td>
    <td class="tg-0pky">2.5</td>
    <td class="tg-0pky"><?= strtoupper($Annex['eval_cmt_chair'])?></td>
    <td class="tg-0pky"></td>
  </tr>
  <tr>
    <td class="tg-0pky">Vice Chair (TESDA/Office Orders, Memorandum)</td>
    <td class="tg-0pky">1.875</td>
    <td class="tg-0pky"><?= strtoupper($Annex['eval_cmt_vcchair'])?></td>
    <td class="tg-0pky"></td>
  </tr>
  <tr>
    <td class="tg-0pky">Member (TESDA/Office Orders, Memorandum)</td>
    <td class="tg-0pky">1.25</td>
    <td class="tg-0pky"><?= strtoupper($Annex['eval_cmt_member'])?></td>
    <td class="tg-0pky"></td>
  </tr>
  <tr>
    <td class="tg-0pky">Secretariat (TESDA/Office Orders, Memorandum)</td>
    <td class="tg-0pky">0.625</td>
    <td class="tg-0pky"><?= strtoupper($Annex['eval_cmt_secretariat'])?></td>
    <td class="tg-0pky"></td>
  </tr>
  <tr>
    <td class="tg-0pky" colspan="3"><span style="font-weight:bold">TOTAL SCORE</span></td>
    <td class="tg-0pky"></td>
    <td class="tg-0pky"><?= strtoupper($Annex['eval_total'])?></td>
    <td class="tg-0pky"></td>
  </tr>
  <tr>
    <td class="tg-0pky" colspan="6"><span style="font-weight:bold">REMARKS:</span>
    <br><?= strtoupper($Annex['eval_remarks'])?><br><?= strtoupper($Annex['eval_remarks1'])?>
  </td>
  </tr>
  <tr>
    <td class="tg-0pky">ASSESSED BY:</td>
    <td class="tg-0pky" colspan="2"><b><?= $this->session->name; ?></b></td>
    <td class="tg-0pky">RESULT:</td>
    <td class="tg-0pky" colspan="2"><b><?= strtoupper($Annex['eval_result'])?></b></td>
  </tr>
</tbody>
</table>
</center>