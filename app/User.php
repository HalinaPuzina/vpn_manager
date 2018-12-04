<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
//use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User extends Model
{

    use Notifiable;

    protected $month;
    protected $year;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'company_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function setMonth($month)
    {
        $this->month = $month;
    }

    public function getMonth()
    {
        return $this->month;
    }

    public function setYear($year)
    {
        $this->year = $year;
    }

    public function getYear()
    {
        return $this->year;
    }

    public function transferred()
    {
        return $this->hasMany('App\TransferLog');
    }

    public function transferredLog($id)
    {
        return DB::table('users')
                        ->join('transfer_logs', 'transfer_logs.user_id', '=', 'users.id')
                        ->select('users.id', 'users.name', 'users.email', DB::raw('SUM(transferred) as used'))
                        ->whereMonth('transfer_logs.created_at', $this->getMonth())
                        ->whereYear('transfer_logs.created_at', $this->getYear())
                        ->where('users.company_id', $id)
                        ->groupBy('users.id')
                        ->orderBy('used')->get();
    }

    public function company()
    {
        return $this->belongsTo('App\Company');
    }

    public static function getList()
    {
        return User::with('company')->paginate(25);
    }

}
