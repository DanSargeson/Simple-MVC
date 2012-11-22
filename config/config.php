<?php

   //sets the salt for hashing passwords, HASH_PASSWORD_KEY should be unique to each project
   define('HASH_PASSWORD_KEY', 'Just put whatever you want in here');

   //database config options, MySQL is the only supported DB type at this time
   define('DB_TYPE', 'mysql');
   define('DB_HOST', '');
   define('DB_NAME', '');
   define('DB_USER', '');
   define('DB_PASS', '');

   //Path options. URL should be set to the name of the app folder in root, in this case it is mvc
   //LIBS is whatever the library folder is called
   //ALL paths should have a trailing slash (/) character.
   define('URL', '/mvc/');
   define('LIBS', 'library/');
?>
