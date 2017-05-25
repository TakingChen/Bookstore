<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
     public function index(){
       $this -> display();
    }


    public function signData(){
        $account = $_POST['account'];
        $pwd = $_POST['pwd']; 
        $sql = M('admin')->where("username='$account'")->select();  
        if(!$sql){
            $this -> ajaxReturn(array('status' => -5,'msg' => '不存在该用户名'));
        }else{
            $this -> ajaxReturn(array('status' => -6));
        }

    }

    public function checkAdmin(){
		$admin = $_POST['account'];
		$pwd = $_POST['pwd'];

		$sql = M('admin')->where("username='$admin' and password='$pwd'")->select(); 
        if(!$sql){
            $this -> ajaxReturn(array('status' => -1,'msg' => '账户名或密码错误'));
        }else{   
            SESSION('admin',$admin);
            $this->assign('admin',$admin);//将admin的值传入模板
            $this -> ajaxReturn(array('status' => -2));
        } 
    }
}