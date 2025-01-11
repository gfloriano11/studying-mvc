<?php 

    class PostController{

        public function post(){

            try{

                $id = $_GET['id'];

                $selectedPost = Post::selectPostById($id);
                $selectedComments = Comment::selectComments($id);

                $loader = new \Twig\Loader\FilesystemLoader('../src/app/view');
                $twig = new \Twig\Environment($loader); 
                $template = $twig->load('post.html');

                $params['post'] = $selectedPost;
                $params['comments'] = $selectedComments;

                $content = $template->render($params);

                echo $content;

            } catch (Exception $error){
                $loader = new \Twig\Loader\FilesystemLoader('../src/app/view');
                $twig = new \Twig\Environment($loader); 
                $template = $twig->load('post.html');

                $params['posts'] = null;

                $content = $template->render($params);

                echo $content;
            }
        }
    }