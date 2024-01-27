<?php
  
  class HomeController extends Controller 
  {
    public function index($a='', $b='', $c='')
    {

      echo 'This is a HomeController';
      show('from the index function');

      $this->view('home');
      
    }

    public function edit($a='', $b='', $c='')
    {
      show('from the edit function');

      $this->view('home');
    }
  }



?>