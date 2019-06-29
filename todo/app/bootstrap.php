<?php 
    // Load the Config File
    require_once 'config/config.php';
    // Load Helpers
    require_once 'helpers/url_helper.php';
    require_once 'helpers/session_helper.php';

    // // load the libraries classes for the core function of the app
    // require_once 'libraries/core.php';
    // require_once 'libraries/controller.php';
    // require_once 'libraries/database.php';

    // Autoload Core Libraries
    spl_autoload_register(function($className) {
        require_once 'libraries/'. $className . '.php';
    }) 
?>