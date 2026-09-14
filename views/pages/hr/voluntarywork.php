<div class="table-responsive">      
    <table id="voluntary_work_table" class="table table-striped table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Name & Address of Organization</th>
                <th>From (Date)</th>
                <th>To (Date)</th>
                <th>No. of Hours</th>
                <th>Position / Nature of Work</th>
                <th>Action</th>
            </tr>
        </thead>
        
            <tbody id="show_data_voluntary_work">
                
            </tbody>
    </table>
    <small><b>* Leave blank if Not Applicable (N/A)</b></small>  
</div> 


<!-- MODAL ADD -->
    <div class="modal fade" id="Modal_Add_Voluntary_Work" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <label class="form-control-label">Name & Address of Organization</label>
                        <input type="text" id="vw_organization" name="vw_organization" class="form-control" placeholder="Technical Education And Skills Development Authority">
                        <small><b>Write in full/Do not abbreviate</b></small>
                    </div>
                    
                    <div class="form-group row no-padding-top no-padding-bottom">
                        <label class="form-control-label">From (Date)</label>
                        <input type="date" id="vw_from" name="vw_from" class="form-control" />
                    </div>
                    <div class="form-group row no-padding-top no-padding-bottom">
                        <label class="form-control-label">To (Date)</label>
                        <input type="date" id="vw_to" name="vw_to" class="form-control" />
                        <input type="checkbox" id="vw_present" name="vw_present" value="1"/> &nbsp Present
                    </div>
                    <div class="form-group row no-padding-top no-padding-bottom">
                        <label class="form-control-label">No. of Hours</label>
                        <input type="text" id="vw_hours" name="vw_hours" class="form-control" placeholder="108 hrs.">
                    </div>
                    <div class="form-group row no-padding-top no-padding-bottom">
                        <label class="form-control-label">Position / Nature of Work</label>
                        <input type="text" id="vw_position" name="vw_position" class="form-control" placeholder="Information Technology officer I">
                    </div>                
            </div>
            <div class="modal-footer">
                <div class="btn-group">
                    <button id="btn_save_voluntry_work" type="button" class="btn btn-danger"><i class="fa fa-save"></i> Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>	
                </div>
            </div>
            </div>
        </div>
    </div>
<!--END MODAL ADD-->

<!-- MODAL EDIT -->
    <div class="modal fade" id="Modal_Edit_Voluntary_Work" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-edit"></i> Edit</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="alert_data_vw" class="modal-body">
                    <input type="hidden" id="vw_id_edit" name="vw_id_edit" class="form-control">
                    <div class="form-group row no-padding-top no-padding-bottom">
                        <label class="form-control-label">Name & Address of Organization</label>
                        <input type="text" id="vw_organization_edit" name="vw_organization_edit" class="form-control" placeholder="Technical Education And Skills Development Authority">
                        <small><b>Write in full/Do not abbreviate</b></small>
                    </div>
                    
                    <div class="form-group row no-padding-top no-padding-bottom">
                        <label class="form-control-label">From (Date)</label>
                        <input type="date" id="vw_from_edit" name="vw_from_edit" class="form-control" />
                    </div>
                    <div class="form-group row no-padding-top no-padding-bottom">
                        <label class="form-control-label">To (Date)</label>
                        <input type="date" id="vw_to_edit" name="vw_to_edit" class="form-control" />
                        <input type="checkbox" id="vw_present_edit" name="vw_present_edit" value="1"/> &nbsp Present
                    </div>
                    <div class="form-group row no-padding-top no-padding-bottom">
                        <label class="form-control-label">No. of Hours</label>
                        <input type="text" id="vw_hours_edit" name="vw_hours_edit" class="form-control" placeholder="108 hrs.">
                    </div>
                    <div class="form-group row no-padding-top no-padding-bottom">
                        <label class="form-control-label">Position / Nature of Work</label>
                        <input type="text" id="vw_position_edit" name="vw_position_edit" class="form-control" placeholder="Information Technology officer I">
                    </div>                
            </div>
            <div class="modal-footer">
                <div class="btn-group">
                    <button id="btn_edit_voluntry_work" type="button" class="btn btn-danger"><i class="fa fa-save"></i> Update</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>	
                </div>
            </div>
            </div>
        </div>
    </div>
<!--END MODAL EDIT-->

<!--MODAL DELETE-->

    <div class="modal fade" id="Modal_Delete_Voluntary_Work" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <input type="hidden" id="vw_id" name="vw_id" class="form-control">

            <div class="btn-group">
                <button id="btn_delete_vw" type="button" class="btn btn-danger" data-dismiss="modal">Yes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>	
            </div>

            </div>
        </div>
        </div>
    </div>
<!--END MODAL DELETE-->


<script type="text/javascript">
    $(document).ready(function(){
        show_voluntary_work(); //call function show all work experience
        
        $('#vw_present').prop('checked', false)
          
        //function show all work experience
        function show_voluntary_work(){
            
            $.ajax({
                type  : 'GET',
                url   : '<?php echo base_url().'voluntary_work_data'?>',
                async : true,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    var x=1;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                    '<td>'+x+'</td>'+
                                    '<td>'+data[i].vw_organization+'</td>'+
                                    '<td>'+data[i].vw_from+'</td>'+
                                    '<td>'+data[i].vw_to+'</td>'+
                                    '<td>'+data[i].vw_hours+'</td>'+
                                    '<td>'+data[i].vw_position+'</td>'+
                                    '<td>'+
                                    '<a href="javascript:void(0);" class="btn btn-primary btn-sm item_edit_vw" data-toggle="modal" data-target="#Modal_Edit_Voluntary_Work"'+
                                    'data-vw_id_edit="'+data[i].vw_id+'" data-vw_organization_edit="'+data[i].vw_organization+'"'+
                                    'data-vw_from_edit="'+data[i].vw_from+'" data-vw_to_edit="'+data[i].vw_to+'"'+
                                    'data-vw_hours_edit="'+data[i].vw_hours+'" data-vw_position_edit="'+data[i].vw_position+'"'+
                                    '><i class="fa fa-edit"></i></a>'+
                                    '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete_vw" data-toggle="modal" data-target="#Modal_Delete_Voluntary_Work" data-vw_id="'+data[i].vw_id+'"><i class="fa fa-trash"></i></a>'+
                                    '</td>'+
                                '</tr>';
                                x=x+1;
                    }
                    $('#show_data_voluntary_work').html(html);
                    $('#voluntary_work_table').DataTable();
                }
 
            });
        }

//Save work experience
        $('#btn_save_voluntry_work').on('click',function(){
            var vw_organization = $('#vw_organization').val();
            var vw_from = $('#vw_from').val();
            //var vw_to = $('#vw_to').val();
            var vw_hours = $('#vw_hours').val();
            var vw_position = $('#vw_position').val();

            if($('#vw_present').prop('checked')){
                var vw_to = 'Present';
            }else{
                var vw_to = $('#vw_to').val();
            }

            $.ajax({
                type : "POST",
                url  : "<?php echo base_url().'voluntary_work_data_save'?>",
                dataType : "JSON",
                data : {vw_organization:vw_organization, vw_from:vw_from, vw_to:vw_to, vw_hours:vw_hours, vw_position:vw_position},
                success: function(data){
                    $('[name="vw_organization"]').val("");
                    $('[name="vw_from"]').val("");
                    $('[name="vw_to"]').val("");
                    $('[name="vw_hours"]').val("");
                    $('[name="vw_position"]').val("");
                    show_voluntary_work();
                }
            });
            return false;
        });
//Save work experience

//update work experience

        $('#show_data_voluntary_work').on('click','.item_edit_vw',function(){
            var vw_id_edit = $(this).data('vw_id_edit');
			$('#vw_id_edit').val(vw_id_edit);

            var vw_organization_edit = $(this).data('vw_organization_edit');
			$('#vw_organization_edit').val(vw_organization_edit);

            var vw_from_edit = $(this).data('vw_from_edit');
			$('#vw_from_edit').val(vw_from_edit);

            var vw_from_edit = $(this).data('vw_from_edit');
			$('#vw_from_edit').val(vw_from_edit);

            var vw_to_edit = $(this).data('vw_to_edit');
            if (vw_to_edit == 'Present'){
                $('#vw_present_edit').prop('checked', false)
                $('#vw_present_edit').prop('checked', true)
            }else{
                $('#vw_to_edit').val(vw_to_edit);
            }

            var vw_hours_edit = $(this).data('vw_hours_edit');
			$('#vw_hours_edit').val(vw_hours_edit);

            var vw_position_edit = $(this).data('vw_position_edit');
			$('#vw_position_edit').val(vw_position_edit);
			
        });


        $('#btn_edit_voluntry_work').on('click',function(){
            var vw_id= $('#vw_id_edit').val();
            var vw_organization = $('#vw_organization_edit').val();
            var vw_from = $('#vw_from_edit').val();
            var vw_to = $('#vw_to_edit').val();
            var vw_hours = $('#vw_hours_edit').val();
            var vw_position = $('#vw_position_edit').val();

            if($('#vw_present_edit').prop('checked')){
                var vw_to = 'Present';
            }else{
                var vw_to = $('#vw_to_edit').val();
            }

            $.ajax({
                type : "POST",
                url  : "<?php echo base_url().'voluntary_work_data_edit'?>",
                dataType : "JSON",
                data : {vw_id:vw_id, vw_organization:vw_organization, vw_from:vw_from, vw_to:vw_to, vw_hours:vw_hours, vw_position:vw_position},
                success: function(data){
                    html = '<div class="alert alert-success"><i class="fa fa-check-circle" aria-hidden="true"></i> <b>Updated</b> successfully.</div>';
                        $('#alert_data_vw').prepend(html);
                        //Hide
                        $(".alert").delay(4000).slideUp(200, function() {
                            $(this).alert('close');
                        });
                    show_voluntary_work();
                }
            });
            return false;
        });
//update work experience
        
        //get data for delete record
        $('#show_data_voluntary_work').on('click','.item_delete_vw',function(){
            var vw_id = $(this).data('vw_id');
			$('#vw_id').val(vw_id);
        });
        

        //delete record to database
        $('#btn_delete_vw').on('click',function(){
            var vw_id = $('#vw_id').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url().'voluntary_work_data_delete'?>",
                dataType : "JSON",
                data : {vw_id:vw_id},
                success: function(data){
                    $('[name="vw_id"]').val("");
                    show_voluntary_work();
                }
            });
            $('#Modal_Delete_Voluntary_Work').modal('hide');
            return false;
        });

    });//Last
 
</script>