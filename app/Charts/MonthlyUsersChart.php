<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class MonthlyUsersChart
{
    protected $chart, $status_chart;

    public function __construct(LarapexChart $chart, $status_chart)
    {
        $this->chart = $chart;
        $this->chart = $status_chart;
    }

    public function build()
    {
        return $this->chart->pieChart()
        ->setTitle('Giới tính của nhân viên.')
        ->setSubtitle('Season 2021.')
        ->addData([
            \App\Models\User::where('u_gender', '=', 0)->count(),
            \App\Models\User::where('u_gender', '=', 1)->count()
        ])
        ->setLabels(['Nam', 'Nữ']);

        return $this->status_chart->donutChart()
        ->setTitle('Trạng thái của nhân viên')
        ->addData([
            \App\Models\User::where('u_status',0)->count(),
            \App\Models\User::where('u_status',1)->count()
        ])
        ->setLabels(['Hoạt động','Không hoạt động']);
    }
}
