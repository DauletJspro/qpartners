<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'description', 'is_show', 'created_at', 'updated_at'];


    public function Product()
    {
        return $this->hasMany('App\Models\Product');
    }
}
