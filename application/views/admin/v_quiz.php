<section class="content-header">
    <h1>
        Data Quiz
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Quiz</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <a class="btn btn-success btn-flat" href="<?php echo base_url() . 'admin/quiz/add_quiz' ?>"><span class="fa fa-plus"></span> Add Quiz</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-striped" style="font-size:13px;">
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th>Kelas</th>
                                <th>Waktu Mulai</th>
                                <th>Waktu Selesai</th>
                                <th>Waktu Pengerjaan</th>
                                <th style="text-align:right;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data->result_array() as $i) : ?>
                                <tr>
                                    <td><?php echo $i['judul']; ?></td>
                                    <td><?php echo $i['deskripsi']; ?></td>
                                    <td><?php echo $i['kelas_nama']; ?></td>
                                    <td><?php echo $i['waktu_mulai']; ?></td>
                                    <td><?php echo $i['waktu_selesai']; ?></td>
                                    <td><?php echo $i['waktu_pengerjaan']; ?> menit</td>
                                    <td style="text-align:right;">
                                        <a class="btn" href="<?php echo base_url() . 'admin/quiz/edit_quiz/' . $i['id']; ?>"><span class="fa fa-pencil"></span></a>
                                        <a class="btn" data-toggle="modal" data-target="#ModalHapus<?php echo $i['id']; ?>"><span class="fa fa-trash"></span></a>
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

<!--Modal Hapus Quiz-->
<?php foreach ($data->result_array() as $i) : ?>
    <div class="modal fade" id="ModalHapus<?php echo $i['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                    <h4 class="modal-title" id="myModalLabel">Hapus Quiz</h4>
                </div>
                <form class="form-horizontal" action="<?php echo base_url() . 'admin/quiz/hapus_quiz' ?>" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="kode" value="<?php echo $i['id']; ?>" />
                        <p>Apakah Anda yakin mau menghapus quiz <b><?php echo $i['judul']; ?></b> ?</p>
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
