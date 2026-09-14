<!---Form 8-->
<!-- Eight Tab-->
<div class="tab-pane fade" id="performance" role="tabpanel" aria-labelledby="performance">
    <!---Form 1-->
    <div class="card">
        <div class="card-header">
            <strong>Awards Related to Performance</strong>
        </div>
        <div id="forme8_card" class="card-body card-block"><!---card-body card-block-->

            <form action="" method="POST" id="forme8_form" role="form"><!--Form-->
            <input type="hidden" id="forme8_app_id" name="forme8_app_id" class="form-control">
            <!---International-->
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="international_arp" class=" form-control-label"><b>International</b> (Indicate your International Award or Recognition here if any)</label>
                </div>
                <div class="col-12 col-md-9">
                    <textarea name="international_arp" id="international_arp" rows="4" placeholder="" class="form-control" required></textarea>
                    <small class="help-block form-text" style="color:red"><strong>Write in full/Do not abbreviate. Put "N/A" if not applicable. Separate each with a semicolon(;)</strong></small>
                </div>
            </div>
            <!---International-->

            <!---National-->
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="national_arp" class=" form-control-label"><b>National</b> (Indicate your International Award or Recognition here if any)</label>
                </div>
                <div class="col-12 col-md-9">
                    <textarea name="national_arp" id="national_arp" rows="4" placeholder="" class="form-control" required></textarea>
                    <small class="help-block form-text" style="color:red"><strong>Write in full/Do not abbreviate. Put "N/A" if not applicable. Separate each with a semicolon(;)</strong></small>
                </div>
            </div>
            <!---National-->

            <!---Regional-->
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="regional_arp" class=" form-control-label"><b>Regional</b> (Indicate your International Award or Recognition here if any)</label>
                </div>
                <div class="col-12 col-md-9">
                    <textarea name="regional_arp" id="regional_arp" rows="4" placeholder="" class="form-control" required></textarea>
                    <small class="help-block form-text" style="color:red"><strong>Write in full/Do not abbreviate. Put "N/A" if not applicable. Separate each with a semicolon(;)</strong></small>
                </div>
            </div>
            <!---Regional-->

            <!---Provincial / Institutional-->
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="provincial_arp" class=" form-control-label"><b>Provincial / Institutional</b> (Indicate your International Award or Recognition here if any)</label>
                </div>
                <div class="col-12 col-md-9">
                    <textarea name="provincial_arp" id="provincial_arp" rows="4" placeholder="" class="form-control" required></textarea>
                    <small class="help-block form-text" style="color:red"><strong>Write in full/Do not abbreviate. Put "N/A" if not applicable. Separate each with a semicolon(;)</strong></small>
                </div>
            </div>
            <!---Provincial / Institutional-->

            <!---PDF File-->
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="arp_file" class=" form-control-label">Upload your evidence here if any</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="file" id="arp_file" name="arp_file" class="form-control-file" accept="application/pdf">
                    <small class="help-block form-text" style="color:red"><strong>Please upload pdf file only.</strong></small>
                </div>
            </div>
            <!---PDF File-->

            <!--Submit-->
            <div class="row form-group">
                <div class="col col-md-3">
                    <button id="btn_forme8" name="forme8" type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Submit</button>
                </div>
                <div id="forme8_message" class="col-12 col-md-9">
                    
                </div>
            </div>
            <!--Submit-->
            
            </form><!---End of Form-->

        </div><!---card-body card-block-->
    </div>
    <!---Form 1-->
</div> <!-- Eight Tab-->
<!---End of Form 8-->

<!-- script here -->
<script type="text/javascript">
    $(document).ready(function() {
        var applicant_id;

        //-------FORM 4---------  
        $('#forme8_form').submit(function(e){
        e.preventDefault(); 
            $.ajax({
                url: "<?php echo base_url().'save_forme8'?>",
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
                        //html =  '<div class="alert alert-success mt-2 message"><i class="fa fa-check-circle" aria-hidden="true"></i> <b>Saved</b> successfully. Please continue to the next tab (Expert Services).</div>';
                        //html2 =  '<div class="alert alert-success mt-2 message"><i class="fa fa-check-circle" aria-hidden="true"></i> <b>Saved</b> successfully. Please continue to the next tab (Expert Services).</div>';
                        
                        html =  '<div class="alert alert-success mt-2 message"><i class="fa fa-check-circle" aria-hidden="true"></i> <b>Congratulations!</b> Your application has been accepted. Please take note of your application number.</div>';
                        html2 =  '<div class="alert alert-success mt-2 message"><i class="fa fa-check-circle" aria-hidden="true"></i> <b>Congratulations!</b> Your application has been accepted. Please take note of your application number.</div>';
                        
                        //message
                        $('#forme8_message').prepend(html2);
                        $('#application_body_card').prepend(html);

                        //Set next tab
                        $("#expert_tab").removeClass("disabled");
                    
                        //Hide
                        /*$(".message").delay(4000).slideUp(200, function() {
                            $(this).alert('close');
                        });*/
                    
                        //HIDE button
                        $("#btn_forme8").hide();

                        //disabled inputs
                        $("#international_arp").attr("disabled", true);
                        $("#national_arp").attr("disabled", true);
                        $("#regional_arp").attr("disabled", true);
                        $("#provincial_arp").attr("disabled", true);
                        $("#arp_file").attr("disabled", true);
                    }else{
                        html = '<div class="alert alert-danger mt-2 message"> <b>'+ json.error +'</b></div>';
                        $('#forme8_card').prepend(html);
                        $('#forme8_message').prepend(html);
                        //Hide
                        $(".message").delay(4000).slideUp(200, function() {
                            $(this).alert('close');
                        });
                    }       
                }
            });
        });
    });
    //-------FORM 4---------  
</script>
<!-- script here -->