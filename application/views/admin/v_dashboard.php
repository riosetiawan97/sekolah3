<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
	<!--begin::Toolbar-->
	<div class="toolbar" id="kt_toolbar">
		<!--begin::Container-->
		<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
			<!--begin::Page title-->
			<div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
				<!--begin::Title-->
				<h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Dashboard</h1>
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
                    <li class="breadcrumb-item text-muted">Dashboard</li>
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
							<!-- Info boxes -->
							<div class="row">   
								
								<div class="col-xl-3">
									<!--begin::Statistics Widget 5-->
									<a href="#" class="card bg-danger hoverable card-xl-stretch mb-xl-8 text-white">
										<!--begin::Body-->
										<div class="card-body">
											<!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm008.svg-->
											<span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
												<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
													<path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4"/>
												</svg>
											</span>
											<!--end::Svg Icon-->
											<?php
												$query=$this->db->query("SELECT * FROM tbl_pengunjung WHERE DATE_FORMAT(pengunjung_tanggal,'%m%y')=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 MONTH),'%m%y')");
												$jml=$query->num_rows();
											?>
											<div class="text-white fw-bolder fs-2 mb-2 mt-5"><?php echo number_format($jml);?> Visitors</div>
											<div class="fw-bold text-white">Visitor Last Month</div>
										</div>
										<!--end::Body-->
									</a>
									<!--end::Statistics Widget 5-->
								</div>
								<div class="col-xl-3">
									<!--begin::Statistics Widget 5-->
									<a href="#" class="card bg-primary hoverable card-xl-stretch mb-xl-8 text-white">
										<!--begin::Body-->
										<div class="card-body">
											<!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm008.svg-->
											<span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
												<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
													<path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4"/>
												</svg>
											</span>
											<!--end::Svg Icon-->
											<?php
												$query=$this->db->query("SELECT * FROM tbl_pengunjung WHERE DATE_FORMAT(pengunjung_tanggal,'%m%y')=DATE_FORMAT(CURDATE(),'%m%y')");
												$jml=$query->num_rows();
											?>
											<div class="text-white fw-bolder fs-2 mb-2 mt-5"><?php echo number_format($jml);?> Visitors</div>
											<div class="fw-bold text-white">Visitor This Month</div>
										</div>
										<!--end::Body-->
									</a>
									<!--end::Statistics Widget 5-->
								</div>
							</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-5 g-xxl-8">
                <div class="col-xxl-12">
            <!-- Main content -->
                    <div class="card card-xxl-stretch mb-xl-8">
                                <!--begin::Body-->
                        <div class="card-body py-3">
							<div class="row">
								<div class="col-md-12">
								<div class="box">
									<div class="box-header with-border">
									<h3 class="box-title">Pengunjung bulan ini</h3>

									</div>
									<!-- /.box-header -->
									<div class="box-body">
									<div class="row">
										<div class="col-md-12">

										<div class="col-md-12">
												
											<div id="kt_charts_widget_3_chart" style="height: 350px"></div>
										</div>
										<!-- /.chart-responsive -->
										</div>
										<!-- /.col -->

										<!-- /.col -->
									</div>
									<!-- /.row -->
									</div>
									<!-- ./box-body -->

									<!-- /.box-footer -->
								</div>
								<!-- /.box -->
								</div>
								<!-- /.col -->
							</div>
							<!-- /.row -->
							</div>
                    </div>
                </div>
            </div>
			<div class="row g-5 g-xxl-8">
                <div class="col-xxl-12">
            <!-- Main content -->
                    <div class="card card-xxl-stretch mb-xl-8">
                                <!--begin::Body-->
                        <div class="card-body py-3">
							<!-- Main row -->
							<div class="row">
								<!-- Left col -->
								<div class="col-md-8">
								<!-- MAP & BOX PANE -->
								<div class="box box-success">
									<div class="box-header with-border">
										<h3 class="box-title">Posting Populer</h3>
										
										<table class="table align-middle gs-0 gy-3">
											<!--begin::Table head-->
											<thead>
												<tr>
													<th class="p-0 w-50px"></th>
													<th class="p-0 min-w-150px"></th>
													<th class="p-0 min-w-140px"></th>
												</tr>
											</thead>
											<!--end::Table head-->
											<!--begin::Table body-->
											<tbody>
												<?php
													$query=$this->db->query("SELECT * FROM tbl_tulisan ORDER BY tulisan_views DESC");
													foreach ($query->result_array() as $i) :
														$tulisan_id=$i['tulisan_id'];
														$tulisan_judul=$i['tulisan_judul'];
														$tulisan_views=$i['tulisan_views'];
														$tulisan_gambar=$i['tulisan_gambar'];
														$tulisan_slug=$i['tulisan_slug'];
												?>
												<tr>
													<td>
														<div class="symbol symbol-50px me-2">
															<span class="symbol-label">
																<img src="<?php echo base_url().'assets/images/'.$tulisan_gambar;?>" class="h-75 align-self-end" alt="" />
															</span>
														</div>
													</td>
													<td>
														<a href="<?php echo site_url('artikel/'.$tulisan_slug);?>" class="text-dark fw-bolder text-hover-primary mb-1 fs-6"><?php echo $tulisan_judul;?></a>
													</td>
													<td>
														<span class="text-dark fw-bolder d-block fs-5"><?php echo $tulisan_views.' Views';?></span>
													</td>
												</tr>
												<?php endforeach;?>
											</tbody>
											<!--end::Table body-->
										</table>
									</div>

									<!-- /.box-body -->
								</div>
								<!-- /.box -->

								<!-- /.box -->
								</div>
								<!-- /.col -->
								<!-- /.col -->
							</div>
							<!-- /.row -->
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<!--end::Post-->
</div>