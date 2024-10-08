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
                <div class="table-content__title">Contents:</div>
                <ul class="table-content__list">';
        $h2_status = 0;
        $h3_status = 0;
        $i = 1;
        foreach($dom->getElementsByTagName('*') as $element) {
            if($element->tagName == 'h2' || $element->tagName == 'h3' || $element->tagName == 'h4' || $element->tagName == 'h5' || $element->tagName == 'h6') {
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
                  $toc .= '<li class="table-content__item"><a href="' . get_the_permalink() . '#' . $itemLink . '" class="table-content__link">' . $element->textContent . '</a>';
                  $element->setAttribute('id', $itemLink);
                  $i++;
            }
        }
        if($h2_status){
            $toc .= '</li>';
        }
        $toc .= '</ul><a href="#" class="button--arrow-up button--desktop">Scroll Up</a></div>';
        $html = $dom->saveHTML();
    }
    return $toc . $html;
}
add_filter('the_content', 'create_toc');
?>