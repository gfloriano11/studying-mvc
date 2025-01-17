<?php

    class AdminController{

        public function admin(){

            try{
                $loader = new \Twig\Loader\FilesystemLoader('../src/app/view');
                $twig = new \Twig\Environment($loader);
                $template = $twig->load('admin.html');
    
                $posts = Post::selectPosts();
    
                $params['posts'] = $posts;
    
                $content = $template->render($params);
    
                echo $content;
            } catch (Exception $error){

                $loader = new \Twig\Loader\FilesystemLoader('../src/app/view');
                $twig = new \Twig\Environment($loader); 
                $template = $twig->load('admin.html');

                $params['posts'] = null;

                $content = $template->render($params);

                echo $content;
            }
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

            $id = $_GET['id'];

            $post = Post::selectPostById($id);

            $param['post'] = $post;

            $loader = new \Twig\Loader\FilesystemLoader('../src/app/view');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('edit_post.html');

            $content = $template->render($param);

            echo $content;
            
        }
        
        public function update(){
            $post = $_POST;

            Post::editPostById($post);
        }
        
        public function delete(){

            $post = $_GET;

            Post::deletePostById($post['id']);
        }
    }