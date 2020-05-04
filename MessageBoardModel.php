<?php
class MessageBoardModel{

    private $servername = "localhost";
    private $username = "root";
    private $password = "0000";
    private $db = "messageboard";


    private $conn;
    //連接資料庫
    function __construct(){
        $this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->db);
        if (mysqli_connect_errno($this->conn)) {
            echo "連接資料庫錯誤: " . mysqli_connect_error();
            exit();
        }

        $this->conn -> set_charset("utf8");

    }
    //顯示留言
    public function show(){
        $sql = "SELECT * FROM comment ";
        $result = mysqli_query($this->conn, $sql);


        if(mysqli_affected_rows($this->conn) >= 0){
            return $result->fetch_all(MYSQLI_ASSOC);
        }else{
            print("錯誤 " . mysqli_connect_error($this->conn));
            return false;
        }
    }
    //新增留言
    public function add($user, $content){
        $sql = "INSERT INTO comment(author, liuyan,time) VALUES ('$user'  ,'$content',now())";
        
        $result = mysqli_query($this->conn, $sql);

        if(mysqli_affected_rows($this->conn) == 1){
            return mysqli_affected_rows($this->conn);
        }else{
            print("錯誤 " . mysqli_connect_error($this->conn));
            return false;
        }

    }
    //修改留言
    public function edit($id, $message, $datetime){
        $sql = "UPDATE comment SET liuyan = '{$message}' , time = '{$datetime}' WHERE id = $id ";
        $result = mysqli_query($this->conn, $sql);

        if(mysqli_affected_rows($this->conn) == 1){
            return mysqli_affected_rows($this->conn);
        }else{
            print("錯誤 " . mysqli_connect_error($this->conn));
            return false;
        }

    }
    //移除留言
    public function remove($id){
        $sql = "DELETE FROM comment WHERE id= '$id'";
        $result = mysqli_query($this->conn, $sql);

        if(mysqli_affected_rows($this->conn) == 1){
            return mysqli_affected_rows($this->conn);
        }else{
            print("錯誤 " . mysqli_connect_error($this->conn));
            return false;
        }

    }
    //關閉資料庫
    function __destruct(){
        $this->conn->close();
    }

}
