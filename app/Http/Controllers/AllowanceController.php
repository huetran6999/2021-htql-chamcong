<?php

namespace App\Http\Controllers;

use App\Models\Allowance;
use App\Models\Position;
use Illuminate\Http\Request;

class AllowanceController extends Controller
{
    public function list()
    {
        $position = Position::all();
        $allowance = Allowance::all();

        return view('allowance_manage.list', compact(['position', 'allowance']));
    }

    public function edit($id)
    {
        // $position = Position::find($id);
        $allowance =Allowance::where('p_id', $id)->first();
        //dd($allowance);
       return view('allowance_manage.edit',compact(['allowance']));
    }

    public function update(Request $request, $id)
    {
       
        // $position = Position::where('id', $id)->first();

        $allowance = Allowance::where('p_id', $id)->first();

        // $allowance = new Allowance;
        // $allowance->p_id = $position->id;
        $allowance->lunch_fee = $request->lunch_fee;
        $allowance->gas_fee = $request->gas_fee;
        $allowance->others=$request->others;
        $allowance->total=$request->others+$request->lunch_fee+$request->gas_fee;
        $allowance->save();

        return redirect(url('list-allowance'))->with('success','Thành Công');
    }
}
