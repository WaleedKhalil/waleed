<!DOCTYPE html>

<html>

<head>
	<title>{{ $title }}</title>
</head>

<body>

<div id="ask">

	@include('layouts.default')

	@if(Auth::check())

		{{ Form::open(array('action'=>'ask', 'method'=>'POST')) }}

		{{ Form::token() }}

		<h1>Ask a Question</h1>

		<p>
			{{ Form::label('question','Question') }}<br />
			{{ Form::text('question') }}

			{{ Form::submit('Submit') }}
		</p>

		{{ Form::close() }}

		@else
		<p>Please login to ask or answer questions.</p>	

	@endif
</div>

<div id="questions">

	@if(count($questions) === 0)
		<p>No questions have been asked.</p>
	@else
	<h2>Unsolved Questions</h2>
		<ul>
			@for($i = 0; $i < count($questions); $i++)
				<li>
					{{ HTML::linkRoute('answer', $questions[$i]['questions']) }}
				</li>
			@endfor
		</ul>

	@endif
</div>

<div id="footer">
		&copy:PentaLoop Q&A Blog {{ date('Y')}}
</div>

</body>

</html>