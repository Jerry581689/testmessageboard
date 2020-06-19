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

    <a href="<?= site_url('MessageBoardController/add') ?>">
      <input type="submit" name="add" value="新增留言" />
    </a>
    <p>
    <?php  
      //var_dump($this->session->flashdata('message'));
    ?>
    </p>
    <br><br>
  </center>



  <?php

    if($messages){
    foreach ($messages as $row) { ?>

      <table border="1" align="center" width="1000px" height="150px">
        <tr>
          <th width="100px">留言者</th>
          <th width="100px"><?= $row['author'] ?></th>
          <th width="100px">時間</th>
          <th width="100px"><?= $row['time'] ?></th>
          <form action="<?= site_url('MessageBoardController/remove/').$row['id'] ?>" method="POST">
            <th width="100px">
              <input type="submit" name="remove" value="刪除" />
            </th>
          </form>
        </tr>
        <tr>
          <td align="center" width="100px">留言內容</td>
          <td width="100px" colspan="3"><?= $row['liuyan']  ?></td>
          <form action="<?= site_url('MessageBoardController/edit/').$row['id'] ?>" method="POST">
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
    <center>
    <p>目前沒有留言</p>
    </center>
    <?php
    }
   ?>

</body>

</html>

