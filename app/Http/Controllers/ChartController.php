<?php

namespace App\Http\Controllers;

use App\Charts\MonthlyUsersChart;
use Illuminate\Http\Request;
use App\Models\User;
use ArielMejiaDev\LarapexCharts\Facades\LarapexChart;


class ChartController extends Controller
{
    public function index() {
        return view('show');
    }

    // public function __invoke()
    // {
    //     $user        = User::first();
    //     $userTwo     = User::find(2);
    //     $active = User::where('u_status','0')->count();
    //     $noactive = User::where('u_status','1')->count();

    //     $chart = LarapexChart::setTitle('Your Todos Stats')
    //         ->setLabels(['Done', 'Not Yet'])
    //         ->setDataset([$active, $noactive]);


    //     return view('chart', compact('chart'));
    // }
}
