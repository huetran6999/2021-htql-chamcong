<?php

namespace App\Imports;

use App\Models\TimeKeeping;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Validators\Failure;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Maatwebsite\Excel\Concerns\WithLimit;

class TimeKeepingImport implements ToModel, WithHeadingRow, WithLimit, SkipsEmptyRows, SkipsOnFailure, SkipsOnError, WithMultipleSheets, WithCalculatedFormulas
{
    use Importable, SkipsFailures, SkipsErrors;
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row) // take row in excel file
    {
        return new TimeKeeping([
            'u_id'     => $row['tt'],
            'total'    => $row['total'],
            'month'    => $row['month'],
            'year'    => $row['year'],
        ]);
    }

    public function headingRow(): int // get heading row
    {
        return 3; // row 3
    }

    public function sheets(): array // take sheet
    {
        return [
            0 => $this, // first sheet
        ];
    }

    public function rules(): array // validate rows
    {
        return [
            'u_id' => [
                'required',
            ],
            'total' => [
                'required',
            ],
            'month' => [
                'required',
            ],
            'year' => [
                'required',
            ],
        ];
    }

    public function limit(): int
    {
        return 20; // only take 100 rows
    }

    /**
     * @param Failure[] $failures
     */
    public function onFailure(Failure ...$failures)
    {
        // Handle the failures how you'd like.
    }

    public function onError(\Throwable $e)
    {
        // Handle the exception how you'd like.
    }
}
