<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StaffController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function delete_customer($id)
    {
        if(auth()->user()->id==2){
            $customer = User::find($id);
            if($customer->user_type_id==1){
                $customer->delete();
                return 'Customer berhasil dihapus';
            }
        }
        return 'Hanya staff yang diizinkan';
    }

    public function all_customer()
    {
        $customer = User::withTrashed()->where('user_type_id',1)->get();
        return $customer;
    }
}
