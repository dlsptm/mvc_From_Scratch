<?php
  
  class Controller {

    public function view ($name)
    {
      $filename = "../app/views/". $name .'.view.php';
  
      if (!file_exists($filename)){
        $name = "notFound";
      }

      require $filename;
    }
  }

?>