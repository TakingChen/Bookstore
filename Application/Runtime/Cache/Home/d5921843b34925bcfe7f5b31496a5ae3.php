<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>分类图书库</title>
    <link rel="stylesheet" href="/ShareBooks/Public/css/userLibrary.css">
</head>
<body>
    <header>
     <nav class="top clearfix">
            <span class="location">你的位置：广州大学</span>
            <ul>
                <li><a href="#">欢迎回来！</a></li>
                <li><a href="#" class="account"><?php echo (session('account')); ?></a></li>
                <li><a href="#" target="_blank">购物车</a></li>
                <li><a href="#" target="_blank">我的书库</a></li>
                <li><a href="<?php echo U('Index/logout');?>">注销</a></li>
            </ul>
        </nav>    
    </header>
    <div class="container commonWidth">
        <div class="location">
            <span>当前 &gt</span>
            <span>
                 <?php if(is_array($cate)): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate): $mod = ($i % 2 );++$i;?><li>
                        <a href=""><?php echo ($cate['catname']); ?></a>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </span>
        </div>
        <div class="selector">
            <!-- end of .book-type -->
            <div class="sort book-author">
                <div class="wrap">
                    <div class="book-key">
                        <strong>作 者</strong>
                        <span></span>
                    </div>
                    <div class="book-value d-author">
                        <ul>
                        <?php if(is_array($auth)): $i = 0; $__LIST__ = $auth;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$auth): $mod = ($i % 2 );++$i;?><li>
                                <a href=""><?php echo ($auth['author']); ?></a>
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- end of .book-author -->
            <div class="sort book-country">
                <div class="wrap">
                    <div class="book-key">
                        <strong>国 家</strong>
                         <span></span>
                    </div>
                    <div class="book-value d-country">
                        <ul>
                            <li>
                                <a href="">中国大陆</a>
                            </li>
                            <li>
                                <a href="">中国港澳台</a>
                            </li>
                            <li>
                                <a href="">欧洲</a>
                            </li>
                            <li>
                                <a href="">美国</a>
                            </li>
                            <li>
                                <a href="">俄罗斯</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- end of .book-country -->
        </div>
        <!-- end of .selector -->
        <div class="book-item commonWidth">
            <hr>
            <div class="book-i-list">
                <ul>
                <?php if(is_array($sort)): $i = 0; $__LIST__ = $sort;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sort): $mod = ($i % 2 );++$i;?><li class="list-item1 item">
                        <div class="book-img">
                            <a href="<?php echo U('Bookdetail/bookdetail',array('id'=>$sort['book_id'],'name'=>$user));?>" class="img" target="_blank">
                                <img src="/ShareBooks/Public/Uploads/bookImg/<?php echo ($sort['img_url']); ?>" alt="book-img1">
                            </a>
                        </div>
                        <div class="detail">
                            <p class="title">
                                <span class="s-title"><a href="#"><?php echo ($sort['title']); ?></a></span>
                            </p>
                            <p class="tab">
                                <span class="s-tab">标签：<i><?php echo ($sort['catname']); ?></i></span>
                            </p>
                            <p class="author">
                                <span class="s-author">
                                      作者：<a href="#"><?php echo ($sort['author']); ?></a>
                                </span>
                            </p>
                        </div>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
        </div>
    </div>
</body>
<script src="/ShareBooks/Public/js/vendor/jquery-3.1.1.min.js"></script>
<script src="/ShareBooks/Public/js/userLibrary.js"></script>
</body>
</html>