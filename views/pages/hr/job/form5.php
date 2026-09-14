<!---Form 5-->
<!-- Fifth Tab-->
<div class="tab-pane fade" id="ra8371" role="tabpanel" aria-labelledby="ra8371">
    <div class="card">
        <div class="card-header">
            <strong>Pursuant to:</strong> (a) Indigenous People's Act (RA 8371);(b) Magna Carta for Disabled Persons (RA 7277); and (c) Solo Parents Welfare Act 2000 (RA 8972), please answer the following items
        </div>
        <div id="forme5_card" class="card-body card-block"><!---card-body card-block-->
            <form action="" method="POST" id="forme5_form" role="form"><!--Form-->
            <input type="hidden" id="forme5_app_id" name="forme5_app_id" class="form-control">
            <!---RA8371-->
            <div class="row form-group">
                <div class="col col-md-7">
                    <label class=" form-control-label">Are you a member of any indigenous group? <b>(if yes, please specify in the others)</b></label>
                </div>
                <div class="col col-md-5">
                    <div class="form-check">
                        <div class="radio">
                            <label for="ra8371_yes" class="form-check-label ">
                                <input type="radio" id="ra8371_yes" name="ra8371[]" value="Yes" class="form-check-input" required>Yes
                            </label>
                        </div>
                        <div class="radio">
                            <label for="ra8371_no" class="form-check-label ">
                                <input type="radio" id="ra8371_no" name="ra8371[]" value="No" class="form-check-input">No
                            </label>
                        </div>
                        <div class="radio">
                            <label for="radio3" class="form-check-label ">
                                <input type="text" id="ra8371_others" name="ra8371[]" placeholder="Others" class="form-control" disabled required>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
                <!---RA8371-->

            <!---RA7277-->
            <div class="row form-group">
                <div class="col col-md-7">
                    <label class=" form-control-label">Are you a person with disability? <b>(if yes, please specify ID number in others)</b></label>
                </div>
                <div class="col col-md-5">
                    <div class="form-check">
                        <div class="radio">
                            <label for="ra727_yes" class="form-check-label ">
                                <input type="radio" id="ra727_yes" name="ra727[]" value="Yes" class="form-check-input" required>Yes
                            </label>
                        </div>
                        <div class="radio">
                            <label for="ra727_no" class="form-check-label ">
                                <input type="radio" id="ra727_no" name="ra727[]" value="No" class="form-check-input">No
                            </label>
                        </div>
                        <div class="radio">
                            <label for="radio3" class="form-check-label ">
                                <input type="text" id="ra727_others" name="ra727[]" placeholder="Others" class="form-control" disabled required>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <!---RA7277-->

            <!---RA8972-->
            <div class="row form-group">
                <div class="col col-md-7">
                    <label class=" form-control-label">Are you a solo parent? <b>(if yes, please specify ID number in others)</b></label>
                </div>
                <div class="col col-md-5">
                    <div class="form-check">
                        <div class="radio">
                            <label for="ra8972_yes" class="form-check-label ">
                                <input type="radio" id="ra8972_yes" name="ra8972[]" value="Yes" class="form-check-input" required>Yes
                            </label>
                        </div>
                        <div class="radio">
                            <label for="ra8972_no" class="form-check-label ">
                                <input type="radio" id="ra8972_no" name="ra8972[]" value="No" class="form-check-input">No
                            </label>
                        </div>
                        <div class="radio">
                            <label for="radio3" class="form-check-label ">
                                <input type="text" id="ra8972_others" name="ra8972[]" placeholder="Others" class="form-control" disabled required>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <!---RA7277-->

            <!--Submit-->
            <div class="row form-group">
                <div class="col col-md-3">
                    <button id="btn_forme5" name="forme5" type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Submit</button>
                </div>
                <div id="forme5_message" class="col-12 col-md-9">
                    
                </div>
            </div>
            <!--Submit-->
            
            </form><!---End of Form-->

        </div><!---card-body card-block-->
    </div>
    <!---Form 1-->
</div> 
<!-- Fifth Tab-->
<!---End of Form 5-->

<!-- script here -->
<script type="text/javascript">
    $(document).ready(function() {
        var applicant_id;

        //-------FORM 4---------  
        $('#forme5_form').submit(function(e){
        e.preventDefault(); 
            $.ajax({
                url: "<?php echo base_url().'save_forme5'?>",
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
                        $('#forme5_message').prepend(html2);
                        $('#application_body_card').prepend(html);

                        //Set next tab
                        $("#pdswes_tab").removeClass("disabled");
                    
                        //Hide
                        $(".message").delay(4000).slideUp(200, function() {
                            $(this).alert('close');
                        });
                    
                        //HIDE button
                        $("#btn_forme5").hide();

                        //disabled inputs
                        $("#ra8371_yes").attr("disabled", true);
                        $("#ra8371_no").attr("disabled", true);
                        $("#ra8371_others").attr("disabled", true);

                        $("#ra727_yes").attr("disabled", true);
                        $("#ra727_no").attr("disabled", true);
                        $("#ra727_others").attr("disabled", true);

                        $("#ra8972_yes").attr("disabled", true);
                        $("#ra8972_no").attr("disabled", true);
                        $("#ra8972_others").attr("disabled", true);
                       

                    }else{
                        html = '<div class="alert alert-danger mt-2 message"> <b>'+ json.error +'</b></div>';
                        $('#forme5_card').prepend(html);
                        $('#forme5_message').prepend(html);
                        //Hide
                        $(".message").delay(4000).slideUp(200, function() {
                            $(this).alert('close');
                        });
                    }       
                }
            });
        });

        //-------RA8371-------
        $("#ra8371_yes").click(function () {
		if ($("#ra8371_yes").is(":checked")) {
			$("#ra8371_others").removeAttr("disabled");
            $("#ra8371_others").attr("required", true);
		}
	    });

        $("#ra8371_no").click(function () {
		if ($("#ra8371_no").is(":checked")) {
			$("#ra8371_others").attr("disabled", true);
            $("#ra8371_others").removeAttr("required");
            $("#ra8371_others").val("");
		}
	    });
        //-------RA8371-------

        //-------RA727-------
        $("#ra727_yes").click(function () {
		if ($("#ra727_yes").is(":checked")) {
			$("#ra727_others").removeAttr("disabled");
            $("#ra727_others").attr("required", true);
		}
	    });

        $("#ra727_no").click(function () {
		if ($("#ra727_no").is(":checked")) {
			$("#ra727_others").attr("disabled", true);
            $("#ra727_others").removeAttr("required");
            $("#ra727_others").val("");
		}
	    });
        //-------RA727-------

        //-------RA8972-------
        $("#ra8972_yes").click(function () {
		if ($("#ra8972_yes").is(":checked")) {
			$("#ra8972_others").removeAttr("disabled");
            $("#ra8972_others").attr("required", true);
		}
	    });

        $("#ra8972_no").click(function () {
		if ($("#ra8972_no").is(":checked")) {
			$("#ra8972_others").attr("disabled", true);
            $("#ra8972_others").removeAttr("required");
            $("#ra8972_others").val("");
		}
	    });
        //-------RA8972-------


    });
    //-------FORM 4---------  
</script>
<!-- script here -->