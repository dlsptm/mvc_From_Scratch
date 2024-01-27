<?php
  
  /**
   * 
   */
  class Conducteur
  {
    use Model;

    protected $table = 'conducteur';
    protected $allowedColumns=[
      'prenom',
      'nom',
      'pass',
      "e_mail"
    ];

  }
?>