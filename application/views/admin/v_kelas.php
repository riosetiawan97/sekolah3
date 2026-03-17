<section class="content-header">
    <h1>
        Data Kelas
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Kelas</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <a class="btn btn-success btn-flat" data-toggle="modal" data-target="#myModal"><span class="fa fa-plus"></span> Add Kelas</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-striped" style="font-size:13px;">
                        <thead>
                            <tr>
                                <th>Nama Kelas</th>
                                <th>Guru</th>
                                <th style="text-align:right;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data->result_array() as $i) : ?>
                                <tr>
                                    <td><?php echo $i['kelas_nama']; ?></td>
                                    <td><?php echo $i['guru_nama']; ?></td>
                                    <td style="text-align:right;">
                                        <a class="btn" data-toggle="modal" data-target="#ModalEdit<?php echo $i['kelas_id']; ?>"><span class="fa fa-pencil"></span></a>
                                        <a class="btn" data-toggle="modal" data-target="#ModalHapus<?php echo $i['kelas_id']; ?>"><span class="fa fa-trash"></span></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<!--Modal Add Kelas-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                <h4 class="modal-title" id="myModalLabel">Add Kelas</h4>
            </div>
            <form class="form-horizontal" action="<?php echo base_url() . 'admin/kelas/simpan_kelas' ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="inputUserName" class="col-sm-4 control-label">Nama Kelas</label>
                        <div class="col-sm-7">
                            <input type="text" name="xkelas" class="form-control" id="inputUserName" placeholder="Nama Kelas" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputUserName" class="col-sm-4 control-label">Guru</label>
                        <div class="col-sm-7">
                            <select name="xguru" class="form-control" required>
                                <option value="">-Pilih-</option>
                                <?php foreach ($guru->result_array() as $k) {
                                    echo "<option value='" . $k['guru_id'] . "'>" . $k['guru_nama'] . "</option>";
                                } ?>
                            </select>
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

<!--Modal Edit Kelas-->
<?php foreach ($data->result_array() as $i) : ?>
    <div class="modal fade" id="ModalEdit<?php echo $i['kelas_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                    <h4 class="modal-title" id="myModalLabel">Edit Kelas</h4>
                </div>
                <form class="form-horizontal" action="<?php echo base_url() . 'admin/kelas/update_kelas' ?>" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="kode" value="<?php echo $i['kelas_id']; ?>" />
                        <div class="form-group">
                            <label for="inputUserName" class="col-sm-4 control-label">Nama Kelas</label>
                            <div class="col-sm-7">
                                <input type="text" name="xkelas" value="<?php echo $i['kelas_nama']; ?>" class="form-control" id="inputUserName" placeholder="Nama Kelas" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputUserName" class="col-sm-4 control-label">Guru</label>
                            <div class="col-sm-7">
                                <select name="xguru" class="form-control" required>
                                    <option value="">-Pilih-</option>
                                    <?php foreach ($guru->result_array() as $k) {
                                        if ($i['id_guru'] == $k['guru_id']) {
                                            echo "<option value='" . $k['guru_id'] . "' selected>" . $k['guru_nama'] . "</option>";
                                        } else {
                                            echo "<option value='" . $k['guru_id'] . "'>" . $k['guru_nama'] . "</option>";
                                        }
                                    } ?>
                                </select>
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
<?php endforeach; ?>

<!--Modal Hapus Kelas-->
<?php foreach ($data->result_array() as $i) : ?>
    <div class="modal fade" id="ModalHapus<?php echo $i['kelas_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                    <h4 class="modal-title" id="myModalLabel">Hapus Kelas</h4>
                </div>
                <form class="form-horizontal" action="<?php echo base_url() . 'admin/kelas/hapus_kelas' ?>" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="kode" value="<?php echo $i['kelas_id']; ?>" />
                        <p>Apakah Anda yakin mau menghapus kelas <b><?php echo $i['kelas_nama']; ?></b> ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" id="simpan">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
