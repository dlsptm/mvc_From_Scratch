<?php
  
  class ProductsController extends Controller 
  {
    public function index($a='', $b='', $c='')
    {
      echo 'This is a ProductsController';
      $this->view('products/product');
    }
  }

?>