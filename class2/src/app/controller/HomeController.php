<?php

    class HomeController{

        public function home(){

            
            try{

                $posts = Post::selectPosts();
                $params['posts'] = $posts; 
                
                // foreach($posts as $post){
                    
                //     $comments[$post->post_id] = Comment::selectCommentsByPostId($post->post_id);
                // }

                // $params['comments'] = $comments;
                
                $loader = new \Twig\Loader\FilesystemLoader('../src/app/view');
                $twig = new \Twig\Environment($loader); 
                $template = $twig->load('home.html');
                
                $params['posts'] = $posts;

                $content = $template->render($params);
                // $content = $template->render($params);

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