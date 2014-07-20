/*
*M即： Backbone.Model
* - 将属性的改变通知给View
* - 从View获得新的属性值，同步到服务端
*/
define(function(require,exports,module){

	
	var	Backbone = require('backbone'),
		
		MODEL = {};
	
		MODEL.goodslistClass = Backbone.Model.extend({ 

			

		});
		
		MODEL.Instance = new MODEL.goodslistClass;
	
	return MODEL;
	
});