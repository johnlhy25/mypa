<div id="table_wes" class="table-responsive">      
    <table id="wes_table" class="table table-striped table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>From</th>
                <th>To</th>
                <th>Position</th>
                <th>Name of Office/Unit</th>
                <th>Immediate Supervisor</th>
                <th>Name of Agency and Location</th>
                <th>Action</th>
            </tr>
        </thead>
        
            <tbody id="show_data_wes">
                
            </tbody>
    </table>
    <small><b>* Leave blank if Not Applicable (N/A)</b></small>
</div> 

<!--MODAL DELETE-->
    <div class="modal fade" id="delete_wes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <input type="hidden" id="wes_id" name="wes_id" class="form-control">

            <div class="btn-group">
                <button id="btn_delete_wes" type="button" class="btn btn-danger" data-dismiss="modal">Yes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>	
            </div>

            </div>
        </div>
        </div>
    </div>
<!--END MODAL DELETE-->

<!-- MODAL ADD -->
    <div class="modal fade" id="Modal_Add_WES" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus"></i> Add</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="" method="POST" id="wes_id_save_id" role="form">
                    <div id="alert_data_wes" class="modal-body">
                        <div class="row row no-padding-top no-padding-bottom">
                                <div class="col-md-4">
                                    <div class="form-group row no-padding-top no-padding-bottom">
                                        <label class="form-control-label">From (Date)</label>
                                        <input type="date" id="wes_from" name="wes_from" class="form-control" />
                                    </div>
                                    <div class="form-group row no-padding-top no-padding-bottom">
                                        <label class="form-control-label">To (Date)</label>
                                        <input type="date" id="wes_to" name="wes_to" class="form-control" />
                                        <input type="checkbox" id="wes_present" name="wes_present" value="1"/> &nbsp Present
                                    </div>

                                    <div class="form-group row no-padding-top no-padding-bottom">
                                        <label class="form-control-label">Position</label>
                                        <input type="text" id="wes_position" name="wes_position" class="form-control" placeholder="Information Technology Officer I" required>
                                        <small><b>Write in full/Do not abbreviate</b></small>
                                    </div>

                                    <div class="form-group row no-padding-top no-padding-bottom">
                                        <label class="form-control-label">Name of Office/Unit</label>
                                        <input type="text" id="wes_office" name="wes_office" class="form-control" placeholder="Batanes Provincial Office" required>
                                        <small><b>Write in full/Do not abbreviate</b></small>
                                    </div>

                                    <div class="form-group row no-padding-top no-padding-bottom">
                                        <label class="form-control-label">Immediate Supervisor</label>
                                        <input type="text" id="wes_supervisor" name="wes_supervisor" class="form-control" placeholder="John Lee P. Santiago" required>
                                        <small><b>Write in full/Do not abbreviate</b></small>
                                    </div>

                                    <div class="form-group row no-padding-top no-padding-bottom">
                                        <label class="form-control-label">Immediate Supervisor Position</label>
                                        <input type="text" id="wes_s_position" name="wes_s_position" class="form-control" placeholder="Regional Director" required>
                                        <small><b>Write in full/Do not abbreviate</b></small>
                                    </div>

                                    <div class="form-group row no-padding-top no-padding-bottom">
                                        <label class="form-control-label">Name of Agency/Organiztion and Location</label>
                                        <input type="text" id="wes_agency" name="wes_agency" class="form-control" placeholder="Technical Education And Skills Development Authority, San Antonio, Basco, Batanes" required>
                                        <small><b>Write in full/Do not abbreviate</b></small>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group row no-padding-top no-padding-bottom">
                                        <label class="form-control-label">List of Accomplishments and Contributions (if any)</label>
                                        <textarea id="wes_accomplishment" name="wes_accomplishment" class="form-control" rows="8" placeholder="Developed/maintained the R2 FASD Services System of TESDA Region II; Developed/maintained the Daily Time Record Management of TESDA Batanes Provincial Office"></textarea>
                                        <small><b>Write in full/Do not abbreviate</b> (Separate each with a semicolon [;].)</small>
                                    </div>
                                    <div class="form-group row no-padding-top no-padding-bottom">
                                        <label class="form-control-label">Summary of Actual Duties</label>
                                        <textarea id="wes_actual_duties" name="wes_actual_duties" class="form-control" rows="8" placeholder="Develops/updates the R2 FASD Services System of TESDA Region II; Develops/updates the Daily Time Record Management of TESDA Batanes Provincial Office"></textarea>
                                        <small><b>Write in full/Do not abbreviate</b> (Separate each with a semicolon [;].)</small>
                                    </div>
                                </div> 
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="btn-group">
                            <button type="submit" class="btn btn-danger"><i class="fa fa-save"></i> Save</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>	
                        </div>
                    </div>
                </form>
            </div>  
        </div>
    </div>
<!--END MODAL ADD-->

<!-- MODAL EDIT  -->
    <div class="modal fade" id="edit_wes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-edit"></i> Edit</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="" method="POST" id="wes_id_edit_id" role="form">
                    <div id="alert_data_wes_edit" class="modal-body">
                        <div class="row row no-padding-top no-padding-bottom">
                                <div class="col-md-4">
                                    <input type="hidden" id="wes_id_edit" name="wes_id_edit" class="form-control" />
                                    <div class="form-group row no-padding-top no-padding-bottom">
                                        <label class="form-control-label">From (Date)</label>
                                        <input type="date" id="wes_from_edit" name="wes_from_edit" class="form-control" />
                                    </div>
                                    <div class="form-group row no-padding-top no-padding-bottom">
                                        <label class="form-control-label">To (Date)</label>
                                        <input type="date" id="wes_to_edit" name="wes_to_edit" class="form-control" />
                                        <input type="checkbox" id="wes_present_edit" name="wes_present_edit" value="1"/> &nbsp Present
                                    </div>

                                    <div class="form-group row no-padding-top no-padding-bottom">
                                        <label class="form-control-label">Position</label>
                                        <input type="text" id="wes_position_edit" name="wes_position_edit" class="form-control" placeholder="Information Technology Officer I" required>
                                        <small><b>Write in full/Do not abbreviate</b></small>
                                    </div>

                                    <div class="form-group row no-padding-top no-padding-bottom">
                                        <label class="form-control-label">Name of Office/Unit</label>
                                        <input type="text" id="wes_office_edit" name="wes_office_edit" class="form-control" placeholder="Batanes Provincial Office" required>
                                        <small><b>Write in full/Do not abbreviate</b></small>
                                    </div>

                                    <div class="form-group row no-padding-top no-padding-bottom">
                                        <label class="form-control-label">Immediate Supervisor</label>
                                        <input type="text" id="wes_supervisor_edit" name="wes_supervisor_edit" class="form-control" placeholder="John Lee P. Santiago" required>
                                        <small><b>Write in full/Do not abbreviate</b></small>
                                    </div>

                                    <div class="form-group row no-padding-top no-padding-bottom">
                                        <label class="form-control-label">Immediate Supervisor Position</label>
                                        <input type="text" id="wes_s_position_edit" name="wes_s_position_edit" class="form-control" placeholder="Regional Director" required>
                                        <small><b>Write in full/Do not abbreviate</b></small>
                                    </div>

                                    <div class="form-group row no-padding-top no-padding-bottom">
                                        <label class="form-control-label">Name of Agency/Organiztion and Location</label>
                                        <input type="text" id="wes_agency_edit" name="wes_agency_edit" class="form-control" placeholder="Technical Education And Skills Development Authority, San Antonio, Basco, Batanes" required>
                                        <small><b>Write in full/Do not abbreviate</b></small>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group row no-padding-top no-padding-bottom">
                                        <label class="form-control-label">List of Accomplishments and Contributions (if any)</label>
                                        <textarea id="wes_accomplishment_edit" name="wes_accomplishment_edit" class="form-control" rows="8" placeholder="Developed/maintained the R2 FASD Services System of TESDA Region II; Developed/maintained the Daily Time Record Management of TESDA Batanes Provincial Office"></textarea>
                                        <small><b>Write in full/Do not abbreviate</b> (Separate each with a semicolon [;].)</small>
                                    </div>
                                    <div class="form-group row no-padding-top no-padding-bottom">
                                        <label class="form-control-label">Summary of Actual Duties</label>
                                        <textarea id="wes_actual_duties_edit" name="wes_actual_duties_edit" class="form-control" rows="8" placeholder="Develops/updates the R2 FASD Services System of TESDA Region II; Develops/updates the Daily Time Record Management of TESDA Batanes Provincial Office"></textarea>
                                        <small><b>Write in full/Do not abbreviate</b> (Separate each with a semicolon [;].)</small>
                                    </div>
                                </div> 
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="btn-group">
                            <button type="submit" class="btn btn-danger"><i class="fa fa-save"></i> Update</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>	
                        </div>
                    </div>
                </form>
            </div>  
        </div>
    </div>
<!--END MODAL EDIT-->

<script type="text/javascript">
    $(document).ready(function(){
        show_wes(); //call function show all work experience

          
        //function show all work experience
        function show_wes(){
            $.ajax({
                type  : 'GET',
                url   : '<?php echo base_url().'wes_data'?>',
                async : true,
                dataType : 'json',
                success : function(data){
                   
                    var html = '';
                    var i;
                    var x=1;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                    '<td>'+x+'</td>'+
                                    '<td>'+data[i].wes_from+'</td>'+
                                    '<td>'+data[i].wes_to+'</td>'+
                                    '<td>'+data[i].wes_position+'</td>'+
                                    '<td>'+data[i].wes_office+'</td>'+
                                    '<td>'+data[i].wes_supervisor+'</td>'+
                                    '<td>'+data[i].wes_agency+'</td>'+
                                    '<td>'+
                                        '<a href="javascript:void(0);" class="btn btn-primary btn-sm item_edit_wes" data-toggle="modal" data-target="#edit_wes"'+
                                        'data-wes_id_edit="'+data[i].wes_id+'" data-wes_from_edit="'+data[i].wes_from+'" data-wes_s_position_edit="'+data[i].wes_s_position+'"'+
                                        'data-wes_to_edit="'+data[i].wes_to+'" data-wes_position_edit="'+data[i].wes_position+'"'+
                                        'data-wes_office_edit="'+data[i].wes_office+'" data-wes_supervisor_edit="'+data[i].wes_supervisor+'" data-wes_agency_edit="'+data[i].wes_agency+'"'+
                                        'data-wes_accomplishment_edit="'+data[i].wes_accomplishment+'" data-wes_actual_duties_edit="'+data[i].wes_actual_duties+'"'+
                                        '><i class="fa fa-edit"></i></a>'+
                                        '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete_wes" data-toggle="modal" data-target="#delete_wes" data-wes_id="'+data[i].wes_id+'"><i class="fa fa-trash"></i></a>'+
                                    '</td>'+
                                '</tr>';
                                x=x+1;
                    }
                    
                    $('#show_data_wes').html(html);
                    $('#wes_table').DataTable();
                }
            });
        }

//Save work experience
        $("#wes_id_save_id").submit(function(e) {
            e.preventDefault();
            var wes_from = $('#wes_from').val();
            var wes_position = $('#wes_position').val();
            var wes_office = $('#wes_office').val();
            var wes_supervisor = $('#wes_supervisor').val();
            var wes_agency = $('#wes_agency').val();
            var wes_accomplishment = $('#wes_accomplishment').val();
            var wes_actual_duties = $('#wes_actual_duties').val();
            var wes_s_position = $('#wes_s_position').val();
            

            
            if($('#wes_present').prop('checked')){
                var wes_to = 'Present';
            }else{
                var wes_to = $('#wes_to').val();
            }

            $.ajax({
                type : "POST",
                url  : "<?php echo base_url().'wes_data_save_wes'?>",
                dataType : "JSON",
                data : {wes_from:wes_from, wes_to:wes_to, wes_position:wes_position, wes_office:wes_office, wes_supervisor:wes_supervisor, wes_s_position:wes_s_position, wes_agency:wes_agency, wes_accomplishment:wes_accomplishment, wes_actual_duties:wes_actual_duties},
                success: function(data){
                    $('[name="wes_from"]').val("");
                    $('[name="wes_to"]').val("");
                    $('[name="wes_position"]').val("");
                    $('[name="wes_office"]').val("");
                    $('[name="wes_supervisor"]').val("");
                    $('[name="wes_agency"]').val("");
                    $('[name="wes_accomplishment"]').val("");
                    $('[name="wes_actual_duties"]').val("");
                    $('[name="wes_s_position"]').val("");
                    
                    html = '<div class="alert alert-success"><i class="fa fa-check-circle" aria-hidden="true"></i> <b>Updated</b> successfully.</div>';
                        $('#alert_data_wes').prepend(html);
                        //Hide
                        $(".alert").delay(4000).slideUp(200, function() {
                            $(this).alert('close');
                        });
                    show_wes();
                }
            });
        });
//Save work experience

//Edit work experience

        $('#show_data_wes').on('click','.item_edit_wes',function(){
            var wes_id_edit = $(this).data('wes_id_edit');
			$('#wes_id_edit').val(wes_id_edit);

            var wes_from_edit = $(this).data('wes_from_edit');
			$('#wes_from_edit').val(wes_from_edit);

            var wes_to_edit = $(this).data('wes_to_edit');
            if(wes_to_edit == 'Present'){
                $('#wes_present_edit').prop('checked', true)
                $('#wes_from_edit').val();
            }else{
                $('#wes_to_edit').val(wes_to_edit);
                $('#wes_present_edit').prop('checked', false)
            }
			

            var wes_position_edit = $(this).data('wes_position_edit');
			$('#wes_position_edit').val(wes_position_edit);

            var wes_office_edit = $(this).data('wes_office_edit');
			$('#wes_office_edit').val(wes_office_edit);

            var wes_supervisor_edit = $(this).data('wes_supervisor_edit');
			$('#wes_supervisor_edit').val(wes_supervisor_edit);

            var wes_agency_edit = $(this).data('wes_agency_edit');
			$('#wes_agency_edit').val(wes_agency_edit);

            var wes_accomplishment_edit = $(this).data('wes_accomplishment_edit');
			$('#wes_accomplishment_edit').val(wes_accomplishment_edit);

            var wes_actual_duties_edit = $(this).data('wes_actual_duties_edit');
			$('#wes_actual_duties_edit').val(wes_actual_duties_edit);

            var wes_s_position_edit = $(this).data('wes_s_position_edit');
			$('#wes_s_position_edit').val(wes_s_position_edit);

        });
        $("#wes_id_edit_id").submit(function(e) {
            e.preventDefault();
            var wes_id = $('#wes_id_edit').val();
            var wes_from = $('#wes_from_edit').val();
            var wes_position = $('#wes_position_edit').val();
            var wes_office = $('#wes_office_edit').val();
            var wes_supervisor = $('#wes_supervisor_edit').val();
            var wes_agency = $('#wes_agency_edit').val();
            var wes_accomplishment = $('#wes_accomplishment_edit').val();
            var wes_actual_duties = $('#wes_actual_duties_edit').val();
            var wes_s_position = $('#wes_s_position_edit').val();

            
            if($('#wes_present_edit').prop('checked')){
                var wes_to = 'Present';
            }else{
                var wes_to = $('#wes_to_edit').val();
            }

            $.ajax({
                type : "POST",
                url  : "<?php echo base_url().'wes_data_edit_wes'?>",
                dataType : "JSON",
                data : {wes_id:wes_id, wes_from:wes_from, wes_to:wes_to, wes_position:wes_position, wes_office:wes_office, wes_supervisor:wes_supervisor, wes_s_position:wes_s_position, wes_agency:wes_agency, wes_accomplishment:wes_accomplishment, wes_actual_duties:wes_actual_duties},
                success: function(data){
                    html = '<div class="alert alert-success"><i class="fa fa-check-circle" aria-hidden="true"></i> <b>Updated</b> successfully.</div>';
                        $('#alert_data_wes_edit').prepend(html);
                        //Hide
                        $(".alert").delay(4000).slideUp(200, function() {
                            $(this).alert('close');
                        });
                    show_wes();
                }
            });
        });
//Edit work experience
        
//get data for delete record
         $('#show_data_wes').on('click','.item_delete_wes',function(){
            var wes_id = $(this).data('wes_id');
			$('#wes_id').val(wes_id);
        });

        //delete record to database
        $('#btn_delete_wes').on('click',function(){
            var wes_id = $('#wes_id').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url().'wes_data_delete'?>",
                dataType : "JSON",
                data : {wes_id:wes_id},
                success: function(data){
                    $('[name="wes_id"]').val("");
                    show_wes();
                    html = '<div class="alert alert-success"><i class="fa fa-trash-o" aria-hidden="true"></i> <b>Deleted</b> successfully.</div>';
                        $('#table_wes').prepend(html);
                        //Hide
                        $(".alert").delay(4000).slideUp(200, function() {
                            $(this).alert('close');
                        });
                }
            });
            $('#delete_wes').modal('hide');
            
        });
//get data for delete record

    });//Last
 
</script>