<?php
	session_name('confimania@catalogo@online');
	session_start();
	require_once('header.php');
    require_once('conexion/conexion.php');
    require_once('modelo/index_modelo.php');
	$muestra = new Muestra();
	$datoM = $muestra->get_marcas();
	$datoP = $muestra->get_productos();
	
	if($_SESSION['type'] != '1' && $_SESSION['type'] != '2'){
		header('Location: ./'); 
	
	}
?>
		<!--begin::Main-->
		<!--begin::Header Mobile-->
		<div id="kt_header_mobile" class="header-mobile align-items-center header-mobile-fixed">
			<!--begin::Logo-->
			<a href="./">
				<img alt="Logo" src="assets/media/logos/logo-light.png" />
			</a>
			<!--end::Logo-->
			<!--begin::Toolbar-->
			<div class="d-flex align-items-center">
				<!--begin::Aside Mobile Toggle-->
				<button class="btn p-0 burger-icon burger-icon-left" id="kt_aside_mobile_toggle">
					<span></span>
				</button>
				<!--end::Aside Mobile Toggle-->
				<!--begin::Header Menu Mobile Toggle-->
				<button class="btn p-0 burger-icon ml-4" id="kt_header_mobile_toggle">
					<span></span>
				</button>
				<!--end::Header Menu Mobile Toggle-->
				<!--begin::Topbar Mobile Toggle-->
				<button class="btn btn-hover-text-primary p-0 ml-2" id="kt_header_mobile_topbar_toggle">
					<span class="svg-icon svg-icon-xl">
						<!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<polygon points="0 0 24 0 24 24 0 24" />
								<path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
								<path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
							</g>
						</svg>
						<!--end::Svg Icon-->
					</span>
				</button>
				<!--end::Topbar Mobile Toggle-->
			</div>
			<!--end::Toolbar-->
		</div>
		<!--end::Header Mobile-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="d-flex flex-row flex-column-fluid page">
				<!--begin::Aside-->
				<?php
				include('sidebar.php')
				?>
				<!--end::Aside-->
				<!--begin::Wrapper-->
				<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
					<!--begin::Header-->
					<div id="kt_header" class="header header-fixed">
						<!--begin::Container-->
						<div class="container-fluid d-flex align-items-stretch justify-content-between">
							<!--begin::Header Menu Wrapper-->
							<div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
								
							</div>
							<!--end::Header Menu Wrapper-->
							<!--begin::Topbar-->
							<?php
							include('topbar.php')
							?>
							<!--end::Topbar-->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Header-->
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Subheader-->
						<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
							<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
								<!--begin::Info-->
								<div class="d-flex align-items-center flex-wrap mr-1">
									<!--begin::Page Heading-->
									<div class="d-flex align-items-baseline mr-5">
										<!--begin::Page Title-->
										<h5 class="text-dark font-weight-bold my-2 mr-5">Producto</h5>
										<!--end::Page Title-->
										<!--begin::Breadcrumb-->
										<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
											<li class="breadcrumb-item">
												<a  class="text-muted">Dashboard</a>
											</li>
											<li class="breadcrumb-item">
												<a  class="text-muted">Producto</a>
											</li>
										</ul>
										<!--end::Breadcrumb-->
									</div>
									<!--end::Page Heading-->
								</div>
								<!--end::Info-->
								
							</div>
						</div>
						<!--end::Subheader-->
						<!--begin::Entry-->
						<div class="d-flex flex-column-fluid">
							<!--begin::Container-->
							<div class="container">
								<!--begin::Card-->
								<div class="card card-custom">
									<div class="card-header flex-wrap border-0 pt-6 pb-0">
										<div class="card-title">
											<h3 class="card-label">CATALOGO DE PRODUCTOS
											<span class="d-block text-muted pt-2 font-size-sm">Se Muesta la infomacion general de los product registrados</span></h3>
										</div>
										<div class="card-toolbar">
											<!--begin::Dropdown-->
											<div class="dropdown dropdown-inline mr-2">
										</div>
									</div>
									
									<div class="card-body">
										<form action="" method="post" class="form-horizontal">
											<div class="form-group row">

												<div class="col-sm-12">

												<div class="form-check form-check-inline">
													<div class="input-group mb-3">
													<div class="input-group-prepend">
														<label class="input-group-text" for="inputGroupSelect01">Marcas</label>
													</div>
													<select class="custom-select" id="marca" name="marca" required>
														<option selected value="-">TODAS</option>
														<?php
														foreach ($datoM as $marcas) {?>
														<option value="<?php echo $marcas['cod']; ?>"><?php echo $marcas['marca']; ?></option>
														<?php } ?>
													</select>
													</div>
												</div>

												<div class="form-check form-check-inline">
													<div class="input-group mb-3">
													<div class="input-group-prepend">
														<label class="input-group-text" for="inputGroupSelect01">Precio</label>
													</div>
													<select class="custom-select" id="precio" name="precio" required>
														<option selected value="1">Precio 1</option>
														<option value="2">Precio 2</option>
														<option value="3">Precio 3</option>														
													</select>
													</div>
												</div>

												<div class="form-check form-check-inline">
													<div class="input-group-prepend">
													<div class="input-group-text">
														<input name="exis" id="exis" type="checkbox" aria-label="Checkbox for following text input" value="1"> Con Existencia
													</div>
													</div>
												</div>

												<button type="submit" class="btn btn-primary" name="buscar">Buscar</button>
												</div>
											</div>
										</form>
									</div>																
								</div>
								<!--end::Card-->
								
								<!--begin::Card::Options-->
								<?php if (isset($_POST['buscar'])) { ?>
								<div class="row">
									<div class="col-sm-6">
										<div class="card">
										<div class="card-body">
											<a href="lista.php?&exis=<?php echo $_POST['exis']; ?>&marca=<?php echo $_POST['marca']; ?>&precio=<?php echo $_POST['precio']; ?>" class="btn btn-outline-primary" role="button" aria-pressed="true" Target="_blank" class="btn btn-success">
												<img src="assets/media/fotos/lista.png" class="card-img-top" alt="...">
												<label for=""><strong>Lista de Precio</strong></label>
											</a>
										</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="card">
										<div class="card-body">
											<a href="catalogo.php?&exis=<?php echo $_POST['exis']; ?>&marca=<?php echo $_POST['marca']; ?>&precio=<?php echo $_POST['precio']; ?>" class="btn btn-outline-success text-center" role="button" aria-pressed="true" Target="_blank" class="btn btn-success">
												<img src="assets/media/fotos/catalogo.png" class="card-img-top" alt="...">
												<label for=""><strong>Catalogo</strong></label>
											</a>
										</div>
										</div>
									</div>
								</div>
								<?php } ?>
								<!--end::Card::Options-->
							</div>
							<!--end::Container-->
						</div>
						<!--end::Entry-->
					</div>
					<!--end::Content-->
					
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Main-->
<?php
include('footer.php')
?>