<?php
/** 顯示留言跟新增留言介面 */
/** 引入controller */
include 'MessageBoardController.php';
/** @var object $controller  */
$controller = new MessageBoardController();
/** 
 * 讀入新增跟刪除的資料
 * 
 * @var string $user 留言者姓名
 * @var string $content 新增的留言
 * @var object $controller 呼叫controller，add,remove方法加入留言者名稱跟留言
 * @var object $message 呼叫controller ，show方法 
 * @var mixed $id ，取得要刪除的id
 */
if (isset($_POST['add'])) { 
    $user = $_POST['input-user'];
    $content = $_POST['input-content'];
    $controller->add($user, $content);
} elseif (isset($_POST['remove'])) { 
    $id = $_POST['id'];
    $controller->remove($id);
}

$messages = $controller->show();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>index</title>
</head>

<body bgcolor="#FFCC6E">

  <center>
    <h2>我的留言板</h2>
    <hr width="70%">
  </center>




  <?php
if ($messages) {
    foreach ($messages as $row) {
        ?>

      <table border="1" align="center" width="1000px" height="150px">
        <tr>
          <th width="100px">留言者</th>
          <th width="100px"><?=$row['author']?></th>
          <th width="100px">時間</th>
          <th width="100px"><?=$row['time']?></th>
          <form action="index.php" method="POST">
            <th width="100px">
              <input type="hidden" name="id" value="<?=$row['id']?>" />
              <input type="submit" name="remove" value="刪除" />
            </th>
          </form>
        </tr>
        <tr>
          <td align="center" width="100px">留言內容</td>
          <td width="100px" colspan="3"><?=$row['liuyan']?></td>
          <form action="edit.php?id=<?=$row['id']?>" method="POST">
            <td align="center" width="100px">
              <input type="submit" value="修改" />
            </td>
          </form>
        </tr>
      </table>
    <?php
}
} else {
    ?>
    <p>目前沒有留言</p>
  <?php
}
?>
  <hr width="70%">
  <form action="index.php" method="post">
    <center>
      <h1>新增留言</h1>
      <table border="1" align="center" width="1000px" height="150px">
        <tr>
          <th for="input-user">姓名</th>
          <th>
            <input name="input-user" placeholder="name" />
          </th>
        </tr>
        <tr>
          <th align="center" for="input-content">留言</th>
          <th align="center">
            <textarea name="input-content" placeholder="message"></textarea>
          </th>
        </tr>
      </table>
      <input type="submit" name="<?=isset($_POST['add']) ?: 'add'?>" value="送出" />

  </form>
  </center>

</body>

</html>
