/*
/////////////////////////////////////////////////////////////////
//云边开源轻博, Copyright (C)   2010 - 2011  qing.thinksaas.cn
//$Id$
*/
// login and reg 请各位改js的注意格式哈 by anythink

$(document).ready(function(){
    $(":password").dPassword();    
    $("#wrap").append("<div id='titlep'></div>");
    $(".tip").each(function(){
	    var tipObj=$("#titlep");
		var _this=$(this);
        tipObj_height=tipObj.height();
        _this.hover(function(){
            p=$(this).offset();
            pTop=p.top-tipObj_height;
            pLeft=p.left;
           tipObj.html(_this.attr("title")).css({"top":pTop,"left":pLeft}).show();
        },function(){
            tipObj.hide();
        })
    });
		
	$(".input").focus(function(){
		$(this).addClass("curr");
	}).blur(function(){
		$(this).removeClass("curr");
	});

    $("#loginForm").keydown(function(e){
        if(e.keyCode==13){
          $("#loginSubmit").trigger("click");
        }
    });   
    
    $("#regForm").keydown(function(e){
        if(e.keyCode==13){
          $("#regSumbit").trigger("click");
        }
    });
    $("#findpwdForm").keydown(function(e){
        if(e.keyCode==13){
          $("#findpwdSubmit").trigger("click");
        }
    });
    
	$('#loginSubmit').click(function(){
			$.ybAPI('login','vary',$('#loginForm').serialize(),function(data){
				if(data.status != 1){
					reloadcode('vericode');
					waring(data.msg);
				}else{
					window.location.href=$('#loginForm').attr('callback');
				}
			});	
		});
		
	$('#regSumbit').click(function(){
        $.ybAPI('login','reg',$('#regForm').serialize(),function(data){
            if(data.status != 1){
                reloadcode('vericode');
                waring(data.msg);
            }else{
                window.location.href=$('#regForm').attr('callback');
            }
        })	
    });	
	
	$('#findpwdSubmit').click(function(){
        $.ybAPI('login','findpwd',$('#findpwdForm').serialize(),function(data){
            if(data.status != 1){
                reloadcode('vericode');
                waring(data.msg);
            }else{
                waring(data.body)
            }
        });	
    });
	
	$('#logOut').click(function(){
        $.ybAPI('login','logout','',function(data){
					window.location.reload();
        });	
    });
		
});


function reloadcode(id) 
{
	var url = $('#'+id).attr('src') + '&nowtime=' + new Date().getTime();
	if($('#'+id).attr('src') != undefined){
		$('#'+id).attr('src',url);
	}
}
