<?php

class ControllerApi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MessageBoardModel');
        $this->load->library('form_validation');
        // $this->output->set_content_type('application/json');
    }

    public function index()
    {
        $messages = $this->MessageBoardModel->index();
        $this->output->set_output(json_encode($messages));
    }
    public function create()
    {
        $this->form_validation->set_rules(
            'name',
            'name',
            'required|min_length[3]|max_length[12]',
            [
                'min_length' => "使用者長度 不能小於3 個字",
                'required' => "使用者不能是空值",
                'max_length' => "使用者長度不能大於12個字",
            ]
        );
        $this->form_validation->set_rules(
            'content',
            '',
            'required',
            [
                'required' => "內容不能留白",
            ]
        );
        if ($this->form_validation->run() == true) {
            $author = $this->input->post('name');
            $content = $this->input->post('content');
            $this->MessageBoardModel->create($author, $content);
            $this->output->set_output(json_encode((object) [
                'states' => 'ok',
                'message' => '新增資料成功',
            ]));
            header(base_url('MessageBoardController/index'));
        } else {
            //$this->load->view('addpost');
            $this->output->set_output(json_encode((object) [
                'states' => 'failed',
                'message' => validation_errors(),
            ]));
        }
    }
    public function remove($id)
    {
        //$id = $this->input->post('id');
        $result = $this->MessageBoardModel->remove($id);
        if ($result == 1) {
            $this->output->set_output(json_encode((object) [
                'status' => 'success',
                'message' => '成功刪除' . $result . '筆',
            ]));
            $this->load->view('index');
        } else {
            $this->output->set_output(json_encode((object) [
                'status' => 'failed',
                'message' => '刪除失敗',
            ]));
        }
    }
    public function update($id)
    {
        $this->form_validation->set_rules(
            'changemessage',
            '',
            'required',
            [
                'required' => "內容不能留白",
            ]
        );
        if ($this->form_validation->run() == true) {
            $message = (object) [
                'id' => $id,
                'liuyan' => $this->input->post('changemessage'),
                'time' => date("Y-m-d H:i:s"),
            ];
            $result = $this->MessageBoardModel->update($message);

            if ($result == 1) {
                $this->output->set_output(json_encode((object) [
                    'status' => 'ok',
                    'message' => '修改成功',
                    'data' => $message,
                ]));
            } else {
                $this->output->set_output(json_encode((object) [
                    'states' => 'failed',
                    'message' => '修改失敗',
                ]));
            }
        } else {
            $this->MessageBoardModel->get($id);
            $this->output->set_output(json_encode((object) [
                'status' => 'failed',
                'message' => validation_errors(),
            ]));
        }
    }
}
