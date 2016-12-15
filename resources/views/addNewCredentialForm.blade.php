@extends('layouts.master')

@section('title')
    {{$title}}
@stop

@section('content')
        <h1>{{$title or ""}} </h1>
		<form method="post" action="/user-credentials">
			{{ csrf_field() }}
			Hospital Name : <select name ="hospitalName"> 
				<option value =""></option>
				@foreach($hospitalList as $hospital)
					<option value='{{$hospital->facility_name}}'>{{$hospital->facility_name}}</option>
				@endforeach
			</select><br>

				Status : <select name="status">
				<option value=""></option>
				<option value="Active">Active</option>
				<option value="Pending">Pending</option>
				<option value="Expired">Expired</option>
				<option value="NotCredentialed">Not Credentialed</option>
			</select><br>
			Expiration Date : <input type="date" name="expirationDate"><br>
			Follow-Up Date : <input type="date" name="followupDate" 	><br>

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