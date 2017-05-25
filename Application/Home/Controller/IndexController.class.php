<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;
class IndexController extends Controller {
    public function index(){
      $user = M('users');
      $username = SESSION('account');
      $u = $user->field('userid')->where("username='$username'")->find();
      $userid = $u['userid'];
      SESSION('userid',$userid);
     	$Notice = M('notice');
        $list = $Notice->select();
        $this->assign('list',$list);
       	$notice = $Notice->order('notice_id desc')->select();
       	$this->assign('notice',$notice);
       	$ad = M('upload_img');
       	$sel= $ad->order('create_time desc')->select();  
        $this->assign('data', $sel);
        $model = new Model();
        $sql = "select a.*,b.*,c.* from zx_img a,zx_books b,categories c where a.zx_id = b.zx_id and b.catid = c.catid";
        $zx = $model->query($sql);
        $this->assign('zx',$zx);
       	$this -> display();
    }

       /* 退出登录 */
    public function logout(){
      if(SESSION('account')!=""){
        session('account',null);
        session('[destroy]');
        $this->success('注销成功！', U('Home/User/login'));
      }else{
          $this->redirect('Home/Index/index');
      }
        
    
    }

      


}