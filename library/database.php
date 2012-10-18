<?php

   class Database extends PDO{

      public function __construct($db){
         parent::__construct($db['type'] . ':host=' . $db['host'] . ';dbname='. $db['name'], $db['user'], $db['pass']);
      }


      /**
       *select
       *@param $sql String An SQL query string
       *@param $array Array parameters to bind default is empty array.
       *@param constant $fetchMode Should be a PDO fetch mode. FETCH_ASSOC by default.
       *
       *@return 
       */

       public function select($sql, $array = array(), $fetchMode = PDO::FETCH_ASSOC){

          $statement = $this->prepare($sql);

          foreach($array as $key => $value){
             $statement->bindValue($key, $value);
          }

          $statement->execute();

          return $statement->fetchAll($fetchMode);
       }

       //TODO This function needs cleaning up a hell of a lot but it works for the time being

       public function join($tableName, $values, $table2, $on, $type="left", $args=array()){
          /*sql = 'SELECT [array of values to select] FROM [tablename] [typeOfJoin] JOIN ON [table2]' WHERE [if
          required]
          */
          $fields = '';

          foreach($values as $value){

             $fields .= $value . ', ';
          } 
          $fields = rtrim($fields, ', ');

          $sql = "SELECT $fields FROM $tableName $type JOIN $table2 ON $on WHERE $args";


          $statement = $this->prepare($sql);
          $statement->execute();

          return $statement->fetchAll();
         }

         

      /**
       *insert
       *@param $table Name of the database table
       *@param $data Associative array
       *
       */

      public function insert($table, $data){

         ksort($data); //not neccessary but alphabetises

         $fieldNames = implode('`, `', array_keys($data));
         $fieldValues = ':' . implode(', :', array_keys($data));

         $statement = $this->prepare("INSERT INTO $table(`$fieldNames`) VALUES ($fieldValues)");

         foreach($data as $key => $value){
            $statement->bindValue(":$key", $value);
         }

         $statement->execute();
      }


      /**
       *update
       *@param $table Name of the database table
       *@param $data Associative array
       *@param $where String the WHERE part of sql query
       */

      public function update($table, $data, $where){

         ksort($data); //not neccessary but alphabetises

         //update table set login = blah, password = mwah, role = no WHERE id = 1
         $fieldDetails = null;

         foreach($data as $key => $value){
            $fieldDetails .=  "`$key` = :$key,";
         }
         $fieldDetails =rtrim($fieldDetails, ',');

         $statement = $this->prepare("UPDATE $table SET $fieldDetails WHERE $where");

         foreach($data as $key => $value){
            $statement->bindValue(":$key", $value);
         }

         $statement->execute();

      }

      /**
       *
       *@param string $table
       *@param string $where
       *@param int limit
       *
       *@return int
       */

      public function delete($table, $where, $limit = 1){

         return $this->exec("DELETE FROM $table WHERE $where LIMIT $limit");
      }
   }
