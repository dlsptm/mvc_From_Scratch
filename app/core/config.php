<?php
  define('DBNAME', 'taxis');
  define('DBHOST', 'localhost');
  define('DBUSER', 'root');
  define('DBPWD', 'root');
  
  if ($_SERVER['SERVER_NAME'] === 'localhost') {
  define('ROOT', 'http://localhost:8888/PHP_MVC_Course/public');
  } else {
    define('ROOT', 'http://www.yourwebsite.com');
  }


  define('APP_NAME', 'My Website');
  define('APP_DESC', 'best website ever');

  /**
   * PROD MODE
   * true means show errors
   */
  define('DEBUG', true);
?>

