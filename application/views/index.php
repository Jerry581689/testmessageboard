<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>index</title>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body bgcolor="#FFCC6E">
  <center>
    <h2>我的留言板</h2>
    <hr width="70%">
    <a href="<?=site_url('MessageBoardController/add')?>">
      <input type="submit" name="add" value="新增留言" />
    </a>
    <br><br>
  </center>

      <table border="1" align="center" width="1000px" height="150px">

        <thead>

        </thead>


      </table>
    <!-- <center>
    <p>目前沒有留言</p>
    </center> -->

</body>
 <script type="text/javascript" src="<?= base_url('assets/js/messageboard.js') ?>"></script>
</html>
