<?php
/*
Template Name: Staff Page Template
*/

get_header(); 

$banders_found = false; //Used to make sure that 'Banders' and 'Bandaides' headers only appear once
$bandaides_found = false;
$roleLoopArray=array('Head Bander', 'Bander','Bandaide'); //this array controls the order profiles are listed in
?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main station-staff" role="main">

            <?php
            $wp_query = new WP_Query( array( 'post_type' => 'staff_profile', 'nopaging' => true ) );

            if ( $wp_query->have_posts() ): ?>
                <h1>Meet the AIMS Staff</h1>
                <?php foreach ( $roleLoopArray as $role ) :
                    while ( $wp_query->have_posts() ) : $wp_query->the_post(); 
                    $staff_type = get_field('type');
                    if ( $staff_type == $role ) : 
                        if ( ($role == "Head Bander" || $role == "Bander") && ( !($banders_found) ) ) : ?>
                            <h2>Banders</h2>
                            <?php $banders_found = true;
                        elseif ( ( $role == "Bandaide" ) && ( !($bandaides_found) ) ) : ?>
                            <h2>Bandaides</h2>
                            <?php $bandaides_found = true;
                        endif; 
                        if ($staff_type == "Head Bander") { $staff_type = "Bander"; } ?>
                        <div class="staff-profile">
                            <figure>
                                <figcaption><h3><?php echo the_title(); ?></h3>
                                <?php echo $staff_type ?> since: <?php echo get_field('appledore_start_date'); ?></figcaption>
                                <img src="<?php echo get_field('picture'); ?>" alt="<php echo the_title();?>">
                            </figure>
                            <p><?php echo get_field('biographical_info'); ?></p>
                        </div>
                    <?php endif;
                    endwhile;
                endforeach; ?>
            </div>
            <?php endif;
            ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_sidebar();
get_footer();
