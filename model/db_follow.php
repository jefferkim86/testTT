<?php
/////////////////////////////////////////////////////////////////
//云边开源轻博, Copyright (C)   2010 - 2011  qing.thinksaas.cn 
//EMAIL:nxfte@qq.com QQ:234027573                              
//$Id: db_follow.php 939 2012-06-20 13:21:08Z anythink $ 

class db_follow extends ybModel  
{  
	var $pk = "id"; // 主键  
	var $table = "follow"; // 数据表的名称 
	var $linker = array(  
        array(  
             'type' => 'hasone',   // 关联类型，这里是一对一关联  
            'map' => 'tome',    // 关联的标识  
             'mapkey' => 'touid', // 本表与对应表关联的字段名  
             'fclass' => 'db_member', // 对应表的类名  
            'fkey' => 'uid',    // 对应表中关联的字段名
			'field'=>'uid,username,domain,sign,blogtag,num,flow',//你要限制的字段     
            'enabled' => true     // 启用关联  
        ), 
        array(  
             'type' => 'hasone',   // 关联类型，这里是一对一关联  
            'map' => 'meto',    // 关联的标识  
             'mapkey' => 'uid', // 本表与对应表关联的字段名  
             'fclass' => 'db_member', // 对应表的类名  
            'fkey' => 'uid',    // 对应表中关联的字段名
			'field'=> 'uid,username,domain,sign,blogtag,num,flow',//你要限制的字段     
            'enabled' => true     // 启用关联  
        ), 
		  
    );
	

	/*进行关注和取消关注的操作 type为设置关注和取消关注   1已关注  2取消关注*/
	function changeFollow($type='link',$foruid,$imuid){
		$link = 0;
		$result = $this->find(array('uid'=>$imuid,'touid'=>$foruid)); //判断我之前关注过没有
		$linker = $this->find(array('uid'=>$foruid,'touid'=>$imuid)); //判断他关注过我没
		if($foruid == $imuid){ return false;}

		if(is_array($result)){
			if($type != 'link'){
				$this->delete(array('uid'=>$imuid,'touid'=>$foruid));  //删除我关注他
				spClass('db_member')->decrField(array('uid'=>$imuid),'flow'); //删除关注统计
				$this->update(array('uid'=>$foruid,'touid'=>$imuid),array('linker'=>0)); //取消关系
				
				return true;
			}
			return true;
		}else{
			$pm = 1;
			if(is_array($linker)){
				$link = 1;
				$pm = 2;//发送跟随pm类型2
				$this->update(array('uid'=>$foruid,'touid'=>$imuid),array('linker'=>1));  //互相关注
			}
			$this->create(array('uid'=>$imuid,'touid'=>$foruid,'linker'=>$link,'time'=>time()));
			spClass('db_member')->incrField(array('uid'=>$imuid),'flow'); //增加回复统计
			spClass('db_notice')->noticeFollow($foruid,$imuid,$pm);//站内发通知
		}
		return true;
	}

	
	//直接创建互相关注,邀请注册使用
	function createTwoFollow($uid,$touid){
		$this->create(array('uid'=>$uid,'touid'=>$touid,'linker'=>1,'time'=>time()));  //互相关注
		$this->create(array('uid'=>$touid,'touid'=>$uid,'linker'=>1,'time'=>time()));  //互相关注
		spClass('db_member')->incrField(array('uid'=>$uid),'flow'); //增加flow统计
		spClass('db_member')->incrField(array('uid'=>$touid),'flow'); //增加flow统计
	}	
	
	//获取跟随的用户
	function getFollowUid($uid,$type='')
	{
		$key = 'myfollow_'.$uid;
		if(!spAccess('r',$key)){  //读取设置
            $uidArr = $this->findAll(array('uid'=>$uid),'','touid');
			if($type == ''){
				if(is_array($uidArr)){
					$str = '';
					foreach($uidArr as $d){
						$str .= $d['touid'].',';
					}
				}
				$str = substr($str,0,-1);
			}else{
				$str  = $uidArr;
			}
            spAccess('w',$key,$str,3600);
        }else{
            $str = spAccess('r',$key);
        }
		return $str;
	}
}
?>