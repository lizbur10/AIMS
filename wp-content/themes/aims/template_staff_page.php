<?php
/*
Template Name: Staff Page Template
*/

get_header(); 

$bandaides_found = false; ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <?php
            $wp_query = new WP_Query( array( 'post_type' => 'staff_profile', 'nopaging' => true ) );

            if ( $wp_query->have_posts() ):
                while ( $wp_query->have_posts() ) : $wp_query->the_post(); 
                    $staff_type = get_field('type');
                    if ( $staff_type == 'Head Bander' ) : ?>
                            <section class="banders">
                                <h2>Banders</h2>
                        <h3><?php echo the_title(); ?></h3>
                        <img src="<?php echo get_field('picture'); ?>" alt="<php echo the_title();?>">
                        <h4>Bander since: <?php echo get_field('appledore_start_date'); ?></h4>
                        <p><?php echo get_field('biographical_info'); ?></p>
                    <?php endif;
                endwhile; ?>
                </section>
            <?php endif;
            ?>

            <?php
            $wp_query = new WP_Query( array( 'post_type' => 'staff_profile', 'nopaging' => true ) );

            if ( $wp_query->have_posts() ):
                while ( $wp_query->have_posts() ) : $wp_query->the_post(); 
                    $staff_type = get_field('type');
                    if ( $staff_type == 'Bander' ) : ?>
                        <h3><?php echo the_title(); ?></h3>
                        <img src="<?php echo get_field('picture'); ?>" alt="<php echo the_title();?>">
                        <h4>Bander since: <?php echo get_field('appledore_start_date'); ?></h4>
                        <p><?php echo get_field('biographical_info'); ?></p>
                    <?php endif;
                endwhile; ?>
                </section>
            <?php endif;
            ?>

            <?php 
            wp_reset_query();
            $wp_query = new WP_Query( array( 'post_type' => 'staff_profile', 'nopaging' => true ) );

            if ( $wp_query->have_posts() ):
                while ( $wp_query->have_posts() ) : $wp_query->the_post(); 
                    $staff_type = get_field('type');
                    if ( $staff_type == 'Bandaide' ) :
                        if ($bandaides_found == false )  : ?>
                            <section class="bandaides">
                                <h2>Bandaides</h2>
                            <?php $bandaides_found = true;
                        endif; ?>
                        <h3><?php echo the_title(); ?></h3>
                        <img src="<?php echo get_field('picture'); ?>" alt="<php echo the_title();?>">
                        <h4>Bandaide since: <?php echo get_field('appledore_start_date'); ?></h4>
                        <p><?php echo get_field('biographical_info'); ?></p>
                    <?php endif;
                endwhile; ?>
                </section>
            <?php endif;
            ?>




        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_sidebar();
get_footer();
