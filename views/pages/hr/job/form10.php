<!---Form 10-->
<!-- Tenth Tab-->
<div class="tab-pane fade" id="committe" role="tabpanel" aria-labelledby="committe">
    <!---Form 1-->
    <div class="card">
        <div class="card-header">
            <strong>Commitees/TWGs Participation</strong>
        </div>
        <div id="forme10_card" class="card-body card-block"><!---card-body card-block-->

            <form action="" method="POST" id="forme10_form" role="form"><!--Form-->
            <input type="hidden" id="forme10_app_id" name="forme10_app_id" class="form-control">
            <!---Chair-->
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="cmt_chair" class=" form-control-label"><b>Chair / Co - Chair</b> (TESDA/Office Orders, Memorandum)</label>
                </div>
                <div class="col-12 col-md-9">
                    <textarea name="cmt_chair" id="cmt_chair" rows="4" placeholder="" class="form-control" required></textarea>
                    <small class="help-block form-text" style="color:red"><strong>Write in full/Do not abbreviate. Put "N/A" if not applicable. Separate each with a semicolon(;)</strong></small>
                </div>
            </div>
            <!---Chair-->

            <!---Vice Chair-->
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="cmt_vcchair" class=" form-control-label"><b>Vice Chair</b> (TESDA/Office Orders, Memorandum) </label>
                </div>
                <div class="col-12 col-md-9">
                    <textarea name="cmt_vcchair" id="cmt_vcchair" rows="4" placeholder="" class="form-control" required></textarea>
                    <small class="help-block form-text" style="color:red"><strong>Write in full/Do not abbreviate. Put "N/A" if not applicable. Separate each with a semicolon(;)</strong></small>
                </div>
            </div>
            <!---Vice Chair-->

            <!---Member-->
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="committe[]" class=" form-control-label"><b>Member</b> (TESDA/Office Orders, Memorandum)</label>
                </div>
                <div class="col-12 col-md-9">
                    <textarea name="cmt_member" id="cmt_member" rows="4" placeholder="" class="form-control" required></textarea>
                    <small class="help-block form-text" style="color:red"><strong>Write in full/Do not abbreviate. Put "N/A" if not applicable. Separate each with a semicolon(;)</strong></small>
                </div>
            </div>
            <!---Member-->

            <!---Secretariat l-->
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="cmt_secretariat" class=" form-control-label"><b>Secretariat</b> (TESDA/Office Orders, Memorandum)</label>
                </div>
                <div class="col-12 col-md-9">
                    <textarea name="cmt_secretariat" id="cmt_secretariat" rows="4" placeholder="" class="form-control" required></textarea>
                    <small class="help-block form-text" style="color:red"><strong>Write in full/Do not abbreviate. Put "N/A" if not applicable. Separate each with a semicolon(;)</strong></small>
                </div>
            </div>
            <!---Secretariat -->

            <!---PDF File-->
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="cmt_file" class=" form-control-label">Upload your evidence here if any</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="file" id="cmt_file" name="cmt_file" class="form-control-file" accept="application/pdf">
                    <small class="help-block form-text" style="color:red"><strong>Please upload pdf file only.</strong></small>
                </div>
            </div>
            <!---PDF File-->

            <!--Submit-->
            <div class="row form-group">
                <div class="col col-md-3">
                    <button id="btn_forme10" name="forme10" type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Submit</button>
                </div>
                <div id="forme10_message" class="col-12 col-md-9">
                    
                </div>
            </div>
            <!--Submit-->
            
            </form><!---End of Form-->

        </div><!---card-body card-block-->
    </div>
    <!---Form 1-->
</div> <!-- Tenth Tab-->
<!---Form 10-->

<!-- script here -->
<script type="text/javascript">
    $(document).ready(function() {
        var applicant_id;

        //-------FORM 4---------  
        $('#forme10_form').submit(function(e){
        e.preventDefault(); 
            $.ajax({
                url: "<?php echo base_url().'save_forme10'?>",
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
                        html =  '<div class="alert alert-success mt-2 message"><i class="fa fa-check-circle" aria-hidden="true"></i> <b>Congratulations!</b> Your application has been accepted. Please take note of your application number.</div>';
                        html2 =  '<div class="alert alert-success mt-2 message"><i class="fa fa-check-circle" aria-hidden="true"></i> <b>Congratulations!</b> Your application has been accepted. Please take note of your application number.</div>';
                        
                        //message
                        $('#forme10_message').prepend(html2);
                        $('#application_body_card').prepend(html);

                        //Set next tab
                        $("#committee_tab").removeClass("disabled");
                    
                        //Hide
                        $(".message").delay(4000).slideUp(200, function() {
                            $(this).alert('close');
                        });
                    
                        //HIDE button
                        $("#btn_forme10").hide();

                        //disabled inputs
                        $("#cmt_chair").attr("disabled", true);
                        $("#cmt_vcchair").attr("disabled", true);
                        $("#cmt_member").attr("disabled", true);
                        $("#cmt_secretariat").attr("disabled", true);
                        $("#cmt_file").attr("disabled", true);
                    }else{
                        html = '<div class="alert alert-danger mt-2 message"> <b>'+ json.error +'</b></div>';
                        $('#forme10_card').prepend(html);
                        $('#forme10_message').prepend(html);
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