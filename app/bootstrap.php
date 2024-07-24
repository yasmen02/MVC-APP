<?php
// Load Config
require_once '../app/configure/config.php';
//load helpers
require_once 'helpers/url_helper.php';
require_once 'helpers/session_helper.php';
// Autoload Core Libraries
spl_autoload_register(function($className){
    require_once 'libraries/' . $className . '.php';
});

