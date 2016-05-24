
<html>
	<head>
		<meta charset="UTF-8">
		<title>
		Admin Panel
		</title>
		<link rel="stylesheet" type="text/css" href="/lib/design_file/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="/lib/design_file/css/bootstrap-theme.min.css" />
		<link rel="stylesheet" type="text/css" href="/lib/design_file/css/admin.css" />
		<link rel="stylesheet" type="text/css" href="/lib/design_file/css/upload.css" />
		<script src="/lib/design_file/js/jquery-2.2.3.min.js"></script>
		<script src="/lib/design_file/js/bootstrap.min.js"></script>
		<script src="/lib/design_file/js/featuredUpload.js"></script>
		<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.css" rel="stylesheet">
		<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.js"></script>
		
		
	</head>
	<div class="container custom_con">
    <nav class="navbar navbar-default navbar-xs" role="navigation">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="/index.php?query=admin"><b>Admin</b> Panel</a>
  </div>
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav pull-right">
	<li class="dropdown-toggle" data-toggle="dropdown"><a href="#">Add <span class="caret"></span></a></li>
      <ul class="dropdown-menu">
      <li><a href="/index.php?query=admin&data=add.post">Add new post</a></li>
      <li><a href="#">All post</a></li>
      <li role="separator" class="divider"></li>
      <li class="dropdown-header">Page</li>
      <li><a href="/index.php?query=admin&data=add.page">Add new page</a></li>
      <li><a href="#">All page</a></li>
      </ul>
	  <li><a href="#">Settings</a></li>
      <li><a href="#">Logout</a></li>
    </ul>
  </div>
</nav>
</div>

<body>
	<?php
		$admin = new admin;
		$source = isset($_GET['data']);
		if(empty($source)){
			$lib = 'z_index';
			$admin->_lib($lib);
		} else {
		$admin->_lib($_GET['data']);
		}
	?>
</body>
</html>

