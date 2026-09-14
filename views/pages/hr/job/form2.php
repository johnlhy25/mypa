<!---Form 2-->
<!-- Second Tab-->
<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <div class="card">
        <div class="card-header">
            <strong>Eligibility</strong>
        </div>
        <div id="forme2_card" class="card-body card-block"><!---card-body card-block-->
            <form action="" method="POST" id="forme2_form" role="form"><!--Form-->
            <input type="hidden" id="forme2_app_id" name="forme2_app_id" class="form-control">
            <!--Eligibility/ies-->
            <div class="row form-group">
                <div class="col col-md-3">
                    <label class=" form-control-label">Eligibility</label>
                </div>
                <div class="col col-md-9">
                    <div class="form-check">
                        <div class="checkbox">
                            <label for="cese" class="form-check-label ">
                                <input type="checkbox" id="cese" name="eligibility[]" value="cese" class="form-check-input"> Career Executive Service Eligibility
                            </label>
                        </div>
                        <div class="checkbox">
                            <label for="csp" class="form-check-label ">
                                <input type="checkbox" id="csp" name="eligibility[]" value="csp" class="form-check-input"> Career Service Professional
                            </label>
                        </div>
                        <div class="checkbox">
                            <label for="cssp" class="form-check-label ">
                                <input type="checkbox" id="cssp" name="eligibility[]" value="cssp" class="form-check-input"> Career Service Sub Professional
                            </label>
                        </div>
                        <div class="checkbox">
                            <label for="ra1080" class="form-check-label ">
                                <input type="checkbox" id="ra1080" name="eligibility[]" value="ra1080" class="form-check-input"> R.A. 1080
                            </label>
                        </div>
                        <div class="checkbox">
                            <label for="pd907" class="form-check-label ">
                                <input type="checkbox" id="pd907" name="eligibility[]" value="pd907" class="form-check-input"> PD 907
                            </label>
                        </div>
                        <div class="checkbox">
                            <label for="mc11" class="form-check-label ">
                                <input type="checkbox" id="mc11" name="eligibility[]" value="mc11" class="form-check-input"> MC 11 series of 1996
                            </label>
                        </div>
                        <div class="checkbox">
                            <label for="others" class="form-check-label ">
                                <input type="text" id="others" name="eligibility[]" placeholder="Others" class="form-control">
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="eligibility_file" class=" form-control-label"></label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="file" id="eligibility_file" name="eligibility_file" class="form-control-file" accept="application/pdf">
                    <small class="help-block form-text" style="color:red"><strong>Please upload pdf file only. (Authenticated by CSC/PRC)</strong></small>
                </div>
            </div>
            <!--Eligibility/ies-->

            <!--National Certificate-->
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="nc" class=" form-control-label"> National Certificate</label>
                    <a id="btn_add_buttonnc" class="btn btn-primary btn-sm add_buttonnc" style="color:white">
                        <i class="fa fa-plus"></i> Add
                    </a>
                </div>
                <div class="col-12 col-md-9 field_wrappernc">
                    <input type="text" id="nc" name="nc[]" placeholder="Computer System Servicing NC II" class="form-control" required>
                    <small class="help-block form-text" style="color:red"><strong>Write in full/Do not abbreviate. Put "N/A" if not applicable.</strong></small>
                </div>
            </div>

            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="national_certificate_file" class=" form-control-label"></label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="file" id="national_certificate_file" name="national_certificate_file" class="form-control-file" accept="application/pdf">
                    <small class="help-block form-text" style="color:red"><strong>Please upload pdf file only. (Computer System Servicing NC II, Web Development NC III etc...)</strong></small>
                </div>
            </div>
            <!--National Certificate-->

            <!--National TVET Trainers Certificate-->
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="nttc" class=" form-control-label"> National TVET Trainers Certificate</label>
                    <a id="btn_add_button" class="btn btn-primary btn-sm add_button" style="color:white">
                        <i class="fa fa-plus"></i> Add
                    </a>
                    
                </div>
                <div class="col-12 col-md-9 field_wrapper">
                    <input type="text" id="nttc" name="nttc[]" placeholder="Computer System Servicing NC II" class="form-control" required>
                    <small class="help-block form-text" style="color:red"><strong>Write in full/Do not abbreviate. Put "N/A" if not applicable.</strong></small>
                </div>
            </div>

            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="nttc_file" class=" form-control-label"></label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="file" id="nttc_file" name="nttc_file" class="form-control-file" accept="application/pdf">
                    <small class="help-block form-text" style="color:red"><strong>Please upload pdf file only. (Computer System Servicing NC II, Web Development NC III etc...)</strong></small>
                </div>
            </div>
            <!--National TVET Trainers Certificate-->

            <!--Submit-->
            <div class="row form-group">
                <div class="col col-md-3">
                    <button id="btn_forme2" name="forme2" type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Submit</button>
                </div>
                <div id="forme2_message" class="col-12 col-md-9">
                    
                </div>
            </div>
            
            <!--Submit-->
            
            </form><!---End of Form-->

        </div><!---card-body card-block-->
    </div>
</div>
<!-- Second Tab-->

<!-- script here -->
<script type="text/javascript">
    $(document).ready(function() {
        var applicant_id;

        //-------FORM 2---------  
        $('#forme2_form').submit(function(e){
        e.preventDefault(); 
            $.ajax({
                url: "<?php echo base_url().'save_forme2'?>",
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
                        html =  '<div class="alert alert-success mt-2 message"><i class="fa fa-check-circle" aria-hidden="true"></i> <b>Saved</b> successfully. Please continue to the next tab (Work Experience).</div>';
                        html2 =  '<div class="alert alert-success mt-2 message"><i class="fa fa-check-circle" aria-hidden="true"></i> <b>Saved</b> successfully. Please continue to the next tab (Work Experience).</div>';
                        
                        //message
                        $('#forme2_message').prepend(html2);
                        $('#application_body_card').prepend(html);

                        //Set next tab
                        $("#work_experience_tab").removeClass("disabled");
                    
                        //Hide
                        $(".message").delay(4000).slideUp(200, function() {
                            $(this).alert('close');
                        });
                    
                        //HIDE button
                        $("#btn_forme2").hide();

                        //disabled inputs
                        $("#cese").attr("disabled", true);
                        $("#csp").attr("disabled", true);
                        $("#cssp").attr("disabled", true);
                        $("#ra1080").attr("disabled", true);
                        $("#pd907").attr("disabled", true);
                        $("#mc11").attr("disabled", true);
                        $("#others").attr("disabled", true);
                        $("#eligibility_file").attr("disabled", true);
                        $("#nc").attr("disabled", true);
                        $("#national_certificate_file").attr("disabled", true);
                        $("#nttc").attr("disabled", true);
                        $("#nttc_file").attr("disabled", true);
                        $("#btn_add_buttonnc").attr("disabled", true);
                        $("#btn_add_button").attr("disabled", true);
                    }else{
                        html = '<div class="alert alert-danger mt-2 message"> <b>'+ json.error +'</b></div>';
                        $('#forme2_card').prepend(html);
                        $('#forme2_message').prepend(html);
                        //Hide
                        $(".message").delay(4000).slideUp(200, function() {
                            $(this).alert('close');
                        });
                    }       
                }
            });
        });
    });
    //-------FORM 2---------  
</script>
<!-- script here -->

<!---End of Form 2-->