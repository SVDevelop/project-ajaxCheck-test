<?php 

// ВD SETTINGS
define('DB_HOST', 'localhost');
define('DB_NAME', 'project-test');
define('DB_USER', 'root');
define('DB_PASS', '');

define('SITE_NAME', 'тест');

// Хост сайта
define('HOST', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/');

// Физический путь к корневой директории скрипта
define('ROOT', dirname(__FILE__).'/');

?>