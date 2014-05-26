<?php 
// Check if the user is logged in. If not, we will print the logni button.
if ( !is_user_logged_in() ) : ?>

<!-- Button trigger modal -->
<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">Login</button>

<?php // Else if he is logged in, then the loguot button + what he is allowed to do.
else: 
	global $current_user;

// Now see if the use can edit posts, if so he has admin rights and can open wp-adhboard
if( $current_user->allcaps['edit_posts'] ) {
	$home = admin_url();
	echo "<a href='{$home}' class='btn btn-dark btn-sm'>Admin Panel</a>";
} ?>
<a href="<?php echo wp_logout_url(); ?>" title="Logout" class='btn btn-dark btn-sm'><?php  ?>Logout (<?php echo $current_user->display_name ?>)</a>

<?php endif; ?> 

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Login</h4>
			</div>
			<div class="modal-body">
				<?php wp_login_form( ); ?> 
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->