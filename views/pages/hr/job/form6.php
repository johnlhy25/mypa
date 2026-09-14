<!---Form 6-->
<!-- Sixth Tab-->
<div class="tab-pane fade" id="pdswes" role="tabpanel" aria-labelledby="pdswes">
    <!---Form 1-->
    <div class="card">
        <div class="card-header">
            <strong>Personal Data Sheet</strong> (PDS CS Form No. 212 revised 2017) <strong>Work Experience Sheet</strong> (WES CS Form 212)
        </div>
        <div id="forme6_card" class="card-body card-block"><!---card-body card-block-->
            <form action="" method="POST" id="forme6_form" role="form"><!--Form-->
            <input type="hidden" id="forme6_app_id" name="forme6_app_id" class="form-control">
            <!---Personal Data Sheet-->
            <div class="row form-group">
                <div class="col col-md-6">
                    <label for="pds_file" class=" form-control-label">Personal Data Sheet (PDS CS Form No. 212 revised 2017)</label>
                </div>
                <div class="col-12 col-md-6">
                    <input type="file" id="pds_file" name="pds_file" class="form-control-file" accept="application/pdf" required>
                    <small class="help-block form-text" style="color:red"><strong>Please upload pdf file only.</strong></small>
                </div>
            </div>
            <!---Personal Data Sheet-->

            <!---Work Experience Sheet-->
            <div class="row form-group">
                <div class="col col-md-6">
                    <label for="wes_file" class=" form-control-label">Work Experience Sheet (WES CS Form 212)</label>
                </div>
                <div class="col-12 col-md-6">
                    <input type="file" id="wes_file" name="wes_file" class="form-control-file" accept="application/pdf" required>
                    <small class="help-block form-text" style="color:red"><strong>Please upload pdf file only.</strong></small>
                </div>
            </div>
            <!---Work Experience Sheet-->

           <!--Submit-->
           <div class="row form-group">
                <div class="col col-md-3">
                    <button id="btn_forme6" name="forme6" type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Submit</button>
                </div>
                <div id="forme6_message" class="col-12 col-md-9">
                    
                </div>
            </div>
            <!--Submit-->
            
            </form><!---End of Form-->

        </div><!---card-body card-block-->
    </div>
    <!---Form 1-->
</div> <!-- Sixth Tab-->
<!---End of Form 6-->

<!-- script here -->
<script type="text/javascript">
    $(document).ready(function() {
        var applicant_id;

        //-------FORM 4---------  
        $('#forme6_form').submit(function(e){
        e.preventDefault(); 
            $.ajax({
                url: "<?php echo base_url().'save_forme6'?>",
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
                        $('#forme6_message').prepend(html2);
                        $('#application_body_card').prepend(html);

                        //Set next tab
                        $("#reference_tab").removeClass("disabled");
                    
                        //Hide
                        $(".message").delay(4000).slideUp(200, function() {
                            $(this).alert('close');
                        });
                    
                        //HIDE button
                        $("#btn_forme6").hide();

                        //disabled inputs
                        $("#pds_file").attr("disabled", true);
                        $("#wes_file").attr("disabled", true);

                    }else{
                        html = '<div class="alert alert-danger mt-2 message"> <b>'+ json.error +'</b></div>';
                        $('#forme6_card').prepend(html);
                        $('#forme6_message').prepend(html);
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