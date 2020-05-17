<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        $filepath = public_path() . "/files/users.json";
        $data     = file_get_contents($filepath);
        $users    = json_decode($data);

        foreach ($users as $user) {
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
