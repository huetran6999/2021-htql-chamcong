<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Position;
use App\Models\User;
use DB;

class DashboardController extends Controller
{
    public function index($value='')
    {
    	// Chức vụ
    	$positions = Position::select(
            'position.id as positon_id',
            'p_name as x',
            DB::raw("
                (SELECT COUNT(*) AS COUNT
                FROM user
            	WHERE user.p_id = positon_id) as value")
        )
        ->join('user', 'position.id', '=', 'user.p_id')
        ->groupBy('p_name')
        ->get();

    	// Độ tuổi
        $users = User::all();
        $age_20_to_30 = 0;
        $age_30_to_50 = 0;
        $age_50_to_60 = 0;
        $over_age_60 = 0;

        foreach ($users as $user) {
        	if ($user->age >= 20 && $user->age <= 30) {
        		$age_20_to_30 += 1;
        	}
        	if ($user->age >= 30 && $user->age <= 50) {
        		$age_30_to_50 += 1;
        	}
        	if ($user->age >= 50 && $user->age <= 60) {
        		$age_50_to_60 += 1;
        	}
        	if ($user->age > 60) {
        		$over_age_60 += 1;
        	}
        }
    	
    	$statistic_age = [
    		[
    			'x' => 'Từ 20 đến 30 tuổi',
    			'value' => $age_20_to_30,
    		],
    		[
    			'x' => 'Từ 30 đến 50 tuổi',
    			'value' => $age_30_to_50,
    		],
    		[
    			'x' => 'Từ 50 đến 60 tuổi',
    			'value' => $age_50_to_60,
    		],
    		[
    			'x' => 'Trên 60 tuổi',
    			'value' => $over_age_60,
    		],
    	];

    	$data = [
    		'positions' => $positions,
    		'statistic_age' => json_encode($statistic_age),
    	];

    	return view('pages.dashboard', $data);
    }
}
