<?php

    class UserController{

        public function createUser(){

            try{

                $user_info = [
                    'username' => 'gfloriano',
                    'name' => 'Gustavo',
                    'surname' => 'Floriano',
                    'age' => 18,
                    'email' => 'gflorianodev@gmail.com'
                ];

                $user = new User($user_info);


            } catch (Exception $error){
                echo '<p id="feed_title">' . $error->getMessage() . '</p>';
            }
            echo '<p id="feed_title">' . 'kk toma no cu' . '</p>';
        }

    }