<!---Form 9-->
<!-- Ninth Tab-->
<div class="tab-pane fade" id="expert" role="tabpanel" aria-labelledby="expert">
    <!---Form 1-->
    <div class="card">
        <div class="card-header">
            <strong>Expert Services in Active Participation in Professional/Technical Activities</strong>
        </div>
        <div id="forme9_card" class="card-body card-block"><!---card-body card-block-->
            <form action="" method="POST" id="forme9_form" role="form"><!--Form-->
            <input type="hidden" id="forme9_app_id" name="forme9_app_id" class="form-control">
            <!---International-->
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="international_expertise" class=" form-control-label"><b>International</b> (Indicate your International Award or Recognition here if any)</label>
                </div>
                <div class="col-12 col-md-9">
                    <textarea name="international_expertise" id="international_expertise" rows="4" placeholder="" class="form-control" required></textarea>
                    <small class="help-block form-text" style="color:red"><strong>Write in full/Do not abbreviate. Put "N/A" if not applicable. Separate each with a semicolon(;)</strong></small>
                </div>
            </div>
            <!---International-->

            <!---National-->
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="national_expertise" class=" form-control-label"><b>National</b> (Indicate your International Award or Recognition here if any)</label>
                </div>
                <div class="col-12 col-md-9">
                    <textarea name="national_expertise" id="" rows="4" placeholder="" class="form-control" required></textarea>
                    <small class="help-block form-text" style="color:red"><strong>Write in full/Do not abbreviate. Put "N/A" if not applicable. Separate each with a semicolon(;)</strong></small>
                </div>
            </div>
            <!---National-->

            <!---Regional-->
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="regional_expertise" class=" form-control-label"><b>Regional</b> (Indicate your International Award or Recognition here if any)</label>
                </div>
                <div class="col-12 col-md-9">
                    <textarea name="regional_expertise" id="regional_expertise" rows="4" placeholder="" class="form-control" required></textarea>
                    <small class="help-block form-text" style="color:red"><strong>Write in full/Do not abbreviate. Put "N/A" if not applicable. Separate each with a semicolon(;)</strong></small>
                </div>
            </div>
            <!---Regional-->

            <!---Provincial / Institutional-->
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="provincial_expertise" class=" form-control-label"><b>Provincial / Institutional</b> (Indicate your International Award or Recognition here if any)</label>
                </div>
                <div class="col-12 col-md-9">
                    <textarea name="provincial_expertise" id="provincial_expertise" rows="4" placeholder="" class="form-control" required></textarea>
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
                    <input type="file" id="expertise_file" name="expertise_file" class="form-control-file" accept="application/pdf">
                    <small class="help-block form-text" style="color:red"><strong>Please upload pdf file only.</strong></small>
                </div>
            </div>
            <!---PDF File-->

             <!--Submit-->
             <div class="row form-group">
                <div class="col col-md-3">
                    <button id="btn_forme9" name="forme9" type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Submit</button>
                </div>
                <div id="forme9_message" class="col-12 col-md-9">
                    
                </div>
            </div>
            <!--Submit-->
            
            </form><!---End of Form-->

        </div><!---card-body card-block-->
    </div>
    <!---Form 1-->
</div> <!-- Nint Tab-->
<!---End of Form 9-->

<!-- script here -->
<script type="text/javascript">
    $(document).ready(function() {
        var applicant_id;

        //-------FORM 4---------  
        $('#forme9_form').submit(function(e){
        e.preventDefault(); 
            $.ajax({
                url: "<?php echo base_url().'save_forme9'?>",
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
                        html =  '<div class="alert alert-success mt-2 message"><i class="fa fa-check-circle" aria-hidden="true"></i> <b>Saved</b> successfully. Please continue to the next tab (Commitees/TWGs Participation).</div>';
                        html2 =  '<div class="alert alert-success mt-2 message"><i class="fa fa-check-circle" aria-hidden="true"></i> <b>Saved</b> successfully. Please continue to the next tab (Commitees/TWGs Participation).</div>';
                        
                        //message
                        $('#forme9_message').prepend(html2);
                        $('#application_body_card').prepend(html);

                        //Set next tab
                        $("#committee_tab").removeClass("disabled");
                    
                        //Hide
                        $(".message").delay(4000).slideUp(200, function() {
                            $(this).alert('close');
                        });
                    
                        //HIDE button
                        $("#btn_forme9").hide();

                        //disabled inputs
                        $("#international_expertise").attr("disabled", true);
                        $("#national_expertise").attr("disabled", true);
                        $("#regional_expertise").attr("disabled", true);
                        $("#provincial_expertise").attr("disabled", true);
                        $("#expertise_file").attr("disabled", true);
                    }else{
                        html = '<div class="alert alert-danger mt-2 message"> <b>'+ json.error +'</b></div>';
                        $('#forme9_card').prepend(html);
                        $('#forme9_message').prepend(html);
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