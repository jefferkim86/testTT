<?php
/////////////////////////////////////////////////////////////////
//云边开源轻博, Copyright (C)   2010 - 2011  qing.thinksaas.cn 
//EMAIL:nxfte@qq.com QQ:234027573                              
//$Id: user.php 866 2012-06-16 15:45:15Z anythink $ 


//个人设置动作执行
class test extends top
{ 

	function __construct(){  
        parent::__construct(); 
     }  
	
	/*显示我的设置界面*/
	function setting(){
//		$result = spClass('db_member')->searchByUsername('文刀');	
		$result = spClass("db_invite_code")->initInviteCode(10);
		var_dump($result);exit;
	}
		
	/*显示首页界面我关注的*/
	public function forward(){
		$result = spClass("db_blog")->blogrep(57, "tkdkdkdk");
		var_dump($result);exit;	
	}
	
	/*我喜欢的*/
	public function mylikes(){
		$this->mylike_current = 'class="current"';
		$this->display('user_mylikes.html');		
	}
	
	/*显示首页界面我发布的*/
	public function mypost(){
		$this->mypost_current = 'class="current"';
		$this->display('user_mypost.html');	
	}
	
	/*我的回复*/
	public function myreplay(){
		$this->myreply_current = 'class="current"';
		$this->display('user_myreply.html');	
	}

	/*上传头像*/
	function upavatar(){
		$upfile = spClass('uploadFile');
		$upfile->set_filetypes('jpg|png|jpge|bmp');
		$upfile->set_path(APP_PATH.'/avatar');
		$upfile->set_imgresize(false);
		$upfile->set_imgmask(false);
		$upfile->set_dirtype(5); //设置为上传头像
		$upfile->set_diydir($this->uid);  //用户id
		
		$files = $upfile->fileupload();	
		echo $files;
	}
	
	 function taobao()
	{
		$url = "http://hws.m.taobao.com/cache/wdetail/5.0/?id=38678018608";
//		import('htmlDomNode.php');
//		$html = file_get_html($url);
//		$data['title'] =  iconv('GB2312', 'UTF-8',  $html->find('.dtif-h',0)->innertext );
		$result = file_get_contents($url);
		$item = json_decode($result);
		$stack = json_decode($item->data->apiStack['0']->value);
//		print_r($item->data->itemInfoModel->title);
//		print_r($item->data->itemInfoModel->picsPath['0']);
		print_r($stack->data->delivery->deliveryFees);
		print_r($stack->data->itemInfoModel->priceUnits);
		exit;
		if($data['title'] == '' ){ return false; } 
		$data['price'] =  $html->find('#J_StrPrice',0)->innertext;
		if($data['price'] == ''){$html->find('#J_SpanLimitProm',0)->innertext;}
		$data['count'] =   $html->find('.tb-sold-out em',0)->innertext;
		$data['img'] = $html->find('#J_ImgBooth',0)->src;
		$data['type'] = 'taobao';
		$data['url'] = $url;
		var_dump($data);
		//return $data;
	}
}