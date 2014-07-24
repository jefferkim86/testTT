<?php /* Smarty version Smarty-3.0.6, created on 2014-01-17 21:47:59
         compiled from "tplv2/require_sider_tag.html" */ ?>
<?php /*%%SmartyHeaderCode:24229922252d9348f6009d1-00933701%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8162405433e6b0037a4097bd7b323b5646fded99' => 
    array (
      0 => 'tplv2/require_sider_tag.html',
      1 => 1341154870,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '24229922252d9348f6009d1-00933701',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_SESSION['uid']!=''){?>

		<div class="menu_sc" id="search">
		    <input type="button" class="btn" value="搜索" onClick="tag_search('local')">
		    <input type="text" id="searchtag" value="搜索标签,发现兴趣" class="ipt">
		</div>
		<div class="menu_tag_index">
		    <ul>

				<?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('favatag')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value){
?>
					<li id="tag_<?php echo $_smarty_tpl->tpl_vars['d']->value['tid'];?>
">
					<a href="javascript:;" onclick="show_tags_view({ tag:encodeURIComponent('<?php echo $_smarty_tpl->tpl_vars['d']->value['title'];?>
') })"><span><?php echo $_smarty_tpl->tpl_vars['d']->value['title'];?>
</span><em><?php echo $_smarty_tpl->tpl_vars['d']->value['count'];?>
</em></a>
					<div class="tag_subs_0" id="tag_rem_<?php echo $_smarty_tpl->tpl_vars['d']->value['tid'];?>
"><a href="javascript:;" onclick="delMytag(<?php echo $_smarty_tpl->tpl_vars['d']->value['tid'];?>
)"  title="取消订阅"></a></div>
					</li>
				 <?php }} ?>
				
				<div class="tag_more"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'discovery'),$_smarty_tpl);?>
">发现更多有趣的内容</a></div>
				<div class="clear"></div>
			</ul>
		</div>
		<div class="menu_tag_user">
		    <ul></ul>
			<div class="tag_more"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'recommend'),$_smarty_tpl);?>
">推荐更多优秀博客</a></div>
		</div>
<?php }?>