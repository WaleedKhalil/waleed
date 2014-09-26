<!DOCTYPE html>

<html>

<head>
	<title>{{ $title }}</title>
</head>

<body>


	{{ Form::open(array('action'=>'register','method'=>'POST')) }}

	{{ Form::token() }}

	<h1>Please fill the form</h1>

	<p>
		{{ Form::label('username','Username') }}<br />
		{{ Form::text('username') }}
	</p>

	<p>
		{{ Form::label('password','Password') }}<br />
		{{ Form::password('password') }}
	</p>

	<p>
		{{ Form::label('password_confirmation','Confirm Password') }}<br />
		{{ Form::password('password_confirmation') }}
	</p>

	<p>
		{{ Form::submit('Register') }}
	</p>

	{{ Form::close() }}

</body>

</html>
