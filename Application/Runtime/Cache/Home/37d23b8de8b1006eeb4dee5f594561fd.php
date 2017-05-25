<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>读书笔记</title>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" type="text/css" href="/ShareBooks/Public/css/article.css">
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
	<div class="container">	
		<div class="article">
		<h1>
			今日精选
		</h1>
			<ul>
			  <?php if(is_array($artList)): $i = 0; $__LIST__ = $artList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$artList): $mod = ($i % 2 );++$i;?><li>
					<div class="title">
						<h2>
						<a href="<?php echo U('Article/articleDetail',array('art_id'=>$artList['art_id'],'userid'=>$artList['userid']));?>" target="_blank"><?php echo ($artList['title']); ?></a>
						</h2>	
					</div>
					<div class="detail">
						<div class="publish-user">
							<span>发布者：</span>
							<span><?php echo ($artList['username']); ?></span>
						</div>
						<div class="publish-time">
							<span>发布时间：</span>
							<span><?php echo (substr($artList['create_time'],0,10)); ?></span>
						</div>
					</div>
					<div class="content">
						<span><?php echo ($artList['content']); ?></span>
					</div>
				</li><?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>
			
		</div>
	</div>
	<footer>
        <p>制作者：陈汉林 2016-2017</p>
    </footer>
</body>
 <script src="/ShareBooks/Public/js/vendor/jquery-3.1.1.min.js"></script>
 <script src="/ShareBooks/Public/js/article.js"></script>
</html>