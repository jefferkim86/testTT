<?php
/////////////////////////////////////////////////////////////////
//云边开源轻博, Copyright (C)   2010 - 2011  qing.thinksaas.cn 
//EMAIL:nxfte@qq.com QQ:234027573                              
//$Id: uploadFile.php 1055 2012-06-28 14:29:50Z anythink $ 

class uploadFile {

	 private $save_path = '';
	 private $filesizes = '';
	 private $filetypes = 'jpg,png,gif,bmp';
	 private $fileinput = 'filedata';
	 private $diydir = '';
	 private $tmppath = ''; 
	 private $savedir = ''; 
	 private $dirtype = '';  ///* 1 按照天 2011/05/03  2 按照月 2011/05  3 按照年 2011  4 月按照指定名称创建  2011/11/diydirs  */
	 private $uploaded  = '';

	 private $imgresize = TRUE;
	 private $imgmask   = FALSE;
	 

	 
	 
 	public function __construct() {
		$params = spExt('aUpload');
		$this->save_path  = $params['savepath'];
		$this->filetypes  = $params['filetype'];
		$this->filesizes = $params['filesize'];
		$this->fileinput = $params['fileinput'];
		$this->dirtype   = $params['dirtype'];
		$this->tmppath   = $params['tmppath'];
		$this->savedir   = $params['savedir'];
		
		$this->imgresize = $params['imgresize'];
		$this->imgmask = $params['imgmask'];
		$this->mark_src = $params['imgmasksrc'];
		$this->resize_w = $params['imgresizew'];
		

 	}
	
	
	/*动态更改上传大小*/
	public function set_filesize($size)
	{
		$this->filesizes = $size;
	}
	
	/*动态更改允许上传类型*/
	public function set_filetypes($type)
	{
		$this->filetypes = $type;
	}
	
	/*动态更改创建文件夹类型*/
	public function set_dirtype($type)
	{
		$this->dirtype   = $type;
	}
	
	/*动态更改允保存位置*/
	public function set_path($path)
	{
		$this->save_path = $path;
	}
	/*动态更改上传表但*/
	public function set_finput($name)
	{
		$this->fileinput = $name;
	}
	
	/*动态更改是否显示缩略图*/
	public function set_imgresize($name)
	{
		$this->imgresize = $name;
	}
	
	/*动态更改是否创建水印*/
	public function set_imgmask($name)
	{
		$this->imgmask = $name;
	}
	
	
	/*该参数仅限于动态修改*/
	public function set_diydir($dir)
	{
		$this->diydir = $dir;
	}
	
	

	
	
	
	public function fileupload($input = '')
	{
		$inputname =$this->fileinput;
		if(strlen($input) >1){$inputName=$input;}
		$err = $localName = '';
		$msg = "''";
		$tempPath=$this->tmppath.'/'.date("YmdHis").mt_rand(10000,99999).'.tmp';
		if(isset($_SERVER['HTTP_CONTENT_DISPOSITION'])&&preg_match('/attachment;\s+name="(.+?)";\s+filename="(.+?)"/i',$_SERVER['HTTP_CONTENT_DISPOSITION'],$info))
		{
			file_put_contents($tempPath,file_get_contents("php://input"));
			$localName=$info[2];
		}
		else{
			$upfile=@$_FILES[$inputname];

			if(!isset($upfile))$err='文件域的inputName'.$inputName.'指定错误';
			elseif(!empty($upfile['error'])){

				switch($upfile['error'])
				{
					case '1':$err = '文件大小超过了php.ini定义的upload_max_filesize值';break;
					case '2':$err = '文件大小超过了HTML定义的MAX_FILE_SIZE值';break;
					case '3':$err = '文件上传不完全';break;
					case '4':$err = '无文件上传';break;
					case '6':$err = '缺少临时文件夹';break;
					case '7':$err = '写文件失败';break;
					case '8':$err = '上传被其它扩展中断';	break;
					case '999':
					default:$err = '无有效错误代码';
				}
			}
			elseif(empty($upfile['tmp_name']) || $upfile['tmp_name'] == 'none')$err = '无文件上传';
			else{
				move_uploaded_file($upfile['tmp_name'],$tempPath);
				$localName=$upfile['name'];
			}
		}
		
		
		if($err==''){
			$fileInfo=pathinfo($localName);
			$extension=strtolower($fileInfo['extension']);
			$mime = mime_content_type($extension);
			if(preg_match('/'.str_replace(',','|',$this->filetypes).'/i',$extension))
			{
				$bytes=filesize($tempPath);
				if($bytes > $this->filesizes){
                $err='来自系统的提示：请不要上传大小超过'.$this->formatBytes($this->filesizes).'的文件';
               }else{
					PHP_VERSION < '4.2.0' && mt_srand((double)microtime() * 1000000);
					if($this->dirtype == 5)
					{
						$filenames = strtolower($this->diydir.'.'.$extension);
					}else{
						$filenames = strtolower(date("His").mt_rand(1000,9999).'.'.$extension);
					}
					
					$nfilename = $this->selectuptype($this->dirtype) .'/'    .$filenames; //这是要保存到数据库的
					$tfilename = $this->selectuptype($this->dirtype) .'/t_'  .$filenames; //这是要保存到数据库的
					$targetPath = $this->save_path.'/'.$nfilename; //这是需要保存用的
					
					rename($tempPath,$targetPath);
				
					@chmod($targetPath,0755);
					$targetPath=$this->jsonString($targetPath);
					$this->uploaded = stripslashes($targetPath);
					
					if($this->dirtype !=5)
					{
						$arr = array('bid'=>0,'blogdesc'=>utf8_substr($localName,0,50,0),'filesize'=>$bytes,'path'=>$nfilename,'mime'=>$extension,'uid'=>$_SESSION['uid'],'time'=>time());
						$insertid = spClass('db_attach')->create($arr);
					}
					
					
					if($this->dirtype == 5) //处理头像
					{
					
						$imgarray = @pathinfo($this->uploaded);
						
						$dirname = $imgarray['dirname']; //上传目录名称
						
						$uid = sprintf("%09d", $imgarray['filename']);
						$uid = substr($uid, -2);
						$big = 'big_'.$uid.'.jpg'; 
						$middle = 'middle_'.$uid.'.jpg'; 
						$small = 'small_'.$uid.'.jpg'; 
						$imghd = spClass('image');

						$imghd->load($this->uploaded);
						
						
						$imghd->resizeToWidth(200);
						$imghd->save($dirname.'/'.$big);

						
						$imghd->load($this->uploaded);
						$imghd->square(65);
						$imghd->save($dirname.'/'.$middle);
						
						$imghd->load($this->uploaded);
						$imghd->square(30);
						$imghd->save($dirname.'/'.$small);
						
						unlink($this->uploaded);
					}
					
					

					if($this->imgresize && $this->img_resized($this->imgmask))
					{
						  $nfilename = $tfilename. '||' .$nfilename;
					}
					
					//如果原图水印
					if($this->imgmask)
					{
						$imghd = spClass('image');
						$imghd->load($this->uploaded);
						$imghd->waterMark($this->mark_src);
						$imghd->save($this->uploaded);
					}

					//如果是mp3追加属性信息
					$mp3 = '';
					if($extension == 'mp3'){
						$mp3 = $this->readmp3($targetPath);
						$title  = iconv("GB2312//IGNORE", "UTF-8", $mp3['title']);
						$author = iconv("GB2312//IGNORE", "UTF-8", $mp3['author']);
						$artist = iconv("GB2312//IGNORE", "UTF-8", $mp3['artist']);
						$mp3 = ",'title':'$title','author':'$author','artist':'$artist'";
					}
					
				  $msg="{'url':'".$nfilename."','localname':'".$this->jsonString($localName)."','filesize':'$bytes','mime':'$mime','fid':'$insertid'$mp3}";
				}
			}
			else $err='上传文件扩展名必需为：'.$this->filetypes;
			@unlink($tempPath);
		}
		return "{'err':'".$this->jsonString($err)."','msg':".$msg."}";

	}
	
	
	/*设置上传目录
	  1 按照天 2011/05/03
	  2 按照月 2011/05
	  3 按照年 2011
	  4 月按照指定名称创建  2011/diydirs 
	  5 头像目录
      6 用户临时文件
	*/
	public function selectuptype($type)
	{
        if($type == 6){
            $this->mkdirs($this->savedir. '/tmp');
            $returndir = $this->savedir. '/tmp';
        }elseif($type == 4){
			$this->mkdirs($this->save_path.'/'.$this->savedir. '/' .date('y',time()) . '/' . date('n',time()). '/' . date('d',time()).'/'.$this->diydir);
			$returndir = $this->savedir. '/' .date('y',time()) . '/' . date('n',time()). '/' .  date('d',time()) . '/' . $this->diydir;

		}elseif($type == 3){
			$this->mkdirs($this->save_path.'/'.$this->savedir. '/' .date('y',time()) );
			$returndir = $this->savedir. '/' .date('y',time());
		}elseif($type == 2){
			$this->mkdirs($this->save_path.'/'.$this->savedir.'/' .date('y',time()) . '/' . date('n',time()) );
			$returndir = $this->savedir . '/' .date('y',time()) . '/' . date('n',time());
		}elseif($type == 5){ //头像
			$uid = abs(intval($this->diydir));
			$uid = sprintf("%09d", $uid);
			$dir1 = substr($uid, 0, 3);
			$dir2 = substr($uid, 3, 2);
			$dir3 = substr($uid, 5, 2);
			
			$this->mkdirs($this->save_path.'/'.$dir1.'/'.$dir2.'/'.$dir3);
			$returndir =  $dir1.'/'.$dir2.'/'.$dir3;
		}else{
			$this->mkdirs($this->save_path.'/'.$this->savedir.'/' .date('y',time()) . '/' . date('n',time()) . '/'. date('d',time()) );
			$returndir = $this->savedir . '/' .date('y',time()) . '/' . date('n',time()) . '/'. date('d',time());
		}
		
	  return $returndir;
	}
	
	
	/*循环创建目录,绝对地址*/
	private function mkdirs($dir,$mode= 0777)
	{
         if (!is_dir($dir)) {
            $this->mkdirs(dirname($dir), $mode);
            @mkdir($dir, $mode);
            return fclose(fopen($dir.'/index.html', 'w'));
        }
        return true;    
	}
	
		private function formatBytes($bytes) {
		if($bytes >= 1073741824) {
			$bytes = round($bytes / 1073741824 * 100) / 100 . 'GB';
		} elseif($bytes >= 1048576) {
			$bytes = round($bytes / 1048576 * 100) / 100 . 'MB';
		} elseif($bytes >= 1024) {
			$bytes = round($bytes / 1024 * 100) / 100 . 'KB';
		} else {
			$bytes = $bytes . 'Bytes';
		}
		return $bytes;
	}
	
	private function jsonString($str)
	{
		return preg_replace("/([\\\\\/'])/",'\\\$1',$str);
	}
	
	
	/*缩放图*/
	private function img_resized()
	{	
		$imgarray = @pathinfo($this->uploaded);
		$dirname = $imgarray['dirname']; //上传目录名称
		$thubimg = 't_'.$imgarray['filename'].'.'.$imgarray['extension']; //获取缩略图
		$imghd = spClass('image');
		$imghd->load($this->uploaded);
		$imghd->resizeToWidth($this->resize_w);
		return $imghd->save($dirname.'/'.$thubimg);
	}
	
	private function readmp3($mp3_file)
	{
		$fp=fopen($mp3_file,"rb"); //读取mp3文件
		//首先判断是否有TAG，如果没有，那就没必要读取了，方法就是读取倒数128-126字节，看是否是TAG
		//详情参看http://www.readlog.cn/archives/2961/
		fseek($fp,-128,SEEK_END); //指针移到倒数128字节处
		$tag=fread($fp,3); //读取倒数128-126字节位置的数据
		if($tag=="TAG")  //如果这3个字节是TAG，表明有TAG
		{
			$mp3=array();
			//标题30个字节，从倒数125字节到倒数96字节
			//现在直接读就可以了
			$mp3['title']=trim(fread($fp,30));
			//艺术家30个字节，从倒数95字节到66字节
			$mp3['author']=trim(fread($fp,30));
			//专辑30个字节，从倒数65字节到36字节
			$mp3['artist']=trim(fread($fp,30));
			//年份4个字节，从倒数35字节到32字节
			//$mp3['年份']=trim(fread($fp,4));
			//注释28个字节，从倒数31字节到4字节 (有的是30个字节，那就把倒数第2，3位归入注释了）
			//$mp3['注释']=trim(fread($fp,28));
			//fseek($fp,1,SEEK_CUR); //跳过倒数第3位保留位
			//第几首1个字节，倒数第2位
			//$mp3['编号']=ord(fread($fp,1));
			//$mp3['流派']=ord(fread($fp,1));
			fclose($fp);
			return $mp3;
		}
		return false;
	}

	

 
}


?>
