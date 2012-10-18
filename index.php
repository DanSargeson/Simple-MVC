<?php

   require('config/config.php');

   function __autoload($class){
      $class = strToLower($class);
      require(LIBS . $class.".php");
   }

   $app = new Bootstrap();

?>
