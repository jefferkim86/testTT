<?php
/////////////////////////////////////////////////////////////////
//云边开源轻博, Copyright (C)   2010 - 2011  qing.thinksaas.cn 
//EMAIL:nxfte@qq.com QQ:234027573                              
//$Id: userblog.php 1251 2012-07-09 13:42:11Z anythink $ 

//访问用户博客首页
class login extends top
{
	
	public function __construct(){
		parent::__construct();
		
		
	}

	
	function verify(){
		$url = spUrl('main');
		if($this->uid >0){prient_jump($url);}
		
		if($this->spArgs('email', FALSE, 'post') == '' || $this->spArgs('password', FALSE, 'post') == ''){
			$err['msg'] = '用户名密码不能为空';
			$arr_param['err'] = json_encode($err);
			$this->jump(spUrl('main', null, $arr_param));
		} 
		if($this->yb['loginCodeSwitch'] == 1){
			if(!spClass('spVerifyCode')->verify( $this->spArgs('verifycode'))){
				$err['msg'] = '用验证码不正确';
				$arr_param['err'] = json_encode($err);
				$this->jump(spUrl('main', null, $arr_param));
			}
		}
		
		$user = spClass('db_member');
		$rs = $user->findBy('email',$this->spArgs('email'));
		if(!is_array($rs))		{
			$err['msg'] = '用户名不存在';
			$arr_param['err'] = json_encode($err);
			$this->jump(spUrl('main', null, $arr_param));
		}
		if($rs['open'] == 0) {
			$err['msg'] = '该帐号被限制登录';
			$arr_param['err'] = json_encode($err);
			$this->jump(spUrl('main', null, $arr_param));
		}
		
		$password = password_encode($this->spArgs('password') ,$rs['salt']);
		if($rs['password'] == $password)
		{
			$user->userLogin($rs,$this->spArgs('savename'),$this->spArgs('savename'),$this->spArgs('autologin'));
			$this->jump($url);
		}else{
			$err['msg'] = '用户名密码错误';
			$arr_param['err'] = json_encode($err);
			$this->jump(spUrl('main', null, $arr_param));
		}
	}
	
	function reg(){
		$url = spUrl('main', null, array('tab'=>'reg'));
		$arr_param = array('tab'=>'reg');
		if($this->uid >0){prient_jump(spUrl('main'));}
		if($this->spArgs('email', FALSE, 'post') == '' || $this->spArgs('password', FALSE, 'post') == ''|| $this->spArgs('username', FALSE, 'post') == '') {
			$err['msg'] = '用户名、密码、昵称不能为空';
			$arr_param['err'] = json_encode($err);
			$this->jump(spUrl('main', null, $arr_param));
		}
		if(strlen($this->spArgs('email')) < 5 || strlen($this->spArgs('email')) > 30){
			$err['msg'] = '邮箱必须大于5小于30个字符';
			$arr_param['err'] = json_encode($err);
			$this->jump(spUrl('main', null, $arr_param));
		} 
		if(!validateEmail($this->spArgs('email'))){
			$err['msg'] = '邮箱格式不符合规范';
			$arr_param['err'] = json_encode($err); 
			$this->jump(spUrl('main', null, $arr_param));
		}  
		if(utf8_strlen($this->spArgs('username')) < 2 || utf8_strlen($this->spArgs('username')) > 10) {
			$err['msg'] = '昵称最短为2个字符最长为10个字符';
			$arr_param['err'] = json_encode($err);
			$this->jump(spUrl('main', null, $arr_param));
		}
		if (!validateUsername($this->spArgs('username'))) {
			$err['msg'] = '昵称只允许中英文、数字、减号或“_”';
			$arr_param['err'] = json_encode($err);
			$this->jump(spUrl('main', null, $arr_param));
		}
		if($this->yb['keep_niname'] != ''){
			$arr = explode(',',$this->yb['keep_niname']);
			if(in_array($this->spArgs('username'),$arr)) {
				$err['msg'] = '该昵称被保留或限制';
				$arr_param['err'] = json_encode($err);
				$this->jump(spUrl('main', null, $arr_param));
			}
		}
		if(strlen($this->spArgs('password')) < 6) {
			$err['msg'] = '密码最少6位';
			$arr_param['err'] = json_encode($err);
			$this->jump(spUrl('main', null, $arr_param));
		}
		
//		if (preg_match('/[路口|路囗]+/',$this->spArgs('username'))) {
//			$this->error('test', $url);
//		}
		
		if (count(explode("路口", $this->spArgs('username'))) > 1) {
			$err['msg'] = '昵称中不允许包含路口两个字哦～';
			$arr_param['err'] = json_encode($err);
			$this->jump(spUrl('main', null, $arr_param));
		}
		
		if (count(explode("路囗", $this->spArgs('username'))) > 1) {
			$err['msg'] = '昵称中不允许包含路囗两个字哦～';
			$arr_param['err'] = json_encode($err);
			$this->jump(spUrl('main', null, $arr_param));
		}
		 
		$keep =  $this->yb['keep_email'];
		if($keep != ''){
			$keeparray = explode(',',$keep);
			$emails = explode('@',$all['email']);
			if(in_array($emails[0],$keeparray))
			{
				$err['msg'] = '该邮箱帐号前缀被限制注册';
				$arr_param['err'] = json_encode($err);
				$this->jump(spUrl('main', null, $arr_param));
			}
		}

		if($this->yb['invite_switch'] == 1 || $this->spArgs('invitemode') == 1){
		
			if(!$invite = spClass('db_invite')->chkInviteCode($this->spArgs('invitecode'))){
				$err['msg'] = '邀请码不存在或者已过期';
				$arr_param['err'] = json_encode($err);
				$this->jump(spUrl('main', null, $arr_param));
			}
		}
		
		$result = spClass('db_member')->findBy('email',$this->spArgs('email'));
		if(is_array($result)){
			$err['msg'] = '注册邮箱已经存在,请更换邮箱';
			$arr_param['err'] = json_encode($err);
			$this->jump(spUrl('main', null, $arr_param));
		}
		$result = spClass('db_member')->findBy('username',$this->spArgs('username'));
		if(is_array($result)){
			$err['msg'] = '昵称已经存在,请更换昵称';
			$arr_param['err'] = json_encode($err);
			$this->jump(spUrl('main', null, $arr_param));
		}
		
		if($this->yb['loginCodeSwitch'] == 1){
			if(!spClass('spVerifyCode')->verify( $this->spArgs('verifycode'))){
				$err['msg'] = '验证码不正确';
				$arr_param['err'] = json_encode($err);
				$this->jump(spUrl('main', null, $arr_param));
			}
		}
		//写入注册信息
		$uid = spClass('db_member')->userReg($this->spArgs());
		//写入邀请信息&互相关注
		if($this->yb['invite_switch'] == 1 || $this->spArgs('invitemode') == 1){
			spClass('db_invite')->useInviteCode($invite['inviteCode'],$invite['uid'],$uid);
			spClass('db_follow')->createTwoFollow($invite['uid'],$uid);
		}
		$this->jump(spUrl('main'));
	}

}
