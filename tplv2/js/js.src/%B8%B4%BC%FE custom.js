function slideToggle(id,that){
	$('#b_info_con,#b_theme_con,#b_themes_con,#b_custom_con').hide();
	$('.customizeTool .menu a').removeClass('current');
	$('#'+id).toggle();
	$(that).toggleClass('current');
};
function setThemeId(url,that)
{
	$('.theme_box li a').removeClass('current');
	$(that).addClass('current');
	$('#previewIframe').attr('src',url);
}

function background_postion(v,that,id){
	$('#background_postion .bg_postion li a').removeClass('current');
	$(that).addClass('current');
	$('#'+id).val(v);
}

function background_repet(v,that,id){
	$('#background_repeat .bg_repeat li a').removeClass('current');
	$(that).addClass('current');
	$('#'+id).val(v);
}

function background_scroll(v,that,id){
	$('#background_scroll .bg_scroll li a').removeClass('current');
	$(that).addClass('current');
	$('#'+id).val(v);
}
function saveConfig(url)
{
			
	artDialog({
			id: 'Confirm',
			fixed: true,
			lock: true,
			width:'200px',
			content: '确定保存当前设置吗?',
			ok: function () {
				$('#form1').attr('action',url);
				$("#submit").click();
			},
			cancel: function(){}
		});
}

function CannlConfig(url)
{
	artDialog({
			id: 'Confirm',
			fixed: true,
			lock: true,
			width:'200px',
			content: '您确定要取消?',
			ok: function () {
			  window.location.href=url
			},
			cancel: function(){}
		});
		
}
function reinitIframe(){
	var iframe = document.getElementById("previewIframe");
	try{
		var bHeight = iframe.contentWindow.document.body.scrollHeight;
		var dHeight = iframe.contentWindow.document.documentElement.scrollHeight;
		var height = Math.max(bHeight, dHeight);
		iframe.height =  height;
	}catch (ex){}
}

function changeupload(id)
{
	$('#'+id+'_input').hide();
	$('#'+id+'_input').val('');
	$('#'+id+'_txt').hide();
	$('#'+id+'_upload').show();
	
}

function customDefault(url)
{

	artDialog({
			id: 'Confirm',
			fixed: true,
			lock: true,
			width:'200px',
			content: '您确定要恢复默认装扮?当前装扮将不会保存',
			ok: function () {
			 window.location.href=url
			},
			cancel: function(){}
		});

}

$('document').ready(function() {
		// running ExColor
		//$('.colorinput').modcoder_excolor();
		$('.colorinput').modcoder_excolor({
			hue_bar : 2,
			hue_slider : 1,
			sb_border_color : '#52527d',
			round_corners : false,
			background_color : '#e5e1e6',
			backlight : false,
			input_background_color : '#f5edd5',
			label_color : '#3d4d3a',
			color_box : false,
			effect : 'slide',
			anim_speed : 'fast'
		});
	});
