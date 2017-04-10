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

	<?php if ( '' !== get_the_post_thumbnail() && ! is_single() ) : ?>
		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>">
				<div class="post-thumbnail" style="background-image: url(<?php the_post_thumbnail_url(); ?>);"></div>
				
				<?php // the_post_thumbnail( 'twentyseventeen-featured-image' ); ?>
			</a>
		</div><!-- .post-thumbnail -->
	<?php endif; ?>

	<header class="entry-header">
		<?php
			echo get_author_tag($post->post_author);

			if ( is_single() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}
		?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			/* translators: %s: Name of current post */
			//~ the_content( sprintf(
				//~ __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ),
				//~ get_the_title()
			//~ ) );
			if ( 'post' === get_post_type() ) :
				$post = get_post( $post );
				twentyseventeen_custom_excerpt($post->post_content, 20);
			endif;
			
	?>
			<div class="post_tags">
				<?php
						$tags = get_the_tags(get_the_ID());
					foreach ( $tags as $tag ) {
						$tag_link = get_tag_link( $tag->term_id );
				?>
					<a href='<?php echo $tag_link; ?>' title=<?php echo $tag->name; ?> Tag' class='<?php echo $tag->slug; ?>'>#<?php echo $tag->name; ?></a>
				<?php
					}
				?>
			</div>
		<?php
			wp_link_pages( array(
				'before'      => '<div class="page-links">' . __( 'Pages:', 'twentyseventeen' ),
				'after'       => '</div>',
				'link_before' => '<span class="page-number">',
				'link_after'  => '</span>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php if ( is_single() ) : ?>
		<?php twentyseventeen_entry_footer(); ?>
	<?php endif; ?>

</article><!-- #post-## -->
