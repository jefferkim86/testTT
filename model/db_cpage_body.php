<?php

/////////////////////////////////////////////////////////////////
//云边开源轻博, Copyright (C)   2010 - 2011  qing.thinksaas.cn
//EMAIL:zhangshaomin_1990@126.com QQ:1470506882
//邀请模块数据模型
class db_cpage_body extends ybModel
{

    public $pk = 'cid';
    public $table = 'cpage_body';

    /**
     * 添加BODY
     * @param array $row
     * @return boolean
     */
    public function addBody($row)
    {
        if (!is_array($row))
            return false;
        if ($this->findCount(array('cid' => $row['cid'])) == 1)
        {
            if ($this->update(array('cid' => $row['cid']), $row))
            {
                if (0 < $this->affectedRows())
                {
                    return true; //添加成功
                }
            }
        } else
        {

            if ($this->create($row))
            {
                if (0 < $this->affectedRows())
                {
                    return true; //添加成功
                }
            }
        }
        return false;
    }

}

?>
