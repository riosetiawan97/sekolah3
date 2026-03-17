
<!--begin::Toolbar-->
<div class="toolbar" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <!--begin::Page title-->
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <!--begin::Title-->
            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">PPDB</h1>
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
                <li class="breadcrumb-item text-muted">PPDB</li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-200 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-dark">How To Apply</li>
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
        <!--begin::FAQ card-->
        <div class="card">
            <!--begin::Body-->
            <div class="card-body p-lg-15">
                <!--begin::Layout-->
                <div class="d-flex flex-column flex-lg-row">
                    <!--begin::Sidebar-->
                    <div class="flex-column flex-lg-row-auto w-100 w-lg-275px mb-10 me-lg-20">
                        <!--begin::Catigories-->
                        <div class="mb-15">
                            <h4 class="text-black mb-7">PPDB</h4>
                            <!--begin::Menu-->
                            <div class="menu menu-rounded menu-column menu-title-gray-700 menu-state-title-primary menu-active-bg-light-primary fw-bold">
                                <!--begin::Item-->
                                <div class="menu-item mb-1">
                                    <!--begin::Link-->
                                    <a href="<?php echo site_url('alur_pendaftaran');?>" class="menu-link py-3 active">How To Apply</a>
                                    <!--end::Link-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <div class="menu-item mb-1">
                                    <!--begin::Link-->
                                    <a href="<?php echo $setup->formpendaftaran;?>" class="menu-link py-3">Addmission</a>
                                    <!--end::Link-->
                                </div>
                                <!--end::Item-->
                            </div>
                            <!--end::Menu-->
                        </div>
                        <!--end::Catigories-->
                    </div>
                    <!--end::Sidebar-->
                    <!--begin::Content-->
                    <div class="flex-lg-row-fluid">
                        <!--begin::Extended content-->
                        <div class="mb-13">
                            <!--begin::Content-->
                            <div class="mb-15">														
                                <section class="welcome_about">
                                    <div class="container">
                                      <!--begin::Row-->
                                      <div class="row g-10">
                                        <!--begin::Col-->
                                        <div class="col-lg-6">
                                          <!--begin::Item-->
                                          <a class="d-block card-rounded overlay" data-magnify="gallery" data-caption="<?php echo $brosur->type;?>" data-fslightbox="lightbox-projects" href="<?php echo base_url().'assets/images/'.$brosur->brosur_gambar;?>">
                                            <!--begin::Image-->
                                            <img src="<?php echo base_url().'assets/images/'.$brosur->brosur_gambar;?>" class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded mw-100" alt="" />                                            
                                            <!--end::Image-->
                                            <!--begin::Action-->
                                            <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                              <i class="bi bi-eye-fill fs-3x text-white"></i>
                                            </div>
                                            <!--end::Action-->
                                          </a>
                                          <!--end::Item-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-lg-6">
                                          <!--begin::Item-->
                                          <a class="d-block card-rounded overlay" data-magnify="gallery" data-caption="Alur Pendaftaran" data-fslightbox="lightbox-projects" href="<?php echo base_url().'assets/images/'.$setup->alurpendaftaran;?>">
                                            <!--begin::Image-->
                                            <img src="<?php echo base_url().'assets/images/'.$setup->alurpendaftaran;?>" class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded mw-100" alt="" />
                                            <!--end::Image-->
                                            <!--begin::Action-->
                                            <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                              <i class="bi bi-eye-fill fs-3x text-white"></i>
                                            </div>
                                            <!--end::Action-->
                                          </a>
                                          <!--end::Item-->
                                        </div>
                                        <!--end::Col-->
                                      </div>
                                      <!--end::Row-->
                                </section>
                            </div>
                            <!--end::Content-->
                        </div>
                        <!--end::Extended content-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Layout-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::FAQ card-->
    </div>
    <!--end::Container-->
</div>
<!--end::Post-->