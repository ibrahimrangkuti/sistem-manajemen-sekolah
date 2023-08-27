<?php

namespace App\Imports;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentsImport implements ToCollection, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $rows)
    {
        // dd($rows);
        foreach ($rows as $row) {
            // dd($row['date_of_birth']);
            User::create([
                'class_id' => $row['class_id'],
                'nis' => $row['nis'],
                'name' => $row['name'],
                'gender' => $row['gender'],
                'address' => $row['address'],
                'place_of_birth' => $row['place_of_birth'],
                'date_of_birth' => $row['date_of_birth'],
                'role' => 'siswa'
            ]);
        }
    }
}
