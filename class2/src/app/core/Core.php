<?php
    // class Core to use in the index.php

    class Core{

        public function start_application($urlGet){

            $keys = array_keys($urlGet);

            $values = array_values($urlGet);

            
            
            if(isset($urlGet['page']) && $keys[0] === 'page'){ // verify if ['page'] has a value and if the param is page
                
                $controller = ucfirst($urlGet['page'].'Controller');
                
                $page = $urlGet['page'];

                
                // echo ($page);
                // echo ($controller);
                // echo $teste;
                
                if(key_exists('method', $urlGet)){

                    $teste = $urlGet['method'];

                } else {
                    $teste = 'none';
                }
                
                
            } else{
                
                $controller = 'ErrorController';

                $page = 'error';

                if(count($keys) === 0){ // if the arrat is null.

                    $controller = 'HomeController';

                    $page = 'home';

                }

            }

            if(class_exists($controller)){

                
                if(count($keys) === 0){
                    $method = $page;
                    
                } else {
                    
                    $page = $urlGet['page'];
                    $method = $page;

                }
                
                
            } else{
                
                $controller = 'ErrorController';

                $method = 'error';

            }
            
            call_user_func_array(array(new $controller, $method), array());

        }
    }