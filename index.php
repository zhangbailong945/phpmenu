<?php

?> 
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ReadNovels v1.0</title>
<link type="text/css" rel="stylesheet" href="./plugins/bootstrap/css/bootstrap.min.css">
<link type="text/css" rel="stylesheet" href="./plugins/bootstrap/css/bootstrap-theme.css">
<link type="text/css" rel="stylesheet" href="./resources/css/template.css">

</head>
<body>
<div class="container">
    
	<div class="row clearfix">
		<div class="col-md-12 column">
			<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
				<div class="navbar-header">
					 <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button> <a class="navbar-brand" href="#">ReadNovels v1.0</a>
				</div>
				
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li class="active">
							 <a href="#">书屋</a>
						</li>
						<li>
							 <a href="#">搜书</a>
						</li>											
					</ul>
					<form class="navbar-form navbar-left" role="search">
						<div class="form-group">
							<input type="text" class="form-control" />
						</div> <button type="submit" class="btn btn-default">搜索</button>
					</form>
					<ul class="nav navbar-nav navbar-right">
						<li>
							 <a href="#">ReadNovels v1.0</a>
						</li>		
						<li>
						   <a href="javascript:voide(0);">     </a>
						</li>				
					</ul>
				</div>				
			</nav>			
		</div>
	</div>

	<div class="row clearfix">
	   <div class="col-md-12 column">
			<ul class="nav nav-tabs">
				<li class="active">
					 <a href="#">首页</a>
				</li>
				<li>
					 <a href="#">书城</a>
				</li>
				<li class="disabled">
					 <a href="#">排行</a>
				</li>
				<li class="disabled">
					 <a href="javascript:void(0);" onclick="loadNovelText();">test</a>
				</li>
				<li class="dropdown pull-right">
					 <a href="#" data-toggle="dropdown" class="dropdown-toggle">操作<strong class="caret"></strong></a>
					<ul class="dropdown-menu">
						<li>
							 <a href="#">收藏</a>
						</li>
						<li>
							 <a href="#">下载</a>
						</li>
						<li>
							 <a href="#">夜间</a>
						</li>
						
						<li class="divider">
						</li>
						<li>
							 <a href="#">ReadNovels v1.0</a>
						</li>
					</ul>
				</li>
			</ul>
			</div>
	 </div>
	 
	 <div class="row clearfix">
	  <div class="col-md-12 column">
	 		<div class="list-group" id="directory">
	 		  <!-- 
	 		     <center><a href="#" class="list-group-item active">圣域</a></center>
				<div class="list-group-item">
					 第一章 生生死死
				</div>
				<div class="list-group-item">
                                                      第二章章 生生死死
				</div>
				<div class="list-group-item">
					 第三章章 生生死死
				</div>
				<center>
				<a class="list-group-item active" href="#">关闭</a>
				</center>
				 -->
			</div>
	 </div>
	</div>
	 <nav class="navbar navbar-default navbar-fixed-bottom" role="navigation">
		<a class="navbar-brand" style="margin-left:45%;" href="#">ReadNovels v1.0</a>
     </nav>
</div>
<!-- jquery必须放在最前 -->
<script type="text/javascript" src="./plugins/jquery/jquery-3.1.1.min.js"></script>
<!-- bootstrap js -->
<script type="text/javascript" src="./plugins/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript">

$(function(){
	//loadNovelDirectory();
});

function loadNovelDirectory()
{
   $.ajax({
		   url:'./src/NovelDirectory.php',
		   async:true,
		   dataType:'json',
		   success:function(data)
		   {
			    $('#directory').html('');
		        for(var i=0;i<data.length;i++)
		        {
		                 if(i==0)
		                 {
		                     
		                	 $('#directory').append('<center><a href="#" class="list-group-item active">小说名字</a></center>');
		                	 $('#directory').append('<center><a href="#bottom" class="list-group-item">前往第一章</a></center>');
		                 }		
		
		            	 $('#directory').append('<a href="javascript:void(0);" onclick="lookCharacter(\''+data[i]["link"]+'\');" class="list-group-item">'+data[i]["atext"]+'</a>');		            	  
		                 
		        }
		        $('#directory').append('<center><a href="#" name="bottom" class="list-group-item">返回最新章节</a></center>');
		        $('#directory').append('<center><a href="javascript:void(0);"  class="list-group-item active">关闭</a></center>');
		        
	        },
            beforeSend:function(){
	        	$('#directory').html('<center class="list-group-item"><a href="javascript:void(0);">获取目录中.......</a></center>');
	    	}
		});
}

function lookCharacter(link)
{
	$.ajax({
		   url:'./src/NovelText.php',
		   type:'post',
		   data:{link:link,'action':'character'},
		   success:function(data)
		   {

			    $('#directory').html('');
			    $('#directory').html(data);
			    /*
		        for(var i=0;i<data.length;i++)
		        {
		                 if(i==0)
		                 {
		                     
		                	 $('#directory').append('<center><a href="#" class="list-group-item active">小说名字</a></center>');
		                	 $('#directory').append('<center><a href="#bottom" class="list-group-item">前往第一章</a></center>');
		                 }		
		
		            	 $('#directory').append('<a href="javascript:void(0);" onclick="lookCharacter('+data[i]["link"]+');" class="list-group-item">'+data[i]["atext"]+'</a>');		            	  
		                 
		        }
		        $('#directory').append('<center><a href="#" name="bottom" class="list-group-item">返回最新章节</a></center>');
		        $('#directory').append('<center><a href="javascript:void(0);"  class="list-group-item active">关闭</a></center>');
		        */
	        },
      beforeSend:function(){
	        	$('#directory').html('<center class="list-group-item"><a href="javascript:void(0);">获取内容中.......</a></center>');
	    	}
		});
}

function loadNovelText()
{

	$.ajax({
		   url:'./src/NovelText.php',
		   async:true,
		   success:function(data)
		   {

			    $('#directory').html('');
			    $('#directory').html(data);
			    /*
		        for(var i=0;i<data.length;i++)
		        {
		                 if(i==0)
		                 {
		                     
		                	 $('#directory').append('<center><a href="#" class="list-group-item active">小说名字</a></center>');
		                	 $('#directory').append('<center><a href="#bottom" class="list-group-item">前往第一章</a></center>');
		                 }		
		
		            	 $('#directory').append('<a href="javascript:void(0);" onclick="lookCharacter('+data[i]["link"]+');" class="list-group-item">'+data[i]["atext"]+'</a>');		            	  
		                 
		        }
		        $('#directory').append('<center><a href="#" name="bottom" class="list-group-item">返回最新章节</a></center>');
		        $('#directory').append('<center><a href="javascript:void(0);"  class="list-group-item active">关闭</a></center>');
		        */
	        },
         beforeSend:function(){
	        	$('#directory').html('<center class="list-group-item"><a href="javascript:void(0);">获取目录中.......</a></center>');
	    	}
		});
}

</script>
</body>
</html>