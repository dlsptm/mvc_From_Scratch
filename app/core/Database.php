<?php
Trait Database {
  private function connect ()
  {
    $string = 'mysql:hostname='.DBHOST.';dbname='.DBNAME;
    $con = new PDO($string, DBUSER, DBPWD);
    return $con;
  }

  public function query($query, $data = [])
  {
    $con = $this->connect();
    $stmt= $con->prepare($query);
    $check= $stmt->execute($data);

    if ($check)
    {
      $result = $stmt->fetchAll(PDO::FETCH_OBJ);

      if (is_array($result) && count($result))
      {
        return $result;
      }
    }

    return false; 
  }
}