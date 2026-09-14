<?php if( $this->session->logged_in){
  if($this->session->role == 'Accre'){
    redirect(base_url().'accreditor'); 
  }else{
    redirect(base_url().'hr_dashboard'); 
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
  filter: blur(10px);
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



.icon-password {
  float: right;
  margin-left: -25px;
  margin-top: -25px;
  position: relative;
  z-index: 2;
}
</style>

<body oncontextmenu="return false">

  <div class="page login-page" style="background: #fffdf8;">
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
                    <img class="img-fluid" src="<?= base_url();?>assets/img/SignIn.webp">
                  </div>
                
				            
                    <br>
                    
                    <?php if($this->session->flashdata('validate_captcha')) : ?>
                      <?= '<p class="alert alert-danger">'.$this->session->flashdata('validate_captcha').' <button type="button" class="close" data-dismiss="alert">&times;</button></p>'?>
                    <?php $this->session->unset_userdata('validate_captcha'); endif;?>

                    <?php if($this->session->flashdata('deny_user')) : ?>
                      <?= '<p class="alert alert-danger">'.$this->session->flashdata('deny_user').' <button type="button" class="close" data-dismiss="alert">&times;</button></p>'?>
                    <?php $this->session->unset_userdata('deny_user'); endif;?>

                    <?php if($this->session->flashdata('verification_failed')) : ?>
                      <?= '<p class="alert alert-danger" align="justify">'.$this->session->flashdata('verification_failed').' <button type="button" class="close" data-dismiss="alert">&times;</button></p>'?>
                    <?php $this->session->unset_userdata('verification_failed'); endif;?>

                    <?php if($this->session->flashdata('failed')) : ?>
                      <?= '<p class="alert alert-danger">'.$this->session->flashdata('failed').' <button type="button" class="close" data-dismiss="alert">&times;</button></p>'?>
                    <?php $this->session->unset_userdata('failed'); endif;?>

                      <?= form_open('login', 'class="form-validate"'); ?>
                      <div class="form-group">
                        <input id="login-username" type="email" name="Username" required data-msg="Please enter your email" class="input-material" value="<?= set_value('Username')?>" autocomplete="username">
                        <label for="login-username" class="label-material">Email</label>
                      </div>

                        
                      <div class="form-group">
                        <input id="login-password" type="password" name="Password" required data-msg="Please enter your password" class="input-material" autocomplete="password">
                        <label for="login-password" class="label-material">Password <a><i id="icon-password" class="fa fa-eye-slash"></i></a></label>
                       
                      </div>

                      <div class="form-group">
                        <div class="g-recaptcha"  data-sitekey="6Lfsr1AcAAAAAJrOf8WvM5nM1W6m5YaSSzTOH1fZ"></div>		
                      </div>

                      <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="submit" id="submit" value="Sign in">
                      </div>
                      
				              <small>Do not have an account? </small><a href="<?= base_url()?>register" class="signup">Sign up</a>
                        <br>
                      <a href="<?= base_url()?>forgot_password" class="signup">Forgot Password? </a>

                      
                </div>
              </div>
            </div>
			
          </div><!-- End Row    -->
		  
        </div><!-- End form-holder has-shadow -->
      </div><!-- End container d-flex align-items-center-->
	  
      <div class="copyrights text-center">
        <p style="color: #333333;">  &copy 2021 <strong>TESDA DOS ICTU</strong>. Site developed and managed with <i class="fa fa-heart"></i> by <strong>TESDA DOS ICTU</strong> | Powered by </span> <a href="https://bootstrapious.com/p/admin-template" class="external">Bootstrapious</a>
          <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
        </p>
      </div>
	  
    </div><!-- End of page login-page-->

               

    <!-- Modal About -->
    <?php //require_once('video.php'); ?>
      <!-- End Modal -->

    
  <?php }?>

