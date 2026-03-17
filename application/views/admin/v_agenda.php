<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
	<!--begin::Toolbar-->
	<div class="toolbar" id="kt_toolbar">
		<!--begin::Container-->
		<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
			<!--begin::Page title-->
			<div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
				<!--begin::Title-->
				<h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Data Event</h1>
				<!--end::Title-->
                <!--begin::Separator-->
                <span class="h-20px border-gray-200 border-start mx-4"></span>
                <!--end::Separator-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="<?php echo base_url().'admin/dashboard'?>" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-200 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Event</li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-200 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-dark">List Event</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
			</div>
			<!--end::Page title-->
			<!--begin::Actions-->
			<div class="d-flex align-items-center py-1">
				<!--begin::Button-->
				<a data-bs-toggle="modal" data-bs-target="#myModal" class="btn btn-sm btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
                </svg>
                Add Event</a>
				<!--end::Button-->
			</div>
			<!--end::Actions-->
		</div>
		<!--end::Container-->
	</div>
	<!--end::Toolbar-->
	<!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">

        <div id="kt_content_container" class="container-xxl">
            <div class="row g-5 g-xxl-8">
                <div class="col-xxl-12">
            <!-- Main content -->
                    <div class="card card-xxl-stretch mb-xl-8">
                                <!--begin::Body-->
                        <div class="card-body py-3">
                    <!-- /.box-header -->
              <table id="example1" class="table table-striped" style="font-size:12px;">
                <thead>
                <tr>
					          <th style="width:70px;">#</th>
                    <th>Event</th>
                    <th>Date</th>
                    <th>Place</th>
                    <th>Time</th>
                    <th>Author</th>
                    <th style="text-align:right;">Action</th>
                </tr>
                </thead>
                <tbody>
				<?php
					$no=0;
  					foreach ($data->result_array() as $i) :
  					   $no++;
                       $agenda_id=$i['agenda_id'];
                       $agenda_nama=$i['agenda_nama'];
                       $agenda_deskripsi=$i['agenda_deskripsi'];
                       $agenda_mulai=$i['agenda_mulai'];
                       $agenda_selesai=$i['agenda_selesai'];
                       $agenda_tempat=$i['agenda_tempat'];
                       $agenda_waktu=$i['agenda_waktu'];
                       $agenda_keterangan=$i['agenda_keterangan'];
                       $agenda_author=$i['agenda_author'];
                       $tanggal=$i['tanggal'];

                    ?>
                <tr>
                  <td><?php echo $tanggal;?></td>
                  <td><?php echo $agenda_nama;?></td>
                  <td><?php echo $agenda_mulai.' s/d '.$agenda_selesai;?></td>
                  <td><?php echo $agenda_tempat;?></td>
                  <td><?php echo $agenda_waktu;?></td>
                  <td><?php echo $agenda_author;?></td>
                  <td style="text-align:right;">
                        <a class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalEdit<?php echo $agenda_id;?>">
                            <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                            <span class="svg-icon svg-icon-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black" />
                                    <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </a>
                        <a class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#ModalHapus<?php echo $agenda_id;?>">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                            <span class="svg-icon svg-icon-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black" />
                                    <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black" />
                                    <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </a>
                  </td>
                </tr>
				<?php endforeach;?>
                </tbody>
              </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<!--end::Post-->
</div>
<!--Modal Add Pengguna-->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        
                        <!--begin::Close-->
						<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
							<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
							<span class="svg-icon svg-icon-1">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
									<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
								</svg>
							</span>
							<!--end::Svg Icon-->
						</div>
						<!--end::Close-->
                        <h4 class="modal-title" id="myModalLabel">Add Event</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'admin/agenda/simpan_agenda'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">

                        <div class="form-group mb-4">
                            <label for="inputUserName" class="col-sm-4 control-label">Event Name</label>
                            <div class="col-sm-7">
                                <input type="text" name="xnama_agenda" class="form-control" id="inputUserName" placeholder="Event Name" required>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="inputUserName" class="col-sm-4 control-label">Event Picture</label>
                            <div class="col-sm-12">
                                <input type="file" name="filefoto" />
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="inputUserName" class="col-sm-4 control-label">Description</label>
                            <div class="col-sm-7">
                                <textarea class="form-control" rows="3" name="xdeskripsi" placeholder="Description ..." required></textarea>
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <label for="inputUserName" class="col-sm-4 control-label">Date From</label>
                            <div class="col-sm-7">
                            <div class="input-group date">
                                <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" name="xmulai" class="form-control pull-right" id="datepicker" required>
                            </div>
                            </div>
                            <!-- /.input group -->
                        </div>
                        <!-- /.form group -->

                        <!-- Date range -->
                        <div class="form-group mb-4">
                            <label for="inputUserName" class="col-sm-4 control-label">Date To</label>
                            <div class="col-sm-7">
                            <div class="input-group date">
                                <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" name="xselesai" class="form-control pull-right" id="datepicker2" required>
                            </div>
                            </div>
                            <!-- /.input group -->
                        </div>
                        <!-- /.form group -->
                        <div class="form-group mb-4">
                            <label for="inputUserName" class="col-sm-4 control-label">Place</label>
                            <div class="col-sm-7">
                                <input type="text" name="xtempat" class="form-control" id="inputUserName" placeholder="Place" required>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="inputUserName" class="col-sm-4 control-label">Time</label>
                            <div class="col-sm-7">
                                <input type="text" name="xwaktu" class="form-control" id="inputUserName" placeholder="Example: 10.30-11.00 WIB" required>
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <label for="inputUserName" class="col-sm-4 control-label">Remarks</label>
                            <div class="col-sm-7">
                                <textarea class="form-control" name="xketerangan" rows="2" placeholder="Remarks ..."></textarea>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" id="simpan">Save</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>


		<?php foreach ($data->result_array() as $i) :
              $agenda_id=$i['agenda_id'];
              $agenda_nama=$i['agenda_nama'];
              $agenda_deskripsi=$i['agenda_deskripsi'];
              $agenda_mulai=$i['agenda_mulai'];
              $agenda_selesai=$i['agenda_selesai'];
              $agenda_tempat=$i['agenda_tempat'];
              $agenda_waktu=$i['agenda_waktu'];
              $agenda_keterangan=$i['agenda_keterangan'];
              $agenda_author=$i['agenda_author'];
              $agenda_gambar=$i['agenda_gambar'];
              $tangal=$i['tanggal'];
            ?>
	<!--Modal Edit Pengguna-->
        <div class="modal fade" id="ModalEdit<?php echo $agenda_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">                        
                        <!--begin::Close-->
						<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
							<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
							<span class="svg-icon svg-icon-1">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
									<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
								</svg>
							</span>
							<!--end::Svg Icon-->
						</div>
						<!--end::Close-->
                        <h4 class="modal-title" id="myModalLabel">Edit Event</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'admin/agenda/update_agenda'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">

                            <div class="form-group mb-4">
                                <label for="inputUserName" class="col-sm-4 control-label">Event Name</label>
                                <div class="col-sm-7">
                                  <input type="hidden" name="kode" value="<?php echo $agenda_id;?>">
                                  <input type="hidden" value="<?php echo $agenda_gambar;?>" name="gambar">
                                  <input type="text" name="xnama_agenda" class="form-control" value="<?php echo $agenda_nama;?>" id="inputUserName" placeholder="Agenda Name" required>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label for="inputUserName" class="col-sm-4 control-label">Event Picture</label>
                                <div class="col-sm-12">
                                    <input type="file" name="filefoto" required/>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label for="inputUserName" class="col-sm-4 control-label">Description</label>
                                <div class="col-sm-7">
                                  <textarea class="form-control" rows="3" name="xdeskripsi" placeholder="Description ..." required><?php echo $agenda_deskripsi;?></textarea>
                                </div>
                            </div>

                            <div class="form-group mb-4">
                              <label for="inputUserName" class="col-sm-4 control-label">Date From</label>
                              <div class="col-sm-7">
                                <div class="input-group date">
                                  <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                  </div>
                                  <input type="text" name="xmulai" value="<?php echo $agenda_mulai;?>" class="form-control pull-right datepicker3" required>
                                </div>
                              </div>
                              <!-- /.input group -->
                            </div>
                            <!-- /.form group -->

                            <!-- Date range -->
                            <div class="form-group mb-4">
                             <label for="inputUserName" class="col-sm-4 control-label">Date To</label>
                              <div class="col-sm-7">
                                <div class="input-group date">
                                  <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                  </div>
                                  <input type="text" name="xselesai" value="<?php echo $agenda_selesai;?>" class="form-control pull-right datepicker4" required>
                                </div>
                              </div>
                              <!-- /.input group -->
                            </div>
                            <!-- /.form group -->
                            <div class="form-group mb-4">
                                <label for="inputUserName" class="col-sm-4 control-label">Place</label>
                                <div class="col-sm-7">
                                  <input type="text" name="xtempat" class="form-control" value="<?php echo $agenda_tempat;?>" id="inputUserName" placeholder="Place" required>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label for="inputUserName" class="col-sm-4 control-label">Time</label>
                                <div class="col-sm-7">
                                    <input type="text" name="xwaktu" class="form-control" value="<?php echo $agenda_waktu;?>" id="inputUserName" placeholder="Example: 10.30-11.00 WIB" required>
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label for="inputUserName" class="col-sm-4 control-label">Remarks</label>
                                <div class="col-sm-7">
                                  <textarea class="form-control" name="xketerangan" rows="2" placeholder="Remarks ..."><?php echo $agenda_keterangan;?></textarea>
                                </div>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" id="simpan">Update</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
	<?php endforeach;?>

	<?php foreach ($data->result_array() as $i) :
              $agenda_id=$i['agenda_id'];
              $agenda_nama=$i['agenda_nama'];
              $agenda_deskripsi=$i['agenda_deskripsi'];
              $agenda_mulai=$i['agenda_mulai'];
              $agenda_selesai=$i['agenda_selesai'];
              $agenda_tempat=$i['agenda_tempat'];
              $agenda_waktu=$i['agenda_waktu'];
              $agenda_keterangan=$i['agenda_keterangan'];
              $agenda_author=$i['agenda_author'];
              $agenda_gambar=$i['agenda_gambar'];
              $tangal=$i['tanggal'];
            ?>
	<!--Modal Hapus Pengguna-->
        <div class="modal fade" id="ModalHapus<?php echo $agenda_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">                        
                        <!--begin::Close-->
						<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
							<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
							<span class="svg-icon svg-icon-1">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
									<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
								</svg>
							</span>
							<!--end::Svg Icon-->
						</div>
						<!--end::Close-->
                        <h4 class="modal-title" id="myModalLabel">Delete Event</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'admin/agenda/hapus_agenda'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
							<input type="hidden" name="kode" value="<?php echo $agenda_id;?>"/>
                            <input type="hidden" value="<?php echo $agenda_gambar;?>" name="gambar">
                            <p>Are You sure want to delete Event <b><?php echo $agenda_nama;?></b> ?</p>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" id="simpan">Delete</button>
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
                    text: "Agenda Berhasil disimpan ke database.",
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
                    text: "Agenda berhasil di update",
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
                    text: "Agenda Berhasil dihapus.",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#7EC857'
                });
        </script>
    <?php else:?>

    <?php endif;?>