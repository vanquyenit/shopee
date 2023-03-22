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
        $user = User::find('1');
        if (!$user) {
            factory(User::class)->create([
                'id'             => '1',
                'username'       => 'vanquyenit',
                'first_name'     => 'Ho',
                'last_name'      => 'Quyen',
                'email'          => 'abc@gmail.com',
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
