<header>
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop container">
					<a href="{{ route('home') }}" class="logo">
						<img src="{{ asset('assets/images/icons/logo-01.png') }}" alt="IMG-LOGO">
					</a>
					<div class="menu-desktop">
						<ul class="main-menu">
                            <li>
								<a href="{{ route('home') }}">Home</a>
							</li>

							<li>
								<a href="product.html">Shop</a>
							</li>
						</ul>
					</div>
					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m">
						<a href="{{ route('checkout') }}">
							<div class="icon-header-item ">
								<i class="zmdi zmdi-shopping-cart"></i>
							</div>
						</a>
					</div>
				</nav>
			</div>	
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->		
			<div class="logo-mobile">
				<a href="{{ route('home') }}"><img src="{{ asset('assets/images/icons/logo-01.png') }}" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">

				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="2">
					<i class="zmdi zmdi-shopping-cart"></i>
				</div>
			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>
		<!-- Menu Mobile -->
		<div class="menu-mobile">
			<ul class="topbar-mobile">

			<ul class="main-menu-m">
				<li>
					<a href="{{ route('home') }}">Home</a>
				</li>

				<li>
					<a href="product.html">Shop</a>
				</li>

			</ul>
		</div>
	</header>