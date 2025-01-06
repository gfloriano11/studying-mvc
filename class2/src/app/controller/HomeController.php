<?php

    class HomeController{

        public function home(){

            // echo '<p id=feed_title>Posts Recentes:</p>';

            $posts = Post::selectPosts();

            var_dump($posts);

        }
    }