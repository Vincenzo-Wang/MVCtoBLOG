<?php
/**
 * @Author: anchen
 * @Date:   2017-06-19 14:59:39
 * @Last Modified by:   anchen
 * @Last Modified time: 2017-06-21 10:29:22
 */
namespace admin\model;
use csl\framework\Model;

class Commit extends Model
{
    public function list($limit)
    {
        return $this->field('commit_time,commit_content,cid,username')->table('user,commit')->where('commit_user_id=uid')->limit($limit)->select();
    }
    public function doDelete($id)
    {
        return $this->where('cid='.$id)->delete();
    }
    public function totalCommit()
    {
        return $this->field('count(cid)')->select();
    }
    public function deleteAll($arr)
    {
        return $this->where('cid in ' . '('. $arr .')')->delete();
    }
}