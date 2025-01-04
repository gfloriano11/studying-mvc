<?php

    // class Core to use in the index.php

    class Core{
        public function start_application($urlGet){ // function pulls the user's url

            // var_dump($urlGet); // function writes the url in a array.

            $pagina = ucfirst($urlGet['pagina']);

            $controller = ucfirst($urlGet['pagina'].'Controller');

            if(class_exists($controller)){
                
                echo 'bem vindo a ' . $pagina . '!' . '<br>' ;
                
            } else {

                echo 'erro: página não encontrada';
                
            }
            
        }
    }