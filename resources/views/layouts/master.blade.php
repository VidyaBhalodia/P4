<!DOCTYPE html>
<head>
	<link rel="stylesheet" type="text/css" href="/css/style.css">
    <title>  @yield('title','Credential Manager') </title>
    <meta charset='utf-8'>
</head>

<h1> Credential Manager </h1>
<ul>
  <li><a href="/">Home</a></li>
  <li><a href="/login">Login</a></li>
  <li><a href="/hospitals">View All Hospitals</a></li>
  <li><a href="/user-credentials">View My Hospitals</a></li>
  <li><a href="/user-credentials/add">Add Hospital to My List</a></li>
  <li><a href="/user-credentials/edit">Edit Hospital on My List</a></li>
  <li><a href="/user-credentials/delete">Remove Hospital from My List</a></li> 
  <li><a href="/logout">Logout</a></li> 
</ul>

<div style="margin-left:25%;padding:1px 16px;height:1000px;">
    @if(Session::get('flash_message') != null)
        <div class='flash_message'>{{ Session::get('flash_message') }}</div>
    @endif

	@yield('content')

	<footer>
        &copy; {{ date('Y') }}
    </footer>

	</div>

</body>
</html>



    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>
