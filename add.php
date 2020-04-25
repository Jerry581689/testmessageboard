<?php
header('Content-type: text/html; charset=UTF8');
?>
<html>

<head>
    <title>我的留言板.新增留言</title>
</head>

<body bgcolor="#FFCC6E">
    <center>
        <h2>我的留言板</h2>
        <input type="button" value="留言列表" onclick="location.href='index.php'" class="button" />
        <hr width="70%">
        <form action="doAdd.php" method="post">
            <h1>新增留言</h1>
            <table border="1" align="center" width="1000px" height="150px">
                <tr>
                    <th>姓名</th>
                    <th><input type="text" name="author" placeholder="Name" /></th>
                </tr>
                <tr>
                    <th align="center">留言</th>
                    <th align="center"><textarea name="content" placeholder="Your Message"></textarea></th>
                </tr>
            </table>
            <br><br>
            <input type="submit" value="提交" class="submit">
        </form>
    </center>
</body>

</html>