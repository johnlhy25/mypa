  <div class="modal fade delete" id="flag-raising-message" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">	
      <div class="modal-content" style="color: #fffdf8; background: url(assets/img/Background-Login.webp); background-repeat: no-repeat; background-size: auto; background-size: cover;">

          <div class="modal-header" style="color: #eeca24;">
            <h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-video-camera"></i> Dashboard</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>

          <div class="modal-body"><center>
            <!---center id="video_flg"></center--->
            <img src="<?= base_url()?>uploads/memos/0067-2026.png" style="display:none">
            <iframe width="100%" height="720px" src="https://lookerstudio.google.com/embed/reporting/7ceb8313-ccac-4434-8b20-0ecb15a9ec94/page/p_xv1kul9tsd" frameborder="0" style="border:0;" allowfullscreen sandbox="allow-storage-access-by-user-activation allow-scripts allow-same-origin allow-popups allow-popups-to-escape-sandbox"></iframe>
          </center>
          </div>
              
      </div>
    </div>
  </div>

  <!---AJAX--->
  <script type="text/javascript">
    $(document).ready(function(){
          
        // function to show video
        function show_flg_videos(){
            $.ajax({
                type: 'GET',
                url: '<?php echo base_url().'show_flg_videos'?>',
                async: true,
                dataType: 'json',
                success: function(data){
                    var html = data[0]['rd_fbwatch_link'];
                    $('#video_flg').html(html);
                    //console.log(data);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }

        // call the function
        show_flg_videos();

    }); // Last
  </script>
  <!---AJAX--->

  