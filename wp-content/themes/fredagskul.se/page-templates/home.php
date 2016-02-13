<?php
/**
 * Template Name: Home page
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<div id="main-content" class="main-content home">

<?php
	if ( is_front_page() && twentyfourteen_has_featured_posts() ) {
		// Include the featured content template.
		get_template_part( 'featured-content' );
	}
?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();

					// Include the page content template.
					get_template_part( 'content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
				endwhile;
			?>

			<!--<div class="form-inline form-group-lg">
				<input type="text" class="form-control" placeholder="Din e-postadress" style="width: 300px;">
				<button type="submit" class="btn btn-success btn-lg">Prenumerera</button>
			</div>-->

			<div id="mc_embed_signup" class="signup-form">
				<form action="//fredagskul.us11.list-manage.com/subscribe/post-json?u=71d2b0d0fc8846549d2006dcf&amp;id=14ad7b4354&amp;c=?" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate="">	
					<div class="row row-sm">
						<div class="col-sm-8">				
							<input type="email" value="" name="EMAIL" class="email form-control input-lg" id="mce-EMAIL" placeholder="din@epost.se" required="">
						</div>
						<div class="col-sm-4">
							<div style="position: absolute; left: -5000px;"><input type="text" name="b_58abcfa203271a9db312e69fc_ee0af79b60" value=""></div>
							<input type="submit" value="Prenumerera" name="subscribe" id="mc-embedded-subscribe" class="button--primary btn btn-success btn-lg btn-block">
						</div>
					</div>
				</form>
				<div id="notification_container"></div>
			</div>
			<script type="text/javascript">
			$(function () {
			  var $form = $('#mc-embedded-subscribe-form');

			  $('#mc-embedded-subscribe').on('click', function(event) {
			    if(event) event.preventDefault();
			    register($form);
			  });
			});

			function register($form) {
			  $.ajax({
			    type: $form.attr('method'),
			    url: $form.attr('action'),
			    data: $form.serialize(),
			    cache       : false,
			    dataType    : 'json',
			    contentType: "application/json; charset=utf-8",
			    error       : function(err) { $('#notification_container').html('<span class="alert">Could not connect to server. Please try again later.</span>'); },
			    success     : function(data) {
			     
			      if (data.result != "success") {
			        var message = data.msg.substring(4);
			        $('#notification_container').html('<span class="text-warning"><i class="fa fa-exclamation-triangle"></i> Felaktig epost, kontrollera att du fyllt i rätt, din@epost.se.</span>');
			      } 

			      else {
			        var message = data.msg;
			        $('#notification_container').html('<span class="text-success">Nästan klar... Vi behöver bekräfta din e-post. För att slutföra registrering, klicka på länken vi skickat.</span>');
			      }
			    }
			  });
			}
			</script>
		</div><!-- #content -->
	</div><!-- #primary -->
</div><!-- #main-content -->

<?php
get_sidebar();
get_footer();
