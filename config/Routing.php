<?php


class Routing
{
    private  $acceptedRoute;
    private $route;
    private $classname;

    public function __construct()
    {
        $this->initRouting();
        $this->route = $this->getRoute();
        $this->checkRouting();

    }

    private  function initRouting(){
        $this->acceptedRoute = array(
            "index" => "Index",
            "inscription" => "Inscription",
            "connexion" => "Login",
            "article" => "Article"
        );
    }
    private  function getRoute( ){

        $route = $_SERVER["REQUEST_URI"];
        $route = preg_replace("#".APP_BASE_PATH_PATTERN."#i","", $route);

        $route = explode("/", $route);

        if(!empty($route[0]) && isset($this->acceptedRoute[$route[0]])){
            return $route;
        }else{
            if(!empty($route[0])){
                return array("404");
            }else{
                return array("index");
            }
        }
    }

    private function checkRouting(){
        $this->classname = ucfirst($this->route[0])."Controller";
        $class = "App\\Controller\\".$this->classname;
        new $class(array_shift($this->route));


    }
}