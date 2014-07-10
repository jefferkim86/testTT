<?php
/////////////////////////////////////////////////////////////////
//云边开源轻博, Copyright (C)   2010 - 2011  qing.thinksaas.cn 
//EMAIL:nxfte@qq.com QQ:234027573                              
//$Id: db_blog.php 1277 2012-07-14 04:00:12Z anythink $ 

class db_blog extends ybModel  
{  
	var $pk = "bid"; //主键  
	var $table = "blog"; // 数据表的名称 
	
	var $linker = array(  
        array(  
             'type' => 'hasone',   // 关联类型，这里是一对一关联  
            'map' => 'user',    // 关联的标识  
             'mapkey' => 'uid', // 本表与对应表关联的字段名  
             'fclass' => 'db_member', // 对应表的类名  
            'fkey' => 'uid',    // 对应表中关联的字段名
			'field'=>'uid,username,domain ',//你要限制的字段     
            'enabled' => true     // 启用关联  
        ), 
		 array(  
             'type' => 'hasone',   // 关联类型，这里是一对一关联  
            'map' => 'islike',    // 关联的标识  
             'mapkey' => 'bid', // 本表与对应表关联的字段名  
             'fclass' => 'db_likes', // 对应表的类名  
            'fkey' => 'bid',    // 对应表中关联的字段名
			//'condition'=>'`uid` = uid',
			//'field'=>'uid',//你要限制的字段     
            'enabled' => true     // 启用关联  
        ), 
		  
    ); 
    
	
	
	//是否登陆,是否按照模型类型察看 暂时没用
	function get_feeds($page=1,$uid=0,$follow=0,$model=0){
		if($uid != 0 && $follow > $this->yb['nofllowuser']){ //查找加好友的用户数
				$pre .= ' and b.uid in (' .spClass('db_follow')->getFollowUid($uid). ')';
		}
		if($model !=0){
			$pre .= ' and type = \''.$model.'\'';
		}
		$sql = "SELECT b.*, k.id AS likeid,m.username,m.domain
				FROM `".DBPRE."blog` AS b LEFT JOIN `".DBPRE."likes` AS k ON ( b.bid = k.bid AND k.uid ='$uid' )
				LEFT JOIN `".DBPRE."member` as m on b.uid = m.uid where b.open = 1 ".$pre .' ORDER BY b.time desc';
		$data = array();
		$data['rs'] = $this->spPager($page,10)->findSql($sql);
		$data['page'] = $this->spPager()->getPager();
		
		foreach($data['rs'] as &$d){
			$d += split_attribute($d['body']);
			$d['h_url']   = goUserHome(array('uid'=>$d['uid'], 'domain'=>$d['domain']));
            $d['h_img']   = avatar(array('uid'=>$d['uid'],'size'=>'middle'));
			$d['b_url']   = goUserBlog(array('bid'=>$d['bid'],'domain'=>$d['domain']));
            $d['tag'] = explode(',',$d['tag']);
			unset($d['body']);
		}
		
		
		
		print_r($data);
	
	
	}
	
	//获取最新的随机图片内容战士
	function recommend_shuffle($type,$num = 50){
		$this->linker[1] = false;
		if($type == 3){
			return $this->spLinker()->findAll(array('type'=>$type),'bid desc','bid,uid,body',$num);
		}else{
			return $this->spLinker()->findAll('','bid desc','title,bid,type,uid,tag,body',$num);
		}
	}
	
    
    
    function delblog($bid,$uid){
        spClass('db_attach')->delbybid($bid);
        spClass('db_blog')->deleteByPk($bid); //删除日志
        spClass('db_member')->decrField(array('uid'=>$uid),'num'); //计数减一
		//下面的由触发器完成		
        //spClass('db_replay')->delete(array('bid'=>$bid));
        //spClass('db_likes')->delete(array('bid'=>$bid));
        //spClass('db_tags')->delbybid($bid);
    }
	
	/*内容转载*/
	function blogrep($bid)
	{
		$rs = $this->spLinker()->find(array('bid'=>$bid));
		if(!$rs) { return -1;}
		if($rs['uid'] == $_SESSION['uid']){return -2;} //自己的
		
		$repto = array('uid'=>$rs['uid'],
					  'username'=>$rs['user']['username'],
					  'domain'  =>$rs['user']['domain'],
					  'time'=>time()
		);
	
		$split = split_attribute($rs['body']);
		
		
		if($split['repto']){	$repto = '[repto]'.serialize($split['repto']).'[/repto]';}else{$repto = '[repto]'.serialize($repto).'[/repto]';}
		if($split['attr']){		$attr = '[attribute]'.serialize($split['attr']).'[/attribute]';}else{$attr = '';}
		$rs['body'] = $repto.$attr.$split['body'];
		$rs['uid'] = $_SESSION['uid'];
		$rs['time'] = time();
		unset($rs['bid'],$rs['hitcount'],$rs['feedcount'],$rs['replaycount'],$rs['noreply'],$rs['top'],$rs['user']);
		if($rs)
		{
			spClass('db_member')->incrField(array('uid'=>$_SESSION['uid']),'num');  //我发布的统计+1
			spClass('db_feeds')->addRep(array('bid'=>$bid),$_SESSION['uid']);
			$this->create($rs);
			return 1;
		}else{
			return -1; //无效的
		}
	}
	
	/*检查博客是不是我的*/
	function blogIsMe($bid)
	{
		return $this->find(array('bid'=>$bid),'','uid');	
	}
	
	/*后台用方法*/
	function lockUser($uid)
	{
		$rs = spClass('db_member')->find(array('uid'=>$uid));
		if($rs['admin'] != 1)
		{
			if($rs['open'] == 1){$open = 0;}else{$open = 1;}
			spClass('db_member')->update(array('uid'=>$uid),array('open'=>$open)); 
		}
	}
	
	
	/*重置密码*/
	function resetPwd($uid,$pwd)
	{
		$rs = spClass('db_member')->find(array('uid'=>$uid));
		if($rs['admin'] != 1)
		{
			$salt = randstr();
			$pwds = password_encode($pwd,$salt);
			$arr['password'] = $pwds;
			$arr['salt'] = $salt;
			if(spClass('db_member')->update(array('uid'=>$uid),$arr)){return true;}
		}
	}
	
	function showVersion()
	{
		return $this->getVersion();
	}
	
	function getSystable()
	{
		return $this->getSystemTable();
	}

}
?>
