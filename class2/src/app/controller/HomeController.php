<?php

    class HomeController{

        public function home(){

            // echo '<p id=feed_title>Posts Recentes:</p>';

            Post::selectPosts();

        }
    }