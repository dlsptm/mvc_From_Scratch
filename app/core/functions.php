<?php
    function show($object)
    {
      echo '<pre>';
      var_dump($object);
      echo '</pre>';  
    }


    /**
     * sert à protégé les valeurs sql
     *
     * @param [type] $str
     * @return void
     */
    function esc($str)
    {
      return htmlspecialchars($str);
    }
?>