<?php

   class Error extends Controller{

      function __construct(){
         parent::__construct();

      }

      public function index(){
         $this->view->msg = '404 Page Not Found';
         $this->view->render('error/index');
      }
   }
