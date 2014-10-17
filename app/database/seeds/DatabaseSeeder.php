<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UserTableSeeder');
		
		$this->command->info('User table seeded!');
	}

}

class UserTableSeeder extends Seeder {

	public function run()
	{
		User::create(
			array(
				'email' => 'admin@example.com',
				'password' => Hash::make('1234'),
				'first_name' => 'Mehmet',
				'last_name' => 'Uygun',
				'admin' => 1,
			));
	}
}
