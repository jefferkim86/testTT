<?php

/////////////////////////////////////////////////////////////////
//云边开源轻博, Copyright (C)   2010 - 2011  qing.thinksaas.cn 
//EMAIL:nxfte@qq.com QQ:234027573                              
//$Id: admin.php 1334 2012-08-06 14:25:25Z anythink $ 


class admin extends top
{

    function __construct() {
        parent::__construct();
        $this->get = $this->spArgs();
        if($_SESSION['admin'] != 1){
            prient_jump(spUrl('main'));
        }
    }

    function index() {
        $os = explode(" ", php_uname());
        $this->server = $_SERVER;
        $this->os = php_uname();
        $this->postupload = ini_get('post_max_size');
        $this->maxupload = ini_get('upload_max_filesize');
        $this->version = phpversion();
        $this->mysql = spClass('db_blog')->showVersion();
        $this->ybsoftencode = base64_encode($GLOBALS['YB']['version']);


        if(!function_exists("gd_info")){
            $this->gd = '不支持,无法处理图像';
        }
        if(function_exists(gd_info)){
            $gd = @gd_info();
            $this->gd = $gd["GD Version"];
            $gd ? '&nbsp; 版本：' . $gd : '';
        }
        $this->curr_index = ' id="current"';
        /*         * new add* */
        $this->curr_aindex = ' id="acurrent"';
        $this->curr_indexdisplay = ' id="indexdisplay"';

        $this->display('admin/index.html');
    }

    /*     * new add* */

    function updata() {
        $os = explode(" ", php_uname());
        $this->ybsoft = $GLOBALS['YB'];
        $this->server = $_SERVER;
        $this->os = php_uname();
        $this->postupload = ini_get('post_max_size');
        $this->maxupload = ini_get('upload_max_filesize');
        $this->version = phpversion();
        $this->mysql = spClass('db_blog')->showVersion();
        $this->ybsoftencode = base64_encode($GLOBALS['YB']['version']);


        if(!function_exists("gd_info")){
            $this->gd = '不支持,无法处理图像';
        }
        if(function_exists(gd_info)){
            $gd = @gd_info();
            $this->gd = $gd["GD Version"];
            $gd ? '&nbsp; 版本：' . $gd : '';
        }

        $this->curr_index = ' id="current"';
        $this->curr_updata = ' id="acurrent"';
        $this->curr_indexdisplay = ' id="indexdisplay"';
        $this->display('admin/updata.html');
    }

    function system() {

        if($this->spArgs('submit')){
            spClass('db_setting')->saveConfig($this->spArgs('val'));

            $this->jump(spUrl('admin', 'system', array('ac' => 'ok')));
        }

        if($this->spArgs('testSendMail')){
            spClass('db_notice')->sendMailTest();
            exit('<hr/>请确保您打开了邮件发送开关，测试邮件才会发送。开启邮件DEBUG模式会看到详细的发送过程。如果发送成功请关闭。');
        }


        $this->conf = spClass('db_setting')->getConfig();
        $this->curr_system = ' id="current"';
        $this->curr_systemdisplay = ' id="systemdisplay"';

        $this->display('admin/system.html');
    }

    function models() {
        $this->curr_system = ' id="current"';
        $this->curr_systemdisplay = ' id="systemdisplay"';

        if($this->spArgs('setup')){
            if($this->spArgs('submit')){
                $row = $this->spArgs();
                $row['config'] = htmlspecialchars($row['config']);
                spClass('db_models')->update(array('id' => $this->spArgs('setup')), $row);
                spClass('db_cache')->delete();
                $this->jump(spUrl('admin', 'models', array('ac' => 'ok')));
            }
            $this->minfo = spClass('db_models')->find(array('id' => $this->spArgs('setup')));
            $this->display('admin/models_info.html');
            exit;
        }
        $this->models = spClass('db_models')->findAll();
        $this->curr_models = 'id="acurrent"';
        $this->display('admin/models.html');
    }

    function blog() {

        if($this->spArgs('submit')){
            $title = $this->spArgs('title');

            $niname = $this->spArgs('niname');
            $where = "title like '%$title%'";
            if($niname){
                $where .= " and uid = '$niname'";
            }
        }
        $this->blog = spClass('db_blog')->spLinker()->spPager($this->spArgs('page', 1), 20)->findAll($where, 'bid desc');
        if($this->spArgs('submit')){
            $this->pager = spClass('db_blog')->spPager()->pagerHtml('admin', 'blog', array('title' => $title, 'niname' => $niname, 'submit' => $this->spArgs('submit')));
        }else{
            $this->pager = spClass('db_blog')->spPager()->pagerHtml('admin', 'blog');
        }

        $this->curr_ablog = ' id="acurrent"';
        $this->curr_blogdisplay = ' id="blogdisplay"';
        $this->curr_blog = ' id="current"';
        $this->display('admin/blog.html');
    }

    function blogverify() {
		if($this->spArgs('verify')){
			$bid = (int) $this->spArgs('verify');
			spClass('db_blog')->update(array('bid'=>$bid) ,array('open'=>1));
			$this->success('审核通过');
		}
		$where = 'open = -2';
        $this->blog = spClass('db_blog')->spLinker()->spPager($this->spArgs('page', 1), 20)->findAll($where, 'bid desc');
        $this->pager = spClass('db_blog')->spPager()->pagerHtml('admin', 'blogverify');

        $this->curr_ablogverify = ' id="acurrent"';
        $this->curr_blogdisplay = ' id="blogdisplay"';
        $this->curr_blog = ' id="current"';
        $this->display('admin/blog_verify.html');
    }
	
    function user() {
        if($this->spArgs('mod') == 'info'){
			
			if($this->spArgs('delface')){
				$uid = $this->spArgs('delface');
				$path1 = APP_PATH.'/avatar/'.$this->get_avatar($uid,'big');
				$path2 = APP_PATH.'/avatar/'.$this->get_avatar($uid);
				$path3 = APP_PATH.'/avatar/'.$this->get_avatar($uid,'small');
				@unlink($path1); @unlink($path2); @unlink($path2);
				$this->jump(spUrl('admin', 'user', array('mod'=>'info','uid'=>$uid,'ac' => 'ok')));
			}
		
            $this->info = spClass('db_member')->find(array('uid' => $this->spArgs('uid')));
            $this->display('admin/user_info.html');
            exit;
        }

        if($this->spArgs('lockuser')){
            spClass('db_blog')->lockUser($this->spArgs('lockuser'));
        }
        if($this->spArgs('resetpwd')){
			if($this->spArgs('pwd') != 'null'){
				if(spClass('db_blog')->resetPwd($this->spArgs('resetpwd'), $this->spArgs('pwd'))){
					exit('修改完成,重新登录后生效');
				}
			}else{
				exit('新密码不能为空');
			}
        }
		
		
        if($this->spArgs('where')){
            $name = $this->spArgs('where');
            $where = " uid = '$name' or email = '$name' or domain  = '$name' or username like '%$name%'";
        }else{
            $where = '';
        }


        $this->user = spClass('db_member')->spLinker()->spPager($this->spArgs('page', 1), 20)->findAll($where, 'uid desc');
        $this->pager = spClass('db_member')->spPager()->pagerHtml('admin', 'user');
        $this->countuser = spClass('db_member')->findCount();
        $this->curr_user = ' id="current"';
        $this->curr_noticedisplay = ' id="blogdisplay"';
        $this->display('admin/user.html');
    }
	
	private function get_avatar($uid, $size = 'middle', $type = '') {
		$size = in_array($size, array('big', 'middle', 'small')) ? $size : 'middle';
		$uida = abs(intval($uid));
		$uid = sprintf("%09d", $uid);
		$dir1 = substr($uid, 0, 3);
		$dir2 = substr($uid, 3, 2);
		$dir3 = substr($uid, 5, 2);
		$typeadd = $type == 'real' ? '_real' : '';
		return $dir1.'/'.$dir2.'/'.$dir3.'/'.$typeadd.$size.'_'.substr($uid, -2).".jpg";
	}

    function notice() {
        if($this->spArgs('addnotice')){
            if($this->spArgs('title') == '' || $this->spArgs('info') == ''){
                $this->jump(spUrl('admin', 'notice', array('ac' => 'err')));
            }
            $all = spCLass('db_member')->findAll('', '', 'uid');
            $where = '';
            $title = $this->spArgs('title');
            $info = $this->spArgs('info');
            $time = time();
            $sql = "INSERT INTO `" . DBPRE . "notice` (`uid` ,`sys` ,`foruid` ,`title` ,`info` ,`isread` ,`location` ,`time`)VALUES ";
            foreach($all as $d){
                $where .= "('0', '2', '{$d['uid']}', '$title', '$info', '0', '', '$time'),";
            }
            $where = $sql . substr($where, 0, -1);
            $res = spClass('db_notice')->runSql($where);
            if($res){
                $this->success('全站用户发送完毕', spUrl('admin', 'notice'));
            }else{
                $this->success('操作失败', spUrl('admin', 'notice'));
            }
        }

        if($this->spArgs('del')){
            if($this->spArgs('delid')){
                foreach($this->spArgs('delid') as $k => $d){
                    spClass('db_notice')->deleteByPk($k);
                }
                $this->success('删除成功', spUrl('admin', 'notice'));
            }else{
                $this->success('操作失败', spUrl('admin', 'notice'));
            }
        }

        if($this->spArgs('clear')){
            spClass('db_notice')->delete(array('sys' => $this->spArgs('clear')));
            $this->success('删除成功', spUrl('admin', 'notice'));
        }

        $this->notice = spClass('db_notice')->spLinker()->spPager($this->spArgs('page', 1), 50)->findAll('', 'id desc');
        $this->pager = spClass('db_notice')->spPager()->pagerHtml('admin', 'notice');
        $this->curr_anotice = ' id="acurrent"';
        $this->curr_noticedisplay = ' id="blogdisplay"';
        $this->curr_user = ' id="current"';
        $this->display('admin/notice.html');
    }

    function systag() {

        if($this->spArgs('syscate')){
            spClass('db_category')->saveCate($this->spArgs());
            $this->jump(spUrl('admin', 'systag', array('ac' => 'ok')));
        }
        if($this->spArgs('sysadd')){
            if($this->spArgs('sort') == '' || $this->spArgs('cname') == ''){
                $this->jump(spUrl('admin', 'systag', array('ac' => 'err')));
            }
            spClass('db_category')->create(array('sort' => $this->spArgs('sort'), 'catename' => $this->spArgs('cname')));
            $this->jump(spUrl('admin', 'systag', array('ac' => 'ok')));
        }

        if($this->spArgs('sysdel')){
            spClass('db_category')->deleteByPk($this->spArgs('sysdel'));
            exit;
        }


        $this->systag = spClass('db_category')->spPager($this->spArgs('page', 1), 10)->findAll($where, 'sort  asc'); //系统tag
        $this->systagpager = spClass('db_category')->spPager()->pagerHtml('admin', 'systag');

        $this->curr_blogdisplay = ' id="blogdisplay"';
        $this->curr_systag = ' id="acurrent"';

        $this->curr_blog = ' id="current"';
        $this->display('admin/systag.html');
    }

    function usertag() {
		if($this->spArgs('rebuilt')){
            spClass('db_tag_system')->Recombination();
			$this->jump(spUrl('admin', 'usertag', array('ac' => 'ok')));
        }
		
        if($this->spArgs('usercate')){
            spClass('db_tags')->saveCate($this->spArgs());
            $this->jump(spUrl('admin', 'usertag', array('ac' => 'ok')));
        }

        if($this->spArgs('userdel')){
            spClass('db_tags')->deleteByPk($this->spArgs('userdel'));
            exit;
        }
		if($this->spArgs('clean')){
			spClass('db_tags')->cleantag();
			  $this->jump(spUrl('admin', 'usertag', array('ac' => 'ok')));
		}
        $obj = spClass('db_tags');
        $obj->linker[1] = false;
        $this->usrtag = $obj->spLinker()->spPager($this->spArgs('page', 1), 20)->findAll($where, 'tid  desc'); //系统tag

        $this->usrtagpage = $obj->spPager()->pagerHtml('admin', 'usertag');



        $this->curr_blogdisplay = ' id="blogdisplay"';
        $this->curr_usertag = ' id="acurrent"';

        $this->curr_blog = ' id="current"';
        $this->display('admin/usertag.html');
    }

    /* 推荐管理 */

    function recommend() {
        if($this->spArgs('submit')){
            if(is_array($this->spArgs('delall')) || is_array($this->spArgs('opened'))){
                //如果要删除
                if(is_array($this->spArgs('delall'))){
                    foreach($this->spArgs('delall') as $d){
                        spClass('db_recommend')->delete(array('id' => $d));
                    }
                }
                //如果要通过
                if(is_array($this->spArgs('opened'))){
                    foreach($this->spArgs('opened') as $d){
                        spClass('db_recommend')->update(array('id' => $d), array('open' => 1));
                    }
                }
                $this->success('操作成功', spUrl('admin', 'recommend'));
            }else{
                $this->error('没有需要审核通过或者删除的推荐');
            }
            exit;
        }


        if($this->spArgs('recommendadd')){
            $return = spClass('db_recommend')->createRecommend($this->spArgs());
            if($return == -1){
                $this->error('不存在的日志');
            }
            if($return == -2){
                $this->error('已经存在的日志');
            }
            $this->success('添加成功', spUrl('admin', 'recommend'));
        }
        if($this->spArgs('recommenduser')){
            $return = spClass('db_recommend')->createRecommend($this->spArgs());
            if($return == -3){
                $this->error('不存在的用户');
            }
            if($return == -4){
                $this->error('已经在列表中');
            }
            $this->success('添加成功', spUrl('admin', 'recommend'));
        }

        $where = '';
        if($this->spArgs('filter') == 'user'){
            $where = 'tuiuid != 0';
        }
        if($this->spArgs('filter') == 'blog'){
            $where = 'tuiuid = 0';
        }
        if($this->spArgs('order') == 'open'){
            $where .= ' and open = 1';
        }
        if($this->spArgs('order') == 'close'){
            $where .= ' and open = 0';
        }
        $this->recommend = spClass('db_recommend')->spLinker()->spPager($this->spArgs('page', 1), 10)->findAll($where, 'time desc');
        if($this->spArgs('filter')){
            $this->pager = spClass('db_recommend')->spPager()->pagerHtml('admin', 'recommend', array('filter' => $this->spArgs('filter'), 'order' => $this->spArgs('order')));
        }else{
            $this->pager = spClass('db_recommend')->spPager()->pagerHtml('admin', 'recommend');
        }

        /*         * new add* */
        $this->curr_blogdisplay = ' id="blogdisplay"';
        $this->curr_recommend = ' id="acurrent"';

        $this->curr_blog = ' id="current"';

        $this->filter = $this->spArgs('filter');
        $this->order = $this->spArgs('order');
        $this->scate = spClass('db_category')->findAll('', 'sort desc');
        $this->display('admin/recommend.html');
    }

    function theme() {
        if($this->spArgs('m') == 'info'){
            if($this->spArgs('submit')){
                spClass('db_skins')->update(array('id' => $this->spArgs('id')), $this->spArgs());
                $this->success('保存成功', spUrl('admin', 'theme'));
            }
            $this->skin = spClass('db_skins')->find(array('id' => $this->spArgs('id')));
            $this->display('admin/theme_info.html');
            exit;
        }

        if($this->spArgs('m') == 'install'){
            $file = $_FILES['themefile'];
            if($file['error'] == 4){
                $this->error('请选择需要安装的主题文件');
            }

            if(!strpos($file['name'], 'zip')){
                $this->error('您只能上传ZIP主题文件包');
            }


            import('ybZip.php');
            $zip = new ybZip($file['tmp_name']);
            $tmpdir = APP_PATH . '/' . $GLOBALS['G_SP']['view']['config']['template_dir'] . '/theme/';


            if(!$zip->extract(PCLZIP_OPT_PATH, $tmpdir . '__temp')){
                $this->error('无法释放压缩文件,请检查您目录的写权限');
            }

            if(!file_exists($tmpdir . '__temp/theme.php') || !require_once $tmpdir . '__temp/theme.php'){
                $this->error('无法读取主题配置信息,可能该主题已损坏');
            }

            //读取文件信息 $theme_info 变量被引入
            if(is_dir($tmpdir . $theme_info['skindir'])){
                if($theme_info['skindir'] != '')
                    __deldirs($tmpdir . $theme_info['skindir']);
            }
            //检查支持的版本情况
            $ver = explode(' ', $GLOBALS['YB']['version']);

            if($theme_info['support'] < $ver[0]){
                $no_support = '您的系统版本:' . $ver[0] . '\n\n主题支持版本：' . $theme_info['support'] . '\n\n由于主题版本支持过低,使用该主题时可能会出现问题,如出现问题请立即停止使用该主题';
            }

            if(!rename($tmpdir . '__temp', $tmpdir . $theme_info['skindir'])){
                $this->error('无法重命目录名,请检查系统权限');
            }

            $result = spClass('db_skins')->find(array('skindir' => $theme_info['skindir']));
            if(is_array($result)){
                $this->error('该目录已被安装,重新安装请先卸载');
            }else{

                $where = array(
                    'skindir' => $theme_info['skindir'],
                    'name' => $theme_info['name'],
                    'version' => $theme_info['version'],
                    'uri' => $theme_info['uri'],
                    'author' => $theme_info['author'],
                    'open' => 0,
                    'usenumber' => 0,
                );
                if(isset($setup_info)){
                    $where = array_merge($where, array('setup' => serialize($setup_info))); //钩子
                }

                spClass('db_skins')->create($where);
                __deldirs($tmpdir . '__temp');
                $this->error('主题已经安装，您可以立即启用它\n\n' . $no_support);
            }
        }
        if($this->spArgs('m') == 'uninstall'){
            $rs = spClass('db_skins')->find(array('id' => $this->spArgs('id')));
            spClass('db_skins')->delete(array('id' => $this->spArgs('id')));
			spClass('db_theme')->delete(array('theme'=>$rs['skindir'])); //将用户设置的删掉
            if($rs['skindir']){
                $dir = APP_PATH . '/' . $GLOBALS['G_SP']['view']['config']['template_dir'] . '/theme/' . $rs['skindir'];
                __deldirs($dir);
            }


            $this->error('该主题已经被卸载,重新安装请上传主题包');
        }




        if($this->spArgs('filter')){
            if($this->spArgs('filter') == 'close'){
                $where = array('open' => 0);
                $page = array('filter' => 'close');
				$this->curr_no = ' class="current"';
            }
            if($this->spArgs('filter') == 'open'){
                $where = "exclusive = 0 and open = 1";
                $page = array('filter' => 'open');
				$this->curr_open = ' class="current"';
            }
            if($this->spArgs('filter') == 'exclusive'){
                $where = "exclusive != 0";
                $page = array('filter' => 'exclusive');
				$this->curr_exclu = ' class="current"';
            }
        }else{
            $where = '';
			$this->curr_all = ' class="current"';
        }

        $this->skins = spClass('db_skins')->spPager($this->spArgs('page', 1), 3)->findAll($where, 'id desc');
        if($page){
            $this->pager = spClass('db_skins')->spPager()->pagerHtml('admin', 'theme', $page);
        }else{
            $this->pager = spClass('db_skins')->spPager()->pagerHtml('admin', 'theme');
        }

        $this->curr_theme = ' id="current"';

        $this->themedir = $GLOBALS['G_SP']['view']['config']['template_dir'];
        $this->display('admin/theme.html');
    }

    /* 自动升级系统 */

    function autoupdate() {
        $this->display('admin/autoupdate.html');
    }

    function database() {
        //初始化数据库处理
        $db = spClass('dbbackup', array(0 => $GLOBALS['G_SP']['db']));
        $this->table = $db->showAllTable($this->spArgs('chk'));
        if($this->spArgs('dbac') == 'op'){
            $db->optimizeTable($this->spArgs('tabl'));
            exit;
        }
        if($this->spArgs('dbac') == 'rep'){
            $db->repairTable($this->spArgs('tabl'));
            exit;
        }
        if($this->spArgs('outab')){
            $db->outTable($this->spArgs('outab'));
            exit;
        }
        if($this->spArgs('ouall')){
            $db->outAllData();
            exit;
        }



        $this->curr_database = ' id="current"';
        $this->display('admin/database.html');
    }

    function clearcache() {
        spClass('db_cache')->delete();
        $this->success('已经清除所有缓存');
    }

    /**
     * @author 霸气千秋
     * @todo 自定义页面操作
     */
    public function cpage() {
        $db_cpage_cate = spClass("db_cpage_cate");

        $this->curr_system = ' id="current"';
        $this->curr_systemdisplay = ' id="systemdisplay"';
        $this->curr_cpage = 'id="acurrent"';

        /**
         * 删除 
         */
        if($id = $this->spArgs('del')){
            if(true == $db_cpage_cate->deleteCate((int) $id))
                $this->success('删除成功');
            else
                $this->error('删除失败');
            return;
        }

        /**
         * 添加分类
         */
        if($this->spArgs('addCategory')){
            if(true == $db_cpage_cate->addCate($this->spArgs()))
                $this->success('添加分类成功');
            else
                $this->error('添加失败');
            return;
        }

        /**
         * 编辑分类 
         */
        if($id = $this->spArgs('editCategory')){
            if($this->spArgs('post')){

                if(true == $db_cpage_cate->editCate($this->spArgs(), array('id' => (int) $id)))
                    $this->success('修改成功', spUrl('admin', 'cpage'));
                else
                    $this->error('修改失败');
                return;
            }
            $this->ass = $db_cpage_cate->find(array('id' => $id));
            $this->display('admin/cpage_edit_category.html');
            return;
        }

        /*
         * 添加body
         */
        if($id = $this->spArgs('addBody')){
            $db_cpage_body = spClass('db_cpage_body');
            if('yes' == $this->spArgs('isSubmit')){//判断是否为表单提交
                $content = strreplaces($this->spArgs('content'));
                $row = array(
                    'cid' => (int) $id,
                    'body' => strreplaces($content),
                );
                if(true == $db_cpage_body->addBody($row))
                    $this->success('添加/修改成功', spUrl('admin', 'cpage'));
                // $this->jump ($url)
                else
                    $this->error('添加失败');
                return;
            }
            $this->ass = $db_cpage_cate->findAll(null, null, 'title,id');
            $cid = is_numeric($id) ? (int) $id : $this->ass[0]['id']; //不对,如果,这个
            $this->body = $db_cpage_body->find(array('cid' => $cid));
            $this->display('admin/cpage_add_body.html');
            return;
        }

        $this->cpage_cate = $db_cpage_cate->spPager($this->spArgs('page', 1), 10)->findAll(null, 'orders asc');
        $this->cpage_pager = $db_cpage_cate->spPager()->pagerHtml('admin', 'cpage');
        $this->display('admin/cpage.html');
    }

    /**
     * @author 霸气千秋
     * @todo 广告位置管理 
     */
    public function adUnit() {
        $db_ad_unit = spClass('db_ad_unit');
        $this->curr_adUnit = ' id="current"';
        $this->curr_addisplay = ' id="addisplay"';
        $this->curr_aadUnit = 'id="acurrent"';

        //改变广告位是否显示
        if($this->spArgs('flag')){
			$this->ClearSpAccess();
		   if(true == $db_ad_unit->changeShow(array('is_show' => (int) $this->spArgs('en_show')), array('id' => (int) $this->spArgs('id')))){
                $this->success('修改成功');
            }else{
                $this->error('修改失败');
            }
            return;
        }

        //添加
        if($this->spArgs('add')){
            $row = array(
                'title' => strreplaces($this->spArgs('title')),
                'adesc' => strreplaces($this->spArgs('adesc')),
                'img' => strreplaces($this->spArgs('img')),
                'orders' => strreplaces($this->spArgs('orders')),
                'is_show' => strreplaces($this->spArgs('is_show')),
            );
            if($db_ad_unit->addUnit($row)){
                $this->ClearSpAccess();
                $this->success('添加成功');
            }else{
                $this->error('添加失败');
            }
            return;
        }

        if($id = $this->spArgs('edit')){
            //修改操作
            if($_id = $this->spArgs('id')){
                //组织参数
                $row = array(
                    'title' => strreplaces($this->spArgs('title')),
                    'adesc' => strreplaces($this->spArgs('adesc')),
                    'img' => strreplaces($this->spArgs('img')),
                    'orders' => strreplaces($this->spArgs('orders')),
                    'is_show' => strreplaces($this->spArgs('is_show')),
                );
                //组织条件
                $condition = array('id' => (int) $_id);
                if(true == $db_ad_unit->editUnit($row, $condition)){
                    $this->ClearSpAccess();
                    $this->success('修改成功', spUrl('admin', 'adUnit'));
                }else{
                    $this->error('修改失败');
                }
                return;
            }
            $id = (int) $id;
            $this->rs = $db_ad_unit->find(array('id' => $id));
            $this->display('admin/ad_unit_edit.html');
            return;
        }

        if($this->spArgs('show')){
            $this->isshow = 1;
            $this->rs = $db_ad_unit->find(array('id' => $this->spArgs('show')));
            $this->display('admin/ad_unit_edit.html');
            return;
        }

        //删除
        if($id = $this->spArgs('del')){
            if($db_ad_unit->delUnit(array('id' => (int) $id))){
                $this->ClearSpAccess();
                $this->success('删除成功');
            }else{
                $this->error('删除失败');
            }
            return;
        }

        $this->dis = $db_ad_unit->find(null, 'id desc', 'id');
        $this->adUnit_list = $db_ad_unit->spPager($this->spArgs(page, 1), 10)->findAll(null, 'system desc,orders asc,id desc');
        $this->adUnit_pager = $db_ad_unit->spPager()->pagerHtml('admin', 'adUnit');
        $this->display('admin/ad_unit.html');
    }

    /**
     * @author 霸气千秋
     * @todo 广告内容管理     
     */
    public function adContent() {
        $db_ad_list = spClass('db_ad_list');
        $this->curr_adUnit = ' id="current"';
        $this->curr_addisplay = ' id="addisplay"';
        $this->curr_aadlist = 'id="acurrent"';
        $param = $this->spArgs();

        //改变广告是否显示
        if($this->spArgs('flag')){
			$this->ClearSpAccess();
            if(true == $db_ad_list->changeShow(array('is_show' => (int) $this->spArgs('en_show')), array('adid' => (int) $this->spArgs('id')))){
                $this->success('修改成功');
            }else{
                $this->error('修改失败');
            }
            return;
        }

        //删除
        if($id = $param['del']){
            if($db_ad_list->delList(array('adid' => (int) $id))){
                $this->ClearSpAccess();
                $this->success('删除成功');
            }else{
                $this->error('删除失败');
            }
            return;
        }


        //编辑和新增
        if($param['edit']){
            //提交编辑处理
            if($param['edit_submit']){
                $date = ($param['date'][0] == '' and $param['date'][1] == '') ? '' : $param['date'][0] . "|" . $param['date'][1];

                $row = array(
                    'title' => strreplaces($param['title']),
                    'auid' => strreplaces($param['auid']),
                    'type' => strreplaces($param['type']),
                    'ga' => strreplaces($param['ga']),
                    'time_date_limit' => $date,
                    'is_show' => strreplaces($param['is_show']),
                    'weight' => strreplaces($param['weight']),
                    'url' => strreplaces($param['url']),
                );

                $ret = $this->upLoadPic();
                if($ret['error']){
                    $this->error('上传失败:' . $ret['error']);
                }


                //如果是图片广告
                if($row['type'] == 1){
                    $row['body'] = strreplaces($param['body_img']);
                    if($ret['img'] != ''){
                        $row['body'] = $ret['img'];
                    }
                }
                if($row['type'] == 2){
                    $row['body'] = $param['body_html'];
                }

                //新增
                if($param['edit'] == 'add'){
                    if($row['title'] == '' || $row['body'] == '' || $row['weight'] == ''){
                        $this->error('标题,广告,权重不能为空', spUrl('admin', 'adContent'));
                    }
                    if($db_ad_list->addList($row)){
                        $this->success('创建成功', spUrl('admin', 'adContent'));
                    }else{
                        $this->error('创建失败', spUrl('admin', 'adContent'));
                    }
                }else{
                    $condition = array('adid' => (int) $param['edit']);
                    if($db_ad_list->editList($row, $condition)){
                        $this->ClearSpAccess();
                        $this->success('修改成功', spUrl('admin', 'adContent'));
                    }else{
                        $this->error('修改失败', spUrl('admin', 'adContent'));
                    }
                }
            }
            $this->adUnit = spClass('db_ad_unit')->findAll(); //获取广告位列表
            $condition = array('adid' => (int) $param['edit']);
            $_data = $db_ad_list->find($condition);
            //处理下时间
            $_data['time_date_limit'] = explode('|', $_data['time_date_limit']);
            $this->data = $_data;
            $this->display('admin/ad_list_edit.html');
            return;
        }

        $this->adUnit = spClass('db_ad_unit')->findAll();
        $data = $db_ad_list->spPager($this->spArgs(page, 1), 10)->findAll(null, 'adid desc');
        foreach($data as $key => &$val){
            //日期处理
            $time_date_limit = explode('|', $val['time_date_limit']);
            $val['time_date_limit'] = $time_date_limit[0] == null ? '无限制' : '[' . $time_date_limit[0] . '] 至 [' . $time_date_limit[1] . ']';

            //广告类型处理
            $_type = '';
            switch($val['type']){
                case 1:
                    $val['type'] = '图片广告';
                    break;
                case 2:
                    $val['type'] = 'html广告';
                    break;
                case 3:
                    $val['type'] = '右下角弹出广告';
                    break;
                case 4:
                    $val['type'] = '全屏广告';
                    break;
                default:
                    $val['type'] = '未知';
                    break;
            }

            //广告位置处理
            foreach($this->adUnit as $k => $v){
                if($v['id'] == $val['auid']){
                    $val['auid'] = $v['title'];
                }
            }
        }
        $this->adList_list = $data;
        $this->adList_pager = $db_ad_list->spPager()->pagerHtml('admin', 'adContent');
        $this->display('admin/ad_list.html');
    }

    private function ClearSpAccess() {
        $db_ad_unit = spClass('db_ad_unit');
        $ret = $db_ad_unit->findAll(null, null, 'id');
        foreach($ret as $k => $v){
            //清空所有类别的缓存
            spAccess('c', 'Ad_' . $v['id'], null);
			spAccess('c', 'adunit', null);
        }
    }

    //上传图片
    private function upLoadPic() {
        $file = $_FILES['filedata'];
        if($file['error'] == 4)
            return array('error' => '');
        if($file['error'] == 1)
            return array('error' => '上传的文件超过了 php.ini 中 upload_max_filesize 选项限制的值');
        if($file['error'] == 2)
            return array('error' => '传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值');
        if($file['error'] == 3)
            return array('error' => '文件只有部分被上传');
        if($file['error'] == 5)
            return array('error' => '上传文件大小为0');
        if($file['error'] == 6)
            return array('error' => '缺少临时文件夹');
        if($file['error'] == 7)
            return array('error' => '写文件失败');
        if($file['error'] == 8)
            return array('error' => '上传被其它扩展中断');
        if($file['size'] > 2097152)
            return array('error' => '请上传小于2M的文件');

        $ext = pathinfo($file['name']);
        $name = $ext['basename'];
        $fext = $ext['extension'];

        $support_ext = array('jpg', 'png', 'gif', 'jpeg');
        if(!in_array($fext, $support_ext)){
            return array('error' => '只能上传jpg,png,gif');
        }

        $addir = APP_PATH . '/attachs/ad/';
        $Relative_path = 'attachs/ad/';

        if(!is_dir($addir)){
            __mkdirs($addir);
        }


        if(move_uploaded_file($file['tmp_name'], $addir . $name)){
            return array('error' => '', 'img' => $Relative_path . $name);
        }else{
            return array('error' => '移动文件失败，请检查' . $addir . '目录权限');
        }
    }

	//添加banner管理模块和分类管理模块
	function sort()
	{	
		if (isset($_GET['do']) && $_GET['do']='add') 
		{
			$id = spClass('db_sort')->create($this->spArgs());
			echo $id;
			die;
		}
		if($this->spArgs('mod') == 'del')
		{
			$id = $this->spArgs('id');
			spClass('db_sort')->delete(array('id'=>$id));
			$this->success('删除成功',spUrl('admin','sort'));
		}
		if($this->spArgs('mod') == 'edit')
		{
			$id = $this->spArgs('id');
			spClass('db_sort')->update(array('id'=>$id),$this->spArgs());
			echo 1;
			die;
		}
		spClass('db_sort','th_sort')->get_ids();
		$this->sort = spClass('db_sort','th_sort')->get_f_sort();
		$this->son = spClass('db_sort','th_sort');
		$this->display('admin/sort.html');
	}
	function banner()
	{
		if ($this->spArgs('mod') == 'add') 
		{
			if (isset($_POST['create'])) 
			{
				$row['title'] = $_POST['title'];
				$row['href'] = $_POST['href'];
				$row['order'] = $_POST['order'];
				$row['fid'] = $_POST['fid'];
				$row['ggw'] = $_POST['ggw'];
				if (isset($_FILES['url'])) 
				{
					$image_name = strrchr($_FILES['url']['name'],'.');
					$name = uniqid().$image_name;
					$row['url'] = 'tpl/images/upload/'.$name;
					move_uploaded_file($_FILES['url']['tmp_name'],$row['url']);
				}
				spClass('db_banner')->add_banner($row);
				$this->success('添加成功','index.php?c=admin&a=banner');
			}
			
			$this->display('admin/add_banner.html');
			die;
		}
		if($this->spArgs('mod') == 'del')
		{
			$id = $this->spArgs('id');
			spClass('db_banner')->delete(array('id'=>$id));
			$this->success('删除成功',spUrl('admin','banner'));
		}
		$this->list = spClass('db_banner')->banner_list();
		$this->display('admin/banner.html');
	}	
}
