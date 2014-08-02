<?php /* Smarty version Smarty-3.0.6, created on 2014-08-01 00:48:47
         compiled from "tplv2/require_js.html" */ ?>
<?php /*%%SmartyHeaderCode:207434443853da736f402f79-15564371%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8f6348f934a1766d0ee2377005f2726ac6b40ed0' => 
    array (
      0 => 'tplv2/require_js.html',
      1 => 1406825282,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '207434443853da736f402f79-15564371',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<script>
var urlpath = '<?php echo $_smarty_tpl->getVariable('url')->value;?>
';
var skinpath = '<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
';

var uid = '<?php echo $_SESSION['uid'];?>
';
var G_username ='<?php echo $_SESSION['username'];?>
';
<?php if (isset($_smarty_tpl->getVariable('adunit',null,true,false)->value[3])&&$_smarty_tpl->getVariable('adunit')->value[3]['is_show']==1){?>
var unit_3 = true;
<?php }?>
			
</script>

<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/jquery.js"></script>
<!-- <script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/class.js"></script>
 --><script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/dialog.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/global.js"></script>
<!-- <script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/jquery.mousedelay.js"></script>
 -->
<!-- <script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/model.js"></script>
 --><!-- <script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/template.js"></script> -->
<!-- <script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/mustache.js"></script>
 --><script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/juicer.js"></script>

<link href="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/dialog/default.css" rel="stylesheet" />
<link href="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/css/feed.css" rel="stylesheet" type="text/css"/>
<!-- <script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/template_models.js"></script>
 <script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/jquery.pagination.js"></script>
-->
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/jquery.twbsPagination
.js"></script>



<!-- 百度编辑器-->

<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/ueditor/ueditor.all.js"></script>



<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/underscore.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/backbone.js"></script>
<script type="text/javascript"> 
var Tuitui = {};
Tuitui.globalData = {};
Tuitui.globalData.pageNeedLoading = true;
function getApi(c, m, params, fun) {
    if (params == undefined) {
        params = ''
    };
    $.ajax({
        url: urlpath + '/index.php?c=api&yc=' + c + '&ym=' + m,
        data: params,
        success: function(data) {
            fun(data)
        },
        error: function(x) {
            if (x.status != 200) {
                if (x.status != 0) {
                    waring('网络错误,请稍候');
                    return false
                }
            }
            return false
        },
        dataType: 'json',
        type: 'post'
    });
};
</script>


<!-- <script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/func.js"></script>
 -->

  <?php if ($_smarty_tpl->getVariable('login')->value=='yes'){?>
	  <script src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/login.js"></script>
	  <script src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/jquery.dpwd.js"></script>
  <?php }else{ ?>
  	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/css/page.css" />
	<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/jquery.rotate.js"></script>
  <?php }?>


  <?php if ($_smarty_tpl->getVariable('editor')->value=='yes'){?>
  <script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/editor/xheditor.js"></script>

  <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/css/jquery.Jcrop.css"/>
  <script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/jquery.Jcrop.js"></script>
  <script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/jquery.form.js"></script>
  <script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/model.global.js"></script>
  <?php }?>

  <?php if ($_smarty_tpl->getVariable('custom')->value=='yes'){?>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/custom.js"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/colorselect/jquery.modcoder.excolor.js"></script>
  <?php }?>


  <?php if ($_smarty_tpl->getVariable('addcss')->value=='yes'){?>
  <link rel="stylesheet" type="text/css" media="screen" href="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/css/add.css" />
  <?php }?>
