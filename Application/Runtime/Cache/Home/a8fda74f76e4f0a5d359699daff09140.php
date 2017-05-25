<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>我的</title>
    <link rel="stylesheet" href="/ShareBooks/Public/css/mine.css">
    <link rel="stylesheet" href="/ShareBooks/Public/css/upload.css">
</head>
<body>
      <header>
        <nav class="top clearfix">
            <span class="location">你的位置：广州大学</span>
            <ul>
                <li><a href="/ShareBooks/index.php/Home/Index/index.html">回到首页</a></li>
                <li><a href="/ShareBooks/index.php/Home/Mine/mine.html" class="account"><?php echo (session('account')); ?></a></li>
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
                        <a href="#">账号信息</a>
                    </li>
                    <li>
                        <a href="#">修改密码</a>
                    </li>
                    <li>
                        <a href="#">读书笔记</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="container-right">
            <div class="edit-account edit-tab" style="display: block;">
                <div class="e-touxiang">
                    <a href="#" class="img">
                        <img src="/ShareBooks/Public/img/default.jpg" alt="">
                    </a>
                </div>
                <div class="e-base edit">
                    <ul class="u-base">
                        <li class="l1">
                            <div class="d1">
                                <span>账户名:</span>
                                    <input type="text" value="<?php echo (session('account')); ?>">
                                    <span class="err-userName" style="color: red"></span>
                            </div>
                        </li>
                    </ul>
                     <button class="a-btn btn" type="submit">
                        修改
                    </button>
                </div>
            </div>
          <!-- end of edit-account -->
          <div class="edit-password edit-tab" style="display:none;">
              <div class="e-password edit">
                  <ul class="u-password">
                        <li class="l1">
                            <div class="d1 old-pass">
                                <span>原密码:</span>
                                <input type="password">
                                <span class="err err-oPass"></span>
                            </div>
                        </li>
                        <li class="l1">
                            <div class="d1 new-pass">
                                <span>新密码:</span>
                                <input type="password">
                                <span class="err err-nPass"></span>
                            </div>
                        </li>
                         <li class="l1">
                            <div class="d1 confirm-pass">
                                <span>确认密码:</span>
                                <input type="password">
                                <span class="err err-cPass"></span>
                            </div>
                        </li>
                    </ul>
                    <button class="p-btn btn" type="submit">
                        提交
                    </button>
              </div>
          </div>
          <!-- end of edit-password -->
            <div class="edit-article edit-tab" style="display: none;">
                    <div class="e-article">
                        <h2 class="edit-square">编辑文章</h2>
                        <div class="add-article">
                            <h3>发布新文章</h3>
                            <div class="publish-title">
                                <span>文章标题： </span>
                                <input type="text">
                            </div>
                             <div class="publish-content">
                                 <span>文章内容：</span>
                                  <textarea name="" id="" cols="140" rows="20"></textarea>
                              </div>
                              <button class="p-btn btn" type="submit">
                                发布
                             </button>
                        </div>
                        <!-- end of add-notice -->
                        <div class="del-article">
                            <div class="delete-article">
                                <h3>删除文章</h3>
                                <span class="s-time">时间</span>
                                 <span class="s-content">文章标题</span>
                                <ul class="clearfix">
                                   <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "没有新文章" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><li>
                                        <span><?php echo (substr($data['create_time'],0,10)); ?></span>
                                        <span>
                                       <?php echo ($data['title']); ?>
                                        </span>
                                        <a class="del">删除</a>
                                    </li><?php endforeach; endif; else: echo "没有新文章" ;endif; ?>
                                
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- end of e-article -->
            </div>
        </div>
        <!-- end of container-right -->
    </div>
    <!-- end of container -->
</body>
<script src="/ShareBooks/Public/js/vendor/jquery-3.1.1.min.js"></script>
<script>
    var editPass = "<?php echo U('Mine/editPass');?>";
    var editAccount = "<?php echo U('Mine/editAccount');?>";
    var saveNewPass = "<?php echo U('Mine/saveNewPass');?>";
    var editArticle = "<?php echo U('Mine/editArticle');?>";
    var deleteArticle = "<?php echo U('Mine/deleteArticle');?>"; 
</script>
<script src="/ShareBooks/Public/js/mine.js"></script>
<script src="/ShareBooks/Public/js/upload.js"></script>
<script>

</script>

</html>