<?php
class MessageBoardModel extends CI_Model{

    //連接資料庫
    function __construct()
    {       
        parent::__construct();
          
    }
    //顯示留言
    public function show()
    {      
        $sql = "SELECT * FROM comment ";
        return $this->db->query($sql);


    }
    //新增留言
    public function create($input)
    {
        $messages = array(
            'author' => $input->author,
            'liuyan' => $input->liuyan,
            'time' => date("Y-m-d H:i:s")
        );
        $this->db->insert('comment',$messages);
        return $this->db->affected_rows();
    }

    //修改取得id
    public function get($id)
    {
        $sql = 'SELECT `id`,`author`,`liuyan`,`time` FROM comment WHERE `id` = ? ';

        $result = $this->db->query($sql,array(
            $id
        ));
        return $result;
    }

    //修改留言
    public function update($input)
    {
        $sql = "UPDATE comment SET liuyan = ?,time = ? WHERE  id = ? ";
        return $this->db->query($sql,array(
            $input->liuyan,
            $input->time,
            $input->id        
        ));
    }
    //移除留言
    public function remove($id)
    {
        $sql = "DELETE FROM comment WHERE id = ? ";
        return $this->db->query($sql,array(
            $id
        ));
    }
    //關閉資料庫
    function __destruct()
    {
        $this->db->close();
    }
}
