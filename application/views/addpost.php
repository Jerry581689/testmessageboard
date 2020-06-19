<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body bgcolor="#FFCC6E">
<hr width="70%">
  
    <center>
      <h1>新增留言</h1>

      <a href="<?= site_url('MessageBoardController/show') ?>">
      <input type="submit" name="add" value="返回留言列表" />
    </a>

    <br><br>
    <form action="<?= site_url('MessageBoardController/create') ?>" method="post">
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
      <input type="submit"  value="送出" />                       
  </form>
  <?= validation_errors()?>
  </center>
</body>
</html>