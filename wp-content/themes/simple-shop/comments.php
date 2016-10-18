<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments and the comment
 * form. The actual display of comments is handled by a callback to
 * sds_comment() which is located in the /includes/theme-functions.php file.
 */

// If the current post is protected by a password and the visitor has not yet entered the password we will return early without loading the comments
if ( post_password_required() || ! comments_open() )
	return;
?>

<section id="comments-container" class="comments-container post-comments post-comments-container cf <?php echo ( ( int ) get_comments_number() === 0 || ! have_comments() ) ? 'comments-container-no-comments' : false; ?>">
	<section id="comments" class="comments-area <?php echo ( ( int ) get_comments_number() === 0 ) ? 'no-comments' : false; ?>">

		<section class="comments-title-container cf">
			<h2 class="comments-title"><?php _e( 'Comments', 'simple-shop' ) ?></h2>

			<?php if ( have_comments() ) : ?>
				<h5 class="comments-title">
					<?php
						printf( _n( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'simple-shop' ),
						number_format_i18n( get_comments_number() ),
						'<span>' . get_the_title() . '</span>' );
					?>
				</h5>

			<?php endif; // have_comments() ?>
		</section>

		<?php if ( have_comments() ) : ?>

			<ol class="comment-list">
				<?php wp_list_comments( array( 'callback' => 'sds_comment', 'style' => 'ol' ) ); ?>
			</ol><!-- .comment-list -->

			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
				<nav class="navigation comment-navigation" role="navigation">
					<h1 class="assistive-text section-heading"><?php _e( 'Comment navigation', 'simple-shop' ); ?></h1>
					<section class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'simple-shop' ) ); ?></section>
					<section class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'simple-shop' ) ); ?></section>
				</nav>
			<?php endif; // Check for comment navigation ?>

		<?php endif; // have_comments() ?>

		<div class="clear"></div>

		<?php comment_form(); // Display the comment form (add new comment) ?>
	</section>
</section>
