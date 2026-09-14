<div class="table-responsive" id="educational_delete">      
    <table id="educational_table" class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Level</th>
                <th>Name of School</th>
                <th>Education</th>
                <th>From</th>
                <th>To</th>
                <th>Highest Level</th>
                <th>Year Graduated</th>
                <th>Scholarship/ Academic Honors Received</th>
                <th>Actions</th>  
            </tr>
        </thead>
        
        <tbody id="show_data_educational">
            
        </tbody>
    </table>
</div> 


<!-- MODAL ADD -->
    <div class="modal fade" id="Modal_Add_Educational" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <!--modal-content-->
            <div class="modal-content">
                <!--modal-header-->
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus"></i> Add</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!--modal-header-->
                <!--modal-body-->
                <div id="alert_data_educational" class="modal-body">
                    <div class="form-group row no-padding-top no-padding-bottom">
                        <label class="form-control-label"><i class="fa fa-level-up" aria-hidden="true"></i> Level</label>
                        <select id="eb_level_id" name="eb_level_id" class="form-control">
                            <option>--Select Level--</option>
                            <?php 
                            foreach ($eb_level as $row){ 
                            if ($row['eb_description']== 'Primary')
                            {
                                $eb_description='Primary Education';
                            }
                            else{
                                $eb_description= $row['eb_description'];
                            }
                            ?>
                            
                            <option value="<?= $row['eb_level_id']?>"><?= $eb_description?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group row no-padding-top no-padding-bottom">
                        <label class="form-control-label"><i class="fa fa-university" aria-hidden="true"></i> Name of School</label>
                        <input type="text" id="eb_name_school" name="eb_name_school" class="form-control" placeholder="Saint Louis University">
                        <small><b>*Write in full/Do not abbreviate (e.g. Saint Louis University)</b></small>
                    </div>
                    <div class="form-group row no-padding-top no-padding-bottom">
                        <label class="form-control-label"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Basic Education/Degree/Course  (Write In Full)</label>
                        <input type="text" id="eb_degree" name="eb_degree" class="form-control" placeholder="Master in Library and Information Science">
                    </div>
                    <div class="form-group row no-padding-top no-padding-bottom">
                        <label class="form-control-label"><i class="fa fa-calendar" aria-hidden="true"></i> From</label>
                        <input type="text" id="eb_from" name="eb_from" class="form-control" placeholder="2011" />
                        <small><b>* Year (e.g. 2011)</b></small>
                    </div>
                    <div class="form-group row no-padding-top no-padding-bottom">
                        <label class="form-control-label"><i class="fa fa-calendar" aria-hidden="true"></i> To</label>
                        <input type="text" id="eb_to" name="eb_to" class="form-control" placeholder="2015" />
                        <small><b>* Year (e.g. 2015)</b></small>
                    </div>
                    <div class="form-group row no-padding-top no-padding-bottom">
                        <label class="form-control-label"><i class="fa fa-level-up" aria-hidden="true"></i> Highest Level/ Units Earned (If Not Graduated)</label>
                        <input type="text" id="eb_highest_level" name="eb_highest_level" class="form-control" placeholder="36 Units">
                        <small><b>*e.g. 3rd Year/ 36 Units</b></small>
                    </div>
                    <div class="form-group row no-padding-top no-padding-bottom">
                        <label class="form-control-label"><i class="fa fa-calendar" aria-hidden="true"></i> Year Graduated</label>
                        <input type="text" id="eb_year_graduated" name="eb_year_graduated" class="form-control" placeholder="2015">
                        <small><b>* Year (e.g. 2015)</b></small>
                    </div>
                    <div class="form-group row no-padding-top no-padding-bottom">
                        <label class="form-control-label"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Scholarship/ Academic Honors Received</label>
                        <input type="text" id="eb_award" name="eb_award" class="form-control" placeholder="Cum Laude">
                        <small><b>*Write in full/Do not abbreviate (e.g. Cum Laude)</b></small>
                    </div>  
                </div>
                <!--modal-body-->
                <!--modal-footer-->                
                <div class="modal-footer">
                    <div class="btn-group">
                        <button id="btn_save_educational" type="button" class="btn btn-danger"><i class="fa fa-save"></i> Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>	
                    </div>
                </div>
                <!--modal-footer-->  
            </div>
            <!--modal-content-->
        </div>
    </div>
<!--END MODAL ADD-->

<!-- MODAL EDIT -->
    <div class="modal fade" id="Modal_Edit_EB" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-edit"></i> Edit</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="alert_data_educational_edit" class="modal-body">

                    <input type="hidden" id="eb_id_edit" name="eb_id_edit" class="form-control">

                    <div class="form-group row no-padding-top no-padding-bottom">
                        <label class="form-control-label"><i class="fa fa-level-up" aria-hidden="true"></i> Level</label>
                        <select id="eb_level_id_edit" name="eb_level_id_edit" class="form-control">
                            <option>--Select Level--</option>
                            <?php 
                            foreach ($eb_level as $row){ 
                            if ($row['eb_description']== 'Primary')
                            {
                                $eb_description='Primary Education';
                            }
                            else{
                                $eb_description= $row['eb_description'];
                            }
                            ?>
                            
                            <option value="<?= $row['eb_level_id']?>"><?= $eb_description?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group row no-padding-top no-padding-bottom">
                        <label class="form-control-label"><i class="fa fa-university" aria-hidden="true"></i> Name of School</label>
                        <input type="text" id="eb_name_school_edit" name="eb_name_school_edit" class="form-control" placeholder="Saint Louis University">
                        <small><b>*Write in full/Do not abbreviate (e.g. Saint Louis University)</b></small>
                    </div>
                    <div class="form-group row no-padding-top no-padding-bottom">
                        <label class="form-control-label"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Basic Education/Degree/Course  (Write In Full)</label>
                        <input type="text" id="eb_degree_edit" name="eb_degree_edit" class="form-control" placeholder="Master in Library and Information Science">
                    </div>
                    <div class="form-group row no-padding-top no-padding-bottom">
                        <label class="form-control-label"><i class="fa fa-calendar" aria-hidden="true"></i> From</label>
                        <input type="text" id="eb_from_edit" name="eb_from_edit" class="form-control" placeholder="2011" />
                        <small><b>* Year (e.g. 2011)</b></small>
                    </div>
                    <div class="form-group row no-padding-top no-padding-bottom">
                        <label class="form-control-label"><i class="fa fa-calendar" aria-hidden="true"></i> To</label>
                        <input type="text" id="eb_to_edit" name="eb_to_edit" class="form-control" placeholder="2015" />
                        <small><b>* Year (e.g. 2015)</b></small>
                    </div>
                    <div class="form-group row no-padding-top no-padding-bottom">
                        <label class="form-control-label"><i class="fa fa-level-up" aria-hidden="true"></i> Highest Level/ Units Earned (If Not Graduated)</label>
                        <input type="text" id="eb_highest_level_edit" name="eb_highest_level_edit" class="form-control" placeholder="36 Units">
                        <small><b>*e.g. 3rd Year/ 36 Units</b></small>
                    </div>
                    <div class="form-group row no-padding-top no-padding-bottom">
                        <label class="form-control-label"><i class="fa fa-calendar" aria-hidden="true"></i> Year Graduated</label>
                        <input type="text" id="eb_year_graduated_edit" name="eb_year_graduated_edit" class="form-control" placeholder="2015">
                        <small><b>* Year (e.g. 2015)</b></small>
                    </div>
                    <div class="form-group row no-padding-top no-padding-bottom">
                        <label class="form-control-label"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Scholarship/ Academic Honors Received</label>
                        <input type="text" id="eb_award_edit" name="eb_award_edit" class="form-control" placeholder="Cum Laude">
                        <small><b>*Write in full/Do not abbreviate (e.g. Cum Laude)</b></small>
                    </div>
                    
            </div>
            <div class="modal-footer">
                <div class="btn-group">
                    <button id="btn_update_educational" type="button" class="btn btn-danger"><i class="fa fa-save"></i> Update</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>	
                </div>
            </div>
            </div>
        </div>
    </div>
<!--END MODAL EDIT-->

<!--MODAL DELETE-->
    <div class="modal fade" id="Modal_Delete_EB" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <input type="hidden" id="eb_id" name="eb_id" class="form-control">

            <div class="btn-group">
                <button id="btn_delete_eb" type="button" class="btn btn-danger" data-dismiss="modal">Yes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>	
            </div>

            </div>
        </div>
        </div>
    </div>
<!--END MODAL DELETE-->

<script type="text/javascript">
    $(document).ready(function(){

        show_educational(); //call function show all product
          
        //function show all product
        function show_educational(){
            $.ajax({
                type  : 'GET',
                url   : '<?php echo base_url().'educational_data'?>',
                async : true,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    var x=1;
                    for(i=0; i<data.length; i++){
                        
                        let degree = (data[i].eb_degree ?? '').trim().toLowerCase();
                        let eb_degree;
                        if (degree.includes('elementary') || degree.includes('primary')) {
                            eb_degree = 'Primary Education';
                        } else {
                            eb_degree = data[i].eb_degree;
                        }
                        html += '<tr>'+
                                    '<td>'+x+'</td>'+
                                    '<td>'+data[i].eb_name_school+'</td>'+
                                    '<td>'+eb_degree+'</td>'+
                                    '<td>'+data[i].eb_from+'</td>'+
                                    '<td>'+data[i].eb_to+'</td>'+
                                    '<td>'+data[i].eb_highest_level+'</td>'+
                                    '<td>'+data[i].eb_year_graduated+'</td>'+
                                    '<td>'+data[i].eb_award+'</td>'+
                                    '<td>'+
                                        '<a href="javascript:void(0);" class="btn btn-primary btn-sm item_edit_eb" data-toggle="modal" data-target="#Modal_Edit_EB" data-eb_id_edit="'+data[i].eb_id+'" data-eb_level_id_edit="'+data[i].eb_level_id+'" data-eb_name_school_edit="'+data[i].eb_name_school+'" data-eb_degree_edit="'+data[i].eb_degree+'" data-eb_from_edit="'+data[i].eb_from+'" data-eb_to_edit="'+data[i].eb_to+'" data-eb_highest_level_edit="'+data[i].eb_highest_level+'" data-eb_year_graduated_edit="'+data[i].eb_year_graduated+'" data-eb_award_edit="'+data[i].eb_award+'"><i class="fa fa-edit"></i></a>'+
                                        '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete_eb" data-toggle="modal" data-target="#Modal_Delete_EB" data-eb_id="'+data[i].eb_id+'"><i class="fa fa-trash"></i></a>'+
                                    '</td>'+
                                '</tr>';
                                x=x+1;
                    }
                    $('#show_data_educational').html(html);
                    $('#educational_table').DataTable();
                }
            });
        }

        //Save Educational Background
        $('#btn_save_educational').on('click',function(){
            var eb_level_id = $('#eb_level_id').val();
            var eb_name_school = $('#eb_name_school').val();
            var eb_degree = $('#eb_degree').val();
            var eb_from = $('#eb_from').val();
            var eb_to = $('#eb_to').val();
            var eb_highest_level = $('#eb_highest_level').val();
            var eb_year_graduated = $('#eb_year_graduated').val();
            var eb_award = $('#eb_award').val();

            $.ajax({
                type : "POST",
                url  : "<?php echo base_url().'educational_data_save'?>",
                dataType : "JSON",
                data : {eb_level_id:eb_level_id , eb_name_school:eb_name_school, eb_degree:eb_degree, eb_from:eb_from, eb_to:eb_to, eb_highest_level:eb_highest_level, eb_year_graduated:eb_year_graduated, eb_award:eb_award},
                success: function(data){
                    $('[name="eb_level_id"]').val("");
                    $('[name="eb_name_school"]').val("");
                    $('[name="eb_degree"]').val("");
                    $('[name="eb_from"]').val("");
                    $('[name="eb_to"]').val("");
                    $('[name="eb_highest_level"]').val("");
                    $('[name="eb_year_graduated"]').val("");
                    $('[name="eb_award"]').val("");
                    html = '<div class="alert alert-success"><i class="fa fa-check-circle" aria-hidden="true"></i> <b>Updated</b> successfully.</div>';
                        $('#alert_data_educational').prepend(html);
                        //Hide
                        $(".alert").delay(4000).slideUp(200, function() {
                            $(this).alert('close');
                        });
                    show_educational();
                }
            });
            return false;
        });
        //get data for delete record
        $('#show_data_educational').on('click','.item_delete_eb',function(){
            var eb_id = $(this).data('eb_id');
			$('#eb_id').val(eb_id);
        });
        

        //delete record to database
        $('#btn_delete_eb').on('click',function(){
            var eb_id = $('#eb_id').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url().'educational_data_delete'?>",
                dataType : "JSON",
                data : {eb_id:eb_id},
                success: function(data){
                    $('[name="eb_id"]').val("");
                    html = '<div class="alert alert-success"><i class="fa fa-trash-o" aria-hidden="true"></i> <b>Deleted</b> successfully.</div>';
                        $('#educational_delete').prepend(html);
                        //Hide
                        $(".alert").delay(4000).slideUp(200, function() {
                            $(this).alert('close');
                        });
                    show_educational();
                }
            });
            $('#Modal_Delete_EB').modal('hide');
            return false;
        });

        //edit
        //get data for update record
        $('#show_data_educational').on('click','.item_edit_eb',function(){
            var eb_id_edit = $(this).data('eb_id_edit');
            var eb_level_id_edit = $(this).data('eb_level_id_edit');
            var eb_name_school_edit = $(this).data('eb_name_school_edit');
            var eb_degree_edit = $(this).data('eb_degree_edit');
            var eb_from_edit = $(this).data('eb_from_edit');
            var eb_to_edit = $(this).data('eb_to_edit');
            var eb_highest_level_edit = $(this).data('eb_highest_level_edit');
            var eb_year_graduated_edit = $(this).data('eb_year_graduated_edit');
            var eb_award_edit = $(this).data('eb_award_edit');
             
            //$('#Modal_Edit').modal('show');
            $('[name="eb_id_edit"]').val(eb_id_edit);
            $('[name="eb_name_school_edit"]').val(eb_name_school_edit);
            $('[name="eb_degree_edit"]').val(eb_degree_edit);
            $('[name="eb_from_edit"]').val(eb_from_edit);
            $('[name="eb_to_edit"]').val(eb_to_edit);
            $('[name="eb_highest_level_edit"]').val(eb_highest_level_edit);
            $('[name="eb_year_graduated_edit"]').val(eb_year_graduated_edit);
            $('[name="eb_award_edit"]').val(eb_award_edit);
            $('[name="eb_level_id_edit"]').val(eb_level_id_edit);
        });
 
        //update record to database
         $('#btn_update_educational').on('click',function(){
            var eb_id_edit =  $('#eb_id_edit').val();
            var eb_level_id_edit =  $('#eb_level_id_edit').val();
            var eb_name_school_edit =  $('#eb_name_school_edit').val();
            var eb_degree_edit =  $('#eb_degree_edit').val();
            var eb_from_edit =  $('#eb_from_edit').val();
            var eb_to_edit =  $('#eb_to_edit').val();
            var eb_highest_level_edit =  $('#eb_highest_level_edit').val();
            var eb_year_graduated_edit =  $('#eb_year_graduated_edit').val();
            var eb_award_edit =  $('#eb_award_edit').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url().'educational_data_update'?>",
                dataType : "JSON",
                data : {eb_id_edit:eb_id_edit, eb_level_id_edit:eb_level_id_edit, eb_name_school_edit:eb_name_school_edit, eb_degree_edit:eb_degree_edit, eb_from_edit:eb_from_edit, eb_to_edit:eb_to_edit, eb_highest_level_edit:eb_highest_level_edit, eb_year_graduated_edit:eb_year_graduated_edit, eb_award_edit:eb_award_edit},
                success: function(data){
                    html = '<div class="alert alert-success"><i class="fa fa-check-circle" aria-hidden="true"></i> <b>Updated</b> successfully.</div>';
                        $('#alert_data_educational_edit').prepend(html);
                        //Hide
                        $(".alert").delay(4000).slideUp(200, function() {
                            $(this).alert('close');
                        });
                   // $('#Modal_Edit_EB').modal('hide');
                    show_educational();
                }
            });
            return false;
        });

        //$('#datatable_educational_background').DataTable();

    });//Last
 
</script>