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
			<div class="auto cell">
				<?php
				$theTitle = get_the_title();
				if( empty( $post->post_title ) ) {
					$theTitle = "Untitled";
				}
				echo "<h1 class=\"entry-title\">$theTitle</h1>";
				echo '<h2 class="entry-meta">'; foundationpress_entry_meta(); echo '</h2>';
				?>
			</div>
			<div class="shrink cell">

				<?php
					// icons/categories: instagram, cycling, DEFAULT: wordpress/misc, work/code, facebook?
					if ( has_category( 'Square Photos' ) ) {
						echo "<i class=\"fa fa-2x fa-instagram fa-fw\"></i>";
					} else if ( has_category('Cycling') ) {
						echo "<i class=\"fa fa-2x fa-bicycle fa-fw\"></i>";
					} else if ( has_category('Professional Geekery') ) {
						echo "<i class=\"fa fa-2x fa-code fa-fw\"></i>";
					} else {
						echo "<i class=\"fa fa-2x fa-wordpress fa-fw\"></i>";
					}

				?>
				<!--				<i class="fa fa-2x fa-instagram fa-fw"></i>-->

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
				// TODO fix: echo "<div class=\"card-section bordert\">";
				echo "<div class=\"card-section\" style=\"border-top: 1px solid #e6e6e6;\">";
				the_excerpt();
				echo "</div>";
			}
		?>


	</div>
	</a>
	<footer>
		<?php
			wp_link_pages(
				array(
					'before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'foundationpress' ),
					'after'  => '</p></nav>',
				)
			);
		?>
		<?php edit_post_link( __( '(Edit)', 'foundationpress' ), '<span class="edit-link">', '</span>' ); ?>
<!--		--><?php //$tag = get_the_tags(); if ( $tag ) { ?><!--<p>--><?php //the_tags(); ?><!--</p>--><?php //} ?>
	</footer>
</article>
