<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<body bgcolor="#FFCC6E">
<hr width="70%">

    <center>
      <h1>新增留言</h1>

      <a href="<?=site_url('MessageBoardController/index')?>">
      <input type="submit" name="add" value="返回留言列表" />
    </a>
    <br><br>
     <form  method="post">
      <table border="1" align="center" width="1000px" height="150px">
        <thead>

        </thead>
      </table>
      <input id="create1" type="submit"  value="送出" />
      </form>
  <?=validation_errors()?>
  </center>
</body>
<script src="<?=base_url('assets/js/addpost.js')?>"></script>
</html>