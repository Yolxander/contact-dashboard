<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Admin-Human',
            'email' => 'admin@admin.com',
            'username'=> 'test@humancontact.com',
            'password' => bcrypt('DeveloperTest2021'),
        ]);

        $user->givePermissionTo('delete attendees');
    }
}
