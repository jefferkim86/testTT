<?php /* Smarty version Smarty-3.0.6, created on 2014-01-17 21:51:20
         compiled from "tplv2/admin/ad_list.html" */ ?>
<?php /*%%SmartyHeaderCode:189748353852d93558702bb1-47462921%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f686c7b28e093961a07f275e809afe59e04ba1bb' => 
    array (
      0 => 'tplv2/admin/ad_list.html',
      1 => 1341154848,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '189748353852d93558702bb1-47462921',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template('admin/header.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

<div id="content">

    <div class="main">
	    <a class="btn_common_a" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'adContent','edit'=>'add'),$_smarty_tpl);?>
">创建广告</a>
	    <input class="btn_common"  type="button" value="刷新" id="ad_refresh" />
		<div class="clear"></div>
	</div>

	<div class="con_cpage">
	<form id="form1" name="form1" method="post" action="">   
		<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_model">
                        <tr class="table_title">
						    <th class="m_title">广告标题</th>
                            <th>广告类型</th>
                            <th>广告位</th>
                            <th>日期</th>
                            <th>广告状态</th>
                            <th>编辑</th>
                        </tr>
                        <?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('adList_list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value){
?>
                        <tr class="table_hover">
							<td class="m_title"><?php echo $_smarty_tpl->tpl_vars['d']->value['title'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['d']->value['type'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['d']->value['auid'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['d']->value['time_date_limit'];?>
</td>
                            <td class="fun_con"><?php if ($_smarty_tpl->tpl_vars['d']->value['is_show']==1){?><a class="f_open" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'adContent','flag'=>'close','en_show'=>0,'id'=>$_smarty_tpl->tpl_vars['d']->value['adid']),$_smarty_tpl);?>
" title="已开启,点击关闭">已开启,点击关闭</a><?php }else{ ?><a class="f_close" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'adContent','flag'=>'close','en_show'=>1,'id'=>$_smarty_tpl->tpl_vars['d']->value['adid']),$_smarty_tpl);?>
" title="已关闭,点击开启">已关闭,点击开启</a><?php }?></td>
                            <td class="fun_con"><a class="f_edit" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'adContent','edit'=>$_smarty_tpl->tpl_vars['d']->value['adid']),$_smarty_tpl);?>
" title="编辑">编辑</a><a class="f_delete" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'adContent','del'=>$_smarty_tpl->tpl_vars['d']->value['adid']),$_smarty_tpl);?>
" onclick="return(confirm('确定删除?'))" title="删除">删除</a></td>
                        </tr>
                        <?php }} ?>
                    </table>
                    <?php echo $_smarty_tpl->getVariable('adUnit_pager')->value;?>

	</form>
	</div>
    
</div>

<?php $_template = new Smarty_Internal_Template('admin/footer.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/kalendae/kalendae.min.js"></script>
<link rel="stylesheet" href="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/kalendae/kalendae.css" type="text/css" charset="utf-8">
<script type="text/javascript">
    $(function(){
        //打开添加
        $("#ad_add_show").click(function(){
            $("#title").val("");
            $("#keyword").val("");
            $("#desc").val("");
            $("#ad_add").slideToggle();
        });
       
        //关闭添加
        $("#ad_add_hidden").click(function(){
            $("#ad_add").slideUp();
        });
       
        //刷新本页
        $("#ad_refresh").click(function(){
            window.location.reload()
        });
        //日期选择
        new Kalendae.Input('date1',{
            format:"YYYY-MM-DD"
        });
        new Kalendae.Input('date2',{
            format:"YYYY-MM-DD"
        });        
        //当选择的广告位不是系统广告位时。广告类型的 右下角弹出和全屏才可以选择
        $("#select_auid").change(function(){
            $("#select_type option").remove();
            if(100<=$("#select_auid").val())
            {
                $("#select_type").append("<option value='1'>图片</option><option value='2'>HTML广告</option><option value='3'>右下角弹出</option><option value='4'>全屏</option>");
            }else
            {
                $("#select_type").append("<option value='1'>图片</option><option value='2'>HTML广告</option>");
            }
            _changeShow();
        });
        //如果是图片,则显示上传
        _changeShow();
        $("#select_type").change(function(){
            _changeShow();
        });
        //清除时间
        $("#clear_date").click(function(){
            $("#date1").val("");
            $("#date2").val("");
        });
    });

    //如果是图片则显示上传,
    function _changeShow(){
        if(1 == $("#select_type").val()){
            $("#ad_content").html("<input type=\"file\" name=\"body\" />");
        }else{
              $("#ad_content").html("<textarea name=\"body\"></textarea>");
        }
    }
</script>