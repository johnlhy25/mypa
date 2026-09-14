  <div class="modal fade delete" id="flag-raising-message" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">	
      <div class="modal-content" style="color: #fffdf8; background: url(assets/img/Background-Login.webp); background-repeat: no-repeat; background-size: auto; background-size: cover;">

          <div class="modal-header" style="color: #eeca24;">
            <h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-heart"></i> Tumpak o Lagpak sa Pag-ibig? Alamin Kung Pasado Ka sa Love Exam! </h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>

          <div class="modal-body">
            <div id="quiz"></div>
          </div>
              
      </div>
    </div>
  </div>

  <!---AJAX--->
  <script type="text/javascript">
      $(document).ready(function() {
          // Function to fetch top 10 players
          function get_top_10_players() {
              $.ajax({
                  type: 'GET',
                  url: '<?php echo base_url().'games/get_top_10_players'?>',
                  async: true,
                  dataType: 'json',
                  success: function(data) {
                      console.log(data); // Debugging: Check response in console

                      // Build the Bootstrap list
                      let quizHtml = '<ul class="list-group">';
                      $.each(data, function(index, player) {
                          quizHtml += `<li class="list-group-item d-flex justify-content-between align-items-center">
                                         <h2 style="color:black">${player.usr_name}</h2>
                                          <h2 style="color:black">${player.usr_remarks}/25</h2>
                                          <h2 style="color:black">${player.ous_desc}</h2>
                                      </li>`;
                      });
                      quizHtml += '</ul>';

                      // Inject into the modal body
                      $("#quiz").html(quizHtml);
                  },
                  error: function(xhr, status, error) {
                      console.error(xhr.responseText);
                      $("#quiz").html('<div class="alert alert-danger">Error loading data</div>');
                  }
              });
          }

          // Call the function to load data when the page loads
          get_top_10_players();
      });
  </script>

  <!---AJAX--->

  