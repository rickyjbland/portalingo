<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package magazeen_lite
 */

get_header(); ?>

		<div id="primary" class="content-area col-8-12">
		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
					<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'magazeen-lite' ), '<span>' . get_search_query() . '</span>' ); ?></h1>

			</header><!-- .page-header -->
		<main id="main" class="site-main masonry" role="main">



			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				?><div class="col-6-12"><?php
				get_template_part( 'template-parts/content', get_post_format() );
				?></div><?php

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_sidebar(); ?>
<?php
get_footer();
