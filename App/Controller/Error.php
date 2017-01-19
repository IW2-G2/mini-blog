<?php

namespace App\Controller;

class Error {

        public function __construct($error = "404"){

            if ($error == "404"){
                $this->go404();
            }
        }

        private function go404(){
            include VIEW_FOLDER_PATH."404.php";
            die();
        }

}