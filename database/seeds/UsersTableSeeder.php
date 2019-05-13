<?php

use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('friends')->truncate();
        DB::table('users')->truncate();

        factory(User::class, 10)->create();
    }
}