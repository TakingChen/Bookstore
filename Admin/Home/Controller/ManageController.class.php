<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;
class ManageController extends Controller {

     public function manage(){ 
       
        $Notice = M('notice');
        $list = $Notice->select();
        $this->assign('list',$list);  

        $ad = M('upload_img');
        $img= $ad->order('create_time desc')->select();   
        $this->assign('img', $img); 

        $zx_img = M('zx_img');
        $zxImg = $zx_img->order('zx_id desc')->limit(1)->select();
        $this->assign('zx_img',$zxImg);

        $model = new Model();
        $sql = "select a.*,b.*,c.* from zx_img a,zx_books b,categories c where a.zx_id = b.zx_id and b.catid = c.catid";
        $del = $model->query($sql);
        $this->assign('del',$del);

        $catid = M('categories');
        $catname = $catid->select();
        $this->assign('catname',$catname);

        $sb = M('sb_img');
        $sbImg= $sb->order('create_time desc')->select();   
        $this->assign('sbImg', $sbImg); 

        $type = M('categories');
        $typeName = $type->select();
        $this->assign('typeName', $typeName); 

        $this -> display('manage');
       
    }

    /* 退出登录 */
    public function logout(){
    
            //D('Member')->logout();
            session('username',null);
            session('[destroy]');
            $this->success('注销成功！', U('/Home/Login/login'));
    
    }


    public function editAdmin(){
       $eAdminName = $_POST['eAdminName'];
       $data['username'] = $eAdminName;
       $sql = M('admin')->where("a_id = 1")->save($data);
       session(null);
       if($sql){
            $this -> ajaxReturn(array('status' => -6));
       }
           
    }

    public function editPass(){
        $oPass = $_POST['oPass'];
       $adminName = SESSION('admin');
  
        $sql = M('admin')->where("username='$adminName' and password='$oPass'")->select();    
        if(!$sql){
            $this -> ajaxReturn(array('status' => -1,'msg' => '原密码不正确'));
        }else{
            $this -> ajaxReturn(array('status' => -2));
        }
    }

    public function saveNewPass(){
        $nPass = $_POST['nPass'];
        $adminName = SESSION('admin');
        $data['password'] = $nPass;

         $sql = M('admin')->where("username='$adminName'")->save($data);
         if($sql){
            $this -> ajaxReturn(array('status' => -3));
         }
         
    }

    public function editNotice(){
         $Notice = M('notice');
         $Notice->notice_content = $_POST['content'];
         $Notice->notice_date = $_POST['time'];
         $Notice->add();
         $this->ajaxReturn(array('status' => -4));
           
    }


    public function deleteNotice(){
         $Notice = M('notice');
         $notice_content = $_POST['content'];
         $Notice->where("notice_content='$notice_content'")->delete();
         $this->ajaxReturn(array('status' => -8));  
           
    }

    // public function showThumb(){
    //  $image = new \Think\Image(); 
    //  $image->open('../public/img/add001.png');
    //  // 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.jpg
    //  $image->thumb(150, 150)->save('./thumb.png');
    // }

    public function upload(){
        $lastSize = $_POST['lastSize'];
        $upload_img=M('upload_img');
        if(!empty($_FILES)){
        //上传单个图像
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize = 1*1024*1024 ;// 设置附件上传大小
            $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath = 'Public/Uploads/lImg/'; // 设置附件上传根目录
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
                $upload_img->create($data);
                $result=$upload_img->add();
            if(!$result){
                $this->error('上传失败！');
            }else{
                $this->success('上传成功');
            }
            }
        }
    }

    public function zxImg(){
        $zx_img=M('zx_img');
        if(!empty($_FILES)){
        //上传单个图像
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize = 1*1024*1024 ;// 设置附件上传大小
            $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath = 'Public/Uploads/zxImg/'; // 设置附件上传根目录
          
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
                $zx_img->create($data);
                $result = $zx_img->add();
            }
        }
   
      
       
         if(!$result){
                $this->error('上传失败！');
            }else{
                $this->success('上传成功');
            }

    }

    public function editZXContent(){
        $zx_content=M('zx_books');
        $bookid = $_POST['id'];
        $bookname = $_POST['bookname'];
        $bookauthor = $_POST['bookauthor'];
        $bookprice = $_POST['bookprice'];
        $bookisbn = $_POST['bookisbn'];
        $bookrecommend = $_POST['bookrecommend'];
        $bookcontent= $_POST['bookcontent'];
        $booktag = $_POST['booktag'];
        $data['isbn']=$bookisbn;
        $data['book_name']=$bookname;
        $data['book_author']=$bookauthor;
        $data['book_price']=$bookprice;
        $data['book_recommend']=$bookrecommend;
        $data['book_content'] = $bookcontent;
        $data['catid']=$booktag;
        $zx_content->create($data);
        $zx_content->add();
        $this->ajaxReturn(array('status' => -4,'msg'=>"提交成功"));
    }

    public function deleteImg(){
        $id = $_POST['id'];
        $Upload = M('upload_img');
        // $value = $Upload->where("id='$id'")->select();
        // $url = '__PUBLIC__/Upload/'.$value['img_url'];
        // unlink($value);
        $Upload->where("id='$id'")->delete();
    }

    // public function deleteBook(){
    //     $id = $_POST['id'];
    //     $Book = M('zx_books');
    //     $Book->where("zx_id='$id'")->delete();
    // }

    // //   public function deleteBook(){
    // //     $id = $_POST['id'];
    // //     $Book = M('zx_books');
    // //     $Book->where("zx_id='$id'")->delete();
    // // }

        public function deleteZX(){
        $zx_id = $_POST['zx_id'];
        $zx_img = M('zx_img');
        $zx_books = M('zx_books');
        $zx_img->where("zx_id='$zx_id'")->delete();
        $zx_books->where("zx_id='$zx_id'")->delete();
        // $model = new Model();
        // $sql = "select a.*,b.* from zx_img a,zx_books b where a.zx_id = '$zx_id'";
        // $model->query($sql)->delete();
        $this->ajaxReturn(array('status'=>-8));
        // $Book->where("zx_id='$id'")->delete();
    }

    public function updateType(){
        $catid = $_POST['catid'];
        $catname = $_POST['catname'];
        $categories = M('categories');
        $data['catname'] = $catname;
        $categories->where("catid='$catid'")->save($data);
        $this->ajaxReturn(array('status'=>-9));
    }

     public function sbImg(){
        $sb_img=M('sb_img');
        if(!empty($_FILES)){
        //上传单个图像
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize = 1*1024*1024 ;// 设置附件上传大小
            $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath = 'Public/Uploads/sbImg/'; // 设置附件上传根目录
          
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
                $sb_img->create($data);
                $result = $sb_img->add();
            }
        }
        if(!$result){
                $this->error('上传失败！');
            }else{
                $this->success('上传成功');
            }
   
    }


    public function deleteSBImg(){
        $sb_id = $_POST['sb_id'];
        $sb_img = M('sb_img');
        // $value = $Upload->where("id='$id'")->select();
        // $url = '__PUBLIC__/Upload/'.$value['img_url'];
        // unlink($value);
        $sb_img->where("sb_id='$sb_id'")->delete();
    }

}