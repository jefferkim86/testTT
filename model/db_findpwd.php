<?php
/////////////////////////////////////////////////////////////////
//云边开源轻博, Copyright (C)   2010 - 2011  qing.thinksaas.cn 
//EMAIL:nxfte@qq.com QQ:234027573                              
//$Id: db_findpwd.php 730 2012-06-06 13:29:57Z anythink $ 

class db_findpwd extends ybModel  
{  
	var $pk = "uid"; //主键  
	var $table = "findpwd"; // 数据表的名称 
	
	
	
	/*创建token如果不存在或失效*/
	function createToken($uid)
	{
		$row = array('uid'=>$uid,'token'=>md5(randstr(32).time()),'time'=>time(),'mailsend'=>time()+60*30);
		$this->create($row);
		return $row;
	}
	/*更新邮件发送时间*/
	function updateMailsendTime($uid){
		return $this->update(array('uid'=>$uid),array('mailsend'=>time()+60*30));
	}
	
	
	
	/*检查token是否失效*/
	public function checkToken($uid){
		$rs = $this->findBy('uid',$uid);
		if(is_array($rs)){
			$hour = 60*60*24;
			if($rs['time']+$hour < time()) //超过24小时
			{
				$this->deleteByPk($uid);
				return false;
			}else{
				return $rs;
			}
		}else{
			return false;
		}
	}
	/*处理token*/
	public function varyToken($token){
		$rs = $this->findBy('token',$token);
		if(is_array($rs)){
			return $this->checkToken($rs['uid']);
		}else{
			return false;
		}
	}
	
	/*清理使用过的token*/
	public function clearToken($token){
		$this->delete(array('token'=>$token));
	}
	
	
	
	

	
	

}
?>