<?php
/////////////////////////////////////////////////////////////////
//云边开源轻博, Copyright (C)   2010 - 2011  qing.thinksaas.cn 
//EMAIL:nxfte@qq.com QQ:234027573                              
//$Id: user.php 866 2012-06-16 15:45:15Z anythink $ 


//个人设置动作执行
class user extends top
{ 

	function __construct(){  
        parent::__construct(); 
		if(!$this->uid >0){prient_jump(spUrl('main'));}	
		$this->memberinfo();
     }  
	
	/*显示我的设置界面*/
	function setting(){
		$this->users = spClass('db_member')->find(array('uid'=>$this->uid)); //用户信息
		$this->blogtag = explode(',',$this->users['blogtag']);
		$this->systag = spClass('db_category')->findCate(); //获取系统级别标签
		$this->__parse_mytag($this->user['blogtag']); //获取我的标签
		if($this->yb['openlogin_qq_open'] != 0 || $this->yb['openlogin_weib_open'] != 0){
			$this->bind = spClass('db_memberex')->findBind($this->uid);
		}

		$this->display('user_setting.html');	
	}
		
	/*显示首页界面我关注的*/
	public function myfollow(){
		$this->myfollow_current = 'class="current"';
		$this->getMyFollow();
		$this->display('user_myfollow.html');	
	}
	
	/*我喜欢的*/
	public function mylikes(){
		$this->mylike_current = 'class="current"';
		$this->getMyFollow();
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
	
	public function mymessage() {
		$this->display('user_mymessage.html');
	}
	public function searchUser() {
		$this->display('user_searchUser.html');
	}

	/*上传头像*/
	function upavatar(){
//		$upfile = spClass('uploadFile');
//		$upfile->set_filetypes('jpg|png|jpge|bmp');
//		$upfile->set_path(APP_PATH.'/avatar');
//		$upfile->set_imgresize(false);
//		$upfile->set_imgmask(false);
//		$upfile->set_dirtype(5); //设置为上传头像
//		$upfile->set_diydir($this->uid);  //用户id
		
		$uid = sprintf("%09d", $this->uid);
		$dir1 = substr($uid, 0, 3);
		$dir2 = substr($uid, 3, 2);
		$dir3 = substr($uid, 5, 2);
		$imghd = spClass('image');
		$imghd->image_x = $this->spArgs('x');
		$imghd->image_y = $this->spArgs('y');
		$imghd->image_w = $this->spArgs('w');
		$imghd->image_h = $this->spArgs('h');
		$src = $this->spArgs('src');
		
		$imgarray = @pathinfo($src);
						
		//$dirname = $imgarray['dirname']; //上传目录名称
		$dirname = APP_PATH.'/avatar/' . $dir1.'/'.$dir2.'/'.$dir3;
//		$uid = sprintf("%09d", $imgarray['filename']);
//		$uid = substr($uid, -2);
		$uid = $this->uid;
		$big = 'big_'.$uid.'.jpg'; 
		$middle = 'middle_'.$uid.'.jpg'; 
		$small = 'small_'.$uid.'.jpg';

		$imghd->load($src);
		
		
		$imghd->resizeToWidth(200);
		unlink($dirname.'/'.$big);
		$imghd->save($dirname.'/'.$big);
		
		$imghd->load($src);
		$imghd->square(65);
		unlink($dirname.'/'.$middle);
		$imghd->save($dirname.'/'.$middle);
		
		$imghd->load($src);
		$imghd->square(30);
		unlink($dirname.'/'.$small);
		$imghd->save($dirname.'/'.$small);
		
		unlink($src);
		
		//$files = $upfile->fileupload();	
		//echo $files;
		header('Location: /index.php?c=user&a=setting');
		exit;
	}
}