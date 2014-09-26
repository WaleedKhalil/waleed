<!DOCTYPE html>

<html>

<head>
	<title>Login Page</title>
</head>

<body>


	{{ Form::open(array('action'=>'login','method'=>'POST')) }}

	{{ Form::token() }}

	<h2>Enter your login credentials</h2>

	<p>
		{{ Form::label('username','Username') }}<br />
		{{ Form::text('username') }}
	</p>

	<p>
		{{ Form::label('password','Password') }}<br />
		{{ Form::password('password') }}
	</p>

	<p>
		{{ Form::submit('Login') }}
	</p>

	{{ Form::close() }}