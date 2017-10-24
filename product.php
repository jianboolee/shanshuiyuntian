<!DOCTYPE HTML>
<html lang="en">
	<head>
		<title>山水云天</title>
		<meta charset="utf-8">
		<meta name="description" content="">
		<meta name="keyword" content="">
		<meta name="author" content="Jianbo.me">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="stylesheet" type="text/css" href="./static/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="./static/css/style-1.0.css">
		<link rel="shortcut icon" href="favicon.ico">
		<script src="./static/js/jquery-1.11.0.min.js"></script>
	</head>
<body>
	<div class="top-nav-container">
		<div class="main">
			<div class="main-left">
				<div class="logo">
					<a href="./"><img src="attachment/logo.png" title="山水云天"></a>
				</div>
			</div>
			<div class="main-right top-nav">
				<ul>
					<li>
						<a href="product.php" class="active">
							<span class="nav-cn">产品</span>
							<span class="nav-en">PRODUCT</span>
						</a>
					</li>
					<li>
						<a href="story.php">
							<span class="nav-cn">品茗会</span>
							<span class="nav-en">STORY</span>
						</a>
					</li>
					<li>
						<a href="agency.php">
							<span class="nav-cn">加盟</span>
							<span class="nav-en">AGENCY</span>
						</a>
					</li>
					<li>

					</li>
					<li>
						<a href="news.php">
							<span class="nav-cn">新闻</span>
							<span class="nav-en">NEWS</span>
						</a>
					</li>
						<li>
						<a href="enterprise.php">
							<span class="nav-cn">企业</span>
							<span class="nav-en">ENTERPRISE</span>
						</a>
					</li>
						<li>
						<a href="contact.php">
							<span class="nav-cn">联系</span>
							<span class="nav-en">CONTACT</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<?php include("./data/product.php"); ?>

	<div class="main mt-40 height-large">
		<div class="main-left">
			<ul class="left-nav">
				<?php foreach ($productList as $key => $value) { ?>
				<li class="subnav subnav-open">
					<a href="#" class="nav-toggle" title="折叠/展开"> <i class="glyphicon glyphicon-chevron-down"></i> <i class="glyphicon glyphicon-chevron-right"></i> </a>
					<a href="product.php?id=<?php echo $value['id']; ?>">  <?php echo $value['name']; ?> </a>
					<ul class="sub-nav">
						<?php foreach ($value['teaList'] as $key => $value2) { ?>
							<li><a href="tea.php?id=<?php echo $value2['id']; ?>"> <?php echo $value2['name']; ?> </a></li>
						<?php }	 ?>
					</ul>
				</li>
				<?php }	 ?>
			</ul>
		</div>
		<div class="main-right">
			<div class="thumb-list row">
				<div class="col-xs-12">
					<div class="thumb-list-title"><?php echo $productList[$_GET['id']?$_GET['id']:1]['name']; ?></div>
				</div>
				<?php foreach ($productList[$_GET['id']?$_GET['id']:1]['teaList'] as $key => $value) { ?>
					<?php foreach ($value['tea'] as $key => $tea) { ?>
					<div class="col-xs-3">
						<a href="detail.php?id=<?php echo $tea['id']; ?>" class="thumb-block">
							<div class="thumb-block-image text-center"><img src="<?php echo $tea['cover']; ?>"></div>
							<div class="thumb-block-title text-center"><?php echo $tea['name']; ?></div>
						</a>
					</div>
					<?php }	 ?>
				<?php }	 ?>
			</div>
		</div>

	</div>
	<div class="footer">
		<p>山水云天 &copy; 版权所有 2014 | Design By <a href="http://jianbo.me" target="_blank">Jianbo.me</a></p>
	</div>
	<script type="text/javascript" src="./static/js/main.js"></script>
</body>
</html>



