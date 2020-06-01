<?php
class MessageBoardModel
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "0000";
    private $db = "messageboard";
    private $conn;

    //連接資料庫
    function __construct()
    {
        $this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->db);
        if (mysqli_connect_errno($this->conn)) {
            echo "連接資料庫錯誤: " . mysqli_connect_error();
            exit();
        }

        $this->conn->set_charset("utf8");
    }

    //顯示留言
    public function show()
    {
        $sql = sprintf(' SELECT `id`, `author`, `liuyan`, `time` FROM `comment` ');
        $result = mysqli_query($this->conn, $sql);


        if (mysqli_affected_rows($this->conn) >= 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        }
    }

    //新增留言
    public function add($user, $content)
    {
        $datetime = date("Y-m-d");
        $sql = sprintf('INSERT INTO `comment`(`author`, `liuyan`, `time`) VALUES (\'%s\', \'%s\', \'%s\');', $user, $content,$datetime);
        $result = mysqli_query($this->conn, $sql);

        if (mysqli_affected_rows($this->conn) == 1) {
            return mysqli_affected_rows($this->conn);
        } else {
            return false;
        }
    }

    //修改取得id
    public function get($id)
    {
        $sql = sprintf('SELECT `id`, `author`, `liuyan`, `time` FROM `comment` WHERE `id`=%d;', $id);
        $result = mysqli_query($this->conn, $sql);
        $res = mysqli_fetch_array($result);
        return $res;
    }

    //修改留言
    public function edit($id, $message, $datetime)
    {               
        $sql = sprintf('UPDATE `comment` SET `liuyan`=\'%s\' ,`time`= \'%s\' WHERE `id`=%d;', $message, $datetime, $id);
        $result = mysqli_query($this->conn, $sql);

        if (mysqli_affected_rows($this->conn) == 1) {
            return mysqli_affected_rows($this->conn);
        } else {
            return false;
        }
    }

    //移除留言
    public function remove($id)
    {
        
        $sql = sprintf('DELETE FROM `comment` WHERE `id`=%d;', $id);
        $result = mysqli_query($this->conn, $sql);

        if (mysqli_affected_rows($this->conn) == 1) {
            return mysqli_affected_rows($this->conn);
        } else {
            return false;
        }
    }

    //關閉資料庫
    function __destruct()
    {
        $this->conn->close();
    }
}
