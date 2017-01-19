<?php
	session_start();
  require "config/constants.php";
  require "vendor/autoload.php";
	require "core/Routing.php";

  $route = new core\Routing();
