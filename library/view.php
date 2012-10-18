<?php

   class View{

      function __construct(){
      }

      public function render($name){
         require('views/templates/header.php');
         require 'views/' . $name . '.php';
         require('views/templates/footer.php');
      }
   }
