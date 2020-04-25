<?php
header('Content-type: text/html; charset=UTF8');
?>
<html>

<head>
  <title>修改留言</title>
</head>
<body bgcolor="#FFCC6E">

<center>
  <h2>修改留言區</h2>
  <hr width="70%">
</center>
<?php
    require_once "connet.php";
    require_once 'mysqlconfig.php';
    $ma1=new DB();
    $link=$ma1->connect();
    mysqli_query($link, "set names 'utf8'");
    $id = $_GET['id'];
    $query_sql = "select * from comment where id = $id";
    $result = mysqli_query($link, $query_sql);
    while ($res = mysqli_fetch_array($result)) {
?>
  <table border="1" align="center" width="1000px" height="150px">
    <tr>
      <th width="100px">留言者</th>
      <th width="100px" colspan="2"><?php echo $res['author'] ?></th>
      <th width="100px">時間</th>
      <th width="100px" colspan="2"><?php echo $res['time'] ?></th>
    </tr>
    <tr>
      <td align="center" width="100px">原留言內容</td>
      <td width="100px" colspan="2" align="center"><?php echo $res['liuyan']  ?></td>
      <td align="center">修改為</td>
      <form action="doedit.php?id=<?php echo $res['id'] ?>" method="POST">
        <td align="center"><textarea name="message" placeholder="Your Message"></textarea></td>
        <td align="center">
          <input type='submit' value="修改確定"></input>
        </td>
      </form>
    </tr>
  </table>

<?php
    }
    ?>
</body>

</html>