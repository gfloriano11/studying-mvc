<?php

    class CommentController{

        public function create(){

            $comment = array();
            
            $post_id = $_GET['id'];

            $param['post'] = Post::selectPostById($post_id);
            
            $loader = new \Twig\Loader\FilesystemLoader('../src/app/view');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('create_comment.html');
            
            $content = $template->render($param);
            
            echo $content;

            $comment = $_POST;

            if($comment){
                Comment::createPost($comment);
            }
        }
    }