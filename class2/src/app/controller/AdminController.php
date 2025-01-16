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

        public function create(){
            $post = $_POST;
            
            $loader = new \Twig\Loader\FilesystemLoader('../src/app/view');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('create_post.html');

            $content = $template->render();
            
            echo $content;

            Post::createPost($post);

        }

        public function edit(){

            $post = $_POST;

            $param['post'] = $post;

            var_dump($post);
            // echo $param['post']->post_id;

            
            $loader = new \Twig\Loader\FilesystemLoader('../src/app/view');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('edit_post.html');

            $content = $template->render($param);

            echo $content;

            Post::editPostById($param['post']);
            
        }
        
        public function delete(){

            $post = $_GET;

            Post::deletePostById($post['id']);
        }
    }