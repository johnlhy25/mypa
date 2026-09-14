    <?= form_open('update_user_info_pds_sheet1_1')?>

    <!--First Row-->
    <div class="row no-padding-bottom"> 
      <!--Surname-->                   
      <div class="col-md-3">
        <div class="form-group">
          <label class="form-control-label">22. Spouse's Surname</label>
          <input type="text" name="fb_spouse_surname" class="form-control" placeholder="Santiago" value="<?= $fb_spouse_surname ?>">
        </div>
      </div> 
      
      <!--First Name--> 
      <div class="col-md-3">
        <div class="form-group">
          <label class="form-control-label">First Name</label>
          <input type="text" name="fb_spouse_fname" class="form-control" placeholder="John Lee" value="<?= $fb_spouse_fname ?>" >
        </div>
      </div> 
      
      <!--Middle Name--> 
      <div class="col-md-3">
        <div class="form-group">
          <label class="form-control-label">Middle Name</label>
          <input type="text" name="fb_spouse_mname" class="form-control" placeholder="Patino" value="<?= $fb_spouse_mname ?>" >
        </div>
      </div>

      <!--Ext Name--> 
      <div class="col-md-3">
        <div class="form-group">
          <label class="form-control-label">Extension Name</label>
          <input type="text" name="fb_spouse_extname" class="form-control" value="<?= $fb_spouse_extname ?>" placeholder="Jr., Sr.">
        </div>
      </div>

    </div><!--First Row-->

    <!--Second Row-->
    <div class="row no-padding-bottom no-padding-top"> 
      <!--Height-->                   
      <div class="col-md-3">
        <div class="form-group">
          <label class="form-control-label">Occupation</label>
          <input type="text" name="fb_spouse_occupation" class="form-control" placeholder="Government Employee" value="<?= $fb_spouse_occupation ?>">
        </div>
      </div> 
      
      <!--Weight--> 
      <div class="col-md-3">
        <div class="form-group">
          <label class="form-control-label">Employer/ Business Name</label>
          <input type="text" name="fb_spouse_business" class="form-control" placeholder="TESDA R02/ ITech Solutions" value="<?= $fb_spouse_business ?>">
        </div>
      </div> 

      <!--Height-->                   
      <div class="col-md-3">
        <div class="form-group">
          <label class="form-control-label">Business Address</label>
          <input type="text" name="fb_spouse_business_address" class="form-control" placeholder="Battalan, Lasam, Cagayan" value="<?= $fb_spouse_business_address ?>">
        </div>
      </div> 
      
      <!--Weight--> 
      <div class="col-md-3">
        <div class="form-group">
          <label class="form-control-label">Telephone No.</label>
          <input type="text" name="fb_spouse_telephone" class="form-control" placeholder="(078) 344-1234" value="<?= $fb_spouse_telephone ?>">
        </div>
      </div> 

    </div> <!--Second Row-->
    
    <!--Fourth Row-->
    <div class="row no-padding-bottom no-padding-top"> 
      <!--Surname-->                   
      <div class="col-md-3">
        <div class="form-group">
          <label class="form-control-label">24. Father's Surname</label>
          <input type="text" name="fb_father_surname" class="form-control" placeholder="Santiago" value="<?= $fb_father_surname ?>" >
        </div>
      </div> 
      
      <!--First Name--> 
      <div class="col-md-3">
        <div class="form-group">
          <label class="form-control-label">First Name</label>
          <input type="text" name="fb_father_fname" class="form-control" placeholder="John Lee" value="<?= $fb_father_fname ?>" >
        </div>
      </div> 
      
      <!--Middle Name--> 
      <div class="col-md-3">
        <div class="form-group">
          <label class="form-control-label">Middle Name</label>
          <input type="text" name="fb_father_mname" class="form-control" placeholder="Patino" value="<?= $fb_father_mname ?>" >
        </div>
      </div>

      <!--Ext Name--> 
      <div class="col-md-3">
        <div class="form-group">
          <label class="form-control-label">Extension Name</label>
          <input type="text" name="fb_father_extname" class="form-control" value="<?= $fb_father_extname ?>" placeholder="Jr., Sr.">
        </div>
      </div>

    </div><!--Fourth Row-->

    <!--Fifth Row-->
    <div class="row no-padding-bottom no-padding-top"> 

      <!--First Name--> 
      <div class="col-md-4">
        <div class="form-group">
          <label class="form-control-label">25. Mother's Maiden Surname Name</label>
          <input type="text" name="fb_mother_surname" class="form-control" placeholder="John Lee" value="<?= $fb_mother_surname ?>" >
        </div>
      </div> 
      
      <!--Middle Name--> 
      <div class="col-md-4">
        <div class="form-group">
          <label class="form-control-label">First Name</label>
          <input type="text" name="fb_mother_fname" class="form-control" placeholder="Patino" value="<?= $fb_mother_fname ?>" >
        </div>
      </div>

      <!--Ext Name--> 
      <div class="col-md-4">
        <div class="form-group">
          <label class="form-control-label">Middle Name</label>
          <input type="text" name="fb_mother_mname" class="form-control" value="<?= $fb_mother_mname ?>" placeholder="Apil">
        </div>
      </div>

    </div><!--Fifth Row-->

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

  <!--Third Row-->
    <div class="row no-padding-bottom no-padding-top"> 
      <!--List-->                   
      <div class="col-md-12">
        <div class="form-group">
          <label class="form-control-label">23. Name of Children (Write full name and list all) <a href="javascript:void(0);" data-toggle="modal" data-target="#Modal_Add"><i class="fa fa-plus"></i> Add</a></label>
          <?php include('children.php');?>
        </div>
      </div> 
      <!--List-->
    </div><!--Third Row-->

