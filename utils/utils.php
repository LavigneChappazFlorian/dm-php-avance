<?php
    // This function can be used to create redirects by taking the url as a parameter
    function redirectTo($url) {
        header("Location: $url");
    }

    // This function is used to include a PHP file to generate a page. It takes three parameters: path, data and template
    function render($path, $data = [], $template = false) {
        if ($template) {
            require "templates/$path.php";
        } else {
            require "views/$path.php";
        }
    }
?>