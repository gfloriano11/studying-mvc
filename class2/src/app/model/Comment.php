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

            while($row = $result->fetch_object('Comment')){
                $data[] = $row;
            }
    
            $result->free();
    
            if(!$data){
                throw new Exception("Be the first to Comment!");
            }
                
            // Connection::endConn();

            return $data;
        }
    }