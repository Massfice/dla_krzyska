<!DOCTYPE HTML>
<!--
	Halcyonic by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
	<title>{$page_title|default:"Tytuł domyślny"}</title>
	<meta name="description" content="{$page_description|default:"Opis domyślny"}">
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="assets/css/main.css" />
</head>

<body>
	<div id="header">
		<div id="logo">
			<h1><a href="main.tpl" id="logo">Kantor</a></h1>
		</div>

		<!-- Header -->
		<div id="links">
			<a href="main.tpl">Home</a>
			<a href="login.tpl">Login</a>
			<a href="singup.tpl">Register</a>
		</div>
	</div>

	<!-- Content -->
	<div id="content">
		{block name=content}
		{/block}
	</div>
</body>

</html>