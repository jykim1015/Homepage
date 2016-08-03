<?php

  if(!isset($_POST['user_id']) || !isset($_POST['user_pw'])) echo("아이디 또는 비밀번호를 입력하십시오.");
  
  $user_id = $_POST['user_id'];
  $user_pw = $_POST['user_pw'];

  include 'db_conn.php';
    
  $sql = "SELECT user_nm, user_pwd FROM user WHERE user_id = '" . $user_id . "' and use_yn = 'Y'";
  
  $result = mysqli_query($link, $sql) or die("SQL 에러"); 
  $total_record = mysqli_num_rows($result);
  
  // 사용자아이디 존재여부 확인.
  if($total_record == 0){
  	echo "Not exists User";
  	echo("<script>location.replace('main.php');</script>"); 
  	exit();
  }
  
  $row = mysqli_fetch_array($result); 
  
  //입력한 비밀번호와 데이터베이스에 있는 비밀번호 확인
  if($user_pw != $row["user_pwd"]){
  	echo "Incorrect password";
  	echo("<script>location.replace('main.php');</script>"); 
  	exit();
  }
  
  $user_nm = $row['user_nm']; // 로그인사용자명 세션등록.

  session_start();
  
  $_SESSION['user_id'] = $user_id;
  $_SESSION['user_name'] = $user_nm;

  echo("<script>location.replace('list.php');</script>"); 
  
?>