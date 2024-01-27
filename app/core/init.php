<?php

spl_autoload_register(function($className){
   $filename= '../app/models/'.ucfirst($className).'.php';

   require $filename;
});


  require 'config.php';
  require 'functions.php';
  require 'Database.php';
  require 'Model.php';
  require 'Controller.php';
  require 'App.php';


?>