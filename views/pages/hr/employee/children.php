
<div class="table-responsive">      
    <table id="children" class="table table-striped table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Date of Birth</th>
                <th>Actions</th>
            </tr>
        </thead>
        
        <tbody id="show_data">
        
        </tbody>
    </table>
    <small><b>* Leave blank if Not Applicable (N/A)</b></small>  
</div> 

<!-- MODAL ADD -->
<form>
    <div class="modal fade" id="Modal_Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <!--modal-content-->
            <div class="modal-content">
                <!--modal-header-->
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus"></i>
                        Add
                    </h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!--modal-header-->
                <!--modal-body-->
                <div class="modal-body">
                    <div class="form-group row no-padding-top no-padding-bottom">
                        <label class="form-control-label">Name</label>
                        <input type="text" id="chi_name" name="chi_name" class="form-control" placeholder="John Lee P. Santiago">
                    </div>
                    <div class="form-group row no-padding-top no-padding-bottom">
                        <label class="form-control-label">Date of Birth</label>
                        <input type="date" id="chi_date" name="chi_date" class="form-control">
                    </div>
                </div>
                <!--modal-body-->
                <!--modal-footer-->
                <div class="modal-footer">
                    <div class="btn-group">
                        <button id="btn_save" type="button" class="btn btn-danger"><i class="fa fa-save"></i> Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>	
                </div>
                <!--modal-footer-->
            </div>
            <!--modal-content-->
        </div>
    </div>
</form>
<!--END MODAL ADD-->

<!--MODAL DELETE-->
<form>
    <div class="modal fade" id="Modal_Delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <!--modal-content-->
            <div class="modal-content">
                <!--modal-header-->
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-exclamation-triangle"></i> Warning</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!--modal-header-->
                <!--modal-body-->
                <div class="modal-body">
                    <strong>Are you sure you to delete this record?</strong>
                    
                    <br><br><small class="pull-left"><b>Note</b>: This proccess is irreversible.</small>
                </div>
                <!--modal-body-->
                <!--modal-footer-->
                <div class="modal-footer">
                    <input type="hidden" id="chi_id" name="chi_id" class="form-control">

                    <div class="btn-group">
                        <button id="btn_delete" type="button" class="btn btn-danger" data-dismiss="modal">Yes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>	
                    </div>
                </div>
                <!--modal-footer-->
            </div>
            <!--modal-content-->
        </div>
    </div>
</form>
<!--END MODAL DELETE-->


<script type="text/javascript">
    $(document).ready(function(){
        show_children(); //call function show all product
          
        //function show all product
        function show_children(){
            $.ajax({
                type  : 'GET',
                url   : '<?php echo base_url().'children_data'?>',
                async : true,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    var x=1;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                    '<td>'+x+'</td>'+
                                    '<td>'+data[i].chi_name+'</td>'+
                                    '<td>'+data[i].chi_date+'</td>'+
                                    '<td>'+
                                    '<a href="#" class="btn btn-danger btn-sm item_delete" data-toggle="modal" data-target="#Modal_Delete" data-chi_id="'+data[i].chi_id+'"><i class="fa fa-trash"></i> Delete</a>'+
                                    '</td>'+
                                '</tr>';
                                x=x+1;
                    }
                    $('#show_data').html(html);
                    $('#children').DataTable();
                }
 
            });
        }

        //Save Children
        $('#btn_save').on('click',function(){
            var chi_name = $('#chi_name').val();
            var chi_date = $('#chi_date').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url().'children_data_save'?>",
                dataType : "JSON",
                data : {chi_name:chi_name , chi_date:chi_date},
                success: function(data){
                    $('[name="chi_name"]').val("");
                    $('[name="chi_date"]').val("");
                    show_children();
                }
            });
            return false;
        });

        //get data for delete record
        $('#show_data').on('click','.item_delete',function(){
            var chi_id = $(this).data('chi_id');
			$('#chi_id').val(chi_id);
        });
 
        //delete record to database
         $('#btn_delete').on('click',function(){
            var chi_id = $('#chi_id').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url().'children_data_delete'?>",
                dataType : "JSON",
                data : {chi_id:chi_id},
                success: function(data){
                    $('[name="chi_id"]').val("");
                    show_children();
                }
            });
            $('#Modal_Delete').modal('hide');
            return false;
        });
    });
 
</script>

 
