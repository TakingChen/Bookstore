<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>此刻 你我共享书</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="/ShareBooks/Public/css/login.css">
</head>
<body>
    <div class="index-main">
        <div class="index-header">
            <h1 class="logo hide-text">Books</h1>
            <h1 class="subtitle1">此刻 等待你的“书”入</h1>
        </div>
        <div class="sign-flow">
            <div class="index-tab-navs">
                <div class="navs-slider">
                    <a href="#signup" class="signup active">注册</a>
                    <a href="#signin" class="signin">登陆</a>
                    <span class="navs-slider-bar"></span>
                </div>
            </div>
            <div class="view view-signup" style="display: block;">
                <form action="" method="post">
                    <div class="group-inputs">
                         <div class="username input-wrapper">
                             <input type="text" name="nickname" placeholder="昵称">
                             <span class="no-user"></span>
                             <!-- <label class="error is-visible"></label> -->
                         </div>
                        <!--   <span> hshsh</span> -->
                         <div class="email input-wrapper">
                             <input type="text" name="email" placeholder="请输入正确的邮箱">
                             <span class="no-email"></span>
                             <!-- <label class="error is-visible"></label> -->
                         </div>
                         <div class="password input-wrapper">
                             <input type="password" name="password" placeholder="密码(不少于6位)">
                            <span class="no-pass"></span>
                            <!--  <label class="error is-visible"></label> -->
                         </div>
                         <div class="confirm-pass input-wrapper">
                             <input type="password" name="password" placeholder="再次确认密码">
                            <span class="err-rpwd"></span>
                            <!--  <label class="error is-visible"></label> -->
                         </div>
                    </div>
                    <div class="button-wrapper command">
                        <button class="register-button submit" type="submit">
                        <a href="javascript:void(0)">注册</a>
                        </button>
                    </div>
                </form>
            </div> 
            <!-- end of view-signup -->
             
            <div class="view view-signin" style="display: none;">
                <form action="" method="post">
                    <div class="group-inputs">
                       <div class="account input-wrapper">
                            <input type="text" name="account" placeholder="账号">
                            <span class="err-account"></span>
                        </div>
                        <div class="vertification input-wrapper">
                            <input type="password" name="password" placeholder="密码">              
                            <span class="err-pass"></span>
                        </div>
                    </div>
                    <div class="button-wrapper command">
                        <button class="sign-button submit" type="submit"><a href="javascript:void(0)">登陆</a></button>
                    </div>
                </form>
            </div>
            <!-- end of view-signin -->
            
        </div>
    </div>
    <script src="/ShareBooks/Public/js/vendor/jquery-3.1.1.min.js"></script>
    <script>
        var url = "<?php echo U('User/registerData');?>";
        var saveInfo = "<?php echo U('User/saveInfo');?>";
        var signData = "<?php echo U('User/signData');?>";
        var vertifySign = "<?php echo U('User/vertifySign');?>";
    </script>
    <script src="/ShareBooks/Public/js/login.js"></script>

</body>
</html>