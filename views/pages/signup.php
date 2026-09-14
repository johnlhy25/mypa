<?php if( $this->session->logged_in){
  if($this->session->role == 'Accre'){
    redirect(base_url().'accreditor'); 
  }else{
    redirect(base_url().'dashboard'); 
  }
 
}else{ ?>

<style>
.login-page::before {
  content: '';
  width: 100%;
  height: 100%;
  display: block;
  z-index: -1;
  background: url(assets/img/Background.webp);
  background-size: cover;
  -webkit-filter: blur(5px);
  filter: blur(15px);
  z-index: 1;
  position: absolute;
  top: 0;
}

.login-page .form-holder .info {
  background: url(assets/img/Background-Login.png);
  background-repeat: no-repeat;
  background-size: auto;
  background-size: cover;
  color: #fff;
}
</style>

<body oncontextmenu="return false" onload="disableSubmit()">
    <div class="page login-page">
      <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
          <div class="row">

             <!-- Logo & Information Panel-->
             <div class="col-lg-6">
              <div class="info d-flex align-items-center">
                <div class="content">
                  <div class="logo text-center">
                    <img src="<?= base_url();?>assets/img/Logo.png" class="img-fluid">
                    <img src="<?= base_url();?>assets/img/Login-Footer.png" class="img-fluid"> 
                  </div>
                </div>
              </div>
            </div>

            <!-- Form Panel    -->
            <div class="col-lg-6" style="background: #fffdf8;">
              <div class="form d-flex align-items-center">
                <div class="content">
                  <div class="logo text-center">
                    <img class="img-fluid" src="<?= base_url();?>assets/img/SignUp.webp"> 
                  </div>
                <br>
                
                    <?php if($this->session->flashdata('validate_captcha_signup')) : ?>
                      <?= '<p class="alert alert-danger text-justify">'.$this->session->flashdata('validate_captcha_signup').' <button type="button" class="close" data-dismiss="alert">&times;</button></p>'?>
                    <?php $this->session->unset_userdata('validate_captcha_signup'); endif;?>

                    <?php if($this->session->flashdata('failed_email')) : ?>
                      <?= '<p class="alert alert-danger text-justify">'.$this->session->flashdata('failed_email').' <button type="button" class="close" data-dismiss="alert">&times;</button></p>'?>
                    <?php $this->session->unset_userdata('failed_email'); endif;?>

                    <?php if($this->session->flashdata('registration_failed_email')) : ?>
                      <?= '<p class="alert alert-danger text-justify">'.$this->session->flashdata('registration_failed_email').' <button type="button" class="close" data-dismiss="alert">&times;</button></p>'?>
                    <?php $this->session->unset_userdata('registration_failed_email'); endif;?>

                    <?php if($this->session->flashdata('registration_failed')) : ?>
                      <?= '<p class="alert alert-danger text-justify">'.$this->session->flashdata('registration_failed').' <button type="button" class="close" data-dismiss="alert">&times;</button></p>'?>
                    <?php $this->session->unset_userdata('registration_failed'); endif;?>

                    <?php if($this->session->flashdata('registration')) : ?>
                      <?= '<p class="alert alert-success text-justify">'.$this->session->flashdata('registration').' <button type="button" class="close" data-dismiss="alert">&times;</button></p>'?>
                    <?php $this->session->unset_userdata('registration'); endif;?>

                    <?php if($this->session->flashdata('valid_password')) : ?>
                      <?= '<p class="alert alert-danger text-justify">'.$this->session->flashdata('valid_password').' <button type="button" class="close" data-dismiss="alert">&times;</button></p>'?>
                    <?php $this->session->unset_userdata('valid_password'); endif;?>

                    
                    

                <?= form_open('signup','class="form-validate"'); ?>

                    <div class="form-group">
                      <input id="register-email" type="email" name="signupemail" required data-msg="Please enter a valid email address" value="<?= set_value('signupemail')?>" class="input-material">
                      <label for="register-email" class="label-material">Email Address      </label>
                    </div>

                    <div class="form-group">
                      <input id="register-password" type="password" name="signuppassword" required data-msg="Please enter your password" class="input-material">
                      <label for="register-password" class="label-material">Password <i id="icon-password" class="fa fa-eye-slash"></i> </label>
                      <small><span style="text-align: justify; color:black"><strong>Note:</strong> Minimum of eight(8) and maximum of thirty two(32) characters including at least one(1) uppercase letter, one(1) lowercase letter, one(1) number and one(1) special character.</span></small>
                    </div>

                    <div class="form-group">
                      <input id="confirm-password" type="password" name="confirmpassword" required data-msg="Please confirm your password" class="input-material">
                      <label for="confirm-password" class="label-material">Confirm Password        </label>
                    </div>

                    <div class="form-group">
                      <input id="fullname" type="text" name="fullname" required data-msg="Please enter your full name" value="<?= set_value('fullname')?>" class="input-material" onkeypress="return /[0-9a-zA-Z. \b]/i.test(event.key)">
                      <label for="fullname" class="label-material">Full Name (eg. Juan B. Dela Cruz)</label>
                    </div>

                    <div class="form-group">

                       <style>
                        /* select starting stylings ------------------------------*/
                          .select {
                            position: relative;
                            width: 100%;
                          }

                          .select-text {
                            position: relative;
                            font-family: inherit;
                            background-color: transparent;
                            width: 100%;
                            padding: 10px 10px 10px 0;
                            font-size: auto;
                            border-radius: 0;
                            border: none;
                            border-bottom: 1px solid rgba(0,0,0, 0.12);
                          }

                          /* Remove focus */
                          .select-text:focus {
                            outline: none;
                            border-bottom: 1px solid rgba(0,0,0, 0);
                          }

                            /* Use custom arrow */
                          .select .select-text {
                            appearance: none;
                            -webkit-appearance:none
                          }

                          .select:after {
                            position: absolute;
                            top: 18px;
                            right: 10px;
                            /* Styling the down arrow */
                            width: 0;
                            height: 0;
                            padding: 0;
                            content: '';
                            border-left: 6px solid transparent;
                            border-right: 6px solid transparent;
                            border-top: 6px solid rgba(0, 0, 0, 0.12);
                            pointer-events: none;
                          }


                          /* LABEL ======================================= */
                          .select-label {
                            color: rgba(0,0,0, 0.26);
                            font-size: auto;
                            font-weight: thin;
                            position: absolute;
                            pointer-events: none;
                            left: 0;
                            top: 10px;
                            transition: 0.2s ease all;
                          }

                          /* active state */
                          .select-text:focus ~ .select-label, .select-text:valid ~ .select-label {
                            color: rgba(43, 144, 217, 0.9);
                            top: -20px;
                            transition: 0.2s ease all;
                            font-size: 13px;
                            font-weight: 100;
                          }

                          /* BOTTOM BARS ================================= */
                          .select-bar {
                            position: relative;
                            display: block;
                            width: 100%;
                          }

                          .select-bar:before, .select-bar:after {
                            content: '';
                            height: 1px;
                            width: 0;
                            bottom: 1px;
                            position: absolute;
                            background: #fb4e4a;
                            transition: 0.2s ease all;
                          }

                          .select-bar:before {
                            left: 50%;
                          }

                          .select-bar:after {
                            right: 50%;
                          }

                          /* active state */
                          .select-text:focus ~ .select-bar:before, .select-text:focus ~ .select-bar:after {
                            width: 50%;
                          }

                          /* HIGHLIGHTER ================================== */
                          .select-highlight {
                            position: absolute;
                            height: 60%;
                            width: 100px;
                            top: 25%;
                            left: 0;
                            pointer-events: none;
                            opacity: 0.5;
                          }
                       </style>

                      <!--Select with pure css-->
                      <div class="select">
                      <select class="select-text" name="ous" required data-msg="Please select your Operating Unit">
                            <?php foreach ($operating_units as $row){ ?>
                              <option value="<?= $row['ous_id']?>"><?= $row['ous_desc']?></option>
                            <?php } ?>
                          </select>
                          <span class="select-highlight"></span>
                          <span class="select-bar"></span>
                          <label class="select-label">Operating Unit</label>
                        </div>
                      <!--Select with pure css--> 
                    </div>

                    <div class="form-group terms-conditions">
                        <input name="terms" id="terms" onchange="activateButton(this)" type="checkbox" required value="1" data-msg="Your agreement is required" class="checkbox-template">
                        <label for="register-agree">Agree to our <a href="https://www.tesda.gov.ph/About/TESDA/27744" target="_blank">Terms </a> and read our <a href="https://www.tesda.gov.ph/About/TESDA/27744" target="_blank">Data Policy</a></label>
                      <div class="g-recaptcha"  data-sitekey="6Lfsr1AcAAAAAJrOf8WvM5nM1W6m5YaSSzTOH1fZ"></div>		
                    </div>

                    <div class="form-group">
                      <button id="submit" type="submit" name="registerSubmit" class="btn btn-primary">Sign up</button>
                    </div>
                  </form><small>Already have an account? </small><a href="<?= base_url();?>" class="signup">Sign in</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

	  <div class="copyrights text-center">
    <p style="color: #333333;">  &copy 2021 <strong>TESDA DOS</strong>. Site developed and managed with <i class="fa fa-heart"></i> by <strong>MIS Office</strong> | Powered by </span> <a href="https://bootstrapious.com/p/admin-template" class="external">Bootstrapious</a>
          <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
        </p>
      </div>
	  
    </div><!-- End of page login-page-->

     <!-- Modal Set AACCUP EXHIBITS -->
     <div class="modal fade delete" id="agreement" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document" >	
        <div class="modal-content" style="color: #fffdf8; background: url(assets/img/Background-Login.webp); background-repeat: no-repeat; background-size: auto; background-size: cover;">

            <div class="modal-header" style="color: #eeca24;">
              <h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-gavel"></i> Terms and Conditions of Use</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body" >

                <div class="logo text-center">
                    <img class="img-responsive text-center" src="<?= base_url();?>assets/img/LogoMYPA-S.webp" alt="Cagayan State University Logo" height="130px" width="auto">
                </div>
                <h1>Website Terms and Conditions of Use</h1>

                <h2>1. Terms</h2>

                <p>By accessing this Website, accessible from <b>TESDA DOS FASD Services</b>, you are agreeing to be bound by these Website Terms and Conditions of Use and agree that you are responsible for the agreement with any applicable local laws. If you disagree with any of these terms, you are prohibited from accessing this site. The materials contained in this Website are protected by copyright and trade mark law.</p>

                <h2>2. Use License</h2>

                <p>Permission is granted to temporarily download one copy of the materials on TESDA's Website for personal, non-commercial transitory viewing only. This is the grant of a license, not a transfer of title, and under this license you may not:</p>

                <ul>
                    <li>modify or copy the materials;</li>
                    <li>use the materials for any commercial purpose or for any public display;</li>
                    <li>attempt to reverse engineer any software contained on TESDA's Website;</li>
                    <li>remove any copyright or other proprietary notations from the materials; or</li>
                    <li>transferring the materials to another person or "mirror" the materials on any other server.</li>
                </ul>

                <p>This will let TESDA to terminate upon violations of any of these restrictions. Upon termination, your viewing right will also be terminated and you should destroy any downloaded materials in your possession whether it is printed or electronic format. These Terms of Service has been created with the help of the <a href="https://www.termsofservicegenerator.net">Terms Of Service Generator</a>.</p>

                <h2>3. Disclaimer</h2>

                <p>All the materials on TESDA’s Website are provided "as is". TESDA makes no warranties, may it be expressed or implied, therefore negates all other warranties. Furthermore, TESDA does not make any representations concerning the accuracy or reliability of the use of the materials on its Website or otherwise relating to such materials or any sites linked to this Website.</p>

                <h2>4. Revisions and Errata</h2>

                <p>The materials appearing on TESDA’s Website may include technical, typographical, or photographic errors. TESDA will not promise that any of the materials in this Website are accurate, complete, or current. TESDA may change the materials contained on its Website at any time without notice. TESDA does not make any commitment to update the materials.</p>

                <h2>5. Site Terms of Use Modifications</h2>

                <p>TESDA may revise these Terms of Use for its Website at any time without prior notice. By using this Website, you are agreeing to be bound by the current version of these Terms and Conditions of Use.</p>

                <h2>6. Your Privacy</h2>

                <p>Please read our <a href="#">Privacy Policy</a>.</p>

                <h2>7. Governing Law</h2>

                <p>Any claim related to TESDA's Website shall be governed by the laws of ph without regards to its conflict of law provisions.</p>
            </div>
                
        </div>
      </div>
    </div>
    <!-- End Modal -->

    <?php }?>