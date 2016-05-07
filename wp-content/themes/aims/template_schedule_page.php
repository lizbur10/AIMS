<?php
/*
Template Name: Schedule Page Template
*/

get_header(); 
//The following four variables need to be hard-coded for each season (until I figure out a better way)
$seasonStartDate = '20160511'; //Must be formatted YYYYMMDD
$seasonEndDate = '20160608';  
$seasonName = 'Spring 2016'; //These are embarrassing but not a priority at the moment
$nextSeasonName = 'fall';
//End hard-coding section

$roleLoopArray=array('Bander','Bandaide','MARS'); //this array controls the order names are listed in

$new_found = false; //these variable control whether the new volunteer and MARS messages print at the bottom of the page
$mars_found = false; 

$seasonDatesArray = createDateRangeArray($seasonStartDate,$seasonEndDate);
$seasonStartDay = getStartDay($seasonStartDate); //0=Sunday -> 6=Saturday
$dateUpdated = $seasonStartDate;

$scheduleDetailsArray = array(); //The array that will hold volunteer names for each day in the season
$arrayIndex = 0;
foreach ( $seasonDatesArray as $seasonDate) :
    $scheduleDetailsArray[$arrayIndex] = '<span>' . $seasonDate . '</span>';
    $arrayIndex++;
endforeach;
?>


    <div id="primary" class="content-area">
        <main id="main" class="site-main banding-schedule" role="main">
            <h1><?php wp_title(''); ?></h1>
            <?php $wp_query = new WP_Query( array( 'post_type' => 'add_staff_to_sched', 'nopaging' => true ) );

            //Checks if there are any volunteers scheduled and, if not, returns an appropriate message 
                if ( !( $wp_query->have_posts() ) ): ?>
                    <h3>The <?php echo $seasonName; ?> season has ended -- check back in the <?php echo $nextSeasonName; ?>!</h3>

                <?php else: 

                    foreach ( $roleLoopArray as $role ) :

                    // Populates volunteer names into the array of dates 

                        while ( $wp_query->have_posts() ) : $wp_query->the_post(); 
                            $arrayIndex = 0;
                            if ( $dateUpdated < get_the_date() ) :
                                $dateUpdated = get_the_date();
                            endif;
                            if ($role == get_field('role') ) :
                                $name = get_the_title();
                                if (get_field('new_volunteer') == 'Yes') :
                                    $name .= '*';
                                    $new_found = true;
                                endif;
                                if ($role == "MARS") :
                                    $name .= ' (M)';
                                    $mars_found = true;
                                endif;
                                $personStartDate = get_field('start_date');
                                $personEndDate = get_field('end_date');
                                $personDatesArray = createDateRangeArray($personStartDate,$personEndDate);
                                foreach ( $seasonDatesArray as $seasonDate ) :
                                    foreach ( $personDatesArray as $personDate ) :
                                        if ( $seasonDate == $personDate ) :
                                            $scheduleDetailsArray[$arrayIndex] .= '<span>' . $name . '</span>';
                                        endif;
                                    endforeach;
                                    $arrayIndex++;
                                endforeach;
                            endif;
                        endwhile; 
                        $wp_query = new WP_Query( array( 'post_type' => 'add_staff_to_sched', 'nopaging' => true ) );
                    endforeach; 

                    /* Adds header row for calendar */ 
                    ?>
                    <table> 
                        <col class="column-one">
                        <col class="column-two">
                        <col class="column-three">
                        <col class="column-four">
                        <col class="column-five">
                        <col class="column-six">
                        <col class="column-seven">
 
                        <tr class="header-row long-day">
                            <td>Sunday</td>
                            <td>Monday</td>
                            <td>Tuesday</td>
                            <td>Wednesday</td>
                            <td>Thursday</td>
                            <td>Friday</td>
                            <td>Saturday</td>
                        </tr>
                        <tr class="header-row short-day">
                            <td>Sun</td>
                            <td>Mon</td>
                            <td>Tue</td>
                            <td>Wed</td>
                            <td>Thu</td>
                            <td>Fri</td>
                            <td>Sat</td>
                        </tr>

                    <?php 

                    /* Adds empty cells for days before the first day of the season */

                    $weekCounter = 1;
                    if ($seasonStartDay > 0) :
                        for ($dayIndex=0; $dayIndex<$seasonStartDay; $dayIndex++) : ?>
                            <td></td>
                            <?php $weekCounter++;
                        endfor;
                    endif;
                    /* Writes out the schedule */
                    foreach ($scheduleDetailsArray as $dateDetails) : 
                        if ($weekCounter %7 == 1) : ?>
                                <tr><td><?php echo $dateDetails; ?></td>
                        <?php elseif ($weekCounter %7 == 0) : ?>
                                <td><?php echo $dateDetails; ?></td></tr>
                        <?php else : ?>
                                <td><?php echo $dateDetails; ?></td>
                        <?php endif;
                        $weekCounter++;
                    endforeach;
                        
                    if ($weekCounter %7 != 0) : ?>
                        </tr></table>
                    <?php else : ?>
                        </table>
                    <?php endif; ?>

                    <p class="date-updated">Last updated: <?php echo $dateUpdated ?></p>
                    <?php if ($new_found): ?>
                        <p>* refers to new assistants to the station.  Please help them feel welcome.</p>
                    <?php endif;
                    if ($mars_found): ?>
                        <p>(M) refers to students running the Mobile Avian Recording Studio trailer (MARS).</p>
            <?php 
                    endif;
            endif;
        ?>



        </main><!-- #main -->
            <section class="bottom-nav">
                <a class="nav-forward" href="<?php echo get_stylesheet_directory_uri(); ?>/volunteer-checklist">Volunteer Checklist</a>
            </section>
    </div><!-- #primary -->

<?php
get_sidebar();
get_footer();
