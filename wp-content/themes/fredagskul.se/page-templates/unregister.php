<?php
/**
 * Template Name: Avanmälan
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>
<div class="page-template-boxed">
	<div id="main-content" class="main-content">

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
					endwhile;
				?>
				<?php
					$current_email = $_GET['email'];

					?>
					<form method="post" action="">
						<div class="form-group row row-sm">
							<div class="col-sm-8">
						    	<input type="text" name="email" value="<?php echo $current_email ?>" class="form-control input-lg form-group" placeholder="Din e-post">
						   	</div>
		            		<div class="col-sm-4">
						    	<button type="submit" name="submit" class="btn btn-danger btn-block btn-lg">Avanmäl</button>
						    </div>
		        		</div>
					</form>

					<?php

					if(isset($_POST['submit']))
					{
					   	$email = $_POST["email"];

					    $user = get_user_by("email", $email);

					    if ($user == null) {
					    	echo "<div class='alert alert-warning text-center'>E-postadressen finns inte registrerad</div>";
					    }
					    else
					    {
						    $u = new WP_User( $user->id );
							$u->set_role( 'inactive' );

							echo "<div class='alert alert-success text-center'>" . $email . " har tagits bort och kommer inte få några framtida utskick</div>";
					    }
					} 
				?>

			</div><!-- #content -->
		</div><!-- #primary -->
	</div><!-- #main-content -->
</div>
<?php
get_sidebar();
get_footer();
