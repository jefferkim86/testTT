/*!
 * artTemplate - Template Engine
 * https://github.com/aui/artTemplate
 * Released under the MIT, BSD, and GPL Licenses
 * Email: 1987.tangbin@gmail.com
 */
 

/**
 * 模板引擎路由函数
 * 根据 content 参数类型执行 render 或者 compile 方法
 * @name    template
 * @param   {String}            模板ID (可选)
 * @param   {Object, String}    数据或者模板字符串
 * @return  {String, Function}  渲染好的HTML字符串或者渲染方法
 */
var template = function (id, content) {
    return template[
        typeof content === 'object' ? 'render' : 'compile'
    ].apply(template, arguments);
};




(function (exports, global) {


"use strict";
exports.version = '1.0';
exports.openTag = '<%';
exports.closeTag = '%>';
exports.parser = null;



/**
 * 渲染模板
 * @name    template.render
 * @param   {String}    模板ID
 * @param   {Object}    数据
 * @return  {String}    渲染好的HTML字符串
 */
exports.render = function (id, data) {

    var cache = _getCache(id);
    
    if (cache === undefined) {

        return _debug({
            id: id,
            name: 'Render Error',
            message: 'Not Cache'
        });
        
    };
    
    return cache(data); 
};



/**
 * 编译模板
 * 2012-6-6:
 * define 方法名改为 compile,
 * 与 Node Express.js 保持一致,
 * 感谢 TooBug 提供帮助!
 * @name    template.compile
 * @param   {String}    模板ID (可选)
 * @param   {String}    模板字符串
 * @return  {Function}  渲染方法
 */
exports.compile = function (id, source) {
    
    var debug = arguments[2];
    
    
    if (typeof source !== 'string') {
        debug = source;
        source = id;
        id = null;
    }  ;

    
    try {
        
        var cache = _compile(source, debug);
        
    } catch (e) {
    
        e.id = id || source;
        e.name = 'Syntax Error';
        return _debug(e);
        
    };
    
    
    function render (data) {           
        
        try {
            
            return cache.call(_helpers, data); 
            
        } catch (e) {
            
            if (!debug) {
                return exports.compile(id, source, true)(data);
            };
			
            e.id = id || source;
            e.name = 'Render Error';
            e.source = source;
            
            return _debug(e);
            
        };
        
    };
    
    
    render.toString = function () {
        return cache.toString();
    };
    
    
    if (id) {
        _cache[id] = render;
    };

    
    return render;

};




/**
 * 扩展模板辅助方法
 * @name    template.helper
 * @param   {String}    名称
 * @param   {Function}  方法
 */
exports.helper = function (name, helper) {
    if (helper === undefined) {
        return _helpers[name];
    } else {
        _helpers[name] = helper;
    };
};



var _cache = {};
var _helpers = {};
var _isNewEngine = ''.trim;
var _isServer = _isNewEngine && !global.document;



// 模板编译器
var _compile = function (source, debug) {

    var openTag = exports.openTag;
    var closeTag = exports.closeTag;
    var parser = exports.parser;

    
    var code = source;
    var tempCode = '';
    var line = 1;
    var outKey = {};
    var uniq = {$out:true,$line:true};
    
    var variables = "var $helpers=this,"
    + (debug ? "$line=0," : "");
    
    var replaces = _isNewEngine
    ? ["$out='';", "$out+=", ";", "$out"]
    : ["$out=[];", "$out.push(", ");", "$out.join('')"];
    
    var include = "function(id,data){"
    +     "if(data===undefined){data=$data}"
    +     "return $helpers.$render(id,data)"
    + "}";
    
    
    
    // html与逻辑语法分离
    _forEach.call(code.split(openTag), function (code, i) {
        code = code.split(closeTag);
        
        var $0 = code[0];
        var $1 = code[1];
        
        // code: [html]
        if (code.length === 1) {
            
            tempCode += html($0);
         
        // code: [logic, html]
        } else {
            
            tempCode += logic($0);
            
            if ($1) {
                tempCode += html($1);
            }
        }
        

    });
    
    
    
    code = tempCode;
    
    
    // 调试语句
    if (debug) {
        code = 'try{' + code + '}catch(e){'
        +       'e.line=$line;'
        +       'throw e'
        + '}';
    };
    
    
    code = variables + replaces[0] + code + 'return ' + replaces[3];
    
    
    try {

        return new Function('$data', code);
        
    } catch (e) {
        e.temp = 'function anonymous($data) {' + code + '}';
        throw e;
    };
    
    
    
    // 处理 HTML 语句
    function html (code) {
        
        // 记录行号
        line += code.split(/\n/).length - 1;
        
        code = code
        // 单双引号与反斜杠转义
        .replace(/('|"|\\)/g, '\\$1')
        // 换行符转义(windows + linux)
        .replace(/\r/g, '\\r')
        .replace(/\n/g, '\\n');
        
        code = replaces[1] + "'" + code + "'" + replaces[2];
        
        return code + '\n';
    };
    
    
    // 处理逻辑语句
    function logic (code) {

        var thisLine = line;
       
        if (parser) {
        
             // 语法转换器
            code = parser(code);
            
        } else if (debug) {
        
            // 记录行号
            code = code.replace(/\n/g, function () {
                line ++;
                return '$line=' + line +  ';';
            });
            
        };
        
        
        // 输出语句
        if (code.indexOf('=') === 0) {
            
            code = replaces[1]
            + (_isNewEngine ? '$getValue(' : '')
            + code.substring(1).replace(/[\s;]*$/, '')
            + (_isNewEngine ? ')' : '')
            + replaces[2];

        };
        
        if (debug) {
            code = '$line=' + thisLine + ';' + code;
        };
		
        getKey(code);
        
        return code + '\n';
    };
    
    
    // 提取模板中的变量名
    function getKey (code) {
        
        // 过滤注释、字符串、方法名
        code = code.replace(/\/\*.*?\*\/|'[^']*'|"[^"]*"|\.[\$\w]+/g, '');
		
        // 分词
        _forEach.call(code.split(/[^\$\w\d]+/), function (name) {
         
            // 沙箱强制语法规范：禁止通过套嵌函数的 this 关键字获取全局权限
            if (/^(this|\$helpers)$/.test(name)) {
                throw {
                    message: 'Prohibit the use of the "' + name +'"'
                };
            };
			
            // 过滤关键字与数字
            if (!name || _keyWordsMap[name] || /^\d/.test(name)) {
                return;
            };
            
            // 除重
            if (!uniq[name]) {
                setValue(name);
                uniq[name] = true;
            };
            
        });
        
    };
    
    
    // 声明模板变量
    // 赋值优先级: 内置特权方法(include) > 公用模板方法 > 数据
    function setValue (name) {  
        var value;

        if (name === 'include') {
        
            value = include;
            
        } else if (_helpers[name]) {
            
            value = '$helpers.' + name;
            
        } else {
        
            value = '$data.' + name;
			
        };
        
        variables += name + '=' + value + ',';
    };
    
	
};



// 获取模板缓存
var _getCache = function (id) {
    var cache = _cache[id];
    
    if (cache === undefined && !_isServer) {
        var elem = document.getElementById(id);
        
        if (elem) {
            exports.compile(id, elem.value || elem.innerHTML);
        };
        
        return _cache[id];
    };
    
    return cache;
};



// 模板调试器
var _debug = function (e) {

    var content = '[template]:\n'
        + e.id
        + '\n\n[name]:\n'
        + e.name;
    
    if (e.message) {
        content += '\n\n[message]:\n'
        + e.message;
    };
    
    if (e.line) {
        content += '\n\n[line]:\n'
        + e.line;
        content += '\n\n[source]:\n'
        + e.source.split(/\n/)[e.line - 1].replace(/^[\s\t]+/, '');
    };
    
    if (e.temp) {
        content += '\n\n[temp]:\n'
        + e.temp;
    };
    
    if (global.console) {
        console.error(content);
    };
    
    function error () {
        return error + '';
    };
    
    error.toString = function () {
        return '{Template Error}';
    };
    
    return error;
};



// 数组迭代方法
var _forEach =  Array.prototype.forEach || function (block, thisObject) {
    var len = this.length >>> 0;
    
    for (var i = 0; i < len; i++) {
        if (i in this) {
            block.call(thisObject, this[i], i, this);
        }
    }
    
};



// javascript 关键字表
var _keyWordsMap = {};
_forEach.call((

    // 关键字
    'break,case,catch,continue,debugger,default,delete,do,else,false,finally,for,function,if'
    + ',in,instanceof,new,null,return,switch,this,throw,true,try,typeof,var,void,while,with'
    
    // 保留字
    + ',abstract,boolean,byte,char,class,const,double,enum,export,extends,final,float,goto'
    + ',implements,import,int,interface,long,native,package,private,protected,public,short'
    + ',static,super,synchronized,throws,transient,volatile'
    
    // ECMA 5 - use strict
    + ',arguments,let,yield'
    
).split(','), function (key) {
    _keyWordsMap[key] = true;
});



// 模板私有辅助方法
exports.helper('$forEach', _forEach);
exports.helper('$render', exports.render);
exports.helper('$getValue', function (value) {
    return value === undefined ? '' : value;
});



})(template, this);


if (typeof module !== 'undefined' && module.exports) {
    module.exports = template;    
};


/*!
 * artTemplate - Syntax Extensions
 * https://github.com/aui/artTemplate
 * Released under the MIT, BSD, and GPL Licenses
 * Email: 1987.tangbin@gmail.com
 */
 
(function (exports) {

exports.openTag = '{';
exports.closeTag = '}';

exports.parser = function (code) {
    code = code.replace(/^\s/, '');
    
    var args = code.split(' ');
    var key = args.shift();
    var fuc = exports.keywords[key];
    
    if (fuc) {
        args = args.join(' ');
        code = fuc.call(code, args);
    } else {
        code = '=$escape(' + code + ')';
    };
    
    return code;
};


exports.keywords = {
    
    'if': function (code) {
        return 'if(' + code + '){';
    },
    
    'else': function (code) {
        code = code.split(' ');
        
        if (code.shift() === 'if') {
            code = ' if(' + code.join(' ') + ')';
        } else {
            code = '';
        };

        return '}else' + code + '{';
    },
    
    '/if': function () {
        return '}';
    },
    
    'each': function (code) {
        
        code = code.split(' ');
        
        var object = code[0] || '$data';
        var as = code[1] || 'as';
        var value = code[2] || '$value';
        var index = code[3] || '$index';
        var args = value + ',' + index;
        
        if (as !== 'as') {
            object = '[]';
        };
        
        return '$each(' + object + ',function(' + args + '){';
    },
    
    '/each': function () {
        return '});';
    },
    
    'echo': function (code) {
        return '=' + code;
    },
    
    'include': function (code) {
        code = code.split(' ');
    
        var id = code[0];
        var data = code[1];

        return '=include(' + id + ',' + data + ')';
    }

};


exports.helper('$each', function (data, callback) {
     
    if (_isArray(data)) {
        _forEach.call(data, callback);
    } else {
        for (var i in data) {
            callback.call(data, data[i], i);
        }
    }
    
});


exports.helper('$escape', (function () {

    var badChars = /&(?!\w+;)|[<>"']/g;
    var map = {
      //  "<": "&lt;",
      //  ">": "&gt;",
        '"': "&quot;",
        "'": "&#x27;",
        "&": "&amp;"
    };
  
    
    var fn = function (s) {
        return map[s] || s;
    };
    
    return function (content) {
        return typeof content === 'string'
        ? content.replace(badChars, fn)
        : content;
    };

})());


var _forEach = exports.helper('$forEach');
var _toString = Object.prototype.toString;
var _isArray = Array.isArray || function (obj) {
    return _toString.call(obj) === '[object Array]';
};


})(template);

template.helper('debug',function(d){
console.log(d);
});

template.helper('flashpath',function(url){
	return skinpath+'/swf/player.swf?soundFile='+url+'&bg=0xA2D8F4&leftbg=0x309AD7&lefticon=0xFFFFFF&rightbg=0x309AD7&rightbghover=0xF17676&righticon=0xFFFFFF&righticonhover=0xFFFFFF&text=0x227CAC&slider=0x309AD7&track=0xFFFFFF&border=0xA2D8F4&loader=0x83C1E7&autostart=no&loop=no';
});

template.helper('urlpath',function(){
	return urlpath;
});

template.helper('myuid',function(){
	return uid;
});
template.helper('getweight',function(hit,maxhit){
	var weight =  (hit / maxhit) * 100;
	if(weight < 10){
		weight = 5;
	};
	return weight;
});
template.helper('chgcss',function(i){
	return  (i%2 == 0) ? 'a':'b';
});

template.helper('decodeURI',function(i){
	return  decodeURIComponent(i);
});

/*自定义加载模板的前缀*/
template.helper('tpl_feed_define',function(i){
	if(i == 1){
		if(typeof cus_tpldefine != 'undefined' && cus_tpldefine.m_1){
			return cus_tpldefine.m_1;
		}else{
			return tpldefine.m_1;
		}
		
	};
	if(i == 2){
		if(typeof cus_tpldefine != 'undefined' && cus_tpldefine.m_2){
			return cus_tpldefine.m_2;
		}else{
			return tpldefine.m_2;
		}
	};
	if(i == 3){
		if(typeof cus_tpldefine != 'undefined' && cus_tpldefine.m_3){
			return cus_tpldefine.m_3;
		}else{
			return tpldefine.m_3;
		}
	};
	if(i == 4){
		if(typeof cus_tpldefine != 'undefined' && cus_tpldefine.m_4){
			return cus_tpldefine.m_4;
		}else{
			return tpldefine.m_4;
		}
	};
	if(i == 5){
		if(typeof cus_tpldefine != 'undefined' && cus_tpldefine.m_5){
			return cus_tpldefine.m_5;
		}else{
			return tpldefine.m_5;
		}
	};
	if(i == 6){
		if(typeof cus_tpldefine != 'undefined' && cus_tpldefine.m_6){
			return cus_tpldefine.m_6;
		}else{
			return tpldefine.m_6;
		}
		return tpldefine.m_6;
	};
	
	if(i == 7){
		if(typeof cus_tpldefine != 'undefined' && cus_tpldefine.m_7){
			return cus_tpldefine.m_7;
		}else{
			return tpldefine.m_7;
		};
		return tpldefine.m_7;
	};
});

/*自定义加载模板的前缀*/
template.helper('tpl_header_define',function(i){

	if(i == 'header'){
		if(typeof cus_tplhdefine != 'undefined' && cus_tplhdefine.header){
			return cus_tplhdefine.header;
		}else{
			return tplhdefine.header;
		}
	};
	if(i == 'footer'){
		if(typeof cus_tplhdefine != 'undefined' && cus_tplhdefine.footer){
			return cus_tplhdefine.footer;
		}else{
			return tplhdefine.footer;
		}
	};
	if(i == 'infooter'){
		if(typeof cus_tplhdefine != 'undefined' && cus_tplhdefine.infooter){
			return cus_tplhdefine.infooter;
		}else{
			return tplhdefine.infooter;
		}
	};
});





//处理贴间广告位，显示几率50%
template.helper('unitad',function(i){
	num = Math.ceil(Math.random()*10);
	if(unit_3 == true && num>5){
		str = '<div id="ad_feeds_'+num+'" class="ad_index_feeds"></div>';
		ad_aside('#ad_feeds_'+num+'',3);
		return str;
	}
})


				
