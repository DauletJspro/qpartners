<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CooperativeHomeGroup extends Model
{
    protected $fillable = [
        'id', 'group_name', 'group_type', 'program_id'
    ];

    public function program()
    {
        return $this->hasMany(CooperativeProgramm::class,'id', 'program_id');
    }
}
