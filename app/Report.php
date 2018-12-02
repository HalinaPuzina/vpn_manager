<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Company;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class Report extends Model
{

    //
    public function getReport($date)
    {
        $month = Carbon::parse($date)->month;
        $year =  Carbon::parse($date)->year;
        return DB::table('companies')
                        ->join('users', 'users.company_id', '=', 'companies.id')
                        ->join('transfer_logs', 'transfer_logs.user_id', '=', 'users.id')
                        ->select('companies.id', 'companies.name', 'companies.qouta', DB::raw('SUM(transferred) as used'))
                        ->whereMonth('transfer_logs.created_at', $month)
                        ->whereYear('transfer_logs.created_at', $year)
                        ->groupBy('companies.id')
                        ->havingRaw('SUM(transferred) > companies.qouta')->get();
    }

}
