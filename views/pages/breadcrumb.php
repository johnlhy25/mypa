<!-- Breadcrumb-->
        <div class="breadcrumb-holder container-fluid no-margin-bottom">
            <ul class="breadcrumb">

            <?php if($this->uri->segment(1)=="dashboard"){?>
              <li class="breadcrumb-item"><a href="<?= base_url();?>dashboard">Home</a></li>
            <?php }?>
            <?php if($this->uri->segment(1)=="unit_user"){?>
              <li class="breadcrumb-item"><a href="<?= base_url();?>dashboard">Home</a></li>
              <li class="breadcrumb-item active">Divisions</li>
            <?php }?>
            <?php if($this->uri->segment(1)=="notifications"){?>
              <li class="breadcrumb-item"><a href="<?= base_url();?>dashboard">Home</a></li>
              <li class="breadcrumb-item active">Notifications</li>
            <?php }?>
            <?php if($this->uri->segment(1)=="unit_user_document"){?>
              <li class="breadcrumb-item"><a href="<?= base_url();?>dashboard">Home</a></li>
              <li class="breadcrumb-item"><a href="<?= base_url();?>unit_user">Units</a></li>
              <li class="breadcrumb-item active"><?= $unit_desc; ?>: Documents</li>
            <?php }?>
            <?php if($this->uri->segment(1)=="unit_user_document_add"){?>
              <li class="breadcrumb-item"><a href="<?= base_url();?>dashboard">Home</a></li>
              <li class="breadcrumb-item"><a href="<?= base_url();?>unit_user">Units</a></li>
              <li class="breadcrumb-item"><a href="<?= base_url();?><?php echo $back_link;?>"><?= $unit?>: Documents</a></li>
              <li class="breadcrumb-item active">Add Document</li>
            <?php }?>
            <?php if($this->uri->segment(1)=="categories"){?>
              <li class="breadcrumb-item"><a href="<?= base_url();?>dashboard">Home</a></li>
              <li class="breadcrumb-item active">Quarters</li>
            <?php }?>
            <?php if($this->uri->segment(1)=="operating_units"){?>
              <li class="breadcrumb-item"><a href="<?= base_url();?>dashboard">Home</a></li>
              <li class="breadcrumb-item active">Operating Units</li>
            <?php }?>
            <?php if($this->uri->segment(1)=="unit_admin"){?>
              <li class="breadcrumb-item"><a href="<?= base_url();?>dashboard">Home</a></li>
              <li class="breadcrumb-item"><a href="<?= base_url();?>operating_units">Operating Units</a></li>
              <li class="breadcrumb-item active"><?= $ous_desc?></li>
              <li class="breadcrumb-item active">Divisions</li>
            <?php }?>
            <?php if($this->uri->segment(1)=="unit_user_document_admin"){?>
              <li class="breadcrumb-item"><a href="<?= base_url();?>dashboard">Home</a></li>
              <li class="breadcrumb-item"><a href="<?= base_url();?>operating_units">Operating Units</a></li>
              <li class="breadcrumb-item active"><?= $ous_desc?></li>
              <li class="breadcrumb-item"><a href="<?= base_url();?>unit_admin/operating-units-<?= $ous_id?>-<?= $ous_desc?>">Divisions</a></li>
              <li class="breadcrumb-item active"><?= $unit_desc; ?>: Documents</li>
            <?php }?>
            <?php if($this->uri->segment(1)=="unit_user_document_add_admin"){?>
              <li class="breadcrumb-item"><a href="<?= base_url();?>dashboard">Home</a></li>
              <li class="breadcrumb-item"><a href="<?= base_url();?>operating_units">Operating Units</a></li>
              <li class="breadcrumb-item active"><?= $ous_desc?></li>
              <li class="breadcrumb-item"><a href="<?= base_url();?>unit_admin/operating-units-<?= $ous_id?>-<?= $ous_desc?>">Divisions</a></li>
              <li class="breadcrumb-item"><a href="<?= base_url();?>unit_user_document_admin/<?= $unit?>-<?= $unit_id?>-<?= $ous_id?>-<?= $ous_desc?>"><?= $unit?> Documents</a></li>
              <li class="breadcrumb-item active"><?= $year.': '.$cat_desc; ?></li>  
              <li class="breadcrumb-item active">Add Document</li>  
            <?php }?>
            <?php if($this->uri->segment(1)=="unit_user_admin"){?>
              <li class="breadcrumb-item"><a href="<?= base_url();?>dashboard">Home</a></li>
              <li class="breadcrumb-item active">Divisions</li>
            <?php }?>
            <?php if($this->uri->segment(1)=="user_profile"){?>
              <li class="breadcrumb-item"><a href="<?= base_url();?>dashboard">Home</a></li>
              <li class="breadcrumb-item active">User's Profile</li>
            <?php }?>
            <?php if($this->uri->segment(1)=="accounts"){?>
              <li class="breadcrumb-item"><a href="<?= base_url();?>dashboard">Home</a></li>
              <li class="breadcrumb-item active">Accounts</li>
            <?php }?>
            <?php if($this->uri->segment(1)=="results"){?>
              <li class="breadcrumb-item"><a href="<?= base_url();?>dashboard">Home</a></li>
              <li class="breadcrumb-item active">Results</li>
            <?php }?>
            <?php if($this->uri->segment(1)=="auth_logs"){?>
              <li class="breadcrumb-item"><a href="<?= base_url();?>dashboard">Home</a></li>
              <li class="breadcrumb-item active">Auth Logs</li>
            <?php }?>
            <?php if($this->uri->segment(1)=="extra"){?>
              <li class="breadcrumb-item"><a href="<?= base_url();?>dashboard">Home</a></li>
              <li class="breadcrumb-item active">System Parameters</li>
            <?php }?>
            
            </ul>

            
            
        </div>