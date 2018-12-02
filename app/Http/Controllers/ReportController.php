<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;
use Validator;
/**
 * Class ReportController
 *
 * @package App\Http\Controllers
 */
class ReportController extends Controller
{

    /**
     * get Report monthly
     *
     * @param Request $request
     * @return json
     */
    public function index(Request $request)
    {
        $validator = Validator::make($request->all(), [
                    'date' => 'required|date|date_format:Y-m-d|after:yesterday',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->messages(), 400);
        }
        $date = $request->input('date');
        $report = (new Report())->getReport($date);
        return $report;
    }
    
    public function lists(){
        return view('report');
    }

}
