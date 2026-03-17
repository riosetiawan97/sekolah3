<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
	<!--begin::Toolbar-->
	<div class="toolbar" id="kt_toolbar">
		<!--begin::Container-->
		<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
			<!--begin::Page title-->
			<div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
				<!--begin::Title-->
				<h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Youtube</h1>
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
                    <li class="breadcrumb-item text-muted">Setup</li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-200 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-dark">List Youtube</li>
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
                Add Youtube</a>
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
          <table id="example1" class="table table-striped" style="font-size:13px;">
            <thead>
            <tr>
                <th>Youtube Id</th>
                <th>Youtube Link</th>
                <th>Author</th>
                <th>Date</th>
                <th style="text-align:right;">Action</th>
            </tr>
            </thead>
            <tbody>
              <?php
                $no=0;
                foreach ($data->result_array() as $i) :
                    $no++;
                    $youtube_id=$i['youtube_id'];
                    $youtube_link=$i['youtube_link'];
                    $youtube_author=$i['youtube_author'];
                    $youtube_tanggal=$i['youtube_tanggal'];
                ?>
            <tr>
              <td><?php echo $youtube_id;?></td>
              <td><?php echo $youtube_link;?></td>
              <td><?php echo $youtube_author;?></td>
              <td><?php echo $youtube_tanggal;?></td>
              <td style="text-align:right;">
                    <a class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalEdit<?php echo $youtube_id;?>">
                        <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                        <span class="svg-icon svg-icon-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black" />
                                <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </a>
                    <?php if($youtube_id !='1'):?>
                    <a class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#ModalHapus<?php echo $youtube_id;?>">
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
                    <?php endif;?>
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

<!--Modal Add Youtube-->
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
                <h4 class="modal-title" id="myModalLabel">Add Youtube</h4>
            </div>
            <form class="form-horizontal" action="<?php echo base_url().'admin/youtube/simpan_youtube'?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="form-group mb-4">
                    <label for="inpuyoutubelink" class="col-sm-4 control-label">Link Youtube</label>
                    <div class="col-sm-12">
                        <input type="text" name="youtube_link" class="form-control" id="inputyoutubelink" placeholder="Link Youtube" required>
                    </div>
                </div>
                <div class="form-group mb-4">
                    <label for="inputUserName" class="col-sm-4 control-label">Description Youtube</label>
                    <div class="col-sm-12">
                        <input type="text" name="youtube_description" class="form-control" id="inputDescription" placeholder="Description Youtube" required>
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
<!--Modal Add Youtube-->

<!--Modal Edit Youtube-->
<?php foreach ($data->result_array() as $i) :
          $youtube_id=$i['youtube_id'];
          $youtube_link=$i['youtube_link'];
          $youtube_description=$i['youtube_description'];
          $youtube_author=$i['youtube_author'];
          $youtube_tanggal=$i['youtube_tanggal'];
        ?>

    <div class="modal fade" id="ModalEdit<?php echo $youtube_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                    <h4 class="modal-title" id="myModalLabel">Edit Youtube</h4>
                </div>
                <form class="form-horizontal" action="<?php echo base_url().'admin/youtube/update_youtube'?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" name="kode" value="<?php echo $youtube_id;?>"/>
                        <div class="form-group mb-4">
                            <label for="inpuyoutubelink" class="col-sm-4 control-label">Link Youtube</label>
                            <div class="col-sm-12">
                                <input type="text" name="youtube_link" class="form-control" value="<?php echo $youtube_link;?>" id="inpuyoutubelink" placeholder="Link Youtube" required>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="inputUserName" class="col-sm-4 control-label">Description Youtube</label>
                            <div class="col-sm-12">
                                <input type="text" name="youtube_description" class="form-control" value="<?php echo $youtube_description;?>" id="inputDescription" placeholder="Description Youtube" required>
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
<!--Modal Edit Youtube-->

<!--Modal Hapus Youtube-->
<?php foreach ($data->result_array() as $i) :
          $youtube_id=$i['youtube_id'];
          $youtube_link=$i['youtube_link'];
          $youtube_author=$i['youtube_author'];
          $youtube_tanggal=$i['youtube_tanggal'];
        ?>

    <div class="modal fade" id="ModalHapus<?php echo $youtube_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                    <h4 class="modal-title" id="myModalLabel">Delete Youtube</h4>
                </div>
                <form class="form-horizontal" action="<?php echo base_url().'admin/youtube/hapus_youtube'?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                  <input type="hidden" name="kode" value="<?php echo $youtube_id;?>"/>
                        <p>Are you sure want to delete Youtube Link : <b><?php echo $youtube_link;?></b> ?</p>

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
<!--Modal Hapus Youtube-->

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
                text: "Youtube Berhasil disimpan ke database.",
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
                text: "Youtube berhasil di update",
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
                text: "Youtube Berhasil dihapus.",
                showHideTransition: 'slide',
                icon: 'success',
                hideAfter: false,
                position: 'bottom-right',
                bgColor: '#7EC857'
            });
    </script>
<?php else:?>

<?php endif;?>