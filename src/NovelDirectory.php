<?php

class NovelDirectory{
                
	  public function getDirectory($url)
	  {

	      $ch=curl_init();
	
	      curl_setopt($ch,CURLOPT_URL,$url);
	      
	      curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);

	      curl_setopt($ch,CURLOPT_HEADER,0);
	
	      $output=curl_exec($ch);

	      curl_close($ch);
	      return $output;
	  }
}

$obj=new NovelDirectory();
$url="http://www.16kxsw.com/16k/11/11312/";
$directoryHtml=$obj->getDirectory($url);

$directoryText=array();
$matchRegD="/<dd><a href=\"(.*)\" title=\"(.*)\">(.*)<\/a><\/dd>/";
$directoryList=array();
if(preg_match_all($matchRegD,$directoryHtml,$matches))
{

	for($j=0;$j<count($matches[2]);$j++)
	{
	   $ahref=$matches[1][$j];
	   $atext=$matches[2][$j];
	   //转码字符串为utf-8，gbk输出为null
	   $atext=iconv('gbk','utf-8',$atext);
       $list=array('link'=>$ahref,'atext'=>$atext);
       $directoryList[]=$list;
       unset($list);
	}
}
else
{
   echo "000";
}
//反转数组，最新章节排在最近前面
$directoryList=array_reverse($directoryList);
echo json_encode($directoryList);
