<?php get_header(); ?>

<body <?php body_class(); ?> >

	<div id="smallscreen-head">
		<label for="sidetoggler" class="toggle">☰</label>
	</div>

	<div id="navi">

		<input type="checkbox" id="sidetoggler">

		<?php //Main-Navigation

		wp_nav_menu( array(
			'theme_location' => 'primary'
		)
	);

	?>
</div>



<div id="content-wrapper"> <!-- page content wpapper -->

	<div id="page-top">

		<?php //Page-Top-Loop: Used to display the custom title-image and setup a reference-var for custom-wp-queries.

		if ( have_posts() ) {

			while ( have_posts() ) { the_post();

				$tvf_page_id = $post->ID; //Page self-reference init
				$tvf_page_slug = $post->post_name; //Page get-right-posts init

				?>

				<div id="titelbild" class="header-bild-container">

					<?php the_post_thumbnail( 'large' ); ?>

				</div>

				<?php

			}

		}

		?>

	</div>
	<!-- end page top -->

	<div id="page-main" class="grid-container">
		<!-- grid container -->

		<div class="grid">
			<!-- grid -->

			<div class="table-of-contents grid__col grid__col--1-of-5">

				<!-- Here we will build the ToC -->
				<div class="box">



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

				$tvf_blog_query = new WP_Query( array( 'category_name' => $tvf_page_slug ));

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
			</div>
			<!-- end table of contents -->

			<div class="page-content grid__col grid__col--3-of-5">

			<div class="box">

				<div class="blog-wrapper">


					<?php

					$tvf_blog_query = new WP_Query( array( 'category_name' => $tvf_page_slug ));

					if ( $tvf_blog_query->have_posts() ) {

						echo '<h1 id="blogtitle" class="haveablog">Blog</h1>';

					}

					if ( $tvf_blog_query->have_posts() ) {

						while ( $tvf_blog_query->have_posts() ) { $tvf_blog_query->the_post();
							?>

							<h2><?php the_title(); ?></h2>
							<p><?php the_content(); ?></p>

							<?php
						}

					}

					wp_reset_postdata();
					?>

				</div>

				<div class="subpages-wrapper">


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
							<figure class="subpageimage">

								<?php the_post_thumbnail(); ?>

							</figure>

							<article>

								<h1 id="<?php the_ID(); ?>title"><?php the_title(); ?></h1>
								<p class="subpagecontent"><?php the_content(); ?></p>

							</article>

							<?php
						}

					}

					wp_reset_postdata();

				?>

				</div>

			</div>

			</div>
			<!-- end page content -->

			<div class="widget-area grid__col grid__col--1-of-5">

				<!-- Here we will establish the Widgets -->
				<div class="box">
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

			</div>
			<!-- end widget area -->

		</div>
		<!-- end grid -->

	</div>
	<!-- end page-main -->

	<div id="page-bottom" class="bottomline">

		<div class="grid-container">

			<div class="grid">

				<div class="grid__col grid__col--1-of-5">

					<div class="contact-area">

						<?php dynamic_sidebar('bottomline-1'); ?>

					</div>

				</div>

				<div class="grid__col grid__col--1-of-5">

					<div class="contact-area">

						<?php dynamic_sidebar('bottomline-2'); ?>

					</div>

				</div>

				<div class="grid__col grid__col--1-of-5">

					<div class="contact-area">

						<?php dynamic_sidebar('bottomline-3'); ?>

					</div>

				</div>

				<div class="grid__col grid__col--1-of-5">

					<div class="contact-area">

						<?php dynamic_sidebar('bottomline-4'); ?>

					</div>

				</div>

				<div class="grid__col grid__col--1-of-5">

					<div class="contact-area">

						<?php dynamic_sidebar('bottomline-5'); ?>

					</div>

				</div>

			</div>

		</div>
		<!-- end grid container 2 -->

	</div>
	<!-- end page-bottom -->

</div>
<!-- end page content wrapper -->
<!-- end of visible page -->

<?php wp_footer(); ?>

</body>

</html>
