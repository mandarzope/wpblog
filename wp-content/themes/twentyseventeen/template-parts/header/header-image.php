<?php
/**
 * Displays header media
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>
<div class="custom-header">

	<div class="custom-header-media">
		
	<?php if ( is_front_page() ) :?>
		<?php the_custom_header_markup(); ?>
	<?php elseif ( '' !== get_the_post_thumbnail() && is_single() ) :  ?>
		<div class="post-thumbnail">
			<?php the_post_thumbnail( 'twentyseventeen-featured-image' ); ?>
		</div><!-- .post-thumbnail -->
	<?php endif; ?>
		
		
		<div class="custom-header-media-overlay"></div>
	</div>

	<?php get_template_part( 'template-parts/header/site', 'branding' ); ?>
</div><!-- .custom-header -->
