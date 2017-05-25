<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>文章详细</title>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" type="text/css" href="/ShareBooks/Public/css/article.css">
</head>
<body>
	<header>
          <nav class="top clearfix">
            <span class="location">你的位置：广州大学</span>
            <ul>
                <li><a href="#">欢迎回来！</a></li>
                <li><a href="/ShareBooks/index.php/Home/Mine/mine.html" class="account"><?php echo (session('account')); ?></a></li>
                <li><a href="#" target="_blank">购物车</a></li>
                <li><a href="#" target="_blank">我的书库</a></li>
                <li><a href="<?php echo U('Index/logout');?>">注销</a></li>
            </ul>
        </nav>
    </header>
	<div class="container">	
		<div class="article-detail">
		  <?php if(is_array($article)): $i = 0; $__LIST__ = $article;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$article): $mod = ($i % 2 );++$i;?><div class="title">
				<h1><?php echo ($article['title']); ?></h1>
			</div>
			<div class="info">
				<div class="publish-user"> 
					<span>发布者：</span>
						<span><?php echo ($article['username']); ?></span>
				</div>
				<div class="publish-time">
					<span>发布时间：</span>
					<span><?php echo (substr($article['create_time'],0,10)); ?></span>
				</div>
			</div>
			<div class="content">
				<span><?php echo ($article['content']); ?></span>
			</div><?php endforeach; endif; else: echo "" ;endif; ?>
		</div>
	
	</div>

</body>
 <script src="/ShareBooks/Public/js/vendor/jquery-3.1.1.min.js"></script>
</html>