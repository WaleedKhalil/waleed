<?php

class UsersController extends BaseController
{


	public function getnew()
	{
		return View::make('users.new')->with('title', 'PentaLoop Registration');
	}


	public function postcreate()
	{
        // create post method

        
		$user = new User;

		$validation = $user::validate(Input::all());

		if($validation->passes())
		{
			$user->username = Input::get('username');
			$user->password = Hash::make(Input::get('password'));
			$user->save();

			$us = $user::where('username', Input::get('username'))->first();
			Auth::login($us);
			return Redirect::route('home')->with('message', 'Thanks for Registering. You are now logged in!');
		}
		else
		{
            // redirect back with errors
			return Redirect::route('home')->with('message', 'Invalid Credentials - Please try again');
		}
	}


	public function getlogin()
	{
		return View::make('users.login')
			->with('title', 'PentaLoop Q&A - Login');
	}


	public function postlogin()
	{

		$username = Input::get('username');

		$password = Input::get('password');


		if(Auth::attempt(array('username' => $username, 'password' => $password)))
		{
			return Redirect::route('home')->with('message', 'You are logged in!');
		}
		else
		{
			return Redirect::route('home')->with('message', 'Your username/password combination was incorrect - Please try again');
		}
	}

	public function getlogout()
	{
		if(Auth::check())
		{
			Auth::logout();
			return Redirect::route('home')->with('message', 'You are now logged out!');
		}
		else
		{
			return Redirect::route('home');
		}
	}

}
