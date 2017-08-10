<?php
/**
 * @Author: anchen
 * @Date:   2017-06-17 09:40:42
 * @Last Modified by:   anchen
 * @Last Modified time: 2017-06-20 17:57:40
 */
namespace admin\model;
use csl\framework\Model;

class Article extends Model
{
    public function articleList($limit)
    {
        return $this->field('article_name,article_id,type_id,article_time')->limit($limit)->select();
    }
    public function updateArticle()
    {
        $id = $_GET['article_id'];
        //var_dump($id);
        return $this->field('article_name,article_content,type_id,article_image')->where("article_id = $id")->select();
    }
    public function doUpdateArticle($post)
    {
        //var_dump($post);
        return $this->where('article_id='.$post['id'])->update($post);
    }
    public function doAddArticle($arr)
    {
        return $this->insert($arr);

    }
    public function doDelete($id)
    {
        //var_dump($id);
        return $this->where('article_id='.$id)->delete();
    }
    //栏目管理
    public function countArticle($bid)
    {
        return $this->where('type_id='.$bid)->select();
    }
    //分页计算
    public function totalAticle()
    {
        return $this->field('count(article_id)')->select();
    }
    //
    public function deleteAll($arr)
    {
        return $this->where('article_id in ' . '('. $arr .')')->delete();
    }
}