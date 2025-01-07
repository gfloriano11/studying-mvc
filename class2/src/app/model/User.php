<?php 

    class User{

        public $username;
        private $name;
        private $surname;
        private $age;
        private $email;

        public function __construct($data){

            foreach($data as $key => $value){
                $this->$key = $value;

            }
        }

        public function createUser($data){

            $conn = Connection::getConn();

            try{

                if($conn->connect_error){
                    throw new Exception('Connection Failed :(');
                }

                $query = "INSERT INTO user (username, first_name, surname, age, email)
                VALUES (?, ?, ?, ?, ?)";

                $statement = $conn->prepare($query);

                $statement->bind_param(
                    'sssis',
                    $this->username,
                    $this->name,
                    $this->surname,
                    $this->age,
                    $this->email
                );

                $statement->execute();

                $statement->close();

                Connection::endConn();
                
                return 'User created with sucess!';
                
            } catch (Exception $error){
                Connection::endConn();
                
                throw new Error('not possible to create your profile, try again later!' . $error->getMessage());
            }

        }
    }

    // $user_info = [
    //     $username => 'gfloriano',
    //     $name => 'Gustavo',
    //     $surname => 'Floriano',
    //     $age => 18,
    //     $email => 'gflorianodev@gmail.com'
    // ];

    // $user = new User($user_info);