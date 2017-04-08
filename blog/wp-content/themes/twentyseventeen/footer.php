<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>

		</div><!-- #content -->

		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="wrap">
				<?php
				get_template_part( 'template-parts/footer/footer', 'widgets' );

				if ( has_nav_menu( 'social' ) ) : ?>
					<nav class="social-navigation" role="navigation" aria-label="<?php _e( 'Footer Social Links Menu', 'twentyseventeen' ); ?>">
						<?php
							wp_nav_menu( array(
								'theme_location' => 'social',
								'menu_class'     => 'social-links-menu',
								'depth'          => 1,
								'link_before'    => '<span class="screen-reader-text">',
								'link_after'     => '</span>' . twentyseventeen_get_svg( array( 'icon' => 'chain' ) ),
							) );
						?>
					</nav><!-- .social-navigation -->
				<?php endif;

				get_template_part( 'template-parts/footer/site', 'info' );
				?>
			</div><!-- .wrap -->
		</footer><!-- #colophon -->
	</div><!-- .site-content-contain -->
</div><!-- #page -->
<?php wp_footer(); ?>
<script>
	function validateSubscribe(form) {
		var email = jQuery('#subcribe-email').val(); //document.getElementById("subcribe-email").value;
		if (!validateEmail(email)){
			jQuery('#subcribe-email').addClass("inValid");
		} else {
			var postData = {
				"phone": "",
				"name": "Blog Visitor",
				"email": email,
				"source": "blog"
			}
			var submitButton = document.getElementById("submit-email").setAttribute("disabled", true);
			jQuery.ajax({
				url: "https://api.askarvi.com/user/subscribe",
				type: 'POST',
				crossDomain: true,
				dataType: 'json',
				headers: {
					Accept : "application/json; charset=utf-8"
				},
				data: postData,
				success: function(result){
					jQuery("#subcribe-email").prop('disabled', true);
					jQuery('.subscriber-desc').html("You're In!");
					jQuery('.subscribe-email-wrapper').addClass('done');
					jQuery('.subscribe-button-wrapper').remove();
				}
			});
		}
		console.log("form submit called");
		return false;
	}
	function validateEmail(email) {
	  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	  return re.test(email);
	}
</script>
</body>
</html>
