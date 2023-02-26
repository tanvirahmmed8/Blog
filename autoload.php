<?php
function my_autoloader($class_name) {
    include_once 'include/'.$class_name . '.php';
}

spl_autoload_register('my_autoloader');