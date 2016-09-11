<!--

	This is a FREE template from GameTemplates.org!
	Removing this copyright or the ones at the bottom
	is AGAINST THE LAW!

	Visit Gametemplates.org for great templates!

-->
<!DOCTYPE html>
<html>
<head>
	<title>Santeria</title>
	<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootswatch/3.3.4/yeti/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<style type="text/css">
		body {
			background-image: url('http://i.imgur.com/cPM8J.jpg');
			background-size: 100%;
		}
		.headLoc {
			padding: 20px 0 20px 0;
			text-align: center;
		}
		h1 {
			font-size: 32px;
		}
		.small {
			font-size: small;
			margin: 0;
		}
	</style>
</head>
<body>
<div class="container headLoc">

</div>
<div class="container">
	<nav class="navbar navbar-default">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#toggle">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">Santeria</a>
		</div>
		<div class="collapse navbar-collapse" id="toggle">
			<ul class="nav navbar-nav">
				<li class="active"><a href="<?php echo base_url('mc/index'); ?>"><i class="fa fa-home"></i> Home</a></li>
				<li><a href="<?php echo base_url('mc/logout'); ?>"><i class="fa fa-comments"></i> Logout</a></li>
			</ul>
		</div>
	</nav>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-warning">
				<div class="panel-heading">Account</div>
				<div class="panel-body">
					<h1>Change Password</h1>
					<hr />
					<p>Halo <?php echo $_SESSION['login'] ?></p>
					<p>
						<form action="<?php echo base_url('mc/cpw'); ?>">
							<input name="password" type="password"/>
							<input type="submit" class="btn btn-primary"/>
						</form>
					</p>
				</div>
			</div>
	<br />
	<div class="panel panel-default">
		<div class="panel-body">
			<p class="small">&copy; Santeria Project - Chaostix 2016</p>
		</div>
	</div>
</div>
</body>
</html>
