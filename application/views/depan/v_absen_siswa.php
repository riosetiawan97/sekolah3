
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
                    <a href="<?php echo site_url('');?>" class="text-muted text-hover-primary">Home</a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-200 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-dark">Student Attendance</li>
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
								<!--begin::Contact-->
								<div class="card">
									<!--begin::Body-->
									<div class="card-body p-lg-17">
										<!--begin::Row-->
										<div class="row mb-3">
											<!--begin::Col-->
											<div class="col-md-12 pe-lg-10">
												<!--begin::Form-->
                                                    <form action="<?php echo site_url('siswa/simpan_absen_siswa');?>" class="form mb-15" method="post" id="kt_contact_form">
                                                        <h1 class="fw-bolder text-dark mb-9">Student Attendance</h1>
                                                        <!--begin::Input group-->
                                                        <div class="d-flex flex-column mb-5 fv-row">
                                                            <!--begin::Label-->
                                                            <label class="fs-5 fw-bold mb-2">Name</label>
                                                            <!--end::Label-->
                                                            <!--begin::Input-->
                                                            <input class="form-control form-control-solid" placeholder="Name" name="nama" required/>
                                                            <!--end::Input-->
                                                        </div>
                                                        <!--end::Input group-->
                                                        <!--begin::Input group-->
                                                        <div class="d-flex flex-column mb-5 fv-row">
                                                            <!--begin::Label-->
                                                            <label class="fs-5 fw-bold mb-2">Class</label>
                                                            <!--end::Label-->
                                                            <!--begin::Input-->
                                                            <input class="form-control form-control-solid" placeholder="Class" name="kelas" required/>
                                                            <!--end::Input-->
                                                        </div>
                                                        <!--end::Input group-->                                                        
                                                        <!--begin::Submit-->
                                                        <button type="submit" class="btn btn-primary" id="kt_contact_submit_button">
                                                            <!--begin::Indicator-->
                                                            <span class="indicator-label">Submit</span>
                                                            <span class="indicator-progress">Please wait...
                                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                            <!--end::Indicator-->
                                                        </button>
                                                        <!--end::Submit-->
                                                        <br>
                                                        <div><?php echo $this->session->flashdata('msg');?></div>
                                                        <!-- // end #js-contact-result -->
                                                    </form>
                                                <!--end::Form-->
											</div>
											<!--end::Col-->
										</div>
										<!--end::Row-->
									</div>
									<!--end::Body-->
								</div>
								<!--end::Contact-->
    </div>
    <!--end::Container-->
</div>
<!--end::Post-->