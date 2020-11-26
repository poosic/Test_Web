<?php
	include "../include/dbConnect.php";
	include "../include/session.php";
	$uid = $_SESSION['ses_userid'];
	$sql = "select * from account_info where id='$uid'";
	$level = mysqli_query($dbConnect,$sql);
	$level = mysqli_fetch_array($level);
	$level = $level['level'];
?>
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
  td, th{
    border-bottom: 2px solid silver;
    text-align: center;
  }
	.replybox{
		border-bottom: 2px solid silver;
		width:800px
	}
	.button{
		text-align: right;
	}
	.about{
		text-align: right;
	}
</style>
<!doctype html>
<head>
  <meta charset="UTF-8">
  <title>게시판</title>
</head>
<body>
	<?php
	$bno = $_GET['post_id'];
  $sql = "select * from post where post_id ='$bno'";
	$result = mysqli_fetch_array(mysqli_query($dbConnect,$sql));
	$hit = $result['hit'] + 1;
  $sql = "update post set hit = '$hit' where post_id = '".$bno."'";
	$fet = mysqli_query($dbConnect,$sql);
	$sql = "select * from post where post_id ='$bno'";
	$result = mysqli_fetch_array(mysqli_query($dbConnect,$sql));
	?>
	<div class="box">
		<div class="postbox">
  	<h2><?php echo $result['title']; ?></h2>
		<div class="about"><b>작성일: <?= $result['created']; ?> 조회:<?= $result['hit']; ?> 작성자:<?=$result['author_id']?></b></div>
  	<p><?php echo nl2br("$result[description]"); ?></p>
  	<p>파일 : <a href="./upload/<?= $result['file'];?>" download><?=$result['file']; ?></a></p>

			<div class="button"><a href="/Post/main.php"><button>목록으로</button></a>
				<?php
				if($level >= 1 or $_SESSION['ses_userid'] == $result['author_id']){//process 파일에도 막아놓을까...
					echo "<a href='update.php?post_id=$result[post_id]'><button>수정</button></a>
								<a href='delete.php?post_id=$result[post_id]'><button>삭제</button></a>";
						}
				?>
			</div>
		</div>
		<h3>댓글목록</h3>
		<?php
		$sql2 = "select * from reply where post_id='$bno' order by post_id desc";
    $sql2 = mysqli_query($dbConnect,$sql2);
		while($reply = mysqli_fetch_array($sql2)){
		?>
		<div class="replybox">
			<p><b>ㄴ작성자:<?= $reply['author_id'];?>  작성일:<?= $reply['created']; ?></b></p>
			<p><?php echo nl2br("$reply[content]"); ?></p>
			<!--<a href="">수정</a>-->
      <form action="reply_delete.php" method="post">
        <input type="hidden" name="reply_id" value="<?=$reply['reply_id']?>" />
        <input type="hidden" name="author_id" value="<?=$reply['author_id']?>" />
        <input type="hidden" name="post_id" value="<?=$reply['post_id']?>" />
        <button>삭제</button>
      </form>
		</div>
	<?php } ?>
		<form action="reply_create.php?post_id=<?= $bno; ?>" method="post">
				<textarea name="content" rows="3" cols="110"></textarea>
				<button>댓글</button>
		</form>
	</div>
</body>
</html>
