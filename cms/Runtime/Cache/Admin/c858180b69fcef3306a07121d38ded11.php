<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
	<head>
		<title><?php echo ($site['name']); ?></title>
		<meta charset="utf-8">
    <meta Http-Equiv="Cache-Control" Content="no-cache">
    <meta Http-Equiv="Pragma" Content="no-cache">
    <meta Http-Equiv="Expires" Content="0"> 
		<meta name="description" content="<?php echo ($site['description']); ?>">
		<meta name="keyword" content="<?php echo ($site['keyword']); ?>">
		<meta name="author" content="Jianbo.me">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="stylesheet" type="text/css" href="/shanshuiyuntian/static/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/shanshuiyuntian/static/admin/css/style-1.0.0.css">
    <link rel="shortcut icon" href="favicon.ico">
    <script src="/shanshuiyuntian/static/js/jquery1.11.1.min.js"></script>
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>

 <!-- Fixed navbar -->
    <div class="navbar navbar-default" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/shanshuiyuntian/admin.php/Admin"><?php echo ($site['name']); ?></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li <?php if(($active) == "posts"): ?>class="active"<?php endif; ?> ><a href="/shanshuiyuntian/admin.php/Admin/Post">内容管理</a></li>
            <li <?php if(($active) == "terms"): ?>class="active"<?php endif; ?> ><a href="/shanshuiyuntian/admin.php/Admin/Category">分类管理</a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right">

            <li <?php if(($active) == "my"): ?>class="active"<?php endif; ?> ><a href="/shanshuiyuntian/admin.php/Account/Profile" title="我的账号"><?php echo ($current_user['display_name']); ?></a></li>
            <li><a href="/shanshuiyuntian/admin.php/Account/Logout" title="退出登录"><i class="glyphicon glyphicon-off"></i></a></li>
          </ul>
          
        </div><!--/.nav-collapse -->
      </div>
    </div>	
	<div class="container">
	<div class="row">
		<div class="col-sm-6">
			<form class="form-inline" action="/shanshuiyuntian/admin.php/Admin/Post/index" method="GET" role="form">
			<div class="form-group">
				<a href="/shanshuiyuntian/admin.php/Admin/Post/add" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i> 发布内容</a>
			</div>
			<div class="form-group">
				<select name="status" class="form-control">
					<option value="publish" <?php if(($param['status']) == "publish"): ?>selected="selected"<?php endif; ?> >已发布</option>
					<option value="draft" <?php if(($param['status']) == "draft"): ?>selected="selected"<?php endif; ?> >草稿箱</option>
					<option value="trash" <?php if(($param['status']) == "trash"): ?>selected="selected"<?php endif; ?> >回收站</option>
				</select>
			</div>
			<div class="form-group">
				<select name="category" class="form-control">
					<option value="">全部分类</option>
					<?php if(is_array($category)): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>" class="option-level-<?php echo ($vo["level"]); ?>" <?php if(($vo["id"]) == $param['category']): ?>selected="selected"<?php endif; ?> ><?php echo ($vo["html"]); echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
				</select>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-default">筛选</button>
			</div>
		</form>
		</div>
		<div class="col-sm-6">
			<form class="form-inline pull-right" action="/shanshuiyuntian/admin.php/Admin/Post/index" method="GET" role="form">
				<div class="form-group">
					<div class="input-group">
						<input type="text" name="title" id="search-input" placeholder="搜索标题" class="form-control" value="<?php echo ($param["title"]); ?>">
						<span class="input-group-btn">
							<button class="btn btn-default" type="submit" ><i class="text-muted glyphicon glyphicon-search"></i></button>
						</span>
					</div>
				</div>
			</form>
		</div>
	</div>
	<hr>
	</div>

	<div class="container">
	<form action="/shanshuiyuntian/admin.php/Admin/Post/doReset" method="POST">
		<div class="form-inline  mb-10">
			<div class="form-group">
				<select name="status" class="form-control">
					<option value="">批量操作</option>
					<option value="publish">发布</option>
					<option value="draft">草稿</option>
					<option value="trash">回收站</option>
					<option value="delete">删除</option>
				</select>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-default">应用</button>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<table class="table table-hover post-list">
					<thead>
						<tr>
							<th class="td-xs text-center"><label><input type="checkbox" select-all="[name='id[]']"></label></th>
							<th class="text-muted">标题</th>
							<th class="td-sm text-muted">发布时间</th>
							<th class="td-sm text-muted">操作</th>
						</tr>
					</thead>
					<tbody>
						<?php if(is_array($posts)): $i = 0; $__LIST__ = $posts;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
							<td class="text-center"><label><input type="checkbox" name="id[]" value="<?php echo ($vo["id"]); ?>"></label></td>
							<td><?php echo ($vo["title"]); ?></td>
							<td>
								<?php echo ($vo["date"]); ?>
							</td>
							<td>
							<div class="btn-group">
								<a href="/shanshuiyuntian/admin.php/Admin/Post/edit/id/<?php echo ($vo["id"]); ?>" class="btn">编辑</a>
							</div>
							</td>
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>
					</tbody>
				</table>
				
			</div>
		</div>
	</form>
	<div class="text-center">
		<div class="btn-group"><?php echo ($page); ?></div>
	</div>
</div> <!-- /container -->  

<script type="text/javascript">
	//全选 checkbox
	$(document).ready(function(){
		$('[select-all]').change(function(){
			var isSelectAll = $(this).prop("checked");
			$target = $($(this).attr('select-all'));
			$target.prop("checked", isSelectAll)
		});

		$('[clear-value]').click(function(){
			$target = $($(this).attr('clear-value'));
			$target.val('');
		});
	});
</script>

<div class="footer">
      <p>Develop By <a href="http://jianbo.me" target="_blank">Jianbo.me</a>  </p>
      <p>
      	Version 1.1
      	<a href="http://opensource.org/licenses/MIT" target="_blank">MIT License</a>
      </p>
    </div>
  
 	<script src="/shanshuiyuntian/static/js/bootstrap.min.js"></script>
 	<script src="/shanshuiyuntian/static/admin/js/admin.js"></script>
	</body>
</html>