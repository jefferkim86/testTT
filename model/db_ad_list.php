<?php

/////////////////////////////////////////////////////////////////
//云边开源轻博, Copyright (C)   2010 - 2011  qing.thinksaas.cn 
//EMAIL:zhangshaomin_1990@126.com QQ:1470506882           

class db_ad_list extends ybModel
{

    public $pk = "adid";
    public $table = "ad_list";

    public function getAccessAds($unit)
    {
        $cache_name = 'Ad_' . $unit;
        if (!spAccess('r', $cache_name)) {
            //组织查询条件
            $condition = array(
                'auid' => $unit,
                'is_show' => true,
            );
            $result = $this->findAll($condition, null, 'adid,title,type,body,ga,url,time_date_limit,weight');
            spAccess('w', $cache_name, $result, -1); //无限缓存
        }
        return spAccess('r', $cache_name);
    }

    public function editList($row, $condition)
    {
        if (!is_array($condition) || !$condition || !is_array($row) || !$row)//为空或者不为数组返回失败
        {
            return false;
        }
       
        return $this->update($condition, $row);
    }

    /**
     * 添加广告
     * @param array $row
     * @return boolean 
     */
    public function addList($row)
    {
        if (!is_array($row) || !$row)//为空或者不为数组返回失败
        {
            return false;
        }
        if ($this->create($row))
        {
            return true; //添加成功
        }
        return false;
    }

    public function delList($condition)
    {
        if (!is_array($condition) || !$condition)
        {
            return false;
        }
        if ($this->delete($condition))
        {
            if (0 < $this->affectedRows())
            {
                return true; //删除成功
            }
        }
        return false;
    }

    //改变是否显示
    public function changeShow($row, $condition)
    {
        if (!is_array($condition) || !$condition || !is_array($row) || !$row)//为空或者不为数组返回失败
        {
            return false;
        }
        if ($this->update($condition, $row))
        {
            if (0 < $this->affectedRows())
            {
                return true; //添加成功
            }
        }
        return false;
    }

}

?>
