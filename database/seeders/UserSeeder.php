<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'level' => 'Admin',
            'created_at' => \Carbon\Carbon::now(),
            'email_verified_at' => \Carbon\Carbon::now()
        ]);
        DB::table('users')->insert([
            'name' => 'Wali',
            'email' => 'wali@gmail.com',
            'password' => Hash::make('wali'),
            'level' => 'Wali',
            'nip' => '14122',
            'jk' => 'Perempuan',
            'agama' => 'Kristen',
            'tgl_lahir' => '1990-01-16',
            'tmp_lahir' => 'Sleman',
            'telp' => '08123456789',
            'foto' => 'female.jpg',
            'catatan' => '',
            'created_at' => \Carbon\Carbon::now(),
            'email_verified_at' => \Carbon\Carbon::now()
        ]);
        DB::table('users')->insert([
            'name' => 'Guru',
            'email' => 'guru@gmail.com',
            'password' => Hash::make('guru'),
            'level' => 'Guru',
            'nip' => '14121',
            'jk' => 'Laki-Laki',
            'agama' => 'Kristen',
            'tgl_lahir' => '1992-10-06',
            'tmp_lahir' => 'Bantul',
            'telp' => '08123456789',
            'foto' => 'male.jpg',
            'created_at' => \Carbon\Carbon::now(),
            'email_verified_at' => \Carbon\Carbon::now()
        ]);
    }
}
