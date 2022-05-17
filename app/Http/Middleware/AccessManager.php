<?php

namespace App\Http\Middleware;

use App\Models\Position_Role;
use App\Models\Role;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Work_contract;

class AccessManager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role = null)
    {
        // if(Auth::user() && Auth::user()->position->role->r_name == 'read_emp'){
        //     // if ($request->pos()->hasRole(['employee'])) {
    
        //         return $next($request);
        //     // }
    
        //     return abort(401);
        // }

        // $hopdong=Work_contract::where([['u_id',Auth::user()->id],['w_status','0']])->first();
                // if(tbl_phuluc::where('id_hopdong',$hopdong->id_hopdong)){
                    // $phuluc=tbl_phuluc::where([['id_hopdong',$hopdong->id_hopdong],['id_loaiphuluc','2']])->first();
                    
                    // if($phuluc!=null){
                    // $chitiet=tbl_chitietphuluc::where('id',$phuluc->id_chitiet)->first();
                    // $congviec=tbl_chucvu_permission::where('id_chucvu',$chitiet->id_chucvu_moi)->get()->pluck('id_permission');
                    // }
                    // else{
                    //     $congviec=tbl_chucvu_permission::where('id_chucvu',Auth::user()->tbl_hosonhanvien->tbl_chucvu->id_chucvu)->get()->pluck('id_permission');
                    //     }
                
               
                $congviec=Position_Role::where('p_id',Auth::user()->position->id)->get()->pluck('r_id');
                
                $check=Role::where('r_name',$role)->value('id');
               
                
                if($congviec->contains($check)){
                    return $next($request);
                }
                
        return abort(401);
        

        
       
        
    }
}
