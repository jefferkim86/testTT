<?php
/////////////////////////////////////////////////////////////////
//云边开源轻博, Copyright (C)   2010 - 2011  qing.thinksaas.cn 
//EMAIL:nxfte@qq.com QQ:234027573                              
//$Id: db_replay.php 904 2012-06-17 13:50:09Z anythink $ 


// 评论发布与管理
class db_replay extends ybModel  
{  
	var $pk = "id"; 
	var $table = "replay"; // 数据表的名称 
	
	var $linker = array(  
        array(  
            'type' => 'hasone',   // 关联类型，这里是一对一关联  
            'map' => 'user',    // 关联的标识  
            'mapkey' => 'uid', // 本表与对应表关联的字段名  
            'fclass' => 'db_member', // 对应表的类名  
            'fkey' => 'uid',    // 对应表中关联的字段名
			'field'=>'uid,username,domain,blogtag',//你要限制的字段     
            'enabled' => true     // 启用关联  
        ), 
		 array(  
             'type' => 'hasone',   // 关联类型，这里是一对一关联  
            'map' => 'blog',    // 关联的标识  
             'mapkey' => 'bid', // 本表与对应表关联的字段名  
             'fclass' => 'db_blog', // 对应表的类名  
            'fkey' => 'bid',    // 对应表中关联的字段名
			'field'=>'bid,title,replaycount,feedcount',//你要限制的字段     
            'enabled' => true     // 启用关联  
        ), 
		 array(  
             'type' => 'hasone',   // 关联类型，这里是一对一关联  
            'map' => 'touid',    // 关联的标识  
             'mapkey' => 'repuid', // 本表与对应表关联的字段名  
             'fclass' => 'db_member', // 对应表的类名  
            'fkey' => 'uid',    // 对应表中关联的字段名
			'field'=>'uid,username,domain,blogtag',//你要限制的字段     
            'enabled' => true     // 启用关联  
        ), 
		 

		  
    );  
	

	/*添加一个回复*/
	function createReplay($row)
	{
		$err =array('err'=>'');
		$msg = strip_tags(strreplaces($row['inputs']));

		$rs = spClass('db_blog')->find(array('bid'=>$row['bid']),'','uid,noreply');
		if(!$rs){$err['err'] = '回复的主题不存在';return $err;}
		if($msg == '') {$err['err'] = '回复的内容不能为空'; return $err;}
		if($rs['noreply'] == 1) { $err['err'] = '该内容作者不允许评论';return $err;}
		
		if( $GLOBALS['YB']['keep_rep'] != '')
		{
			$arr = explode(',', $GLOBALS['YB']['keep_rep']);
			if(in_array($row['inputs'],$arr)) { $err['err'] = '含有敏感字符不允许发布'; return $err;}
		}
		
		if($_SESSION['reply_'.$row['bid']] + 30 > time()){
			$err['err'] = '您的操作过快,请休息半分钟';return $err;
		}
		
		if($row['repuid'] != '')  //如果指定了回复者，则进行处理
		{
			$repuid = $row['repuid'];
		    preg_match('/\@(.*?)\:/', $row['inputs'],$msgs);  //用数组1
			$msga = trim(str_replace('@'.$msgs[1].':','',$row['inputs']));
			$msga = str_replace('#','',$msga);
			if($msga ==''){$err['err'] = '评论不能为空';return $err;}
			$msg = "回复[at=$repuid]@$msgs[1][/at]:".$msga;		
		}

		$parent_key = $this->create(array('bid'=>$row['bid'],'msg'=>$msg,'uid'=>$_SESSION['uid'],'repuid'=>$repuid,'time'=>time()));
		
		if($row['repuid'] != $_SESSION['uid'] && $row['repuid'] != '')
		{
			spClass('db_notice')->noticeReplay(array('foruid'=>$row['repuid'],'bid'=>$row['bid']),'回复了您的博客',$msg);	  //给@发一个通知
			//spClass('db_notice')->noticeReplay(array('foruid'=>$rs['uid'],'bid'=>$row['bid']),'回复了您的博客',$msg);     //给作者发
		}
		
		spClass('db_blog')->incrField(array('bid'=>$row['bid']),'replaycount'); //增加回复统计
		spClass('db_feeds')->replayFeeds($row,$msg,$_SESSION['uid'],$parent_key); //增加回复动态
		$_SESSION['reply_'.$row['bid']] = time();

		
		//$bid = spClass('db_blog')->blogIsMe($row['bid']);  //这个是哪来的..
		return $err;
		
	}
	
	/*删除评论，feed得单独处理*/
	function delReplay($row,$uid)
	{
		$rs = $this->spLinker()->find(array('id'=>$row['id']));
		if($rs['uid'] == $uid || $_SESSION['admin'] == 1){
			$this->deleteByPk($row['id']); //删除回复
			if($rs['blog']['feedcount'] >0 ){ //触发删除动态
				spClass('db_feeds')->delReplayFeed($row['id'],$rs['bid']);
			}
		}
	}
	
	function loginUserHot($num=12){
		$this->linker[2]['enabled'] = false;
		return $this->spLinker()->findAll('','time desc','',$num);
	}
}
?>