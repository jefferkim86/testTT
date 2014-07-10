<?php

/////////////////////////////////////////////////////////////////
//云边开源轻博, Copyright (C)   2010 - 2011  qing.thinksaas.cn 
//EMAIL:zhangshaomin_1990@126.com QQ:1470506882     

class ybModel extends spModel
{

    private $db_w = null; 		//数据库-写-配置
    private $db_r = null; 		//数据库-读-配置
    private $flags = false; 	//读写分离的标识
    public $RW = null;			//读还是写

    public function __construct() {
        //parent::__construct();
        $this->initConfig();
    }

    /**
     * 判断是否需要补齐参数 
     */
    private function initConfig() {
        if( '' == $GLOBALS['G_SP']['db_driver_path'] ){
            $GLOBALS['G_SP']['db_driver_path'] = $GLOBALS['G_SP']['sp_drivers_path'].'/'.$GLOBALS['G_SP']['db']['driver'].'.php';
        }
		if( null == $this->tbl_name )$this->tbl_name = $GLOBALS['G_SP']['db']['prefix'] . $this->table;
		$this->yb = $GLOBALS['YB'];
        if($GLOBALS['G_SP']['db']['masterslave']){
			//补齐相关配置
			foreach($GLOBALS['G_SP']['db']['masterslave'] as $k => &$v){
				foreach($v as $key => &$val){
					$val['host'] = empty($val['host']) ? $GLOBALS['G_SP']['db']['host'] : $val['host'];
					$val['login'] = empty($val['login']) ? $GLOBALS['G_SP']['db']['login'] : $val['login'];
					$val['password'] = empty($val['password']) ? $GLOBALS['G_SP']['db']['password'] : $val['password'];
					$val['database'] = empty($val['database']) ? $GLOBALS['G_SP']['db']['database'] : $val['database'];
					$val['prefix'] = empty($val['prefix']) ? $GLOBALS['G_SP']['db']['prefix'] : $val['prefix'];
					$val['db_driver_path'] = empty($val['db_driver_path']) ? $GLOBALS['G_SP']['db']['db_driver_path'] : $val['db_driver_path'];
					$val['driver'] = empty($val['driver']) ? $GLOBALS['G_SP']['db']['driver'] : $val['driver'];
					$val['weight'] = empty($val['weight']) ? 100 : $val['weight'];
				}
			}
			//赋值,读写配置,
            $this->db_w = $GLOBALS['G_SP']['db']['masterslave']['master'];
            $this->db_r = $GLOBALS['G_SP']['db']['masterslave']['slave'];
            $this->flags = true;
        }else{
            $this->_db =  spClass('db_' . $GLOBALS['G_SP']['db']['driver'], array(0 => $GLOBALS['G_SP']['db']), $GLOBALS['G_SP']['sp_drivers_path'] . '/' . 'db_' . $GLOBALS['db']['driver'] . '.php');
            $this->flags = false;
        }


    }

    public function find($conditions = null, $sort = null, $fields = null) {
        $this->_db = $this->getDb('R');
        return parent::find($conditions, $sort, $fields);
    }

    public function findAll($conditions = null, $sort = null, $fields = null, $limit = null) {
        $this->_db = $this->getDb('R');
        return parent::findAll($conditions, $sort, $fields, $limit);
    }

    public function findBy($field, $value) {
        $this->_db = $this->getDb('R');
        return parent::findBy($field, $value);
    }

    public function findSql($sql) {
        $this->_db = $this->getDb('R');
        return parent::findSql($sql);
    }

    public function findCount($conditions = null) {
        $this->_db = $this->getDb('R');
        return parent::findCount($conditions);
    }

    public function create($row) {
        $this->_db = $this->getDb('W');
        return parent::create($row);
    }

    public function createAll($rows) {
        $this->_db = $this->getDb('W');
        return parent::createAll($row);
    }

    public function delete($conditions) {
        $this->_db = $this->getDb('W');
        return parent::delete($conditions);
    }

    public function updateField($conditions, $field, $value) {
        $this->_db = $this->getDb('W');
        return parent::updateField($conditions, $field, $value);
    }

    public function runSql($sql) {
        $this->_db = $this->getDb('W');
        return parent::runSql($sql);
    }

    public function affectedRows() {
        $this->_db = $this->getDb('W');
        return parent::affectedRows();
    }

    public function update($conditions, $row) {
        $this->_db = $this->getDb('W');
        return parent::update($conditions, $row);
    }

    public function replace($conditions, $row) {
        $this->_db = $this->getDb('W');
        return parent::replace($conditions, $row);
    }

    public function incrField($conditions, $field, $optval = 1) {
        $this->_db = $this->getDb('W');
        return parent::incrField($conditions, $field, $optval);
    }

    public function decrField($conditions, $field, $optval = 1) {
        $this->_db = $this->getDb('W');
        return parent::decrField($conditions, $field, $optval);
    }

    public function deleteByPk($pk) {
        $this->_db = $this->getDb('W');
        return parent::deleteByPk($pk);
    }
	
	public function getVersion(){
		$this->_db = $this->getDb('W');
		return parent::getVersion();
	}

    /**
     * 得到一个读或写配置 
     */
    private function getDb($opt) {
        $_curr = null;
        if($this->flags){
            if($opt == 'R'){
                $_curr = $this->getWeigth2Db($this->db_r) ;//$this->db_r[0];
            }else if($opt == 'W'){
                $_curr = $this->getWeigth2Db($this->db_w);//$this->db_w[0];
            }

            $this->RW = $opt;
            $db = spClass('db_' . $_curr['driver'], array(0 => $_curr), $GLOBALS['G_SP']['sp_drivers_path'] . '/' . 'db_' . $_curr['driver'] . '.php');
			if(!empty($GLOBALS['G_SP']['db']['sqlmode'])) $db->exec("SET SQL_MODE = '{$GLOBALS['G_SP']['db']['sqlmode']}'");// 设置SQL_MODEL /来自spModel的构造方法
			return $db;
        }else{
            return $this->_db;
        }
    }

	//计算权重
    private function getWeigth2Db($data) {
		$weight = 0;
		$_tmp   = array();
		$flag	=0;
		
		foreach($data as $key){
			$_tmp[$flag] = array($weight+1 , $weight+$key['weight']);
			$weight += $key['weight'];
			$flag++;
		}
		$r=rand(1 , $weight);
		foreach($_tmp as $k=>$v){
			if($r > $v[0] && $r <= $v[1]){
				return $data[$k];
			}
		}
		return $data[0];
    }

    //记录执行sql日志
    public function rewiteLog($sql){
        if('debug' == $GLOBALS['G_SP']['mode']){
        	$logpath = SP_PATH.'/dblog.log';
	     //   file_put_contents($logpath,var_export($this->_db->arrSql,true)."\n",FILE_APPEND);
        }
    }

    function __destruct()
    {
        $this->rewiteLog('');
    }
}

?>
