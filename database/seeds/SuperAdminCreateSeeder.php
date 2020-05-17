<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SuperAdminCreateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        $file_path = public_path()."/files/super.json";
        $data      = file_get_contents($file_path);
        $users     = json_decode($data);

        foreach($users as $user){
            DB::table('users')->insert([
                "name" => $user->name,
                "email" => $user->email,
                "password" => $user->password,
                "remember_token" => $user->remember_token,
                "deleted_at" => $user->deleted_at,
                "created_at" => $user->created_at,
                "updated_at" => Carbon::now()
            ]);
        }       
    }
}
