<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function index(){
        $positions = Position::with('dep_pos')->select('id', 'd_id', 'p_name', 's_id', 'basic_salary')->paginate(5);

        return view('position_manage.index', compact('positions'));
    }

    public function create(){
        
    }

    public function store(){
        
    }

    public function edit(){
        
    }

    public function update(){
        
    }

    public function destroy(){
        
    }
}
