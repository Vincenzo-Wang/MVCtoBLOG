<?php
/**
 * @Author: anchen
 * @Date:   2017-06-17 14:38:57
 * @Last Modified by:   anchen
 * @Last Modified time: 2017-06-17 14:40:33
 */
namespace admin\model;
use csl\framework\Model;

class Category extends Model
{
  
    public function categoryList()
    {
        return $this->field('bid,bname')->select();
    }
}