<?php

if (!function_exists('set_active_class')) {
    function set_active_class($path, $class = 'active') {
        return request()->is('admin/'.$path) ? $class : '';
    }
}

if (!function_exists('is_selected')) {
    function is_selected($value, $array) {
        return is_array($array) && in_array($value,$array) ? 'selected' : '';
    }
}