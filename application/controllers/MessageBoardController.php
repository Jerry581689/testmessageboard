<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MessageBoardController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MessageBoardModel');
        $this->load->library('form_validation');
    }

    public function show()
    {
        $result = $this->MessageBoardModel->show()->result_array();

        $this->load->view('index', [
            'messages' => $result,
        ]);
    }

    public function add()
    {
        $this->load->view('addpost');
    }

    public function create()
    {
        $this->form_validation->set_rules(
            'input-user',
            'input-user',
            'required|min_length[5]|max_length[12]',
            array(
                'min_length' => "使用者長度 不能小於5 個字",
                'required' => "使用者不能是空值",
                'max_length' => "使用者長度不能大於12個字",
            )
        );
        $this->form_validation->set_rules(
            'input-content',
            '',
            'required',
            array(
                'required' => "內容不能留白",
            )
        );
        if ($this->form_validation->run() == true) {
            $input = (object) array(
                'author' => $this->input->post('input-user', true),
                'liuyan' => $this->input->post('input-content'),
                //'time' => $this->input->date("H:i:s")
            );
            $this->session->set_flashdata('message', $this->MessageBoardModel->create($input));
            header('Location:' . site_url('MessageBoardController/show?message=success'));
        } else {
            $this->load->view('addpost');
        }
    }

    public function edit($id)
    {
        $message = $this->MessageBoardModel->get($id)->result_array()[0];

        $this->load->view('edit', [
            'message' => $message,
        ]);
    }
    public function update($id)
    {
        $this->form_validation->set_rules(
            'changemessage',
            '',
            'required',
            array(
                'required' => "內容不能留白",
            )
        );
        if ($this->form_validation->run() == true) {
            $message = (object) array(
                'id' => $id,
                'liuyan' => $this->input->post('changemessage'),
                'time' => date("Y-m-d H:i:s")
            );
            $this->MessageBoardModel->update($message);

            header('Location:' . site_url('MessageBoardController/show'));

       } else {
            $this->edit($id);
        }

    }

    public function remove($id)
    {
        $result = $this->MessageBoardModel->remove($id);

        header('Location:' . site_url('MessageBoardController/show'));
    }
}
