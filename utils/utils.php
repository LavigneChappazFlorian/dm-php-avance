<?php
    function redirectTo($url) {
        header("Location: $url");
    }

    function render($path, $data = [], $template = false) {
        if ($template) {
            require "templates/$path.php";
        } else {
            require "views/$path.php";
        }
    }
?>