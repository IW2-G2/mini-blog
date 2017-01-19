<?php
	session_start();
    require "core/constants.php";
	require dirname(__FILE__) . '/manager/manager.php';
	$manager = new \Manager\Manager();

    require "vendor/autoload.php";

    include "core/Routing.php";
    $route = new \Core\Routing();



