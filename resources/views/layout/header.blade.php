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
								<a href="{{ route('home') }}" class="btn btn-warning p-2">Home</a>
							</li>
						</ul>
					</div>
					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m">
						<a href="{{ route('checkout') }}">
							@php
								$cart_count = 0;
							@endphp
							@auth
								@php
									$cart_count = \App\Models\Cart::where(['user_id' => auth()->user()->id, 'status' => "Pending"])->count();
								@endphp
							@endauth
							
							<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart pr-3" data-notify="{{ $cart_count ?? 0 }}">
								<i class="zmdi zmdi-shopping-cart"></i>
							</div>

							@auth
								<a href="{{ route('logout') }}" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
									Logout
								</a>
							@endauth
							@guest
								<a href="{{ route('login') }}" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
									Login
								</a>
							@endguest
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
			</ul>
		</div>
	</header>