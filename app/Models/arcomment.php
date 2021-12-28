<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class arcomment extends Model
{
    use HasFactory;

    protected $fillable = [
        'ar_comment',
        'status_id',
    ];
}
