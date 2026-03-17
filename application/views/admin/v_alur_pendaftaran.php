    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Alur Pendaftaran
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Alur Pendaftaran</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">

          <div class="box">
            <div class="box-header">
              <a class="btn btn-success btn-flat" data-toggle="modal" data-target="#myModal"><span class="fa fa-plus"></span> Add Langkah</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-striped" style="font-size:12px;">
                <thead>
                <tr>
					          <th style="width:70px;">Langkah</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th style="text-align:right;">Aksi</th>
                </tr>
                </thead>
                <tbody>
				<?php
  					foreach ($data->result_array() as $i) :
              $id=$i['id'];  
              $langkah=$i['langkah'];
              $judul=$i['judul'];
              $deskripsi=$i['deskripsi'];
              ?>
              <tr>
                <td><?php echo $langkah;?></td>
                <td><?php echo $judul;?></td>
                <td><?php echo $deskripsi;?></td>
                <td style="text-align:right;">
                  <a class="btn" data-toggle="modal" data-target="#ModalEdit<?php echo $id;?>"><span class="fa fa-pencil"></span></a>
                  <a class="btn" data-toggle="modal" data-target="#ModalHapus<?php echo $id;?>"><span class="fa fa-trash"></span></a>
                </td>
              </tr>
				<?php endforeach;?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
<!--Modal Add Pengguna-->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Add Langkah</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'admin/alur_pendaftaran/simpan_alur_pendaftaran'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                      <div class="form-group">
                          <label for="langkah" class="col-sm-4 control-label">Langkah</label>
                          <div class="col-sm-7">
                            <input type="text" name="langkah" class="form-control" id="langkah" placeholder="Langkah" required>
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="inputUserName" class="col-sm-4 control-label">Judul</label>
                          <div class="col-sm-7">
                            <textarea class="form-control" rows="1" name="judul" id="judul" placeholder="Judul" required></textarea>
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="inputUserName" class="col-sm-4 control-label">Deskripsi</label>
                          <div class="col-sm-7">
                            <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3" placeholder="Deskripsi"></textarea>
                          </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" id="simpan">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>


		<?php foreach ($data->result_array() as $i) :
              $id=$i['id'];  
              $langkah=$i['langkah'];
              $judul=$i['judul'];
              $deskripsi=$i['deskripsi'];
            ?>
	<!--Modal Edit Pengguna-->
        <div class="modal fade" id="ModalEdit<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Edit Langkah</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'admin/alur_pendaftaran/update_alur_pendaftaran'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                      <div class="form-group">
                          <label for="langkah" class="col-sm-4 control-label">Langkah</label>
                          <div class="col-sm-7">
                            <input type="hidden" name="id" value="<?php echo $id;?>">
                            <input type="text" name="langkah" class="form-control" value="<?php echo $langkah;?>" id="langkah" placeholder="Langkah" required>
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="inputUserName" class="col-sm-4 control-label">Judul</label>
                          <div class="col-sm-7">
                            <textarea class="form-control" rows="1" name="judul" id="judul" placeholder="Judul" required><?php echo $judul;?></textarea>
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="inputUserName" class="col-sm-4 control-label">Deskripsi</label>
                          <div class="col-sm-7">
                            <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3" placeholder="Deskripsi"><?php echo $deskripsi;?></textarea>
                          </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" id="simpan">Update</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
	<?php endforeach;?>

	<?php foreach ($data->result_array() as $i) :
              $id=$i['id'];  
              $langkah=$i['langkah'];
              $judul=$i['judul'];
              $deskripsi=$i['deskripsi'];
            ?>
	<!--Modal Hapus Pengguna-->
        <div class="modal fade" id="ModalHapus<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus Langkah</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'admin/alur_pendaftaran/hapus_alur_pendaftaran'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
							        <input type="hidden" name="id" value="<?php echo $id;?>"/>
                      <p>Apakah Anda yakin mau menghapus Langkah <b><?php echo $langkah;?></b> ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" id="simpan">Hapus</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
	<?php endforeach;?>

<?php if($this->session->flashdata('msg')=='error'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Error',
                    text: "Password dan Ulangi Password yang Anda masukan tidak sama.",
                    showHideTransition: 'slide',
                    icon: 'error',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#FF4859'
                });
        </script>

    <?php elseif($this->session->flashdata('msg')=='success'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Success',
                    text: "Langkah Berhasil disimpan ke database.",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#7EC857'
                });
        </script>
    <?php elseif($this->session->flashdata('msg')=='info'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Info',
                    text: "Langkah berhasil di update",
                    showHideTransition: 'slide',
                    icon: 'info',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#00C9E6'
                });
        </script>
    <?php elseif($this->session->flashdata('msg')=='success-hapus'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Success',
                    text: "Langkah Berhasil dihapus.",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#7EC857'
                });
        </script>
    <?php else:?>

    <?php endif;?>