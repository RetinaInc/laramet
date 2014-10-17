<?php

class AdminController extends AdminBaseController 
{
	/**
	 * Display the dashboard view
	 */
	public function getDashboard()
	{
		$this->layout->content = View::make('admin.dashboard');
	}
}