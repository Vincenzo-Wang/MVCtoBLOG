<?php
/**
 * @Author: anchen
 * @Date:   2017-06-18 15:41:01
 * @Last Modified by:   anchen
 * @Last Modified time: 2017-06-20 17:22:07
 */
namespace index\model;
use csl\framework\Model;

class User extends Model
{
    public function isAdmin($username)
    {
        return $this->field('isadmin')->where("username='$username'")->select();
    }
    public function checkLogin($username,$password)
    {
        //$password = md5($password);
        return $this->where("username='$username' and password='$password'")
                     ->limit('1')
                     ->field('uid,username,isadmin')
                     ->select();
    }


    public function usernameRepeat($username)
    {
        $data =  $this->where("username='$username'")->select();
        //var_dump($data);
        //1如果用户存在返回true，否则返回fale
        return !empty($data[0]);
    }
    public function confirmPassword($password,$confirm)
    {
        if ($password == $confirm) {
            return false;
        }
        return true;
    }
    public function userInfo($name)
    {
       
        return $this->field('uid,sign')->where('username='."'$name'")->select();
    }
    public function userName($id)
    {
        return $this->field('username')->where('uid='.$id)->select();
    }
    public function zhuce($arr)
    {
       // var_dump($arr);
        return $this->insert($arr);
    }
}