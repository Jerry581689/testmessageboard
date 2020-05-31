<?php
/**回傳結果*/
include 'MessageBoardModel.php';
class MessageBoardController
{
    private $model;
/**
 * 建構子
 *
 * @return void
 */
    public function __construct()
    {
        $this->model = new MessageBoardModel();
    }

/**
 * 顯示所有留言
 *
 * @return string 
 */
    public function show()
    {
        $result = $this->model->show();
        return $result;
    }

/**
 * 新增留言
 *
 * @param string $user 使用者名稱
 * @param string $content 輸入的留言
 *
 * @return string  
 */
    public function add($user, $content)
    {
        if (empty($user) || empty($content)) {
            return "請填寫完整!";
        } else {
            $result = $this->model->add($user, $content);
            if ($result) {
                return ("新增 $result 筆 成功!");
            } else {
                return ("新增失敗!");
            }
        }
    }

/**
 * 修改留言
 *
 * @param mixed $id 取得id
 * @param string $message 修改留言
 * @param string $datetime 修改時間
 *
 * @return string  
 */

    public function edit($id, $message, $datetime)
    {
        if (empty($message)) {
            return ("請填寫完整!");
        } else {
            $result = $this->model->edit($id, $message, $datetime);
            if ($result) {
                return ("修改 $result 筆 成功! 按留言列表返回▲");
            } else {
                return ("修改失敗!");
            }
        }

    }
    
/**
 * 移除留言
 *
 * @param mixed $id 取得id
 *
 * @return string  
 */
    public function remove($id)
    {
        if (empty($id)) {
            return ("請填寫完整!");
        } else {
            $result = $this->model->remove($id);
            if ($result) {
                return ("刪除  $result 筆  成功!");
            } else {
                return ("刪除失敗!");
            }
        }
    }
}
