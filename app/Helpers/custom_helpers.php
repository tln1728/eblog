<?php

if (!function_exists('set_active_class')) {
    function set_active_class($path, $class = 'active') {
        return request()->is($path) ? $class : '';
    }
}