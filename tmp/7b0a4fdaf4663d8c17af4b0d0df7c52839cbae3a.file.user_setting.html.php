<?php /* Smarty version Smarty-3.0.6, created on 2012-12-22 00:00:40
         compiled from "tplv2\user_setting.html" */ ?>
<?php /*%%SmartyHeaderCode:2487250d487a87d0479-87437708%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7b0a4fdaf4663d8c17af4b0d0df7c52839cbae3a' => 
    array (
      0 => 'tplv2\\user_setting.html',
      1 => 1342537460,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2487250d487a87d0479-87437708',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'E:\PDENV\data\yunbian.tt\init\Drivers\Smarty\plugins\modifier.date_format.php';
?><?php $_template = new Smarty_Internal_Template("require_header.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('addcss','yes');$_template->assign('editor','yes'); echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

<script>
$(document).ready(function(){

 var jUpload=$('#upload_photo input');
		jUpload.mousedown().change(function(){
			var $this=$(this),sExt=$this.attr('ext'),$prev=$this.prev();
			if($this.val().match(new RegExp('\.('+sExt.replace(/,/g,'|')+')$','i'))){
				$('#uploading').toggle();
				var upload=new textbody.html4Upload(this,urlpath+'/index.php?c=user&a=upavatar',function(sText){
					$('#uploading').toggle();
					var data=Object,bOK=false;
				
					try{data=eval('('+sText+')');}catch(ex){alert(sText)};
					if(!data.err){
						var uid = $('#big_face').attr('rel');						
						$('#big_face').attr('src',urlpath+"/avatar.php?uid="+uid+"&size=big&random="+new Date());
						$('#middle_face').attr('src',urlpath+"/avatar.php?uid="+uid+"&size=middle&random="+new Date());
						$('#small_face').attr('src',urlpath+"/avatar.php?uid="+uid+"&size=small&random="+new Date());
						tips('头像更新成功');
						
					}else{
						tips(data.err);
					}
				});
				
				upload.start();
			}
			else alert('请上传'+sExt+'格式文件');
		});
		
		
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
		
		<div class="con_table">
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
		</div>
		
		<div class="con_table">
		    <div class="user_right">
			    <textarea name="textarea" id="textarea" style="width:100%; height:200px" class="pb-input-text" ><?php echo $_smarty_tpl->getVariable('users')->value['sign'];?>
</textarea>
                <input type="hidden" name="tag" id="tag" value="" />
				 
			</div>
	        <div class="user_left">个性签名</div>
		    <div class="clear"></div>
		</div>
		
		<div class="con_table">
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
		</div>

		
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
