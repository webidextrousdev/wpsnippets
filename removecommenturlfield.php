<?php
/**
 * Remove the URL field from the comment form to demotivate spammers
 */

function remove_comment_fields($fields) {
unset($fields['url']);
return $fields;
}
add_filter('comment_form_default_fields','remove_comment_fields');