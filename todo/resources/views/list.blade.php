<title>{{ $title }}</title>
<ul>
	@foreach($users as $user)
			<li>{{ $user['alt_email'] }} <span style="background:green">{{ $user['mobile'] }}</span></li>
	@endforeach
</ul>
<style type="text/css">
	table tr th { border: 1px solid black };
	table tr td { border: 1px solid black };


</style>


<table>
	<thead>
		<tr>
			<th>Id</th>
			<th>User</th>
			<th>Age</th>
			<th>Mobile</th>
			<th>Email</th>
			<th>Profile</th>
			<th>Created</th>
			<th>Updated</th>

		</tr>
	</thead>
	<tbody>
		@foreach($users as $user)
		<tr>
			<td>{{ $user->id }}</td>
			<td>{{ $user->user_id }}</td>
			<td>{{ $user->age }}</td>
			<td>{{ $user->mobile }}</td>
			<td>{{ $user->alt_email }}</td>
			<td>{{ $user->profile_pic }}</td>
			<td>{{ $user->created_at }}</td>
			<td>{{ $user->updated_at }}</td>
			<td><a href="/{{ $user->id }}">View</a></td>
			<td><a href="/{{ $user->id }}/delete">Delete</a></td>
		</tr>
		@endforeach
	</tbody>
</table>