<?php
include "../include/dbConnect.php";
include "../include/session.php";
$uid = $_SESSION['ses_userid'];
$sql = "select * from account_info where id = '$uid'";
$result = mysqli_query($dbConnect, $sql);
$row = mysqli_fetch_array($result);
if($row['level'] != 2){
  echo '<script>alert("비정상적인 접근입니다!");
        history.back();</script>';
}
?>
<style>
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
</style>
<html>
<head>
  <meta charset="utf-8">
</head>
<body>
<?=$_SESSION['ses_userid'].'님 안녕하세요 '?>
<?='<a href="../signin/signOut.php"><button>로그아웃 </button></a>'?>
<a href="../Post/main.php"><button> 돌아가기</button></a>
<div class="postbox">
<table>
  <thead>
    <tr>
      <th width="70">user_num</th>
      <th width="120">id</th>
      <th width="100">name</th>ㄴ
      <th width="100">level</th>
    </tr>
  </thead>
  <?php
  $sql = "select * from account_info order by user_num desc";
  $result = mysqli_query($dbConnect, $sql);
  while($row = mysqli_fetch_array($result))
  {
  ?>
  <tbody>
    <tr>
      <td width="70"><?php echo $row['user_num']; ?></td>
      <td width="120"><?php echo $row['id']?></td>
      <td width="100"><?php echo $row['name']?></td>
      <td width="100"><?php echo $row['level'];?></td>
      <td width="100">
        <form action="level_update.php" method="post">
          <input type="text" name="fix_level"/>
          <button type="submit">수정</button>
          <input type="hidden" name="id" value="<?=$row['id']?>"/>
        </form>
        <form action="id_delete.php" method="post">
          <button type="submit">추방</button>
          <input type="hidden" name="id" value="<?=$row['id']?>"/>
        </form>
      </td>
    </tr>
  </tbody>
  <?php } ?>
</table>
</div>
</body>
</html>
