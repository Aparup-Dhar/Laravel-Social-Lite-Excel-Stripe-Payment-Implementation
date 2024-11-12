<?php

namespace App\Imports;

use App\Models\Student;
use Illuminate\Support\Collection;

use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentsImport implements ToCollection, WithValidation, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {
            Student::create([
                'name' => $row['name'],
                'email' => $row['email'],
                'phone' => $row['phone'],
                'course' => $row['course']
            ]);
        }
    }

    public function rules(): array
    {
        return [

            'name' => [

                'required',
                'string',
                'max:191'
            ],
            'email' => [

                'required',
                'email',
                'max:191'
            ],
            'phone' => [

                'required',
                'digits:3',
            ],
            'course' => [

                'required',
                'string',
                'max:191'
            ],
        ];
    }

}