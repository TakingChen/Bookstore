<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Books首页</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <!-- bulid:css css/combined.css -->
    <link rel="stylesheet" href="/ShareBooks/Public/css/normalize.css">
    <link rel="stylesheet" href="/ShareBooks/Public/js/vendor/OwlCarousel2-2.2.1/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="/ShareBooks/Public/js/vendor/OwlCarousel2-2.2.1/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="/ShareBooks/Public/css/main.css">
    <!-- endbuild -->
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
    <div class="index-tab tab">
        <div class="container">
        <div class="ad">
            <div class="owl-carousel">
            <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><div class="item">
                    
                        <picture>
                        <source srcset="/ShareBooks/Public/Uploads/lImg/<?php echo ($data['img_url']); ?>" media="(min-width:50em)">
                        <source srcset="/ShareBooks/Public/img/ad001-m.png" media="(min-width:30em)">
                         <img src="/ShareBooks/Public/img/ad001.png" alt="2017年度报告">
                    </picture>                                                     
                 </div><?php endforeach; endif; else: echo "" ;endif; ?>
            <!--  <div class="item">
                    <picture>
                          <source srcset="/ShareBooks/Public/img/ad002-l.png" media="(min-width:50em)">
                         <source srcset="/ShareBooks/Public/img/ad002-m.png" media="(min-width:30em)">
                         <img src="/ShareBooks/Public/img/ad002.png" alt="红包吗">
                    </picture>
                </div>
                 <div class="item">
                    <picture>
                          <source srcset="/ShareBooks/Public/img/ad003-l.png" media="(min-width:50em)">
                         <source srcset="/ShareBooks/Public/img/ad003-m.png" media="(min-width:30em)">
                           <img src="/ShareBooks/Public/img/ad003.png" alt="平时打的">
                    </picture>
                </div> -->
            </div>
        </div>



        <div class="notice clearfix">
            <a href="#">
            <span><?php echo (substr($notice[0]['notice_date'],0,10)); ?></span>
            <span><?php echo ($notice[0]['notice_content']); ?></span>
            </a>
            <a href="javascript:void(0)" class="more">更多公告</a>
        </div>
        <div class="more-notice">
                <ul class="u-notice">
                    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "没有新公告" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><li>
                            <span>
                                <?php echo (substr($data['notice_date'],0,10)); ?></span>
                            <span>
                                <?php echo ($data['notice_content']); ?>
                            </span>
                        </li><?php endforeach; endif; else: echo "没有新公告" ;endif; ?>
                </ul>
        </div>
        <section class="product clearfix">
            <h2>
                Books
                <em>在此为你</em>
                <em>甄选更好的</em>

            </h2>
            <div class="product-content">
                <?php if(is_array($zx)): $i = 0; $__LIST__ = $zx;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$zx): $mod = ($i % 2 );++$i;?><div class="item clearfix">
                    <div class="img-book">
                        <a href="<?php echo U('Zhenxuan/zxDetail',array('id'=>$zx['zx_id']));?>" class="img" target="_blank">
                            <img src="/ShareBooks/Public/Uploads/zxImg/<?php echo ($zx['img_url']); ?>" alt="金钱">
                        </a>
                    </div>
                    <div class="info">
                            <p class="title">书名：
                        <span class="title-r">
                            <a href="<?php echo U('Zhenxuan/zxDetail',array('id'=>$zx['zx_id']));?>" target="_blank"><?php echo ($zx['book_name']); ?></a>
                        </span>
                        </p>
                        <p class="author">作者：
                            <span class="author-r">
                                <a href="<?php echo U('Zhenxuan/zxDetail',array('id'=>$zx['zx_id']));?>" target="_blank"><?php echo ($zx['book_author']); ?></a>
                            </span>
                        </p>
                         <p>价格：
                            <span class="price-r">
                                <span class="sign">
                                ¥
                                </span>
                                <span class="num"><?php echo ($zx['book_price']); ?></span>
                            </span>
                        </p>
                    </div>
                     <div class="recommend">
                        <p>推荐理由：
                            <span class="describe">
                               <?php echo ($zx['book_recommend']); ?>
                            </span>
                        </p>
                        <p class="tag">
                            标签：
                            <button class="btn"><a href="#"><?php echo ($zx['catname']); ?></a></button>
                        </p>
                    </div>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
                  
            </div>
        </section>

    </div>
    <!-- end of .container -->
    </div>
    <!-- end of index-tab -->



    
    <footer>
        <p>制作者：陈汉林 2016-2017</p>
    </footer>
    <!-- bulid:js js/combined.js -->
   
</body>
 <script src="/ShareBooks/Public/js/vendor/jquery-3.1.1.min.js"></script>
<script src="/ShareBooks/Public/js/vendor/OwlCarousel2-2.2.1/dist/owl.carousel.min.js"></script>
<script src="/ShareBooks/Public/js/vendor/picturefill.min.js"></script>
<script src="/ShareBooks/Public/js/main.js"></script>
    <!-- endbulid -->
<script>
        var url = "<?php echo U('User/index');?>";
</script>
</html>