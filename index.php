<?php
	// This can be set here or in the parent folder's index.php file
	// $root = "dev-home";
	
	$vhosts_file = "$root/vhosts.php";
	
	$apache = preg_replace("/\//", " ", preg_split("/ /", $_SERVER['SERVER_SOFTWARE']));
	
	$conn = mysql_connect("localhost", "dev-home", "");
	$result = mysql_query("SELECT VERSION()");
	$mysql_version = mysql_fetch_row($result);
	
	function in_arrayi($needle, $haystack) {
		return in_array(strtolower($needle), array_map('strtolower', $haystack));
	}

	$ignore = array('.','..', 'images', 'protected', 'phpMyAdmin', 'dev-home', 'dummyimage', 'AndrewHeiss');
	
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
					<p>Set up a <a href="http://www.gridsystemgenerator.com/" title="Grid System Generator">custom grid</a>, use the responsive <a href="http://goldengridsystem.com/">Gold Grid</a>, or just stick with the über awesome <a href="http://www.1kbgrid.com/" title="The 1KB CSS Grid by Tyler Tate">1 KB Grid</a>.</p>
					<p>Magic <a href="http://adaptive-images.com/">adaptive image system</a> for serving different sizes of images.</p>
					<p><a href="http://www.alistapart.com/articles/responsive-web-design/">Responsive web design.</a> <a href="http://paulirish.com/2011/tiered-adaptive-front-end-experiences/">Tiered, adapted front-end experiences.</a></p>
					<p>Create beautiful color schemes with <a href="http://colorschemedesigner.com/" title="Color Scheme Designer">Color Scheme Designer</a> or <a href="http://kuler.adobe.com/" title="Kuler">Kuler</a>.</p>
					<p>Share and create color schemes with <a href="http://whatcolor.heroku.com/aaa/bbb/ccc/ddd/eee/fff">Whatcolor</a>.</p>
					<p>CSS3 magic: <a href="http://css3generator.com/">CSS3 generator</a>, <a href="http://css3pie.com/">CCS3 PIE</a></p>
					<p>Generate awesome dummy images: (<a href="http://img/200x250">http://img/200x250</a>, <a href="http://img/300">http://img/300</a>)</p>
					<p>Download some <a href="<?php echo $root; ?>/sample-text.txt">sample text</a> to use for CSS styling, or just generate some bite-sized dummy HTML from <a href="http://html-ipsum.com/" title="HTML-Ipsum">HTML Ipsum</a>.</p>
					<p><a href="http://www.fillerati.com/">Unboring filler text</a></p>
					<p><a href="http://baconipsum.com/?paras=5&amp;type=all-meat&amp;start-with-lorem=1">Bacon lorem ipsum</a></p>
					<p>Share web pages in simulated resolutions with <a href="http://www.simures.com/">simures</a></p>
					<p><a href="http://enterprise-html.com/">Snarky worst practices</a></p>
					<p><a href="http://webstyleguide.com/wsg3/index.html">Web Style Guide 3</a></p>
					<p><a href="http://sonspring.com/journal/formalize-css">Formalize CSS</a> - <a href="http://harvesthq.github.com/chosen/">Chosen (for select boxes)</a></p>
					
					<h3>Drupal resources</h3>
					<ul>
						<li><a href="<?php echo $root; ?>/deploying-drupal-sites.txt"><strong>Clone and deploy a Drupal site!</strong></a></li>
						<li><a href="https://members.nearlyfreespeech.net/wiki/Applications/Drupal">Installing Drupal on NFSN</a> - <a href="http://www.mik-maq.com/romaq/book-page/33/drupal-7-nearly-free-speech-dot-net">Better tutorial</a></li>
						<li><a href="http://aloha-editor.org/">Aloha Editor (awesome!)</a></li>
						<li><a href="http://drupal.org/node/144643">Install Drupal in a subdirectory (but appear in root)</a></li>
					</ul>
					
					<h3>Lintyness</h3>
					<ul>
						<li><a href="http://html5.validator.nu/">HTML5 validator</a></li>
						<li><a href="http://lint.brihten.com/html/">HTML Lint</a></li>
						<li><a href="http://csslint.net/">CSS Lint</a></li>
					</ul>
					
					<h3>HTML5 Goodness</h3>
					<p><a href="http://code.google.com/webfonts">Google's hosted @font-face fonts</a></p>
					<ul>
						<li>Papa Bear: <a href="http://html5boilerplate.com/">HTML5 Boilerplate</a></li>
						<li>Mama Bear: <a href="http://html5reset.org/">HTML5 Reset</a></li>
						<li>Baby Bear: <a href="http://github.com/dcneiner/html5-site-template">HTML5 site template</a></li>
					</ul>
					<p><a href="http://www.colorzilla.com/gradient-editor/">CSS3 Gradient Generator (à la CS)</a></p>
					<p><a href="http://html5reset.org/">HTML5 Reset folder structure</a></p>
					<p><a href="http://www.fontspring.com/blog/the-new-bulletproof-font-face-syntax">New bullteproof @font-face syntax</a></p>
					
					<h3>IE6 workarounds</h3>
					<ul>
						<li><a href="http://allinthehead.com/retro/338/supersleight-jquery-plugin">Supersleight Javascript</a></li>
						<li><a href="http://forabeautifulweb.com/blog/about/universal_internet_explorer_6_css">Plain universal IE6 CSS</a></li>
					</ul>
					
					<h3>Responsive Web Design</h3>
					<ul>
						<li><a href="http://mattkersley.com/responsive/">Responsive site testing</a></li>
						<li><a href="http://www.alistapart.com/articles/responsive-web-design/">ALA on responsive web design</a></li>
						<li><a href="http://www.webdesignshock.com/responsive-web-design/">Good summary</a></li>
					</ul>
					
					<h3>SEO</h3>
					<ul>
						<li><a href="http://mattgemmell.com/2011/09/20/seo-for-non-dicks/">SEO for non-dicks</a></li>
					</ul>
				</div>
				
				<div class="column grid_3">
					<h3>Tools</h3>
					<ul class="tools">
						<li><a href="<?php echo $root; ?>/phpinfo.php">phpinfo()</a></li>
						<li><a href="phpmyadmin/">phpMyAdmin</a></li>
					</ul>
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
					
					<h3>Git reminders</h3>
					<p><a href="http://book.git-scm.com/3_basic_branching_and_merging.html">Basic branching and merging</a></p>
					<p><a href="http://help.github.com/forking/">Forking</a></p>
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