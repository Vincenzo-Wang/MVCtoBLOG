<?php
/**
 * @Author: anchen
 * @Date:   2017-06-16 20:46:13
 * @Last Modified by:   anchen
 * @Last Modified time: 2017-06-20 11:53:04
 */
namespace admin\model;
use csl\framework\Model;

class User extends Model
{
    public function userList()
    {
        return $this->field('uid,username,password,isadmin')->select();
    }
    public function userInfo($name)
    {
       
        return $this->field('uid,sign,email,username')->where('username='."'$name'")->select();
    }
    public function doUpdateUserInfo($post)
    {
        //var_dump($_SESSION);
        $name = $_SESSION['username'];
        return $this->where('username='."'$name'")->update($post);
    }
   
}