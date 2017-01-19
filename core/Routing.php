<?php
namespace Core;

class Routing
{
    private $acceptedRoute;
    private $route;
    private $classname;
    private $errorTrigger;

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
                new \App\Controller\Error();
                $this->errorTrigger = true;

            }else{
                return array("index");
            }
        }
    }

    private function checkRouting(){

        if(!$this->errorTrigger){
            $this->classname = ucfirst($this->acceptedRoute[strtolower($this->route[0])]);
            $class = APP_NAMESPACE."\\Controller\\".$this->classname;
            new $class(array_shift($this->route));
        }


    }
}