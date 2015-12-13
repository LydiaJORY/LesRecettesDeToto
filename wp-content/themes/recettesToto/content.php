<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

<div class="col-md-6 col-xs-12 no-gutter">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<div class="article__thumbnail">
			<?php twentyfifteen_post_thumbnail(); ?>
		</div>

		<div class="article__content">
			<?php
				if ( is_single() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
				endif;
			?>
			<?php the_content(); ?>
		</div>

	</article>
</div>
