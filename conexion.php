<?php
   $link= mysqli_connect_db("localhost", "evaryss","123456", "regisformulario");
   If ($link) {
      mysqli_select_db("registro", $link);   

   }


?>