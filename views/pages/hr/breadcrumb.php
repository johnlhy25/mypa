<!-- Breadcrumb-->
        <div class="breadcrumb-holder container-fluid no-margin-bottom">

            <ul class="breadcrumb">
              <?php if($this->uri->segment(1)=="hr_dashboard"){?>
                <li class="breadcrumb-item"><a href="<?= base_url();?>hr_dashboard">Home</a></li>
                <script>
                  $(document).ready(function() {
                      // Check if modal should be displayed
                      var modalShown = localStorage.getItem('modalShown');
                      //console.log('modalShown:', modalShown); // Log the current value of modalShown to the console

                      if (modalShown == "false") {
                          // Show the modal with ID 'flag-raising-message'
                          $('#flag-raising-message').modal('show');

                          // Set a flag in local storage to indicate the modal has been shown
                          localStorage.setItem('modalShown', 'true');
                      }

                      // Logout Button Click Event
                      $('#logoutButton').click(function() {
                          // Reset the modalShown flag to false on logout
                          localStorage.setItem('modalShown', 'false');

                          // Perform logout action (e.g., redirect to logout page)
                          // Example: window.location.href = '/logout'; // Redirect to logout page
                      });
                  });
                </script>
              <?php }?>
              <?php if($this->uri->segment(1)=="hr_add_training"){?>
                <li class="breadcrumb-item"><a href="<?= base_url();?>hr_dashboard">Home</a></li>
                <li class="breadcrumb-item active">List of Learning and Development Interventions/Training Programs</li>
              <?php }?>
              <?php if($this->uri->segment(1)=="hr_pillar1"){?>
                <li class="breadcrumb-item"><a href="<?= base_url();?>hr_dashboard">Home</a></li>
                <li class="breadcrumb-item active">Recruitment Selection and Placement (RSP)</li>
              <?php }?>
              <?php if($this->uri->segment(1)=="hr_pillar2"){?>
                <li class="breadcrumb-item"><a href="<?= base_url();?>hr_dashboard">Home</a></li>
                <li class="breadcrumb-item active">List of Learning and Development</li>
              <?php }?>
              <?php if($this->uri->segment(1)=="list_of_learning_and_development"){?>
                <li class="breadcrumb-item"><a href="<?= base_url();?>hr_dashboard">Home</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url();?>hr_pillar2">Pillar II</a></li>
                <li class="breadcrumb-item">List of Learning and Development Attended</li>
                <li class="breadcrumb-item active"><?= $year ?></li>
              <?php }?>
              <?php if($this->uri->segment(1)=="employees"){?>
                <li class="breadcrumb-item"><a href="<?= base_url();?>hr_dashboard">Home</a></li>
                <li class="breadcrumb-item active">List of Registered Employees</li>
              <?php }?>
              <?php if($this->uri->segment(1)=="add_training_admin"){?>
                <li class="breadcrumb-item"><a href="<?= base_url();?>hr_dashboard">Home</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url();?>employees">List of Registered Employees</a></li>
                <li class="breadcrumb-item active"><?= $usr_name ?></li>
                <li class="breadcrumb-item active">Add Training</li>
              <?php }?>
              <?php if($this->uri->segment(1)=="hr_report"){?>
                <li class="breadcrumb-item"><a href="<?= base_url();?>hr_dashboard">Home</a></li>
                <li class="breadcrumb-item active">Learning and Development (L&D) Reports</li>
              <?php }?>
              <?php if($this->uri->segment(1)=="filtered_list_of_learning_and_development"){?>
                <li class="breadcrumb-item"><a href="<?= base_url();?>hr_dashboard">Home</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url();?>hr_pillar2">Pillar II</a></li>
                <li class="breadcrumb-item active">List of Learning and Development Attended</li>
                <li class="breadcrumb-item active"><?= $year ?></li>
              <?php }?>
              <?php if($this->uri->segment(1)=="list_of_training_inv"){?>
                <li class="breadcrumb-item"><a href="<?= base_url();?>hr_dashboard">Home</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url();?>hr_pillar2">Pillar II</a></li>
                <li class="breadcrumb-item active">Monitoring of Training Program Invitations / Attendnace to Training</li>
                <li class="breadcrumb-item active"><?= $year ?></li>
              <?php }?>
              <?php if($this->uri->segment(1)=="list_of_training_inv_foreign"){?>
                <li class="breadcrumb-item"><a href="<?= base_url();?>hr_dashboard">Home</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url();?>hr_pillar2">Pillar II</a></li>
                <li class="breadcrumb-item active">Monitoring of Foreign Training Program Invitations / Attendnace to Training</li>
                <li class="breadcrumb-item active"><?= $year ?></li>
              <?php }?>
              <?php if($this->uri->segment(1)=="list_of_training_inv_national"){?>
                <li class="breadcrumb-item"><a href="<?= base_url();?>hr_dashboard">Home</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url();?>hr_pillar2">Pillar II</a></li>
                <li class="breadcrumb-item active">Monitoring of National Training Program Invitations / Attendnace to Training</li>
                <li class="breadcrumb-item active"><?= $year ?></li>
              <?php }?>
              <?php if($this->uri->segment(1)=="list_of_training_inv_local"){?>
                <li class="breadcrumb-item"><a href="<?= base_url();?>hr_dashboard">Home</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url();?>hr_pillar2">Pillar II</a></li>
                <li class="breadcrumb-item active">Monitoring of Local Training Program Invitations / Attendnace to Training</li>
                <li class="breadcrumb-item active"><?= $year ?></li>
              <?php }?>
              <?php if($this->uri->segment(1)=="add_nominee"){?>
                <li class="breadcrumb-item"><a href="<?= base_url();?>hr_dashboard">Home</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url();?>hr_pillar2">Pillar II</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url();?>list_of_training_inv/<?= $year?>">Monitoring of Training Program Invitations / Attendnace to Training <b>FY <?= $year ?></b></a></li>
                <li class="breadcrumb-item active">Memorandum No: <b><?= $memo_no ?></b> [<?= $trn_title ?>]</li>
                <li class="breadcrumb-item active">Add Nominee/s</li>
              <?php }?>
              <?php if($this->uri->segment(1)=="view_nominee"){?>
                <li class="breadcrumb-item"><a href="<?= base_url();?>hr_dashboard">Home</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url();?>hr_pillar2">Pillar II</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url();?>list_of_training_inv/<?= $year?>">Monitoring of Training Program Invitations / Attendnace to Training <b>FY <?= $year ?></b></a></li>
                <li class="breadcrumb-item active">Memorandum No: <b><?= $memo_no ?></b> [<?= $trn_title ?>]</li>
                <li class="breadcrumb-item active">List of Nominee/s</li>
              <?php }?>
              <?php if($this->uri->segment(1)=="list_of_vacant_position"){?>
                <li class="breadcrumb-item"><a href="<?= base_url();?>hr_dashboard">Home</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url();?>hr_pillar1">Pillar I</a></li>
                <li class="breadcrumb-item active">List of Vacant Positions<b> / FY <?= $year ?></b></li>
              <?php }?>
              <?php if($this->uri->segment(1)=="hr_pillar1_notifications"){?>
                <li class="breadcrumb-item"><a href="<?= base_url();?>hr_dashboard">Home</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url();?>hr_pillar1">Pillar I</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url();?>list_of_vacant_position/<?= $yearxs; ?>">List of Vacant Positions <b>FY <?= $yearxs; ?></b></a></li>
                <li class="breadcrumb-item active">Applicants</li>
              <?php }?>
              <?php if($this->uri->segment(1)=="personal_information_system"){?>
                <li class="breadcrumb-item"><a href="<?= base_url();?>hr_dashboard">Home</a></li>
                <li class="breadcrumb-item active">Personnel Information System</a></li>
              <?php }?>
              <?php if($this->uri->segment(1)=="list_of_plantilla_positions"){?>
                <li class="breadcrumb-item"><a href="<?= base_url();?>hr_dashboard">Home</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url();?>hr_pillar1">Pillar I</a></li>
                <li class="breadcrumb-item active">Plantilla Positions</a></li>
              <?php }?>
              <?php if($this->uri->segment(1)=="view_applicants"){?>
                <li class="breadcrumb-item"><a href="<?= base_url();?>hr_dashboard">Home</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url();?>hr_pillar1">Pillar I</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url();?>list_of_plantilla_positions">Plantilla Positions</a></li>
                <li class="breadcrumb-item active">Applicants</a></li>
              <?php }?>
              <?php if($this->uri->segment(1)=="hr_ipcr"){?>
                <li class="breadcrumb-item"><a href="<?= base_url();?>hr_dashboard">Home</a></li>
                <li class="breadcrumb-item active">IPCR</li>
              <?php }?>
              <?php if($this->uri->segment(1)=="intranet"){?>
                <li class="breadcrumb-item"><a href="<?= base_url();?>hr_dashboard">Home</a></li>
                <li class="breadcrumb-item active">Intranet</li>
              <?php }?>
            </ul> 
        </div>