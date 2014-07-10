<?php
/////////////////////////////////////////////////////////////////
//云边开源轻博, Copyright (C)   2010 - 2011  qing.thinksaas.cn 
//EMAIL:nxfte@qq.com QQ:234027573                              
//$Id: db_tags.php 1334 2012-08-06 14:25:25Z anythink $ 

class db_tags extends ybModel  
{  
	var $pk = "tid"; //主键  
	var $table = "tags"; // 数据表的名称 
	/*
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
             'type' => 'findTagByAttr',   // 关联类型，这里是一对一关联  
            'map' => 'user',    // 关联的标识  
             'mapkey' => 't.uid', // 本表与对应表关联的字段名  
             'fclass' => 'db_member', // 对应表的类名  
            'fkey' => 'uid',    // 对应表中关联的字段名
			'field'=>'uid,username,domain ',//你要限制的字段     
            'enabled' => true     // 启用关联  
        ), 
		  
    );  
	*/
    
    //对tag进行差异处理
	function tagCreate($tag,$bid,$uid){
		$rs = $this->findAll(array('bid'=>$bid),'','title');
		$old_tag = $oldtagtitle = array();
		//获取已有的tag
		foreach($rs as $d){
			$old_tag[] = $d['title'];
		}
        $now_tag = explode(',',$tag);

		$ready_del = array_diff($old_tag,$now_tag); //要删除的
		$ready_add = array_diff($now_tag,$old_tag); //要添加的


		
		if(!empty($ready_del)){
			foreach($ready_del as $d){
				$this->delete(array('title'=>$d, 'bid'=>$bid, 'uid'=>$uid));
			}
		}
		if(!empty($ready_add)){
			  foreach($ready_add as $d){
					if($d != ''){
						if(!$this->find(array('title'=>$d, 'bid'=>$bid, 'uid'=>$uid))){
							$this->create(array('title'=>$d, 'bid'=>$bid, 'uid'=>$uid));
						}
					}
				}
           }
	}
	
	function cleantag(){
		$sql = "SELECT b.uid,t.tid FROM `".DBPRE."tags` AS t LEFT JOIN `".DBPRE."blog` AS b ON t.bid = b.bid";
$rs = $this->findSql($sql);
		foreach($rs as $d){
			if($d['uid'] == ''){
				$this->delete(array('tid'=>$d['tid']));
			}
		}
	}
	
	
	/*发现频道的tag*/
	function discoverTag($num=30){
		$cachename = 'discoverTag_'.$num;
		if(!spAccess('r',$cachename)){  //读取设置
			$sql = "SELECT count(t.title) as hit ,t.uid,t.title,t.bid FROM `".DBPRE."tags` as t
				GROUP BY t.title order by hit desc LIMIT $num";
			$rs = $this->findSql($sql);
			foreach($rs as &$d){
				$d['ulist'] = $this->findTagHotUser($d['title']);
			}
			spAccess('w',$cachename,$rs,86400); //一天
		}else{
			$rs =  spAccess('r',$cachename);
		}
		return $rs;
	}
	
	
	
	//根据tagneme或者tag Id返回内容
	function findTagByAttr($args,$uid){
		$data = array();
		if($args['tag'] && $args['tag'] != ''){ //根据参数为名称或id返回
			$where = 't.`title` like '.$this->escape('%'.strreplaces(tagEncodeParse($args['tag'])).'%'); 
			$group = 'group by t.bid';
			$data['currtag'] = tagEncodeParse($args['tag']);
			$data['topic_count']   = $this->findCount(array('title'=>$data['currtag'])); //有多少人话题
		}else{
			$where ='t.tid = '.$this->escape(intval($args['tid']));
			$group = '';
			$data['currtag'] = array_pop( $this->find(array('tid'=>$args['tid']),'','title'));
			$data['topic_count']   = $this->findCount(array('title'=>$data['currtag']));
		}
		$colunm = 'b.*,t.title as tagtitle,u.username,u.domain,t.tid';
		$sql = "SELECT $colunm FROM `".DBPRE."tags` as t 
				left join `".DBPRE."blog` as b on t.bid=b.bid 
				left join `".DBPRE."member` as u on t.uid=u.uid 
				WHERE $where and b.open = 1 $group order by b.time desc"; 
		$thispage = ($args['page']) ? $args['page'] : 1;
	
		//if(spAccess)
		$data['blog'] = $this->spPager($thispage,15)->findSql($sql,'tid desc');
		if($data['blog']) $data['currtid'] = $data['blog'][0]['tid'];
		$data['isadd']   = (spClass('db_mytag')->find(array('tagid'=>$data['currtid'],'uid'=>$uid),'tagid desc')) ? 1:0; //是否添加
		$data['page'] = $this->spPager()->getPager();
		return $data;
	}
	
	/*显示某个用户在某个标签的热度排序*/
	function findTagHotUser($tagname,$limit =10){
		$cachename = 'findTagHotUser_'.md5($tagname);
		if(!spAccess('r',$cachename)){  //读取设置
			$sql = "SELECT count(t.uid) as hit ,t.uid,t.title,t.bid,m.username,m.domain FROM `".DBPRE."tags` as t
				left join ".DBPRE."member as m on t.uid = m.uid WHERE t.title = ".$this->escape(tagEncodeParse($tagname))."
				GROUP BY t.uid order by hit desc LIMIT $limit";
			$data = $this->findSql($sql);
			spAccess('w',$cachename,$data,86400); //一天
		}else{
			$data =  spAccess('r',$cachename);
		}
		return $data;
	}
	
	/*显示某个用户使用次数多的标签*/
	function findeUserTag($uid,$num=10){
		$cachename = 'findeUserTag_'.$uid;
		if(!spAccess('r',$cachename)){  //读取设置
			$sql = "SELECT count(*) as count ,tid,uid,title FROM  `".DBPRE."tags` where uid = $uid group by title order by count desc limit $num ";
			$data = $this->findSql($sql);
			spAccess('w',$cachename,$data,86400); //一天
		}else{
			$data =  spAccess('r',$cachename);
		}
		return $data;
	}

	function delTag($tid,$uid){
		$this->delete(array('tid'=>$tid,'uid'=>$uid));
		return true;
	}

    
    /*根据博客删除标签*/
    function delbybid($bid){
        $this->delete(array('bid'=>$bid));
    }
    
    /*根据用户删除标签*/
    function delbyuid($uid){
        $this->delete(array('uid'=>$uid));
    }
	
	function saveCate($post)
	{
		if(is_array($post['tag'])){
			foreach($post['tag'] as $k=>$v){
				$this->update(array('tid'=>$k),array('title'=>$v));
			}
		}
	}


}
?>
