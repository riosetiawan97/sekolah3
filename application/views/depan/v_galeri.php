
<!--begin::Toolbar-->
<div class="toolbar" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <!--begin::Page title-->
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <!--begin::Title-->
            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Gallery</h1>
            <!--end::Title-->
            <!--begin::Separator-->
            <span class="h-20px border-gray-200 border-start mx-4"></span>
            <!--end::Separator-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    <a href="<?php echo site_url('');?>" class="text-muted text-hover-primary">Home</a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-200 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">Gallery</li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-200 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-dark">Gallery List</li>
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
  <!--begin::Container-->
  <div id="kt_content_container" class="container-xxl">
<!--begin::Home card-->
    <div class="card">
      <!--begin::Body-->
      <div class="card-body p-lg-20">
        <!--begin::Section-->
        <div class="mb-17">
          <!--begin::Content-->
          <div class="d-flex flex-stack mb-5">
            <!--begin::Title-->
            <h3 class="text-black">Gallery</h3>
            <!--end::Title-->
          </div>
          <!--end::Content-->
          <!--begin::Separator-->
          <div class="separator separator-dashed mb-9"></div>
          <!--end::Separator-->
          <!--begin::Row-->
          <div class="row g-10">
          <?php foreach ($alb->result() as $row) : ?>
            <!--begin::Col-->
            <div class="col-md-4">
              <!--begin::Hot sales post-->
              <div class="card-xl-stretch me-md-6">
                <!--begin::Overlay-->
                <a class="d-block overlay" data-fslightbox="lightbox-hot-sales" href="<?php echo base_url().'galeri/album/'.$row->album_id;?>">
                  <!--begin::Image-->
                  <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px" style="background-image:url('<?php echo base_url().'assets/images/'.$row->album_cover;?>');background-size:cover; "></div>
                  <!--end::Image-->
                  <!--begin::Action-->
                  <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                    <i class="bi bi-eye-fill fs-2x text-white"></i>
                  </div>
                  <!--end::Action-->
                </a>
                <!--end::Overlay-->
                <!--begin::Body-->
                <div class="mt-5">
                  <!--begin::Title-->
                  <a href="<?php echo base_url().'galeri/album/'.$row->album_id;?>" class="fs-4 text-dark fw-bolder text-hover-primary text-dark lh-base"><?php echo $row->album_nama;?></a>
                  <!--end::Title-->
                </div>
                <!--end::Body-->
              </div>
              <!--end::Hot sales post-->
            </div>
            <!--end::Col-->
      <?php endforeach;?>
          </div>
          <!--end::Row-->
        </div>
        <!--end::Section-->
      </div>
      <!--end::Body-->
    </div>
    <!--end::Home card-->
  </div>
  <!--end::Container-->
</div>
<!--end::Post-->