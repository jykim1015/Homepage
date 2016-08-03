<?php
include 'db_conn.php';

if(!(isset($_POST["title"]) && isset($_POST["name"]) && isset($_POST["pw"]) && isset($_GET["num"]))){
	echo "Invalid value input";
	exit();	
}

if((empty($_POST["title"]) || empty($_POST["name"]) || empty($_POST["pw"]) || empty($_GET["num"]))){
	echo "Invalid value input";
	exit();	
}

$num = $_GET["num"];
$title = $_POST["title"];
$name = $_POST["name"];
$pw = $_POST["pw"];
$memo = $_POST["memo"];

$date = date("Ymd");
$time = date("His");

$sql = "UPDATE board SET title = '".mysqli_real_escape_string($link, $title).
						"',name = '".mysqli_real_escape_string($link, $name).
						"',pw = '".mysqli_real_escape_string($link, $pw).
						"',memo = '".mysqli_real_escape_string($link, $memo).
						"',date = '".mysqli_real_escape_string($link, $date).
						"',time = '".mysqli_real_escape_string($link, $time).
						"' WHERE num = ".$num;

$result = mysqli_query($link, $sql) or die("SQL 에러");

if($result == true) {
	header('Location: ./list.php');
}
else {
	echo "Invalid Query";
}
?>
