<?php

if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area">
    <?php if (have_comments()) : ?>
        <h3 class="comments-title">
            <?php
            $comment_count = get_comments_number();
            if ('1' === $comment_count) {
                printf(
                    esc_html__('One comment on &ldquo;%1$s&rdquo;', 'modernpress'),
                    '<span>' . get_the_title() . '</span>'
                );
            } else {
                printf(
                    esc_html(_nx(
                        '%1$s comment on &ldquo;%2$s&rdquo;',
                        '%1$s comments on &ldquo;%2$s&rdquo;',
                        $comment_count,
                        'comments title',
                        'modernpress'
                    )),
                    number_format_i18n($comment_count),
                    '<span>' . get_the_title() . '</span>'
                );
            }
            ?>
        </h3>

        <ol class="comment-list">
            <?php
            wp_list_comments(array(
                'style' => 'ol',
                'short_ping' => true,
                'callback' => 'modernpress_comment_callback',
            ));
            ?>
        </ol>

        <?php
        the_comments_navigation(array(
            'prev_text' => '← Older Comments',
            'next_text' => 'Newer Comments →',
        ));
        ?>

    <?php endif; ?>

    <?php if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) : ?>
        <p class="no-comments"><?php esc_html_e('Comments are closed.', 'modernpress'); ?></p>
    <?php endif; ?>

    <?php
    comment_form(array(
        'title_reply' => esc_html__('Leave a Comment', 'modernpress'),
        'title_reply_to' => esc_html__('Leave a Reply to %s', 'modernpress'),
        'cancel_reply_link' => esc_html__('Cancel Reply', 'modernpress'),
        'label_submit' => esc_html__('Post Comment', 'modernpress'),
        'class_submit' => 'btn',
        'comment_field' => '<p class="comment-form-comment"><label for="comment">' . esc_html__('Comment', 'modernpress') . ' <span class="required">*</span></label><textarea id="comment" name="comment" cols="45" rows="8" required="required"></textarea></p>',
    ));
    ?>
</div>

<?php
function modernpress_comment_callback($comment, $args, $depth) {
    $tag = ($args['style'] === 'div') ? 'div' : 'li';
    ?>
    <<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class(empty($args['has_children']) ? '' : 'parent'); ?>>
        <article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
            <footer class="comment-meta">
                <div class="comment-author vcard">
                    <?php echo get_avatar($comment, $args['avatar_size']); ?>
                    <?php printf('<b class="fn">%s</b>', get_comment_author_link()); ?>
                </div>
                
                <div class="comment-metadata">
                    <a href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>">
                        <time datetime="<?php comment_time('c'); ?>">
                            <?php printf(esc_html__('%1$s at %2$s', 'modernpress'), get_comment_date(), get_comment_time()); ?>
                        </time>
                    </a>
                    <?php edit_comment_link(esc_html__('Edit', 'modernpress'), '<span class="edit-link">', '</span>'); ?>
                </div>
            </footer>

            <div class="comment-content">
                <?php comment_text(); ?>
            </div>

            <?php
            comment_reply_link(array_merge($args, array(
                'add_below' => 'div-comment',
                'depth' => $depth,
                'max_depth' => $args['max_depth'],
                'reply_text' => esc_html__('Reply', 'modernpress'),
            )));
            ?>
        </article>
    <?php
}
?>