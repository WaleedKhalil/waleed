<?php

class QuestionsController extends BaseController
{

	//public $restful = true;

	public function __construct()
	{
		$this->beforeFilter('auth',['only' => ['postcreate']]);
	}

	public function getindex(){
		$da = Question::where('solved','=',0)->get();

		return View::make('questions.index')
			->with('title', 'PentaLoop Q&A - Home')
			->with('questions', $da);
	}

	public function postcreate()
	{
			$quest = new Question;
			//$validation = $quest::validate(Input::all());

			//if($validation->passes())
			//{
				$quest->questions = Input::get('question');
				$quest->user_id = Auth::user()->id;
				$quest->save();

				return Redirect::route('home')->with('message', 'Your question has been posted!');
			//}
			//else
			//{
				//return Redirect::route('home')->with('message', 'Invalid data or does not meet minimum requirements, try again!');
			//}

	}


	public function getview()
	{
		if(Auth::check())
		{
			$ans = Answer::where('user_id', '=', Auth::user()->id)->get();
			return View::make('questions.view')
			->with('title', 'PentaLoop - View Answers')
			->with('ans', $ans);
		}
		else
		{	$ans=0;
			return View::make('questions.view')
			->with('title', 'PentaLoop - View Answers')
			->with('ans', $ans);
		}
	}

	public function getquestions()
	{

		$daq = Question::where('user_id', '=', Auth::user()->id)->get();
		return View::make('questions.myquest')
		->with('title', 'PentaLoop - Your Questions')
		->with('username', Auth::user()->username)
		->with('qu', $daq);

	}

	public function postanswers()
	{
		$ans = new Answer;	
		$ans->answer = Input::get('answer');
		$ans->user_id = Auth::user()->id;
		//$ans->question_id = Auth::question()->id;
		$ans->save();
		return Redirect::route('home')->with('message', 'Thanks for answering this question!');
	}


}