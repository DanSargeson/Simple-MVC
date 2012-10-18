<?php

   /*
   *    At the moment each function in this validation class needs to be called inidividaully on the
   *    form objet, however TODO: rewrite to allow multiple parameters with func_get_args()
   *    
   *    Also TODO: Need to add more validation checks into this class
   */

   class Validate{

      public function __construct(){

      }

      public function minLength($data, $arg){

         if(strlen($data) < $arg){
            return "Too short!";
         }
      }


      public function maxLength($data, $arg){

         if(strlen($data) > $arg){
            return "Too long!";
         }
      }


      public function isInteger($data){

         if(!ctype_digit($data)){
            return "Must be digit!";
         }
      }

      public function required($data){
         if(empty($data)){
            return "Missing information";
         }
      }

      public function xssClean($data){

         htmlspecialchars($data, ENT_QUOTES|'ENT_HTML5', 'UTF-8');
      }

      public function __call($name, $args){
         throw new Exception($name . " does not exist inside of: " . __CLASS__);
      }
   }
?>
