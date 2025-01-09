<?php

    class HomeController{

        public function home(){

            
            try{

                $posts = Post::selectPosts();
                
                $loader = new \Twig\Loader\FilesystemLoader('../src/app/view');
                $twig = new \Twig\Environment($loader); 
                $template = $twig->load('home.html');
                
                $params = array();
                $params['posts'] = $posts;

                $data = $params['posts'];

                // var_dump($data);

                $comments = Post::selectComments($data);

                $params['comments'] = $comments;

                // var_dump($params['comments']);

                $content = $template->render($params);
                // $content = $template->render($params);

                echo $content;
                                

                // echo '<p id=feed_title>Posts Recentes:</p>';
                

            } catch (Exception $error){
                echo '<p id="feed_title">' . $error->getMessage() . '</p>';
            }

        }
    }