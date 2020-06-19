<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>edit</title>
</head>

<body bgcolor="#FFCC6E">
  <center>
    <h2>修改留言區</h2>
    <form action="<?= site_url('/') ?>">
      <input type="hidden">
      <button type="submit">留言列表</button>
    </form>
    <hr width="70%">
  </center>
  <!-- <meta http-equiv='refresh' /> -->
 
  <table border="1" align="center" width="1000px" height="150px">
    <tr>
      <th width="100px">留言者</th>
      <th width="100px" colspan="2"><?= $message['author'] ?></th>
      <th width="100px" name="time">時間</th>
      <th width="100px" colspan="2"><?= $message['time'] ?></th>
    </tr>
    <tr>
      <td align="center" width="100px">原留言內容</td>
      <td width="100px" colspan="2" align="center"><?= $message['liuyan'] ?></td>
      <form action="<?= site_url('MessageBoardController/update/').$message['id'] ?>"  method="POST">
      <td align="center">修改為</td>
        <td align="center">
            <textarea name="changemessage" placeholder="Your Message"></textarea>
        </td>
        <td align="center">
          <button type="submit">修改確定</button>
        </td>
      </form>
    </tr>
  </table>
  <center>
<?= validation_errors() ?>
  </center>
</body>

</html>