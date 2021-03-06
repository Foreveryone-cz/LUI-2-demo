<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8" />
	<title>LUI - Less UI</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1" />


	<?php if(0){ ?>
		<link rel="stylesheet/less" href="/demo.less" />
		<script>
			less = {
				env: "development",
				async: false,
				fileAsync: false,
				poll: 1000,
				functions: {},
				dumpLineNumbers: "comments",
				relativeUrls: false
			};
		</script>
		<script src="/js/less/less.min.js" type="text/javascript"></script>

	<?php } else {
		$dir = $_SERVER["DOCUMENT_ROOT"];
		$less_files = "/demo.less";

		$config = array(
			"cache_dir"		=>	$dir . "/_csscache",
			"compress"		=>	true,
			"source_map"	=>	false,
		);

		include_once($dir . "/lessphp/Autoloader.php");
		Less_Autoloader::register();
		$less = new Less_Parser($config->less);

		$less_files = $dir . $less_files;
		$less_files = array($less_files => "/");
		$css_file_name = Less_Cache::Get($less_files, $config);
	
	?>
		<link rel="stylesheet" href="/_csscache/<?php echo $css_file_name; ?>" />
	<?php } ?>

	<script src="/lui2/components/jquery/jquery-2.2.0.min.js"></script>
	<script src="/lui2/components/jquery/jquery-ui.js"></script>

	<!-- COMPONENTS -->
	<script src="/lui2/components/form/form.js"></script>

	<script src="/lui2/components/accordion/accordion.js"></script>


</head>
<body>

	<section class="demo_header">
		<header>
			<img src="/logo.png" alt="Lui 2" class="logo" />
			<a class="github" href="//github.com/Foreveryone-cz/LUI-2" target="_blank">Follow project on GitHub</a>
			<a class="home" href="//<?php echo $_SERVER['SERVER_NAME']; ?>">Home</a>
		</header>
		
	</section>

	
	<section class="container max_xl demo_content">
		<div class="row">
			<div class="col-12">
				<?php
					//print_r(preg_match('/[^A-Za-z0-9#\\-_]/', $_GET["page"]));
					if(isset($_GET["page"]) AND !preg_match('/[^A-Za-z0-9#\\-_]/', $_GET["page"])){
						$page = stripslashes(str_replace('/','',$_GET["page"]));
						$file = $_SERVER['DOCUMENT_ROOT'] . "/demos/".$page.".php";
						include($file);
					}
					else {
						$file = $_SERVER['DOCUMENT_ROOT'] . "/demos/homepage.php";
						include($file);
					}
				?>
			</div>
		</div>
	</section>
	<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	ga('create', 'UA-77419221-1', 'auto');
	ga('send', 'pageview');
	</script>
</body>
</html>