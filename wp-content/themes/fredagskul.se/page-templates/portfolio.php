<?php
/**
 * Template Name: Portfolio
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>
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
			<div class="row">
				<?php
                    $args = array( 
                    	'post_type' => 'portfolio', 
                    	'posts_per_page' => 10,
                    	'orderby'   => 'meta_value_num',
						'meta_key'  => 'SortIndex',
						'order' => 'ASC'
                    );

                    $i = 0;
                    $loop = new WP_Query( $args );
                 ?>

				<script type="text/javascript">

					$("body").keydown(function(e) {
						if($(".modal").is(":visible") && (e.keyCode == 37 || e.keyCode == 39)) {
							var Id = $(".modal:visible").attr("id").replace("portfolioModal", "");

							if(e.keyCode == 37) { // left
								if (Id == 1) {
									Id = <?php echo $loop->found_posts; ?>;
								}
								else {
									Id--;
								}							
							}
							else if(e.keyCode == 39) { // right
								if (Id == <?php echo $loop->found_posts; ?>) {
									Id = 1;
								}
								else {
									Id++;
								}							
							}
							
							$(".modal").modal('hide');
							$("#portfolioModal" + Id).modal('show');
						}
					});
				</script>

                 <?php
                    while ( $loop->have_posts() ) : $loop->the_post(); 
                    	$i++;
                    	?>    
                    	<div class="col-lg-4">
                    		<div class="thumbnail">
	                			<a href="#" data-toggle="modal" data-target="#portfolioModal<?php echo $i ?>">       
			                      	<?php the_post_thumbnail("large"); ?>
	                    		</a>
                    			<h2><?php echo the_title(); ?></h2>
								<span class="text-muted small"><?php the_content(); ?></span>
							</div>
	                    </div>

						<div class="modal fade" id="portfolioModal<?php echo $i ?>">
						  <div class="modal-dialog modal-lg">
						    <div class="modal-content text-left">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
						        <h4 class="modal-title"><?php echo the_title(); ?></h4>
						      </div>
						      <div class="modal-body" style="padding: 0px;">
						        <?php the_post_thumbnail("full", array( 'class' => 'full-width' )); ?>
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-secondary" data-dismiss="modal">Stäng</button>
						      </div>
						    </div>
						  </div>
						</div>

	                    <?php
                    endwhile;
	            ?>            
            </div>
		</div><!-- #content -->
	</div><!-- #primary -->
</div><!-- #main-content -->

<?php
get_sidebar();
get_footer();
