/*
/////////////////////////////////////////////////////////////////
//云边开源轻博, Copyright (C)   2010 - 2011  qing.thinksaas.cn
//$Id$
*/ 
(function($) {
        $.fn.disable = function() {
            return $(this).find("*").each(function() {
                $(this).attr("disabled", "disabled");
            });
        };
        $.fn.enable = function() {
			return $(this).find("*").each(function() {
				$(this).removeAttr("disabled");
			});
        };
})(jQuery);

(function($) {
	$.isChange={
		    // 检测改动的  id     fnc 返回 true: 改动过
		Set:function(obj,fnc){     
            $(window).bind('beforeunload',function(){
                if(isChanged(obj,fnc)){
                    return "你还有没保存的数据.要退出吗";
                }
            });
            function isChanged(obj,fnc){
                var is_changed = false;
                if(typeof(fnc)=="function"){
                    if(fnc()){return true};
                };
                $(obj).each(function() {
                    var _v = $(this).attr('_value');
                    if(typeof(_v) == 'undefined'){ _v = ''};
                    if(_v != $(this).val()){ is_changed = true;};
                });
                return is_changed;
            }
		},
		unSet:function(obj){        //  要提交的表单  id
			$(obj).submit(function(){
				$(window).unbind('beforeunload');
			})
		}
	}
})(jQuery);	

var qsearch = '添加标签,写一个回车一下';
$(document).ready(function(){
   
	var substrlen=16;  // 截取 字数
	$("#post-tag-input").val(qsearch);

    $("#post-tag").click(function(){
		$("#post-tag-input").focus();
    });

	$("#post-tag-input").focus(function(){
		if($(this).val()==qsearch){
			$(this).val("");
		};
	}).blur(function(){
		if($(this).val()==''){
			$(this).val(qsearch);
		};
		addtag();
	}).keyup(function(event){
		$(this).val(substr($(this).val(),substrlen));
		if (event.keyCode=="13"){
             addtag();
		};
	})

	// 中英字符截取
	function substr(str, len) {
		if (!str || !len) {
			return '';
		};
		var a=0;
		var i=0; 
		var temp= '';
		for (i=0;i<str.length;i++) {
			if (str.charCodeAt(i)>255) {
				a+=2;
			}else{
				a++;
			}; //如果增加计数后长度大于限定长度，就直接返回临时字符串  
			if (a>len) {
				return temp;
			}; //将当前内容加到临时字符串  
			temp+=str.charAt(i);
		}; //如果全部是单字节字符，就直接返回源字符串  
		return str;
	}


    


    $('.globox .trg:even').addClass("alt-row"); 

    $('#preview').click(function(){
        textbody.exec('Preview');			  
    });
    
    $('#cancel').click(function(){
        window.history.go(-1);			  
    });
    
    textbody =  $('#textarea').xheditor({loadCSS:skinpath+'/css/editor.css',urlBase:urlpath+'/',internalStyle:false});
    
});   

// 添加 小 tag 标签
function addtag(tag){
	if(tag != undefined){
		tags = tag;
	}else{
		var tags = $('#post-tag-input').val();
	};
		
	if(tags != '' && tags !=qsearch){
		$('#post-tag-list').append('<li tag="'+tags+'"><span>'+tags+'</span><a href="javascript:;" onclick="remTags(this)" title="删除">x</a></li>');
		$('#post-tag-input').val('');
	};
}
function postoff()
{
$('#pb-submiting-tip,#submit_baseinfo,#chgpwd,#cancel').toggle();	
};

function setTags()
{
	var tag_str = ''; 
	$('#post-tag-list li').each(function(){  	tag_str  += $(this).attr('tag') + ',';});
	$('#tag').val(tag_str); //写入标签
};




/*删除附件*/
function delAttach(id)
{
	$.dialog({content:'确认删除附件？',lock:true,yesFn:function(){ 
		$.post(urlpath+'/index.php?c=add&a=delattach',{'id':id},function(result){ 
				if(result == 'ok')
				{
					$('#attach_'+id).hide();tips('已删除');
				}else{
					tips('请稍后再试');
				}
			})			   
	},noFn:true});
};


/*删除附件 图片模块*/
function delAttachIMAGE(id)
{
	$.dialog({content:'确认删除附件？',lock:true,okFn:function(){ 
		$.post(urlpath+'/index.php?c=add&a=delattach',{'id':id},function(result){ 
				if(result == 'ok')
				{
					$('#attach_'+id).remove();
				}else{
					tips('请稍后再试');
				}
			})			   
	},noFn:true});
};


/*删除tag*/
function remTags(x)
{
	$(x).parent().remove();
};
/*从推荐列表选择tag*/
function tuiTag(x,y)
{
	$('#post-tag-list').append('<li tag="'+x+'"><span>'+x+'</span><a href="javascript:;" onclick="remTags(this)" title="删除">x</a></li>');
	$(y).parent().remove();
};

/*插入媒体到编辑器*/
function iattachBigImg(x)
{
	var x = x.split('|');
	if($('#blog-types').val() == 1){$('#attach').val(x[1]);};
	textbody.pasteHTML('<a href="'+x[0]+'" target="_blank"><img src="'+x[1]+'" alt="" class="feedimg"/></a>') ;
};
function iattachImg(x)
{
	if($('#blog-types').val() == 1){$('#attach').val(x);};
	textbody.pasteHTML('<img src="'+x+'" alt="" class="feedimg"/>') 
};

function iattach(x,y)
{
	var x = x.split('|');
	if(x[0] == 'img')
	{
		if(x[2] == undefined) //如果不存在缩略图
		{
			parent.textbody.pasteHTML('<img src="'+x[1]+'" />');	
		}else{
			parent.textbody.pasteHTML('<a href="'+x[1]+'" target="_blank"><img src="'+x[2]+'" alt="" /></a>') 
		}
	}else if(x[0] == 'mp3' || x[0] == 'mid' || x[0] == 'midi' || x[0] == 'wma' ){
		parent.textbody.pasteHTML('[music]'+x[1]+x[2]+'[/muisc]');	
	}else{
		parent.textbody.pasteHTML('<a href="'+x[2]+'">'+x[1]+'</a>');	
	}
}
