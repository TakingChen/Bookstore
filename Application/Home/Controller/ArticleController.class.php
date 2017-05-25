<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;
class ArticleController extends Controller {
    public function article(){
       // $showArticle = M('article');
       // $artList = $showArticle->select();
       // $this->assign('artList',$artList);

       $model = new Model();
       $sql = "select a.*,b.* from users a,article b where a.userid = b.userid order by b.create_time desc";

       $artList = $model->query($sql);
       $this->assign('artList',$artList);

       $this -> display('article');
    }

    public function articleDetail(){
    	$userid = $_GET['userid'];
        $art_id = $_GET['art_id'];

        $model = new Model();
       	$sql = "select a.*,b.* from users a,article b where a.userid = b.userid and art_id = '$art_id' and b.userid='$userid'";

       	$article = $model->query($sql);
       	$this->assign('article',$article);

    	$this->display('articleDetail');
    }



function transgress_keyword($content){                  //定义处理违法关键字的方法  
    $keyword = array ('BB', '不雅的字', '明日图书', '明日软件' ); //定义敏感词  
    $m = 0;  
    for($i = 0; $i < count ( $keyword ); $i ++) {    //根据数组元素数量执行for循环  
        //应用substr_count检测文章的标题和内容中是否包含敏感词  
        if (substr_count ( $content, $keyword [$i] ) > 0) {  
            $m ++;  
        }  
    }  
    return $m;              //返回变量值，根据变量值判断是否存在敏感词  
}  

// if (transgress_keyword($_POST[content])> 0 || transgress_keyword($_POST[content])> 0 ) {    //判断返回值大于0说明包含敏感词  
//     echo "<script>alert('输入的内容中含有敏感词'); history.back();</script>";  
// }  
    
}