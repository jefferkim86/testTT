<?php
/////////////////////////////////////////////////////////////////
//云边开源轻博, Copyright (C)   2010 - 2011  qing.thinksaas.cn 
//EMAIL:nxfte@qq.com QQ:234027573                              
//$Id: user.php 1304 2012-07-19 13:18:47Z anythink $ 

class item extends top
{ 

	function __construct(){  
        parent::__construct(); 
		$this->needLogin();
    }
    
    /**
     * 
     * 获取宝贝信息
     * @throws Exception
     */
    function get() {
    	$url = $this->spArgs('url');
    	if (!empty($url) && preg_match("/[tmall|taobao]\.com/", $url)) {
    		preg_match_all("/\id=([0-9]{3,})/", $url, $matches);
    		if ($matches['1']['0']) {
    			$id = $matches['1']['0'];
    		}
    		
    		try {
	    		$taobao_url = "http://hws.m.taobao.com/cache/wdetail/5.0/?id=".$id."&ttid=2013@taobao_h5_1.0.0&exParams={}";
	    		$result = file_get_contents($taobao_url);
	    		if (empty($result)) throw new Exception("item is null", 1000);
				
	    		$item = json_decode($result);
				if (empty($item)) throw new Exception("get item error", 1000);
				
				$stack = json_decode($item->data->apiStack['0']->value);
				if (empty($stack)) throw new Exception("item parse error", 1001);
				
				
				$data['title'] = $item->data->itemInfoModel->title;
				$data['image'] = $item->data->itemInfoModel->picsPath['0'];
				$data['deliveryFees'] = $stack->data->delivery->deliveryFees['0'];
				$data['price'] = "";
				$data['discount_price'] = "";
				foreach ($stack->data->itemInfoModel->priceUnits as $val) {
					if (trim($val->name) == "价格") {
						$data['price'] = $val->price;
					} else if (empty($data['discount_price']) && trim($val->name) != "手机专项价") {
						$data['discount_price'] = $val->price;
					}
				}
				
				$this->api_success($data);
    		} catch (Exception $ex) {
    			$this->api_error("获取宝贝失败了！");
    		}
    	} else {
    		$this->api_error("宝贝地址不对哦！");
    	}
    }

	
}
