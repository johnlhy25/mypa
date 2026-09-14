<?php 
if( $this->session->logged_in){
  if( $this->session->role == 'Accre'){
    redirect (base_url().'Guest');
  }else{?>
  <div id="content-inner-plantilla" class="content-inner">
<!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Pool of Trainees</h2>
            </div>
          </header>
<!-- Page Header-->

<!-- Breadcrumb-->
        <?php require_once('breadcrumb.php'); ?>
<!-- Breadcrumb-->

<!--div col lg 12-->
      <div class="col-lg-12 mt-3">
        <div class="card bg-white">
          <div class="card-close">
            <div class="dropdown">
              <button type="button" id="closeCard3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                  <div aria-labelledby="closeCard3" class="dropdown-menu dropdown-menu-right has-shadow">
                  </div>
            </div>
          </div>
          <div class="card-header d-flex align-items-center">
					  <h1> <span class="badge bg-blue badge-corner"><i class="fa fa-desktop" aria-hidden="true"></i></span> Pool of Trainees</h1>
				  </div>
          <div class="card-body">

            <!--Operating Units-->

            <?php if($this->session->role == 'Super Admin'){
               $disabled1 = '';
               $disabled2 = '';
               $disabled3 = '';
               $disabled4 = '';
               $disabled5 = '';
               $disabled6 = '';
               $disabled7 = '';
               $disabled8 = '';
               $disabled9 = '';
               $disabled10 = '';
               $disabled11 = '';
               $disabled12 = '';
               $disabled13 = '';
               $disabled14 = '';
               $disabled15 = '';

            }elseif($this->session->role == 'Admin'){
              $id = $this->session->ous_id;
              $disabled1 = 'disabled';
              $disabled2 = 'disabled';
              $disabled3 = 'disabled';
              $disabled4 = 'disabled';
              $disabled5 = 'disabled';
              $disabled6 = 'disabled';
              $disabled7 = 'disabled';
              $disabled8 = 'disabled';
              $disabled9 = 'disabled';
              $disabled10 = 'disabled';
              $disabled11 = 'disabled';
              $disabled12 = 'disabled';
              $disabled13 = 'disabled';
              $disabled14 = 'disabled';
              $disabled15 = 'disabled';
              switch ($id) {
                case "1":
                  $disabled1 = '';
                  break;
                case "2":
                  $disabled2 = '';
                  break;
                case "3":
                  $disabled3 = '';
                  break;
                case "4":
                  $disabled4 = '';
                  break;
                case "5":
                  $disabled5 = '';
                  break;
                case "6":
                  $disabled6 = '';
                  break;
                case "7":
                  $disabled7 = '';
                  break;
                case "8":
                  $disabled8 = '';
                  break;
                case "9":
                    $disabled9 = '';
                    break;
                case "10":
                  $disabled10 = '';
                  break;
                case "11":
                  $disabled11 = '';
                  break;  
                case "12":
                  $disabled12 = '';
                  break;  
                case "13":
                  $disabled13 = '';
                  break;  
                case "14":
                  $disabled14 = '';
                  break;  
                case "15":
                  $disabled15 = '';
                  break;    
                
              }
            }?>
            
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link <?= $disabled3 ?>" id="home-tab" data-toggle="tab" href="#pobatanes_div" data-value="po_batanes_target" role="tab" aria-controls="home"
                  aria-selected="true">PO Batanes</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?= $disabled3 ?>" id="home-tab" data-toggle="tab" href="#pobatanes_div" data-value="ptc_batanes_target" role="tab" aria-controls="home"
                  aria-selected="true">PTC Batanes</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?= $disabled2 ?>" id="home-tab" data-toggle="tab" href="#pocagayan_div" data-value="po_cagayan_target" role="tab" aria-controls="home"
                  aria-selected="true">PO Cagayan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?= $disabled2 ?>" id="home-tab" data-toggle="tab" href="#pocagayan_div" data-value="ptc_cagayan_target" role="tab" aria-controls="home"
                  aria-selected="true">PTC Cagayan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?= $disabled10 ?>" id="home-tab" data-toggle="tab" href="#pocagayan_div" data-value="api_target" role="tab" aria-controls="home"
                  aria-selected="true">API</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?= $disabled12 ?>" id="home-tab" data-toggle="tab" href="#pocagayan_div" data-value="lit_target" role="tab" aria-controls="home"
                  aria-selected="true">LIT</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?= $disabled15 ?>" id="home-tab" data-toggle="tab" href="#pocagayan_div" data-value="rtc_target" role="tab" aria-controls="home"
                  aria-selected="true">RTC</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?= $disabled4 ?>" id="home-tab" data-toggle="tab" href="#poisabela_div" data-value="po_isabela_target" role="tab" aria-controls="home"
                  aria-selected="true">PO Isabela</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?= $disabled4 ?>" id="home-tab" data-toggle="tab" href="#poisabela_div" data-value="ptc_isabela_target" role="tab" aria-controls="home"
                  aria-selected="true">PTC Isabela</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?= $disabled14 ?>" id="home-tab" data-toggle="tab" href="#poisabela_div" data-value="isat_isabela_target" role="tab" aria-controls="home"
                  aria-selected="true">ISAT</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?= $disabled11 ?>" id="home-tab" data-toggle="tab" href="#poisabela_div" data-value="sicat_isabela_target" role="tab" aria-controls="home"
                  aria-selected="true">SICAT</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?= $disabled8 ?>" id="home-tab" data-toggle="tab" href="#ponv_div" data-value="po_nv_target" role="tab" aria-controls="home"
                  aria-selected="true">PO Nueva Viscaya</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?= $disabled8 ?>" id="home-tab" data-toggle="tab" href="#ponv_div" data-value="ptc_nv_target" role="tab" aria-controls="home"
                  aria-selected="true">PTC Nueva Viscaya</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?= $disabled13 ?>" id="home-tab" data-toggle="tab" href="#ponv_div" data-value="nvpi_target" role="tab" aria-controls="home"
                  aria-selected="true">NVPI</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?= $disabled7 ?>" id="home-tab" data-toggle="tab" href="#poquirino_div" data-value="po_quirino_target" role="tab" aria-controls="home"
                  aria-selected="true">PO Quirino</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?= $disabled7 ?>" id="home-tab" data-toggle="tab" href="#poquirino_div" data-value="ptc_quirino_target" role="tab" aria-controls="home"
                  aria-selected="true">PTC Quirino</a>
              </li>
            </ul>

            <div class="tab-content" id="myTabContent">

<!--I. PO Batanes-->
              <div class="tab-pane fade show" id="pobatanes_div" role="tabpanel" aria-labelledby="home-tab">
                <div class="col-md-12">
                  <div class = "embed-responsive embed-responsive-16by9">
                      <iframe class = "embed-responsive-item" 
                        src = "https://docs.google.com/spreadsheets/d/e/2PACX-1vQv78XjEEl6oAMUgtJFLbd7d6RRjrlZj5FLRcvxQGOGtWIu93woxBvivc2e7GcigkNP_vg_NcmTT1sv/pubhtml?gid=0&amp;single=true&amp;widget=true&amp;headers=false"></iframe>
                  </div>
                </div><!--Col MD 12-->
              </div>
<!--I. PO Batanes  -->

<!--I. PO Cagayan-->
              <div class="tab-pane fade show" id="pocagayan_div" role="tabpanel" aria-labelledby="home-tab">
                <div class="col-md-12">
                  <div class = "embed-responsive embed-responsive-16by9">
                      <iframe class = "embed-responsive-item" 
                        src = "https://docs.google.com/spreadsheets/d/e/2PACX-1vTvodApwe2GmXSFqcBvk0vQPCoI7GgrVwyT64sflRea12F981_cFj9RIPmLpl2Lr7dnzyVdMDSqh6e4/pubhtml?gid=0&single=true&amp;widget=true&amp;headers=false"></iframe>
                  </div>
                </div><!--Col MD 12-->
              </div>
<!--I. PO Cagayan  -->

<!--I. PO Isabela-->
              <div class="tab-pane fade show" id="poisabela_div" role="tabpanel" aria-labelledby="home-tab">
                <div class="col-md-12">
                  <div class = "embed-responsive embed-responsive-16by9">
                      <iframe class = "embed-responsive-item" 
                        src = "https://docs.google.com/spreadsheets/d/e/2PACX-1vSXzfMasVvnHK_xAZ-aL3SOubWTPSd8NbWptFwza1bAlfRgCLyoz69RgU_VHiDQK2xrIsTZRjavkDCB/pubhtml?gid=0&single=true&amp;widget=true&amp;headers=false"></iframe>
                  </div>
                </div><!--Col MD 12-->
              </div>
<!--I. PO Isabela  -->

<!--I. PO Nueva Vizcaya-->
              <div class="tab-pane fade show" id="ponv_div" role="tabpanel" aria-labelledby="home-tab">
                <div class="col-md-12">
                  <div class = "embed-responsive embed-responsive-16by9">
                      <iframe class = "embed-responsive-item" 
                        src = "https://docs.google.com/spreadsheets/d/e/2PACX-1vSOFvrKb7sDISg1DWygx9NV63_FFb3bIXOj5JvURbZTenofm_mjhI3GR0q8-neaG2ITdceqms65H9Ov/pubhtml?gid=0&single=true&amp;widget=true&amp;headers=false"></iframe>
                  </div>
                </div><!--Col MD 12-->
              </div>
<!--I. PO Nueva Vizcaya  -->

<!--I. PO Quirino-->
              <div class="tab-pane fade show" id="poquirino_div" role="tabpanel" aria-labelledby="home-tab">
                <div class="col-md-12">
                  <div class = "embed-responsive embed-responsive-16by9">
                      <iframe class = "embed-responsive-item" 
                        src = "https://docs.google.com/spreadsheets/d/e/2PACX-1vQdapbifFx7rKvGoeewnwjGLjVkw-PTJIzbUv6526iPlCxuxm-AscO_Cl7r4tjsFO-8VGv2gjP3DygB/pubhtml?gid=0&single=true&amp;widget=true&amp;headers=false"></iframe>
                  </div>
                </div><!--Col MD 12-->
              </div>
<!--I. PO Nueva Vizcaya -->
              
            </div> 
            <!--Operating Units-->
          </div>
        </div>    
      </div>
<!--div col lg 12-->



  <?php }?>
<?php }else{
redirect (base_url());
}?>
