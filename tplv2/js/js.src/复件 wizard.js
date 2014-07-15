/*wizard导航js*/

$(document).ready(function(){

	$('#wizard_save_domain').click(function(){
	var val = $('#wizard_domain').val();
		if(val != ''){
			$.ybAPI('user','wizard_save_domain',{domain:val},function(data){
				if(data.status == 1){
					$('#wizard_domain_area').slideUp('fast',function(){
						$('#wizard_tag_area').slideDown('fast');
					});
					
					
				}else{
					tips(data.msg);
				}
			});
		}else{
			tips('请输入个性域名');
		}
	});
	
	$('#wizard_save_tag').click(function(){
		var tag_str='';
		$('#system-tag-list .current').each(function(){  
			tag_str  += $(this).attr('tag') + ',' +$(this).attr('tid') + '|';
		})
		if(tag_str != ''){
			$.ybAPI('user','wizard_save_tag',{tag:tag_str},function(data){
				if(data.status == 1){
					$('#wizard_tag_area').slideUp('fast',function(){
						load_user_recommend();
					});
					
				}else{
					tips(data.msg);
				}
			});
		}else{
			tips('请最少选择一个分类');
		}
	});
	
	$('#wizard_save_user').click(function(){
		$('#wizard_save_user,#user_recommend').hide();
		$('.fw_loading').show();
		var uid_str='';
		$('#user_recommend .current').each(function(){  
			uid_str  += $(this).attr('uid') + '|';
		})
		if(uid_str != ''){
			$.ybAPI('user','wizard_save_follow',{uid:uid_str},function(data){
				if(data.status == 1){
					$.dialog({
						id: 'tips',
						content: '恭喜您完成了首次引导',
						ok:function(){window.location.reload()},
						padding:10,
						width:'300px',
						fixed: true,
						time:3000,
						lock:true
					});
				}else{
					tips(data.msg);
				}
			});
		}else{
			$('.fw_loading').hide();
			$('#wizard_save_user,#user_recommend').show();
			tips('请最少选一个用户');
		}
	});
	
	
	
	
	
});

function load_user_recommend(){
	$('#user_recommend_area').slideDown();
	$('.fw_loading').show();
	$('#user_recommend').html('');
	$.ybAPI('user','recommend',{num:'24'},function(data){
		$('.fw_loading').hide();
		for(var i=0,l=data.body.length;i<l;i++){
			$('#user_recommend').append(tmpl_wizard_user(data.body[i]));
		}
	});
}
function wizard_curr(uid,that){
	$(that).parent().toggleClass('current');
}
function load_user_allselect(){
	$('#user_recommend .follow').addClass('current');
}
function tmpl_wizard_user(d){
	var a = '<div class="follow" uid="'+d.uid+'"> '+
        '<a href="javascript:;" title="'+d.sign+'" onclick="wizard_curr('+d.uid+',this)">'+
        '    <div class="info">'+
        '        <div class="avatar"><div class="head_bg"><img src="'+d.h_img+'" alt="'+d.username+'" class="face"/></div></div>'+
        '            <div class="userinfo">'+
        '                <li class="username">'+d.username+'</li>'+
        '                <li>'+d.blogtag+'</li>'+
        '            </div>'+
        '        <div class="fwbg"></div>'+
		'	</div>'+
        '    </a>'+
        '</div>';
return a;
}