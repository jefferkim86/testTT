<?php /* Smarty version Smarty-3.0.6, created on 2014-07-02 12:36:28
         compiled from "tplv2/require_wizard.html" */ ?>
<?php /*%%SmartyHeaderCode:71630545653b38c4c347969-03221243%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c4f53229bf89cd719bd6f78adf7a2608aaa80ef4' => 
    array (
      0 => 'tplv2/require_wizard.html',
      1 => 1341410652,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '71630545653b38c4c347969-03221243',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_SESSION['domain']==''){?>
<div id="wizard">
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/wizard.js"></script>
<div class="box" id="wizard_domain_area">
    <div class="title">1、设置您的个人博客地址</div>
    <div class="content">
        <span><?php echo $_smarty_tpl->getVariable('url')->value;?>
/</span>
        <input type="text" name="wizard_domain" id="wizard_domain" class="input_domain"  value="">
        <input name="button" id="wizard_save_domain" type="submit" value="保存" class="button"/>
    </div>
</div>


<div class="box" id="wizard_tag_area" style="display:none">
    <div class="title">2、关注您喜欢的分类</div>
	<div class="content">
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
	<input name="button" id="wizard_save_tag" type="submit" value="保存" class="savebutton"/>
	<div class="clear"></div>
	</div>			
</div>

<div class="box" id="user_recommend_area" style="display:none">
	<div class="title" id="point_title">3、关注优秀的博客作者</div>
    <div class="content">
        <div id="user_recommend"></div>
            <!--foreach-->
			<div class="fw_loading"></div>
            <div class="clear"></div>
            <div class="fw_btn">
			    <a href="javascript:;" onclick="load_user_allselect()"><span class="followall">全选</span></a>
				<a href="javascript:;" onclick="load_user_recommend()"><span class="next">换一批</span></a>
				<a href="#point_title" id="wizard_save_user"><span class="save">保存</span></a>
				<div class="clear"></div>
			</div>
    </div>
</div>
</div>
<?php }?>