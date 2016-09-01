<?php

use Illuminate\Http\Request;
use App\User;
use App\Profile;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function() {
	
// 	// $users = User::all();
// 	$users = array(
// 		['name' => 'Bastin', 'mark' => 100],
// 		['name' => 'Robin', 'mark' => 80],
// 		['name' => 'Rakesh', 'mark' => 80],
// 		['name' => 'Sam', 'mark' => 60],
// 		['name' => 'Kumar', 'mark' => 40],

// 	);


// 	return view('list', ['title' => 'My todo app', 'users' => $users]);
// });
// 
// 

Route::get('/', function() {

	$profiles = Profile::all();

	$data = array(
		'users' => $profiles,
		'title' => 'My Simple App'
	);

	return view('list', $data);

	
});


Route::get('/add', function() {
	return view('add', ['name' => 'Add User']);
});

Route::post('/add', function(Request $request) {
	$email = $request->get('email');
	$age = $request->get('age');
	$mobile = $request->get('mobile');

	$user = new Profile();
	$user['alt_email'] = $email;
	$user['age'] = $age;
	$user['mobile'] = $mobile;

	$user->save();

	return redirect()->to('/');

});




Route::get('/{id}', function(Request $request, $id) {
	// return Profile::find($id);
	$user = Profile::find($id);

	return view('profile', ['user' => $user]);
});


Route::get('/{id}/delete', function(Request $request, $id) {
	$profile =  Profile::find($id);
	$profile->delete();

	return redirect()->to('/');
});



Route::post('/login', function() {

	$username = $request->get('username');
	$password = $request->get('password');


	if(Auth::attempt(['username' => $username, 'password' => $password])) {
		return redirect('account')->with('message', 'Logging successfully')
	} else {
		return redirect('login')->with('message', 'Something went wrong')
	}

});