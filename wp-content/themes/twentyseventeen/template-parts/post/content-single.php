<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		if ( is_sticky() && is_home() ) :
			echo twentyseventeen_get_svg( array( 'icon' => 'thumb-tack' ) );
		endif;
	?>

	<?php if ( '' !== get_the_post_thumbnail() && ! is_single() && false) : ?>
		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>">
				<div class="post-thumbnail" style="background-image: url(<?php the_post_thumbnail_url(); ?>);"></div>
				
				<?php // the_post_thumbnail( 'twentyseventeen-featured-image' ); ?>
			</a>
		</div><!-- .post-thumbnail -->
	<?php endif; ?>
	<div class="entry-content">
		<?php
			/* translators: %s: Name of current post */
			echo wpautop(get_the_content());
			//~ wpautop(the_content( sprintf(
				//~ __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ),
				//~ get_the_title()
			//~ ) ));
			
			wp_link_pages( array(
				'before'      => '<div class="page-links">' . __( 'Pages:', 'twentyseventeen' ),
				'after'       => '</div>',
				'link_before' => '<span class="page-number">',
				'link_after'  => '</span>',
			) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
