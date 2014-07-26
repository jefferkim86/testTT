<?php /* Smarty version Smarty-3.0.6, created on 2014-07-26 13:15:07
         compiled from "tplv2/require_pubfooter.html" */ ?>
<?php /*%%SmartyHeaderCode:62108540753d3395bc18d96-84148678%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a4965e25f37b3f8c27a7e82b2a1d1c5a4e8892a3' => 
    array (
      0 => 'tplv2/require_pubfooter.html',
      1 => 1406351706,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '62108540753d3395bc18d96-84148678',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/view/publishView.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/view/headerView.js"></script>
<script type="text/javascript">
	new Tuitui.headerView();
	var publishView = new Tuitui.publishView();
</script>