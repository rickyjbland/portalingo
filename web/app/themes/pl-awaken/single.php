<?php
/**
 * The template for displaying all single posts.
 *
 * @package Awaken
 */

get_header(); ?>
<div class="row">
<?php is_rtl() ? $rtl = 'awaken-rtl' : $rtl = ''; ?>

<!--MAIN CONTENT-->
<div class="col-xs-12 col-sm-12 col-md-12 <?php echo $rtl ?>">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		
		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>
			<?php awaken_post_nav(); ?>



		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div>
<!--MAIN CONTENT END -->

<div class="col-xs-0 col-sm-0 col-md-0">
	<?php
		if ( is_category('lessons2') || ( is_single() && in_category('lessons2') ) ) {
		    get_sidebar('lessons');  //sidebar-wordpress.php
		} else {
		    get_sidebar();
		}
	?>
</div>
 
</div><!-- .row -->
<?php get_footer(); ?>