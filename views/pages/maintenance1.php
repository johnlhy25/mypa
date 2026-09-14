<?php 
if( $this->session->logged_in){
  if( $this->session->role == 'Accre'){
    redirect (base_url().'Guest');
  }else{?>
  <div id="content-inner-plantilla" class="content-inner">
<!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Performance Monitoring Report</h2>
            </div>
          </header>
<!-- Page Header-->

<!-- Breadcrumb-->
        <?php require_once('breadcrumb.php'); ?>
<!-- Breadcrumb-->

<style>

    .container {
      width: 90%;
      max-width: 800px;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .advisory-box {
      background-color: #fff3cd;
      color: #856404;
      border: 1px solid #ffeeba;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      display: flex;
      align-items: flex-start;
      gap: 20px;
      width: 100%;
    }

    .advisory-icon {
      font-size: 36px;
      margin-top: 6px;
    }

    .advisory-text h2 {
      font-size: 18px;
      margin: 0;
      text-align: justify;
    }

    @media (max-width: 600px) {
      .advisory-box {
        flex-direction: column;
        text-align: center;
      }

      .advisory-text h2 {
        text-align: justify;
      }

      .advisory-icon {
        font-size: 30px;
        margin: 0 auto;
      }
    }
  </style>

  <div class="container">
    <div class="advisory-box mt-3">
      <div class="advisory-icon">
        <i class="fa fa-exclamation-triangle"></i>
      </div>
      <div class="advisory-text">
        <h2>Advisory: System maintenance is currently in progress. All concerned are requested to refrain from accessing the page until the process has been successfully completed.</h2>
      </div>
    </div>
  </div>

  <?php }?>
<?php }else{
redirect (base_url());
}?>
