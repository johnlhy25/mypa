<div class="table-responsive">    
    <table id="learning_table" class="table table-striped table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Title of Learning and Development Interventions/Training Programs (Write In Full)</th>
                <th>From (Date)</th>
                <th>To (Date)</th>
                <th>Number of Hours</th>
                <th>Type of LD</th>
                <th>Conducted/ Sponsored By (Write in Full)</th>
            </tr>
        </thead>
        
            <tbody id="show_learning_and_development">
                
            </tbody>
    </table>
    <small><b>* Updated Automatically</b></small>  
</div> 

<script type="text/javascript">
    $(document).ready(function(){
        show_learning_and_development(); //call function show all work experience
          
        //function show all work experience
        function show_learning_and_development(){
            $.ajax({
                type  : 'GET',
                url   : '<?php echo base_url().'learning_and_development_data'?>',
                async : true,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    var x=1;
                    for(i=0; i<data.length; i++){

                        if(data[i].trn_remarks == 'Postponed'){}
                        else{
                            if(data[i].trn_remarks == 'Disapproved'){}
                            else{
                            html += '<tr>'+
                                        '<td>'+x+'</td>'+
                                        '<td>'+data[i].trn_learn_dev+'</td>'+
                                        '<td>'+data[i].trn_from_date+'</td>'+
                                        '<td>'+data[i].trn_to_date+'</td>'+
                                        '<td>'+data[i].trn_no_hours+'</td>'+
                                        '<td>'+data[i].trn_type+'</td>'+
                                        '<td>'+data[i].trn_conducted+'</td>'+
                                    '</tr>';
                                    x=x+1;
                            }
                        }
                    }
                    $('#show_learning_and_development').html(html);
                    $('#learning_table').DataTable();
                }
 
            });
        }

    });//Last
 
</script>