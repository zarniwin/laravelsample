<?php

use App\User;
use Illuminate\Database\Seeder;

class SuperAdminAssignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::whereId(1)->first();
        if($user)$user->assignRole('super_admin');        
    }
}
