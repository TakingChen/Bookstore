<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;
class ZhenxuanController extends Controller {
    public function zxDetail(){
    	$id = $_GET['id'];
    	$model = new Model();
        $sql = "select a.*,b.*,c.* from zx_img a,zx_books b,categories c where a.zx_id = b.zx_id and b.catid = c.catid and a.zx_id = '$id'";
        $zxbook = $model->query($sql);
        $this->assign('zxbook',$zxbook);
     	$this -> display('zxDetail');
    }


}
