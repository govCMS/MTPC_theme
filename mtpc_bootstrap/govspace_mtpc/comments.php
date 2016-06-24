<?php
/**
 * @author madars.bitenieks
 * @copyright 2011
 */
?>

<?php if (post_password_required()): ?>
<p class="nopassword"><?php _e('This post is password protected. Enter the password to view and post comments.', 'madza_translate'); ?></p>

<?php
    return;
endif;
?>

<?php if (have_comments()) : ?>
<h2><?php
            printf(_n('One Response to %2$s', '%1$s Responses to %2$s', get_comments_number(), 'madza_translate'),
                   number_format_i18n(get_comments_number()), '' . get_the_title() . '');
    ?></h2>

<?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : // Are there comments to navigate through? ?>
    <div class="navigation">
        <div class="nav-previous"><?php previous_comments_link(__('<span class="meta-nav">&larr;</span> Older Comments', 'madza_translate')); ?></div>
        <div class="nav-next"><?php next_comments_link(__('Newer Comments <span class="meta-nav">&rarr;</span>', 'madza_translate')); ?></div>
    </div> <!-- .navigation -->
    <?php endif; // check for comment navigation ?>

<ol class="commentlist">
    <?php
                        wp_list_comments(array('callback' => 'Gooseo_comment'));
        ?>
</ol>
<div class="line-comment"></div>

<?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : // Are there comments to navigate through? ?>
    <div class="navigation">
        <div class="nav-previous"><?php previous_comments_link(__('<span class="meta-nav">&larr;</span> Older Comments', 'madza_translate')); ?></div>
        <div class="nav-next"><?php next_comments_link(__('Newer Comments <span class="meta-nav">&rarr;</span>', 'madza_translate')); ?></div>
    </div><!-- .navigation -->
    <?php endif; // check for comment navigation ?>

<?php  else : // or, if we don't have comments:

    if (!comments_open()) :
        ?>

    <?php endif; // end ! comments_open() ?>

<?php endif; // end have_comments() ?

$fields = array(
    'author' => '<p class="comment-input">' . __('Name:', "madza_translate") . '' . ($req
            ? '<span class="required">*</span>' : '') . '<br /> ' .
                '<input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30"' . $aria_req . ' />',
    'email' => '<p class="comment-input">' . __('Email:', "madza_translate") . '' . ($req
            ? '<span class="required">*</span>' : '') . '<br /> ' .
               '<input id="email" name="email" type="text" value="' . esc_attr($commenter['comment_author_email']) . '" size="30"' . $aria_req . ' />',
    'url' => '<p class="comment-input">' . __('Website:', "madza_translate") . '<br />' .
             '<input class="input" id="url" name="url" type="text" value="' . esc_attr($commenter['comment_author_url']) . '" size="30" /></p>',
);

$defaults = array(
    'fields' => apply_filters('comment_form_default_fields', $fields),
    'comment_field' => '<p class="comment-textarea">' . __('Message:*', "madza_translate") . '<textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',
    'must_log_in' => '<p class="must-log-in">' . sprintf(__('You must be <a href="%s">logged in</a> to post a comment.', "madza_translate"), wp_login_url(apply_filters('the_permalink', get_permalink($post_id)))) . '</p>',
    'logged_in_as' => '<p class="logged-in-as">' . sprintf(__('Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', "madza_translate"), admin_url('profile.php'), $user_identity, wp_logout_url(apply_filters('the_permalink', get_permalink($post_id)))) . '</p>',
    'comment_notes_before' => '',
    'comment_notes_after' => '',
    'id_form' => 'commentform',
    'id_submit' => 'submit',
    'title_reply' => __('Leave a Reply', "madza_translate"),
    'title_reply_to' => __('Leave a Reply to %s', "madza_translate"),
    'cancel_reply_link' => __('Cancel reply', "madza_translate"),
    'label_submit' => __('Post Comment', "madza_translate")
);

comment_form($defaults); ?>

<!-- #comments -->
