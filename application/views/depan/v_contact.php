
<!--begin::Toolbar-->
<div class="toolbar" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <!--begin::Page title-->
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <!--begin::Title-->
            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Contact</h1>
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
                <li class="breadcrumb-item text-muted">Contact</li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-200 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-dark">Contact Us</li>
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
											<div class="col-md-6 pe-lg-10">
												<!--begin::Form-->
												<form action="<?php echo site_url('contact/kirim_pesan');?>" class="form mb-15" method="post" id="kt_contact_form">
													<h1 class="fw-bolder text-dark mb-9">Send Us a Messege</h1>
													<!--begin::Input group-->
													<div class="row mb-5">
														<!--begin::Col-->
														<div class="col-md-6 fv-row">
															<!--begin::Label-->
															<label class="fs-5 fw-bold mb-2">Name</label>
															<!--end::Label-->
															<!--begin::Input-->
															<input type="text" class="form-control form-control-solid" placeholder="Name" name="xnama" />
															<!--end::Input-->
														</div>
														<!--end::Col-->
														<!--begin::Col-->
														<div class="col-md-6 fv-row">
															<!--end::Label-->
															<label class="fs-5 fw-bold mb-2">Email</label>
															<!--end::Label-->
															<!--end::Input-->
															<input type="text" class="form-control form-control-solid" placeholder="Email" name="xemail" />
															<!--end::Input-->
														</div>
														<!--end::Col-->
													</div>
													<!--end::Input group-->
													<!--begin::Input group-->
													<div class="d-flex flex-column mb-5 fv-row">
														<!--begin::Label-->
														<label class="fs-5 fw-bold mb-2">Phone</label>
														<!--end::Label-->
														<!--begin::Input-->
														<input class="form-control form-control-solid" placeholder="Phone" name="xphone" />
														<!--end::Input-->
													</div>
													<!--end::Input group-->
													<!--begin::Input group-->
													<div class="d-flex flex-column mb-10 fv-row">
														<label class="fs-6 fw-bold mb-2">Messege</label>
														<textarea class="form-control form-control-solid" rows="6" name="xmessage" placeholder="Messege"></textarea>
													</div>
													<!--end::Input group-->
													<!--begin::Submit-->
													<button type="submit" class="btn btn-primary" id="kt_contact_submit_button">
														<!--begin::Indicator-->
														<span class="indicator-label">Send Feedback</span>
														<span class="indicator-progress">Please wait...
														<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
														<!--end::Indicator-->
													</button>
													<!--end::Submit-->
												</form>
												<!--end::Form-->
											</div>
											<!--end::Col-->
											<!--begin::Col-->
											<div class="col-md-6 ps-lg-10">
                                                <!--begin::Phone-->
                                                <div class="text-center bg-light card-rounded d-flex flex-column justify-content-center p-10 h-lg-100">                                                    
                                                    <!--begin::Icon-->
													<!--begin::Svg Icon | path: icons/duotune/general/gen018.svg-->
													<span class="svg-icon svg-icon-3tx svg-icon-primary">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
															<path opacity="0.3" d="M18.0624 15.3453L13.1624 20.7453C12.5624 21.4453 11.5624 21.4453 10.9624 20.7453L6.06242 15.3453C4.56242 13.6453 3.76242 11.4453 4.06242 8.94534C4.56242 5.34534 7.46242 2.44534 11.0624 2.04534C15.8624 1.54534 19.9624 5.24534 19.9624 9.94534C20.0624 12.0453 19.2624 13.9453 18.0624 15.3453Z" fill="black" />
															<path d="M12.0624 13.0453C13.7193 13.0453 15.0624 11.7022 15.0624 10.0453C15.0624 8.38849 13.7193 7.04535 12.0624 7.04535C10.4056 7.04535 9.06241 8.38849 9.06241 10.0453C9.06241 11.7022 10.4056 13.0453 12.0624 13.0453Z" fill="black" />
														</svg>
													</span>
													<!--end::Svg Icon-->
													<!--end::Icon-->
													<!--begin::Subtitle-->
													<h1 class="text-dark fw-bolder my-5">Our Address</h1>
													<!--end::Subtitle-->
													<!--begin::Description-->
													<div class="text-gray-700 fs-3 fw-bold mb-3"><?php echo $setup->alamat;?></div>
													<!--end::Description-->
                                                    <!--begin::Icon-->
													<!--begin::Svg Icon | path: icons/duotune/general/gen018.svg-->
													<span class="svg-icon svg-icon-3tx svg-icon-primary">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#009ef7" class="bi bi-envelope" viewBox="0 0 16 16">
                                                            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z"/>
                                                        </svg>
													</span>
													<!--end::Svg Icon-->
													<!--end::Icon-->
													<!--begin::Subtitle-->
													<h1 class="text-dark fw-bolder my-5">Email</h1>
													<!--end::Subtitle-->
													<!--begin::Description-->
													<div class="text-gray-700 fs-3 fw-bold mb-3"><?php echo $setup->email;?></div>
													<!--end::Description-->
                                                    <!--begin::Icon-->
													<!--begin::Svg Icon | path: icons/duotune/general/gen018.svg-->
													<span class="svg-icon svg-icon-3tx svg-icon-primary">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#009ef7" class="bi bi-telephone" viewBox="0 0 16 16">
                                                            <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"/>
                                                        </svg>
													</span>
													<!--end::Svg Icon-->
													<!--end::Icon-->
                                                    <!--begin::Subtitle-->
                                                    <h1 class="text-dark fw-bolder my-5">Phone</h1>
                                                    <!--end::Subtitle-->
                                                    <!--begin::Number-->
                                                    <div class="text-gray-700 fw-bold fs-2 mb-3"><?php echo $setup->telepon;?></div>
                                                    <!--end::Number-->
                                                </div>
                                                <!--end::Phone-->
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