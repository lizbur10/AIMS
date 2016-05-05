<?php
/*
Template Name: Volunteer Checklist Template
*/

get_header(); 

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
                    <td><i class="fa fa-check-square-o" aria-hidden="true"></i>Copy island liaison <a href="mailto:anhinga13@hotmail.com">Anthony Hill</a> on any emails about your time on Appledore. This includes emails to Sara Morris as well as those to Alexa Hilmer or any other SML staff.</td>
                </tr>
                <tr>
                    <td>After scheduling your dates:</td>
                    <td><i class="fa fa-check-square-o" aria-hidden="true"></i>Email <a href="mailto:alh229@cornell.edu">Alexa Hilmer</a> (the SML Island Coordinator) to get on the <a href="http://www.shoalsmarinelaboratory.org/boat-schedule">Boat Schedule</a></td>
                </tr>
                <tr>
                    <td></td>
                    <td><i class="fa fa-check-square-o" aria-hidden="true"></i>Complete the <a target="_blank" href="http://www.shoalsmarinelaboratory.org/sites/shoalsmarinelaboratory.org/files/media/pdf/VisitorForms/sml_researcher_forms_2016.pdf">required forms</a> and return them to SML using either the snail mail address or fax number on the forms, OR by <a href="mailto:alh229@cornell.edu">emailing them</a> to Alexa. 
                        <p><strong>Note</strong>: all scheduled volunteers need to submit new forms for 2016, even if they submitted forms recently.</p></td>
                </tr>
                <tr>
                    <td>The day before you go:</td>
                    <td><i class="fa fa-check-square-o" aria-hidden="true"></i><a href="mailto:alh229@cornell.edu">Confirm your boat reservations with Alexa</a></td>
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
                    <p>alh229@cornell.edu</p>
                    <p>603-862-5346 (pre-season)</p>
                    <p>603-964-9011 (on island)</p>
                </div>

                <div>
                    <p class="name">Anthony Hill, Island Liaison<p>
                    <p>anhinga13@hotmail.com</p>
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
