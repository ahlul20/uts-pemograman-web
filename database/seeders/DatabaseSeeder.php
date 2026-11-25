<?php

namespace Database\Seeders;

use App\Models\Biodata;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Biodata::truncate();

        Biodata::create([
            'nama' => 'Ahlul N.R.P',
            'nim' => '24010110182',
            'deskripsi' => '24010110182 merupakan master dari uts ini dengan tugas membuat front-end dan mengirimkannya ke grup',
            'foto' => 'images/rizki.jpg',
        ]);

        Biodata::create([
            'nama' => 'khaisan amru r',
            'nim' => '2010110171',
            'deskripsi' => 'dengan NIM 2010110171 merupakan pegawai dan mempunyai tugas mengerjakan back-end pada UTS ini',
            'foto' => 'images/andi.jpg',
        ]);
    }
}
