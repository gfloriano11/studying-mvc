<?php

    class HomeController{

        public function home(){

            
            try{
                                
                $posts = Post::selectPosts();

                echo '<p id=feed_title>Posts Recentes:</p>';
                

            } catch (Exception $error){
                echo '<p id="feed_title">' . $error->getMessage() . '</p>';
            }

        }
    }