<?php
class MessageBoardModel
{
    /** @var string $servername 資料庫主機名稱 */
    private $servername = "localhost";
    /** @var string $username 使用者名稱 */
    private $username = "root";
    /** @var string $password 密碼 */
    private $password = "0000";
    /** @var string $db 資料庫名稱 */
    private $db = "messageboard";
    /** @var object $conn 資料庫連線 */
    private $conn;

    /**
     * 建構子
     *
     * @return void
     */
    public function __construct()
    {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->db);
        if (mysqli_connect_errno($this->conn)) {
            echo "連接資料庫錯誤: " . mysqli_connect_error();
            exit();
        }

        $this->conn->set_charset("utf8");
    }

/**
 * 顯示所有留言
 *
 * @var string $sql 讀取資料庫id,author,liuyan,time資料
 *
 * @return string 
 */
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

/**
 * 新增留言
 *
 * @param string $user 使用者名稱
 * @param string $content 輸入的留言
 *
 * @var string $datetime 即時的時間
 *
 * @return string  
 */
    public function add($user, $content)
    {
        $datetime = date("Y-m-d");
        $sql = sprintf('INSERT INTO `comment`(`author`, `liuyan`, `time`) VALUES (\'%s\', \'%s\', \'%s\');', $user, $content, $datetime);
        $result = mysqli_query($this->conn, $sql);

        if (mysqli_affected_rows($this->conn) == 1) {
            return mysqli_affected_rows($this->conn);
        } else {
            return false;
        }
    }

/**
 * 取得id
 *
 * @param mixed $id 取的id
 *
 * @var string $sql 讀取資料庫id,author,liuyan,time資料
 *
 * @return mixed 
 */
    public function get($id)
    {
        $sql = sprintf('SELECT `id`, `author`, `liuyan`, `time` FROM `comment` WHERE `id`=%d;', $id);
        $result = mysqli_query($this->conn, $sql);
        $res = mysqli_fetch_array($result);
        
        return $res;
    }

/**
 * 修改留言
 *
 * @param mixed $id 取得id
 * @param string $message 修改留言
 * @param string $datetime 修改時間
 *
 * @var string $sql 更新資料庫comment,liuyan,time資料
 *
 * @return string 
 */
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

/**
 * 移除留言
 *
 * @param mixed $id 取的id
 *
 * @var string $sql 刪除資料庫comment的內容
 *
 * @return string  
 */
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

/**
 * 關閉資料庫
 *
 * @return void
 */
    public function __destruct()
    {
        $this->conn->close();
    }
}
