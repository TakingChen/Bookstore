<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>甄选图书详情页</title>
    <link rel="stylesheet" href="/ShareBooks/Public/css/bookDetail.css">
</head>
<body>
    <header>
         <nav class="top clearfix">
            <span class="location">你的位置：广州大学</span>
             <ul>
                <li><a href="#">欢迎回来！</a></li>
                <li><a href="_#" class="account"><?php echo (session('account')); ?></a></li>
                <li><a href="#" target="_blank">购物车</a></li>
                <li><a href="#" target="_blank">我的书库</a></li>
                <li><a href="<?php echo U('Index/logout');?>">注销</a></li>
            </ul>
        </nav>
        <div class="main">
            <a href="/ShareBooks/index.php/Home/Index/index.html" class="brand"><img src="/ShareBooks/Public/img/logo.png" alt="回到首页"></a>
            <div class="search clearfix">
                <div class="search-box">
                    <input type="text" class="search-book" placeholder="请输入关键字">
                </div>
                <div class="search-button">
                    <button class="do-search" type="submit">搜索</button>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="level-one commonWidth">
           <?php if(is_array($zxbook)): $i = 0; $__LIST__ = $zxbook;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$zxbook): $mod = ($i % 2 );++$i;?><div class="level-one-left">
                <div class="book-img">
                    <img src="/ShareBooks/Public/Uploads/zxImg/<?php echo ($zxbook['img_url']); ?>" alt="">
                </div>
            </div>
            <div class="level-one-center">
         
                <div class="book-detail clearfix">
                    <div class="book-title">
                        <div class="main-title">
                            <h1><?php echo ($zxbook['book_name']); ?></h1>
                        </div>
                        <div class="sub-title">
                            <h2>东野圭吾的另外一个新作·东野圭吾的另外一个新作</h2>
                        </div>
                    </div>
                    <div class="book-info clearfix">
                        <div class="author">
                            <span>作者：</span>
                            <span class="author-r"><?php echo ($zxbook['book_author']); ?></span>
                        </div>
                        <div class="publish">
                            <span>出版社：</span>
                            <span class="publish-r">人民邮电出版社</span>

                        </div>
                    </div>
                    <div class="transition clearfix">
                        <div class="tr-send">
                            <span>配送至：</span>
                            <span>
                                <select name="" id="place">
                                    <option value="10" selected="selected">
                                        广州大学
                                    </option>
                                    <option value="20">
                                        华南师范大学
                                    </option>
                                    <option value="30">
                                        广东工业大学
                                    </option>
                                    <option value="40">
                                        星海学院
                                    </option>
                                    <option value="50">
                                        华南理工大学
                                    </option>
                                    <option value="60">
                                        中山大学
                                    </option>
                                </select>
                            </span>
                        </div>
                        <div class="tr-count">
                            <span>
                                数量：
                            </span>
                            <span class="reduce"></span>
                            <input class="count-input" type="text" value="1">
                            <span class="add">+</span>
                        </div>
                    </div>
                    <!-- end of .transition -->
                    <div class="price clearfix">
                        <div class="price-r">
                            <span>价格：</span>
                            <span class="sign">
                                ¥
                            </span>
                            <span class="num"><?php echo ($zxbook['book_price']); ?></span>
                        </div>
                    </div>
                </div>
                
                <!-- end of .book-detail -->
                <div class="book-oper clearfix">
                    <button class="btn-buy btn">
                           <a href="/ShareBooks/index.php/Home/Shopcar/order.html">立即购买</a>
                    </button>
                    <button class="btn-add btn">
                             加入购物车
                    </button>
                </div>
            </div>
            <!-- end of .level-one-center -->
            <div class="level-one-right clearfix">
                <div class="ower-info">
                    <div class="ower-title">
                        <h2>Books自营</h2>
                    </div>
                    <div class="ower-detail">
                        <p>
                            <span>藏书者：</span>
                            <span>Books</span>
                        </p>
                         <p>
                            <span>总部地址：</span>
                            <span>广州大学</span>
                        </p>
                        <p>
                            <span>藏书量：</span>
                            <span>100+</span>
                        </p>
                <!--         <p>
                            <span>信用值：</span>
                            等级
                            <span>1</span>
                            <progress value="22" max="100">
                                <span class="obj-progress">

                                </span>
                            </progress>
                        </p> -->
                        <p>
                            <span>联系客服：</span>
                            <img src="#" alt="">
                            <a href="#"></a>
                            </img>
                        </p>
                        <p>
                            <a href="#">
                            进入甄选书库
                            </a>
                        </p>
                    </div>
                    <!-- end of ower-detail class -->
                </div>
                <!-- end of ower-info class -->
            </div>
            <!-- end of level-one-right class --><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
        <!-- end of level-one class -->
        <div class="level-two commonWidth">
            <div class="intro-book">
                <div class="intro-title clearfix">
                    <ul class="ul-intro">
                        <li class="active">
                            <a href="javascript:void(0)">本书简介</a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">推荐语</a>
                        </li>
                    </ul>
                </div>
                <div class="intro-content">
                    <div class="book-brief tab-content">
                        <span>
                           <?php echo ($zxbook['book_content']); ?>
                        </span>
                    </div>
                    <div class="ower-think tab-content" style="display: none;">
                        <span>
                            <?php echo ($zxbook['book_recommend']); ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <!-- end of .level-two -->
    </div>
    <!-- end of .container -->
    <div class="base-nav">
            <ul class="ul-base">
                <li>
                    <a href="">客服</a>
                </li>
                <li>
                    <a href="">加入购物车</a>
                </li>
                <li>
                    <a href="">立即购买</a>
                </li>
                <li>
                    <a href="index.html">返回首页</a>
                </li>
            </ul>
    </div>
</body>
 <script src="/ShareBooks/Public/js/vendor/jquery-3.1.1.min.js"></script>
 <script type="text/javascript">
     var editShopcar = "<?php echo U('Shopcar/editShopcar');?>";
     var editOrder = "<?php echo U('Shopcar/editOrder');?>";
 </script>
 <script src="/ShareBooks/Public/js/bookDetail.js"></script>

</html>