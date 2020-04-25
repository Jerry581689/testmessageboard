<?php
   class DB{
   	function connect(){
           @$link = mysqli_connect('localhost','root','');//連線資料庫
           //mysqli_set_charset($link,DB_CHARSET);//設定資料庫字型格式
           mysqli_select_db($link,DB_DBNAME) or die('資料庫開啟失敗');//選擇資料庫
          if(mysqli_connect_errno())
        {
        die('資料庫連線失敗 : '.mysqli_connect_errno());
        }
        return $link;
    }
     //新增留言
    function insert($link,$sql){
       if (mysqli_query($link, $sql)) { 
          echo "<script language='javascript'> alert('留言成功!');location='index.php'; </script>"; 
       } else { 
          echo "Error insert data: " . $link->error; 
      }
     }
     
     function edit1($link,$sql){
      if (mysqli_query($link, $sql)) { 
        echo "<script>alert('修改成功，返回首頁');location='index.php';</script>";
     } else { 
      echo "<script>alert('修改失敗');location='index.php'</script>";
      exit;
    }
     }
}
?>