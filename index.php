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
					unset($i);
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

<?php
$args = array(
	'post_type' => 'collection',
	'posts_per_page' => -1,
);

$collection_query = new WP_Query($args);

if ($collection_query->have_posts()): ?>
	<!--sofa-collection start -->
	<section id="sofa-collection">
		<div class="owl-carousel owl-theme" id="collection-carousel">
			<?php while ($collection_query->have_posts()):
				$collection_query->the_post();
				$post_image_id = get_post_meta(get_the_ID(), 'collection_image', true);
				$collection_image = wp_get_attachment_image_src($post_image_id, 'full')[0];
				$collection_title = get_post_meta(get_the_ID(), 'collection_title', true);
				$collection_description = get_post_meta(get_the_ID(), 'collection_description', true);
				$min_price = get_post_meta(get_the_ID(), 'min_price', true); ?>

				<div class="sofa-collection" style="background:url(<?php echo $collection_image ?>) no-repeat;">
					<div class="container">
						<div class="sofa-collection-txt">
							<h2>
								<?php echo $collection_title ?>
							</h2>
							<p>
								<?php echo $collection_description ?>
							</p>
							<div class="sofa-collection-price">
								<h4>strting from <span>
										<?php echo $min_price ?>
									</span></h4>
							</div>
							<button class="btn-cart welcome-add-cart sofa-collection-btn" onclick="window.location.href='#'">
								view more
							</button>
						</div>
					</div>
				</div><!--/.sofa-collection-->
			<?php endwhile;
endif;
wp_reset_postdata(); ?>
	</div><!--/.collection-carousel-->

</section><!--/.sofa-collection-->
<!--sofa-collection end -->

<?php
$args = array(
	'post_type' => 'featured-products',
	'posts_per_page' => -1,
	'order' => 'ASC'
);

$featured_products_query = new WP_Query($args);

if ($featured_products_query->have_posts()): ?>
	<!--feature start -->
	<section id="feature" class="feature">
		<div class="container">
			<div class="section-header">
				<h2>featured products</h2>
			</div><!--/.section-header-->
			<div class="feature-content">
				<div class="row">

					<?php while ($featured_products_query->have_posts()):
						$featured_products_query->the_post();
						$post_image_id = get_post_meta(get_the_ID(), 'product_image', true);
						$product_image = wp_get_attachment_image_src($post_image_id, 'full')[0];
						$product_title = get_post_meta(get_the_ID(), 'product_title', true);
						$product_description = get_post_meta(get_the_ID(), 'product_description', true);
						$product_rating = get_post_meta(get_the_ID(), 'product_rating', true);
						$reviews_count = get_post_meta(get_the_ID(), 'reviews_count', true);
						$product_price = get_post_meta(get_the_ID(), 'product_price', true); ?>
						<div class="col-sm-3">
							<div class="single-feature">
								<img src="<?php echo $product_image ?>" alt="feature image">
								<div class="single-feature-txt text-center">
									<p>
										<?php
										for ($i = 1; $i <= $product_rating; $i++) {
											echo '<i class="fa fa-star"></i>';
										}
										$total_rating = 5;
										$stars = $total_rating - $product_rating;
										for ($i = 0; $i < $stars; $i++) {
											echo '<span class="spacial-feature-icon"><i class="fa fa-star"></i></span>';
										}
										?>
										<span class="feature-review">(
											<?php echo $reviews_count ?> review)
										</span>
									</p>
									<h3><a href="#">
											<?php echo $product_title ?>
										</a></h3>
									<h5>
										<?php echo $product_price ?>
									</h5>
								</div>
							</div>
						</div>
						<?php
					endwhile; ?>
				</div>
			</div>
		</div><!--/.container-->

	</section><!--/.feature-->
	<!--feature end -->
<?php endif;
wp_reset_postdata(); ?>


<?php
$args = array(
	'post_type' => 'blog-post',
	'posts_per_page' => -1,
	'order' => 'ASC'
);

$blog_post_query = new WP_Query($args);

if ($blog_post_query->have_posts()): ?>
	<!--blog start -->
	<section id="blog" class="blog">
		<div class="container">
			<div class="section-header">
				<h2>latest blog</h2>
			</div><!--/.section-header-->
			<div class="blog-content">
				<div class="row">
					<?php while ($blog_post_query->have_posts()):
						$blog_post_query->the_post();
						$post_image_id = get_post_meta(get_the_ID(), 'post_image', true);
						$post_image = wp_get_attachment_image_src($post_image_id, 'full')[0];
						$post_title = get_post_meta(get_the_ID(), 'title', true);
						$post_author = get_post_meta(get_the_ID(), 'author', true);
						$post_date = get_the_date('jS F Y', $post);
						$post_summary = get_post_meta(get_the_ID(), 'summary', true); ?>

						<div class="col-sm-4">
							<div class="single-blog">
								<div class="single-blog-img">
									<img src="<?php echo $post_image ?>" alt="blog image">
									<div class="single-blog-img-overlay"></div>
								</div>
								<div class="single-blog-txt">
									<h2><a href="#">
											<?php echo $post_title ?>
										</a></h2>
									<h3>By <a href="#">
											<?php echo $post_author ?>
										</a> /
										<?php echo $post_date ?>
									</h3>
									<p>
										<?php echo $post_summary ?>
									</p>
								</div>
							</div>

						</div>
						<?php
					endwhile; ?>
				</div>
			</div>
		</div><!--/.container-->

	</section><!--/.blog-->
	<!--blog end -->

<?php endif;
wp_reset_postdata(); ?>


<?php
$args = array(
	'post_type' => 'client',
	'posts_per_page' => -1,
	'order' => 'ASC'
);

$client_query = new WP_Query($args);

if ($client_query->have_posts()): ?>
	<!-- clients strat -->
	<section id="clients" class="clients">
		<div class="container">
			<div class="owl-carousel owl-theme" id="client">
				<?php while ($client_query->have_posts()):
					$client_query->the_post();
					$post_image_id = get_post_meta(get_the_ID(), 'client_image', true);
					$client_image = wp_get_attachment_image_src($post_image_id, 'full')[0]; ?>

					<div class="item">
						<a href="#">
							<img src="<?php echo $client_image ?>" alt="brand-image" />
						</a>
					</div><!--/.item-->
				<?php endwhile; ?>
			</div><!--/.owl-carousel-->

		</div><!--/.container-->

	</section><!--/.clients-->
	<!-- clients end -->
<?php endif;
wp_reset_postdata(); ?>


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