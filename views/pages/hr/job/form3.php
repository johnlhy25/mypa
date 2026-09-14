<!---Form 3-->
<!-- Third Tab-->
<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab"> 
        <div class="card">
        <div class="card-header">
            <strong>Work</strong> Experience
        </div>
        <div id="forme3_card" class="card-body card-block"><!---card-body card-block-->
            <form action="" method="POST" id="forme3_form" role="form"><!--Form-->
            <input type="hidden" id="forme3_app_id" name="forme3_app_id" class="form-control">
            <!--Present Position-->
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="present_position" class=" form-control-label"><span style="color:red"><strong>*</strong></span> Present Position</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="present_position" name="present_position" placeholder="Information System Analyts III" class="form-control" required>
                    <small class="help-block form-text" style="color:red"><strong>Write in full/Do not abbreviate. Put "N/A" if not applicable.</strong></small>
                </div>
            </div>
            <!--Present Position-->

            <!--Present Office-->
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="present_office" class=" form-control-label"><span style="color:red"><strong>*</strong></span> Present Office</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="present_office" name="present_office" placeholder="Technical Education And Skills Development Authority" class="form-control" required>
                    <small class="help-block form-text" style="color:red"><strong>Write in full/Do not abbreviate. Put "N/A" if not applicable.</strong></small>
                </div>
            </div>
            <!--Present Office-->

            <!--No. of years-->
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="no_years" class=" form-control-label"><span style="color:red"><strong>*</strong></span> No. of Years</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="number" id="no_years" name="no_years" placeholder="5" class="form-control" min="0" max="50" step="0.1" required>
                    <small class="help-block form-text" style="color:red"><strong>Put "0" if not applicable.</strong></small>
                </div>
            </div>
            <!--No. of years-->

            <!--Relevant Experience-->
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="relevant_experience" class=" form-control-label"> Relevant Experience</label>
                    <a id="btn_add_buttonre" class="btn btn-primary btn-sm add_buttonre" style="color:white">
                        <i class="fa fa-plus"></i> Add
                    </a>
                    
                </div>
                <div class="col-12 col-md-9 field_wrapperre">
                    <div class="row">
                        <div class="col-md-9">
                            <input type="text" id="relevant_experience" name="relevant_experience[]" placeholder="Information System Analyts I" class="form-control">
                            <small class="help-block form-text" style="color:red"><strong>Write in full/Do not abbreviate. Put "N/A" if not applicable.</strong></small>
                        </div>
                        <div class="col-md-3">
                            <input type="number" id="relevant_experience_years" name="relevant_experience_years[]" placeholder="1" class="form-control">
                            <small class="help-block form-text" style="color:red"><strong>Years (e.g. 2)</strong></small>
                        </div>
                    </div>    
                </div>
            </div>

            <div class="row form-group">
                <div class="col col-md-6">
                    <label for="coe_file" class=" form-control-label">Certificate of Employment (indicating duties and responsibilities)</label>
                </div>
                <div class="col-12 col-md-6">
                    <input type="file" id="coe_file" name="coe_file" class="form-control-file" accept="application/pdf">
                    <small class="help-block form-text" style="color:red"><strong>Please upload pdf file only. (Certificate of Employment)</strong></small>
                </div>
            </div>

            <div class="row form-group">
                <div class="col col-md-6">
                    <label for="sr_file" class=" form-control-label">Service Record (if applicable)</label>
                </div>
                <div class="col-12 col-md-6">
                    <input type="file" id="sr_file" name="sr_file" class="form-control-file" accept="application/pdf">
                    <small class="help-block form-text" style="color:red"><strong>Please upload pdf file only. (Service Record)</strong></small>
                </div>
            </div>

            <div class="row form-group">
                <div class="col col-md-6">
                    <label for="cpa_file" class=" form-control-label">Copy of Previous Appointment (if applicable)</label>
                </div>
                <div class="col-12 col-md-6">
                    <input type="file" id="cpa_file" name="cpa_file" class="form-control-file" accept="application/pdf">
                    <small class="help-block form-text" style="color:red"><strong>Please upload pdf file only. (Previous Appointment)</strong></small>
                </div>
            </div>
            
            <div class="row form-group">
                <div class="col col-md-6">
                    <label for="ipcr_file" class=" form-control-label">Performance rating in the present position for last two (2) rating period certified by HRMO (if applicable)</label>
                </div>
                <div class="col-12 col-md-6">
                    <input type="number" id="ipcr_rating" name="ipcr_rating" placeholder="4.82" min="0" max="5.00" step="0.01" class="form-control">
                    <input type="file" id="ipcr_file" name="ipcr_file" class="form-control-file" accept="application/pdf">
                    <small class="help-block form-text" style="color:red"><strong>Please upload pdf file only. (Individual Performance Commitment and Review etc...)</strong></small>
                </div>
            </div>
            <!--Relevant Position-->

            <!--Length of Service-->
            <div class="row form-group">
                <div class="col col-md-6">
                    <label for="tesda_service" class=" form-control-label"> Length of Service in TESDA, if applicable (for Permanent, Casual, and Job Order positions)</label>
                </div>
                <div class="col-12 col-md-6">
                    <input type="number" id="tesda_service" name="tesda_service" placeholder="2" class="form-control">
                </div>
            </div>
            <!--Length of Service-->

            <!--Date of Last Promotion (if applicable)-->
            <div class="row form-group">
                <div class="col col-md-6">
                    <label for="date_tesda_service" class=" form-control-label"> Date of Last Promotion, if applicable (for Permanent and Casual positions)</label>
                </div>
                <div class="col-12 col-md-6">
                    <input type="date" id="date_tesda_service" name="date_tesda_service" class="form-control">
                </div>
            </div>
            <!--Date of Last Promotion (if applicable)-->

            <!--Submit-->
            <div class="row form-group">
                <div class="col col-md-3">
                    <button id="btn_forme3" name="forme3" type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Submit</button>
                </div>
                <div id="forme3_message" class="col-12 col-md-9">
                    
                </div>
            </div>
            <!--Submit-->
            
            </form><!---End of Form-->
            
        </div><!---card-body card-block-->
    </div>
        <!---Form 1-->
</div> 
<!-- Third Tab-->

<!-- script here -->
<script type="text/javascript">
    $(document).ready(function() {
        var applicant_id;

        //-------FORM 2---------  
        $('#forme3_form').submit(function(e){
        e.preventDefault(); 
            $.ajax({
                url: "<?php echo base_url().'save_forme3'?>",
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
                        html =  '<div class="alert alert-success mt-2 message"><i class="fa fa-check-circle" aria-hidden="true"></i> <b>Saved</b> successfully. Please continue to the next tab (Work Exoerience).</div>';
                        html2 =  '<div class="alert alert-success mt-2 message"><i class="fa fa-check-circle" aria-hidden="true"></i> <b>Saved</b> successfully. Please continue to the next tab (Work Exoerience).</div>';
                        
                        //message
                        $('#forme3_message').prepend(html2);
                        $('#application_body_card').prepend(html);

                        //Set next tab
                        $("#training_tab").removeClass("disabled");
                    
                        //Hide
                        $(".message").delay(4000).slideUp(200, function() {
                            $(this).alert('close');
                        });
                    
                        //HIDE button
                        $("#btn_forme3").hide();

                        //disabled inputs
                        $("#present_position").attr("disabled", true);
                        $("#present_office").attr("disabled", true);
                        $("#no_years").attr("disabled", true);
                        $("#relevant_experience").attr("disabled", true);
                        $("#relevant_experience_years").attr("disabled", true);
                        $("#coe_file").attr("disabled", true);
                        $("#sr_file").attr("disabled", true);
                        $("#cpa_file").attr("disabled", true);
                        $("#ipcr_file").attr("disabled", true);
                        $("#tesda_service").attr("disabled", true);
                        $("#date_tesda_service").attr("disabled", true);
                        $("#btn_add_buttonre").attr("disabled", true);
                    }else{
                        html = '<div class="alert alert-danger mt-2 message"> <b>'+ json.error +'</b></div>';
                        $('#forme3_card').prepend(html);
                        $('#forme3_message').prepend(html);
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

<!---End of Form 3-->