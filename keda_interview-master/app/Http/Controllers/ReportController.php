<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;

class ReportController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function report(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_reported' => 'required',
            'report_message' => 'required'
        ]);
        if(auth()->user()->user_type_id==1){
            $reporter = auth()->user()->id;
            $report = new Report;
            $report->id_reporter = $reporter;
            $report->id_reported = $request->input('id_reported');
            $report->report_message = $request->input('report_message');
            $report->save();
            return 'Laporan sudah diterima';
        }
        return 'Hanya customer yang dapat melaporkan';
    }
}
