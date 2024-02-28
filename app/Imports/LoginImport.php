<?php

namespace App\Imports;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Login;
use App\Models\Jabatan;
use App\Models\Layanan;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class LoginImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    private $baris = 0;
    private $penjelasan = "";

    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {
           $nama_layanan = $row["layanan"];
           $nama_area = $row["area"];
           $nama_jabatan = $row["jabatan"];
           $layanan = Layanan::where('nama_layanan', $nama_layanan)->where('area', $nama_area)->first();
           if(isset($layanan->id)) {
               $idLayanan = $layanan->id;
               $jabatan = Jabatan::where('nama_jabatan', $nama_jabatan)->where('id_layanan', $idLayanan)->first();
               if(isset($jabatan->id)){
                $idJabatan = $jabatan->id;
                $user = User::create([
                        'name' => $row["nama"],
                        'username' => $row["perner"],
                        'email'    => strtolower(str_replace(" ","",$row["nama"])."@gmail.com"),
                        'password' => Hash::make('infomedia'),
                        'jabatan_id' => $idJabatan,
                        'layanan_id' => $idLayanan,
                        'created_at' => Carbon::now() ,
                        'updated_at' => Carbon:: now()
                ]);
                $login = Login::create([
                        'user_id' => $user->id,
                        'layanan' => $row["layanan"],
                        'area' => $row["area"],
                        'perner' => $row["perner"],
                        'nama' => $row["nama"],
                        'jabatan' => $row["jabatan"],
                        'jenis_kelamin' => $row["jenis_kelamin"],
                        'status_perkawinan' => $row["status_perkawinan"],
                        'jumlah_anak' => $row["jumlah_anak"],
                        'nomer_jamsostek' => $row["nomer_jamsostek"],
                        'asuransi_kesehatan' => $row["asuransi_kesehatan"],
                        'kelas_asuransi' => $row["kelas_asuransi"],
                        'no_asuransi' => $row["no_asuransi"],
                        'tgl_kontrak' => $row["tgl_kontrak"],
                        'tgl_endkontrak' => $row["tgl_endkontrak"],
                        'ppjp' => $row["ppjp"],
                        'bank' => $row["bank"],
                        'norek' => $row["norek"],
                        'an_norek' => $row["an_norek"],
                        'digit_rek' => strlen($row["norek"]),
                        'npwp' => $row["npwp"],
                        'jabatan' => $row["jabatan"],
                        'created_at' => Carbon::now() ,
                        'updated_at' => Carbon:: now()
                    ]);
                    ++$this->baris;
                }
                else {
                    $this->penjelasan = "Jabatan atau Layanan pada file excel ada yang tidak ada pada Menu jabatan";
                }
           }
           else{
            $this->penjelasan = "Layanan atau Area pada file excel ada yang tidak ada pada Menu layanan";
           }

      }
    }

    public function headingRow(): int
    {
        return 1;
    }

    public function getRowCount(): int
    {
        return $this->baris;
    }

    public function getPenjelasan()
    {
        return $this->penjelasan;
    }
}
