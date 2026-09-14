<?php 
if( $this->session->logged_in){
  if( $this->session->role == 'Accre'){
    redirect (base_url().'Guest');
  }else{?>

  <div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom"><?= $this->session->ous_desc; ?></h2>
            </div>
          </header>

        <!-- Breadcrumb-->
        <?php require_once('breadcrumb.php'); ?>

          <!-- Dashboard Parameters-->
          <div class="col-lg-12 mt-3"><!-- col-lg-12 mt-3-->     
              <div class="card bg-white no-margin-bottom">

                <div class="card-close">
                  <div class="dropdown">
                    <button type="button" id="closeCard3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                        <div aria-labelledby="closeCard3" class="dropdown-menu dropdown-menu-right has-shadow">
                          <a data-toggle="modal" href="#add" class="dropdown-item edit"> <i class="fa fa-plus"></i>Add</a>
                          <a href="#" class="dropdown-item edit"> <i class="fa fa-print"></i>Export</a> 
                        </div>
                  </div>
                </div>

                <div class="card-header d-flex align-items-center">
                  <h1>Individual Performance Commitment and Review (IPCR)</h1>
                </div>
                
                  <div class="row"><!--Start of Row-->

<!--Working Area-->
                      <div class="card-body"><!--card-body-->
<!--Table-->
                        <div class="table-responsive">
    
                          <table class="table">
                           
                            <thead>
                              <tr>
                                <th>TARGET </th>
                                <th>INDICATOR</th>
                                <th>ACCOMPLISHMENT/S</th>
                              </tr>
                              <tr>
                                <td colspan="3">
                                  <b>&emsp; *** INDICATOR/S CONNECTED TO OPCR ***</b>
                                </td>
                              </tr>
                            </thead>
                            <tbody id="indicator_tbody">
                              
                            </tbody>
                          </table>

                        </div>
  <!--Table-->
                      </div><!--End of card-body-->
<!--Working Area-->

                  </div><!--End of Row-->
              </div><!--End of card bg-white no-margin-bottom-->
          </div><!-- end of col-lg-12 mt-3-->
          <!-- Dashboard Parameters-->

<!--javascript-->
<script type="text/javascript">

//document
  $(document).ready(function(){

//call function indicators
    show_indicators(); 
//call function indicators

//call function indicators ajax
    function show_indicators(){
        $.ajax({
            type  : 'GET',
            url   : "<?php echo base_url().'indicators_data'?>",
            async : true,
            dataType : 'json',
            success : function(data){
                var html = '';
                var i;
                var x=1;
                for(i=0; i<data.length; i++){
                        html +='<tr>'+
                              '<td>'+data[i].ous_target+'</td>'+
                              '<td>'+data[i].ind_desc.toUpperCase()+'</td>'+
                              '<td>'+data[i].output+'</td></tr>';
                }
                $('#indicator_tbody').html(html);
                console.log(data);
            }
           
        });
    }
//call function indicators ajax

    
  });//Last
//document

</script>
<!--javascript-->

  <?php }?>
<?php }else{
redirect (base_url());
}?>

