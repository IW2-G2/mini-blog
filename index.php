<?php
	session_start();
    require "config/constants.php";
	require dirname(__FILE__) . '/manager/manager.class.php';
	$manager = new Manager();

    require "vendor/autoload.php";

    include "config/Routing.php";
    $route = new Routing();



