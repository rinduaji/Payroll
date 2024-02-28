<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['nama_jabatan' => 'IT'],
            ['nama_jabatan' => 'HR'],
            ['nama_jabatan' => 'AGENT'],
            ['nama_jabatan' => 'TEAM LEADER'],
            ['nama_jabatan' => 'SPV'],
            ['nama_jabatan' => 'ADMIN'],
            ['nama_jabatan' => 'QCO'],
        ];

        foreach($data as $value) {
            Role::insert([
                'nama_jabatan' => $value['nama_jabatan'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
