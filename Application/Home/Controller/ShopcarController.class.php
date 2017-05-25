<?php
namespace Home\Controller;
use Think\Controller;
class ShopcarController extends Controller {
    public function shopcar(){
    	$userid = SESSION('userid');
    	$shop = M('shopcar');
    	$items = $shop->where("userid='$userid'")->select();
    	
    	$this->assign('items',$items);
     	$this -> display('shopcar');
    }

    public function order(){
    	$userid = SESSION('userid');
    	$shop = M('shopcar');
    	$order = $shop->where("userid='$userid'")->select();
    	
    	$this->assign('order',$order);
    	$this->display('order');
    }

    public function editOrder(){
    	$item_name = $_POST['item_name'];
    	$item_price = $_POST['item_price'];
    	$item_amount = $_POST['item_amount'];
    	$item_url = $_POST['item_url'];
    	$username = SESSION('account');

    	$userid = SESSION('userid');
    	
    	$data['item_name'] = $item_name;
    	$data['item_price'] = $item_price;
    	$data['item_amount'] = $item_amount;
    	$data['item_url'] = $item_url;
    	$data['userid'] = $userid;
    	$shopcar = M('shopcar');
    	$shopcar->create($data);
    	$shopcar->add();
    	$this->ajaxReturn(array('status'=>-2));
    }

    public function editShopcar(){
    	$item_name = $_POST['item_name'];
    	$item_price = $_POST['item_price'];
    	$item_amount = $_POST['item_amount'];
    	$item_url = $_POST['item_url'];
    	$username = SESSION('account');

    	$userid = SESSION('userid');
    	
    	$data['item_name'] = $item_name;
    	$data['item_price'] = $item_price;
    	$data['item_amount'] = $item_amount;
    	$data['item_url'] = $item_url;
    	$data['userid'] = $userid;
    	$shopcar = M('shopcar');
    	$shopcar->create($data);
    	$shopcar->add();
    	$this->ajaxReturn(array('status'=>-2));
    }


}
