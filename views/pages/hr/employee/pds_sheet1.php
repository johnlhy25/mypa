<div class="card mt-3"><!--Start of Card-->
    <!--First Row-->
    <div class="row no-padding-bottom" style="margin:0px 20px 20px 0px"> 
      <!--Surname-->                   
      <div class="col-md-3">
        <div class="form-group">
          <label class="form-control-label">2. Surname</label>
          <input id="pi_surname" type="text" name="pi_surname" class="form-control" placeholder="Santiago" required>
        </div>
      </div> 
      
      <!--First Name--> 
      <div class="col-md-3">
        <div class="form-group">
          <label class="form-control-label">First Name</label>
          <input id="pi_firstname" type="text" name="pi_firstname" class="form-control" placeholder="John Lee" required>
        </div>
      </div> 
      
      <!--Middle Name--> 
      <div class="col-md-3">
        <div class="form-group">
          <label class="form-control-label">Middle Name</label>
          <input id="pi_middlename" type="text" name="pi_middlename" class="form-control" placeholder="Patino" required>
        </div>
      </div>

      <!--Ext Name--> 
      <div class="col-md-3">
        <div class="form-group">
          <label class="form-control-label">Extension Name</label>
          <input id="pi_extname" type="text" name="pi_extname" class="form-control" placeholder="Jr., Sr.">
        </div>
      </div>

    </div><!--First Row-->
    
    <!--Second Row-->
    <div class="row no-padding-top no-padding-bottom" style="margin:0px 20px 20px 0px"> 
      <!--Date of Birth-->                   
      <div class="col-md-3">
        <div class="form-group">
          <label class="form-control-label">3. Date of Birth</label>
            <input id="date_of_birth" type="date" class="form-control" name="date_of_birth" required>
        </div>
      </div> 
      
      <!--Place of Birth--> 
      <div class="col-md-3">
        <div class="form-group">
          <label class="form-control-label">4. Place of Birth</label>
            <input id="place_of_birth" type="text" class="form-control" name="place_of_birth" placeholder="Lasam, Cagayan" required>
        </div>
      </div> 
      
      <!--Sex--> 
      <div class="col-md-3">
        <div class="form-group">
          <label class="form-control-label">5. Sex</label>
            <select id="sex" name="sex" class="form-control" required>
                <option value="" selected>---</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>
      </div>

      <!--Civil Status--> 
      <div class="col-md-3">
        <div class="form-group">
          <label class="form-control-label">6. Civil Status</label>
            <select id="civil_status" name="civil_status" class="form-control" required>
                <option value="" selected>---</option>
                <option value="Single">Single</option>
                <option value="Married">Married</option>
                <option value="Widowed">Widowed</option>
                <option value="Separated">Separated</option>
            </select>
        </div>
      </div>

    </div><!--Second Row-->

    <!--Third Row-->
    <div class="row no-padding-bottom no-padding-top" style="margin:0px 20px 20px 0px"> 
      
      <!--Height-->                   
      <div class="col-md-2">
        <div class="form-group">
          <label class="form-control-label">7. Height (m)</label>
          <input id="pi_height" type="number" name="pi_height" class="form-control" placeholder="1.55" step=".01">
        </div>
      </div> 
      
      <!--Weight--> 
      <div class="col-md-2">
        <div class="form-group">
          <label class="form-control-label">8. Weight (Kg)</label>
          <input id="pi_weight" type="number" name="pi_weight" class="form-control" placeholder="65" step=".01">
        </div>
      </div> 
      
      <!--Blood Type--> 
      <div class="col-md-2">
        <div class="form-group">
          <label class="form-control-label">9. Blood Type</label>
          <input id="pi_blood_type" type="text" name="pi_blood_type" class="form-control" placeholder="O+">
        </div>
      </div>

      <!--GSIS ID NO.--> 
      <div class="col-md-3">
        <div class="form-group">
          <label class="form-control-label">10. GSIS ID No.</label>
          <input id="pi_gsis" type="text" name="pi_gsis" class="form-control" placeholder="26222402209">
        </div>
      </div>

      <!--PAG-IBIG No-->                   
      <div class="col-md-3">
        <div class="form-group">
          <label class="form-control-label">11. PAG-IBIG No.</label>
          <input id="pi_pagibig" type="text" name="pi_pagibig" class="form-control" placeholder="1234-5678-9101">
        </div>
      </div> 

    </div> <!--Third Row-->
    
    <!--Fourth Row-->
    <div class="row no-padding-bottom no-padding-top" style="margin:0px 20px 20px 0px"> 
        
      <!--PhilHealth--> 
      <div class="col-md-3">
        <div class="form-group">
          <label class="form-control-label">12. PhilHealth No.</label>
          <input id="pi_philhealth" type="text" name="pi_philhealth" class="form-control" placeholder="12-345678910-1">
        </div>
      </div> 
      
      <!--SSS No--> 
      <div class="col-md-2">
        <div class="form-group">
          <label class="form-control-label">13. SSS No.</label>
          <input id="pi_sss" type="text" name="pi_sss" class="form-control" placeholder="12-3456789-0">
        </div>
      </div>

      <!--TIN NO.--> 
      <div class="col-md-3">
        <div class="form-group">
          <label class="form-control-label">14. TIN No.</label>
          <input id="pi_tin_no" type="text" name="pi_tin_no" class="form-control" placeholder="123-456-789-000">
        </div>
      </div>
        
        <!--Employee No--> 
        <div class="col-md-2">
        <div class="form-group">
          <label class="form-control-label">15. Employee No.</label>
          <input id="pi_employee_id" type="text" name="pi_employee_id" class="form-control" placeholder="2022-001">
        </div>
      </div>

        <!--Citizenship--> 
        <div class="col-md-2">
        <div class="form-group">
          <label class="form-control-label">16. Citizenship</label>
          <input id="citizenship" type="text" placeholder="Filipino" name="citizenship" class="form-control">
        </div>
      </div>

    </div> <!--Fourth Row-->

    <!--Fifth Row-->
    <div class="row no-padding-bottom no-padding-top" style="margin:0px 20px 20px 0px"> 
        
      <!--Residential Address--> 
      <div class="col-md-1">
        <div class="form-group">
          <label class="form-control-label">17.</label>
          <input id="pi_ra_block_no" type="text" name="pi_ra_block_no" class="form-control" placeholder="House/Block/Lot No.">
        </div>
      </div> 
      
      <!--Street--> 
      <div class="col-md-2">
        <div class="form-group">
          <label class="form-control-label">Residential </label>
          <input id="pi_ra_street" type="text" name="pi_ra_street" class="form-control" placeholder="Street">
        </div>
      </div>

      <!--Subdivision/Village--> 
      <div class="col-md-2">
        <div class="form-group">
          <label class="form-control-label">Address</label>
          <input id="pi_ra_subdivision" type="text" name="pi_ra_subdivision" class="form-control" placeholder="Subdivision/Village">
        </div>
      </div>
        
        <!--Barangay--> 
        <div class="col-md-2">
        <div class="form-group">
          <label class="form-control-label">-</label>
          <input id="pi_ra_barangay" type="text" name="pi_ra_barangay" class="form-control" placeholder="Barangay">
        </div>
      </div>

        <!--City/Municipality--> 
        <div class="col-md-2">
        <div class="form-group">
          <label class="form-control-label">-</label>
          <input id="pi_ra_municipality" type="text" placeholder="City/Municipality" name="pi_ra_municipality" class="form-control">
        </div>
      </div>

      <!--Province--> 
      <div class="col-md-2">
        <div class="form-group">
          <label class="form-control-label">-</label>
          <input id="pi_ra_province" type="text" placeholder="Province" name="pi_ra_province" class="form-control">
        </div>
      </div>

      <!--Zip Code--> 
      <div class="col-md-1">
        <div class="form-group">
          <label class="form-control-label">-</label>
          <input id="pi_ra_zip" type="text" name="pi_ra_zip" class="form-control" placeholder="Zip Code">
        </div>
      </div> 

    </div> <!--Fifth Row-->

    <!--Sixth Row-->
    <div class="row no-padding-bottom no-padding-top" style="margin:0px 20px 20px 0px"> 
        
      <!--Residential Address--> 
      <div class="col-md-1">
        <div class="form-group">
          <label class="form-control-label">18.</label>
          <input id="pi_pa_block_no" type="text" name="pi_pa_block_no" class="form-control" placeholder="House/Block/Lot No.">
        </div>
      </div> 
      
      <!--Street--> 
      <div class="col-md-2">
        <div class="form-group">
          <label class="form-control-label">Permanent </label>
          <input id="pi_pa_street" type="text" name="pi_pa_street" class="form-control" placeholder="Street">
        </div>
      </div>

      <!--Subdivision/Village--> 
      <div class="col-md-2">
        <div class="form-group">
          <label class="form-control-label">Address</label>
          <input id="pi_pa_subdivision" type="text" name="pi_pa_subdivision" class="form-control" placeholder="Subdivision/Village">
        </div>
      </div>
        
        <!--Barangay--> 
        <div class="col-md-2">
        <div class="form-group">
          <label class="form-control-label">-</label>
          <input id="pi_pa_barangay" type="text" name="pi_pa_barangay" class="form-control" placeholder="Barangay">
        </div>
      </div>

        <!--City/Municipality--> 
        <div class="col-md-2">
        <div class="form-group">
          <label class="form-control-label">-</label>
          <input id="pi_pa_municipality" type="text" placeholder="City/Municipality" name="pi_pa_municipality" class="form-control">
        </div>
      </div>

      <!--Province--> 
      <div class="col-md-2">
        <div class="form-group">
          <label class="form-control-label">-</label>
          <input id="pi_pa_province" type="text" placeholder="Province" name="pi_pa_province" class="form-control">
        </div>
      </div>

      <!--Zip Code--> 
      <div class="col-md-1">
        <div class="form-group">
          <label class="form-control-label">-</label>
          <input id="pi_pa_zip" type="text" name="pi_pa_zip" class="form-control" placeholder="Zip Code">
        </div>
      </div> 

    </div> <!--Sixth Row-->

    <!--Seventh Row-->
    <div class="row no-padding-bottom no-padding-top" style="margin:0px 20px 20px 0px"> 
        
      <!--Telephone No--> 
      <div class="col-md-4">
        <div class="form-group">
          <label class="form-control-label">19. Telephone No.</label>
          <input id="pi_telephone" type="text" name="pi_telephone" class="form-control" placeholder="344-0250">
        </div>
      </div> 
      
      <!--Mobile No--> 
      <div class="col-md-4">
        <div class="form-group">
          <label class="form-control-label">20. Mobile No.</label>
          <input id="pi_mobile" type="text" name="pi_mobile" class="form-control" placeholder="09355440274">
        </div>
      </div>

      <!--Email Address (if any)--> 
      <div class="col-md-4">
        <div class="form-group">
          <label class="form-control-label">21. Email Address</label>
          <input id="pi_email" type="text" name="pi_email" class="form-control" placeholder="juandelacruz@tesda.gov.ph">
        </div>
      </div>
      
    </div> <!--Seventh Row-->

    <!--Eight Row-->
    <div class="row no-padding-bottom no-padding-top" style="margin:0px 20px 20px 0px"> 
        
      
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
</div><!--End of Card-->
