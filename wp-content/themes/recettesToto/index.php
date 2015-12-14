<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
	<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/style.css" rel="stylesheet">
</head>
<body <?php body_class(); ?>>
	<div class="main">
		<?php get_sidebar(); ?>

		<section class="content">

			<div class="stickyAricle">
				<?php
					$query = new WP_Query( array(
						'posts_per_page'      => 1,
						'post__in'            => get_option( 'sticky_posts' ),
						'ignore_sticky_posts' => 1,
					) );
					$query->the_post();
				?>
				<a href="<?php esc_url( the_permalink() ) ?>">
					<div class="stickyArticle__cover">
						<?php
							the_post_thumbnail( 'full');
						?>
					</div>
					<div class="stickyArticle__content">
						<h1 class="stickyArticle__title"><?php the_title(); ?></h1>
						<?php the_excerpt(); ?>
					</div>
				</a>
			</div>
				

				<div class="titreSection salee">
					Recettes Salées
				</div>
			<div class="articles">
				<?php

				$query = new WP_Query( array( 'category_name' => 'recettes-salees', 'posts_per_page' => 4 ) );

					if ( $query->have_posts() ):
						while ( $query->have_posts() ) : $query->the_post();
							/*
							 * Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */

							get_template_part( 'content', get_post_format() );
							// End the loop.
						endwhile;

					// If no content, include the "No posts found" template.
					else :
						get_template_part( 'content', 'none' );
					endif;
				?>
			</div>
			
			<div>
				<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/banniere_ustencile.png" alt="">
			</div>


			<div class="titreSection sucree">
				Recettes Sucrées
			</div>

			<div class="articles">
				<?php

				$query = new WP_Query( array( 'category_name' => 'recettes-sucrees', 'posts_per_page' => 4 ) );

					if ( $query->have_posts() ):
						while ( $query->have_posts() ) : $query->the_post();
							/*
							 * Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */

							get_template_part( 'content', get_post_format() );
							// End the loop.
						endwhile;

					// If no content, include the "No posts found" template.
					else :
						get_template_part( 'content', 'none' );
					endif;
				?>
			</div>


		</section>



	</div>


	<?php get_footer(); ?>
