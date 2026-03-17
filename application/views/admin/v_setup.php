<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
	<!--begin::Toolbar-->
	<div class="toolbar" id="kt_toolbar">
		<!--begin::Container-->
		<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
			<!--begin::Page title-->
			<div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
				<!--begin::Title-->
				<h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Setup</h1>
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
                    <li class="breadcrumb-item text-dark">Edit Setup</li>
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
<!-- Main content -->
<section class="content">

  <!-- SELECT2 EXAMPLE -->
  <div class="box box-default">
    <div class="box-header with-border mb-4">
      <h3 class="box-title">Update Setup</h3>
    </div>
<?php
    $b=$data->row_array();
?>
<form action="<?php echo base_url().'admin/setup/update_setup'?>" method="post" enctype="multipart/form-data">

    <!-- /.box-header -->
    <div class="box-body">
      <div class="form-group mb-4">
        <label>Logo</label>
        <input type="file" name="logo" style="width: 100%;">
      </div>
      <input type="hidden" name="id" value="<?php echo $b['id'];?>">
      <div class="form-group mb-4">
        <label>School Name</label>
        <input type="text" name="nama_sekolah" class="form-control" value="<?php echo $b['nama_sekolah'];?>" placeholder="School Name" required/>
      </div>
      <div class="form-group mb-4">
        <label>Sub District</label>
        <input type="text" name="kecamatan" class="form-control" value="<?php echo $b['kecamatan'];?>" placeholder="Sub District" required/>
      </div>
      <div class="form-group mb-4">
        <label>City</label>
        <input type="text" name="kota" class="form-control" value="<?php echo $b['kota'];?>" placeholder="City" required/>
      </div>
      <div class="form-group mb-4">
        <label>Address</label>
        <input type="text" name="alamat" class="form-control" value="<?php echo $b['alamat'];?>" placeholder="Address" required/>
      </div>
      <div class="form-group mb-4">
        <label>Phone</label>
        <input type="text" name="telepon" class="form-control" value="<?php echo $b['telepon'];?>" placeholder="Phone" required/>
      </div>
      <div class="form-group mb-4">
        <label>Email</label>
        <input type="text" name="email" class="form-control" value="<?php echo $b['email'];?>" placeholder="Email" required/>
      </div>
      <div class="form-group mb-4">
        <label>Facebook</label>
        <input type="text" name="facebook" class="form-control" value="<?php echo $b['facebook'];?>" placeholder="Facebook" required/>
      </div>
      <div class="form-group mb-4">
        <label>Google Maps</label>
        <input type="text" name="gmaps" class="form-control" value="<?php echo $b['gmaps'];?>" placeholder="Google Maps" required/>
      </div>
      <div class="form-group mb-4">
        <label>Whatsapp</label>
        <input type="text" name="whatsapp" class="form-control" value="<?php echo $b['whatsapp'];?>" placeholder="Whatsapp" required/>
      </div>
      <div class="form-group mb-4">
        <label>Instagram</label>
        <input type="text" name="instagram" class="form-control" value="<?php echo $b['instagram'];?>" placeholder="Instagram" required/>
      </div>
      <div class="form-group mb-4">
        <label>Title Website</label>
        <input type="text" name="judul_website" class="form-control" value="<?php echo $b['judul_website'];?>" placeholder="Title Website" required/>
      </div>
    <!-- /.box-body -->
    </div>
    <div class="modal-footer">
      <div class="form-group mb-4">
        <button type="submit" class="btn btn-primary btn-flat pull-right"><span class="fa fa-pencil"></span> Update</button>
      <!-- /.form-group mb-4 -->
      </div>
    </div>
  </div>
  <!-- /.box -->
</section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<!--end::Post-->
</div>