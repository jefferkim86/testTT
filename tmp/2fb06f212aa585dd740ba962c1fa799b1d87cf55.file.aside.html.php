<?php /* Smarty version Smarty-3.0.6, created on 2012-12-22 00:00:36
         compiled from "tplv2\theme/default/aside.html" */ ?>
<?php /*%%SmartyHeaderCode:496850d487a4dc0fc3-29835732%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2fb06f212aa585dd740ba962c1fa799b1d87cf55' => 
    array (
      0 => 'tplv2\\theme/default/aside.html',
      1 => 1341154870,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '496850d487a4dc0fc3-29835732',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="my_data">
    <li class="data_follow"><?php echo $_smarty_tpl->getVariable('user')->value['flow'];?>
<span>关注数</span></li>
	<li class="data_fans"><?php echo $_smarty_tpl->getVariable('myLook')->value;?>
<span>粉丝数</span></li>
	<li class="data_post"><?php echo $_smarty_tpl->getVariable('user')->value['num'];?>
<span>发布数</span></li>
	<div class="clear"></div>
</div>
<?php if ($_smarty_tpl->getVariable('user')->value['uid']!=$_SESSION['uid']){?>
<div class="my_pm">
    <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'pm','a'=>'detail','uid'=>$_smarty_tpl->getVariable('user')->value['uid']),$_smarty_tpl);?>
" target="_blank">
	    <div class="pm_btn">
		    <div class="icon"></div>
			<div class="text">发送私信</div>
			<div class="pmdata"><?php echo $_smarty_tpl->getVariable('pmnum')->value;?>
个对话</div>
		</div>
	</a>
</div>
<?php }?>

<?php if ($_smarty_tpl->getVariable('user')->value['local']!=''){?>
<div class="my_location">
    <div class="my_login">最近登陆<span><?php echo ybtime(array('time'=>$_smarty_tpl->getVariable('user')->value['logtime']),$_smarty_tpl);?>
</span></div>
	<div class="my_site"><?php echo $_smarty_tpl->getVariable('user')->value['local'];?>
</div>
</div>
<?php }?>

<?php if ($_smarty_tpl->getVariable('user')->value['flow']!=0){?>
<div class="my_follow">
    <div class="f_title"><?php echo $_smarty_tpl->getVariable('username')->value;?>
的关注</div>
	<div class="f_list">
	
	<?php  $_smarty_tpl->tpl_vars['da'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('follow')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['da']->key => $_smarty_tpl->tpl_vars['da']->value){
?>
	    <li>
		    <a href="<?php echo goUserHome(array('domain'=>$_smarty_tpl->tpl_vars['da']->value['tome']['domain'],'uid'=>$_smarty_tpl->tpl_vars['da']->value['touid']),$_smarty_tpl);?>
" title="<?php echo $_smarty_tpl->tpl_vars['da']->value['tome']['username'];?>
" target="_blank">
			<img src="<?php echo avatar(array('uid'=>$_smarty_tpl->tpl_vars['da']->value['touid'],'size'=>'middle'),$_smarty_tpl);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['da']->value['tome']['username'];?>
" style="max-width:40px" />
			</a>
		</li>
    <?php }} ?>
		<div class="clear"></div>
	</div>
</div>   
<?php }?>



<?php if (isset($_smarty_tpl->getVariable('adunit',null,true,false)->value[5])&&$_smarty_tpl->getVariable('adunit')->value[5]['is_show']==1){?>
	<div id="ad_theme_aside"></div>
	<script>
		$(document).ready(function(){
			ad_aside('#ad_theme_aside',5);
				setInterval(function(){
					ad_aside('#ad_theme_aside',5);
				}, 30000);
		})
	</script>
<?php }?>