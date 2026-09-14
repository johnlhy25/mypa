<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CSU-OAS| Dashboard</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <meta http-equiv="refresh" content="7200;url=<?= base_url();?>logout" />
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="<?= base_url();?>assets/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="<?= base_url();?>assets/vendor/font-awesome/css/font-awesome.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="<?= base_url();?>assets/css/fontastic.css">
    <!-- Google fonts - Poppins -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="<?= base_url();?>assets/css/style.red.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="<?= base_url();?>assets/css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="<?= base_url();?>assets/img/logo.png">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  
  <body oncontextmenu="return false">
    <div class="page">
	
      <!-- Main Navbar-->
      <header class="header">
        <nav class="navbar">
          <!-- Search Box-->
          <div class="search-box">
            <button class="dismiss"><i class="icon-close"></i></button>
            <form id="searchForm" action="#" role="search">
              <input type="search" placeholder="What are you looking for..." class="form-control">
            </form>
          </div>

          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <!-- Navbar Header-->
              <div class="navbar-header">
                <?php if($this->session->role == 'Accre'){ ?>
                <!-- Navbar Brand --><a href="<?= base_url();?>accreditor" class="navbar-brand d-none d-sm-inline-block">
                <?php }else{ ?>
                <!-- Navbar Brand --><a href="<?= base_url();?>dashboard" class="navbar-brand d-none d-sm-inline-block">
                <?php }?>
                  <div class="brand-text d-none d-lg-inline-block"><img src="<?= base_url();?>assets/img/logo.png" width="24px" height="24px"> <strong><span style="color: #f4fe4f;" >CSU </span> | Online Accreditation System</strong></div>
                  <div class="brand-text d-none d-sm-inline-block d-lg-none"><strong>CSU|OAS</strong></div></a>
                <!-- Toggle Button--><!--a id="toggle-btn" href="#" class="menu-btn active"><span></span><span></span><span></span></a-->
              </div>
              <!-- Navbar Menu -->
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
              <!-- Logout    -->
                <li class="nav-item"><a href="<?= base_url();?>logout" class="nav-link logout"> <span class="d-none d-sm-inline">Logout</span><i class="fa fa-sign-out"></i></a></li>
                
              </ul>

            </div>
          </div>

        </nav>
      </header>
      <img src="<?= base_url();?>assets/img/Banner.jpg" class="mx-auto d-block"  width="100%">
      <div class="breadcrumb-holder container-fluid page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">
                Welcome: <?= $this->session->name; ?>
              </h2>
            </div>
      </div>
      

       
	  
      