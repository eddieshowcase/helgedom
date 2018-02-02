<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('card'); ?>>
	<a href="<?php esc_url( the_permalink() ); ?>" rel="bookmark">
	<header class="card-header">
		<div class="grid-x">
			<div class="shrink cell"><i class="fa fa-2x fa-instagram fa-fw"></i></div>
			<div class="auto cell">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				<h2 class="entry-meta"><?php foundationpress_entry_meta(); ?></h2>
			</div>
		</div>
	</header>
	<div class="entry-content">
		<?php
			//the_content();
		  $block_img = get_gridblock_image();

			if(!empty($block_img)) {
				echo "<img src=\"$block_img\"/>";
			} else {
				// fall back to an auto-generated excerpt
				echo "<div class=\"card-section bordert\">";
					the_excerpt();
				echo "</div>";
			}
		?>

		<?php edit_post_link( __( '(Edit)', 'foundationpress' ), '<span class="edit-link">', '</span>' ); ?>
	</div>
	<footer>
		<?php
			wp_link_pages(
				array(
					'before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'foundationpress' ),
					'after'  => '</p></nav>',
				)
			);
		?>
<!--		--><?php //$tag = get_the_tags(); if ( $tag ) { ?><!--<p>--><?php //the_tags(); ?><!--</p>--><?php //} ?>
	</footer>
	</a>
</article>
