<?php
    class Post{
        public static function selectPosts(){

            try{

                $conn = Connection::getConn();

                if($conn->connect_error){
                    throw new Exception("Connection failed: " . $conn->connect_error);
                }

                $query = "SELECT * FROM post ORDER BY post_id DESC";

                $statement = $conn->prepare($query);

                $statement->execute();

                
                $result = $statement->get_result();
                
                var_dump($result->fetch_all(MYSQLI_ASSOC));
                //fetch_all para bancos pequenos
                
                //fetch_assoc para grandes dados.
                while($row = $result->fetch_assoc()){
                    $data[] = $row;
                    // echo $data;
                }

                $result->free();
                
                Connection::endConn();
                
                return $data;
                
            } catch (Exception $error){

                echo 'Ocorried an Error: ' . $error->getMessage();
                return [];

            }
            

        }

    }