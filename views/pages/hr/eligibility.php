<div class="table-responsive">   
        <table id="eligibility_table" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Career Service Eligibility</th>
                    <th>Rating (If Applicable)</th>
                    <th>Date of Examination</th>
                    <th>Place of Examination</th>
                    <th>Number</th>
                    <th>Date of Validty</th> 
                    <th>Action</th>
                </tr>
            </thead>
            
                <tbody id="show_data_eligibility">
                    
                </tbody>
        </table>
</div> 


<!-- MODAL ADD -->
    <div class="modal fade" id="Modal_Add_Eligibility" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus"></i> Add</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form action="" method="POST" id="eligibility_save" role="form">
                    <div class="form-group row no-padding-top no-padding-bottom">
                        <label class="form-control-label"><i class="fa fa-sticky-note-o" aria-hidden="true"></i> Eligibility</label>
                        <input type="text" id="eli_desc" name="eli_desc" class="form-control" placeholder="Career Service (Professional) Eligibility">
                        <small><b>* Write in full/Do not abbreviate (e.g. Career Service (Professional) Eligibility)</b></small>
                    </div>
                    <div class="form-group row no-padding-top no-padding-bottom">
                        <label class="form-control-label"><i class="fa fa-percent" aria-hidden="true"></i> Rating</label>
                        <input type="text" id="eli_rating" name="eli_rating" class="form-control" placeholder="99.99">
                        <small><b>* e.g. 99.99</b></small>
                    </div>
                    <div class="form-group row no-padding-top no-padding-bottom">
                        <label class="form-control-label"><i class="fa fa-calendar" aria-hidden="true"></i> Date of Examination</label>
                        <input type="date" id="eli_date_of_examination" name="eli_date_of_examination" class="form-control" />
                    </div>
                    <div class="form-group row no-padding-top no-padding-bottom">
                        <label class="form-control-label"><i class="fa fa-map-marker" aria-hidden="true"></i> Place of Examination</label>
                        <input type="text" id="eli_place_of_examination" name="eli_place_of_examination" class="form-control" placeholder="Tuguegarao City, Cagayan"/>
                        <small><b>* Write in full/Do not abbreviate (e.g. Tuguegarao City, Cagayan)</b></small>
                    </div>
                    <div class="form-group row no-padding-top no-padding-bottom">
                        <label class="form-control-label"><i class="fa fa-sticky-note-o" aria-hidden="true"></i> Eligibility Number</label>
                        <input type="text" id="eli_number" name="eli_number" class="form-control" placeholder="631914">
                        <small><b>* e.g. 631914</b></small>
                    </div>
                    <div class="form-group row no-padding-top no-padding-bottom">
                        <label class="form-control-label"><i class="fa fa-calendar" aria-hidden="true"></i> Date of Validity</label>
                        <input type="date" id="eli_date_of_validity" name="eli_date_of_validity" class="form-control">
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <div class="btn-group">
                        <button id="btn_save_eligibility_id" type="submit" class="btn btn-danger"><i class="fa fa-save"></i> Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>	
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>

<!--END MODAL ADD-->

<!-- MODAL EDIT -->
    <div class="modal fade" id="Modal_Edit_Eligibility" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
           
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-edit"></i> Edit</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            
                <div id="alert_data_eligibility_1" class="modal-body">
                    <form action="" method="POST" id="eligibility_edit" role="form">
                    <input type="hidden" id="eli_id_edit" name="eli_id_edit">
                    <div class="form-group row no-padding-top no-padding-bottom">
                        <label class="form-control-label"><i class="fa fa-sticky-note-o" aria-hidden="true"></i> Eligibility</label>
                        <input type="text" id="eli_desc_edit" name="eli_desc_edit" class="form-control" placeholder="Career Service (Professional) Eligibility">
                        <small><b>* Write in full/Do not abbreviate (e.g. Career Service (Professional) Eligibility)</b></small>
                    </div>
                    <div class="form-group row no-padding-top no-padding-bottom">
                        <label class="form-control-label"><i class="fa fa-percent" aria-hidden="true"></i> Rating</label>
                        <input type="text" id="eli_rating_edit" name="eli_rating_edit" class="form-control" placeholder="99.99">
                        <small><b>* e.g. 99.99</b></small>
                    </div>
                    <div class="form-group row no-padding-top no-padding-bottom">
                        <label class="form-control-label"><i class="fa fa-calendar" aria-hidden="true"></i> Date of Examination</label>
                        <input type="date" id="eli_date_of_examination_edit" name="eli_date_of_examination_edit" class="form-control" />
                    </div>
                    <div class="form-group row no-padding-top no-padding-bottom">
                        <label class="form-control-label"><i class="fa fa-map-marker" aria-hidden="true"></i> Place of Examination</label>
                        <input type="text" id="eli_place_of_examination_edit" name="eli_place_of_examination_edit" class="form-control" placeholder="Tuguegarao City, Cagayan"/>
                        <small><b>* Write in full/Do not abbreviate (e.g. Tuguegarao City, Cagayan)</b></small>
                    </div>
                    <div class="form-group row no-padding-top no-padding-bottom">
                        <label class="form-control-label"><i class="fa fa-sticky-note-o" aria-hidden="true"></i> Eligibility Number</label>
                        <input type="text" id="eli_number_edit" name="eli_number_edit" class="form-control" placeholder="631914">
                        <small><b>* e.g. 631914</b></small>
                    </div>
                    <div class="form-group row no-padding-top no-padding-bottom">
                        <label class="form-control-label"><i class="fa fa-calendar" aria-hidden="true"></i> Date of Validity</label>
                        <input type="date" id="eli_date_of_validity_edit" name="eli_date_of_validity_edit" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="btn-group">
                        <button id="btn_edit_eligibility" type="submit" class="btn btn-danger"><i class="fa fa-save"></i> Update</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>	
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
<!--END MODAL EDIT-->

<!--MODAL DELETE-->
    <form>
    <div class="modal fade" id="Modal_Delete_Eligibility" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-exclamation-triangle"></i> Warning</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <strong>Are you sure yout want to delete this record?</strong>
                
                <br><br><small class="pull-left"><b>Note</b>: This proccess is irreversible.</small>
            </div>
            <div class="modal-footer">
            <input type="hidden" id="eli_id" name="eli_id" class="form-control">

            <div class="btn-group">
                <button id="btn_delete_eligibility" type="button" class="btn btn-danger" data-dismiss="modal">Yes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>	
            </div>

            </div>
        </div>
        </div>
    </div>
    </form>
<!--END MODAL DELETE-->

<script type="text/javascript">
    $(document).ready(function(){
        show_eligility(); //call function show all product
          
        //function show all product
        function show_eligility(){
            $.ajax({
                type  : 'GET',
                url   : '<?php echo base_url().'eligibility_data'?>',
                async : true,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    var x=1;
                    
                    for(i=0; i<data.length; i++){
                        if(data[i].eli_date_of_validity == null){
                            var eli_date_of_validity = '';
                        }else{
                            var eli_date_of_validity = data[i].eli_date_of_validity;
                        }
                        html += '<tr>'+
                                    '<td>'+x+'</td>'+
                                    '<td>'+data[i].eli_desc+'</td>'+
                                    '<td>'+data[i].eli_rating+'</td>'+
                                    '<td>'+data[i].eli_date_of_examination+'</td>'+
                                    '<td>'+data[i].eli_place_of_examination+'</td>'+
                                    '<td>'+data[i].eli_number+'</td>'+
                                    '<td>'+eli_date_of_validity+'</td>'+
                                    '<td>'+
                                        '<a href="javascript:void(0);" class="btn btn-primary btn-sm item_edit_eli" data-toggle="modal" data-target="#Modal_Edit_Eligibility"'+
                                        'data-eli_id_edit="'+data[i].eli_id+'" data-eli_desc_edit="'+data[i].eli_desc+'"'+
                                        'data-eli_rating_edit="'+data[i].eli_rating+'" data-eli_date_of_examination_edit="'+data[i].eli_date_of_examination+'"'+
                                        'data-eli_place_of_examination_edit="'+data[i].eli_place_of_examination+'" data-eli_number_edit="'+data[i].eli_number+'"'+
                                        'data-eli_date_of_validity_edit="'+data[i].eli_date_of_validity+'"'+
                                        '><i class="fa fa-edit"></i></a>'+
                                        '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete_eli" data-toggle="modal" data-target="#Modal_Delete_Eligibility" data-eli_id="'+data[i].eli_id+'"><i class="fa fa-trash"></i></a>'+
                                    '</td>'+
                                '</tr>';
                                x=x+1;
                    }
                    $('#show_data_eligibility').html(html);
                    $('#eligibility_table').DataTable();
                }
 
            });
        }
//Save Eligibility
            $("#eligibility_save").submit(function(e) {
            e.preventDefault();
            var eli_desc = $('#eli_desc').val();
            var eli_rating = $('#eli_rating').val();
            var eli_date_of_examination = $('#eli_date_of_examination').val();
            var eli_place_of_examination = $('#eli_place_of_examination').val();
            var eli_number = $('#eli_number').val();
            var eli_date_of_validity = $('#eli_date_of_validity').val();

            $.ajax({
                type : "POST",
                url  : "<?php echo base_url().'eligibility_data_save'?>",
                dataType : "JSON",
                data : {eli_desc:eli_desc, eli_rating:eli_rating, eli_date_of_examination:eli_date_of_examination, eli_place_of_examination:eli_place_of_examination, eli_number:eli_number, eli_date_of_validity:eli_date_of_validity},
                success: function(data){
                    $('[name="eli_desc"]').val("");
                    $('[name="eli_rating"]').val("");
                    $('[name="eli_date_of_examination"]').val("");
                    $('[name="eli_place_of_examination"]').val("");
                    $('[name="eli_number"]').val("");
                    $('[name="eli_date_of_validity"]').val("");
                    show_eligility();
                }
            });
            return false;
        });
//Save Eligibility

//Edit Eligibility

        //get data for delete record
        $('#show_data_eligibility').on('click','.item_edit_eli',function(){
            var eli_id_edit = $(this).data('eli_id_edit');
			$('#eli_id_edit').val(eli_id_edit);

            var eli_desc_edit = $(this).data('eli_desc_edit');
			$('#eli_desc_edit').val(eli_desc_edit);

            var eli_rating_edit = $(this).data('eli_rating_edit');
			$('#eli_rating_edit').val(eli_rating_edit);

            var eli_date_of_examination_edit = $(this).data('eli_date_of_examination_edit');
			$('#eli_date_of_examination_edit').val(eli_date_of_examination_edit);

            var eli_place_of_examination_edit = $(this).data('eli_place_of_examination_edit');
			$('#eli_place_of_examination_edit').val(eli_place_of_examination_edit);

            var eli_number_edit = $(this).data('eli_number_edit');
			$('#eli_number_edit').val(eli_number_edit);

            var eli_date_of_validity_edit = $(this).data('eli_date_of_validity_edit');
			$('#eli_date_of_validity_edit').val(eli_date_of_validity_edit);
        });


        $("#eligibility_edit").submit(function(e) {
            e.preventDefault();
            var eli_id = $('#eli_id_edit').val();
            var eli_desc = $('#eli_desc_edit').val();
            var eli_rating = $('#eli_rating_edit').val();
            var eli_date_of_examination = $('#eli_date_of_examination_edit').val();
            var eli_place_of_examination = $('#eli_place_of_examination_edit').val();
            var eli_number = $('#eli_number_edit').val();
            var eli_date_of_validity = $('#eli_date_of_validity_edit').val();

            $.ajax({
                type : "POST",
                url  : "<?php echo base_url().'eligibility_data_edit'?>",
                dataType : "JSON",
                data : {eli_id:eli_id, eli_desc:eli_desc, eli_rating:eli_rating, eli_date_of_examination:eli_date_of_examination, eli_place_of_examination:eli_place_of_examination, eli_number:eli_number, eli_date_of_validity:eli_date_of_validity},
                success: function(data){
                    html = '<div class="alert alert-success"><i class="fa fa-check-circle" aria-hidden="true"></i> <b>Updated</b> successfully.</div>';
                        $('#alert_data_eligibility_1').prepend(html);
                        //Hide
                        $(".alert").delay(4000).slideUp(200, function() {
                            $(this).alert('close');
                        });
                    show_eligility();
                }
            });
            return false;
        });
//Edit Eligibility
        
        //get data for delete record
        $('#show_data_eligibility').on('click','.item_delete_eli',function(){
            var eli_id = $(this).data('eli_id');
			$('#eli_id').val(eli_id);
        });
        

        //delete record to database
        $('#btn_delete_eligibility').on('click',function(){
            var eli_id = $('#eli_id').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url().'eligibility_data_delete'?>",
                dataType : "JSON",
                data : {eli_id:eli_id},
                success: function(data){
                    $('[name="eli_id"]').val("");
                    show_eligility();
                }
            });
            $('#Modal_Delete_Eligibility').modal('hide');
            return false;
        });

    });//Last
 
</script>