@extends('layouts.master')

@section('title')
    {{$title}}
@stop

@section('content')
	
    <section>
		<h2> test </h2>
        <h1>This Page Contains {{ $message }}</h1>		
  		<form method='POST' action='/hospitals'>
			{{ csrf_field() }}
			<input type='text' name='hospitalName'>
			<input type='submit' value='Submit'>
		</form>
  </section>


	
    <footer>
        &copy; {{ date('Y') }}
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

</body>
</html>