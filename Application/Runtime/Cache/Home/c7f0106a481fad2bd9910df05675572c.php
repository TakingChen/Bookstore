<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>共享书圈</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="/ShareBooks/Public/css/shareBooks.css">
    <link rel="stylesheet" href="/ShareBooks/Public/js/vendor/OwlCarousel2-2.2.1/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="/ShareBooks/Public/js/vendor/OwlCarousel2-2.2.1/dist/assets/owl.theme.default.min.css">
</head>
<body>
 <header>
          <nav class="top clearfix">
            <span class="location">你的位置：广州大学</span>
            <ul>
                <li><a href="#">欢迎回来！</a></li>
                <li><a href=#" class="account"><?php echo (session('account')); ?></a></li>
                <li><a href="#" target="_blank">购物车</a></li>
                <li><a href="#" target="_blank">我的书库</a></li>
                <li><a href="<?php echo U('Index/logout');?>">注销</a></li>
            </ul>
        </nav>
        <nav class="main">
            <a href="/ShareBooks/index.php/Home/Index/index.html" class="brand"><img src="/ShareBooks/Public/img/logo.png" alt="回到首页"></a>
            <ul>
                <li><a href="../Index/index.html">首页</a></li>
                <li><a href="../Sharebooks/shareBooks.html">共享书圈</a></li>
                <li><a href="../Article/article.html">读书笔记</a></li>
                <li><a href="#">发现</a></li>
                <li><a href="#">公益捐书</a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <div class="level-one commonWidth">
            <div class="level-one-main">
                <div class="level-one-left clearfix">
                    <div class="sort-title">
                        <h2>全部图书分类</h2>
                    </div>
                    <div class="sort-name">
                        <ul>
                        <?php if(is_array($catname)): $i = 0; $__LIST__ = $catname;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$catname): $mod = ($i % 2 );++$i;?><li>
                        <a href="<?php echo U('Sharebooks/sortBooks',array('id'=>$catname['catid']));?>" target="_blank"><?php echo ($catname['catname']); ?></a>
                        </li>
                       <!--  <li><a href="#">历史/纪实</a></li>
                        <li><a href="#">辅导书/教科书</a></li>
                        <li><a href="#">小说</a></li> --><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </div>
                </div>
            <!-- end of level-one-left -->
                <div class="level-one-center">
                    <div class="ad">
                        <div class="owl-carousel">
                            <?php if(is_array($sbImg)): $i = 0; $__LIST__ = $sbImg;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sbImg): $mod = ($i % 2 );++$i;?><div class="item">
                                    <picture>
                                        <source srcset="/ShareBooks/Public/Uploads/sbImg/<?php echo ($sbImg['img_url']); ?>" media="(min-width:50em)">
                                        <source srcset="/ShareBooks/Public/img/banner001-m.jpg" media="(min-width:30em)">
                                        <img src="/ShareBooks/Public/img/banner001.jpg" alt="2017年度报告">
                                    </picture>                                                     
                                </div><?php endforeach; endif; else: echo "" ;endif; ?>             
                            
                        </div>
                    </div>
                </div>
        <!-- end of level-one-center -->
             </div>
     <!-- end of level-one-main -->
        </div>
        <!-- end of level-one -->
        <div class="level-two commonWidth clearfix">
            <div class="level-two-main">
                <div class="store-book">
                    <div class="store-book-title">
                        <h1>“书”出大户</h1>
                    </div>
                    <div class="store-book-content">
                        <ul>
                            <?php if(is_array($most_stock)): $i = 0; $__LIST__ = $most_stock;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$most_stock): $mod = ($i % 2 );++$i;?><li class="book-item1 book-item">
                                <div class="touxiang1">
                                    <a href="<?php echo U('User/stock',array('id'=>$most_stock['userid'],'name'=>$most_stock['username']));?>" target="_blank">
                                    <img src="/ShareBooks/Public/img/touxiang1.jpg" alt="touxiang1">
                                    </a>
                                </div>
                                <div class="detail">
                                    <p class="ower">
                                    <span class="ower_t">
                                     用 户：<a href="<?php echo U('User/stock',array('id'=>$most_stock['userid'],'name'=>$most_stock['username']));?>" target="_blank"><?php echo ($most_stock['username']); ?></a>
                                    </span>
                                </p>
                                <p class="collection">
                                    <span class="collection-n">收 藏 量：<i><?php echo ($most_stock['count']); ?></i></span>
                                </p>
                                <p class="recommend">
                                    <span class="recommend-n">推荐读物：<a href="<?php echo U('User/stock',array('id'=>$most_stock['userid'],'name'=>$most_stock['username']));?>" target="_blank">《你还好吗》</a></span>
                                </p>
                                </div>

                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </div>
                </div>
                <!-- end of store-book -->
            </div>

        </div>
         <!-- end of level-two -->
            <div class="level-three commonWidth clearfix">
            <div class="level-three-main">
                <div class="store-book">
                    <div class="store-book-title">
                        <h1>“书”入狂人</h1>
                    </div>
                    <div class="store-book-content">
                        <ul>
                            <li class="book-item1 book-item">
                                <div class="touxiang">
                                    <a href="#" class="img">
                                    <img src="/ShareBooks/Public/img/touxiang1.jpg" alt="touxiang1">
                                    </a>
                                </div>
                                <div class="detail">
                                    <p class="ower">
                                    <span class="ower_t">
                                     用 户：<a href="#">布鲁克·巴克</a>
                                    </span>
                                </p>
                                <p class="collection">
                                    <span class="collection-n">借阅次数：<i>16</i></span>
                                </p>
                                <p class="recommend">
                                    <span class="recommend-n">推荐读物：<a href="#">《你还好吗》</a></span>
                                </p>
                                </div>

                            </li>
                            <li class="book-item2 book-item">
                                <div class="touxiang">
                                    <a href="#" class="img">
                                    <img src="/ShareBooks/Public/img/touxiang2.jpg" alt="touxiang1">
                                    </a>
                                </div>
                                <div class="detail">
                                    <p class="ower">
                                    <span class="ower_t">
                                    用 户：<a href="#">布鲁克·巴克</a>
                                    </span>
                                </p>
                                <p class="collection">
                                    <span class="collection-n">借阅次数：<i>15</i></span>
                                </p>
                                <p class="recommend">
                                    <span class="recommend-n">推荐读物：<a href="#">《你还好吗》</a></span>
                                </p>
                                </div>

                            </li>
                            <li class="book-item3 book-item">
                                <div class="touxiang">
                                    <a href="#" class="img">
                                    <img src="/ShareBooks/Public/img/touxiang3.jpg" alt="touxiang1">
                                    </a>
                                </div>
                                <div class="detail">
                                    <p class="ower">
                                    <span class="ower_t">
                                     用 户：<a href="#">布鲁克·巴克</a>
                                    </span>
                                </p>
                                <p class="collection">
                                    <span class="collection-n">借阅次数：<i>10</i></span>
                                </p>
                                <p class="recommend">
                                    <span class="recommend-n">推荐读物：<a href="#">《你还好吗》</a></span>
                                </p>
                                </div>

                            </li>
                            <li class="book-item4 book-item">
                                <div class="touxiang">
                                    <a href="#" class="img">
                                    <img src="/ShareBooks/Public/img/touxiang4.jpg" alt="touxiang1">
                                    </a>
                                </div>
                                <div class="detail">
                                    <p class="ower">
                                    <span class="ower_t">
                                     用 户：<a href="#">布鲁克·巴克</a>
                                    </span>
                                </p>
                                <p class="collection">
                                    <span class="collection-n">借阅次数：<i>8</i></span>
                                </p>
                                <p class="recommend">
                                    <span class="recommend-n">推荐读物：<a href="#">《你还好吗》</a></span>
                                </p>
                                </div>

                            </li>
                            <li class="book-item5 book-item">
                                <div class="touxiang">
                                    <a href="#" class="img">
                                    <img src="/ShareBooks/Public/img/touxiang4.jpg" alt="touxiang1">
                                    </a>
                                </div>
                                <div class="detail">
                                    <p class="ower">
                                    <span class="ower_t">
                                     用 户：<a href="#">布鲁克·巴克</a>
                                    </span>
                                </p>
                                 <p class="collection">
                                    <span class="collection-n">借阅次数：<i>6</i></span>
                                </p>
                                 <p class="recommend">
                                    <span class="recommend-n">推荐读物：<a href="#">《你还好吗》</a></span>
                                </p>
                                </div>

                            </li>
                             <li class="book-item6 book-item">
                                <div class="touxiang">
                                    <a href="#" class="img">
                                    <img src="/ShareBooks/Public/img/touxiang3.jpg" alt="touxiang1">
                                    </a>
                                </div>
                                <div class="detail">
                                    <p class="ower">
                                    <span class="ower_t">
                                     用 户：<a href="#">布鲁克·巴克</a>
                                    </span>
                                </p>
                                 <p class="collection">
                                    <span class="collection-n">借阅次数：<i>6</i></span>
                                </p>
                                 <p class="recommend">
                                    <span class="recommend-n">推荐读物：<a href="#">《你还好吗》</a></span>
                                </div>

                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- end of store-book -->
            </div>
        </div>
         <!-- end of level-three -->
    </div>
        <!-- end of container -->
          <footer>
        <p>制作者：陈汉林 2016-2017</p>
    </footer>
</body>
<script src="/ShareBooks/Public/js/vendor/jquery-3.1.1.min.js"></script>
<script src="/ShareBooks/Public/js/vendor/OwlCarousel2-2.2.1/dist/owl.carousel.min.js"></script>
<script src="/ShareBooks/Public/js/vendor/picturefill.min.js"></script>
<script src="/ShareBooks/Public/js/shareBooks.js"></script>
</html>