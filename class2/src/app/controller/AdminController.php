<?php

    class AdminController{

        public function admin(){

            $loader = new \Twig\Loader\FilesystemLoader('../src/app/view');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('admin.html');

            $posts = Post::selectPosts();

            $params['posts'] = $posts;

            $content = $template->render($params);

            echo $content;
        }
    }