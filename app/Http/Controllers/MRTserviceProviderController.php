<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MrtAgent;
use App\MrtRecharge;
use Carbon\Carbon;

class MRTserviceProviderController extends Controller
{
    public function __construct(Request $request)
    {
        $this->middleware('auth');
        $this->middleware('formAuth:MRC');
    }

    public function RcReport()
    {
        $agent=MrtAgent::all();
        return view('MRT.Recharge.rc_index',compact('agent'));
    }

    public function RcPrint(Request $request)
    {
        $month=Carbon::parse($request->month);
        $mrt_rc=MrtRecharge::query();
        $mrt_rc=$mrt_rc->whereMonth('date',$month)
                ->whereYear('date',$month);
        if($request->agent !="")
        {
            $mrt_rc=$mrt_rc->where('mrt_agent_id',$request->agent);
        }
        $mrt_rc=$mrt_rc->get();
        return view('MRT.Recharge.rc_print',compact('mrt_rc'));
    }

}
