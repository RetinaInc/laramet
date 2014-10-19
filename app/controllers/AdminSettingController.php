<?php

class AdminSettingController extends AdminBaseController {

	/**
	 * Display admin account view
	 * 
	 * @return Response
	 */
	public function getAccount()
	{
		if (Input::has('email') && Input::get('email') != Auth::user()->email)
		{
			$email = Input::get('email');
		}

		else 
		{
			$email = Auth::user()->email;
		}

		if (Input::has('first_name') && Input::get('first_name') != Auth::user()->first_name)
		{
			$first_name = Input::get('first_name');
		}

		else 
		{
			$first_name = Auth::user()->first_name;
		}

		if (Input::has('last_name') && Input::get('last_name') != Auth::user()->last_name)
		{
			$last_name = Input::get('last_name');
		}

		else 
		{
			$last_name = Auth::user()->last_name;
		}

		$data = array(
			'email' 		=> $email,
			'first_name' 	=> $first_name, 
			'last_name' 	=> $last_name
		);

		$this->layout->content = View::make('admin.account')->with('data', $data);
	}

	/**
	 * Handle a POST request to modify admin's account.
	 * 
	 * @return Response 
	 */
	public function postAccount()
	{
		$rules = array(
			'email' 		=> 'required|email',
			'first_name' 	=> 'required|between:3,35',
			'last_name' 	=> 'required|between:3,35',
		);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails())
		{
			return Redirect::to('admin/account')
				->withErrors($validator)
				->withInput(Input::all());
		} 

		$user = User::find(Auth::user()->id);

		$user->email = Input::get('email');
		$user->first_name = Input::get('first_name');
		$user->last_name = Input::get('last_name');

		$user->save();

		$alert = Lang::get('alert.setting_updated');
		$alert_class = 'alert-success';
		return Redirect::to('admin/account')
			->with('alert', $alert)
			->with('alert_class', $alert_class);
	}

	/**
	 * Display admin change password view
	 * 
	 * @return Response
	 */
	public function getPassword()
	{
		$this->layout->content = View::make('admin.password');
	}

	/**
	 * Handle a POST request to modify admin's password.
	 * 
	 * @return Response 
	 */
	public function postPassword()
	{
		Validator::extend('passcheck', function ($attribute, $value, $parameters) {
    		return Hash::check($value, Auth::user()->getAuthPassword());
		});

		$rules = array(
			'password' 			=> 'passcheck',
			'new_password' 		=> 'required|between:6,255',
			'confirm_password' 	=> 'same:new_password',
		);

		$messages = array('passcheck' => Lang::get('alert.wrong_password'));

		$validator = Validator::make(Input::all(), $rules, $messages);

		if ($validator->fails())
		{
			return Redirect::to('admin/password')
				->withErrors($validator)
				->withInput(Input::all());
		} 

		$user = User::find(Auth::user()->id);

		$user->password = Hash::make(Input::get('new_password'));

		$user->save();

		$alert = Lang::get('alert.setting_updated');
		$alert_class = 'alert-success';
		return Redirect::to('admin/password')
			->with('alert', $alert)
			->with('alert_class', $alert_class);
	}
}