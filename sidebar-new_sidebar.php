<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package universal-theme
 */

if ( ! is_active_sidebar( 'new_sidebar' ) ) {
	return;
}
?>

<aside id="secondary2" class="sidebar-new">
	<?php dynamic_sidebar( 'new_sidebar' ); ?>
</aside><!-- #secondary -->
