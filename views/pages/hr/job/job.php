<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="“TESDA, as an Equal Opportunity agency, encourages a more diverse and inclusive workforce. Hence, applicants will not be discriminated on account of gender, sexual orientation, civil status, disability, religion, ethnicity, or political affiliation, provided, however that they meet the minimum requirements of the position to be filled”.">
    <meta name="author" content="John Lee P. Santiago">
    <meta name="keywords" content="TESDA DOS Job Portal, TESDA Region 02 Job Portal, TESAD Online Application Form">

    <!-- Title Page-->
    <title>TESDA DOS: Job Portal</title>

    <!-- Open Graph-->
    <meta property="og:title" content="TESDA DOS Integrated System (TDIS)">
    <meta property="og:site_name" content="TESDA DOS Integrated System (TDIS)">
    <meta property="og:url" content="<?= base_url();?>">
    <meta property="og:description" content="TESDA DOS Integrated System (TDIS) is a one-stop application that provides different TESDA services in one place.">
    <meta property="og:type" content="website">
    <meta property="og:image" content="<?= base_url();?>assets/img/OG.png">

    <!-- Favicon-->
    <link rel="shortcut icon" href="<?= base_url();?>assets/img/Logo.png">

    <!-- Fontfaces CSS-->
    <link href="<?= base_url()?>jobportal/css/font-face.css" rel="stylesheet" media="all">
    <link href="<?= base_url()?>jobportal/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url()?>jobportal/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url()?>jobportal/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="<?= base_url()?>jobportal/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="<?= base_url()?>jobportal/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url()?>jobportal/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url()?>jobportal/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="<?= base_url()?>jobportal/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url()?>jobportal/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="<?= base_url()?>jobportal/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url()?>jobportal/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?= base_url()?>jobportal/css/theme.css" rel="stylesheet" media="all">

    <!-- Jquery JS-->
    <script src="<?= base_url()?>jobportal/vendor/jquery-3.2.1.min.js"></script>

   <!-- DataTables-->
   <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
   <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>  
   
    <!-- Captcha-->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    

   

</head>
<body class="animsition">
<!--FB-->
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v17.0" nonce="wOL3VvKV"></script>
<!--FB-->
    <div class="page-wrapper">
        <!-- HEADER DESKTOP-->
        <header class="header-desktop4">
            <div class="container">
                <div class="header4-wrap">
                    <div class="header__logo">
                        <a href="#">
                            <img src="<?= base_url()?>jobportal/images/icon/logo-blue.png" alt="Logo" />
                        </a>
                    </div>
                    <div class="header__tool">
                        
                    </div>
                </div>
            </div>
        </header>
        <!-- END HEADER DESKTOP -->

        <!-- WELCOME-->
        <section class="welcome2 p-t-40 p-b-55" style="background-color: #01579b;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="welcome2-inner m-t-40">
                            <div class="welcome2-greeting">
                                <h1 class="title-6">TESDA DOS
                                    <span>Job Portal</span></h1>
                                <p align="justify" style="padding-right:50px;color:#bdbdbd">“TESDA, as an Equal Opportunity agency, encourages a more diverse and inclusive workforce. Hence, applicants will not be discriminated on account of gender, sexual orientation, civil status, disability, religion, ethnicity, or political affiliation, provided, however that they meet the minimum requirements of the position to be filled”.</p>
                                <p align="justify" style="padding-right:50px; padding-top:10px;color:#bdbdbd">The accomplished form shall be treated with outmost confidentiality and shall be used exclusively for the recruitment and selection process.</p>
                            </div>
                            <form class="form-header form-header2 m-t-40" method="post" id="search_form_applicant">
                                <input class="au-input au-input--w435" type="text" name="search_form_applicant" placeholder="Search the status of your application." required>
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END WELCOME-->

        <!-- PAGE CONTENT-->
        <div class="page-container3">
            <section>
                <div class="container p-t-30">
                    <div class="row">
                        <div class="col-xl-12">
                            <!-- PAGE CONTENT-->
                            <div class="page-content">
                                <div class="row">
                                    
                                    <!-- DATA TABLE-->
                                    <div class="table-responsive m-t-40 m-b-10">
                                        <table id="vacant_positions_open_landing_table" class="table table-borderless table-data3">
                                            <thead style="background-color: #01579b;">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Location</th>
                                                    <th>Position Title</th>
                                                    <th>Plantilla Item No.</th>
                                                    <th>Salary Grade</th>
                                                    <th>Posting Date</th>
                                                    <th>Closing Date</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody id="vacant_positions_open_landing">
                                                
                                               
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- END DATA TABLE -->

                                </div>
                            </div>
                            <!-- END PAGE CONTENT-->
                        </div>
                    </div>
                </div>

                 <!-- COPYRIGHT-->
                <section class="p-t-10 p-b-10">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>&copy 2022 - <?php echo date('Y')?> <b>TESDA DOS</b>. Site developed and managed with <i class="fa fa-heart"></i> by <strong>TESDA DOS ICTU</strong>. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- END COPYRIGHT-->

                <!-- modal static applicant -->
                <?php include("applicant.php");?>
                <!-- end modal static applicant -->

                <!-- modal static qualification standard -->
                     <?php include("qualification_standard.php");?>
                <!-- end modal static qualification standard -->

                <!-- modal application status -->
                <?php include("app_status.php");?>
                <!-- end application status -->

                <!-- modal application status false -->
                <?php include("app_status_false.php");?>
                <!-- end application status false -->
               

            </section>
        </div>
        <!-- END PAGE CONTENT  -->

        <script>
            $(document).ready(function () {

            //-----------------AJAX-------------------------------         
            show_vacant_position(); //call function show all work show_vacant_position
                    
            //function show all work show_vacant_position
            function show_vacant_position(){
                $.ajax({
                    type  : 'GET',
                    url   :   '<?= base_url()?>get_vacant_position_open',
                    async : true,
                    dataType : 'json',
                    success : function(data){
                        var html = '';
                        var i;
                        var x=1;
                        for(i=0; i<data.length; i++){
                            //----------------------------------------
                            if (data[i].pos_status == 'Open'){
                                if(Date.parse(data[i].vac_deadline) < Date.parse(data[i].server_time)){
                                    var pos_status = '<span class="role admin">Closed</span>';
                                    var button = '<a data-toggle="modal" data-target=""><i class="zmdi zmdi-mail-send"></i></a>';
                                }else{
                                    var pos_status = '<span class="role member">Open</span>';
                                    var button = '<a class="apply" data-toggle="modal" data-target="#staticModal" data-pos_id="'+data[i].pos_id+'"><i class="zmdi zmdi-mail-send"></i></a>';
                                }
                            }
                            //----------------------------------------
                            //----------------------------------------
                            if (data[i].pos_ptc_position == '1'){
                                var pos_ptc_position = '<br><small style="color:red">(Note: This position is under the <b>Provincial Training Center</b>)<small>';
                            }else{
                                var pos_ptc_position = ' ';
                            }
                            //----------------------------------------
                            html += '<tr>'+
                                        '<td>'+ x +'</td>'+
                                        '<td>'+ data[i].ous_desc.toUpperCase() + pos_ptc_position +'</td>'+
                                        '<td>'+ data[i].pos_desc.toUpperCase() +'</td>'+
                                        '<td>'+ data[i].pos_plantilla_no +'</td>'+
                                        '<td>'+ data[i].pos_sg +'</td>'+
                                        '<td>'+ data[i].vac_date_posted +'</td>'+
                                        '<td>'+ data[i].vac_deadline +'</td>'+
                                        '<td>'+ pos_status +'</td>'+
                                        '<td>'+
                                            '<div class="table-data-feature">'+
                                               ' <button class="item" data-toggle="tooltip" data-placement="top" title="View Standard Qualifications">'+
                                                   ' <a class="qualification" data-toggle="modal" data-target="#qualifications" data-pos_id="'+data[i].pos_id+'" data-pos_competency="'+data[i].pos_competency+'" data-pos_education="'+data[i].pos_education+'" data-pos_eligibility="'+data[i].pos_eligibility+'" data-pos_experience="'+data[i].pos_experience+'" data-pos_training="'+data[i].pos_training+'"><i class="zmdi zmdi-eye"></i></a>'+
                                                '</button>'+
                                                '<button class="item" data-toggle="tooltip" data-placement="top" title="Send Application">'+
                                                    button+
                                                '</button>'+
                                                '<button class="item" data-toggle="tooltip" data-placement="top" title="No. of Applicants">'+
                                                    '<b><span id="getnoofapplicants" style="color:#01579b">'+ data[i].number_of_applicants +'</span></b>'+
                                                '</button>'+
                                            '</div>'+
                                        '</td>'+
                                    '</tr>';
                                    x=x+1;
                        }
                        $('#vacant_positions_open_landing').html(html);
                        $('#vacant_positions_open_landing_table').DataTable();
                    }
                    
                });
            }

            //get data for vacant position
            $('#vacant_positions_open_landing').on('click','.qualification',function(){
                var pos_id = $(this).data('pos_id');
                var training = $(this).data('pos_training');
                var education = $(this).data('pos_education');
                var experience = $(this).data('pos_experience');
                var eligibility = $(this).data('pos_eligibility');
                var competency = $(this).data('pos_competency');
                $('#pos_id').val(pos_id);
                $('#pos_training').val(training);
                $('#pos_education').val(education);
                $('#experience').val(experience);
                $('#eligibility').val(eligibility);
                $('#competency').val(competency);
            });

            //--------------Applicant Status-------
            $('#search_form_applicant').submit(function(e){
            e.preventDefault(); 
                $.ajax({
                    url: "<?php echo base_url().'search_form_applicant'?>",
                    type: "post",
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    cache: false,
                    async: false,
                    success: function(data){
                        var json = $.parseJSON(data);
                        if(json.status == "False"){
                            $('#app_status_false').modal('show');
                        }else{
                            $('#lastname123').text(json.app_lastname);
                            $('#position').text(json.pos_desc);
                            if(json.eval_result == "Disqualified"){
                                $('#result').text('failed');  
                                $('#paragraph4').hide();
                            }else if(json.eval_result == "Qualified"){
                                $('#result').text('have met');
                                $('#paragraph4').hide();
                            }else if(json.eval_result == null){
                                $('#paragraph1').hide();
                                $('#paragraph2').hide();
                                $('#paragraph3').hide();
                                $('#paragraph5').hide();
                            }
                            $('#app_status').modal('show');
                        }
                        
                    }
                });
            });
            //--------------Applicant Status-------

            //-----------------AJAX-------------------------------


        }); //-----------Last
        </script>

        <?php include("video.php");?>

        <script type="text/javascript">
            $(window).on('load', function() {
                $('#video').modal('show');
            });
        </script>

    </div>

    <!-- Bootstrap JS-->
    <script src="<?= base_url()?>jobportal/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="<?= base_url()?>jobportal/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="<?= base_url()?>jobportal/vendor/slick/slick.min.js">
    </script>
    <script src="<?= base_url()?>jobportal/vendor/wow/wow.min.js"></script>
    <script src="<?= base_url()?>jobportal/vendor/animsition/animsition.min.js"></script>
    <script src="<?= base_url()?>jobportal/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="<?= base_url()?>jobportal/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="<?= base_url()?>jobportal/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="<?= base_url()?>jobportal/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="<?= base_url()?>jobportal/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?= base_url()?>jobportal/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="<?= base_url()?>jobportal/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="<?= base_url()?>jobportal/js/main.js"></script>

</body>

</html>
<!-- end document-->