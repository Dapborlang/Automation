<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\IP;
use App\SwitchStatus;

class ButtonsController extends Controller
{
	public function __construct()
    {
        $data="BTN";
        $this->middleware('auth');
        $this->middleware('formAuth:'.$data);
    }

    public function index()
    {
        $ip=$_GET['ip_id'];
        $port=$_GET['port'];
        $status=SwitchStatus::whereHas('Pin', function ($query1) use ($ip) 
        {
            $query1->whereHas('Port', function ($q1) use ($ip)
            {
                $q1->whereHas('IP', function ($q2) use ($ip)
                {
                    $q2->where('detail',$ip)
                    ->orWhere('id',$ip);
                });
            });
        })
        ->whereHas('Pin', function ($query) use ($port) {
            $query->whereHas('Port', function ($q) use ($port)
            {
                $q->where('port',$port);
            });
        })->get();
    	return view('ui.ui',compact('status'));
    }
}
