<?php
	class IndexAction extends CommonAction
	{
		public function Index(){
			import("ORG.Util.Page");
			$count=M("xuyuan")->count();
			$page=new Page($count,10);
			$lim=$page->firstRow.",".$page->listRows;
			$this->data=M("xuyuan")->limit($lim)->select();
			$this->num=ceil($count/10);
			// $this->pagePub=$page->show();   默认分页
			$this->display('Index/index');
		}
		/**
			*退出登录
		*/
		public function logout(){
			session_unset();
			session_destroy();
			$this->redirect("Admin/Login/index");
		}
		public function delete(){
			$id=I("id");
			if(isset($id)){
				$del=M("xuyuan")->where(array("id"=>$id))->delete();
				if($del){
					$this->success("删除成功",U('Index/index'));
				}else{
					$this->error("删除异常",U('Index/index'));
				}
			}
		}
	}
	
?>