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

            while($row = $result->fetch_object('Post')){
                $data[] = $row;
            }

            $result->free();
                
            
            if(!$data){
                throw new Exception("Any Post has been Posted :(");
            }
            
            // Connection::endConn();
            
            return $data;
        }

        public static function selectPostById($id){

            $conn = Connection::getConn();

            $query = "SELECT * FROM post
            WHERE post_id = ?";

            $statement = $conn->prepare($query);

            $statement->bind_param('i', $id);

            $statement->execute();

            $result = $statement->get_result();

            $data = $result->fetch_object('Post');

            $result->free();

            return $data;
            
        }

        public static function createPost($post_data){

            if($post_data){

                $conn = Connection::getConn();

                foreach($post_data as $key => $value){
                    $$key = $value; // loop que transforma cada atributo do form em uma variavel.
                }

                $query = "INSERT INTO post
                (title, content)
                VALUES
                (?, ?)";
                
                $statement = $conn->prepare($query);
    
                $statement->bind_param('ss', $post_title,  $post_content);
    
                $statement->execute();
    
                Connection::endConn();

                header('location: index.php');
            }
            
        }

        // public static function editPostById($post_id){

            
        // }
    }