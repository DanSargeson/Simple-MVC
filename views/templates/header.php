<!DOCTYPE HTML>
<html>
   <head>
      <title>Simple MVC Framework</title>
      <link rel="stylesheet" href="<?php echo URL;?>public/css/default.css"/>

      <?php
         if(isset($this->js)){
            foreach($this->js as $js){
               echo '<script type="text/javascript" src="'.URL.'views/'.$js.'"></script>';
            }
         }
      ?>
      </head>
      <body>
         <?php Session::init(); ?>
         <div id="header">
            <h2>Simple MVC Framework</h2>
         </div>

         <div id="content">
