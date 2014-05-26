<?php
/**
 * The template for displaying Comments
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package WordPress
 * @subpackage The Big Magazine
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
	return;
?>

<div id="comments" class="comments-container">
	<?php if( have_comments() ) : ?>

		<h2 class="comments-title"><?php TBM_Print::comments_title(); ?></h2><!-- /comments-title -->
		<ol class="comments-list"><?php wp_list_comments(); ?></ol><!-- /comments-list -->

		<?php
			// Are there comments to navigate through?
			if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
		?>
		<nav class="navigation comment-navigation" role="navigation">
			<h1 class="comments-navigation-heading"><?php _e( 'Comment navigation', 'thebigmag' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'thebigmag' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'thebigmag' ) ); ?></div>

			 <?php if ( is_singular() ) wp_enqueue_script( "comment-reply" ); ?>
		</nav><!-- .comment-navigation -->
		<?php endif; // Check for comment navigation ?>

		<?php if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="no-comments"><?php _e( 'Comments are closed.' , 'thebigmag' ); ?></p>
		<?php endif; ?>

	<?php endif; // have_comments() ?>

	<?php comment_form(); ?> 
</div><!-- /comments -->