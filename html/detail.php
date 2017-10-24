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
	<div class="top-nav-container navbar">
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
		<?php $data = $tea[$_GET['id']];?>
		<div class="main-right">
			<div class="row">
				<div class="col-xs-6 bg-gray detail-left">
					<div class="pruduct-excerpt">
						<div class="cover">
							<div class="cover-front"><img src="<?php echo $data['cover']; ?>"></div>
							<div class="cover-list">
								<div class="col-sm-3">
									<div class="row  cover-list-img">
										<a href="#"><img src="<?php echo $data['cover']; ?>"></a>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="row  cover-list-img">
										<a href="#"><img src="<?php echo $data['cover']; ?>"></a>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="row  cover-list-img">
										<a href="#"><img src="<?php echo $data['cover']; ?>"></a>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="row  cover-list-img">
										<a href="#"><img src="<?php echo $data['cover']; ?>"></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 bg-gray">
					<div class="pruduct-excerpt">
						<div class="">
						<?php if($data['new']){ ?><i class="new-product">新品</i><?php };?>
						<p class="title"><?php echo $data['name']; ?></p>
						<div class="description"><?php echo $data['description']; ?></div>	
					</div>
					</div>
				</div>
				<div class="col-xs-12 mt-20">
					<hr>
				</div>
				<div class="col-xs-12 mt-20">
					<div class="content"><?php echo $data['content']; ?></div>
				</div>
			</div>
		</div>
	</div>
	<div class="footer">
		<p>山水云天 &copy; 版权所有 2014 | Design By <a href="http://jianbo.me" target="_blank">Jianbo.me</a></p>
	</div>
	<script type="text/javascript" src="./static/js/main.js"></script>
</body>
</html>