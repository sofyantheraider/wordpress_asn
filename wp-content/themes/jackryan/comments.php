<?php

/**
 * @author: MadSparrow
 * @version: 1.0
 */

if ( post_password_required() ) {
    return;
}
?>

<div id="comments" class="ms-comments-area">
    <?php if ( have_comments() ) : ?>
        <ul class="ms-comment-list">
            <div class="ms-comments-title"><?php jackryan_comments_number(); ?></div>
            <?php wp_list_comments( array(
                    'callback'   => 'jackryan_comments',
                    'style'      => 'ul',
                    'short_ping' => true,
                    'format'     => 'html5',
            ) ); ?>
        </ul>
        <?php the_comments_navigation();
        if ( ! comments_open() ) : ?>
            <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'jackryan' ); ?></p>
        <?php
        endif;
    endif; ?>

        <?php $commenter = wp_get_current_commenter();
            $args = array(
                    'class_form' => 'row',
                    'label_submit' => esc_html__( 'Post Comment', 'jackryan'),
                    'title_reply' => esc_html__('Leave a Reply', 'jackryan') ,
                    'title_reply_before' => '<div id="reply-title">',
                    'title_reply_after' => '</div>',
                    'cancel_reply_before' => ' ',
                    'cancel_reply_after' => '',
                    'title_reply_to' => esc_html__('Leave a reply to', 'jackryan') . ' %s',
                    'cancel_reply_link' => esc_html__('Cancel Reply', 'jackryan'),
                    'class_submit' => 'btn btn--primary btn--preserve-width',
                    'submit_button' => '<button type="submit" id="%2$s" class="%3$s" data-title="%4$s"><span>%4$s</span></button>',
                    'fields' => apply_filters('comment_form_default_fields', array(
                        
                    'author' => '<div class="form-group form-comment col-md-6"><input id="ms-author" name="author" type="text" class="form-control" placeholder="' . esc_html__( 'Name', 'jackryan' ) . '" value="' . esc_attr( $commenter['comment_author'] ) . '" required="required"/></div>', 

                    'email' => '<div class="form-group form-comment col-md-6"><input id="ms-email" name="email" class="form-control" placeholder="' . esc_attr__( 'Email', 'jackryan' ) . '" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" required="required"/></div>',) ),

                    'comment_field' => '<div class="form-group form-comment col-12"><textarea id="ms-comment" class="form-control" placeholder="' . esc_attr__( 'Your Comment', 'jackryan' ) . '" name="comment" rows="8" required="required"></textarea></div>',
                );
            ?>
            <?php comment_form($args); ?>
</div>