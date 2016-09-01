<h1>{{ $name }}</h1>
<form action="/add" method="POST">
	{!! csrf_field() !!}
	<label>Email</label>
	<input type="text" name="email">

	<label>Age</label>
	<input type="number" name="age">

	<label>Mobile</label>
	<input type="text" name="mobile">

	<button type="submit">Add</button>
</form>