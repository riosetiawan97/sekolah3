<section class="our-teachers">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mb-0">Guru Kami</h2>
            </div>
        </div>
        <div class="row">
            <?php foreach ($data->result() as $row) : ?>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="admission_insruction">
                        <?php if(empty($row->guru_photo)):?>
                        <img src="<?php echo base_url().'assets/images/blank.png';?>" class="img-fluid" alt="#">
                        <?php else:?>
                        <img src="<?php echo base_url().'assets/images/'.$row->guru_photo;?>" class="img-fluid" alt="#">
                        <?php endif;?>
                        <p class="text-center mt-3"><span><?php echo $row->guru_nama;?></span>
                            <br>
                            <?php echo $row->guru_mapel;?></p>
                    </div>
                </div>
            <?php endforeach;?>
            </div>
        <!-- End row -->
        <nav><?php echo $page;?></nav>
    </div>
</section>

<!--//End Style 2 -->