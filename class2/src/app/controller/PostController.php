<?php 

    class PostController{

        public function post(){

            try{

                $id = $_GET['id'];

                $selectedPost[] = Post::selectPostById($id);

                $loader = new \Twig\Loader\FilesystemLoader('../src/app/view');
                $twig = new \Twig\Environment($loader); 
                $template = $twig->load('post.html');

                $params = [];

                $params['post'] = $selectedPost[0]; // pega sempre a primeira posição do array =>
                // já que o result da query sempre vai ser um post só, sempre será [0] 

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