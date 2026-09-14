<div class="table-responsive">      
    <table id="membership_table" class="table table-striped table-hover">                                                                                 
        <thead>
            <tr>
                <th>#</th>
                <th>Membership in Association/ Organization</th>
                <th>Action</th>
            </tr>
        </thead>
        
            <tbody id="show_data_membership">
                
            </tbody>
    </table>
    <small><b>* Leave blank if Not Applicable (N/A)</b></small>  
</div> 


<!-- MODAL ADD -->
<form>
<div class="modal fade" id="Modal_Add_Membership" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <label class="form-control-label">Membership in Association/ Organization</label>
                    <input type="text" id="mem_desc" name="mem_desc" class="form-control" placeholder="TESDA ACE">
                    <small><b>Write in full/Do not abbreviate</b></small>
                </div>
        </div>
        <div class="modal-footer">
            <div class="btn-group">
                <button id="btn_save_membership" type="button" class="btn btn-danger"><i class="fa fa-save"></i> Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>	
            </div>
        </div>
        </div>
    </div>
</div>
</form>
<!--END MODAL ADD-->

<!--MODAL DELETE-->
<form>
<div class="modal fade" id="Modal_Delete_membership" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <input type="hidden" id="mem_id" name="mem_id" class="form-control">

        <div class="btn-group">
            <button id="btn_delete_mem" type="button" class="btn btn-danger" data-dismiss="modal">Yes</button>
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
        show_data_membership(); //call function show all work experience

          
        //function show all work experience
        function show_data_membership(){
            $.ajax({
                type  : 'GET',
                url   : '<?php echo base_url().'membership_data'?>',
                async : true,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    var x=1;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                    '<td>'+x+'</td>'+
                                    '<td>'+data[i].mem_desc+'</td>'+
                                    '<td>'+
                                    '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete_mem" data-toggle="modal" data-target="#Modal_Delete_membership" data-mem_id="'+data[i].mem_id+'"><i class="fa fa-trash"></i> Delete</a>'+
                                    '</td>'+
                                '</tr>';
                                x=x+1;
                    }
                    $('#show_data_membership').html(html);
                    $('#membership_table').DataTable();
                }
 
            });
        }

        //Save work experience
        $('#btn_save_membership').on('click',function(){
            var mem_desc = $('#mem_desc').val();

            $.ajax({
                type : "POST",
                url  : "<?php echo base_url().'membership_data_save'?>",
                dataType : "JSON",
                data : {mem_desc:mem_desc},
                success: function(data){
                    $('[name="mem_desc"]').val("");
                    show_data_membership();
                }
            });
            return false;
        });
        
         //get data for delete record
         $('#show_data_membership').on('click','.item_delete_mem',function(){
            var mem_id = $(this).data('mem_id');
			$('#mem_id').val(mem_id);
        });

        //delete record to database
        $('#btn_delete_mem').on('click',function(){
            var mem_id = $('#mem_id').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url().'membership_data_delete'?>",
                dataType : "JSON",
                data : {mem_id:mem_id},
                success: function(data){
                    $('[name="mem_id"]').val("");
                    show_data_membership();
                }
            });
            $('#Modal_Delete_membership').modal('hide');
            return false;
        });

    });//Last
 
</script>