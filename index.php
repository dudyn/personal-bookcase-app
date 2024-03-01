<?php

require_once("pages/nav.php");

$path = $_SERVER['REQUEST_URI'];

if ($path == '/'){
    require_once("pages/display.php");
}
else if ($path == '/pages/add.php'){
    require_once("pages/add.php");
}
else{
    require_once("pages/update.php");
}