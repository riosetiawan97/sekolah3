<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: Metronic - Bootstrap 5 HTML, VueJS, React, Angular & Laravel Admin Dashboard Theme
Purchase: https://1.envato.market/EA4JP
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">
	<!--begin::Head-->
	<head><base href="../">
    	<title><?php echo $title ?></title>
		<meta name="description" content="SMP Islam Al-Hadiriyah adalah SMP Islam di Duren Sawit, Jakarta Timur" />
		<meta name="keywords" content="SMP Islam Al-Hadiriyah adalah SMP Islam di Duren Sawit, Jakarta Timur" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta charset="utf-8" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="SMP Islam Al-Hadiriyah" />
		<meta property="og:url" content="https://keenthemes.com/metronic" />
		<meta property="og:site_name" content="Keenthemes | Metronic" />
		<link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
		<link rel="shortcut icon" href="<?php echo base_url().'assets/images/'.$setup->logo;?>">
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Page Vendor Stylesheets(used by this page)-->
		<link href="<?php echo base_url().'assets/metronic/plugins/custom/fullcalendar/fullcalendar.bundle.css'?>" rel="stylesheet" type="text/css" />
		<!--end::Page Vendor Stylesheets-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="<?php echo base_url().'assets/metronic/plugins/global/plugins.bundle.css'?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url().'assets/metronic/css/style.bundle.css'?>" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
		<link href="<?php echo base_url().'theme/css/jquery.magnify.css'?>" rel="stylesheet">
		<link href="<?php echo base_url().'theme/css/magnify-white-theme.css'?>" rel="stylesheet">
		<style>
* {
  box-sizing: border-box;
}

img {
  vertical-align: middle;
}

/* Position the image container (needed to position the left and right arrows) */
.container {
  position: relative;
}

/* Hide the images by default */
.mySlides {
  display: none;
}

/* Add a pointer when hovering over the thumbnail images */
.cursor {
  cursor: pointer;
}

/* Next & previous buttons */
.prev,
.next {
  cursor: pointer;
  position: absolute;
  top: 40%;
  width: auto;
  padding: 16px;
  margin-top: -50px;
  color: white;
  font-weight: bold;
  font-size: 20px;
  border-radius: 0 3px 3px 0;
  user-select: none;
  -webkit-user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover,
.next:hover {
  background-color: rgba(0, 0, 0, 0.8);
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* Container for image text */
.caption-container {
  text-align: center;
  background-color: #222;
  padding: 2px 16px;
  color: white;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Six columns side by side */
.column {
  float: left;
  width: 16.66%;
}

/* Add a transparency effect for thumnbail images */
.demo {
  opacity: 0.6;
}

.active,
.demo:hover {
  opacity: 1;
}
.imgslide {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
  max-height:50%;
}
*{
	margin:0;
	padding:0;
}


h1{
	text-align:center;
	margin-bottom:20px;
}

#container{
	width:80%;
	margin:40px auto;
}

p{
	margin:0;
	padding:0 35px 0 0;
}

#slider{
	width:100%;
	height:100%;
	position:relative;
	/* overflow:hidden; */
	float:left;
	padding:0;
	border:#666 solid 2px;
	border-radius:5px;
}

#slider img{
	width:100%;
	height:100%;
}

.img1, .img2, .img3, .img4, .img5 {
	width:100%;
	margin:0;
	padding:0;
} 


.slide{
	position:absolute;
	width:100%;
	height:100%;
}
.slide:nth-child(1){
	background:#ce6868;
}

.slide:nth-child(2){
	background:#9ab6b6;
}

.slide:nth-child(3){
	background:#98cc98;
}

.slide:nth-child(4){
	background:#e7b892;
}

.slide:nth-child(5){
	background:#c4ad43;
}


.slide-copy{
	position:absolute;
	top:100%;
	left:0;
	padding:10px 20px 20px 20px;
	background:7f7f7f;
	background: rgba(0,0,0,0.5);
	width:100%;
	max-height:40px;
}

#prev, #next{
	cursor:pointer;
	z-index:100;
	background:#666;
	height:50px;
	width:50px;
	display:inline-block;
	position:relative;
	top:250px;
	margin:0;
	padding:0;
	opacity:0.7;
	filter: alpha(opacity=70);
}

#next{
	float:right;
	right:0px;
}

#prev{
	float:left;
	left:0;
}

.arrow-right {
	width: 0; 
	height: 0; 
	border-top: 15px solid transparent;
	border-bottom: 15px solid transparent;	
	border-left: 15px solid #fff;
	position:relative;
	top:20%;
	right:-40%;
}

.arrow-left {
	width: 0; 
	height: 0; 
	border-top: 15px solid transparent;
	border-bottom: 15px solid transparent;	
	border-right:15px solid #fff; 
	position:relative;
	top:20%;
	left:30%;
}
</style>
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="page d-flex flex-row flex-column-fluid">
				<!--begin::Wrapper-->
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
					<!--begin::Header-->
					<div id="kt_header" style="" class="header align-items-stretch">
						<!--begin::Container-->
						<div class="container-xxl d-flex align-items-stretch justify-content-between">
							<!--begin::Aside mobile toggle-->
							<!--end::Aside mobile toggle-->
							<!--begin::Logo-->
							<div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0 me-lg-15">
								<a href="<?php echo site_url('');?>">
									<img alt="Logo" src="<?php echo base_url().'assets/images/'.$setup->logo;?>" class="h-20px h-lg-30px" />
                                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1 py-3 px-4 px-xxl-6">  <?php echo $setup->nama_sekolah;?>
								</a>
							</div>
							<!--end::Logo-->
							<!--begin::Wrapper-->
							<div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
								<!--begin::Navbar-->
								<div class="d-flex align-items-stretch" id="kt_header_nav">
									<!--begin::Menu wrapper-->
									<div class="header-menu align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="header-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_header_menu_mobile_toggle" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">
										<!--begin::Menu-->
										<div class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch" id="#kt_header_menu" data-kt-menu="true">
											<div class="menu-item me-lg-1">
												<a class="menu-link py-3" href="<?php echo site_url('');?>">
													<span class="menu-title">Home</span>
												</a>
											</div>
											<div data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start" class="menu-item me-lg-1">
												<span class="menu-link py-3">
													<span class="menu-title">About</span>
													<span class="menu-arrow d-lg-none"></span>
												</span>
												<div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px">
													<div class="menu-item">
														<a class="menu-link py-3" href="<?php echo site_url('about');?>" title="About Us" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
															<span class="menu-bullet">
																<span class="bullet bullet-dot"></span>
															</span>
															<span class="menu-title">About Us</span>
														</a>
													</div>
													<div class="menu-item">
														<a class="menu-link py-3" href="<?php echo site_url('visi_misi');?>" title="Vision & Mision" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
															<span class="menu-bullet">
																<span class="bullet bullet-dot"></span>
															</span>
															<span class="menu-title">Vision & Mision</span>
														</a>
													</div>
												</div>
											</div>
											<div class="menu-item me-lg-1">
												<a class="menu-link py-3" href="<?php echo site_url('blog');?>">
													<span class="menu-title">News</span>
												</a>
											</div>
											<div class="menu-item me-lg-1">
												<a class="menu-link py-3" href="<?php echo site_url('faq');?>">
													<span class="menu-title">FAQ</span>
												</a>
											</div>
											<div class="menu-item me-lg-1">
												<a class="menu-link py-3" href="<?php echo site_url('agenda');?>">
													<span class="menu-title">Event</span>
												</a>
											</div>
											<div class="menu-item me-lg-1">
												<a class="menu-link py-3" href="<?php echo site_url('galeri');?>">
													<span class="menu-title">Gallery</span>
												</a>
											</div>
											<div class="menu-item me-lg-1">
												<a class="menu-link py-3" href="<?php echo site_url('contact');?>">
													<span class="menu-title">Contact Us</span>
												</a>
											</div>
											<div class="menu-item me-lg-1">
												<a class="menu-link py-3" href="<?php echo site_url('siswa');?>">
													<span class="menu-title">Student Attendance</span>
												</a>
											</div>
											<div data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start" class="menu-item menu-lg-down-accordion me-lg-1">
												<span class="menu-link py-3">
													<span class="menu-title">PPDB</span>
													<span class="menu-arrow d-lg-none"></span>
												</span>
												<div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px">
													<div class="menu-item">
														<a class="menu-link py-3" href="<?php echo site_url('alur_pendaftaran');?>" title="How To Apply" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
															<span class="menu-icon">
																<!--begin::Svg Icon | path: /icons/duotune/general/gen002.svg-->
																<span class="svg-icon svg-icon-2">
																	<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bezier2" viewBox="0 0 16 16">
																		<path fill-rule="evenodd" d="M1 2.5A1.5 1.5 0 0 1 2.5 1h1A1.5 1.5 0 0 1 5 2.5h4.134a1 1 0 1 1 0 1h-2.01q.269.27.484.605C8.246 5.097 8.5 6.459 8.5 8c0 1.993.257 3.092.713 3.7.356.476.895.721 1.787.784A1.5 1.5 0 0 1 12.5 11h1a1.5 1.5 0 0 1 1.5 1.5v1a1.5 1.5 0 0 1-1.5 1.5h-1a1.5 1.5 0 0 1-1.5-1.5H6.866a1 1 0 1 1 0-1h1.711a3 3 0 0 1-.165-.2C7.743 11.407 7.5 10.007 7.5 8c0-1.46-.246-2.597-.733-3.355-.39-.605-.952-1-1.767-1.112A1.5 1.5 0 0 1 3.5 5h-1A1.5 1.5 0 0 1 1 3.5zM2.5 2a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm10 10a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5z"/>
																	</svg>
																</span>
																<!--end::Svg Icon-->
															</span>
															<span class="menu-title">How To Apply</span>
														</a>
													</div>
													<div class="menu-item">
														<a class="menu-link py-3" href="<?php echo $setup->formpendaftaran;?>" title="Addmission" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
															<span class="menu-icon">
																<!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->
																<span class="svg-icon svg-icon-2">
																	<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark" viewBox="0 0 16 16">
																		<path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5z"/>
																	</svg>
																</span>
																<!--end::Svg Icon-->
															</span>
															<span class="menu-title">Addmission</span>
														</a>
													</div>
												</div>
											</div>
										</div>
										<!--end::Menu-->
									</div>
									<!--end::Menu wrapper-->
								</div>
								<!--end::Navbar-->
								<!--begin::Topbar-->
								<div class="d-flex align-items-stretch flex-shrink-0">
									<!--begin::Toolbar wrapper-->
									<div class="d-flex align-items-stretch flex-shrink-0">
										<!--begin::Heaeder menu toggle-->
										<div class="d-flex align-items-center d-lg-none ms-2 me-n3" title="Show header menu">
											<div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px" id="kt_header_menu_mobile_toggle">
												<!--begin::Svg Icon | path: icons/duotune/text/txt001.svg-->
												<span class="svg-icon svg-icon-1">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<path d="M13 11H3C2.4 11 2 10.6 2 10V9C2 8.4 2.4 8 3 8H13C13.6 8 14 8.4 14 9V10C14 10.6 13.6 11 13 11ZM22 5V4C22 3.4 21.6 3 21 3H3C2.4 3 2 3.4 2 4V5C2 5.6 2.4 6 3 6H21C21.6 6 22 5.6 22 5Z" fill="black" />
														<path opacity="0.3" d="M21 16H3C2.4 16 2 15.6 2 15V14C2 13.4 2.4 13 3 13H21C21.6 13 22 13.4 22 14V15C22 15.6 21.6 16 21 16ZM14 20V19C14 18.4 13.6 18 13 18H3C2.4 18 2 18.4 2 19V20C2 20.6 2.4 21 3 21H13C13.6 21 14 20.6 14 20Z" fill="black" />
													</svg>
												</span>
												<!--end::Svg Icon-->
											</div>
										</div>
										<!--end::Heaeder menu toggle-->
									</div>
									<!--end::Toolbar wrapper-->
								</div>
								<!--end::Topbar-->
							</div>
							<!--end::Wrapper-->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Header-->
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<?php echo $contents ?>
					</div>
					<!--end::Content-->
                    
			<!--begin::Footer Section-->
			<div class="mb-0">
				<!--begin::Curve top-->
				<div class="landing-curve landing-dark-color">
					<svg viewBox="15 -1 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M1 48C4.93573 47.6644 8.85984 47.3311 12.7725 47H1489.16C1493.1 47.3311 1497.04 47.6644 1501 48V47H1489.16C914.668 -1.34764 587.282 -1.61174 12.7725 47H1V48Z" fill="currentColor"></path>
					</svg>
				</div>
				<!--end::Curve top-->
				<!--begin::Wrapper-->
				<div class="landing-dark-bg pt-20">
					<!--begin::Container-->
					<div class="container">
						<!--begin::Row-->
						<div class="row py-10 py-lg-20">
							<!--begin::Col-->
							<div class="col-lg-3 pe-lg-16 mb-10 mb-lg-0">
								<!--begin::Block-->									
                                <a href="<?php echo site_url();?>">
                                    <img src="<?php echo base_url().'assets/images/'.$setup->logo;?>" class="img-fluid h-md-200px" alt="footer_logo">
                                </a>
								<!--end::Block-->
							</div>
							<!--end::Col-->
							<!--begin::Col-->
							<div class="col-lg-9 ps-lg-16">
								<!--begin::Navs-->
								<div class="d-flex justify-content-center">
									<!--begin::Links-->
									<div class="d-flex fw-bold flex-column me-20">
										<!--begin::Subtitle-->
										<h4 class="fw-bolder text-gray-400 mb-6">Main Menu</h4>
										<!--end::Subtitle-->
										<!--begin::Link-->
										<a href="<?php echo site_url('');?>" class="text-white opacity-50 text-hover-primary fs-5 mb-6">Home</a>
										<!--end::Link-->
										<!--begin::Link-->
										<a href="<?php echo site_url('about');?>" class="text-white opacity-50 text-hover-primary fs-5 mb-6">About Us</a>
										<!--end::Link-->
										<!--begin::Link-->
										<a href="<?php echo site_url('visi_misi');?>" class="text-white opacity-50 text-hover-primary fs-5 mb-6">Vision & Mision</a>
										<!--end::Link-->
										<!--begin::Link-->
										<a href="<?php echo site_url('blog');?>" class="text-white opacity-50 text-hover-primary fs-5 mb-6">News</a>
										<!--end::Link-->
										<!--begin::Link-->
										<a href="<?php echo site_url('faq');?>" class="text-white opacity-50 text-hover-primary fs-5 mb-6">FAQ</a>
										<!--end::Link-->
										<!--begin::Link-->
										<a href="<?php echo site_url('agenda');?>" class="text-white opacity-50 text-hover-primary fs-5">Event</a>
										<!--end::Link-->
									</div>
									<!--end::Links-->
									<!--begin::Links-->
									<div class="d-flex fw-bold flex-column me-20">
										<!--begin::Subtitle-->
										<h4 class="fw-bolder text-gray-400 mb-12"></h4>
										<!--end::Subtitle-->
										<!--begin::Link-->
										<a href="<?php echo site_url('galeri');?>" class="text-white opacity-50 text-hover-primary fs-5 mb-6">Gallery</a>
										<!--end::Link-->
										<!--begin::Link-->
										<a href="<?php echo site_url('contact');?>" class="text-white opacity-50 text-hover-primary fs-5 mb-6">Contact Us</a>
										<!--end::Link-->
										<!--begin::Link-->
										<a href="<?php echo site_url('alur_pendaftaran');?>" class="text-white opacity-50 text-hover-primary fs-5 mb-6">How To Apply</a>
										<!--end::Link-->
										<!--begin::Link-->
										<a href="<?php echo $setup->formpendaftaran;?>" class="text-white opacity-50 text-hover-primary fs-5 mb-6">Addmission</a>
										<!--end::Link-->
									</div>
									<!--end::Links-->
									<!--begin::Links-->
									<div class="d-flex fw-bold flex-column ms-lg-20">
										<!--begin::Subtitle-->
										<h4 class="fw-bolder text-gray-400 mb-6">Stay Connected</h4>
										<!--end::Subtitle-->
										<!--begin::Link-->
										<a href="<?php echo $setup->formpendaftaran;?>" target="_blank" class="mb-6">
											<img src="<?php echo base_url().'assets/metronic/media/svg/files/pdf.svg'?>" class="h-20px me-2" alt="" />
											<span class="text-white opacity-50 text-hover-primary fs-5 mb-6">Addmission</span>
										</a>
										<!--end::Link-->
										<!--begin::Link-->
										<a href="https://wa.me/<?php echo (substr($setup->whatsapp,0,1)=='0') ? '62'.substr($setup->whatsapp,1) : $setup->whatsapp ;?>" target="_blank" class="mb-6">
											<img src="<?php echo base_url().'assets/metronic/media/svg/brand-logos/WhatsApp.svg.webp'?>" class="h-20px me-2" alt="" />
											<span class="text-white opacity-50 text-hover-primary fs-5 mb-6">WhatsApp</span>
										</a>
										<!--end::Link-->
										<!--begin::Link-->
										<a href="https://www.instagram.com/" target="_blank" class="mb-6">
											<img src="<?php echo base_url().'assets/metronic/media/svg/brand-logos/instagram-2-1.svg'?>" class="h-20px me-2" alt="" />
											<span class="text-white opacity-50 text-hover-primary fs-5 mb-6">Instagram</span>
										</a>
										<!--end::Link-->
									</div>
									<!--end::Links-->
								</div>
								<!--end::Navs-->
							</div>
							<!--end::Col-->
						</div>
						<!--end::Row-->
					</div>
					<!--end::Container-->
					<!--begin::Separator-->
					<div class="landing-dark-separator"></div>
					<!--end::Separator-->
					<!--begin::Container-->
					<div class="container">
						<!--begin::Wrapper-->
						<div class="d-flex flex-column flex-md-row flex-stack py-7 py-lg-10">
							<!--begin::Copyright-->
							<div class="d-flex align-items-center order-2 order-md-1">
								<!--begin::Logo image-->
								<span class="mx-5 fs-6 fw-bold text-gray-600 pt-1" href="<?php echo site_url('');?>"><?php echo date('Y');?> © copyright by <?php echo $setup->nama_sekolah;?>. All rights reserved.</span>
								<!--end::Logo image-->
							</div>
							<!--end::Copyright-->
						</div>
						<!--end::Wrapper-->
					</div>
					<!--end::Container-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Footer Section-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Root-->
		<!--begin::Drawers-->
		<!--begin::Exolore drawer toggle-->
		<a href="<?php echo $setup->formpendaftaran;?>" target="_blank" class="explore-toggle btn btn-sm bg-body btn-color-gray-700 btn-active-primary shadow-sm position-fixed px-5 fw-bolder zindex-2 mt-10 end-0 fs-6 rounded-left-0" title="Addmission" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="hover" style="top: 42%!important;">
			<img src="<?php echo base_url().'assets/metronic/media/svg/files/pdf.svg'?>" class="h-30px" alt="" />
		</a>
		<!--end::Exolore drawer toggle-->
		<!--begin::Exolore drawer toggle-->
		<a href="https://wa.me/<?php echo (substr($setup->whatsapp,0,1)=='0') ? '62'.substr($setup->whatsapp,1) : $setup->whatsapp ;?>" target="_blank" class="explore-toggle btn btn-sm bg-body btn-color-gray-700 btn-active-primary shadow-sm position-fixed px-5 fw-bolder zindex-2 mt-10 end-0 fs-6 rounded-left-0" title="WhatsApp" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="hover" style="top: 50%!important;">
			<img src="<?php echo base_url().'assets/metronic/media/svg/brand-logos/WhatsApp.svg.webp'?>" class="h-30px" alt="" />			
		</a>
		<!--end::Exolore drawer toggle-->
		<!--begin::Exolore drawer toggle-->
		<a href="https://www.instagram.com/" target="_blank" class="explore-toggle btn btn-sm bg-body btn-color-gray-700 btn-active-primary shadow-sm position-fixed px-5 fw-bolder zindex-2 mt-10 end-0 fs-6 rounded-left-0" title="Instagram" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="hover" style="top: 58%!important;">
			<img src="<?php echo base_url().'assets/metronic/media/svg/brand-logos/instagram-2-1.svg'?>" class="h-30px" alt="" />
		</a>
		<!--end::Exolore drawer toggle-->
		<!--end::Drawers-->
		<!--begin::Scrolltop-->
		<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
			<!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
			<span class="svg-icon">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
					<rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="black" />
					<path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="black" />
				</svg>
			</span>
			<!--end::Svg Icon-->
		</div>
		<!--end::Scrolltop-->
		<!--end::Main-->
		<script>var hostUrl = "<?php echo base_url().'assets/metronic/'?>";</script>
		<!--begin::Javascript-->
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="<?php echo base_url().'assets/metronic/plugins/global/plugins.bundle.js'?>"></script>
		<script src="<?php echo base_url().'assets/metronic/js/scripts.bundle.js'?>"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Page Vendors Javascript(used by this page)-->
		<script src="<?php echo base_url().'assets/metronic/plugins/custom/fullcalendar/fullcalendar.bundle.js'?>"></script>
		<!--end::Page Vendors Javascript-->
		<!--begin::Page Custom Javascript(used by this page)-->
		<script src="<?php echo base_url().'assets/metronic/js/custom/widgets.js'?>"></script>
		<script src="<?php echo base_url().'assets/metronic/js/custom/apps/chat/chat.js'?>"></script>
		<script src="<?php echo base_url().'assets/metronic/js/custom/modals/create-app.js'?>"></script>
		<script src="<?php echo base_url().'assets/metronic/js/custom/modals/upgrade-plan.js'?>"></script>
		<!--end::Page Custom Javascript-->

		
<script>
	/*
let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("demo");
  let captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
var source = document.getElementById("muck");

function changer() {
  plusSlides(1);
}
var myTimer = setInterval(changer, 1000);
source.addEventListener("mouseover", function(){ clearInterval(myTimer)});
source.addEventListener("mouseout", function(){ myTimer = setInterval(changer, 1000);});*/

$(document).ready(function(){
	// options
	var speed = 500; //transition speed - fade
	var autoswitch = true; //auto slider options
	var autoswitch_speed = 5000; //auto slider speed
	
	// add first initial active class
	$(".slide").first().addClass("active");
	
	// hide all slides
	$(".slide").hide;
	
	// show only active class slide
	$(".active").show();
	
	// Next Event Handler
	$('#next').on('click', nextSlide);// call function nextSlide
	
	// Prev Event Handler
	$('#prev').on('click', prevSlide);// call function prevSlide
	
	// Auto Slider Handler
	if(autoswitch == true){
		setInterval(nextSlide,autoswitch_speed);// call function and value 4000
	}
	
	// Switch to next slide
	function nextSlide(){
		$('.active').removeClass('active').addClass('oldActive');
		if($('.oldActive').is(':last-child')){
			$('.slide').first().addClass('active');
		} else {
			$('.oldActive').next().addClass('active');
		}
		$('.oldActive').removeClass('oldActive');
		$('.slide').fadeOut(speed);
		$('.active').fadeIn(speed);
	}
	
	// Switch to prev slide
	function prevSlide(){
		$('.active').removeClass('active').addClass('oldActive');
		if($('.oldActive').is(':first-child')){
			$('.slide').last().addClass('active');
		} else {
			$('.oldActive').prev().addClass('active');
		}
		$('.oldActive').removeClass('oldActive');
		$('.slide').fadeOut(speed);
		$('.active').fadeIn(speed);
	}
});
</script>
<script src="<?php echo base_url().'theme/js/jquery.magnify.js'?>"></script>

<script>
   $('[data-magnify]').magnify({
      headerToolbar: [
        'close'
      ],
      footerToolbar: [
        'prev',
        'next',
        'zoomIn',
        'zoomOut',
        'fullscreen',
        'actualSize',
        'rotateLeft',
        'rotateRight',
        'myCustomButton'
      ],
      modalWidth: 400,
      modalHeight: 400,
      callbacks: {
        beforeChange: function (context, index) {
          console.log(context, index)
        },
        changed: function (context, index) {
          console.log(context, index)
        }
      },
      initMaximized:true,
    });
  </script>
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>