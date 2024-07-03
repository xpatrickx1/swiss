<?php
function create_toc($html) {
    $toc = '';
    if (is_single()) {
        if (!$html) return $html;
        $dom = new DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'));
        libxml_clear_errors();
        $toc = '<div class="table-content">
            <div class="table-content__title">Table of contents</div>
            <ul class="table-content__list">';
        $h2_status = 0;
        $h3_status = 0;
        $i = 1;
        foreach($dom->getElementsByTagName('*') as $element) {
            if($element->tagName == 'h2') {
                if($h3_status){
                    $toc .= '</ul>';
                    $h3_status = 0;
                    }
                 if($h2_status){
                    $toc .= '</li>';
                    $h2_status = 0;
                  }
                  $h2_status = 1;
                  $itemTitle = $element->textContent;
                  $itemLink = str_replace( " ", "-", $itemTitle );
                  $toc .= '<li class="table-content__item"><a href="' . get_the_permalink() . '#' . $itemLink . '">' . $element->textContent . '</a>';
                  $element->setAttribute('id', $itemLink);
                  $i++;
            }
        }
        if($h2_status){
            $toc .= '</li>';
        }
        $toc .= '</ul></div>';
        $html = $dom->saveHTML();
    }
    return $toc . $html;
}
add_filter('the_content', 'create_toc');
?>