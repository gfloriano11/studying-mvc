<?php

    class HomeController{

        public function home(){

            
            try{

                $posts = Post::selectPosts();
                $params['posts'] = $posts; 
                
                $loader = new \Twig\Loader\FilesystemLoader('../src/app/view');
                $twig = new \Twig\Environment($loader); 
                $template = $twig->load('home.html');
                
                $params['posts'] = $posts;

                $content = $template->render($params);

                echo $content;

            } catch (Exception $error){

                $loader = new \Twig\Loader\FilesystemLoader('../src/app/view');
                $twig = new \Twig\Environment($loader); 
                $template = $twig->load('home.html');

                $params['posts'] = null;

                $content = $template->render($params);

                echo $content;
            }

        }
    }