<?php

    class AboutController{

        public function about(){ 
            
            $loader = new \Twig\Loader\FilesystemLoader('../src/app/view');
            $twig = new \Twig\Environment($loader); 
            $template = $twig->load('about.html');

            $params['page'] = 'About';

            $content = $template->render($params);

            echo $content;

        }
    }