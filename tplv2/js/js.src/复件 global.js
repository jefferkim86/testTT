/*
/////////////////////////////////////////////////////////////////
//云边开源轻博, Copyright (C)   2010 - 2011  qing.thinksaas.cn
//$Id: main.php 591 2012-05-11 16:38:19Z anythink $
*/
// (function($){$.fn.myPagination=function(param){init(param,$(this));return $(this)};function init(param,obj){if(param&&param instanceof Object){var options;var currPage;var pageCount;var pageSize;var tempPage;var defaults=new Object({currPage:1,pageCount:10,pageSize:5,cssStyle:'badoo',fun:"",showpage:false,ajax:{on:false,pageCountId:'pageCount',param:{on:false,page:1},ajaxStart:function(){return false}},info:{first:'首页',last:'尾页',next:'下一页',prev:'上一页',first_on:true,last_on:true,next_on:true,prev_on:true,msg_on:true,link:'#',msg:'<span>&nbsp;&nbsp;跳{currText}/{sumPage}页</span>',text:{width:'22px'}}});function getCurrPage(){if(options.info&&options.info.cookie_currPageKey&&options.info.cookie_currPage){var cookie_currPage=$.cookie(options.info.cookie_currPageKey+"_currPage");if(cookie_currPage!=""&&cookie_currPage!=null){return cookie_currPage}}if(options.currPage){return options.currPage}else{return defaults.currPage}}function getPageCount(){if(options.pageCount){return options.pageCount}else{return defaults.pageCount}}function getPageSize(){if(options.pageSize){return options.pageSize}else{return defaults.pageSize}}function getCssStyle(){if(options.cssStyle){return options.cssStyle}else{return defaults.cssStyle}}function getAjax(){if(options.ajax&&options.ajax.on){return options.ajax}else{return defaults.ajax}}function getParam(){if(options.ajax.param&&options.ajax.param.on){options.ajax.param.page=currPage;return options.ajax.param}else{defaults.ajax.param.page=currPage;return defaults.ajax.param}}function getFirst(){if(options.info&&options.info.first_on==false){return""}if(options.info&&options.info.first_on&&options.info.first){var str="<a href='"+getLink()+"' title='1'>"+options.info.first+"</a>";return str}else{var str="<a href='"+getLink()+"' title='1'>"+defaults.info.first+"</a>";return str}}function getLast(pageCount){if(options.info&&options.info.last_on==false){return""}if(options.info&&options.info.last_on&&options.info.last){var str="<a href='"+getLink()+"' title='"+pageCount+"'>"+options.info.last+"</a>";return str}else{var str="<a href='"+getLink()+"' title='"+pageCount+"'>"+defaults.info.last+"</a>";return str}}function getPrev(){if(options.info&&options.info.prev_on==false){return""}if(options.info&&options.info.prev){return options.info.prev}else{return defaults.info.prev}}function getNext(){if(options.info&&options.info.next_on==false){return""}if(options.info&&options.info.next){return options.info.next}else{return defaults.info.next}}function getLink(){if(options.info&&options.info.link){return options.info.link}else{return defaults.info.link}}function getMsg(){var input="<input type='text' value='"+currPage+"' >";if(options.info&&options.info.msg_on==false){return false}if(options.info&&options.info.msg){var str=options.info.msg;str=str.replace("{currText}",input);str=str.replace("{currPage}",currPage);str=str.replace("{sumPage}",pageCount);return str}else{var str=defaults.info.msg;str=str.replace("{currText}",input);str=str.replace("{currPage}",currPage);str=str.replace("{sumPage}",pageCount);return str}}function getText(){var msg=getMsg();if(msg){msg=$(msg)}else{return""}var input=msg.children(":text");if(options.info&&options.info.text){var css=options.info.text;for(temp in css){var val=eval("css."+temp);input.css(temp,val)}return msg.html()}else{var css=defaults.info.text;for(temp in css){var val=eval("css."+temp);input.css(temp,val)}return msg.html()}}function getPageCountId(){if(options.ajax&&options.ajax.pageCountId){return options.ajax.pageCountId}else{return defaults.ajax.pageCountId}}function getAjaxStart(){if(options.ajax&&options.ajax.ajaxStart){options.ajax.ajaxStart()}else{defaults.ajax.ajaxStart}}function saveCurrPage(page){if(options.info&&options.info.cookie_currPageKey&&options.info.cookie_currPage){var key=options.info.cookie_currPageKey+"_currPage";$.cookie(key,page)}}function getInt(val){return parseInt(val)}function isCode(val){if(val<1){alert("输入值不能小于1");return false}var patrn=/^[0-9]{1,8}$/;if(!patrn.exec(val)){alert("请输入正确的数字");return false}if(val>pageCount){alert("输入值不能大于总页数");return false}return true}function updateView(){currPage=getInt(currPage);pageCount=getInt(pageCount);var link=getLink();var firstPage=lastPage=1;if(currPage-tempPage>0){firstPage=currPage-tempPage}else{firstPage=1}if(firstPage+pageSize>pageCount){lastPage=pageCount+1;firstPage=lastPage-pageSize}else{lastPage=firstPage+pageSize}var content="";content+=getFirst();if(currPage==1){content+="<span class=\"disabled\" title=\""+getPrev()+"\">"+getPrev()+" </span>"}else{content+="<a href='"+link+"' title='"+(currPage-1)+"'>"+getPrev()+" </a>"}if(firstPage<=0){firstPage=1}if(options.showpage==true){for(firstPage;firstPage<lastPage;firstPage++){if(firstPage==currPage){content+="<span class=\"current\" title=\""+firstPage+"\">"+firstPage+"</span>"}else{content+="<a href='"+link+"' title='"+firstPage+"'>"+firstPage+"</a>"}}}if(currPage==pageCount){content+="<span class=\"disabled\" title=\""+getNext()+"\">"+getNext()+" </span>"}else{content+="<a href='"+link+"' title='"+(currPage+1)+"'>"+getNext()+" </a>"}content+=getLast(pageCount);content+=getText();obj.html(content);obj.children(":text").keypress(function(event){var keycode=event.which;if(keycode==13){var page=$(this).val();if(isCode(page)){obj.children("a").unbind("click");obj.children("a").each(function(){$(this).click(function(){return false})});options.fun(page);createView(page)}}}).click(function(){$(this).select()});obj.children("a").each(function(i){var page=this.title;$(this).click(function(){obj.children("a").unbind("click");obj.children("a").each(function(){$(this).click(function(){return false})});options.fun(page);createView(page);$(this).focus();return false})})};function createView(page){currPage=page;saveCurrPage(page);var ajax=getAjax();if(ajax.on){getAjaxStart();var varUrl=ajax.url;var param=getParam();$.ajax({url:varUrl,type:'GET',data:param,contentType:"application/x-www-form-urlencoded;utf-8",async:true,cache:false,timeout:60000,error:function(){alert("访问服务器超时，请重试，谢谢！")},success:function(data){loadPageCount({dataType:ajax.dataType,callback:ajax.callback,data:data});updateView()}})}else{updateView()}}function checkParam(){if(currPage<1){alert("配置参数错误\n错误代码:-1");return false}if(currPage>pageCount){alert("配置参数错误\n错误代码:-2");return false}if(pageSize<2){alert("配置参数错误\n错误代码:-3");return false}return true}function loadPageCount(options){if(options.dataType){var data=options.data;var resultPageCount=false;var isB=true;var pageCountId=getPageCountId();switch(options.dataType){case"json":data=eval("("+data+")");resultPageCount=eval("data."+pageCountId);break;case"xml":resultPageCount=$(data).find(pageCountId).text();break;default:isB=false;var callback=options.callback+"(data)";eval(callback);resultPageCount=$("#"+pageCountId).val();break}if(resultPageCount){pageCount=resultPageCount}if(isB){var callback=options.callback+"(data)";eval(callback)}}}options=param;currPage=getCurrPage();pageCount=getPageCount();pageSize=getPageSize();tempPage=getInt(pageSize/2);var cssStyle=getCssStyle();obj.addClass(cssStyle);if(checkParam()){updateView();createView(currPage)}}}})(jQuery);


(function($) {
$.fn.myPagination = function(param) {
        init(param, $(this));
        return $(this)
    };
    function init(param, obj) {
        if (param && param instanceof Object) {
            var options;
            var currPage;
            var pageCount;
            var pageSize;
            var tempPage;
            var defaults = new Object({
                currPage: 1,
                pageCount: 10,
                pageSize: 10,
                cssStyle: 'badoo',
                fun: "",
				hidefl:true,
                showpage: false,
				hidejump:true,
                info: {
                    first: '首页',
                    last: '尾页',
                    next: '下一页',
                    prev: '上一页',
                    first_on: true,
                    last_on: true,
                    next_on: true,
                    prev_on: true,
                    msg_on: true,
                    link: '#',
                    msg: '<span>&nbsp;&nbsp;跳{currText}/{sumPage}页</span>',
                    text: {
                        width: '22px'
                    }
                }
            });
            function getCurrPage() {
                if (options.info && options.info.cookie_currPageKey && options.info.cookie_currPage) {
                    var cookie_currPage = $.cookie(options.info.cookie_currPageKey + "_currPage");
                    if (cookie_currPage != "" && cookie_currPage != null) {
                        return cookie_currPage
                    }
                }
                if (options.currPage) {
                    return options.currPage
                } else {
                    return defaults.currPage
                }
            }
				
			function gethidefl(){
				 if (options.hidefl) {
                    return options.hidefl
                } else {
                    return defaults.hidefl
                }
			}

			function gethidejump(){
				 if (options.hidejump) {
                    return options.hidejump
                } else {
                    return defaults.hidejump
                }
			}
            function getPageCount() {
                if (options.pageCount) {
                    return options.pageCount
                } else {
                    return defaults.pageCount
                }
            }
            function getPageSize() {
                if (options.pageSize) {
                    return options.pageSize
                } else {
                    return defaults.pageSize
                }
            }
            function getCssStyle() {
                if (options.cssStyle) {
                    return options.cssStyle
                } else {
                    return defaults.cssStyle
                }
            }
            function getAjax() {
                if (options.ajax && options.ajax.on) {
                    return options.ajax
                } else {
                    return defaults.ajax
                }
            }
            function getParam() {
                if (options.ajax.param && options.ajax.param.on) {
                    options.ajax.param.page = currPage;
                    return options.ajax.param
                } else {
                    defaults.ajax.param.page = currPage;
                    return defaults.ajax.param
                }
            }
            function getFirst() {

                if (options.info && options.info.first_on == false) {
                    return ""
                }
				
                if (options.info && options.info.first_on && options.info.first) {
                    var str = "<a href='" + getLink() + "' title='1'>" + options.info.first + "</a>";
                    return str
                } else {
                    var str = "<a href='" + getLink() + "' title='1'>" + defaults.info.first + "</a>";
                    return str
                }
            }
            function getLast(pageCount) {
                if (options.info && options.info.last_on == false) {
                    return ""
                }
                if (options.info && options.info.last_on && options.info.last) {
                    var str = "<a href='" + getLink() + "' title='" + pageCount + "'>" + options.info.last + "</a>";
                    return str
                } else {
                    var str = "<a href='" + getLink() + "' title='" + pageCount + "'>" + defaults.info.last + "</a>";
                    return str
                }
            }
            function getPrev() {
                if (options.info && options.info.prev_on == false) {
                    return ""
                }
                if (options.info && options.info.prev) {
                    return options.info.prev
                } else {
                    return defaults.info.prev
                }
            }
            function getNext() {
                if (options.info && options.info.next_on == false) {
                    return ""
                }
                if (options.info && options.info.next) {
                    return options.info.next
                } else {
                    return defaults.info.next
                }
            }
            function getLink() {
                if (options.info && options.info.link) {
                    return options.info.link
                } else {
                    return defaults.info.link
                }
            }
            function getMsg() {
                var input = "<input type='text' value='" + currPage + "' >";
                if (options.info && options.info.msg_on == false) {
                    return false
                }
                if (options.info && options.info.msg) {
                    var str = options.info.msg;
                    str = str.replace("{currText}", input);
                    str = str.replace("{currPage}", currPage);
                    str = str.replace("{sumPage}", pageCount);
                    return str
                } else {
                    var str = defaults.info.msg;
                    str = str.replace("{currText}", input);
                    str = str.replace("{currPage}", currPage);
                    str = str.replace("{sumPage}", pageCount);
                    return str
                }
            }
            function getText() {
				if(gethidejump())return "";
                var msg = getMsg();
                if (msg) {
                    msg = $(msg)
                } else {
                    return ""
                }
                var input = msg.children(":text");
                if (options.info && options.info.text) {
                    var css = options.info.text;
                    for (temp in css) {
                        var val = eval("css." + temp);
                        input.css(temp, val)
                    }
                    return msg.html()
                } else {
                    var css = defaults.info.text;
                    for (temp in css) {
                        var val = eval("css." + temp);
                        input.css(temp, val)
                    }
                    return msg.html()
                }
            }
            function getPageCountId() {
                if (options.ajax && options.ajax.pageCountId) {
                    return options.ajax.pageCountId
                } else {
                    return defaults.ajax.pageCountId
                }
            }
            function getAjaxStart() {
                if (options.ajax && options.ajax.ajaxStart) {
                    options.ajax.ajaxStart()
                } else {
                    defaults.ajax.ajaxStart
                }
            }
            function saveCurrPage(page) {
                if (options.info && options.info.cookie_currPageKey && options.info.cookie_currPage) {
                    var key = options.info.cookie_currPageKey + "_currPage";
                    $.cookie(key, page)
                }
            }
            function getInt(val) {
                return parseInt(val)
            }
            function isCode(val) {
                if (val < 1) {
                    alert("输入值不能小于1");
                    return false
                }
                var patrn = /^[0-9]{1,8}$/;
                if (!patrn.exec(val)) {
                    alert("请输入正确的数字");
                    return false
                }
                if (val > pageCount) {
                    alert("输入值不能大于总页数");
                    return false
                }
                return true
            }
            function updateView() {
                currPage = getInt(currPage);
                pageCount = getInt(pageCount);
                var link = getLink();
                var firstPage = lastPage = 1;
                if (currPage - tempPage > 0) {
                    firstPage = currPage - tempPage
                } else {
                    firstPage = 1
                }
                if (firstPage + pageSize > pageCount) {
                    lastPage = pageCount + 1;
                    firstPage = lastPage - pageSize
                } else {
                    lastPage = firstPage + pageSize
                }
                var content = "";
				
				if(!gethidefl() || currPage!= 1){
				   content += getFirst();
				}
                if (currPage == 1) {
					if(!gethidefl()){
						content += "<span class=\"disabled\" title=\"" + getPrev() + "\">" + getPrev() + " </span>"
					}
                } else {
                    content += "<a href='" + link + "' title='" + (currPage - 1) + "'>" + getPrev() + " </a>"
                }
                if (firstPage <= 0) {
                    firstPage = 1
                }
                if (options.showpage == true) {
                    for (firstPage; firstPage < lastPage; firstPage++) {
                        if (firstPage == currPage) {
                            content += "<span class=\"current\" title=\"" + firstPage + "\">" + firstPage + "</span>"
                        } else {
                            content += "<a href='" + link + "' title='" + firstPage + "'>" + firstPage + "</a>"
                        }
                    }
                }
                if (currPage == pageCount) {
					if(!gethidefl()){
						content += "<span class=\"disabled\" title=\"" + getNext() + "\">" + getNext() + " </span>"
					}
                } else {
                    content += "<a href='" + link + "' title='" + (currPage + 1) + "'>" + getNext() + " </a>"
                }
				

				if(!gethidefl() || currPage!= pageCount){
				   content += getLast(pageCount);
				}

                content += getText();
                obj.html(content);
                obj.children(":text").keypress(function(event) {
                    var keycode = event.which;
                    if (keycode == 13) {
                        var page = $(this).val();
                        if (isCode(page)) {
                            obj.children("a").unbind("click");
                            obj.children("a").each(function() {
                                $(this).click(function() {
                                    return false
                                })
                            });
                            options.fun(page);
                            createView(page)
                        }
                    }
                }).click(function() {
                    $(this).select()
                });
                obj.children("a").each(function(i) {
                    var page = this.title;
                    $(this).click(function() {
                        obj.children("a").unbind("click");
                        obj.children("a").each(function() {
                            $(this).click(function() {
                                return false
                            })
                        });
                        options.fun(page);
                        createView(page);
                        $(this).focus();
                        return false
                    })
                })
            };
            function createView(page) {
                currPage = page;
                saveCurrPage(page);
                updateView();
            }
            function checkParam() {
                if (currPage < 1) {
                    alert("配置参数错误\n错误代码:-1");
                    return false
                }
                if (currPage > pageCount) {
                    alert("配置参数错误\n错误代码:-2");
                    return false
                }
                if (pageSize < 1) {
                    alert("配置参数错误\n错误代码:-3");
                    return false
                }
                return true
            }
            function loadPageCount(options) {
                if (options.dataType) {
                    var data = options.data;
                    var resultPageCount = false;
                    var isB = true;
                    var pageCountId = getPageCountId();
                    switch (options.dataType) {
                    case "json":
                        data = eval("(" + data + ")");
                        resultPageCount = eval("data." + pageCountId);
                        break;
                    case "xml":
                        resultPageCount = $(data).find(pageCountId).text();
                        break;
                    default:
                        isB = false;
                        var callback = options.callback + "(data)";
                        eval(callback);
                        resultPageCount = $("#" + pageCountId).val();
                        break
                    }
                    if (resultPageCount) {
                        pageCount = resultPageCount
                    }
                    if (isB) {
                        var callback = options.callback + "(data)";
                        eval(callback)
                    }
                }
            }
            options = param;
            currPage = getCurrPage();
            pageCount = getPageCount();
            pageSize = getPageSize();
            tempPage = getInt(pageSize / 2);
            var cssStyle = getCssStyle();
            obj.addClass(cssStyle);
            if (checkParam()) {
                updateView();
                createView(currPage)
            }
        }
    }


/* tangbin - http://www.planeArt.cn - MIT Licensed */

	// tipWrap: 	提示消息的容器
	// maxNumber: 	最大输入字符
	$.fn.artTxtCount = function(tipWrap, maxNumber){
		var countClass = 'js_txtCount',		// 定义内部容器的CSS类名
			fullClass = 'js_txtFull',		// 定义超出字符的CSS类名
			disabledClass = 'disabled';		// 定义不可用提交按钮CSS类名
		
		// 统计字数
		var count = function(){
			var btn = $(this).closest('form').find(':submit'),
				val = $(this).val().length,
				
				// 是否禁用提交按钮
				disabled = {
					on: function(){
						btn.removeAttr('disabled').removeClass(disabledClass);
					},
					off: function(){
						btn.attr('disabled', 'disabled').addClass(disabledClass);
					}
				};
				
			if (val == 0) disabled.off();
			if(val <= maxNumber){
				if (val > 0) disabled.on();
				tipWrap.html((maxNumber - val));
			}else{
				disabled.off();
				tipWrap.html('-' + (val - maxNumber));
			};
		};
		$(this).bind('keyup change', count);
		
		return this;
	};
})(jQuery);

$.extend({ybGetad:function(unit_id,params,fun){
	$.ajax({
		url:urlpath+'/index.php?c=api&yc=getad&&ym=getAdUnit&unit='+unit_id,
		data: params,
		success:function(data){
			fun(data); 
		},
		error:function(x){},
		dataType:'json',
		type:'post'
		});
	}
});




$.extend({ybAPI:function(c,m,params,fun){
	if(params == undefined){params = ''};
	$.ajax({
	url:urlpath+'/index.php?c=api&yc='+c+'&ym='+m,
	data: params,
	success: function(data){
			fun(data);
			},
	error:function(x){			
		if(x.status != 200){
			if(x.status != 0){ 
				waring('网络错误,请稍候');
				return false;
			}
		}
		//waring('数据格式错误：'+x.responseText.substr(0,200));
		return false;
	},
	dataType:'json',
	type:'post'
	});
},paging:function(opts){
	
	//$.paging({ctn1:"#feed_box",ctn2:"#paging",yc:c,ym:a,showpage:true,yprm:params,ftype:function(data){}})
	var defaults={
		yc:"",				// 操作
		ym:"",           // 参数  
		yprm:{page:1},   //  URL 参数
		tplid:"",     // 模板id
		ctn1:"",     // 显示数据的控件
		ctn2:"",     // 显示分页的控件
		ftype:false,  // 算是回调   - -!!
		showpage:false,  // 显示分页
		cssStyle:"ybpage",  // 分页样式
		likes:true,         // 显示  like 那个心
		scroll:true,      // 滚到上面  - -
		eclick:""          // 单击页码的事件
	};

	var opts=$.extend(defaults,opts||{});
	var obj1=$(opts["ctn1"]); 
	var obj2=$(opts["ctn2"]); 
	
	$.ybAPI(opts["yc"],opts["ym"],opts["yprm"],function(data){

		// 数据处理
		function indata(data){
			if (typeof(opts["ftype"]) == "function") {
				opts["ftype"](data);
			}else{
				obj1.html(tmpl(opts["tplid"],data.body));
			}
			if(opts.likes){
				$(".dolike").each(function(){
					var _this=$(this);
					var id=_this.attr("likeid");
					_this.click(function(){
						$.ybAPI('blog','setLike',{bid:id},function(data){
							if(data.status == 1){
								if(data.body == 'add'){
									_this.parent().toggleClass('like');
								}else{
									_this.parent().addClass("nolike");
									_this.parent().toggleClass('like');
								}
							}else{
								alert(data.msg);
							}
						});
					
					})
				}).removeClass("dolike");
				return true;
			}
		}
		// 获取数据一次
		indata(data);

		if(data.body.page==null){obj2.html("");return false};
		//alert(data.body.page["page_size"])
		obj2.myPagination({          //控件2    显示分页的
			currPage: data.body.page["current_page"],     // 当前页
			pageCount: data.body.page["total_page"],       // 页总数	
			hidejump:opts["hidejump"],                       // 显示跳页
			cssStyle:opts["cssStyle"],                       // CSS
			showpage:opts["showpage"],                      //  显示页码
			fun:function(currp){                            //点击页码的事件
				if (typeof(opts["eclick"]) == "function") {
					opts["eclick"]();
				};
				opts["yprm"]["page"]=currp;
				$.ybAPI(opts["yc"],opts["ym"],opts["yprm"],function(data){
					
					//  载入数据
					indata(data);
				});	

				if(opts["scroll"]){                     // 滚动到最上
					var p=$("#postblog .current");
					if(p.size()>0){
						p=p.offset().top;
					}else{
						p=0;
					}
					$(window).scrollTop(p);
					
				};
			}
		});
	});
} 
});

$.feedToolBar={
		parm:{p:'',morepage:false,ttpage:1},
		morepage:function(id){
		var total_page=10,
			_obj=$('#'+id),
			area = $("#"+_obj.attr('area')),
			p=2,
			maxpage=_obj.attr("max"),
			loading=$('#feed_loading'),
			more=$('<a href="javascript:void(0)" id="more" class="more">查看更多</a>'),
			nomore=$('<a href="javascript:void(0)" id="nomore" class="nomore">暂时没有更多内容</a>'),
			toolbar=this;

			_obj.append(more).append(nomore).after(loading);


			
			// 查看更多
			more.click(function(){
				toolbar.continueShow(toolbar,_obj,loading,more,nomore,total_page);
			});

			function getfeeds(){		
				var fold = $(window).height() + $(document).scrollTop();
				var doc_height=$(document.body).height();
				if( fold >= doc_height-20){
					if(toolbar.parm.ttpage==0){
						nomore.show();
						return false;
					}
					if(p-1 > maxpage){
						$(window).unbind("scroll");
						toolbar.parm.p=p;
					}else{
						$(window).unbind("scroll");
						loading.show();
						more.hide();
						yb_load_feeds("blog","feeds",{page:p},function(data){
							total_page=data.body.page.total_page;

							if(data.body.page==null){
								nomore.show();
								loading.hide();
								more.hide();
								return false;
							}
							if(data==''){
								nomore.show();
								more.hide();
								return false;
							}
							if(p>=total_page){
								nomore.show();
								loading.hide();
								more.hide();
								$(window).unbind("scroll");
							}else{
								$(window).bind("scroll",function(){getfeeds()});
								p=p+1;
								_obj.attr("page",p);
								toolbar.parm.p=p;
								loading.hide();
								nomore.hide();
								more.show();
							}
						})
					}
				}
			}
			$(window).bind("scroll",function(){getfeeds()});
	},
	continueShow:function(toolbar,_obj,loading,more,nomore,total_page){
		loading.show();
		more.hide();
		p=toolbar.parm.p;
		yb_load_feeds("blog","feeds",{page:p},function(data){
			if(data==''){
				nomore.show();
				more.hide();
				return false;
			}
			if(p>=total_page){
				nomore.show();
				loading.hide();
				more.hide();
				return false;
			}
			loading.hide();
			more.show();
			p=p+1;
			_obj.attr("page",p);
			toolbar.parm.p=p;
			
		})
	}
};






//定义默认模板载入的名称
var tpldefine = {
	m_1:'tmpl_model_1',
	m_2:'tmpl_model_2',
	m_3:'tmpl_model_3',
	m_4:'tmpl_model_4',
	m_5:'tmpl_model_5',
	m_6:'tmpl_model_6',
};

//定义默认模板头尾内容详情页载入的名称
var tplhdefine = {
	header:'tmpl_model_header',
	footer:'tmpl_model_footer',
	reply:'tmpl_reply',
	infooter:'tmpl_info_footer',
	info_reply:'tmpl_model_info_reply',
};

$(document).ready(function(){

	$('#search .ipt').click(function(){
		if($(this).val() == '搜索标签,发现兴趣') {
			$(this).val('');
		}  
		}).blur(function(){
			if($(this).val() == '') {
				$(this).val('搜索标签,发现兴趣');
			} 
		});
	
	$('#searchtag').focus(function(){
		//$(this).parent().find('label').hide();
		$(this).addClass('curr');
	}).blur(function(){
		//if($(this).val() ==''){$(this).parent().find('label').show()}	
		$(this).removeClass('curr');
	});
	
	$('#logOut').click(function(){
		artDialog({
			id: 'Confirm',
			fixed: true,
			lock: true,
			width:'200px',
			content: '确定要退出吗?',
			ok: function () {
			  $.ybAPI('login','logout','',function(data){
					window.location.reload();
				});	
			},
			cancel: function(){}
		});
	});
	

	$("#notice").click(function(){
		if($("#f_notice").is(":visible")){
			$("#f_notice").hide();
		}else{
			$("#f_notice").show(0,function(){
				notice();
				$(this).hover(function(){
					document.onclick=null;
				},function(){
					document.onclick=function(e){
					var e=e?e:window.event;
					var tar = e.srcElement||e.target;
						if(tar.id!="notice"){
							$("#f_notice").hide(0,function(){
								document.onclick=null;
							});		
						}
					}
				})
			});
		}
	});
	
	
	//字数限制
	$('.autoTxtCount').each(function(){
		$(this).find('textarea').artTxtCount($(this).find('.tips'), 140);
	});

});

function copy2Clipboard(e){

	if(window.clipboardData.setData('text', e)){
		tips("复制到剪贴板成功！");
	}else{
		waring("您的浏览器不支持剪贴板操作，请自行复制。");
	};
}



    function copy2Clipboard(txt) {   
         if(window.clipboardData) {   
                 window.clipboardData.clearData();   
                if(window.clipboardData.setData("Text", txt)){
					 tips("复制成功！") 
				}				
         } else if(navigator.userAgent.indexOf("Opera") != -1) {   
              window.location = txt;   
         } else if (window.netscape) {   
              try {   
                   netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");   
              } catch (e) {   
                   waring("被浏览器拒绝！\n请在浏览器地址栏输入'about:config'并回车\n然后将'signed.applets.codebase_principal_support'设置为'true'");   
              }   
              var clip = Components.classes['@mozilla.org/widget/clipboard;1'].createInstance(Components.interfaces.nsIClipboard);   
              if (!clip)   
			 {return};
              var trans = Components.classes['@mozilla.org/widget/transferable;1'].createInstance(Components.interfaces.nsITransferable);   
              if (!trans)   
			 { return};
              trans.addDataFlavor('text/unicode');   
              var str = new Object();   
              var len = new Object();   
              var str = Components.classes["@mozilla.org/supports-string;1"].createInstance(Components.interfaces.nsISupportsString);   
              var copytext = txt;   
              str.data = copytext;   
              trans.setTransferData("text/unicode",str,copytext.length*2);   
              var clipid = Components.interfaces.nsIClipboard;   
              if (!clip)   
			 { return false};
              clip.setData(trans,null,clipid.kGlobalClipboard);   
              tips("复制成功！")   
         }   
    }  



function waring(msg){
	$.dialog({
		id: 'waring',
		content: msg,
		ok:function(){},
		padding:10,
		time:3000,
		lock:true,
		fixed: true
	});
};

function tips(msg){
	$.dialog({
		id: 'tips',
		content: msg,
		ok:function(){},
		padding:10,
		width:'300px',
		fixed: true,
		time:3000,
		lock:true
	});
};
function tag_search(is_local){
	//如果是tag页搜索
	var tag = $('#searchtag').val();
	if(tag == '' || tag == '搜索标签,发现兴趣'){
		tips('搜索的标签不能为空');
		return false;
	};
	if(is_local == 'local'){
		show_tags_view({ tag:tag});
	}else{
		window.location.href='index.php?c=blog&a=tag&tag='+tag;
	};
};


//获取系统广告位的广告
function ad_aside(div,id,ga){
	$.ybGetad(id,'',function(d){
		//图片广告
		if(d.body.type == 1){
			$(div).html('<a href="'+d.body.url+'" target="_blank"><img src="'+d.body.body+'"/> </a>');
		};
		if(ga){
			$('#'+div).append(d.body.ga);
		}
	})
	
};

//检查最新通知30秒一次
function now_notice(){
	$.ybAPI('user','chkNoticPm','',function(data){
		if(data.status == 1){
			if(data.body.notic != 0){
				$('#now_notice').html('<div class="pop">'+data.body.notic+'</div>');
			}else{
				$('#now_notice').hide();
			}
			if(data.body.pm != 0){
				$('#now_pm').html('<div class="pop">'+data.body.pm+'</div>');
			}else{
				$('#now_pm').hide();
			}
		}
	});
}



function likes(id){
	$.ybAPI('blog','setLike',{bid:id},function(data){
		if(data.status == 1){
		$('#like_'+id).removeClass('like');
		$('#like_'+id).removeClass('nolike');
			if(data.body == 'add'){
				$('#like_'+id).addClass('like');
			}else{
				$('#like_'+id).addClass('nolike');
			}
		}else{
			alert(data.msg);
		}
	});
}

function cancelConnect(type){
	 artDialog({
        id: 'Confirm',
        fixed: true,
        lock: true,
		width:'200px',
        opacity: .1,
        content: '确定要取消绑定吗?',
        ok: function () {
           $.ybAPI('user','CancelConnect',{'type':type},function(data){
				if(data.status==1){
				window.location.reload()
				}else{
					tips('请稍后再试');
				}
			});
        },
        cancel: function(){}
    });
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

function delrep(repid)
{
	artDialog({
        id: 'Confirm',
        fixed: true,
        lock: true,
		width:'200px',
        opacity: .1,
        content: '确定要删除吗?',
        ok: function () {
           $.ybAPI('blog','delReply',{id:repid},function(data){
				if(data.status == 1){
					$('#commentList_'+repid).hide();
				}else{
					alert(data.msg);
				}
			});
        },
        cancel: function(){}
    });
}

function repblog(id){
	artDialog({
		id: 'Confirm',
		fixed: true,
		lock: true,
		width:'200px',
		opacity: .1,
		content: '确定要转载吗?',
		ok: function () {
			$.ybAPI('blog','repblog',{bid:id},function(data){
				if(data.status == 1){
					alert('成功转载');
				}else{
					alert(data.msg);
				}
			});
		},
		cancel: function(){}
	});
}


function fllow(t,userid,is_dialog){
	if(t == 'unlink'){
		artDialog({
			id: 'Confirm',
			fixed: true,
			lock: true,
			width:'200px',
			opacity: .1,
			content: '确定要取消关注吗?',
			ok: function () {
				__fllow(t,userid,is_dialog);
			},
			cancel: function(){}
		});
	}else{
		__fllow(t,userid,is_dialog);
	}
}

function __fllow(t,userid,is_dialog){
	$.ybAPI('user','fllow',{type:t,uid:userid},function(data){
		if(data.status == 1){
			$('#follow_unlink_'+userid+',#follow_link_'+userid).toggle();
		}else{
			tips(data.msg);
		}
		if(is_dialog){ tips('已操作完毕')}
	});
}

function load_swf(type,bid,i,title,url){
	shoot_close();
		idname = bid+'_'+i;
		obj = $('#swf_play_'+idname);
		obj2 = $('#swf_cover_'+idname);
		var player = '<div class="video_windows"><embed src="'+url+'" quality="high" width="510" height="355" align="middle"  allowScriptAccess="sameDomain" type="application/x-shockwave-flash"></embed></div>';
		if(obj.is(":hidden")){
			obj.html('<div class="video_info"><div class="video_cover"><a href="javascript:;" onclick="hide_swf(\''+idname+'\')"><span class="away">收起</span></a><a onclick="shoot_swf(\'video\',\''+idname+'\',\''+title+'\',\''+url+'\')"><span class="eject">弹出播放</span></a></div><div class="video_title">'+title+'</div></div>'+player).show();
			obj2.hide();
		}else{
			obj.html('').hide();
			obj2.show();
		}

}

function hide_swf(idname){
	obj = $('#swf_play_'+idname);
	obj2 = $('#swf_cover_'+idname);
	obj.html('').hide();
	obj2.show();
}

//弹出播放
function shoot_swf(type,idname,title,url){
	shoot_close();
	$('#swf_play_'+idname).html('').hide();
	$('#swf_cover_'+idname).show();
	
	if(type == 'video'){
		swf = '<embed src="'+url+'" quality="high" width="510" height="355" align="middle"  allowScriptAccess="sameDomain" type="application/x-shockwave-flash"></embed>';
	}
	if(type == 'xiami'){
		swf = '<embed width="340" height="33" wmode="transparent" type="application/x-shockwave-flash" src="'+url+'"></embed>';
	}
	if(type == 'localplayer'){
		params = skinpath+'/swf/player.swf?soundFile='+url+'&bg=0xA2D8F4&leftbg=0x309AD7&lefticon=0xFFFFFF&rightbg=0x309AD7&rightbghover=0xF17676&righticon=0xFFFFFF&righticonhover=0xFFFFFF&text=0x227CAC&slider=0x309AD7&track=0xFFFFFF&border=0xA2D8F4&loader=0x83C1E7&autostart=no&loop=no';
		swf += '<embed src="'+params+'" width="340" height="33" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash"></embed>';
	}
	$('body').append('<div class="btn_bottom" id="shoot_swf"><div class="shoot_title">'+title+'</div><div class="shoot_close"><a href="javascript:;" onclick="shoot_close()"></a></div><a class="btn5 ie6png" id="eD1" >'+swf+'</a></div>');
}

function shoot_close(){
	$('#shoot_swf').html('').remove();
}

//首页最新和关注切换

function changeFeeds(feed,that){
	$.feedToolBar.parm.morepage=false;
	$('#postblog .menu li').removeClass('current');
	$(that).parent().addClass('current');
	yb_load_feeds('blog',feed);
}

function loadComment(d){
	indexPostTab('comment',d);
}



function indexPostTab(type,id){
	var _comt=$('#comment_'+id);
	var _feeds=$('#feeds_'+id);

	if(type == 'comment'){
		_feeds.hide();
		_comt.toggle();
		_loadReply(id);	
	}
	if(type == 'feeds'){
		_feeds.toggle();
		_comt.hide();
		_loadHit(id);
	}
}

function _loadReply(id){
		
		var _cmtload=$('#commentLoading_'+id);
		if(_cmtload.attr("isld")=="true")
	{return false}
		
		$.paging({ctn2:"#comment_paging_"+id,yc:"blog",ym:"reply",scroll:false,showpage:true,yprm:{bid:id},ftype:function(data){
			if(data.status == 1){
				_cmtload.hide();
				$('#comment_' +id+ ' .reply_comment').html(template('tmpl_reply',data.body));
				_cmtload.attr("isld","true");
			}else{
				alert(data.msg);
			}
		}});
}



function _loadHit(id){

		var _hitload=$('#hit_loading_'+id);
		if(_hitload.attr("isld")=="true"){return false}
		_hitload.show();
		$.paging({ctn2:"#feeds_paging_"+id,yc:"blog",ym:"getHit",scroll:false,showpage:true,yprm:{bid:id},ftype:function(data){
			if(data.status == 1 && data.body.body.length >= 1){
			$('#feeds_'+id+' .reply_list').html('');
			for(var i=0;i<data.body.body.length;i++){
				var datalist = data.body.body[i];
				$('#feeds_'+id+' .reply_list').append(tmpl_hit(datalist));
			}
			_hitload.attr("isld","true");
		}else{
			alert(data.msg);
		}
	
	}});
}



/*邀请码*/
function load_invite(){
	$('#loading').show();
	$.ybAPI('invite','getInviteList','',function(data){
		$('#current_total').html(data.body.current_total);
		$('#invited_friends').html(data.body.invited_friends);
		$('#invite_num').html(template('tmpl_intval_code',data.body));
		$('#loading').hide();
	});
}

function getCode(){
	$.ybAPI('invite','addToFull','',function(data){
		load_invite();
		tips('邀请码已经更新');
	});
}

function load_friend(){
$('#loading').show();
	$.ybAPI('invite','getInvitedFriendList','',function(data){
		if(data.body.length>0){
			$('#invite_follow_list').html(template('tmpl_invite_follow_list',data))
		}else{
			$('#no_friend').show();
		}
		$('#loading').hide();
	});
}
/*邀请结束*/

/*动态处理*/
function tmpl_hit(d){
	if(d.type == 'reply') {var fun = {i:'fun_reply',t:'评论'}}
	if(d.type == 'foword'){ var fun = {i:'fun_reblog',t:'转载'}}
	if(d.type == 'likes'){ var fun = {i:'fun_like',t:'喜欢'}}
	var u = d.user.username;
	var a= '<div class="commentList" id="hits_' +d.id+ '">';
	a   += '<div class="reply_fun"><span class="' +fun.i+ '" title="' +fun.t+ '"></span></div>';
	a	+=	'<div class="reply_avatar"><a href="' +d.h_url+ '" target="_blank"><img src="' +d.h_img+ '" alt="' +u+ '" title="' +u+ '"/></a></div>';
	a   += 	'<div class="reply_content"><a href="' +d.h_url+ '" target="_blank">' +u+ '</a>' +d.title+ ' ' +d.info+'</div>';
	a	+=	'<div class="clear"></div> </div>';
	return a;
}

/*设置文本框的回复*/
function replyto(id,user,uid){
	$('#replyInput_'+id).focus().val('@'+user+':');
	$('#replyTo_'+id).val(uid);
}



function sendReplay(id){
	var params = {
		bid:id,
		inputs:$('#replyInput_'+id).val(),
		repuid:$('#replyTo_'+id).val()
	};
	$.ybAPI('blog','setReply',params,function(data){
		if(data.status == 1){
			$('#commentLoading_'+id).attr("isld","false");
			_loadReply(id);
			$('#replyTo_'+id).val('');
			$('#replyInput_'+id).html('');
		}else{
			tips(data.msg);
		}
	});
}








function notice(){
	$('#f_notice .notice_con .notice_system').html('');
	$('#f_notice .notice_con .notice_replyarea').html('');
	$('#f_notice .notice_con .notice_followarea').html('');
	$('#f_notice .notice_con .loading').show();
	$('#f_notice .notice_con .nonotice').hide();
	$.ybAPI('user','mynotice','',function(data){
			$('#f_notice .notice_con .loading').hide();
			if(data.status == 1){
				if(data.body.sys_count >0){
					for(var i=0;i<data.body.sys.length;i++){
						$('#f_notice .notice_con .notice_system').append(tmpl_notice_sys(data.body.sys[i]));
					}
				}
				
				if(data.body.reply_count >0){
					for(var i=0;i<data.body.reply.length;i++){
						$('#f_notice .notice_con .notice_replyarea').append(tmpl_notice_reply(data.body.reply[i]));
					}
				}
				
				if(data.body.follow_count >0){
					for(var i=0;i<data.body.follow.length;i++){
						$('#f_notice .notice_con .notice_followarea').append(tmpl_notice_follow(data.body.follow[i]));
					}
				}

				if(data.body.all_count == undefined){
					$('#f_notice .notice_con .nonotice').show();
				}else{
					$('#f_notice .notice_title .notice_left span').html(data.body.all_count);
				
				}
			}else{
			
				$('#f_notice .notice_con .nonotice').show();
			}
		});
}

function tmpl_notice_sys(d){
var a = '<div id="notice_'+d.id+'" class="notice_sys">'+
		'	<div class="ntime">'+d.time+'</div>' +
		'		<div class="sysyem_fun"><a href="javascript:;" onclick="clear_notice('+d.id+')"><span class="fun_delete"></span></a></div>' +
		'		<div class="sysyem_con">[<b>'+d.title+'</b>]'+d.info+'</div><div class="clear"></div>' +
		'</div>';
return a;
}

function tmpl_notice_follow(d){
var a = '<div class="notice_follow" id="notice_'+d.id+'">'+
		'	    <div class="ntime">'+d.time+'</div>'+
		'		<div class="sysyem_fun"><a href="javascript:;" onclick="clear_notice('+d.id+')"><span class="fun_delete"></span></a>'+
		'			<a href="javascript:;" onclick="fllow(\'link\','+d.user.uid+');clear_notice('+d.id+');"><span class="fun_follow"></span></a>'+
		'		</div>'+
		'		<div class="follow_con">'+
		'			<div class="follow_content"><h5><a href="'+d.user.h_url+'" target="_blank" onclick="clear_notice('+d.id+')">'+d.user.username+'</a></h5><p>关注你的博客</p></div>'+
		'			<div class="avatar"><a href="'+d.user.h_url+'" onclick="clear_notice('+d.id+')" target="_blank"><img src="'+d.user.h_img+'" alt="'+d.user.username+'"  /></a></div>'+
		'			<div class="clear"></div>'+
		'		</div>'+
		'</div>';
	return a;
}

function tmpl_notice_reply(d){
var a = '<div class="notice_reply" id="notice_'+d.id+'">'+
		'	    <div class="ntime">'+d.time+'</div>'+
		'		<div class="sysyem_fun">'+
		'			<a href="javascript:;" onclick="clear_notice('+d.id+')"><span class="fun_delete"></span></a>'+
		'				<a href="'+d.location+'" target="blank" onclick="clear_notice('+d.id+')"><span class="fun_reply"></span></a>'+
		'		</div>'+
		'		<div class="reply_con"><h5><a href="#">'+d.user.username+'</a>'+d.title+'</h5><p>"'+d.info+'"</p></div>'+
		'</div>';
	return a;
}

function clear_notice(id){
	$.ybAPI('user','clearnotice',{'id':id},function(data){
		if(data.status == 1){
			$('#notice_'+id).hide();
		}else{
			tips('稍后再试');
		}
	});
}

function clear_notice_all(){
	$.ybAPI('user','clearnotice',{'type':'all'},function(data){
		if(data.status == 1){
			$('#f_notice .notice_con .notice_system').html('');
			$('#f_notice .notice_con .notice_replyarea').html('');
			$('#f_notice .notice_con .notice_followarea').html('');
		}else{
			tips('稍后再试');
		}
	});
}

//login
function tmpl_login_user_hot(d){
			var a = '<div class="ca-item ca-item-1"> <div class="ca-item-main">';
				a += '<h3>';
			if(d.b_title != null){
				a+= '《<font><a href="'+d.b_url+'" target="_blank">'+d.b_title+'</a></font>》';
			}
			a += '</h3>';
			a += '<div class="ca-head"><a href="'+d.b_url+'" target="_blank"><span><img src="'+d.u_img+'" alt="' +d.username+ '" title="'+d.username+'"/></span></a></div>';
            a += '<div class="ca-contentbox"><div class="ca-replyp"></div><div class="ca-cc">' +d.msg+ '</div></div>';
            a += '<div class="ca-bottom"><a href="#" class="ca-more">TA标签</a></div></div>';
			a += '<div class="ca-content-wrapper">';
			a += '<div class="ca-content">';
			a += '<h6>'+d.username+'<font>喜欢的标签</font></h6><a href="#" class="ca-close"></a>';
			if(d.blogtag != ''){
				a += '<ul>';	
				for(var i=0;i<d.blogtag.length;i++){
					a += '<li><a href="#">'+d.blogtag[i]+'</a></li>';
				}
				a += '</ul>';
			}
			a += '</div></div>';
			a += '</div>';
			return a;
}

//recommend
function recommendImg(){
	$("#recommendImg").animate({ opacity: 0.3 }, 500,function(){
		$.ybAPI('blog','recommendImg','',function(data){
			$("#recommendImg").animate({ opacity: 1 }, 500);
			if(data.status == 1){
				if(data.body){
				$('#recommendImg').html(template('tmpl_recommendImg',data.body));
				}
			}else{
				alert(data.msg);
			}
		});	
	});
}




//pm something
function openPmpost(){
	$('#pm_list').removeClass('current');
	$('#pm_post').addClass('current');
	$('#pm_send').show();
	$('#follow_font,#paging,#pm_index .pm_list,#feed_loading').hide();
}

function pmlist(){
	$('#pm_index .pm_list').html('');
	$('#pm_index .pm_list,#feed_loading').show();
	$('#pm_send').hide();
	$('#pm_list').addClass('current');
	$('#pm_post').removeClass('current');
	$.paging({ctn1:"#pm_index .pm_list",ctn2:"#paging",yc:'pm',ym:'pmlist',showpage:true,ftype:function(data){	
		if(data.status == 1){
			$('#feed_loading').hide();
			$('#feed_box').html('');
			if(data.body.data == false){
				$('#follow_font2').show();
			}else{
				for(var i=0;i<data.body.data.length;i++){
					$('#pm_index .pm_list').append(tmpl_pmlist( data.body.data[i]));
				}
			}
		}
	}});
}

function tmpl_pmlist(d){
if(d.isnew > 0){
	var isnew = '<div class="pop" title="'+d.isnew+'条未读">'+d.isnew+'</div>';
	var isnewtxt = '未读';
}else{
	var isnew = '';
	var isnewtxt = '已读';
}
var a = '<li>'+ isnew +
	'	<div class="avatar">' +
	'		<a href="'+d.h_url+'" title="'+d.tousername+'" target="_blank"><img  src="'+d.h_img+'" alt="'+d.tousername+'" /></a>' +
	'	</div>' +
	'	<div class="pm_bg">' +
	'		<a href="index.php?c=pm&a=detail&uid='+d.uid+'">' +
	'			<div class="pm_con">' +
	'				<div class="unread">'+isnewtxt+'</div>' +
	'				<div class="num"><font>'+d.pmnum+'</font>条私信</div>' +
	'				<div class="info">来自<span>'+d.tousername+'</span>的私信</div>' +
	'				<div class="date">最后交流：'+d.time+'</div>' +
	'			</div>' +
	'		</a>' +
	'	</div>' +
	'</li>';
return a;
}



function pmdetail(uid){
$('#feed_loading').show();
	$.paging({ctn1:"#pm_detail .det_con .det_list",ctn2:"#paging",yc:'pm',ym:'pminfo',yprm:{'uid':uid},showpage:true,ftype:function(data){	
		if(data.status == 1){
			$('#tousername').html(data.body.args.t_name);
			$('#touser').val(data.body.args.t_name);
			if(data.body.data == false){
				$('#feed_loading').hide();
			}else{
				$('#feed_loading').hide();
				$('#pm_detail .det_con .det_list').html('');
			
				for(var i=0;i<data.body.data.length;i++){
					$('#pm_detail .det_con .det_list').append(tmpl_pmdetail( data.body.data[i],data.body.args));
				}
			}
		}else{
			tips(data.msg);
		}
	}});
}


function tmpl_pmdetail(d,args){

	if(d.touid == uid ){
		var cls = 'det_you';
		var usr = '<a href="'+d.h_url+'" target="_blank"><img src="'+d.h_img+'" alt="'+d.t_name+'" class="face"/></a>';
	}else{
		var cls = 'det_me';
		var usr = '<a href="'+args.m_url+'" target="_blank"><img src="'+args.m_img+'" alt="'+args.m_name+'" class="face"/></a>';
	}
	var a = ' <div class="'+cls+'">' +
			'	<div class="avatar">'+usr+'</div>' +
			'		<div class="content">' +
			'			<div class="corner"></div>' +
			'			<div class="conbox">' +
			'				<div class="conbox_con">'+d.info+'</div>' +
			'					<div class="conbox_date">'+d.time+'</div>' +
			'				</div>' +
			'			</div>' +
			'		<div class="clear"></div>' +
			'	</div>';
	return a;
}

//usersetting chose

function SelectHead()
{
	 $('#conHead').show();
	 $('#conPerson,#conSafe,#conInvite').hide();

	 $('#user_tab li').removeClass('curr');
	 $('#tab_head').addClass('curr');
	 $('#pb-action-holder').show();
}

function SelectPerson()
{
	 $('#conPerson').show();
	 $('#conHead,#conSafe,#conInvite').hide();
	 $('#pb-action-holder').show();

	 $('#user_tab li').removeClass('curr');
	 $('#tab_person').addClass('curr');
}

function SelectInvite()
{
	 $('#conInvite').show();
	 $('#conHead,#conSafe,#conPerson').hide();
	 $('#pb-action-holder').show();

	 $('#user_tab li').removeClass('curr');
	 $('#tab_invite').addClass('curr');
	 
}

function SelectSafe(that){
     $('#conSafe').show();
	 $('#conPerson,#conHead,#conInvite').hide();
	 $('#pb-action-holder').hide();
	 
	 $('#user_tab li').removeClass('curr');
	 $('#tab_safe').addClass('curr');
}

function setFolowTag(that){
$(that).parent().toggleClass('current');
}


//回复页面
function do_run_rp(ty){
	$('#feed_loading').show();
	$('#feed_none').hide();
	$('.post_bg').find('span').removeClass('current');
	if(ty == '1'){
		$('#reply_me').removeClass('current');
		$('#reply_to').addClass('current');
	}else{
		$('#reply_me').addClass('current');
		$('#reply_to').removeClass('current');
	}
			
	$.paging({ctn1:"#feedArea",ctn2:"#paging",yc:"user",ym:"myreply",showpage:true,yprm:{type:ty},ftype:function(data){
				$('#feedArea').html('');
		$('#feed_loading').hide();
		if(data.body.data.length >0){
			for(var i=0;i<data.body.data.length;i++){
				$('#feedArea').append(tmpl_myreply(data.body.data[i],ty));
			}
		}else{
			$('#feed_none').show();
		}
	}})
}

function tmpl_myreply(d,type){
	var nohref = 'javascript:void(0)';
	var a = ' <div class="box" id="commentList_'+d.id+'">';
		a += '<div class="avatar"><a target="_blank" href="'+d.me.h_url+'"><div class="head_bg"><img title="'+d.me.username+'" class="face" alt="" src="'+d.me.h_img+'"></div>';
		a += '<div class="avatarblog"><img title="'+d.to.username+'" alt="那些花儿" src="'+d.to.h_img+'"></div></a></div>';
		a += '<div class="header"><div class="blogname"><a href="'+d.me.h_url+'" target="_blank">'+d.me.username+'</a></div>';
		a += '<div class="blogdate">'+d.time+'</div></div>';
		
		a += '<div class="content">' +d.msg+' </div>';
				
		a += '<div class="footer">';
		a += '<div class="fun">';
		
		var reply_count = (d.blog.replaycount > 0) ? '<em>'+d.blog.replaycount+'</em>' : '' ;
		if(type != 1){  a += '<span class="delete"><a href="' +nohref+ '" onclick="delrep(' +d.id+ ')" title="删除回复"></a></span>'}
		a += '<span class="view"><a href="'+d.blog.b_url+'" title="原文" target="_blank"></a></span>';
		a += '<span class="reply"><a href="'+nohref+'" onclick="indexPostTab(\'comment\',' +d.blog.bid+ ')" '+
	      'id="comment_btn_'+d.blog.bid+'" title="回复">'+reply_count+'</a></span>';
		a += '</div></div><div class="clear"></div>';
		a += reply(d);
	return a;
}

/*处理回复的内容给我回复的页面*/
function reply(d){
	var a = '<div id="comment_' +d.bid+ '" style="display:none">';
	
	a += '<div class="reply_list">';
	a += '	<div class="reply_btn"><input type="button" value="发布" onclick="sendReplay('+d.bid+')" class="btn" /></div>';
	a += '  <div class="reply_input"><div class="limit_text"><span>500</span></div>';
	a += '  <textarea id="replyInput_' +d.bid+ '" ></textarea><input type="hidden" id="replyTo_' +d.bid+ '" />';
	a += '</div><div class="clear"></div>';
	a +=  '	<div id="commentLoading_' +d.bid+ '" class="s_loading"></div>';
	a += '<div class="reply_comment">';
	a += '<div class="clear"></div>';
	a += '</div>';
	a += '<div id="comment_paging_'+d.bid+'" class="paging"></div>';
	a += '</div></div>';
	return a;
}


//post 页面
function do_run_post(ty){
	Array.prototype.min = function(){
		return Math.min.apply({},this)
	};
	$('.post_bg').find('span').removeClass('current');
	if(ty == 'draft'){
		$('#curr_post').removeClass('current');
		$('#curr_draft').addClass('current');
	}else{
		$('#curr_post').addClass('current');
		$('#curr_draft').removeClass('current');
	}

	$('#feed_loading').show();
	yb_load_feeds('user','mypost',{type:ty});
}

//like page
function do_run_like(){
	yb_load_feeds('user','mylikes','');
}
