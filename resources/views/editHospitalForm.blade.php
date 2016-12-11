<!DOCTYPE html>
<html>
<head>
    <title>Edit Hospital Requirements</title>
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
        <h1>This Page Contains {{ $message }}</h1>
		<form method='POST' action='/hospitals'>
		    {{ method_field('PUT') }}
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