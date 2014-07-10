<?php

/////////////////////////////////////////////////////////////////
//云边开源轻博, Copyright (C)   2010 - 2011  qing.thinksaas.cn 
//EMAIL:zhangshaomin_1990@126.com QQ:1470506882           

class db_ad_unit extends ybModel
{

    public $pk = "id";
    public $table = "ad_unit";

    /**
     * 编辑广告位
     * @param array $row
     * @param array $condition
     * @return boolean 
     */
    public function editUnit($row, $condition)
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
	
	/*
	 * 获取广告位
     * @return array 	
	*/
	function getUnit(){
		$cache_name = 'adunit';
        if (!spAccess('r', $cache_name)){
            $rs = $this->findAll();
			$result = '';
			foreach($rs as $d){
				$result[$d['id']] = $d;
			}
            spAccess('w', $cache_name, $result, -1); //无限缓存
        }
        return spAccess('r', $cache_name);
	}

    /**
     * 添加广告位
     * @param array $row
     * @return boolean 
     */
    public function addUnit($row)
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

    public function delUnit($condition)
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
