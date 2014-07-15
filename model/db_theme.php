<?php
/////////////////////////////////////////////////////////////////
//云边开源轻博, Copyright (C)   2010 - 2011  qing.thinksaas.cn 
//EMAIL:nxfte@qq.com QQ:234027573                              
//$Id: db_theme.php 769 2012-06-11 14:13:44Z anythink $ 

class db_theme extends spModel  
{  
	var $pk = "uid"; //主键  
	var $table = "theme"; // 数据表的名称 
	


	
	function getByDomain($domain)
	{
		return spClass('db_member')->find(array('domain'=>$domain),'','uid,username,domain,blogtag,sign,num,flow,likenum,local,logtime');
	}
	
	function getByUid($uid)
	{
		return spClass('db_member')->find(array('uid'=>$uid),'','uid,username,domain,blogtag,sign,num,flow,likenum,local,logtime');
	}
	
	function getByBid($bid)
	{
		$rs = spClass('db_blog')->find(array('bid'=>$bid),'','uid');
		return spClass('db_member')->find(array('uid'=>$rs['uid']),'','uid,username,domain,blogtag,sign,num,flow,likenum,local,logtime');
	}
	
	/*更新扩展字段并删除之前的内容*/
	function updateExtField($uid,$field,$rootpath,$filepath)
	{
		$user = $this->find(array('uid'=>$uid));

		if($user[$field] !=''){
			@unlink($rootpath.$user[$field]);
		}
		
		return $this->replace(array('uid'=>$uid),array($field=>$filepath));
	}
	
	function clearCustom()
	{
		$ext = spExt('aUpload');
		$savedir = $ext['savepath'].'/'.$ext['savedir'].'/theme/';
		$this->updateExtField($_SESSION['uid'],'img1',$savedir,'');
		$this->updateExtField($_SESSION['uid'],'img2',$savedir,'');
		$this->updateExtField($_SESSION['uid'],'img3',$savedir,'');
		$this->updateExtField($_SESSION['uid'],'img4',$savedir,'');
		$this->update(array('uid'=>$_SESSION['uid']),array('config'=>'','css'=>''));

		$_SESSION['customize']['setup'] = '';
		$_SESSION['customize']['css'] = '';
	}
	

}
?>