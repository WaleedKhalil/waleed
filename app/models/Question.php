<?php

class Question extends BaseModel
{
	public static $rules = array(
		'questions' => 'required|min:5|max:255',
		'solved' => 'in:0,1'
	);

	
	public function user(){
		return $this->belongsTo('User');
	}

	public function answer(){
		return $this->hasMany('Answer');
	}

	public static function unsolved()
	{
		//return static::where('solved','=',0)->get();
	}

	public static function myque()
	{
		return static::where('user_id', '=', Auth::user()->id);
	}
}