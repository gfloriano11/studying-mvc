<?php 

    class PostController{

        public function post(){

                $id = $_GET['id'];

                $selectedPost = Post::selectPostById($id);
                $selectedComments = Comment::selectCommentsByPostId($id);

                $loader = new \Twig\Loader\FilesystemLoader('../src/app/view');
                $twig = new \Twig\Environment($loader); 
                $template = $twig->load('post.html');

                $params['post'] = $selectedPost;
                $params['comments'] = $selectedComments;

                $content = $template->render($params);

                echo $content;

        }
    }