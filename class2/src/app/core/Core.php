<?php

    // class Core to use in the index.php

    class Core{
        public function start_application($urlGet){ // function pulls the user's url

            if(isset($urlGet['page'])){ // verify if have the awnser for the param 'page'.

                $controller = ucfirst($urlGet['page'].'Controller');

            } else{ // soon, create a if to verify if its 'page = x' or diferrent. 'xahsihsa = y'.

                $controller = 'HomeController';
            }

            // var_dump($urlGet); // function writes the url in a array.

            $page = ucfirst($urlGet['page']);


            // $method = 'index';

            if(class_exists($controller)){
                
                if($page === 'Home'){

                    $method = 'home';
                    
                } else{
                    
                    $method = 'about';

                }
                
            } else{
                
                $controller = 'ErrorController';

                $method = 'error';

            }
            
            call_user_func_array(array(new $controller, $method), array());

        }
    }