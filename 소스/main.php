<!DOCTYPE>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="./styls.css" type="text/css" >
	<title>Main</title>
</head>
<body>
<?php

  session_start();
  
  if(!isset($_SESSION['user_id']) || !isset($_SESSION['user_name'])) {
  	echo "<meta http-equiv='refresh' content='0;url=login.php'>";
  	exit;
  }
  
  $user_id = $_SESSION['user_id'];
  $user_name = $_SESSION['user_name'];
  
  echo "<div>$user_name($user_id) 접속중</div>";
 
  echo "<div><a href='logout.php'>로그아웃</a></div>";
  
?>
</body>
</html>
