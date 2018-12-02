<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

    //
    protected $fillable = [
        'name', 'qouta'
    ];
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function users()
    {
        return $this->hasMany('App\User');
    }

    public static function getList()
    {
        return Company::paginate(25);
    }

}
