<?php

/**
 * Custom slider and the featured posts for the theme.
 */

if ( !function_exists( 'awaken_featured_posts' ) ) :

    function awaken_featured_posts() {

        $category = get_theme_mod( 'slider_category', '' );

        $slider_posts = new WP_Query( array(
                'posts_per_page' => 5,
                'cat'	=>	$category
            )
        ); 
        
        ?>

    <div class="awaken-featured-container">
        <!--SLIDER CONTAINER-->
            <div class="awaken-featured-slider">
            <section class="slider">
            <div class="flexslider">
            <ul class="slides">
            <?php while( $slider_posts->have_posts() ) : $slider_posts->the_post(); ?>
            <li>
            <!--SLIDER ITEMS-->
              <div class="awaken-slider-container">
               <!--SLIDER INFO GET->
                        <?php
                            if ( has_post_thumbnail() ) {
                                $thumb_id           = get_post_thumbnail_id();
                                $thumb_url_array    = wp_get_attachment_image_src($thumb_id, 'featured-slider', true);
                                $featured_image_url = $thumb_url_array[0]; 
                            } else {
                                $featured_image_url = get_template_directory_uri() . '/images/slide.jpg';
                            }
                        ?>
                <!--END SLIDER INFO-->
               
                <!--SLIDER LINKS-->
                        <a href="<?php the_permalink(); ?>" rel="bookmark">
                            <div class="awaken-slide-holder" 
                                style="background: url(
                                    <?php echo $featured_image_url; ?>);">

                            <div class="awaken-slide-content">
                            <div class="awaken-slider-details-container">

                                <h3 class="awaken-slider-title"><?php the_title(); ?></h3>
                            </div>
                            </div>
                            </div>
                        </a>
                <!--SLIDER LINKS-->
              </div>
            <!--SLIDER ITEMS-->        
            </li>
            <?php endwhile; ?>
            </ul>
            </div>
            </section>
            </div>
        <!--SLIDER-->

        <!--FEATURED POSTS ON RIGHT-->
       
            <div class="awaken-featured-posts">
            <!--FEATURED PHP-->
                <?php

                $method = get_theme_mod( 'fposts_display_method', 'category' );

                if ( $method == "sticky" ) {
                    
                    $args = array(
                        'posts_per_page'        => 2,
                        'post__in'              => get_option( 'sticky_posts' ),
                        'ignore_sticky_posts'   => 1
                    );

                } else {
                    
                    $fposts_category = get_theme_mod( 'featured_posts_category', '' );

                    $args = array(
                        'posts_per_page'        => 2,
                        'cat'                   => $fposts_category,
                        'ignore_sticky_posts'   => 1
                    );

                }

                $fposts = new WP_Query( $args );

                while( $fposts->have_posts() ) : $fposts->the_post(); ?>
            <!--END FEATURED PHP-->

                <div class="afp">
                    
                <!--GET INFO-->
                        <?php
                        if ( has_post_thumbnail() ) {
                            $thumb_id           = get_post_thumbnail_id();
                            $thumb_url_array    = wp_get_attachment_image_src($thumb_id, 'featured', true);
                            $featured_image_url = $thumb_url_array[0]; 
                        } else {
                            $featured_image_url = get_template_directory_uri() . '/images/featured.jpg';
                        }
                        ?>                    
                <!--END GET INFO-->
                <a href="<?php the_permalink(); ?>" rel="bookmark">
                    <div class="afpi-holder" style="background: url(<?php echo $featured_image_url; ?>);">
                        <div class="afp-content">
                            <div class="afp-title">
                              <h3 class="awaken-slider-title"><?php the_title(); ?></h3>
                            </div>
                        </div><!-- .afp-content -->
                    </div><!-- .afpi-holder -->
                </a>

                </div><!-- .afp -->

            <?php endwhile; ?>
            </div>
        <!--END FEATURED POSTS-->
    </div>
    
    <?php
    }

endif;