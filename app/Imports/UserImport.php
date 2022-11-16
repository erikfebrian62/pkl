<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UserImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'role' => 'user',
            'nis' => $row['nis'],
            'name' => $row['name'],
            'class' => $row['class'],
            'jurusan' => $row['jurusan'],
            'password' => Hash::make($row['jurusan'])
        ]);
    }
}
