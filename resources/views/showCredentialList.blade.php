@extends('layouts.master')

@section('title')
    {{$title}}
@stop


@section('content')
        <h1>{{ $title or ""}}</h1>	
		@foreach($credentials as $credential)
			<b> {{ $credential->facility_name or "Default Message" }} <b><br>
		@endforeach
		
@stop



</body>
</html>