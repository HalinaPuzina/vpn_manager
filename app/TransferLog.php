<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransferLog extends Model
{
    //
        protected $fillable = [
        'resource', 'transferred'
    ];
}
