<?php
namespace index\controller;
use index\controller\BaseController;
use index\model\Article;
use index\model\Commit;
use index\model\User;
use csl\framework\Page;


class IndexController extends BaseController
{
	protected $content;
	protected $page;
	protected $commit;
	protected $user;

	
	public function _init()
	{
		$this->content = new Article();
		$this->commit = new Commit();
		$this->user = new User();
		//$this->page = new Page($this->$total,2);

	
	}
	public function index()
	{
		//判断是否是管理员
		if (!empty($_SESSION['username'])) {
			$username = $_SESSION['username'];
			$isAdmin = $this->user->isAdmin($username)[0]; 
			$this->assign('isAdmin', $isAdmin);
		}

		//计算分页
		//1获得总记录数
		$total = $this->content->totalAticle()[0]['count(article_id)'];
		//var_dump($total);
		$abc = new Page($total,2);
		$allPage = $abc->allPage();

		// $first = $allPage['first'];		
		// $next = $allPage['next'];
		// $pre = $allPage['pre'];
		// $last = $allPage['last'];
		//var_dump($allPage);

		$limit = $abc->limit();
		// 	var_dump($limit);
		
		$this->assign('allPage', $allPage);	
		





		//最新文章
		$new = $this->content->newArticle()[0];
		//var_dump($new);
		$this->assign('new',$new);


		$data = $this->content->articleList($limit);
		//var_dump($data);
		$this->assign('data',$data);
		//轮转三条
		$lunzhuan1 = $this->content->lunzhuanList1()[0];
		$lunzhuan2 = $this->content->lunzhuanList2()[0];
		$lunzhuan3 = $this->content->lunzhuanList3()[0];
		//var_dump($lunzhuan1,$lunzhuan2,$lunzhuan3);
		$this->assign('lunzhuan1', $lunzhuan1);
		$this->assign('lunzhuan2', $lunzhuan2);
		$this->assign('lunzhuan3', $lunzhuan3);
		//本周热门 1条
		$besthot = $this->content->besthot()[0];
		$this->assign('besthot',$besthot); 
		//4
		$hot = $this->content->hotList();
		$this->assign('hot', $hot);
		//博主推荐
		$tuijian = $this->content->tuijianList();
		$this->assign('tuijian', $tuijian); 
        //最新评论 
        $newCommit = $this->commit->newCommit();
        $this->assign('newCommit', $newCommit);		
		// var_dump($this);
		//模板名称和当前方法名称一致
		// $this->display('index/index.html',true);
		
		


		$this->display();
	}
	public function shsb()
	{
		//判断是否是管理员
		if (!empty($_SESSION['username'])) {
			$username = $_SESSION['username'];
			$isAdmin = $this->user->isAdmin($username)[0]; 
			$this->assign('isAdmin', $isAdmin);
		}
		//博主推荐
		$tuijian = $this->content->tuijianList();
		$this->assign('tuijian', $tuijian); 
        //最新评论 
        $newCommit = $this->commit->newCommit();
        $this->assign('newCommit', $newCommit);	
		//轮转三条
		$lunzhuan1 = $this->content->lunzhuanList1()[0];
		$lunzhuan2 = $this->content->lunzhuanList2()[0];
		$lunzhuan3 = $this->content->lunzhuanList3()[0];
		//var_dump($lunzhuan1,$lunzhuan2,$lunzhuan3);
		$this->assign('lunzhuan1', $lunzhuan1);
		$this->assign('lunzhuan2', $lunzhuan2);
		$this->assign('lunzhuan3', $lunzhuan3);
		//本周热门 1条
		$besthot = $this->content->besthot()[0];
		$this->assign('besthot',$besthot); 
		//4
		$hot = $this->content->hotList();
		$this->assign('hot', $hot);	
		//最新文章
		$new = $this->content->newArticle()[0];
		//var_dump($new);
		$this->assign('new',$new);
		//计算分页
		//1获得总记录数
		$total = $this->content->totalAticle()[0]['count(article_id)'];
		//var_dump($total);
		$abc = new Page($total,2);
		$allPage = $abc->allPage();

		$limit = $abc->limit();

		$this->assign('allPage', $allPage);	
		$shsb = $this->content->shsb($limit);
		$this->assign('shsb',$shsb);

		$this->display('index/index.html');
	}
	public function jsbk()
	{
		//判断是否是管理员
		if (!empty($_SESSION['username'])) {
			$username = $_SESSION['username'];
			$isAdmin = $this->user->isAdmin($username)[0]; 
			$this->assign('isAdmin', $isAdmin);
		}
		//博主推荐
		$tuijian = $this->content->tuijianList();
		$this->assign('tuijian', $tuijian); 
        //最新评论 
        $newCommit = $this->commit->newCommit();
        $this->assign('newCommit', $newCommit);	
		//轮转三条
		$lunzhuan1 = $this->content->lunzhuanList1()[0];
		$lunzhuan2 = $this->content->lunzhuanList2()[0];
		$lunzhuan3 = $this->content->lunzhuanList3()[0];
		//var_dump($lunzhuan1,$lunzhuan2,$lunzhuan3);
		$this->assign('lunzhuan1', $lunzhuan1);
		$this->assign('lunzhuan2', $lunzhuan2);
		$this->assign('lunzhuan3', $lunzhuan3);
		//本周热门 1条
		$besthot = $this->content->besthot()[0];
		$this->assign('besthot',$besthot); 
		//4
		$hot = $this->content->hotList();
		$this->assign('hot', $hot);	
		//最新文章
		$new = $this->content->newArticle()[0];
		//var_dump($new);
		$this->assign('new',$new);
		//计算分页
		//1获得总记录数
		$total = $this->content->totalAticle()[0]['count(article_id)'];
		//var_dump($total);
		$abc = new Page($total,2);
		$allPage = $abc->allPage();

		$limit = $abc->limit();

		
		$this->assign('allPage', $allPage);	
		$jsbk = $this->content->jsbk($limit);
		$this->assign('jsbk',$jsbk);        	
		$this->display('index/index.html');
	}	
	public function about()
	{
		//判断是否是管理员
		if (!empty($_SESSION['username'])) {
			$username = $_SESSION['username'];
			$isAdmin = $this->user->isAdmin($username)[0]; 
			$this->assign('isAdmin', $isAdmin);
		}
		$tuijian = $this->content->tuijianList();
		$this->assign('tuijian', $tuijian); 
		$this->display();
	}
	public function friendly()
	{
		//判断是否是管理员
		if (!empty($_SESSION['username'])) {
			$username = $_SESSION['username'];
			$isAdmin = $this->user->isAdmin($username)[0]; 
			$this->assign('isAdmin', $isAdmin);
		}
		$tuijian = $this->content->tuijianList();
		$this->assign('tuijian', $tuijian); 
		$this->display();
	}
	
	
}