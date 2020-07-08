<?php

/**
 * 留言板模組
 *
 * 提供取得、新增、修改、刪除
 */
class MessageBoardModel extends CI_Model
{
    /**
     * 建構子
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 顯示所有留言
     *
     * @return object
     */
    public function index()
    {
        $sql = $this->db->get('comment');

        return $sql->result_array();
    }

    /**
     * 新增留言
     *
     * @param  object $input
     *
     * @return bool
     */
    public function create($author,$content)
    {
        $messages = (object)[
            'author' => $author,
            'liuyan' => $content,
            'time' => date("Y-m-d H:i:s"),
        ];
        $this->db->insert('comment', $messages);

        return $this->db->affected_rows();
    }

    /**
     * 取得id
     *
     * @param int $id 取得id
     *
     * @return object
     */
    public function get($id)
    {
        $this->db->where('id', $id);

        return $this->db->get('comment');
    }

    /**
     * 修改留言
     *
     * @param object $input
     *
     * @return bool
     */
    public function update($input)
    {
        $this->db->where('id', $input->id);
        $this->db->update('comment', $input);

        return $this->db->affected_rows();
    }

    /**
     * 移除留言
     *
     * @param int $id 取得id
     *
     * @return bool
     */
    public function remove($id)
    {
        $this->db->delete('comment', [
            'id' => $id,
        ]);

        return $this->db->affected_rows();
    }

    /**
     * 關閉資料庫
     *
     * @return void
     */
    public function __destruct()
    {
        $this->db->close();
    }
}
