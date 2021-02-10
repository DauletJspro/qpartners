<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommentTicket extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'ticket_id', 'user_id', 'comment'
    ];

    /**
     * A comment belongs to a particular ticket
     */
    public function ticket()
    {
        return $this->belongsTo(\App\Models\Ticket::class);
    }

    /**
     * A comment belongs to a user
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\Users::class);
    }
}
