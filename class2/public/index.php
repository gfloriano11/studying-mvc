<?php

    require_once '../src/app/core/Core.php';

    $template = file_get_contents('../src/app/template/structure.html');

    // file_get_contents -> get the structure.html

    $core = new Core;
    $core->start_application($_GET); // calls function and get the url that user is in the moment.
    
    echo $template;
    
    // echo to put the html in this page.
    
?>

<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/social_media.css">
    <link rel="stylesheet" href="styles/global.css">
    <title>Welcome to The Social Media</title>
</head>
<body>
    <p>Hello World!</p>
</body>
</html>