<?php
/////////////////////////////////////////////////////////////////
//云边开源轻博, Copyright (C)   2010 - 2011  qing.thinksaas.cn
//EMAIL:nxfte@qq.com QQ:234027573
//$Id: thFunctions.php 1192 2012-07-04 13:23:13Z anythink $


function randstr($len=6) {
    $chars='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789-@#~';
    mt_srand((double)microtime()*1000000*getmypid());
    $passWord='';
 while(strlen($passWord)<$len)
        $passWord.=substr($chars,(mt_rand()%strlen($chars)),1);
    return $passWord;
}


function islogin()
{
	if(isset($_SESSION['uid']) && $_SESSION['uid'] != 0)
	{
		return true;
	}else{
		return false;
	}
}

function prient_jump($x)
{
	exit( '<script language="javascript">top.location="'.$x.'";</script>');
}


/*处理domain uid bid 之间的关系*/
/*去用户首页的链接*/
function goUserHome($params)
{
	$domain = $params['domain']; //判断是否存在domain
	$uid   = $params['uid'];     //判断是否存在uid

	if($domain != '' && $domain !='home')
	{
		return spUrl('userblog','index',array('domain'=>$domain));
	}else{
		return spUrl('userblog','index',array('domain'=>'home','uid'=>$uid));
	}
}
spAddViewFunction('goUserHome','goUserHome');


/*
用户访问博客正文的链接 用户在模板内显示
bid domain uid
*/
function goUserBlog($params)
{
	$bid = $params['bid']; //判断是否存在domain
	$domain = $params['domain']; //判断是否存在domain
	$uid   = $params['uid'];     //判断是否存在uid
	if($bid){return spUrl('userblog','show',array('bid'=>$bid));}
}
spAddViewFunction('goUserBlog','goUserBlog');

/*feed parse getswfplayer*/
function _getSwfplayer($playUrl)
{

	$player = '<object width="630" height="385">
					<param name="allowscriptaccess" value="always"></param>
					<param name="allowFullScreen" value="true"></param>
					<param name="wmode" value="Opaque"></param>
					<param name="movie" value="'.$playUrl.'"></param>
					<embed src="'.$playUrl.'" width="640" height="385" type="application/x-shockwave-flash"></embed>
			  </object>';
	return $player;
}

/*处理回复的链接*/
function replay_preg($params)
{
	$msg = $params['msg'];

	preg_match("/\[at=(.*?)](.*?)\[\/at\]/i",$msg,$msag); //$msg[1]
	$msag = str_replace($msag[0],'<a href="'.goUserHome(array('uid'=>$msag[1])).'" target="_blank">'.$msag[2].'</a>',$msg);
	echo $msag;
}
spAddViewFunction('replay_preg','replay_preg');

/*处理通知的链接*/
function notice_preg($params)
{
	$msg = $params['url'];
	$url = explode('|',$msg);
	if($url[0] == 'blog')
	{
		echo goUserBlog(array('bid'=>$url[1]));
	}

	if($url[0] == 'user')
	{
		echo goUserHome(array('uid'=>$url[1]));
	}
}
spAddViewFunction('notice_preg','notice_preg');


/*获取大图*/
function getBigImg($img)
{
	$imgs = str_replace('t_','',$img);
	return $imgs;
}

/*发布图片的时候处理缩略图显示*/
function thubimg($params)
{
	$path = $params['path'];
	$path = pathinfo($path);
	$img = $path['dirname'].'/'.'t_'.$path['filename'].'.'.$path['extension'];
	if(file_exists($img)){echo $img;}else{echo $params['path'];}

}
spAddViewFunction('thubimg','thubimg');



function attach_insert($params)
{

	$img = $params['file'];
	$name = $params['name'];
	$fid = $params['id'];
	$file = APP_PATH .'/'. $img;
	$newpath = pathinfo($img);
	$ext = strtolower($newpath['extension']);
	if($ext == 'jpg' || $ext == 'png' || $ext == 'gif' || $ext == 'bmp') //如果是图像
	{
		$newfile = APP_PATH .'/'.$newpath['dirname'].'/'.'t_'.$newpath['filename'].'.'.$ext;
		if(is_file($newfile))
		{
			return 'iattachBigImg(\''.$img.'|'.$newpath['dirname'].'/'.'t_'.$newpath['filename'].'.'.$ext.'\')';
		}else{
			return 'iattachImg(\''.$img.'\')';
		}
	}elseif($ext == 'mp3' || $ext=='wma'){
		return 'iattachMp3('.$fid.',\''.$name.'\')';
	}else{
		return $ext.'|'.$name.'|'.$fid;
	}
}
spAddViewFunction('attach_insert','attach_insert');


/*显示标签链接*/
function tag($params)
{
	$tag = $params['tag'];

	$c = 'blog';
	$a = 'tag';
	$tagarr = explode(',',$tag);
	$tagstr = '';
	if(is_array($tagarr))
	{
		foreach($tagarr as $d)
		{
			$tagstr .= '<a href="'.spUrl($c,$a,array('tag'=>$d)).'" target="_blank">'.$d.'</a> ';
		}
	}
	return $tagstr;
}
spAddViewFunction('tag','tag');




/*显示头像*/
function avatar($params)
{
	$uid = $params['uid'];
	$size = $params['size'];
	$time = $params['time'];
	if($time ==1)
	{
		return APP_NAME.'avatar.php?uid='.$uid.'&size='.$size.'&random='.time();
	}else{
		return APP_NAME.'avatar.php?uid='.$uid.'&size='.$size;
	}

}
spAddViewFunction('avatar','avatar');


/*显示POST error */
function verifierMsg($params)
{
	$config =  array(
				'defaultTag'        => 'span',   //默认提示的包围标签
				'defaultTagClass'   => 'nomail', //默认提示的标签附加class
				'errTag'            => 'span',       //错误的提示包围标签
				'errTagClass'       => 'err',  //错误的提示包围标签附加class
				'showType'          => 1,      //错误显示方式,1为单独调用,2为全部显示在某个地方
				'ShowAre'           => 'ul',    //全部显示的时候外筐
				'ShowAreClass'      => 'tab', //外矿css
				'ShowInner'         => 'li',     //内部循环
				'ShowInnerClass'    => '',     //内部循环
			);

	$set_array = $params['set'];
	$input     = $params['in'];
	$msg     = $params['msg'];
	$show     = $params['showtype'];

	if($config['showType']  ==2 || $show==2)
	{
		if(is_array($set_array))
		{
				$str .= '<'.$config['ShowAre'].' class="'.$config['ShowAreClass'].'">';
				foreach($set_array as $k=>$v)
				{
					$str .= '<'.$config['ShowInner'].' class="'.$config['ShowInnerClass'].'">' . $v[0] . '</'.$config['ShowInner'].'>' ;
				}
				$str .= '</'.$config['ShowAre'].'>';
				return $str;
		}
	}else{
		if(is_array($set_array))
		{
			foreach($set_array as $k=>$v)
			{
				if($k == $input)
				{
					return  '<'.$config['errTag'].' class="'.$config['errTagClass'].'">' . $v[0] . '</'.$config['errTag'].'>' ;
				}else{
					return '<'.$config['defaultTag'].' class="'.$config['defaultTagClass'].'">' . $msg . '</'.$config['defaultTag'].'>' ;
				}
			}
		}else{
			return '<'.$config['defaultTag'].' class="'.$config['defaultTagClass'].'">' . $msg . '</'.$config['defaultTag'].'>' ;
		}
	}
}

spAddViewFunction('verifierMsg','verifierMsg');

/*计算热度百分比*/
function checkHit($params)
{
	$one = $params['max'];
	$two = $params['val'];
	if($tow == $one)
	{
		return '100';
	}elseif($two == 0){
		return '1';
	}else{
		return ceil(($two/$one)*100);
	}
}
spAddViewFunction('checkHit','checkHit');

function _setTags($txt,$tag,$index =1)
{
	if($index){
		return $txt;
	}else{
		$tag = explode(',',$tag);
		return $tag[0];
	}
}

function formatBytes($params) {
$bytes = $params['size'];
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
spAddViewFunction('formatBytes','formatBytes');


function themecustom($params)
{
	$type = $params['type'];
	$data = $params['data'];
	$id = $params['id'];
	$forid = $params['lable'];
	$default = $params['default'];
	$formvalue = $_SESSION['customize']['config'];
	

	if($type == 'radio')
	{
		foreach($data as $k=>$d)
		{
			if($k==$default || $k == arrrayKeyByVelue($formvalue,$forid,$id,$default))
			{
				echo '<label><input type="radio" name="'.$forid.'|'.$id.'" value="'.$k.'" checked="checked" />'.$d.'</label>';
			}else{
				echo '<label><input type="radio" name="'.$forid.'|'.$id.'" value="'.$k.'" />'.$d.'</label>';
			}
		}
	}
	
	if($type == 'background_repet'){
		$name = $forid.'|'.$id;
		$ids = str_replace(array('/','=','+'),array('','',''),base64_encode($name));
		echo '<div class="custom_con" id="background_repeat"><div class="bg_repeat">';
		if('repet' == arrrayKeyByVelue($formvalue,$forid,$id,$default)){
			echo '<li><a href="#" onclick="background_repet(\'repet\',this,\''.$ids.'\')" title="背景平铺" class="current"><span class="repeat_xy"></span></a></li>';
		}else{
			echo '<li><a href="#" onclick="background_repet(\'repet\',this,\''.$ids.'\')" title="背景平铺"><span class="repeat_xy"></span></a></li>';
		}
		
		if('repeat-x' == arrrayKeyByVelue($formvalue,$forid,$id,$default)){
			echo '<li><a href="#" onclick="background_repet(\'repeat-x\',this,\''.$ids.'\')" title="横向平铺" class="current"><span class="repeat_x"></span></a></li>';
		}else{
			echo '<li><a href="#" onclick="background_repet(\'repeat-x\',this,\''.$ids.'\')" title="横向平铺"><span class="repeat_x"></span></a></li>';
		}
		
		if('repeat-y' == arrrayKeyByVelue($formvalue,$forid,$id,$default)){
			echo '<li><a href="#" onclick="background_repet(\'repeat-y\',this,\''.$ids.'\')" title="纵向平铺" class="current"><span class="repeat_y"></span></a></li>';
		}else{
			echo '<li><a href="#" onclick="background_repet(\'repeat-y\',this,\''.$ids.'\')" title="纵向平铺"><span class="repeat_y"></span></a></li>';
		}
		
		if('no-repeat' == arrrayKeyByVelue($formvalue,$forid,$id,$default)){
			echo '<li><a href="#" onclick="background_repet(\'no-repeat\',this,\''.$ids.'\')" title="不平铺" class="current"><span class="norepeat"></span></a></li>';
		}else{
			echo '<li><a href="#" onclick="background_repet(\'no-repeat\',this,\''.$ids.'\')" title="不平铺"><span class="norepeat"></span></a></li>';
		}

		echo '<input type="hidden" name="'.$name.'" id="'.$ids.'" value="'.arrrayKeyByVelue($formvalue,$forid,$id,$default).'" />';
		echo '</div></div>';
	
	}
	
	if($type == 'background_scroll'){
		$name = $forid.'|'.$id;
		$ids = str_replace(array('/','=','+'),array('','',''),base64_encode($name));
		echo '<div class="custom_con" id="background_scroll"><div class="bg_scroll">';
		if('fixed' == arrrayKeyByVelue($formvalue,$forid,$id,$default)){
			echo '<li><a href="#" onclick="background_scroll(\'fixed\',this,\''.$ids.'\')" title="背景不滚动" class="current"><span class="scroll_no"></span></a></li>';
		}else{
			echo '<li><a href="#" onclick="background_scroll(\'fixed\',this,\''.$ids.'\')"  title="背景不滚动"><span class="scroll_no"></span></a></li>';
		}
		
		if('scroll' == arrrayKeyByVelue($formvalue,$forid,$id,$default)){
			echo '<li><a href="#" onclick="background_scroll(\'scroll\',this,\''.$ids.'\')"  title="背景滚动" class="current"><span class="scroll_yes"></span></a></li>';
		}else{
			echo '<li><a href="#" onclick="background_scroll(\'scroll\',this,\''.$ids.'\')"  title="背景滚动"><span class="scroll_yes"></span></a></li>';
		}

		echo '<input type="hidden" name="'.$name.'" id="'.$ids.'" value="'.arrrayKeyByVelue($formvalue,$forid,$id,$default).'" />';
		echo '</div></div>';
	
	
	}
	
	if($type == 'background'){
		$name = $forid.'|'.$id;
		$ids = str_replace(array('/','=','+'),array('','',''),base64_encode($name));
		echo '<div class="custom_con" id="background_postion"><div class="bg_postion">';
		if('top' == arrrayKeyByVelue($formvalue,$forid,$id,$default)){
			echo '<li><a href="#" onclick="background_postion(\'top\',this,\''.$ids.'\')" title="默认位置" class="current"><span class="top_0"></span></a></li>';
		}else{
			echo '<li><a href="#" onclick="background_postion(\'top\',this,\''.$ids.'\')" title="默认位置"><span class="top_0"></span></a></li>';
		}
		
		if('left top' == arrrayKeyByVelue($formvalue,$forid,$id,$default)){
			echo '<li><a href="#" onclick="background_postion(\'left top\',this,\''.$ids.'\')" title="顶部左侧" class="current"><span class="top_1"></span></a></li>';
		}else{
			echo '<li><a href="#" onclick="background_postion(\'left top\',this,\''.$ids.'\')" title="顶部左侧"><span class="top_1"></span></a></li>';
		}
		
		if('center top' == arrrayKeyByVelue($formvalue,$forid,$id,$default)){
			echo '<li><a href="#" onclick="background_postion(\'center top\',this,\''.$ids.'\')" title="顶部居中" class="current"><span class="top_2"></span></a></li>';
		}else{
			echo '<li><a href="#" onclick="background_postion(\'center top\',this,\''.$ids.'\')" title="顶部居中"><span class="top_2"></span></a></li>';
		}
		
		if('right top' == arrrayKeyByVelue($formvalue,$forid,$id,$default)){
			echo '<li><a href="#" onclick="background_postion(\'right top\',this,\''.$ids.'\')" title="顶部右侧" class="current"><span class="top_3"></span></a></li>';
		}else{
			echo '<li><a href="#" onclick="background_postion(\'right top\',this,\''.$ids.'\')" title="顶部右侧"><span class="top_3"></span></a></li>';
		}
		
		if('left center' == arrrayKeyByVelue($formvalue,$forid,$id,$default)){
			echo '<li><a href="#" onclick="background_postion(\'left center\',this,\''.$ids.'\')" title="中部左侧" class="current"><span class="center_1"></span></a></li>';
		}else{
			echo '<li><a href="#" onclick="background_postion(\'left center\',this,\''.$ids.'\')" title="中部左侧"><span class="center_1"></span></a></li>';
		}
		
		if('center center' == arrrayKeyByVelue($formvalue,$forid,$id,$default)){
			echo '<li><a href="#" onclick="background_postion(\'center center\',this,\''.$ids.'\')" title="中部居中" class="current"><span class="center_2"></span></a></li>';
		}else{
			echo '<li><a href="#" onclick="background_postion(\'center center\',this,\''.$ids.'\')" title="中部居中"><span class="center_2"></span></a></li>';
		}
		
		if('right center' == arrrayKeyByVelue($formvalue,$forid,$id,$default)){
			echo '<li><a href="#" onclick="background_postion(\'right center\',this,\''.$ids.'\')" title="中部右侧" class="current"><span class="center_3"></span></a></li>';
		}else{
			echo '<li><a href="#" onclick="background_postion(\'right center\',this,\''.$ids.'\')" title="中部右侧"><span class="center_3"></span></a></li>';
		}
		
		if('bottom left' == arrrayKeyByVelue($formvalue,$forid,$id,$default)){
			echo '<li><a href="#" onclick="background_postion(\'bottom left\',this,\''.$ids.'\')" title="底部左侧" class="current"><span class="bottom_1"></span></a></li>';
		}else{
			echo '<li><a href="#" onclick="background_postion(\'bottom left\',this,\''.$ids.'\')" title="底部左侧"><span class="bottom_1"></span></a></li>';
		}
		
		if('bottom center' == arrrayKeyByVelue($formvalue,$forid,$id,$default)){
			echo '<li><a href="#" onclick="background_postion(\'bottom center\',this,\''.$ids.'\')" title="底部居中" class="current"><span class="bottom_2"></span></a></li>';
		}else{
			echo '<li><a href="#" onclick="background_postion(\'bottom center\',this,\''.$ids.'\')" title="底部居中"><span class="bottom_2"></span></a></li>';
		}
		
		if('bottom right' == arrrayKeyByVelue($formvalue,$forid,$id,$default)){
			echo '<li><a href="#" onclick="background_postion(\'bottom right\',this,\''.$ids.'\')" title="底部右侧" class="current"><span class="bottom_3"></span></a></li>';
		}else{
			echo '<li><a href="#" onclick="background_postion(\'bottom right\',this,\''.$ids.'\')" title="底部右侧"><span class="bottom_3"></span></a></li>';
		}
		
		echo '<input type="hidden" name="'.$name.'" id="'.$ids.'" value="'.arrrayKeyByVelue($formvalue,$forid,$id,$default).'" />';
		echo '</div></div> ';
	}

	if($type == 'select')
	{
		echo '<select  name="'.$forid.'|'.$id.'">';
		foreach($data as $k=>$d)
		{
			if($forid==$default || $k == arrrayKeyByVelue($formvalue,$forid,$id,$default))
			{
				echo '<option value="'.$k.'" selected="selected">'.$d.'</option>';
			}else{
				echo  '<option value="'.$k.'">'.$d.'</option>';
			}
			echo ' ';
		}
		echo '</select>';
	}

	if($type == 'color')
	{
		echo '<input type="text" name="'.$forid.'|'.$id.'"  value="'.arrrayKeyByVelue($formvalue,$forid,$id,$default).'" class="colorinput" />';
	}

	if($type == 'upload'){
		if($GLOBALS['YB']['theme_upload'] == 1){
			if(arrrayKeyByVelue($formvalue,$forid,$id,$default) != ''){
				echo '';
				echo '<input type="text" name="'.$forid.'|'.$id.'" id="'.base64_encode($forid.'|'.$id).'_input"  value="'.arrrayKeyByVelue($formvalue,$forid,$id,$default).'" class="upload" />';
				echo '<input type="file" name="'.$forid.'|'.$id.'" id="'.base64_encode($forid.'|'.$id).'_upload"  value="" class="upload" style="display:none" /> ';
			}else{
				echo '<div class="custom_upload"> <span></span><input type="file" name="'.$forid.'|'.$id.'"  value="" class="upload" /></div>';
			}
		}else{
			echo '系统没有开启用户上传背景';
		}
	}
}
spAddViewFunction('themecustom','themecustom');

function theme_page_limit($params){
	$num = empty($params['num']) ? $params['num'] : 30 ;
	$default = $params['default'];
	for($i=1;$i<=$num;$i++){
	
		if($i == $default){
			echo '<option value="'.$i.'" selected="selected">'.$i.'</option>';
		}else{
			echo '<option value="'.$i.'">'.$i.'</option>';
		}
	}
}
spAddViewFunction('theme_page_limit','theme_page_limit');

//通过数组的键名查到值
function arrrayKeyByVelue($formvalue,$forid,$id,$default)
{
	$fid = $forid.'|'.$id;
	if($formvalue[$fid])
	{
		return $formvalue[$fid];
	}else{
		return $default;
	}
}

 function ybtime($params)
{
	$timestamp = $params['time'];
	if($params['format'] ===null)
	{
		$dateformat = 'Y年m月d日, H:i';
	}else{
		$dateformat = $params['format'];
	}
	  $limit = time() - $timestamp;
	  if($limit<60){
	 	 $promptStr='刚刚';
	  }elseif($limit< 3600){
	 	 $promptStr=floor($limit/60).'分钟前';
	  }elseif($limit>=3600 && $limit<86400){
		  $promptStr=floor($limit/3600).'小时前';
	  }elseif($limit>=86400 && $limit<2592000){
	 	 $promptStr=floor($limit/86400).'天前';
	  }elseif($limit >= 2592000 && $limit < 31104000){
	 	 $promptStr=floor($limit/2592000).'个月前';
	  }else{
		 $promtStr = date($dateformat, $timestamp);
	  }
	return $promptStr;
}
spAddViewFunction('ybtime','ybtime');



/*404页面*/
function err404($msg)
{
	global $spConfig;
	header("HTTP/1.0 404 Not Found");
	$uri = 'http://'.$_SERVER['HTTP_HOST']; 
	$tpl = $uri .'/'. $spConfig['view']['config']['template_dir'];

	include APP_PATH.'/'.$spConfig['view']['config']['template_dir'].'/404.html';
	exit;
}

if(!function_exists('mime_content_type')) {

    function mime_content_type($filename) {

        $mime_types = array(

            'txt' => 'text/plain',
            'htm' => 'text/html',
            'html' => 'text/html',
            'php' => 'text/html',
            'css' => 'text/css',
            'js' => 'application/javascript',
            'json' => 'application/json',
            'xml' => 'application/xml',
            'swf' => 'application/x-shockwave-flash',
            'flv' => 'video/x-flv',

            // images
            'png' => 'image/png',
            'jpe' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'jpg' => 'image/jpeg',
            'gif' => 'image/gif',
            'bmp' => 'image/bmp',
            'ico' => 'image/vnd.microsoft.icon',
            'tiff' => 'image/tiff',
            'tif' => 'image/tiff',
            'svg' => 'image/svg+xml',
            'svgz' => 'image/svg+xml',

            // archives
            'zip' => 'application/zip',
            'rar' => 'application/x-rar-compressed',
            'exe' => 'application/x-msdownload',
            'msi' => 'application/x-msdownload',
            'cab' => 'application/vnd.ms-cab-compressed',

            // audio/video
            'mp3' => 'audio/mpeg',
            'qt' => 'video/quicktime',
            'mov' => 'video/quicktime',

            // adobe
            'pdf' => 'application/pdf',
            'psd' => 'image/vnd.adobe.photoshop',
            'ai' => 'application/postscript',
            'eps' => 'application/postscript',
            'ps' => 'application/postscript',

            // ms office
            'doc' => 'application/msword',
            'rtf' => 'application/rtf',
            'xls' => 'application/vnd.ms-excel',
            'ppt' => 'application/vnd.ms-powerpoint',

            // open office
            'odt' => 'application/vnd.oasis.opendocument.text',
            'ods' => 'application/vnd.oasis.opendocument.spreadsheet',
        );

        $ext = strtolower(array_pop(explode('.',$filename)));
        if (array_key_exists($ext, $mime_types)) {
            return $mime_types[$ext];
        }
        elseif (function_exists('finfo_open')) {
            $finfo = finfo_open(FILEINFO_MIME);
            $mimetype = finfo_file($finfo, $filename);
            finfo_close($finfo);
            return $mimetype;
        }
        else {
            return 'application/octet-stream';
        }
    }
}


/*将正文和属性剥离出来分别存放*/
function split_attribute($body)
{
	$body = preg_replace('/[\n\r\t]/', '', $body);
	preg_match("/\[attribute\](.*?)\[\/attribute\]/i", $body, $matches);
	if($matches[0]){ $body = str_replace($matches[0],'',$body);}
	if($matches[1]){ $data['attr'] = mb_unserialize($matches[1]);}else{$data['attr'] = '';}
	preg_match("/\[repto\](.*?)\[\/repto\]/i", $body, $matches);
	if($matches[0]){ $body = str_replace($matches[0],'',$body);}
	if($matches[1]){ $data['repto'] = mb_unserialize($matches[1]);}else{$data['repto'] = '';}

	$data['body'] = $body;
	return $data;
}
function mb_unserialize($serial_str) {
    $serial_str= preg_replace('!s:(\d+):"(.*?)";!se', "'s:'.strlen('$2').':\"$2\";'", $serial_str );
    $serial_str= str_replace("\r", "", $serial_str);     
    return unserialize($serial_str);
}




function password_encode($pwd,$salt)
{
	 $encodestring = $GLOBALS['G_SP']['encodestring'];
	 return md5(md5($pwd.$encodestring.$salt));
}


/*数组分页截断*/
function arrayPage($arr,$num)
{
	for ($i=0;$i<$num;$i++)
	{
		$data[$i] = $arr[$i];
	}
	return $data;
}

/*针对UTF-8的strlen*/
function utf8_strlen($string = null) {
	preg_match_all("/./us", $string, $match);
	return count($match[0]);
}

/*针对UTF-8的sub_str*/
/**********************************
  * 截取字符串(UTF-8)
  *
  * @param string $str 原始字符串
  * @param $position 开始截取位置
  * @param $length 需要截取的偏移量
  * @return string 截取的字符串
  * $type=1 等于1时末尾加'...'不然不加
 *********************************/
 function utf8_substr($str, $position, $length,$type=1){
  $startPos = strlen($str);
  $startByte = 0;
  $endPos = strlen($str);
  $count = 0;
  for($i=0; $i<strlen($str); $i++){
   if($count>=$position && $startPos>$i){
    $startPos = $i;
    $startByte = $count;
   }
   if(($count-$startByte) >= $length) {
    $endPos = $i;
    break;
   }
   $value = ord($str[$i]);
   if($value > 127){
    $count++;
    if($value>=192 && $value<=223) $i++;
    elseif($value>=224 && $value<=239) $i = $i + 2;
    elseif($value>=240 && $value<=247) $i = $i + 3;
    else return self::raiseError("\"$str\" Not a UTF-8 compatible string", 0, __CLASS__, __METHOD__, __FILE__, __LINE__);
   }
   $count++;

  }
  if($type==1 && ($endPos-6)>$length){
   return substr($str, $startPos, $endPos-$startPos)."...";
       }else{
   return substr($str, $startPos, $endPos-$startPos);
    }

 }


 /*处理不同浏览器下get 中文是否为gb2312 或者utf8的问题*/
 function tagEncodeParse($tag){
	if(is_utf8($tag)){
	return preg_replace('/\s/','', trim( urldecode($tag) ));
	}
	return preg_replace('/\s/','', trim( urldecode(iconv("GB2312","UTF-8",$tag)) ));
 }

function is_utf8($string) {
	   return preg_match('%^(?:
	   [\x09\x0A\x0D\x20-\x7E]            # ASCII
		| [\xC2-\xDF][\x80-\xBF]             # non-overlong 2-byte
		|  \xE0[\xA0-\xBF][\x80-\xBF]        # excluding overlongs
		| [\xE1-\xEC\xEE\xEF][\x80-\xBF]{2}  # straight 3-bytes
		|  \xED[\x80-\x9F][\x80-\xBF]        # excluding surrogates
		 \xF0[\x90-\xBF][\x80-\xBF]{2}     # planes 1-3
		| [\xF1-\xF3][\x80-\xBF]{3}          # planes 4-15
		|  \xF4[\x80-\x8F][\x80-\xBF]{2}     # plane 16
		 )*$%xs', $string);
}


/*过滤不安全因素*/
function strreplaces($str)
{
		$farr = array(
		"/\s+/",                                                                                            //过滤多余的空白
		"/<(\/?)(script|i?frame|object|html|body|title|link|meta|div|\?|\%)([^>]*?)>/isU",  //过滤tag
		"/(<[^>]*)on[a-zA-Z]+\s*=([^>]*>)/isU",                                      //过滤javascript的on事件
		);
		$tarr = array(
		" ",
		"",           //＜\\1\\2\\3＞如果要直接清除不安全的标签，这里可以留空
		"\\1\\2",
		);

		$str = preg_replace( $farr,$tarr,$str);
		return $str;
}


function validateEmail($email)
{
   $isValid = true;
   $atIndex = strrpos($email, "@");
   if (is_bool($atIndex) && !$atIndex)
   {
      $isValid = false;
   }
   else
   {
      $domain = substr($email, $atIndex+1);
      $local = substr($email, 0, $atIndex);
      $localLen = strlen($local);
      $domainLen = strlen($domain);
      if ($localLen < 1 || $localLen > 64)
      {
         $isValid = false;
      }
      else if ($domainLen < 1 || $domainLen > 255)
      {
         $isValid = false;
      }
      else if ($local[0] == '.' || $local[$localLen-1] == '.')
      {
         $isValid = false;
      }
      else if (preg_match('/\\.\\./', $local))
      {
         $isValid = false;
      }
      else if (!preg_match('/^[A-Za-z0-9\\-\\.]+$/', $domain))
      {
         $isValid = false;
      }
      else if (preg_match('/\\.\\./', $domain))
      {
         $isValid = false;
      }
      else if(!preg_match('/^(\\\\.|[A-Za-z0-9!#%&`_=\\/$\'*+?^{}|~.-])+$/',
                 str_replace("\\\\","",$local)))
      {
         if (!preg_match('/^"(\\\\"|[^"])+"$/',
             str_replace("\\\\","",$local)))
         {
            $isValid = false;
         }
      }
	  if(function_exists('checkdnsrr')){
		  if ($isValid && !(checkdnsrr($domain,"MX") || checkdnsrr($domain,"A")))
		  {
			 $isValid = false;
		  }
	  }
   }
   return $isValid;
}

function ip2name($ip)
{
	$url = "http://www.youdao.com/smartresult-xml/search.s?type=ip&q=".$ip;
	$doc = new DOMDocument();
	$doc->load($url);
	$smartresult = $doc->getElementsByTagName("product");
	foreach($smartresult as $product)
	{
		$locations = $product->getElementsByTagName("location");
		$location = $locations->item(0)->nodeValue;
	}
		if($location != "")
	{
		$local = explode(' ',$location);
		return $local[0];
	}else{
		return '火星';
	}
}

function getIP() {
	return $_SERVER['REMOTE_ADDR'];
}
