<?php
/////////////////////////////////////////////////////////////////
//云边开源轻博, Copyright (C)   2010 - 2011  qing.thinksaas.cn 
//EMAIL:nxfte@qq.com QQ:234027573                              
//$Id: db_mytag.php 730 2012-06-06 13:29:57Z anythink $ 

//该表是存放了用户保存的tagid 和真正的tag表对应数据，不能删除
class db_mytag extends ybModel  
{  
	var $pk = "id"; //主键  
	var $table = "mytags"; // 数据表的名称 
	
	var $linker = array(  
        array(  
             'type' => 'hasone',   // 关联类型，这里是一对一关联  
            'map' => 'tag',    // 关联的标识  
             'mapkey' => 'tagid', // 本表与对应表关联的字段名  
             'fclass' => 'db_tags', // 对应表的类名  
            'fkey' => 'tid',    // 对应表中关联的字段名
            'enabled' => true     // 启用关联  
        ), 
		  
    );  
	
	/*我喜欢的标签*/
	function myFavaTag($row,$uid)
	{
		$mytag = $this->spLinker()->findAll(array('uid'=>$uid),'','tagid');
		if(is_array($mytag)){
			foreach($mytag as $d){
				$data[] = "'".$d['tag']['title']."'";
			}
			$data = implode(',',$data);
			$sql = "select count(`title`) as count,tid,bid,uid,title  from  `".DBPRE."tags` where title in ($data) group by title order by count desc";
			return spClass('db_tags')->findSql($sql);
		}
		return;
	}
	
	
	/*添加我喜欢的tag*/
	function addTag($tagid,$uid){
		$find = $this->find( array('tagid'=>$tagid,'uid'=>$uid) );
		if($find){
			return true;
		}else{
			$this->create(array('tagid'=>$tagid,'uid'=>$uid));
			return true;
		}
		return false;
	}
	
	function delTag($tid,$uid){
		$this->delete(array('tagid'=>$tid,'uid'=>$uid));
		return true;
	}

}
?>