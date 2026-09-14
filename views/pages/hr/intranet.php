<?php 
if( $this->session->logged_in){
  if( $this->session->role == 'Accre'){
    redirect (base_url().'Guest');
  }else{?>

  <div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Intranet</h2>
            </div>
          </header>

        <!-- Breadcrumb-->
        <?php require_once('breadcrumb.php'); ?>

          <!-- Dashboard Parameters-->
          <div class="container-fluid"><!-- container-fluid1-->
            <section class="dashboard-counts">       
                <h1><i class="fa fa-file" aria-hidden="true"></i> Intranet</h1>
                <hr>

              <div class="card bg-white no-margin-bottom">
                <div class="card-close">
                  <div class="dropdown">
                   
                  </div>
                </div>
                <br>
                <div class="card-body no-padding-bottom no-padding-top no-margin-top">
                    <div class="alert alert-info">
                        <i class='fa fa-exclamation-circle'></i> <b>Update: </b>Column <b>'Is PNPKI'</b> takes effect on documents uploaded starting <b>July 15, 2024</b>.<strong></strong> &nbsp&nbsp&nbsp
                        
                    </div>
                  <div class="row no-padding-top">

                  <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#office_order" class="nav-link" data-value="Office_Order">Office Order</a></li>
                    <li><a data-toggle="tab" href="#memorandum" class="nav-link" data-value="Memorandum">Memorandum</a></li>
                    <li><a data-toggle="tab" href="#letter" class="nav-link" data-value="Outgoing_Letters">Letter</a></li>
                  </ul>

                  <div class="tab-content">
                    <div class="col-md-12">
                      <div class="row" >
                        <!--Div 1-->
                        <div id="office_order" class="tab-pane fade show in active">
                            <!--Table-->
                            <div class="table-responsive" style="100%">
                              <table id="memListTable" class="table">
                                  <thead class="thead-dark">
                                      <tr>
                                          <th>#</th>
                                          <th>Document #</th>
                                          <th>Date Issued</th>
                                          <th>Subject</th>
                                          <th>Effectivity Date</th>
                                          <th>Supersedes</th>
                                          <th>Is PNPKI?</th>
                                          <th>Action</th>
                                      </tr>
                                  </thead>
                              </table>
                            </div>
                            <!--Table-->

                            <!--Script-->
                              <script>
                                  $(document).ready(function(){
                                    
                                    show_doc('Office_Order');

                                    //-----------set variable to tab-------------------
                                    var docType;
                                    $('.nav-link').click(function() {
                                      docType = $(this).attr('data-value');
                                      show_doc(docType);                                
                                    });
                                  //-----------set variable to tab-------------------

                                    function show_doc(docType){
                                      $('#memListTable').DataTable({
                                          "bDestroy": true,
                                          // Processing indicator
                                          "processing": true,
                                          // DataTables server-side processing mode
                                          "serverSide": true,
                                          // Initial no order.
                                          "order": [],
                                          // Load data from an Ajax source
                                          "ajax": {
                                              "url": "<?php echo base_url('intranet/getLists/');?>"+docType,
                                              "type": "POST"
                                          },
                                          //Set column definition initialisation properties
                                          "columnDefs": [{ 
                                              "targets": [0],
                                              "orderable": false
                                          }]
                                      });
                                    }

                                  });
                              </script>
                              <!--Script-->
                        </div>
                        <!--Div 1-->
                      </div><!--End of Row-->
                    </div><!--End of Col12-->

                  </div><!--End of Row-->
                </div><!--End of Card-Body-->

              </div><!--End of Card-->
            </section>
          </div><!-- end of container-fluid1-->
  <?php }?>
<?php }else{
redirect (base_url());
}?>

