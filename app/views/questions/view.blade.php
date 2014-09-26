<!DOCTYPE html>

<html>

<head>
	<title>{{ $title }}</title>
</head>

<body>


	<div id="answer">

		@if(Auth::check())

			{{ Form::open(array('action'=>'answer', 'method'=>'POST')) }}

			{{ Form::token() }}

			<h2>Answer this question</h2>

			<p>
				{{ Form::label('answer','Answer') }}<br />
				{{ Form::text('answer') }}

				{{ Form::submit('Answer') }}
			</p>

			{{ Form::close() }}

			<h2>Answers by other members</h2>

			@if(count($ans) === 0)
				<p>Sorry, no one has answered this question</p>
			@else
				<ul>
					@for($i = 0; $i < count($ans); $i++)
						<li>
							{{ $ans[$i]['answer'] }}
						</li>
					@endfor
				</ul>

			@endif


		@else
			<h2><p>Please login to view or answer questions.</p></h2>

		@endif

	</div>

</body>

</html>