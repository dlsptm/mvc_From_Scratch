<?php

  class App
  {
    private $controller = 'HomeController';
    private $method = 'index';
    private function splitUrl()
    {
      $url = $_GET['url'] ?? 'home';
      $url = explode('/', trim($url, '/'));
  
      return $url;
    }
  
    public function loadController()
    {
      $url = $this->splitUrl();
  
      $filename = "../app/controllers/". ucfirst($url[0]).'Controller.php';
  
      if (file_exists($filename)){
        require $filename;
        $this->controller = ucfirst($url[0])."Controller";
        unset($url[0]);
      } else {
        $filename = "../app/controllers/_404NotFound.php";
        require $filename;
        $this->controller = "_404NotFound";
      }


      $controller = new $this->controller;

      // select method
      if(!empty($url[1]))
      {
        if(method_exists($controller, $url[1]))
        {
          $this->method = $url[1];
          unset($url[1]);
        }
      }
        show($url);

      call_user_func_array([$controller, $this->method], $url);

    }
  }
?>