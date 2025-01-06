<?php
        //fetch_all -> bancos pequenos
        
        //fetch_assoc -> grandes dados
    class Post{
        public static function selectPosts(){

            $conn = Connection::getConn();

            if($conn->connect_error){
                throw new Exception("Connection failed: " . $conn->connect_error);
            }

            $query = "SELECT * FROM post WHERE 'title' = 'kkj' ORDER BY post_id DESC ";

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
            
            Connection::endConn();
            
            return $data;
        }
    }