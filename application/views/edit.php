<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>edit</title>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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

  <table border="1" align="center" width="1000px" height="150px" class="editmessage">
    <thead>

    </thead>
  </table>
  <center>
<?= validation_errors() ?>
  </center>
</body>
<script type="text/javascript" src="<?= base_url('assets/js/edit.js') ?>"></script>
</html>