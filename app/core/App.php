<?php

  class App
  {
    private $controller = 'HomeController';
    private $method = 'index';
    private function splitUrl()
    {
      $url = $_GET['url'] ?? 'home';
      $url = explode('/', $url);
  
      return $url;
    }
  
    public function loadController()
    {
      $url = $this->splitUrl();
  
      $filename = "../app/controllers/". ucfirst($url[0]).'Controller.php';
  
      if (file_exists($filename)){
        require $filename;
        $this->controller = ucfirst($url[0])."Controller";
      } else {
        $filename = "../app/controllers/_404NotFound.php";
        require $filename;
        $this->controller = "_404NotFound";
      }


      $controller = new $this->controller;
      call_user_func_array([$controller, $this->method], ['a' => "something", 'b' => "something", 'c' => "something"]);

    }
  }

  


?>