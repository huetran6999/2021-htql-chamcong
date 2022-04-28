<?php

namespace App\Imports;

use App\Models\working_hour_log;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;

class WorkingLogImport implements ToModel, WithStartRow, WithCustomCsvSettings
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function startRow(): int
    {
        return 2;
    }

    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ','
        ];
    }

    public function model(array $row)
    {
        return new working_hour_log([
            'date' => $row[0],
            'u_id' => $row[1],
            'am_in' => $row[2],
            'am_out' => $row[3],
            'pm_in' => $row[4],
            'pm_out' => $row[5],
        ]);
    }
}
