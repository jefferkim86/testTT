<?php
/////////////////////////////////////////////////////////////////
//云边开源轻博, Copyright (C)   2010 - 2011  qing.thinksaas.cn 
//EMAIL:nxfte@qq.com QQ:234027573                              
//$Id: product.class.php 589 2012-05-11 15:50:28Z anythink $         


class yb_product extends basePostModel
{

    function __construct($mconfig){
         parent::__construct($mconfig); 
    }
    
    function add(){
        parent::add();
        $this->display($this->mconfig['display']);
    }
    
    function saved(){
//		$music = $this->__loadMusicString($this->spArgs('urlmusic'));
		$music = $this->parseItem();
        if(is_array($music)){
             $bodypre = '[attribute]'.serialize($music).'[/attribute]';
        }//var_dump($bodypre);exit;
       if(parent::saved($bodypre)){
           header('Location:'.spUrl('main'));
       }
    }
    
    function edit(){
        parent::edit();
        $this->display($this->mconfig['display']);
    }
    
    function uploadmedia(){
        if($this->mconfig['cfg']['mp3upload'] == 0){
            exit('不允许上传');
        }
        parent::uploadmedia($this->mconfig['cfg']['mp3uploadsize'],
                          $this->mconfig['cfg']['mp3type']
        );
    }
    
    function postToConnect($a,$b){
    }
    
    private function parseItem() {
//    	$id=38217795728;
//    	$taobao_url = "http://hws.m.taobao.com/cache/wdetail/5.0/?id=".$id."&ttid=2013@taobao_h5_1.0.0&exParams={}";
//    		$result = file_get_contents($taobao_url);
//    		if (empty($result)) throw new Exception("item is null", 1000);
//			
//    		$item = json_decode($result);
//			if (empty($item)) throw new Exception("get item error", 1000);
//			
//			$stack = json_decode($item->data->apiStack['0']->value);
//			if (empty($stack)) throw new Exception("item parse error", 1001);
//			
//			$data['title'] = $item->data->itemInfoModel->title;
//			$data['image'] = $item->data->itemInfoModel->picsPath['0'];
//			$data['deliveryFees'] = $stack->data->delivery->deliveryFees['0'];
//			foreach ($stack->data->itemInfoModel->priceUnits as $val) {
//				if (trim($val->name) == "价格") {
//					$data['price'] = $val->price;
//				}
//			}
//			$data['content'] = '测试宝贝发布功能';
//			$data['tag'] = 'HTC,手机';
//			return $data;
    	$title = $this->spArgs('title');
    	if (empty($title)) return null;
    	$item = array();
    	$item['title'] = $title;
    	$item['image'] = $this->spArgs('image');
    	$item['deliveryFees'] = $this->spArgs('deliveryFees');
    	$item['price'] = $this->spArgs("price");
    	$item['producturl'] = $this->spArgs('producturl');
    	return $item;
    }
	
	 /*处理发布的字符串
    发布时的文件如果小于上传的媒体文件，则本函数会自动清理
    */
    private function __loadMusicString($strings)
    {
        $music  = substr(trim($strings),0,-4);
        $music = explode('[YB]',$music); //分隔
        $locadata = ''; //本博客媒体数量 
        $compdata = array(); //上传使用了几个
        if(is_array($music))
        {
            foreach($music as $d)
            {
                $rs = explode('|',$d);
                    $data[] = array('type'=>$rs[0],'img'=>$rs[1],'pid'=>$rs[2],'desc'=>$rs[3],'url'=>$rs[4]);    
            }
            
            //检查上传媒体的使用情况
            $result = spClass('db_attach')->findAll(array('bid'=>$_SESSION['tempid'],'uid'=>$this->uid),'','id,bid,mime'); //锁定用户文件,防止提交非自己的id以至于被删除
            if(is_array($result))
            {
                foreach($result as $d) //整理本地文件
                {
                    if($d['mime'] == 'mp3' || $d['mime'] == 'wma' || $d['mime'] == 'mid' ) //判断只有媒体文件才被处理
                    {
                        $locadata[] = $d['id'];
                    }
                }
                //计算差集,删除编辑器未使用媒体
                $compute = array_diff($locadata,$compdata); 
                if(is_array($compute)) 
                {
                    foreach($compute as $d){ spClass('db_attach')->delBy($d,$this->uid); }
                }
            }

        }
        $data = $this->assoc_unique($data,'pid'); //数组去重
        return $data;
    }
	
	 /*数组去重*/
    private function assoc_unique($arr, $key) {   
     $tmp_arr = array();   
     foreach($arr as $k => $v) {   
         if(in_array($v[$key], $tmp_arr)) {   
             unset($arr[$k]);   
         } else {   
             $tmp_arr[] = $v[$key];   
         }   
     }   
     sort($arr); 
     return $arr;   

	}
	

}
?>
