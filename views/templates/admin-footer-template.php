
          <!-- Page Footer-->
          <footer class="main-footer">
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-6">
                  <p> <i class="fa fa-tv"></i> R2 FASD Services <b>v <?= $this->config->item('system_version') ?></b> | &copy <?= date('Y');?> <b>TESDA DOS ICTU</b>. Site developed and managed with <i class="fa fa-heart"></i> by <strong>TESDA DOS ICTU</strong></p>
                </div>
                <div class="col-sm-6 text-right">
                  <p>Powered by <a href="https://bootstrapious.com/p/admin-template" class="external">Bootstrapious</a></p>
                  <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
                </div>
              </div>
            </div>
          </footer>
          
        </div><!--End of content-inner-->
		
      </div> <!--End of page-content d-flex align-items-stretch-->
    </div> <!--End of page-->

   

    <!-- JavaScript files-->
    <script src="<?= base_url();?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url();?>assets/vendor/popper.js/umd/popper.min.js"> </script>
    <script src="<?= base_url();?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url();?>assets/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="<?= base_url();?>assets/vendor/bootstrap/js/bootstrap-filestyle.js"></script>
    <script src="<?= base_url();?>assets/vendor/bootstrap/js/bootstrap-filestyle.min.js"></script>
    <!-- Main File-->
    <script src="<?= base_url();?>assets/js/front.js"></script>
    <script src="<?= base_url();?>assets/vendor/jquery/custom-jquery.js"></script>

    <!-- DataTables-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>  
    
    <script>
					$(document).ready( function () {

             

              //<!-- Accounts-->
              $('#account').DataTable({
                destroy: true
              });

              $('#account1').DataTable({
                    "order": [[ 4, "desc" ]]
              });
              //<!-- Notification-->
              $('#area').DataTable();
              $('#area1').DataTable();

              //<!-- Program-->
              $('#program').DataTable();
              $('#program1').DataTable();
              $('#program2').DataTable();

              //<!-- Parameter-->
              $('#parameters').DataTable();
              $('#parameters1').DataTable();
              $('#parameters12').DataTable();
              $('#parameters13').DataTable();

              $('#listofalltrainings').DataTable();

              $('#listofinv').DataTable();
                      
              $('body').on('change', '#check_email', function() {
                var stud_row, checked;
                stud_row = $('#listofalltrainings').find('tbody tr');
                checked = $(this).prop('checked');
                $.each(stud_row, function() {
                    var checkbox = $($(this).find('td').eq(0)).find('input').prop('checked', checked);
                });
              });

              $('body').on('change', '#check_email1', function() {
                var stud_row, checked;
                stud_row = $('#parameters').find('tbody tr');
                checked = $(this).prop('checked');
                $.each(stud_row, function() {
                    var checkbox = $($(this).find('td').eq(0)).find('input').prop('checked', checked);
                });
              });

              $('body').on('change', '#check_email2', function() {
                var stud_row, checked;
                stud_row = $('#parameters12').find('tbody tr');
                checked = $(this).prop('checked');
                $.each(stud_row, function() {
                    var checkbox = $($(this).find('td').eq(0)).find('input').prop('checked', checked);
                });
              });

              //<!-- Test-->
              $('#testing').DataTable();
					} );
		</script>

    <script>
      $("#chkSelectAll").on('click', function(){
        this.checked ? $(".chkDel").prop("checked",true) : $(".chkDel").prop("checked",false);  
      })

      $("#chkSelectAllInv").on('click', function(){
        this.checked ? $(".chkDelInv").prop("checked",true) : $(".chkDelInv").prop("checked",false);  
      })
    </script>	

    <script src="<?= base_url();?>assets/js/tinymce/tinymce.min.js"></script>
    <script type="text/javascript">
      tinymce.init({
          selector: 'textarea.mytextarea',
          height: 200
      });
    </script>
        

     <!-- Loading Image-->
     <script>

      

      $(document).ready(function(){
          
        //$('#flag-raising-message').modal('show'); // Show the modal automatically
          
      //Add AACCUP
      $("#addaaccupsubmit").click(function(){
        $("#addaaccuploading").show();
      });

      //Edit AACCUP
      $("#editaaccupsubmit").click(function(){
        $("#editaaccuploading").show();
      });

      //Delete AACCUP
      $("#deleteaaccupsubmit").click(function(){
        $("#deleteaaccuploading").show();
      });

       //Add EXHIBITS
       $("#addexhibitsubmit").click(function(){
        $("#addexhibitloading").show();
      });

      //Edit EXHIBITS
      $("#editexhibitsubmit").click(function(){
        $("#editexhibitloading").show();
      });

      //Delete EXHIBITS
      $("#deleteexhibitsubmit").click(function(){
        $("#deleteexhibitloading").show();
      });

    });
    </script>

     <!--Profile Picture-->
     <script>
        function onFileSelected(event) {
        var selectedFile = event.target.files[0];
        var reader = new FileReader();

        var imgtag = document.getElementById("profile_pic");
        imgtag.title = selectedFile.name;

        reader.onload = function(event) {
          imgtag.src = event.target.result;
        };

        reader.readAsDataURL(selectedFile);
      }
    </script> 

    <!--Block Space-->
    <script>
      $("input#accronym").on({
      keydown: function(e) {
        if (e.which === 32)
          return false;
      },
      change: function() {
        this.value = this.value.replace(/\s/g, "");
      }
    });
    </script>



  </body>
  
</html>

<!--OneSignal Notification Script-->

<script type="text/javascript">
    OneSignal.push(function() {
  /* These examples are all valid */
    var isPushSupported = OneSignal.isPushNotificationsSupported();
    if (isPushSupported) {
        // Push notifications are supported
        console.log('supported');
        OneSignal.isPushNotificationsEnabled(function(isEnabled) {
            if (isEnabled){
            console.log("Push notifications are enabled!");
            document.getElementById('notifs').textContent = " Subscribed";
            document.getElementById("PushButton").disabled = false;
            OneSignal.getUserId(function(userId) {
                console.log("OneSignal User ID:", userId);
                document.getElementById("o_user_id").setAttribute("value", userId);
            });
            } else{
            document.getElementById('notifs').textContent = "Not Subscribed";
            document.getElementById("PushButton").disabled = true;
            console.log("Push notifications are not enabled yet.");  
                OneSignal.push(function() {
                    Signal.showSlidedownPrompt();
                });  
            }
        });
    } else {
        // Push notifications are not supported
        console.log('not supported');
    }
    });
</script>

<script type="text/javascript">
  var btn = $('#buttontotop');

  $(window).scroll(function() {
    if ($(window).scrollTop() > 300) {
      btn.addClass('show');
    } else {
      btn.removeClass('show');
    }
  });

  btn.on('click', function(e) {
    e.preventDefault();
    $('html, body').animate({scrollTop:0}, '300');
  });

</script>

<script>  
$(document).ready(function(){
    $('#res_cat').on('change', function() {
      if ( this.value == 'Memo')
      {
        $("#Memo").show();
      }
      else
      {
        $("#Memo").hide();
      }
    });
});
</script>

<script>
function exportTableToExcel(tableID, filename = ''){
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'excel_data.xls';
    
    // Create download link element
    downloadLink = document.createElement("a");
    
    document.body.appendChild(downloadLink);
    
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
    
        // Setting the file name
        downloadLink.download = filename;
        
        //triggering the function
        downloadLink.click();
    }
}
</script>










  












