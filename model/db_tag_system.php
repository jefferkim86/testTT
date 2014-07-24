<?php
/////////////////////////////////////////////////////////////////
//云边开源轻博, Copyright (C)   2010 - 2011  qing.thinksaas.cn 
//EMAIL:nxfte@qq.com QQ:234027573                              
//$Id: db_skins.php 754 2012-06-10 07:57:09Z anythink $ 

class db_tag_system extends ybModel  
{  
	var $pk = "id"; //主键  
	var $table = "tags_system"; // 数据表的名称  
	
	//根据tagneme或者tag Id返回内容
	function findTagByAttr($args,$uid){
		$data = array();
		if($args['tag'] && $args['tag'] != ''){ //根据参数为名称或id返回
			$where = array('name'=>strreplaces(tagEncodeParse($args['tag'])));
		}else{
			$where = array('id'=>(int) $args['tid']);
		}
		//找到系统标签
		$ret = $this->find($where);
		
		if($ret){
			$data['topic_count'] = $ret['num'];
			$data['currtag'] = $ret['name'];
			$data['currtid'] = $ret['id'];

			$thispage = ($args['page']) ? $args['page'] : 1;
			$result = spClass('db_tags')->spPager($thispage,15)->findAll(array('title'=>$ret['name']));
		
			$blog = array();
			$blogobj = spClass('db_blog');
			if(!empty($result)){
				foreach($result as $d){
					if($ret = $blogobj->spLinker()->find(array('bid'=>$d['bid']))){
						$blog[] = $ret;
					}
				}
				$data['blog'] = $blog;
				$data['page'] = spClass('db_tags')->spPager()->getPager();
				$data['isadd']   = (spClass('db_mytag')->find(array('tagid'=>$data['currtid'],'uid'=>$uid))) ? 1:0; //是否添加
			}
		}
		return $data;
	}
	

	/*重组可供用户选择的系统标签*/
	function Recombination(){
		$sql = "SELECT title,count(title) as num FROM `".DBPRE."tags` group by title";
		$row = $this->findSql($sql);
		//添加或修改
		foreach($row as $d){
			$this->replace(array('name'=>$d['title']),array('num'=>$d['num']));
		}
		
		//删除tag表没有的内容
		$old_row = array();
		foreach($row as $d){
			$old_row[] = $d['title'];
		}
		
		$rs = $this->findAll();
		$new_row = array();
		foreach($rs as $d){
			$new_row[] = $d['name'];
		}
		$diff = array_diff($new_row,$old_row);
		foreach($diff as $d){
			$this->delete(array('name'=>$d));
		}
		return true;
	}

}
?>