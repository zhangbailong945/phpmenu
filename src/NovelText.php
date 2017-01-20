<?php
class NovelText{

	  public function getText($url)
	  {
	  	$headers = array(
			    'User-Agent' => 'Mozilla/5.0 (Windows; U; Windows NT 5.1; zh-CN; rv:1.9) Gecko/2008052906 Firefox/3.0',
			    'Referer'    => 'http://www.163.com'
			);

	      $ch=curl_init();
	
	      curl_setopt($ch,CURLOPT_URL,$url);
	      
	      curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
          curl_setopt($ch, CURLOPT_TIMEOUT, "60");
	      //curl_setopt($ch,CURLOPT_HEADER,0);
	      //curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	      curl_setopt($ch,CURLOPT_HTTPHEADER, array('Expect:'));
	      $output=curl_exec($ch);

	      curl_close($ch);
	      return $output;
	  }
}

/*
$obj=new NovelText();
$url="http://www.16kxsw.com/16k/11/11312/5376991.html";
$texts=array();
$directoryHtml=$obj->getText($url);
print_r($directoryHtml);
*/
if(!empty($_POST['link'])&&$_POST['action']=='character')
{
    $obj=new NovelText();
	$url="http://www.16kxsw.com/16k/11/11312/".$_POST['link']."";
	$directoryHtml=$obj->getText($url);
	print_r($directoryHtml);
}


