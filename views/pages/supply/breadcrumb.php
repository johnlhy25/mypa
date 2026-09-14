<!-- Breadcrumb-->
        <div class="breadcrumb-holder container-fluid no-margin-bottom">
            <ul class="breadcrumb">

            <?php if($this->uri->segment(1)=="dashboard"){?>
              <li class="breadcrumb-item"><a href="<?= base_url();?>dashboard_supply">Home</a></li>
            <?php }?>
            <?php if($this->uri->segment(1)=="request_supply"){?>
              <li class="breadcrumb-item"><a href="<?= base_url();?>dashboard_supply">Home</a></li>
              <li class="breadcrumb-item active">Request Supply</li>
            <?php }?>
            
            </ul>
            
        </div>