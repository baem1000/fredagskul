<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">


<?php $roligheter = get_post_meta( $post->ID, 'rolighet', true ); 
		echo '<div class="container">';
		foreach($roligheter as $rolighet){
			echo '<div class="rolighet">';

			$image = $rolighet['bild'];
			$attachment_image = wp_get_attachment_image_src( $image, 'full' );
			$src = $attachment_image[0];

			if( !empty( $src ) )

			echo '<a href="' .$rolighet['link']. '" target="_blank">'; // snygga till och lägg in i echo nedan
			echo '<img src="'.$src.'" style="float:left; width:400px;"/></a>';

			echo '<h3>' .$rolighet['titel']. '</h3>';
			echo '<p>' .$rolighet['beskrivning']. '</p>';

			echo '</div>';
			echo '<div style="clear:both;"></div>';
		}
		echo '</div>';
?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php
get_sidebar( 'content' );
get_sidebar();
get_footer();


