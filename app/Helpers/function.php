<?php
if (!function_exists('get_data_user')) {
    function get_data_user($type, $field = "id")
    {
        return Auth::guard($type)->users() ? Auth::guard($type)->users()->$field : "";
    }
}

