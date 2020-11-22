<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
	<title>{{ $title }}</title>

	@include('layouts.admin.source-header')
</head>

<body>
	<div id="app">
		<div class="main-wrapper">

			<div class="navbar-bg">
				{{-- background navbar --}}
			</div>

			<nav class="navbar navbar-expand-lg main-navbar">
				@include('layouts.admin.navbar')
			</nav>
			{{-- end nav --}}

			<div class="main-sidebar">
				<aside id="sidebar-wrapper">

					<div class="sidebar-brand">
						<a href="{{ url('/dashboard') }}">SKMH</a>
					</div>

					<div class="sidebar-brand sidebar-brand-sm">
						<a href="{{ url('/dashboard') }}">SKMH</a>
					</div>

					<ul class="sidebar-menu">
						<li class="menu-header">Dashboard</li>
						<li class="dropdown">
							<a href="#" class="nav-link"><i class="fas fa-user"></i><span>Profile</span></a>
						</li>
						<li class="dropdown">
							<a href="{{ url('#') }}" class="nav-link has-dropdown"><i class="fas fa-motorcycle"></i><span>Products</span></a>
							<ul class="dropdown-menu">
								<li class="active"><a class="nav-link" href="{{ url('/kategori-motor') }}">Kategori Motor</a></li>
								<li><a class="nav-link" href="{{ url('/tipe-motor') }}">Tipe Motor</a></li>
								<li><a class="nav-link" href="{{ url('/motor') }}">Motor </a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="{{ url('/order') }}" class="nav-link"><i class="fas fa-image"></i><span>Order List</span></a>
						</li>
						<li class="dropdown">
							<a href="{{ url('/banners') }}" class="nav-link"><i class="fas fa-image"></i><span>Banner</span></a>
						</li>
						<li class="dropdown">
							<a href="#" class="nav-link"><i class="fas fa-address-book"></i><span>Subcribers</span></a>
						</li>
						<li class="dropdown">
							<a href="#" class="nav-link"><i class="fas fa-credit-card"></i><span>Schema Credit</span></a>
						</li>
						<li class="dropdown">
							<a href="{{ url('/tentang-kami/edit') }}" class="nav-link"><i class="fas fa-users"></i><span>About Us</span></a>
						</li>
					</ul>

				</aside>
			</div>
			{{-- end sidebar --}}

			<div class="main-content">
				@yield('content')
			</div>
			{{-- end main content --}}

			<footer class="main-footer">
				@include('layouts.admin.footer')
			</footer>
			{{-- end footer --}}

		</div>
		{{-- end main wrapper --}}

	</div>
	{{-- end app --}}

	@include('layouts.admin.source-footer')

</body>

</html>