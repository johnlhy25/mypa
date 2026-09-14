<div id="alert_data_import" class="table-responsive no-padding-top">      
    <table id="work_experience_table" class="table table-striped table-hover" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>From (Date)</th>
                <th>To (Date)</th>
                <th>Position Title</th>
                <th>Agency/ Company</th>
                <th>Monthly Salary</th>
                <th>Salary Grade </th> 
                <th>Status</th>
                <th>Gov't Service (Y/N)</th> 
                <th>Action</th>
            </tr>
        </thead>
        
            <tbody id="show_data_work_experience">
                
            </tbody>
    </table>
</div> 


<!-- MODAL ADD -->
    <div class="modal fade" id="Modal_Add_work_experience" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus"></i> Add</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                    <div class="form-group row no-padding-top no-padding-bottom">
                        <label class="form-control-label">Department/ Agency/ Office/ Company</label>
                        <input type="text" id="we_agency" name="we_agency" class="form-control" placeholder="Technical Education And Skills Development Authority">
                        <small><b>Write in full/Do not abbreviate</b></small>
                    </div>
                    <div class="form-group row no-padding-top no-padding-bottom">
                        <label class="form-control-label">Position Title</label>
                        <input type="text" id="we_position_title" name="we_position_title" class="form-control" placeholder="Information Technology Officer I">
                        <small><b>Write in full/Do not abbreviate</b></small>
                    </div>
                    <div class="form-group row no-padding-top no-padding-bottom">
                        <label class="form-control-label">From (Date)</label>
                        <input type="date" id="we_from" name="we_from" class="form-control" />
                    </div>
                    <div class="form-group row no-padding-top no-padding-bottom">
                        <label class="form-control-label">To (Date)</label>
                        <input type="date" id="we_to" name="we_to" class="form-control" />
                        <input type="checkbox" id="we_present" name="we_present"/> &nbsp Present
                    </div>
                    <div class="form-group row no-padding-top no-padding-bottom">
                        <label class="form-control-label">Monthly Salary</label>
                        <input type="text" id="we_salary" name="we_salary" class="form-control" placeholder="49,012.36">
                    </div>
                    <div class="form-group row no-padding-top no-padding-bottom">
                        <label class="form-control-label">Salary/ Job/ Pay Grade</label>
                        <input type="text" id="we_sg" name="we_sg" class="form-control" placeholder="SG 19-1">
                    </div>
                    <div class="form-group row no-padding-top no-padding-bottom">
                        <label class="form-control-label">Status of Appoinment</label>
                        <select id="we_status" name="we_status" class="form-control">
                            <option>--Select Appointment--</option>
                                <option value="Permanent">Permanent</option>
                                <option value="Casual">Casual</option>
                                <option value="Substitute">Substitute</option>
                                <option value="Provisional">Provisional</option>
                                <option value="Temporary">Temporary</option>
                                <option value="Contractual">Contractual</option>
                                <option value="JO/COS">Job Order/ Contract of Service</option>
                                <option value="Regular">Regular (For Private)</option>
                                <option value="Probationary">Probationary (For Private)</option>
                                <option value="Memorandum Of Agreement">MOA</option>
                                <option value="Volunteer">Volunteer</option>
                                 
                        </select>
                    </div>

                    <div class="form-group row no-padding-top no-padding-bottom">
                        <label class="form-control-label">Gov't Service (Y/N)</label>
                        <select id="we_service" name="we_service" class="form-control">
                            <option>--Select Type of Gov't Service--</option>
                            <option value="Y">Yes</option>
                            <option value="N">No</option>
                        </select>
                    </div>
                    
            </div>
            <div class="modal-footer">
                <div class="btn-group">
                    <button id="btn_save_work_experience" type="button" class="btn btn-danger"><i class="fa fa-save"></i> Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>	
                </div>
            </div>
            </div>
        </div>
    </div>
<!--END MODAL ADD-->

<!-- MODAL EDIT -->
    <div class="modal fade" id="Modal_Edit_work_experience" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-edit"></i> Edit</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div id="alert_data_we" class="modal-body">
                    <input type="hidden" id="we_id_edit" name="we_id_edit">
                    <div class="form-group row no-padding-top no-padding-bottom">
                        <label class="form-control-label">Department/ Agency/ Office/ Company</label>
                        <input type="text" id="we_agency_edit" name="we_agency_edit" class="form-control" placeholder="Technical Education And Skills Development Authority">
                        <small><b>Write in full/Do not abbreviate</b></small>
                    </div>
                    <div class="form-group row no-padding-top no-padding-bottom">
                        <label class="form-control-label">Position Title</label>
                        <input type="text" id="we_position_title_edit" name="we_position_title_edit" class="form-control" placeholder="Information Technology Officer I">
                        <small><b>Write in full/Do not abbreviate</b></small>
                    </div>
                    <div class="form-group row no-padding-top no-padding-bottom">
                        <label class="form-control-label">From (Date)</label>
                        <input type="date" id="we_from_edit" name="we_from_edit" class="form-control" />
                    </div>
                    <div class="form-group row no-padding-top no-padding-bottom">
                        <label class="form-control-label">To (Date)</label>
                        <input type="date" id="we_to_edit" name="we_to_edit" class="form-control" />
                        <input type="checkbox" id="we_present_edit" name="we_present_edit"/> &nbsp Present
                    </div>
                    <div class="form-group row no-padding-top no-padding-bottom">
                        <label class="form-control-label">Monthly Salary</label>
                        <input type="text" id="we_salary_edit" name="we_salary_edit" class="form-control" placeholder="49,012.36">
                    </div>
                    <div class="form-group row no-padding-top no-padding-bottom">
                        <label class="form-control-label">Salary/ Job/ Pay Grade</label>
                        <input type="text" id="we_sg_edit" name="we_sg_edit" class="form-control" placeholder="SG 19-1">
                    </div>
                    <div class="form-group row no-padding-top no-padding-bottom">
                        <label class="form-control-label">Status of Appoinment</label>
                        <select id="we_status_edit" name="we_status_edit" class="form-control">
                            <option>--Select Appointment--</option>
                                <option value="Permanent">Permanent</option>
                                <option value="Casual">Casual</option>
                                <option value="Substitute">Substitute</option>
                                <option value="Provisional">Provisional</option>
                                <option value="Temporary">Temporary</option>
                                <option value="Contractual">Contractual</option>
                                <option value="JO/COS">Job Order/ Contract of Service</option>
                                <option value="Regular">Regular (For Private)</option>
                                <option value="Probationary">Probationary (For Private)</option>
                                <option value="Memorandum Of Agreement">MOA</option>
                                <option value="Volunteer">Volunteer</option>
                        </select>
                    </div>

                    <div class="form-group row no-padding-top no-padding-bottom">
                        <label class="form-control-label">Gov't Service (Y/N)</label>
                        <select id="we_service_edit" name="we_service_edit" class="form-control">
                            <option>--Select Type of Gov't Service--</option>
                            <option value="Y">Yes</option>
                            <option value="N">No</option>
                        </select>
                    </div>
                    
            </div>
            <div class="modal-footer">
                <div class="btn-group">
                    <button id="btn_edit_work_experience" type="button" class="btn btn-danger"><i class="fa fa-save"></i> Update</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>	
                </div>
            </div>
            </div>
        </div>
    </div>
<!--END MODAL EDIT-->

<!--MODAL DELETE-->
    <div class="modal fade" id="Modal_Delete_Work_Experience" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <input type="hidden" id="we_id" name="we_id" class="form-control">

            <div class="btn-group">
                <button id="btn_delete_we" type="button" class="btn btn-danger" data-dismiss="modal">Yes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>	
            </div>

            </div>
        </div>
        </div>
    </div>
<!--END MODAL DELETE-->

<!--MODAL btn_duplicate_weE-->
    <form>
    <div class="modal fade" id="duplicate_we" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-exclamation-triangle"></i> Warning</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <strong>Are you sure you want to DUPLICATE this record?</strong>
                
                <br><br><small class="pull-left"><b>Note</b>: This proccess is irreversible.</small>
            </div>
            <div class="modal-footer">
            <input type="text" id="we_id_duplicate" name="we_id_duplicate" class="form-control">

            <div class="btn-group">
                <button id="btn_duplicate_we" type="button" class="btn btn-danger">Yes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>	
            </div>

            </div>
        </div>
        </div>
    </div>
</form>
<!--END MODAL btn_duplicate_we-->

<!--MODAL IMPORT-->
<div class="modal fade" id="Modal_Import_Work_Experience" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel"> 
                    <i class="fa fa-cloud-upload" aria-hidden="true"></i> Import
                </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="importForm" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="form-control-label">
                            <i class="fa fa-cloud-upload" aria-hidden="true"></i> Import File *
                        </label>
                        <input class="filestyle" type='file' name='import_work_experience' id="import_work_experience" accept=".xlsx, .xls" required>
                    </div> 
                    <div class="form-group mt-3">
                        <label class="form-control-label">
                            <b><a href="<?= base_url();?>uploads/archive/Import.xlsx">
                                <i class="fa fa-download" aria-hidden="true"></i> Download Template
                            </a></b> | Template Demo: 
                        </label>
                        <img src="<?= base_url();?>assets/img/Import.gif" width="100%">
                    </div>  
                    <div class="form-group mt-3">
                        <label class="form-control-label">
                            <b>Note:</b> 
                            <br>
                             1. The headers in the template file are mandatory.
                            <br>
                            2. Ensure all column values are formatted as text.
                        </label>
                    </div>       
                </form>
            </div>
            <div class="modal-footer">
                <div class="btn-group">
                    <button id="btn_import" type="button" class="btn btn-danger">
                        <i class="fa fa-cloud-upload" aria-hidden="true"></i> Import
                    </button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>    
                </div>
            </div>
        </div>
    </div>
</div>
<!--END MODAL IMPORT-->


<script type="text/javascript">
    $(document).ready(function(){
        show_work_experience(); //call function show all work experience
      
        //function show all work experience
        function show_work_experience(){
            $.ajax({
                type  : 'GET',
                url   : '<?php echo base_url().'work_experience_data'?>',
                async : true,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    var x=1;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                    '<td>'+x+'</td>'+
                                    '<td>'+data[i].we_from+'</td>'+
                                    '<td>'+data[i].we_to+'</td>'+
                                    '<td>'+data[i].we_position_title+'</td>'+
                                    '<td>'+data[i].we_agency+'</td>'+
                                    '<td>'+data[i].we_salary+'</td>'+
                                    '<td>'+data[i].we_sg+'</td>'+
                                    '<td>'+data[i].we_status+'</td>'+
                                    '<td>'+data[i].we_service+'</td>'+
                                    '<td>'+
                                        '<a href="javascript:void(0);" class="btn btn-primary btn-sm item_edit_we" data-toggle="modal" data-target="#Modal_Edit_work_experience"'+
                                        'data-we_id_edit="'+data[i].we_id+'" data-we_agency_edit="'+data[i].we_agency+'"'+
                                        'data-we_position_title_edit="'+data[i].we_position_title+'" data-we_from_edit="'+data[i].we_from+'"'+
                                        'data-we_to_edit="'+data[i].we_to+'" data-we_salary_edit="'+data[i].we_salary+'"'+
                                         'data-we_sg_edit="'+data[i].we_sg+'" data-we_status_edit="'+data[i].we_status+'" data-we_service_edit="'+data[i].we_service+'"'+
                                        '><i class="fa fa-edit"></i></a>'+
                                        '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete_we" data-toggle="modal" data-target="#Modal_Delete_Work_Experience" data-we_id="'+data[i].we_id+'"><i class="fa fa-trash"></i></a>'+                         
                                        '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_duplicate_we" data-toggle="modal" data-target="#duplicate_we" data-we_id="'+data[i].we_id+'"><i class="fa fa-clone"></i></a>'+               
                                    '</td>'+
                                '</tr>';
                                x=x+1;
                    }
                    $('#show_data_work_experience').html(html);
                    $('#work_experience_table').DataTable();
                }
 
            });
        }

//Save work experience
        $('#btn_save_work_experience').on('click',function(){
            var we_from = $('#we_from').val();
            var we_position_title = $('#we_position_title').val();
            var we_agency = $('#we_agency').val();
            var we_salary = $('#we_salary').val();
            var we_sg = $('#we_sg').val();
            var we_status = $('#we_status').val();
            var we_service = $('#we_service').val();
            
            if($('#we_present').prop('checked')){
                var we_to = 'Present';
            }else{
                var we_to = $('#we_to').val();
            }

            $.ajax({
                type : "POST",
                url  : "<?php echo base_url().'work_experience_data_save'?>",
                dataType : "JSON",
                data : {we_from:we_from, we_to:we_to, we_position_title:we_position_title, we_agency:we_agency, we_salary:we_salary, we_sg:we_sg, we_status:we_status, we_service:we_service, we_service:we_service},
                success: function(data){
                    $('[name="we_from"]').val("");
                    $('[name="we_to"]').val("");
                    $('[name="we_position_title"]').val("");
                    $('[name="we_agency"]').val("");
                    $('[name="we_salary"]').val("");
                    $('[name="we_sg"]').val("");
                    $('[name="we_status"]').val("");
                    $('[name="we_service"]').val("");
                    $('[name="we_present"]').prop('checked', false);
                    show_work_experience();
                }
            });
            return false;
        });
//Save work experience

//Edit work experience

        $('#show_data_work_experience').on('click','.item_edit_we',function(){
            var we_id_edit = $(this).data('we_id_edit');
			$('#we_id_edit').val(we_id_edit);

            var we_agency_edit = $(this).data('we_agency_edit');
			$('#we_agency_edit').val(we_agency_edit);

            var we_position_title_edit = $(this).data('we_position_title_edit');
			$('#we_position_title_edit').val(we_position_title_edit);

            var we_from_edit = $(this).data('we_from_edit');
			$('#we_from_edit').val(we_from_edit);

            var we_to_edit = $(this).data('we_to_edit');
            if(we_to_edit == 'Present'){
                $('#we_present_edit').prop('checked', false);
                $('#we_present_edit').prop('checked', true);
                $('#we_to_edit').val(null);
            }else{
                $('#we_present_edit').prop('checked', false);
                $('#we_to_edit').val(we_to_edit);
            }
			$('#we_from_edit').val(we_from_edit);

            var we_salary_edit = $(this).data('we_salary_edit');
			$('#we_salary_edit').val(we_salary_edit);

            var we_sg_edit = $(this).data('we_sg_edit');
			$('#we_sg_edit').val(we_sg_edit);

            var we_status_edit = $(this).data('we_status_edit');
			$('#we_status_edit').val(we_status_edit);

            var we_service_edit = $(this).data('we_service_edit');
			$('#we_service_edit').val(we_service_edit);
        });

        $('#btn_edit_work_experience').on('click',function(){
            var we_id = $('#we_id_edit').val();
            var we_from = $('#we_from_edit').val();
            var we_position_title = $('#we_position_title_edit').val();
            var we_agency = $('#we_agency_edit').val();
            var we_salary = $('#we_salary_edit').val();
            var we_sg = $('#we_sg_edit').val();
            var we_status = $('#we_status_edit').val();
            var we_service = $('#we_service_edit').val();
            
            if($('#we_present_edit').prop('checked')){
                var we_to = 'Present';
            }else{
                var we_to = $('#we_to_edit').val();
            }

            $.ajax({
                type : "POST",
                url  : "<?php echo base_url().'work_experience_data_edit'?>",
                dataType : "JSON",
                data : {we_id:we_id, we_from:we_from, we_to:we_to, we_position_title:we_position_title, we_agency:we_agency, we_salary:we_salary, we_sg:we_sg, we_status:we_status, we_service:we_service, we_service:we_service},
                success: function(data){
                    html = '<div class="alert alert-success"><i class="fa fa-check-circle" aria-hidden="true"></i> <b>Updated</b> successfully.</div>';
                        $('#alert_data_we').prepend(html);
                        //Hide
                        $(".alert").delay(4000).slideUp(200, function() {
                            $(this).alert('close');
                        });
                    show_work_experience();
                }
            });
            return false;
        });
//Edit work experience

//get data for delete record
        $('#show_data_work_experience').on('click','.item_delete_we',function(){
            var we_id = $(this).data('we_id');
			$('#we_id').val(we_id);
        });
//get data for delete record
        
//delete record to database
        $('#btn_delete_we').on('click',function(){
            var we_id = $('#we_id').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url().'work_experience_data_delete'?>",
                dataType : "JSON",
                data : {we_id:we_id},
                success: function(data){
                    $('[name="we_id"]').val("");
                    show_work_experience();
                }
            });
            $('#Modal_Delete_Work_Experience').modal('hide');
            return false;
        });
//delete record to database

//get data for delete record
$('#show_data_work_experience').on('click','.item_duplicate_we',function(){
            var we_id = $(this).data('we_id');
			$('#we_id_duplicate').val(we_id);
        });
//get data for delete record
        
//delete record to database
        $('#btn_duplicate_we').on('click',function(){
            var we_id_duplicate = $('#we_id_duplicate').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url().'work_experience_data_duplicate'?>",
                dataType : "JSON",
                data : {we_id_duplicate:we_id_duplicate},
                success: function(data){
                    $('[name="we_id"]').val("");
                    show_work_experience();
                }
            });
            $('#duplicate_we').modal('hide');
            return false;
        });
//delete record to database

//import to records
$('#btn_import').click(function () {
    var formData = new FormData($('#importForm')[0]);

    $.ajax({
        url: '<?= base_url('auth/import_wes'); ?>', // Ensure base_url is correctly set
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        beforeSend: function() {
            // Optional: Show a loading spinner or disable the button
            $('#btn_import').prop('disabled', true);
            $('#btn_import').html('<i class="fa fa-spinner fa-spin"></i> Importing...');
        },
        success: function (response) {
            // Parse JSON response if it's in JSON format
            try {
                var jsonResponse = JSON.parse(response);
                if (jsonResponse.status === 'success') {

                    html = '<div class="alert alert-success"><i class="fa fa-check-circle" aria-hidden="true"></i> '+ jsonResponse.message +'</div>';
                    $('#alert_data_import').prepend(html);
                    //Hide
                    $(".alert").delay(4000).slideUp(200, function() {
                        $(this).alert('close');
                    });
                    show_work_experience();
                   
                } else {
                    html = '<div class="alert alert-danger"><i class="fa fa-check-circle" aria-hidden="true"></i> '+ jsonResponse.message +'</div>';
                    $('#alert_data_import').prepend(html);
                    //Hide
                    $(".alert").delay(4000).slideUp(200, function() {
                        $(this).alert('close');
                    });
                }
            } catch (e) {
                html = '<div class="alert alert-danger"><i class="fa fa-check-circle" aria-hidden="true"></i> Unexpected response format. </div>';
                $('#alert_data_import').prepend(html);
                //Hide
                $(".alert").delay(4000).slideUp(200, function() {
                    $(this).alert('close');
                });
            }

            // Clear the form input and hide the modal
            $('#importForm')[0].reset();
            $('#Modal_Import_Work_Experience').modal('hide');
        },
        error: function (xhr, status, error) {
            // Improved error handling
            var errorMessage = xhr.status + ': ' + xhr.statusText;
            alert('An error occurred: ' + errorMessage);
        },
        complete: function() {
            // Optional: Re-enable the button after the request is complete
            $('#btn_import').prop('disabled', false);
            $('#btn_import').html('<i class="fa fa-cloud-upload" aria-hidden="true"></i> Import');
        }
    });
});

//import to records

    });//Last
 
</script>