<?php

namespace App\Http\Controllers;

use App\Models\Interview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon as time;
use Carbon\Carbon;

class reportsController extends Controller
{
    //super admain reports
    //**************************************************************** */
    //the blade for the report
    public function interviews(){
        
        return view('superAdmin.reports.interviews');
    }
    //the api for all interviews 
    public function allInterviews(Request $request){
     $interviews = Interview::all();
     if($request->date){


        $to = time::today()->format('Y-m-d');
        $from;
        switch ($request->date){
            case 'today':
                $from = time::today()->format('Y-m-d');
                // 19-10-2020
                // 19-10-2020
                break;
            case 'yesterday':
                $from = date('Y-m-d',strtotime("-1 days"));
                // 18-10-2020
                //19-10-2020
                break;
           
            case 'month':
                $from = time::today()->format('Y-m-1');
                // 1-10-2020
                //19-10-2020
                break;  
            case 'year':
                $from = time::now()->subYears(1)->format('Y-m-d');
                break;
           
            default:
                $from = time::today()->format('Y-m-d');
                break;
        }
$interviews = Interview::whereDate('date','>=',$from)->whereDate('date','<=',$to)->get();
    }
    
}

}
