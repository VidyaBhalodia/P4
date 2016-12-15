@extends('layouts.master')

@section('title')
    {{$title}}
@stop


@section('content')
        <h1>{{ $title or ""}}</h1>
		<p> Click on hospital name to view requirements </p>
		
		@foreach($hospitals as $hospital)
			<p><a href = "/hospitals/{{ $hospital->id }}" > {{ $hospital->facility_name or "Default Message" }} </a></p>
		@endforeach
		
@stop



</body>
</html>