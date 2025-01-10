<?php

    class Comment{
        
        public static function selectComments($post_data){

            $conn = Connection::getConn();

            if($conn->connect_error){
                throw new Exception("Connection failed: " . $conn->connect_error);
            }

            var_dump($post_data);

            foreach ($post_data as $post) {
                $id = $post['post_id']; // Acessando o 'id' de cada post

                $query = "SELECT * FROM comments
                WHERE post_id = ?";

                $statement = $conn->prepare($query);

                $statement->bind_param('i', $id);

                $statement->execute();

                $result = $statement->get_result();

                $comments_data = [];

                while($row = $result->fetch_assoc()){
                    $comments_data[] = $row;
                }

                if(!$comments_data){
                    throw new Exception("Any Post has Been Posted!");
                }

                $result->free();

                Connection::endConn();


                return $comments_data;
            }
        }
    }