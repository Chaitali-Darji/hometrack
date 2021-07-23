<?php

if (!function_exists('format_date')) {
    function format_date($date, $format = 'm/d/Y H:i A')
    {
        return date($format, strtotime($date));
    }
}

if (!function_exists('format_price')) {
    function format_price($price)
    {
        return "$ ".number_format($price, 2);
    }
}
