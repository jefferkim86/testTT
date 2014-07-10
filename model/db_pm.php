<?php
/////////////////////////////////////////////////////////////////
//云边开源轻博, Copyright (C)   2010 - 2011  qing.thinksaas.cn 
//EMAIL:nxfte@qq.com QQ:234027573                              
//$Id: db_pm.php 698 2012-05-29 16:08:42Z anythink $ 

class db_pm extends spModel  
{  
	var $pk = "id"; 
	var $table = "pm";
	


	/*获取我的pmlist*/
	function pmlist($uid,$page=1)
	{
	//从2个部分，第一部分只查未读， 第二个sql查找列表
	
		$data = array();
		$column = 'p.id,p.uid,p.touid,m.username as tousername, m.domain as todoman,sum( isnew ) AS isnew,p.num as pmnum,p.info,p.time';
		//已读
		$sql = "SELECT $column FROM `".DBPRE."pm` AS p LEFT JOIN `".DBPRE."member` AS m ON p.uid = m.uid 
				WHERE p.touid = '$uid' and status != '$uid'  GROUP BY p.uid ORDER BY p.isnew desc ,p.time desc ";
		$data['data'] = $this->spPager($page,10)->findSql($sql);
		$data['page'] = $this->spPager()->getPager();
		return $data;
	}
	
	function pminfo($uid,$touid,$args){
		$data = array();
		$page = isset($args['page']) ? $args['page'] : 1;
		$column = 'p.id,p.uid,p.touid,m.username as tousername, m.domain as todoman,p.num as pmnum,p.info,p.time';
		$sql = "SELECT $column FROM `".DBPRE."pm` AS p LEFT JOIN `".DBPRE."member` AS m ON p.uid = m.uid 
				WHERE p.uid = '$uid' and p.touid = $touid or p.uid = '$touid' and p.touid = $uid and (status > '$uid' or status < '$uid') order by p.time desc ";
		$data['data'] = $this->spPager($page,5)->findSql($sql);
		$data['page'] = $this->spPager()->getPager();
		return $data;
	}
	
	function sendpm($uid, $touid, $body){
		$row = array('uid'   => $uid,
					 'touid' => $touid,
					 'isnew' => 1,
					 'info'  => $body,
					 'time'  => time()
		);
		$this->create($row);
		$num = $this->findCount(array('uid'=>$uid,'touid'=>$touid));
		$this->update(array('uid'=>$uid,'touid'=>$touid),array('num'=>$num));
		return true;
	}
	
	function delpm($uid,$id)
	{
		$rs = $this->findBy('id',$id);
		if($rs['uid'] == $uid || $rs['touid'] == $uid){
			if($rs['status'] == 0){  //如果没人删除我标记删除
				$this->updateField(array('id'=>$id),'status',$uid);
				return true;
			}else if($rs['status'] != $uid && $rs['status'] !=0){ //如果标记删除人不是我则表示对方标记删除我也删除
				$this->deleteByPk($id);
				return true;
			}else{
				return false;
			}
		}else{
			return true;
		}
	}

	
}
?>