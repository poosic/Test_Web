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
    text-align:center;
  }
  #board_name{
    text-align:center;
    text-decoration: none;
  }
  .button{
    text-align: left;
  }
</style>
<!doctype html>
<head>
<meta charset="UTF-8">
<title>게시판</title>
</head>
<body>
  <div class="board">
    <div id="board_name"><h1><a href="/Post/main.php">자유게시판</a></h1></div>
    <div class="postbox">
      <form action="process_create.php" method="post" enctype="multipart/form-data">
        <p><textarea name="title" rows="1" cols="100" placeholder="제목" maxlength="100" required></textarea></p>
        <p><textarea cols="100" rows="10" name="description" placeholder="내용" required></textarea></p>
        <div class="button"><input type="file" name="b_file" /></div>
        <p><button type="submit">글 작성</button></p>
      </form>
    </div>
  </div>
</body>
</html>
