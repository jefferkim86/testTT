<?php /* Smarty version Smarty-3.0.6, created on 2014-08-10 15:25:15
         compiled from "tplv2/models/product.html" */ ?>
<?php /*%%SmartyHeaderCode:33496881453e71e5b985b11-08348390%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '72975a5995ca04dfccd936e58f59031fcf816404' => 
    array (
      0 => 'tplv2/models/product.html',
      1 => 1407655514,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '33496881453e71e5b985b11-08348390',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include '/Users/jinjianfeng/Documents/work/tuitui/init/Drivers/Smarty/plugins/modifier.date_format.php';
?><?php $_template = new Smarty_Internal_Template("require_header.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('addcss','yes');$_template->assign('editor','yes');$_template->assign('titlepre',"分享宝贝"); echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<script> 
var swfpath = '<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
'; 
var ssid    = '<?php echo session_id();?>
';
var bid     = '';
var num     = '20';
var filext  = '*.jpg;*.jpge;*.png;*.gif';
var size    = '20480';

</script>


<style type="text/css">
	.pub-good .edui-for-simpleupload {display: none !important;}
</style>

<div id="publishGood">
<form action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'post','a'=>'saved','model'=>$_smarty_tpl->getVariable('mid')->value),$_smarty_tpl);?>
" id="form1" method="post">
	<div id="article">
	    <div id="box" class="pub-good">
	        <h2>发宝贝</h2>
			<div id="post_area">
				<h3 class="title-t">宝贝链接<span>（目前支持淘宝、天猫的宝贝链接）</span></h3>
				<div class="p_product">
					<input type="text" name="producturl" id="producturl" class="pub-url producturl"   value="" />
				</div>
				<div id="goodInfoBlock"></div>
				
				<div style="display:none">
					<input type="hidden" value="" name="title" id="J_title"/>
					<input type="hidden" value="" name="discount_price" id="J_discount_price"/>
					<input type="hidden" value="" name="price" id="J_price"/>
					<input type="hidden" value="" name="deliveryFees" id="J_deliveryFees"/>
					<input type="hidden" vlaue="" name="image" id="J_image"/>
				</div>
				<h3 class="title-t">宝贝说明<span>（可不填）</span></h3>
				<div class="p_area">
					<?php if ($_smarty_tpl->getVariable('tpl_config')->value['imguplod']!=0){?>
					<div id="uploadpic">
					    <span id="upload_bar">
						    <div class="uploadBtn" id="upload_img"><span>上传图片</span>
							<input type="file" size="1" name="filedata" ext="<?php if ($_smarty_tpl->getVariable('tpl_config')->value['imagetype']){?><?php echo $_smarty_tpl->getVariable('tpl_config')->value['imagetype'];?>
<?php }else{ ?><?php echo $_smarty_tpl->getVariable('yb')->value['addimg_type'];?>
<?php }?>" />
							</div>
						</span>
						<span id="uploading" style="display:none">正在上传...</span>
					</div>
					<?php }?>
					<div id="textareaEditor" style="width:820px;height:200px;">
						
					</div>
					<textarea name="textarea" id="textarea" style="display:none;"><?php echo $_smarty_tpl->getVariable('body')->value['content'];?>
</textarea>
                    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->getVariable('blog')->value['bid'];?>
" />
				</div>
				<div class="tags clearfix" id="tags" style="display:none;">
					<label>标签（可不选）</label>
					<ul class="tag-list">
						<li tagVal="晒单">晒单</li>
						<li tagVal="二手">二手</li>
						<li tagVal="代购">代购</li>
						<li tagVal="团购">团购</li>
						<li tagVal="购物经验">购物经验</li>
					</ul>
					<input type="hidden" name="tag" value="" id="J-tagVal"/>
				</div>
				<hr/>
				
				<?php if (is_array($_smarty_tpl->getVariable('attach')->value)){?>
				<div class="p_area">
				    <div id="media_lib">
					    <h3 class="title">我的媒体库<span>（您可以插入上次未发布的媒体文件）</span></h3>
						<table border="0" width="100%" align="center" cellpadding="0" cellspacing="0" class="globox">
						    <tr>
							    <th width="30">ID</th>
								<th>名称</th>
								<th width="60">大小</th>
								<th width="40">类型</th>
								<th width="140">上传时间</th>
								<th width="100">操作</th>
							</tr>
							<?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('attach')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value){
?>
							<tr class="trg" id="attach_<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
">
							    <td><?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['d']->value['blogdesc'];?>
</td>
								<td><?php echo formatBytes(array('size'=>$_smarty_tpl->tpl_vars['d']->value['filesize']),$_smarty_tpl);?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['d']->value['mime'];?>
</td>
								<td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['d']->value['time'],"%Y/%m/%d %H:%M");?>
</td>
								<td><a href="javascript:void(0)" onclick="<?php echo attach_insert(array('file'=>$_smarty_tpl->tpl_vars['d']->value['path'],'name'=>$_smarty_tpl->tpl_vars['d']->value['blogdesc'],'id'=>$_smarty_tpl->tpl_vars['d']->value['id']),$_smarty_tpl);?>
">插入</a>/<a href="javascript:void(0)" onclick="delAttach('<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
')">删除</a></td>
							</tr>
							<?php }} ?>
						</table>
					</div>
				</div>
				<?php }?>
				
				<div class="p_area">
				    <div id="pb-action-holder">
					    <a href="#" id="submit" class="btn" type="product">发布</a>
						<!-- <a href="#" id="preview" class="btn">预览</a> -->
						<a href="#" id="cancel" class="btn">取消</a>
						<span style="display:none;" id="pb-submiting-tip">正在保存</span>
					</div>
				</div>
				
			</div>
	    </div>
	
	</div>
</form>
</div>

<script type="template" id="J_GoodInfoTmp">
    <div class="feed-good feed-good-pub">
        <div class="pop-corner-desc"><s class="outter"></s><s class="inner"></s></div>
        <div class="feed-good-cont clearfix">
            <div class="feed-good-info">
                <div class="feed-good-img">
                    <img src="${image}" id="J_PicBox"/>
                 </span>
                </div>
                <div class="feed-good-property">
                    <h3 class="feed-good-title">${title}</h3>
                    <div class="feed-good-fee">
                        <ul>
                            {@if price}
                            <li class="oprice ${discountCls}"><span>价格：</span>
                                <b>${price}</b>元
                            </li>{@/if}
                            {@if discount_price}
                            <li class="price"><span>促销：</span>
                            <b>${discount_price}</b> 元</li>{@/if}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</script>

<script type="text/javascript">

window.ueditorInstance = UE.getEditor('textareaEditor');


$("#preview").click(function() {
	window.ueditorInstance.execCommand("Preview")
});
$(window).on("beforeunload", function() {
	if($("#J_title").val() != '' || window.ueditorInstance.getContent() != ''){
   		return "你还有没保存的数据.要退出吗";
    }
});
</script>








<?php $_template = new Smarty_Internal_Template("require_pubfooter.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
