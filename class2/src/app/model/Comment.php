<?php

    class Comment{
        public static function selectPostById($id){

            $conn = Connection::getConn();

            $query = "SELECT * FROM post
            WHERE post_id = ?";

            $statement = $conn->prepare($query);

            $statement->bind_param('i', $id);

            $statement->execute();

            $result = $statement->get_result();

            $data = [];

            $data = $result->fetch_assoc();

            $result->free();

            if(!$data){
                throw new Exception("This Post Doesn't Exists.");
            }

            return $data;
            
        }
    }