<?php
/////////////////////////////////////////////////////////////////
//云边开源轻博, Copyright (C)   2010 - 2011  qing.thinksaas.cn 
//EMAIL:nxfte@qq.com QQ:234027573                              
//$Id: basePostModel.php 1311 2012-07-24 12:47:48Z anythink $         


abstract class basePostModel extends top
{
    protected $mconfig = '';
	
    function __construct($mconfig){  
        parent::__construct(); 
        if($this->uid == 0) prient_jump(spUrl('main'));
        $this->mconfig     = $mconfig;
        $this->mid         = $mconfig['id'];
        $this->tpl_config  = $mconfig['cfg'];
		$this->myTagUsually = spClass('db_tags')->findeUserTag($this->uid); //获取我使用频率做多的10个标签
     }
	
	function index(){
		prient_jump(spUrl('main'));
	}
    
    
    /*显示发布前的东西*/
    function add(){
        $this->myattach(); //获取媒体库的临时文件
    }
    
    
    /*传递处理完自定义字段内容后返回*/
    function saved($bodypre){
        $bid  = $this->spArgs('id',0);
        
		if($bid != 0){ //如果是编辑
            $ras = spClass("db_blog")->findBy('bid',$this->spArgs('id'));
            if($_SESSION['admin'] != 1){
				if($ras['uid'] != $this->uid){
					$this->error('您没有权利编辑该文章',spUrl('main','index'));
				}
			}
            
            if($one = spClass('db_blog')->findBy('bid',$bid)){
				$split_data = split_attribute($one['body']);
				if($split_data['repto']){	$repto = '[repto]'.serialize($split_data['repto']).'[/repto]';	}else{	$repto =  '';}
				$mode = false;
            }
        }
        $tag = '';
        if($this->spArgs('tag') != ''){
            $tag = utf8_substr(substr((strip_tags($this->spArgs('tag'))),0,-1),0,30,0); //超过30自动截取
        }
		if($this->spArgs('title') != ''){
			$title = utf8_substr(strip_tags($this->spArgs('title')),0,50,0);
		}
        
        $rows = array(
            'title'=>$title, //超过50自动截取
			'type' =>$this->mid,
			'top'  =>$this->spArgs('top',0),
			'tag'  =>$tag,
			'body'=>$repto.$bodypre.strreplaces($this->spArgs('textarea')),
			'noreply'=>$this->spArgs('noreplay',0),
			'open' =>$this->spArgs('savetype',1),
			'time' =>time()
        );
		
		$ret = $this->post_verify($this->spArgs('textarea')); //检测审核机制
		if($ret['ret'] == 1){
			$rows['open'] = -2; //被审核
			spClass('db_notice')->blogverify($this->uid);
		}
        
        if($bid == 0){
            spClass('db_member')->incrField(array('uid'=>$this->uid),'num');
            $rows += array('uid'=>$this->uid);

            $bid = spClass('db_blog')->create($rows);
            spClass('db_attach')->changeId($this->uid,$bid);
            
            $body = $this->tmpfile2attach($bid,$rows['body']);
            spClass('db_blog')->update(array('bid'=>$bid),array('body'=>$body));
            $this->postToConnect($rows,$bodypre);
        }else{
            $bid = $_SESSION['tempid'];
            $rows['body'] = $this->tmpfile2attach($bid,$rows['body']);
            spClass('db_blog')->update(array('bid'=>$bid),$rows,$this->uid);
        }
		
        spClass('db_tags')->tagCreate($rows['tag'],$bid,$this->uid);
		$_SESSION['tempid'] = NULL;
        unset($_SESSION['tempid']);
		return $bid;
    }
    
    
    function edit(){
        if($this->spArgs('id') != '')
        {
            $ras = spClass("db_blog")->findBy('bid',$this->spArgs('id'));
            if($ras['uid'] == $this->uid || $_SESSION['admin'] == 1)
            {
                $bid = $ras['bid'];
                $_SESSION['tempid'] = $bid;
                $this->tempid = $bid; 
                $this->times = $ras['time'];
                $this->blog = $ras;
				$this->body = split_attribute($ras['body']);
				$this->attr = json_encode($this->body['attr']);
            }else{
                $this->error('您没有权利编辑',spUrl('main','index'));
            }
        }        
        $this->myattach(false);
        //$this->myTagUsually(); //我的常用标签
        $this->__parse_mytag($this->blog['tag']); //如果是编辑的则推送edit时的标签
        $this->body = split_attribute($this->blog['body']); //获得属性和正文信息 
    }
    
    
    //Abstract
    abstract function postToConnect($rows,$bodypre);
	


    
    public function uploadimg($size = false,$type = false)
    {
        if(!isset($_SESSION['tempid']))
            $_SESSION['tempid'] = 0;
            $upfile = spClass("uploadFile");
            if($size){
                $upfile->set_filesize($size*1024); //改为后台配置
            }else{
                $upfile->set_filesize($this->yb['addimg_upsize']); //改为全局设置
            }
            
            if($type){
                $upfile->set_filetypes($type); 
            }else{
                 $upfile->set_filetypes($this->yb['addimg_type']); //改为全局设置
            }
            
            $upfile->set_dirtype(6,$this->uid);
            $files = $upfile->fileupload(); 
            $farray = json_decode($files);
            echo $files;
    }
    
    public function swfupload($size = false,$type = false)
    {
       if(!isset($_SESSION['tempid']))
        $_SESSION['tempid'] = 0;
        
        $upfile = spClass("uploadFile");
        if($size){
            $upfile->set_filesize($size*1024); //改为后台配置
        }else{
            $upfile->set_filesize($this->yb['addimg_upsize']); //改为全局设置
        }
            
        if($type){
            $upfile->set_filetypes($type); 
        }else{
            $upfile->set_filetypes($this->yb['addimg_type']); //改为全局设置
        }
      
        $upfile->set_dirtype(6,$this->uid);
        $files = $upfile->fileupload(); 
        $farray = json_decode($files);
        echo $files;
    }
    
        /*上传媒体*/
    public function uploadmedia($size = false,$type = false)
    {
        if(!isset($_SESSION['tempid']))
            $_SESSION['tempid'] = 0;
            $upfile = spClass("uploadFile");
			
		if($size){
            $upfile->set_filesize($size*1024); //改为后台配置
        }else{
            $upfile->set_filesize($this->yb['addmusic_upsize']); //改为全局设置
        }
		
		if($type){
            $upfile->set_filetypes($type); 
        }else{
            $upfile->set_filetypes('mp3|wma|mid');
        }
            
		$upfile->set_dirtype(6,$this->uid);
        $files = $upfile->fileupload(); 
        $farray = json_decode($files);
        echo $files;
    }
    
    
    /*将文章内的临时文件变成真实文件*/
    private function tmpfile2attach($bid,$body){
        spClass('uploadFile')->set_diydir($bid);
        $truefile = spClass('uploadFile')->selectuptype(4);
        $tmpfile = spClass('uploadFile')->selectuptype(6);
        return str_replace($tmpfile,$truefile,$body);
    }
    
    	/*解析传入的地址url,desc*/
    public function links()
    {
		$support_type = array('music','video','movie');
		$type = $this->spArgs('type');
		
		if(!in_array($type,$support_type)){
			exit(json_encode(array('error'=>'不支持的解析类型')));
		}
		$method = 'set'.$type;
		$return = spClass('urlParse')->$method($this->spArgs('url'),$this->spArgs('desc'));
        echo json_encode($return);
    }
	
	
		
	//附件管理器
    /*
     * bid 0为显示我的临时文件，否则显示某博客的附件
     * */
	public function myattach($bid=0)
	{
        if($bid == 0){
            $rs = spClass('db_attach')->findAll(array('uid'=>$this->uid,'bid'=>0));
			if($rs){
				foreach($rs as $d){
					spClass('db_attach')->delBy($d['id'],$this->uid);
				}
			}
        }else{
            $this->attach = spClass('db_attach')->findAll(array('uid'=>$this->uid,'bid'=>$bid),'time desc');	
        }
	}
	
	
	//发帖审核机制
	public function post_verify($info){
		$verify = 0;
		if($this->yb['post_verify_switch'] == 1){  //如果开启人工审核
			return array('ret'=>$verify);
		}else if ($this->yb['post_verify_switch'] == 2){  //如果自动审核
			if($this->yb['post_verify_keyword'] != ''){
				$arr = trim(str_replace("\r\n",'|',$this->yb['post_verify_keyword'])); //导入关键字
				if($arr){
					preg_match('/('.$arr.')/',$info,$match); //匹配
					if(!empty($match)){
						$verify = 1;
					}
				}
			}
			//检查关键字是否已经匹配
			if($this->yb['post_verify_url'] > 0 and $verify != 1){
				preg_match_all('/<a(.*?)>/i', $info, $m);
				$count = &count($m[0]);
				//匹配<a>标签
				if($count > $this->yb['post_verify_url']){
					$verify = 1;
				}else{
					if($this->yb['post_verify_http'] > 0){
						//匹配http
						preg_match_all('/http:\/\/(.*?)/i', $info, $m);
						$count = &count($m[0]);
						if($count > $this->yb['post_verify_http']){
							$verify = 1;
						}
					}
				}
			}
			return array('ret'=>$verify);
		}else{
			return array('ret'=>0);
		}
	}

	

	
	

	
	
	/*获取我的常用tag*/
	private function myTagUsually($num=10)
	{
		$this->myTagUsually = spClass('db_tags')->spCache(3600)->findAll(array('uid'=>$this->uid),'num desc','',$num);
	}
    
    /*处理信息tag user.c and  add.c used*/
	protected function __parse_mytag($mytag)
	{
		if($mytag != '')
		{
			$mytag = explode(',',$mytag);
			if(is_array($mytag)){ $this->myTag = $mytag; }
		}
	}
	


	

}
?>
