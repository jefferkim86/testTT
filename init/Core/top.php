<?php
/////////////////////////////////////////////////////////////////
//云边开源轻博, Copyright (C)   2010 - 2011  qing.thinksaas.cn 
//EMAIL:nxfte@qq.com QQ:234027573                              
//$Id: top.php 1188 2012-07-04 13:04:17Z anythink $

class top extends spController
{
	protected $uid = 0;	 //判断是否登录的状态(controller) smarty里用 $user.uid > 0

    function __construct(){  
		parent::__construct(); 
		$this->checkLogin();
		$this->yb = $GLOBALS['YB'];
		if(!spAccess('r','ybmodel')){  //读取设置
            $this->mconfig = spClass('db_models')->getModel();
            spAccess('w','ybmodel',$mconfig,-1);
        }else{
            $this->mconfig =  spAccess('r','ybmodel');
        }
		
		$this->custompage_cate = spClass('db_cpage_cate')->findCate();
		$this->adunit = spClass('db_ad_unit')->getUnit();
    }
	
	//检查并设置登录状态
	function checkLogin()
	{
		if(!isset($_SESSION['uid']) || $_SESSION['uid'] == '')
		{
			if($rs = spClass('db_member')->authLogin(spClass('ybCookie')->get_cookie('sid'),spClass('ybCookie')->get_cookie('auth'))){
				$this->uid = $rs['uid'];
				$_SESSION['uid']      = $rs['uid'];
				$_SESSION['email']    = $rs['email'];
				$_SESSION['domain']   = $rs['domain'];
				$_SESSION['username'] = $rs['username'];
				$_SESSION['admin']    = $rs['admin'];
				$_SESSION['user']     = $rs;
			}else{
				$this->uid = 0;
				$_SESSION['uid'] = '';
			}
		}else{
			$this->uid = $_SESSION['uid'];
		}
	}
	 
	/*调用基本信息及通知信息*/
	protected function memberinfo()
	{
		if(islogin()){
			$this->user = spClass('db_member')->find(array('uid'=>$this->uid)); //用户信息
			$this->local = explode('市',$this->user['local']);
			$this->myLook = spClass('db_follow')->findCount(array('touid'=>$this->uid));
			
			$this->favatag = spClass('db_mytag')->myFavaTag($this->spArgs(),$this->uid); //显示收藏标签
		}
		
	}
	
	public function getMyFollow(){
		$data = array();
		$sql = "SELECT f.id as fid, f.time as ftime, touid, f.linker as linker, f.uid as fuid , m.*
				FROM `".DBPRE."follow` AS f
				LEFT JOIN `".DBPRE."member` AS m ON f.touid = m.uid WHERE f.uid = ".$this->uid;
		
		$obj = spClass('db_follow');
		$obj->linker['0']['enabled'] = false;
		$sql .= " order by ftime DESC limit 0, 6";
//		print_r($sql);
		$myfollow = $obj->spLinker()->findSql($sql);
		

		
		foreach($myfollow as &$d){
			
			$d['h_url'] = goUserHome(array('uid'=>$d['touid'], 'domain'=>$d['domain']));
			$d['h_img'] = avatar(array('uid'=>$d['touid'],'size'=>'middle'));
			$d['sign'] = strip_tags($d['sign']);
			$d['blogtag'] = ($d['blogtag'] != '') ?  explode(',',$d['blogtag']) : '';
//				$d['touid'] =  $tudo;
//				unset($tudo,$d['touid']['domain']);
			$d['time'] = ybtime(array('time'=>$d['ftime']));
			if($d['linker'] == 1){
				$d['linker'] = true;
			}else{
				$d['linker'] = false;
			}
		}
		$this->myfollow = $myfollow;
	}
	
	
	/*处理信息tag user.c and  add.c used*/
	protected function __parse_mytag($mytag){
		if($mytag != ''){
			$mytag = explode(',',$mytag);
			if(is_array($mytag)){ $this->myTag = $mytag; }
		}
	}
	
	//处理内容中的AT
	protected function parse_uid($info){
		preg_match("/\[at=(.*?)](.*?)\[\/at\]/i",$info,$msg); //print_r($msg);
//		return str_replace($msg[0],$msg[2],$info);
		
		return str_replace($msg[0],'<a href="'.goUserHome(array('uid'=>$msg[1])).'" target="_blank">'.$msg[2].'</a>',$info);
	}
    
	
	/*无提示跳转*/
	public function jslocation($x){
		exit('<script language="javascript" type="text/javascript"> parent.window.location.href="'.$x.'";</script>');
	}
	
	/*需要登录*/
	protected function needLogin(){
		if(0 == $this->uid)
		{
			$this->api_error('您需要登录才能继续操作');
		}
	}
	
	protected function api_success($body){
		echo json_encode( array('status'=>1,'msg'=>'', 'body'=>$body) );
		exit;
	}
	
	protected function api_error($msg){
		echo json_encode( array('status'=>0,'msg'=>$msg, 'body'=>'') );
		exit;
	}	
}

?>
