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
            <h1 class="subtitle1">管理员登陆</h1>
        </div>
        <div class="sign-flow">      
            <div class="view view-signin">
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
                        <button class="aSign-button submit" type="submit"><a href="javascript:void(0)">登陆</a></button>
                    </div>
                </form>
            </div>
            <!-- end of view-signin -->
            
        </div>
    </div>
    <script src="/ShareBooks/Public/js/vendor/jquery-3.1.1.min.js"></script>
    <script>
        var url = "<?php echo U('Login/checkAdmin');?>";
        var signData = "<?php echo U('Login/signData');?>";
    </script>
    <script src="/ShareBooks/Public/js/login.js"></script>

</body>
</html>