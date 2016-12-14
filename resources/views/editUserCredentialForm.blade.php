<!DOCTYPE html>
<html>
<head>
    <title>Show Book</title>
    <meta charset='utf-8'>
    <link href="/css/foobooks.css" type='text/css' rel='stylesheet'>
</head>
<body>

    <header>
        <img
        src='http://making-the-internet.s3.amazonaws.com/laravel-foobooks-logo@2x.png'
        style='width:300px'
        alt='Foobooks Logo'>
    </header>

    <section>
	
		@if(count($errors) > 0)
			<ul>
			@foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
			@endforeach
			</ul>
		@endif
		
		<form method="post" action="/user-credentials">
		    {{ method_field('PUT') }}
			{{ csrf_field() }}
			Hospital Name : <input type='text' name='hospitalName'><br>
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

    </section>

    <footer>
        &copy; {{ date('Y') }}
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

</body>
</html>