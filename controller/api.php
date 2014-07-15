<?php
/////////////////////////////////////////////////////////////////
//云边开源轻博, Copyright (C)   2010 - 2011  qing.thinksaas.cn 
//EMAIL:nxfte@qq.com QQ:234027573                              
//$Id: api.php 978 2012-06-22 15:23:13Z anythink $ 


//API控制器
class api extends top
{ 
	public function index(){
		//header("Access-Control-Allow-Origin:*");
		//header("P3P: CP=”CURa ADMa DEVa PSAo PSDo OUR BUS UNI PUR INT DEM STA PRE COM NAV OTC NOI DSP COR");   

		$__controller = $this->spArgs('yc');
		$__action     = $this->spArgs('ym');
		$handle_controller = spClass($__controller, null, $GLOBALS['G_SP']['api_path'].'/'.$__controller.".php");
		
		if(!is_object($handle_controller) || !method_exists($handle_controller, $__action)){
			$this->api_error($__controller.' - '.$__action.' No find');
		}
		$handle_controller->$__action();
	}
}