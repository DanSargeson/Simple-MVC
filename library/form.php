<?php
   require('form/validate.php');

   class Form{

      private $_currentItem = null;
      private $_postData = array();
      private $_fileData = array();
      private $_val = array();
      private $_error = array();


      public function __construct(){
         $this->_val = new Validate();
      }


      public function post($field){

         $this->_postData[$field] = $_POST[$field];
         $this->_currentItem = $field;

         return $this;
      }

      public function file($field){
         $this->_fileData[$field] = $_FILES[$field];
         $this->_currentItem = $field;

         return $this;
      }


      public function fetch($fieldName = false){

         if($fieldName){
            if(isset($this->_postData[$fieldName])){ 
               return $this->_postData[$fieldName];
            }
            else{
               return false;
            }
         }
         else{
            return $this->_postData;
         }
      }


      public function validate($typeOfValidator, $arg = null){

         if($arg == null){
            $error = $this->_val->{$typeOfValidator}($this->_postData[$this->_currentItem]);
         }
         else{
            $error = $this->_val->{$typeOfValidator}($this->_postData[$this->_currentItem], $arg);
         }

         
         if($error){
            $this->_error[$this->_currentItem] = $error;
         }

         return $this;
      }

      public function submit(){
         if(empty($this->_error)){
            return true;
         }
         else{
            $str = '';
            foreach($this->_error as $key => $value){
               $str .= $key . ' => ' . $value . "<br/>";

            }
            throw new Exception($str);
         }
      }
   }
