<?php
/*
Template Name: Custom Homepage Template
*/

get_header(); ?>

    <div id="primary" class="content-area">
            <section id='image-slider'>
                <?php $images = get_field('photo_gallery'); ?>
                <?php if( $images ): 
                    $imageCounter = 1;
                    $totalWidth = 0;
                    foreach( $images as $image ): 
                        $filename = $image['url'];
                        list($width, $height) = getimagesize($filename);
                        $newHeight = 240;
                        $newWidth = (int) round(240/$height * $width);
                        $ImageId = "galleryImage$imageCounter"; ?>
                        <div style="left: <?php echo $totalWidth; ?>px;"><img id="<?php echo $ImageId ?>" class="slides" height="<?php echo $newHeight; ?>" width="<?php echo $newWidth; ?>" src="<?php echo $image['url']; ?>"  />
                        </div>
                        <?php $imageCounter++; 
                        $totalWidth = $totalWidth + $newWidth; ?>
                   <?php endforeach; ?>
                <?php endif; ?>
            </section>


        <main id="main" class="site-main home-page" role="main">

            <section class="home-general-info">
                <h2>AIMS Bird Banding</h2>
                <p>The Appledore Island Migration Station (AIMS) is located on Appledore Island in the Gulf of Maine. Each spring and fall, AIMS staff &mdash; who are all volunteers and students &mdash; band birds from dawn to dusk, seven days a week, weather permitting.</p>
                <p>Appledore Island is also home to the <a href="http://www.shoalsmarinelaboratory.org/">Shoals Marine Lab</a>. SML provides hands-on educational and research programs in marine science and environmental sustainability. SML hosts the banding station and its personnel during migration seasons.</p>
            </section>

            <?php $wp_query = new WP_Query( array( 'post_type' => 'current_season', 'nopaging' => true ) );

            if ( $wp_query->have_posts() ): ?>
            <section class="home-current-season">
                <?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
                <h1><?php echo the_title(); ?></h1>
                    <?php the_content();
                    endwhile; ?>
                </section>
                <?php endif;
            ?>

            <?php
            $wp_query = new WP_Query( array( 'post_type' => 'news_items', 'nopaging' => true ) );

            if ( $wp_query->have_posts() ): ?>
            <section class="home-news">
                <h2>Recent News &amp; Updates:</h2>
                    <ul>
                    <?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); 
                        $tempDateString = get_the_date('m/j/y'); 
                        $tempContentString = get_the_content(); ?>
                        <li><span class="news-date"><?php echo wp_strip_all_tags( $tempDateString ); ?></span>: <?php echo wp_strip_all_tags( $tempContentString ); ?></li>
                        <?php endwhile; ?>
                    </ul>
                </section>
                <?php endif;

             ?>

            </section>

        </main><!-- #main -->
    </div><!-- #primary -->
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/image-slider.js"></script>
<?php
get_sidebar();
get_footer();
