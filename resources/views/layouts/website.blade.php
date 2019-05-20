<!DOCTYPE html>
	<html lang="en">
		<head>
			<meta charset="utf-8">
			<title>TryShop</title>
			<meta name="description" content="Multi-Purpose E-commerce Template">
			<!--[if IE]>
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<![endif]-->
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<meta name="author" content="">
			<link rel="shortcut icon" href="/images/logo.png" type="image/x-icon" />
			<link rel="apple-touch-icon" href="/images/apple-touch-icon.png" />
			<link rel="apple-touch-icon" sizes="72x72" href="/images/apple-touch-icon-72x72.png" />
			<link rel="apple-touch-icon" sizes="114x114" href="/images/apple-touch-icon-114x114.png" />
			<link rel="stylesheet" type="text/css" href="/third-party/sidr/css/jquery.sidr.dark.css">
			<link rel="stylesheet" type="text/css" href="/third-party/slick/css/slick.css">
			<link rel="stylesheet" type="text/css" href="/third-party/slick/css/slick-theme.css">
			<link rel="stylesheet" type="text/css" href="/third-party/wow/css/animate.min.css">
	        <link rel="stylesheet" type="text/css" href="/css/jquery-ui.min.css">
			<link rel="stylesheet" type="text/css" href="/third-party/magnific-popup-master/css/magnific-popup.css">
			<link rel="stylesheet" type="text/css" href="/third-party/accordionjs/css/accordion.min.css">
			<link rel="stylesheet" type="text/css" href="/css/style.css">
			<link rel="stylesheet" type="text/css" href="/icons/icons.css">
			<link rel="stylesheet" type="text/css" href="/css/custom.css">
			<link rel="stylesheet" type="text/css" href="/css/responsive.css">
			<link rel="stylesheet" id="color" href="/css/default.css">
			<link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">
			@csrf
            <style>
                body,h1,h2,h3,h4,h5,h6,a,td,tr,li,a,ul,option,button{
                    font-family: 'Cairo'!important;
				}
				.sizes ul li {
					display: inline-block;
					width: 30px;
					margin: 10px 5px;
					height: 30px;
					text-align: center;
					border: 1px solid #9a9a9a;
					cursor: pointer;
				}
				.size-num{
					width:85px;
					height:30px;
				}
				.category-image{
					width:300px;
					height:250px;
				}
				ul.pagination li {
					padding: 1px 11px;
					display: inline-block;
					margin: 1px;
					font-size: 14px;
					background: #fff;
					border: 1px solid #f1f1f1;
				}
				ul.pagination li:hover{
					background: #CE1648;
					color: #fff;
					border-color: #CE1648;
				}
				ul.pagination li:hover a:visited{
					color:#fff;
				}
				.products-page img{
					width:200px;
					height:250px;
				}
				.slick-track{
					margin:0 auto; 
				}
            </style>

			<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

			<link href="https://fonts.googleapis.com/css?family=Roboto:400,500,600,700" rel="stylesheet">
			<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700,800" rel="stylesheet">

			<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
			<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
			<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
			<![endif]-->

		</head>
		<body class="home header-v1">

			<div id="page" class="site">
			<!-- Mobile main menu -->
				<a href="#" id="mobile-trigger"><i class="fa fa-list" aria-hidden="true"></i></a>
				<!-- <div id ="mob-menu">
					<ul>
						<li class="current-menu-item menu-item-has-children pull-right"><a href="#">Home</a>
							<ul class="sub-menu">
								<li><a href="home-v1.html">Home v1</a></li>
								<li><a href="home-v2.html">Home v2</a></li>
								<li><a href="home-v3.html">Home v3</a></li>
								<li><a href="home-v4.html">Home v4</a></li>
								<li><a href="home-v5.html">Home v5</a></li>
								<li><a href="home-v6.html">Home v6</a></li>
							</ul>
						</li>
						<li class="menu-item-has-children pull-right"><a href="#">Categorys</a>
							<ul class="sub-menu">
								<li class="current-menu-item menu-item-has-children pull-right"><a href="#">Dresses</a>
									<ul class="sub-menu">
	                                  <li class=""> <a href="#">Casual dresses</a> </li>
	                                  <li> <a href="#">Evening</a> </li>
	                                  <li> <a href="#">Party</a> </li>
	                                  <li> <a href="#">Printed</a> </li>
								      <li> <a href="#">Winter </a> </li>
							      </ul>
						 		 </li>
								<li class="current-menu-item menu-item-has-children pull-right"><a href="#">Tops category</a>
									<ul class="sub-menu">
									      <li class=""> <a href="#">Blouses</a> </li>
									      <li> <a href="#">Evening tops</a> </li>
									      <li> <a href="#">Work</a> </li>
									      <li> <a href="#">Winter</a> </li>
									      <li> <a href="#">Summer</a> </li>
									 </ul>
						 		 </li>
								<li class="current-menu-item menu-item-has-children pull-right"><a href="#">Lingerie</a>
									<ul class="sub-menu">
	                         			  <li> <a href="#">Bras</a> </li>
	                                      <li> <a href="#">Knickers</a> </li>
	                                      <li> <a href="#">Nightwear</a> </li>
	                                      <li> <a href="#">Summerwear</a> </li>
	                                      <li> <a href="#">Men Fashion </a> </li>
									 </ul>
								 </li>
							</ul>
						</li>
						<li class="menu-item-has-children pull-right"><a href="#">Shop Pages</a>
							<ul class="sub-menu">
								<li><a href="shop-grid.html">product Grid</a></li>
								<li><a href="shop-full.html">product Full</a></li>
								<li><a href="shop-left-sidebar.html"> Sidebar left</a></li>
								<li><a href="shop-right-sidebar.html"> Sidebar Right</a></li>
								<li><a href="shop-three-column.html"> Three Column</a></li>
							</ul>
						</li>
							<li class="menu-item-has-children pull-right"><a href="#" >Pages</a>
							<ul class="sub-menu">
								<li><a href="single-product.html">Single Product</a></li>
								<li><a href="login.html">Login</a></li>
								<li><a href="register.html">Register</a></li>
								<li><a href="wishlist.html">wishlist Page</a></li>
								<li><a href="checkout.html">Checkout Page</a></li>
								<li><a href="cart.html">Cart Page</a></li>
								<li><a href="faq.html">FAQ</a></li>
								<li><a href="404-error.html">404 Error</a></li>
								<li><a href="typography.html">Typographys</a>
								</ul>
							</li>
						<li class="menu-item-has-children pull-right"><a href="#" >Blog</a>
							<ul class="sub-menu">
								<li><a href="blog-grid.html">Blog Grid</a></li>
								<li><a href="left-sidebar.html">left Sidebar</a></li>
								<li><a href="right-sidebar.html">Right Sidebar</a></li>
								<li><a href="single-blog.html">Single Blog</a></li>
							</ul>
						</li>
					</ul>
				</div> -->
				<header id="masthead" class="site-header sticky-enabled">
					<div class="container">
						<div class="site-branding pull-right">
							<div id="site-identity">
								<h1 class="site-title"><a href="home-v1.html"  rel="home"><img alt="logo" width="80px" class="site-logo" src="/images/logo.png">TryShop</a></h1>
							</div><!-- #site-identity -->
						</div><!-- .site-branding -->
						<div id="header-right" class="pull-left">
							<div class="hearder-min-cart">
								<ul>
									<li class="cart-button mini-cart-wrap">
										<a href="/cart"><i class=" icon-basket"></i><span>2</span>	</a>
									</li>
				       				<li class="cart-button">
					       				<a href="/wishlist"  title="wishlist"><i class=" icon-heart"></i><span>0</span>	</a>
				       				</li>
								</ul>
							</div><!-- #quick-link-buttons -->
						</div>
						<nav class="main-navigation pull-left">
							<ul>
								<li class="current-menu-item pull-right"><a href="/">الرئيسية</a></li>
								<li class="menu-item pull-right"><a href="/category">التصنيفات</a>
								<li class="menu-item pull-right"><a href="/shop">المنتجات</a>
									<!-- <div class="flat-mega-memu">
										<div class="mega-menu-box col-grid-3">
										      <div class="menu-container">
												<h3 class="megamenu-title">Dresses</h3>
												<ul class="mega-menu-sub">
		                                          <li class=""> <a href="#">Casual dresses</a> </li>
		                                          <li> <a href="#">Evening</a> </li>
		                                          <li> <a href="#">Party</a> </li>
		                                          <li> <a href="#">Printed</a> </li>
											      <li> <a href="#">Winter </a> </li>
										      </ul>
									     </div> .menu-container -->
										<!-- </div> -->
										<!-- <div class="mega-menu-box col-grid-3">
											<div class="menu-container">
												<h3 class="megamenu-title">Tops category</h3>
												<ul class="mega-menu-sub">
											      <li class=""> <a href="#">Blouses</a> </li>
											      <li> <a href="#">Evening tops</a> </li>
											      <li> <a href="#">Work</a> </li>
											      <li> <a href="#">Winter</a> </li>
											      <li> <a href="#">Summer</a> </li>
											      </ul>
										      </div>.menu-container -->
										<!-- </div>
										<div class="mega-menu-box col-grid-3">
											<div class="menu-container">
											<span class="ribbon-rotated right-align onsale">Sale</span>
												<h3 class="megamenu-title">Lingerie</h3>
												<ul class="mega-menu-sub">
		                                          <li> <a href="#">Bras</a> </li>
		                                          <li> <a href="#">Knickers</a> </li>
		                                          <li> <a href="#">Nightwear</a> </li>
		                                          <li> <a href="#">Summerwear</a> </li>
		                                          <li> <a href="#">Men Fashion </a> </li>
											      </ul>
										      </div> .menu-container -->
										<!-- </div>
										<div class="mega-menu-box col-grid-3">
											<a href="#"><img alt="product-banner" src="images/shop/megamenu-product.jpg"></a>
										</div>
									</div>
								</li> -->
								<!-- <li class="menu-item-has-children pull-right"><a href="#">Shop Pages</a>
									<ul class="sub-menu">
										<li><a href="shop-grid.html">product Grid</a></li>
										<li><a href="shop-full.html">product Full</a></li>
										<li><a href="shop-left-sidebar.html"> Sidebar left</a></li>
										<li><a href="shop-right-sidebar.html"> Sidebar Right</a></li>
										<li><a href="shop-three-column.html"> Three Column</a></li>
									</ul>
								</li>
									<li class="menu-item-has-children pull-right"><a href="#" >Pages</a>
									<ul class="sub-menu">
										<li><a href="single-product.html">Single Product</a></li>
										<li><a href="login.html">Login</a></li>
										<li><a href="register.html">Register</a></li>
										<li><a href="wishlist.html">wishlist Page</a></li>
										<li><a href="checkout.html">Checkout Page</a></li>
										<li><a href="cart.html">Cart Page</a></li>
										<li><a href="faq.html">FAQ</a></li>
										<li><a href="404-error.html">404 Error</a></li>
										<li><a href="typography.html">Typographys</a>
										</ul>
									</li>
								<li class="menu-item-has-children pull-right"><a href="#" >Blog</a>
									<ul class="sub-menu">
										<li><a href="blog-grid.html">Blog Grid</a></li>
										<li><a href="left-sidebar.html">left Sidebar</a></li>
										<li><a href="right-sidebar.html">Right Sidebar</a></li>
										<li><a href="single-blog.html">Single Blog</a></li>
									</ul>
								</li>  -->
							</ul>
						</nav> <!-- .site-navigation -->
					</div> <!-- .container -->
                </header> <!-- .site-header -->
                	<div id="content" class="site-content global-layout-no-sidebar">
					<div class="container">
						@yield('content')  
					</div>   
				</div> <!-- #content-->
				<div class="footer-container top-space">
					<footer id="colophon" class="site-footer">
						<div class="colophon-bottom">
							<div class="container">
								<div class="inner-wrapper">
								<div class="col-grid-4 copyright text-alignright">
									<p> Copyright © 2019 <a href="/">TryShop</a>. </p>
								</div>
								<div class="col-grid-4 copyright text-aligncenter">
									<p><img src="images/payment-getway.png" alt="payment"><span> We Accept: </span>  </p>
								</div>
								<div class="col-grid-4 site-info text-alignleft">
									<p> <a  rel="" href="/" target="_blank">TryShop</a> </p>
								</div> <!-- .site-info -->
								</div><!-- .inner-wrapper -->
							</div> <!-- .container -->
						</div> <!-- .colophon-bottom -->
					</footer> <!-- footer ends here -->
				</div><!-- footer-container -->
			</div> <!--#page-->
			<div id="btn-scrollup">
				<a  title="Go Top"  class="scrollup button-circle" href="#"><i class="fas fa-angle-up"></i></a>
			</div><!-- #btn-scrollup -->

	        <div class="login-popup white-popup-block mfp-hide" id="login-popup">
	        	<div class="inner-wrapper">
	        		<div class="col-grid-6">
	        			<div class="login-account">
	        				<div class="user-acc-header">
	        					<img src="images/blog-single/author1.png" alt="">
	        					<h3>Login</h3>
	        				</div>
	        				<div class="content-body">
	        					<form>
	        						<input type="email" placeholder="Username OR Email address">
	        						<input type="password" placeholder="Password">
	        						<input type="submit" class="custom-button button-small" value="Login">
	        					</form>
	        				</div>
	        			</div> <!-- .login-account -->
	        			<div class="share-on-us text-aligncenter clear-fix social-links circle brand-color">
			        	<h3>Login With :</h3>
				            <ul>
				              <li><a target="_blank" href="http://facebook.com">Facebook</a></li>
				              <li><a target="_blank" href="http://twitter.com">Twitter</a></li>
				              <li><a target="_blank" href="http://linkedin.com">Linkedln</a></li>
				              <li><a target="_blank" href="http://youtube.com">Linkedln</a></li>
				            </ul>
				        </div>
	        		</div><!-- .col-grid-6 -->
	        		<div class="col-grid-6">
	        			<div class="register-account">
	        				<div class="user-acc-header">
	        					<h3>Register</h3>
	        				</div>
	        				<div class="content-body">
	        					<form>
	        						<input type="text" placeholder="Name">
	        						<input type="text" placeholder="Mobile number">
	        						<input type="email" placeholder="Email address">
	        						<input type="password" placeholder="Password">
	        						<input type="submit" class="btn btn-custom2" value="Register">
	        					</form>
	        				</div>
	        			</div>
	        			<div class="share-on-us text-aligncenter clear-fix social-links circle brand-color">
			        	<h3>Register With :</h3>
				            <ul>
				              <li><a target="_blank" href="http://facebook.com">Facebook</a></li>
				              <li><a target="_blank" href="http://twitter.com">Twitter</a></li>
				              <li><a target="_blank" href="http://linkedin.com">Linkedln</a></li>
				              <li><a target="_blank" href="http://youtube.com">Linkedln</a></li>
				            </ul>
				        </div>
	        		</div>
	        	</div>
	        </div>
			<script  src="/third-party/jquery/jquery-3.2.1.min.js"></script>
			<script  src="/third-party/jquery/jquery-migrate-3.0.0.min.js"></script>
			<script  src="/third-party/sidr/js/jquery.sidr.js"></script>
			<script  src="/third-party/cycle2/jquery.cycle2.js"></script>
			<script  src="/third-party/slick/js/slick.min.js"></script>
			<script  src="/third-party/wow/js/wow.min.js"></script>
	        <script src="/js/jquery-ui.min.js"></script>
			<script  src="/third-party/magnific-popup-master/js/jquery.magnific-popup.js"></script>
			<script  src="/third-party/accordionjs/js/accordion.min.js"></script>
			<script  src="/third-party/easytabs/js/jquery.easytabs.min.js"></script>
			<script  src="/js/contact.js"></script>
			<script  src="/js/tabber.js"></script>
			<script  src="/js/custom.js"></script>
			@yield('js')
		</body>
	</html>
