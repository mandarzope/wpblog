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
					
					<div id="newsletter" class="subscribe-component subscribe-component-bottom">
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