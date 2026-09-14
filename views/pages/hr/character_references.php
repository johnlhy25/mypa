<div class="table-responsive">      
    <table id="character_reference_table" class="table table-striped table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Address</th>
                <th>Contact No.</th>
                <th>Action</th>
            </tr>
        </thead>
        
            <tbody id="show_data_reference">
                
            </tbody>
    </table>
    <small><b>* Leave blank if Not Applicable (N/A)</b></small>  
    <br><br>
    <div class="col-md-12">
        <form action="" method="POST" id="government_ID" role="form">
            <div class="form-group row no-padding-top no-padding-bottom">
                <label class="form-control-label">ID No.</label>
                <input type="text" id="emp_gov_id" name="emp_gov_id" class="form-control" placeholder="2021-0392" value="<?= $emp_gov_id ?>" required>
                <small><b>Write in full/Do not abbreviate</b></small>
            </div>

            <div class="form-group row no-padding-top no-padding-bottom">
                <label class="form-control-label">Government Issued ID</label>
                <input type="text" id="emp_gov_type" name="emp_gov_type" class="form-control" placeholder="Company ID" value="<?= $emp_gov_type ?>" required>
                <small><b>Write in full/Do not abbreviate</b></small>
            </div>

            <div class="form-group row no-padding-top no-padding-bottom">
                <label class="form-control-label">Date/Place of Issuance</label>
                <input type="text" id="emp_gov_place" name="emp_gov_place" class="form-control" placeholder="Basco, Batanes" value="<?= $emp_gov_place ?>" required>
                <small><b>Write in full/Do not abbreviate</b></small>
            </div>
            <div class="form-group row no-padding-top no-padding-bottom">
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
            </div><br>
        </form>
    </div><!--Col MD 12-->
</div> 


<!-- MODAL ADD -->
<form>
<div class="modal fade" id="Modal_Add_References" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus"></i> Add</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div id="alert_data_reference" class="modal-body">

            <div class="form-group row no-padding-top no-padding-bottom">
                <label class="form-control-label">Name</label>
                <input type="text" id="ref_name" name="ref_name" class="form-control" placeholder="John Lee P. Santiago" >
                <small><b>Write in full/Do not abbreviate</b></small>
            </div>

            <div class="form-group row no-padding-top no-padding-bottom">
                <label class="form-control-label">Address</label>
                <input type="text" id="ref_address" name="ref_address" class="form-control" placeholder="Tuguegarao City, Cagayan">
                <small><b>Write in full/Do not abbreviate</b></small>
            </div>

            <div class="form-group row no-padding-top no-padding-bottom">
                <label class="form-control-label">Contact No.</label>
                <input type="text" id="ref_contact" name="ref_contact" class="form-control" placeholder="09355660254">
                <small><b>Write in full/Do not abbreviate</b></small>
            </div>

        </div>
        <div class="modal-footer">
            <div class="btn-group">
                <button id="btn_save_reference" type="button" class="btn btn-danger"><i class="fa fa-save"></i> Save</button>
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
<div class="modal fade" id="Modal_Delete_reference" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <input type="hidden" id="ref_id" name="ref_id" class="form-control">

        <div class="btn-group">
            <button id="btn_delete_ref" type="button" class="btn btn-danger" data-dismiss="modal">Yes</button>
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
        show_references(); //call function show all work experience

          
        //function show all work experience
        function show_references(){
            $.ajax({
                type  : 'GET',
                url   : '<?php echo base_url().'references_data'?>',
                async : true,
                dataType : 'json',
                success : function(data){
                   
                    var html = '';
                    var i;
                    var x=1;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                    '<td>'+x+'</td>'+
                                    '<td>'+data[i].ref_name+'</td>'+
                                    '<td>'+data[i].ref_address+'</td>'+
                                    '<td>'+data[i].ref_contact+'</td>'+
                                    '<td>'+
                                    '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete_ref" data-toggle="modal" data-target="#Modal_Delete_reference" data-ref_id="'+data[i].ref_id+'"><i class="fa fa-trash"></i></a>'+
                                    '</td>'+
                                '</tr>';
                                x=x+1;
                    }
                    
                    $('#show_data_reference').html(html);
                    $('#character_reference_table').DataTable();
                }
 
            });
        }

        //Save work experience
        $('#btn_save_reference').on('click',function(){
            var ref_name = $('#ref_name').val();
            var ref_address = $('#ref_address').val();
            var ref_contact = $('#ref_contact').val();

            $.ajax({
                type : "POST",
                url  : "<?php echo base_url().'reference_data_save'?>",
                dataType : "JSON",
                data : {ref_name:ref_name, ref_address:ref_address, ref_contact:ref_contact},
                success: function(data){
                    if(data == false){
                        html = '<div class="no-padding-top no-padding-bottom"><div class="alert alert-danger"><strong>Maximum</strong> of three (3) references only.</div></div>';
                        $('#alert_data_reference').prepend(html);

                        //Hide
                        $(".alert").delay(4000).slideUp(200, function() {
                            $(this).alert('close');
                        });
                    }
                    $('[name="ref_name"]').val("");
                    $('[name="ref_address"]').val("");
                    $('[name="ref_contact"]').val("");
                    show_references();
                }
            });
            return false;
        });
        
         //get data for delete record
         $('#show_data_reference').on('click','.item_delete_ref',function(){
            var ref_id = $(this).data('ref_id');
			$('#ref_id').val(ref_id);
        });

        //delete record to database
        $('#btn_delete_ref').on('click',function(){
            var ref_id = $('#ref_id').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url().'reference_data_delete'?>",
                dataType : "JSON",
                data : {ref_id:ref_id},
                success: function(data){
                    $('[name="ref_id"]').val("");
                    show_references();
                }
            });
            $('#Modal_Delete_reference').modal('hide');
            return false;
        });

        //Save Government ID
        $("#government_ID").submit(function(e) {
            e.preventDefault();
            var emp_gov_id = $('#emp_gov_id').val();
            var emp_gov_type = $('#emp_gov_type').val();
            var emp_gov_place = $('#emp_gov_place').val();

            $.ajax({
                type : "POST",
                url  : "<?php echo base_url().'government_data_save'?>",
                dataType : "JSON",
                data : {emp_gov_id:emp_gov_id, emp_gov_type:emp_gov_type, emp_gov_place:emp_gov_place},
                success: function(data){
                        html = '<div class="alert alert-success">Updated Successfully</div>';
                        $('#government_ID').prepend(html);
                        //Hide
                        $(".alert").delay(4000).slideUp(200, function() {
                            $(this).alert('close');
                        });
                }
            });
            return false;
        });

    });//Last
 
</script>