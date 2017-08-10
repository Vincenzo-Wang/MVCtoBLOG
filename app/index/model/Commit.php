<?php
/**
 * @Author: anchen
 * @Date:   2017-06-16 18:00:45
 * @Last Modified by:   anchen
 * @Last Modified time: 2017-06-19 21:47:08
 */
namespace index\model;
use csl\framework\Model;
class Commit extends Model
{
    // public function articleContent()
    // {
    //    return $this->field('article_content,article_id,user_id')->select();
    // }
    public function insertReply($reply)
    {
        return $this->insert($reply);
    }
    public function commitList($id)
    {
        return $this->field('commit_user_id,commit_time,commit_content,username')->table('user,commit')->where('commit_user_id=uid and commit_id='.$id)->select();
    }
    
    public function newCommit()
    {
        return $this->field('commit_user_id,commit_time,commit_content,username')->order('commit_time')->table('user,commit')->where('commit_user_id=uid')->limit('3')->select();
    }
}