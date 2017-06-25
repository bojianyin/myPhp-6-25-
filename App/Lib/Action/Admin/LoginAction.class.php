<?php
	/**
	* 后台index入口
	*/
	class LoginAction extends Action
	{
		Public function Index(){
			$this->display('Index/login');
		}
		Public function Login(){
			if(!IS_POST) halt("页面不存在！");
			//$upd=M("admin")->data(array("pass"=>I("pwd","","md5")))->where("id=1")->save();
			if(I("code","","md5")!=session("code")) $this->error("验证码错误",U("Admin/Login/index"));
			$use=I("user");
			$pwd=I("pwd","","md5");

			$user=M("admin")->where(array("username"=>$use))->find();
			if((!$user)||($user['pass']!=$pwd)){
				$this->error("用户不存在或密码错误");
			}
			if($user['lock']) $this->error("用户被锁定");

			$data=array(
				"logintime"=>time()
				,"loginip"=>get_client_ip()
				,"id"=>$user['id']
			);
			M("admin")->save($data);

			session("uid",$user["id"]);
			session("username",$user['username']);
			session("loginip",$user['loginip']);
			session("logintime",date("Y-m-d H:i:s",$user['logintime']));

			$this->redirect("Admin/Index/Index");
		}
		Public function verify(){
			/*
				*tp 内置的图形验证码
			*/
			// import("ORG.Util.Image");
			// Image::buildImageVerify(4,1,"png",80,35);

			/*
				*图形验证码插件 
			*/
			vendor('code.imcode');
			$VerifyImg = new VerifyImage();
			$VerifyImg->CreateVerifyImage(90,35,100,10,1,4);
		
		}
	}
	
?>