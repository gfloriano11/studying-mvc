<?php

    class Comment{
        
        public static function selectCommentsByPostId($post_id){

            $conn = Connection::getConn();

            if($conn->connect_error){
                throw new Exception("Connection failed: " . $conn->connect_error);
            }

            $id = $post_id; // Acessando o 'id' do post
            
            $query = "SELECT * FROM comments
            WHERE post_id = ?";

            $statement = $conn->prepare($query);

            $statement->bind_param('i', $id);

            $statement->execute();

            $result = $statement->get_result();

            $data = array();
            
            while($row[] = $result->fetch_object('Comment')){
                $data = $row;
            }

    
            $result->free();
                
            // Connection::endConn();

            return $data;
        }

        public static function createPost($comment){

            $conn = Connection::getConn();

            foreach($comment as $key => $value){
                $$key = $value;
            }

            $query = "INSERT INTO comments
            (post_id, user_name, content)
            VALUES
            (?, ?, ?)";

            $statement = $conn->prepare($query);

            $statement->bind_param('iss', $post_id, $username, $content);

            $statement->execute();

            Connection::endConn();

        }

        public static function deleteCommentsByPost($post_id){
            
            $conn = Connection::getConn();

            $query = "DELETE FROM post
            WHERE post_id = ?";

            $statement = $conn->prepare($query);

            $statement->bind_param('i', $post_id);

            $statement->execute();

            Connection::endConn();
        }
    }