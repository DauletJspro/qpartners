<?php

namespace App\Models;

use App\Http\Helpers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class Currency extends Model
{
    protected $table = 'currency';
    protected $primaryKey = 'currency_id';

    const DOLLAR = 1;
}
