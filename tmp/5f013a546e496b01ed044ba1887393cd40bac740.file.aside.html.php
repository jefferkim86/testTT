<?php /* Smarty version Smarty-3.0.6, created on 2012-12-22 00:00:31
         compiled from "tplv2\models/aside.html" */ ?>
<?php /*%%SmartyHeaderCode:2801250d4879f4cb144-30285758%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5f013a546e496b01ed044ba1887393cd40bac740' => 
    array (
      0 => 'tplv2\\models/aside.html',
      1 => 1341038688,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2801250d4879f4cb144-30285758',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
				<div class="aside_item" id="post-privacy-holder">
				    <select id="savetype" name="savetype">
					<option value="1" <?php if ($_smarty_tpl->getVariable('blog')->value['open']==1){?>selected<?php }?>>所有人可见</option>
					<option value="0">保存为草稿</option>
					<option value="-1" <?php if ($_smarty_tpl->getVariable('blog')->value['open']==-1){?>selected<?php }?>>仅自己可见</option>
					</select>
				</div>
				
				<div class="aside_line"></div>
				
				<div class="aside_con" id="post-tag-holder">
				    <div id="post-tag">
					    <ul class="clearfix" id="post-tag-list">
						<!--动态插入标签-->
						<?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('myTag')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value){
?>
						    <li tag="<?php echo $_smarty_tpl->tpl_vars['d']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['d']->value;?>
<a href="javascript:void(0)" onClick="remTags(this)">x</a></li>
						<?php }} ?>
						</ul>
						<div id="post-tag-input-holder">
						    <input type="text" id="post-tag-input" value="">
						</div>
					</div>
				</div>
				
				<div class="aside_line"></div>
				
				<div class="aside_con" id="recommand-tag-holder">
				    <h3>推荐标签</h3>
					<ul class="clearfix" id="recommand-tag-list">
					    <?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('myTagUsually')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value){
?>
					    <li tag="<?php echo $_smarty_tpl->tpl_vars['d']->value['title'];?>
"><a href="javascript:void(0)" onClick="tuiTag('<?php echo $_smarty_tpl->tpl_vars['d']->value['title'];?>
',this)"><?php echo $_smarty_tpl->tpl_vars['d']->value['title'];?>
</a></li>
						<?php }} ?>
					</ul>
					<div class="clear"></div>
				</div>
				
				<div class="aside_line"></div>
				
				<div class="aside_con" id="top-post-holder">
				    <label>
					<?php if ($_smarty_tpl->getVariable('blog')->value['top']==1){?>
					<input type="checkbox" id="top" name="top" value="1" checked="checked">
					<?php }else{ ?>
					<input type="checkbox" id="top" name="top" value="1">
					<?php }?>
					<font>文章置顶</font>
					</label>
					<p>多个置顶将按照时间排序</p>
				</div>
				
				<div class="aside_line"></div>
				
				<div class="aside_con" id="top-post-holder">
				    <label>
					<?php if ($_smarty_tpl->getVariable('blog')->value['noreply']==1){?>
					<input type="checkbox" id="noreplay" name="noreplay" value="1" checked="checked">
					<?php }else{ ?>
					<input type="checkbox" id="noreplay" name="noreplay" value="1">
					<?php }?>
					<font>禁止评论</font>
					</label>
					<p>本条内容不允许评论</p>
				</div>
                
                <?php if ($_smarty_tpl->getVariable('weibo')->value=='yes'||$_smarty_tpl->getVariable('qqwb')->value=='yes'){?>
                <div class="aside_line"></div>
				<?php }?>
                
                <?php if ($_smarty_tpl->getVariable('weibo')->value=='yes'){?>
                	 <?php if ($_SESSION['openconnect']['WEIB']){?>
				    <div class="aside_con" id="top-post-holder">
					    <label>
						    <input name="openconnect[WEIB]" type="checkbox"  value="1" checked="checked"><span>同步新浪微博</span>
						</label>
					</div>
					<?php }?>
			   <?php }?>
               
               <?php if ($_smarty_tpl->getVariable('qqwb')->value=='yes'){?>
               <div class="aside_con">
					<div class="pb-side-opt" id="top-post-holder">
					    <label>
						    <input name="pb-sync-to-qqweibo" type="checkbox" id="pb-sync-to-qqweibo" value="1"><span>同步腾讯微博</span>
						</label>
					</div>
				</div>
               <?php }?>
				