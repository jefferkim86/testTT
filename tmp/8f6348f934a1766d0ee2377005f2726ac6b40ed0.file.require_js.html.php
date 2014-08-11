<?php /* Smarty version Smarty-3.0.6, created on 2014-08-11 23:29:03
         compiled from "tplv2/require_js.html" */ ?>
<?php /*%%SmartyHeaderCode:183832454953e8e13f223799-21335422%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8f6348f934a1766d0ee2377005f2726ac6b40ed0' => 
    array (
      0 => 'tplv2/require_js.html',
      1 => 1407770941,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '183832454953e8e13f223799-21335422',
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
var G_domain = '<?php echo $_SESSION['domain'];?>
';
<?php if ($_SESSION['uid']==$_smarty_tpl->getVariable('user')->value['uid']){?> 
  var G_isSelf = true; 
<?php }else{ ?>
  var G_isSelf = false;
<?php }?>
<?php if (isset($_smarty_tpl->getVariable('adunit',null,true,false)->value[3])&&$_smarty_tpl->getVariable('adunit')->value[3]['is_show']==1){?>
var unit_3 = true;
<?php }?>
			
</script>

<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/dialog.js?t=<?php echo $_smarty_tpl->getVariable('timestamp')->value;?>
"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/global.js?t=<?php echo $_smarty_tpl->getVariable('timestamp')->value;?>
"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/juicer.js"></script>

<link href="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/dialog/default.css?t=<?php echo $_smarty_tpl->getVariable('timestamp')->value;?>
" rel="stylesheet" />
<link href="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/css/feed.css?t=<?php echo $_smarty_tpl->getVariable('timestamp')->value;?>
" rel="stylesheet" type="text/css"/>

<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/jquery.twbsPagination
.js?t=<?php echo $_smarty_tpl->getVariable('timestamp')->value;?>
"></script>



<!-- 百度编辑器-->

<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/ueditor/ueditor.config.js?t=<?php echo $_smarty_tpl->getVariable('timestamp')->value;?>
"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/ueditor/ueditor.all.js?t=<?php echo $_smarty_tpl->getVariable('timestamp')->value;?>
"></script>



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
/js/login.js?t=<?php echo $_smarty_tpl->getVariable('timestamp')->value;?>
"></script>
	  <script src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/jquery.dpwd.js?t=<?php echo $_smarty_tpl->getVariable('timestamp')->value;?>
"></script>
  <?php }else{ ?>
  	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/css/page.css?t=<?php echo $_smarty_tpl->getVariable('timestamp')->value;?>
" />
	<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/jquery.rotate.js?t=<?php echo $_smarty_tpl->getVariable('timestamp')->value;?>
"></script>
  <?php }?>


  <?php if ($_smarty_tpl->getVariable('editor')->value=='yes'){?>
  <script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/editor/xheditor.js?t=<?php echo $_smarty_tpl->getVariable('timestamp')->value;?>
"></script>

  <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/css/jquery.Jcrop.css?t=<?php echo $_smarty_tpl->getVariable('timestamp')->value;?>
"/>
  <script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/jquery.Jcrop.js?t=<?php echo $_smarty_tpl->getVariable('timestamp')->value;?>
"></script>
  <script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/jquery.form.js?t=<?php echo $_smarty_tpl->getVariable('timestamp')->value;?>
"></script>
  <script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/model.global.js?t=<?php echo $_smarty_tpl->getVariable('timestamp')->value;?>
"></script>
  <?php }?>

  <?php if ($_smarty_tpl->getVariable('custom')->value=='yes'){?>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/custom.js?t=<?php echo $_smarty_tpl->getVariable('timestamp')->value;?>
"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/js/colorselect/jquery.modcoder.excolor.js?t=<?php echo $_smarty_tpl->getVariable('timestamp')->value;?>
"></script>
  <?php }?>


  <?php if ($_smarty_tpl->getVariable('addcss')->value=='yes'){?>
  <link rel="stylesheet" type="text/css" media="screen" href="<?php echo $_smarty_tpl->getVariable('syskin')->value;?>
/css/add.css?t=<?php echo $_smarty_tpl->getVariable('timestamp')->value;?>
" />
  <?php }?>
