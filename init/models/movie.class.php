<?php
/////////////////////////////////////////////////////////////////
//云边开源轻博, Copyright (C)   2010 - 2011  qing.thinksaas.cn 
//EMAIL:nxfte@qq.com QQ:234027573                              
//$Id: photo.class.php 589 2012-05-11 15:50:28Z anythink $         


class yb_movie extends basePostModel
{

    function __construct($mconfig){
         parent::__construct($mconfig); 
    }
    
    function add(){
        parent::add();
        $this->display($this->mconfig['display']);
    }
    
    function saved(){
		$movie = $this->__loadmovie($this->spArgs('item'));

        if(is_array($movie)){
             $bodypre = '[attribute]'.serialize($movie).'[/attribute]';
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
		if($this->mconfig['cfg']['enableurl'] == 0){
            exit(json_encode(array('error'=>'没开起引用地址功能')));
        }
		parent::links();
	}
    
   
    
    
    function postToConnect($a,$b){
    }
	
	function __loadmovie($data){

		$rs = array();
		if(is_array($data)){
		
			foreach($data as $d){
				$rs[] = json_decode($d,true);
			}
			return $rs;
		}
	}
	




}
?>
