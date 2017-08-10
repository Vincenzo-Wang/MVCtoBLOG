<?php
/**
 * @Author: anchen
 * @Date:   2017-06-16 17:06:09
 * @Last Modified by:   anchen
 * @Last Modified time: 2017-06-20 14:44:40
 */
namespace index\model;
use csl\framework\Model;
class Article extends Model
{
    public function articleList($limit)
    {
        return $this->field('article_name,article_content,article_id,user_id,article_image,article_time,username')->table('user,article')->where('user_id=uid')->limit($limit)->select();
    }
    public function tuijianList()
    {
        return $this->field('article_content,article_image')->where('article_support = 1')->select();
    }
    public function shsb($limit)
    {
        return $this->field('article_name,article_content,article_id,user_id,article_image,article_time')->where('type_id = 1')->limit($limit)->select();
    }
    public function jsbk($limit)
    {
        return $this->field('article_name,article_content,article_id,user_id,article_image,article_time')->where('type_id=2')->limit($limit)->select();
    }
    public function articleContent($id)
    {
        return $this->field('article_name,article_content,article_id,user_id','article_time,article_image,article_time')->where('article_id='.$id)->select();
    }
    //热门排行
    //1 最热
    public function besthot()
    {
        return $this->field('article_name,article_image,article_id,article_time')->order('article_click desc')->limit('1')->select();
    }

    //2  2-4热
    public function hotList()
    {
        return $this->field('article_name,article_image,article_id,article_time')->limit('2,4')->select();
    }
    //轮转横幅
    
    public function lunzhuanList1()
    {
        return $this->field('article_name,article_image,article_id,article_time')->order('article_up desc')->limit('1')->select();
    }
    public function lunzhuanList2()
    {
        return $this->field('article_name,article_image,article_id,article_time')->order('article_up desc')->limit('2,2')->select();
    }
    public function lunzhuanList3()
    {
        return $this->field('article_name,article_image,article_id,article_time')->order('article_up desc')->limit('3,3')->select();
    }        
    //最新文章
    public function newArticle()
    {
       return $this->field('article_name,article_content,article_id,user_id,article_image,article_time,username')->table('user,article')->where('user_id=uid')->order('article_time desc')->limit('1')->select();
    }
    //分页计算
    public function totalAticle()
    {
        return $this->field('count(article_id)')->select();
    }
}