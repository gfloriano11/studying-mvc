<?php 

    class PostController{

        public function post(){

            try{

                $id = $_GET['id'];

                $selectedPost[] = Post::selectPostById($id);

                $loader = new \Twig\Loader\FilesystemLoader('../src/app/view');
                $twig = new \Twig\Environment($loader); 
                $template = $twig->load('post.html');

                $params = array();
                $params['title'] = $selectedPost[0]['title'];
                $params['content'] = $selectedPost[0]['content'];

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