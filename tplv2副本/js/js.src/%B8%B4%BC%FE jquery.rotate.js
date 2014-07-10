
/**
 * 图片旋转
 * @version	2011.05.27
 * @author	TangBin
 * @param	{HTMLElement}	图片元素
 * @param	{Number}		旋转角度 (可用值: 0, 90, 180, 270)
 * @param	{Number}		最大宽度限制
 * @param	{Number}		最大高度限制
 */
var imgRotate = $.imgRotate = function () {
	var eCanvas = '{$canvas}',
		isCanvas = !!document.createElement('canvas').getContext;
		
	return function (elem, degree, maxWidth, maxHeight) {
		var x, y, getContext,
			resize = 1,
			width = elem.naturalWidth,
			height = elem.naturalHeight,
			canvas = elem[eCanvas];
		
		// 初次运行
		if (!elem[eCanvas]) {
			
			// 获取图像未应用样式的真实大小 (IE和Opera早期版本)
			if (!('naturalWidth' in elem)) {
				var run = elem.runtimeStyle, w = run.width, h = run.height;
				run.width  = run.height = 'auto';
				elem.naturalWidth = width = elem.width;
				elem.naturalHeight = height = elem.height;
				run.width  = w;
				run.height = h;
			};
		
			elem[eCanvas] = canvas = document.createElement(isCanvas ? 'canvas' : 'span');
			elem.parentNode.insertBefore(canvas, elem.nextSibling);
			elem.style.display = 'none';
			canvas.className = elem.className;
			canvas.title = elem.title;
			if (!isCanvas) {
				canvas.img = document.createElement('img');
				canvas.img.src = elem.src;
				canvas.appendChild(canvas.img);
				canvas.style.cssText = 'display:inline-block;*zoom:1;*display:inline;' +
					// css reset
					'padding:0;margin:0;border:none 0;position:static;float:none;overflow:hidden;width:auto;height:auto';
			};
		};
		
		var size = function (isSwap) {
			if (isSwap){ width = [height, height = width][0]}
			if (width > maxWidth) {
				resize = maxWidth / width;
				height =  resize * height;
				width = maxWidth;
			};
			if (height > maxHeight) {
				resize = resize * maxHeight / height;
				width = maxHeight / height * width;
				height = maxHeight;
			};
			if (isCanvas){ (isSwap ? height : width) / elem.naturalWidth};
		};
		
		switch (degree) {
			case 0:
				x = 0;
				y = 0;
				size();
				break;
			case 90:
				x = 0;
				y = -elem.naturalHeight;
				size(true);
				break;
			case 180:
				x = -elem.naturalWidth;
				y = -elem.naturalHeight;
				size();
				break;
			case 270:
				x = -elem.naturalWidth;
				y = 0;
				size(true);
				break;
		};
		
		if (isCanvas) {
			canvas.setAttribute('width', width);
			canvas.setAttribute('height', height);
			getContext = canvas.getContext('2d');
			getContext.rotate(degree * Math.PI / 180);
			getContext.scale(resize, resize);
			getContext.drawImage(elem, x, y);	
		} else {
			canvas.style.width = width + 'px';
			canvas.style.height = height + 'px';// 解决IE8使用滤镜后高度不能自适应
			canvas.img.style.filter = 'progid:DXImageTransform.Microsoft.BasicImage(rotation=' + degree / 90 + ')';
			canvas.img.width = elem.width * resize;
			canvas.img.height = elem.height * resize;
		};
	};
}();

$.imgCtrl={
	init:function(){
		var imgCtrl=$('<div id="image_ctrl" style="display:none;" class="image_ctrl"><a id="view_bimg" target="_blank"><span  id="imgreal" class="imgreal">原始图片</span></a><a><span id="clockright" class="clockright">顺时针旋转</span></a><a><span id="clockleft" class="clockleft">逆时针旋转</span></a></div>');
		$("body").append(imgCtrl);
		imgCtrl.mouseenter(function(){
			clearTimeout($.imgCtrl.parm.timer);
		});
		$("#clockright").click(function(){
			$.imgCtrl.rotate("right");
		});
		$("#clockleft").click(function(){
			$.imgCtrl.rotate("left");
		});
	},
	rotate:function(go){
			imgCur=$.imgCtrl.parm.imgCur;
			imgCtrl=$.imgCtrl.parm.imgCtrl;
			degree=parseInt(imgCur.attr("degree"));
			switch (go){
				case 'left':
					degree -= 90;
					degree = degree === -90 ? 270 : degree;
					break;
				case 'right':
					degree += 90;
					degree = degree === 360 ? 0 : degree;
					break;
			};
		imgCur.attr("degree",degree);
		imgRotate(imgCur[0],degree,500,1000);
		this.setTL(imgCur,imgCtrl);
	},
	parm:{timer:'',imgCur:'',imgCtrl:$("#image_ctrl"),notCtrl:true},	
	setTL:function(obj,imgCtrl){
			imgCur=obj;
			obj=imgCur.next();
			if(obj.length==0){
				obj=imgCur;
			}
			p=obj.offset();
			if(p.top==0 || p.left==0){
				p=obj.offset();
			};
			w=obj.width();
			t=p.top;
			l=p.left+(w-100);
			imgCtrl.css({top:t,left:l}).show();
			
	},
	getImgWidth:function(obj,width){
		return obj.width()==width;
	},
	setImgEvent:function(items){
		
		var imgCtrl=this.parm.imgCtrl=$("#image_ctrl");
		var getIW=this.getImgWidth;
		var setTL=this.setTL;

		items.each(function(){
			var _this=$(this);
			var imgTop=$("<div class='imglist_big img_top' style='display:none;'></div>");
			_this.prepend(imgTop);
			var simgs=_this.find("li");
			var bimgs=simgs.clone();
			bimgs.each(function(){
				var _this=$(this),img_title,					
				imgCur=$(this).find("img");
				img_title=imgCur.attr("title");
				_this.append("<div>"+img_title+"</div>").mouseenter(function(){
					if(getIW(imgCur,500)){
						clearTimeout($.imgCtrl.parm.timer);
						$.imgCtrl.parm.imgCur=imgCur;
						setTL(imgCur,imgCtrl);
						img_url=imgCur.attr("src");
						img_url=img_url.replace('t_','');
						$("#view_bimg").attr("href",img_url);
						imgCtrl.show();
					}
				}).mouseleave(function(){
					$.imgCtrl.parm.timer=setTimeout(function(){
						imgCtrl.hide();
					},200)
				}).click(function(){
					simgs.show();
					bimgs.hide();
					imgCtrl.hide();
				});
			});			
			simgs.each(function(){
				var _this=$(this);
				_this.click(function(){
					if(imgTop.data("added")=="true"){
						simgs.hide();
						bimgs.show();
					}else{
						simgs.hide();
						imgTop.append(bimgs).show().data("added","true");
					}
					
				});
			});

		}).removeClass("wSet");
	}
};
$(document).ready(function(){
	$.imgCtrl.init();
})
