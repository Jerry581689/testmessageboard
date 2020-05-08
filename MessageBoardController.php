<?php
include 'MessageBoardModel.php';

class MessageBoardController{
    private $model;

    function __construct()
    {
        $this->model = new MessageBoardModel();
    }

    public function show()
    {
        $result = $this->model->show();
        return $result;
    }

    public function add($user, $content)
    {
        if (empty($user) || empty($content)){
            return "請填寫完整!";
        } else {
            $result = $this->model->add($user, $content);
            if ($result){
                return ("新增 $result 筆 成功!");
            } else {
                return ("新增失敗!");
            }
        }
    }

    public function edit($id, $message, $datetime)
    {       
        if (empty($message)){ 
            return ("請填寫完整!");
        } else {
            $result = $this->model->edit($id, $message, $datetime);
            if ($result){
                return ("修改 $result 筆 成功! 按留言列表返回▲");
            } else {
                return ("修改失敗!");
            }
        }
        
    }

    public function remove($id)
    {
        if (empty($id)){
            return("請填寫完整!");
        } else {
            $result = $this->model->remove($id);
            if ($result){
                return("刪除  $result 筆  成功!");
            } else {
                return("刪除失敗!");
            }
        }
    }
}
