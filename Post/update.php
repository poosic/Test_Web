<!--- 게시글 수정 -->
<style>
	.box{
		border: 0px;
		width: 800px;
		margin-left:20%;
    margin-right: 20%;
	}
  .postbox{
    border: 3px solid black;
    padding: 5px;
    margin: 10px;
    width: 800px;
  }
	#board_name{
		text-align:center;
		text-decoration: none;
	}
	.button{
		text-align: left;
	}
</style>
<?php
include "../include/dbConnect.php";

$bno = $_GET['post_id'];
$sql = "select * from post where post_id='$bno';";
$result = mysqli_fetch_array(mysqli_query($dbConnect,$sql));
?>
<!doctype html>
<head>
  <meta charset="UTF-8">
  <title>게시글 수정</title>
</head>
<body>
	<div class="box">
  	<div id="board_name"><h1><a href="/Post/main.php">자유게시판</a></h1></div>
		<div class="postbox">
			<h4>글을 수정합니다.</h4>
  		<form action="process_update.php?post_id=<?= $bno; ?>" method="post">
    		<p><textarea name="title" rows="1" cols="100" placeholder="제목" maxlength="100" required><?= $result['title']; ?></textarea></p>
    		<p><textarea name="description" row="10" cols="100" placeholder="내용" required><?= $result['description']; ?></textarea></p>
    		<input type="hidden" name="p_id" value="<?= $bno; ?>" />
    		<div class="button"><button type="submit">글 작성</button></div>
  		</form>
		</div>
	</div>
</body>
</html>
