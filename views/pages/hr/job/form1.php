<!-- First Tab-->
<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

<!---Form 1-->
<div class="card">
    <div class="card-header">
        <strong>Personal</strong> Information
    </div>
    <div id="forme1_card" class="card-body card-block"><!---card-body card-block-->
        <form action="" method="POST" id="forme1_form" role="form"><!--Form-->

        <input type="hidden" id="pos_id" name="pos_id" class="form-control">  
        
        <!--Letter of Intent-->
        <div class="alert alert-primary" role="alert">
            <div class="row form-group m-t-20 m-t-0">
                <div class="col col-md-7">
                    <label for="intent_file" class=" form-control-label"><b>Intent Letter</b> (indicating the position, office where the vacancy exists and its Item Number)</label>
                </div>
                <div class="col-12 col-md-5">
                    <input type="file" id="intent_file" name="intent_file" class="form-control-file" accept="application/pdf" required>
                    <small class="help-block form-text" style="color:red"><strong>Please upload pdf file only.</strong></small>
                </div>
            </div>
        </div>
        <!--Letter of Intent-->

        <!--Last Name-->
        <div class="row form-group">
            <div class="col col-md-3">
                <label for="lastname" class=" form-control-label"><span style="color:red"><strong>*</strong></span> Last Name</label>
            </div>
            <div class="col-12 col-md-9">
                <input type="text" id="lastname" name="lastname" placeholder="Dela Cruz" class="form-control" required>
            </div>
        </div>
        <!--Last Name--> 

        <!--First Name-->
        <div class="row form-group">
            <div class="col col-md-3">
                <label for="firstname" class=" form-control-label"><span style="color:red"><strong>*</strong></span> First Name</label>
            </div>
            <div class="col-12 col-md-9">
                <input type="text" id="firstname" name="firstname" placeholder="Juan" class="form-control" required>
            </div>
        </div>
        <!--First Name-->

        <!--Middle Name-->
        <div class="row form-group">
            <div class="col col-md-3">
                <label for="middlename" class=" form-control-label"><span style="color:red"><strong>*</strong></span> Middle Name</label>
            </div>
            <div class="col-12 col-md-9">
                <input type="text" id="middlename" name="middlename" placeholder="Bassig" class="form-control" required>
            </div>
        </div>
        <!--Middle Name-->

        <!--Suffix-->
        <div class="row form-group">
            <div class="col col-md-3">
                <label for="suffix" class=" form-control-label"> Suffix</label>
            </div>
            <div class="col-12 col-md-9">
                <input type="text" id="suffix" name="suffix" placeholder="Jr." class="form-control" >
            </div>
        </div>
        <!--Suffix-->

        <!--Birth Date-->
        <div class="row form-group">
            <div class="col col-md-3">
                <label for="birthdate" class=" form-control-label"><span style="color:red"><strong>*</strong></span> Birth Date</label>
            </div>
            <div class="col-12 col-md-9">
                <input type="date" id="birthdate" name="birthdate" class="form-control" required>
            </div>
        </div>
        <!--Birth Date-->

        <!--Age-->
        <div class="row form-group">
            <div class="col col-md-3">
                <label for="age" class=" form-control-label"><span style="color:red"><strong>*</strong></span> Age</label>
            </div>
            <div class="col-12 col-md-9">
                <input type="number" id="age" name="age" placeholder="20" class="form-control" required>
            </div>
        </div>
        <!--Age-->

        <!--Address-->
        <div class="row form-group">
            <div class="col col-md-3">
                <label for="address" class=" form-control-label"><span style="color:red"><strong>*</strong></span> Address</label>
            </div>
            <div class="col-12 col-md-9">
                <input type="text" id="address" name="address" class="form-control" placeholder="#123 Zone 1 Barangay, Municiaplity, Province" required>
            </div>
        </div>
        <!--Address-->

        <!--Contact Numbers-->
        <div class="row form-group">
            <div class="col col-md-3">
                <label for="contactno" class=" form-control-label"><span style="color:red"><strong>*</strong></span> Contact Number/s</label>
            </div>
            <div class="col-12 col-md-9">
                <input type="text" id="contactno" name="contactno" placeholder="09123456789/(078) 844-0000" class="form-control" required>
            </div>
        </div>
        <!--Contact Numbers-->

        <!--Email Address-->
        <div class="row form-group">
            <div class="col col-md-3">
                <label for="email" class=" form-control-label"><span style="color:red"><strong>*</strong></span> Email Address</label>
            </div>
            <div class="col-12 col-md-9">
                <input type="email" id="email" name="email" placeholder="juanbdelacruz@gmail.com" class="form-control" required>
            </div>
        </div>
        <!--Email Address-->

        <!--Nationality-->
        <div class="row form-group">
            <div class="col col-md-3">
                <label for="nationality" class=" form-control-label"><span style="color:red"><strong>*</strong></span> Nationality</label>
            </div>
            <div class="col-12 col-md-9">
                <input type="text" id="nationality" name="nationality" placeholder="Filipino" class="form-control" required>
            </div>
        </div>
        <!--Nationality-->

        <!--Civil Status-->
        <div class="row form-group">
            <div class="col col-md-3">
                <label class=" form-control-label"><span style="color:red"><strong>*</strong></span> Civil Status</label>
            </div>
            <div class="col col-md-9">
                <div class="form-check-inline form-check">
                    <label for="single" class="form-check-label">
                        <input type="radio" id="single" name="status" value="single" class="form-check-input">Single
                    </label>
                    &nbsp&nbsp
                    <label for="married" class="form-check-label">
                        <input type="radio" id="married" name="status" value="married" class="form-check-input">Married
                    </label>
                    &nbsp&nbsp
                    <label for="seperated" class="form-check-label">
                        <input type="radio" id="seperated" name="status" value="seperated" class="form-check-input">Legally Seperated
                    </label>
                    &nbsp&nbsp
                    <label for="widowed" class="form-check-label">
                        <input type="radio" id="widowed" name="status" value="widowed" class="form-check-input">Widowed
                    </label>
                </div>
            </div>
        </div>
        <!--Civil Status-->

        <!--Gender-->
        <div class="row form-group">
            <div class="col col-md-3">
                <label class=" form-control-label"><span style="color:red"><strong>*</strong></span> Gender</label>
            </div>
            <div class="col col-md-9">
                <div class="form-check-inline form-check">
                    <label for="male" class="form-check-label">
                        <input type="radio" id="male" name="gender" value="male" class="form-check-input">Male
                    </label>
                    &nbsp&nbsp
                    <label for="female" class="form-check-label">
                        <input type="radio" id="female" name="gender" value="female" class="form-check-input">Female
                    </label>
                </div>
            </div>
        </div>
        <!--Gender-->

        <!--Educational Attainment-->
        <div class="row form-group">
            <div class="col col-md-3">
                <label for="education" class=" form-control-label"><span style="color:red"><strong>*</strong></span> Highest Educational Attainment</label>
            </div>
            <div class="col-12 col-md-9">
                <select name="education" id="education" class="form-control" required>
                    <option value="">Please select</option>
                    <option value="Elementary Under Graduate">Elementary Under Graduate</option>
                    <option value="Elementary Graduate">Elementary Graduate</option>
                    <option value="High School Under Graduate">High School Under Graduate</option>
                    <option value="High School Graduate">High School Graduate</option>
                    <option value="College Under Graduate">College Under Graduate</option>
                    <option value="College Graduate">College Graduate</option>
                    <option value="Units in Masteral">Units in Masteral</option>
                    <option value="Masteral">Masteral</option>
                    <option value="Units in Doctorate">Units in Doctorate</option>
                    <option value="Doctorate">Doctorate</option>
                </select>
                <input type="text" id="course" name="course" placeholder="Master in Library and Information Science" class="form-control mt-3" required>
                <small class="help-block form-text" style="color:red"><strong>Write in full/Do not abbreviate.</strong></small>
            </div>
        </div>

        <div class="row form-group">
            <div class="col col-md-3">
                <label for="education_file" class=" form-control-label"></label>
            </div>
            <div class="col-12 col-md-9">
                <input type="file" id="education_file" name="education_file" class="form-control-file" accept="application/pdf">
                <small class="help-block form-text" style="color:red"><strong>Please upload pdf file only. (Authenticated Photocopy of Transcript of Record, Diploma, Certificate of Grade etc..)</strong></small>
            </div>
        </div>
        <!--Educational Attainment-->
        
        <!---Reference of posting-->
        <div class="row form-group">
            <div class="col col-md-3">
                <label for="cmt_file" class="form-control-label">Where did you see this vacancy?</label>
            </div>
            <div class="col-12 col-md-9">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="tesdaWebsite" name="reference[]" value="TESDA Website">
                    <label class="form-check-label" for="tesdaWebsite">TESDA Website</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="cscWebsite" name="reference[]" value="CSC Website">
                    <label class="form-check-label" for="cscWebsite">CSC Website</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="referrals" name="reference[]" value="Referrals">
                    <label class="form-check-label" for="referrals">Referrals</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="facebook" name="reference[]" value="Facebook">
                    <label class="form-check-label" for="facebook">Facebook</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="other" name="reference[]" value="Other Recruitment Platform">
                    <label class="form-check-label" for="other">Other Recruitment Platform</label>
                </div>
            </div>
        </div>
        <!---Reference of posting-->

        <!--Iam not a robot-->
        <div class="row form-group">
            <div class="col col-md-3">
                <label for="education_file" class=" form-control-label"></label>
            </div>
            <div class="col-12 col-md-9">
                <div class="g-recaptcha"  data-sitekey="6Lfsr1AcAAAAAJrOf8WvM5nM1W6m5YaSSzTOH1fZ" required></div>		
            </div>
           
        </div>
        <!--Iam not a robot-->

        <!--Submit-->
        <div class="row form-group">
            <div class="col col-md-3">
                <button id="btn_forme1" name="forme1" type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Submit</button>
            </div>
            <div id="forme1_message" class="col-12 col-md-9">
                
            </div>
        </div>
        
        <!--Submit-->
        
        </form><!---End of Form-->
    </div><!---card-body card-block-->
</div>
</div>
<!-- First Tab-->

<!-- script here -->
<script type="text/javascript">
    $(document).ready(function() {
        var applicant_id;


        //-------FORM 1---------  
        //get data for vacant position
        $('#vacant_positions_open_landing').on('click','.apply',function(){
            var pos_id = $(this).data('pos_id');
            $('#pos_id').val(pos_id);
        });

        $('#forme1_form').submit(function(e){
        e.preventDefault(); 
            $.ajax({
                url: "<?php echo base_url().'save_forme1'?>",
                type: "post",
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                success: function(data){
                    var json = $.parseJSON(data);
                    if(json.status == 'True'){
                        //Show Reference No.
                        html =  '<div class="alert alert-success mt-2 message"><i class="fa fa-check-circle" aria-hidden="true"></i> <b>Saved</b> successfully. Please continue to the next tab (Eligibility).</div>';
                        html2 =  '<div class="alert alert-success mt-2 message"><i class="fa fa-check-circle" aria-hidden="true"></i> <b>Saved</b> successfully. Please continue to the next tab (Eligibility).</div>';
                        html1 = '<div class="alert alert-success" role="alert">'+
                                '<div class="row form-group m-b-0 p-b-0">'+
                                        '<div class="col col-md-12">'+
                                            '<label for="intent_filex" class=" form-control-label"><b>Application Reference No. '+ json.app_hash +' </span></b></label>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>';
                        //message
                        $('#forme1_message').prepend(html2);
                        $('#application_body_card').prepend(html);
                        $('#application_body_card').prepend(html1);

                        //Set Applicant ID
                        applicant_id = json.app_id;
                        $('#forme2_app_id').val(applicant_id);
                        $('#forme3_app_id').val(applicant_id);
                        $('#forme4_app_id').val(applicant_id);
                        $('#forme5_app_id').val(applicant_id);
                        $('#forme6_app_id').val(applicant_id);
                        $('#forme7_app_id').val(applicant_id);
                        $('#forme8_app_id').val(applicant_id);
                        $('#forme9_app_id').val(applicant_id);
                        $('#forme10_app_id').val(applicant_id);

                        //Disabled Submit Button
                        $("#eligibility_tab").removeClass("disabled");
                    
                        //Hide
                        $(".message").delay(4000).slideUp(200, function() {
                            $(this).alert('close');
                        });
                    
                        //disable button
                        $("#btn_forme1").hide();

                        //disabled inputs
                        $("#intent_file").attr("disabled", true);
                        $("#lastname").attr("disabled", true);
                        $("#firstname").attr("disabled", true);
                        $("#middlename").attr("disabled", true);
                        $("#suffix").attr("disabled", true);
                        $("#birthdate").attr("disabled", true);
                        $("#age").attr("disabled", true);
                        $("#address").attr("disabled", true);
                        $("#contactno").attr("disabled", true);
                        $("#email").attr("disabled", true);
                        $("#nationality").attr("disabled", true);
                        $("#single").attr("disabled", true);
                        $("#married").attr("disabled", true);
                        $("#seperated").attr("disabled", true);
                        $("#widowed").attr("disabled", true);
                        $("#male").attr("disabled", true);
                        $("#female").attr("disabled", true);
                        $("#education").attr("disabled", true);
                        $("#education_file").attr("disabled", true);
                        $("#course").attr("disabled", true);
                    }else{
                        html = '<div class="alert alert-danger mt-2 message"> <b>'+ json.error +'</b></div>';
                        $('#forme1_card').prepend(html);
                        $('#forme1_message').prepend(html);
                        //Hide
                        $(".message").delay(4000).slideUp(200, function() {
                            $(this).alert('close');
                        });
                    }       
                }
            });
        });
    });
    //-------FORM 1---------  
</script>
<!-- script here -->
<!---End of Form 1-->