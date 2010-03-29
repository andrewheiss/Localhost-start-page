<?php

	$vhosts_file = "$root/vhosts.php";
	
	$apache = preg_replace("/\//", " ", preg_split("/ /", $_SERVER['SERVER_SOFTWARE']));
	
	$conn = mysql_connect("localhost", "root", "");
	$result = mysql_query("SELECT VERSION()");
	$mysql_version = mysql_fetch_row($result);
	
	function in_arrayi($needle, $haystack) {
        return in_array(strtolower($needle), array_map('strtolower', $haystack));
    }

	$ignore = array('.','..', 'images', 'protected', 'phpMyAdmin', 'dummyimage', 'AndrewHeiss');
	
	$vhosts = file($vhosts_file);
	foreach ($vhosts as $line) {
		if (preg_match('/http:\/\/(.*?)[\/"]/', $line, $matches)) {
			$ignore[] = $matches[1];
		}
	}
	
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>Andrew's Development Server</title>
		<link href="<?php echo $root; ?>/styles.css" rel="stylesheet" type="text/css" />
		<link rel="icon" href="<?php echo $root; ?>/images/favicon.ico" type="image/x-icon" />
		<link rel="shortcut icon" href="<?php echo $root; ?>/images/favicon.ico" type="image/x-icon" />
	</head>
	<body>
		<div id="wrapper">
			<div id="header" class="row">
				<h1>Andrew's Development Server</h1>
				<h2>My Rockin' Homegrown MAMP Stack</h2>
			</div>
			<div id="content" class="row">
				<div class="column grid_3">
					<h3>Resources</h3>
					<p>Set up a <a href="http://www.gridsystemgenerator.com/" title="Grid System Generator">custom grid</a>, or just stick with the über awesome <a href="http://www.1kbgrid.com/" title="The 1KB CSS Grid by Tyler Tate">1 KB Grid</a>.</p>
					<p>Download some <a href="<?php echo $root; ?>/sample-text.txt">sample text</a> to use for CSS styling.</p>
					<p>Generate awesome dummy images: (<a href="http://img/200x250">http://img/200x250</a>, <a href="http://img/300">http://img/300</a>)</p>
						
					<h3>Tools</h3>
					<ul class="tools">
						<li><a href="<?php echo $root; ?>/phpinfo.php">phpinfo()</a></li>
						<li><a href="phpmyadmin/">phpMyAdmin</a></li>
					</ul>
				</div>
				
				<div class="column grid_3">
					<h3>Server info</h3>
					<ul class="server">
						<li><a href="http://localhost/manual/"><img src="<?php echo $root; ?>/images/apache.png" alt="Apache" /></a><br /><?php echo $apache[0]; ?></li>
						<li><a href="http://www.php.net/manual/en/"><img src="<?php echo $root; ?>/images/php.png" alt="PHP" /></a><br /><?php echo "PHP ".phpversion(); ?></li>
						<li><a href="http://dev.mysql.com/doc/refman/5.0/en/index.html"><img src="<?php echo $root; ?>/images/mysql.png" alt="MySQL" /></a><br /><?php echo "MySQL $mysql_version[0]<br />"; ?></li>
					</ul>

					<h3>Loaded PHP extensions</h3>
					<ul class="extensions">
						<?php 
							$loaded_extensions = get_loaded_extensions();
							foreach ($loaded_extensions as $extension) {
								echo "<li>$extension</li>"; 
							}
						?>
					</ul>
				</div>
		
				<div class="column grid_3">
					<h3>VirtualHost projects</h3>
					<ul class="projects">
				    	<?php include($vhosts_file); ?>
					</ul>
					
					<h3>Projects in www</h3>
					<ul class="projects">
					<?php
						$dir = opendir(".");
						while ($file = readdir($dir)) {
							if (is_dir($file) && !in_arrayi($file, $ignore)) {    
								echo "<li><a href=\"$file\">$file</a></li>";
							}
						}
						closedir($dir);
					?>
					</ul>
				</div>
			</div>
			<div id="footer" class="row">
				<img src="<?php echo $root; ?>/images/logo.png" alt="Logo" />
			</div>
		</div>
	</body>
</html>