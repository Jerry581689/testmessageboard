<?php
/**
 * 修改畫面
 *
 * 修改留言跟即時更新時間
 *
 */
/** 引入cotroller */
include 'MessageBoardController.php';
/** @var object $controller */
$controller = new MessageBoardController();
/** @var object $model */
$model = new MessageBoardModel();
/** @var mixed $id ， 取得id */
$id = $_GET['id'];
/** @var object $row ， 呼叫model,get方法取得id */
$row = $model->get($id);

/**
 * 讀入修改留言更新時間
 * 
 * @var string $message 取得被選擇的留言內容
 * @var string $datetime 取得現在時區的時間
 * @var object $controller 呼叫controller類別的修改方法，更新新的留言時間
 */
if (isset($_GET['message'])) {
    $message = $_GET['message'];
    $datetime = date("H:i:sa");
    $controller->edit($id, $message, $datetime);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>edit</title>
</head>

<body bgcolor="#FFCC6E">
  <center>
    <h2>修改留言區</h2>
    <form action="index.php">
      <input type="hidden">
      <button type="submit">留言列表</button>
    </form>
    <hr width="70%">
  </center>
  <meta http-equiv='refresh' />

  <table border="1" align="center" width="1000px" height="150px">
    <tr>
      <th width="100px">留言者</th>
      <th width="100px" colspan="2"><?=$row['author']?></th>
      <th width="100px">時間</th>
      <th width="100px" colspan="2"><?=$row['time']?></th>
    </tr>
    <tr>
      <td align="center" width="100px">原留言內容</td>
      <td width="100px" colspan="2" align="center"><?=$row['liuyan']?></td>
      <td align="center">修改為</td>
      <form action="edit.php" method="GET">
        <td align="center"><textarea name="message" placeholder="Your Message"></textarea></td>
        <td align="center">
          <input type='hidden' name="id" value="<?=$_GET['id']?>"></input>
          <button type="submit">修改確定</button>
        </td>
      </form>
    </tr>
  </table>
</body>

</html>
