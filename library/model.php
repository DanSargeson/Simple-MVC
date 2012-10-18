<?php

   class Model{

      function __construct(){
         $data = array();
         $data['type'] = DB_TYPE;
         $data['host'] = DB_HOST;
         $data['name'] = DB_NAME;
         $data['user'] = DB_USER;
         $data['pass'] = DB_PASS;

         $this->db = new Database($data);
      }
   }
