<?php
function dd ($value): void
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function isUrl ($value): ?string
{
    return $_SERVER['REQUEST_URI'] === $value;
}