<?php
/**
 * Displays top navigation
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>
<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php _e( 'Top Menu', 'twentyseventeen' ); ?>">
	<button class="menu-toggle" aria-controls="top-menu" aria-expanded="false"><?php echo twentyseventeen_get_svg( array( 'icon' => 'bars' ) ); echo twentyseventeen_get_svg( array( 'icon' => 'close' ) ); _e( 'Menu', 'twentyseventeen' ); ?></button>
		<svg viewBox="0 0 454.20001 150" height="30" version="1.1" id="site-logo">
	<path
		id="path4138"
		d="m 140.9098,149.90659 c -9.33161,-4.25413 3.4846,-42.52062 -11.69392,-23.86974 C 101.58894,157.98224 46.533993,157.32513 19.218305,125.23664 -8.6662509,95.936704 -5.6694224,44.390669 25.71677,18.695894 c 29.666084,-27.4263099 81.14585,-22.9716603 106.24291,8.525372 15.33972,17.267976 18.51696,41.106095 17.16711,63.321795 -0.55472,19.197329 1.33027,38.781499 -0.87576,57.748029 -1.70321,2.44627 -4.92895,1.46905 -7.34123,1.6155 z M 79.042316,137.89348 C 115.35578,136.55777 143.73649,98.897961 136.15836,63.673533 131.03281,30.669606 96.285384,6.8764304 63.65163,13.434839 29.123056,18.417032 4.3962584,55.745906 13.256517,89.508524 19.850717,119.00962 48.87437,140.55529 79.042316,137.89348 Z M 181.4848,149.89457 c -8.67126,-12.32122 -1.25722,-32.78488 -3.7495,-48.12369 -0.0345,-22.916935 -2.27474,-47.890204 12.19805,-67.480471 12.5759,-19.27959 34.81462,-32.8777447 58.04406,-32.9863873 8.90411,18.3455353 -24.80216,11.1852183 -33.25585,23.8566663 -18.14846,12.922548 -27.25174,35.551366 -25.33012,57.491993 -0.33616,21.511219 0.24061,43.054879 -0.69375,64.546689 -0.88908,3.1804 -4.67621,2.87471 -7.21289,2.6952 z m 164.47501,-0.16469 C 331.0746,141.93257 331.10501,119.09001 322.30285,105.32501 308.66503,71.359098 293.68457,37.770483 280.98237,3.5318317 c 16.10714,-10.6828887 18.05397,20.4450913 24.7227,30.3594073 13.64003,32.823009 26.75467,65.903186 40.71004,98.573191 10.66823,-10.21612 13.76279,-32.12801 21.70806,-46.492175 11.77527,-27.844183 22.42117,-56.299146 34.90959,-83.7643147 22.56361,-6.5172396 1.21458,21.9661357 -0.74835,31.9204067 -15.88496,37.602038 -30.46973,75.853103 -47.15559,113.052093 -2.19293,2.69661 -6.01735,2.74123 -9.16901,2.54944 z m 99.91527,-0.27534 c -6.20389,-3.0118 -1.892,-12.0647 -3.18143,-17.78291 -0.0232,-42.539844 -0.15476,-85.079981 -0.0365,-127.6196283 16.02144,-13.2198498 10.72848,18.4701463 11.44476,27.7776563 -0.14462,38.269953 0.34229,76.560542 -0.27829,114.817382 -1.02582,3.42631 -5.13614,3.37683 -7.9485,2.8075 z"/>
	</svg>
	<?php wp_nav_menu( array(
		'theme_location' => 'top',
		'menu_id'        => 'top-menu',
	) ); ?>
</nav><!-- #site-navigation -->
