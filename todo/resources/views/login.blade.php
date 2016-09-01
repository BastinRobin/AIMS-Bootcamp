<form action="/login" method="POST">
	{!! csrf_field() !!}
	<input type="text" name="username">
	<input type="password" name="password">
	<button>Submit</button>
</form>