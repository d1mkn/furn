<?php
get_header()
	?>

<?php
$args = array(
	'post_type' => 'populer-products',
	'posts_per_page' => -1,
);

$populer_query = new WP_Query($args);
$i = 1;

if ($populer_query->have_posts()): ?>
	<!--populer-products start -->
	<section id="populer-products" class="populer-products">
		<div class="container">
			<div class="populer-products-content">
				<div class="row">
					<?php while ($populer_query->have_posts()):
						$populer_query->the_post();
						$post_image_id = get_post_meta(get_the_ID(), 'product_image', true);
						$product_image = wp_get_attachment_image_src($post_image_id, 'full')[0];
						$product_title = get_post_meta(get_the_ID(), 'product_title', true);
						$product_description = get_post_meta(get_the_ID(), 'product_description', true);
						$min_price = get_post_meta(get_the_ID(), 'min_price', true);

						if ($i !== 2): ?>
							<div class="col-md-3">
								<div class="single-populer-products">
									<div class="single-populer-product-img <?php if ($i === 3)
										echo "mt40" ?>">
										<img src="<?php echo $product_image ?>" alt="populer-products images">
									</div>
									<h2><a href="#">
											<?php echo $product_title ?>
										</a></h2>
									<div class="single-populer-products-para">
										<p>
											<?php echo $product_description ?>
										</p>
									</div>
								</div>
							</div>

						<?php else: ?>

							<div class="col-md-6">
								<div class="single-populer-products">
									<div class="single-inner-populer-products">
										<div class="row">
											<div class="col-md-4 col-sm-12">
												<div class="single-inner-populer-product-img">
													<img src="<?php echo $product_image ?>" alt="populer-products images">
												</div>
											</div>
											<div class="col-md-8 col-sm-12">
												<div class="single-inner-populer-product-txt">
													<h2>
														<a href="#">
															<?php echo $product_title ?>
														</a>
													</h2>
													<p>
														<?php echo $product_description ?>
													</p>
													<div class="populer-products-price">
														<h4>Sales Start from <span>
																<?php echo $min_price ?>
															</span></h4>
													</div>
													<button class="btn-cart welcome-add-cart populer-products-btn"
														onclick="window.location.href='#'">
														discover more
													</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php endif ?>
					<?php $i += 1;
					endwhile;
					wp_reset_postdata(); ?>
				</div>
			</div>
		</div><!--/.container-->

	</section><!--/.populer-products-->
	<!--populer-products end-->
<?php endif;
?>

<?php
$args = array(
	'post_type' => 'new-arrivals',
	'posts_per_page' => 8,
	'order' => 'ASC'
);

$new_arrivals_query = new WP_Query($args);

if ($new_arrivals_query->have_posts()): ?>
	<!--new-arrivals start -->
	<section id="new-arrivals" class="new-arrivals">
		<div class="container">
			<div class="section-header">
				<h2>new arrivals</h2>
			</div><!--/.section-header-->
			<div class="new-arrivals-content">
				<div class="row">
					<?php while ($new_arrivals_query->have_posts()):
						$new_arrivals_query->the_post();
						$post_image_id = get_post_meta(get_the_ID(), 'item_image', true);
						$item_image = wp_get_attachment_image_src($post_image_id, 'full')[0];
						$item_title = get_post_meta(get_the_ID(), 'item_title', true);
						$item_price = get_post_meta(get_the_ID(), 'item_price', true);
						$on_sale = get_post_meta(get_the_ID(), 'on_sale', true); ?>

						<div class="col-md-3 col-sm-4">
							<div class="single-new-arrival">
								<div class="single-new-arrival-bg">
									<img src="<?php echo $item_image ?>" alt="new-arrivals images">
									<div class="single-new-arrival-bg-overlay"></div>
									<?php
									if ($on_sale) { ?>
										<div class="sale bg-<?php echo mt_rand(1, 2) ?>">
											<p>sale</p>
										</div>
									<?php }
									?>
									<div class="new-arrival-cart">
										<p>
											<span class="lnr lnr-cart"></span>
											<a href="#">add <span>to </span> cart</a>
										</p>
										<p class="arrival-review pull-right">
											<span class="lnr lnr-heart"></span>
											<span class="lnr lnr-frame-expand"></span>
										</p>
									</div>
								</div>
								<h4><a href="#">
										<?php echo $item_title ?>
									</a></h4>
								<p class="arrival-product-price">
									<?php echo $item_price ?>
								</p>
							</div>
						</div>

					<?php endwhile;
endif;
wp_reset_postdata(); ?>

			</div>
		</div>
	</div><!--/.container-->

</section><!--/.new-arrivals-->
<!--new-arrivals end -->

<!--sofa-collection start -->
<section id="sofa-collection">
	<div class="owl-carousel owl-theme" id="collection-carousel">
		<div class="sofa-collection collectionbg1">
			<div class="container">
				<div class="sofa-collection-txt">
					<h2>unlimited sofa collection</h2>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
						ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
						laboris nisi ut aliquip ex ea commodo consequat.
					</p>
					<div class="sofa-collection-price">
						<h4>strting from <span>$ 199</span></h4>
					</div>
					<button class="btn-cart welcome-add-cart sofa-collection-btn" onclick="window.location.href='#'">
						view more
					</button>
				</div>
			</div>
		</div><!--/.sofa-collection-->
		<div class="sofa-collection collectionbg2">
			<div class="container">
				<div class="sofa-collection-txt">
					<h2>unlimited dainning table collection</h2>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
						ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
						laboris nisi ut aliquip ex ea commodo consequat.
					</p>
					<div class="sofa-collection-price">
						<h4>strting from <span>$ 299</span></h4>
					</div>
					<button class="btn-cart welcome-add-cart sofa-collection-btn" onclick="window.location.href='#'">
						view more
					</button>
				</div>
			</div>
		</div><!--/.sofa-collection-->
	</div><!--/.collection-carousel-->

</section><!--/.sofa-collection-->
<!--sofa-collection end -->

<!--feature start -->
<section id="feature" class="feature">
	<div class="container">
		<div class="section-header">
			<h2>featured products</h2>
		</div><!--/.section-header-->
		<div class="feature-content">
			<div class="row">
				<div class="col-sm-3">
					<div class="single-feature">
						<img src="<?php bloginfo('template_url') ?>/assets/images/features/f1.jpg" alt="feature image">
						<div class="single-feature-txt text-center">
							<p>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<span class="spacial-feature-icon"><i class="fa fa-star"></i></span>
								<span class="feature-review">(45 review)</span>
							</p>
							<h3><a href="#">designed sofa</a></h3>
							<h5>$160.00</h5>
						</div>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="single-feature">
						<img src="<?php bloginfo('template_url') ?>/assets/images/features/f2.jpg" alt="feature image">
						<div class="single-feature-txt text-center">
							<p>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<span class="spacial-feature-icon"><i class="fa fa-star"></i></span>
								<span class="feature-review">(45 review)</span>
							</p>
							<h3><a href="#">dinning table </a></h3>
							<h5>$200.00</h5>
						</div>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="single-feature">
						<img src="<?php bloginfo('template_url') ?>/assets/images/features/f3.jpg" alt="feature image">
						<div class="single-feature-txt text-center">
							<p>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<span class="spacial-feature-icon"><i class="fa fa-star"></i></span>
								<span class="feature-review">(45 review)</span>
							</p>
							<h3><a href="#">chair and table</a></h3>
							<h5>$100.00</h5>
						</div>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="single-feature">
						<img src="<?php bloginfo('template_url') ?>/assets/images/features/f4.jpg" alt="feature image">
						<div class="single-feature-txt text-center">
							<p>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<span class="spacial-feature-icon"><i class="fa fa-star"></i></span>
								<span class="feature-review">(45 review)</span>
							</p>
							<h3><a href="#">modern arm chair</a></h3>
							<h5>$299.00</h5>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div><!--/.container-->

</section><!--/.feature-->
<!--feature end -->

<!--blog start -->
<section id="blog" class="blog">
	<div class="container">
		<div class="section-header">
			<h2>latest blog</h2>
		</div><!--/.section-header-->
		<div class="blog-content">
			<div class="row">
				<div class="col-sm-4">
					<div class="single-blog">
						<div class="single-blog-img">
							<img src="<?php bloginfo('template_url') ?>/assets/images/blog/b1.jpg" alt="blog image">
							<div class="single-blog-img-overlay"></div>
						</div>
						<div class="single-blog-txt">
							<h2><a href="#">Why Brands are Looking at Local Language</a></h2>
							<h3>By <a href="#">Robert Norby</a> / 18th March 2018</h3>
							<p>
								Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
								consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt....
							</p>
						</div>
					</div>

				</div>
				<div class="col-sm-4">
					<div class="single-blog">
						<div class="single-blog-img">
							<img src="<?php bloginfo('template_url') ?>/assets/images/blog/b2.jpg" alt="blog image">
							<div class="single-blog-img-overlay"></div>
						</div>
						<div class="single-blog-txt">
							<h2><a href="#">Why Brands are Looking at Local Language</a></h2>
							<h3>By <a href="#">Robert Norby</a> / 18th March 2018</h3>
							<p>
								Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
								consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt....
							</p>
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="single-blog">
						<div class="single-blog-img">
							<img src="<?php bloginfo('template_url') ?>/assets/images/blog/b3.jpg" alt="blog image">
							<div class="single-blog-img-overlay"></div>
						</div>
						<div class="single-blog-txt">
							<h2><a href="#">Why Brands are Looking at Local Language</a></h2>
							<h3>By <a href="#">Robert Norby</a> / 18th March 2018</h3>
							<p>
								Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
								consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt....
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div><!--/.container-->

</section><!--/.blog-->
<!--blog end -->

<!-- clients strat -->
<section id="clients" class="clients">
	<div class="container">
		<div class="owl-carousel owl-theme" id="client">
			<div class="item">
				<a href="#">
					<img src="<?php bloginfo('template_url') ?>/assets/images/clients/c1.png" alt="brand-image" />
				</a>
			</div><!--/.item-->
			<div class="item">
				<a href="#">
					<img src="<?php bloginfo('template_url') ?>/assets/images/clients/c2.png" alt="brand-image" />
				</a>
			</div><!--/.item-->
			<div class="item">
				<a href="#">
					<img src="<?php bloginfo('template_url') ?>/assets/images/clients/c3.png" alt="brand-image" />
				</a>
			</div><!--/.item-->
			<div class="item">
				<a href="#">
					<img src="<?php bloginfo('template_url') ?>/assets/images/clients/c4.png" alt="brand-image" />
				</a>
			</div><!--/.item-->
			<div class="item">
				<a href="#">
					<img src="<?php bloginfo('template_url') ?>/assets/images/clients/c5.png" alt="brand-image" />
				</a>
			</div><!--/.item-->
		</div><!--/.owl-carousel-->

	</div><!--/.container-->

</section><!--/.clients-->
<!-- clients end -->

<!--newsletter strat -->
<section id="newsletter" class="newsletter">
	<div class="container">
		<div class="hm-footer-details">
			<div class="row">
				<div class=" col-md-3 col-sm-6 col-xs-12">
					<div class="hm-footer-widget">
						<div class="hm-foot-title">
							<h4>information</h4>
						</div><!--/.hm-foot-title-->
						<div class="hm-foot-menu">
							<ul>
								<li><a href="#">about us</a></li><!--/li-->
								<li><a href="#">contact us</a></li><!--/li-->
								<li><a href="#">news</a></li><!--/li-->
								<li><a href="#">store</a></li><!--/li-->
							</ul><!--/ul-->
						</div><!--/.hm-foot-menu-->
					</div><!--/.hm-footer-widget-->
				</div><!--/.col-->
				<div class=" col-md-3 col-sm-6 col-xs-12">
					<div class="hm-footer-widget">
						<div class="hm-foot-title">
							<h4>collections</h4>
						</div><!--/.hm-foot-title-->
						<div class="hm-foot-menu">
							<ul>
								<li><a href="#">wooden chair</a></li><!--/li-->
								<li><a href="#">royal cloth sofa</a></li><!--/li-->
								<li><a href="#">accent chair</a></li><!--/li-->
								<li><a href="#">bed</a></li><!--/li-->
								<li><a href="#">hanging lamp</a></li><!--/li-->
							</ul><!--/ul-->
						</div><!--/.hm-foot-menu-->
					</div><!--/.hm-footer-widget-->
				</div><!--/.col-->
				<div class=" col-md-3 col-sm-6 col-xs-12">
					<div class="hm-footer-widget">
						<div class="hm-foot-title">
							<h4>my accounts</h4>
						</div><!--/.hm-foot-title-->
						<div class="hm-foot-menu">
							<ul>
								<li><a href="#">my account</a></li><!--/li-->
								<li><a href="#">wishlist</a></li><!--/li-->
								<li><a href="#">Community</a></li><!--/li-->
								<li><a href="#">order history</a></li><!--/li-->
								<li><a href="#">my cart</a></li><!--/li-->
							</ul><!--/ul-->
						</div><!--/.hm-foot-menu-->
					</div><!--/.hm-footer-widget-->
				</div><!--/.col-->
				<div class=" col-md-3 col-sm-6  col-xs-12">
					<div class="hm-footer-widget">
						<div class="hm-foot-title">
							<h4>newsletter</h4>
						</div><!--/.hm-foot-title-->
						<div class="hm-foot-para">
							<p>
								Subscribe to get latest news,update and information.
							</p>
						</div><!--/.hm-foot-para-->
						<div class="hm-foot-email">
							<div class="foot-email-box">
								<input type="text" class="form-control" placeholder="Enter Email Here....">
							</div><!--/.foot-email-box-->
							<div class="foot-email-subscribe">
								<span><i class="fa fa-location-arrow"></i></span>
							</div><!--/.foot-email-icon-->
						</div><!--/.hm-foot-email-->
					</div><!--/.hm-footer-widget-->
				</div><!--/.col-->
			</div><!--/.row-->
		</div><!--/.hm-footer-details-->

	</div><!--/.container-->

</section><!--/newsletter-->
<!--newsletter end -->

<?php
get_footer();
?>