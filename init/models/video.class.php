<?php
/////////////////////////////////////////////////////////////////
//云边开源轻博, Copyright (C)   2010 - 2011  qing.thinksaas.cn 
//EMAIL:nxfte@qq.com QQ:234027573                              
//$Id: video.class.php 611 2012-05-13 14:11:04Z anythink $         


class yb_video extends basePostModel
{

    function __construct($mconfig){
         parent::__construct($mconfig); 
    }
    
    function add(){
        parent::add();
        $this->display($this->mconfig['display']);
    }
    
    function saved(){
		print_r($this->spArgs());
		$video = $this->__loadvideString($this->spArgs('urlmusic'));
        if(is_array($video)){
             $bodypre = '[attribute]'.serialize($video).'[/attribute]';
        }
       if(parent::saved($bodypre)){
           header('Location:'.spUrl('main'));
       }
    }
    
    function edit(){
        parent::edit();
        $this->display($this->mconfig['display']);
    }
    
    function links(){
		parent::links();
	}
    
    function postToConnect($a,$b){
    }
	
	function __loadvideString($strings){
		
		$video  = substr(trim($strings),0,-4);
        $video = explode('[YB]',$video); //分隔
		$customename = $this->spArgs('item');
		$data = array();
		if(is_array($video)){
			foreach($video as $key=>$d){
                $rs = explode('|',$d);
                $data[] = array('type'=>$rs[0],'img'=>$rs[1],'pid'=>$rs[2],'title'=>$customename[$key],'url'=>$rs[4]);    
            }
			return $data;
		}
		return '';
		
	}
	
	

}
?>
