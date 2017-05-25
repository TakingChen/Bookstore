<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>购物车</title>
	<link rel="stylesheet" href="/ShareBooks/Public/css/shopcar.css">

</head>
<body>
	<table id="cartTable">
		<thead>
			<tr>
				<th><label><input class="check-all check" type="checkbox">&nbsp;全选</label></th>
				<th>商品</th>
				<th>单价</th>
				<th>数量</th>
				<th>小计</th>
				<th>操作</th>
			</tr>
		</thead>
		<tbody>
			<?php if(is_array($items)): $i = 0; $__LIST__ = $items;if( count($__LIST__)==0 ) : echo "没有什么进入你的购物车哦" ;else: foreach($__LIST__ as $key=>$items): $mod = ($i % 2 );++$i;?><tr>
				<td class="checkbox"><input class="check-one check" type="checkbox"></td>
				<td class="goods">
					<img src="<?php echo ($items['item_url']); ?>" alt="">
					<span><?php echo ($items['item_name']); ?></span></td>
				<td class="price"><?php echo ($items['item_price']); ?></td>
				<td class="count">
					<span class="reduce"></span>
					<input class="count-input" type="text" value="<?php echo (substr($items['item_amount'],0,1)); ?>">
					<span class="add">+</span>
				</td>
				<td class="subtotal"><?php echo ($items['item_price']); ?></td>
				<td class="operation"><span class="delete">删除</span></td>
			</tr><?php endforeach; endif; else: echo "没有什么进入你的购物车哦" ;endif; ?>
			
		<!-- 	<tr>
				<td class="checkbox"><input class="check-one check" type="checkbox"></td>
				<td class="goods"><img src="#" alt=""><span>oppoR9s</span></td>
				<td class="price">2888</td>
				<td class="count">
					<span class="reduce"></span>
					<input class="count-input" type="text" value="1">
					<span class="add">+</span>
				</td>
				<td class="subtotal">2888</td>
				<td class="operation"><span class="delete">删除</span></td>
			</tr> -->
		</tbody>
	</table>
	<div class="foot" id="foot">
		<label class="fl select-all"><input class="check-all check" type="checkbox">&nbsp;全选</label>
		<a class="fl delete" id="deleteAll" href="javascript:">删除</a>
		<div class="fr closing">结算</div>
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