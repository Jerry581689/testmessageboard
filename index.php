<?php
header('Content-type: text/html; charset=UTF8');
?>
<html>

<head>
  <title>我的留言板.檢視留言</title>
</head>

<body bgcolor="#FFCC6E">
  <center>
    <h2>我的留言板</h2>
    <input type="button" value="新增留言" onclick="location.href='add.php'" class="button" />
    <hr width="70%">
  </center>
  <?php
  //資料庫連線  
  $con = @mysqli_connect("localhost", "root", "", "messageboard");
  if (!$con) {
    die("資料庫連線錯誤" . mysqli_connect_error());
  }
  mysqli_query($con, "set names 'utf8'");
  $query_sql = "select * from comment ";
  $result = mysqli_query($con, $query_sql);
  while ($res = mysqli_fetch_array($result)) {
  ?>



    <table border="1" align="center" width="1000px" height="150px">
      <tr>
        <th width="100px">留言者</th>
        <th width="100px"><?php echo $res['author'] ?></th>
        <th width="100px">時間</th>
        <th width="100px"><?php echo $res['time'] ?></th>
        <th width="100px"><a href="del.php?id=<?php echo $res['id'] ?>"><input type='submit' value='刪除'></input></th>
      </tr>
      <tr>
        <td align="center" width="100px">留言內容</td>
        <td width="100px" colspan="3"><?php echo $res['liuyan']  ?></td>
        <td align="center" width="100px"><a href=" edit.php?id=<?php echo $res['id'] ?>"><input type='submit' value='修改'></input></td>
      </tr>
    </table>

  <?php
  }
  ?>

</body>

</html>