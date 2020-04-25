<?php
   header("content-type:text/html;charset=utf-8");
    require_once "connet.php";
    require_once 'mysqlconfig.php';
    $ma1=new DB();
    $link=$ma1->connect();
	 $id = $_GET['id'];
    
    if($link){
       $sql="delete from comment where id = $id";	   
       $que=mysqli_query($link,$sql);
		if($que){
		   echo "<script>alert('刪除成功，返回首頁');location='index.php';</script>";
		}else{
		   echo "<script>alert('刪除失敗');location='index.php'</script>";
		   exit;
		}
      }
?>