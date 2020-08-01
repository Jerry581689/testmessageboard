<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>index</title>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>
  <center>
    <h2>留言板</h2>
    <hr width="70%">
  <form>
    <table class="table table-bordered table-info">
      <tbody>
        <tr>
          <th>新增留言</th>
          <th for="input-user">姓名</th>
              <th>
                <input name="input-user" placeholder="name" />
              </th>
          <th  align="center" for="input-content">留言</th>
              <th  align="center">
                <textarea name="input-content" placeholder="message"></textarea>
              </th>
          <th align="center" rowspan="2"><input id="create1" type="submit"  value="送出" /></th>
        </tr>
      </tbody>
  </table>
</form>

      <table class="table table-hover table-dark" align="center" width="1000px" height="150px">
        <thead>

        </thead>

      </table>
</center>
</body>
 <script type="text/javascript" src="<?=base_url('assets/js/messageboard.js')?>"></script>
</html>
