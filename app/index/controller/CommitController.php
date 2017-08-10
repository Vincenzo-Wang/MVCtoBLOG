<?php
/**
 * @Author: anchen
 * @Date:   2017-06-17 16:42:46
 * @Last Modified by:   anchen
 * @Last Modified time: 2017-06-19 20:35:44
 */
namespace index\controller;
use index\controller\BaseController;
//use index\model\Commit;
use index\model\Article;
use index\model\User;
use index\model\Commit;

class CommitController extends BaseController
{
    //protected $commit;
    protected $content;
    protected $user;
    protected $commit;

    public function _init()
    {
        //$this->commit = new Commit();
        $this->content = new Article();
        $this->user = new User();
        $this->commit = new Commit();

    }
    /**
     * 展示页面
     * @return [type] [description]
     */
    public function commit()
    {
        $id = $_GET['id'];

        $data = $this->content->articleContent($id)[0];
        //var_dump($data);
        $uid = $data['user_id'];//作者id  即收到用户评论id

        $arr = $this->user->userName($uid)[0];
        //var_dump($arr);
        $this->assign('arr', $arr);

        $this->assign('data', $data);
        if (!empty($_SESSION['username'])) {
        $name = $_SESSION['username'];
        //var_dump($name);
        $userInfo = $this->user->userInfo($name)[0];
        //var_dump($userInfo);
        $this->assign('userInfo', $userInfo);
        }


        $commit = $this->commit->commitList($id);
        //var_dump($commit);
        $this->assign('commit', $commit);
        //博主推荐
        $tuijian = $this->content->tuijianList();
        $this->assign('tuijian', $tuijian);
        //最新评论 
        $newCommit = $this->commit->newCommit();
        $this->assign('newCommit', $newCommit);

        $this->display();
    }
    /**
     * 发表评论
     * @return [type] [description]
     */
    public function reply()
    {
        $commit_id = $_POST['commit_id'];//收到评论的文章内容id
        $data = $this->content->articleContent($commit_id)[0];
        $user_id = $data['user_id'];//作者id  即收到用户评论id

        $name = $_SESSION['username'];
        $userInfo = $this->user->userInfo($name)[0];
        $commit_user_id = $userInfo['uid'];

        //var_dump($_POST,$user_id,$commit_user_id);

        $reply = [
            'user_id' => $user_id,
            'commit_id' => $commit_id,
            'commit_user_id' => $commit_user_id,
            'commit_content' => $_POST['commit_content']

        ];
        $data = $this->commit->insertReply($reply);
        if ($data) {
            $this->success('评论成功！');
        } else {
            $this->error('您未登录，请先登录','?m=index&c=user&a=login');
        }
        
    }
}