<!DOCTYPE HTML>
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
			<h1><a href="home" id="logo">Kantor</a></h1>
		</div>

		<!-- Header -->
		<div id="links">
			<a href="home">Home</a>

			{if $is_logged_in && $is_admin}
				<a href="users_view">View Users</a>
				<a href="currencies_view">View Currencies</a>
			{/if}

			{if $is_logged_in}
				<a href="logout">Logout</a>
			{else}
				<a href="login_view">Login</a>
				<a href="register_view">Register</a>
			{/if}
		</div>
	</div>

	{if $is_logged_in}
		<div id="loggedin">
			Logged as: {$user['name']} {$user['surname']}
		</div>
	{/if}

	{if count($msgs->getMessages()) > 0}
		<div id="errors">
			{foreach $msgs->getMessages() as $msg}
				<p>{$msg->text}</p>
			{/foreach}
		</div>
	{/if}


	<!-- Content -->
	<div id="content">
		{block "content"}
		{/block}
	</div>
</body>

</html>