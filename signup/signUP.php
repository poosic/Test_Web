<style>
.upbox{
  border: 5px solid black;
  padding: 10px;
  margin: 10px;
  position:static;
  margin: auto;
  width: 400px;
  text-align:center;
  margin-top: 10%;
  margin-bottom: 10%;
}
</style>
<!doctype html>
<html>
<head>
<meta charset="UTF-8" />
<title>Sign Up</title>
</head>
<body>
  <div class="upbox">
    <h1>회원가입</h1>
    <form action="memberSave.php" method="post" >
      <p><input type="text" name="id" placeholder="아이디" /></p>
      <p><input type="password" name="pwd" placeholder="비밀번호"/></p>
      <p><input type="password" name="pwd2" placeholder="비밀번호 재입력" /></p>
      <p><input type="text" name="author_id" placeholder="닉네임"/></p>
      <input type="submit" value="가입하기" />
    </form>
  </div>
</body>
</html>
