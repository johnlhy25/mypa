<!DOCTYPE html>
<?php
if($this->session->ous_id == 16){
    $disabled = "disabled-link";
}else{
    $disabled = " ";
}
?>
<style>
.disabled-link{
    pointer-events: none;
    cursor: not-allowed;
    opacity: .65;
}
</style>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>TDIS  | <?= $menu ?></title>
    <!-- Open Graph-->
    <meta property="og:title" content="TESDA DOS Integrated System (TDIS)">
    <meta property="og:site_name" content="TESDA DOS Integrated System (TDIS)">
    <meta property="og:url" content="<?= base_url();?>">
    <meta property="og:description" content="TESDA DOS Integrated System (TDIS) is a one-stop application that provides different TESDA services in one place.">
    <meta property="og:type" content="website">
    <meta property="og:image" content="<?= base_url();?>assets/img/OG.png">

    <meta name="title" content="TESDA DOS FASD Services">
    <meta name="description" content="TESDA DOS Integrated System (TDIS) is a one-stop application that provides different TESDA services in one place.">
    <meta name="keywords" content="TESDA DOS Integrated System (TDIS), Document Bank, TESDA DOS DocBank, TESDA Region 02 ONSA, TESDA DOS HRIS, TESDA DOS Human Resource Management Information System (HRMIS)">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="English">
    <meta name="author" content="TESDA DOS Information Technology Unit (ITU)">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="<?= base_url();?>assets/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="<?= base_url();?>assets/vendor/font-awesome/css/font-awesome.min.css">

    <!-- Google fonts - Poppins -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="<?= base_url();?>assets/css/style.blue.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="<?= base_url();?>assets/css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="<?= base_url();?>assets/img/Logo.png">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    <!-- Hierarchy Select CSS -->
    <link rel="stylesheet" href="<?= base_url();?>assets/css/hierarchy-select.min.css">

    <!--Ajax Script Accounts-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!--Date Format-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>

    <!--Chartjs Script-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

    
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js'></script>
    
    <style>
      #buttontotop {
        display: inline-block;
        width: 50px;
        height: 50px;
        text-align: center;
        border-radius: 4px;
        position: fixed;
        bottom: 30px;
        right: 30px;
        transition: background-color .3s, 
          opacity .5s, visibility .5s;
        opacity: 0;
        visibility: hidden;
        z-index: 1000;
      }
      #buttontotop::after {
        content: "\f077";
        font-family: FontAwesome;
        font-weight: normal;
        font-style: normal;
        font-size: 2em;
        line-height: 50px;
        color: #fff;
      }
      #buttontotop.show {
        opacity: 1;
        visibility: visible;
      }
      /* width */
      ::-webkit-scrollbar {
        width: 4px;
      }

      /* Track */
      ::-webkit-scrollbar-track {
        background: #fff;
      }

      /* Handle */
      ::-webkit-scrollbar-thumb {
        background: #888;
      }

      /* Handle on hover */
      ::-webkit-scrollbar-thumb:hover {
        background: #555;
      }
    </style>

    <!-- One Signal -->

    <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
    <script>
      window.OneSignal = window.OneSignal || [];
      OneSignal.push(function() {
        OneSignal.init({
          appId: "1b365040-5377-4481-aec0-7cfae0a251d2",
        });
      });
    </script>

    <!-- One Signal -->

  </head>
  
  
  <body oncontextmenu="return false">


    <!-- Back to top button -->
    <a id="buttontotop" class="bg-primary"></a>
  
    <div class="page">
        
   
<!-- Announcement-->

      <div class="alert alert-info no-margin-bottom no-padding-bottom" style="display:none">
        <p><strong>ADVISORY: </strong>Please be informed that the Single Sign-On (SSO) integration of the Service Record System has been completed and is now ready for beta testing by the HR focals of the following operating units: Regional Office, Cagayan Provincial Office, Regional Training Center, and Southern Isabela College of Arts and Trades. The Service Record can now be accessed under <strong>Management -> FASD -> HR -> Personnel Information System -> Service Record.</strong></p>
        <p>For any inquiries, please contact the ICT Unit. Thank you.</p>
      </div>
      
      <div class="alert alert-info no-margin-bottom no-padding-bottom" style="display:none">
        <p><strong>ADVISORY: </strong>Please be informed that the uploading of temporary OPCR Targets for Calendar Year 2026 is currently ongoing. <b> The targets will be accessible starting January 23, 2026. </b> </p>
      </div>
      
    <?php
    
        date_default_timezone_set('Asia/Manila');
        $currentMonth = date('n');
        $currentDay = date('j');
        if ($currentMonth == 2 && $currentDay == 14) {
        
        $text= 'Mahal-yst" – (a love analyst)';
        $class= "fa fa-heart";
        require_once('quiz.php');
      ?>
      <div class="alert alert-danger no-margin-bottom no-padding-bottom">
        <p><strong>Pagod ka na ba? Tara, subukan mo ang Tumpak o Lagpak sa Pag-ibig? Alamin Kung Pasado Ka sa Love Exam!</strong> 
            <a href="https://tesdar02onlinereporting.ph/games/quiz.php?token=<?= $this->session->token?>" target="_blank"><i class="fa fa-arrow-right" aria-hidden="true"></i><strong> Take the Exam! </strong><i class="fa fa-arrow-left" aria-hidden="true"></i></a><br><small> Ang larong ito ay handog sa inyo ng <b>ICT Unit.</b></small>
        </p>
      </div>
     <?php } else{
      $text= 'Scholarship Dashboard';
      $class= "fa fa-dashboard";
      require_once('video.php');
     } ?>

<!-- Announcement -->

      <!-- Main Navbar-->
      <header class="header">
        <nav class="navbar">
      
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <!-- Navbar Header-->
              <div class="navbar-header">
                <!-- Navbar Brand --><a href="<?= base_url();?>" class="navbar-brand d-none d-sm-inline-block">
                  <div class="brand-text d-none d-lg-inline-block"><img src="<?= base_url();?>assets/img/Logo.png" width="45px" height="35px"> <strong><span style="color: white;" >TDiS</span></strong></div>
                  <div class="brand-text d-none d-sm-inline-block d-lg-none"><strong><span style="color: white;" >TDiS </span></strong></div></a>
                <!-- Toggle Button--><a id="toggle-btn" href="#" class="menu-btn active"><span></span><span></span><span></span></a>
              </div>
              <!-- Navbar Menu -->
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                
                <!-- Notifications-->
                <?php if( $this->session->role == 'Admin' || $this->session->role == 'Super Admin') {?>
                <li class="nav-item"><a href="" data-toggle="modal" data-target="#flag-raising-message" class="nav-link logout"><i class="<?= $class?>"></i> <span class="d-none d-sm-inline"> <?= $text?> </span></a></li>
                <li class="nav-item"><a href="" data-toggle="modal" data-target="#about" class="nav-link logout"><i class="fa fa-info-circle"></i> <span class="d-none d-sm-inline"> About</span></a></li>  
                <li class="nav-item"><a href="" data-toggle="modal" data-target="#new" class="nav-link logout"><i class="fa fa-bullhorn"></i> <span class="d-none d-sm-inline"> What's New</span></a></li>
                <li class="nav-item"><a href="" data-toggle="modal" data-target="#bug"  class="nav-link logout"><i class="fa fa-bug"></i> <span class="d-none d-sm-inline"> Report a Bug</span></a></li>   
                <li class="nav-item dropdown">  
                  <a id="notifications" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-bell"></i> <span class="d-none d-sm-inline"></span>
                      <?php 
                        $num_row_notification = 0;
                          foreach ($notification_data as $row) { 
                            $num_row_notification++;
                        }
                      ?> 
                      <?php if($num_row_notification == 0){ ?>
                        <span class="badge bg-red badge-corner"></span>
                      <?php } else { ?>
                        <span class="badge bg-red badge-corner"><?= $num_row_notification; ?></span>
                      <?php } ?> 
                  </a>
                  <ul aria-labelledby="notifications" class="dropdown-menu " style=" width: 500px; max-height: 400px; overflow: auto;">   
                      <?php 
                        $interval;
                        foreach ($notification_data as $row) {

                          date_default_timezone_set("Asia/Manila");
                          $time_ago = strtotime($row['grant_timestamp']);
                          $current_time = time();
                          $time_difference = $current_time - $time_ago;
                          $seconds = $time_difference;
                          $minutes = round($seconds / 60);
                          $hours = round($seconds / 3600);
                          $days = round($seconds / 86400);
                          $weeks = round($seconds / 604800);
                          $months = round($seconds / 2629440);
                          $years = round($seconds / 31553280);

                          if ($seconds <= 60) {
                            $interval = "Just Now";
                          }elseif($minutes <= 60){
                            if ($minutes == 1) {
                              $interval = "about a minute ago";
                            }else{
                              $interval = $minutes . " minutes ago";
                            }
                          }elseif ($hours <= 24) {
                            if ($hours == 1) {
                              $interval = "about an hour ago";
                            }else{
                              $interval = $hours. " hours ago";
                            }
                          }elseif ($days <= 7) {
                            if ($days == 1) {
                              $interval = "yesterday";
                            }else{
                              $interval = $days . " days ago";
                            }
                          }elseif ($weeks <= 4.3) {
                            if ($weeks == 1) {
                              $interval = "about a week ago";
                            }else{
                              $interval = $weeks. " weeks ago";
                            }
                          }elseif ($months <= 12) {
                            if ($months == 1) {
                              $interval = "about a month ago";
                            }else{
                              $interval = $months. " months ago";
                            }
                          }else{
                            if ($year == 1) {
                              $interval = "about a year ago";
                            }else{
                              $interval = $years. " years ago";
                            }
                          }
                      ?> 

                      <li>
                        <a href="<?= base_url();?>notifications" class="dropdown-item"> 
                        
                          <div class="notification">
                            <div class="notification-content">
                              <?php if ($row['usr_link_id'] == null) { ?>
                                <div class="row">
                                  <div class="col-sm-2">
                                    
                                      <a href="<?= base_url();?>user_proile"><img id="profile" src="<?= base_url();?>uploads/profile/img_avatar1.png" alt="Profile Picture"  class="img-fluid rounded-circle"></a>
                                   
                                  </div>
                                  <div class="col-sm-10">
                                    <div class="text-wrap text-justify">
                                      <strong><?= $row['usr_name']?></strong> is requesting access to <strong><?= $row['dep_desc'] ?></strong>
                                      <div class="notification-time pull-right text-primary"><small><?= $interval; ?></small></div>
                                    </div>
                                  </div>
                                </div>
                              <?php } else {?>
                                <div class="row">
                                  <div class="col-sm-2">
                                    
                                      <img id="profile" src="<?= base_url();?>uploads/profile/<?= $row['usr_link_id'];?>" alt="Profile Picture" class="img-fluid rounded-circle">
                                    
                                  </div>
                                  <div class="col-sm-10">
                                    <div class="text-wrap text-justify">
                                      <strong><?= $row['usr_name']?></strong> is requesting access to <strong><?= $row['dep_desc'] ?></strong>
                                      <div class="notification-time pull-right text-primary"><small><?= $interval; ?></small></div>
                                    </div>
                                  </div>
                                </div>
                                <?php } ?>

                            </div>
                          </div><!-- End of Div Notifications-->
                        </a>
                      </li>
                      <?php } ?>

                      <li><a rel="nofollow" href="<?= base_url();?>notifications" class="dropdown-item all-notifications text-center"><strong>See all notifications</strong></a></li> 
                    </ul>
                </li>

                <!-- Logout    -->
                <li class="nav-item"><a href="<?= base_url();?>logout" id="logoutButton" class="nav-link logout"> <i class="fa fa-sign-out"></i><span class="d-none d-sm-inline"> Logout</span></a></li>

                <?php } else { ?>
                  <li class="nav-item"><a href="" data-toggle="modal" data-target="#flag-raising-message" class="nav-link logout"><i class="<?= $class?>"></i> <span class="d-none d-sm-inline"> <?= $text?> </span></a></li>
                  <li class="nav-item"><a href="" data-toggle="modal" data-target="#about" class="nav-link logout"><i class="fa fa-info-circle"></i> <span class="d-none d-sm-inline"> About</span></a></li>  
                  <li class="nav-item"><a href="" data-toggle="modal" data-target="#new" class="nav-link logout"><i class="fa fa-bullhorn"></i> <span class="d-none d-sm-inline"> What's New</span></a></li>
                  <li class="nav-item"><a href="" data-toggle="modal" data-target="#bug"  class="nav-link logout"><i class="fa fa-bug"></i> <span class="d-none d-sm-inline"> Report a Bug</span></a></li>   
                  <!-- Logout    -->
                  <li class="nav-item"><a href="<?= base_url();?>logout" id="logoutButton" class="nav-link logout"> <i class="fa fa-sign-out"></i><span class="d-none d-sm-inline"> Logout</span></a></li>

                <?php } ?>

                </ul>
                
          <!--Heart-->
            </div>
          </div>

        </nav>
        
      </header>
        
      <!-- Modal About -->
		    <?php //require_once('video.php'); ?>
      <!-- End Modal -->
      
      <!-- Modal About -->
		    <?php //require_once('heart.php'); ?>
      <!-- End Modal -->
        
      <!-- Modal About -->
		    <?php require_once('about.php'); ?>
      <!-- End Modal -->

     <!-- Modal What's New -->
        <?php require_once('whats-new.php'); ?>         
     <!-- End Modal -->

      <!-- Modal Report a Bug -->
      <?php require_once('bug.php'); ?>         
      <!-- End Modal -->
         
      <!-- Active Status -->
      <?php require_once('active.php'); ?>       
      
      <!-- End Modal -->
      <div class="page-content d-flex align-items-stretch"> 
        <!-- Side Navbar -->
        <nav class="side-navbar">
          <!-- Sidebar Header-->
          <div class="sidebar-header d-flex align-items-center">
            <div class="avatar">
              <?php if ($this->session->profile == null) { ?>
                  <a href="<?= base_url();?>user_profile"><img id="profile" src="<?= base_url();?>uploads/profile/img_avatar1.png" alt="..." class="img-fluid rounded-circle">
                  </a>
              <?php } else {?>
                  <a href="<?= base_url();?>user_profile"><img id="profile" src="<?= base_url();?>uploads/profile/<?= $this->session->profile; ?>" alt="..." class="img-fluid rounded-circle" style="width:40px; height:40px;">
                  </a>
              <?php } ?>
            </div>
            
            <div class="title">
              <h3><?= $this->session->name; ?></h3>
              <span class="badge bg-warning badge-corner"><i class="fa fa-user"></i> <a><?= $this->session->role; ?></a></span>
              <span class="badge bg-red badge-corner"><i class="fa fa-gear"></i> <a href="<?= base_url()?>user_profile">Profile </a></span>
              <br>
              <span class="badge bg-green badge-corner"><i class="fa fa-bell"></i> <b><a><span id="notifs"> fetching...</span></a></b></span>
            </div>
          </div>

          <ul class="list-unstyled no-padding-top">
                <li>
                  <div class="text-center">  
                    <?= form_open('update_notification_one_signal')?>
                      <input type="hidden" id="o_user_id" class="o_user_id" name="o_user_id" value="">
                        <button id="PushButton" type="submit" class="btn btn-danger text-center btn-sm"><i class="fa fa-bell"></i> Subscribe</button>
                    </form>
                </div>
                </li>
            </ul>
          
<!-- Sidebar Navidation Menus-->
          <span class="heading">Menu (Data Entry)</span>
          <?php if( $this->session->role == "User"){?>
            
            <ul class="list-unstyled">
               <!--FASD-0-->
               <li><a href="#FASD_user" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-columns"></i>FASD </a>
                <ul id="FASD_user" class="collapse list-unstyled ">
                  <li><a href="#PersonneldropdownDropdown2" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-group"></i>HR </a></li>
                    <ul id="PersonneldropdownDropdown2" class="collapse list-unstyled ">
                      <li> <a href="<?= base_url();?>hr_dashboard"> <i class="fa fa-tachometer" aria-hidden="true"></i>Dashboard </a></li>
                      <li> <a href="<?= base_url();?>hr_add_training"> <i class="fa fa-graduation-cap" aria-hidden="true"></i>Learning and Dev't</a></li>
                      <li> <a href="<?= base_url();?>hr_ipcr"> <i class="fa fa-file" aria-hidden="true"></i>IPCR</a></li>
                      <li> <a href="#"> <i class="fa fa-trophy" aria-hidden="true"></i>Rewards and Recognition (Under Dev't)</a></li>
                    </ul>
                  </li>
                    
                  <li> <a href="<?= base_url();?>sso/rms"> <i class="fa fa-file" aria-hidden="true"></i>RMS</a></li>
                  <li> <a href="<?= base_url();?>intranet"> <i class="fa fa-file" aria-hidden="true"></i>Intranet</a></li>
                  <li> <a href="https://rms.tesdar02onlinereporting.ph/databank/auth.php?email=<?= urlencode($this->session->email); ?>" target="_blank"> <i class="fa fa-suitcase"></i>Data Bank</a></li>
                  <li> <a href="<?= base_url()?>travelorder/index.php?id=<?= $this->session->usr_id ?>" target="_blank"> <i class="fa fa-car"></i>Travel Order</a></li>
                  <li> <a href="#" target="_blank"> <i class="fa fa-suitcase"></i>Leave Application (Under Dev't)</a></li>

                  <li><a href="#PersonneldropdownDropdown3" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-download"></i>Forms </a></li>
                    <ul id="PersonneldropdownDropdown3" class="collapse list-unstyled ">
                      <li> <a href="<?= base_url()?>uploads/HRforms/REAP.docx"> <i class="fa fa-file"></i>TREAP </a></li>
                      <li> <a href="<?= base_url()?>uploads/HRforms/TDORF.docx"> <i class="fa fa-file"></i>TDORF</a></li>
                      <li> <a href="<?= base_url()?>uploads/HRforms/Coaching-Mentoring Worksheet.xlsx"> <i class="fa fa-file"></i>Coaching/Mentoring Worksheet</a></li>
                    </ul>
                  </li>

                </ul>
              </li>
              <!--FASD-0-->
            </ul>
              
          <?php }elseif($this->session->role == "Admin") {?>
            
            <ul class="list-unstyled">
               <!--FASD-0-->
               <li><a href="#FASD_user" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-columns"></i>FASD </a>
                <ul id="FASD_user" class="collapse list-unstyled ">
                  <li><a href="#PersonneldropdownDropdown2" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-group"></i>HR </a></li>
                    <ul id="PersonneldropdownDropdown2" class="collapse list-unstyled ">
                      <li> <a href="<?= base_url();?>hr_dashboard"> <i class="fa fa-tachometer" aria-hidden="true"></i>Dashboard </a></li>
                      <li> <a href="<?= base_url();?>hr_add_training"> <i class="fa fa-graduation-cap" aria-hidden="true"></i>Learning and Dev't</a></li>
                      <li> <a href="<?= base_url();?>hr_ipcr"> <i class="fa fa-file" aria-hidden="true"></i>IPCR</a></li>
                      <li> <a href="#"> <i class="fa fa-trophy" aria-hidden="true"></i>Rewards and Recognition (Under Dev't)</a></li>
                    </ul>
                  </li>
                
                  <li> <a href="<?= base_url();?>sso/rms"> <i class="fa fa-file" aria-hidden="true"></i>RMS</a></li>
                  <li> <a href="<?= base_url();?>intranet"> <i class="fa fa-file" aria-hidden="true"></i>Intranet</a></li>
                  <li> <a href="https://rms.tesdar02onlinereporting.ph/databank/auth.php?email=<?= urlencode($this->session->email); ?>" target="_blank"> <i class="fa fa-suitcase"></i>Data Bank</a></li>
                  <li> <a href="<?= base_url()?>travelorder/index.php?id=<?= $this->session->usr_id ?>" target="_blank"> <i class="fa fa-car"></i>Travel Order</a></li>
                  <li> <a href="#" target="_blank"> <i class="fa fa-suitcase"></i>Leave Application (Under Dev't)</a></li>
                  
                  <li><a href="#PersonneldropdownDropdown3" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-download"></i>Forms </a></li>
                    <ul id="PersonneldropdownDropdown3" class="collapse list-unstyled ">
                      <li> <a href="<?= base_url()?>uploads/HRforms/REAP.docx"> <i class="fa fa-file"></i>REAP </a></li>
                      <li> <a href="<?= base_url()?>uploads/HRforms/TDORF.docx"> <i class="fa fa-file"></i>TDORF</a></li>
                      <li> <a href="<?= base_url()?>uploads/HRforms/Coaching-Mentoring Worksheet.xlsx"> <i class="fa fa-file"></i>Coaching/Mentoring Worksheet</a></li>
                    </ul>
                  </li>

                </ul>
              </li>
              <!--FASD-0-->
            </ul>

            <?php if($this->session->usr_fasd == 1 || $this->session->usr_rod == 1)  { ?>

              <span class="heading">Management</span>

            <?php } ?>

              <ul class="list-unstyled">
              
                  <?php if($this->session->usr_fasd == 1) { ?>
                    <!--FASD-0-->
                      <li><a href="#FASD" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-columns"></i>FASD </a>
                        <ul id="FASD" class="collapse list-unstyled ">
                          <li><a href="#FASDSubmenu" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-group"></i>HR </a></li>
                            <ul id="FASDSubmenu" class="collapse list-unstyled ">
                              <li> <a href="<?= base_url();?>employees"> <i class="fa fa-users"></i>List of Employees </a></li>
                              <li> <a href="<?= base_url();?>hr_pillar1"> <i class="fa fa-university"></i>Pillar I </a></li>
                              <li> <a href="<?= base_url();?>hr_pillar2"> <i class="fa fa-graduation-cap" aria-hidden="true"></i>Pillar II </a></li>
                              <li> <a href="<?= base_url();?>pap"> <i class="fa fa-list-ul" aria-hidden="true"></i>Pillar III </a></li>
                              <li> <a href="<?= base_url();?>personal_information_system"> <i class="fa fa-university"></i>Personnel Information System</a></li>
                            </ul>
                          </li>
                        </ul>    
                      </li>
                    <!--FASD-->
                    <?php } ?>

                    <?php if($this->session->usr_rod == 1) {?>
                    <!--ROD-1-->
                      <li><a href="#ROD" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-columns"></i>ROD </a>
                        <ul id="ROD" class="collapse list-unstyled ">
                          <li><a href="#RODSubmenu" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-table" aria-hidden="true"></i>PMR </a></li>
                            <ul id="RODSubmenu" class="collapse list-unstyled ">
                              <li> <a href="<?= base_url();?>pap"> <i class="fa fa-list-ul" aria-hidden="true"></i>Indicators </a></li>
                            </ul>
                          </li>
                          <li><a href="#RODSubmenu1" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-graduation-cap" aria-hidden="true"></i>Scholarship </a></li>
                            <ul id="RODSubmenu1" class="collapse list-unstyled ">
                              <li><a href="<?= base_url();?>pool_of_trinees"> <i class="fa fa-users" aria-hidden="true"></i>Pool of Trainees </a></li>
                            </ul>
                          </li>
                          <li> <a href="https://lookerstudio.google.com/reporting/0b282ff3-832e-4143-a4c1-5c3a0e52db7a/page/5GcrD" target="_blank"> <i class="fa fa-gear"></i>Technical Support Report</a></li>
                        </ul>    
                      </li>
                    <!--ROD-->
                    <?php } ?>

                    <li class="<?= $users?>"> 
                      <a href="<?= base_url();?>accounts"> <i class="fa fa-users"></i>
                        Users
                      </a>
                    </li>

            <span class="heading">Notification</span>
              <ul class="list-unstyled">
                <li class="<?= $notifications; ?>"> 
                  <a href="<?= base_url();?>notifications"> <i class="fa fa-bullhorn"></i>
                    Notifications 
                  </a>
                </li>
              </ul>

            <?php } else{ ?>

              <ul class="list-unstyled">
                <!--FASD-0-->
                <li><a href="#FASD_user" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-columns"></i>FASD </a>
                  <ul id="FASD_user" class="collapse list-unstyled ">
                    <li><a href="#PersonneldropdownDropdown2" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-group"></i>HR </a></li>
                      <ul id="PersonneldropdownDropdown2" class="collapse list-unstyled ">
                        <li> <a href="<?= base_url();?>hr_dashboard" class="<?= $disabled ?>"> <i class="fa fa-tachometer" aria-hidden="true"></i>Dashboard </a></li>
                        <li> <a href="<?= base_url();?>hr_add_training" class="<?= $disabled ?>"> <i class="fa fa-graduation-cap" aria-hidden="true"></i>Learning and Dev't</a></li>
                        <li> <a href="<?= base_url();?>hr_ipcr" class="<?= $disabled ?>" > <i class="fa fa-file" aria-hidden="true"></i>IPCR</a></li>
                        <li> <a href="#"> <i class="fa fa-trophy" aria-hidden="true" ></i>Rewards and Recognition (Under Dev't)</a></li>
                        <li> <a href="#" target="_blank" class="<?= $disabled ?>"> <i class="fa fa-suitcase"></i>Leave Application (Under Dev't)</a></li>
                      </ul>
                    </li>
                    
                  <li> <a href="<?= base_url();?>sso/rms" class="<?= $disabled ?>"> <i class="fa fa-file" aria-hidden="true"></i>RMS</a></li>
                  <li> <a href="<?= base_url();?>intranet" class="<?= $disabled ?>"> <i class="fa fa-file" aria-hidden="true"></i>Intranet</a></li>
                  <li> <a href="https://rms.tesdar02onlinereporting.ph/databank/auth.php?email=<?= urlencode($this->session->email); ?>" target="_blank" class="<?= $disabled ?>"> <i class="fa fa-suitcase"></i>Data Bank</a></li>
                  <li> <a href="<?= base_url()?>travelorder/index.php?id=<?= $this->session->usr_id ?>" target="_blank" class="<?= $disabled ?>"> <i class="fa fa-car"></i class="<?= $disabled ?>">Travel Order</a></li>
                  <li> <a href="#" target="_blank" class="<?= $disabled ?>"> <i class="fa fa-suitcase"></i>Leave Application (Under Dev't)</a></li>
                    
                    <li><a href="#PersonneldropdownDropdown3" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-download"></i>Forms </a></li>
                      <ul id="PersonneldropdownDropdown3" class="collapse list-unstyled ">
                        <li> <a href="<?= base_url()?>uploads/HRforms/REAP.docx"> <i class="fa fa-file"></i>TREAP </a></li>
                        <li> <a href="<?= base_url()?>uploads/HRforms/TDORF.docx"> <i class="fa fa-file"></i>TDORF</a></li>
                        <li> <a href="<?= base_url()?>uploads/HRforms/Coaching-Mentoring Worksheet.xlsx"> <i class="fa fa-file"></i>Coaching/Mentoring Worksheet</a></li>
                      </ul>
                    </li>
                    
                  </ul>
                </li>
                <!--FASD-0-->
              </ul>

            
              <!--Access to Menus-->
              <?php if($this->session->usr_fasd == null && $this->session->usr_rod == null){}
              else{
              ?>
              <!--Access to Menus-->

              <span class="heading">Management</span>
              
              <ul class="list-unstyled">
                    <?php if($this->session->usr_fasd == 1) { ?>
                    <!--FASD-0-->
                      <li><a href="#FASD" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-columns"></i>FASD </a>
                        <ul id="FASD" class="collapse list-unstyled ">
                          <li><a href="#FASDSubmenu" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-group"></i>HR </a></li>
                            <ul id="FASDSubmenu" class="collapse list-unstyled ">
                              <li> <a href="<?= base_url();?>employees" class="<?= $disabled ?>"> <i class="fa fa-users"></i>List of Employees </a></li>
                              <li> <a href="<?= base_url();?>hr_pillar1" class="<?= $disabled ?>"> <i class="fa fa-university"></i>Pillar I </a></li>
                              <li> <a href="<?= base_url();?>hr_pillar2"> <i class="fa fa-graduation-cap" aria-hidden="true"></i>Pillar II </a></li>
                              <li> <a href="<?= base_url();?>pap" class="<?= $disabled ?>"> <i class="fa fa-list-ul" aria-hidden="true"></i>Pillar III </a></li>
                              <li> <a href="<?= base_url();?>personal_information_system" class="<?= $disabled ?>"> <i class="fa fa-university"></i>Personnel Information System</a></li>
                            </ul>
                          </li>
                        </ul>    
                      </li>
                    <!--FASD-->
                    <?php } ?>

                    <?php if($this->session->usr_rod == 1) {?>
                    <!--ROD-1-->
                      <li><a href="#ROD" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-columns"></i>ROD </a>
                        <ul id="ROD" class="collapse list-unstyled ">
                          <li><a href="#RODSubmenu" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-table" aria-hidden="true"></i>PMR </a></li>
                            <ul id="RODSubmenu" class="collapse list-unstyled ">
                              <li> <a href="<?= base_url();?>pap" class="<?= $disabled ?>"> <i class="fa fa-list-ul" aria-hidden="true"></i>Indicators </a></li>
                            </ul>
                          </li>
                          <li><a href="#RODSubmenu1" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-graduation-cap" aria-hidden="true"></i>Scholarship </a></li>
                            <ul id="RODSubmenu1" class="collapse list-unstyled ">
                              <li><a href="<?= base_url();?>pool_of_trinees" class="<?= $disabled ?>"> <i class="fa fa-users" aria-hidden="true"></i>Pool of Trainees </a></li>
                            </ul>
                          </li>
                          <?php if($this->session->role == 'Super Admin') {?>
                          <li class=""><a href="#settingsdropdownDropdownictu" aria-expanded="false" data-toggle="collapse"><i class="fa fa-laptop" aria-hidden="true"></i></i>ICT Unit</a></li>
                            <ul id="settingsdropdownDropdownictu" class="collapse list-unstyled ">
                              <li><a href="https://lookerstudio.google.com/reporting/0b282ff3-832e-4143-a4c1-5c3a0e52db7a/page/5GcrD" target="_blank" class="<?= $disabled ?>"> <i class="fa fa-tachometer" aria-hidden="true"></i></i>CO IS Dashboard</a></li>
                              <li><a href="https://lookerstudio.google.com/reporting/057d966b-6809-41c5-b1ac-66183c382579/page/ix0AE/edit" target="_blank" class="<?= $disabled ?>"> <i class="fa fa-list-ol" aria-hidden="true"></i>ICT Inventory</a></li>
                              <li><a href="https://helpdesk.tesdar02onlinereporting.ph/maintenance/view" target="_blank" class="<?= $disabled ?>"><i class="fa fa-wrench" aria-hidden="true" ></i></i>ICT Maintenance Report</a></li>
                              <li><a href="https://helpdesk.tesdar02onlinereporting.ph/maintenance/defective" target="_blank" class="<?= $disabled ?>"><i class="fa fa-bar-chart" aria-hidden="true"></i></i>ICT Maintenance Analysis</a></li>
                              <li class=""><a href="#settingsdropdownDropdownictudocs" aria-expanded="false" data-toggle="collapse" class="<?= $disabled ?>"><i class="fa fa-file-pdf-o" aria-hidden="true" ></i></i>ICT Docs</a></li>
                                <ul id="settingsdropdownDropdownictudocs" class="collapse list-unstyled ">
                                  <li><a href="https://drive.google.com/file/d/1A_MmIp8YMHoRqNtmXAkhubb5eCWbaQ8a/view?usp=sharing" target="_blank" class="<?= $disabled ?>"> <i class="fa fa-file-pdf-o" aria-hidden="true"></i></i>Maintenance Plan CY 2024</a></li>
                                  <li><a href="https://drive.google.com/file/d/10-FZoxmZTa7noqoZNEL1vkRflzX48imX/view?usp=sharing" target="_blank" class="<?= $disabled ?>"> <i class="fa fa-file-pdf-o" aria-hidden="true"></i></i>List of Interested Parties</a></li>
                                  <li><a href="https://drive.google.com/file/d/1rVsdSoeuwZs4FDvkQQJUIfY_fWbu6Pex/view?usp=drive_link" target="_blank" class="<?= $disabled ?>"> <i class="fa fa-file-pdf-o" aria-hidden="true"></i></i>ISSP 2026-2028</a></li>
                                  
                                </ul>
                              </li>
                            </ul>
                          </li>
                          <?php } ?>
                        </ul>    
                      </li>
                    <!--ROD-->
                    <?php } ?>

                    <!--FOR SUPER ADMIN AND RD-->
                      <li class="<?= $MYPA_Management_Settings; ?>"><a href="#settingsdropdownDropdown2" aria-expanded="false" data-toggle="collapse"> <i class="fa fa fa-cogs"></i>Settings </a></li>
                        <ul id="settingsdropdownDropdown2" class="collapse list-unstyled ">
                          <li class="<?= $auth_logs?>"><a href="<?= base_url();?>auth_logs" class="<?= $disabled ?>"><i class="fa fa-history" aria-hidden="true"></i> Auth Logs</a></li>
                          <li class="<?= $unit_user_admin; ?>"> <a href="<?= base_url();?>bug_report" class="<?= $disabled ?>"> <i class="fa fa-bug"></i>Bug Reports <span class="badge bg-red badge-corner"><i class="fa fa-file-code-o"></i></span></a></li>
                          <li class="<?= $unit_user_admin; ?>"> <a href="<?= base_url();?>unit_user_admin" class="<?= $disabled ?>"> <i class="fa fa-columns"></i>Divisions </a></li>
                          <li class="<?= $operating_units; ?>"> <a href="<?= base_url();?>operating_units" class="<?= $disabled ?>"> <i class="fa fa-building"></i>Operating Units </a></li>
                          <li><a href="<?= base_url();?>extra" class="<?= $disabled ?>"><i class="fa fa-cog" aria-hidden="true"></i>System Parameters <span class="badge bg-red badge-corner"></span></a></li>
                        </ul>
                      </li>

                      <li class="<?= $users?>"> 
                        <a href="<?= base_url();?>accounts" class="<?= $disabled ?>"> <i class="fa fa-users"></i>
                          Users
                        </a>
                      </li>
                    <!--FOR SUPER ADMIN AND RD-->      
                  </ul>
              
              <?php } ?>

              <span class="heading">Notification</span>
              <ul class="list-unstyled">
                <li class="<?= $notifications; ?>"> 
                  <a href="<?= base_url();?>notifications" class="<?= $disabled ?>"> <i class="fa fa-bullhorn"></i>Notifications 
                  </a>
                </li>
              </ul>
            <?php } ?>
        </nav>
          
        

        