<?php

namespace App\Imports;

use App\Models\Classes;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class StudentsImport implements ToCollection, WithHeadingRow, WithValidation
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
            // get class id from table Classes where name like class_id data from excel
            $class_id = Classes::where('name', 'like', '%' . $row['class_id'] . '%')->first()->id;

            User::create([
                'class_id' => $class_id,
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

    public function rules(): array
    {
        return [
            'nis' => 'unique:users,nis'
        ];
    }

    public function customValidationMessages()
    {
        return [
            'nis.unique' => 'Data siswa sudah ada!',
        ];
    }
}
