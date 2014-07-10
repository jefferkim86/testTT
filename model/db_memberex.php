<?php
/////////////////////////////////////////////////////////////////
//云边开源轻博, Copyright (C)   2010 - 2011  qing.thinksaas.cn 
//EMAIL:nxfte@qq.com QQ:234027573                              
//$Id: db_memberex.php 730 2012-06-06 13:29:57Z anythink $ 

class db_memberex extends ybModel  
{  
	var $pk = "openid"; // 主键
	var $table = "memberex"; // 数据表
	
	var $linker = array(  
        array(  
             'type' => 'hasone',   // 关联类型，这里是一对一关联  
            'map' => 'user',    // 关联的标识  
             'mapkey' => 'uid', // 本表与对应表关联的字段名  
             'fclass' => 'db_member', // 对应表的类名  
            'fkey' => 'uid',    // 对应表中关联的字段名
			'field'=>'uid,username,email,domain,admin',//你要限制的字段     
            'enabled' => true     // 启用关联  
        ), 
		  
    ); 
	
	
	function CancelBind($type,$uid){
		return $this->delete(array('uid'=>$uid),array('types'=>$type));
	}
	
	function findBind($uid){
		$rs = $this->findAll(array('uid'=>$uid));
		$data = array();
		if($rs){
			foreach($rs as $d){
				$data[$d['types']] =$d;
			}
		}
		return $data;
	}
	
}
?>