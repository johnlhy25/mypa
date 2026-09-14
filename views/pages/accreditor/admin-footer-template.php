
              <!-- Page Footer-->
              <div class="copyrights text-center mt-4">
                <p style="color: #333333;">  &copy 2020 Cagayan State University. Site developed and managed with <i class="fa fa-heart"></i> by <strong>MIS Office</strong> | Powered by </span> <a href="https://bootstrapious.com/p/admin-template" class="external">Bootstrapious</a>
                  <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
                </p>
              </div>
    </div> <!--End of page-->
    
	
    <!-- JavaScript files-->
    <script src="<?= base_url();?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url();?>assets/vendor/popper.js/umd/popper.min.js"> </script>
    <script src="<?= base_url();?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url();?>assets/vendor/jquery-validation/jquery.validate.min.js"></script>
    <!-- Main File-->
    <script src="<?= base_url();?>assets/js/front.js"></script>
    <script src="<?= base_url();?>assets/vendor/jquery/custom-jquery.js"></script>

    <script>
      //Prevent f12
        $(document).keydown(function (event) {
          if (event.keyCode == 123) { // Prevent F12
              return false;
          } else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) { // Prevent Ctrl+Shift+I        
              return false;
          }
      });
    </script>
    
  </body>
</html>