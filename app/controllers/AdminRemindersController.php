<?php

class AdminRemindersController extends AdminBaseController {

	/**
	 * Display the password reminder view.
	 *
	 * @return Response
	 */
	public function getRemind()
	{
		$this->layout->content = View::make('admin.reminder');
	}

	/**
	 * Handle a POST request to remind a user of their password.
	 *
	 * @return Response
	 */
	public function postRemind()
	{
		$rules = array(
			'email' => 'required|email'
		);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			$messages = $validator->messages();

			return Redirect::to('admin/reminder')->withErrors($validator)->withInput(Input::only('email'));
		}

		$response = Password::remind(Input::only('email'));

		$alert = Lang::get($response);

		switch ($response)
		{
			case Password::INVALID_USER: {
				$alert_class = 'alert-danger';
				return Redirect::to('admin/reminder')
					->with('alert', $alert)
					->with('alert_class', $alert_class)
					->withInput(Input::only('email'));
			}

			case Password::REMINDER_SENT: {
				$alert_class = 'alert-success';
				return Redirect::to('admin/login')
					->with('alert', $alert)
					->with('alert_class', $alert_class)
					->withInput(Input::only('email'));
			}
		}
	}

	/**
	 * Display the password reset view for the given token.
	 *
	 * @param  string  $token
	 * @return Response
	 */
	public function getReset($token = null)
	{
		if (is_null($token)) App::abort(404);

		$this->layout->content = View::make('admin.reset')->with('token', $token);
	}

	/**
	 * Handle a POST request to reset a user's password.
	 *
	 * @return Response
	 */
	public function postReset()
	{
		$credentials = Input::only(
			'password', 'password_confirmation', 'token'
		);

		$response = Password::reset($credentials, function($user, $password)
		{
			$user->password = Hash::make($password);

			$user->save();
		});

		switch ($response)
		{
			case Password::INVALID_PASSWORD:
			case Password::INVALID_TOKEN:
			case Password::INVALID_USER:
				return Redirect::back()
					->with('alert', Lang::get($response))
					->with('alert_class', 'alert-danger')
					->withInput(Input::all());

			case Password::PASSWORD_RESET:
				return Redirect::to('admin/login')
					->with('alert', Lang::get($response))
					->with('alert_class', 'alert-success')
					->withInput(Input::all());;
		}
	}

}
