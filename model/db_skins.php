<?php
/////////////////////////////////////////////////////////////////
//云边开源轻博, Copyright (C)   2010 - 2011  qing.thinksaas.cn 
//EMAIL:nxfte@qq.com QQ:234027573                              
//$Id: db_skins.php 754 2012-06-10 07:57:09Z anythink $ 

class db_skins extends ybModel  
{  
	var $pk = "skindir"; //主键  
	var $table = "skins"; // 数据表的名称 
	

	
	//获取主题
	function findTheme(){
		return  $this->findAll(array('open'=>1,'exclusive'=>0),'','id,name,skindir,usenumber');
	}
	
	//获取我的专属主题
	function findExclusive($uid){
		return  $this->findAll(array('open'=>1,'exclusive'=>$uid),'','id,name,skindir,usenumber');
	}
	
	

}
?>