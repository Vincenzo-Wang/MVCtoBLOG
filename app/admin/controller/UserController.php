<?php
/**
 * @Author: anchen
 * @Date:   2017-06-17 08:52:37
 * @Last Modified by:   anchen
 * @Last Modified time: 2017-06-20 14:28:40
 */
namespace admin\controller;
use admin\controller\BaseController;
use admin\model\user;

class UserController extends BaseController
{
    protected $user;
    public function _init()
    {
      $this->user = new User();
    }
    public function updateUserInfo()
    {
        //var_dump($_POST);
        $password = md5($_POST['password']);
        $_POST['password'] = $password;
        //var_dump($_POST);
        $result = $this->user->doUpdateUserInfo($_POST);
        if ($result) {
            $this->success('修改成功,即将返回博客首页','?m=index&c=index&a=index');
            $_SESSION['username'] = $_POST['username'];
        } else {
            $this->error('修改失败');
        }
        
    }

}