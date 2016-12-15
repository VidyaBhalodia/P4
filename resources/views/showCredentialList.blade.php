@extends('layouts.master')

@section('title')
    {{$title}}
@stop


@section('content')
        <h1>{{ $title or ""}}</h1>	
		<table>
		<tr>
			<th> Hospital Name </th> 
			<th> Credential Status </th> 
			<th> Expiration Date </th> 
			<th> Follow-Up Date</th> 
		</tr>
		@foreach($credentials as $credential)
			<tr>
				<td> {{ $credential->facility_name or "" }} </td> 
				<td> {{ $credential->status or "" }}</td> 
				<td> {{ $credential->expiration_date or "n/a" }}</td> 
				<td> {{ $credential->followup_date or "n/a" }} </td> 				
			</tr>
		@endforeach
		</table>
@stop



</body>
</html>