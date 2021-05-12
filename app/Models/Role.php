<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role';
    const ADMIN = 1;
    const CLIENT = 2;
    const MODERATOR = 3;
    const ACCOUNTANT = 100000; #TODO set 4 after rebuild
    const ENTREPRENEUR = 5;
    const CONSUMER = 6;
    const SELLER = 7;
    const  USER = 8;
}
