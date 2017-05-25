<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;

import('ORG.Util.Session');//导入session类

class UserController extends Controller {
    public function login(){
       $this -> display();
    }

    public function stock(){
        $userid = $_GET['id'];
        $username = $_GET['name'];

        $this->assign('user',$username);

        $model = new Model();
        $sql = "select a.*,b.*,c.* from book_img a,user_books b,categories c where a.book_id = b.book_id and b.catid = c.catid and b.userid='$userid'"; 
        $ower = $model->query($sql);
        $this->assign('ower',$ower);

        $sql2 = "select c.catname from user_books b,categories c where b.catid = c.catid and b.userid='$userid'";
        $cate = $model->query($sql2);
        $this->assign('cate',$cate);

        $sql3 = "select author from user_books where userid='$userid'";
        $auth = $model->query($sql3);
        $this->assign('auth',$auth);


        $this->display('stock');
    }

    public function editStock(){
        $userid = SESSION('userid');
        $book_img = M('book_img');
        $bookImg = $book_img->order('book_id desc')->limit(1)->select();
        $this->assign('book_img',$bookImg);

        $type = M('categories');
        $typeName = $type->select();
        $this->assign('typeName', $typeName); 

        $model = new Model();
        $sql = "select a.*,b.*,c.* from book_img a,user_books b,categories c where a.book_id = b.book_id and b.catid = c.catid and b.userid='$userid'";
        $delBook = $model->query($sql);
        $this->assign('delBook',$delBook);


        $sql4 = "select a.*,b.*,c.* from borrow_books a,user_books b,users c where a.book_id = b.book_id and c.userid = b.userid";
        $borrow_books = $model->query($sql4);
        $this->assign('borrow_books',$borrow_books);

        $this->display('editStock');
    }

    public function registerData(){ 
    	$username = $_POST['username'];
    	$email = $_POST['email'];
    	$password = $_POST['password'];	
        $repass = $_POST['repass'];

        $sql = M('users')->where("username='$username'")->select();  
       
        if($sql){
            $this -> ajaxReturn(array('status' => -1,'msg' => '已存在该用户名'));
        }else{
             $this -> ajaxReturn(array('status' => -2));
        }    
    }

    public function signData(){
        $account = $_POST['account'];
        $pwd = $_POST['pwd']; 
        $sql = M('users')->where("username='$account'")->select();  
        if(!$sql){
            $this -> ajaxReturn(array('status' => -5,'msg' => '不存在该用户名'));
        }else{
            $this -> ajaxReturn(array('status' => -6));
        }
    }

    public function vertifySign(){
        $account = $_POST['account'];
        $pwd = md5($_POST['pwd']); 

        $sql = M('users')->where("username='$account' and password='$pwd'")->select(); 
        if(!$sql){
            $this -> ajaxReturn(array('status' => -7,'msg' => '账户名或密码错误'));
        }else{   
            SESSION('account',$account);
            SESSION('pwd',$pwd);
            $this -> ajaxReturn(array('status' => -8));
        } 
    }

    public function saveInfo(){
        $data['username'] = I('username');
        $data['email'] = I('email');
        $data['password'] = md5(I('password'));
        M('users')->add($data);
    }

    public function bookImg(){
        $book_img=M('book_img');
        if(!empty($_FILES)){
        //上传单个图像
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize = 1*1024*1024 ;// 设置附件上传大小
            $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath = 'Public/Uploads/bookImg/'; // 设置附件上传根目录
          
            $upload->savePath = ''; // 设置附件上传（子）目录
            $upload->saveName=array('uniqid','');//上传文件的保存规则
            $upload->autoSub = true;//自动使用子目录保存上传文件 
            $upload->subName = array('date','Ymd');
            // 上传单个图片
            $info = $upload->uploadOne($_FILES['image']);
            if(!$info) {// 上传错误提示错误信息
                $this->error($upload->getError());
            }else{// 上传成功 获取上传文件信息
                $img_url=$info['savepath'].$info['savename'];  
                $data['img_url']=$img_url;
                $data['img_name']=$info['savename'];
                $data['create_time']=NOW_TIME;
                $book_img->create($data);
                $result = $book_img->add();
            }
        }
   
      
       
         if(!$result){
                $this->error('上传失败！');
            }else{
                $this->success('上传成功');
            }

    }

    public function editBookContent(){
        $userid = SESSION('userid');
        $book_content=M('user_books');
        $bookid = $_POST['id'];
        $bookname = $_POST['bookname'];
        $bookauthor = $_POST['bookauthor'];
        $bookprice = $_POST['bookprice'];
        $bookexperience = $_POST['bookexperience'];
        $bookcontent= $_POST['bookcontent'];
        $booktag = $_POST['booktag'];

        $data['book_id'] = $bookid;
        $data['userid'] = $userid;
        $data['title']=$bookname;
        $data['author']=$bookauthor;
        $data['price']=$bookprice;
        $data['experience']=$bookexperience;
        $data['description'] = $bookcontent;
        $data['catid']=$booktag;
        $book_content->create($data);
        $book_content->add();
        $this->ajaxReturn(array('status' => -4,'msg'=>"提交成功"));
    }


    public function deleteBook(){
        $book_id = $_POST['book_id'];
        $book_img = M('book_img');
        $user_books = M('user_books');
        $book_img->where("book_id='$book_id'")->delete();
        $user_books->where("book_id='$book_id'")->delete();
        // $model = new Model();
        // $sql = "select a.*,b.* from zx_img a,zx_books b where a.zx_id = '$zx_id'";
        // $model->query($sql)->delete();
        $this->ajaxReturn(array('status'=>-8));
        // $Book->where("zx_id='$id'")->delete();
    }


}

