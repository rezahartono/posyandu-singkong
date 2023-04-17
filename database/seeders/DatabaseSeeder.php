<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Faker\Provider\Uuid;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id' => Uuid::uuid(),
            'name' => 'Administrator',
            'username' => 'posyanduadmin',
            'email' => 'admin@posyandu-singkong.com',
            'password' => Hash::make('Po5y@nduS1n9k0n9'),
            'tanggal_lahir' => Carbon::now(),
        ]);
    }
}
