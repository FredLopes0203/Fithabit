<?php

namespace App\Http\Controllers;

use App\Ptinfo;
use Illuminate\Http\Request;
use fx3costa\laravelchartjs;
use App\Program;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $showmodal = "no";

        if($user->user_firstlogin == 1 && $user->user_type == 1)
        {
            $showmodal = "yes";
            $user->user_firstlogin = 0;
            $user->save();
        }

        $chartjs = app()->chartjs
            ->name('ClientChart')
            ->type('line')
            ->element('lineChartTest')
            ->labels(['January', 'February', 'March', 'April', 'May', 'June', 'July'])
            ->datasets([
                [
                    "label" => "SignUps",
                    'backgroundColor' => "rgba(243, 156, 18, 0.3)",
                    'borderColor' => "rgba(243, 156, 18, 0.7)",
                    "pointBorderColor" => "rgba(255, 255, 255, 0.7)",
                    "pointBackgroundColor" => "rgba(243, 156, 18, 0.7)",
                    "pointHoverBackgroundColor" => "#f00",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => [65, 40, 80, 81, 56, 55, 40],
                ],
                [
                    "label" => "Revenue",
                    'backgroundColor' => "rgba(77, 175, 124, 0.3)",
                    'borderColor' => "rgba(77, 175, 124, 0.7)",
                    "pointBorderColor" => "rgba(255, 255, 255, 0.7)",
                    "pointBackgroundColor" => "rgba(77, 175, 124, 0.7)",
                    "pointHoverBackgroundColor" => "#00f",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => [40, 33, 44, 44, 90, 23, 80],
                ]
            ])
            ->options([]);
        return view('dashboard', compact('chartjs', 'showmodal'));
    }

    public function showaccountsettings()
    {
        $user = Auth::user();
        $userdetail = Ptinfo::where('pt_userid', $user->id)->first();

        return view('accountsettings', compact('user','userdetail'));
    }

    public function showsignuplist()
    {
        return view('signuplist');
    }

    public function showclientoverview()
    {
        $workoutpercent = 28;
        $nutritionpercent = 78.5;
        return view('clientoverview', compact('workoutpercent', 'nutritionpercent'));
    }

    public function showmyprograms()
    {
        $user = Auth::user();
        $userid = $user->id;
        return view('myPrograms');
    }
}
