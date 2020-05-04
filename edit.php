<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>edit</title>
</head>
<body bgcolor="#FFCC6E">
<center>
  <h2>修改留言區</h2>
  <hr width="70%">
</center>
<?php
    include 'MessageBoardController.php';
    $controller = new MessageBoardController();
    $datetime  = date("H:i:sa");
     if (isset($_POST['message'])) { 
       $id = $_POST['id'];
       $message  = $_POST['message'];
       $controller->edit($id, $message, $datetime);
       header('Location:index.php');
     }

?>


  <table border="1" align="center" width="1000px" height="150px">
    <tr>
      <th width="100px">留言者</th>
      <th width="100px" colspan="2"><?= $_POST['author'] ?></th>
      <th width="100px">時間</th>
      <th width="100px" colspan="2"><?= $_POST['time'] ?></th>
    </tr>
    <tr>
      <td align="center" width="100px">原留言內容</td>
      <td width="100px" colspan="2" align="center"><?= $_POST['liuyan'] ?></td>
      <td align="center">修改為</td>
      <form action="edit.php" method="POST">
        <td align="center"><textarea name="message" placeholder="Your Message"></textarea></td>
        <td align="center">
          <input type='hidden'  name="id" value="<?= $_POST['id'] ?>"></input>
          <button type="submit">修改確定</button>
        </td>
      </form>
    </tr>
  </table>
</body>

</html>
