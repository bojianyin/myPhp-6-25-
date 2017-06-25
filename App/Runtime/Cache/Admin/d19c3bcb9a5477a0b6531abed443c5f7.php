<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="__PUBLIC__/css/bootstrap.min.css">
	<script src="__PUBLIC__/js/jquery-2.1.4.min.js"></script>
	<script src="__PUBLIC__/js/bootstrap.min.js"></script>
</head>
<body>
	<!--导航-->
	<nav class="navbar navbar-inverse">
		<div class="container">
		  <div class="container-fluid">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="#">MyAdmin</a>
		    </div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav">
		        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
		        <li><a href="#">Link</a></li>
		        <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
		          <ul class="dropdown-menu">
		            <li><a href="#">Action</a></li>
		            <li><a href="#">Another action</a></li>
		            <li><a href="#">Something else here</a></li>
		            <li role="separator" class="divider"></li>
		            <li><a href="#">Separated link</a></li>
		            <li role="separator" class="divider"></li>
		            <li><a href="#">One more separated link</a></li>
		          </ul>
		        </li>
		      </ul>
		      <form class="navbar-form navbar-left">
		        <div class="form-group">
		          <input type="text" class="form-control" placeholder="Search">
		        </div>
		        <button type="submit" class="btn btn-default">Submit</button>
		      </form>
		      <ul class="nav navbar-nav navbar-right">
		        <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo session("username");?><span class="caret"></span></a>
		          <ul class="dropdown-menu" aria-labelledby="dLabel">
		            <li><a href="#">Action</a></li>
		            <li><a href="#">Another action</a></li>
		            <li><a href="#">Something else here</a></li>
		            <li role="separator" class="divider"></li>
		            <li><a href="<?php echo U('Index/logout');?>">退出用户</a></li>
		          </ul>
		        </li>
		      </ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
	</nav>

	<!--main_start-->
	<div class="container">
		<div class="col-sm-4">
			<div class="panel panel-default">
			  <div class="panel-heading">Panel heading without title</div>
			  <div class="panel-body">
			    Panel content
			  </div>
			</div>

			<div class="panel panel-default">
			  <div class="panel-heading">
			    <h3 class="panel-title">Panel title</h3>
			  </div>
			  <div class="panel-body">
			    Panel content
			  </div>
			</div>
		</div>
		<div class="col-sm-8">
			<div class="table-responsive">
			  <table class="table">
			    	<caption>你的愿望:</caption>
				      <thead>
				        <tr>
				          <th>id</th>
				          <th>title</th>
				          <th>content</th>
				          <th>time</th>
				          <th>操作</th>
				        </tr>
				      </thead>
				      <tbody>
				        <?php if(is_array($data)): foreach($data as $key=>$itm): ?><tr>
								<td><?php echo ($itm["id"]); ?></td>
								<td><?php echo ($itm["title"]); ?></td>
								<td><?php echo faceFilter($itm['content']);?></td>
								<td><?php echo date('Y-m-d H:i',$itm['time']);?></td>
								<td><a href="<?php echo U('Admin/Index/delete','id='.$itm['id']);?>">删除</a></td>
							</tr><?php endforeach; endif; ?>
				      </tbody>  
			  </table>
			</div>

			<!--分页-->
			<nav aria-label="">
			  <ul class="pagination">
			  	<li>
			      <a href="<?php echo U('Admin/Index/index','p='.(I('p')==1?1:(I('p')-1)));?>" aria-label="Previous">
			        <span aria-hidden="true">&laquo;</span>
			      </a>
			    </li>
			  	<?php $__FOR_START_11708__=0;$__FOR_END_11708__=$num;for($k=$__FOR_START_11708__;$k < $__FOR_END_11708__;$k+=1){ ?><li class="<?php echo I('p')==($k+1)?active:'';;?>"><a href="<?php echo U(Admin/Index/index,'p='.($k+1));?>"><?php echo ($k+1); ?><span class="sr-only">(current)</span></a></li><?php } ?>
			    <li>
			      <a href="<?php echo U('Admin/Index/index','p='.(I('p')==$num?$num:(I('p')+1)));?>" aria-label="Next">
			        <span aria-hidden="true">&raquo;</span>
			      </a>
			    </li>
			  </ul>
			</nav>
		</div>

	</div>

	
</body>
</html>