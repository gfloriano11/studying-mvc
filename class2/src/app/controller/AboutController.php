<?php

    class AboutController{

        public function about(){ 
            
            $loader = new \Twig\Loader\FilesystemLoader('../src/app/view');
            $twig = new \Twig\Environment($loader); 
            $template = $twig->load('about.html');

            var_dump(realpath('../src/app/view'));

            $params['page'] = 'About';

            $content = $template->render($params);

            echo $content;

        }
    }