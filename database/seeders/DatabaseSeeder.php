<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Biodata;
use App\Models\Candidate;
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



        Biodata::create([
            'nis' => '111111',
            'name' => 'Taufan',
            'class' => 'XII',
            'jurusan' => 'RPL',
        ]);

        Biodata::create([
            'nis' => '222222',
            'name' => 'Arul',
            'class' => 'XII',
            'jurusan' => 'RPL',
        ]);

        Biodata::create([
            'nis' => '333333',
            'name' => 'Alfan',
            'class' => 'XII',
            'jurusan' => 'RPL',
        ]);



        Candidate::create([
            'img' => 'Jokowi.jpg',
            'ketua' => 'Burhan Upomo',
            'wakil' => 'Yoyi Son',
            'class' => 'XII',
            'jurusan' => 'RPL',
            'visi' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Beatae delectus facere eum nobis tempora quo temporibus animi illo autem quae impedit voluptates qui nostrum, placeat minus inventore fugit vel nihil!',
            'misi' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Beatae delectus facere eum nobis tempora quo temporibus animi illo autem quae impedit voluptates qui nostrum, placeat minus inventore fugit vel nihil!'
        ]);

        Candidate::create([
            'img' => 'SBY.png',
            'ketua' => 'Sonri',
            'wakil' => 'Yamino',
            'class' => 'XII',
            'jurusan' => 'TKJ',
            'visi' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Beatae delectus facere eum nobis tempora quo temporibus animi illo autem quae impedit voluptates qui nostrum, placeat minus inventore fugit vel nihil!',
            'misi' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Beatae delectus facere eum nobis tempora quo temporibus animi illo autem quae impedit voluptates qui nostrum, placeat minus inventore fugit vel nihil!'
        ]);

        Candidate::create([
            'img' => 'Habibie.jpg',
            'ketua' => 'Koror',
            'wakil' => 'Santi',
            'class' => 'XII',
            'jurusan' => 'TBSM',
            'visi' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Beatae delectus facere eum nobis tempora quo temporibus animi illo autem quae impedit voluptates qui nostrum, placeat minus inventore fugit vel nihil!',
            'misi' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Beatae delectus facere eum nobis tempora quo temporibus animi illo autem quae impedit voluptates qui nostrum, placeat minus inventore fugit vel nihil!'
        ]);
    }
}
