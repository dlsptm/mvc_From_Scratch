<?php
  
  /**
   * 
   */
  class Vehicule
  {
    use Model;

    protected $table = 'vehicule';
    protected $allowedColumns=[
      'marque',
      'modele',
      'couleur',
      "immatriculation"
    ];

  }
?>