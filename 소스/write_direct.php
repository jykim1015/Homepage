<?php
  include 'db_conn.php';
  
  if(!(isset($_POST["title"]) && isset($_POST["name"]) && isset($_POST["pw"]) && isset($_POST["wdate"]) && isset($_POST["wtime"]))){
  	echo "Invalid value input";
  	exit();	
  }
  
  $title = $_POST["title"];
  $name = $_POST["name"];
  $pw = $_POST["pw"];
  $memo = $_POST["memo"];
  $date = $_POST["wdate"];
  $time = $_POST["wtime"];
  
  $sql = "INSERT INTO board (title,name,pw,memo,wdate,wtime) VALUES ('".mysqli_real_escape_string($link,$title)."','"
  															.mysqli_real_escape_string($link,$name)."','"
  															.mysqli_real_escape_string($link,$pw)."','"
  															.mysqli_real_escape_string($link,$memo)."','"
  															.mysqli_real_escape_string($link,$date)."','"
  															.mysqli_real_escape_string($link,$time)."')";

  $result = mysqli_query($link,$sql) or die("SQL 에러");
  
  if($result == true)
  	echo "Success";
  else
  	echo "Fail";
  	
?>
