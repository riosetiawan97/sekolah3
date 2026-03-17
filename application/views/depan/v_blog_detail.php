

<!--begin::Toolbar-->
<div class="toolbar" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <!--begin::Page title-->
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <!--begin::Title-->
            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">News List</h1>
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
                <li class="breadcrumb-item text-muted">News</li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-200 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-dark">News Detail</li>
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
        <!--begin::Post card-->
        <div class="card">
            <!--begin::Body-->
            <div class="card-body p-lg-20 pb-lg-0">
                <!--begin::Layout-->
                <div class="d-flex flex-column flex-xl-row">
                    <!--begin::Content-->
                    <div class="flex-lg-row-fluid me-xl-15">
                        <!--begin::Post content-->
                        
                        <div class="mb-17">
                            <!--begin::Wrapper-->
                            <div class="mb-8">
                                <!--begin::Info-->
                                <div class="d-flex flex-wrap mb-6">
                                    <!--begin::Item-->
                                    <div class="me-9 my-1">
                                        <!--begin::Icon-->
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                        <span class="svg-icon svg-icon-primary svg-icon-2 me-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#009ef7" class="bi bi-calendar3" viewBox="0 0 16 16">
                                                <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2M1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857z"/>
                                                <path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                        <!--end::Icon-->
                                        <!--begin::Label-->
                                        <span class="fw-bolder text-dark"><?php echo $tanggal;?></span>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="me-9 my-1">
                                        <!--begin::Icon-->
                                        <span class="svg-icon svg-icon-primary svg-icon-2 me-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<path opacity="0.3" d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM12 7C10.3 7 9 8.3 9 10C9 11.7 10.3 13 12 13C13.7 13 15 11.7 15 10C15 8.3 13.7 7 12 7Z" fill="black" />
																	<path d="M12 22C14.6 22 17 21 18.7 19.4C17.9 16.9 15.2 15 12 15C8.8 15 6.09999 16.9 5.29999 19.4C6.99999 21 9.4 22 12 22Z" fill="black" />
																</svg>
                                        </span>
                                        <!--end::Icon-->
                                        <!--begin::Label-->
                                        <span class="fw-bolder text-dark"> <?php echo $author;?></span>
                                        <!--begin::Label-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="my-1">
                                        <!--begin::Icon-->
                                        <!--begin::Svg Icon | path: icons/duotune/communication/com003.svg-->
                                        <span class="svg-icon svg-icon-primary svg-icon-2 me-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3" d="M2 4V16C2 16.6 2.4 17 3 17H13L16.6 20.6C17.1 21.1 18 20.8 18 20V17H21C21.6 17 22 16.6 22 16V4C22 3.4 21.6 3 21 3H3C2.4 3 2 3.4 2 4Z" fill="black" />
                                                <path d="M18 9H6C5.4 9 5 8.6 5 8C5 7.4 5.4 7 6 7H18C18.6 7 19 7.4 19 8C19 8.6 18.6 9 18 9ZM16 12C16 11.4 15.6 11 15 11H6C5.4 11 5 11.4 5 12C5 12.6 5.4 13 6 13H15C15.6 13 16 12.6 16 12Z" fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                        <!--end::Icon-->
                                        <!--begin::Label-->
                                        <span class="fw-bolder text-dark"><?php echo $kategori;?></span>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Item-->
                                </div>
                                <!--end::Info-->
                                <!--begin::Title-->
                                <a href="<?php echo site_url('artikel/'.$slug);?>" class="text-dark text-hover-primary fs-2 fw-bolder"><?php echo $title_blog;?>
                                <span class="fw-bolder text-muted fs-5 ps-1"></span></a>
                                <!--end::Title-->
                                <!--begin::Container-->
                                <div class="overlay mt-8">
                                    <!--begin::Image-->
                                    <div class="bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-350px" style="background-image:url('<?php echo base_url().'assets/images/'.$image?>')"></div>
                                    <!--end::Image-->
                                </div>
                                <!--end::Container-->
                            </div>
                            <!--end::Wrapper-->
                            <!--begin::Description-->
                            <div class="fs-5 fw-bold text-black">
                                <!--begin::Text-->
                                <p class="mb-8"><?php echo $blog;?></p>
                                <!--end::Text-->
                            </div>
                            <!--end::Description-->
                        </div>
                        <!--end::Post content-->                        
                        <div class="mb-15">
                            
                        <h4 class="text-black mb-7">Comment</h4>
                            <form action="<?php echo site_url('blog/komentar');?>" method="post">
                                <!--begin::Input group-->
                                <div class="row g-9 mb-8">
                                    <!--begin::Col-->
                                    <div class="col-md-6 fv-row">
                                        <label class="required fs-6 fw-bold mb-2">Name</label>
                                        <input type="text" class="form-control form-control-solid" placeholder="Your Name" name="nama" required />
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-md-6 fv-row">
                                        <label class="required fs-6 fw-bold mb-2">Email</label>
                                        <input type="email" class="form-control form-control-solid" placeholder="Your Email" name="email" required />
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="mb-0">
                                <label class="fs-6 fw-bold mb-2">Your Comment</label>
                                    <textarea class="form-control form-control-solid placeholder-gray-600 fw-bolder fs-4 ps-9 pt-7" rows="6" name="komentar" placeholder="Share Your Comment" required></textarea>
                                    <!--begin::Submit-->
                                    <input type="hidden" name="id" value="<?php echo $id;?>" required>
                                    <button type="submit" class="btn btn-primary mt-n20 mb-20 position-relative float-end me-7">Send</button>
                                    <!--end::Submit-->
                                </div>
                                <!--end::Input group-->                            
                            </form>
                            
                            <?php
                                  $colors = array(
                                      'info',
                                      'success',
                                      'danger',
                                      'warning',
                                      'primary',
                                  );
                                  foreach ($show_komentar->result() as $row) :
                                  shuffle($colors);
                                ?>
                                <!--begin::Comment-->
                                <div class="mb-9">
                                    <!--begin::Card-->
                                    <div class="card card-bordered w-100">
                                        <!--begin::Body-->
                                        <div class="card-body">
                                            <!--begin::Wrapper-->
                                            <div class="w-100 d-flex flex-stack mb-8">
                                                <!--begin::Container-->
                                                <div class="d-flex align-items-center f">
                                                    <!--begin::Author-->
                                                    <div class="symbol symbol-50px me-5">
                                                        <div class="symbol-label fs-1 fw-bolder bg-light-<?php echo reset($colors);?> text-<?php echo reset($colors);?>"><?php echo substr($row->komentar_nama,0,1);?></div>
                                                    </div>
                                                    <!--end::Author-->
                                                    <!--begin::Info-->
                                                    <div class="d-flex flex-column fw-bold fs-5 text-gray-600 text-dark">
                                                        <!--begin::Text-->
                                                        <div class="d-flex align-items-center">
                                                            <!--begin::Username-->
                                                            <a href="#" class="text-gray-800 fw-bolder text-hover-primary fs-5 me-3"><?php echo $row->komentar_nama;?></a>
                                                            <!--end::Username-->
                                                        </div>
                                                        <!--end::Text-->
                                                        <!--begin::Date-->
                                                        <span class="text-muted fw-bold fs-6"><?php echo date("d M Y H:i", strtotime($row->komentar_tanggal));?></span>
                                                        <!--end::Date-->
                                                    </div>
                                                    <!--end::Info-->
                                                </div>
                                                <!--end::Container-->
                                            </div>
                                            <!--end::Wrapper-->
                                            <!--begin::Desc-->
                                            <p class="fw-normal fs-5 text-gray-700 m-0"><?php echo $row->komentar_isi;?></p>
                                            <!--end::Desc-->
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                    <!--end::Card-->
                                </div>
                                <!--end::Comment-->
                                <?php
                					            $komentar_id=$row->komentar_id;
                					            $query=$this->db->query("SELECT * FROM tbl_komentar WHERE komentar_status='1' AND komentar_parent='$komentar_id' ORDER BY komentar_id ASC");
                					            foreach ($query->result() as $res) :
                                        shuffle($colors);
                					        ?>
                                            <!--begin::Comment-->
                                            <div class="ms-9 mb-9">
                                                <!--begin::Card-->
                                                <div class="card card-bordered w-100">
                                                    <!--begin::Body-->
                                                    <div class="card-body">
                                                        <!--begin::Wrapper-->
                                                        <div class="w-100 d-flex flex-stack mb-8">
                                                            <!--begin::Container-->
                                                            <div class="d-flex align-items-center f">
                                                                <!--begin::Author-->
                                                                <div class="symbol symbol-50px me-5">
                                                                    <div class="symbol-label fs-1 fw-bolder bg-light-<?php echo reset($colors);?> text-<?php echo reset($colors);?>"><?php echo substr($res->komentar_nama,0,1);?></div>
                                                                </div>
                                                                <!--end::Author-->
                                                                <!--begin::Info-->
                                                                <div class="d-flex flex-column fw-bold fs-5 text-gray-600 text-dark">
                                                                    <!--begin::Text-->
                                                                    <div class="d-flex align-items-center">
                                                                        <!--begin::Username-->
                                                                        <a href="#" class="text-gray-800 fw-bolder text-hover-primary fs-5 me-3"><?php echo $res->komentar_nama;?></a>
                                                                        <!--end::Username-->
                                                                        <span class="m-0"></span>
                                                                    </div>
                                                                    <!--end::Text-->
                                                                    <!--begin::Date-->
                                                                    <span class="text-muted fw-bold fs-6"><?php echo date("d M Y H:i", strtotime($res->komentar_tanggal));?></span>
                                                                    <!--end::Date-->
                                                                </div>
                                                                <!--end::Info-->
                                                            </div>
                                                            <!--end::Container-->
                                                            <!--begin::Actions-->
                                                            <div class="m-0">
                                                                <button class="btn btn-color-gray-400 btn-active-color-primary p-0 fw-bolder"></button>
                                                            </div>
                                                            <!--end::Actions-->
                                                        </div>
                                                        <!--end::Wrapper-->
                                                        <!--begin::Desc-->
                                                        <p class="fw-normal fs-5 text-gray-700 m-0"><?php echo $res->komentar_isi;?></p>
                                                        <!--end::Desc-->
                                                    </div>
                                                    <!--end::Body-->
                                                </div>
                                                <!--end::Card-->
                                            </div>
                                            <!--end::Comment-->
                                <?php endforeach;?>
                                <?php endforeach;?>
                        </div>
                <nav>
                    <?php error_reporting(0); echo $page;?>
                </nav>
                    </div>
                    <!--end::Content-->
                    <!--begin::Sidebar-->
                    <div class="flex-column flex-lg-row-auto w-100 w-xl-300px mb-10">
                        <!--begin::Search blog-->
                        <div class="mb-16">
                            <h4 class="text-black mb-7">Search News</h4>
                            <!--begin::Input group-->
                            <div class="position-relative">
                            <form action="<?php echo site_url('blog/search');?>" method="get">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                <span class="svg-icon svg-icon-3 svg-icon-gray-500 position-absolute top-50 translate-middle ms-6">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                                        <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <input type="text" class="form-control form-control-solid ps-10" name="keyword" value="" placeholder="Search" />
                            </form>
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Search blog-->
                        <!--begin::Catigories-->
                        <div class="mb-16">
                            <h4 class="text-black mb-7">Categories</h4>
                            <!--begin::Item-->
                            <?php foreach ($category->result() as $row) : ?>
                            <div class="d-flex flex-stack fw-bold fs-5 text-black mb-4">
                                <!--begin::Text-->
                                <a href="<?php echo site_url('blog/kategori/'.str_replace(" ","-",$row->kategori_nama));?>" class="text-black text-hover-primary pe-2"><?php echo $row->kategori_nama;?></a>
                                <!--end::Text-->
                                <!--begin::Number-->
                                <div class="m-0"><i class="fa fa-caret-right" aria-hidden="true"></i></div>
                                <!--end::Number-->
                            </div>
                            <?php endforeach;?>
                        </div>
                        <!--end::Catigories-->
                        <!--begin::Recent posts-->
                        <div class="m-0">
                            <h4 class="text-black mb-7">Popular News</h4>
                            <!--begin::Item-->
                            <?php foreach ($populer->result() as $row) :?>
                                <div class="d-flex flex-stack mb-7">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-60px symbol-2by3 me-4">
                                        <div class="symbol-label" style="background-image: url('<?php echo base_url().'assets/images/'.$row->tulisan_gambar;?>')"></div>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Title-->
                                    <div class="m-0">
                                        <a href="<?php echo site_url('artikel/'.$row->tulisan_slug);?>" class="text-dark fw-bolder text-hover-primary fs-6"><?=$this->fungsi->limit_words($row->tulisan_judul,3).'...';?></a>
                                        <span class="text-gray-600 fw-bold d-block pt-1 fs-7"><?=$this->fungsi->limit_words($row->tulisan_isi,5).'...';?></span>
                                    </div>
                                    <!--end::Title-->
                                </div>
                            <?php endforeach;?>
                            <!--end::Item-->
                        </div>
                        <!--end::Recent posts-->
                    </div>
                    <!--end::Sidebar-->
                </div>
                <!--end::Layout-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Post card-->
    </div>
    <!--end::Container-->
</div>
<!--end::Post-->