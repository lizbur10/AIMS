<?php
/*
Template Name: Volunteer Checklist Template
*/

get_header(); 

$anthony_email = eae_encode_emails('anhinga13@hotmail.com');
$anthony_mailto = eae_encode_emails('mailto:anhinga13@hotmail.com');
$alexa_email = eae_encode_emails('alh229@cornell.edu');
$alexa_mailto = eae_encode_emails('mailto:alh229@cornell.edu');


?>
    <div id="primary" class="content-area">
        <main id="main" class="site-main checklist" role="main">

            <h1>Volunteer Checklist</h1>
            <p>Once you're on the schedule, please be sure to complete the items below.</p> 
            <table>
                <col class="column-one">
                <col class="column-two">
                <tr><td><h3>When:</h3></td><td><h3>What:</h3></td></tr>
                <tr>
                    <td>At all times:</td>
                    <td><i class="fa fa-check-square-o" aria-hidden="true"></i>Copy island liaison <a href="<?php echo $anthony_mailto ?>">Anthony Hill</a> on any emails about your time on Appledore. This includes emails to Sara Morris as well as those to Alexa Hilmer or any other SML staff.</td>
                </tr>
                <tr>
                    <td>After scheduling your dates:</td>
                    <td><i class="fa fa-check-square-o" aria-hidden="true"></i>Email <a target="_blank" href="<?php echo $alexa_mailto ?>">Alexa Hilmer</a> (the SML Island Coordinator) to get on the <a target="_blank" href="http://www.shoalsmarinelaboratory.org/boat-schedule">Boat Schedule</a></td>
                </tr>
                <tr>
                    <td></td>
                    <td><i class="fa fa-check-square-o" aria-hidden="true"></i>Complete the <a target="_blank" href="http://www.shoalsmarinelaboratory.org/sites/shoalsmarinelaboratory.org/files/media/pdf/VisitorForms/sml_researcher_forms_2016.pdf">required forms</a> and return them to SML using either the snail mail address or fax number on the forms, OR by <a href="<?php echo $alexa_mailto ?>">emailing them</a> to Alexa. 
                        <p><span class="note">Note</span>: all scheduled volunteers need to submit new forms for 2016, even if they submitted forms recently.</p></td>
                </tr>
                <tr>
                    <td>The day before you go:</td>
                    <td><i class="fa fa-check-square-o" aria-hidden="true"></i><a href="<?php echo $alexa_mailto ?>">Confirm your boat reservations with Alexa</a></td>
                </tr>
                <tr>
                    <td>While on the island:</td>
                    <td><i class="fa fa-check-square-o" aria-hidden="true"></i>Pay your boat fees ($40 round trip) to the Island Coordinator.</td>
                </tr>
            </table>

            <section class="other-info">
                <h2>Contact Info</h2>
                <div>
                    <p class="name">Alexa Hilmer, SML Island Coordinator</p>
                    <p><a href="<?php echo $alexa_mailto; ?>"><?php echo $alexa_email ?></a></p>
                    <p>603-862-5346 (pre-season)</p>
                    <p>603-964-9011 (on island)</p>
                </div>

                <div>
                    <p class="name">Anthony Hill, Island Liaison<p>
                    <p><a href="<?php echo $anthony_mailto; ?>"><?php echo $anthony_email ?></a></p>
                </div>
            </section>


        </main><!-- #main -->
            <section class="bottom-nav">
                <a class="nav-back" href="<?php echo get_stylesheet_directory_uri(); ?>/volunteer-schedule">Banding Schedule</a>
                <a class="nav-forward" href="<?php echo get_stylesheet_directory_uri(); ?>/volunteer-resources">Volunteer Resources</a>
            </section>

    </div><!-- #primary -->

<?php
get_sidebar();
get_footer();
