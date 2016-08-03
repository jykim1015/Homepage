<!DOCTYPE>
<?php
  include 'db_conn.php';
  
  if(!isset($_GET["num"])){
  	echo "Invalid value input";
  	exit();
  }
  
  $num = $_GET["num"];
  
  $sql = "SELECT title, name, memo, wdate FROM board WHERE num = " . $num;
  
  // 데이터 가져오기
  $result = mysqli_query($link, $sql) or die("SQL 에러");
  $row = mysqli_fetch_array($result);   

?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link rel="stylesheet" href="./styls.css" type="text/css" >
	<title><?= $row["title"] ?></title>
</head>
<body>
<table>
  <tr>
    <td width=40>제목</td>
    <td ><?= $row["title"] ?></td>
  </tr>
  <tr>
    <td>이름</td>
    <td><?= $row["name"] ?></td>
  </tr>    
  <tr>
    <td>작성일</td>
    <td><?= $row["wdate"] ?></td>
  </tr> 
  <tr>
    <td colspan=2>내용</td>
  </tr>
  <tr>
    <td colspan=2><?= $row["memo"] ?></td>
  </tr>
</table>
<br>
<form action="identifypw.php" methoid="GET">
	<input type="hidden" name="num" value="<?= $num ?>">
	<input type="hidden" name="type" value="edit">
	<input type="submit" value="수정">
</form>
<form action="identifypw.php" methoid="GET">
	<input type="hidden" name="num" value="<?= $num ?>">
	<input type="hidden" name="type" value="remove">
	<input type="submit" value="삭제">
</form>
<form action="list.php">
	<input type="submit" value="목록가기">
</form>
</body>
</html>