<?php
/////////////////////////////////////////////////////////////////
//云边开源轻博, Copyright (C)   2010 - 2011  qing.thinksaas.cn 
//EMAIL:nxfte@qq.com QQ:234027573                              
//$Id: db_tags_blog.php 1053 2012-06-28 14:13:28Z anythink $ 


class db_tags_blog extends spModel  
{  
	var $pk = 'tagid'; // 主键  
	var $table = 'tags_blog'; // 数据表的名称 
	
	var $linker = array(  
        array(  
             'type' => 'hasone',   // 关联类型，这里是一对一关联  
            'map' => 'category',    // 关联的标识  
             'mapkey' => 'tag', // 本表与对应表关联的字段名  
             'fclass' => 'db_category', // 对应表的类名  
            'fkey' => 'cid',    // 对应表中关联的字段名
			'field'=>'cid,catename,used',//你要限制的字段     
            'enabled' => true     // 启用关联  
        ), 
		  
    );  
	
	

	//获取我的博客tag
	function getMyTag($uid){
		$this->findAll(array('uid'=>$uid));
	}
	
	function createTags($uid,$cid){
		$this->delete(array('uid'=>$uid));
		if(is_array($cid)){
			foreach($cid as $d){
				$this->create(array('tagid'=>$d,'uid'=>$uid));
			}
		}else{
			$this->create(array('tagid'=>$cid,'uid'=>$uid));
		}
	}
	
	//通过系统标签查找用户
	function findUserBytid($args,$uid=0){
		$page = isset($args['page']) ? $args['page']: 1;
		$tid = intval($args['tid']);
		$where = ($tid ==0) ? '': "where t.tagid= '$tid'";
		$column = 'm.uid,m.username,m.blogtag,m.domain,m.local,m.sign,m.num,m.flow,m.logtime,f.uid as isfollow';
		$sql = "SELECT $column FROM ".DBPRE."tags_blog as t 
				LEFT JOIN ".DBPRE."member as m on t.uid = m.uid 
				LEFT JOIN `".DBPRE."follow` AS f ON ( t.uid = f.touid and f.uid = '$uid' )
				$where group by t.uid order by m.logtime desc";
			
		$data['data'] = $this->spPager($page,10)->findSql($sql);

		$data['page'] = $this->spPager()->getPager();
		return $data;
	}

	
}
?>