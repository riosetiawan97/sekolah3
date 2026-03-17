<section class="our-teachers">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h2 class="mb-0">Siswa Kami</h2>
            </div>
            <div class="col-md-8">
                <nav><?php echo $page;?></nav>
            </div>
        </div>
        <div class="row">
            <?php foreach ($data->result() as $row) : ?>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="admission_insruction">
                        <?php if(empty($row->siswa_photo)):?>
                        <img src="<?php echo base_url().'assets/images/blank.png';?>" class="img-fluid" alt="#">
                        <?php else:?>
                        <img src="<?php echo base_url().'assets/images/'.$row->siswa_photo;?>" class="img-fluid" alt="#">
                        <?php endif;?>
                        <p class="text-center mt-3"><span><?php echo $row->siswa_nama;?></span>
                            <br>
                            <?php echo $row->kelas_nama;?></p>
                    </div>
                </div>
            <?php endforeach;?>
            </div>
        <!-- End row -->
    </div>
</section>

<!--//End Style 2 -->