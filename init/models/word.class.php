<?php
/////////////////////////////////////////////////////////////////
//云边开源轻博, Copyright (C)   2010 - 2011  qing.thinksaas.cn 
//EMAIL:nxfte@qq.com QQ:234027573                              
//$Id: word.class.php 589 2012-05-11 15:50:28Z anythink $         


class yb_word extends basePostModel
{
	/*mconfig 为模型的配置信息,如下所示
     * Array
    (
        [id] => 1
        [icon] => image/comm/text.jpg
        [name] => 文字
        [modelfile] => word.class.php
        [status] => 1
        [desc] => 发布文字
        [version] => 1.0
        [author] => SYSTEM
        [feedtpl] => 
        [config] => array('uploadimg'=>0,'uploadimgsize'=>2048)
        [display] => post_word.html
    )
     * */
    function __construct($mconfig){
         parent::__construct($mconfig); 
    }
    
    function add(){
        parent::add();
        $this->display($this->mconfig['display']);
    }
    
    function saved(){
        $used_image = $this->_localImgParse($this->spArgs('textarea'));  //过滤图像资源
        if(is_array($used_image)){
             $bodypre = '[attribute]'.serialize($used_image).'[/attribute]';
        }
       if(parent::saved($bodypre)){
           header('Location:'.spUrl('main'));
       }
    }
    
    function edit(){
        parent::edit();
        $this->display($this->mconfig['display']);
    }
    
    function uploadimg(){
        if($this->mconfig['cfg']['imguplod'] == 0){
            exit('不允许上传');
        }
        parent::uploadimg($this->mconfig['cfg']['imguploadsize'],
                          $this->mconfig['cfg']['imagetype']
        );
    }
    
    function postToConnect($a,$b){
    }
	

     //获得编辑器实际使用的图片
    private function _localImgParse($body)
    {   
        preg_match_all( "/<img.[^>]*?(src|SRC)=\"[\"|'| ]{0,}([^>]*\\.(gif|jpg|jpeg|bmp|png))([\"|'|\\s]).*[\\/]?>/isU",stripslashes($body) , $info );
        $info = array_unique($info[2]);
        $str = '';
        foreach($info as $d)
        {
             if (substr($d,0,4) != 'http')  //非本地连接不管
             {
                if(substr($d,0,7) == 'attachs')  //如果不是 attachs开头不管
                {
                    $path = pathinfo($d);
                    if(substr($path['basename'],0,2) == 't_') {$d = $path['dirname'].'/'. substr($path['basename'],2,99);}//如果是缩略图
                }
             }  
             $str .= '\''.$d.'\',';
            }
            
            $str = substr($str,0,-1); //去掉逗号
            if($str){ $where = "`path` not in ($str) and"; } //如果存在 就加限制
            $result = spClass('db_attach')->findAll("$where  uid = {$this->uid} and bid = 0",'','id,path'); //获取到编辑器没有使用的

            if(is_array($result))
            {
                foreach($result as $d) //全部搞定
                {
                    spClass('db_attach')->delBy($d['id'],$this->uid);
                }
            }
        return $info;
    }


}
?>
