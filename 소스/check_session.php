<?php

  session_start();
  
  if(!isset($_SESSION['user_id']) || !isset($_SESSION['user_name'])) {
  
    echo("<script>location.replace('main.php');</script>"); 
  
  }
  
?>