<?php
/////////////////////////////////////////////////////////////////
//云边开源轻博, Copyright (C)   2010 - 2011  qing.thinksaas.cn 
//EMAIL:nxfte@qq.com QQ:234027573                              
//$Id: post.php 858 2012-06-16 14:52:50Z anythink $         


class post extends top
{
    private $_model = '';
    
    /*
     * 发布&编辑内容
     * 读取模型配置并加载模型处理机制
     * 读取模型 modelname.class.php
     * 读取模板 modelname_post.html
     * */
    function __construct(){  
        parent::__construct(); 
        if($this->uid == 0){prient_jump(spUrl('main','login'));}
        //加载系统级模型变量
        if(!spAccess('r','ybmodel')){  //读取设置
            $mconfig = spClass('db_models')->getModel();
            spAccess('w','ybmodel',$mconfig,-1);
        }else{
            $mconfig =  spAccess('r','ybmodel');
        }
        //初始化模型和模型配置
        $mid = $this->spArgs('model',0);
        $mid_array = array();
        if(!in_array($mid,$mconfig['model'])){
            //$this->error('系统未找到该发布类型');
            exit('no model');
        }
        
        if($mconfig['data'][$mid]['status'] == 0){
            exit('no open');
        }
        
        //处理路径&实例化名称&获取一个tmpid
        $model_path =  SP_PATH.'/models/'.$mconfig['data'][$mid]['modelfile'];
        $model_name = array_shift(explode('.',$mconfig['data'][$mid]['modelfile']));
        $mconfig['data'][$mid]['display'] = 'models/'.$model_name.'.html';
        
        if(!file_exists($model_path)){
            exit('model class load error');
        }
        
        
        if(!empty($mconfig['data'][$mid]['cfg'])){
            $arr = explode("\n",$mconfig['data'][$mid]['cfg']);
    
            $config = array();
            foreach($arr as $d){
                $v = explode('--',$d);
                $config = array_merge($config, array($v[0]=>$v[1]));
            }
            $mconfig['data'][$mid]['cfg'] = $config;
        }
        
        
        //加载basemodel和对应发布模块
        require_once SP_PATH.'/models/basePostModel.php';
        require_once $model_path;
        $action = 'yb_'.$model_name;
        $this->_model = new $action($mconfig['data'][$mid]);
    }
    
    function index(){
        prient_jump(spUrl('main'));
    }
    
    
    /*调用具体发布模块执行业务*/

    function add(){
        $this->_model->add();
    }
    
    function saved(){
        $this->_model->saved();
    }
    
    function edit(){
        $this->_model->edit();
    }
    
    function uploadimg(){
        $this->_model->uploadimg();
    }
	
	function uploadmedia(){
		 $this->_model->uploadmedia();
	}
	
	function links(){
		 $this->_model->links();
	}
	


    
    

}
?>
