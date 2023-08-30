<?php
/**
 * Replace the img tag with the picture tag for better responsiveness
 * See https://webdeasy.de/en/wordpress-code-snippets-en/#responsive-images-img-tag-to-picture-tag 
 */

 function rewrite_img_to_picture_tag($content) {
    preg_match_all("/<img.*src=\"([^\"]+).*\salt=\"([^\"]*).*\"\swidth=\"([^\"]*).*\"\/>/", $content, $matches);

    for($i = 0; $i < count($matches[0]); $i++) {
      if(strpos($matches[1][$i], ".gif") !== false) continue;
        $img_id = find_post_id_from_path($matches[1][$i]);
        $width = (count($matches) > 2 ? $matches[3][$i] : "");
        $medium_img = wp_get_attachment_image_url($img_id, "large");
        $small_img = wp_get_attachment_image_url($img_id, "medium");
        $img_tag = "<picture>
            <source srcset=\"" . $medium_img . "\" media=\"(min-width: 768px)\">
            <source srcset=\"" . $small_img . "\">";

        if($width) {
          $img_tag .= "<img loading=\"lazy\" src=\"" . $matches[1][$i] . "\" width=\"" . $matches[3][$i] . "\" alt=\"" . $matches[2][$i] . "\"></picture>";
        } else {
            $img_tag .= "<img loading=\"lazy\" src=\"" . $matches[1][$i] . "\" alt=\"" . $matches[2][$i] . "\"></picture>";
        }

        $content = str_replace($matches[0][$i], $img_tag, $content);
    }

    return $content;

}
add_filter('the_content', 'rewrite_img_to_picture_tag');