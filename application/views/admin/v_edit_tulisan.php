<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
	<!--begin::Toolbar-->
	<div class="toolbar" id="kt_toolbar">
		<!--begin::Container-->
		<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
			<!--begin::Page title-->
			<div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
				<!--begin::Title-->
				<h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">List News</h1>
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
                    <li class="breadcrumb-item text-muted">News</li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-200 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-dark">Update News</li>
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
<?php
    $b=$data->row_array();
?>
    <form action="<?php echo base_url().'admin/tulisan/update_tulisan'?>" method="post" enctype="multipart/form-data">
      <div class="row g-5 g-xxl-8">
          <div class="col-xxl-12">
      <!-- Main content -->
              <div class="card card-xxl-stretch mb-xl-8">
                <!--begin::Body-->                                
                <!--begin::Header-->
                <div class="card-header border-0 pt-5">
                  <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">Update News</span>
                  </h3>
                </div>
                <!--end::Header-->
                <div class="card-body py-3">                        
                  <div class="row">
                    <div class="col-md-10">
                    <input type="hidden" name="kode" value="<?php echo $b['tulisan_id'];?>">
                      <input type="text" name="xjudul" class="form-control" value="<?php echo $b['tulisan_judul'];?>" placeholder="Judul berita atau artikel" required/>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-2">
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-flat pull-right"><span class="fa fa-pencil"></span> Update</button>
                      <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                  </div>
                </div>    
              </div>
          </div>
      </div>
      <div class="row g-xxl-8">
          <div class="col-xl-8">
      <!-- Main content -->
              <div class="card card-xxl-stretch mb-xl-8">
                <!--begin::Body-->                                
                <!--begin::Header-->
                <div class="card-header border-0 pt-5">
                  <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">News</span>
                  </h3>
                </div>
                <!--end::Header-->
                <div class="card-body py-3">                        
                  <div class="row">
                    <div class="col-md-12">                      
                      <textarea class="ckeditor" name="xisi" required><?php echo $b['tulisan_isi'];?></textarea>
                    </div>
                  </div>
                </div>    
              </div>
          </div>
          <div class="col-xl-4">
      <!-- Main content -->
              <div class="card card-xxl-stretch mb-xl-8">
                <!--begin::Body-->                                
                <!--begin::Header-->
                <div class="card-header border-0 pt-5">
                  <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">Other Settings</span>
                  </h3>
                </div>
                <!--end::Header-->
                <div class="card-body py-3">                        
                  <div class="row">
                    <div class="col-md-12">                      
                      <div class="form-group mb-4">
                        <label>Category</label>
                        <select class="form-control select2" name="xkategori" style="width: 100%;" required>
                          <option value="">-Pilih-</option>
                            <?php
                            foreach ($kat->result_array() as $i) {
                                          $kategori_id=$i['kategori_id'];
                                          $kategori_nama=$i['kategori_nama'];
                                          if($b['tulisan_kategori_id']==$kategori_id)
                                            echo "<option value='$kategori_id' selected>$kategori_nama</option>";
                                          else
                                            echo "<option value='$kategori_id'>$kategori_nama</option>";
                            }?>
                        </select>
                      </div>                  
                      <div class="form-group mb-4">
                        <label>Picture</label>
                        <input type="file" name="filefoto" style="width: 100%;" required>
                      </div>
                      <div class="form-group mb-4">
                        <label>Slider</label>
                        <br>
                          <label>
                            <input type="checkbox" name="slider" value="1" <?php if($b['tulisan_img_slider']==1)
                                      echo "checked";?>>
                          </label>
                      </div>
                    </div>
                  </div>
                </div>    
              </div>
          </div>
      </div>
    </form>

        </div>
</div>
	<!--end::Post-->
</div>