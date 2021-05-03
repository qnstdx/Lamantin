<?php

function panic(string $msg): void
{
    echo $msg;
    exit();
}

function dump($data): void
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

function redirect(string $to): void
{
    header("Location: $to");
}

function isAuth()
{
    return isset($_COOKIE['t']) === true;
}