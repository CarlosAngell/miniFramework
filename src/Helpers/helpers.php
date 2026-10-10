<?php
class Helpers {}

function asset($path)
{
    return '/' . ltrim($path, '/');
}

function prexit($value, bool $continue = false)
{
    if ($continue) {
        echo print_r($value, 1) . PHP_EOL;
    } else {
        echo print_r($value, 1);
        exit;
    }
}
