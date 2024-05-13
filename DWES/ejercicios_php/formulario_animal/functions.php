<?php
    /**
     * show_page() imprime el número de página actual sobre la que se está paginando.
     */
    function show_page($page, $pages_number, $symbol) {

        if($symbol == "<") {

            echo $page == 1 ? $pages_number : $page - 1;
        } else {

            echo $page == $pages_number ? 1 : $page + 1;
        }
    }
?>