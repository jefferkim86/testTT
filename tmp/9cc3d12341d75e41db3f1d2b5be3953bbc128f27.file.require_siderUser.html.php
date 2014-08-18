<?php /* Smarty version Smarty-3.0.6, created on 2014-08-12 01:09:54
         compiled from "tplv2/require_siderUser.html" */ ?>
<?php /*%%SmartyHeaderCode:129264587253e8f8e273d2b2-03950548%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9cc3d12341d75e41db3f1d2b5be3953bbc128f27' => 
    array (
      0 => 'tplv2/require_siderUser.html',
      1 => 1407776130,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '129264587253e8f8e273d2b2-03950548',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_smarty_tpl->getVariable('myfollow')->value){?>
<div class="sider-mod TA-attention mt20 clearfix">
      <div class="hd">
                  <?php if ($_SESSION['uid']==$_smarty_tpl->getVariable('user')->value['uid']){?>
                  <h3>我关注的</h3>
                  <?php }else{ ?>
            <h3>Ta关注的</h3>
                  <?php }?>
      </div>
      <div class="bd clearfix">
            <ul>
                  <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('myfollow')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
?>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['val']->value['h_url'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['val']->value['h_img'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['val']->value['username'];?>
"/></a></li>
                  <?php }} ?>
            </ul>
      </div>
</div>
<?php }?>


