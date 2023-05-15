<?php
// =============================================================================
// COMMENTS.PHP
// -----------------------------------------------------------------------------
// Show the comments list of every custom Post Type - List and for blog posts.
// Show the comment form for write a new comment.
// =============================================================================

if (post_password_required()) {
	return;
}

$execoore_args = array(
  'id_form'           => 'commentform',
  'class_form'      => 'form-box',
  'id_submit'         => 'submit',
  'class_submit'      => 'btn btn-sm',
  'name_submit'       => 'submit',
  'title_reply'       => esc_attr__('Leave a Reply',"execoore"),
  'title_reply_before' => '<h2>',
  'title_reply_after' => '</h2>',
  'title_reply_to'    => esc_attr__('Leave a Reply to %s',"execoore"),
  'cancel_reply_link' => esc_attr__('Cancel Reply',"execoore"),
  'label_submit'      => esc_attr__('Post Comment',"execoore"),
  'format'            => 'xhtml',
  'comment_field' =>  '<p><b>' . esc_attr__('Comment',"execoore") . '</b></p><textarea id="comment" name="comment" class="input-textarea"></textarea>',
  'must_log_in' => '<p class="must-log-in">' . sprintf('You must be <a href="%s">logged in</a> to post a comment.',wp_login_url( apply_filters( 'the_permalink', get_permalink()))) . '</p>',
  'logged_in_as' => '<p class="logged-in-as">' . sprintf('Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="' . esc_attr__('Log out of this account',"execoore") . '">' . esc_attr__('Log out?',"execoore") . '</a>', admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( )))) . '</p>',
  'comment_notes_before' => '<p class="comment-notes">' . esc_attr__('Your email address will not be published.',"execoore")  . '</p>',
  'comment_notes_after' => '',
  'fields' => apply_filters('comment_form_default_fields', array(
      'author' =>'<div class="row"><div class="col-lg-4"><p><b>' . esc_attr__('Name',"execoore") . '</b></p><input type="text" id="author" name="author" class="input-text" value=""></div>',
      'email' => '<div class="col-lg-4"><p><b>' . esc_attr__('Email',"execoore") . '</b></p><input type="text" id="email" name="email" class="input-text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '"></div>',
      'url' =>'<div class="col-lg-4"><p><b>' . esc_attr__('Url',"execoore") . '</b></p><input type="text" id="url" name="url" class="input-text" value=""></div></div><hr class="space-sm">',
   ))
);

function execoore_comments_list($comment, $args, $depth) {
    $comment_type = get_comment_type();
    if ($comment_type == 'trackback' || $comment_type == 'pingback') { ?>
<div class="item row">
    <div class="col-md-12">
        <p class="name">
            <?php esc_attr_e( 'Pingback: ',"execoore"); comment_author_link(); ?>
        </p>
    </div>
<?php } else { ?>
<div class="item" id="div-comment-<?php comment_ID() ?>">
    <div class="caption">
        <img src="<?php $tmp = get_avatar_data($comment); echo esc_url($tmp["url"]) ?>" alt="profile" />
        <div>
            <?php
            $comment_author = ucfirst($comment->comment_author);
            $comment_txt = $comment->comment_content;
            ?>
            <p class="name">
                <?php echo esc_html($comment_author) ?>
                <span>
                    <?php echo esc_html(get_comment_date()) ?>
                </span>
            </p>
            <p class="msg">
                <?php echo wp_kses_post($comment_txt) ?>
            </p>
            <div class="reply">
                <?php comment_reply_link(array('add_below' => 'div-comment', 'reply_text' => esc_attr__( 'Reply ',"execoore") . '<span>&darr;</span>', 'depth' => $depth, 'max_depth' => 10)); ?>
            </div>
        </div>
    </div>
    
<?php
    }
}
?>
<div id="comments" class="comments-area">
    <?php if (have_comments()) { ?>
    <div class="comment-list">
        <?php
              $n = get_comments_number();
              $world = esc_attr__("comment","execoore");
              if ($n > 1)  $world .= "s";
        ?>
        <h2>
            <?php echo esc_html(get_comments_number() . " " . $world) ?>
        </h2>
        <?php  wp_list_comments(array('callback' => 'execoore_comments_list','style'=>'div')); ?>
    </div>
    <div class="pagination pagination-sm">
        <?php paginate_comments_links(); ?>
    </div>
    <?php }
          comment_form($execoore_args);
    ?>
</div>