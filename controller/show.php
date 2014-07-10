<?php
class show extends top  
{
	public function index()
	{
		$obj = spClass('db_sort');
		$obj->get_ids();
		$nav = $obj->get_f_sort();
		$sort_id = isset($_GET['sid'])?intval($_GET['sid']):16;
		$this->sort_id = $sort_id;
		$current = $obj->find(array('fid'=>$sort_id,'order'));
		$current_id = isset($_GET['cid'])?intval($_GET['cid']):$current['id'];
		$this->current_id = $current_id;	
		$sql = "SELECT b. * , k.id AS likeid , f.id AS followid ,m.username,m.domain
						FROM `".DBPRE."blog` AS b LEFT JOIN `".DBPRE."likes` AS k ON ( b.bid = k.bid AND k.uid ='$uid' )
						LEFT JOIN `".DBPRE."follow` AS f ON ( b.uid = f.touid and f.uid = '$uid' )
						LEFT JOIN `".DBPRE."member`  as m on b.uid = m.uid where b.open = 1 and b.`type` = 4 and b.`sort_id` = '$current_id' and b.`show` = 1 ";


		if($this->user['flow'] >= 15)
		{
			$sql .= "and  b.uid in ($this->followuid,$uid) and b.open=1 ORDER BY b.bid desc";
		}else{
			$sql .= "ORDER BY b.bid desc";
		}
		
		$this->blogs = spClass('db_blog')->spPager($this->spArgs('page',1),15)->findSql($sql);
		$this->pager = spClass('db_blog')->spPager()->pagerHtml2('show&sid='.$sort_id.'&cid='.$current_id);
		$page = spClass('db_blog')->spPager()->getPager('');
		
		$this->jj = spClass('db_blog')->findAll(array('type'=>1,'`show`' => '1','top'=>'1'),'bid desc','*',5);
		$this->member_list = spClass('db_member')->findSql('select `uid`,`username` from `th_member` order by `regtime` limit 8'); 
		$tags = spClass('db_tags')->getHotTag(30);
		$this->htag = $tags['rs'];
		
		$this->nav = $nav;
		$this->obj = $obj;
/**
 *  广告位
 */
		$this->banner = spClass('db_banner')->findAll(array('fid'=>1),'`order`');
		$this->xiaobao = spClass('db_banner')->find(array('fid'=>2),'`order`');
		$this->jigou = spClass('db_banner')->findAll(array('fid'=>3),'`order`');
		$this->daren1 = spClass('db_banner')->find(array('fid'=>4),'`order`');
		$this->daren2 = spClass('db_banner')->find(array('fid'=>5),'`order`');
		$this->display('index/index.html');
	}
	public  function jujiao()
	{
		$sort_id = isset($_GET['sid'])?intval($_GET['sid']):10;
		$this->sort_id = $sort_id;
		$s_channel = spClass('db_sort')->find(array('fid'=>$sort_id),'`order`');
		$this->fid = $s_channel['id'];
		$n_id =  isset($_GET['nid'])?intval($_GET['nid']):$s_channel['id'];
		$this->n_id = $n_id;
		$blogs = spClass('db_blog')->spPager($this->spArgs('page',1),10)->findAll(array('type'=>1,'`show`' => '1','sort_id'=>$n_id),'bid desc');
		$this->blogs = $blogs;
		$this->pager = spClass('db_blog')->spPager()->pagerHtml2('show','jujiao',array('sid'=>$sort_id,'nid'=>$n_id));
		$page = spClass('db_blog')->spPager()->getPager('');
		$images = array();
		$blogs_1 = spClass('db_blog')->spPager($this->spArgs('page',1),10)->findAll(array('type'=>1,'`show`' => '1','sort_id'=>$n_id,'top'=>'1'),'bid desc');
		foreach ($blogs_1 as $k => $list)
		{
			if (preg_match('/(<img.*\/>)/iU',$list['body'],$arr)) 
			{
				$images[$k] = $list; 
				$images[$k]['image'] = $arr[1];
			}
		}
		
		$this->banner = spClass('db_banner')->findAll(array('fid'=>7),'`order`');
		$this->images = $images;
		$obj = spClass('db_sort');
		$nav = $obj->get_f_sort();
		$this->nav = $nav;
		$this->obj = $obj;
		$this->display('index/jujiao.html');
	}
	
	public  function jigou91()
	{
		$sort_id = isset($_GET['sid'])?intval($_GET['sid']):10;
		$this->sort_id = $sort_id;
		$s_channel = spClass('db_sort')->find(array('fid'=>$sort_id),'`order`');
		$this->fid = $s_channel['id'];
		$n_id =  isset($_GET['nid'])?intval($_GET['nid']):$s_channel['id'];
		$this->n_id = $n_id;
		$blogs = spClass('db_blog')->spPager($this->spArgs('page',1),10)->findAll(array('type'=>1,'`show`' => '1','sort_id'=>$n_id),'bid desc');
		$this->blogs = $blogs;
		$this->pager = spClass('db_blog')->spPager()->pagerHtml2('show','jigou91',array('sid'=>$sort_id,'nid'=>$n_id));
		$page = spClass('db_blog')->spPager()->getPager('');
		$images = array();
		$blogs_1 = spClass('db_blog')->spPager($this->spArgs('page',1),10)->findAll(array('type'=>1,'`show`' => '1','sort_id'=>$n_id,'top'=>'1'),'bid desc');
		foreach ($blogs_1 as $k => $list)
		{
			if (preg_match('/(<img.*\/>)/iU',$list['body'],$arr)) 
			{
				$images[$k] = $list; 
				$images[$k]['image'] = $arr[1];
			}
		}
		
		$this->banner = spClass('db_banner')->findAll(array('fid'=>7),'`order`');
		$this->images = $images;
		$obj = spClass('db_sort');
		$nav = $obj->get_f_sort();
		$this->nav = $nav;
		$this->obj = $obj;
		$this->display('index/jigou91.html');
	}
	
	
	
	public  function saishihd()
	{
		$obj = spClass('db_sort');
		$nav = $obj->get_f_sort();
		$this->nav = $nav;
		$this->obj = $obj;
		$this->dance = spClass('db_sort')->findAll(array('fid'=>22),'`order`','*',3);
		$this->breakin = spClass('db_sort')->findAll(array('fid'=>129),'`order`','*',3);
		$this->qiwu = spClass('db_sort')->findAll(array('fid'=>130),'`order`','*',3);
		$this->display('index/saishihd.html');
	}
	
	
	
	public function saishimore()
	{
		$obj = spClass('db_sort');
		$nav = $obj->get_f_sort();
		$this->nav = $nav;
		$this->obj = $obj;
		$sid = isset($_GET['sid'])?intval($_GET['sid']):22;
		$this->blogs = spClass('db_blog')->spPager($this->spArgs('page',1),10)->findAll(array('type'=>4,'`show`'=>1,'sort_id'=>$sid));
		$this->pager = spClass('db_blog')->spPager()->pagerHtml2('show','saishimore');
		$page = spClass('db_blog')->spPager()->getPager('');
		$this->display('index/saishihd-more.html');
	}
	public function month()
	{
		$obj = spClass('db_sort');
		$nav = $obj->get_f_sort();
		$this->nav = $nav;
		$this->obj = $obj;
		$sid = isset($_GET['sid'])?intval($_GET['sid']):22;
		$this->blogs = spClass('db_blog')->spPager($this->spArgs('page',1),10)->findAll(array('type'=>4,'`show`'=>1,'sort_id'=>$sid),'hitcount desc','*','1,10');
		$this->pager = spClass('db_blog')->spPager()->pagerHtml2('show','month');
		$page = spClass('db_blog')->spPager()->getPager('');
		$this->display('index/month.html');
	}
	public function v()
	{
	
		$this->getUserSkin($this->spArgs('bid'));
		$this->getMyFollow();
		$this->getMyLook();
		$this->fava = $this->getBlogFava();
		$this->isfollow = $this->isFollow();
		
	
		$this->d = spClass('db_blog')->spLinker()->find(array('uid'=>$this->user_data['uid'],'bid'=>$this->spArgs('bid')));
		
		
		if(is_array($this->d))
		{
			spClass('db_blog')->incrField(array('bid'=>$this->spArgs('bid')), 'hitcount'); 
			$this->display('index/shipin.html',$this->result);
		}else{
			err404('您查看的内容可能已经修改或者删除。');	
		}
	}
}
?>