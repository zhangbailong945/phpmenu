<?php

?> 
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>PHPmenu</title>
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
					 <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button> <a class="navbar-brand" href="#">PhpMenu V1.0</a>
				</div>
				
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li class="active">
							 <a href="#">书屋</a>
						</li>
                        <li class="dropdown">
									 <a data-toggle="dropdown" class="dropdown-toggle" href="#">下拉菜单<strong class="caret"></strong></a>
									<ul class="dropdown-menu">
										<li>
											<a href="#">下拉导航1</a>
										</li>
										<li>
											<a href="#">下拉导航2</a>
										</li>
										<li>
											<a href="#">其他</a>
										</li>
										<li class="divider">
										</li>
										<li>
											<a href="#">链接3</a>
										</li>
									</ul>
						</li>	
						<li class="dropdown">
									 <a data-toggle="dropdown" class="dropdown-toggle" href="#">下拉菜单<strong class="caret"></strong></a>
									<ul class="dropdown-menu">
										<li>
											<a href="#">下拉导航1</a>
										</li>
										<li>
											<a href="#">下拉导航2</a>
										</li>
										<li>
											<a href="#">其他</a>
										</li>
										<li class="divider">
										</li>
										<li>
											<a href="#">链接3</a>
										</li>
									</ul>
						</li>										
					</ul>
					<form class="navbar-form navbar-left" role="search">
						<div class="form-group">
							<input type="text" class="form-control" />
						</div> <button type="submit" class="btn btn-default">搜索</button>
					</form>
					<ul class="nav navbar-nav navbar-right">
						<li>
							 <a href="#">PhpMenu v1.0</a>
						</li>		
						<li>
						   <a href="javascript:voide(0);">     </a>
						</li>				
					</ul>

				</div>				
			</nav>			
		</div>
	</div>
	 <nav class="navbar navbar-default navbar-fixed-bottom" role="navigation">
		<a class="navbar-brand" style="margin-left:45%;" href="#">PHPmenu v1.0</a>
     </nav>
</div>
<!-- jquery必须放在最前 -->
<script type="text/javascript" src="./plugins/jquery/jquery-3.1.1.min.js"></script>
<!-- bootstrap js -->
<script type="text/javascript" src="./plugins/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript">



</script>
</body>
</html>