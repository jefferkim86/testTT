<?php
class db_banner extends spModel 
{
	var $pk = "id"; //主键  
	var $table = "banner"; // 数据表的名称 
	function banner_list()
	{
		$list = $this->findAll('','`order`');
		return $list;
	}
	function add_banner($row)
	{
		return $this->create($row);
	}
}
?>