<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 留言板控制器
 */
class MessageBoardController extends CI_Controller
{
    /**
     * 建構子
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MessageBoardModel');
        $this->load->library('form_validation');
    }

    /**
     * 顯示所有留言
     *
     * @return object
     */
    public function index()
    {
        $result = $this->MessageBoardModel->index();

        $this->load->view('index', [
            'messages' => $result,
        ]);
    }

    /**
     * 顯示新增留言介面
     *
     * @return void
     */
    public function add()
    {
        $this->load->view('addpost');
    }

    /**
     * 顯示修改介面
     *
     * @param int $id
     *
     * @return object
     */
    public function edit($id)
    {
        $message = $this->MessageBoardModel->get($id)->result_array()[0];

        $this->load->view('edit', [
            'message' => $message,
        ]);
    }
}
