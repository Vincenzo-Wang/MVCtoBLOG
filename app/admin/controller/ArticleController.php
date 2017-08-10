<?php
/**
 * @Author: anchen
 * @Date:   2017-06-17 09:40:15
 * @Last Modified by:   anchen
 * @Last Modified time: 2017-06-20 19:35:51
 */
namespace admin\controller;
use admin\controller\BaseController;
use admin\model\article;
use admin\model\category;
use admin\model\user;
use admin\model\commit;
use csl\framework\Upload;
use csl\framework\Page;
class ArticleController extends BaseController
{
    protected $article;
    protected $category;
    protected $user;
    protected $commit;
    protected $upload;

    public function _init()
    {
        $this->article = new Article();
        $this->category = new Category();
        $this->user = new User();
        $this->commit = new Commit();
        //$this->upload = new Upload();
        //var_dump($this->article);
    }
    public function article_list()
    {
        //计算分页总数
        //1获得总记录数
        $total = $this->article->totalAticle()[0]['count(article_id)'];
        //var_dump($total);
        $abc = new Page($total,5);
        $allPage = $abc->allPage();


        $limit = $abc->limit();
        //  var_dump($limit);
        
        $this->assign('allPage', $allPage); 

        $data = $this->article->articleList($limit);
        //var_dump($data);
        $this->assign('data',$data);

        //个人信息
        $name = $_SESSION['username'];
        $userInfo = $this->user->userInfo($name)[0];
        $this->assign('userInfo', $userInfo);
        
        $this->display('article/article.html');
    }

    public function update()
    {
        $arr = $this->article->updateArticle()[0];
        //var_dump($arr);
        $this->assign('arr',$arr);
        //个人信息
        $name = $_SESSION['username'];
        $userInfo = $this->user->userInfo($name)[0];
        $this->assign('userInfo', $userInfo);

        //遍历栏目
        $arr2 = $this->category->categoryList();
        $this->assign('arr2',$arr2);
        $this->display('article/update-article.html');
    }
    public function doUpdate()
    {
        //var_dump($_POST);
        //var_dump($_FILES['img']);
        $this->upload = new Upload(['uploadDir'=>'public/upload/','isRandName'=>true]);
        $path = $this->upload->upload('img');
        var_dump($path);
        $arr = $_POST['article_image'] = "$path";
        var_dump($_POST);

        $result = $this->article->doUpdateArticle($_POST);
        var_dump($result);
        if ($result) {
            header('location:'.$_SERVER['HTTP_REFERER']);
        }
    }
    public function add()
    {
        //遍历栏目
        $arr2 = $this->category->categoryList();
        $this->assign('arr2',$arr2);
        //个人信息
        $name = $_SESSION['username'];
        $userInfo = $this->user->userInfo($name)[0];
        $this->assign('userInfo', $userInfo);
        $this->display('article/add-article.html');
    }
    public function doAdd()
    {
        $name = $_SESSION['username'];
        //var_dump($name);
        $user_id = $this->user->userInfo($name)[0]['uid'];
        //var_dump($user_id);

        $ip = $_SERVER["REMOTE_ADDR"];
        
        if ($ip = "::1") {
             $ip = ip2long('127.0.0.1');
        } else {
            $ip = ip2long($ip);
        }
        
        $arr = $_POST['article_ip'] = "$ip";
        $arr = $_POST['user_id'] = "$user_id"; 
        //var_dump($_POST); 
        $result = $this->article->doAddArticle($_POST);
        if ($result) {
            $this->success('发表成功！', '?m=admin&c=article&a=article_list');
        } else {
            $this->error('发表失败','?m=admin&c=article&a=doAdd');
        }
    }
    //评论展示
    public function commitList()
    {
        //计算分页总数
        //1获得总记录数
        $total = $this->commit->totalCommit()[0]['count(cid)'];
        //var_dump($total);
        $xyz = new Page($total,5);
        $allPage = $xyz->allPage();


        $limit = $xyz->limit();
        //  var_dump($limit);
        
        $this->assign('allPage', $allPage); 

        $data = $this->commit->list($limit);
        //var_dump($data);
        $this->assign('data', $data);
        //个人信息
        $name = $_SESSION['username'];
        $userInfo = $this->user->userInfo($name)[0];
        $this->assign('userInfo', $userInfo);
        $this->display('commit/commit.html');
    }
    public function deleteCommit()
    {
        $id = $_GET['cid'];
        //var_dump($id);
        $result = $this->commit->doDelete($id);
        header('location:' . $_SERVER['HTTP_REFERER']);
    }
    public function deleteArticle()
    {
        $id = $_GET['article_id'];
        //var_dump($id);
        $result = $this->article->doDelete($id);
        header('location:' . $_SERVER['HTTP_REFERER']);
    }  
    //板块展示
    public function category()
    {
        //板块遍历
        $arr2 = $this->category->categoryList();
        $this->assign('arr2',$arr2);
        //每个栏目下文章总数
        // $bid = 
        // $count = $this->article->countArticle($bid);
        //个人信息
        $name = $_SESSION['username'];
        $userInfo = $this->user->userInfo($name)[0];
        $this->assign('userInfo', $userInfo);
        $this->display('category/category.html');
    }  
    public function deleteAll()
    {
        //var_dump($_POST);
        $arr = $_POST['checkbox'];
        //var_dump($arr);
        $arr = join(',',$arr);
        //var_dump($arr);
        $res = $this->article->deleteAll($arr);
        //var_dump($res);
        if ($res) {
            $this->success('删除成功');
        } else {
            $this->error('删除失败');
        }
        
    }
    public function deleteAllCommit()
    {
        //var_dump($_POST);
        $arr = $_POST['checkbox'];
        //var_dump($arr);
        $arr = join(',',$arr);
        //var_dump($arr);
        $res = $this->commit->deleteAll($arr);
        //var_dump($res);
        if ($res) {
            $this->success('删除成功');
        } else {
            $this->error('删除失败');
        }
    }

}