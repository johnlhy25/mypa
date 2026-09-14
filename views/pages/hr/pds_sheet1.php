<?= form_open('update_user_info_pds_sheet1')?>

    <!--First Row-->
    <div class="row no-padding-bottom"> 
      <!--Surname-->                   
      <div class="col-md-3">
        <div class="form-group">
          <label class="form-control-label">2. Surname</label>
          <input type="text" name="pi_surname" class="form-control" placeholder="Santiago" value="<?= $pi_surname ?>" required>
        </div>
      </div> 
      
      <!--First Name--> 
      <div class="col-md-3">
        <div class="form-group">
          <label class="form-control-label">First Name</label>
          <input type="text" name="pi_firstname" class="form-control" placeholder="John Lee" value="<?= $pi_firstname ?>" required>
        </div>
      </div> 
      
      <!--Middle Name--> 
      <div class="col-md-3">
        <div class="form-group">
          <label class="form-control-label">Middle Name</label>
          <input type="text" name="pi_middlename" class="form-control" placeholder="Patino" value="<?= $pi_middlename ?>" required>
        </div>
      </div>

      <!--Ext Name--> 
      <div class="col-md-3">
        <div class="form-group">
          <label class="form-control-label">Extension Name</label>
          <input type="text" name="pi_extname" class="form-control" value="<?= $pi_extname ?>" placeholder="Jr., Sr.">
        </div>
      </div>

    </div><!--First Row-->
    
    <!--Second Row-->
    <div class="row no-padding-top no-padding-bottom"> 
      <!--Date of Birth-->                   
      <div class="col-md-3">
        <div class="form-group">
          <label class="form-control-label">3. Date of Birth</label>
          <?php if($dob == null){?>
          <input type="date" class="form-control" name="date_of_birth" required>
          <?php }else {?>
          <input type="date" class="form-control" name="date_of_birth" value="<?= $dob ?>">
          <?php }?>
        </div>
      </div> 
      
      <!--Place of Birth--> 
      <div class="col-md-3">
        <div class="form-group">
          <label class="form-control-label">4. Place of Birth</label>
          <?php if($pob == null){?>
          <input type="text" class="form-control" name="place_of_birth" placeholder="Lasam, Cagayan" required>
          <?php }else {?>
          <input type="text" class="form-control" name="place_of_birth" placeholder="Lasam, Cagayan" value="<?= $pob ?>">
          <?php }?>  
        </div>
      </div> 
      
      <!--Sex--> 
      <div class="col-md-3">
        <div class="form-group">

          <?php if($sex == "Male") {
            $selected_m = "selected";
          }else{
            $selected_m ='';
          }
          ?>
          <?php if($sex == "Female") {
            $selected_fem = "selected";
          }else{
            $selected_fem ='';
          }
          ?>

          <label class="form-control-label">5. Sex</label>
            <select name="sex" class="form-control" required>
            <?php if($sex == null){?>
                <option value="" selected>---</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            <?php }else {?>
                <option value="">---</option>
                <option value="Male" <?= $selected_m ?>>Male</option>
                <option value="Female" <?= $selected_fem ?>>Female</option>
            <?php }?>
            </select>
        </div>
      </div>

      <!--Civil Status--> 
      <div class="col-md-3">
        <div class="form-group">
          
          <?php if($civil_status == "Single") {
            $selected_s = "selected";
          }else{
            $selected_s ='';
          }
          ?>
          <?php if($civil_status == "Married") {
            $selected_ma = "selected";
          }else{
            $selected_ma ='';
          }
          ?>
          <?php if($civil_status == "Widowed") {
            $selected_w = "selected";
          }else{
            $selected_w ='';
          }
          ?>
          <?php if($civil_status == "Separated") {
            $selected_se = "selected";
          }else{
            $selected_se ='';
          }
          ?>
          <label class="form-control-label">6. Civil Status</label>
            <select name="civil_status" class="form-control" required>
            <?php if($civil_status == null){?>
                  <option value="" selected>---</option>
                  <option value="Single" <?= $selected_s ?>>Single</option>
                  <option value="Married" <?= $selected_ma ?>>Married</option>
                  <option value="Widowed" <?= $selected_w ?>>Widowed</option>
                  <option value="Separated" <?= $selected_se ?>>Separated</option>
            <?php }else {?>
                  <option value="">---</option>
                  <option value="Single" <?= $selected_s ?>>Single</option>
                  <option value="Married" <?= $selected_ma ?>>Married</option>
                  <option value="Widowed" <?= $selected_w ?>>Widowed</option>
                  <option value="Separated" <?= $selected_se ?>>Separated</option>
              </select>
            <?php }?>
        </div>
      </div>

    </div><!--Second Row-->

    <!--Third Row-->
    <div class="row no-padding-bottom no-padding-top"> 
      
      <!--Height-->                   
      <div class="col-md-2">
        <div class="form-group">
          <label class="form-control-label">7. Height (m)</label>
          <input type="number" name="pi_height" class="form-control" placeholder="1.55" value="<?= $pi_height ?>" step=".01">
        </div>
      </div> 
      
      <!--Weight--> 
      <div class="col-md-2">
        <div class="form-group">
          <label class="form-control-label">8. Weight (Kg)</label>
          <input type="number" name="pi_weight" class="form-control" placeholder="65" value="<?= $pi_weight ?>" step=".01">
        </div>
      </div> 
      
      <!--Blood Type--> 
      <div class="col-md-2">
        <div class="form-group">
          <label class="form-control-label">9. Blood Type</label>
          <input type="text" name="pi_blood_type" class="form-control" placeholder="O+" value="<?= $pi_blood_type ?>">
        </div>
      </div>

      <!--GSIS ID NO.--> 
      <div class="col-md-3">
        <div class="form-group">
          <label class="form-control-label">10. UMID ID No.</label>
          <input type="text" name="pi_gsis" class="form-control" placeholder="26222402209" value="<?= $pi_gsis ?>">
        </div>
      </div>

      <!--PAG-IBIG No-->                   
      <div class="col-md-3">
        <div class="form-group">
          <label class="form-control-label">11. PAG-IBIG No.</label>
          <input type="text" name="pi_pagibig" class="form-control" placeholder="1234-5678-9101" value="<?= $pi_pagibig ?>">
        </div>
      </div> 

    </div> <!--Third Row-->
    
    <!--Fourth Row-->
    <div class="row no-padding-bottom no-padding-top"> 
        
      <!--PhilHealth--> 
      <div class="col-md-3">
        <div class="form-group">
          <label class="form-control-label">12. PhilHealth No.</label>
          <input type="text" name="pi_philhealth" class="form-control" placeholder="12-345678910-1" value="<?= $pi_philhealth ?>">
        </div>
      </div> 
      
      <!--SSS No--> 
      <div class="col-md-2">
        <div class="form-group">
          <label class="form-control-label">13. PhilSys Number (PSN):</label>
          <input type="text" name="pi_sss" class="form-control" placeholder="12-3456789-0" value="<?= $pi_sss ?>">
        </div>
      </div>

      <!--TIN NO.--> 
      <div class="col-md-3">
        <div class="form-group">
          <label class="form-control-label">14. TIN No.</label>
          <input type="text" name="pi_tin_no" class="form-control" placeholder="123-456-789-000" value="<?= $pi_tin_no ?>">
        </div>
      </div>
        
        <!--Employee No--> 
        <div class="col-md-2">
        <div class="form-group">
          <label class="form-control-label">15. Employee No.</label>
          <input type="text" name="pi_employee_id" class="form-control" placeholder="2022-001" value="<?= $pi_employee_id ?>">
        </div>
      </div>

        <!--Citizenship--> 
        <div class="col-md-2">
        <div class="form-group">
          <label class="form-control-label">16. Citizenship</label>
          <input type="text" placeholder="Filipino" name="citizenship" class="form-control" value="<?= $citizenship ?>">
        </div>
      </div>

    </div> <!--Fourth Row-->

    <!--Fifth Row-->
    <div class="row no-padding-bottom no-padding-top"> 
        
      <!--Residential Address--> 
      <div class="col-md-1">
        <div class="form-group">
          <label class="form-control-label">17.</label>
          <input type="text" name="pi_ra_block_no" class="form-control" placeholder="House/Block/Lot No." value="<?= $pi_ra_block_no ?>">
        </div>
      </div> 
      
      <!--Street--> 
      <div class="col-md-2">
        <div class="form-group">
          <label class="form-control-label">Residential </label>
          <input type="text" name="pi_ra_street" class="form-control" placeholder="Street" value="<?= $pi_ra_street ?>">
        </div>
      </div>

      <!--Subdivision/Village--> 
      <div class="col-md-2">
        <div class="form-group">
          <label class="form-control-label">Address</label>
          <input type="text" name="pi_ra_subdivision" class="form-control" placeholder="Subdivision/Village" value="<?= $pi_ra_subdivision ?>">
        </div>
      </div>
        
        <!--Barangay--> 
        <div class="col-md-2">
        <div class="form-group">
          <label class="form-control-label">-</label>
          <input type="text" name="pi_ra_barangay" class="form-control" placeholder="Barangay" value="<?= $pi_ra_barangay ?>">
        </div>
      </div>

        <!--City/Municipality--> 
        <div class="col-md-2">
        <div class="form-group">
          <label class="form-control-label">-</label>
          <input type="text" placeholder="City/Municipality" name="pi_ra_municipality" class="form-control" value="<?= $pi_ra_municipality ?>">
        </div>
      </div>

      <!--Province--> 
      <div class="col-md-2">
        <div class="form-group">
          <label class="form-control-label">-</label>
          <input type="text" placeholder="Province" name="pi_ra_province" class="form-control" value="<?= $pi_ra_province ?>">
        </div>
      </div>

      <!--Zip Code--> 
      <div class="col-md-1">
        <div class="form-group">
          <label class="form-control-label">-</label>
          <input type="text" name="pi_ra_zip" class="form-control" placeholder="Zip Code" value="<?= $pi_ra_zip ?>">
        </div>
      </div> 

    </div> <!--Fifth Row-->

    <!--Sixth Row-->
    <div class="row no-padding-bottom no-padding-top"> 
        
      <!--Residential Address--> 
      <div class="col-md-1">
        <div class="form-group">
          <label class="form-control-label">18.</label>
          <input type="text" name="pi_pa_block_no" class="form-control" placeholder="House/Block/Lot No." value="<?= $pi_pa_block_no ?>">
        </div>
      </div> 
      
      <!--Street--> 
      <div class="col-md-2">
        <div class="form-group">
          <label class="form-control-label">Permanent </label>
          <input type="text" name="pi_pa_street" class="form-control" placeholder="Street" value="<?= $pi_pa_street ?>">
        </div>
      </div>

      <!--Subdivision/Village--> 
      <div class="col-md-2">
        <div class="form-group">
          <label class="form-control-label">Address</label>
          <input type="text" name="pi_pa_subdivision" class="form-control" placeholder="Subdivision/Village" value="<?= $pi_pa_subdivision ?>">
        </div>
      </div>
        
        <!--Barangay--> 
        <div class="col-md-2">
        <div class="form-group">
          <label class="form-control-label">-</label>
          <input type="text" name="pi_pa_barangay" class="form-control" placeholder="Barangay" value="<?= $pi_pa_barangay ?>">
        </div>
      </div>

        <!--City/Municipality--> 
        <div class="col-md-2">
        <div class="form-group">
          <label class="form-control-label">-</label>
          <input type="text" placeholder="City/Municipality" name="pi_pa_municipality" class="form-control" value="<?= $pi_pa_municipality ?>">
        </div>
      </div>

      <!--Province--> 
      <div class="col-md-2">
        <div class="form-group">
          <label class="form-control-label">-</label>
          <input type="text" placeholder="Province" name="pi_pa_province" class="form-control" value="<?= $pi_pa_province ?>">
        </div>
      </div>

      <!--Zip Code--> 
      <div class="col-md-1">
        <div class="form-group">
          <label class="form-control-label">-</label>
          <input type="text" name="pi_pa_zip" class="form-control" placeholder="Zip Code" value="<?= $pi_pa_zip ?>">
        </div>
      </div> 

    </div> <!--Sixth Row-->

    <!--Seventh Row-->
    <div class="row no-padding-bottom no-padding-top"> 
        
      <!--Telephone No--> 
      <div class="col-md-4">
        <div class="form-group">
          <label class="form-control-label">19. Telephone No.</label>
          <input type="text" name="pi_telephone" class="form-control" placeholder="344-0250" value="<?= $pi_telephone ?>">
        </div>
      </div> 
      
      <!--Mobile No--> 
      <div class="col-md-4">
        <div class="form-group">
          <label class="form-control-label">20. Mobile No.</label>
          <input type="text" name="pi_mobile" class="form-control" placeholder="09355440274" value="<?= $pi_mobile ?>">
        </div>
      </div>

      <!--Email Address (if any)--> 
      <div class="col-md-4">
        <div class="form-group">
          <label class="form-control-label">21. Email Address</label>
          <input type="text" name="pi_email" class="form-control" placeholder="juandelacruz@tesda.gov.ph" value="<?= $pi_email ?>">
        </div>
      </div>
      
    </div> <!--Seventh Row-->

    <!--Eight Row-->
    <div class="row no-padding-bottom no-padding-top"> 
        
      
      <div class="col-md-4">
        <div class="form-group">
          
        </div>
      </div> 
      
      
      <div class="col-md-4">
        <div class="form-group">
         
        </div>
      </div>

      <!--Submit--> 
      <div class="col-md-4">
        <!--Submit-->
        <div class="form-group pull-right no-margin-bottom">       
          <input type="submit" value="Update" class="btn btn-primary">
        </div>
      </div>
      
    </div> <!--Eight Row-->
</form>
