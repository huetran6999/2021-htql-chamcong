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

        $check = working_hour_log::where('u_id', $row[1])->where('date', $row[0])->exists();
        if (!$check) {
            $am_checkin = "07:30:00";
            $am_checkout = "11:30:00";
            $pm_checkout = "17:00:00";
            $pm_checkin = "13:00:00";

            $late_am = 0;
            $late_pm = 0;
            $soon_am = 0;
            $soom_pm = 0;
            // Tính muộn sáng
            if (isset($row[2])) {
                $late_am = (strtotime($am_checkin) - strtotime($row[2]))/60;
                $late_am = ($late_am < 0) ? abs($late_am) : 0;
            }
            // Tính muộn chiều
            if (isset($row[4])) {
                $late_pm = (strtotime($pm_checkin) - strtotime($row[4]))/60;
                $late_pm = ($late_pm < 0) ? abs($late_pm) : 0;
            }
            // Tính về sớm sáng
            if (isset($row[3])) {
                $soon_am = (strtotime($am_checkout) - strtotime($row[3]))/60;
                $soon_am = ($soon_am < 0) ? abs($soon_am) : 0;
            }
            // Tính về sớm chiều
            if (isset($row[5])) {
                $soom_pm = (strtotime($pm_checkout) - strtotime($row[5]))/60;
                $soom_pm = ($soom_pm < 0) ? abs($soom_pm) : 0;
            }
            $soon = floor($soon_am + $soom_pm);
            $late = floor($late_am + $late_pm);

            // Tính công sáng
            $amount_timekeeping_am = 0;
            if (isset($row[2]) && isset($row[3])) {
                $amount_timekeeping_am = 0.5;
            }
            // Tính công chiều
            $amount_timekeeping_pm = 0;
            if (isset($row[4]) && isset($row[5])) {
                $amount_timekeeping_pm = 0.5;
            }
            // Tổng công của ngày
            $amount_timekeeping = $amount_timekeeping_am + $amount_timekeeping_pm;

            // Tính nghỉ không phép
            $unauthorized_ence = 0;
            if (empty($row[2]) && empty($row[3]) && empty($row[4]) && empty($row[5])) {
                $unauthorized_ence = 1;
            }
            return new working_hour_log([
                'date' => $row[0],
                'u_id' => $row[1],
                'am_in' => $row[2],
                'am_out' => $row[3],
                'pm_in' => $row[4],
                'pm_out' => $row[5],
                'late' => $late ? 1 : 0,
                'soon' => ($soon > 5) ? 1 : 0,
                'leave_ence' => 0,
                'unauthorized_ence' => $unauthorized_ence,
                'amount_timekeeping' => $amount_timekeeping,
            ]);
        }
    }
}
