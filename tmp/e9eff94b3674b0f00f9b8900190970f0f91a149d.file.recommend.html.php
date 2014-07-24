<?php /* Smarty version Smarty-3.0.6, created on 2014-01-17 21:44:09
         compiled from "tplv2/recommend.html" */ ?>
<?php /*%%SmartyHeaderCode:169518739952d933a9a7d370-23694451%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e9eff94b3674b0f00f9b8900190970f0f91a149d' => 
    array (
      0 => 'tplv2/recommend.html',
      1 => 1341154842,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '169518739952d933a9a7d370-23694451',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("require_header.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('layout','yes'); echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>


<script type="text/javascript">
$(document).ready(function(){ 
	do_recommend(0);
})

//recommend频道
function do_recommend(tagid){
	$('#feed_loading').show();
	$('#follow_font').hide();
	$('.recommend_sort').find('li').removeClass('current');	
	$.paging({ctn1:"#follow_area",ctn2:'#paging',yc:'blog',ym:'recommendUser',showpage:true,yprm:{tid:tagid},ftype:function(d){
	    $('.recommend_sort').find('#cate_'+tagid).addClass('current');
		$('.recommend_blog').html('');
		$('#feed_loading').hide();
		if(d.body.data.length >0){
				$('.recommend_blog').append(template('tmpl_recommend',d.body));
		}else{
			$('#follow_font').show();
		}
		
	}});
}
</script>


<div id="index">
    <div class="recommend_sort">
	    <ul>
	        <li id="cate_0"><a href="javascript:;" onclick="do_recommend(0)">全部</a></li>
			<?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('systag')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value){
?>
			<li id="cate_<?php echo $_smarty_tpl->tpl_vars['d']->value['cid'];?>
"><a href="javascript:;" onclick="do_recommend(<?php echo $_smarty_tpl->tpl_vars['d']->value['cid'];?>
)"><?php echo $_smarty_tpl->tpl_vars['d']->value['catename'];?>
</a></li>
			<?php }} ?>
			<div class="clear"></div>
			
		</ul>
	</div>
		<?php if (isset($_smarty_tpl->getVariable('adunit',null,true,false)->value[4])&&$_smarty_tpl->getVariable('adunit')->value[4]['is_show']==1){?>
			<div id="ad_recommend"></div>
			<script>
				$(document).ready(function(){
					ad_aside('#ad_recommend',4);
					setInterval(function(){
						ad_aside('#ad_recommend',4);
					}, 30000);
				})
			</script>
		<?php }?>
	
	<div id="feed_loading" style="margin:20px auto;"></div>
	
	<div class="recommend_blog"></div>
	
	<div id="follow_font" class="recommend_font">暂时没有推荐</div>
	<div id="paging"></div>
	
</div>

<?php $_template = new Smarty_Internal_Template("require_footer.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>