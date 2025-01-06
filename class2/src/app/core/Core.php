<?php

    // class Core to use in the index.php

    class Core{
        public function start_application($urlGet){

            if(array_key_exists('page' , $urlGet)){
                $keys = array_keys($urlGet);
                
            } else{
                
                $method = 'error';
                $controller = 'ErrorController';
            }

            if(isset($urlGet['page']) && $keys[0] === 'page'){ // verify if ['page'] has a value and if the param is page

                $controller = ucfirst($urlGet['page'].'Controller');

                $page = $urlGet['page'];
                
            } else{ // make if to know if exists param or not.

                $controller = 'ErrorController';

                $page = 'error';
            }

            if(class_exists($controller)){
                
                if($page === 'home'){

                    $method = 'home';
                    
                } else if($page === 'about'){
                    
                    $method = 'about';

                } else {

                    $method = 'error';
                }
                
            } else{
                
                $controller = 'ErrorController';

                $method = 'error';

            }
            
            call_user_func_array(array(new $controller, $method), array());

        }
    }