<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
    	DB::table('users')->truncate();

        $users = array(
            array('id' => '2','name' => 'admin','email' => 'admin@gmail.com','email_verified_at' => NULL,'password' => '$2y$10$vfjWRraDDmHsMYM8Pv3X.OY9PQ.ZazE8Humx8PKr0U2pu.algsK.G','remember_token' => 'AOGiCotN5HyAag2KUAFsIsUgVDyt98n4WRvfn8ByV6HGSus588kuhORkjs6v','created_at' => '2019-04-25 18:12:18','updated_at' => '2019-09-14 10:37:09'),         
			

		);
		foreach ($users as $item) {
			App\User::create([
                'name' => $item['name'],
				'email'=>$item['email'],				
				'password'=>$item['password'],
			]);
			}

			Schema::enableForeignKeyConstraints();
		}
    
}
