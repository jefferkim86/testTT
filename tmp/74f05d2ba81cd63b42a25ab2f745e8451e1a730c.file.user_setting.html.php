<?php /* Smarty version Smarty-3.0.6, created on 2014-07-16 23:34:50
         compiled from "tplv2/user_setting.html" */ ?>
<?php /*%%SmartyHeaderCode:72896760053c69b9a657833-68879189%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '74f05d2ba81cd63b42a25ab2f745e8451e1a730c' => 
    array (
      0 => 'tplv2/user_setting.html',
      1 => 1405524888,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '72896760053c69b9a657833-68879189',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include '/Users/jinjianfeng/Documents/work/tuitui/init/Drivers/Smarty/plugins/modifier.date_format.php';
?><?php $_template = new Smarty_Internal_Template("require_header.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('addcss','yes');$_template->assign('editor','yes'); echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

<script>
$(document).ready(function(){

 // var jUpload=$('#upload_photo input');
	// 	jUpload.mousedown().change(function(){
	// 		var $this=$(this),sExt=$this.attr('ext'),$prev=$this.prev();
	// 		if($this.val().match(new RegExp('\.('+sExt.replace(/,/g,'|')+')$','i'))){
	// 			$('#uploading').toggle();
	// 			var upload=new textbody.html4Upload(this,urlpath+'/index.php?c=user&a=upavatar',function(sText){
	// 				$('#uploading').toggle();
	// 				var data=Object,bOK=false;
				
	// 				try{data=eval('('+sText+')');}catch(ex){alert(sText)};
	// 				if(!data.err){
	// 					var uid = $('#big_face').attr('rel');						
	// 					$('#big_face').attr('src',urlpath+"/avatar.php?uid="+uid+"&size=big&random="+new Date());
	// 					$('#middle_face').attr('src',urlpath+"/avatar.php?uid="+uid+"&size=middle&random="+new Date());
	// 					$('#small_face').attr('src',urlpath+"/avatar.php?uid="+uid+"&size=small&random="+new Date());
	// 					tips('头像更新成功');
						
	// 				}else{
	// 					tips(data.err);
	// 				}
	// 			});
				
	// 			upload.start();
	// 		}
	// 		else alert('请上传'+sExt+'格式文件');
	// 	});
		
		
/*保存个人资料修*/
	$('#submit_baseinfo').click(function(){
		$('#pb-submiting-tip,#submit_baseinfo,#cancel').toggle();
		var tag_str='';
		$('#system-tag-list .current').each(function(){  
			tag_str  += $(this).attr('tag') + ',' +$(this).attr('tid') + '|';
		})

		 chks = /^[a-zA-Z]{1}([a-zA-Z0-9]|[._]){1,15}$/;
		if(!chks.exec($('#domain').val() )){
		$('#pb-submiting-tip,#submit_baseinfo,#cancel').toggle();
		tips('个性域名不符合要求'); return false;
		}
		var args = {
			niname : $('#niname').val(),
			domain : $('#domain').val(),
			sign   : $('#textarea').val(),
			m_rep  : $('#m_rep').is(":checked") ? 1 : 0,
			m_fows : $('#m_fow').is(":checked") ? 1 : 0,
			m_pms  : $('#m_pm').is(":checked") ? 1 : 0,
			tag    : tag_str
		}
		$.ybAPI('user','save_baseinfo',args,function(data){
			if(data.status == 0 ){
				tips(data.msg);
				$('#pb-submiting-tip,#submit_baseinfo,#cancel').toggle();
			}else{
				$('#pb-submiting-tip,#submit_baseinfo,#cancel').toggle();
				tips('资料保存成功');
			}
		});
	});
	
	$('#submit_password').click(function(){
		var args = {
			pwd : $('#pwd').val(),
			pwd1: $('#pwd1').val(),
			pwd2: $('#pwd2').val()
		}
		if(args.pwd == '' || args.pwd1 == ''){
			tips('原始密码或新密码不能为空');
			return false;
		}
		if(args.pwd1 != args.pwd2){
			tips('两次密码输入不一致');
			return false;
		}
		if(args.pwd1.length  < 6){
			tips('为了您的安全,密码最短为6位');
			return false;
		}
		$('#submit_loading,#submit_password').toggle();
		$.ybAPI('user','save_password',args,function(data){
			console.log(data);
			if(data.status == 1 ){
				alert('密码修改成功,您需要立即重新登录来保障您的安全');
				window.location.reload();
			}else{
				$('#submit_loading,#submit_password').toggle();
				tips(data.msg);
			}
		});		
	});
});
</script>               


<div id="user_index">
    <div id="user_tab">
	    <div class="set_theme"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'customize'),$_smarty_tpl);?>
"><span>主题管理</span></a></div>
	    <li id="tab_person" class="curr"><a href="javascript:void(0)" onclick="SelectPerson(this)">个人资料</a><div class="curpoint"></div></li>
		<li id="tab_head"><a href="javascript:void(0)" onclick="SelectHead(this)">我的头像</a><div class="curpoint"></div></li>
		<?php if ($_smarty_tpl->getVariable('yb')->value['openlogin_qq_open']==1||$_smarty_tpl->getVariable('yb')->value['openlogin_weib_open']==1){?><li id="tab_invite"><a href="javascript:void(0)" onclick="SelectInvite(this)">账号绑定</a><div class="curpoint"></div></li><?php }?>
		<li id="tab_safe"><a href="javascript:void(0)" onclick="SelectSafe(this)">密码修改</a><div class="curpoint"></div></li>
		<div class="clear"></div>
	</div>
	
    <div id="conPerson">
	    <div class="con_table">
		    <div class="user_right">
			    <input type="text"  class="iptname"  value="<?php echo $_smarty_tpl->getVariable('users')->value['email'];?>
" disabled="disabled">
			</div>
	        <div class="user_left">我的账号</div>
		    <div class="clear"></div>
		</div>
		
		<div class="con_table">
		    <div class="user_right">
			    <input type="text" name="niname" id="niname" class="iptni"  value="<?php echo $_smarty_tpl->getVariable('users')->value['username'];?>
"><span class="info">名称唯一,可修改</span>
			</div>
	        <div class="user_left">我的昵称</div>
		    <div class="clear"></div>
		</div>
		
		<div class="con_table">
		    <div class="user_right">
			     <input type="text" class="iptname"  value="<?php echo $_smarty_tpl->getVariable('url')->value;?>
" disabled="disabled" >
				 <input type="text" name="domain" id="domain" class="ipt"  value="<?php echo $_smarty_tpl->getVariable('users')->value['domain'];?>
">
				 <span class="info">名称唯一,可修改</span>
			</div>
	        <div class="user_left">个性域名</div>
		    <div class="clear"></div>
		</div>
		
		<!-- <div class="con_table">
		    <div class="user_right">
			    
			    <ul class="clearfix" id="system-tag-list">
				    <?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('systag')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value){
?>
					<?php if (in_array($_smarty_tpl->tpl_vars['d']->value['catename'],$_smarty_tpl->getVariable('blogtag')->value)){?>
			        <li tag="<?php echo $_smarty_tpl->tpl_vars['d']->value['catename'];?>
" tid="<?php echo $_smarty_tpl->tpl_vars['d']->value['cid'];?>
" class="current"><a href="javascript:void(0)" onclick="setFolowTag(this)"><?php echo $_smarty_tpl->tpl_vars['d']->value['catename'];?>
</a></li>
					<?php }else{ ?>
					<li tag="<?php echo $_smarty_tpl->tpl_vars['d']->value['catename'];?>
" tid="<?php echo $_smarty_tpl->tpl_vars['d']->value['cid'];?>
"><a href="javascript:void(0)" onclick="setFolowTag(this)"><?php echo $_smarty_tpl->tpl_vars['d']->value['catename'];?>
</a></li>
					<?php }?>
			        <?php }} ?>
					
				</ul>
				
			</div>
			
	        <div class="user_left">关注分类</div>
		    <div class="clear"></div>
		</div> -->
		
		<div class="con_table">
		    <div class="user_right">
			    <textarea name="textarea" id="textarea" style="width:100%; height:200px" class="pb-input-text" ><?php echo $_smarty_tpl->getVariable('users')->value['sign'];?>
</textarea>
                <input type="hidden" name="tag" id="tag" value="" />
				 
			</div>
	        <div class="user_left">个性签名</div>
		    <div class="clear"></div>
		</div>
		
		<!-- <div class="con_table">
		    <div class="user_right">
			    <h3>请允许以下方式邮件通知我</h3>
				<div class="check_con">
					<label>
					<?php if ($_smarty_tpl->getVariable('users')->value['m_rep']==1){?>
						<input name="m_rep" id="m_rep" type="checkbox" value="1" checked="checked" />
					<?php }else{ ?>
						<input name="m_rep" id="m_rep" type="checkbox" value="0"/>
					<?php }?>
						
						<span>回复通知</span>
					</label>
					<label>
					<?php if ($_smarty_tpl->getVariable('users')->value['m_fow']==1){?>
						<input name="m_fow" id="m_fow" type="checkbox" value="1" checked="checked" />
					<?php }else{ ?>
						<input name="m_fow" id="m_fow" type="checkbox" value="0"/>
					<?php }?>
						<span>关注通知</span>
					</label>
					<label>
					<?php if ($_smarty_tpl->getVariable('users')->value['m_pm']==1){?>
						<input name="m_pm" id="m_pm" type="checkbox" value="1" checked="checked" />
					<?php }else{ ?>
						<input name="m_pm" id="m_pm" type="checkbox" value="0"/>
					<?php }?>
						<span>私信通知</span>
					</label>
				</div>
				 
			</div>
	        <div class="user_left">邮件通知</div>
		    <div class="clear"></div>
		</div> -->

		
	</div>
	
	<div id="conHead" style="display:none">
	  
	     <div class="con_table">
		    <div class="user_right">
			    
                
                <div class="head_upload">
					    <span>
						    <div class="uploadhead" id="upload_photo"><span></span><input type="file" size="1" name="filedata" ext="jpg|jpeg|png" /></div>
						</span>
						<span id="uploading" style="display:none">正在上传...</span>
						<div class="clear"></div>
				</div>
                    
                    
			    <div class="head_img">
				    <img name="" id="big_face" rel="<?php echo $_SESSION['uid'];?>
" src="<?php echo avatar(array('uid'=>$_SESSION['uid'],'size'=>'big','time'=>1),$_smarty_tpl);?>
" alt="当前头像" />
				</div>
                
                <div class="head_img">
				    <img name="" id="middle_face" src="<?php echo avatar(array('uid'=>$_SESSION['uid'],'size'=>'middle','time'=>1),$_smarty_tpl);?>
" alt="当前头像"  />
				</div>
                
                <div class="head_img_small">
				    <img name=""  id="small_face" src="<?php echo avatar(array('uid'=>$_SESSION['uid'],'size'=>'small','time'=>1),$_smarty_tpl);?>
" alt="当前头像"  />
				</div>



				


<style type="text/css">
/*上传文件的css*/
.btn {
	float:left;
	position: relative;
	overflow:hidden;
	margin-right:4px;
	display:inline-block;
*display:inline;
	padding:4px 10px 4px;
	font-size:14px;
	line-height:18px;
*line-height:20px;
	color:#fff;
	text-align:center;
	vertical-align:middle;
	cursor:pointer;
	background-color:#5bb75b;
	border:1px solid #cccccc;
	border-color:#e6e6e6 #e6e6e6 #bfbfbf;
	border-bottom-color:#b3b3b3;
	-webkit-border-radius:4px;
	-moz-border-radius:4px;
	border-radius:4px;
}
.btn input {
	position: absolute;
	top: 0;
	right: 0;
	margin: 0;
	border: solid transparent;
	opacity:0;
	filter:alpha(opacity=0);
	cursor: pointer;
}
.Intercbtn {
	float:left;
	background-color:#e38102;
	color:#FFF;
	padding:6px 10px 6px 10px;
	border:0;
}
.progress {
	position:relative;
	margin-left:100px;
	margin-top:-24px;
	width:200px;
	padding: 1px;
	border-radius:3px;
	display:none
}
.bar {
	background-color: green;
	display:block;
	width:0%;
	height:20px;
	border-radius: 3px;
}
.percent {
	position:absolute;
	height:20px;
	display:inline-block;
	top:3px;
	left:2%;
	color:#fff
}
.files {
	height:22px;
	line-height:22px;
	margin:10px 0
}
.delimg {
	margin-left:20px;
	color:#090;
	cursor:pointer
}
</style>



<!-- 新头像系统 -->
<form action="Modifyface.php" method="post" onSubmit="return checkCoords();">
  <div class="demo">
    <div class="btn"> <span>上传图片</span>
      <input id="fileupload" size="1" type="file" name="filedata" ext="jpg|jpeg|png"/>
    </div>
    <input type="submit" value="确认保存" class="Intercbtn" />
    <div class="progress"> <span class="bar"></span><span class="percent">0%</span > </div>
    <div class="files"></div>
    <div id="showimg"><img src="http://localhost/php-Jcrop/images/01.jpg" /><!--初始图片--></div>
  </div>
  <input type="hidden" id="src" name="src" value="" />
  <input type="hidden" id="x" name="x" value="0" />
  <input type="hidden" id="y" name="y" value="0" />
  <input type="hidden" id="w" name="w" value="240" />
  <input type="hidden" id="h" name="h" value="240" />
</form>

<script>
	$(document).ready(function(){
		var bar = $('.bar');
		var percent = $('.percent');
		var showimg = $('#showimg');
		var progress = $(".progress");
		var files = $(".files");
		var btn = $(".btn span");
		$("#fileupload").wrap("<form id='myupload' action='"+urlpath+"/index.php?c=user&a=upavatar' method='post' enctype='multipart/form-data'></form>");
		$("#fileupload").change(function(){  //选择文件
			$("#myupload").ajaxSubmit({
				//dataType:  'json',	//数据格式为json 
				beforeSend: function() {	//开始上传 
					showimg.empty();	//清空显示的图片
					progress.show();	//显示进度条
					var percentVal = '0%';	//开始进度为0%
					bar.width(percentVal);	//进度条的宽度
					percent.html(percentVal);	//显示进度为0% 
					btn.html("上传中...");	//上传按钮显示上传中
				},
				uploadProgress: function(event, position, total, percentComplete) {
					var percentVal = percentComplete + '%';	//获得进度
					bar.width(percentVal);	//上传进度条宽度变宽
					percent.html(percentVal);	//显示上传进度百分比
				},
				success: function(resp) {	//成功
					//获得后台返回的json数据，显示文件名，大小，以及删除按钮
					
					var data = eval("("+resp+")");
					console.log(data);
					files.html("<b>"+data.name+"("+data.size+"k)</b> <span class='delimg' rel='"+data.url+"'>删除</span>");
					//显示上传后的图片
					//var img = "upload/face/"+data.url;
					var img = urlpath+"/avatar.php?uid="+uid+"&size=big&random="+new Date()

					//判断上传图片的大小 然后设置图片的高与宽的固定宽
					if (data.width>240 && data.height<240){
						showimg.html("<img src='"+img+"' id='cropbox' height='240' />");
					}else if(data.width<240 && data.height>240){
						showimg.html("<img src='"+img+"' id='cropbox' width='240' />");
					}else if(data.width<240 && data.height<240){
						showimg.html("<img src='"+img+"' id='cropbox' width='240' height='240' />");
					}else{
						showimg.html("<img src='"+img+"' id='cropbox' />");
					}
					//传给php页面，进行保存的图片值
					$("#src").val(img);
					//截取图片的js
					$('#cropbox').Jcrop({
						aspectRatio: 1,
						onSelect: updateCoords,
						minSize:[20,20],
						maxSize:[140,140],
						allowSelect:false, //允许选择
						allowResize:false, //是否允许调整大小
						setSelect: [ 0, 0, 240, 240 ]
					});
					btn.html("上传图片");	//上传按钮还原
				},
				error:function(xhr){	//上传失败
					btn.html("上传失败");
					bar.width('0')
					files.html(xhr.responseText);	//返回失败信息
				}
			});
		});
		
		$(".delimg").live('click',function(){
			var pic = $(this).attr("rel");
			$.post("action.php?act=delimg",{imagename:pic},function(msg){
				if(msg==1){
					files.html("删除成功.");
					showimg.empty();	//清空图片
					progress.hide();	//隐藏进度条 
				}else{
					alert(msg);
				}
			});
		});
		
	});
	
	function updateCoords(c){
		$('#x').val(c.x);
		$('#y').val(c.y);
		$('#w').val(c.w);
		$('#h').val(c.h);
	};
	
	function checkCoords(){
		if (parseInt($('#w').val())) return true;
		alert('Please select a crop region then press submit.');
		return false;
	};
</script>
	


			</div>
	        <div class="user_left">我的头像</div>
		    <div class="clear"></div>
		</div>
	
	</div>
	
	<div id="conInvite" style="display:none">
		<?php if ($_smarty_tpl->getVariable('yb')->value['openlogin_qq_open']==1){?>
	    <div class="con_table">
		    <div class="user_right">
				<?php if ($_smarty_tpl->getVariable('bind')->value['QQ']){?>
					<div class="none_connect"><a href="javascript:void(0)" onclick="cancelConnect('qq')">取消绑定</a></div>
					<div class="status">已经绑定<font>腾讯QQ</font>
					<em>(授权过期时间：<?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('bind')->value['QQ']['expires'],'%Y-%m-%d');?>
)</em></div>
				<?php }else{ ?>
					<div class="bd_connect"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'openconnect','a'=>'qq'),$_smarty_tpl);?>
" target="_blank">立即绑定</a></div>
					<div class="status">尚未绑定到<font>腾讯QQ</font>
					</div>
				<?php }?>
			
			  
			</div>
	        <div class="user_left"><span class="qq_connenct">腾讯QQ</span></div>
		    <div class="clear"></div>
		</div>
		<?php }?>
		
		<?php if ($_smarty_tpl->getVariable('yb')->value['openlogin_weib_open']==1){?>
		<div class="con_table">
		
		<?php if ($_smarty_tpl->getVariable('bind')->value['WEIB']){?>
			<div class="user_right">
			<div class="none_connect"><a href="javascript:void(0)" onclick="cancelConnect('WEIB)">取消绑定</a></div>
				<div class="status">已绑定<font>新浪微博</font><em>(授权过期时间：2012-7-28)</em></div>
				</div>
			<div class="user_left"><span class="sina_connenct">新浪微博</span></div>
			<div class="clear"></div>
		<?php }else{ ?>
			<div class="user_right">
			<div class="bd_connect"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'openconnect','a'=>'weibo'),$_smarty_tpl);?>
" target="_blank">立即绑定</a></div>
				<div class="status">尚未绑定到<font>新浪微博</font></div>
				</div>
			<div class="user_left"><span class="sina_connenct">新浪微博</span></div>
			<div class="clear"></div>
		<?php }?>
				
		  
		</div>
		<?php }?>

	</div>
	
	<div id="conSafe" style="display:none">
	    
		<div class="con_table">
		    <div class="user_right">
			    <input type="password" id="pwd" class="ipt">
			</div>
	        <div class="user_left">原始密码</div>
		    <div class="clear"></div>
		</div>
		
		<div class="con_table">
		    <div class="user_right">
			     <input type="password" name="pwd1" id="pwd1" class="ipt"/>
			</div>
	        <div class="user_left">新密码</div>
		    <div class="clear"></div>
		</div>
		
		<div class="con_table">
		    <div class="user_right">
			     <input type="password" name="pwd2" id="pwd2" class="ipt"/>
			</div>
	        <div class="user_left">重复密码</div>
		    <div class="clear"></div>
		</div>

		<div class="con_last">
		    <input type="button" value="保存密码" class="savepw" id="submit_password"/>
			<span id="submit_loading"></span>
		</div>
		
		
	</div>
	
	<div class="con_sub" id="pb-action-holder">
		<a id="submit_baseinfo">保存</a>
		<a id="cancel">取消</a>
		<span style="display:none;" id="uploading">正在保存...</span>
		<div class="clear"></div>
	</div>
	
</div>

<?php $_template = new Smarty_Internal_Template("require_footer.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
