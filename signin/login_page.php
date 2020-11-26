<style>
.loginbox{
  border: 5px solid black;
  padding: 10px;
  margin: 10px;
  position:static;
  margin: auto;
  width: 400px;
  text-align:center;
  margin-top: 20%;
  margin-bottom: 20%;
}
</style>

<!doctype html>
<html>
<head>
  <meta charset="UTF-8" />
  <title>Sign In</title>
</head>
<body>
  <div class="loginbox">
    <form action="signIn.php" method="post" >
      <input type="text" name="memberId" placeholder="ID" />
      <input type="password" name="memberPw" placeholder="PW"/>
      <input type="submit" value="로그인" />
    </form>
    <a href="../signup/signUP.php"><button>회원가입 하기</button></a>
  </div>
</body>
</html>
