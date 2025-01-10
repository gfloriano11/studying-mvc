<?php

    require_once '../src/app/lib/database/Connection.php';

    require_once '../src/app/core/Core.php';
    
    require_once '../src/app/controller/HomeController.php';
    require_once '../src/app/controller/AboutController.php';
    require_once '../src/app/controller/ErrorController.php';
    require_once '../src/app/controller/UserController.php';
    require_once '../src/app/controller/PostController.php';

    require_once '../src/app/model/Post.php';
    require_once '../src/app/model/User.php';

    require_once '../vendor/autoload.php';

    $template = file_get_contents('../src/app/template/template.html');

    // file_get_contents -> get the structure.html

    ob_start(); //

        $core = new Core;
        $core->start_application($_GET); // calls function and get the url that user is in the moment.

        $result = ob_get_contents();

    ob_end_clean();

    $finalPage = str_replace('{{change}}', $result, $template);

    echo $finalPage;
    
    // echo to put the html in this page.
    