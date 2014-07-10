<?php

/////////////////////////////////////////////////////////////////
//云边开源轻博, Copyright (C)   2010 - 2011  qing.thinksaas.cn
//EMAIL:zhangshaomin_1990@126.com QQ:1470506882
//邀请模块数据模型
class db_invite extends ybModel
{

    public    $pk = "id";              // 主键  
    public    $table = "invite";       // 邀请数据表的名称(不包含前缀) 
	protected $invite_count = '';      //每人最大邀请码数量
	protected $invite_expiration = ''; //邀请码过期天数
	
	function __construct(){  
        parent::__construct(); 
		$this->invite_count 	 = ($this->yb['invite_count'] == '')	  ? 5  : $this->yb['invite_count'] ;
		$this->invite_expiration = ($this->yb['invite_expiration'] == '') ? 10 : $this->yb['invite_expiration'] ;
    }
	
	//邀请初始化
	public function initInvite($uid)
    {
        //自动删除过期验证码
        $this->delete("`exptime` < ".time());
    
        //如果没有一条记录则补充至满
        if (0 == $this->findCount(array('uid' => $uid))){
           $this->addToFull($uid);
        }

        //对邀请码时间格式化
		$row = array('uid' => $uid);
        $invite_code = $this->findAll($row,'','id,inviteCode,exptime');
		foreach($invite_code as &$d){
			$d['exptime'] = date('Y-m-d H:i',$d['exptime']);
		}

        return array(
            'current_total'   => $this->findCount($row), //当前拥有的邀请码个数
            'invited_friends' => spClass('db_invite_friend')->findCount($row), //邀请的朋友个数
            'invite_code'     => $invite_code, //所有的邀请码
        );
    }

	//给某个用户填充邀请码
	public function addToFull($uid){
        $row = array('uid' => $uid);
        $num = $this->invite_count - $this->findCount($row);
		$row = '';
		if($num >= 0) {
            //没有达到邀请码最大值
            for ($i = 0; $i < $num; $i++) {
                $ret = array(
                    'uid'        => $uid,
                    'inviteCode' => $this->makeInviteCode(),
                    'exptime'    => time() + ($this->invite_expiration * 24 * 60 * 60)
                );
				$this->create($ret);
            }
        }
		return true;
	}

    /**
     * @return true or false 
     * @todo 检测 该邀请码是否存在切尚未过期
     */
    public function chkInviteCode($code)
    {
        if($rs = $this->find(array('inviteCode' => $code))){
			if($rs['exptime'] > time()){
				return $rs;
			}
        }
        return false;
    }

    /**
     * 
     * 创建一个邀请码
     * @return string 
     * @todo return format xxxx-xxxx-xxxx
     */
    public function makeInviteCode()
    {
        $str = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $ret = '';
        for ($i = 0; $i < 4; $i++){
            for ($j = 0; $j < 4; $j++) {
                $ret.=rand(0, 9);
            }
            $ret.='-';
        }
        return md5($str[rand(0, 26)] . $_SERVER['HTTP_USER_AGENT'] . uniqid() . $ret . $_SERVER['REMOTE_ADDR'] ); 
    }

	
	//使用邀请码如果邀请码不存在或失效返回false
	public function useInviteCode($inviteCode , $uid ,$touid)
    {
		spClass('db_invite_friend')->createInvitedFriend($uid,$touid);//添加邀请的好友
		$this->delete(array('inviteCode' => $inviteCode));//删除邀请码
		return true;
    }
}

?>
