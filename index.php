<?php
	session_start();
	require "config/constants.php";
	require "vendor/autoload.php";

  $route = new core\Routing();
	$route->runRoute();
