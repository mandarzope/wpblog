<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/post/content-single', get_post_format() );
					?>
					<?php echo '<div class="social-meta-tags-container">
						<div class="social-meta-tags-social social-meta-tags-facebook">
							<a target="_blank" href="https://www.facebook.com/sharer.php?u='.urlencode(post_permalink($post->ID)).'"></a>
							<span></span></div>
						<div class="social-meta-tags-social social-meta-tags-twitter">
							<a target="_blank" href="https://twitter.com/intent/tweet?text='.urlencode($post->post_title).'&url='.urlencode(post_permalink($post->ID)).'"></a>
							<span></span>
						</div>
						<div class="social-meta-tags-social social-meta-tags-linkedin">						
							<a target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&title='.urlencode($post->post_title).'&url='.urlencode(post_permalink($post->ID)).'&summary='.urlencode($post->post_excerpt).'"></a>	
							<span></span></div>
					</div>';
					?>
					<div id="newsletter" class="subscribe-component subscribe-component-bottom">
						<form id="subscribe" action="#" method="post" onsubmit="return validateSubscribe(this);" novalidate="">
							<h2 class="subscriber-title">Be the first to know!</h2>
							<div class="subscriber-desc hidden">Subscribe to our exclusive mailing list and get the freshest stories from the Lemonade team</div>
							<div class="subscribe-input">
								<div class="hidden" aria-hidden="true"><input type="text" class="hidden" name="honey" id="honey" aria-hidden="true"></div>
								<div class="subscribe-email-wrapper">
									<input type="email" id="subcribe-email" name="subcribe-email" placeholder="EMAIL ADDRESS">
									<div class="subscriber-check"><img src="https://www.askarvi.com/blog/wp-content/themes/twentyseventeen/assets/images/check.png" alt=""></div>
								</div>
								<div class="subscribe-button-wrapper"><input type="submit" id="submit-email" value="SUBSCRIBE" data-track="blog_home.subscribe.clicked"></div>
							</div>
							<h6 class="subscriber-desc">Subscribe to our exclusive mailing list and get the freshest stories from the Teamarvi</h6>
						</form>
					</div>
					
					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					//~ if ( comments_open() || get_comments_number() ) :
						//~ comments_template();
					//~ endif;

					the_post_navigation( array(
						'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'twentyseventeen' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'twentyseventeen' ) . '</span> <span class="nav-title"><span class="nav-title-icon-wrapper">' . twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '</span>%title</span>',
						'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'twentyseventeen' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'twentyseventeen' ) . '</span> <span class="nav-title">%title<span class="nav-title-icon-wrapper">' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ) . '</span></span>',
					) );

				endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
</div><!-- .wrap -->

<?php get_footer();
