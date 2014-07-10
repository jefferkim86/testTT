<?php
/////////////////////////////////////////////////////////////////
//云边开源轻博, Copyright (C)   2010 - 2011  qing.thinksaas.cn 
//EMAIL:nxfte@qq.com QQ:234027573                              
//$Id: blog.php 772 2012-06-12 14:20:42Z anythink $ 


//博客动作执行
class invite extends top
{

	function index(){
		
		
	}
	
	function myintval(){
		if(!$this->uid >0){prient_jump(spUrl('main'));}	
		$this->memberinfo();
		
		$this->display('user_invite.html');
	
	}
	
	

	

}