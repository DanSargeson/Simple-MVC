<?php

   require ('../library/form.php');

   try{
      if(isset($_REQUEST['run'])){
         
         $form = new Form();
         
         $form->post('name')
         ->validate('minLength', 1)
         ->post('age')
         ->validate('isInteger')
         ->post('gender');
      }

      $form->submit();

      echo "Success!";
      $data = $form->fetch();
      echo '<pre>';
      print_r($data);
      echo '</pre>';
   }
   catch(Exception $e){
      echo $e->getMessage();
   }
?>

<form method="post" action="?run">
   <input type="text" name="name"/>
   <input type="text" name="age"/>
   <select name="gender">
      <option value="m">Male</option>
      <option value="f">Female</option>
   </select>
   
   <input type="submit"/>
</form>
