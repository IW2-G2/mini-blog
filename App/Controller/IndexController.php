<?php

namespace App\Controller;

class IndexController
{
    public function __construct()
    {

            $this->generate();
    }

    public function generate()
    {
        include VIEW_FOLDER_PATH."index.php";
    }
}