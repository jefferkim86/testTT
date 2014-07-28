<?php
/////////////////////////////////////////////////////////////////
//云边开源轻博, Copyright (C)   2010 - 2011  qing.thinksaas.cn 
//EMAIL:nxfte@qq.com QQ:234027573                              
//$Id: music.class.php 972 2012-06-22 12:57:31Z anythink $         


class yb_music extends basePostModel
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

		$music = $this->__loadMusicString($this->spArgs('urlmusic'));
        if(is_array($music)){
             $bodypre = '[attribute]'.serialize($music).'[/attribute]';
        }
       if(parent::saved($bodypre)){
           header('Location:'.spUrl('main'));
       }
    }
    
    function edit(){
        parent::edit();
        $this->display($this->mconfig['display']);
    }
    
    function uploadmedia(){
        if($this->mconfig['cfg']['enableupload'] == 0){
            exit(json_encode(array('err'=>'没开起上传功能')));
        }
        parent::uploadmedia($this->mconfig['cfg']['uploadsize'],
                            $this->mconfig['cfg']['uploadtype']
        );
    }
	
	function links(){
		if($this->mconfig['cfg']['enableurl'] == 0){
            exit(json_encode(array('error'=>'没开起引用地址功能')));
        }
		parent::links();
	}
    
    function postToConnect($a,$b){
    }
	
	 /*处理发布的字符串
    发布时的文件如果小于上传的媒体文件，则本函数会自动清理
    */
    private function __loadMusicString($strings)
    {

        $music  = substr(trim($strings),0,-4);
        $music = explode('[YB]',$music); //分隔
		$title_list = $this->spArgs('title_list');
		$author_list = $this->spArgs('author_list');
		$artist_list = $this->spArgs('artist_list');

        $locadata = ''; //本博客媒体数量 
        $compdata = array(); //上传使用了几个
		
	
        if(is_array($music)){
            foreach($music as $key => $d) {
                $rs = explode('|',$d);
				$rs[5] =( $rs[5] != '艺术家') ? isset($artist_list[$key]) ? $artist_list[$key] : $rs[5] : '';
                if($rs[0] =='local') {
                    $compdata[] = $rs[2];
                    if($this->_localMusicParse($rs[2],$rs[3])){  $data[] = array('type'=>'local','img'=>$rs[1],'pid'=>$rs[2],'title'=>$title_list[$key],'url'=>$rs[4],'artist'=>$rs[5],'author'=>$author_list[$key]); } //验证成功或修改成功
                }else{
                    $data[] = array('type'=>$rs[0],
						'img'=>$rs[1],
						'pid'=>$rs[2],
						'title'=>isset($title_list[$key]) ? $title_list[$key] : $rs[3] ,
						'url'=>$rs[4],
						'artist'=>$rs[5],
						'author'=>isset($author_list[$key]) ? $author_list[$key] : $rs[6] 
					);   
                }   
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
	
   /*进行发布音乐的处理
    id  附件id
    desc 描述
    需要判断是否归所属人
    如果此id没查出来则返回false 接到的方法要删除这个id
    */
    private function _localMusicParse($id,$desc)
    {           
        $result = spClass("db_attach")->findBy($id,$this->uid); //检出文件是否存在          
        if($result['uid'] == $this->uid) //判断是否是我发的
        {
            if($desc[$d] != '描述') { spClass("db_attach")->update(array('id'=>$id),array('blogdesc'=>$desc)); }//如果有描述则更新描述
            return true;
        }else{
            return false;
        }
    }	
	
	



}
?>
