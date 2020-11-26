<?php
include "../include/dbConnect.php";
include "../include/session.php";
?>
<style>
  .board{
    border: 0px;
    width: 800px;
    margin-left:20%;
    margin-right: 20%;
  }
  .postbox{
    border: 3px solid black;
    padding: 10px;
    margin: 10px;
    width: 800px;
  }
  td, th{
    border-bottom: 2px solid silver;
    text-align: center;
  }
  #write_button{
    text-align: right;
  }
  .about{
    text-align: right;
    border: 0px;
    width: 800px;
  }
  #board_name{
    border: 0px;
    text-align: center;
    width: 800px;
  }
</style>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>게시판</title>
</head>
<body>
  <div class="board">
    <div class="about">
      <div id="board_name"><h1>자유게시판</h1></div>
      <b><?=$_SESSION['ses_userid'];?></b>님 안녕하세요
      <?='<a href="../signin/signOut.php"><button>로그아웃</button></a>'?>
      <?php
      $uid = $_SESSION['ses_userid'];
      $sql = "select * from account_info where id = '$uid'";
      $result = mysqli_query($dbConnect, $sql);
      $row = mysqli_fetch_array($result);
      if($row['level'] == 2){
        echo "<a href='../admin/admin_page.php'><button>회원 관리</button></a>";
      }
      ?>
    </div>
    <div class="postbox">
      <table>
        <thead>
          <tr>
            <th width=10%>번호</th>
            <th width=50%>제목</th>
            <th width=10%>작성자</th>
            <th width=20%>게시일</th>
            <th width=10%>조회수</th>
          </tr>
        </thead>
        <?php
        $sql = "select * from post order by post_id desc";
        $result = mysqli_query($dbConnect, $sql);
        while($row = mysqli_fetch_array($result))
        {
          $title=$row["title"];
          if(strlen($title)>30){
            $title=str_replace($row["title"],mb_substr($row["title"],0,30,"utf-8")."...",$row["title"]);
          }
          $sql2 = "select * from reply where post_id='".$row['post_id']."'";
          $sql2 = mysqli_query($dbConnect, $sql2);
          $rep_count = mysqli_num_rows($sql2);
          ?>
          <tbody>
            <tr>
              <td width=10%><?php echo $row['post_id']; ?></td>
              <td width=50%><a href="read.php?post_id=<?= $row["post_id"];?>"><?php echo $title;?></a><?= "[$rep_count]";?></td>
              <td width=10%><?php echo $row['author_id']?></td>
              <td width=20%><?php echo $row['created']?></td>
              <td width=10%><?php echo $row['hit']; ?></td>
            </tr>
          </tbody>
        <?php } ?>
      </table>
      <div id="write_button"><a href="create.php"><button>글쓰기</button></a></div>
    </div>
  </div>
</body>
</html>
