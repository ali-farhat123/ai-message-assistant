<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['content', 'category', 'priority', 'summary', 'suggested_reply', 'status', 'user_id'];
}
