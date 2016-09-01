<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use Hash;
use Auth;
use App\Todo;
use App\User;
use App\Http\Requests;

class TodoController extends Controller
{
	// Returns the login template
    public function get_home() {
    	return view('login');
    }


    // Login logic for users
    public function post_login(Request $request) {

    	// Validate all input
    	$validator = Validator::make($request->all(), array(
    			'email' => 'required|email',
    			'password' => 'required'
    		)
    	);

    	if ($validator->fails()) {
    		return redirect()->route('get_home')
    				->withErrors($validator)
    				->withInput();
    	}

    	// Check for user exists in user table
    	$auth = Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')]);
    	
    	// if user exists authenticate and redirect to account page
    	if ($auth) {
    			
    		return redirect()->route('get_account')
    				->with('success', 'You are logged in');

    	} else {
    		return redirect()->route('get_home')
    				->with('error', 'No user account exists. Try again different input');
    	}
    }
    

    // Create account logic
    public function post_signup(Request $request) {


    	// Validate if all inputs are present and check if its valid
    	$validator = Validator::make($request->all(), array(
    						'email' => 'required|email|unique:users',
    						'password' => 'required|min:6|confirmed',
                			'password_confirmation' => 'required|min:6',

    					)
    				);

    	if ($validator->fails()) {
    		return redirect()->route('get_home')
    				->withErrors($validator)
    				->withInput();
    	}

    	// Create a new instance of user model 
    	$user = new User;

    	// Assign models attributes with request attributes
    	$user->email = $request->get('email');
    	$user->name = $request->get('name');
    	$user->password = Hash::make($request->password);

    	// Save the models
    	
    	if ($user->save()) {
    		return redirect()->route('get_account')
    				->with('success', 'Your account was created successfully');
    	} else {
    		return redirect()->route('get_home')
    				->with('error', 'Something went seriously wrong');
    	}

    }


    public function get_account() {
    	$items = Todo::where('user_id', Auth::user()->id)
    				->get();
    	return view('account', ['items' => $items]);
    }

    public function post_new_item(Request $request) {
    	// create new instance of Todo
    	$item = new Todo;

    	// assign attribute to the instance
    	$item->content = $request->get('item');
    	$item->user_id = Auth::user()->id;
    	
    	// save it
    	if ($item->save()) {
    		return redirect()->route('get_account')
    				->with('success', 'New item added into the list');
    	}
    	// redirect to acccount page

    }

    public function get_remove_item(Request $request, $item_id) {
    	// Get the item from todo table using pkey 
    	$item = Todo::find($item_id);
    	// delete it
    	$item->delete();
    	// return to accounts page
    	return redirect()->route('get_account')
    			->with('error', $item_id.' is removed');
    }


    public function get_edit_item(Request $request, $item_id) {
    	// Get the items from table
    	$item = Todo::find($item_id);
    	// Send it to a template 
    	return view('edit', ['item' => $item]);

    }


    public function put_edit_item(Request $request, $item_id) {
    	$item = Todo::find($item_id);

    	$item->content = $request->get('content');

    	if ($item->save()) {
    		return redirect()->route('get_account')
    				->with('success', $item_id. ' is updated');
    	}
    }

    public function get_logout() {
    	// Destroy user session
    	Auth::logout();
    	// Redirect to login page
    	return redirect()->route('get_home')
    			->with('success', 'You are logged out');
    }

}

