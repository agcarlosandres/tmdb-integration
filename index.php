<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Movie Search</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="ui/css/main.css" />
		<link href="https://fonts.googleapis.com/css?family=Anton|Quicksand" rel="stylesheet"> 
	</head>
	<body>
		<div class="content">
			<div class="content-header">
				<h1>Movie Search</h1>
				<p>Enter the name of an actor or actress</p>			
			</div>
			<div class="content-search">
				<div class="search">
					<input class="data" id="query" placeholder="Enter an actor name"><input type="button" class="btn" value="Search" />
				</div>
			</div>
			<div class="content-result"></div>
			<div class="footer">Data from <a href="https://www.themoviedb.org/" target="_blank">TMDb.</a> </div>
		</div>
		<script type="text/javascript" src="ui/js/jquery-3.1.1.min.js"></script>
		<script type="text/javascript" src="ui/js/main.js"></script>
	</body>
</html>