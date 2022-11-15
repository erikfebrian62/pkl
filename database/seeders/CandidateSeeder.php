<?php

namespace Database\Seeders;

use App\Models\Misi;
use App\Models\Visi;
use App\Models\Candidate;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CandidateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
              
        $candidate = Candidate::create([
            'img' => 'kandidat_no_urut_01.jpeg',
            'ketua' => 'Rivaldi',
            'kelas_ketua' => 'XI',
            'jurusan_ketua' => 'Ototronik',
            'wakil' => 'Nuraeni',
            'kelas_wakil' => 'XI',
            'jurusan_wakil' => 'Teknik Jaringan & Komputer',
        ]);
        
        Visi::create([
            'candidate_id' => $candidate->id,
            'visi' => 'Menjadikan OSIS SMK Pertiwi Kuningan sebagai organisasi yang unggul serta terwujudnya OSIS dan siswa SMK Pertiwi Kuningan yang berakhlak mulia, kreatif, dinamis, berkualitas, serta dapat bersaing di era industri digital.'
        ]);

        Misi::create([
            'candidate_id' => $candidate->id,
            'misi' => 'Menumbuhkan kerukunan dan keimanan antar siswa.'
                    //    Mengingatkan solidaritas dan kerjasama antar organisasi serta ekstrakulikuler.
                    //    Mengoptimalkan penggunaan jejaring sosial media atau internet sebagai sarana untuk memaksimalkan program kerja OSIS SMK Pertiwi Kuningan.
                    //    Mengembangkan organisasi dan ekstrakulikuler sebagai sarana penyaluran bakat siswa.
                    //    Melanjutkan dan mengembangkan program kerja sebelumnya.,
        ]);

        $candidate = Candidate::create([
            'img' => 'kandidat_no_urut_02.jpeg',
            'ketua' => 'M. Randi Syahputra',
            'kelas_ketua' => 'XI',
            'jurusan_ketua' => 'Teknik Bisnis Sepeda Motor',
            'wakil' => 'Adelya Samratul',
            'kelas_wakil' => 'X',
            'jurusan_wakil' => 'Rekayasa Perangkat Lunak',
        ]);
        
        Visi::create([
            'candidate_id' => $candidate->id,
            'visi' => 'Menjadikan OSIS SMK Pertiwi Kuningan sebagai mitra kerja dalam menciptakan siswa/siswi SMK Pertiwi Kuningan yang kreatif berbudi pekerti luhur dan berprestasi serta melatih dalam bersolialisasi dan berorganisasi.'
        ]);
        
        Misi::create([
            'candidate_id' => $candidate->id,
            'misi' => 'Meningkatkan iman dan takwa terhadap Tuhan Yang Maha Esa, melalui acara atau kegiataan keagamaan.'
                    //    Melaksanakan kegiatan yang dapat meningkatkan hubungan positif antar guru dan siswa.
                    //    Meningkatkan kegiatan ekstrakulikuler sekolah sebagai wadah pengemabangan minat dan bakat siswa siswi SMK Pertiwi Kuningan.
                    //    Membentuk karakter pengurus yang cerdas dan solid.
                    //    Ikut menyelenggarakan bakti sosial di lingkungan sekolah atau sekitarnya sebagai tanda kepeduian sesama.
                        
        ]);

        $candidate = Candidate::create([
            'img' => 'kandidat_no_urut_03.jpeg',
            'ketua' => 'Yusup Saputra',
            'kelas_ketua' => 'XI',
            'jurusan_ketua' => 'Axioo Class Program',
            'wakil' => 'Alin Alianti',
            'kelas_wakil' => 'XI',
            'jurusan_wakil' => 'Perbankan',
        ]);

        Visi::create([
            'candidate_id' => $candidate->id,
            'visi' => 'Mewujudkan OSIS SMK Pertiwi Kuningan yang progresif, bergerak lebih cepat mengikuti perkembangan zaman sehingga menjadikan OSIS sebagai wadah siswa siswi untuk mengmbangkan segala potensi yang ada sehingga terciptanya siswa siswi yang kreatif, cerdas, aktif, disiplin dan berakhlak.'
        ]);

        Misi::create([
            'candidate_id' => $candidate->id,
            'misi' =>  'Meningkatkan keimanan dan ketakwaan kepada Tuhan Yang Maha Esa.'
                        // Membentuk karakter pengurus OSIS yang kreatif dan berpikir kritis.
                        // Mengorganisir setiap kegiatan EKstrakulikuler.
                        // Melanjutkan dan mengembangkan program kerja OSIS sebelumnya.
                       
        ]);
    }
}
