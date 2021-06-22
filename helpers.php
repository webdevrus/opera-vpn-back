<?php

if (!function_exists('action')) {
    function action(): string {
        return sprintf('%s://%s%s', $_SERVER['REQUEST_SCHEME'], $_SERVER['HTTP_HOST'], $_SERVER['REQUEST_URI']);
    }
}

if (!function_exists('session_flash')) {
    function session_flash(string $key) {
        if (isset($_SESSION['_flash'][$key])) {
            $data = $_SESSION['_flash'][$key];
            unset($_SESSION['_flash'][$key]);
        }

        return $data ?? false;
    }
}
