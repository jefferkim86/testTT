<?php
/////////////////////////////////////////////////////////////////
//云边开源轻博, Copyright (C)   2010 - 2011  qing.thinksaas.cn 
//EMAIL:nxfte@qq.com QQ:234027573                              
//$Id: userblog.php 754 2012-06-10 07:57:09Z anythink $ 

//访问用户博客首页
class customize extends top
{
	private $user_data = ''; //初始化当前用户的信息
	private $user_skin = ''; //初始化当前用户的主题
	private $user_domain = '';//
	
	public function __construct(){
		parent::__construct();
		if($this->uid == 0){prient_jump(spUrl('main'));}
		
		$this->load_skin_config(); //加载自定义设置
		$this->skins = spClass('db_skins')->findTheme();   //加载系统主题列表
		$this->exclu_skins = spClass('db_skins')->findExclusive(); //加载专属主题列表	
	}
	
	
	public function index(){
		$rs = spClass('db_theme')->find(array('uid'=>$this->uid)); //加载我的主题设置
		$_SESSION['customize']['config'] = unserialize($rs['config']);
		$_SESSION['customize']['setup']  = unserialize($rs['setup']);
		$this->user = $_SESSION;
		$this->display('customize.html');
	}
	
	
	
	
	
	
	/*加载自定义设置的配置文件*/
	function load_skin_config(){
		if($_SESSION['customize']['theme'] != ''){
			$skin = $_SESSION['customize']['theme'];
		}else{
			$rs = spClass('db_theme')->find( array('uid'=>$this->uid) );
			$skin = $rs['theme'];
			$_SESSION['customize']['theme'] = $rs['theme'];
		}
		if($skin == '') $skin == 'default';
		if(is_file( APP_PATH.'/'.$GLOBALS['G_SP']['view']['config']['template_dir'].'/theme/'.$skin.'/setting.php')){
			$skin_config = APP_PATH.'/'.$GLOBALS['G_SP']['view']['config']['template_dir'].'/theme/'.$skin.'/setting.php';
		}else{
			$skin_config = APP_PATH.'/'.$GLOBALS['G_SP']['view']['config']['template_dir'].'/theme/default/setting.php';
		}
		require_once($skin_config);
		$this->setting = $setting;
		$this->skin_config = $setup_info;
	}
	
	
	/*保存主题设置*/
	public function savetheme(){
		$this->parseCssFile();
		$where = array('uid'=>$this->uid);
		
		$conditions = array('theme'=>$_SESSION['customize']['theme'],'css'=>$_SESSION['customize']['css'],'config'=>serialize($_SESSION['customize']['config']),'setup'=>serialize($_SESSION['customize']['setup']));
		spClass('db_theme')->replace($where,$conditions);
		spClass('db_skins')->incrField(array('skindir'=>$_SESSION['customize']['theme']), 'usenumber'); 
		$_SESSION['customize'] = '';
		unset($_SESSION['customize']);
	
		if($this->spArgs('user')){
			$user = $this->spArgs('user');

			if(utf8_strlen($user['niname']) < 2 || utf8_strlen($user['niname']) > 10){
				$this->error('昵称不符合规范,忽略保存用户信息');
			}else{
				$niname = spClass('db_member')->find(array('username'=>$user['niname']),'','uid,username');
				if(!$niname){
					$row = array(
						'username'=>htmlspecialchars($user['niname']),
					);
					spClass('db_member')->update(array('uid'=>$this->uid),$row);
					$_SESSION['user']['username'] = $row['username'];
					$_SESSION['username']       = $row['username'];
					//sign
				}
			}
			
			$row = array(
				'sign'=>strreplaces($user['textarea']),
			);
			spClass('db_member')->update(array('uid'=>$this->uid),$row);
			$_SESSION['user']['sign']   = $row['sign'];		
		}
		header("Location:".spUrl('userblog','index',array('domain'=>'home','uid'=>$this->uid))  );
	}
	
	/*取消保存设置*/
	public function cal(){
		header("Location:".spUrl('userblog','index',array('domain'=>'home','uid'=>$this->uid))  );
	}
	
	//预览某一套主题
	function preview(){
		
		
		if($this->spArgs('skinid') == 'default'){
				$this->__customizeConfig('default');
		}else{
			$theme = spClass('db_skins')->find(array('id'=>$this->spArgs('skinid')));
			if($theme['exclusive'] == $this->uid){
				$this->__customizeConfig($theme['skindir']);
			}else{
				if($theme['exclusive'] == 0){
					$this->__customizeConfig($theme['skindir']);
				}else{
					exit('不存在的主题或者您没有使用特殊主题的权限');
				}
			}
		}
	}
	
	function customdefault(){
		spClass('db_theme')->clearCustom();
		header("Location:".spUrl('customize'));
	}
	
	
	
	/*处理css、upload*/
	function parseCssFile(){
		//载入自定义设置
		$css = $this->__parse_css();
		$upload = $this->__parse_upload();
		//分离css实体和配置数组
		$cssdata = $css['css'] . $upload['css'];
		$cssarr =  array_merge($css['conf'],$upload['conf']);
		//写入session
		$_SESSION['customize']['setup'] = $css['setup'];
		$_SESSION['customize']['css'] = $cssdata;
		$_SESSION['customize']['config'] = $cssarr;
	}
	function previewcss(){
		$this->parseCssFile();
		$this->user = $_SESSION;
		if($_SESSION['customize']['theme'] != ''){
			$skin = $_SESSION['customize']['theme'];
		}else{
			$rs = spClass('db_theme')->find( array('uid'=>$this->uid) );
			$skin = $rs['theme'];
		}
		$this->display('customize.html');
	}



	
	/*设置一个临时的主题访问点*/
	private function __customizeConfig($skindir){
		$_SESSION['customize']['theme'] = $skindir;		
		header("Location:".spUrl('userblog','index',array('domain'=>'home','uid'=>$this->uid) ) );
	}
	
	function __parse_css(){
		unset($_POST['submit']);
		$conf = array();
		$data = '';
		foreach($_POST as $k=>$v)
		{
			if($v != ''){
				$conf[$k] = htmlspecialchars(strreplaces($v));
				//如果配置是user或钩子则跳过
				if($k == 'user' || $k =='setup') continue;
				$k = str_replace('@',' ',$k);
				$k = str_replace('$','.',$k);
				$find=explode('|',$k);
					if($find[1] == 'img1' || $find[1] == 'img2' || $find[1] == 'img3' || $find[1] == 'img4'){
						$data .= "\n".$find[0].'{background:url('.$v.');}';
					}else{
						$data .= "\n".$find[0].'{'.$find[1].':'.$v.';}';
					}
			}
		}
		$rs['setup'] = $_POST['setup'];//主题钩子
		$rs['css']   = $data; //css实体
		$rs['conf'] = $conf; //css数组配置
		return $rs;
	}
	
	function __parse_upload(){
		$data = '';
		$conf = array();
		if(is_array($_FILES)){
			foreach($_FILES as $k=>$d){
				$k = str_replace('@',' ',$k);
				$k = str_replace('$','.',$k);
				$find=explode('|',$k); //0 id 1 存储位置
			
				if($d['error'] != 4){

					if($this->yb['theme_upload'] != 1){continue;}
					if($d['size'] > $this->yb['theme_uploadsize']){exit('上传大小不能超过：'.($this->yb['theme_uploadsize']/1024/1024).'MB');}
					$ext = spExt('aUpload');
					$savedir = $ext['savepath'].'/'.$ext['savedir'].'/theme/';

					$fpath   =  date('Y').'/'.date('m').'/'.date('d').'/';
					$ext = pathinfo($d['name']);
					$exrarr = explode(',',$this->yb['theme_uploadtype']);
					if(!in_array($ext['extension'],$exrarr)){exit('只能上传：'.$this->yb['theme_uploadtype']);}
					$fname   = time().'.'.$ext['extension'];
					__mkdirs($savedir.$fpath);
					$save = $savedir.$fpath.$fname;
					$uploadext = spExt('aUpload');
					
					spClass('db_theme')->updateExtField($this->uid,$find[1],$savedir,$fpath.$fname);
					move_uploaded_file($d['tmp_name'],$save);
					$v = $GLOBALS['uri'].'/'.$uploadext['savedir'].'/theme/'.$fpath.$fname;
					$conf[$k] = $v;
					$data .= $find[0].'{background:url('.$v.');}';
				}else{
					continue;
				}
			}
		}
		$rs['css'] = $data;
		$rs['conf'] = $conf;
		return $rs;
	}
	


}
