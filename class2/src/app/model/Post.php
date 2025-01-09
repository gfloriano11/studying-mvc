<?php
        //fetch_all -> bancos pequenos
        
        //fetch_assoc -> grandes dados
    class Post{
        public static function selectPosts(){

            $conn = Connection::getConn();

            if($conn->connect_error){
                throw new Exception("Connection failed: " . $conn->connect_error);
            }

            $query = "SELECT * FROM post ORDER BY post_id DESC ";

            $statement = $conn->prepare($query);

            $statement->execute();

                
            $result = $statement->get_result();
                

            $data = [];

            while($row = $result->fetch_assoc()){
                $data[] = $row;
            }

            $result->free();
                
            
            if(!$data){
                throw new Exception("Any Post has been Posted :(");
            }
            
            // Connection::endConn();
            
            return $data;
        }

        public static function selectComments($post_data){

            $conn = Connection::getConn();

            if($conn->connect_error){
                throw new Exception("Connection failed: " . $conn->connect_error);
            }

            // var_dump($post_data);

            foreach ($post_data as $post) {
                $id = $post['post_id']; // Acessando o 'id' de cada post

                $query = "SELECT comment_id, user_name, c.content, c.created_at FROM comments AS c
                INNER JOIN post AS p
                ON p.post_id = c.post_id
                WHERE c.post_id = $id
                ORDER BY p.post_id DESC";

                $statement = $conn->prepare($query);

                $statement->execute();

                $result = $statement->get_result();

                $comments_data = [];

                while($row = $result->fetch_assoc()){
                    $comments_data[] = $row;
                }

                $result->free();

                Connection::endConn();


                return $comments_data;
            }
        }
    }