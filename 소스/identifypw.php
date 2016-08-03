<?php
  if(!(isset($_GET["num"]) && isset($_GET["type"]))){
  	echo "Invalid value input";
  	exit();
  }
  
  $num = $_GET["num"];
  $type = $_GET["type"];
?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="./styls.css" type="text/css" >
	<title>삭제</title>
</head>
<body>
<table>
	<?php
	if($type === "remove"){
	?>
<tr> 
	<form action="remove.php" method="POST">
  <td>비밀번호 입력</td>
	<td>
		<input type="password" name="pw">
	</td>
	<td>
  	<input type="hidden" name="num" value="<?= $num ?>">
  	<input type="submit" value="입력">
	</td>
	</form>
</tr>
	<?php
	} else if($type === "edit"){
	?>
<tr>  
  <form action="edit.php" method="POST">
  <td>비밀번호 입력</td>
	<td>
		<input type="password" name="pw">
	</td>
	<td>
		<input type="hidden" name="num" value="<?= $num ?>">
		<input type="submit" value="입력">
	</td>
	</form>
</tr>
	<?php }?>
</table>	
</body>
</html>
