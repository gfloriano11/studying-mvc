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

                $id = $params['posts.id'];

                $comments = Post::selectComments($id);

                $params['comments'] = $comments;

                $content = $template->render($params);

                echo $content;
                                

                // echo '<p id=feed_title>Posts Recentes:</p>';
                

            } catch (Exception $error){
                echo '<p id="feed_title">' . $error->getMessage() . '</p>';
            }

        }
    }