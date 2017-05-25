<?php
namespace Home\Controller;
use Think\Controller;
class MineController extends Controller {
    public function mine(){
        $userid = SESSION('userid');
        $article = M('Article');
        $list = $article->where("userid='$userid'")->select();
        $this->assign('list',$list); 
        $this -> display('mine');
    }

     public function editAccount(){
       $eUserName = $_POST['eUserName'];
       $oUserName = $_POST['oUserName'];
       $data['username'] = $eUserName;
       $sql = M('users')->where("username = '$oUserName'")->save($data);
       session(null);
       if($sql){
            $this -> ajaxReturn(array('status' => -6));
       }
           
    }

    public function editPass(){
       $oPass = $_POST['oPass'];

       $account = SESSION('account');
        $sql = M('users')->where("username='$account' and password=md5('$oPass')")->select();  

        if(!$sql){
            $this -> ajaxReturn(array('status' => -1,'msg' => '原密码不正确'));
        }else{
            $this -> ajaxReturn(array('status' => -2));
        }
    }

    public function saveNewPass(){
        $nPass = $_POST['nPass'];
        $account = SESSION('account');
        $data['password'] = md5($nPass);

         $sql = M('users')->where("username='$account'")->save($data);
         if($sql){
            $this -> ajaxReturn(array('status' => -3));
         }
         
    }

    //编辑文章
      public function editArticle(){
         $userid = SESSION('userid');
         $article = M('article');
         $article->title = $_POST['title'];
         $article->content = $_POST['content'];
         $article->create_time = $_POST['time'];
         $article->userid = $userid; 
         $article->add();
         $this->ajaxReturn(array('status' => -4));
           
    }


    public function deleteArticle(){
         $article = M('article');
         $userid = SESSION('userid');
         $article_title = $_POST['title'];
         $article->where("article_title='$article_title' and userid = '$userid'")->delete();
         $this->ajaxReturn(array('status' => -8));  
           
    }

}
