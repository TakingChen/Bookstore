<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>管理用户个人图书库</title>
    <link rel="stylesheet" href="/ShareBooks/Public/css/upload.css">
    <link rel="stylesheet" href="/ShareBooks/Public/css/editStock.css">
</head>
<body>
    <header>     
        <nav class="top clearfix">
            <span class="location">你的位置：广州大学</span>
           <ul>
                <li><a href="/ShareBooks/index.php/Home/Index/index.html">回到首页</a></li>
                <li><a href="_#" class="account"><?php echo (session('account')); ?></a></li>
                <li><a href="#" target="_blank">购物车</a></li>
                <li><a href="#" target="_blank">我的书库</a></li>
                <li><a href="<?php echo U('Index/logout');?>">注销</a></li>
            </ul>
        </nav>
    </header>
     <div class="container clearfix">
        <div class="container-left">
            <nav class="tab">
                <ul>
                    <li class="active">
                        <a href="#">书籍编辑</a>
                    </li>
                    <li>
                        <a href="#">借入书籍</a>
                    </li>
                    <li>
                        <a href="#">发现编辑</a>
                    </li>
                     <li>
                        <a href="#">参加公益</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="container-right">
          <div class="edit-index edit-tab" style="display:block;">
              <div class="e-index edit">
                    <div class="e-books clearfix">
                        <h2 class="edit-square">编辑个人图书</h2>
                        <ul class="u-zhenxuan u clearfix">
                            <li class="active">
                                <a href="javascript:void(0)">添加图书</a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">删除图书</a>
                            </li>
                        </ul>
                        <div class="add-book op-book">
                             
                         <h3>选择图片：</h3>
                            <?php if(is_array($book_img)): $i = 0; $__LIST__ = $book_img;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$book_img): $mod = ($i % 2 );++$i;?><div class="clearfix">
                                <div class="book-show">
                                    <div class="book-bar">
                                        <div style="padding:5px;">
                                            <p class="file-name" title="<?php echo ($book_img['book_id']); ?>.png"><?php echo ($book_img['book_id']); ?></p>
                                            <span class="book-del" title="delete"></span>
                                        </div>
                    
                                    </div>
                                    <a class="imgBox">
                                        <div class="uploadImg">
                                            <img src="/ShareBooks/Public/Uploads/bookImg/<?php echo ($book_img['img_url']); ?>" style="width: expression(this.width > 125 ? 125px:this.width);" />
                                        </div>
                                    </a>
                                </div>
                            </div><?php endforeach; endif; else: echo "" ;endif; ?>
                            <br>
                             <form method="post" action="<?php echo U('User/bookImg');?>" enctype="multipart/form-data">
                                <input type="file" name="image"/>
                                <input type="submit" value="上传" id="btn">
                            </form>
                                   
                            <div class="book-detail" style="display: block;">
                                <div class="book-name">
                                    <span>书 名：</span>
                                    <input type="text">
                                </div>
                                <div class="book-author">
                                    <span>作 者：</span>
                                    <input type="text">
                                </div>
                                <div class="book-price">
                                    <span>价 格：</span>
                                    <input type="text">
                                </div>
                                <div class="book-content">
                                    <span>简 介：</span>
                                    <textarea name="" id="" cols="30" rows="10"></textarea>
                                </div>
                                <div class="book-recommend">
                                    <span>心 得：</span>
                                    <textarea name="" id="" cols="30" rows="10"></textarea>
                                </div>
                                <div class="book-tag">
                                    <span>标 签：</span>
                                    <select name="" id="">
                                        <?php if(is_array($typeName)): $i = 0; $__LIST__ = $typeName;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$typeName): $mod = ($i % 2 );++$i;?><option value="<?php echo ($typeName['catid']); ?>">
                                            <?php echo ($typeName['catname']); ?>
                                        </option>
                                        <!-- <option value="2">历史/纪实</option>
                                        <option value="3">辅导书/教科书</option>
                                        <option value="4">小说</option> --><?php endforeach; endif; else: echo "" ;endif; ?>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn-add-book">提交</button>
                   

                           
                        
                           
                        </div>
                        <!-- end of add-book -->
                         <div class="delete-book op-book" style="display: none;">
                            <h3>选择删除的图书：</h3>
                            <div class="del-book">
                                <div class="delBooks">
                                    <span class="s-id">ID</span>
                                    <span class="s-time">创建时间</span>
                                    <span class="s-content">书名</span>
                                    <ul class="clearfix">
                                        <?php if(is_array($delBook)): $i = 0; $__LIST__ = $delBook;if( count($__LIST__)==0 ) : echo "你的图书库清空了" ;else: foreach($__LIST__ as $key=>$delBook): $mod = ($i % 2 );++$i;?><li>
                                            <span><?php echo ($delBook['book_id']); ?></span>
                                            <span><?php echo (substr($delBook['img_url'],0,8)); ?></span>
                                             <span>
                                                <?php echo ($delBook['title']); ?>
                                             </span>
                                            <a class="delete">删除</a>
                                             </li><?php endforeach; endif; else: echo "你的图书库清空了" ;endif; ?>
                                
                                </ul>
                            </div>
                        </div>
                        </div>
                        <!-- end of delete-book -->
                    </div>
                    <!-- end of e-books -->
              </div>
          </div>
            <!-- end of edit-index  -->
          <div class="edit-borrow edit-tab" style="display:none;">
          <h3>借入的书籍</h3>
              <div class="e-borrow edit">
                     <div class="brBooks">
                        <div class="tr-title">
                             <span class="s-ower">from</span>
                             <span class="s-time">借书日期</span>
                            <span class="s-content">借书时长</span>
                            <span class="s-title">书名</span>
                        </div>
                       
                            <ul class="clearfix">
                                <?php if(is_array($borrow_books)): $i = 0; $__LIST__ = $borrow_books;if( count($__LIST__)==0 ) : echo "你的借书库清空了" ;else: foreach($__LIST__ as $key=>$borrow_books): $mod = ($i % 2 );++$i;?><li>
                                        <span><?php echo ($borrow_books['username']); ?></span>
                                            <span><?php echo ($borrow_books['borrow_time']); ?></span>
                                             <span>
                                                <?php echo ($borrow_books['deadline']); ?>
                                             </span>
                                             <span>
                                                <?php echo ($borrow_books['title']); ?>
                                             </span>
                                            <a class="delete">未归还</a>
                                    </li><?php endforeach; endif; else: echo "你的借书库清空了" ;endif; ?>
                                
                        </ul>
                    </div>
              </div>
          </div>

        </div>
        <!-- end of container-right -->
    </div>
    <!-- end of container -->
</body>
<script src="/ShareBooks/Public/js/vendor/jquery-3.1.1.min.js"></script>
<script src="/ShareBooks/Public/js/editStock.js"></script>
<script src="/ShareBooks/Public/js/upload.js"></script>
<script>
    var editBookContent = "<?php echo U('User/editBookContent');?>";
     var deleteBook = "<?php echo U('User/deleteBook');?>";
</script>
</body>
</html>