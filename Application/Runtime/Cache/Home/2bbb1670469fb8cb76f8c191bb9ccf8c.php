<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>订单</title>
	<link rel="stylesheet" href="/ShareBooks/Public/css/shopcar.css">

</head>
<body>
	<div class="order-ship">
		<h3>填写个人信息</h3>
		<hr>
		<div class="trueName info">
			<span>真实姓名</span>
			<input type="text">
		</div>
		<div class="address info">
			<span>配 送 至</span>
			<input type="text">
			<span>详细地址</span>
			<input type="text">
		</div>
		<div class="phone info">
			<span>联系电话</span>
			<input type="text">
		</div>
		
	</div>
	<table id="cartTable">
		<thead>
			<tr>
				<th><label><input class="check-all check" type="checkbox">&nbsp;全选</label></th>
				<th>商品</th>
				<th>单价</th>
				<th>数量</th>
				<th>小计</th>
			</tr>
		</thead>
		<tbody>
			<?php if(is_array($order)): $i = 0; $__LIST__ = $order;if( count($__LIST__)==0 ) : echo "没有什么进入你的购物车哦" ;else: foreach($__LIST__ as $key=>$order): $mod = ($i % 2 );++$i;?><tr>
				<td class="checkbox"><input class="check-one check" type="checkbox"></td>
				<td class="goods">
					<img src="<?php echo ($order['item_url']); ?>" alt="">
					<span><?php echo ($order['item_name']); ?></span></td>
				<td class="price"><?php echo ($order['item_price']); ?></td>
				<td class="count">
					<span class="reduce"></span>
					<input class="count-input" type="text" value="<?php echo (substr($order['item_amount'],0,1)); ?>">
					<span class="add">+</span>
				</td>
				<td class="subtotal"><?php echo ($order['item_price']); ?></td>
			</tr><?php endforeach; endif; else: echo "没有什么进入你的购物车哦" ;endif; ?>
			
		</tbody>
	</table>
	<div class="foot" id="foot">
		<label class="fl select-all"><input class="check-all check" type="checkbox">&nbsp;全选</label>
		<a class="fl delete" id="deleteAll" href="javascript:">删除</a>
		<div class="fr closing">提交订单</div>
		<div class="fr total">合计: ¥<span id="priceTotal">0.00</span></div>
		<div class="fr selected" id="selected">已选商品
			<span id="selectedTotal">0</span>件
			<span class="arrow up">∧</span>
			<span class="arrow down">v</span>
		</div>
		<div class="selected-view">
			<div id="selectedViewList" class="clearfix">
				<!-- <div><img src="#" alt=""><span>取消选择</span></div> -->
			</div>
			<span class="arrow">·<span>·</span></span>
		</div>
	</div>

	
</body>
<script src="/ShareBooks/Public/js/vendor/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="/ShareBooks/Public/js/shopcar.js"></script>
</html>