@extends('layouts.master')

@section('title')
    Home Page
@stop

@section('content')
	<h1> Welcome to the Credentialing Manager </h1>
	
	<p> Here you can manage the credential requirements and status for your hospitals. </p>
	<p> If you are a new user, click <a href = "/register"> here </a> to register </p>
	<p> If you are an existing user, click <a href = "/login"> here </a> to login and keep your credential information up to date</p>

@endsection
