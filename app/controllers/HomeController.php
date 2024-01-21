<?php
  
  class HomeController extends Controller 
  {
    public function index($a='', $b='', $c='')
    {
      $model = new Model;
      $model->test();
      echo 'This is a HomeController';

      $this->view('home');
      
    }
  }

?>