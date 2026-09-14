<!---Form 7-->
<!-- Seventh Tab-->
<div class="tab-pane fade" id="reference" role="tabpanel" aria-labelledby="reference">
    <!---Form 1-->
    <div class="card">
        <div class="card-header">
            <strong>References</strong>
        </div>
        <div id="forme7_card" class="card-body card-block"><!---card-body card-block-->

            <form action="" method="POST" id="forme7_form" role="form"><!--Form-->
            <input type="hidden" id="forme7_app_id" name="forme7_app_id" class="form-control">
            <!--Immediate Supervisor-->
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="immediate_supervisor" class=" form-control-label"><span style="color:red"><strong>*</strong></span> Immediate Supervisor</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="immediate_supervisor" name="immediate_supervisor[]" placeholder="Juan B. Dela Cruz" class="form-control" required>
                    <input type="email" id="immediate_supervisor_email" name="immediate_supervisor[]" placeholder="juanbdelacruz@gmail.com" class="form-control" style="margin-top:5px;" required>
                    <input type="text" id="immediate_supervisor_contact" name="immediate_supervisor[]" placeholder="093534567890" class="form-control" style="margin-top:5px;" required>
                    <small class="help-block form-text" style="color:red"><strong>Write in full/Do not abbreviate. Put "N/A" if not applicable.</strong></small>
                </div>

            </div>
            <!--Immediate Supervisor-->

            <!--peer-->
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="peer" class=" form-control-label"><span style="color:red"><strong>*</strong></span> Peer</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="peer" name="peer[]" placeholder="Juan B. Dela Cruz" class="form-control" required>
                    <input type="email" id="peer_email" name="peer[]" placeholder="juanbdelacruz@gmail.com" class="form-control" style="margin-top:5px;" required>
                    <input type="text" id="peer_contact" name="peer[]" placeholder="093534567890" class="form-control" style="margin-top:5px;" required>
                    <small class="help-block form-text" style="color:red"><strong>Write in full/Do not abbreviate. Put "N/A" if not applicable.</strong></small>
                </div>
            </div>
            <!--peer-->

            <!--Client-->
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="client" class=" form-control-label"><span style="color:red"><strong>*</strong></span> Client</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="client" name="client[]" placeholder="Juan B. Dela Cruz" class="form-control" required>
                    <input type="email" id="client_email" name="client[]" placeholder="juanbdelacruz@gmail.com" class="form-control" style="margin-top:5px;" required>
                    <input type="text" id="client_contact" name="client[]" placeholder="093534567890" class="form-control" style="margin-top:5px;" required>
                    <small class="help-block form-text" style="color:red"><strong>Write in full/Do not abbreviate. Put "N/A" if not applicable.</strong></small>
                </div>
            </div>
            <!--Client-->

            <!--Submit-->
            <div class="row form-group">
                <div class="col col-md-3">
                    <button id="btn_forme7" name="forme6" type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Submit</button>
                </div>
                <div id="forme7_message" class="col-12 col-md-9">
                    
                </div>
            </div>
            <!--Submit-->
            
            </form><!---End of Form-->

        </div><!---card-body card-block-->
    </div>
    <!---Form 1-->
</div> <!-- Seventh Tab-->
<!---End of Form 7-->

<!-- script here -->
<script type="text/javascript">
    $(document).ready(function() {
        var applicant_id;

        //-------FORM 4---------  
        $('#forme7_form').submit(function(e){
        e.preventDefault(); 
            $.ajax({
                url: "<?php echo base_url().'save_forme7'?>",
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
                        html =  '<div class="alert alert-success mt-2 message"><i class="fa fa-check-circle" aria-hidden="true"></i> <b>Saved</b> successfully. Please continue to the next tab (Awards related to performance).</div>';
                        html2 =  '<div class="alert alert-success mt-2 message"><i class="fa fa-check-circle" aria-hidden="true"></i> <b>Saved</b> successfully. Please continue to the next tab (Awards related to performance).</div>';
                        
                        //message
                        $('#forme7_message').prepend(html2);
                        $('#application_body_card').prepend(html);

                        //Set next tab
                        $("#performance_tab").removeClass("disabled");
                    
                        //Hide
                        $(".message").delay(4000).slideUp(200, function() {
                            $(this).alert('close');
                        });
                    
                        //HIDE button
                        $("#btn_forme7").hide();

                        //disabled inputs
                        $("#immediate_supervisor").attr("disabled", true);
                        $("#immediate_supervisor_email").attr("disabled", true);
                        $("#immediate_supervisor_contact").attr("disabled", true);

                        $("#peer").attr("disabled", true);
                        $("#peer_email").attr("disabled", true);
                        $("#peer_contact").attr("disabled", true);

                        $("#client").attr("disabled", true);
                        $("#client_email").attr("disabled", true);
                        $("#client_contact").attr("disabled", true);

                    }else{
                        html = '<div class="alert alert-danger mt-2 message"> <b>'+ json.error +'</b></div>';
                        $('#forme7_card').prepend(html);
                        $('#forme7_message').prepend(html);
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