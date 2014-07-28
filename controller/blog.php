<?php
/////////////////////////////////////////////////////////////////
//云边开源轻博, Copyright (C)   2010 - 2011  qing.thinksaas.cn 
//EMAIL:nxfte@qq.com QQ:234027573                              
//$Id: blog.php 1334 2012-08-06 14:25:25Z anythink $ 


//博客动作执行
class blog extends top
{

	public function tag(){
		$this->favatag = spClass('db_mytag')->myFavaTag($this->spArgs(),$this->uid); //显示收藏标签
		$this->tag = addslashes($this->spArgs('tag'));
		$this->tid = intval($this->spArgs('tid'));
		$this->display('tag_index.html');
	}
	
	/*重建标签crontab*/
	public function rebuildtag(){
		echo spClass('db_tag_system')->Recombination();
	}

	


	
	/*获取本地歌曲*/
	function getmusic()
	{
		$result = spClass('db_attach')->findBy($this->spArgs('id'));
		if(is_array($result))
		{
			$head = fopen($result['path'],'r');
			$output = fread($head, filesize($result['path']));
			echo $output;
		}	
	}
	
	/*搞定音乐台的图片*/
	function getyytimg()
	{
		$url = $this->spArgs('src');
		if(strpos($this->spArgs('src'),'yyt') || strpos($this->spArgs('src'),'yinyuetai')){
			echo spClass('urlParse')->getRefereData($url,'http://www.yinyuetai.com/');exit;
		}
		header("HTTP/1.1 404 Not Found");exit;
	}
	
	

	
	/*通知已读*/
	function readnotice()
	{
		if($this->uid ==0){exit('您的登录已经超时请重新登录');}	
		echo spClass('db_notice')->update(array('uid'=>$this->uid,'id'=>$this->spArgs('id')),array('isread'=>1));
	}
	
	/*通知删除*/
	function delnotice()
	{
		if($this->uid ==0){exit('您的登录已经超时请重新登录');}	
		$id = intval($this->spArgs('id'));
		$rs = spClass('db_notice')->find(array('id'=>$id));
		if($rs['uid'] == $this->uid || $rs['foruid'] == $this->uid)
		echo spClass('db_notice')->delete( array('id'=>$id) );
	}
	

	function tuijian()
	{
		if($this->uid ==0){exit('您的登录已经超时请重新登录');}	
		if($this->spArgs('submit'))
		{
			$return = spClass('db_recommend')->createTuijian($this->spArgs());
			if($return == -1){$this->err = '不存在的用户或id';}
			if($return == -2){	$this->err = '请填写推荐理由';}
			if($return == -3){	$this->err = '请选择系统分类';}
			if($this->err == '') { exit('<script>parent.tuijianok();</script>');}
		}
		
		$this->cate = spClass('db_category')->findCate();
		$this->bid = $this->spArgs('bid');
		$this->tuiuid = $this->spArgs('tuiuid');
		$this->display('tuijian.html');
	}
	
	

	
	

	

}