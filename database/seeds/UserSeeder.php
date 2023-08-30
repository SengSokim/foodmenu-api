<?php

use App\Models\Role;
use App\Models\User;
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
        Role::withTrashed()->updateOrCreate([
            'id' => 1
        ], [
            'name' => 'Admin',
            'data' => null,
            'deleted_at' => null
        ]);

        User::withTrashed()->updateOrCreate(
        [
            'id' => 1
        ], [
            'name' => 'Supper User',
            'email' => 'admin@gmail.com',
            'password' => '12345678',
            'gender' => 'male',
            'phone' => '081699750',
            'address' => 'Phnom Penh',
            'is_active' => 1,
            'media_id' => null,
            'deleted_at' => null,
            'role_id' => 1
        ]);
    }
}
