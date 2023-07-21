<!doctype html>
<html class="no-js" lang="en">

<head>
	<!-- meta data -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<!-- title of site -->
	<title>Furniture</title>
	<link rel="shortcut icon" type="image/icon"
		href="<?php echo get_template_directory_uri(); ?>/assets/logo/favicon.png">

	<?php
	wp_head();
	?>



	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

	<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>
	<!--[if lte IE 9]>
			<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
		<![endif]-->



	<!--welcome-hero start -->
	<header id="home" class="welcome-hero">

		<div id="header-carousel" class="carousel slide carousel-fade" data-ride="carousel">
			<!--/.carousel-indicator -->
			<ol class="carousel-indicators">
				<li data-target="#header-carousel" data-slide-to="0" class="active"><span class="small-circle"></span>
				</li>
				<li data-target="#header-carousel" data-slide-to="1"><span class="small-circle"></span></li>
				<li data-target="#header-carousel" data-slide-to="2"><span class="small-circle"></span></li>
			</ol><!-- /ol-->
			<!--/.carousel-indicator -->

			<!--/.carousel-inner -->
			<div class="carousel-inner" role="listbox">
				<!-- .item -->
				<?php
				$args = array(
					'post_type' => 'slider',
					'posts_per_page' => -1,
				);

				$slides_query = new WP_Query($args);
				$i = 1;

				if ($slides_query->have_posts()):
					while ($slides_query->have_posts()):
						$slides_query->the_post();
						$slide_title = get_post_meta(get_the_ID(), 'slide_title', true);
						$item_title = get_post_meta(get_the_ID(), 'item_title', true);
						$item_description = get_post_meta(get_the_ID(), 'item_description', true);
						$post_image_id = get_post_meta(get_the_ID(), 'slide_image', true);
						$slide_image = wp_get_attachment_image_src($post_image_id, 'full')[0];
						$current_price = get_post_meta(get_the_ID(), 'current_price', true);
						$old_price = get_post_meta(get_the_ID(), 'old_price', true);

						?>
						<div class="item <?php if ($i === 1)
							echo 'active' ?>">
							<div class="single-slide-item slide<?php echo $i ?>">
								<div class="container">
									<div class="welcome-hero-content">
										<div class="row">
											<div class="col-sm-7">
												<div class="single-welcome-hero">
													<div class="welcome-hero-txt">
														<h4>
															<?php echo $slide_title ?>
														</h4>
														<h2>
															<?php echo $item_title ?>
														</h2>
														<p>
															<?php echo $item_description ?>
														</p>
														<div class="packages-price">
															<p>
																<?php echo $current_price ?>
																<del>
																	<?php echo $old_price ?>
																</del>
															</p>
														</div>
														<button class="btn-cart welcome-add-cart"
															onclick="window.location.href='#'">
															<span class="lnr lnr-plus-circle"></span>
															add <span>to</span> cart
														</button>
														<button class="btn-cart welcome-add-cart welcome-more-info"
															onclick="window.location.href='#'">
															more info
														</button>
													</div><!--/.welcome-hero-txt-->
												</div><!--/.single-welcome-hero-->
											</div><!--/.col-->
											<div class="col-sm-5">
												<div class="single-welcome-hero">
													<div class="welcome-hero-img">
														<img src="<?php echo $slide_image ?>" alt="slider image">
													</div><!--/.welcome-hero-txt-->
												</div><!--/.single-welcome-hero-->
											</div><!--/.col-->
										</div><!--/.row-->
									</div><!--/.welcome-hero-content-->
								</div><!-- /.container-->
							</div><!-- /.single-slide-item-->

						</div><!-- /.item .active-->
						<?php
						$i += 1;
					endwhile;
					wp_reset_postdata();
				endif;
				?>

			</div><!-- /.carousel-inner-->

		</div><!--/#header-carousel-->

		<!-- top-area Start -->
		<div class="top-area">
			<div class="header-area">
				<!-- Start Navigation -->
				<nav class="navbar navbar-default bootsnav  navbar-sticky navbar-scrollspy"
					data-minus-value-desktop="70" data-minus-value-mobile="55" data-speed="1000">

					<!-- Start Top Search -->
					<div class="top-search">
						<div class="container">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-search"></i></span>
								<input type="text" class="form-control" placeholder="Search">
								<span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
							</div>
						</div>
					</div>
					<!-- End Top Search -->

					<div class="container">
						<!-- Start Atribute Navigation -->
						<div class="attr-nav">
							<ul>
								<li class="search">
									<a href="#"><span class="lnr lnr-magnifier"></span></a>
								</li><!--/.search-->
								<li class="nav-setting">
									<a href="#"><span class="lnr lnr-cog"></span></a>
								</li><!--/.search-->
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										<span class="lnr lnr-cart"></span>
										<span class="badge badge-bg-1">2</span>
									</a>
									<ul class="dropdown-menu cart-list s-cate">
										<li class="single-cart-list">
											<a href="#" class="photo"><img
													src="<?php bloginfo('template_url') ?>/assets/images/collection/arrivals1.png"
													class="cart-thumb" alt="image" /></a>
											<div class="cart-list-txt">
												<h6><a href="#">arm <br> chair</a></h6>
												<p>1 x - <span class="price">$180.00</span></p>
											</div><!--/.cart-list-txt-->
											<div class="cart-close">
												<span class="lnr lnr-cross"></span>
											</div><!--/.cart-close-->
										</li><!--/.single-cart-list -->
										<li class="single-cart-list">
											<a href="#" class="photo"><img
													src="<?php bloginfo('template_url') ?>/assets/images/collection/arrivals2.png"
													class="cart-thumb" alt="image" /></a>
											<div class="cart-list-txt">
												<h6><a href="#">single <br> armchair</a></h6>
												<p>1 x - <span class="price">$180.00</span></p>
											</div><!--/.cart-list-txt-->
											<div class="cart-close">
												<span class="lnr lnr-cross"></span>
											</div><!--/.cart-close-->
										</li><!--/.single-cart-list -->
										<li class="single-cart-list">
											<a href="#" class="photo"><img
													src="<?php bloginfo('template_url') ?>/assets/images/collection/arrivals3.png"
													class="cart-thumb" alt="image" /></a>
											<div class="cart-list-txt">
												<h6><a href="#">wooden arn <br> chair</a></h6>
												<p>1 x - <span class="price">$180.00</span></p>
											</div><!--/.cart-list-txt-->
											<div class="cart-close">
												<span class="lnr lnr-cross"></span>
											</div><!--/.cart-close-->
										</li><!--/.single-cart-list -->
										<li class="total">
											<span>Total: $0.00</span>
											<button class="btn-cart pull-right" onclick="window.location.href='#'">view
												cart</button>
										</li>
									</ul>
								</li><!--/.dropdown-->
							</ul>
						</div><!--/.attr-nav-->
						<!-- End Atribute Navigation -->

						<!-- Start Header Navigation -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse"
								data-target="#navbar-menu">
								<i class="fa fa-bars"></i>
							</button>
							<a class="navbar-brand" href="index.html">furn.</a>

						</div><!--/.navbar-header-->
						<!-- End Header Navigation -->

						<!-- Collect the nav links, forms, and other content for toggling -->
						<?php
						if (has_nav_menu('menu-1')) { ?>
							<div id="navbar-menu" class="collapse navbar-collapse menu-ui-design" data-in="fadeInDown"
								data-out="fadeOutUp">
								<?php
								wp_nav_menu(
									array(
										'container' => '',
										'menu_class' => 'nav navbar-nav navbar-center',
										'menu_id' => '',
										'echo' => true,
										'add_li_class' => 'scroll'
									)
								); ?>
							</div>
						<?php } else { ?>
							<div class="collapse navbar-collapse menu-ui-design" id="navbar-menu">
								<ul class="nav navbar-nav navbar-center" data-in="fadeInDown" data-out="fadeOutUp">
									<li class="scroll active"><a href="#home">home</a></li>
									<li class="scroll"><a href="#new-arrivals">new arrival</a></li>
									<li class="scroll"><a href="#feature">features</a></li>
									<li class="scroll"><a href="#blog">blog</a></li>
									<li class="scroll"><a href="#newsletter">contact</a></li>
								</ul><!--/.nav -->
							</div><!-- /.navbar-collapse -->
						<?php } ?>
					</div><!--/.container-->
				</nav><!--/nav-->
				<!-- End Navigation -->
			</div><!--/.header-area-->
			<div class="clearfix"></div>

		</div><!-- /.top-area-->
		<!-- top-area End -->

	</header><!--/.welcome-hero-->
	<!--welcome-hero end -->