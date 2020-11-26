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

$sql = "DELETE FROM account_info WHERE id = '$_POST[id]'";

$result = mysqli_query($dbConnect, $sql);
if($result === false)
{
  error_log(mysqli_error($dbConnect));
  echo '<script>
        alert("추방 실패!");
        history.back();</script>';
}
else {
  echo '<script>
        alert("추방 성공!");
        location.href="admin_page.php";</script>';
}
?>
