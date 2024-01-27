<?php
  
  Trait Model 
  {
    use Database;
    protected $limit = 10;
    protected $offset = 0;
    protected $order_type = 'DESC';
    protected $order_column = 'id';


    /**
     * Undocumented function
     *
     * @return void
     */
    public function findAll()
    {
      $query = "SELECT * FROM $this->table ORDER BY $this->order_column $this->order_type LIMIT $this->limit offset $this->offset"; 


      return $this->query($query);
    }


    public function where ($data, $data_not=[])
    {
      // tableau avec notre data
      $keys= array_keys($data);
      // tableau avec ce qu'on ne veut pas dans notre query
      $keys_not= array_keys($data_not);

      // query principale
      $query = "SELECT * FROM $this->table WHERE ";
      
      //boucle du tableau 
      foreach ($keys as $key) {
        $query .= $key . '= :'. $key . "&&"; 
      }
      //boucle du tableau 
      foreach ($keys_not as $key) {
        $query .= $key . '!=:' . $key . "&&"; 
      }

      // une fois la boucle finit on enlève le dernier &&
      $query = trim($query, " && ");

      // on ajoute ici le reste de la query
      $query .= "ORDER BY $this->order_column $this->order_type limit $this->limit offset $this->offset";

      $data = array_merge($data, $data_not);

      return $this->query($query, $data);
    }

    public function first ($data, $data_not=[])
    {
            // tableau avec notre data
            $keys= array_keys($data);
            // tableau avec ce qu'on ne veut pas dans notre query
            $keys_not= array_keys($data_not);
      
            // query principale
            $query = "SELECT * FROM $this->table WHERE ";
            
            //boucle du tableau 
            foreach ($keys as $key) {
              $query .= $key . '= :'. $key . "&&"; 
            }
            //boucle du tableau 
            foreach ($keys_not as $key) {
              $query .= $key . '!=:' . $key . "&&"; 
            }
      
            // une fois la boucle finit on enlève le dernier &&
            $query = trim($query, " && ");
      
            // on ajoute ici le reste de la query
            $query .= " limit $this->limit offset $this->offset";
      
            $data = array_merge($data, $data_not);

            $result= $this->query($query, $data);
      
            if ($result)
            {
              return $result[0];
            }

            return false;
    }

    public function insert ($data)
    {

            // remove unwanted data
            if (!empty($this->allowedColumns))
            {
              foreach($data as $key=>$value) {
                if (!in_array($key, $this->allowedColumns)) {
                  unset($data[$key]);
                }
              }
            }
            
      $keys= array_keys($data);

      $query = "INSERT INTO $this->table (".implode(", ", $keys).") VALUES (:".implode(", :", $keys).")";
     
      $this->query($query,$data);
      return false;
    }


    public function update ($id, $data,  $column)
    {

      // remove unwanted data
      if (!empty($this->allowedColumns))
      {
        foreach($data as $key=>$value) {
          if (!in_array($key, $this->allowedColumns)) {
            unset($data[$key]);
          }
        }
      }

    
     // tableau avec notre data
     $keys= array_keys($data);
     // tableau avec ce qu'on ne veut pas dans notre query

     // query principale
     $query = "UPDATE $this->table set ";
     
     //boucle du tableau 
     foreach ($keys as $key) {
       $query .= $key . '= :'. $key . ", "; 
     }

     // une fois la boucle finit on enlève le dernie ,
     $query = trim($query, " , ");

     // on ajoute ici le reste de la query
     $query .= " WHERE $column = :$column";

     $data[$column]=$id;

     $this->query($query, $data);

     return false;
    }

    public function delete ($id, $column)
    {

      $data[$column]=$id;
      $query = "DELETE FROM $this->table WHERE $column = :$column";
     
      $this->query($query,$data);

      return false;
    }
  }

?>