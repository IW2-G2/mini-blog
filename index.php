<?php
	session_start();
  require "config/constants.php";
  require "vendor/autoload.php";
	require "core/Routing.class.php";

  $route = new core\Routing();
