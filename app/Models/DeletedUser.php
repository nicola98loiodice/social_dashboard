<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeletedUser extends Model
{
        protected $fillable = [
        'user_id',
        'name',
        'email',
        'city',
        'company',
        'post_count',
    ];
}
