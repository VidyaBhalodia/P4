@extends('layouts.master')

@section('title')
    {{$title}}
@stop


@section('content')
        <h1> {{ $title or "" }}</h1>
		
		<b>Hospital Name : {{ $hospitals->facility_name or ""}} <br>
		Contact Name : {{ $hospitals->contact_name or ""}} <br>
		Contact Email : {{ $hospitals->contact_email or ""}}<br>
		
		@if( ($hospitals->degree) === 1) 
			Degree Requirement : Yes <br>
		@else  
			Degree Requirement : No <br>
		@endif
		 
		@if( ($hospitals->license) === 1) 
			License Requirement : Yes <br>
		@else  
			License Requirement : No <br>
		@endif

		@if( ($hospitals->reference) === 1) 
			Reference Requirement : Yes <br>
		@else  
			Reference Requirement : No <br>
		@endif

		Credentialing Fee : {{ $hospitals->fee or ""}}<br>	</b>
		
@stop

</body>
</html>