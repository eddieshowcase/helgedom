<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<div class="main-grid">

	<aside class="sidebar mysidebar hide-for-small-only mt0">

		<div class="image-circle-crop">
			<img class="image-circle-crop" src="http://helgedom.com/images/trio_20171031_sm.jpg">
		</div>

		<div class="row mt text-center">
			<i class="fa fa-fw fa-2x fa-instagram" aria-hidden="true"></i>
			<i class="fa fa-fw fa-2x fa-rss" aria-hidden="true"></i>
			<i class="fa fa-fw fa-2x fa-facebook-square" aria-hidden="true"></i>
			<i class="fa fa-fw fa-2x fa-flickr" aria-hidden="true"></i>
		</div>

		<div class="row">
			<?php get_search_form(); ?>
		</div>

		<div class="row">
			<ul class="vertical menu">
				<?php wp_list_pages( array( 'title_li' => '' ) ); ?>
			</ul>
		</div>

		<div class="row">
			<h3>Categories</h3>
			<ul class="vertical menu">
				<?php wp_list_categories( array(
					'title_li' => ''
				) ); ?>
			</ul>
		</div>

		<div class="row">
			<h3> Recent Posts </h3>
			<ul class="vertical menu">
				<?php
				$recent_posts = wp_get_recent_posts();
				foreach( $recent_posts as $recent ) {
					printf( '<li><a href="%1$s">%2$s</a></li>',
						esc_url( get_permalink( $recent['ID'] ) ),
						apply_filters( 'the_title', $recent['post_title'], $recent['ID'] )
					);
				}
				?>
			</ul>
		</div>

	</aside>

	<main class="main-content">
	<?php if ( have_posts() ) : ?>

		<div class="grid-x grid-padding-x small-up-1 medium-up-2 large-up-3">

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<div class="cell">
					<?php
						//get_template_part( 'template-parts/content', get_post_format() );
						get_template_part( 'template-parts/content', 'gridblock' );
					?>
				</div>

			<?php endwhile; ?>

		</div>

		<?php else : ?>
			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; // End have_posts() check. ?>

		<?php /* Display navigation to next/previous pages when applicable */ ?>
		<?php
		if ( function_exists( 'foundationpress_pagination' ) ) :
			foundationpress_pagination();
		elseif ( is_paged() ) :
		?>
			<nav id="post-nav">
				<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'foundationpress' ) ); ?></div>
				<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'foundationpress' ) ); ?></div>
			</nav>
		<?php endif; ?>

	</main>

	<?php get_sidebar(); ?>

</div>

<?php get_footer();
