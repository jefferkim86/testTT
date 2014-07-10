<?php

/////////////////////////////////////////////////////////////////
//云边开源轻博, Copyright (C)   2010 - 2011  qing.thinksaas.cn
//EMAIL:zhangshaomin_1990@126.com QQ:1470506882
//邀请模块数据模型
class db_cpage_cate extends ybModel
{

    public $pk = 'id';
    public $table = 'cpage_cate';
    var $linker = array(
        array(
            'type' => 'hasone', //关联类型,这里是一对一
            'map' => 'cpage_body', //关联的标识
            'mapkey' => 'id', //本表于对应表关联的字段名
            'fclass' => 'db_cpage_body', //对应表的类名
            'fkey' => 'cid', //对应表中关联的字段名
            'enabled' => true, ///启用关联
            'field' => 'body'
        )
    );
	
	public function findCate(){
		if(!spAccess('r','custompageCate')){  //读取设置
			$tag = $this->findAll('','orders ASC');
			spAccess('w','custompageCate',$tag,-1);
		}else{
			$tag = spAccess('r','custompageCate');
		}
		return $tag;
	}
	public function findPage($tags){
		$cachename =  'custompage_'.$tags;
		if(!spAccess('r',$cachename)){  //读取设置
			$tag = $this->spLinker()->find(array('tags'=>$tags));
			spAccess('w',$cachename,$tag,-1);
		}else{
			$tag = spAccess('r',$cachename);
		}
		return $tag;
	}

    /**
     * 删除分类
     * @param int $id
     * @return boolean 
     */
    public function deleteCate($id)
    {
        $row = array('id' => $id);
        if ($this->spLinker()->delete($row))
        {
            if (0 < $this->affectedRows())
            {
                return true; //删除成功
            }
        }
        return false;
    }

    /**
     * 添加分类
     * @param array $row
     * @return boolean 
     */
    public function addCate($row)
    {
        if (!is_array($row) || !$row)
            return false;
        if ($this->create($row))
        {
            return true; //添加成功
        }
        return false;
    }

    /**
     * 编辑分类
     * @param array $row
     * @param array $condition
     * @return boolean 
     */
    public function editCate($row, $condition)
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
