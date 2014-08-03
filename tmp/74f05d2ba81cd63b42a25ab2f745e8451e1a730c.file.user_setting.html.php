<?php /* Smarty version Smarty-3.0.6, created on 2014-08-03 14:35:23
         compiled from "tplv2/user_setting.html" */ ?>
<?php /*%%SmartyHeaderCode:134856045353ddd82b822266-34351761%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '74f05d2ba81cd63b42a25ab2f745e8451e1a730c' => 
    array (
      0 => 'tplv2/user_setting.html',
      1 => 1407047722,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '134856045353ddd82b822266-34351761',
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
			sign   : $('#pureTextarea').val(),
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


<div id="user_index" class="clearfix" style="height:650px;">

	<div class="page-left">
		
		<div id="user_tab">
	        <li id="tab_person" class="curr">
	        	<a href="javascript:void(0)" onclick="SelectPerson(this)">个人资料</a>
	        </li>
			<li id="tab_head">
				<a href="javascript:void(0)" onclick="SelectHead(this)">修改头像</a>
			</li>
			<?php if ($_smarty_tpl->getVariable('yb')->value['openlogin_qq_open']==1||$_smarty_tpl->getVariable('yb')->value['openlogin_weib_open']==1){?>
			<li id="tab_invite">
				<a href="javascript:void(0)" onclick="SelectInvite(this)">账号绑定</a>
			</li><?php }?>
			<li id="tab_safe">
				<a href="javascript:void(0)" onclick="SelectSafe(this)">密码修改</a>
			</li>
		</div>
	</div>
    
	
	<!-- 个人资料 -->
    <div id="conPerson">

		<h2>个人资料</h2>
	    <div class="con_content clearfix">
	    	<div class="con_table">
	    		<div class="user_left">我的账号</div>
			    <div class="user_right">
				    <input type="text"  class="iptname"  value="<?php echo $_smarty_tpl->getVariable('users')->value['email'];?>
" disabled="disabled">
				</div>
			</div>
			
			<div class="con_table">
				<div class="user_left">我的昵称</div>
			    <div class="user_right">
				    <input type="text" name="niname" id="niname" class="iptni"  value="<?php echo $_smarty_tpl->getVariable('users')->value['username'];?>
"><span class="info">昵称唯一，可修改</span>
				</div>
			</div>
			
			<div class="con_table">
				<div class="user_left">个性域名</div>
			    <div class="user_right">
				     <span class="host"><?php echo $_smarty_tpl->getVariable('url')->value;?>
/</span>
					 <input type="text" name="domain" class="domain" id="domain" value="<?php echo $_smarty_tpl->getVariable('users')->value['domain'];?>
">
					 <span class="info">域名唯一，可修改</span>
				</div>
			</div>
			
			
			<div class="con_table">
				<div class="user_left">个性签名</div>
			    <div class="user_right">
				    <textarea name="textarea" id="pureTextarea" class="user-desc-textarea" ><?php echo $_smarty_tpl->getVariable('users')->value['sign'];?>
</textarea>
	                <input type="hidden" name="tag" id="tag" value="" />
					 
				</div>
			</div>
	    </div>
	    
		
	</div>
	
	<!-- 头像修改 -->
	<div id="conHead" style="display:none">
	  	<h2>修改头像</h2>
	     <div class="con_table clearfix">
		    <div class="user_right">
				<div class="avatar">
					<img src="http://localhost/tuitui<?php echo avatar(array('uid'=>$_SESSION['uid'],'size'=>'big','time'=>1),$_smarty_tpl);?>
" alt=""/>
				</div>
				<div class="adjust-block">
					<div class="handle">
						<ul>
							<li class="cur" id="J-avatarTab-change"><a href="javascript:void(0)">更改头像</a></li>
							<li id="J-avatarTab-adjust"><a href="javascript:void(0)">调整缩略图</a></li>
						</ul>
					</div>
					<!-- 更换图片 -->
					<div class="change" id="J-avatarTab-changeC">
						<div class="upfile"> 
							<span class="pop-foot-corner"><s class="outter"></s></span>
					      	<input id="fileupload" size="1" type="file" name="filedata" ext="jpg|jpeg|png"/>
					      	<div class="fileDataImg">选择文件</div>
						</div>
						<div class="tip">支持jpg、gif、png、bmp格式</div>
						<!-- <div class="progress"> 
							<span class="bar"></span><span class="percent">0%</span > 
						</div> -->
					    <div class="files"></div>
					    <div id="preview-avatar">
					    	<img src="<?php echo avatar(array('uid'=>$_smarty_tpl->getVariable('users')->value['uid'],'size'=>'big'),$_smarty_tpl);?>
" id="preview-avatar-img" />
					    </div>
					</div>
					<!-- 调整tab -->
					<div class="adjust"  id="J-avatarTab-adjustC" style="display:none;">
					  <form action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'user','a'=>'upavatar'),$_smarty_tpl);?>
" method="post" onSubmit="return checkCoords();">

						<span class="pop-foot-corner"><s class="outter"></s></span>
						<div id="showimg">
					    	<img src="http://localhost/tuitui<?php echo avatar(array('uid'=>$_SESSION['uid'],'size'=>'big','time'=>1),$_smarty_tpl);?>
" id="cropbox" width="290" height="290"/>
					    </div>
					    <input type="hidden" id="src" name="src" value="" />
						<input type="hidden" id="x" name="x" value="0" />
						<input type="hidden" id="y" name="y" value="0" />
						<input type="hidden" id="w" name="w" value="240" />
						<input type="hidden" id="h" name="h" value="240" />

						<input type="submit" value="确认保存" class="Intercbtn" />
					 </form>
					</div>

				</div>
			

			</div>
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
			<div class="user_left">原始密码</div>
		    <div class="user_right">
			    <input type="password" id="pwd">
			</div>
		</div>
		
		<div class="con_table">
			<div class="user_left">新密码</div>
		    <div class="user_right">
			     <input type="password" name="pwd1" id="pwd1"/>
			</div>
	        
		</div>
		
		<div class="con_table">
			<div class="user_left">重复密码</div>
		    <div class="user_right">
			     <input type="password" name="pwd2" id="pwd2"/>
			</div>
	        
		</div>

		<div class="con_last">
		    <input type="button" value="保存密码" class="savepw" id="submit_password"/>
			<span id="submit_loading"></span>
		</div>
		
		
	</div>
	
	<div class="con_sub clearfix" id="pb-action-holder">
		<a id="submit_baseinfo">保存</a>
<!-- 		<a id="cancel">取消</a>
 -->		<span style="display:none;" id="uploading">正在保存...</span>
		<div class="clear"></div>
	</div>
	
</div>


<script>
	$(document).ready(function(){	
		

		var bar = $('.bar');
		var percent = $('.percent');
		var showimg = $('#showimg');
		var progress = $(".progress");
		var files = $(".files");
		var btn = $(".btn span");
		$("#fileupload").wrap("<form id='myupload' action='"+urlpath+"/index.php?c=api&yc=user&ym=upface' method='post' enctype='multipart/form-data'></form>");
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
					var data = eval("("+resp+")");
					if(data.status == "1"){
						var img = urlpath +'/'+ data.body.pic_path
							
						if (data.body.width>240 && data.body.height<240){
							showimg.html("<img src='"+img+"' id='cropbox' height='240' />");
						}else if(data.body.width<240 && data.body.height>240){
							showimg.html("<img src='"+img+"' id='cropbox' width='240' />");
						}else if(data.body.width<240 && data.body.height<240){
							showimg.html("<img src='"+img+"' id='cropbox' width='240' height='240' />");
						}else{
							showimg.html("<img src='"+img+"' width='"+data.body.width+"px' height='"+data.body.height+"px'  id='cropbox' />");
						}
							$("#preview-avatar-img").attr('src',img);
							//传给php页面，进行保存的图片值
							$("#src").val(img);
							//截取图片的js
							$('#cropbox').Jcrop({
								aspectRatio: 1,
								onSelect: updateCoords,
								minSize:[240,240],
								maxSize:[240,240],
								allowSelect:false, //允许选择
								allowResize:true, //是否允许调整大小
								setSelect: [ 0, 0, 240, 240 ]
							});
					}else{
						alert(data.err);
					}
					
					//btn.html("上传图片");	//上传按钮还原
				},
				error:function(xhr){	//上传失败
					btn.html("上传失败");
					bar.width('0')
					files.html(xhr.responseText);	//返回失败信息
				}
			});
		});
		
		
	});
	
	function updateCoords(c){
		console.log(c);
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

	var tabs = $(".handle li");
	$("#J-avatarTab-change").on("click",function(e){
		e.preventDefault();
		tabs.removeClass('cur');
		$(this).addClass('cur');
		$("#J-avatarTab-adjustC").hide();
		$("#J-avatarTab-changeC").show();
	});
	$("#J-avatarTab-adjust").on("click",function(e){
		e.preventDefault();
		tabs.removeClass('cur');
		$(this).addClass('cur');
		$("#J-avatarTab-changeC").hide();
		$("#J-avatarTab-adjustC").show();
		$('#cropbox').Jcrop({
			aspectRatio: 1,
			onSelect: updateCoords,
			minSize:[20,20],
			maxSize:[140,140],
			allowSelect:false, //允许选择
			allowResize:true, //是否允许调整大小
			setSelect: [ 0, 0, 240, 240 ]
		});
	});
</script>
	

<?php $_template = new Smarty_Internal_Template("require_footer.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
