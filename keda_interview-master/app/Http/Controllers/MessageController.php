<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;

class MessageController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function send(Request $request){
        $message = new Message;
        $validator = Validator::make($request->all(), [
            'message' => 'required',
            'id_to' => 'required'
        ]);
        $target = DB::table('users')->where('id',$request->input('id_to'))->value('user_type_id');
        if(auth()->user()->user_type_id==2 || auth()->user()->user_type_id == $target){
            $message->id_from = auth()->user()->id;
            $message->id_to = $request->input('id_to');
            $message->message = $request->input('message');
            $message->save();
            return $message;
        }
        return 'Customer hanya mengirim pesan kepada customer';
    }
    
    public function history_customer()
    {
        $id = auth()->user()->id;
        $history = DB::table('messages')->where('id_from',$id)->get();
        return $history;
    }

    public function all_history()
    {
        if(auth()->user()->user_type_id==2){
            $history = Message::all();
            return $history;
        }
        return 'Khusus staff';
    }
}
