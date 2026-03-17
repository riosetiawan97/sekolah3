<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
	<!--begin::Toolbar-->
	<div class="toolbar" id="kt_toolbar">
		<!--begin::Container-->
		<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
			<!--begin::Page title-->
			<div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
				<!--begin::Title-->
				<h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Student Attendance</h1>
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
                    <li class="breadcrumb-item text-muted">Student Attendance</li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-200 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-dark">List Student Attendance</li>
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
              <table id="example1" class="table table-striped" style="font-size:12px;">
                <div class="row">			
					<form action="<?php echo site_url('admin/siswa/absen');?>" method="post">
						<div class="col-md-6">
							<div class="form-group">
								<label>Date Range</label>
								<div class="input-group">
								  <div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								  </div>
								  <input type="text" class="form-control pull-right" id="reservation" name="date_range" value="<?php echo $default_start_date.' - '.$default_end_date;?>">
								</div>
							</div>							
						</div>
						<div class="col-md-4">						
							<label>Submit</label>
							<div class="input-group date">
								<button type="submit" class="btn btn-primary btn-submit">Submit</button>
							</div>
						</div>
					</form>					
				</div>
                <thead>
                <tr>
					<th style="width:70px;">#Date</th>
                    <th>Time</th>
                    <th>Name</th>
                    <th>Class</th>
                    <th>Major</th>
                    <th style="text-align:right;">Action</th>
                </tr>
                </thead>
                <tbody>
				<?php
					$no=0;
  					foreach ($data->result_array() as $i) :
  					   $no++;
                  $id=$i['id'];
                  $nama=$i['nama'];
                  $tanggal=$i['tanggal'];
                  $waktu=$i['waktu'];
                  $kelas=$i['kelas'];
                  $jurusan=$i['jurusan'];
              ?>
                <tr>
                  <td><?php echo date_format(date_create($tanggal),"d/m/Y");?></td>
                  <td><?php echo date_format(date_create($waktu),"H:i:s");?></td>
                  <td><?php echo $nama;?></td>
                  <td><?php echo $kelas;?></td>
                  <td><?php echo $jurusan;?></td>
                  <td style="text-align:right;">
                    <a class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#ModalHapus<?php echo $id;?>">
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

<?php foreach ($data->result_array() as $i) :
  $id=$i['id'];
  $nama=$i['nama'];
  $tanggal=$i['tanggal'];
  $waktu=$i['waktu'];
  $kelas=$i['kelas'];
?>
<!--Modal Hapus Pengguna-->
<div class="modal fade" id="ModalHapus<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
              <h4 class="modal-title" id="myModalLabel">Delete Student Attendance</h4>
            </div>
            <form class="form-horizontal" action="<?php echo base_url().'admin/siswa/hapus_absen'?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">
              <input type="hidden" name="id" value="<?php echo $id;?>"/>
                    <p>Are you sure want to delete ?</p>

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


<!-- page script -->
<script>
/*   $(function () {
    $("#example1").DataTable(  {
    buttons: [
        {
            extend: 'excel',
            text: 'Save current page',
            exportOptions: {
                modifier: {
                    page: 'current'
                }
            }
        }
    ]
} );
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    }); */

    $('#datepicker').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
    $('#datepicker2').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
    $('.datepicker3').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
    $('.datepicker4').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
    $(".timepicker").timepicker({
      showInputs: true
    });

  /*});*/
</script>
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
                    text: "Pesan Berhasil dihapus.",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#7EC857'
                });
        </script>
    <?php else:?>

    <?php endif;?>
