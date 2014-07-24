<?php
/**
 * 获取无限分类
 * 
 */
 header('Content-type: text/html; charset=utf-8');
class db_sort extends spModel 
{
	var $pk = "id"; //主键  
	var $table = "sort"; // 数据表的名称 
	public $array_id = array(); 
	/**
	 * 查询出有子类的分类ID
	 * return array()
	 */
	function get_ids()
	{
		$this->findAll('`fid`!=0');
		$array_id = array();
		foreach ($ids as $rowid)
		{
			$array_id[] = $rowid['fid'];
		}
		array_unique($array_id); 
		$this->array_id = $array_id;
		unset($array_id);
	}
	function get_f_sort()
	{
		$sort = $this->findAll("`fid`='0'",'`order`');
		return $sort;
	}
	function get_s_sort($fid,$a='')
	{
			$s_channel = $this->findAll("`fid`='$fid'");
			foreach ($s_channel as $ss_channel)
			{
				$content = 
		<<<EOF
					 <a href="index.php?c=show&a=$a&sid=$ss_channel[id]">{$ss_channel['typename']}</a>
EOF;
				echo $content;
			}
	}
	function get_sp_sort($sort_id,$current_id)
	{
			$s_channel = $this->findAll("`fid`=$sort_id");
			foreach ($s_channel as $key => $ss_channel)
			{
				if($ss_channel['id']==$current_id) echo '<li  class="current"><a href="index.php?c=show&a=index&sid='.$ss_channel['fid'].'&cid='.$ss_channel['id'].'">'.$ss_channel['typename'].'</a></li>';
				else {
					$content = 
		<<<EOF
					 <li><a href="index.php?c=show&a=index&sid=$ss_channel[fid]&cid={$ss_channel['id']}">{$ss_channel['typename']}</a></li>
EOF;
				echo $content;
				}
			}
	}
	
	function get_jj_sort($sort_id,$fid)
	{	
		$s_channel = $this->findAll("`fid`='$fid'");
			foreach ($s_channel as $key => $ss)
			{
				if($ss['id']==$sort_id) echo '<li  class="current"><a href="index.php?c=show&a=index&sid='.$ss['id'].'">'.$ss['typename'].'</a></li>';
				else echo  '<li><a href="index.php?c=show&a=jujiao&sid='.$ss['fid'].'&nid='.$ss['id'].'">'.$ss['typename'].'</a></li>';

			}
	}
/**
 * 获取分类选项(下拉菜单)
 *
 * @param 默认选中项 $default
 * @param 父类 $fid
 * @param n级分类 $n
 */
	function get_sort($default=0,$fid=0,$n=0) //2 1 1
	{
		//$a_sort = $this->db->row_query("select `id`,`title` from `$this->table` where `fid`='$fid' order by `order`");
		$a_sort = $this->findAll("`fid`='$fid'",'`order`');
		$k = '';
		$content = '';
		foreach ($a_sort as $b_sort)
		{
			if ($default==$b_sort['id'])  $content.='<option value="'.$b_sort['id'].'" selected="selected">'.$k.$b_sort['typename'].'</option>';
			else $content.= '<option value="'.$b_sort['id'].'">'.$k.$b_sort['typename'].'</option>';
			$s_sort = $this->findAll("`fid`='$b_sort[id]'",'`order`');
			foreach ($s_sort as $m)
			{
				if ($default==$m['id']) $content.='<option value="'.$m['id'].'" selected="selected">--'.$m['typename'].'</option>';
				else $content.='<option value="'.$m['id'].'" >--'.$m['typename'].'</option>';
				$ss_sort = $this->findAll("`fid`='$m[id]'",'`order`');
				foreach($ss_sort as $ss)
				{
					if ($default==$ss['id']) $content.='<option value="'.$ss['id'].'" selected="selected">----'.$ss['typename'].'</option>';
					else $content.='<option value="'.$ss['id'].'" >----'.$ss['typename'].'</option>';
				}
			}
		}
		return $content;
	}
	function get_son_channel($fid)
	{
			$s_channel = $this->findAll("`fid`='$fid'");
			foreach ($s_channel as $ss_channel)
			{
				$san_id=$ss_channel['id'];
				$s_san = $this->findAll("`fid`='$san_id'");
				echo 
				'<tr>
				<td class="order" style="padding-left:20px;">
					<input type="text" name="order'.$ss_channel['id'].'" value="'.$ss_channel['order'].'" style="border:0px;" class="order" />
				</td>
				<td style="padding-left:30px;">
					┕&nbsp;&nbsp;<a href="javascript:void(0)" fid="'.$ss_channel['id'].'" class="ud" title="点击修改">'.$ss_channel['typename'].'</a>

				</td>
				
				<td align="center">
					
					<a href="index.php?c=admin&a=sort&mod=del&id='.$ss_channel['id'].'" class="del" onclick="return confirm(\'您确定要删除这个栏目么？\');">删除</a>
				</td>
				</tr>';
			
			
			foreach ($s_san as $san_channel)
			{
				$s_san = $this->findAll("`fid`='$ss_channel[id]'");
				echo 
				'<tr>
				<td class="order" style="padding-left:50px;">
					<input type="text" name="order'.$san_channel['id'].'" value="'.$san_channel['order'].'" style="border:0px;" class="order" />
				</td>
				<td style="padding-left:60px;">
					┕-&nbsp;&nbsp;<a href="javascript:void(0)" fid="'.$san_channel['id'].'" class="ud" title="点击修改">'.$san_channel['typename'].'</a>

				</td>
				
				<td align="center">
					
					<a href="index.php?c=admin&a=sort&mod=del&id='.$san_channel['id'].'" class="del" onclick="return confirm(\'您确定要删除这个栏目么？\');">删除</a>
				</td>
				</tr>';
			}
			echo 
				'
				<tr>
					<td></td>
					<td style="padding-left:60px;"><a href="index.php?c=admin&a=sort&mod=add&fid=$ss_channel[id]" onclick="return false" style="color:#CC6600;" class="son" fid="'.$ss_channel[id].'">┕&nbsp;&nbsp;添加三级子分类</a></td>
					<td></td>
				</tr>
				';
		}
	}
	function get_username($uid)
	{
		$user = $this->findSql("select username from th_member where `uid`=$uid");	
		echo $user[0]['username'];
	}
}
?>