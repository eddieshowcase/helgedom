<?php
/**
 * Template part for off canvas menu
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

<nav class="mobile-off-canvas-menu off-canvas position-left grid-x p" id="<?php foundationpress_mobile_menu_id(); ?>" data-off-canvas data-auto-focus="false" role="navigation">
<div class="cell">
	<div class="image-circle mb">
		<img class="image-circle-crop" src="http://helgedom.com/images/trio_20171031_sm.jpg">
	</div>

	<ul class="vertical menu mb">
		<?php wp_list_pages( array( 'title_li' => '' ) ); ?>
	</ul>

	<?php get_search_form(); ?>

	<h3 class="mt">Categories</h3>
	<ul class="vertical menu mb">
		<?php wp_list_categories( array(
			'title_li' => ''
		) ); ?>
	</ul>

	<h3>Projects</h3>
	<ul class="vertical menu mb">
		<?php wp_list_bookmarks('title_li=&categorize=0&category_name=Projects'); ?>
	</ul>
</div>


<!--	--><?php //foundationpress_mobile_nav(); ?>

</nav>

<div class="off-canvas-content" data-off-canvas-content>
