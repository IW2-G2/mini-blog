<?php

namespace App\Controller;

class Index
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