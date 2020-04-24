<?php
    header('Content-type: text/html; charset=UTF8');
    ?>
	<html>  
    <head>
    <title>我的留言板.新增留言</title>  
    </head>   
    <center>  
    <h2>我的留言板</h2> 
    <input type = "button" value = "留言列表" onclick="location.href='index.php'" class="button"/>
    <hr width = "70%"> 
    </center>
	<div class="k1">
    <form action = "doAdd.php" method = "post">  
    <h1>留言:</h1>
    <label>
    <span>姓名 :</span>
    <input type="text" name="author" placeholder="Name" />
    </label>
    <label>
    <span>留言 :</span>
    <textarea name="content" placeholder="Your Message"></textarea>
    </label>
    <input type="submit" value="提交" class="submit">
	</div>
    </form>
    </body>  
    </html>  