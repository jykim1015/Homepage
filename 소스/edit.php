<!DOCTYPE>
<?php
  include 'db_conn.php';
  
  if(!(isset($_POST["pw"]) && isset($_POST["num"]))){
  	echo "Invalid password";
  	exit();
  }
  
  $pw = $_POST["pw"];
  $num = $_POST["num"];
  
  $sql = "SELECT title, name, pw, memo FROM board WHERE num = " . $num;
  
  
  $result = mysqli_query($link, $sql) or die("SQL 에러");
  $row = mysqli_fetch_array($result);   
  
  // 입력한 비밀번호와 데이터베이스에 있는 비밀번호 확인
  if(!($pw === $row["pw"])){
  	echo "Incorrect password";
  	exit();
  }

?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="./styls.css" type="text/css" >
	<title>글 수정</title>
</head>
<body>
<table>
<form action="update.php?num=<?= $num ?>" method="post">
  <tr>
    <td width=40>제목</td>
    <td ><input type="text" name="title" size="30" maxlength="80" value="<?= $row["title"] ?>"></td>
  </tr>
  <tr>
    <td>이름</td>
    <td><input type="text" name="name"  size="10" maxlength="20" value="<?= $row["name"] ?>"></td>
  </tr>    
  <tr>
    <td>비밀번호</td>
    <td><input type="password" name="pw" size="4" maxlength="4"></td>
  </tr>
    <tr>
    <td colspan=2>내용</td>
  </tr>
  <tr>
    <td colspan=2><textarea name="memo" cols="40" rows="10" placeholder="내용을 입력하세요."><?= $row["memo"] ?></textarea></td>
  </tr>
  <tr>
    <td colspan=2><input type="submit" value="수정하기"></td>
  </tr>
</form>	
</table>
<br>
<form action="list.php">
	<input type="submit" value="취소">
</form>
</body>
</html>
