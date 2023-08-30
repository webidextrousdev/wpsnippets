<?php
/**
 * Add an admin column to show how many images are in a post
 */

add_filter('manage_posts_columns', 'posts_columns_attachment_count', 5);
add_action('manage_posts_custom_column', 'posts_custom_columns_attachment_count', 5, 2);

function posts_columns_attachment_count($defaults){
$defaults['wps_post_attachments'] = __('Attached');
return $defaults;
}
function posts_custom_columns_attachment_count($column_name, $id){
if($column_name === 'wps_post_attachments'){
$attachments = get_children(array('post_parent'=&gt;$id));
$count = count($attachments);
if($count !=0){echo $count;}
}
}