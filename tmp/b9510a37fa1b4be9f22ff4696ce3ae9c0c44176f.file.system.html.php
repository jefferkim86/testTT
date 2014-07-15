<?php /* Smarty version Smarty-3.0.6, created on 2012-12-21 22:51:04
         compiled from "tplv2\admin/system.html" */ ?>
<?php /*%%SmartyHeaderCode:3098450d4775888d004-51219210%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b9510a37fa1b4be9f22ff4696ce3ae9c0c44176f' => 
    array (
      0 => 'tplv2\\admin/system.html',
      1 => 1342711250,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3098450d4775888d004-51219210',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template('admin/header.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

<div id="content">
  
<div class="artTabs">
      
    
    <ul id="tabs">
	    <li><a href="#tabContent1" class="current">站点设置<div class="point"></div></a></li>
		<li><a href="#tabContent2">模块设置<div class="point"></div></a></li>
		<li><a href="#tabContent3">主题设置<div class="point"></div></a></li>
		<li><a href="#tabContent4">首页设置<div class="point"></div></a></li>
		<li><a href="#tabContent5">邮件设置<div class="point"></div></a></li>
		<li><a href="#tabContent6">过滤与保留<div class="point"></div></a></li>
		<li><a href="#tabContent7">SEO设置<div class="point"></div></a></li>
		<li><a href="#tabContent8">合作登陆<div class="point"></div></a></li>
		<div class="clear"></div>
	</ul>
</div>
	
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">    
	<div id="tabContent1" class="t_con" style="display:block">
	    <h3><span><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'clearcache'),$_smarty_tpl);?>
" class="clear_btn">缓存删除</a></span>系统管理 > 站点设置</h3>
		<div class="tip">当修改设置无改变的时候请删除缓存</div>
		<div class="clear"></div>
		<div class="con_system">
		       <table width="100%" cellpadding="0" cellspacing="0" border="0" class="table_padding">
			       <tr>
				       <td width="90" class="t_title">站点标题</td>
					   <td class="c_input"><input type="text" name="val[site_title]" value="<?php echo $_smarty_tpl->getVariable('conf')->value['site_title'];?>
" /></td>
				   </tr>
				   <tr>
				       <td class="t_title">副标题</td>
					   <td class="c_input"><input type="text" name="val[site_titlepre]" value="<?php echo $_smarty_tpl->getVariable('conf')->value['site_titlepre'];?>
" /></td>
				   </tr>
				   <tr>
				       <td class="t_title">备案号</td>
					   <td class="c_input"><input type="text" name="val[site_icp]" value="<?php echo $_smarty_tpl->getVariable('conf')->value['site_icp'];?>
" /></td>
				   </tr>
				   <tr>
				       <td class="t_title">统计代码</td>
					   <td class="c_textarea"><textarea name="val[site_count]" cols="60" rows="5"><?php echo $_smarty_tpl->getVariable('conf')->value['site_count'];?>
</textarea></td>
				   </tr>
                   <tr>
				       <td class="t_title">登录验证码</td>
					   <td class="c_radio">
                       <label><input name="val[loginCodeSwitch]" type="radio"  value="1"  <?php if ($_smarty_tpl->getVariable('conf')->value['loginCodeSwitch']==1){?> checked="checked" <?php }?> />启用</label>
					   <label><input type="radio" name="val[loginCodeSwitch]"  value="0"  <?php if ($_smarty_tpl->getVariable('conf')->value['loginCodeSwitch']==0){?> checked="checked" <?php }?> />关闭</label></td>
				   </tr>
                   <tr>
				       <td class="t_title">注册验证码</td>
					   <td class="c_radio">
                       <label><input name="val[regCodeSwitch]" type="radio"  value="1"  <?php if ($_smarty_tpl->getVariable('conf')->value['regCodeSwitch']==1){?> checked="checked" <?php }?> />启用</label>
					   <label><input type="radio" name="val[regCodeSwitch]"  value="0"  <?php if ($_smarty_tpl->getVariable('conf')->value['regCodeSwitch']==0){?> checked="checked" <?php }?> />关闭</label></td>
				   </tr>
                   <tr>
				       <td class="t_title">来宾访问方式</td>
					   <td class="c_radio">
                       <label><input name="val[guestMode]" type="radio"  value="1"  <?php if ($_smarty_tpl->getVariable('conf')->value['guestMode']==1){?> checked="checked" <?php }?> />显示文章</label>
					   <label><input type="radio" name="val[guestMode]"  value="0"  <?php if ($_smarty_tpl->getVariable('conf')->value['guestMode']==0){?> checked="checked" <?php }?> />显示登录</label></td>
				   </tr>
				   
				    <tr>
				       <td class="t_title">COOKIE前缀</td>
					   <td class="c_input">
						<input type="text" name="val[cookiepre]" value="<?php echo $_smarty_tpl->getVariable('conf')->value['cookiepre'];?>
" /> 增加系统登录状态安全性
					  </td>
				   </tr>
				   
				   <tr>
				       <td class="t_title">COOKIE密钥</td>
					   <td class="c_input">
						<input type="text" name="val[cookiekey]" value="<?php echo $_smarty_tpl->getVariable('conf')->value['cookiekey'];?>
" />
					  </td>
				   </tr>
			   </table>
		 </div>
		
	</div>
	
    <div id="tabContent2" class="t_con" style="display:none">
	    <h3><span><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'clearcache'),$_smarty_tpl);?>
" class="clear_btn">缓存删除</a></span>系统管理 > 模块设置</h3>
		<div class="tip">当有新设置可供更新时，请先点一次保存，再设置新的设置并点击保存，就会生效</div>
		<div class="clear"></div>
		<div class="con_system">
		       <table width="100%" cellpadding="0" border="0" cellspacing="0" class="table_padding">
			       <tr>
				       <td width="110" class="t_title">邀请注册</td>
					   <td class="c_radio">
                            <label><input name="val[invite_switch]" type="radio" value="1" <?php if ($_smarty_tpl->getVariable('conf')->value['invite_switch']==1){?> checked="checked" <?php }?> />启用</label>
                            <label><input name="val[invite_switch]" type="radio" value="0" <?php if ($_smarty_tpl->getVariable('conf')->value['invite_switch']==0){?> checked="checked" <?php }?> />关闭</label>
					   </td>
				   </tr>
				   
				    <tr>
				       <td class="t_title">推荐机制</td>
					   <td class="c_radio">
                            <label><input name="val[recomm_switch]" type="radio" value="1" <?php if ($_smarty_tpl->getVariable('conf')->value['recomm_switch']==1){?> checked="checked" <?php }?> />手动</label>
                            <label><input name="val[recomm_switch]" type="radio" value="0" <?php if ($_smarty_tpl->getVariable('conf')->value['recomm_switch']==0){?> checked="checked" <?php }?> />自动</label>
							<font>(如果开启手动推荐则使用内容管理中推荐的信息作为推荐信息，反之系统自动推荐)</font>
					   </td>
				   </tr>
                   
                    <tr>
                        <td class="t_title">邀请码个数</td>
                        <td class="c_input_small "><input type="text" name="val[invite_count]" value="<?php echo $_smarty_tpl->getVariable('conf')->value['invite_count'];?>
"><b>个</b><font>初始邀请码个数(默认为5个)</font></td>
                    </tr>
                    
                    <tr>
                        <td class="t_title">邀请码过期时间</td>
                        <td class="c_input_small "><input type="text" name="val[invite_expiration]" value="<?php echo $_smarty_tpl->getVariable('conf')->value['invite_expiration'];?>
"><b>天</b><font>初始化过期天数(默认为10天)</font></td>
                    </tr>
                    
				   <tr>
				       <td class="t_title">发布模块全局属性</td>
					   <td class="c_input_small "></td>
				   </tr>
                   
				   <tr>
				       <td class="t_title">上传图片大小</td>
					   <td class="c_input_small "><input type="text" name="val[addimg_upsize]" value="<?php echo $_smarty_tpl->getVariable('conf')->value['addimg_upsize'];?>
" /><b>Byte</b><font>上传图片每张允许的大小,模块内不设置则已这个当作默认设置</font></td>
				   </tr>
                   
                   <tr>
				       <td class="t_title">上传图片类型</td>
					   <td class="c_input_small "><input type="text" name="val[addimg_type]" value="<?php echo $_smarty_tpl->getVariable('conf')->value['addimg_type'];?>
" /><font>允许上传图片的格式,模块内不设置则已这个当作默认设置</font></td>
				   </tr>
                                
			   </table>
		  </div>
	
	</div>
	
	<div id="tabContent3" class="t_con" style="display:none">
	
	    <h3><span><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'clearcache'),$_smarty_tpl);?>
" class="clear_btn">缓存删除</a></span>系统管理 > 主题设置</h3>
		<div class="tip">当有新设置可供更新时，请先点一次保存，再设置新的设置并点击保存，就会生效</div>
		<div class="clear"></div>
		<div class="con_system">
		       <table width="100%" cellpadding="0" cellspacing="0" border="0" class="table_padding">
			       <tr>
				       <td width="90" class="t_title">上传背景</td>
					   <td class="c_radio">
					       <label><input type="radio" name="val[theme_upload]"  value="1"  <?php if ($_smarty_tpl->getVariable('conf')->value['theme_upload']==1){?> checked="checked" <?php }?> />允许</label>
						   <label><input type="radio" name="val[theme_upload]"  value="0"  <?php if ($_smarty_tpl->getVariable('conf')->value['theme_upload']==0){?> checked="checked" <?php }?> />禁止</label>
					   </td>
				   </tr>
				   <tr>
				       <td class="t_title">上传大小</td>
					   <td class="c_input_small">
					       <input name="val[theme_uploadsize]" type="text" value="<?php echo $_smarty_tpl->getVariable('conf')->value['theme_uploadsize'];?>
" /><b>byte</b><font>上传音乐的大小(默认为1M，建议不要超过1M)</font>
					   </td>
				   </tr>
				   <tr>
				       <td class="t_title">上传格式</td>
					   <td class="c_input">
					       <input name="val[theme_uploadtype]" type="text" value="<?php echo $_smarty_tpl->getVariable('conf')->value['theme_uploadtype'];?>
" />
					   </td>
				   </tr>
			   </table>
		  </div>
	
	</div>
	
	<div id="tabContent4" class="t_con" style="display:none">
	
	    <h3><span><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'clearcache'),$_smarty_tpl);?>
" class="clear_btn">缓存删除</a></span>系统管理 > 首页设置</h3>
		<div class="tip">当有新设置可供更新时，请先点一次保存，再设置新的设置并点击保存，就会生效</div>
		<div class="clear"></div>
		<div class="con_system">
		       <table width="100%" cellpadding="0" cellspacing="0" border="0" class="table_padding">
			       <tr>
				       <td width="100" class="t_title">分页模式</td>
					   <td class="c_radio">
					       <label><input name="val[show_page_mode]" type="radio"  value="1"  <?php if ($_smarty_tpl->getVariable('conf')->value['show_page_mode']==1){?> checked="checked" <?php }?> />垂直分页</label>
						   <label><input type="radio" name="val[show_page_mode]"  value="0"  <?php if ($_smarty_tpl->getVariable('conf')->value['show_page_mode']==0){?> checked="checked" <?php }?> />正常分页</label>
					   </td>
				   </tr>
				   <tr>
				       <td class="t_title">加载次数</td>
					   <td class="c_input_small">
					       <input name="val[show_ajax_to]" type="text" value="<?php echo $_smarty_tpl->getVariable('conf')->value['show_ajax_to'];?>
" /><font>开启垂直分页 自动加载次数,超过次数将会出现点击查看更多提示</font>
					   </td>
				   </tr>
				   <tr>
				       <td class="t_title">分页数量</td>
					   <td class="c_input_small"><input name="val[show_page_num]" type="text" value="<?php echo $_smarty_tpl->getVariable('conf')->value['show_page_num'];?>
" /><font>不管是正常分页还是垂直分页，每次读取多少条内容</font>
					   </td>
				   </tr>
				   
                    <tr>
				       <td class="t_title">登录页评论展示</td>
					   <td class="c_radio">
                          <label><input name="val[hotuser_switch]" type="radio"  value="1"  <?php if ($_smarty_tpl->getVariable('conf')->value['hotuser_switch']==1){?> checked="checked" <?php }?> />启用</label>
						   <label><input type="radio" name="val[hotuser_switch]"  value="0"  <?php if ($_smarty_tpl->getVariable('conf')->value['hotuser_switch']==0){?> checked="checked" <?php }?> />停用</label>
                           <font>开启登录页会显示最新的四个用户回复的内容以及头像，该内容2小时更新一次(通过缓存删除强制更新)</font>
					   </td>
				   </tr>
				   
				    <tr>
						<td class="t_title">新用户引导</td>
						<td class="c_radio">
							<label><input type="radio" name="val[wizard_switch]" value="1"  <?php if ($_smarty_tpl->getVariable('conf')->value['wizard_switch']==1){?> checked="checked" <?php }?> />启用</label>
							<label><input type="radio" name="val[wizard_switch]" value="0"  <?php if ($_smarty_tpl->getVariable('conf')->value['wizard_switch']==0){?> checked="checked" <?php }?> />停用</label>
                           新用户登录开启引导，引导用户填写个性域名，关注主题，关注用户。
						</td>
			     </tr>
			   </table>
		  </div>
	
	</div>
	
	<div id="tabContent5" class="t_con" style="display:none">
	    
		<h3><span><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'clearcache'),$_smarty_tpl);?>
" class="clear_btn">缓存删除</a></span>系统管理 > 邮件设置</h3>
		<div class="tip">当有新设置可供更新时，请先点一次保存，再设置新的设置并点击保存，就会生效</div>
		<div class="clear"></div>
		<div class="con_system">
		       <table width="100%" cellpadding="0" cellspacing="0" border="0" class="table_padding">
			     <tr>
				    <td width="100" class="t_title">邮件服务</td>
					<td class="c_radio">
					   <label><input type="radio" name="val[mail_open]"  value="1"  <?php if ($_smarty_tpl->getVariable('conf')->value['mail_open']==1){?> checked="checked" <?php }?> />开启</label>
					   <label><input type="radio" name="val[mail_open]"  value="0"  <?php if ($_smarty_tpl->getVariable('conf')->value['mail_open']==0){?> checked="checked" <?php }?> />关闭</label><font>(是否开启系统邮件服务,测试发信也需要开启)</font>
					</td>
				</tr>
				<tr>
				   <td class="t_title">Debug</td>
				   <td class="c_radio">
				      <label><input type="radio" name="val[mail_debug]"  value="1"  <?php if ($_smarty_tpl->getVariable('conf')->value['mail_debug']==1){?> checked="checked" <?php }?> />开启Debug</label>
				      <label><input type="radio" name="val[mail_debug]"  value="0"  <?php if ($_smarty_tpl->getVariable('conf')->value['mail_debug']=='0'){?> checked="checked" <?php }?> />关闭Debug</label><font>(测试发信请开启)</font>
				   </td>
				</tr>
				<tr>
				   <td class="t_title">邮件服务器</td>
				   <td class="c_input">
				      <input type="text" name="val[mail_host]" value="<?php echo $_smarty_tpl->getVariable('conf')->value['mail_host'];?>
" />
				   </td>
				</tr>
				<tr>
				   <td class="t_title">端口</td>
				   <td class="c_input_small">
				      <input name="val[mail_port]" type="text" value="<?php echo $_smarty_tpl->getVariable('conf')->value['mail_port'];?>
" />
				   </td>
				</tr>
				<tr>
				   <td class="t_title">账号</td>
				   <td class="c_input_small"><input name="val[mail_user]" type="text" value="<?php echo $_smarty_tpl->getVariable('conf')->value['mail_user'];?>
" /></td>
				</tr>
				<tr>
				   <td class="t_title">密码</td>
				   <td class="c_input_small"><input name="val[mail_pwd]" type="password" value="<?php echo $_smarty_tpl->getVariable('conf')->value['mail_pwd'];?>
" /></td>
				</tr>
				<tr>
				    <td class="t_title">发信账号</td>
					<td class="c_input_small"><input name="val[mail_from]" type="text" value="<?php echo $_smarty_tpl->getVariable('conf')->value['mail_from'];?>
" /><font>邮件发送者，该账号将显示在用户接受邮件的发信方</font></td>
			    </tr>
				<tr>
				    <td class="t_title">发信账号描述</td>
					<td class="c_input_small"><input name="val[mail_fromname]" type="text" value="<?php echo $_smarty_tpl->getVariable('conf')->value['mail_fromname'];?>
" /><font>邮件发送者名称，该账号将显示在用户接受邮件的发信地址后面</font>
					</td>
				</tr>
				<tr>
				    <td class="t_title">测试发信</td>
					<td class="c_link"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'system','testSendMail'=>'yes'),$_smarty_tpl);?>
" target="_blank">请先保存设置,然后点这里测试</a><font>(系统会发一封邮件到您的 发信账号中,请注意查收)</font></td>
				</tr>
			</table>
		  </div>
		
	</div>
	
	<div id="tabContent6" class="t_con" style="display:none">
	
	    <h3><span><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'clearcache'),$_smarty_tpl);?>
" class="clear_btn">缓存删除</a></span>系统管理 > 过滤与保留</h3>
		<div class="tip">当有新设置可供更新时，请先点一次保存，再设置新的设置并点击保存，就会生效</div>
		<div class="clear"></div>
		<div class="con_system">
		       <table width="100%" cellpadding="0" cellspacing="0" border="0" class="table_padding">
				<tr>
				    <td width="110" class="t_title">发表审核</td>
					<td class="c_radio">
						<label><input type="radio" name="val[post_verify_switch]"  value="0"  <?php if ($_smarty_tpl->getVariable('conf')->value['post_verify_switch']==0){?> checked="checked" <?php }?> />停用审核</label>
						<label><input type="radio" name="val[post_verify_switch]"  value="1"  <?php if ($_smarty_tpl->getVariable('conf')->value['post_verify_switch']==1){?> checked="checked" <?php }?> />开启手动审核</label>
						<label><input type="radio" name="val[post_verify_switch]"  value="2"  <?php if ($_smarty_tpl->getVariable('conf')->value['post_verify_switch']==2){?> checked="checked" <?php }?> />开启自动审核</label>
						<p><font>手动审核：所有内容发布后都将转入审核列表；自动审核：满足如下设置的内容都将被转入审核列表；停用审核：所有内容发表立即显示</font></p>
					</td>
				 </tr>
				 
				 <tr>
				    <td width="110" class="t_title">自动审核[URL]</td>
					<td class="c_input_small">
						<input name="val[post_verify_url]" type="text" value="<?php echo $_smarty_tpl->getVariable('conf')->value['post_verify_url'];?>
" /><font>当内容中出现超过多少个URL自动转入审核列表</font>
					</td>
				 </tr>
				 
				  <tr>
				    <td width="110" class="t_title">自动审核[网址]</td>
					<td class="c_input_small">
						<input name="val[post_verify_http]" type="text" value="<?php echo $_smarty_tpl->getVariable('conf')->value['post_verify_http'];?>
" /><font>当内容中出现超过多少个网址自动转入审核列表</font>
					</td>
				 </tr>
				 
				  <tr>
				    <td width="110" class="t_title">自动审核[关键字]</td>
					<td class="c_textarea">
						 <textarea name="val[post_verify_keyword]" cols="60" rows="5"><?php echo $_smarty_tpl->getVariable('conf')->value['post_verify_keyword'];?>
</textarea><em>(一行一个)发现以下关键则自动转入审核列表</em>
					</td>
				 </tr>
				 
			     <tr>
				    <td width="110" class="t_title">邮箱保留或限制</td>
					<td class="c_textarea">
					   <textarea name="val[keep_email]" cols="60" rows="5"><?php echo $_smarty_tpl->getVariable('conf')->value['keep_email'];?>
</textarea><em>用户注册邮箱前缀保留</em>
					</td>
				 </tr>
				 <tr>
				    <td class="t_title">昵称保留或限制</td>
					<td class="c_textarea"><textarea name="val[keep_niname]" cols="60" rows="5"><?php echo $_smarty_tpl->getVariable('conf')->value['keep_niname'];?>
</textarea><em>用户昵称保留</em></td>
				 </tr>
				 <tr>
				    <td class="t_title">域名保留或限制</td>
					<td class="c_textarea"><textarea name="val[keep_domain]" cols="60" rows="5"><?php echo $_smarty_tpl->getVariable('conf')->value['keep_domain'];?>
</textarea><em>用户个性域名保留</em></td>
				 </tr>
				 <tr>
				    <td class="t_title">评论限制</td>
					<td class="c_textarea"><textarea name="val[keep_rep]" cols="60" rows="5"><?php echo $_smarty_tpl->getVariable('conf')->value['keep_rep'];?>
</textarea><em>评论限制</em></td>
				 </tr>
				 <tr>
				    <td class="t_title">说明：</td>
					<td>所有词条请用逗号分隔</td>
				 </tr>
			  </table>
		  </div>
	
	</div>
	
	<div id="tabContent7" class="t_con" style="display:none">
	
	    <h3><span><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'clearcache'),$_smarty_tpl);?>
" class="clear_btn">缓存删除</a></span>系统管理 > SEO设置</h3>
		<div class="tip">当有新设置可供更新时，请先点一次保存，再设置新的设置并点击保存，就会生效</div>
		<div class="clear"></div>
		<div class="con_system">
		       <table width="100%" cellpadding="0" cellspacing="0" border="0" class="table_padding">
			      <tr>
				     <td width="70" class="t_title">关键字</td>
					 <td class="c_input"><input type="text" name="val[site_keyword]" value="<?php echo $_smarty_tpl->getVariable('conf')->value['site_keyword'];?>
" /></td>
				  </tr>
				  <tr>
				     <td class="t_title">描述</td>
					 <td class="c_input"><input name="val[site_desc]" type="text" value="<?php echo $_smarty_tpl->getVariable('conf')->value['site_desc'];?>
" /></td>
				  </tr>
			  </table>
		  </div>
	
	</div>
	
	<div id="tabContent8" class="t_con" style="display:none">
	
	    <h3><span><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'clearcache'),$_smarty_tpl);?>
" class="clear_btn">缓存删除</a></span>系统管理 > 合作登陆</h3>
		<div class="tip">当有新设置可供更新时，请先点一次保存，再设置新的设置并点击保存，就会生效</div>
		<div class="clear"></div>
		<div class="con_system">
		       
		    <div class="h_title">QQ登陆设置</div>
			<div class="clear"></div>
		    <table width="100%" cellpadding="0" cellspacing="0" border="0" class="table_padding">
			    <tr>
				   <td width="80" class="t_title">是否开启</td>
				   <td class="c_radio">
				      <label><input name="val[openlogin_qq_open]" type="radio" value="1"  <?php if ($_smarty_tpl->getVariable('conf')->value['openlogin_qq_open']==1){?> checked="checked" <?php }?>/>开启</label>
        		      <label><input name="val[openlogin_qq_open]" type="radio" value="0" <?php if ($_smarty_tpl->getVariable('conf')->value['openlogin_qq_open']==0){?> checked="checked" <?php }?>/>关闭</label>
				   </td>
				</tr>
				<tr>
				   <td></td>
				   <td class="c_link"><font>是否开启QQ登陆按钮及登陆功能，开启后填写下面内容。</font><a href="http://connect.opensns.qq.com/apply" target="_blank">获取如下内容请点击</a></td>
				</tr>
				<tr>
				   <td class="t_title">APP ID</td>
				   <td class="c_input"><input name="val[openlogin_qq_appid]" type="text" value="<?php echo $_smarty_tpl->getVariable('conf')->value['openlogin_qq_appid'];?>
" /><font>腾讯提供的APPID</font></td>
				   
				</tr>
				<tr>
				   <td class="t_title">APP KEY</td>
				   <td class="c_input"><input name="val[openlogin_qq_appkey]" type="text" value="<?php echo $_smarty_tpl->getVariable('conf')->value['openlogin_qq_appkey'];?>
" /><font>腾讯提供的APP KEY</font></td>
				   
				</tr>
				<tr>
				   <td class="t_title">回调地址</td>
				      <td class="c_input"><input name="val[openlogin_qq_callback]" type="text" value="<?php echo $_smarty_tpl->getVariable('conf')->value['openlogin_qq_callback'];?>
" /></td>
					  
				</tr>
				<tr>
				   <td></td>
				   <td class="c_font">请将回调地址写成如下形式，将我们的域名换成你的域名:(注意不要粘贴空格)<br />http://qing.thinksaas.cn/index.php?c=openconnect&a=qq&callback=true <br/>你回调地址填的地址域名必须和申请的域名一样</td>
				</tr>
			</table>    
		  <div class="h_title">新浪微博登陆设置</div>
		  <table width="100%" cellpadding="0" cellspacing="0" border="0" class="table_padding">
			    <tr>
				   <td width="80" class="t_title">是否开启</td>
				   <td class="c_radio">
				      <label><input name="val[openlogin_weib_open]" type="radio" value="1"  <?php if ($_smarty_tpl->getVariable('conf')->value['openlogin_weib_open']==1){?> checked="checked" <?php }?>/>开启</label>
        		      <label><input name="val[openlogin_weib_open]" type="radio" value="0" <?php if ($_smarty_tpl->getVariable('conf')->value['openlogin_weib_open']==0){?> checked="checked" <?php }?>/>关闭</label>
				   </td>
				</tr>
				<tr>
				   <td></td>
				   <td class="c_link">是否开启weib登陆按钮及登陆功能，开启后填写下面内容。<a href="http://open.weibo.com/apps/new?sort=website" target="_blank">获取如下内容请点击</a></td>
				</tr>
				<tr>
				   <td class="t_title">APP KEY</td>
				   <td class="c_input"><input name="val[openlogin_weib_appid]" type="text" value="<?php echo $_smarty_tpl->getVariable('conf')->value['openlogin_weib_appid'];?>
" /><font>新浪提供的APPkey</font></td>
				   
				</tr>
				<tr>
				   <td class="t_title">APP SECRET</td>
				   <td class="c_input"><input name="val[openlogin_weib_appkey]" type="text" value="<?php echo $_smarty_tpl->getVariable('conf')->value['openlogin_weib_appkey'];?>
" /><font>新浪提供的APP secret</font></td>
				   
				</tr>
				<tr>
				   <td class="t_title">回调地址</td>
				   <td class="c_input"><input name="val[openlogin_weib_callback]" type="text" value="<?php echo $_smarty_tpl->getVariable('conf')->value['openlogin_weib_callback'];?>
" /></td>
					  
				</tr>
				<tr>
				   <td></td>
				   <td class="c_font">请将回调地址写成如下形式，将我们的域名换成你的域名:(注意不要粘贴空格)<br />http://qing.thinksaas.cn/index.php?c=openconnect&a=qq&callback=true <br/>你回调地址填的地址域名必须和申请的域名一样</td>
				</tr>
			</table>
			   
		</div>
	
	</div>
	
	<div class="btn_area"><input name="submit" class="btn_save" type="submit" value="保存更改" /></div>

</form>

</div>
<?php $_template = new Smarty_Internal_Template('admin/footer.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
