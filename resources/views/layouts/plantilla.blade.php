<!DOCTYPE html>
<html lang="en">

<head>
	<title>Restaurante</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="Flash Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
	<meta name="keywords" content="admin templates, bootstrap admin templates, bootstrap 4, dashboard, dashboard templets, sass admin templets, html admin templates, responsive, bootstrap admin templates free download,premium bootstrap admin templates, Flash Able, Flash Able bootstrap admin template">
	<meta name="author" content="Codedthemes" />

	<!-- Favicon icon -->
	<link rel="icon" href="/admin-gentell/assets/images/favicon.ico" type="image/x-icon">
	<!-- fontawesome icon -->
	<link rel="stylesheet" href="/admin-gentell/assets/fonts/fontawesome/css/fontawesome-all.min.css">
	<!-- animation css -->
	<link rel="stylesheet" href="/admin-gentell/assets/plugins/animation/css/animate.min.css">

	<!-- vendor css -->
	<link rel="stylesheet" href="/admin-gentell/assets/css/style.css">
</head>

<body class="">

	<!-- [ Pre-loader ] start -->
	<div class="loader-bg">
		<div class="loader-track">
			<div class="loader-fill"></div>
		</div>
	</div>
	<!-- [ Pre-loader ] End -->

	<!-- [ navigation menu ] start -->
	<nav class="pcoded-navbar menupos-fixed menu-light brand-blue ">
		<div class="navbar-wrapper ">
			<div class="navbar-brand header-logo">
				<a href="index.html" class="b-brand">
					<img src="/logo.png" alt="" class="logo images" width="30px">
					<img src="/logo.png" alt="" class="logo-thumb images" width="30px">
				</a>
				<a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
			</div>
			<div class="navbar-content scroll-div">
				<ul class="nav pcoded-inner-navbar">
					<li class="nav-item pcoded-menu-caption">
						<label>Navegación</label>
					</li>
					<li class="nav-item">
						<a href="{{route('dashboard')}}" class="nav-link"><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Inicio</span></a>
					</li>
					<li class="nav-item pcoded-menu-caption">
						<label>Opciones</label>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Mantenedores</span></a>
						<ul class="pcoded-submenu">
							@can('admin.mesas.index')
							<li class=""><a href="{{route('mesa.index')}}" class="">Mesas</a></li>
							@endcan
							@can('admin.categorias.index')
							<li class=""><a href="{{route('categoria.index')}}" class="">Categorías</a></li>
							@endcan
							@can('admin.comidas.index')
							<li class=""><a href="{{route('comida.index')}}" class="">Comidas</a></li>
							@endcan
							@can('admin.clientes.index')
							<li class=""><a href="{{route('cliente.index')}}" class="">Clientes</a></li>
							@endcan
							@can('admin.comandas.index')
							<li class=""><a href="{{route('comanda.index')}}" class="">Comandas</a></li>
							@endcan
							@can('admin.pedidos.index')
							<li class=""><a href="{{route('detalle.index')}}" class="">Pedidos</a></li>
							@endcan
						</ul>
					</li>
				</ul>

			</div>
		</div>
	</nav>
	<!-- [ navigation menu ] end -->

	<!-- [ Header ] start -->
	<header class="navbar pcoded-header navbar-expand-lg navbar-light headerpos-fixed">
		<div class="m-header">
			<a class="mobile-menu" id="mobile-collapse1" href="#!"><span></span></a>
			<a href="index.html" class="b-brand">
				<img src="/admin-gentell/assets/images/logo.svg" alt="" class="logo images">
				<img src="/admin-gentell/assets/images/logo-icon.svg" alt="" class="logo-thumb images">
			</a>
		</div>
		<a class="mobile-menu" id="mobile-header" href="#!">
			<i class="feather icon-more-horizontal"></i>
		</a>
		<div class="collapse navbar-collapse">
			<a href="#!" class="mob-toggler"></a>
			<ul class="navbar-nav ml-auto">
				<li>
					<div class="dropdown drp-user">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon feather icon-settings"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-right profile-notification">
							<div class="pro-head">
								<img src="/admin-gentell/assets/images/user/ima.png" class="img-radius" alt="User-Profile-Image">
								<span>{{ Auth::user()->name }}</span>
								<form id="logout-form" action="{{ route('logout') }}" method="POST">
									@csrf
									<a href="{{ route('logout') }}" class="dud-logout" title="Logout" onclick="event.preventDefault();
											  document.getElementById('logout-form').submit();">
										<i class="feather icon-log-out"></i>
									</a>
								</form>
							</div>
							<ul class="pro-body">
								<li><a href="#" class="dropdown-item"><i class="feather icon-mail"></i>{{ Auth::user()->email }}</a></li>
								@role('Administrador')
								<li><a href="#" class="dropdown-item"><i class="feather icon-user"></i>Administrador</a></li>
								@endrole
								@role('Mozo')
								<li><a href="#" class="dropdown-item"><i class="feather icon-user"></i>Mozo</a></li>
								@endrole
								@role('Cocinero')
								<li><a href="#" class="dropdown-item"><i class="feather icon-user"></i>Cocinero</a></li>
								@endrole
								@role('Cajero')
								<li><a href="#" class="dropdown-item"><i class="feather icon-user"></i>Cajero</a></li>
								@endrole
							</ul>
						</div>
					</div>
				</li>
			</ul>
		</div>
	</header>
	<!-- [ Header ] end -->

	<!-- [ Main Content ] start -->
	<div class="pcoded-main-container">
		<div class="pcoded-wrapper">
			<div class="pcoded-content">
				<div class="pcoded-inner-content">
					<div class="main-body">
						<div class="page-wrapper">
							<section class="content">
								<div class="row">
									<!-- [ form-element ] start -->
									<div class="col-sm-12">
										<div class="card">
											<div class="card-header">
												@yield('contenido')
											</div>
										</div>
									</div>
								</div>
							</section>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="/admin-gentell/assets/js/vendor-all.min.js"></script>
	<script src="/admin-gentell/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<script src="/admin-gentell/assets/js/pcoded.min.js"></script>
	<script src="/admin-gentell/assets/js/edit.js"></script>
	<script src="/admin-gentell/assets/js/edit2.js"></script>
</body>

</html>