
$(document).ready(function(){

    var artTabs = function (bar, config) {
	var gid = function (id) {return document.getElementById(id)};
	
	config = config || {};
	var bar = typeof bar === 'string' ? gid(bar) : bar,
		className = config.className || 'current',
		callback = config.callback || function () {},
		isMouseover = config.isMouseover,
		
		buttons = bar.getElementsByTagName('a'),
		selectButton = buttons[
			config.index ||
			function () {
				var ret = 0;
				for (i = 0; i < buttons.length; i++) {
					if (buttons[i].className === className) ret = i;
				};
				return ret;
			}()
		],
		showContent = gid(selectButton.href.split('#')[1]),
		target,
		fn = function (event) {
			event = event || window.event;
			target = event.target || event.srcElement;
			
			if (target.nodeName.toLowerCase() === 'a') {
				showContent.style.display = 'none';
				showContent = gid(target.href.split('#')[1]);
				showContent.style.display = 'block';
				selectButton.className = '';
				selectButton = target;
				target.className = className;
				target.focus();
				callback(selectButton, showContent);
				return false;
			};
		};

	if (isMouseover) bar.onmouseover = fn;
	bar.onclick = fn;// click事件至少能保证手持设备可以使用
};

// 给jQuery添加插件
jQuery.fn.artTabs = function (config) {
	return this.each(function () {
		artTabs(this, config);
	});
};
})


$(document).ready(function(){

	jQuery('.artTabs > ul').artTabs();
	queryVersion();
	$('input[type=submit]').addClass('submit');
	$('input[type=text]').addClass('textipt');
	$(".table tr:odd").addClass('tableven');	
	$(".table2 tr:even").addClass('tableven');	
	$(".table2 tr").hover(function(){
	  	  $(this).addClass('hover')
	  },function(){
		  $(this).removeClass('hover')
	});
	
});


function queryVersion()
{
	$('#checkVersion').html('正在检查更新...');
	var ver = $('#encodeversion').html();
	$.getJSON('http://qing.thinksaas.cn/version.php?ver='+ver+'&callback=?',function(rs){
				if(rs.state ==99){$('#checkVersion').html('暂时无法检查,或检查出错'); return false;}
				if(rs.state ==98){$('#checkVersion').html('您使用的已是最新版本'); return false;}
				if(rs.state ==3) { alert('可用更新有漏洞补丁，请尽快升级，否则系统不再安全。') }
			   $('#checkVersion').html('<a href="http://www.thinksaas.cn/index.php/group/group/groupid-129" target="_blank">更新可用：'+rs.version +' '+rs.type +' ' + rs.info+'</a>');    			
	})
}

function showprccmsg(type){
	if(type == 'ok'){msg = '成功执行操作';}
	if(type == 'err') { msg = '执行操作失败';}
	
	$.dialog({
		title: '操作执行提示',
		content:msg,
		time:3000
		
	});
}
	

/*禁止访问*/
function nologin(id){
	$.post(urlpath+'/index.php?c=admin&a=user&lockuser='+id,function(){ window.location.reload(); })
}

/*重设密码*/
function resetpwd(uid,name)
{
	var val=prompt('请给'+name+'输入新密码',""); 
	if(val != ''){ $.post(urlpath+'/index.php?c=admin&a=user&resetpwd='+uid+'&pwd='+val,function(rs){ alert(rs)})  }
}
/*删除系统标签*/
function delsystag(cid){
	artDialog({
			id: 'Confirm',
			fixed: true,
			lock: true,
			width:'200px',
			content: '你确定要删除这个系统标签？',
			ok: function () {
				$.post(urlpath+'/index.php?c=admin&a=systag&sysdel='+cid,function(rs){$('#systag_'+cid).hide('fast');})
			},
			cancel: function(){}
	});
}
/*删除用户标签*/
function delusertag(tid)
{
	artDialog({
			id: 'Confirm',
			fixed: true,
			lock: true,
			width:'200px',
			content: '你确定要删除这个用户标签？',
			ok: function () {
				 $.post(urlpath+'/index.php?c=admin&a=usertag&userdel='+tid,function(rs){$('#usertag_'+tid).hide('fast');})
			},
			cancel: function(){}
	}); 
}

/*优化表*/
function tableOp(tab)
{
	 $.post(urlpath+'/index.php?c=admin&a=database&dbac=op&tabl='+tab,function(rs){window.location.reload();})
}

/*修复*/
function tableRep(tab,msg)
{
	alert('表故障原因'+msg);
	 $.post(urlpath+'/index.php?c=admin&a=database&dbac=rep&tabl='+tab,function(rs){window.location.reload();})
}

function unInstallTheme(id)
{
	artDialog({
			id: 'Confirm',
			fixed: true,
			lock: true,
			width:'200px',
			content: '你确定要卸载这个主题吗？',
			ok: function () {
			  window.location.href=urlpath+'/index.php?c=admin&a=theme&m=uninstall&id='+id;
			},
			cancel: function(){}
		});

}

function outputTab(tab)
{
	window.location.href=urlpath+'/index.php?c=admin&a=database&outab='+tab;
}

function databseOut(url)
{
	$('#download').html('执行中...').attr('disabled',true);
	window.location.href=url;
}


function checkAll(checkall){
	$('.'+checkall).attr('checked','checked');
}


function delblogs(ids){
	 artDialog({
        id: 'Confirm',
        fixed: true,
        lock: true,
		width:'200px',
        opacity: .1,
        content: '确定要删除吗?',
        ok: function () {
           $.ybAPI('user','delblog',{id:ids},function(data){
							$('#blog_'+ids).hide();
			});
        },
        cancel: function(){}
    });
}

function delblog_all(){
	
	 artDialog({
        id: 'Confirm',
        fixed: true,
        lock: true,
		width:'200px',
        opacity: .1,
        content: '确定要批量删除吗?',
        ok: function () {
			$('[name=delid]').each(function(){
				if($(this).attr("checked") == 'checked'){
				var ids = $(this).attr("delid");
					 $.ybAPI('user','delblog',{id:ids},function(data){
							$('#blog_'+ids).hide();
					});
				}
			})
        },
        cancel: function(){}
    });
	
	
}

