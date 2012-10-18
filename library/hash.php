<?php

   class Hash{

      public static function create($pword, $algo = HASH_ALGORITHM, $salt = HASH_PASSWORD_KEY){

         $context = hash_init($algo, HASH_HMAC, $salt);

         hash_update($context, $pword);

         return hash_final($context);
      }
   }
?>
