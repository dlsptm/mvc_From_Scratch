<?php
  if ($_SERVER['SERVER_NAME'] === 'localhost') {
  define('DBNAME', 'my_db');
  define('DBHOST', 'localhost');
  define('DBUSER', 'root');
  define('DBPWD', 'root');

  define('ROOT', 'http://localhost:8888/MVC_COURSE/public');
  } else {
    define('ROOT', 'http://www.yourwebsite.com');

  }

?>