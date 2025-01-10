<?php 

    class PostController{

        public function post(){

            try{

                $id = $_GET['id'];

                $selectedPost = Post::selectPostById($id);

                $loader = new \Twig\Loader\FilesystemLoader('../src/app/view');
                $twig = new \Twig\Environment($loader); 
                $template = $twig->load('post.html');

                $params = array();

                $params['post'] = $selectedPost;

                $params['testes'] = 'olá kkj';

                $content = $template->render($params);

                echo $content;



            } catch (Exception $error){
                echo '<p id="feed_title">' . $error->getMessage() . '</p>';
            }
        }
    }