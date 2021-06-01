<?php

namespace App\Models;

use App\Http\Helpers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class UserOperation extends Model
{
    protected $table = 'user_operation';
    protected $primaryKey = 'user_operation_id';

    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'operation_id',
        'money',
        'author_id',
        'recipient_id',
        'operation_type_id',
        'operation_comment',
        'fond_id',
        'created_at','updated_at'
    ];

    public function recipients()
    {
        return $this->belongsTo(Users::class, 'recipient_id','user_id');
    }

    public function operation()
    {
        return $this->belongsTo(Operation::class, 'operation_id', 'operation_id');
    }

    public function author()
    {
        return $this->belongsTo(Users::class, 'author_id', 'user_id');
    }
}
