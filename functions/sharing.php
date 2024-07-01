<?php

/**
 * @description SHARING on Social media (FB, LN, TW)
 * @link https://crunchify.com/how-to-create-social-sharing-button-without-any-plugin-and-script-loading-wordpress-speed-optimization-goal/
 * @param $content
 * @return mixed|string
 */
function social_share_code($content)
{
    global $post;
    if (is_singular()) {
        // Twitter script
        echo "<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>";
        // Facebook HTML5 script
        echo "<script>(function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(d.getElementById(id))return;js=d.createElement(s);js.id=id;js.src='//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0';fjs.parentNode.insertBefore(js,fjs);}(document,'script','facebook-jssdk'));</script>";
        // LinkedIn script
        echo "<script src='//platform.linkedin.com/in.js' type='text/javascript'>lang: en_US</script>";

        // Get current page URL
        $postURL = urlencode(get_permalink());

        // Get current page title
        $postTitle = htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8');

        // Construct sharing URL
        $twitterURL = 'https://twitter.com/intent/tweet?text=' . $postTitle . '&amp;url=' . $postURL . '&amp;via=slidepeak.com';
        $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u=' . $postURL;
//        $linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url=' . $postURL . '&amp;title=' . $postTitle;

        // Add sharing button markup
        $content .= '<div class="share__list">';
        $content .= '<a id="shareTwitter" class="share__item share--twitter" href="' . $twitterURL . '" target="_blank"></a>';
        $content .= '<a id="shareFacebook" class="share__item share--facebook" href="' . $facebookURL . '" target="_blank"></a>';
//        $content .= '<a class="post__social-link post__social-linkedin" href="' . $linkedInURL . '" target="_blank"></a>';
        $content .= '</div>';

        return $content;
    } else {
        // if not a post/page then don't include sharing button
        return $content;
    }
}

add_shortcode('social_share', 'social_share_code');

?>