<?php /* Smarty version Smarty-3.0.6, created on 2014-08-10 10:50:20
         compiled from "tplv2/pm_detail.html" */ ?>
<?php /*%%SmartyHeaderCode:176025188053e6ddec3f8685-88370878%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd91a1c2a8dfc01d8b3ec896fc8082777dd94dcf9' => 
    array (
      0 => 'tplv2/pm_detail.html',
      1 => 1407639018,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '176025188053e6ddec3f8685-88370878',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("require_header.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('loadedit','yes'); echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<div id="index">
    <div id="article">
		
		<div class="pm-detail">
			<div id="msg">
				<div class="hd" id="toid" toid="<?php echo $_smarty_tpl->getVariable('touid')->value;?>
">
	    			<h2>与<span id="hd-touser"></span>的对话</h2>
	    			<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'pm'),$_smarty_tpl);?>
" class="msg-hd-link">返回列表</a>
	    		</div>
	    		<div class="bd">
	    			<div class="inputblock">
	    				<textarea class="textarea" id="textarea"></textarea>
						<div class="extra">
							<span class="counter">还可以输入140字</span>
							<button type="button" id="send_submit">发送</button>
						</div>
	    			</div>
	    			<div class="lists pm-info clearfix">
	    					<ul id="J-pmInfoList">

	    					</ul>


	    			</div>
					
				</div>
				<input type="hidden" id="touser" title="touser" value="<?php echo $_smarty_tpl->getVariable('tousername')->value;?>
" />
			</div>
			<div id="J-pagination"></div>
    	</div>



	</div>
	<div id="aside">
        <?php $_template = new Smarty_Internal_Template("require_sider.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
    </div>
</div>
<script type="text/template" id="J-msgTpl">

<li class="msg-item clearfix ${det}">
	<a href="${h_url}" class="avatar"><img src="${h_img}" alt=""/></a>
	<div class="desc">
		<span class="pop-corner"><s class="outter"></s></span>
		<p class="content">${info}</p>
		<p class="time">${time}</p>
	</div>
</li>

</script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/view/messageView.js"></script>
<script type="text/javascript">
                console.log('1111uidddddd',$("#toid").attr("toid"));

	var opt = {
		'touid':$("#toid").attr("toid"),
		'listEl':'#J-pmInfoList',
		'pagination':'#J-pagination'
	};
	var messageView = new Tuitui.messageView();
	messageView.getPmInfo(opt);
</script>

<?php $_template = new Smarty_Internal_Template("require_footer.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
</body>
</html>