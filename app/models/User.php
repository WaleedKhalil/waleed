<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends BaseModel implements UserInterface, RemindableInterface
{

	public static $rules = array(
		'username'=>'required|unique:users|alpha_dash|min:4',
		'password'=>'required|alpha_num|between:4,8|confirmed',
		'password_confirmation'=>'required|alpha_num|between:4,8'
	);

	public function questions()
	{
		return $this->hasMany('Question');
	}

	public function answers()
	{
		return $this->hasMany('Answer');
	}


	public function getAuthIdentifier() 
	{
		return $this->getKey();
	}


	public function getAuthPassword() 
	{
		return $this->password;
	}

	
	public function getRememberToken() {}

	
	public function setRememberToken($value) {}

	
	public function getRememberTokenName() {}

	public function getReminderEmail(){}


}