<?php
header("content-type:text/html;chartset=utf-8");
include 'config.php';
include 'database.php';

class menu
{
    //获取大类
	function getSons($cateorys,$catid=0)
	{
        $sons=array();
        foreach ($cateorys as $category) {
        	if($category['pid']==$catid)
        	{
                $sons[]=$category;
        	}
        }
        return $sons;
	}
    //获取子类
	function getSubs($categorys,$catid=0,$level=1)
	{
		$subs=array();
		foreach ($categorys as $category) {
			if($category['pid']==$catid)
			{
               $category['level']=$level;
               $subs[]=$category;
               $subs=array_merge($subs,$this->getSubs($categorys,$category['id'],$level+1));
			}
		}
		return $subs;
	}

	function breadCrumb($categorys,$catid)
	{
        $navs=array();
        foreach ($categorys as $category) {
        	if($category['id']==$catid)
        	{
               if($category['pid']>0)
                {
                  $navs=array_merge($navs,$this->breadCrumb($categorys,$category['pid']));
                }
                $navs[]=$category;
                break;
        	}
        }
        return $navs;
	}
}

$db_config=$config['db'];
$db_obj=new database($db_config);
$sql="select * from menu";
$categorys=$db_obj->select($sql);
$menu_obj=new menu();
/*
$result=$menu_obj->getSubs($categorys,0);

foreach($result as $item)
 {
 echo str_repeat('&nbsp;&nbsp;',$item['level']).$item['name'].'<br>';  echo '<hr>';
 } 
 */
 $result=$menu_obj->breadCrumb($categorys,7);  
 foreach($result as $item)
 {
 	echo $item['name'].' >> ';  echo ''; 
 }
?>
