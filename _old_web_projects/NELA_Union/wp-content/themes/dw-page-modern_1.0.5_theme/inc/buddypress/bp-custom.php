<?php
if ( !function_exists('dwqa_plugin_init') && function_exists('bp_is_active') ) {
  return;
}
/*-----------------------------------------------------------------------------------*/
/*  Setup Questions in BuddyPress User Profile
/*-----------------------------------------------------------------------------------*/
add_action( 'bp_setup_nav', 'dw_page_bp_nav_adder' );
function dw_page_bp_nav_adder() {
   bp_core_new_nav_item(
    array(
      'name' => __('Questions', 'dw-page'),
      'slug' => 'questions',
      'position' => 21,
      'show_for_displayed_user' => true,
      'screen_function' => 'questions_list',
      'item_css_id' => 'questions',
      'default_subnav_slug' => 'public'
    ));
}

function questions_list() {
  add_action( 'bp_template_content', 'profile_questions_loop' );
  bp_core_load_template( apply_filters( 'bp_core_template_plugin', 'members/single/plugins' ) );
}

function profile_questions_loop() {
  global $dwqa_options;
  $submit_question_link = get_permalink( $dwqa_options['pages']['submit-question'] );

  $questions = get_posts(  array(
    'posts_per_page' => -1,
    'author'         => bp_displayed_user_id(),
    'post_type'      => 'dwqa-question'
  ));
  if( ! empty($questions) ) { ?>
    <div class="dw-question" id="archive-question">
    <?php foreach ($questions as $q) { ?>
    <article id="question-<?php echo $q->ID ?>" class="post-<?php echo $q->ID ?> dwqa-question type-dwqa-question status-publish hentry">
      <header class="entry-header">
          <a class="entry-title" href="<?php echo get_post_permalink($q->ID); ?>"><?php echo $q->post_title ?></a>
          <div class="entry-meta">
            <?php dwqa_question_print_status($q->ID); ?>
            <span><?php echo get_the_time( 'M d, Y, g:i a', $q->ID ); ?></span>
            <?php echo get_the_term_list( $q->ID, 'dwqa-question_category', '<span>Category: ', ', ', '</span>' ); ?>
            <?php echo get_the_term_list( $q->ID, 'dwqa-question_tag', '<span>Theme: ', ', ', '</span>' ); ?>                              
          </div>
    </article>
    <?php } ?>
    </div>
  <?php } else { ?>
  <div class="info" id="message">
    <?php if( get_current_user_id() == bp_displayed_user_id() ) : ?>
      Why don't you have question for us. <a href="<?php echo $submit_question_link ?>">Start asking</a>!
    <?php else : ?>
      <p><strong><?php bp_displayed_user_fullname(); ?></strong> has not asked any question.</p>
    <?php endif; ?>
  </div>
  <?php }
}

/*-----------------------------------------------------------------------------------*/
/*  Record Activities
/*-----------------------------------------------------------------------------------*/
// Question
function dw_page_record_question_activity( $post_id ) {
  $post = get_post($post_id);
  if(($post->post_status != 'publish') && ($post->post_status != 'private'))
    return;

  $user_id = get_current_user_id();
  $post_permalink = get_permalink( $post_id );
  $post_title = get_the_title( $post_id );
  $activity_action = sprintf( __( '%s asked a new question: %s', 'dw-page' ), bp_core_get_userlink( $user_id ), '<a href="' . $post_permalink . '">' . $post->post_title . '</a>' );
  $content = $post->post_content;
  $hide_sitewide = ($post->post_status == 'private') ? true : false;

  bp_blogs_record_activity( array(
    'user_id' => $user_id,
    'action' => $activity_action,
    'content' => $content,
    'primary_link' => $post_permalink,
    'type' => 'new_blog_post',
    'item_id' => 0,
    'secondary_item_id' => $post_id,
    'recorded_time' => $post->post_date_gmt,
    'hide_sitewide' => $hide_sitewide,
  ));
}
add_action( 'dwqa_add_question', 'dw_page_record_question_activity');

//Answer
function dw_page_record_answer_activity( $post_id ) {
  $post = get_post($post_id);

  if($post->post_status != 'publish')
    return;

  $user_id = $post->post_author;

  $question_id = get_post_meta( $post_id, '_question', true );
  $question = get_post( $question_id );

  $post_permalink = get_permalink($question_id);
  $activity_action = sprintf( __( '%s answered the question: %s', 'dw-page' ), bp_core_get_userlink( $user_id ), '<a href="' . $post_permalink . '">' . $question->post_title . '</a>' );
  $content = $post->post_content;

  $hide_sitewide = ($question->post_status == 'private') ? true : false;

  bp_blogs_record_activity( array(
    'user_id' => $user_id,
    'action' => $activity_action,
    'content' => $content,
    'primary_link' => $post_permalink,
    'type' => 'new_blog_post',
    'item_id' => 0,
    'secondary_item_id' => $post_id,
    'recorded_time' => $post->post_date_gmt,
    'hide_sitewide' => $hide_sitewide,
  ));
}
add_action( 'dwqa_add_answer', 'dw_page_record_answer_activity');
add_action( 'dwqa_update_answer', 'dw_page_record_answer_activity');

//Comment
function dw_page_record_comment_activity( $comment_id ) {
  $comment = get_comment($comment_id);
  $user_id = get_current_user_id();
  $post_id = $comment->comment_post_ID;
  $content = $comment->comment_content;

  if(get_post_type($post_id) == 'dwqa-question') {
    $post = get_post( $post_id );
    $post_permalink = get_permalink( $post_id );
    $activity_action = sprintf( __( '%s commented on the question: %s', 'dw-page' ), bp_core_get_userlink( $user_id ), '<a href="' . $post_permalink . '">' . $post->post_title . '</a>' );
    $hide_sitewide = ($post->post_status == 'private') ? true : false;
  } else {
    $post = get_post( $post_id );
    $question_id = get_post_meta( $post_id, '_question', true );
    $question = get_post( $question_id );
    $post_permalink = get_permalink( $question_id );
    $activity_action = sprintf( __( '%s commented on the answer at: %s', 'dw-page' ), bp_core_get_userlink( $user_id ), '<a href="' . $post_permalink . '">' . $question->post_title . '</a>' );
    $hide_sitewide = ($question->post_status == 'private') ? true : false;
  }

  bp_blogs_record_activity( array(
    'user_id' => $user_id,
    'action' => $activity_action,
    'content' => $content,
    'primary_link' => $post_permalink,
    'type' => 'new_blog_comment',
    'item_id' => 0,
    'secondary_item_id' => $comment_id,
    'recorded_time' => $comment->comment_date_gmt,
    'hide_sitewide' => $hide_sitewide,
  ));
}
add_action( 'dwqa_add_comment', 'dw_page_record_comment_activity');