<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>书籍详情页</title>
    <link rel="stylesheet" href="/ShareBooks/Public/css/bookDetail.css">
</head>
<body>
    <header>
      <nav class="top clearfix">
            <span class="location">你的位置：广州大学</span>
            <ul>
                <li><a href="#">欢迎回来！</a></li>
                <li><a href="../User/login.html"><?php echo (session('account')); ?></a></li>
                <li><a href="#">购物车</a></li>
                <li><a href="#">我的书库</a></li>
                <li><a href="../User/login.html">退出</a></li>
            </ul>
        </nav>
        <div class="main">
            <a href="#" class="brand"><img src="/ShareBooks/Public/img/logo.png" alt="回到首页"></a>
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
            <div class="level-one-left">
                <div class="book-img">
                    <img src="/ShareBooks/Public/img/defaultBook.png" alt="">
                </div>
            </div>
            <div class="level-one-center">
                <div class="book-detail clearfix">
                    <div class="book-title">
                        <div class="main-title">
                            <h1>《解忧杂货店》</h1>
                        </div>
                        <div class="sub-title">
                            <h2>东野圭吾的另外一个新作·东野圭吾的另外一个新作</h2>
                        </div>
                    </div>
                    <div class="book-info clearfix">
                        <div class="author">
                            <span>作者：</span>
                            <span class="author-r">(日)东野圭吾</span>
                        </div>
                        <div class="publish">
                            <span>出版社：</span>
                            <span class="publish-r">人民邮电出版社</span>

                        </div>
                    </div>
                    <div class="transition clearfix">
                        <div class="tr-place">
                            <span>借阅范围：</span>
                            <span>广州大学</span>
                        </div>
                        <div class="tr-deadline">
                            <span>借阅时长：</span>
                            <span>
                                <select name="" id="deadline">
                                    <option value="10" selected="selected">
                                        10天
                                    </option>
                                    <option value="20">
                                        20天
                                    </option>
                                    <option value="30">
                                        30天
                                    </option>
                                    <option value="40">
                                        40天
                                    </option>
                                    <option value="50">
                                        50天
                                    </option>
                                    <option value="60">
                                        60天
                                    </option>
                                </select>
                            </span>
                        </div>
                    </div>
                    <!-- end of .transition -->
              <!--  <div class="price clearfix">
                        <div class="price-r">
                            <span>借阅价格：</span>
                            <span class="sign">
                                ¥
                            </span>
                            <span class="num">0</span>
                        </div>
                    </div>-->
                </div>
                <!-- end of .book-detail -->
                <div class="book-oper clearfix">
                    <button class="btn-borrow btn">
                            借阅
                    </button>
                    <button class="btn-borrowed btn" style="display: none;">
                            已借出
                    </button>
                </div>
            </div>
            <!-- end of .level-one-center -->
            <div class="level-one-right clearfix">
                <div class="ower-info">
                    <div class="ower-title">
                        <h2>藏书者信息</h2>
                    </div>
                    <div class="ower-detail">
                        <p>
                            <span>藏书者：</span>
                            <span>HanryChen</span>
                        </p>
                         <p>
                            <span>就读在：</span>
                            <span>广州大学</span>
                        </p>
                        <p>
                            <span>藏书量：</span>
                            <span>10</span>
                        </p>
               <!--          <p>
                            <span>信用值：</span>
                            等级
                            <span>1</span>
                            <progress value="22" max="100">
                                <span class="obj-progress">

                                </span>
                            </progress>
                        </p> -->
                        <p>
                            <span>喜欢读：</span>
                            <span>悬疑小说</span>
                        </p>
                        <p>
                            <span>联系ta：</span>
                            <img src="#" alt="">
                            <a href="#"></a>
                        </p>
                        <p>
                            <a href="#">
                            进入ta的书库
                            </a>
                        </p>
                    </div>
                    <!-- end of ower-detail class -->
                </div>
                <!-- end of ower-info class -->
            </div>
            <!-- end of level-one-right class -->
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
                            <a href="javascript:void(0)">收藏者读书心得</a>
                        </li>
                    </ul>
                </div>
                <div class="intro-content">
                    <div class="book-brief tab-content">
                        <span>
                            士大夫哈利法两地分居啊链接发啦放假啦打开房间啊独立开发阶段系啊来开发了开发经理附件啊老费劲啊打开了
                             士大夫哈利法两地分居啊链接发啦放假啦打开房间啊独立开发阶段系啊来开发了开发经理附件啊老费劲啊打开了
                              士大夫哈利法两地分居啊链接发啦放假啦打开房间啊独立开发阶段系啊来开发了开发经理附件啊老费劲啊打开了 士大夫哈利法两地分居啊链接发啦放假啦打开房间啊独立开发阶段系啊来开发了开发经理附件啊老费劲啊打开了
                        </span>
                    </div>
                    <div class="ower-think tab-content" style="display: none;">
                        <span>
                            读完惠普的啊额打开的花费的时间粉红色发货都是开发和
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
                    <a href="">ta的书库</a>
                </li>
                <li>
                    <a href="">借 阅</a>
                </li>
                <li>
                    <a href="index.html">返回首页</a>
                </li>
            </ul>
    </div>
</body>
 <script src="/ShareBooks/Public/js/vendor/jquery-3.1.1.min.js"></script>
 <script src="/ShareBooks/Public/js/bookDetail.js"></script>
<!-- <script>
   $(document).ready(function(){
       $deadline = $(".transition .tr-deadline #deadline option");
       var lastIndex = 0;
       var dlValue = $deadline.eq(lastIndex).val();
       $price = $(".price .price-r .num");
       if(lastIndex != 0 || lastIndex != $(this).index()){
            if(dlValue == (lastIndex + 1)*10){
                $price.text((lastIndex+1).toString());
                $deadline.eq(lastIndex).removeAttr("selected");
            }

            lastIndex = $(this).index();
            $deadline.eq(lastIndex).attr("selected","selected");
       }





       // switch(dlValue){
       //      case 10:
       //          $price.text("0");
       //          break;
       //      case 20:
       //          alert("jajws");
       //          $price.text("2");
       //          break;
       //      default:
       //          break;
       //}

    });

</script> -->
</html>