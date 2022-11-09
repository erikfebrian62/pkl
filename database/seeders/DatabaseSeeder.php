<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
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

        
        Candidate::create([
            'img' => 'kandidat_no_urut_01.jpeg',
            'ketua' => 'Rivaldi',
            'kelas_ketua' => 'XI',
            'jurusan_ketua' => 'Ototronik',
            'wakil' => 'Nuraeni',
            'kelas_wakil' => 'XI',
            'jurusan_wakil' => 'Teknik Jaringan & Komputer',
            'visi' => 'Menjadikan OSIS SMK Pertiwi Kuningan seebagai organisasi yang unggul serta terwujudnya OSIS dan siswa SMK Pertiwi Kuningan yang berakhlak mulia, kreatif, dinamis, berkualitas, serta dapat bersaing di era industr idigital.',
            'misi_1' => 'Menumbuhkan kerukunan dan keimanan antar siswa.',
            'misi_2' => 'Mengingatkan solidaritas dan kerjasama antar organisasi serta ekstrakulikuler.',
            'misi_3' => 'Mengoptimalkan penggunaan jejaring sosial media atau internet sebagai sarana untuk memaksimalkan program kerja OSIS SMK Pertiwi Kuningan.',
            'misi_4' => 'Mengembangkan organisasi dan ekstrakulikuler sebagai sarana penyaluran bakat siswa.',
            'misi_5' =>  'Melanjutkan dan mengembangkan program kerja sebelumnya.'
        ]);

        Candidate::create([
            'img' => 'kandidat_no_urut_02.jpeg',
            'ketua' => 'M. Randi Syahputra',
            'kelas_ketua' => 'XI',
            'jurusan_ketua' => 'Teknik Bisnis Sepeda Motor',
            'wakil' => 'Adelya Samratul',
            'kelas_wakil' => 'X',
            'jurusan_wakil' => 'Rekayasa Perangkat Lunak',
            'visi' => 'Menjadikan OSIS SMK Pertiwi Kuningan sebagai mitra kerja dalam menciptakan siswa/siswi SMK Pertiwi Kuningan yang kreatif berbudi pekerti luhur dan berprestasi serta melatih dalam bersolialisasi dan berorganisasi.',
            'misi_1' => 'Meningkatkan iman dan takwa terhadap Tuhan Yang Maha Esa, melalui acara atau kegiataan keagamaan.',
            'misi_2' => 'Melaksanakan kegiatan yang dapat meningkatkan hubungan positif antar guru dan siswa.',
            'misi_3' => 'Meningkatkan kegiatan ekstrakulikuler sekolah sebagai wadah pengemabangan minat dan bakat siswa siswi SMK Pertiwi Kuningan.',
            'misi_4' => 'Membentuk karakter pengurus yang cerdas dan solid.',
            'misi_5' => 'Ikut menyelenggarakan bakti sosial di lingkungan sekolah atau sekitarnya sebagai tanda kepeduian sesama.'
        ]);

        Candidate::create([
            'img' => 'kandidat_no_urut_03.jpeg',
            'ketua' => 'Yusup Saputra',
            'kelas_ketua' => 'XI',
            'jurusan_ketua' => 'Axioo Class Program',
            'wakil' => 'Alin Alianti',
            'kelas_wakil' => 'XI',
            'jurusan_wakil' => 'Perbankan',
            'visi' => 'Mewujudkan Osis SMk Pertiwi Kuningan yang progresif, bergerak lebih cepat mengikuti perkembangan zaman sehingga menjadikan OSIS sebagai wadah siswa siswi untuk mengmbangkan segala potensi yang ada sehingga terciptanya siswa siswi yang kreatif, cerdas, aktif, disiplin dan berakhlak.',
            'misi_1' => 'Meningkatkan keimanan dan ketakwaan kepada Tuhan Yang Maha Esa.',
            'misi_2' => 'Membentuk karakter pengurus OSIS yang kreatif dan berpikir kritis.',
            'misi_3' => 'Mengorganisir setiap kegiatan EKstrakulikuler.',
            'misi_4' => 'Melanjutkan dan mengembangkan program kerja OSIS sebelumnya.'
        ]);
    }
}
