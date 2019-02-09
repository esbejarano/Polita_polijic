<?php

    function sanitize($value) {
        $text = filter_var($value, FILTER_SANITIZE_STRING);
        $text = filter_var($text, FILTER_SANITIZE_MAGIC_QUOTES);
        $text = filter_var($text, FILTER_SANITIZE_SPECIAL_CHARS);
        return $text;
    }

?>