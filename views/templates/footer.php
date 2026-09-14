<!-- JavaScript files-->
    <script src="<?= base_url();?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url();?>assets/vendor/popper.js/umd/popper.min.js"> </script>
    <script src="<?= base_url();?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url();?>assets/vendor/jquery-validation/jquery.validate.min.js"></script>
	
    <!-- Main File-->
    <script src="<?= base_url();?>assets/js/front.js"></script>
	<script src="<?= base_url();?>assets/js/custom-jquery.js"></script>

    <script>
    
    //Prevent f12
    $(document).keydown(function (event) {
        if (event.keyCode == 123) { // Prevent F12
            return false;
        } else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) { // Prevent Ctrl+Shift+I        
            return false;
        }
    });

    //login
    $('#icon-password').click(function(){
        if('password' == $('#login-password').attr('type')){
            $('#login-password').prop('type', 'text');
            $('#icon-password').prop('class', 'fa fa-eye');
           
        }else{
            $('#login-password').prop('type', 'password');
            $('#icon-password').prop('class', 'fa fa-eye-slash');
           
        }
    });

    //registration

    $('#icon-password').click(function(){
        if('password' == $('#register-password').attr('type')){
            $('#register-password').prop('type', 'text');
            $('#icon-password').prop('class', 'fa fa-eye');
           
        }else{
            $('#register-password').prop('type', 'password');
            $('#icon-password').prop('class', 'fa fa-eye-slash');
           
        }

        if('password' == $('#confirm-password').attr('type')){
            $('#confirm-password').prop('type', 'text');
            $('#icon-password').prop('class', 'fa fa-eye');
           
        }else{
            $('#confirm-password').prop('type', 'password');
            $('#icon-password').prop('class', 'fa fa-eye-slash');
           
        }
    });

    //Auto modal
    /*$(window).on('load', function() {
        $('#video').modal('show');
    });*/
    </script>
    

	
  </body>
</html>