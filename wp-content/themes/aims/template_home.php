<?php
/*
Template Name: Custom Homepage Template
*/

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <section id='image-slider'>
                <div class='image-slider'>
                    <h3>Placeholder for image slider</h3>
                <!-- Will add image slider code here --> 
                </div>
            </section>

            <section class="home-general-info">
                <h2>AIMS Bird Banding</h2>
                <p>The Appledore Island Migration Station (AIMS) is located on Appledore Island in the Gulf of Maine.</p> 
                <p>Appledore Island is also home to the <a target="_blank" href="http://www.shoalsmarinelaboratory.org/">Shoals Marine Lab</a> (SML), which is run cooperatively by Cornell University and the University of New Hampshire and which hosts the banding station.</p>
                <p>The AIMS banding station has been in operation on Appledore since 19##. Each spring and fall migration season, AIMS staff run the banding station dawn to dusk, seven days a week, weather permitting.</p>
                <p>AIMS is staffed entirely by volunteers and students.</p>

            </section>

            <?php
            $wp_query = new WP_Query( array( 'post_type' => 'news_items', 'nopaging' => true ) );

            if ( $wp_query->have_posts() ): ?>
            <section class="home-news">
                <h2>Recents Events:</h2>
                <?php while ( $wp_query->have_posts() ) : $wp_query->the_post();
                    the_content();
                    endwhile; ?>
                </section>
                <?php endif;

             ?>

            </section>

            <?php 
            $wp_query = new WP_Query( array( 'post_type' => 'current_season', 'nopaging' => true ) );

            if ( $wp_query->have_posts() ): ?>
            <section class="home-current-season">
                <?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
                <h2><?php echo the_title(); ?></h2>
                    <?php the_content();
                    endwhile; ?>
                </section>
                <?php endif;
            ?>


        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_sidebar();
get_footer();
