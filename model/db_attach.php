<?php
/////////////////////////////////////////////////////////////////
//云边开源轻博, Copyright (C)   2010 - 2011  qing.thinksaas.cn 
//EMAIL:nxfte@qq.com QQ:234027573                              
//$Id: db_attach.php 1055 2012-06-28 14:29:50Z anythink $ 

class db_attach extends ybModel  
{  
	var $pk = "id"; //主键  
	var $table = "attachments"; // 数据表的名称 



	/*删除某一个附件,连数据带文件都删除*/
	function delBy($id,$uid){
		$rs = $this->find(array('id'=>$id,'uid'=>$uid),'','path');
        if($rs){
            $path = pathinfo($rs['path']);
            $file = $path['dirname'].'/t_'.$path['basename'];
            @unlink(APP_PATH.'/'.$rs['path']);
            @unlink(APP_PATH.'/'.$file);
            @rmdir(APP_PATH.'/'.$path['dirname']);
            return $this->deleteByPk($id);
        }else{
            return false;
        }
	}
    
    //根据博客id删除
    function delbybid($bid){
        $attahDir = $this->find(array('bid'=>$bid),'','path');
        if($attahDir != ''){
            $path = pathinfo($attahDir['path']);
            $this->deldir($path['dirname']);
            $this->delete(array('bid'=>$bid));
        }
        return true;
    }
	
	//_localMusicParse使用
	function findBy($id)
	{
		return $this->find(array('id'=>$id),'','uid,path');
	}
    
    
    //将临时id的附件更新成正式发布时使用的
    function changeId($uid,$bid){
        
        if($rs = $this->findAll(array('uid'=>$uid,'bid'=>0))){
            foreach($rs as $d){
                $file = pathinfo($d['path']);
               
                //获取大图和小图的路径
                $su_tfile = APP_PATH .'/'. $file['dirname'].'/t_' . $file['basename'];
                $su_file  = APP_PATH .'/'.$d['path'];
            
                $to_tfile = 't_' . $file['basename'];
                $to_file  = $file['basename'];
               
                spClass('uploadFile')->set_diydir($bid);
                $truefile = spClass('uploadFile')->selectuptype(4);
                @rename($su_tfile,$truefile.'/'.$to_tfile);//拷贝到新目录
				@rename($su_file,$truefile.'/'.$to_file);//拷贝到新目录
                @unlink($su_tfile); //删除旧目录下的文件
                @unlink($su_file);
                $savepath = $truefile.'/'.$to_file;
                $this->update(array('uid'=>$uid,'bid'=>0,'path'=>$d['path']),array('bid'=>$bid,'path'=>$savepath));
            }
            
        }
    }
    
        /*删除文件夹所有内容*/
    private function deldir($dir) {
        if($dir==''){return false;}
        $dh=opendir($dir);
        while ($file=readdir($dh)) {
            if($file!="." && $file!="..") {
                $fullpath=APP_PATH.'/'.$dir."/".$file;
                @unlink($fullpath); 
            }
        }
        closedir($dh);
        @rmdir(APP_PATH.'/'.$dir);
    }
}
?>
