<?php 
/**
 * Home-categories.php
 *
 * A list of categories in the site. The user can pick
 * which are dispayed from the theme admin panel. Being four, 
 * they are hardcoded (because of CSS mainly).	
 *
 * @package WordPress
 * @subpackage The Big Magazine
 */ 

// The options framework global vatiable.
global $data;
?>

<section class="featured-categories">
	<header class='section-header'>
		<h3 class="section-title" data-toggle="modal" data-target="#categoriesModal"><?php echo $data['categories_title'] ?></h3>
		<button class='btn btn-link btn-xs pull-right' data-toggle="modal" data-target="#categoriesModal"><?php _e('View all categories', 'thebigmag') ?></button>
	</header><!-- section-header -->

	<div class="section-content">
		<div class="column col-lg-3 col-sm-3 col-xs-3">
			<h4 class="categories-title"><i class="fa fa-minus"></i><?php echo $data['categories_first'] ?></h4>
			<?php TBM_Print::list_categories( $data['categories_first'], true, $data['categories_limit'] ) ?>
		</div><!-- /column -->
		<div class="column col-lg-3 col-sm-3 col-xs-3">
			<h4 class="categories-title"><i class="fa fa-minus"></i><?php echo $data['categories_secound'] ?></h4>
			<?php TBM_Print::list_categories( $data['categories_secound'], true, $data['categories_limit'] ) ?>
		</div><!-- /column -->
		<div class="column col-lg-3 col-sm-3 col-xs-3">
			<h4 class="categories-title"><i class="fa fa-minus"></i><?php echo $data['categories_third'] ?></h4>
			<?php TBM_Print::list_categories( $data['categories_third'], true, $data['categories_limit'] ) ?>
		</div><!-- /column -->
		<div class="column col-lg-3 col-sm-3 col-xs-3">
			<h4 class="categories-title"><i class="fa fa-minus"></i><?php echo $data['categories_fourth'] ?></h4>
			<?php TBM_Print::list_categories( $data['categories_fourth'], true, $data['categories_limit'] ) ?>
		</div><!-- /column -->
	</div><!-- /section-content -->
</section><!-- /featured categories -->

<!-- Modal -->
<div class="modal fade" id="categoriesModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">All Categories</h4>
			</div>
			<div class="modal-body">
				<?php 
				// Settings for the categories list
				$args = array(
					"style"			=> "none",
					"show_count"	=> 1,
					"hide_empty" 	=> 0
				);

				// Now display the categories
				wp_list_categories( $args ); ?>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->