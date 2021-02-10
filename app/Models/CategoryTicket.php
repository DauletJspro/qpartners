<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryTicket extends Model
{
    /**
     * Fields that can be mass assigned
     *
     * @var array
     */
    protected $fillable = ['name'];


    /**
     * A category can have many tickets
     */
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
