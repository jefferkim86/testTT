<?php
/////////////////////////////////////////////////////////////////
//云边开源轻博, Copyright (C)   2010 - 2011  qing.thinksaas.cn 
//EMAIL:nxfte@qq.com QQ:234027573                              
//$Id: db_notice.php 1309 2012-07-22 03:21:13Z anythink $ 

//通知发送
//系统通知级别 0 用户私信  1 评论通知  2 系统通知 3关注通知
class db_notice extends ybModel  
{  
	var $pk = "id"; 
	var $table = "notice"; // 数据表的名称
	var $linker = array(  
		 array(  
             'type' => 'hasone',   // 关联类型，这里是一对一关联  
            'map' => 'user',    // 关联的标识  
             'mapkey' => 'uid', // 本表与对应表关联的字段名  
             'fclass' => 'db_member', // 对应表的类名  
            'fkey' => 'uid',    // 对应表中关联的字段名
			'field'=>'uid,username,domain ',//你要限制的字段     
            'enabled' => true     // 启用关联  
        )
		

    );  

	/*评论回复列表*/
	function noticeReplay($row,$title,$msg='')
	{
		$this->create(array('uid'=>$_SESSION['uid'],'sys'=>'1','foruid'=>$row['foruid'],'title'=>$title,'info'=>$msg,'time'=>time(),'location'=>'blog|'.$row['bid'],'time'=>time()));
		$this->sendReplay($_SESSION['uid'],$row['foruid'],$msg,$row['bid']);
	}

	/*关注通知*/
	function noticeFollow($uid,$imuid,$is=1){
		if($is ==1){
			$this->noticeReady($imuid,3,$uid,'关注通知','关注了你','user|'.$uid);
			$this->sendFollow($uid,$imuid);
		}else{
			$this->noticeReady($imuid,3,$uid,'关注通知','互相关注','user|'.$uid);
			$this->sendFollow($uid,$imuid);
		}
	}
	
	/*审核提示发送*/
	function blogverify($uid){
		$title = '发布内容通知';
		$info = '您发布的内容正在人工审核，在审核完成之前将不会在首页显示。';
		$this->noticeReady(0,2,$uid,$title,$info,'');
	}
	
	/*creaty ready*/
	/*location formay gotomod|id*/
	private function noticeReady($uid,$type,$imuid,$title,$info,$location)
	{
		return $this->create(array('uid'=>$uid,'sys'=>$type,'foruid'=>$imuid,'title'=>$title,'info'=>$info,'location'=>$location,'time'=>time()));
	}
	
	
	/*	给用户发送系统邮件
		params $uid_array array
	*/
	function noticeSystem($uid_array,$msg,$imuid){
		foreach($uid_array as $uid){
			$this->noticeReady($uid,2,$imuid,'系统通知',$msg,'user|'.$uid);
		}
	}
	
	/*发送评论邮件*/
	function sendReplay($imuid,$uid,$msga,$bid)
	{
		if($uid == $_SESSION['uid']) {return true;}
		$rs = spClass('db_member')->find(array('uid'=>$uid));
		$for = spClass('db_member')->find(array('uid'=>$imuid));
		if($rs['m_rep'] != 1) return true;
		$title = '亲爱'.$rs['username'].',您在'.$GLOBALS['YB']['site_title'].'的轻博客回复通知';
		$uri = trim(dirname($GLOBALS['G_SP']['url']['url_path_base']),'\/\\');
		if( '' == $uri ){ $uri = 'http://'.$_SERVER['HTTP_HOST']; 	}else{ $uri = 'http://'.$_SERVER['HTTP_HOST'].'/'.$uri; }
		@preg_match("/\[at=(.*?)](.*?)\[\/at\]/i",$msga,$msg); //$msg[1]
		$msg = str_replace($msg[0],'<a href="'.$uri['dirname'].goUserHome(array('uid'=>$msg[1])).'" target="_blank">'.$msg[2].'</a>',$msga); //处理邮件中的at
		$tpl = '<h3>亲爱的'.$rs['username'].'：</h3>
			    <table width="100%" cellpadding="0" cellspacing="0" border="0" >
				    <tr>
					    <td width="50" valign="top"><img src="'.$uri.avatar(array('uid'=>$imuid,'size'=>'small')).'" align="bottom"/></td>
						<td>
						    <p>'.$for['username'].'回复了您的轻博客：</p>
						    <p>"'.$msg.'"</p><a href="'.$uri.goUserBlog(array('bid'=>$bid)).'" target="_blank">你可以立即查看您的轻博</a></p>
						</td>
					</tr>
				</table>';
				
		$body = $this->sendmailTemplate($title,$tpl);
		$this->emailReady($rs['email'],$title,$body);
	}
	
	/*发送注册邮件*/
	function sendRegisgtr($uid)
	{
		$rs = spClass('db_member')->find(array('uid'=>$uid));
		$title = '亲爱的会员,这是一封来自'.$GLOBALS['YB']['site_title'].'的注册通知';
		$tpl = '<h3>亲爱的'.$rs['username'].'：</h3>
			    <p>您使用邮箱：'.$rs['email'].',在'.$GLOBALS['YB']['site_title'].'注册,祝您使用愉快。</p><p>'.date('Y-m-d H:i',time()).'</p>';
		$body = $this->sendmailTemplate($title,$tpl);
		$this->emailReady($rs['email'],$title,$body);
	}
	
	
	/*发送找会密码邮件*/
	function sendFindPwd($row,$url)
	{
		$rs = spClass('db_member')->find(array('uid'=>$row['uid']));
		$title = '亲爱的会员,这是一封来自'.$GLOBALS['YB']['site_title'].'的密码找回通知';
		$tpl = '<h3>亲爱的'.$rs['username'].'：</h3>
			    <p>您使用邮箱：'.$rs['email'].',在'.$GLOBALS['YB']['site_title'].'上执行了找回密码操作。</p>
		<p>请您打开或复制下面的地址来验证您的操作，然后重置您的密码</p>
		<p class="red"><a href="'.$url.'" target="_blank">'.$url.'</a></p>
		<p>您的本次验证操作将在'.date('Y-m-d H:i',$row['time']).' 后过期，过期后请重新执行密码找回步骤</p>
		<p>如果不是您发起的密码找回请求或者您不想找回密码请忽略本邮件</p>';
		$body = $this->sendmailTemplate($title,$tpl);
		$this->emailReady($rs['email'],$title,$body);
	}
	
	/*发送私信*/
	function sendPm($imuid,$uid,$info)
	{
		$rs = spClass('db_member')->find(array('uid'=>$uid));
		$for = spClass('db_member')->find(array('uid'=>$imuid));
		if($rs['m_pm'] != 1) return true;
		$title = '亲爱'.$rs['username'].',您收到了来自'.$GLOBALS['YB']['site_title'].'的私信通知';
		$uri = trim(dirname($GLOBALS['G_SP']['url']['url_path_base']),'\/\\');
		if( '' == $uri ){ $uri = 'http://'.$_SERVER['HTTP_HOST']; 	}else{ $uri = 'http://'.$_SERVER['HTTP_HOST'].'/'.$uri; }
		$tpl = '<h3>亲爱的'.$rs['username'].'：</h3>
			    <table width="100%" cellpadding="0" cellspacing="0" border="0" >
				    <tr>
					    <td width="50" valign="top">
						<img src="'.$uri.avatar(array('uid'=>$imuid,'size'=>'small')).'" /></td>
						<td>
						    <p>'.$for['username'].',对您说：</p>
						    <p>"'.$info.'" <a href="'.$uri.spUrl('user','pm',array('look'=>$imuid)).'" target="_blank">你可以立即给Ta回复</a></p>
							<p>'.date('Y-m-d H:i',time()).'</p>
						</td>
					</tr>
				</table>';
		$body = $this->sendmailTemplate($title,$tpl);
		$this->emailReady($rs['email'],$title,$body);
	
	}
	
	/*发送关注邮件*/
	function sendFollow($uid,$imuid)
	{
		$rs = spClass('db_member')->find(array('uid'=>$uid));
		$for = spClass('db_member')->find(array('uid'=>$imuid));
		if($rs['m_fow'] != 1) return true;
		$title = '亲爱'.$rs['username'].',您收到了来自'.$GLOBALS['YB']['site_title'].'的关注通知';
		$uri = trim(dirname($GLOBALS['G_SP']['url']['url_path_base']),'\/\\');
		if( '' == $uri ){ $uri = 'http://'.$_SERVER['HTTP_HOST']; 	}else{ $uri = 'http://'.$_SERVER['HTTP_HOST'].'/'.$uri; }
		$tpl = '<h3>亲爱的'.$rs['username'].'：</h3>
			    <table width="100%" cellpadding="0" cellspacing="0" border="0" >
				    <tr>
					    <td width="50" valign="top">
						<img src="'.$uri.avatar(array('uid'=>$imuid,'size'=>'middle')).'"/></td>
						<td>
						    <p>'.$for['username'].',关注了你。<a href="'.$uri.goUserHome(array('domain'=>'home','uid'=>$imuid)).'" target="_blank">你可以去看看Ta哟</a></p>
							<p>'.date('Y-m-d H:i',time()).'</p>
						</td>
					</tr>
				</table>';
		$body = $this->sendmailTemplate($title,$tpl);
		$this->emailReady($rs['email'],$title,$body);
	}
	
	
	/*获取我的所有通知*/
	function findByall($uid){
		return  $this->spLinker()->findAll(array('foruid'=>$uid,'isread'=>0),'time desc');
	}

	/*测试发信*/
	function sendMailTest()
	{
		$to =  $GLOBALS['YB']['mail_from'];
		$title = '这是一封测试邮件';
		$tpl = $this->sendmailTemplate($title,'您看到这封邮件标示您的邮件服务器配置正确，可以启用邮件发送功能。');
		$this->emailReady($to,$title,$tpl);
	}
	
	
	function sendmailTemplate($title,$body)
	{
		$yb =  $GLOBALS['YB'];
		$tpl = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>'.$title.'</title>
</head>
<body style="font-family:"Microsoft Yahei","Arail"; font-size:12px; color:#666; background-color:#e3e3e3;">
    <div style="border-bottom:2px solid #ccc\9; width:700px; margin:0 auto; -moz-border-radius:8px; -webkit-border-radius:8px; border-radius:8px; -moz-box-shadow:0px 1px 3px #bbb; -webkit-box-shadow:0px 1px 3px #bbb; box-shadow:0px 1px 3px #bbb; padding:0; background-color:#fff; overflow:hidden; ">
	    <div style="width:670px; padding:15px; margin:0;">
		    <div><img src="'.$yb['url'].'/tplv2/image/logo.png" alt="logo" border="0" /></div>
			<h2 style="font-size:24px;">'.$title.'</h2>
			<div style="line-height:22px; width:100%; margin:0;">'.$body.'</div>
			<div style="width:630px; padding:5px 10px; margin:10px 9px 0; line-height:20px; background-color:#FFFF99; border:1px #ccc solid; -moz-border-radius:5px; -webkit-border-radius:5px; border-radius:5px; color:#999;">取消邮件通知请在个人设置中取消勾选相关通知，请不要回复本系统邮件。</div> 
		</div>
		
		<div style="width:680px; padding:5px 10px; margin:0; color:#999; background-color:#eee; text-shadow:0px 1px 0px #fff;">
		    <div style="float:right">Powered by <a style="color:#666;" href="'.$yb['url'].'" target="_blank">'.$yb['soft'].'</a> '.$yb['version'].' Copyright @2011-'.(date('Y',time())+1).'</div>
			<div style="float:left">'.$yb['site_title'].' <a style="color:#666;" href="'.$yb['uri'].'" target="_blank">'.$yb['uri'].'</a></div>
			<div style="clear:both"></div>
		</div>
	
	</div>
</body>
</html>';
		return $tpl;
	}
	

	

	
	/*send mail ready*/
	private function emailReady($to,$title,$body)
	{
	try{
		$yb =  $GLOBALS['YB'];
		$mail = spClass('PHPMailer');
		$mail = new PHPMailer(); 
		$mail->Mailer = 'smtp';
		$mail->CharSet = "UTF-8";
		$mail->Encoding = "base64";
		$mail->IsSMTP();                         
		$mail->SMTPAuth   = true;  
	
		$mail->SMTPSecure = 'ss1'; 		
		$mail->Port       = $yb['mail_port'];                   
		$mail->Host       = $yb['mail_host']; 
		$mail->Username   = $yb['mail_user'];     
		$mail->Password   = $yb['mail_pwd'];     
		$mail->From       = $yb['mail_from'];
		$mail->FromName   = $yb['mail_fromname'];
		if($yb['mail_debug'] == 1){ $mail->SMTPDebug  =  True;}
		
		$mail->AddAddress($to);
		$mail->Subject    = $title;
		$mail->MsgHTML($body);
		$mail->IsHTML(true); // send as HTML
		if($yb['mail_open'] == 1){
			if(!@$mail->Send()){
				$this->mailErrorLog($mail->ErrorInfo);
			}
		}
		} catch (phpmailerException $e) {    
			$this->mailErrorLog($mail->errorMessage());   
		}    

	}
	
	private function mailErrorLog($log){
		$file = $GLOBALS['G_SP']['sp_cache'] .'/'. 'mailLog.log';
		file_put_contents($file,$log,'FILE_APPEND');
	}
}
?>