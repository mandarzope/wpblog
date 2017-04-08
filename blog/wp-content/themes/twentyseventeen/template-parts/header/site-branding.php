<?php
/**
 * Displays header site branding
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>
<div class="site-branding">
	<div class="wrap">

		<?php the_custom_logo(); ?>

		<div class="site-branding-text">
			<?php if ( is_front_page() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php $description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) : ?>
					<p class="site-description"><?php echo $description; ?></p>
				<?php endif; ?>
			<?php else : ?>
				<?php if ( 'post' === get_post_type() ) : ?>
				<h1 class="site-title">
				<?php
					single_post_title();
				?>
				</h1>
				
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
				<?php else: ?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php endif; ?>
			<?php endif; ?>
		</div><!-- .site-branding-text -->

		<?php if ( ( twentyseventeen_is_frontpage() || ( is_home() && is_front_page() ) )) : ?>
		<div id="newsletter" class="subscribe-component">
			<form id="subscribe" action="#" method="post" onsubmit="return validateSubscribe(this);" novalidate="">
				<div class="subscriber-desc hidden">Subscribe to our exclusive mailing list and get the freshest stories from the Lemonade team</div>
				<div class="subscribe-input">
					<div class="hidden" aria-hidden="true"><input type="text" class="hidden" name="honey" id="honey" aria-hidden="true"></div>
					<div class="subscribe-email-wrapper">
						<input type="email" id="subcribe-email" name="subcribe-email" placeholder="EMAIL ADDRESS">
						<div class="subscriber-check"><img src="https://www.askarvi.com/blog/wp-content/themes/twentyseventeen/assets/images/check.png" alt=""></div>
					</div>
					<div class="subscribe-button-wrapper"><input type="submit" id="submit-email" value="SUBSCRIBE" data-track="blog_home.subscribe.clicked"></div>
				</div>
			</form>
		</div>
	<?php endif; ?>
	<?php if ( ( twentyseventeen_is_frontpage() || ( is_home() && is_front_page() ) ) && has_custom_header() ) : ?>
		<a href="#content" class="menu-scroll-down"><?php echo twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ); ?><span class="screen-reader-text"><?php _e( 'Scroll down to content', 'twentyseventeen' ); ?></span></a>
	<?php endif; ?>	
	</div><!-- .wrap -->
</div><!-- .site-branding -->
