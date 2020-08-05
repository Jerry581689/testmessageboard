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
}
