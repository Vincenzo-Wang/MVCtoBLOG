<?php
/**
 * @Author: anchen
 * @Date:   2017-06-18 15:40:12
 * @Last Modified by:   anchen
 * @Last Modified time: 2017-06-21 09:49:06
 */
namespace index\controller;
use index\controller\BaseController;
use csl\framework\VerifyCode;
use index\model\User;
use vendor\alidayu\TopClient;
use vendor\alidayu\AlibabaAliqinFcSmsNumSendRequest;
class UserController extends BaseController
{
    protected $user;

    public function _init()
    {
        $this->user = new User();
    }
    public function login()
    {
        $this->display();
    }

    public function yzm()
    {
        $vc = new VerifyCode();
       // var_dump($vc);
       
       //var_dump($vc->getCode());
       $vc->outputImage();
       $_SESSION['code'] = $vc->getCode();
       
    }

    /**
     * 登录处理
     * @return [type] [description]
     */
    public function doLogin()
    {
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $code = $_POST['code'];
        $result = $this->user->checkLogin($username,$password)[0];
       
        if ($result && count($result)>0) {
            if ($code == $_SESSION['code']) {
                unset($_SESSION['code']);
                $_SESSION['username'] = $username;
                $_SESSION['isadmin'] = $result['isadmin'];
                // var_dump($_SESSION);die;
                $this->success('登录成功！','http://localhost/myblog/');
            } else {
                $this->error('验证码错误');
            }
        } else {
            $this->error('登录失败');
        }

    }

    public function logout()
    {
        unset($_SESSION['username']);
        unset($_SESSION['isadmin']);
        $this->success('退出成功','http://localhost/myblog/');
        // $this->display('index/index.html');
    }

    public function register()
    {
        $this->display();
    }
    public function doRegister()
    {
        //var_dump($_POST);
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $confirm = md5($_POST['confirm']);
        $email = $_POST['email'];
        $code = $_POST['code'];
        $codetwo = $_SESSION['smscode'];


        $ip = $_SERVER["REMOTE_ADDR"];
        
        if ($ip = "::1") {
             $ip = ip2long('127.0.0.1');
        } else {
            $ip = ip2long($ip);
        }
        
        $arr = $_POST['ip'] = "$ip";

        //1 用户名是否重复
        if ($this->user->usernameRepeat($username)) {
            return $this->error('用户名重复');
        }
        //2两次密码输入是否一致
        if ($this->user->confirmPassword($password,$confirm)) {
            return $this->error('两次密码输入不一致');
        }
        //3手机验证码是否正确
        //var_dump($_SESSION);
        if ($code != $codetwo) {
            return $this->error('手机验证码输入错误');
        }

        //var_dump($_POST);
        $_POST['password'] = $password;
        
        
        $data = $this->user->zhuce($_POST);
        //var_dump($data);
        if ($data) {
           $this->success('注册成功！','http://localhost/myblog/');
            $_SESSION['username'] = $_POST['username'];
        } else {
            $this->error('注册失败！');
        }
        
    }
    //短信验证
    public function sendSMS()
    {
        $tel = $_POST['mobile'];//手机号
                      
        $c = new TopClient;//大于客户端   
        $c->format = 'json';//设置返回值得类型

        $c->appkey = "24469669";//阿里大于注册应用的key

        $c->secretKey = "df2f9fc4e72686d46995fc670cd8f718";//注册的secretkey
                                                           
        //请求对象，需要配置请求的参数   
        $req = new AlibabaAliqinFcSmsNumSendRequest;
        $req->setExtend("123456");//公共回传参数，可以不传
        $req->setSmsType("normal");//短信类型，传入值请填写normal
        
        //签名，阿里大于-控制中心-验证码--配置签名 中配置的签名，必须填
        $req->setSmsFreeSignName("王聪");
        
        //你在短信中显示的验证码，这个要保存下来用于验证
        $num = rand(100000,999999);
        $_SESSION['smscode'] = $num;
        //var_dump($num);
        //var_dump($_SESSION['smscode']);

        //短信模板变量，传参规则{"key":"value"}，key的名字须和申请模板中的变量名一致，传参时需传入{"code":"1234","product":"alidayu"}
        $req->setSmsParam("{\"number\":\"$num\"}");//模板参数
                                                   
        //短信接收号码。
         $req->setRecNum($tel);

        //短信模板。阿里大于-控制中心-验证码--配置短信模板 必须填
        $req->setSmsTemplateCode("SMS_71665053");
        $resp = $c->execute($req);//发送请求
       return $resp;
        
    }
}