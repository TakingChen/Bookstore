<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;
class SharebooksController extends Controller {
    public function shareBooks(){
    	$catid = M('categories');
    	$catname = $catid->select();
    	$this->assign('catname',$catname);

       	$sb = M('sb_img');
        $sbImg= $sb->order('create_time desc')->select();   
        $this->assign('sbImg',$sbImg); 

        $model = new Model();
        $sql = "select a.username,b.userid,count(b.userid) AS count from users a,user_books b where a.userid = b.userid group by b.userid order by count desc";
        $most_stock = $model->query($sql);
        $this->assign('most_stock',$most_stock);

        $this -> display('shareBooks');
    }

    public function sortBooks(){

        $catid = $_GET['id'];

        $model = new Model();
        $sql = "select a.*,b.*,c.* from book_img a,user_books b,categories c where a.book_id = b.book_id and b.catid = c.catid  and c.catid='$catid'"; 
        $sort = $model->query($sql);
        $this->assign('sort',$sort);

        $sql2 = "select c.catname from user_books b,categories c where b.catid = c.catid and c.catid='$catid' limit 1";
        $cate = $model->query($sql2);
        $this->assign('cate',$cate);

        $sql3 = "select a.author from user_books a,categories c where c.catid='$catid' and a.catid = c.catid";
        $auth = $model->query($sql3);
        $this->assign('auth',$auth);

         $this -> display('sortBooks');
    }
}
