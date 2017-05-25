<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;
class BookdetailController extends Controller {
    public function bookdetail(){
    	$id = $_GET['id'];
        $this->assign('id',$id);
    	$name = $_GET['name'];
    	$this->assign('user',$name);
    	$model = new Model();
        $sql = "select a.*,b.*,c.* from book_img a,user_books b,categories c where a.book_id = b.book_id and b.catid = c.catid and a.book_id = '$id'";
        $detail = $model->query($sql);
        $this->assign('detail',$detail);


       $this -> display('bookdetail');
    }

    public function editBorrow(){
        $userid = SESSION('userid');
        $deadline = $_POST['deadline'];
        $borrow_time = $_POST['date'];
        $book_id = $_POST['bookid'];

        $borrow_books = M('borrow_books');
        $data['book_id'] = $book_id;
        $data['user_id'] = $userid;
        $data['borrow_time'] = $borrow_time;
        $data['deadline'] = $deadline; 
        $borrow_books->create($data);
        $borrow_books->add();
    }
}
