@extends('layouts.master')

@section('title')
    {{$title}}
@stop

@section('content')
        <h1>{{ $title or ""}}</h1>

		<form method="post" action="/user-credentials">
		    {{ method_field('DELETE') }}
			{{ csrf_field() }}
			Hospital Name : <input type='text' name='hospitalName'><br>
			<input type='submit' value='Submit'>   <input type="reset">
		</form>

 		@if(count($errors) > 0)
			@foreach ($errors->all() as $error)
				{{ $error }}<br>
			@endforeach

		@endif

@stop



</body>
</html>