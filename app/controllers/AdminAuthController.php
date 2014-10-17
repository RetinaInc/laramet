<?php

class AdminAuthController extends AdminBaseController {

	/**
	 * Display the admin login view.
	 * @return void
	 */
	public function getLogin()
	{
		$this->layout->content = View::make('admin.login');
	}

	/**
	 * Handle a POST request to authenticate user.
	 * @return Response
	 */
	public function postLogin()
	{
		if(Auth::attempt(array(
			'email' => Input::get('email'),  
			'password' => Input::get('password')
			))) {
			return Redirect::to('admin/dashboard');
		}

		return Redirect::to('admin/login')
			->with('alert', 'Invalid email or password.')
			->with('alert_class', 'alert-danger')
			->withInput(Input::only('email'));
	}
}