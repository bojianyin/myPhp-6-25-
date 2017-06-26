<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>Document</title>
	<link rel="stylesheet" href="__PUBLIC__/css/bootstrap.min.css">
	<script src="__PUBLIC__/js/jquery.min.js"></script>
	<style>
		body{background: #efeffc}
		form{width:500px;padding:20px;margin:50px auto;border:1px solid #e0e0e0;background: #fff;border-radius:10px;}
		form>.form-group{height:33px;}
		label{margin-top:5px;}
	</style>
</head>
<body>
	<form class="form-horizonta" action="<?php echo U('Admin/Login/Login');?>" method="post">
	  <div class="form-group">
	    <label for="user" class="col-sm-3 control-label">user</label>
	    <div class="col-sm-9">
	      <input type="text" class="form-control" id="user" placeholder="请输入用户名..." name="user">
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="password" class="col-sm-3 control-label">Password</label>
	    <div class="col-sm-9">
	      <input type="password" class="form-control" id="password" placeholder="请输入密码..." name="pwd">
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="code" class="col-sm-3 control-label">code</label>
	    <div class="col-sm-4">
	      <input type="text" class="form-control" id="code" placeholder="请输入验证码..." name="code">
	    </div>
	    <div class="col-sm-5">
	    	<img src="<?php echo U('Admin/Login/verify','','');?>" alt="code" class="" >
			<a href="javascript:;" class="btn-link btn-sm toggle_code">看不清</a>
	    </div>
	  </div>
	  
	  <div class="form-group">
	    <div class="col-sm-offset-3 col-sm-10">
	      <button type="submit" class="btn btn-primary" onclick="return check()">Login</button>
	    </div>
	  </div>
	</form>
	<script>
		$(".toggle_code").click(function(){
			$(this).prev().attr("src",'<?php echo U("Admin/Login/verify","","");?>'+"/"+Math.random()).click(function(){
				$(this).attr("src",'<?php echo U("Admin/Login/verify","","");?>'+"/"+Math.random());
			});
		})
		function check(){
			if(user.value==""){
				user.focus();
				return false;
			}else if(password.value==""){
				password.focus();
				return false;
			}else if(code.value==""){
				code.focus();
				return false;
			}
		}
	</script>
</body>
</html>