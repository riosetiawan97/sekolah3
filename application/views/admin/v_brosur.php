<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
	<!--begin::Toolbar-->
	<div class="toolbar" id="kt_toolbar">
		<!--begin::Container-->
		<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
			<!--begin::Page title-->
			<div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
				<!--begin::Title-->
				<h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Brochure</h1>
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
                    <li class="breadcrumb-item text-muted">Brochure</li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-200 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-dark">List Brochure</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
			</div>
			<!--end::Page title-->
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
          <table id="example1" class="table table-striped" style="font-size:13px;">
            <thead>
            <tr>
                <th>Picture</th>
                <th>Date</th>
                <th>Author</th>
                <th>Type</th>
                <th style="text-align:right;">Action</th>
            </tr>
            </thead>
            <tbody>
              <?php
                $no=0;
                foreach ($data->result_array() as $i) :
                    $no++;
                    $brosur_id=$i['brosur_id'];
                    $brosur_tanggal=$i['brosur_tanggal'];
                    $brosur_gambar=$i['brosur_gambar'];
                    $type=$i['type'];
                    $brosur_author=$i['brosur_author'];

                ?>
            <tr>
              <td><img src="<?php echo base_url().'assets/images/'.$brosur_gambar;?>" style="width:80px;"></td>
              <td><?php echo $brosur_tanggal;?></td>
              <td><?php echo $brosur_author;?></td>
              <td><?php echo $type;?></td>
              <td style="text-align:right;">
                <a class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalEdit<?php echo $brosur_id;?>">
                    <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                    <span class="svg-icon svg-icon-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black" />
                            <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black" />
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

<!--Modal Edit Brosur-->
<?php foreach ($data->result_array() as $i) :
          $brosur_id=$i['brosur_id'];
          $brosur_gambar=$i['brosur_gambar'];
          $type=$i['type'];
          $brosur_tanggal=$i['brosur_tanggal'];
          $brosur_author=$i['brosur_author'];
        ?>

    <div class="modal fade" id="ModalEdit<?php echo $brosur_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                      <h4 class="modal-title" id="myModalLabel">Edit Brochure</h4>
                </div>
                <form class="form-horizontal" action="<?php echo base_url().'admin/brosur/update_brosur'?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" name="kode" value="<?php echo $brosur_id;?>"/>
                    <input type="hidden" value="<?php echo $brosur_gambar;?>" name="gambar">
                    <input type="hidden" name="type" value="<?php echo $type;?>"/>

                        <div class="form-group mb-4">
                            <label for="inputUserName" class="col-sm-4 control-label">Cover Brochure</label>
                            <div class="col-sm-7">
                                <input type="file" name="filefoto"/>
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
<?php endforeach;?>
<!--Modal Edit Brosur-->


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
                text: "Brosur Berhasil disimpan ke database.",
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
                text: "Brosur berhasil di update",
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
                text: "Brosur Berhasil dihapus.",
                showHideTransition: 'slide',
                icon: 'success',
                hideAfter: false,
                position: 'bottom-right',
                bgColor: '#7EC857'
            });
    </script>
<?php else:?>

<?php endif;?>