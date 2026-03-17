<!--============================= Gallery =============================-->
<section>
<div class="gallery-wrap">
  <div class="container">
  <!-- Style 2 -->
    <div class="row">
      <div class="col-md-12">
        <h3 class="gallery-style">Galeri Foto</h3>
      </div>
    </div><br>
    <div class="row">
      <?php foreach ($all_galeri->result() as $row) : ?>
      <div class="col-md-3 mb-3">

          <div class="card" style="width: 16rem;" data-toggle="modal" data-target="#myModal<?php echo $row->galeri_id;?>">
            <img class="card-img-top" src="<?php echo base_url().'assets/images/'.$row->galeri_gambar;?>" alt="Card image cap">
            <div class="card-body">
              <p class="card-text"><?php echo $row->galeri_judul;?></p>
            </div>
          </div>

          <div class="modal fade" id="myModal<?php echo $row->galeri_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                          <h4 class="modal-title" id="myModalLabel"><?php echo $row->galeri_judul;?></h4>
                      </div>
                      <form class="form-horizontal" enctype="multipart/form-data">
                      <div class="modal-body">
                        <img class="project__image" src="<?php echo base_url().'assets/images/'.$row->galeri_gambar;?>" />
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                      </div>
                      </form>
                  </div>
              </div>
          </div>

        <!-- <div id="gallery">
          <div id="gallery-content">
            <div id="gallery-content-center">
              <?php #foreach ($all_galeri->result() as $row) : ?>
                <a href="<?php #echo base_url().'assets/images/'.$row->galeri_gambar;?>" class="image-link2">
                <img src="<?php #echo base_url().'assets/images/'.$row->galeri_gambar;?>" class="all img-fluid" alt="#" />
                Tes lah
                </a>
              <?php #endforeach;?>
            </div>
         </div>
        </div> -->

      </div>
      <?php endforeach;?>
    </div>
    <!--//End Style 2 -->
  </div>
</div>
<!--//End Gallery -->
</section>