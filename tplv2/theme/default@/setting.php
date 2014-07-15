<?php
/*
	云边主题自定义配置文件
	参数说明:
	title:介绍
	id: css
	findid:选择器 (空格需要用@代替，.点号需要用$代替)
	type：渲染器 radio、单选 select下拉 color 颜色选择器 upload上传选择器
*/
if(!defined('IN_APP')){exit('access no read');}
$setting = array(
	array(
		'title'=>'背景图像',
		'id'=>'img1', //存储位置数据库共有4个存储区域
		'findid'=>'#header_bg',
		'type'=>'upload',
		'description'=>'jpg,png,gif图像,不超过1M',
	),
	
	array(
		'title'=>'背景平铺',
		'id'=>'background-repeat',
		'findid'=>'#header_bg',
		'type'=>'background_repet',
		'default' =>'repet',
		'description'=>'背景平铺方式',
	),
	array(
		'title'=>'背景位置',
		'id'=>'background-position',
		'findid'=>'#header_bg',
		'type'=>'background',
		'default' =>'repet',
		'description'=>'背景平铺方式',
	),
	array(
		'title'=>'背景滚动',
		'id'=>'background-attachment',
		'findid'=>'#header_bg',
		'type'=>'background_scroll',
		'options'=>array('fixed'=>'禁止','scroll'=>'滚动'),
		'default' =>'scroll',
		'description'=>'背景图片滚动方式',
	),
	
	array(
		'title'=>'背景颜色',
		'id'=>'background-color',
		'findid'=>'#header_bg',
		'type'=>'color',
	),
	array(
		'title'=>'签名显示',
		'id'=>'display',
		'findid'=>'#sign',
		'type'=>'radio',
		'options'=>array('block'=>'显示','none'=>'不显示'),
		'default' =>'block',
	),
	array(
		'title'=>'昵称颜色',
		'id'=>'color',
		'findid'=>'#title@a',
		'type'=>'color',
	),
	array(
		'title'=>'标题颜色',
		'id'=>'color',
		'findid'=>'#box_title@a',
		'type'=>'color',
	),
	
);

/*钩子信息文件*/
$setup_info = array(
	'page_limit' => 8,
);

?>