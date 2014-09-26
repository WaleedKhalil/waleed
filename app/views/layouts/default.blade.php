<!DOCTYPE html>

<html>
<head>
	<title>{{ $title }}</title>
</head>

<body>

	<div id="container">

		<div id="header">
			<h4>{{ HTML::link('/', 'PentaLoop Q&A') }}</h4>
		</div>

		<div id="nav">
			<ul>
				<h4><li>{{ HTML::linkRoute('home', 'Home') }}</li></h4>
				@if(!Auth::check())
					<h4><li>{{ HTML::linkRoute('register', 'Register') }}</li></h4>
					<h4><li>{{ HTML::linkRoute('login', 'Login') }}</li></h4>
				@else
					<h4><li>{{ HTML::linkRoute('yourques', 'Your Questions') }}</li></h4>
					<h4><li>{{ HTML::linkRoute('logout', 'Logout') }}</li></h4>
				@endif
			</ul>
		</div>

		<div id="content">
			@if(Session::has('message'))
				<p id="message">{{ Session::get('message') }}</p>
			@endif

			@yield('content')

		</div>

	</div>
</body>
</html>

