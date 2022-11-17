<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Winner;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'role' => 'admin',
            'nis' => '123456789',
            'name' => 'Erik Febrian',
            'class' => 'XII',
            'jurusan' => 'RPL',
            'password' => bcrypt('Erik123')
        ]);

        User::create([
            'role' => 'user',
            'nis' => '987654321',
            'name' => 'Masnun Muhaemin',
            'class' => 'XII',
            'jurusan' => 'RPL',
            'password' => bcrypt('Masnun123')
        ]);

        $this->call([
            CandidateSeeder::class,
        ]);

        Winner::create([
            'img' => 'coomingsoon.png'
        ]);
    }
}
