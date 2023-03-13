<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(User::class, 20)->create();
        $user = User::find('dcc23fc7-ea44-487f-84d1-87d1cb4cd38a');
        if (!$user) {
            factory(User::class)->create([
                'id'             => 'dcc23fc7-ea44-487f-84d1-87d1cb4cd38a',
                'username'       => 'tannguyenit',
                'first_name'     => 'Nguyen',
                'last_name'      => 'Tan',
                'email'          => 'tannguyenit95@gmail.com',
                'password'       => bcrypt('mylove'),
                'avatar'         => 'default.jpg',
                'birthday'       => '1995-08-06',
                'gender'         => null,
                'address'        => null,
                'phone'          => null,
                'provice_id'     => null,
                'active'         => '1',
                'role'           => config('setting.role.admin'),
                'bio'            => '01263751380',
                'remember_token' => str_random(10),
            ]);
        }
    }
}
