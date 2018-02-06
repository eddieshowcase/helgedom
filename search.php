<?php
/**
 * The template for displaying search results pages.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>
<div class="my-main-grid grid-x">

	<?php get_template_part( 'template-parts/content', 'mysidebar' ); ?>

	<div class="my-main-container cell auto p+">
<!--		<div class="main-grid">-->

			<main id="search-results" class="main-content">

			<header>
				<h1 class="entry-title"><?php _e( 'Search Results for', 'foundationpress' ); ?> "<?php echo get_search_query(); ?>"</h1>
			</header>

			<div class="grid-x grid-padding-x small-up-1 medium-up-2 large-up-3">

			<?php /* Start the Loop */ ?>
			<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); ?>
					<div class="cell">
						<?php
						//get_template_part( 'template-parts/content', get_post_format() );
						get_template_part( 'template-parts/content', 'gridblock' );
						?>
					</div>
				<?php endwhile; ?>

				<?php else : ?>
					<?php get_template_part( 'template-parts/content', 'none' ); ?>

			<?php endif; ?>
			</div>

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

<!--		</div>-->
	</div>
<?php get_footer();
