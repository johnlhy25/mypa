<?php if( $this->session->logged_in){?>
    <div class="container-fluid mt-4">
        <!-- Dashboard Accreditor-->
        <section class="dashboard-counts no-padding-top no-padding-bottom">
            <div class="container-fluid1">
                <h1>Parameter: <?= $letter; ?></h1>
                <div class="row bg-white has-shadow">
                    
                    
                    <div class="col-xl-10">
                        <?php 
                            foreach ($parameter as $row) {
                            $url= base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/'.$row['Link_ID'];
                        ?>
                        <iframe src="<?= $url?>" style="width:100%; height:1080px; border:0;">
                        </iframe>
                        <?php } ?>
                    </div>
                    
                    <div class="col-xl-2">
                        <div class="list-group">
                            <h1>Exhibits</h1>
                            
                            <?php
                                foreach ($exhibits as $row) {
                                    $url= base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/'.$row['elink_ID'].'#page='.$row['page_no'];
                            ?>
                            <a href="" data-toggle="modal" data-target="#view<?= $row['id'] ?>" id="view" class="list-group-item list-group-item-action"><?= $row['code']?>: <strong> <?= $row['edescription']?></strong> <div class="badge badge-rounded bg-red"><strong>Page #<?= $row['page_no']?></strong></div> <i class="fa fa-eye pull-right"></i></a>
                            <small class="text-right"><a href="<?= $row['ealternative_link']?>" target="_blank"><?= $row['code']?>: Please click this link if an error has occured.</a></small>
                             
                            <!-- Modal View -->
                            <div class="modal fade view" id="view<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl" role="document" style="width:100%">
                                        
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title" id="exampleModalLabel"> <?= $row['code']; ?>: <?= $row['edescription']; ?></h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                        </div>
                                            
                                        <div class="modal-body text-center">
                                            <iframe src="<?= $url?>" style="width:100%; height:720px; border:0;">
                                                </iframe>	
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Modal -->

                            <?php } ?>
                        </div>
                    </div>

                </div>
            </div>
        </section> 
    </div>  
<script>
    document.addEventListener("contextmenu", function(e){
    e.preventDefault();
    }, false);
</script>

<?php }else{
redirect(base_url());
}?>