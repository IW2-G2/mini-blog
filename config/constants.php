<?php
define("DS", DIRECTORY_SEPARATOR);
define("NSS", "\\");
define("SRC", dirname(__FILE__).DS);
define("APP_BASE_PATH", "/mini-blog/");
define("APP_BASE_PATH_PATTERN", "\/mini-blog\/");
define("CORE_FOLDER_PATH", "core".DS);
define("CONTROLLERS_FOLDER_PATH", "App".DS."Controllers".DS);
define("CONTROLLERS_NAMESPACE_PATH", "App".NSS."Controllers".NSS);
define("MODELS_FOLDER_PATH", "App".DS."Models".DS);
define("SERVER_URL", "http://".$_SERVER['SERVER_NAME'].APP_BASE_PATH);
define("VIEWS_FOLDER_PATH", "App".DS."Views".DS);
define("VIEWS_LAYOUT_FOLDER_PATH", "App".DS."Views".DS."layout".DS);
