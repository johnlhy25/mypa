<div id="table_my_document" class="table-responsive">      
    <table id="my_document_table" class="table table-striped table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Document</th>
                <th>Date Uploaded</th>
                <th>Actions</th>
            </tr>
        </thead>
        
            <tbody id="show_data_my_document">
                
            </tbody>
    </table>
    <small><b>* Leave blank if Not Applicable (N/A)</b></small>
</div> 

<!-- MODAL ADD -->
    <div class="modal fade" id="add_my_document" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus"></i> Add</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST" id="my_document_save" role="form">
                <div class="modal-body">
                    <div class="form-group row no-padding-top no-padding-bottom no-margin-bottom">
                        <label class="form-control-label">Description</label>
                        <select id="doc_desc" name="doc_desc" class="form-control">
                            <option value="">--Select Document--</option>
                            <option value="01">Personal Data Sheet (PDS)</option>
                            <option value="02">Transcripts of Records (TOR) and Scholastic Records</option>
                            <option value="03">Eligibility/ License/ Board Rating</option>
                            <option value="04">Congratulatory Letter</option>
                            <option value="05">Appointment</option>
                            <option value="06">Oath of Office</option>
                            <option value="07">Assumption to Duty</option>
                            <option value="09">Position Description Form (PDF)</option>
                            <option value="10">Performance Evaluation (IPCR/OPCR/CESPES)</option>
                            <option value="11">Service Record</option>
                            <option value="12">Statement of Assets and Liabilities (SALN)</option>
                            <option value="13">Notice of Salary Adjustments</option>
                            <option value="14">Notice of Step Increment</option>
                            <option value="15">Training Needs Analysis (TNA)</option>
                            <option value="16">Training Certificates</option>
                            <option value="17">Designation Orders</option>
                            <option value="18">Certificates, Commendation, Achievements and Awards</option>
                            <option value="19">Clearances</option>
                            <option value="20">Medical Certificates</option>
                            <option value="21">Disciplinary Action Documents</option>
                        </select>
                        <input type="text" id="other_doc" name="other_doc" class="form-control mt-1" placeholder="Others" disabled>
                        <input type="checkbox" id="other_doc_chk" name="other_doc_chk" value="1" class="mt-1" > 
                        <small class="mt-1"><b>&nbsp Others</b></small>
                    </div>

                    <div class="form-group row no-padding-top no-padding-bottom no-margin-bottom">
                        <input id="my_document_file" class="filestyle" data-buttonBefore="true" data-text="Browse file" data-badge="true" data-badgeName="badge-danger" data-placeholder="Please select only pdf file." type='file' name='my_document_file' accept="application/pdf" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="btn-group">
                        <button id="btn_save_my_document" type="submit" class="btn btn-danger"><i class="fa fa-save"></i> Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>	
                    </div>
                </div>
            </form>

            </div>
        </div>
    </div>
<!--END MODAL ADD-->

<!--MODAL DELETE-->
<form>
<div class="modal fade" id="delete_my_document" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-exclamation-triangle"></i> Warning</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <strong>Are you sure you want to delete this record?</strong>
            
            <br><br><small class="pull-left"><b>Note</b>: This proccess is irreversible.</small>
        </div>
        <div class="modal-footer">
        <input type="hidden" id="doc_id" name="doc_id" class="form-control">
        <input type="hidden" id="file_filename" name="file_filename" class="form-control">

        <div class="btn-group">
            <button id="btn_delete_doc" type="button" class="btn btn-danger" data-dismiss="modal">Yes</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>	
        </div>

        </div>
    </div>
    </div>
</div>
</form>
<!--END MODAL DELETE-->

<!--MODAL View-->
<div class="modal fade" id="view_my_document" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-exclamation-triangle"></i> Warning</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
            <div class="modal-body">
                <iframe id="doc_frame" style="height:780px;width:100%"></iframe>
            </div>
    </div>
    </div>
</div>
</form>
<!--MODAL View-->

<script type="text/javascript">
    $(document).ready(function(){
        show_data_document(); //call function show all work experience

          
        //function show all work experience
        function show_data_document(){
            $.ajax({
                type  : 'GET',
                url   : '<?php echo base_url().'my_document_data'?>',
                async : true,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    var x=1;
                    for(i=0; i<data.length; i++){
                        var desc = '';
                        if(data[i].doc_desc == '01'){
                            desc = 'Personal Data Sheet (PDS)';
                        }else if(data[i].doc_desc == '02'){
                            desc = 'Transcripts of Records (TOR) and Scholastic Records';
                        }else if(data[i].doc_desc == '03'){
                            desc = 'Eligibility/ License/ Board Rating'
                        }else if(data[i].doc_desc == '04'){
                            desc = 'Congratulatory Letter';
                        }else if(data[i].doc_desc == '05'){
                            desc = 'Appointment';
                        }else if(data[i].doc_desc == '06'){
                            desc = 'Oath of Office';
                        }else if(data[i].doc_desc == '07'){
                            desc = 'Assumption to Duty';
                        }else if(data[i].doc_desc == '09'){
                            desc = 'Position Description Form (PDF)';
                        }else if(data[i].doc_desc == '10'){
                            desc = 'Performance Evaluation (IPCR/OPCR/CESPES)';
                        }else if(data[i].doc_desc == '11'){
                            desc = 'Service Record';
                        }else if(data[i].doc_desc == '12'){
                            desc = 'Statement of Assets and Liabilities (SALN)';
                        }else if(data[i].doc_desc == '13'){
                            desc = 'Notice of Salary Adjustments';
                        }else if(data[i].doc_desc == '14'){
                            desc = 'Notice of Step Increment';
                        }else if(data[i].doc_desc == '15'){
                            desc = 'Training Needs Analysis (TNA)';
                        }else if(data[i].doc_desc == '16'){
                            desc = 'Training Certificates';
                        }else if(data[i].doc_desc == '17'){
                            desc = 'Designation Orders';
                        }else if(data[i].doc_desc == '18'){
                            desc = 'Certificates, Commendation, Achievements and Awards';
                        }else if(data[i].doc_desc == '19'){
                            desc = 'Clearances';
                        }else if(data[i].doc_desc == '20'){
                            desc = 'Medical Certificates';
                        }else if(data[i].doc_desc == '21'){
                            desc = 'Disciplinary Action Documents';
                        }else{
                            desc = data[i].doc_desc;
                        }
                        html += '<tr>'+
                                    '<td>'+x+'</td>'+
                                    '<td>'+desc+'</td>'+
                                    '<td>'+moment(data[i].doc_timestamp).format('MM/DD/YYYY')+'</td>'+
                                    '<td>'+
                                        '<a href="javascript:void(0);" class="btn btn-primary btn-sm item_view_doc" data-toggle="modal" data-target="#view_my_document" data-doc_filename="'+data[i].doc_filename+'"><i class="fa fa-eye"></i></a>'+
                                        '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete_doc" data-toggle="modal" data-target="#delete_my_document" data-doc_id="'+data[i].doc_id+'" data-doc_filename="'+data[i].doc_filename+'"><i class="fa fa-trash"></i></a>'+
                                    '</td>'+
                                '</tr>';
                                x=x+1;
                    }
                    $('#show_data_my_document').html(html);
                    $('#my_document_table').DataTable();
                }
 
            });
        }

        $("#other_doc_chk").click(function() {
            if($(this).is(":checked")) {
                $("#other_doc").removeAttr("disabled");
                $("#doc_desc").val("");
                $("#doc_desc").attr("disabled", false);
                $("#doc_desc").attr("disabled", true);
            } else {
                $("#doc_desc").attr("disabled", false);
                $("#other_doc").attr("disabled", true);
                $("#other_doc").val(null);
            }
        });


//---------------Save---------------------
        $('#my_document_save').submit(function(e){
            e.preventDefault(); 
                 $.ajax({
                     url: "<?php echo base_url().'save_my_document'?>",
                     type: "post",
                     data: new FormData(this),
                     processData: false,
                     contentType: false,
                     cache: false,
                     async: false,
                      success: function(data){
                        var json = $.parseJSON(data);
                        if(json.status == 'True'){
                            $( "#other_doc_chk" ).prop( "checked", false );
                            html = '<div class="alert alert-success mt-2"><i class="fa fa-check-circle" aria-hidden="true"></i> <b>'+ json.error +'</b></div>';
                              $('#myTabContent').prepend(html);

                              //Close Modal
                              $(function() {
                                $('#add_my_document').modal('toggle');
                              });
                              
                              //Clear Text Box
                              $('[name="doc_desc"]').val(null);
                              $('[name="other_doc"]').val(null);
                              $('[name="my_document_file"]').val(null);

                        }else{
                          html = '<div class="alert alert-danger mt-2"><i class="fa fa-times-circle" aria-hidden="true"></i> <b>'+ json.error +'</b></div>';
                              $('#myTabContent1').prepend(html);

                              //Clear Text Box
                              $('[name="my_document_file"]').val(null);
                        }
                        //Hide
                        $(".alert").delay(4000).slideUp(200, function() {
                            $(this).alert('close');
                        });                        
                        show_data_document(); //call function show all work experience
                   }
                 });
        });

         //View document
         $('#show_data_my_document').on('click','.item_view_doc',function(){
            var doc_filename = $(this).data('doc_filename');
            var url = '<?php echo base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/empdocs/'?>' + doc_filename +'&zoom=auto';
            $('#doc_frame').attr('src', url)
        });

     

        //get data for delete record
        $('#show_data_my_document').on('click','.item_delete_doc',function(){
            var doc_id = $(this).data('doc_id');
            var doc_filename = $(this).data('doc_filename');
			$('#file_filename').val(doc_filename);
            $('#doc_id').val(doc_id);
        });

        //delete record to database
        $('#btn_delete_doc').on('click',function(){
            var doc_id = $('#doc_id').val();
            var file_filename = $('#file_filename').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url().'delete_my_document'?>",
                dataType : "JSON",
                data : {doc_id:doc_id, file_filename:file_filename},
                success: function(data){
                    html = '<div class="alert alert-success mt-2"><i class="fa fa-check-circle" aria-hidden="true"></i> <b>Deleted Successfully</b></div>';
                    $('#myTabContent').prepend(html);
                    $('[name="doc_id"]').val("");
                     //Hide
                     $(".alert").delay(4000).slideUp(200, function() {
                            $(this).alert('close');
                        });  
                    show_data_document();
                }
            });
            $('#delete_my_document').modal('hide');
            //return false;
        });

    });//Last
 
</script>

