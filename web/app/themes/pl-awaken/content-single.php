<?php
/**
 * @package Awaken
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<!--content-single LEFT INFO-->
	<header class="single-entry-header col-xs-12 col-sm-2 col-md-3">
		
		<?php awaken_featured_image(); ?>

		<div class="single-entry-meta">
				<?php awaken_posted_on(); ?>
				<?php edit_post_link( __( 'Edit', 'awaken' ), '<span class="edit-link">', '</span>' ); ?>
		</div>
		<!-- .entry-meta -->

		<!--TAGS AND CATEGORIES LIST-->
		<?php
			/* translators: used between list items, there is a space after the comma */
			$category_list = get_the_category_list( __( ' ', 'awaken' ) );

			/* translators: used between list items, there is a space after the comma */
			$tag_list = get_the_tag_list( '', __( ' ', 'awaken' ) );

			if ( awaken_categorized_blog() ) {
				echo '<div class="categorized-under">';
					_e( 'Categories', 'awaken' );
				echo '</div>';
				echo '</br>';
				echo '<div class="awaken-category-list">' . $category_list . '</div>';
				echo '<div class="clearfix"></div>';
			}

			if ( '' != $tag_list ) {
				echo '<div class="tagged-under">';
					_e( 'Tags', 'awaken' );
				echo '</div>';
				echo '</br>';
				echo '<div class="awaken-tag-list">' . $tag_list . '</div>';
				echo '<div class="clearfix"></div>';	
			}
		?>
		<!--END TAGS AND CATEGORIES-->

		</header>
		<!-- .entry-header -->
	<!--content-single LEFT INFO END-->

	<!--content-single MAIN INFO-->
	<div class="entry-content col-xs-12 col-sm-12 col-md-9">
		<?php the_title( '<h1 class="single-entry-title entry-title">', '</h1>' ); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'awaken' ),
				'after'  => '</div>',
			) );
		?>
		<?php the_content(); ?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'awaken' ),
				'after'  => '</div>',
			) );
		?>

		<!--content-single/COMMENTS-->
			<?php
                if ( get_theme_mod( 'display_post_comments', 1 ) ) {
                    // If comments are open or we have at least one comment, load up the comment template
                    if ( comments_open() || '0' != get_comments_number() ) :
                        comments_template();
                    endif;

                }
			?>
		<!--END content-single/COMMENTS-->
		
	</div>
	<!-- content-single MAIN INFO END -->


	<!--content-single ARTICLE FOOTER-->
	<footer class="single-entry-footer">

full width footer stuff goes in here
	</footer>
	<!--content-single ARTICLE FOOTER END-->

</article>
<!-- #post-## -->
