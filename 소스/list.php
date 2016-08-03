<!DOCTYPE>
<?php

  require 'check_session.php';

  include 'db_conn.php';
  
  // 한 페이지에 보여줄 리스트 수
  $record_per_page = 10;
  // 한 블럭에 보여줄 페이지 수
  $page_per_block = 10;
  // 현재 페이지
  $now_page = ($_GET['page']) ? $_GET['page'] : 1; 
  // 현재 블럭
  $now_block = ceil($now_page / $page_per_block);
  
  $sql = "SELECT num, title, name, wdate, wtime FROM board ORDER BY num desc LIMIT ". $record_per_page * ($now_page - 1) .",". $record_per_page * $now_page;
  
  $result = mysqli_query($link,$sql) or die("SQL 에러");
  
  $total_record = mysqli_num_rows($result);

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="./styls.css" type="text/css" >
<title>게시판 리스트</title>
</head>
<body>
	<div>
		<table width="100%">
			<tr>
				<td align=center width=30>번호</td>
				<td align=center >메시지</td>
				<!--td align=center width=50>발신</td-->
				<td align=center width=90>수신일시</td>
			</tr>
			<?php
			for ($i = 0; $i < $total_record; $i++) {
			  // 데이터 가져오기
			  mysqli_data_seek($result, $i);       
			  $row = mysqli_fetch_array($result);   
			?>
			<tr>
				<td align=center><?= $row["num"] ?></td>
				<td> <?= $row["title"] ?></td>
				<!--td><a href="read.php?num=<?=$row["num"]?>"> <?= $row["title"] ?></a></td-->
				<!--td align=center><?= $row["name"] ?></td-->
				<td align=center><?= $row["wdate"] ?> <?= $row["wtime"] ?></td>
			</tr>
			<?php }?>
		</table>
		<br>
		<!--form action="write.html">
			<input type="submit" value="글쓰기">
		</form-->
	</div>
	<div></div>
	  <!--div>
<?php

  // 전체 페이지 수
  $total_page = ceil($total_record / $record_per_page);
  // 전체 블럭 수
  $total_block = ceil($total_page / $page_per_block);
  
  // 현재 블럭이 1보다 클 경우
  if(1 < $now_block ) {
    $pre_page = ($now_block - 1) * $page_per_block;
    echo '<a href="list.php?page='.$pre_page.'">이전</a>';
  
  }
  
  $start_page = ($now_block - 1) * $page_per_block + 1;
  $end_page = $now_block * $page_per_block;
  
  // 총 페이지와 마지막 페이지를 같게 하기, 즉 글이 있는 페이지까지만 설정
  if($end_page > $total_page) {
    $end_page = $total_page;
  }

?>
<?php for($i = $start_page; $i <= $end_page; $i++) {?>
			    <a href="list.php?page=<?= $i ?>"><?= $i ?></a>
<?php }?>
			
<?php
      // 현재 블럭이 총 블럭 수 보다 작을 경우
			if($now_block < $total_block) {
			  $post_page = $now_block * $page_per_block + 1;
			  echo '<a href="list.php?page='.$post_page.'">다음</a>';
			}
?>
	</div-->
	<div><a href='javascript:location.reload(); '>[새로고침]</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href='logout.php'>[로그아웃]</a></div>
</body>
</html>
<?php
    /* free result set */
    mysqli_free_result($result);
    mysqli_close($link);
?>