<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviews';
    protected $primaryKey = 'id';
    protected $fillable = ['review_text', 'review_type_id', 'user_id', 'rating', 'user_name', 'user_email'];

    const PRODUCT_REVIEW = 1;
    const NEWS_REVIEW = 2;
}
