<?php
/////////////////////////////////////////////////////////////////
//云边开源轻博, Copyright (C)   2010 - 2011  qing.thinksaas.cn
//EMAIL:nxfte@qq.com QQ:234027573
//$Id: db_member.php 1188 2012-07-04 13:04:17Z anythink $

class db_member extends ybModel
{


	var $pk = "uid"; // 主键
	var $table = "member"; // 数据表的名称
	
	var $addrules = array(  
		'isused' => array('db_member','checkname'), //  检查用户是否重复
		'isverifcode' => array('db_member','checkverifycode'), //检查验证马是否输入正确
		'checklogin' => array('db_member','checklogin'), //检查验证马是否输入正确
		'isopen'     => array('db_member','noopen'),     //检查是否允许登录
		'keepmail'   => array('db_member','keepmail'),   //检查是否被限制
		'ninameused' => array('db_member','ninameused'), //检查昵称是否使用
		
	);
	
	//连接登陆的验证 没有验证码的
	var $verifier_openConnect_Login  = array(  
       "rules" => array( 
           'email' => array(  
               'notnull' => TRUE, // username不能为空  
               'minlength' => 5,  // username长度不能小于5  
               'maxlength' => 50, // username长度不能大于 
			  'email' => TRUE,
			  'isopen'    =>true, //是否被禁用
             ),  
           'password' => array(   
               'notnull' => TRUE, 
               'minlength' => 6, 
			   'checklogin' => TRUE
            ),  
        ),  
	   "messages" => array( // 提示信息  
             'email' => array(  
              'notnull' => "邮箱不能为空",  
              'minlength' => "邮箱不能少于5个字符", 
              'maxlength' => "邮箱不能大于50个字符",  
			  'email'=>'请输入正确的邮箱',
			  'isopen'    =>'账号被限制访问',
            ), 
			  'password' => array(  
              'notnull' => "密码不能为空",  
              'minlength' => "密码不能少于6个字符",
			  'checklogin' => '用户名密码不正确'				  
            ) 
     )  
    );
	
	var $verifier_openConnect_Reg  = array(  
       "rules" => array( 
           'email' => array(  
               'notnull' => TRUE, // username不能为空  
               'minlength' => 5,  // username长度不能小于5  
               'maxlength' => 50, // username长度不能大于 
			   'email' => TRUE,
			   'keepmail'=>TRUE,
			   'isused' => 'email', //如果真重复了
             ),  
           'password' => array(   
               'notnull' => TRUE, 
               'minlength' => 6, 
            ),
			'username'=>array(
			 'minlength' => 2,  // username长度不能小于2  
			 'maxlength' => 10, // username长度不能大于 
		     'ninameused' => TRUE,
			),
		    'password2' => array(  
              'equalto' => 'password',   
            ),  
			
        ),  
	   "messages" => array( // 提示信息  
            'email' => array(  
                 'notnull' => "注册邮箱不能为空",  
                'minlength' => "注册邮箱不能少于5个字符", 
                 'maxlength' => "注册邮箱不能大于50个字符",  
				 'email'=>'请输入正确的邮箱',
				 'keepmail'=>'该邮箱被限制使用请更换',
				 'isused'=>'注册邮箱已经存在,试试绑定?',
            ),  
			'username'=>array(
				 'minlength' => '昵称不能小于2个字',  // username长度不能小于5  
				 'maxlength' => '昵称不能超过10个字', // username长度不能大于 
				 'ninameused' => '昵称已被使用请更换',
			),
			  'password' => array(  
                 'notnull' => "密码不能为空",  
                'minlength' => "密码不能少于5个字符",  
            ),  
			   'password2' => array(  
              'equalto' => '两次密码输入不正确',
			),  
		),
	);	

 


	/*用户注册*/
	function userReg($row)
	{
		$ip = $this->getIP();
		$salt = randstr();
		$password = password_encode($row['password'],$salt);
		$arr = array('password' => $password,
					 'salt' =>$salt,
					 'regtime'=> time(),
					 'regip'=>$ip,
					 'local'=>$this->ip2name($ip)
			    );
		$row = array_merge($row,$arr);
		$uid = $this->create($row);
		$_SESSION['uid'] = $uid;
		$_SESSION['email'] = $row['email'];
		$_SESSION['domain'] = false;
		$_SESSION['username'] = $row['username'];
		$_SESSION['firstuid'] = true;  //第一次访问
		$logintime = 24*60*60;
		spClass('ybCookie')->set_cookie('sid',$uid);
		spClass('ybCookie')->set_cookie('auth',$password);
		
		spClass('db_notice')->sendRegisgtr($uid);
		return $uid;
	}
	
	function userLogin($result,$savename=false,$autologin=false)
	{
		spClass('ybCookie')->set_cookie('sid',$result['uid'],$autologin);
		spClass('ybCookie')->set_cookie('auth',$result['password'],$autologin);
		$_SESSION['uid']      = $result['uid'];
		$_SESSION['email']    = $result['email'];
		$_SESSION['domain']   = $result['domain'];
		$_SESSION['username'] = $result['username'];
		$_SESSION['admin']    = $result['admin'];
		$_SESSION['user']     = $result;
		$ip = $this->getIP();
		if($savename == 1)
		{
			spClass('ybCookie')->set_cookie('unames',$result['email'],1);
		}else{
			spClass('ybCookie')->set_cookie('unames','');
		}
		$local = $this->ip2name($ip);
		return $this->update(array('uid'=>$result['uid']),array('logtime'=>time(),'logip'=>$ip,'local'=>$local));
	}
	
	/*修改密码用户id 新密码*/
	function changePwd($uid,$newpwd)
	{
		$salt = randstr();
		$password = password_encode($newpwd,$salt);
		$row = array('password' => $password, 'salt' =>$salt );	
		$this->update(array('uid'=>$uid),$row);
		if(1 >= $this->affectedRows() ){
			return true;
		}
		return false;		
	}
    
    /*获取推荐用户列表*/
    function recommend()
    {
       $rs =  $this->findAll('','num desc','uid,username,domain,blogtag,sign',100);
       foreach($rs as &$d){
           $d['h_url']   = goUserHome(array('uid'=>$d['uid'], 'domain'=>$d['domain']));
           $d['h_img']   = avatar(array('uid'=>$d['uid'],'size'=>'middle'));
           $d['blogtag'] = array_shift(explode(',',$d['blogtag']));
           $d['sign']    = strip_tags($d['sign']);
       }
       return $rs;
    }









	/*获取所有活动的扩展登陆信息*/
	function _getActionToken($uid)
	{
		$rs = spClass('db_memberex')->spLinker()->findAll(array('uid'=>$uid));
		foreach($rs as $d)
		{
			$_SESSION['openconnect'][$d['types']]['openid'] = $d['openid'];
			$_SESSION['openconnect'][$d['types']]['token'] = $d['token'];
			$_SESSION['openconnect'][$d['types']]['secret'] = $d['secret'];
		}
	}
	
	
	/*判断登录状态并写入登录信息*/
	function authLogin($uid,$pwd)
	{
		if(empty($uid) || empty($pwd)) return false;
		if($uid == $pwd) return false;
		$rs = $this->findBy('uid',$uid);
		if($rs['password'] == $pwd)
		{
			$this->update(array('uid'=>$result['uid']),array('logtime'=>time()));
			unset($rs['password'],$rs['salt']);
			return $rs;
		}else{
			return false;
		}
	}
	
	/*注册验证是否重名*/
	function checkname($val,$right)
	{
		$result = $this->findBy('email',$val);
		if(is_array($result))
		{
			return FALSE;	
		}else{
			return TRUE;	
		}
	}
	/*注册昵称是否重复*/
	function ninameused($val,$right,$all)
	{
		$result = $this->findBy('username',$all['username']);
		if(is_array($result))
		{
			return FALSE;
		}else{
			return TRUE;
		}
	}
	
	/*检测限制账号*/
	function keepmail($val,$right,$all)
	{
		$keep =  $GLOBALS['YB']['keep_email'];
		if($keep != '')
		{
			$keeparray = explode(',',$keep);
			$emails = explode('@',$all['email']);
			if(in_array($emails[0],$keeparray))
			{
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	
	/*检查账号是否被禁用*/
	function noopen($val,$right,$all)
	{
		$result = $this->findBy('email',$all['email']);
		if($result['open'] == 0)
		{
			return false;	
		}else{
			return true;	
		}
	
	}
	
	/*检查用户名密码是否正确*/
	function checklogin($val,$right,$all)
	{
		$result = $this->findBy('email',$all['email']);
		if($all['email'] == '' || $all['password'] == ''){return false;}
		$password = password_encode($all['password'],$result['salt']);
		if($result['password'] == $password)
		{
			$ip = getIP();
			$_SESSION['uid'] = $result['uid'];
			$_SESSION['email'] = $result['email'];
			$_SESSION['domain'] = $result['domain'];
			$_SESSION['username'] = $result['username'];
			$_SESSION['admin'] = $result['admin'];
			if($all['savename'] == 1){setcookie('unames',$result['email'],time()+60*60*24*30,'/');}else{setcookie('unames',$result['email'],time()-60*60*24*30,'/');}
			
			$local = ip2name($ip);
			$this->update(array('uid'=>$result['uid']),array('logtime'=>time(),'logip'=>$ip,'local'=>$local));
			$this->_getActionToken($result['uid']);
			return true;
		}else{
			return false;	
		}
	}
	
	/*注册checkverifycode是否正确*/
	function checkverifycode($val,$right,$all)
	{
	  $vcode = spClass('spVerifyCode');
	  if($vcode->verify($all['verifycode'])) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function ip2name($ip)
	{
		$url = "http://www.youdao.com/smartresult-xml/search.s?type=ip&q=".$ip;
		$doc = new DOMDocument();
		$doc->load($url);
		$smartresult = $doc->getElementsByTagName("product");
		foreach($smartresult as $product)
		{
			$locations = $product->getElementsByTagName("location");
			$location = $locations->item(0)->nodeValue;
		}

		if($location != "")
		{
			$local = explode(' ',$location);
			return $local[0];
		}else{
			return '火星';
		}
	}

	public function getIP() {
		return $_SERVER['REMOTE_ADDR'];
	}

}
?>
