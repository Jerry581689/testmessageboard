<?php  
    $author = $_POST["author"];
	//$_SESSION["authorl"]=$author;
    $content = $_POST["content"];  
	require_once "connet.php";
    require_once 'mysqlconfig.php';
    $ma1=new DB();
    $link=$ma1->connect();
    $sql = "insert into comment (author,liuyan,time) values('$author','$content',now())";
		if($author!=null){
		    $res = $ma1->insertl($link,$sql);
		};
	    if($author==null){
		    echo "<script>alert('請輸入留言人！');location='add.php';</script>";
		};
	
    ?>