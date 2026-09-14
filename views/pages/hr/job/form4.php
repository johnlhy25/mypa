<!---Form 4-->
<!-- Fourth Tab-->
<div class="tab-pane fade" id="training" role="tabpanel" aria-labelledby="training">
    <!---Form 1-->
    <div class="card">
        <div class="card-header">
            <strong>Relevant Training</strong>
        </div>
        <div id="forme4_card" class="card-body card-block"><!---card-body card-block-->
            <form action="" method="POST" id="forme4_form" role="form"><!--Form-->
            <input type="hidden" id="forme4_app_id" name="forme4_app_id" class="form-control">
            <!--Relevant Training-->
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="relevant_experience" class=" form-control-label"> Relevant Training</label>
                    <a id="btn_add_buttonrt" class="btn btn-primary btn-sm add_buttonrt" style="color:white">
                        <i class="fa fa-plus"></i> Add
                    </a>
                </div>
                <div class="col-12 col-md-9 field_wrapperrt">
                    <div class="row">
                        <div class="col-md-9">
                            <input type="text" id="relevant_training" name="relevant_training[]" placeholder="Programming 101" class="form-control" required>
                            <small class="help-block form-text" style="color:red"><strong>Write in full/Do not abbreviate. Put "N/A" if not applicable.</strong></small>
                        </div>
                        <div class="col-md-3">
                            <input type="number" id="relevant_training_hours" name="relevant_training_hours[]" placeholder="1" step="0.1" class="form-control" required>  
                            <small class="help-block form-text" style="color:red"><strong>Hours (e.g. 2)</strong></small>
                        </div>
                    </div>    
                </div>
            </div> 
            
            <div class="row form-group m-t-30">
                <div class="col col-md-3">
                    <label for="training_file" class=" form-control-label"></label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="file" id="training_file" name="training_file" class="form-control-file" accept="application/pdf">
                    <small class="help-block form-text" style="color:red"><strong>Please upload pdf file only.</strong></small>
                </div>
            </div>

            <!--Relevant Training-->

           <!--Submit-->
           <div class="row form-group">
                <div class="col col-md-3">
                    <button id="btn_forme4" name="forme4" type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Submit</button>
                </div>
                <div id="forme4_message" class="col-12 col-md-9">
                    
                </div>
            </div>
            <!--Submit-->
            
            </form><!---End of Form-->

        </div><!---card-body card-block-->
    </div>
    <!---Form 1-->
</div> <!-- Fourth Tab-->
<!---End of Form 4-->

<!-- script here -->
<script type="text/javascript">
    $(document).ready(function() {
        var applicant_id;

        //-------FORM 4---------  
        $('#forme4_form').submit(function(e){
        e.preventDefault(); 
            $.ajax({
                url: "<?php echo base_url().'save_forme4'?>",
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
                        html =  '<div class="alert alert-success mt-2 message"><i class="fa fa-check-circle" aria-hidden="true"></i> <b>Saved</b> successfully. Please continue to the next tab (RA 8371/RA 7277/RA 8972).</div>';
                        html2 =  '<div class="alert alert-success mt-2 message"><i class="fa fa-check-circle" aria-hidden="true"></i> <b>Saved</b> successfully. Please continue to the next tab (RA 8371/RA 7277/RA 8972).</div>';
                        
                        //message
                        $('#forme4_message').prepend(html2);
                        $('#application_body_card').prepend(html);

                        //Set next tab
                        $("#ra8371_tab").removeClass("disabled");
                    
                        //Hide
                        $(".message").delay(4000).slideUp(200, function() {
                            $(this).alert('close');
                        });
                    
                        //HIDE button
                        $("#btn_forme4").hide();

                        //disabled inputs
                        $("#training_file").attr("disabled", true);
                        $("#relevant_training_hours").attr("disabled", true);
                        $("#relevant_training").attr("disabled", true);
                        $("#btn_add_buttonrt").attr("disabled", true);
                    }else{
                        html = '<div class="alert alert-danger mt-2 message"> <b>'+ json.error +'</b></div>';
                        $('#forme4_card').prepend(html);
                        $('#forme4_message').prepend(html);
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