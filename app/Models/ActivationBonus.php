<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivationBonus extends Model
{
    const OPERATION_ACTIVATION_BONUS = 1;
    const OPERATION_BONUS_FOR_INVITATION = 2;
    const OPERATION_GET_PER_MONTH_PV = 3;

}
