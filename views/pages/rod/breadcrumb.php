<!-- Breadcrumb-->
        <div class="breadcrumb-holder container-fluid no-margin-bottom">

            <ul class="breadcrumb">
              <?php if($this->uri->segment(1)=="pap"){?>
                <li class="breadcrumb-item"><a href="<?= base_url();?>dashboard">Home</a></li>
                <li class="breadcrumb-item active">Performance Monitoring Report</li>
              <?php }?>

              <?php if($this->uri->segment(1)=="pool_of_trinees"){?>
                <li class="breadcrumb-item"><a href="<?= base_url();?>dashboard">Home</a></li>
                <li class="breadcrumb-item active">Pool of Trainees</li>
              <?php }?>
            </ul> 
        </div>