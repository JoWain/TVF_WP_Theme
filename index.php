<?php get_header(); ?>

<body <?php body_class(); ?> >

	<div id="smallscreen-head" class="sticky-header">
		<label for="sidetoggler" class="toggle">☰</label>
	</div>

	<div id="navi" class="sticky-header">

		<input type="checkbox" id="sidetoggler">

		<?php //Main-Navigation

		wp_nav_menu( array(
			'theme_location' => 'primary'
			)
		);

		?>
	</div>
	<!-- end navigation -->

	<div id="content-wrapper">

		<div id="page-top">

			<?php //Page-Top-Loop: Used to display the custom title-image and setup a reference-var for custom-wp-queries.

			if ( have_posts() ) {

				while ( have_posts() ) { the_post();

					$tvf_page_id = $post->ID; //Page self-reference init
					$tvf_page_slug = $post->post_name; //Page get-right-posts init

					?>

					<div id="titelbild" style="background-image: url(<?php the_post_thumbnail_url( 'full' ); ?>);">

						<span class="logo">

							<?php
								get_template_part( 'logos/logo' , $tvf_page_slug );
							?>

						</span>

					</div>

					<div id="titel-schriftzug">

						<h1>
							<?php the_title(); ?>
						</h1>

					</div>

					<?php

				}

			}

			?>

		</div>
		<!-- end page top -->

		<div id="page-main" class="flex-container">

			<div class="table-of-contents box">

				<!-- Here we build the ToC -->

				<?php

				$tvf_subpages_query = new WP_Query(

					array(
						'post_type' => 'page' ,
						'posts_per_page' => -1 ,
						'post_parent' => $tvf_page_id ,
						'order' => 'ASC' ,
						'orderby' => 'menu_order'
					)

				);

				$tvf_blog_query = new WP_Query(

					array(
					'category_name' => $tvf_page_slug,
					'posts_per_page' => 3,
					'nopaging' => true
					)

				);

				if ( $tvf_blog_query->have_posts() ) {

					echo '<a class="localnav haveablog" href="#blogtitle">Blog</a>';

				}

				if ( $tvf_subpages_query->have_posts() ) {

					while ( $tvf_subpages_query->have_posts() ) { $tvf_subpages_query->the_post();
						?>

						<a class="localnav" href="#<?php the_ID(); ?>title"><?php the_title(); ?></a>

						<?php
					}

				}

				wp_reset_postdata();

				?>


			</div>
			<!-- end table of contents -->

			<div class="page-content box">

				<!-- Here we print the page content -->

				<!-- if we have a blog we print it here -->

				<?php

				$tvf_blog_query = new WP_Query(

					array(
					'category_name' => $tvf_page_slug,
					'posts_per_page' => 3,
					'nopaging' => false
					)

				);

				if ( $tvf_blog_query->have_posts() ) {

					echo '<div id="blog-wrapper" class="content-part">';

					echo '<h1 id="blogtitle" class="haveablog">Blog</h1>';

				}

				if ( $tvf_blog_query->have_posts() ) {

					while ( $tvf_blog_query->have_posts() ) { $tvf_blog_query->the_post();
						?>
						<article class="blogpost">

							<?php if (has_post_thumbnail()) {
								echo '<div class="blogpost-image" style="background-image: url(';

								the_post_thumbnail_url( 'large' );
								echo ');"></div>';
							} ?>

							<div class="blogpost-text">
								<h2><?php the_title(); ?></h2>
								<p><?php the_content(); ?></p>
								<h3><?php the_author(); ?>, <?php the_date(); ?></h3>
							</div>

						</article>

						<?php
					}

				}

				if ( $tvf_blog_query->have_posts() ) {

					echo '</div>';

				}

				wp_reset_postdata();
				?>

				<!-- now we print the subpages -->
				<?php

					$tvf_subpages_query = new WP_Query(

						array(
							'post_type' => 'page' ,
							'posts_per_page' => -1 ,
							'post_parent' => $tvf_page_id ,
							'order' => 'ASC' ,
							'orderby' => 'menu_order'
						)

					);

					if ( $tvf_subpages_query->have_posts() ) {

						while ( $tvf_subpages_query->have_posts() ) { $tvf_subpages_query->the_post();
							?>

							<div class="content-part">

								<article class="subpage">

									<?php if (has_post_thumbnail()) {
										echo '<div class="subpage-image" style="background-image: url(';

										the_post_thumbnail_url( 'large' );

										echo ');"></div>';
									} ?>

									<div class="subpage-text">

										<h1 id="<?php the_ID(); ?>title"><?php the_title(); ?></h1>
										<div class="subpagecontent"> 				<?php the_content(); ?>
										</div>

									</div>

								</article>

							</div>

							<?php
						}

					}

					wp_reset_postdata();

				?>

			</div>
			<!-- end page content -->

			<div class="widget-area box">

				<!-- Here we establish the Widgets -->

					<?php

					switch ($tvf_page_slug) {
						case 'turnverein':
						dynamic_sidebar('widgets-right-tv');
						break;

						case 'faustball':
						dynamic_sidebar('widgets-right-fb');
						break;

						case 'jugendriege':
						dynamic_sidebar('widgets-right-jr');
						break;

						case 'madchenriege':
						dynamic_sidebar('widgets-right-maer');
						break;

						case 'mannerriege':
						dynamic_sidebar('widgets-right-mr');
						break;

						case 'damenturnverein':
						dynamic_sidebar('widgets-right-dtv');
						break;

						case 'elki-turnen':
						dynamic_sidebar('widgets-right-elki');
						break;

						default:
						echo '<p>Keine Seitenleiste eingerichtet</p>';
						break;
					}

					?>


			</div>
			<!-- end widget area -->

		</div>
		<!-- end page-main -->

		<div id="page-bottom" class="bottomline">

			<div class="contact-area">

				<?php dynamic_sidebar('bottomline-1'); ?>

			</div>

			<div class="contact-area">

				<?php dynamic_sidebar('bottomline-2'); ?>

			</div>

		</div>
		<!-- end page-bottom -->

	</div>
	<!-- end content wrapper -->

	<!-- end of visible page -->

	<?php wp_footer(); ?>

</body>

</html>
