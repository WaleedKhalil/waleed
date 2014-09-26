<!DOCTYPE html>

<html>

<head>
	<title>{{ $title }}</title>
</head>

<body>

	<h1>
		Welcome
		{{ ucfirst($username) }}!
	</h1>


	<div id="qu">

	@if(count($qu) === 0)
		<p>You have posted no questions yet!</p>
	@else
		<h2>You have asked the following questions</h2>
		<ul>
			@for($i = 0; $i < count($qu); $i++)
				<li>
					{{ $qu[$i]['questions'] }}
				</li>
			@endfor
		</ul>

	@endif

	</div>

</body>

</html>